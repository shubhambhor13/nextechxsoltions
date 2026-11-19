from fastapi import APIRouter, HTTPException, Depends
from backend.database import get_db_connection
from backend.schemas import ContactMessageCreate, ContactMessageOut
from backend.services.notification_service import trigger_n8n_automation
from typing import List

router = APIRouter(prefix="/api/contact", tags=["Contact"])

@router.post("", response_model=dict)
async def submit_contact_form(data: ContactMessageCreate):
    conn = get_db_connection()
    cursor = conn.cursor()
    try:
        cursor.execute("""
            INSERT INTO contact_messages (name, email, phone, company, service_interest, message)
            VALUES (?, ?, ?, ?, ?, ?)
        """, (data.name, str(data.email), data.phone, data.company, data.service_interest, data.message))
        conn.commit()
        msg_id = cursor.lastrowid
        
        # Trigger automation stream
        await trigger_n8n_automation("new_contact_inquiry", {
            "id": msg_id,
            "name": data.name,
            "email": str(data.email),
            "service": data.service_interest
        })
        
        return {
            "success": True,
            "message": "Thank you! Your inquiry has been received. Our solutions team will contact you within 24 hours.",
            "inquiry_id": msg_id
        }
    except Exception as e:
        conn.rollback()
        raise HTTPException(status_code=500, detail=f"Database error: {str(e)}")
    finally:
        conn.close()

@router.get("", response_model=List[ContactMessageOut])
def get_all_contact_messages():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM contact_messages ORDER BY created_at DESC")
    rows = cursor.fetchall()
    conn.close()
    return [dict(row) for row in rows]


from fastapi import APIRouter, HTTPException
from backend.database import get_db_connection
from backend.schemas import ConsultationBookingCreate, ConsultationBookingOut
from backend.services.notification_service import trigger_n8n_automation
from typing import List

router = APIRouter(prefix="/api/consultation", tags=["Consultation"])

@router.post("", response_model=dict)
async def book_consultation(data: ConsultationBookingCreate):
    conn = get_db_connection()
    cursor = conn.cursor()
    try:
        cursor.execute("""
            INSERT INTO consultation_bookings
            (name, email, phone, company, topic, preferred_date, preferred_time, notes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        """, (data.name, str(data.email), data.phone, data.company, data.topic, data.preferred_date, data.preferred_time, data.notes))
        conn.commit()
        booking_id = cursor.lastrowid
        
        await trigger_n8n_automation("consultation_booked", {
            "id": booking_id,
            "name": data.name,
            "email": str(data.email),
            "date": data.preferred_date,
            "time": data.preferred_time
        })
        
        return {
            "success": True,
            "message": f"Consultation booked for {data.preferred_date} at {data.preferred_time}! Calendar invite and meeting link sent.",
            "booking_id": booking_id
        }
    except Exception as e:
        conn.rollback()
        raise HTTPException(status_code=500, detail=str(e))
    finally:
        conn.close()

@router.get("", response_model=List[ConsultationBookingOut])
def get_consultations():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM consultation_bookings ORDER BY created_at DESC")
    rows = cursor.fetchall()
    conn.close()
    return [dict(row) for row in rows]


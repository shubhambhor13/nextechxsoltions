from fastapi import APIRouter, HTTPException
from backend.database import get_db_connection
from backend.schemas import QuotationRequestCreate, QuotationRequestOut
from backend.services.notification_service import trigger_n8n_automation
from backend.services.email_service import send_form_notification_email
from typing import List

router = APIRouter(prefix="/api/quotation", tags=["Quotation"])

@router.post("", response_model=dict)
async def submit_quotation_request(data: QuotationRequestCreate):
    conn = get_db_connection()
    cursor = conn.cursor()
    try:
        cursor.execute("""
            INSERT INTO quotation_requests 
            (name, email, phone, company, service_category, budget_range, project_timeline, requirements)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        """, (data.name, str(data.email), data.phone, data.company, data.service_category, data.budget_range, data.project_timeline, data.requirements))
        conn.commit()
        quote_id = cursor.lastrowid
        
        # Centralized Email Notification to nextechxsolutions@gmail.com
        send_form_notification_email(
            form_type="quote",
            form_title="Quotation Request",
            form_data={
                "Client Name": data.name,
                "Email": str(data.email),
                "Phone": data.phone,
                "Company": data.company or "Not specified",
                "Service Category": data.service_category,
                "Budget Range": data.budget_range,
                "Timeline": data.project_timeline,
                "Requirements": data.requirements
            },
            user_email=str(data.email),
            user_name=data.name
        )

        await trigger_n8n_automation("new_quotation_request", {
            "id": quote_id,
            "name": data.name,
            "email": str(data.email),
            "category": data.service_category,
            "budget": data.budget_range
        })
        
        return {
            "success": True,
            "message": "Quotation request submitted successfully! A custom statement of work & estimate is being prepared.",
            "quotation_id": quote_id
        }
    except Exception as e:
        conn.rollback()
        raise HTTPException(status_code=500, detail=str(e))
    finally:
        conn.close()

@router.get("", response_model=List[QuotationRequestOut])
def get_all_quotations():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM quotation_requests ORDER BY created_at DESC")
    rows = cursor.fetchall()
    conn.close()
    return [dict(row) for row in rows]


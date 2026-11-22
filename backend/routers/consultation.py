from fastapi import APIRouter, HTTPException
from backend.database import get_db_connection
from backend.schemas import ConsultationBookingCreate, ConsultationBookingOut
from backend.services.notification_service import trigger_n8n_automation
from backend.services.email_service import send_form_notification_email
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
        
        # Centralized Email Notification to nextechxsolutions@gmail.com
        send_form_notification_email(
            form_type="consultation",
            form_title="Strategy Consultation Booking",
            form_data={
                "Client Name": data.name,
                "Email": str(data.email),
                "Phone": data.phone,
                "Company": data.company or "Not specified",
                "Topic": data.topic,
                "Preferred Date": data.preferred_date,
                "Preferred Time": data.preferred_time,
                "Notes": data.notes or "None provided"
            },
            user_email=str(data.email),
            user_name=data.name
        )

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


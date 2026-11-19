from fastapi import APIRouter, HTTPException, Depends
from backend.database import get_db_connection
from backend.schemas import StatusUpdateRequest
from typing import Dict, Any

router = APIRouter(prefix="/api/admin", tags=["Admin Portal"])

@router.get("/stats")
def get_admin_dashboard_stats():
    conn = get_db_connection()
    cursor = conn.cursor()
    
    cursor.execute("SELECT COUNT(*) FROM contact_messages")
    total_contacts = cursor.fetchone()[0]
    
    cursor.execute("SELECT COUNT(*) FROM quotation_requests")
    total_quotes = cursor.fetchone()[0]
    
    cursor.execute("SELECT COUNT(*) FROM consultation_bookings")
    total_consultations = cursor.fetchone()[0]
    
    cursor.execute("SELECT COUNT(*) FROM student_registrations")
    total_students = cursor.fetchone()[0]
    
    # Status breakdowns
    cursor.execute("SELECT status, COUNT(*) FROM student_registrations GROUP BY status")
    student_status = dict(cursor.fetchall())
    
    cursor.execute("SELECT status, COUNT(*) FROM contact_messages GROUP BY status")
    contact_status = dict(cursor.fetchall())
    
    cursor.execute("SELECT status, COUNT(*) FROM quotation_requests GROUP BY status")
    quote_status = dict(cursor.fetchall())
    
    # Recent items
    cursor.execute("SELECT id, name, email, service_interest, created_at, 'contact' as type, status FROM contact_messages ORDER BY created_at DESC LIMIT 5")
    recent_contacts = [dict(r) for r in cursor.fetchall()]
    
    cursor.execute("SELECT id, full_name as name, email, course_selected as service_interest, created_at, 'student' as type, status FROM student_registrations ORDER BY created_at DESC LIMIT 5")
    recent_students = [dict(r) for r in cursor.fetchall()]
    
    conn.close()
    
    return {
        "metrics": {
            "total_contacts": total_contacts,
            "total_quotations": total_quotes,
            "total_consultations": total_consultations,
            "total_students": total_students,
            "active_leads": total_contacts + total_quotes + total_consultations
        },
        "breakdown": {
            "students": student_status,
            "contacts": contact_status,
            "quotations": quote_status
        },
        "recent_activities": recent_contacts + recent_students
    }

@router.patch("/contact/{item_id}/status")
def update_contact_status(item_id: int, payload: StatusUpdateRequest):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("UPDATE contact_messages SET status = ? WHERE id = ?", (payload.status, item_id))
    conn.commit()
    conn.close()
    return {"success": True, "message": f"Contact #{item_id} status updated to {payload.status}"}

@router.patch("/quotation/{item_id}/status")
def update_quotation_status(item_id: int, payload: StatusUpdateRequest):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("UPDATE quotation_requests SET status = ? WHERE id = ?", (payload.status, item_id))
    conn.commit()
    conn.close()
    return {"success": True, "message": f"Quotation #{item_id} status updated to {payload.status}"}

@router.patch("/student/{item_id}/status")
def update_student_status(item_id: int, payload: StatusUpdateRequest):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("UPDATE student_registrations SET status = ? WHERE id = ?", (payload.status, item_id))
    conn.commit()
    conn.close()
    return {"success": True, "message": f"Student #{item_id} status updated to {payload.status}"}


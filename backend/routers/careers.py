import os
import re
import shutil
from datetime import datetime
from typing import Optional, List
from fastapi import APIRouter, UploadFile, File, Form, HTTPException
from fastapi.responses import FileResponse
from backend.database import get_db_connection
from backend.services.email_service import send_career_application_email
from backend.services.notification_service import trigger_n8n_automation

router = APIRouter(prefix="/api/careers", tags=["Careers & Recruitment"])

# Directory for secure resume storage
UPLOAD_DIR = os.path.join(os.path.dirname(os.path.dirname(__file__)), "uploads", "resumes")
os.makedirs(UPLOAD_DIR, exist_ok=True)

ALLOWED_EXTENSIONS = {".pdf", ".doc", ".docx"}
MAX_FILE_SIZE_BYTES = 10 * 1024 * 1024  # 10 MB

# Available Opportunities Data
# Job Vacancies are currently closed - offering internships only
JOB_VACANCIES = []
NOTICE = "Currently, we are offering internship opportunities. Stay connected for future updates."

INTERNSHIP_ROLES = [
    {
        "id": "intern-aiml",
        "title": "AI & Machine Learning Research Intern",
        "department": "Artificial Intelligence",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Work on deep learning neural networks, computer vision object detection (YOLO), Transformer architectures, and production RAG agents.",
        "skills": ["PyTorch", "OpenCV", "Hugging Face", "FastAPI", "Vector DBs"],
        "liveProject": "Autonomous Video Analytics & Edge Inference Pipeline"
    },
    {
        "id": "intern-web",
        "title": "Full Stack Web Engineering Intern",
        "department": "Software Engineering",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Architect modern web apps with React 18, Tailwind CSS, Python FastAPI / Node.js, and automated cloud deployments.",
        "skills": ["React.js", "Tailwind CSS", "FastAPI", "PostgreSQL", "Docker", "AWS"],
        "liveProject": "Multi-Tenant Cloud Operations Portal & Telemetry Dashboard"
    },
    {
        "id": "intern-data",
        "title": "Data Analytics & Power BI Intern",
        "department": "Business Intelligence",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Transform complex datasets into interactive executive dashboards with advanced SQL, DAX formulas, and automated ETL workflows.",
        "skills": ["Power BI", "Advanced SQL", "DAX", "Pandas", "Excel Models"],
        "liveProject": "Executive Corporate KPI & Revenue Intelligence Dashboard"
    },
    {
        "id": "intern-python",
        "title": "Python Automation & Workflow Intern",
        "department": "Automation & DevOps",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Develop high-throughput asynchronous backend APIs, event queues, and business automation workflows using Python.",
        "skills": ["FastAPI", "AsyncIO", "Celery / Redis", "Selenium", "Webhooks"],
        "liveProject": "Enterprise Data Harvester & Real-Time Sync Pipeline"
    },
    {
        "id": "intern-java",
        "title": "Java Enterprise & Microservices Intern",
        "department": "Enterprise Architecture",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Implement robust microservices architectures, Spring Boot services, secure REST endpoints, and transactional data layers.",
        "skills": ["Java 21", "Spring Boot", "Spring Security", "Hibernate", "PostgreSQL"],
        "liveProject": "High-Throughput Order Management & Settlement Microservice"
    },
    {
        "id": "intern-cyber",
        "title": "Cyber Security & SOC Defense Intern",
        "department": "Information Security",
        "type": "Internship",
        "workplace": "100% Online Remote",
        "selection": "Interview-Based",
        "description": "Hands-on vulnerability assessments, ethical penetration testing, packet analysis, and security incident investigations.",
        "skills": ["Kali Linux", "Wireshark", "Burp Suite", "OWASP Top 10", "SOC Triage"],
        "liveProject": "Vulnerability Assessment & Threat Defense Simulation Lab"
    }
]

@router.get("/vacancies")
def get_all_vacancies():
    return {
        "notice": NOTICE,
        "jobs": JOB_VACANCIES,
        "internships": INTERNSHIP_ROLES
    }

@router.post("/apply")
async def submit_career_application(
    full_name: str = Form(...),
    email: str = Form(...),
    phone: str = Form(...),
    applying_for: str = Form(...),
    position: str = Form(...),
    education: str = Form(...),
    message: Optional[str] = Form(""),
    resume: UploadFile = File(...)
):
    """
    Submits a career application for a Job or Internship.
    Securely saves the resume and forwards the complete application details
    with the attached resume to nextechxsolutions@gmail.com.
    """
    # 1. Field Validations
    full_name = full_name.strip()
    email = email.strip().lower()
    phone = phone.strip()
    applying_for = applying_for.strip()
    position = position.strip()
    education = education.strip()
    message = (message or "").strip()

    if not full_name or not email or not phone or not position or not education:
        raise HTTPException(status_code=400, detail="All required fields must be filled.")

    if not re.match(r"[^@]+@[^@]+\.[^@]+", email):
        raise HTTPException(status_code=400, detail="Please provide a valid email address.")

    if applying_for not in ["Job", "Internship"]:
        applying_for = "Job" if "job" in applying_for.lower() else "Internship"

    # 2. Resume File Validation
    original_filename = resume.filename or "resume.pdf"
    file_ext = os.path.splitext(original_filename)[1].lower()

    if file_ext not in ALLOWED_EXTENSIONS:
        raise HTTPException(
            status_code=400,
            detail=f"Invalid file format: '{file_ext}'. Only PDF, DOC, and DOCX files are accepted."
        )

    # Sanitize file name and create unique stored file path
    safe_name = re.sub(r"[^a-zA-Z0-9_\-\.]", "_", original_filename)
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    stored_filename = f"{timestamp}_{safe_name}"
    stored_filepath = os.path.join(UPLOAD_DIR, stored_filename)

    # 3. Read and Save File Securely with Size Limitation
    try:
        file_size = 0
        with open(stored_filepath, "wb") as buffer:
            while chunk := await resume.read(1024 * 64):  # 64 KB chunks
                file_size += len(chunk)
                if file_size > MAX_FILE_SIZE_BYTES:
                    buffer.close()
                    if os.path.exists(stored_filepath):
                        os.remove(stored_filepath)
                    raise HTTPException(
                        status_code=400,
                        detail="Resume file exceeds the maximum allowed size of 10 MB."
                    )
                buffer.write(chunk)
    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Failed to process uploaded file: {str(e)}")

    # 4. Save Record in Database
    conn = get_db_connection()
    cursor = conn.cursor()
    app_id = None
    try:
        cursor.execute("""
            INSERT INTO career_applications
            (full_name, email, phone, applying_for, position, education, resume_filename, resume_filepath, message, status, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'new', datetime('now'))
        """, (full_name, email, phone, applying_for, position, education, original_filename, stored_filepath, message))
        conn.commit()
        app_id = cursor.lastrowid
    except Exception as e:
        conn.rollback()
        raise HTTPException(status_code=500, detail=f"Database error: {str(e)}")
    finally:
        conn.close()

    # 5. Send Email with Attachment to nextechxsolutions@gmail.com
    email_result = send_career_application_email(
        app_data={
            "full_name": full_name,
            "email": email,
            "phone": phone,
            "applying_for": applying_for,
            "position": position,
            "education": education,
            "message": message
        },
        resume_path=stored_filepath,
        resume_filename=original_filename
    )

    # Update email_sent status in DB
    if email_result.get("sent"):
        try:
            conn = get_db_connection()
            conn.execute("UPDATE career_applications SET email_sent = 1 WHERE id = ?", (app_id,))
            conn.commit()
            conn.close()
        except Exception:
            pass

    # 6. Trigger n8n notification event
    await trigger_n8n_automation("new_career_application", {
        "id": app_id,
        "name": full_name,
        "email": email,
        "applying_for": applying_for,
        "position": position,
        "email_sent": email_result.get("sent", False)
    })

    return {
        "success": True,
        "message": f"Thank you, {full_name}! Your {applying_for.lower()} application for '{position}' has been successfully submitted. Our talent acquisition team has received your details and resume at nextechxsolutions@gmail.com.",
        "application_id": app_id,
        "email_sent": email_result.get("sent", False),
        "target_email": "nextechxsolutions@gmail.com",
        "attachment": original_filename
    }

@router.get("/applications")
def list_career_applications():
    """Admin endpoint to list all received career applications."""
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM career_applications ORDER BY created_at DESC")
    rows = cursor.fetchall()
    conn.close()
    return [dict(row) for row in rows]

@router.get("/download-resume/{application_id}")
def download_candidate_resume(application_id: int):
    """Admin endpoint to securely download applicant's resume."""
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT resume_filename, resume_filepath FROM career_applications WHERE id = ?", (application_id,))
    row = cursor.fetchone()
    conn.close()

    if not row or not row["resume_filepath"] or not os.path.exists(row["resume_filepath"]):
        raise HTTPException(status_code=404, detail="Resume file not found.")

    return FileResponse(
        path=row["resume_filepath"],
        filename=row["resume_filename"],
        media_type="application/octet-stream"
    )

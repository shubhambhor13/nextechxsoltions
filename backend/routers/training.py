from fastapi import APIRouter, HTTPException
from backend.database import get_db_connection
from backend.schemas import StudentRegistrationCreate, StudentRegistrationOut
from backend.services.notification_service import trigger_n8n_automation
from backend.services.email_service import send_form_notification_email
from typing import List

router = APIRouter(prefix="/api/training", tags=["Training & Internship"])

COURSES_DATA = [
    {
        "id": "ai-ml",
        "title": "Artificial Intelligence & Machine Learning",
        "category": "AI / Data Science",
        "duration": "12 Weeks (3 Months)",
        "level": "Intermediate to Advanced",
        "badge": "Highest Demand",
        "description": "Master deep learning, computer vision, neural networks, LLM fine-tuning, and modern MLOps pipelines using PyTorch and Hugging Face.",
        "skills": ["PyTorch", "TensorFlow", "Transformers", "OpenCV", "LangChain", "FastAPI Deployment", "Docker"],
        "modules": [
            "Foundations of Machine Learning & Statistical Inference",
            "Deep Learning & Convolutional Neural Networks (CNNs)",
            "Natural Language Processing & LLMs (Transformers, RAG)",
            "Computer Vision & Object Detection (YOLO, Segmentation)",
            "Cap-Stone Industry Project with Live Model Deployment"
        ],
        "internship_perks": [
            "Work on client computer vision & NLP datasets",
            "GitHub portfolio code review by senior ML engineers",
            "Letter of Recommendation (LOR) & Certificate",
            "Dedicated Placement Assistance"
        ]
    },
    {
        "id": "data-analytics",
        "title": "Data Analytics & Power BI Mastery",
        "category": "Analytics & BI",
        "duration": "8 Weeks (2 Months)",
        "level": "Beginner to Advanced",
        "badge": "Corporate Favorite",
        "description": "Transform raw business data into actionable executive insights. Master advanced SQL, Power BI DAX, Tableau, and automated reporting.",
        "skills": ["Power BI", "Advanced SQL", "Python for Analytics", "DAX Formulas", "Excel Modeling", "Data Warehousing"],
        "modules": [
            "Advanced SQL & Relational Database Architecture",
            "Exploratory Data Analysis with Python & Pandas",
            "Interactive Dashboarding & KPI Modeling with Power BI",
            "DAX Measures, Time Intelligence & Data Storytelling",
            "Real-World Business Intelligence Sprint for Enterprise KPI"
        ],
        "internship_perks": [
            "Build 4 end-to-end interactive enterprise dashboards",
            "Direct corporate case study datasets",
            "Certified Power BI Specialist credential",
            "Mock technical interview preparation"
        ]
    },
    {
        "id": "web-dev",
        "title": "Full Stack Modern Web Development",
        "category": "Software Engineering",
        "duration": "12 Weeks (3 Months)",
        "level": "Beginner to Intermediate",
        "badge": "Core Track",
        "description": "Build high-performance web applications with React.js, Tailwind CSS, Python FastAPI / Node.js, and modern cloud deployment on AWS.",
        "skills": ["React.js", "Tailwind CSS", "FastAPI / Node", "PostgreSQL", "REST & GraphQL", "Docker", "Git"],
        "modules": [
            "Modern JavaScript (ES6+), React 18, State Management & Hooks",
            "Responsive Modern UI Design with Tailwind CSS & Framer Motion",
            "High-Performance Backend with FastAPI & Node.js",
            "Database Design, Relational Modeling & ORMs",
            "Authentication (JWT), Cloud CI/CD & Production Deployment"
        ],
        "internship_perks": [
            "Build and ship 3 production-grade fullstack web applications",
            "Code reviews on pull requests from senior architects",
            "Verified Experience Certificate as Fullstack Intern",
            "Live client project deployment sprint"
        ]
    },
    {
        "id": "python-automation",
        "title": "Python Enterprise & Workflow Automation",
        "category": "Programming & Automation",
        "duration": "8 Weeks (2 Months)",
        "level": "Beginner to Advanced",
        "badge": "Fast Track",
        "description": "Go beyond basic syntax: learn asynchronous programming, API orchestration, web scraping, task queues, and automated script testing.",
        "skills": ["Python 3.12", "Asyncio", "Playwright", "FastAPI", "Celery / Redis", "Pandas", "Pytest"],
        "modules": [
            "Python Advanced OOP, Generators, Decorators & Asyncio",
            "Web Scraping & Headless Automation with Playwright",
            "Building Scalable Microservices with FastAPI",
            "Task Queuing & Background Workers with Celery/Redis",
            "Enterprise Automation Scripting & Testing"
        ],
        "internship_perks": [
            "Develop actual robotic process automation scripts",
            "Mentorship on production Python best practices",
            "Industry internship certificate",
            "Technical assessment portfolio"
        ]
    },
    {
        "id": "java-enterprise",
        "title": "Java Enterprise & Microservices",
        "category": "Enterprise Systems",
        "duration": "10 Weeks",
        "level": "Intermediate",
        "badge": "Enterprise Core",
        "description": "Engineered for high-throughput backend systems. Master Java 21, Spring Boot 3, Hibernate JPA, Kafka, and containerized microservices.",
        "skills": ["Java 21", "Spring Boot 3", "Spring Cloud", "Hibernate", "Apache Kafka", "PostgreSQL", "Docker"],
        "modules": [
            "Core Java 21 & Concurrency Engineering",
            "Spring Boot 3 RESTful Microservices Architecture",
            "Hibernate ORM, Transactions & Database Tuning",
            "Event-Driven Architecture with Kafka & RabbitMQ",
            "Microservice Security, Resilience4j & Kubernetes Basics"
        ],
        "internship_perks": [
            "Develop multi-service banking or e-commerce backend",
            "Industry standards code architecture mentorship",
            "Spring Boot Certified Developer path",
            "Placement referral network"
        ]
    },
    {
        "id": "cyber-security",
        "title": "Cyber Security & SOC Defense",
        "category": "Security & Defense",
        "duration": "8 Weeks",
        "level": "Intermediate",
        "badge": "High Demand",
        "description": "Hands-on defense, vulnerability assessment, ethical penetration testing, SIEM monitoring, and incident response methodologies.",
        "skills": ["Wireshark", "Nmap", "Metasploit", "Burp Suite", "Splunk SIEM", "Linux Hardening", "ISO 27001"],
        "modules": [
            "Network Protocols, Packet Analysis & Threat Landscapes",
            "Ethical Hacking & Web Application Penetration Testing",
            "Security Information & Event Management (SIEM) Monitoring",
            "Incident Response, Forensics & Malware Analysis",
            "Cloud Security Compliance & Identity Governance"
        ],
        "internship_perks": [
            "Hands-on lab CTF simulations and live vulnerability reports",
            "Guidance for CEH / CompTIA Security+ certifications",
            "Internship completion certificate & verified credentials",
            "Security Analyst interview bootcamp"
        ]
    }
]

@router.get("/courses")
def get_training_courses():
    return COURSES_DATA

@router.post("/register", response_model=dict)
async def register_student(data: StudentRegistrationCreate):
    conn = get_db_connection()
    cursor = conn.cursor()
    try:
        cursor.execute("""
            INSERT INTO student_registrations
            (full_name, email, phone, qualification, current_status, course_selected, batch_timing, resume_link, statement)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        """, (data.full_name, str(data.email), data.phone, data.qualification, data.current_status, data.course_selected, data.batch_timing, data.resume_link, data.statement))
        conn.commit()
        reg_id = cursor.lastrowid
        
        # Centralized Email Notification to nextechxsolutions@gmail.com
        send_form_notification_email(
            form_type="internship",
            form_title="Internship & Mentorship Registration",
            form_data={
                "Candidate Name": data.full_name,
                "Email": str(data.email),
                "Phone": data.phone,
                "Qualification": data.qualification,
                "Academic Status": data.current_status,
                "Selected Domain": data.course_selected,
                "Batch Timing": data.batch_timing,
                "Resume Link": data.resume_link or "Not provided",
                "Statement": data.statement or "None provided"
            },
            user_email=str(data.email),
            user_name=data.full_name
        )

        await trigger_n8n_automation("new_student_registration", {
            "id": reg_id,
            "name": data.full_name,
            "email": str(data.email),
            "course": data.course_selected,
            "batch": data.batch_timing
        })
        
        return {
            "success": True,
            "message": f"Congratulations {data.full_name}! Your registration for {data.course_selected} has been recorded. Our academic counselor will reach out via WhatsApp and Email.",
            "registration_id": reg_id
        }
    except Exception as e:
        conn.rollback()
        raise HTTPException(status_code=500, detail=str(e))
    finally:
        conn.close()

@router.get("/registrations", response_model=List[StudentRegistrationOut])
def get_all_registrations():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM student_registrations ORDER BY created_at DESC")
    rows = cursor.fetchall()
    conn.close()
    return [dict(row) for row in rows]


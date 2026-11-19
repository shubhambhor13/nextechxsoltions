import os
import sqlite3
from datetime import datetime

DB_FILE = os.environ.get("DATABASE_PATH", os.path.join(os.path.dirname(__file__), "app.db"))

def get_db_connection():
    conn = sqlite3.connect(DB_FILE)
    conn.row_factory = sqlite3.Row
    return conn

def init_db():
    conn = get_db_connection()
    cursor = conn.cursor()
    
    # 1. Contact Messages
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS contact_messages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT,
        company TEXT,
        service_interest TEXT,
        message TEXT NOT NULL,
        status TEXT DEFAULT 'new',
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    # 2. Quotation Requests
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS quotation_requests (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        company TEXT,
        service_category TEXT NOT NULL,
        budget_range TEXT,
        project_timeline TEXT,
        requirements TEXT NOT NULL,
        status TEXT DEFAULT 'pending',
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    # 3. Consultation Bookings
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS consultation_bookings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        company TEXT,
        topic TEXT NOT NULL,
        preferred_date TEXT NOT NULL,
        preferred_time TEXT NOT NULL,
        notes TEXT,
        status TEXT DEFAULT 'scheduled',
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    # 4. Student Registrations
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS student_registrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        full_name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        qualification TEXT NOT NULL,
        current_status TEXT NOT NULL,
        course_selected TEXT NOT NULL,
        batch_timing TEXT NOT NULL,
        resume_link TEXT,
        statement TEXT,
        status TEXT DEFAULT 'under_review',
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    # 5. AI Chat Messages
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS chat_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        session_id TEXT NOT NULL,
        role TEXT NOT NULL,
        content TEXT NOT NULL,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    # 6. Career Applications (Jobs & Internships)
    cursor.execute("""
    CREATE TABLE IF NOT EXISTS career_applications (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        full_name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        applying_for TEXT NOT NULL,
        position TEXT NOT NULL,
        education TEXT NOT NULL,
        resume_filename TEXT,
        resume_filepath TEXT,
        message TEXT,
        status TEXT DEFAULT 'new',
        email_sent INTEGER DEFAULT 0,
        created_at TEXT DEFAULT CURRENT_TIMESTAMP
    )
    """)
    
    conn.commit()
    
    # Seed initial sample data if tables are empty
    cursor.execute("SELECT COUNT(*) FROM student_registrations")
    if cursor.fetchone()[0] == 0:
        cursor.execute("""
        INSERT INTO student_registrations (full_name, email, phone, qualification, current_status, course_selected, batch_timing, statement, status, created_at)
        VALUES 
        ('Aarav Sharma', 'aarav.sharma@example.com', '+91 98765 43210', 'B.Tech CSE Final Year', 'Student', 'AI & Machine Learning', 'Weekend (10:00 AM - 1:00 PM)', 'Passionate about deep learning and computer vision architectures.', 'accepted', datetime('now', '-3 days')),
        ('Sneha Patel', 'sneha.patel@example.com', '+91 98123 45678', 'BCA Graduate', 'Fresh Graduate', 'Full Stack Web Development', 'Weekday Evening (6:30 PM - 8:30 PM)', 'Looking to master modern React and FastAPI enterprise architecture.', 'under_review', datetime('now', '-1 days')),
        ('Rohan Mehta', 'rohan.mehta@example.com', '+91 97234 56789', 'B.Sc Data Science', 'Student', 'Data Analytics & Power BI', 'Weekday Morning (9:00 AM - 11:00 AM)', 'Aspiring business intelligence analyst with strong SQL background.', 'accepted', datetime('now', '-5 days'))
        """)
        
    cursor.execute("SELECT COUNT(*) FROM contact_messages")
    if cursor.fetchone()[0] == 0:
        cursor.execute("""
        INSERT INTO contact_messages (name, email, phone, company, service_interest, message, status, created_at)
        VALUES 
        ('Vikram Singhania', 'vikram@apexlogistics.com', '+91 99887 76655', 'Apex Logistics Corp', 'AI Automation Solutions', 'We are looking to automate our shipment tracking and customer support via WhatsApp and n8n workflows.', 'new', datetime('now', '-2 days')),
        ('Elena Rostova', 'elena@novatech-eu.com', '+44 20 7946 0912', 'NovaTech Solutions', 'Data Annotation Services', 'Require computer vision bounding box and polygon annotation for autonomous drone surveillance datasets.', 'contacted', datetime('now', '-4 days'))
        """)

    cursor.execute("SELECT COUNT(*) FROM quotation_requests")
    if cursor.fetchone()[0] == 0:
        cursor.execute("""
        INSERT INTO quotation_requests (name, email, phone, company, service_category, budget_range, project_timeline, requirements, status, created_at)
        VALUES 
        ('Marcus Vance', 'marcus@nexustelecom.io', '+1 415 555 2671', 'Nexus Telecom', 'IT Solutions & Cloud', '$10,000 - $25,000', '1 - 3 Months', 'Full cloud migration, customer billing portal revamp, and microservices deployment on AWS.', 'pending', datetime('now', '-1 days'))
        """)

    conn.commit()
    conn.close()


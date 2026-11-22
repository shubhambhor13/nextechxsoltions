import sqlite3
import json
from fastapi import APIRouter, HTTPException, Depends, Request
from backend.database import get_db_connection
from typing import Dict, Any, Optional, List

router = APIRouter(prefix="/api/cms", tags=["Website CMS"])

# ==========================================
# 1. SETTINGS, APPEARANCE & NAVIGATION
# ==========================================

@router.get("/settings")
def get_site_settings():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT setting_key, setting_value FROM cms_site_settings")
    settings = {row["setting_key"]: row["setting_value"] for row in cursor.fetchall()}
    conn.close()
    return {"success": True, "settings": settings}

@router.get("/appearance")
def get_appearance_settings():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT theme_key, theme_value FROM cms_appearance")
    appearance = {row["theme_key"]: row["theme_value"] for row in cursor.fetchall()}
    conn.close()
    return {"success": True, "appearance": appearance}

@router.get("/navigation")
def get_navigation_menu(location: str = "primary_header"):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute(
        "SELECT * FROM cms_navigation WHERE menu_location = ? AND is_active = 1 ORDER BY sort_order ASC",
        (location,)
    )
    nav_items = [dict(row) for row in cursor.fetchall()]
    conn.close()
    return {"success": True, "navigation": nav_items}

@router.get("/page/{slug}")
def get_page_details(slug: str):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM cms_pages WHERE slug = ? LIMIT 1", (slug,))
    page_row = cursor.fetchone()
    page = dict(page_row) if page_row else None

    cursor.execute(
        "SELECT * FROM cms_sections WHERE page_slug = ? AND is_enabled = 1 AND status = 'published' ORDER BY sort_order ASC",
        (slug,)
    )
    sections = []
    for r in cursor.fetchall():
        sec = dict(r)
        try:
            sec["content"] = json.loads(sec["content_json"])
        except Exception:
            sec["content"] = {}
        sections.append(sec)

    conn.close()
    return {"success": True, "page": page, "sections": sections}

@router.post("/save-section")
def save_section(payload: Dict[str, Any]):
    page_slug = payload.get("page_slug")
    section_key = payload.get("section_key")
    sec_data = payload.get("section_data", {})

    if not page_slug or not section_key:
        raise HTTPException(status_code=400, detail="Missing page_slug or section_key")

    content_json = json.dumps(sec_data.get("content", {}))
    title = sec_data.get("section_title", section_key.replace("_", " ").title())
    sec_type = sec_data.get("section_type", "standard")
    sort_order = int(sec_data.get("sort_order", 0))
    is_enabled = 1 if sec_data.get("is_enabled", True) else 0
    status = sec_data.get("status", "published")

    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT OR REPLACE INTO cms_sections 
        (page_slug, section_key, section_title, section_type, content_json, sort_order, is_enabled, status, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    """, (page_slug, section_key, title, sec_type, content_json, sort_order, is_enabled, status))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Section saved successfully."}

@router.post("/save-settings")
def save_site_settings(payload: Dict[str, Any]):
    settings = payload.get("settings", {})
    conn = get_db_connection()
    cursor = conn.cursor()
    for k, v in settings.items():
        cursor.execute("""
            INSERT OR REPLACE INTO cms_site_settings (setting_key, setting_value, updated_at)
            VALUES (?, ?, CURRENT_TIMESTAMP)
        """, (k, str(v)))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Settings saved successfully."}

# ==========================================
# 2. SERVICES MANAGEMENT
# ==========================================

@router.get("/services")
def get_services(all: Optional[str] = "0"):
    conn = get_db_connection()
    cursor = conn.cursor()
    sql = "SELECT * FROM cms_services"
    if all != "1":
        sql += " WHERE is_active = 1"
    sql += " ORDER BY sort_order ASC, id ASC"
    cursor.execute(sql)
    rows = []
    for r in cursor.fetchall():
        item = dict(r)
        try:
            item["content"] = json.loads(item["content_json"])
        except:
            item["content"] = {}
        rows.append(item)
    conn.close()
    return {"success": True, "services": rows}

@router.get("/service/{slug}")
def get_service_by_slug(slug: str):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM cms_services WHERE slug = ? LIMIT 1", (slug,))
    row = cursor.fetchone()
    conn.close()
    if not row:
        raise HTTPException(status_code=404, detail="Service not found")
    item = dict(row)
    try:
        item["content"] = json.loads(item["content_json"])
    except:
        item["content"] = {}
    return {"success": True, "service": item}

@router.post("/save-service")
def save_service(payload: Dict[str, Any]):
    slug = payload.get("slug")
    if not slug:
        raise HTTPException(status_code=400, detail="Service slug is required")
    data = payload.get("service", payload)
    title = data.get("title", slug.replace("-", " ").title())
    short_desc = data.get("short_desc", "")
    badge = data.get("badge", "Enterprise Practice")
    icon = data.get("icon", "layers")
    color = data.get("color", "blue")
    sort_order = int(data.get("sort_order", 0))
    is_active = 1 if data.get("is_active", True) else 0
    content = data.get("content", data.get("content_json", {}))
    content_json = json.dumps(content)

    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT OR REPLACE INTO cms_services 
        (slug, title, short_desc, badge, icon, color, sort_order, is_active, content_json, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    """, (slug, title, short_desc, badge, icon, color, sort_order, is_active, content_json))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Service saved successfully."}

@router.post("/delete-service")
def delete_service(payload: Dict[str, Any]):
    slug = payload.get("slug")
    if not slug:
        raise HTTPException(status_code=400, detail="Slug required")
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("DELETE FROM cms_services WHERE slug = ?", (slug,))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Service deleted successfully."}

# ==========================================
# 3. CAREERS & OPPORTUNITIES
# ==========================================

@router.get("/opportunities")
def get_career_opportunities(all: Optional[str] = "0"):
    conn = get_db_connection()
    cursor = conn.cursor()
    sql = "SELECT * FROM cms_careers_opportunities"
    if all != "1":
        sql += " WHERE is_active = 1"
    sql += " ORDER BY sort_order ASC, id ASC"
    cursor.execute(sql)
    rows = []
    for r in cursor.fetchall():
        item = dict(r)
        try: item["responsibilities"] = json.loads(item["responsibilities"])
        except: item["responsibilities"] = []
        try: item["requirements"] = json.loads(item["requirements"])
        except: item["requirements"] = []
        try: item["skills"] = json.loads(item["skills"])
        except: item["skills"] = []
        rows.append(item)
    conn.close()
    return {"success": True, "opportunities": rows}

@router.post("/save-opportunity")
def save_career_opportunity(payload: Dict[str, Any]):
    data = payload.get("opportunity", payload)
    slug = data.get("slug", f"opp-{int(datetime.datetime.now().timestamp())}")
    title = data.get("title", "Untitled")
    opp_type = data.get("type", "Internship")
    dept = data.get("department", "Engineering")
    loc = data.get("location", "Remote (Global)")
    duration = data.get("duration", "3 - 6 Months")
    stipend = data.get("stipend", "Stipend + Certificate")
    eligibility = data.get("eligibility", "")
    desc = data.get("description", "")
    resp = json.dumps(data.get("responsibilities", [])) if isinstance(data.get("responsibilities"), list) else data.get("responsibilities", "[]")
    req = json.dumps(data.get("requirements", [])) if isinstance(data.get("requirements"), list) else data.get("requirements", "[]")
    skills = json.dumps(data.get("skills", [])) if isinstance(data.get("skills"), list) else data.get("skills", "[]")
    sort_order = int(data.get("sort_order", 0))
    is_active = 1 if data.get("is_active", True) else 0

    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT OR REPLACE INTO cms_careers_opportunities 
        (slug, title, type, department, location, duration, stipend, eligibility, description, responsibilities, requirements, skills, sort_order, is_active, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    """, (slug, title, opp_type, dept, loc, duration, stipend, eligibility, desc, resp, req, skills, sort_order, is_active))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Opportunity saved successfully."}

@router.get("/applications")
def get_career_applications(status: Optional[str] = "all", position: Optional[str] = "all", search: Optional[str] = ""):
    conn = get_db_connection()
    cursor = conn.cursor()
    sql = "SELECT * FROM career_applications WHERE 1=1"
    params = []
    if status != "all":
        sql += " AND status = ?"
        params.append(status)
    if position != "all":
        sql += " AND position = ?"
        params.append(position)
    if search:
        sql += " AND (full_name LIKE ? OR email LIKE ? OR phone LIKE ?)"
        s = f"%{search}%"
        params.extend([s, s, s])
    sql += " ORDER BY id DESC"
    cursor.execute(sql, params)
    rows = [dict(r) for r in cursor.fetchall()]
    conn.close()
    return {"success": True, "applications": rows}

@router.post("/update-application-status")
def update_application_status(payload: Dict[str, Any]):
    app_id = payload.get("id")
    status = payload.get("status")
    notes = payload.get("internal_notes")
    if not app_id or not status:
        raise HTTPException(status_code=400, detail="Missing id or status")

    conn = get_db_connection()
    cursor = conn.cursor()
    if notes is not None:
        cursor.execute("UPDATE career_applications SET status = ?, internal_notes = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?", (status, notes, app_id))
    else:
        cursor.execute("UPDATE career_applications SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?", (status, app_id))
    conn.commit()
    conn.close()
    return {"success": True, "message": f"Status updated to {status}."}

# ==========================================
# 4. INQUIRIES & FORMS
# ==========================================

@router.get("/inquiries")
def get_inquiries(type: str = "contact"):
    tbl = "contact_messages"
    if type == "quotation": tbl = "quotation_requests"
    elif type == "consultation": tbl = "consultation_bookings"
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute(f"SELECT * FROM {tbl} ORDER BY id DESC LIMIT 200")
    rows = [dict(r) for r in cursor.fetchall()]
    conn.close()
    return {"success": True, "type": type, "inquiries": rows}

@router.post("/update-inquiry-status")
def update_inquiry_status(payload: Dict[str, Any]):
    inq_type = payload.get("type", "contact")
    tbl = "contact_messages"
    if inq_type == "quotation": tbl = "quotation_requests"
    elif inq_type == "consultation": tbl = "consultation_bookings"
    inq_id = payload.get("id")
    status = payload.get("status")
    notes = payload.get("internal_notes")

    conn = get_db_connection()
    cursor = conn.cursor()
    if notes is not None:
        cursor.execute(f"UPDATE {tbl} SET status = ?, internal_notes = ? WHERE id = ?", (status, notes, inq_id))
    else:
        cursor.execute(f"UPDATE {tbl} SET status = ? WHERE id = ?", (status, inq_id))
    conn.commit()
    conn.close()
    return {"success": True, "message": f"Inquiry status updated to {status}."}

@router.get("/forms")
def get_all_forms():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM cms_forms ORDER BY id ASC")
    rows = []
    for r in cursor.fetchall():
        item = dict(r)
        try: item["fields"] = json.loads(item["fields_json"])
        except: item["fields"] = []
        rows.append(item)
    conn.close()
    return {"success": True, "forms": rows}

@router.post("/save-form")
def save_form(payload: Dict[str, Any]):
    key = payload.get("form_key")
    data = payload.get("form_data", payload)
    title = data.get("form_title", key.replace("_", " ").title())
    recipient = data.get("recipient_email", "contact@nextechxsolutions.com")
    success_msg = data.get("success_message", "Success")
    error_msg = data.get("error_message", "Error")
    is_enabled = 1 if data.get("is_enabled", True) else 0
    fields_json = json.dumps(data.get("fields", [])) if isinstance(data.get("fields"), list) else data.get("fields_json", "[]")

    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT OR REPLACE INTO cms_forms 
        (form_key, form_title, recipient_email, success_message, error_message, is_enabled, fields_json, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    """, (key, title, recipient, success_msg, error_msg, is_enabled, fields_json))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Form settings saved."}

# ==========================================
# 5. TESTIMONIALS & ARTICLES
# ==========================================

@router.get("/testimonials")
def get_testimonials(location: str = "all"):
    conn = get_db_connection()
    cursor = conn.cursor()
    sql = "SELECT * FROM cms_testimonials WHERE 1=1"
    if location != "all":
        sql += f" AND (display_location = 'all' OR display_location = '{location}')"
    sql += " ORDER BY sort_order ASC, id ASC"
    cursor.execute(sql)
    rows = [dict(r) for r in cursor.fetchall()]
    conn.close()
    return {"success": True, "testimonials": rows}

@router.post("/save-testimonial")
def save_testimonial(payload: Dict[str, Any]):
    data = payload.get("testimonial", payload)
    t_id = data.get("id")
    name = data.get("client_name", "Client")
    title = data.get("client_title", "")
    comp = data.get("client_company", "")
    img = data.get("client_image", "")
    rating = int(data.get("rating", 5))
    text = data.get("review_text", "")
    proj = data.get("project_type", "")
    loc = data.get("display_location", "all")
    sort_order = int(data.get("sort_order", 0))
    is_pub = 1 if data.get("is_published", True) else 0

    conn = get_db_connection()
    cursor = conn.cursor()
    if t_id:
        cursor.execute("""
            UPDATE cms_testimonials SET client_name=?, client_title=?, client_company=?, client_image=?, 
            rating=?, review_text=?, project_type=?, display_location=?, sort_order=?, is_published=?, updated_at=CURRENT_TIMESTAMP
            WHERE id=?
        """, (name, title, comp, img, rating, text, proj, loc, sort_order, is_pub, t_id))
    else:
        cursor.execute("""
            INSERT INTO cms_testimonials (client_name, client_title, client_company, client_image, rating, review_text, project_type, display_location, sort_order, is_published)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        """, (name, title, comp, img, rating, text, proj, loc, sort_order, is_pub))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Testimonial saved."}

@router.post("/delete-testimonial")
def delete_testimonial(payload: Dict[str, Any]):
    t_id = payload.get("id")
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("DELETE FROM cms_testimonials WHERE id = ?", (t_id,))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Testimonial deleted."}

@router.get("/articles")
def get_articles(status: Optional[str] = None):
    conn = get_db_connection()
    cursor = conn.cursor()
    sql = "SELECT * FROM cms_articles"
    if status:
        sql += f" WHERE status = '{status}'"
    sql += " ORDER BY id DESC"
    cursor.execute(sql)
    rows = [dict(r) for r in cursor.fetchall()]
    conn.close()
    return {"success": True, "articles": rows}

@router.post("/save-article")
def save_article(payload: Dict[str, Any]):
    data = payload.get("article", payload)
    slug = data.get("slug")
    if not slug:
        raise HTTPException(status_code=400, detail="Slug required")
    title = data.get("title", "Untitled")
    summary = data.get("summary", "")
    content = data.get("content", "")
    cat = data.get("category", "Technology")
    tags = data.get("tags", "")
    img = data.get("featured_image", "")
    author = data.get("author", "NextTechX Editorial Team")
    status = data.get("status", "draft")
    meta_title = data.get("meta_title", title)
    meta_desc = data.get("meta_description", summary)
    pub_at = data.get("published_at")

    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT OR REPLACE INTO cms_articles 
        (slug, title, summary, content, category, tags, featured_image, author, status, meta_title, meta_description, published_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
    """, (slug, title, summary, content, cat, tags, img, author, status, meta_title, meta_desc, pub_at))
    conn.commit()
    conn.close()
    return {"success": True, "message": "Article saved."}

# ==========================================
# 6. GLOBAL CONTROLS & LOGS
# ==========================================

@router.get("/global-controls")
def get_global_controls():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT setting_key, setting_value FROM cms_site_settings WHERE setting_key IN ('maintenance_mode', 'announcement_enabled', 'announcement_text', 'announcement_link', 'cookie_notice_enabled', 'cookie_notice_text')")
    controls = {r["setting_key"]: r["setting_value"] for r in cursor.fetchall()}
    conn.close()
    return {"success": True, "controls": controls}

@router.get("/logs")
def get_activity_logs(limit: int = 50):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT * FROM cms_activity_logs ORDER BY id DESC LIMIT ?", (limit,))
    rows = [dict(r) for r in cursor.fetchall()]
    conn.close()
    return {"success": True, "logs": rows}

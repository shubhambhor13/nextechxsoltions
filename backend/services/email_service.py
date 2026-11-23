import os
import smtplib
import logging
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
from datetime import datetime

logger = logging.getLogger("career_email_service")

# Email Configurations
TARGET_EMAIL = os.environ.get("TARGET_EMAIL", os.environ.get("CAREER_TARGET_EMAIL", "nextechxsolutions@gmail.com"))
HR_EMAIL = os.environ.get("HR_EMAIL", os.environ.get("CAREER_HR_EMAIL", "hr@nextechxsolutions.com"))
SMTP_HOST = os.environ.get("SMTP_HOST", "smtp.hostinger.com")
SMTP_PORT = int(os.environ.get("SMTP_PORT", "465"))
SMTP_USER = os.environ.get("SMTP_USERNAME", os.environ.get("SMTP_USER", "hr@nextechxsolutions.com"))
SMTP_PASS = os.environ.get("SMTP_PASS", os.environ.get("SMTP_PASSWORD", ""))
SMTP_FROM = os.environ.get("SMTP_FROM_EMAIL", os.environ.get("SMTP_FROM", "hr@nextechxsolutions.com"))
SMTP_FROM_NAME = os.environ.get("SMTP_FROM_NAME", "NEXTECHX SOLUTIONS")

def send_form_notification_email(form_type: str, form_title: str, form_data: dict, user_email: str = "", user_name: str = "", attachments: list = None) -> dict:
    """
    Unified Form Notification Dispatcher for Python FastAPI backend.
    Sends full submission details & attachments to nextechxsolutions@gmail.com
    and dispatches confirmation email to the applicant/visitor.
    """
    user_name = user_name or "Valued Submitter"
    submitted_at = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    subject = f"[{form_title.upper()}] New Submission from {user_name} - NEXTECHX SOLUTIONS"

    # Plain text summary
    body_text = f"""
============================================================
NEW FORM SUBMISSION: {form_title.upper()}
============================================================
Submitter:      {user_name}
Email Address:  {user_email}
Date & Time:    {submitted_at}

SUBMITTED DETAILS:
------------------------------------------------------------
"""
    for k, v in form_data.items():
        body_text += f"{k:20}: {v}\n"

    body_text += f"""
============================================================
NexTechX Solutions Form Notification System
https://nextechxsolutions.com
"""

    # HTML Summary
    table_rows = "".join([f"<tr><td style='padding:6px 0;color:#64748b;font-size:13px;font-weight:500;width:35%;'>{k}:</td><td style='padding:6px 0;color:#0f172a;font-size:13.5px;font-weight:600;'>{v}</td></tr>" for k, v in form_data.items()])

    body_html = f"""
    <!DOCTYPE html>
    <html>
    <head><meta charset="utf-8"></head>
    <body style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,sans-serif;color:#1e293b;background-color:#f8fafc;margin:0;padding:24px;">
      <div style="max-width:600px;margin:0 auto;background:#fff;border-radius:12px;border:1px solid #e2e8f0;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
        <div style="background:#0f172a;color:#fff;padding:24px;border-bottom:1px solid #e2e8f0;">
          <h2 style="margin:0;font-size:20px;font-weight:800;color:#fff;">NEXTECHX <span style="color:#38bdf8;">SOLUTIONS</span></h2>
          <p style="margin:4px 0 0 0;font-size:13px;color:#94a3b8;">New {form_title} Received</p>
        </div>
        <div style="padding:28px;">
          <div style="border:1px solid #e2e8f0;border-radius:8px;background:#f8fafc;padding:16px 20px;margin-bottom:20px;">
            <table width="100%" cellpadding="0" cellspacing="0">{table_rows}</table>
          </div>
          <p style="font-size:12px;color:#94a3b8;margin:0;">Submitted via NEXTECHX SOLUTIONS Portal on {submitted_at}</p>
        </div>
      </div>
    </body>
    </html>
    """

    msg = MIMEMultipart("mixed")
    msg["From"] = f"{SMTP_FROM_NAME} <{SMTP_FROM}>"
    msg["To"] = TARGET_EMAIL
    msg["Subject"] = subject
    if user_email:
        msg["Reply-To"] = user_email

    alt = MIMEMultipart("alternative")
    alt.attach(MIMEText(body_text, "plain", "utf-8"))
    alt.attach(MIMEText(body_html, "html", "utf-8"))
    msg.attach(alt)

    # Attachments
    if attachments:
        for att in attachments:
            att_path = att.get("path") if isinstance(att, dict) else str(att)
            att_name = att.get("name") if isinstance(att, dict) else os.path.basename(att_path)
            if att_path and os.path.exists(att_path):
                try:
                    with open(att_path, "rb") as f:
                        part = MIMEBase("application", "octet-stream")
                        part.set_payload(f.read())
                    encoders.encode_base64(part)
                    part.add_header("Content-Disposition", f'attachment; filename="{att_name}"')
                    msg.attach(part)
                except Exception as e:
                    logger.warning(f"Could not attach file {att_path}: {e}")

    sent = False
    error_msg = None
    if SMTP_USER and SMTP_PASS:
        try:
            if SMTP_PORT == 465:
                server = smtplib.SMTP_SSL(SMTP_HOST, SMTP_PORT, timeout=10)
            else:
                server = smtplib.SMTP(SMTP_HOST, SMTP_PORT, timeout=10)
                server.ehlo()
                server.starttls()
                server.ehlo()
            server.login(SMTP_USER, SMTP_PASS)
            server.sendmail(SMTP_FROM, [TARGET_EMAIL], msg.as_string())
            server.quit()
            sent = True
        except Exception as e:
            error_msg = str(e)
            logger.error(f"Error sending form notification: {e}")
    else:
        error_msg = "SMTP credentials not configured"

    # User confirmation email
    if user_email and SMTP_USER and SMTP_PASS and sent:
        try:
            user_msg = MIMEMultipart("alternative")
            user_msg["From"] = f"{SMTP_FROM_NAME} <{SMTP_FROM}>"
            user_msg["To"] = user_email
            user_msg["Subject"] = f"Thank you for contacting NEXTECHX SOLUTIONS - {form_title}"
            user_msg["Reply-To"] = HR_EMAIL

            u_plain = f"Dear {user_name},\n\nThank you for reaching out to NEXTECHX SOLUTIONS.\nWe have received your {form_title} and our team will get in touch with you shortly.\n\nBest Regards,\nNEXTECHX SOLUTIONS Team\nhttps://nextechxsolutions.com"
            user_msg.attach(MIMEText(u_plain, "plain", "utf-8"))

            if SMTP_PORT == 465:
                u_server = smtplib.SMTP_SSL(SMTP_HOST, SMTP_PORT, timeout=10)
            else:
                u_server = smtplib.SMTP(SMTP_HOST, SMTP_PORT, timeout=10)
                u_server.ehlo()
                u_server.starttls()
                u_server.ehlo()
            u_server.login(SMTP_USER, SMTP_PASS)
            u_server.sendmail(SMTP_FROM, [user_email], user_msg.as_string())
            u_server.quit()
        except Exception as e:
            logger.warning(f"User confirmation email failed: {e}")

    return {
        "success": True,
        "sent": sent,
        "target": TARGET_EMAIL,
        "error": error_msg
    }

def send_career_application_email(app_data: dict, resume_path: str, resume_filename: str) -> dict:
    """
    Sends the career application details and uploaded resume as an email attachment
    to nextechxsolutions@gmail.com.
    """
    full_name = app_data.get("full_name", "Applicant")
    email = app_data.get("email", "")
    phone = app_data.get("phone", "")
    applying_for = app_data.get("applying_for", "Job / Internship")
    position = app_data.get("position", "")
    education = app_data.get("education", "")
    message = app_data.get("message", "N/A")
    submitted_at = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    subject = f"[{applying_for.upper()} APPLICATION] {position} - {full_name}"

    # Build Plaintext body
    body_text = f"""
============================================================
NEW CAREER APPLICATION RECEIVED - NEXTECHX SOLUTIONS
============================================================

Type:           {applying_for}
Role / Track:   {position}
Candidate Name: {full_name}
Email Address:  {email}
Phone Number:   {phone}
Education:      {education}
Date Submitted: {submitted_at}

Cover Note / Candidate Message:
------------------------------------------------------------
{message if message else "No additional notes provided."}

------------------------------------------------------------
Attached Resume: {resume_filename}
Stored on Server: {resume_path}
============================================================
NexTechX Solutions Talent Acquisition Portal
Website: https://nextechxsolutions.com
HR Contact: {HR_EMAIL}
"""

    # Build HTML body
    body_html = f"""
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <style>
        body {{ font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #1e293b; background-color: #f8fafc; margin: 0; padding: 20px; }}
        .container {{ max-width: 650px; margin: 0 auto; background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }}
        .header {{ background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff; padding: 28px; text-align: left; }}
        .badge {{ display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; background: rgba(56, 189, 248, 0.2); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.4); margin-bottom: 8px; }}
        .content {{ padding: 28px; }}
        .field-group {{ margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; }}
        .label {{ font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b; margin-bottom: 4px; }}
        .value {{ font-size: 15px; font-weight: 600; color: #0f172a; }}
        .message-box {{ background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px; margin-top: 8px; font-size: 14px; color: #334155; white-space: pre-wrap; }}
        .attachment-badge {{ background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 12px 16px; border-radius: 10px; font-weight: 600; display: flex; align-items: center; margin-top: 20px; }}
        .footer {{ background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 16px 28px; font-size: 12px; color: #94a3b8; text-align: center; }}
      </style>
    </head>
    <body>
      <div class="container">
        <div class="header">
          <span class="badge">{applying_for} Application</span>
          <h1 style="margin: 0; font-size: 22px; font-weight: 800; color: #ffffff;">{position}</h1>
          <p style="margin: 6px 0 0 0; font-size: 13px; color: #93c5fd;">NexTechX Solutions Career Portal</p>
        </div>
        <div class="content">
          <div class="field-group">
            <div class="label">Candidate Full Name</div>
            <div class="value">{full_name}</div>
          </div>
          <div class="field-group">
            <div class="label">Contact Details</div>
            <div class="value">
              <a href="mailto:{email}" style="color: #2563eb; text-decoration: none;">{email}</a> &bull; 
              <a href="tel:{phone}" style="color: #059669; text-decoration: none;">{phone}</a>
            </div>
          </div>
          <div class="field-group">
            <div class="label">Applying Category & Role</div>
            <div class="value"><span style="color: #2563eb;">{applying_for}</span> &mdash; <strong>{position}</strong></div>
          </div>
          <div class="field-group">
            <div class="label">Highest Qualification / Education</div>
            <div class="value">{education}</div>
          </div>
          <div class="field-group">
            <div class="label">Candidate Message / Cover Statement</div>
            <div class="message-box">{message if message else "No message provided."}</div>
          </div>
          <div class="attachment-badge">
            &#128206; Attached Resume: &nbsp;<strong>{resume_filename}</strong>
          </div>
        </div>
        <div class="footer">
          Submitted on {submitted_at} via NexTechX Careers Portal<br/>
          HR Inquiries: <a href="mailto:{HR_EMAIL}" style="color: #64748b;">{HR_EMAIL}</a>
        </div>
      </div>
    </body>
    </html>
    """

    # Build MIME Message
    msg = MIMEMultipart("mixed")
    msg["From"] = SMTP_FROM
    msg["To"] = TARGET_EMAIL
    msg["Subject"] = subject
    msg["Reply-To"] = email

    # Attach text + HTML alternatives
    alt_part = MIMEMultipart("alternative")
    alt_part.attach(MIMEText(body_text, "plain", "utf-8"))
    alt_part.attach(MIMEText(body_html, "html", "utf-8"))
    msg.attach(alt_part)

    # Attach uploaded resume
    if resume_path and os.path.exists(resume_path):
        try:
            with open(resume_path, "rb") as f:
                part = MIMEBase("application", "octet-stream")
                part.set_payload(f.read())
            encoders.encode_base64(part)
            part.add_header(
                "Content-Disposition",
                f'attachment; filename="{os.path.basename(resume_filename)}"',
            )
            msg.attach(part)
        except Exception as e:
            logger.error(f"Failed to attach resume file {resume_path}: {e}")

    # Attempt SMTP Transmission
    sent = False
    error_msg = None

    if SMTP_USER and SMTP_PASS:
        try:
            logger.info(f"Connecting to SMTP {SMTP_HOST}:{SMTP_PORT} as {SMTP_USER}...")
            if SMTP_PORT == 465:
                server = smtplib.SMTP_SSL(SMTP_HOST, SMTP_PORT, timeout=12)
            else:
                server = smtplib.SMTP(SMTP_HOST, SMTP_PORT, timeout=12)
                server.ehlo()
                server.starttls()
                server.ehlo()

            server.login(SMTP_USER, SMTP_PASS)
            server.sendmail(SMTP_FROM, [TARGET_EMAIL], msg.as_string())
            server.quit()
            sent = True
            logger.info(f"Successfully sent career application email to {TARGET_EMAIL} with attachment {resume_filename}")
        except Exception as e:
            error_msg = str(e)
            logger.error(f"SMTP error while sending email: {e}")
    else:
        error_msg = "SMTP credentials (SMTP_USER / SMTP_PASS) not configured in environment."
        logger.info(f"[Email Queued/Archived]: Would send to {TARGET_EMAIL}. {error_msg}")

    # Always log email receipt to disk so no candidate submission is ever lost
    try:
        log_dir = os.path.join(os.path.dirname(os.path.dirname(__file__)), "uploads", "email_logs")
        os.makedirs(log_dir, exist_ok=True)
        safe_name = "".join(c for c in full_name if c.isalnum() or c in (' ', '_', '-')).strip()
        log_file = os.path.join(log_dir, f"app_{int(datetime.now().timestamp())}_{safe_name}.eml")
        with open(log_file, "w", encoding="utf-8") as f:
            f.write(msg.as_string())
        logger.info(f"Archived application email to: {log_file}")
    except Exception as e:
        logger.warning(f"Failed to archive email file: {e}")

    return {
        "success": True,
        "sent": sent,
        "target": TARGET_EMAIL,
        "error": error_msg,
        "attachment": resume_filename
    }

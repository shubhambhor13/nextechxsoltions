# NextTechX Solutions - PHP Web Application
**Tagline:** Your Vision Our Technology  
**Official Hotline:** +91 93098 35085  
**General & All:** nextechxsolutions@gmail.com  
**Proposals & Contact:** contact@nextechxsolutions.com  
**Internship & HR Desk:** hr@nextexhxsolutions.com  

---

## 🚀 Quick Start (Local Development)

### Prerequisites
- PHP 8.0+ installed with `pdo_sqlite` enabled (default on standard PHP installations).

### Run with one click (Windows)
Double click `run_php.bat` in the root folder, or execute in terminal:
```bash
php -S 127.0.0.1:8080 -t php
```
Then navigate to: **`http://localhost:8080`**

---

## 📁 Architecture & File Structure

```text
php/
├── api/
│   ├── apply.php             # POST endpoint for internship registration
│   ├── chat.php              # Real-time intelligent AI assistant chat endpoint
│   ├── consultation.php      # POST endpoint for 30-min strategy consultation booking
│   ├── contact.php           # POST endpoint for general inquiries
│   └── quote.php             # POST endpoint for custom project quotations
├── assets/
│   ├── images/               # Official NextTechX badges, emblems, favicons & hero visuals
│   └── videos/               # High-definition AI particle/neural network background video loops
├── data/
│   ├── .htaccess             # Apache protection preventing direct SQLite downloads
│   └── app.db                # SQLite database (contains all form submissions & historical data)
├── includes/
│   ├── chatbot.php           # Floating interactive AI assistant widget
│   ├── config.php            # Global constants, DB PDO helper, and branding renderer
│   ├── footer.php            # Corporate dark footer, scripts & modals trigger
│   ├── header.php            # Responsive navbar, branding badge & active navigation state
│   └── modals.php            # "Get a Quote" and "Internship Application" modal dialogs
├── .htaccess                 # Apache rewrite rules & security headers
├── about.php                 # About Us, Pods & Delivery Philosophy
├── admin.php                 # Operations Admin Console (Passcode: admin123)
├── ai-automation.php         # AI Workflows, Chatbots, IDP & Interactive ROI Calculator
├── contact.php               # Contact Us & Direct Inquiry Form
├── faqs.php                  # Categorized FAQs & Accordion
├── how-we-work.php           # 5-Step Agile Delivery Process & Guarantees
├── index.php                 # Home Page with Hero Video, Service Cards & Live Metrics
├── industries.php            # 6 Industry Verticals & Solutions
├── internship.php            # Technology Academy & 6 Specialized Internship Tracks
├── it-services.php           # Custom Web, Mobile, Cloud & Microservices
├── portfolio.php             # Case Studies, Tech Stacks & Business Impact
├── research-publication.php  # Academic Advisory (Scopus, IEEE, Springer, SCI)
└── services.php              # Full Services Overview
```

---

## 🔒 Operations Admin Console
- **URL:** `http://localhost:8080/admin.php`
- **Default Passcode:** `admin123`
- **Features:** Real-time metrics counters, live tables for Student Registrations, Quote Inquiries, Contact Inquiries, and status filters.

---

## 🌐 Production Deployment
1. Upload the contents of the `php/` folder to your web server root (`public_html` or `www`).
2. Ensure PHP has write permissions to `php/data/` so SQLite can write `app.db`.
3. The included `.htaccess` automatically manages clean URLs and protects the `app.db` file from direct browser downloads.

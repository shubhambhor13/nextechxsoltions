# NextTechX Solutions — Enterprise Corporate Website & Platform

> **Your Vision Our Technology | IT Solutions | AI Automation | Research Paper Publication | Training & Internship**

A modern, production-grade corporate website and client portal for **NextTechX Solutions**. Built with high-performance React 18, Tailwind CSS, Framer Motion aesthetics, Python FastAPI async backend, SQLite/PostgreSQL-ready database, n8n workflow readiness, and an intelligent AI website assistant.

---

## 🚀 Live Architecture & Tech Stack

### Frontend
- **Framework**: React 18 + Vite (ESModules, ultra-fast HMR)
- **Styling**: Tailwind CSS (Dark navy `#060913`, electric blue `#00f2fe` & purple gradients, glassmorphism)
- **Icons**: Lucide React
- **Animations & Effects**: Framer Motion, Canvas Confetti celebrations
- **Routing**: React Router v6 with scroll restoration
- **Global Configuration**: `src/config/siteConfig.js` for easy global brand and contact updates

### Backend
- **Framework**: Python FastAPI (Async high-concurrency API gateway)
- **Database**: SQLite3 out of the box (zero setup) with PostgreSQL compatibility via `DATABASE_URL`
- **Validation**: Pydantic v2 schemas
- **AI Engine**: Hybrid OpenAI GPT-4 & contextual domain reasoning engine
- **Automation Pipeline**: n8n workflow integration & event dispatcher

---

## 🌐 Website Pages & Capabilities

| Page | Route | Description & Features |
|------|-------|------------------------|
| **Home** | `/` | Hero section, core services breakdown, stats counter, interactive automation visualizer, tech stack filter, case studies portfolio, client testimonials, CTA |
| **Training & Internship** | `/training-internship` | 6 Flagship Tracks (Python, Java, Data Analytics & Power BI, AI/ML, Cyber Security, Full Stack), curriculum modal, instant student registration form with confetti |
| **AI Automation Solutions** | `/ai-automation` | 8 Automation domains (AI Chatbots, WhatsApp, Email, n8n, Autonomous Agents, CRM, BPA, OCR), interactive ROI & cost-savings calculator, node visualizer |
| **Data Annotation Services** | `/data-annotation` | 2D/3D Bounding box, polygon contour, semantic segmentation, video tracking, text NER, **interactive Annotation Studio Simulator**, 99.85% SLA guarantee |
| **IT Services** | `/it-services` | Web app development, bespoke software, mobile apps, cloud DevOps, data analytics, Power BI dashboards, 24/7 BPO support, delivery lifecycle |
| **About Us** | `/about` | Mission, vision, core values, online-first global delivery model, delivery pods, certifications |
| **Contact Us** | `/contact` | Full validated contact form, direct WhatsApp click-to-chat integration, 30-min strategy call scheduler, online connection details |
| **Admin Dashboard** | `/admin` | Protected staff management portal (passcode: `admin123`). Real-time stats, filterable student registrations, CSV export, inquiry & quote management |

---

## ⚡ Advanced Features

1. **AI-Powered Website Chatbot**:
   - Floating widget at bottom-right of every page.
   - Answers inquiries on courses, automation, pricing, and services.
   - Suggested action chips that can open modals directly in the UI.

2. **Interactive Annotation Studio Simulator**:
   - Allows prospective clients to test bounding boxes, polygonal vertices, semantic segmentation masks, and text NER tags with confidence threshold sliders.

3. **Interactive Automation Workflow Engine**:
   - Visualizes multi-system flows: Webhook -> AI Agent Reasoning -> RAG Knowledge Fetch -> n8n Router -> Live CRM/Slack Sync with simulated animation.

4. **Interactive ROI Calculator**:
   - Lets business stakeholders calculate monthly and annual labor cost savings based on team size, hourly rate, and repetitive task hours.

5. **Management Portal (`/admin`)**:
   - Single-click CSV export for student registrations.
   - Status updates for inquiries (`new` → `contacted` → `closed`).
   - Status updates for quotations (`pending` → `quoted` → `in_progress`).

---

## 🛠️ Quick Start & Running

### Option A: Unified Production Server (Single Port 8000)
Runs the compiled frontend and the FastAPI backend simultaneously on port 8000:
```bash
python run_server.py
```
Open **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.

### Option B: Development Mode (Hot Reloading)
Using the provided batch script on Windows:
```bash
run_dev.bat
```
Or manually in two separate terminal windows:

**Terminal 1 (Backend):**
```bash
python -m uvicorn backend.main:app --host 127.0.0.1 --port 8000 --reload
```

**Terminal 2 (Frontend):**
```bash
cd frontend
npm run dev
```
- Frontend: **[http://localhost:5173](http://localhost:5173)**
- Backend API Docs: **[http://127.0.0.1:8000/docs](http://127.0.0.1:8000/docs)**
- Admin Console: **[http://localhost:5173/admin](http://localhost:5173/admin)** (Passcode: `admin123`)

---

## 🔌 API Endpoints Summary

- `GET /api/health` — Service health check & engine status
- `POST /api/contact` — Submit general or corporate inquiry
- `GET /api/contact` — Retrieve all inquiries (Admin)
- `POST /api/quotation` — Submit project quotation request
- `GET /api/quotation` — Retrieve all quotation requests (Admin)
- `POST /api/consultation` — Book 30-minute discovery call
- `GET /api/consultation` — Retrieve scheduled consultation bookings (Admin)
- `GET /api/training/courses` — Retrieve available training tracks and syllabi
- `POST /api/training/register` — Submit student registration for internship
- `GET /api/training/registrations` — Retrieve student applications (Admin)
- `GET /api/portfolio` — Retrieve case studies & metrics
- `POST /api/chat` — Conversational AI website assistant
- `GET /api/admin/stats` — Overall KPI metrics & breakdown
- `PATCH /api/admin/student/{id}/status` — Update student application status
- `PATCH /api/admin/contact/{id}/status` — Update contact inquiry status
- `PATCH /api/admin/quotation/{id}/status` — Update quotation status

---

## 🔒 Security & Best Practices
- Zero hardcoded API keys or frontend secrets.
- Environment variables supported via `.env` (`OPENAI_API_KEY`, `N8N_WEBHOOK_URL`, `DATABASE_URL`).
- Pydantic v2 strict payload validation with input sanitization.
- Clean separation between presentation layer and persistent data store.

import os
import re

OPENAI_API_KEY = os.environ.get("OPENAI_API_KEY")

SYSTEM_KNOWLEDGE = {
    "company": "NexTechX Solutions",
    "tagline": "Your Vision Our Technology — Enterprise IT Solutions, AI Automation & Research Publications",
    "domains": [
        "IT Solutions & Custom Software Development",
        "AI & Workflow Automation (Chatbots, WhatsApp, n8n, Custom Agents)",
        "Data Annotation Services (Computer Vision, NLP, Bounding Boxes, Polygons, Segmentation)",
        "BPO Services (Inbound/Outbound, Technical Support, Data Entry)",
        "Training & Internship Programs (Python, Java, AI/ML, Data Analytics, Cyber Security, Web Dev)"
    ],
    "courses": [
        {"name": "AI & Machine Learning", "duration": "12 Weeks", "mode": "Live Projects + Placement Guidance"},
        {"name": "Data Analytics & Power BI", "duration": "8 Weeks", "mode": "Real Business Case Studies"},
        {"name": "Full Stack Web Development", "duration": "12 Weeks", "mode": "React, Node.js & Cloud Deployment"},
        {"name": "Python Full-Stack & Automation", "duration": "8 Weeks", "mode": "FastAPI + Scripting + Scraping"},
        {"name": "Java Enterprise Development", "duration": "10 Weeks", "mode": "Spring Boot & Microservices"},
        {"name": "Cyber Security & Ethical Hacking", "duration": "8 Weeks", "mode": "Hands-on SOC & Penetration Testing"}
    ]
}

def generate_smart_fallback(user_text: str) -> dict:
    text = user_text.lower()
    
    # 1. Training & Internship inquiries
    if any(k in text for k in ["internship", "training", "course", "learn", "student", "batch", "certificate", "curriculum", "syllabus", "fees"]):
        reply = (
            "🎓 **Our Training & Internship Academy** offers immersive, industry-accredited programs!\n\n"
            "Here are our flagship tracks:\n"
            "• **AI & Machine Learning**: Deep Learning, PyTorch, LLMs, Computer Vision.\n"
            "• **Data Analytics & Power BI**: SQL, Advanced Excel, DAX, Interactive Dashboards.\n"
            "• **Full Stack Web Development**: React.js, Tailwind, FastAPI, Node, Cloud.\n"
            "• **Python & Java Enterprise**: High-performance backend & enterprise microservices.\n"
            "• **Cyber Security**: SOC analysis, network defense, penetration testing.\n\n"
            "✨ *Every enrolled student gets direct 1-on-1 mentorship, live corporate projects, verified internship certificates, and placement prep.*"
        )
        actions = ["View All Courses", "Register for Internship", "Download Syllabus"]
        return {"reply": reply, "suggested_actions": actions}
    
    # 2. Quotation / Pricing inquiries
    if any(k in text for k in ["quote", "price", "pricing", "cost", "budget", "estimate", "how much", "rate", "rupee", "inr"]):
        reply = (
            "💼 **Get a Tailored Quotation in Indian Rupees (₹)**\n\n"
            "At NexTechX Solutions, all quotations are provided in Indian Rupees (INR ₹) tailored to your exact scope:\n"
            "• **Custom Software & Web/Mobile Apps**: High-quality MVPs to full enterprise systems (from ₹50,000).\n"
            "• **AI & n8n Automation Workflows**: WhatsApp chatbots, CRM automation, & auto-invoice processors.\n"
            "• **Research Paper Writing & Publication**: Scopus, IEEE, Springer & UGC-CARE advisory.\n"
            "• **Technology Training & Internship**: Practical live-project mentorship tracks.\n\n"
            "Click 'Request Quotation' to get a customized price quote within 24 hours!"
        )
        actions = ["Request Quotation", "Book Consultation", "Explore Services"]
        return {"reply": reply, "suggested_actions": actions}

    # 3. AI Automation inquiries
    if any(k in text for k in ["automation", "n8n", "chatbot", "whatsapp", "agent", "crm", "workflow", "document"]):
        reply = (
            "🤖 **AI & Workflow Automation Solutions**\n\n"
            "We eliminate operational bottlenecks through intelligent automation:\n"
            "• **Custom AI Chatbots**: RAG-powered agents trained on your proprietary docs & FAQs.\n"
            "• **WhatsApp & Omni-Channel Automation**: Automated lead capture, order status & ticketing.\n"
            "• **n8n & Zapier Orchestrations**: Seamless integration across HubSpot, Salesforce, Slack, ERPs.\n"
            "• **Intelligent Document Processing (IDP)**: OCR and entity extraction from invoices, contracts, & IDs."
        )
        actions = ["View AI Solutions", "Request Quotation", "Chat With an Architect"]
        return {"reply": reply, "suggested_actions": actions}

    # 4. Research Paper Publication inquiries
    if any(k in text for k in ["research", "paper", "publish", "scopus", "ieee", "springer", "ugc", "journal", "thesis"]):
        reply = (
            "📚 **Research Paper Writing & Publication Support**\n\n"
            "We provide complete end-to-end academic advisory for students, faculty, and PhD scholars:\n"
            "• **Topic Selection & Novel Problem Statement Formulation**\n"
            "• **PRISMA-Aligned Literature Surveys & Mathematical Formulation**\n"
            "• **Turnitin Plagiarism Verification (< 10%)**\n"
            "• **Publication Guidance for Scopus (Q1/Q2), IEEE Xplore, Springer Nature & UGC-CARE**\n\n"
            "Contact our publication advisory team to discuss your paper scope and timeline!"
        )
        actions = ["Publish Research Paper", "Request Quotation", "Book Advisory Call"]
        return {"reply": reply, "suggested_actions": actions}

    # 5. Contact / Consultation inquiries
    if any(k in text for k in ["contact", "call", "phone", "email", "consultation", "meeting", "address", "location"]):
        reply = (
            "📞 **Connect With Our Solutions Team Online**\n\n"
            "We operate as an online-first IT solutions company serving clients globally:\n"
            "• 💼 **Client Inquiries**: contact@nextechxsolutions.com\n"
            "• 🎓 **HR & Internships**: hr@nextechxsolutions.com\n"
            "• 📱 **WhatsApp / Hotline**: +91 93098 35085\n"
            "• 🌐 **Delivery Model**: 100% Online-First Global Remote Delivery\n"
            "• 🗓️ **Book a Free 30-Min Strategy Consultation** or Request a Quotation directly via our website!"
        )
        actions = ["Book Consultation", "Request Quotation", "Open WhatsApp", "Fill Contact Form"]
        return {"reply": reply, "suggested_actions": actions}

    # 6. Default general greeting or overview
    reply = (
        "Hello! 👋 I'm your **AI Assistant**, your interactive guide to our enterprise IT solutions.\n\n"
        "How can I assist you today?\n"
        "1. **Explore IT Services** (Web, Mobile, Cloud, BI)\n"
        "2. **AI & n8n Automation Solutions**\n"
        "3. **Data Annotation for Computer Vision / NLP**\n"
        "4. **Student Training & Internship Programs**\n"
        "5. **Request a Free Quotation or Consultation**"
    )
    actions = ["Explore Services", "Training Programs", "Request Quotation", "Book Consultation"]
    return {"reply": reply, "suggested_actions": actions}

async def generate_ai_response(user_text: str) -> dict:
    if OPENAI_API_KEY:
        try:
            import httpx
            async with httpx.AsyncClient(timeout=10.0) as client:
                res = await client.post(
                    "https://api.openai.com/v1/chat/completions",
                    headers={"Authorization": f"Bearer {OPENAI_API_KEY}"},
                    json={
                        "model": "gpt-4o-mini",
                        "messages": [
                            {
                                "role": "system",
                                "content": "You are the professional AI representative of NexTechX Solutions (an online-first IT Solutions, AI Automation, and Research Paper Publication company). The company operates entirely online with global delivery and does not have physical offices. Tagline: 'Your Vision Our Technology'. Be concise, helpful, and encourage users to book a consultation, request a quotation, or connect via WhatsApp or Email."
                            },
                            {"role": "user", "content": user_text}
                        ],
                        "temperature": 0.7,
                        "max_tokens": 400
                    }
                )
                if res.status_code == 200:
                    data = res.json()
                    content = data["choices"][0]["message"]["content"]
                    return {
                        "reply": content,
                        "suggested_actions": ["Request Quotation", "Explore Courses", "Book Consultation"]
                    }
        except Exception:
            pass  # Fall back to high-grade intelligent context engine
            
    return generate_smart_fallback(user_text)

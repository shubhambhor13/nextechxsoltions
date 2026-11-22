<?php
// NextTechX Solutions - Centralized Corporate Knowledge Base
// Contains verified, public company information across all services, practices, internships, and operations.

function get_company_knowledge_base() {
    return [
        "company" => [
            "name" => "NextTechX Solutions",
            "tagline" => "Your Vision Our Technology",
            "overview" => "NextTechX Solutions is an enterprise IT solutions and artificial intelligence company. We build custom AI assistants, automated business workflows, full-stack web and mobile platforms, cloud infrastructure, and provide research publication advisory worldwide.",
            "delivery_model" => "Online-First Global Delivery. We operate a distributed, remote-first model serving clients across India and internationally with 24/7 responsiveness.",
            "sla_and_metrics" => [
                "uptime" => "99.9% Uptime Reliability SLA",
                "ai_response" => "Sub-second AI response latency",
                "security" => "100% NDA protected & Zero-Trust Architecture",
                "support" => "24/7 dedicated engineering helpdesk (15-minute response SLA on critical incidents)"
            ],
            "core_values" => [
                "High-Quality Clean Code (Tested, scalable, maintainable)",
                "Clear & Honest Pricing (Milestone-based, no hidden costs)",
                "100% Privacy & Security (Signed mutual NDAs, strict zero-trust confidentiality)",
                "Real Business Results (Engineered to save operational hours and accelerate revenue)"
            ]
        ],
        "contact" => [
            "client_email" => "contact@nextechxsolutions.com",
            "hr_email" => "hr@nextechxsolutions.com",
            "general_email" => "nextechxsolutions@gmail.com",
            "phone" => "+91 93098 35085",
            "phone_tel" => "+919309835085",
            "whatsapp_url" => "https://wa.me/919309835085?text=Hello%20NextTechX%20Solutions,%20I%20would%20like%20to%20inquire%20about%20your%20services%20and%20programs.",
            "linkedin_url" => "https://www.linkedin.com/company/nextechx-solutions/",
            "contact_page" => "/#contact"
        ],
        "services" => [
            "ai_automation" => [
                "name" => "AI Automation Solutions",
                "url" => "/ai-automation",
                "summary" => "Autonomous AI chatbots, WhatsApp business automation, and n8n enterprise workflows designed to eliminate manual business friction.",
                "sub_services" => [
                    "AI Chatbots & RAG Agents" => "Generative AI assistants trained on proprietary corporate repositories, knowledge bases, and product catalogs with zero-hallucination protocols, hybrid vector search (Pinecone / pgvector), and automated human handoff.",
                    "WhatsApp & Omnichannel Bots" => "24/7 automated sales, support, and order-tracking bots powered by the official Meta Cloud API with automated order status, invoice dispatch, interactive button menus, and shared team inboxes.",
                    "n8n Enterprise Orchestration" => "Self-hosted, distributed n8n workflows connecting legacy systems, ERPs, CRMs, webhooks, automated retries, and data transformations with zero third-party data retention.",
                    "Autonomous Multi-Step AI Agents" => "Goal-driven AI agents utilizing ReAct reasoning loops, safe sandboxed code execution, deterministic human approval gates, and cryptographic audit trails.",
                    "CRM & ERP Automated Pipelines" => "Bidirectional real-time sync across HubSpot, Salesforce, Zoho, and PostgreSQL with automated SDR routing and deal velocity alerts.",
                    "Intelligent Document Processing (IDP)" => "High-accuracy OCR parsing invoices, receipts, contracts, KYC documents, and handwritten forms into QuickBooks, SAP, or SQL databases with confidential PII redaction."
                ]
            ],
            "it_software" => [
                "name" => "IT & Software Solutions",
                "url" => "/it-services",
                "summary" => "Full-stack software engineering, modern web applications, mobile apps, and cloud infrastructure.",
                "sub_services" => [
                    "Enterprise Web Applications" => "Modern web applications built with React 18, Next.js, and Tailwind CSS, optimized for sub-second Core Web Vitals and multi-tenant SaaS scaling.",
                    "Custom Software Engineering" => "High-throughput backend systems and microservices in Python FastAPI and Java Spring Boot with Apache Kafka event-driven architectures.",
                    "Cross-Platform Mobile Apps" => "iOS and Android apps using React Native and Flutter with offline-first SQLite sync and biometric security.",
                    "Cloud Infrastructure & CI/CD" => "Docker containerization, Kubernetes (EKS/GKE) orchestration, Terraform IaC, automated GitHub Actions pipelines, and cloud cost optimization on AWS, GCP, and Azure.",
                    "Data Analytics & Engineering" => "High-volume ETL/ELT pipelines with Python, Apache Spark, Snowflake, BigQuery, and dbt semantic modeling.",
                    "Executive Business Intelligence" => "Interactive Power BI executive dashboards with DAX calculations and multi-dimensional KPI tracking.",
                    "24/7 BPO & Tech Support Pods" => "Dedicated offshore engineering pods and tier-2 technical support operating with guaranteed 15-minute response SLAs."
                ]
            ],
            "research_publication" => [
                "name" => "Research Paper Publication Advisory",
                "url" => "/research-publication",
                "summary" => "End-to-end academic advisory for students, faculty, and PhD scholars for publication in indexed journals and conferences.",
                "sub_services" => [
                    "Topic Selection" => "Identifying novel research topics in AI/ML, Data Science, Cloud, IoT, and Computer Science.",
                    "Research Guidance" => "Formulating theoretical frameworks, mathematical modeling, and experimental baseline comparisons.",
                    "Literature Review Support" => "PRISMA-compliant literature surveys from IEEE, Elsevier, and Springer papers.",
                    "Paper Writing" => "Drafting manuscripts according to standard academic IMRaD format.",
                    "Paper Revision Support" => "Drafting rebuttal letters and revising manuscripts according to peer reviewer comments.",
                    "Formatting & Referencing" => "Pixel-perfect adherence to IEEE, Springer (LNCS), Elsevier, Nature, ACM, and UGC Care templates using LaTeX / Word and Mendeley / Zotero / BibTeX.",
                    "Journal Selection" => "Selecting genuine Scopus (Q1–Q4), Web of Science (SCI/SCIE), and UGC-CARE approved journals while screening out predatory publishers.",
                    "Plagiarism Verification" => "Turnitin plagiarism check verifying similarity index strictly below 10%."
                ]
            ]
        ],
        "careers_and_internships" => [
            "policy" => "NextTechX Solutions is currently offering INTERNSHIP OPPORTUNITIES ONLY. There are no active experienced job vacancies at this time.",
            "status_message" => "Currently, we are offering internship opportunities. Stay connected for future updates.",
            "hr_email" => "hr@nextechxsolutions.com",
            "page_url" => "/careers",
            "benefits" => [
                "Hands-on live corporate project deployment",
                "Direct 1-on-1 mentorship from senior architects",
                "Verified corporate internship completion certificate",
                "Letter of Recommendation (LOR) for top performers",
                "Resume review, GitHub portfolio curation & placement guidance"
            ],
            "application_process" => [
                "1. Visit the Careers & Internships page at /careers",
                "2. Browse available internship tracks",
                "3. Click 'Apply Now' on the chosen role or scroll to the Career Application Form",
                "4. Fill in full name, email, phone, education, and role interest",
                "5. Upload your Resume (PDF or DOCX, max 5MB)",
                "6. Submit the application — applications route directly to hr@nextechxsolutions.com"
            ],
            "available_internship_tracks" => [
                [
                    "title" => "AI & Machine Learning Research Intern",
                    "domain" => "Artificial Intelligence",
                    "skills" => "PyTorch, OpenCV, Hugging Face, FastAPI, Vector DBs (Pinecone, pgvector), YOLO",
                    "project" => "Autonomous Video Object Detection & Edge Inference Pipeline"
                ],
                [
                    "title" => "Full Stack Web Engineering Intern",
                    "domain" => "Software Engineering",
                    "skills" => "React.js, Tailwind CSS, FastAPI, PostgreSQL, Docker, AWS",
                    "project" => "Multi-Tenant Cloud Operations Portal & Telemetry Dashboard"
                ],
                [
                    "title" => "Data Analytics & Power BI Intern",
                    "domain" => "Business Intelligence",
                    "skills" => "Power BI, Advanced SQL, DAX, Python Pandas, Excel Modeling",
                    "project" => "Executive Corporate KPI & Revenue Intelligence Dashboard"
                ],
                [
                    "title" => "Python Automation & Workflow Intern",
                    "domain" => "Automation & DevOps",
                    "skills" => "FastAPI, Async Python, Celery / Redis, Selenium, Webhooks",
                    "project" => "Enterprise Data Harvester & Real-Time Sync Pipeline"
                ],
                [
                    "title" => "Java Enterprise Microservices Intern",
                    "domain" => "Enterprise Systems",
                    "skills" => "Java 21, Spring Boot 3, Microservices, Hibernate, Docker",
                    "project" => "High-Throughput Order Management & Settlement Microservice"
                ],
                [
                    "title" => "Cyber Security & SOC Defense Intern",
                    "domain" => "Security & SOC",
                    "skills" => "Kali Linux, Wireshark, Burp Suite, OWASP Top 10, SOC Triage",
                    "project" => "Vulnerability Assessment & Threat Defense Simulation Lab"
                ]
            ]
        ],
        "portfolio_projects" => [
            "Healthcare Portal" => "Multi-tenant cloud platform with HIPAA compliance, EHR synchronization, and video consultations.",
            "Fleet Telemetry" => "Logistics and tracking system with real-time GPS tracking and automated dispatch.",
            "AI Support Agent" => "Autonomous RAG customer agent integrated with Zendesk and WhatsApp reducing ticket volume by 68%.",
            "FinTech Settlement" => "High-throughput reconciliation engine processing high-volume transactions with zero discrepancies.",
            "Real Estate CRM" => "Automated lead pipeline connecting WhatsApp with HubSpot for property matching.",
            "EdTech LMS" => "Adaptive learning management system featuring video streaming, automated grading, and student progress tracking."
        ],
        "industries" => [
            "Healthcare & Life Sciences" => "HIPAA-compliant, EHR integrations, telehealth",
            "FinTech & Banking" => "PCI-DSS compliant, transaction settlement, automated reconciliation",
            "Retail & E-Commerce" => "Omnichannel sync, automated customer service, dynamic pricing",
            "Manufacturing & Logistics" => "IoT sensor monitoring, fleet telemetry, supply chain tracking",
            "Education & EdTech" => "Learning portals, video LMS, student analytics",
            "Professional Services & Legal" => "Contract extraction, automated billing, secure client portals"
        ],
        "how_we_work" => [
            "Phase 1: Discovery & Architecture Blueprint" => "Technical requirements gathering, feasibility study, architecture diagram, sprint planning.",
            "Phase 2: UI/UX Design & Prototyping" => "Wireframing in Figma, interactive design systems, clickable prototypes.",
            "Phase 3: Agile Sprint Engineering" => "Bi-weekly sprint demonstrations, clean tested code, continuous CI/CD integration.",
            "Phase 4: QA, Security & Performance Hardening" => "Automated testing, load testing, security audits, signed NDA confidentiality.",
            "Phase 5: Deployment, Training & 24/7 SLA Support" => "Zero-downtime release, user documentation, continuous monitoring."
        ],
        "privacy_policy" => [
            "url" => "/privacy-policy",
            "ip_ownership" => "100% of all custom source code, models, datasets, and technical deliverables belong to the client under signed bilateral NDAs. NextTechX never claims ownership.",
            "zero_ai_training" => "NextTechX strictly pledges NEVER to feed client code, private databases, or proprietary information into public AI models for training.",
            "data_monetization" => "NextTechX never sells, rents, brokers, or monetizes client or candidate data.",
            "security" => "TLS 1.3 in-transit and AES-256 at-rest encryption, aligned with enterprise zero-trust standards.",
            "internship_resumes" => "Internship resumes are reviewed exclusively by authorized HR (hr@nextechxsolutions.com) and are never shared with external headhunters or marketing lists.",
            "compliance_email" => "contact@nextechxsolutions.com"
        ],
        "faqs" => [
            "Privacy Policy & Data Security" => "Comprehensive Privacy Policy is available at /privacy-policy. It guarantees 100% client IP ownership, zero public AI model training on client assets, zero data reselling, and TLS 1.3 / AES-256 encryption.",
            "Data Protection & IP" => "All client code, data, and intellectual property belong 100% to the client under signed mutual NDAs. We adhere to zero-trust access protocols.",
            "Pricing Model" => "Transparent milestone-based quotations in Indian Rupees (₹) or USD. Pricing depends strictly on project scope and features with no hidden charges.",
            "Internship Eligibility" => "Students and recent graduates pursuing B.Tech, M.Tech, BCA, MCA, or related degree programs with a foundational passion for programming.",
            "Research Paper Timeline" => "Standard paper drafting and formatting typically requires 2 to 4 weeks depending on the target conference or journal deadline."
        ]
    ];
}

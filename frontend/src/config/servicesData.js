// Complete Data Model for the 5 Core Services of NextTechX Solutions
export const servicesData = [
  {
    id: "ai-automation",
    slug: "ai-automation",
    title: "AI & Automation",
    badge: "Autonomous Intelligence",
    tagline: "Intelligent autonomous agents, generative AI, and end-to-end workflow automation.",
    shortDesc: "Empower your enterprise with intelligent conversational agents, autonomous multi-step workflow pipelines, computer vision, and predictive machine learning models.",
    overview: "Our AI & Automation practice builds intelligent, production-ready systems that transform operational efficiency. We combine state-of-the-art Large Language Models (LLMs), autonomous event-driven agents, and computer vision pipelines to eliminate manual overhead, accelerate decision-making, and create responsive customer experiences.",
    iconName: "Bot",
    heroGraphicType: "ai",
    theme: {
      gradient: "from-blue-600 via-indigo-600 to-cyan-500",
      accent: "text-cyan-600",
      bgLight: "bg-cyan-50/60",
      border: "border-cyan-200",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      btnClass: "bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700",
      cardBorder: "border-cyan-100 hover:border-cyan-300",
      glowBg: "bg-cyan-500/10"
    },
    coreConcepts: [
      {
        title: "Artificial Intelligence (AI)",
        desc: "Foundational algorithms and neural systems capable of reasoning, planning, and executing complex cognitive tasks autonomously.",
        iconName: "Brain"
      },
      {
        title: "Machine Learning (ML)",
        desc: "Supervised and unsupervised models trained on structured enterprise data to generate predictive insights and automated classifications.",
        iconName: "Cpu"
      },
      {
        title: "Generative AI & LLMs",
        desc: "Custom retrieval-augmented generation (RAG) architectures leveraging GPT-4o, Claude, and open-source models with private enterprise context.",
        iconName: "Sparkles"
      },
      {
        title: "Natural Language Processing (NLP)",
        desc: "High-precision semantic understanding, sentiment analysis, entity extraction, and multilingual translation for enterprise text streams.",
        iconName: "MessageSquare"
      },
      {
        title: "Computer Vision",
        desc: "Automated visual inspection, optical character recognition (OCR), facial verification, and object tracking across images and video feeds.",
        iconName: "Eye"
      },
      {
        title: "Intelligent Automation (IA)",
        desc: "Connecting AI decision nodes directly into existing operational APIs, ERPs, and CRMs to automate multi-step business transactions.",
        iconName: "Zap"
      }
    ],
    offerings: [
      {
        title: "Custom RAG AI Chatbots",
        desc: "Context-aware conversational assistants trained on private company documentation, SOPs, and knowledge repositories."
      },
      {
        title: "Autonomous AI Agents",
        desc: "Goal-driven multi-step agents that proactively plan tasks, query databases, invoke APIs, and deliver verifiable outcomes."
      },
      {
        title: "Business Process Automation",
        desc: "End-to-end digitisation of routine back-office approvals, customer triage, and transaction workflows."
      },
      {
        title: "Workflow Automation (n8n & Webhooks)",
        desc: "Multi-platform automated event pipelines synchronising CRMs, payment gateways, email systems, and messaging apps."
      },
      {
        title: "Intelligent OCR Document Extraction",
        desc: "Automated extraction and structured validation of data from invoices, purchase orders, identity cards, and receipts."
      },
      {
        title: "Enterprise AI Integration",
        desc: "Seamless embedding of AI microservices into your existing web, mobile, and legacy ERP infrastructure."
      }
    ],
    techStack: [
      { name: "Python", category: "Core Language" },
      { name: "FastAPI / PyTorch", category: "Frameworks" },
      { name: "OpenAI & Claude LLMs", category: "Foundation Models" },
      { name: "LangChain & LlamaIndex", category: "Agent Orchestration" },
      { name: "ChromaDB / Pinecone", category: "Vector Databases" },
      { name: "n8n Automation Engine", category: "Event Pipelines" },
      { name: "WhatsApp Cloud API", category: "Messaging Gateway" },
      { name: "Docker & AWS ECS", category: "Cloud Deployment" }
    ],
    workflow: [
      {
        step: "01",
        title: "Requirement Analysis",
        desc: "We analyze manual friction points, existing data sources, and business objectives to define measurable automation KPIs.",
        deliverable: "Feasibility Assessment & Automation Blueprint"
      },
      {
        step: "02",
        title: "AI Solution Design",
        desc: "Architecting the prompt strategy, vector embedding pipeline, data schemas, security guardrails, and system integrations.",
        deliverable: "Architecture Schema & Security Guardrail Specs"
      },
      {
        step: "03",
        title: "Development & Tuning",
        desc: "Engineering custom microservices, fine-tuning retrieval models, and building structured workflow triggers in Python.",
        deliverable: "Functional Agent Prototype & Retrieval Model"
      },
      {
        step: "04",
        title: "API Integration",
        desc: "Connecting the AI engine directly with your operational tools (WhatsApp, CRM, databases, ERP, and payment platforms).",
        deliverable: "End-to-End API Webhooks & ERP Connections"
      },
      {
        step: "05",
        title: "Rigorous Testing & QA",
        desc: "Validating model accuracy, latency thresholds, hallucinations, edge-case fallbacks, and data privacy security controls.",
        deliverable: "QA Validation Report & Accuracy Audit"
      },
      {
        step: "06",
        title: "Deployment & Monitoring",
        desc: "Zero-downtime cloud release with continuous telemetry, prompt performance tracking, and automated failure retries.",
        deliverable: "Production Deployment & Live Telemetry"
      }
    ],
    businessApplications: [
      {
        title: "24/7 Omnichannel Customer Support",
        desc: "Resolving up to 70% of inbound customer queries instantly across web chat and WhatsApp without human agent intervention.",
        industry: "Fintech & Customer Support",
        impact: "70% Instant First-Contact Resolution"
      },
      {
        title: "Automated Accounts Payable & Invoicing",
        desc: "Ingesting incoming vendor invoices via OCR, reconciling against purchase orders, and pushing to accounting software.",
        industry: "Supply Chain & Corporate Finance",
        impact: "85% Manual AP Cycle Time Reduction"
      },
      {
        title: "HR & Employee Onboarding Assistant",
        desc: "Guiding new hires through documentation, policy lookups, hardware provisioning, and automated training modules.",
        industry: "Enterprise HR Operations",
        impact: "Zero-Wait Onboarding Processing"
      },
      {
        title: "Sales Lead Qualification & Routing",
        desc: "Instant conversational qualification of website leads, calendar appointment booking, and CRM data enrichment.",
        industry: "B2B Sales & Marketing",
        impact: "3.2x Faster Qualified Lead Routing"
      }
    ]
  },
  {
    id: "software-development",
    slug: "software-development",
    title: "Software Development",
    badge: "Custom Engineering",
    tagline: "Enterprise web platforms, scalable microservices, and high-performance applications.",
    shortDesc: "End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.",
    overview: "Our Software Development practice designs and engineers resilient digital products tailored to your operational models. We adhere to clean code principles, modular microservice architectures, and robust security protocols—ensuring your software remains scalable, maintainable, and high-performing as your organization expands.",
    iconName: "Code2",
    heroGraphicType: "software",
    theme: {
      gradient: "from-indigo-600 via-purple-600 to-pink-500",
      accent: "text-purple-600",
      bgLight: "bg-purple-50/60",
      border: "border-purple-200",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      btnClass: "bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700",
      cardBorder: "border-purple-100 hover:border-purple-300",
      glowBg: "bg-purple-500/10"
    },
    coreConcepts: [
      {
        title: "Frontend Engineering",
        desc: "Ultra-responsive, accessible user interfaces built with React, Next.js, and TypeScript, engineered for sub-second Core Web Vitals.",
        iconName: "Layout"
      },
      {
        title: "Backend Microservices",
        desc: "High-throughput asynchronous servers in Python (FastAPI), Node.js, and modern PHP engineered for high concurrent workloads.",
        iconName: "Server"
      },
      {
        title: "Database Architecture",
        desc: "Normalized relational schemas (MySQL, PostgreSQL) and NoSQL caching layers (Redis) optimized for low latency and data integrity.",
        iconName: "Database"
      },
      {
        title: "API Design & Gateways",
        desc: "Strictly typed RESTful and GraphQL API contracts with rate limiting, comprehensive documentation, and seamless versioning.",
        iconName: "Network"
      },
      {
        title: "Authentication & Security",
        desc: "Enterprise identity standards (JWT, OAuth2, RBAC, MFA) ensuring comprehensive data protection and granular user authorization.",
        iconName: "ShieldCheck"
      },
      {
        title: "Software Architecture",
        desc: "Domain-Driven Design (DDD), Clean Architecture, and decoupled services ensuring codebases remain extensible and debt-free.",
        iconName: "Layers"
      }
    ],
    offerings: [
      {
        title: "Custom Web Applications",
        desc: "Bespoke operational web systems, customer portals, and internal enterprise tools built with React and Tailwind CSS."
      },
      {
        title: "Enterprise Backend Systems",
        desc: "Resilient business logic engines, automated batch processors, and distributed event-driven microservices."
      },
      {
        title: "API Development & Integration",
        desc: "High-performance API gateways connecting third-party services, payment providers, and legacy software."
      },
      {
        title: "Database Engineering & Optimization",
        desc: "Schema design, index tuning, automated backups, and database clustering for zero-data-loss resilience."
      },
      {
        title: "Cross-Platform Mobile Apps",
        desc: "High-performance iOS and Android applications built with unified React Native codebases and offline sync."
      },
      {
        title: "Cloud Infrastructure & DevOps",
        desc: "Automated GitHub Actions CI/CD pipelines, Docker containerization, and AWS/GCP cloud configurations."
      }
    ],
    techStack: [
      { name: "React / Next.js", category: "Frontend" },
      { name: "JavaScript / TypeScript", category: "Language" },
      { name: "Python / FastAPI", category: "Backend" },
      { name: "PHP / Laravel", category: "Backend" },
      { name: "MySQL / PostgreSQL", category: "Databases" },
      { name: "HTML5 / Tailwind CSS", category: "Styling" },
      { name: "Docker & CI/CD", category: "DevOps" },
      { name: "AWS / Cloudflare", category: "Hosting" }
    ],
    workflow: [
      {
        step: "01",
        title: "Requirement Gathering",
        desc: "Deep-dive workshops to analyze business goals, functional user stories, system dependencies, and technical criteria.",
        deliverable: "Product Requirements Document (PRD) & User Stories"
      },
      {
        step: "02",
        title: "UI/UX & System Architecture",
        desc: "Creating wireframes, interactive user flows, database entity-relationship models, and modular architecture blueprints.",
        deliverable: "Figma UI/UX Prototypes & Architecture Blueprints"
      },
      {
        step: "03",
        title: "Agile Development Sprints",
        desc: "Iterative two-week sprint cycles with clean modular code, automated linting, unit test coverage, and transparent demo reviews.",
        deliverable: "Production-Grade Codebase with 85%+ Test Coverage"
      },
      {
        step: "04",
        title: "Quality Assurance & Security",
        desc: "End-to-end integration testing, cross-browser validation, performance profiling, and vulnerability security audits.",
        deliverable: "Security Audit, Load Testing & Penetration Report"
      },
      {
        step: "05",
        title: "Production Deployment",
        desc: "Zero-downtime deployment through automated CI/CD pipelines with rollback mechanisms, CDN caching, and SSL security.",
        deliverable: "Automated CI/CD Pipeline & Multi-Region Launch"
      },
      {
        step: "06",
        title: "Maintenance & Evolution",
        desc: "Proactive uptime monitoring, security patching, database optimization, and continuous feature enhancements.",
        deliverable: "99.9% Uptime SLA & Quarterly Feature Enhancements"
      }
    ],
    businessApplications: [
      {
        title: "Enterprise ERP & Operations Portals",
        desc: "Custom management portals synchronizing inventory, purchase workflows, finance, and human resources in a unified interface.",
        industry: "Corporate Operations & Manufacturing",
        impact: "Unified Real-Time Operational Visibility"
      },
      {
        title: "Customer Self-Service Portals",
        desc: "Secure customer accounts for billing management, service requests, automated document generation, and support tracking.",
        industry: "Banking & Financial Services",
        impact: "Sub-Second Transaction Processing Latency"
      },
      {
        title: "High-Concurrency Booking Engines",
        desc: "Fast, resilient transaction engines handling peak user traffic, real-time seat/slot reservations, and payment processing.",
        industry: "Hospitality & Travel",
        impact: "Zero-Downtime Peak Traffic Scalability"
      },
      {
        title: "Supply Chain & Logistics Tracking",
        desc: "Real-time dispatch telemetry, consignment tracking, and automated status notifications across distribution networks.",
        industry: "Logistics & Global Freight",
        impact: "End-to-End Real-Time Consignment Tracking"
      }
    ]
  },
  {
    id: "saas-development",
    slug: "saas-development",
    title: "SaaS Development",
    badge: "Cloud Product Engineering",
    tagline: "Multi-tenant platforms, recurring subscription billing, and cloud-native scalability.",
    shortDesc: "Complete Software-as-a-Service product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.",
    overview: "Our SaaS Development practice builds commercial, cloud-native software products engineered for recurring revenue and rapid customer scaling. We engineer robust multi-tenant architectures that guarantee tenant data isolation, streamlined billing workflows, automated user onboarding, and elastic cloud infrastructure.",
    iconName: "Layers",
    heroGraphicType: "saas",
    theme: {
      gradient: "from-sky-500 via-blue-600 to-indigo-700",
      accent: "text-blue-600",
      bgLight: "bg-blue-50/60",
      border: "border-blue-200",
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200",
      btnClass: "bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700",
      cardBorder: "border-sky-100 hover:border-sky-300",
      glowBg: "bg-sky-500/10"
    },
    coreConcepts: [
      {
        title: "Cloud-Native Computing",
        desc: "Elastic containerized architectures on AWS and Google Cloud that auto-scale compute and storage dynamically with user load.",
        iconName: "Cloud"
      },
      {
        title: "Multi-Tenant Architecture",
        desc: "Shared or isolated database schemas ensuring rigorous tenant data segregation, optimal cost efficiency, and tenant security.",
        iconName: "Layers"
      },
      {
        title: "Subscription Management",
        desc: "Automated recurring billing, tiered pricing plans, usage-based metering, and self-service customer upgrade/downgrade flows.",
        iconName: "CreditCard"
      },
      {
        title: "Horizontal Scalability",
        desc: "Stateless microservices, distributed caching, and read-replica databases engineered to support rapid user base growth.",
        iconName: "TrendingUp"
      },
      {
        title: "Enterprise Security & Compliance",
        desc: "End-to-end data encryption at rest and in transit, comprehensive audit logging, GDPR compliance, and automated backups.",
        iconName: "Lock"
      },
      {
        title: "Centralized Telemetry",
        desc: "Product analytics, feature flags, user onboarding heatmaps, and server performance monitoring in real time.",
        iconName: "BarChart3"
      }
    ],
    offerings: [
      {
        title: "Custom SaaS Platform Engineering",
        desc: "Complete conception and implementation of subscription-based B2B or B2C web and mobile cloud platforms."
      },
      {
        title: "Multi-Tenant Cloud Architecture",
        desc: "High-security tenant isolation schemas designed for enterprise data privacy and rapid horizontal scaling."
      },
      {
        title: "Subscription Billing & Gateways",
        desc: "Turnkey integration with Stripe, Razorpay, and PayPal supporting recurring billing, pro-rata calculations, and invoices."
      },
      {
        title: "Admin & Executive Dashboards",
        desc: "Granular administrative control panels for user management, MRR/ARR analytics, churn tracking, and audit trails."
      },
      {
        title: "Role-Based Access Control (RBAC)",
        desc: "Configurable workspace hierarchies allowing tenant admins to define custom permissions and member roles."
      },
      {
        title: "Public API & Webhook Gateways",
        desc: "Developer-friendly RESTful APIs and outbound webhooks enabling customer developers to build ecosystem integrations."
      }
    ],
    techStack: [
      { name: "React 18 / Next.js", category: "Web Interface" },
      { name: "PHP / Laravel & Python", category: "SaaS Core" },
      { name: "MySQL / PostgreSQL", category: "Multi-Tenant DB" },
      { name: "Stripe & Razorpay APIs", category: "Billing Engine" },
      { name: "AWS ECS / CloudFront", category: "Cloud Hosting" },
      { name: "Redis", category: "Session & Caching" },
      { name: "Postmark / SendGrid", category: "Transactional Mail" },
      { name: "Datadog / Prometheus", category: "Telemetry" }
    ],
    workflow: [
      {
        step: "01",
        title: "Product Strategy & Planning",
        desc: "Defining monetization models, feature matrices, user personas, tenancy architecture, and technical release milestones.",
        deliverable: "SaaS Product Roadmap & Monetization Framework"
      },
      {
        step: "02",
        title: "Multi-Tenant Architecture",
        desc: "Designing the database tenancy model, authorization guardrails, billing webhooks, and scalable infrastructure topology.",
        deliverable: "Multi-Tenant Schema & Isolation Strategy"
      },
      {
        step: "03",
        title: "UI/UX & User Journey Design",
        desc: "Crafting friction-free sign-up funnels, workspace onboarding tours, administrative dashboards, and billing settings.",
        deliverable: "High-Fidelity Dashboard & Onboarding Flows"
      },
      {
        step: "04",
        title: "Platform Development",
        desc: "Building the core SaaS features, payment integration, email notification pipelines, and multi-tenant logic in agile sprints.",
        deliverable: "Core SaaS Engine & Recurring Billing Integration"
      },
      {
        step: "05",
        title: "Security & Load Testing",
        desc: "Stress-testing concurrency limits, validating tenant data boundary isolation, and auditing billing edge cases.",
        deliverable: "Tenant Isolation Security Audit & Load Benchmarks"
      },
      {
        step: "06",
        title: "Cloud Launch & Continuous Delivery",
        desc: "Automated zero-downtime deployment, staging-to-production CI/CD, and 24/7 infrastructure health telemetry.",
        deliverable: "Zero-Downtime AWS ECS Multi-Tenant Release"
      }
    ],
    businessApplications: [
      {
        title: "B2B Workflow & Project Management SaaS",
        desc: "Collaborative team workspaces with task boards, role-based workflows, automated status notifications, and reporting.",
        industry: "Enterprise Productivity & Workspaces",
        impact: "Rapid Multi-Tenant User Provisioning"
      },
      {
        title: "Vertical Industry Compliance Platforms",
        desc: "Specialized platforms managing industry-specific documentation, audit tracking, regulatory reporting, and certs.",
        industry: "Healthcare & Regulatory Compliance",
        impact: "Automated Compliance Audit Trail Generation"
      },
      {
        title: "Analytics & Telemetry Portals",
        desc: "Data aggregation SaaS products parsing customer data streams into actionable executive business intelligence.",
        industry: "Marketing Tech & E-Commerce",
        impact: "Real-Time Multi-Channel Data Aggregation"
      },
      {
        title: "Digital Client Portal SaaS",
        desc: "Branded client-facing hubs allowing service providers to share deliverables, collect payments, and collaborate securely.",
        industry: "Professional Services & Agencies",
        impact: "Branded Client Collaboration & Stripe Invoicing"
      }
    ]
  },
  {
    id: "data-annotation",
    slug: "data-annotation",
    title: "Data Annotation",
    badge: "AI & ML Training Datasets",
    tagline: "High-precision data labeling, image annotation, and ground-truth validation for AI models.",
    shortDesc: "High-precision data labeling and annotation solutions providing clean, structured ground-truth datasets for computer vision and NLP models.",
    overview: "Our Data Annotation practice provides enterprise-grade ground-truth datasets essential for training accurate machine learning and deep learning models. Combining human-in-the-loop specialist labelers with multi-tier quality assurance protocols, we deliver consistently accurate, clean, and format-ready training data for computer vision, natural language processing, and multimodal AI pipelines.",
    iconName: "CheckSquare",
    heroGraphicType: "annotation",
    theme: {
      gradient: "from-teal-600 via-emerald-600 to-cyan-600",
      accent: "text-emerald-600",
      bgLight: "bg-emerald-50/60",
      border: "border-emerald-200",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      btnClass: "bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700",
      cardBorder: "border-emerald-100 hover:border-emerald-300",
      glowBg: "bg-emerald-500/10"
    },
    coreConcepts: [
      {
        title: "Ground-Truth Data Labeling",
        desc: "Assigning precise, verified semantic metadata to raw data records so machine learning algorithms can learn accurately.",
        iconName: "CheckSquare"
      },
      {
        title: "Computer Vision Annotation",
        desc: "Pixel-accurate visual marking including bounding boxes, polygons, keypoints, and semantic segmentation masks.",
        iconName: "Camera"
      },
      {
        title: "Text & NLP Annotation",
        desc: "Categorizing unstructured textual data with sentiment labels, intent classes, and Named Entity Recognition (NER) tags.",
        iconName: "FileText"
      },
      {
        title: "Temporal Video Annotation",
        desc: "Continuous frame-by-frame object tracking, event timestamping, and trajectory labeling across sequential video feeds.",
        iconName: "Video"
      },
      {
        title: "Audio & Speech Tagging",
        desc: "Speech-to-text transcription alignment, acoustic event tagging, speaker identification, and phonetic labeling.",
        iconName: "Mic"
      },
      {
        title: "Quality SLA Verification",
        desc: "Multi-tier consensus audits and algorithmic validation ensuring dataset accuracy consistently exceeds 99%.",
        iconName: "Award"
      }
    ],
    offerings: [
      {
        title: "2D & 3D Bounding Boxes",
        desc: "Precision rectangular and cuboid boundary labeling for object detection and spatial orientation models."
      },
      {
        title: "Polygon & Semantic Segmentation",
        desc: "Pixel-perfect multi-point polygon tracing for irregular objects, geographic terrain, and biomedical imaging."
      },
      {
        title: "Image Classification & Tagging",
        desc: "Single-label and multi-label categorization across large volumes of visual assets based on strict ontologies."
      },
      {
        title: "Text Annotation & NER",
        desc: "Token-level tagging of entities (people, organizations, locations, dates) and text sentiment classifications."
      },
      {
        title: "Video Object Tracking",
        desc: "Continuous trajectory tracking across high-framerate video clips with persistent object IDs and re-identification."
      },
      {
        title: "Custom Formats (COCO, YOLO, VOC)",
        desc: "Delivering annotated datasets directly in your model's required format (JSON, XML, YOLO txt, Pascal VOC, CSV)."
      }
    ],
    techStack: [
      { name: "CVAT / Label Studio", category: "Annotation Platform" },
      { name: "Python / OpenCV", category: "Pre-Processing" },
      { name: "COCO / YOLO Formats", category: "Standard Schemas" },
      { name: "Pascal VOC / JSON", category: "Data Export" },
      { name: "AWS S3 / Cloud Storage", category: "Secure Staging" },
      { name: "Consensus QA Algorithms", category: "Validation" }
    ],
    qualityProcess: [
      {
        step: "Phase 1: Guidelines",
        desc: "We formulate comprehensive annotation guidelines with visual examples, edge cases, and strict acceptance criteria."
      },
      {
        step: "Phase 2: Pilot Labeling",
        desc: "A sample dataset batch is labeled and calibrated with your engineering team to verify alignment on edge cases."
      },
      {
        step: "Phase 3: Production Labeling",
        desc: "Dedicated annotators tag the bulk dataset under continuous peer-review and real-time supervisor sampling."
      },
      {
        step: "Phase 4: Multi-Tier QA",
        desc: "Automated schema integrity checks combined with secondary human audit passes to guarantee >99% precision."
      }
    ],
    workflow: [
      {
        step: "01",
        title: "Data Collection & Ingestion",
        desc: "Secure transfer and staging of raw images, video streams, or text documents into encrypted enterprise storage.",
        deliverable: "Encrypted Data Ingestion & Sanitization Log"
      },
      {
        step: "02",
        title: "Guideline & Taxonomy Calibration",
        desc: "Creating detailed annotation instructions, class ontologies, and edge-case resolution rules.",
        deliverable: "Calibrated Annotation Playbook & Taxonomy"
      },
      {
        step: "03",
        title: "Precision Annotation Execution",
        desc: "Specialist annotators perform high-precision labeling following calibrated guidelines.",
        deliverable: "High-Throughput Ground-Truth Labeled Batches"
      },
      {
        step: "04",
        title: "Quality Review & Consensus",
        desc: "Multi-tier review passes, inter-annotator agreement calculations, and supervisor spot checks.",
        deliverable: "Consensus Audit & Inter-Annotator Agreement Index"
      },
      {
        step: "05",
        title: "Validation & Schema Formatting",
        desc: "Automated syntax and coordinate checks converting results into standard YOLO, COCO, or custom JSON formats.",
        deliverable: "Formatted Datasets in YOLO, COCO & Custom JSON"
      },
      {
        step: "06",
        title: "Secure Dataset Delivery",
        desc: "Encrypted dataset package delivery with comprehensive QA audit certificates and summary reporting.",
        deliverable: "Signed QA Precision Certificate & Secure Delivery"
      }
    ],
    businessApplications: [
      {
        title: "Autonomous Driving & Robotics",
        desc: "Annotating pedestrian paths, lane lines, traffic signs, and obstacle boundaries for autonomous navigation models.",
        industry: "Autonomous Vehicles & Robotics",
        impact: "Sub-Pixel Accurate Lane & Obstacle Detection"
      },
      {
        title: "eCommerce Visual Search & Cataloging",
        desc: "Tagging product apparel, accessories, colors, and visual styles to power recommendation engines and visual search.",
        industry: "eCommerce & Retail AI",
        impact: "Multi-Attribute Product Catalog Enrichment"
      },
      {
        title: "Healthcare & Medical Image Analysis",
        desc: "Precise anatomical region and anomaly polygon delineation across radiographic and microscopic scan sets.",
        industry: "Medical Technology & Radiology",
        impact: "High-Confidence Anomaly Segmentation Masks"
      },
      {
        title: "Document AI & Automated OCR",
        desc: "Bounding box and key-value transcription across hundreds of thousands of handwritten forms and receipts.",
        industry: "Document Intelligence & Legal",
        impact: "99.8% Field Extraction Precision on Complex Forms"
      }
    ]
  },
  {
    id: "bpo-services",
    slug: "bpo-services",
    title: "BPO Services",
    badge: "Business Process Outsourcing",
    tagline: "Scalable back-office operations, multichannel customer support, and business processing.",
    shortDesc: "Professional Business Process Outsourcing solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.",
    overview: "Our BPO Services practice delivers reliable, SLA-backed operational management for growing enterprises. By delegating data-intensive administrative tasks, back-office processing, and multichannel customer inquiries to our dedicated teams, organizations reduce operating overhead, eliminate staffing bottlenecks, and focus their internal resources on strategic growth.",
    iconName: "Headphones",
    heroGraphicType: "bpo",
    theme: {
      gradient: "from-blue-700 via-slate-800 to-indigo-900",
      accent: "text-blue-700",
      bgLight: "bg-slate-50/80",
      border: "border-slate-200",
      badgeColor: "bg-slate-100 text-slate-800 border-slate-300",
      btnClass: "bg-gradient-to-r from-blue-700 to-indigo-800 hover:from-blue-800 hover:to-indigo-900",
      cardBorder: "border-slate-200 hover:border-blue-400",
      glowBg: "bg-blue-600/10"
    },
    coreConcepts: [
      {
        title: "Business Process Management (BPM)",
        desc: "Systematic mapping, execution, and continuous optimization of recurring corporate operational workflows.",
        iconName: "Briefcase"
      },
      {
        title: "Operational Support & Scaling",
        desc: "Flexible, dedicated workforce capacity that scales up or down with seasonal peaks and business volume changes.",
        iconName: "Users"
      },
      {
        title: "Data Processing & Digitisation",
        desc: "Rapid conversion of unstructured physical or digital records into clean, validated enterprise databases.",
        iconName: "FileSpreadsheet"
      },
      {
        title: "Multichannel Customer Experience",
        desc: "Professional customer engagement across email, live chat, ticketing systems, and social touchpoints.",
        iconName: "Headphones"
      },
      {
        title: "SLA & Quality Governance",
        desc: "Contractual Service Level Agreements (SLAs) with strict accuracy benchmarks, turnaround timeframes, and audit reports.",
        iconName: "CheckCircle"
      },
      {
        title: "Information Security & NDAs",
        desc: "Strict data privacy protocols, role-based terminal access, and mutual non-disclosure agreements protecting corporate records.",
        iconName: "Shield"
      }
    ],
    offerings: [
      {
        title: "High-Volume Data Entry & Cleansing",
        desc: "Accurate digitization, database de-duplication, format standardisation, and validation of corporate records."
      },
      {
        title: "Back-Office Operational Support",
        desc: "Routine administrative operations, invoice verification, transaction logging, and reconciliation tasks."
      },
      {
        title: "Multichannel Customer Support",
        desc: "Dedicated tier-1 and tier-2 customer support covering email, live web chat, and Zendesk/Freshdesk ticketing."
      },
      {
        title: "eCommerce Catalog Management",
        desc: "Product listings, SKU attribute population, inventory level updates, and marketplace catalog maintenance."
      },
      {
        title: "Document Indexing & Archiving",
        desc: "Digital filing, metadata tagging, categorization, and secure archiving of corporate contracts and forms."
      },
      {
        title: "Quality Assurance & Compliance Auditing",
        desc: "Independent secondary audits of operational outputs to ensure full regulatory and corporate standard adherence."
      }
    ],
    techStack: [
      { name: "Zendesk & Freshdesk", category: "Ticketing Systems" },
      { name: "Intercom & LiveChat", category: "Customer Support" },
      { name: "Google Workspace & Office 365", category: "Data Tools" },
      { name: "Salesforce & HubSpot CRM", category: "CRM Ecosystem" },
      { name: "Custom ERP Gateways", category: "Integration" },
      { name: "Encrypted Secure Terminals", category: "Security" }
    ],
    workflow: [
      {
        step: "01",
        title: "Requirement Analysis & Scoping",
        desc: "Auditing current operational processes, volume volumes, turnaround requirements, and defining strict SLA benchmarks.",
        deliverable: "Operational Process Audit & Baseline SLA Benchmarks"
      },
      {
        step: "02",
        title: "Process Planning & SOP Formulation",
        desc: "Authoring comprehensive Standard Operating Procedures (SOPs), quality checklists, and escalation matrix protocols.",
        deliverable: "Standard Operating Procedures (SOPs) & Checklists"
      },
      {
        step: "03",
        title: "Team Training & Pilot Trial",
        desc: "Rigorous training of dedicated operators on client tooling, followed by a controlled pilot execution run.",
        deliverable: "Trained Dedicated Pod & Pilot Validation Report"
      },
      {
        step: "04",
        title: "Full-Scale Production Execution",
        desc: "Day-to-day operational execution under dedicated team leads with continuous process adherence.",
        deliverable: "Full Operational Transition & Live Ticket Routing"
      },
      {
        step: "05",
        title: "Quality Checking & Auditing",
        desc: "Randomized secondary auditing of processed batches to maintain >99% operational accuracy SLAs.",
        deliverable: "Randomized Daily QA Audits (>99% Accuracy)"
      },
      {
        step: "06",
        title: "Daily Reporting & KPI Delivery",
        desc: "Real-time productivity dashboards, daily throughput metrics, and monthly strategic review presentations.",
        deliverable: "Real-Time Productivity KPI Dashboard & Monthly Review"
      }
    ],
    businessApplications: [
      {
        title: "Customer Service Outsourcing for Tech & Retail",
        desc: "Handling high volumes of customer return inquiries, account questions, and basic technical troubleshooting.",
        industry: "Consumer Tech & High-Growth eCommerce",
        impact: "45-Second Average Response Time on Live Queues"
      },
      {
        title: "Real Estate & Legal Document Processing",
        desc: "Indexation, title search verification, and standardized digital archiving of property contracts and filings.",
        industry: "Real Estate & Title Insurance",
        impact: "Zero-Backlog Property Document Verification"
      },
      {
        title: "Finance & Accounts Payable Triage",
        desc: "Validating vendor invoices, matching receipt items, and staging accounting entries for controller approval.",
        industry: "Corporate Finance & Shared Services",
        impact: "100% On-Time Vendor Invoice Reconciliations"
      },
      {
        title: "Healthcare Patient Records Administration",
        desc: "HIPAA-aligned scheduling, intake form digitization, and administrative patient database upkeep.",
        industry: "Healthcare Provider Networks",
        impact: "HIPAA-Compliant Patient Intake & Scheduling"
      }
    ]
  }
];

export function getServiceBySlug(slug) {
  if (!slug) return null;
  const cleanSlug = slug.toLowerCase().trim();
  return servicesData.find(s => s.slug === cleanSlug || s.id === cleanSlug) || null;
}

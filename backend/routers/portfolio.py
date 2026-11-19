from fastapi import APIRouter

router = APIRouter(prefix="/api/portfolio", tags=["Portfolio"])

PORTFOLIO_PROJECTS = [
    {
        "id": "proj-1",
        "title": "Enterprise Omnichannel AI Support & WhatsApp Automation",
        "category": "AI Automation",
        "client": "Enterprise Banking & FinTech Domain",
        "industry": "FinTech / Financial Services",
        "metrics": "84% automated query resolution; 120,000+ monthly conversations handled",
        "description": "Architected an end-to-end RAG AI Assistant and WhatsApp automation integrated directly into banking core APIs for real-time account queries, automated card locks, and loan status lookups.",
        "technologies": ["OpenAI GPT-4o", "n8n Workflow Engine", "FastAPI", "WhatsApp Business Cloud API", "PostgreSQL", "Redis"],
        "highlight": "Sub-second response SLA with automated human agent handoff protocol."
    },
    {
        "id": "proj-2",
        "title": "Autonomous Computer Vision & Multi-Class Polygon Annotation Pipeline",
        "category": "Data Annotation",
        "client": "Autonomous Robotics & Aerial Systems",
        "industry": "Robotics & Defense",
        "metrics": "99.85% annotation accuracy across 650,000+ high-res spatial frames",
        "description": "Delivered high-precision polygonal segmentation, multi-class bounding boxes, and object tracking for thermal and optical aerial drone footage for security perimeter patrol.",
        "technologies": ["CVAT", "YOLOv8", "Roboflow", "Custom QA Scripts", "Python OpenCV"],
        "highlight": "Defense-grade data protection with isolated encrypted local annotation silos."
    },
    {
        "id": "proj-3",
        "title": "Cloud Web Application & Real-Time Logistics Control Center",
        "category": "IT Solutions",
        "client": "Commercial Fleet & Supply Chain Network",
        "industry": "Supply Chain & Logistics",
        "metrics": "40% dispatch velocity gain; 2,400 active fleet telematics synced per minute",
        "description": "Developed a modern React.js cloud portal and distributed microservices architecture for real-time truck GPS telemetry, automated route optimization, and digital billing.",
        "technologies": ["React 18", "FastAPI", "Kafka", "Docker", "Tailwind CSS", "TimescaleDB"],
        "highlight": "Zero-downtime cutover across 14 regional distribution hubs."
    },
    {
        "id": "proj-4",
        "title": "Intelligent Medical Claim & Invoice OCR Processing Pipeline",
        "category": "AI Automation",
        "client": "Healthcare Administration & Clinical Network",
        "industry": "Healthcare & Insurance",
        "metrics": "92% manual processing cost savings; 4.8 minutes average claim turnaround",
        "description": "Built an automated document ingestion pipeline extracting handwritten and scanned clinical invoices, verifying CPT codes, and updating claim status without human intervention.",
        "technologies": ["Azure Document Intelligence", "n8n Orchestration", "Python", "FastAPI", "PostgreSQL"],
        "highlight": "HIPAA-compliant data anonymization and automated audit logging."
    },
    {
        "id": "proj-5",
        "title": "Peer-Reviewed Academic & Scientific Research Publication Advisory",
        "category": "Research Publication",
        "client": "Academic Faculty, PhD Scholars & University Labs",
        "industry": "Higher Education & Scientific Research",
        "metrics": "100+ papers published; 100% Scopus & IEEE indexing compliance with < 10% Turnitin",
        "description": "Comprehensive academic research mentoring covering novel problem formulation, experimental data analysis, high-standard LaTeX typesetting, and peer-review rebuttal defense.",
        "technologies": ["LaTeX / Overleaf", "Python Scientific Stack", "MATLAB", "Turnitin", "Scopus & IEEE Guidelines"],
        "highlight": "Complete end-to-end support until official journal indexing and DOI assignment."
    },
    {
        "id": "proj-6",
        "title": "Enterprise Executive Business Intelligence & Analytics Platform",
        "category": "IT Solutions",
        "client": "Multi-Channel Retail & E-Commerce Network",
        "industry": "Retail & E-Commerce",
        "metrics": "₹26 Crore inventory optimization through predictive sales velocity modeling",
        "description": "Architected a unified enterprise data warehouse and interactive Power BI executive cockpit consolidating data from 180+ store POS systems and online Shopify platforms.",
        "technologies": ["Power BI", "DAX Modeling", "Snowflake", "Python ETL", "Azure Data Factory"],
        "highlight": "Interactive multi-dimensional forecasting with dynamic threshold alerts."
    }
]

@router.get("")
def get_portfolio():
    return PORTFOLIO_PROJECTS


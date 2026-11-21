// Central Data Model for the 5 Services of NextTechX Solutions
export const servicesData = [
  {
    id: "ai-automation",
    slug: "ai-automation",
    title: "AI & Automation",
    shortDesc: "Intelligent autonomous agents, conversational AI chatbots, and streamlined workflow automation designed to eliminate manual bottlenecks and accelerate operational velocity.",
    intro: "Empower your business with intelligent autonomous agents, conversational AI, and streamlined workflow automation designed to eliminate manual bottlenecks and accelerate operational velocity.",
    iconName: "Bot",
    offerings: [
      "Custom RAG AI chatbots with enterprise context",
      "Official WhatsApp Business Cloud API automated flows",
      "Autonomous multi-step event and workflow pipelines (n8n)",
      "Intelligent OCR document extraction (Invoices, Receipts, KYC)",
      "Custom AI agent integration with existing enterprise tools"
    ],
    helpText: "We help organizations reduce operational costs and accelerate turnaround times by automating repetitive manual tasks. Our intelligent agents work 24/7 to handle customer inquiries, route internal workflows, and extract critical business data with high speed and accuracy."
  },
  {
    id: "software-development",
    slug: "software-development",
    title: "Software Development",
    shortDesc: "End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.",
    intro: "End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.",
    iconName: "Code2",
    offerings: [
      "Custom enterprise web applications in modern frameworks",
      "High-throughput RESTful and GraphQL backend microservices",
      "Cross-platform mobile applications for iOS and Android",
      "Robust database architecture, performance optimization, and API gateways",
      "Automated CI/CD pipelines, Docker containerization, and cloud deployment"
    ],
    helpText: "We transform unique operational workflows and product visions into secure, maintainable software systems. From early-stage MVPs to high-traffic enterprise architectures, we build technology foundations that scale reliably as your business expands."
  },
  {
    id: "saas-development",
    slug: "saas-development",
    title: "SaaS Development",
    shortDesc: "Complete Software-as-a-Service (SaaS) product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.",
    intro: "Complete Software-as-a-Service (SaaS) product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.",
    iconName: "Layers",
    offerings: [
      "Multi-tenant cloud architecture with isolated or pooled data models",
      "Subscription billing, recurring payment gateways, and automated invoicing",
      "Role-based access control (RBAC) and enterprise admin dashboards",
      "High-availability cloud infrastructure engineered for 99.9% uptime",
      "Seamless user onboarding flows, analytics telemetry, and API integrations"
    ],
    helpText: "We help founders and established enterprises bring subscription-based software products to market rapidly. Our modular SaaS architectures enable seamless customer scaling, predictable recurring revenue, and frictionless user experiences."
  },
  {
    id: "data-annotation",
    slug: "data-annotation",
    title: "Data Annotation",
    shortDesc: "High-precision data labeling and annotation solutions that provide clean, structured ground-truth datasets for AI and Machine Learning models.",
    intro: "High-precision data labeling and annotation solutions that provide clean, structured ground-truth datasets for AI and Machine Learning models.",
    iconName: "CheckSquare",
    offerings: [
      "Image annotation with polygons, keypoints, and line segmentation",
      "Text annotation, sentiment classification, and entity extraction (NER)",
      "Video annotation with continuous multi-frame object tracking",
      "Object detection with 2D and 3D bounding box labeling",
      "Standard multi-format exports (JSON, XML, YOLO, COCO) with multi-tier QA"
    ],
    helpText: "Machine learning models depend directly on the quality of their training data. We provide accurate, human-in-the-loop data labeling that accelerates AI model training, improves prediction accuracy, and shortens development cycles."
  },
  {
    id: "bpo-services",
    slug: "bpo-services",
    title: "BPO Services",
    shortDesc: "Professional Business Process Outsourcing (BPO) solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.",
    intro: "Professional Business Process Outsourcing (BPO) solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.",
    iconName: "Headphones",
    offerings: [
      "Multichannel customer support (Email, Live Chat, and Ticket Management)",
      "Data entry, verification, and digital records management",
      "Order processing, fulfillment tracking, and catalog management",
      "Technical helpdesk support and user query resolution",
      "Quality assurance auditing and operational reporting"
    ],
    helpText: "By delegating time-consuming routine operations to our dedicated team, companies can focus on strategic core growth. We deliver reliable, SLA-backed business process management that improves customer satisfaction while lowering operational overhead."
  }
];

export function getServiceBySlug(slug) {
  if (!slug) return null;
  const cleanSlug = slug.toLowerCase().trim();
  return servicesData.find(s => s.slug === cleanSlug || s.id === cleanSlug) || null;
}

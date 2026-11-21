import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Cloud,
  Smartphone,
  BarChart3,
  CheckSquare,
  BookOpen, 
  GraduationCap, 
  Sparkles, 
  ArrowRight, 
  Check, 
  PhoneCall, 
  ShieldCheck,
  Layers,
  Cpu,
  Zap,
  CheckCircle2,
  Lock,
  Users,
  FileCheck,
  ExternalLink,
  Building2,
  Database,
  Scan
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function Services({ onOpenQuote, onOpenConsultation }) {
  const [activeCategory, setActiveCategory] = useState('all');

  const categories = [
    { id: 'all', label: 'All Services', count: 8 },
    { id: 'ai-data', label: 'AI & Data Solutions', count: 3 },
    { id: 'software-cloud', label: 'Software & Cloud', count: 3 },
    { id: 'academic-careers', label: 'Academic & Careers', count: 2 },
  ];

  const serviceCards = [
    {
      id: "ai-automation",
      category: "ai-data",
      tag: "AI & Autonomous Systems",
      title: "Intelligent AI Agents, RAG Chatbots & n8n Workflow Automation",
      desc: "Deploy intelligent customer-facing conversational agents with enterprise vector search, official WhatsApp Cloud API triggers, autonomous multi-step pipelines, and smart OCR document processors.",
      icon: Bot,
      link: "/ai-automation",
      exploreText: "Explore AI Practice",
      quoteText: "Get AI Quote",
      features: [
        "Custom RAG AI Chatbots with Enterprise Vector Memory",
        "Official WhatsApp Business Cloud API Automated Flows",
        "n8n Multi-Platform Automated Event Pipelines",
        "Intelligent OCR Document Extraction (Invoices, KYC, ID)"
      ],
      deliverable: "Fixed Milestone SOW • Production Deployment"
    },
    {
      id: "web-software",
      category: "software-cloud",
      tag: "Custom Web & SaaS Engineering",
      title: "Scalable SaaS Platforms, Web Applications & Microservices",
      desc: "Engineer ultra-responsive web applications in React 18, Next.js, and TypeScript, backed by high-throughput RESTful & GraphQL microservices in Python (FastAPI) and Node.js.",
      icon: Code2,
      link: "/it-services",
      exploreText: "Explore Web Engineering",
      quoteText: "Get Software Quote",
      features: [
        "Full-Stack SaaS Platforms & Multi-Tenant Architectures",
        "High-Concurrency RESTful & GraphQL API Gateways",
        "Enterprise Admin Portals with Role-Based Access (RBAC)",
        "Sub-Second Core Web Vitals & WCAG 2.1 Accessibility"
      ],
      deliverable: "Clean Architecture • 100% Code Ownership"
    },
    {
      id: "cloud-devops",
      category: "software-cloud",
      tag: "Cloud Architecture & DevOps",
      title: "Zero-Downtime AWS/GCP Cloud Architecture & Docker CI/CD",
      desc: "Automated Terraform infrastructure-as-code, Docker containerization, Kubernetes cluster orchestration, and resilient multi-region cloud configurations engineered for 99.99% uptime.",
      icon: Cloud,
      link: "/it-services",
      exploreText: "Explore Cloud DevOps",
      quoteText: "Request Cloud Proposal",
      features: [
        "Kubernetes (EKS / GKE) Container Microservice Orchestration",
        "Automated GitHub Actions / GitLab CI/CD Delivery Pipelines",
        "Cloud Cost Auditing & Infrastructure Optimization (25-45% Savings)",
        "Disaster Recovery, Automated Backups & 24/7 Monitoring"
      ],
      deliverable: "99.99% Uptime Architecture • Infrastructure as Code"
    },
    {
      id: "mobile-apps",
      category: "software-cloud",
      tag: "Mobile Engineering",
      title: "Native-Performance iOS & Android Enterprise Applications",
      desc: "Modern mobile applications built with React Native and Flutter, featuring seamless offline-first local synchronization, biometric authentication, and enterprise device integrations.",
      icon: Smartphone,
      link: "/it-services",
      exploreText: "Explore Mobile Apps",
      quoteText: "Request Mobile Quote",
      features: [
        "Single Unified Cross-Platform Codebase for iOS & Android",
        "Offline-First Sync with SQLite & WatermelonDB",
        "Biometric Auth, Hardware Device Integration & Push Triggers",
        "App Store & Google Play Production Deployment & Maintenance"
      ],
      deliverable: "Cross-Platform Store Release • Offline-First Sync"
    },
    {
      id: "data-bi",
      category: "ai-data",
      tag: "Data & Business Intelligence",
      title: "Modern Data Warehousing, ETL Pipelines & Power BI Telemetry",
      desc: "Transform raw transactional records into high-performance analytical warehouses. Build automated ETL pipelines and interactive Power BI dashboards that give leadership crystal-clear clarity.",
      icon: BarChart3,
      link: "/it-services",
      exploreText: "Explore Data Analytics",
      quoteText: "Request Data Proposal",
      features: [
        "High-Volume ETL/ELT Pipelines with Python & Apache Spark",
        "Snowflake, BigQuery & PostgreSQL TimescaleDB Modeling",
        "Interactive Power BI Executive Dashboards with Row-Level Security",
        "Automated KPI Alerts, Anomaly Detection & Financial Reporting"
      ],
      deliverable: "Single Source of Truth • Real-Time Dashboards"
    },
    {
      id: "data-annotation",
      category: "ai-data",
      tag: "AI & Machine Learning Data",
      title: "Professional Data Annotation & Labeling Solutions",
      desc: "Professional data annotation and labeling solutions for AI and Machine Learning projects. High-precision human-in-the-loop annotation pipelines ensuring enterprise-grade ground-truth datasets for production models.",
      icon: CheckSquare,
      link: "/contact",
      exploreText: "Inquire Data Solutions",
      quoteText: "Get Annotation Quote",
      features: [
        "Image Annotation (Polygons, Keypoints & Polylines)",
        "Text Annotation & Named Entity Recognition (NER)",
        "Video Annotation & Multi-Frame Object Tracking",
        "Structured Data Labeling & Metadata Tagging",
        "Multi-Class & Multi-Label Image Classification",
        "Object Detection and Precise Bounding Boxes"
      ],
      deliverable: "Multi-Format (JSON, YOLO, COCO) • 99%+ Quality SLA"
    },
    {
      id: "research-publication",
      category: "academic-careers",
      tag: "Academic & Doctoral Advisory",
      title: "Research Paper Structuring, Writing & Global Indexed Publication",
      desc: "End-to-end guidance for university faculty, PhD scholars, and students to structure novel academic manuscripts and navigate peer-reviewed indexed submissions in Scopus, IEEE Xplore, and Springer Nature.",
      icon: BookOpen,
      link: "/research-publication",
      exploreText: "Explore Research Advisory",
      quoteText: "Inquire Advisory",
      features: [
        "Scopus (Q1/Q2), IEEE Xplore & Springer Guidance",
        "Mathematical Modeling & Algorithmic Design",
        "Turnitin Similarity Verification (< 10% Strict Threshold)",
        "Camera-Ready Formatting & Comprehensive Rebuttal Support"
      ],
      deliverable: "Peer-Reviewed Target • Full Confidentiality"
    },
    {
      id: "careers",
      category: "academic-careers",
      tag: "Careers & Internships",
      title: "Job Vacancies & Hands-On Production Internship Programs",
      desc: "Explore full-time engineering vacancies and structured interview-based production internships. Work on live enterprise client systems and build verified production experience under engineering mentorship.",
      icon: GraduationCap,
      link: "/careers",
      exploreText: "Explore Opportunities",
      quoteText: "Apply Now",
      features: [
        "Current Job Vacancies (0-2 Yrs Early Career Tracks)",
        "6 Specialized Technical Internship Tracks",
        "Live Production Project Experience",
        "Verified Experience Letters & HR Credentials"
      ],
      deliverable: "Online-First Delivery • Verified Credentials"
    }
  ];

  const filteredCards = activeCategory === 'all' 
    ? serviceCards 
    : serviceCards.filter(c => c.category === activeCategory);

  const whyChooseUsPillars = [
    {
      icon: FileCheck,
      title: "Milestone-Based Delivery",
      desc: "Every project operates with clearly defined deliverables, verifiable technical acceptance criteria, and phased approval gates. Zero hidden fees or scope ambiguity."
    },
    {
      icon: Cpu,
      title: "Production-Grade Engineering",
      desc: "We adhere strictly to modern architectural standards, modular microservice patterns, strict type-safety, automated testing, and comprehensive documentation."
    },
    {
      icon: Users,
      title: "Architect-Led Collaboration",
      desc: "Work directly with seasoned software engineers and technical leads throughout the lifecycle. Enjoy transparent weekly sprint reviews and proactive async updates."
    },
    {
      icon: Lock,
      title: "Complete IP & Data Protection",
      desc: "Clients retain 100% intellectual property ownership upon milestone completion, backed by enforceable bilateral non-disclosure agreements (NDA) and secure protocols."
    }
  ];

  return (
    <div className="bg-white text-slate-800 font-sans selection:bg-blue-600/10 selection:text-blue-700">
      
      {/* 1. Hero Section: Clean White Background, Navy Typography, Corporate Architecture Blueprint */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-20 bg-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle grid background */}
        <div className="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none" />
        <div className="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none" />
        
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            {/* Left Column: Heading, Value Proposition & Actions */}
            <div className="lg:col-span-7 space-y-6 text-left">
              <motion.div
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold tracking-wide uppercase font-mono"
              >
                <Layers className="w-3.5 h-3.5 text-blue-600" />
                <span>Enterprise Technical Practices</span>
              </motion.div>

              <motion.h1
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, delay: 0.1 }}
                className="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-[1.15] font-heading"
              >
                Full-Lifecycle Digital Engineering & <br />
                <span className="text-blue-600">Advanced Technology Services.</span>
              </motion.h1>

              <motion.p
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, delay: 0.2 }}
                className="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed"
              >
                From custom software engineering and enterprise cloud architecture to autonomous AI agents, machine learning data annotation, and indexed academic publications. Delivered with structured milestone clarity and institutional accountability.
              </motion.p>

              {/* Key Assurance Indicators */}
              <motion.div
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, delay: 0.25 }}
                className="flex flex-wrap items-center gap-y-2 gap-x-6 text-xs sm:text-sm text-slate-700 pt-1"
              >
                <div className="flex items-center gap-2">
                  <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0" />
                  <span className="font-medium">Milestone-Based SOWs</span>
                </div>
                <div className="flex items-center gap-2">
                  <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0" />
                  <span className="font-medium">Full Code & IP Ownership</span>
                </div>
                <div className="flex items-center gap-2">
                  <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0" />
                  <span className="font-medium">Direct Architect Access</span>
                </div>
              </motion.div>

              {/* Action Buttons */}
              <motion.div
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, delay: 0.3 }}
                className="pt-2 flex flex-wrap items-center gap-3.5"
              >
                <button
                  onClick={onOpenQuote}
                  className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm hover:shadow transition-all flex items-center gap-2 active:scale-95 font-heading"
                >
                  <span>Request a Quotation</span>
                  <ArrowRight className="w-4 h-4" />
                </button>
                <button
                  onClick={onOpenConsultation}
                  className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all flex items-center gap-2 font-heading"
                >
                  <PhoneCall className="w-4 h-4 text-blue-600" />
                  <span>Schedule Architecture Call</span>
                </button>
              </motion.div>
            </div>

            {/* Right Column: Technology Visual (Architecture Blueprint) */}
            <div className="lg:col-span-5">
              <motion.div
                initial={{ opacity: 0, scale: 0.96 }}
                animate={{ opacity: 1, scale: 1 }}
                transition={{ duration: 0.5, delay: 0.2 }}
                className="bg-slate-50/90 rounded-2xl p-6 sm:p-7 border border-slate-200/90 shadow-sm relative"
              >
                {/* Visual Header */}
                <div className="flex items-center justify-between pb-4 border-b border-slate-200/80 mb-4">
                  <div className="flex items-center gap-2">
                    <div className="w-2.5 h-2.5 rounded-full bg-red-400" />
                    <div className="w-2.5 h-2.5 rounded-full bg-amber-400" />
                    <div className="w-2.5 h-2.5 rounded-full bg-emerald-400" />
                    <span className="ml-2 text-xs font-mono font-bold text-slate-700 uppercase tracking-wider">
                      Engineering Capability Matrix
                    </span>
                  </div>
                  <div className="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-mono font-medium">
                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
                    <span>8 Practices Active</span>
                  </div>
                </div>

                {/* Capability Matrix Rows */}
                <div className="space-y-2.5">
                  
                  {/* Item 1 */}
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                    <div className="flex items-center gap-3">
                      <div className="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <Bot className="w-3.5 h-3.5" />
                      </div>
                      <div className="text-left">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">AI & Workflow Automation</h4>
                        <p className="text-[11px] text-slate-500">Autonomous Agents • WhatsApp API • n8n</p>
                      </div>
                    </div>
                    <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Enterprise</span>
                  </div>

                  {/* Item 2 */}
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                    <div className="flex items-center gap-3">
                      <div className="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <CheckSquare className="w-3.5 h-3.5" />
                      </div>
                      <div className="text-left">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Data Annotation Services</h4>
                        <p className="text-[11px] text-slate-500">Image, Text, Video & Bounding Boxes</p>
                      </div>
                    </div>
                    <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">99%+ SLA</span>
                  </div>

                  {/* Item 3 */}
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                    <div className="flex items-center gap-3">
                      <div className="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <Code2 className="w-3.5 h-3.5" />
                      </div>
                      <div className="text-left">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Web, Cloud & Mobile</h4>
                        <p className="text-[11px] text-slate-500">React, Python, AWS Docker & Microservices</p>
                      </div>
                    </div>
                    <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Full-Stack</span>
                  </div>

                  {/* Item 4 */}
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                    <div className="flex items-center gap-3">
                      <div className="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <BookOpen className="w-3.5 h-3.5" />
                      </div>
                      <div className="text-left">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Research & Internships</h4>
                        <p className="text-[11px] text-slate-500">Scopus/IEEE Publications & Engineering Talent</p>
                      </div>
                    </div>
                    <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Verified</span>
                  </div>

                </div>

                {/* Blueprint Footer */}
                <div className="mt-4 pt-3.5 border-t border-slate-200/80 flex items-center justify-between text-[11px] text-slate-500 font-mono">
                  <span>Delivery: Online-First Global</span>
                  <span className="text-blue-600 font-medium">Bilateral NDA Protected</span>
                </div>
              </motion.div>
            </div>

          </div>
        </div>
      </section>

      {/* 2. Services Grid Section: Category Filters + 2-Column Equal-Height Cards */}
      <section className="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
          
          {/* Section Header */}
          <div className="text-center max-w-3xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <span>Complete Service Catalog</span>
            </div>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Our Core Technical Practices
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Every practice is delivered with structured milestone scopes, verifiable technical deliverables, and dedicated senior engineering oversight.
            </p>

            {/* Interactive Category Filter Pills */}
            <div className="pt-4 flex flex-wrap items-center justify-center gap-2">
              {categories.map((cat) => (
                <button
                  key={cat.id}
                  onClick={() => setActiveCategory(cat.id)}
                  className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all font-heading ${
                    activeCategory === cat.id
                      ? 'bg-blue-600 text-white shadow-xs'
                      : 'bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50'
                  }`}
                >
                  {cat.label} ({cat.count})
                </button>
              ))}
            </div>
          </div>

          {/* Equal-Height Grid: 2 Columns on Desktop for Maximum Readability & Polish */}
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            {filteredCards.map((srv) => {
              const Icon = srv.icon;
              const isCareer = srv.id === 'careers';

              return (
                <div
                  key={srv.id}
                  className="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left"
                >
                  {/* Top Part: Icon, Tag, Title, Description, Offerings */}
                  <div className="space-y-4">
                    <div className="flex items-center justify-between gap-4">
                      <div className="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                        <Icon className="w-6 h-6 stroke-[1.8]" />
                      </div>
                      <span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                        {srv.tag}
                      </span>
                    </div>

                    <h3 className="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                      {srv.title}
                    </h3>

                    <p className="text-slate-600 text-sm leading-relaxed">
                      {srv.desc}
                    </p>

                    {/* Key Offerings List */}
                    <div className="pt-2 border-t border-slate-100">
                      <h4 className="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                        Key Capabilities & Deliverables:
                      </h4>
                      <ul className="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        {srv.features.map((feat, i) => (
                          <li key={i} className="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                            <div className="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                              <Check className="w-3 h-3 stroke-[2.5]" />
                            </div>
                            <span className="leading-tight">{feat}</span>
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>

                  {/* Bottom Part: Milestone Deliverable Pill & Equal-Height Buttons */}
                  <div className="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div className="flex items-center justify-between text-xs font-mono text-slate-500">
                      <span className="text-slate-400">Framework:</span>
                      <span className="font-medium text-slate-700">{srv.deliverable}</span>
                    </div>

                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                      <Link
                        to={srv.link}
                        className="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2"
                      >
                        <span>{srv.exploreText}</span>
                        <ArrowRight className="w-4 h-4" />
                      </Link>

                      {isCareer ? (
                        <Link
                          to="/careers"
                          className="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading flex items-center justify-center gap-2"
                        >
                          <span>{srv.quoteText}</span>
                          <ExternalLink className="w-3.5 h-3.5" />
                        </Link>
                      ) : (
                        <button
                          onClick={onOpenQuote}
                          className="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading"
                        >
                          {srv.quoteText}
                        </button>
                      )}
                    </div>
                  </div>

                </div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 3. Why Choose Us: Corporate Approach & Engineering Standards */}
      <section className="py-16 lg:py-24 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-3xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <ShieldCheck className="w-3.5 h-3.5 text-blue-600" />
              <span>Institutional Standards</span>
            </div>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Why Organizations Partner With NextTechX
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              We operate with corporate-grade discipline. Our technical engagements prioritize structural accountability, verifiable progress, and lasting value.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {whyChooseUsPillars.map((pillar, idx) => {
              const PillarIcon = pillar.icon;
              return (
                <div
                  key={idx}
                  className="bg-slate-50/60 rounded-2xl p-6 border border-slate-200/80 text-left space-y-3 hover:border-blue-200 transition-colors"
                >
                  <div className="w-10 h-10 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center shrink-0">
                    <PillarIcon className="w-5 h-5" />
                  </div>
                  <h3 className="text-base font-bold text-slate-900 font-heading">
                    {pillar.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {pillar.desc}
                  </p>
                </div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 4. Contact CTA: Professional Closing Banner with Clear Contact Options */}
      <section className="py-16 lg:py-20 bg-white">
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="rounded-3xl border border-slate-200 bg-slate-50/70 p-8 sm:p-12 lg:p-14 space-y-6 shadow-2xs">
            
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold font-mono">
              <span>Initiate Your Engagement</span>
            </div>

            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
              Ready to Discuss Your Project Requirements?
            </h2>

            <p className="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto leading-relaxed">
              Connect directly with our solutions engineering team. We assess technical specifications, provide architectural recommendations, and furnish fixed-scope milestone quotations within 24 to 48 hours.
            </p>

            <div className="pt-2 flex flex-wrap items-center justify-center gap-3.5">
              <button
                onClick={onOpenQuote}
                className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all font-heading flex items-center gap-2"
              >
                <span>Request Custom Quotation</span>
                <ArrowRight className="w-4 h-4" />
              </button>
              <button
                onClick={onOpenConsultation}
                className="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2"
              >
                <PhoneCall className="w-4 h-4 text-blue-600" />
                <span>Schedule Strategy Call</span>
              </button>
              <Link
                to="/contact"
                className="px-6 py-3.5 rounded-xl border border-slate-200 hover:bg-white text-slate-700 font-semibold text-sm transition-colors font-heading"
              >
                Contact Us Directly
              </Link>
            </div>

            <div className="pt-4 border-t border-slate-200/70 text-xs text-slate-500 font-mono flex flex-wrap items-center justify-center gap-4 sm:gap-6">
              <span>Inquiries: <a href={`mailto:${siteConfig.emailContact}`} className="text-blue-600 hover:underline">{siteConfig.emailContact}</a></span>
              <span>•</span>
              <span>Recruitment: <a href={`mailto:${siteConfig.emailHr}`} className="text-blue-600 hover:underline">{siteConfig.emailHr}</a></span>
              <span>•</span>
              <span>{siteConfig.deliveryModel}</span>
            </div>

          </div>
        </div>
      </section>

    </div>
  );
}

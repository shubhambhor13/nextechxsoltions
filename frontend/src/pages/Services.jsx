import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  BookOpen, 
  Smartphone,
  Cloud,
  BarChart3,
  Sparkles, 
  ArrowRight, 
  Check, 
  PhoneCall, 
  ShieldCheck,
  Layers,
  Cpu,
  Zap,
  Lock,
  FileText,
  Clock,
  Briefcase,
  GraduationCap
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function Services({ onOpenQuote, onOpenConsultation }) {
  const serviceCards = [
    {
      id: "ai-automation",
      tag: "AI & Autonomous Systems",
      tagColor: "bg-cyan-50 text-cyan-700 border-cyan-200",
      title: "Intelligent AI Agents, RAG Chatbots & n8n Workflow Automation",
      desc: "Deploy intelligent customer-facing conversational agents with enterprise vector search, official WhatsApp Cloud API triggers, autonomous multi-step pipelines, and smart OCR document processors.",
      icon: Bot,
      iconBg: "bg-cyan-50 text-cyan-600 border border-cyan-200",
      link: "/ai-automation",
      quoteBtnText: "Get AI Automation Quote",
      features: [
        "Custom RAG AI Chatbots with Enterprise Vector Memory",
        "Official WhatsApp Business Cloud API Automated Flows",
        "n8n Multi-Platform Automated Event Pipelines",
        "Intelligent OCR Document Extraction (Invoices, KYC, ID)"
      ]
    },
    {
      id: "web-software",
      tag: "Custom Web & SaaS Engineering",
      tagColor: "bg-blue-50 text-blue-700 border-blue-200",
      title: "Scalable SaaS Platforms, Web Applications & Microservices",
      desc: "Engineer ultra-responsive web applications in React 18, Next.js, and TypeScript, backed by high-throughput RESTful & GraphQL microservices in Python (FastAPI) and Node.js.",
      icon: Code2,
      iconBg: "bg-blue-50 text-blue-600 border border-blue-200",
      link: "/it-services",
      quoteBtnText: "Get Software Quote",
      features: [
        "Full-Stack SaaS Platforms & Multi-Tenant Architectures",
        "High-Concurrency RESTful & GraphQL API Gateways",
        "Enterprise Admin Portals with Role-Based Access (RBAC)",
        "Sub-Second Core Web Vitals & WCAG 2.1 Accessibility"
      ]
    },
    {
      id: "cloud-devops",
      tag: "Cloud Architecture & DevOps",
      tagColor: "bg-indigo-50 text-indigo-700 border-indigo-200",
      title: "Zero-Downtime AWS/GCP Cloud Architecture & Docker CI/CD",
      desc: "Automated Terraform infrastructure-as-code, Docker containerization, Kubernetes cluster orchestration, and resilient multi-region cloud configurations engineered for 99.99% uptime.",
      icon: Cloud,
      iconBg: "bg-indigo-50 text-indigo-600 border border-indigo-200",
      link: "/it-services",
      quoteBtnText: "Request Cloud Proposal",
      features: [
        "Kubernetes (EKS / GKE) Container Microservice Orchestration",
        "Automated GitHub Actions / GitLab CI/CD Delivery Pipelines",
        "Cloud Cost Auditing & Infrastructure Optimization (25-45% Savings)",
        "Disaster Recovery, Automated Backups & 24/7 Datadog Telemetry"
      ]
    },
    {
      id: "mobile-apps",
      tag: "Mobile Engineering",
      tagColor: "bg-sky-50 text-sky-700 border-sky-200",
      title: "Native-Performance iOS & Android Enterprise Applications",
      desc: "Modern mobile applications built with React Native and Flutter, featuring seamless offline-first local synchronization, biometric authentication, and enterprise device integrations.",
      icon: Smartphone,
      iconBg: "bg-sky-50 text-sky-600 border border-sky-200",
      link: "/it-services",
      quoteBtnText: "Request Mobile Proposal",
      features: [
        "Single Unified Cross-Platform Codebase for iOS & Android",
        "Offline-First Sync with SQLite & WatermelonDB",
        "Biometric Auth, Hardware Device Integration & Push Triggers",
        "App Store & Google Play Production Deployment & Maintenance"
      ]
    },
    {
      id: "data-bi",
      tag: "Data & Business Intelligence",
      tagColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      title: "Modern Data Warehousing, ETL Pipelines & Power BI Telemetry",
      desc: "Transform raw transactional records into high-performance analytical warehouses. Build automated ETL pipelines and interactive Power BI dashboards that give leadership crystal-clear clarity.",
      icon: BarChart3,
      iconBg: "bg-emerald-50 text-emerald-600 border border-emerald-200",
      link: "/it-services",
      quoteBtnText: "Request Data Proposal",
      features: [
        "High-Volume ETL/ELT Pipelines with Python & Apache Spark",
        "Snowflake, BigQuery & PostgreSQL TimescaleDB Modeling",
        "Interactive Power BI Executive Dashboards with Row-Level Security",
        "Automated KPI Alerts, Anomaly Detection & Financial Reports"
      ]
    },
    {
      id: "research-publication",
      tag: "Academic & Doctoral Advisory",
      tagColor: "bg-amber-50 text-amber-700 border-amber-200",
      title: "Scopus, IEEE & Springer Indexed Research Manuscript Advisory",
      desc: "End-to-end guidance for university faculty, PhD candidates, and research scholars to structure novel academic manuscripts and navigate indexed peer-reviewed journal submissions.",
      icon: BookOpen,
      iconBg: "bg-amber-50 text-amber-600 border border-amber-200",
      link: "/research-publication",
      quoteBtnText: "Inquire Publication Support",
      features: [
        "Scopus (Q1/Q2), IEEE Xplore & Springer Nature Indexing Guidance",
        "Algorithmic Formulation, Mathematical Modeling & Experiments",
        "Turnitin Similarity Verification & Plagiarism Reduction (< 10%)",
        "Peer-Review Rebuttal Handling & Camera-Ready Formatting"
      ]
    }
  ];

  const deliverySteps = [
    {
      step: "01",
      title: "Technical Discovery & SOW",
      desc: "We analyze your system requirements, data workflows, and business KPIs to deliver an exhaustive architectural blueprint with milestone deliverables and a fixed-price SOW."
    },
    {
      step: "02",
      title: "Architecture & Rapid Prototype",
      desc: "Our architects map database schemas, API contracts, security protocols, and interactive Figma UI prototypes for stakeholder validation before coding begins."
    },
    {
      step: "03",
      title: "Agile Sprints & Rigorous QA",
      desc: "Development proceeds in transparent bi-weekly sprints with automated CI/CD unit testing, end-to-end integration checks, and live staging previews."
    },
    {
      step: "04",
      title: "Zero-Downtime Deploy & SLAs",
      desc: "We handle production rollouts with automated database migrations, comprehensive IP & source handover, real-time APM telemetry, and dedicated SLA support."
    }
  ];

  const enterprisePillars = [
    {
      icon: Lock,
      title: "100% IP & Code Ownership",
      desc: "Complete transfer of all repository commits, cloud configurations, schemas, and intellectual property directly to your organization upon project completion."
    },
    {
      icon: FileText,
      title: "Transparent Milestone SOWs",
      desc: "Fixed-scope deliverables and milestone billing in Indian Rupees (₹) or USD ($). Zero hidden fees or unexpected infrastructure charges."
    },
    {
      icon: ShieldCheck,
      title: "Strict Mutual Confidentiality",
      desc: "Enforceable non-disclosure agreements (NDAs) signed prior to discovery calls to safeguard proprietary IP, business secrets, and database schemas."
    },
    {
      icon: Clock,
      title: "Guaranteed Production SLAs",
      desc: "Production deployments backed by 99.9% uptime targets, continuous automated health checks, and rapid incident response pods."
    }
  ];

  return (
    <div className="bg-white text-slate-800 font-sans">
      
      {/* 1. HERO SECTION (Crisp Corporate Light Styling) */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle Ambient Corporate Accents */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-25 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          
          <motion.div
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <Layers className="w-4 h-4 text-blue-600" />
            <span>Enterprise IT Engineering • Artificial Intelligence • Cloud DevOps</span>
          </motion.div>

          <motion.h1
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Enterprise IT Engineering & <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              High-Impact Digital Solutions
            </span>
          </motion.h1>

          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            We architect production-grade software applications, autonomous AI pipelines, resilient multi-cloud infrastructures, and global research publication frameworks. Delivered with milestone precision, transparent scopes, and dedicated technical pods.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Request a Quotation</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-blue-600" />
              <span>Book Strategy Call</span>
            </button>
          </div>

          {/* Trust Value Badges Strip */}
          <div className="pt-8 max-w-4xl mx-auto grid grid-cols-2 sm:grid-cols-4 gap-3">
            <div className="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
              <span className="block text-xs font-mono uppercase tracking-wider text-slate-400">Production SLA</span>
              <span className="text-sm font-bold text-slate-900 font-heading">99.9% Uptime</span>
            </div>
            <div className="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
              <span className="block text-xs font-mono uppercase tracking-wider text-slate-400">Contracts</span>
              <span className="text-sm font-bold text-slate-900 font-heading">Milestone SOWs</span>
            </div>
            <div className="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
              <span className="block text-xs font-mono uppercase tracking-wider text-slate-400">IP Transfer</span>
              <span className="text-sm font-bold text-slate-900 font-heading">100% Client Owned</span>
            </div>
            <div className="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
              <span className="block text-xs font-mono uppercase tracking-wider text-slate-400">Confidentiality</span>
              <span className="text-sm font-bold text-slate-900 font-heading">Mutual NDA First</span>
            </div>
          </div>

        </div>
      </section>

      {/* 2. CORE ENTERPRISE PRACTICES GRID */}
      <section className="py-20 lg:py-28 bg-slate-50 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Our Core Practices
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
              Specialized Engineering Capabilities
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              Architected for enterprise security, sub-second latency, and seamless multi-region scalability.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {serviceCards.map((srv, index) => {
              const Icon = srv.icon;
              return (
                <motion.div
                  key={srv.id}
                  initial={{ opacity: 0, y: 25 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.5, delay: index * 0.08 }}
                  className="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between"
                >
                  <div className="space-y-4">
                    <div className="flex items-center justify-between gap-4">
                      <div className={`inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border ${srv.tagColor}`}>
                        <Icon className="w-3.5 h-3.5" />
                        <span>{srv.tag}</span>
                      </div>
                      <div className={`w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 ${srv.iconBg}`}>
                        <Icon className="w-5 h-5" />
                      </div>
                    </div>

                    <h3 className="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                      {srv.title}
                    </h3>

                    <p className="text-slate-600 text-sm leading-relaxed">
                      {srv.desc}
                    </p>

                    <div className="pt-2 border-t border-slate-100">
                      <div className="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                        Key Capabilities:
                      </div>
                      <div className="space-y-2.5">
                        {srv.features.map((feat, i) => (
                          <div key={i} className="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                            <div className="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                              <Check className="w-3.5 h-3.5 stroke-[2.5]" />
                            </div>
                            <span className="font-semibold text-slate-800 leading-snug">{feat}</span>
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>

                  <div className="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <Link
                      to={srv.link}
                      className="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2"
                    >
                      <span>Explore Practice</span>
                      <ArrowRight className="w-4 h-4" />
                    </Link>
                    <button
                      onClick={onOpenQuote}
                      className="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading"
                    >
                      {srv.quoteBtnText}
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 3. ENTERPRISE DELIVERY FRAMEWORK */}
      <section className="py-20 lg:py-28 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
          
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Predictable Engineering Execution
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
              Our 4-Stage Delivery Framework
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              Every client engagement follows an agile, transparent lifecycle designed to eliminate technical ambiguity and ensure on-time milestone delivery.
            </p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {deliverySteps.map((step, idx) => (
              <motion.div
                key={step.step}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.4, delay: idx * 0.1 }}
                className="p-6 rounded-2xl bg-slate-50 border border-slate-200/90 relative hover:border-blue-300 transition-colors"
              >
                <div className="w-10 h-10 rounded-xl bg-blue-600 text-white font-mono font-bold text-sm flex items-center justify-center mb-4 shadow-xs">
                  {step.step}
                </div>
                <h3 className="text-lg font-bold text-slate-900 font-heading mb-2">
                  {step.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {step.desc}
                </p>
              </motion.div>
            ))}
          </div>

        </div>
      </section>

      {/* 4. ENTERPRISE GOVERNANCE & GUARANTEES */}
      <section className="py-20 bg-slate-50 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Enterprise Governance
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
              Enterprise-Grade Assurances
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              Contractually guaranteed security, absolute confidentiality, and complete IP transfer.
            </p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {enterprisePillars.map((pillar, i) => {
              const Icon = pillar.icon;
              return (
                <div 
                  key={i} 
                  className="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3"
                >
                  <div className="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <Icon className="w-5 h-5" />
                  </div>
                  <h4 className="text-base font-bold text-slate-900 font-heading">
                    {pillar.title}
                  </h4>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {pillar.desc}
                  </p>
                </div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 5. CAREERS & TALENT CALLOUT (Dedicated, Non-Service Section) */}
      <section className="py-12 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="bg-gradient-to-r from-slate-50 via-blue-50/50 to-slate-50 rounded-2xl p-6 sm:p-8 border border-blue-200/70 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div className="flex items-start sm:items-center gap-4">
              <div className="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                <GraduationCap className="w-6 h-6" />
              </div>
              <div className="space-y-1">
                <h4 className="text-lg font-bold text-slate-900 font-heading">
                  Looking for Engineering Careers or Hands-On Internship Programs?
                </h4>
                <p className="text-xs sm:text-sm text-slate-600 max-w-2xl">
                  We mentor early-career developers and offer interview-based production internships across 6 specialized technology tracks.
                </p>
              </div>
            </div>
            <Link
              to="/careers"
              className="px-6 py-3 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-800 font-bold text-xs sm:text-sm shrink-0 shadow-2xs font-heading transition-all flex items-center gap-2"
            >
              <span>Explore Careers & Internships</span>
              <ArrowRight className="w-4 h-4 text-blue-600" />
            </Link>
          </div>
        </div>
      </section>

      {/* 6. BOTTOM CTA HERO BANNER */}
      <section className="py-20 bg-gradient-to-b from-slate-950 via-[#0B1428] to-[#0F1D3D] text-white relative overflow-hidden">
        <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
        <div className="absolute top-1/2 -right-40 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 -left-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center relative z-10">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-cyan-300 text-xs font-mono">
            <Sparkles className="w-3.5 h-3.5 text-cyan-400" />
            <span>Milestone-Based Fixed Scopes • Rapid 24-Hour Quotations</span>
          </div>

          <h3 className="text-3xl sm:text-4xl lg:text-5xl font-black text-white font-heading tracking-tight leading-tight">
            Ready to Accelerate Your Digital Transformation?
          </h3>

          <p className="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Discuss your technical requirements with a Solutions Architect. Receive an actionable roadmap and fixed-price proposal within 24 hours.
          </p>

          <div className="pt-4 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-lg shadow-blue-500/25 transition-all font-heading active:scale-95 flex items-center gap-2"
            >
              <span>Request Custom Quotation</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm transition-all font-heading flex items-center gap-2"
            >
              <PhoneCall className="w-4 h-4 text-cyan-400" />
              <span>Book Strategy Call</span>
            </button>
            <Link
              to="/contact"
              className="px-6 py-3.5 rounded-xl border border-white/15 hover:bg-white/5 text-slate-300 font-bold text-sm font-heading transition-colors"
            >
              Contact Us Directly
            </Link>
          </div>

          <div className="pt-4 text-xs text-slate-400 font-mono">
            Direct Inquiries: <a href={`mailto:${siteConfig.emailContact}`} className="text-cyan-400 hover:underline">{siteConfig.emailContact}</a>
          </div>
        </div>
      </section>

    </div>
  );
}

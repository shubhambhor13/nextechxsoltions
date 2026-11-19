import React from 'react';
import { motion } from 'framer-motion';
import AutoScrollingProjects from '../components/AutoScrollingProjects';
import {
  Code2,
  Globe,
  Smartphone,
  Cloud,
  BarChart3,
  Headphones,
  PieChart,
  Sparkles,
  CheckCircle2,
  ArrowRight,
  Zap,
  ShieldCheck,
  Cpu,
  ChevronRight,
  PhoneCall,
  Activity,
  Layers,
  Terminal,
  Server,
  Database,
  Lock,
  Check
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function ITServices({ onOpenQuote, onOpenConsultation }) {
  const services = [
    {
      id: "web-dev",
      title: "Enterprise Web Applications",
      icon: Globe,
      desc: "Ultra-responsive web platforms engineered with React 18, Next.js, and Tailwind CSS. Built for sub-second Core Web Vitals and multi-tenant SaaS scaling.",
      capabilities: [
        "SaaS platforms & multi-tenant architectures",
        "Progressive Web Apps (PWAs) & Jamstack portals",
        "High-conversion corporate design systems",
        "WCAG 2.1 accessibility & sub-second Core Web Vitals"
      ],
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      accentGradient: "from-blue-600 via-indigo-600 to-cyan-500",
      iconColor: "text-blue-600"
    },
    {
      id: "software-dev",
      title: "Custom Software Engineering",
      icon: Code2,
      desc: "High-throughput backend systems and microservices engineered in Python FastAPI and Java Spring Boot for mission-critical enterprise workloads.",
      capabilities: [
        "Distributed event-driven architectures with Apache Kafka",
        "Secure RESTful & GraphQL API gateways",
        "Legacy application refactoring & cloud migration",
        "Automated unit, integration, and load testing (99%+ test coverage)"
      ],
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200",
      accentGradient: "from-indigo-600 via-purple-600 to-blue-500",
      iconColor: "text-indigo-600"
    },
    {
      id: "mobile-dev",
      title: "Cross-Platform Mobile Apps",
      icon: Smartphone,
      desc: "Native-quality mobile applications for iOS and Android powered by React Native and Flutter with seamless biometric and offline data sync.",
      capabilities: [
        "Single unified codebase for iOS & Android",
        "Offline-first sync with SQLite & WatermelonDB",
        "Biometric authentication & push notification triggers",
        "App Store & Google Play enterprise release deployment"
      ],
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200",
      accentGradient: "from-sky-500 via-blue-600 to-indigo-600",
      iconColor: "text-sky-600"
    },
    {
      id: "cloud-devops",
      title: "Cloud Infrastructure & CI/CD",
      icon: Cloud,
      desc: "Zero-downtime infrastructure on AWS, Azure, and Google Cloud with Docker, Kubernetes, and automated Terraform infrastructure-as-code.",
      capabilities: [
        "Kubernetes (EKS / GKE) microservice orchestration",
        "Automated GitHub Actions / GitLab CI/CD pipelines",
        "Cost optimization audits (saving 25-45% cloud spend)",
        "Disaster recovery, auto-scaling & 24/7 Datadog monitoring"
      ],
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      accentGradient: "from-purple-600 via-indigo-600 to-blue-600",
      iconColor: "text-purple-600"
    },
    {
      id: "data-analytics",
      title: "Data Analytics & Engineering",
      icon: BarChart3,
      desc: "Transform fragmented transactional logs into a unified single source of truth using modern data warehousing and dbt semantic modeling.",
      capabilities: [
        "High-volume ETL/ELT pipelines with Python & Apache Spark",
        "Snowflake, BigQuery & TimescaleDB modeling",
        "Automated data quality assertions & anomaly alerts",
        "Predictive customer churn & sales velocity algorithms"
      ],
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      accentGradient: "from-emerald-600 via-teal-600 to-cyan-600",
      iconColor: "text-emerald-600"
    },
    {
      id: "bi-dashboards",
      title: "Executive Business Intelligence",
      icon: PieChart,
      desc: "Interactive visual dashboards that give leadership clear visibility into revenue, customer retention, supply chains, and employee KPIs.",
      capabilities: [
        "Power BI DAX calculations & custom visual themes",
        "Automated email reports & Slack threshold alerts",
        "Row-Level Security (RLS) for departmental privacy",
        "Interactive drills across multi-dimensional metrics"
      ],
      badgeColor: "bg-amber-50 text-amber-700 border-amber-200",
      accentGradient: "from-amber-500 via-orange-600 to-blue-600",
      iconColor: "text-amber-600"
    },
    {
      id: "bpo-services",
      title: "Global 24/7 BPO & Tech Support Pods",
      icon: Headphones,
      desc: "Dedicated offshore engineering pods, tier-2 technical support, and customer success management operating on follow-the-sun schedules.",
      capabilities: [
        "Guaranteed 15-minute response SLA on tier-1/tier-2 incidents",
        "Omnichannel helpdesk: Zendesk, Jira Service Management, Intercom",
        "Cloud server health monitoring & automated triage escalation",
        "Strict compliance with customer SOC-2 and HIPAA standards"
      ],
      badgeColor: "bg-rose-50 text-rose-700 border-rose-200",
      accentGradient: "from-rose-500 via-pink-600 to-indigo-600",
      iconColor: "text-rose-600"
    }
  ];

  const techStackPills = [
    "React 18 & Vite", "FastAPI & Python", "PostgreSQL", "Flutter & iOS/Android",
    "Docker & Kubernetes", "AWS & Cloud VPS", "Power BI & SQL", "Kafka & Redis"
  ];

  const fadeIn = {
    initial: { opacity: 0, y: 20 },
    whileInView: { opacity: 1, y: 0 },
    viewport: { once: true, margin: "-40px" },
    transition: { duration: 0.5, ease: "easeOut" }
  };

  return (
    <div className="bg-white text-slate-800">

      {/* 1. HERO SECTION WITH MODERN GRADIENT & TECH BACKGROUND */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Ambient Glows & Tech Grid */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <Code2 className="w-4 h-4 text-blue-600" />
            <span>Full-Cycle Software Engineering • Cloud Architecture • BPO</span>
          </motion.div>

          <motion.h1
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Enterprise Software & Cloud Engineering <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Built for Scale and Reliability
            </span>
          </motion.h1>

          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal"
          >
            From modern React/FastAPI platforms to distributed AWS Kubernetes microservices, Power BI analytics, and 24/7 dedicated BPO pods.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Request Technical Proposal</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-blue-600" />
              <span>Book Strategy Call</span>
            </button>
          </div>

          {/* Tech Stack Pills Bar */}
          <div className="pt-8 max-w-3xl mx-auto">
            <div className="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
              Core Technology Ecosystem:
            </div>
            <div className="flex flex-wrap items-center justify-center gap-2">
              {techStackPills.map((tech, i) => (
                <span
                  key={i}
                  className="px-3 py-1 rounded-full bg-white border border-slate-200 text-xs font-semibold text-slate-700 shadow-xs"
                >
                  {tech}
                </span>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* 2. SERVICES GRID WITH ROUNDED-3XL ELEVATED CARDS */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Capabilities & Offerings
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              End-to-End IT & Software Engineering
            </h2>
            <p className="text-sm text-slate-600">
              Architected for enterprise security, lightning speed, and seamless multi-platform operation.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((srv, idx) => {
              const Icon = srv.icon;
              return (
                <motion.div
                  key={srv.id}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.07 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
                >
                  {/* Subtle Top Gradient Accent Stripe */}
                  <div className={`h-1.5 w-full bg-gradient-to-r ${srv.accentGradient}`} />

                  <div className="p-7 space-y-4">
                    <div className="flex items-center justify-between">
                      <div className={`w-12 h-12 rounded-2xl ${srv.badgeColor} flex items-center justify-center border shadow-xs group-hover:scale-105 transition-transform`}>
                        <Icon className={`w-6 h-6 ${srv.iconColor}`} />
                      </div>
                      <span className="text-[10px] font-bold uppercase tracking-wider text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full font-mono">
                        Tier-1 Delivery
                      </span>
                    </div>

                    <h3 className="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors font-heading">
                      {srv.title}
                    </h3>

                    <p className="text-sm text-slate-600 leading-relaxed font-normal">
                      {srv.desc}
                    </p>

                    <div className="pt-3 border-t border-slate-100">
                      <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2 font-heading">
                        Key Capabilities:
                      </div>
                      <ul className="space-y-2 text-xs sm:text-sm text-slate-700 font-medium">
                        {srv.capabilities.map((cap, cIdx) => (
                          <li key={cIdx} className="flex items-start gap-2.5">
                            <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0 mt-0.5" />
                            <span className="leading-snug">{cap}</span>
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>

                  <div className="p-6 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between">
                    <span className="text-xs text-slate-500 font-semibold font-mono">Enterprise SLA</span>
                    <button
                      onClick={onOpenQuote}
                      className="text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 transition-colors font-heading"
                    >
                      <span>Request Estimate</span>
                      <ChevronRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Auto-Scrolling Case Studies Rail */}
      <AutoScrollingProjects onOpenQuote={onOpenQuote} />

      {/* 3. DARK NAVY ARCHITECTURE & QUALITY STANDARDS HIGHLIGHT SECTION */}
      <section className="py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-black text-white relative overflow-hidden border-t border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-14">
          <motion.div {...fadeIn} className="text-center max-w-2xl mx-auto space-y-3">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Enterprise Benchmarks
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-white font-heading">
              Our Quality & Service Standards
            </h2>
            <p className="text-sm text-slate-300 font-normal">
              Every website, mobile app, and software platform we build is engineered to be fast, secure, and reliable for your business.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-blue-500/50 hover:bg-slate-900 transition-all duration-300 space-y-2 text-left group">
              <div className="text-3xl font-black text-blue-400 font-heading group-hover:scale-105 transition-transform">99.9%</div>
              <h4 className="text-sm font-bold text-white font-heading">Uptime Reliability</h4>
              <p className="text-xs text-slate-400 leading-relaxed">Your websites and apps stay online 24/7 with automatic backups and cloud failovers.</p>
            </div>

            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-indigo-500/50 hover:bg-slate-900 transition-all duration-300 space-y-2 text-left group">
              <div className="text-3xl font-black text-indigo-400 font-heading group-hover:scale-105 transition-transform">&lt; 15 min</div>
              <h4 className="text-sm font-bold text-white font-heading">Fast Support Response</h4>
              <p className="text-xs text-slate-400 leading-relaxed">Our dedicated tech support team is always ready to resolve issues quickly across timezones.</p>
            </div>

            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-purple-500/50 hover:bg-slate-900 transition-all duration-300 space-y-2 text-left group">
              <div className="text-3xl font-black text-purple-400 font-heading group-hover:scale-105 transition-transform">100%</div>
              <h4 className="text-sm font-bold text-white font-heading">Privacy & Data Security</h4>
              <p className="text-xs text-slate-400 leading-relaxed">Your code, data, and business information are safe and protected under mutual NDA.</p>
            </div>

            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-emerald-500/50 hover:bg-slate-900 transition-all duration-300 space-y-2 text-left group">
              <div className="text-3xl font-black text-emerald-400 font-heading group-hover:scale-105 transition-transform">Zero Downtime</div>
              <h4 className="text-sm font-bold text-white font-heading">Continuous Delivery</h4>
              <p className="text-xs text-slate-400 leading-relaxed">Thoroughly tested code and seamless updates without interrupting active users.</p>
            </div>
          </div>

          {/* Bottom Consultation / Quote CTA Banner */}
          <div className="p-8 sm:p-12 rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 text-left relative overflow-hidden border border-blue-400/30">
            <div className="space-y-3 max-w-xl relative z-10">
              <span className="text-[11px] font-bold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full font-heading inline-block">
                Custom Digital Solutions
              </span>
              <h3 className="text-2xl sm:text-3xl font-extrabold font-heading">
                Ready to Build Your Software or Website?
              </h3>
              <p className="text-xs sm:text-sm text-blue-100 leading-relaxed font-normal">
                Connect with our experienced developers to discuss your project ideas, architecture, and get a clear, personalized quote.
              </p>
            </div>
            <div className="flex flex-wrap items-center gap-3 shrink-0 relative z-10">
              <button
                onClick={onOpenQuote}
                className="px-6 py-3.5 rounded-xl bg-white text-blue-600 font-bold text-xs hover:bg-slate-50 transition-all shadow-md active:scale-95 font-heading"
              >
                Request Custom Quote
              </button>
              <button
                onClick={onOpenConsultation}
                className="px-6 py-3.5 rounded-xl border border-white/40 text-white font-semibold text-xs hover:bg-white/10 transition-colors font-heading"
              >
                Schedule Consultation Call
              </button>
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

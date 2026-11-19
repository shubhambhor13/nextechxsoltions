import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
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
  Globe2
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function Services({ onOpenQuote, onOpenConsultation }) {
  const serviceCards = [
    {
      id: "ai-automation",
      tag: "AI & Autonomous Systems",
      tagColor: "bg-cyan-50 text-cyan-700 border border-cyan-200",
      title: "Intelligent Chatbots, Agents & n8n Automation Workflows",
      desc: "We architect smart customer-facing conversational bots, WhatsApp messaging triggers, autonomous multi-step agents, and intelligent document extraction systems that eliminate manual friction.",
      icon: Bot,
      iconBg: "bg-cyan-500/10 text-cyan-600 border border-cyan-200",
      link: "/ai-automation",
      features: [
        "Custom RAG AI Chatbots with Enterprise Context",
        "Official WhatsApp Business Cloud API Integration",
        "n8n Multi-Platform Automated Pipelines",
        "Intelligent OCR for Invoices, Receipts & KYC"
      ]
    },
    {
      id: "it-services",
      tag: "Custom Software Engineering",
      tagColor: "bg-blue-50 text-blue-700 border border-blue-200",
      title: "Enterprise Web Applications, Mobile Platforms & Cloud DevOps",
      desc: "From early MVP prototypes to high-traffic production platforms. We engineer responsive web apps in React, high-throughput microservices in Python & Node.js, and multi-region cloud infrastructures.",
      icon: Code2,
      iconBg: "bg-blue-500/10 text-blue-600 border border-blue-200",
      link: "/it-services",
      features: [
        "Full-Stack Web & Mobile SaaS Applications",
        "High-Concurrency RESTful & GraphQL Microservices",
        "Automated Docker CI/CD & AWS Cloud Deployments",
        "Transparent Milestone-Based Delivery SOWs"
      ]
    },
    {
      id: "research-publication",
      tag: "Academic & Doctoral Advisory",
      tagColor: "bg-amber-50 text-amber-700 border border-amber-200",
      title: "Research Paper Structuring, Writing & Global Indexed Publication",
      desc: "End-to-end guidance for university faculty, PhD scholars, and students to structure novel academic manuscripts and navigate peer-reviewed indexed submissions in Scopus, IEEE Xplore, and Springer Nature.",
      icon: BookOpen,
      iconBg: "bg-amber-500/10 text-amber-600 border border-amber-200",
      link: "/research-publication",
      features: [
        "100+ Manuscripts Published in IEEE & Scopus Q1/Q2",
        "Mathematical Modeling & Algorithmic Design",
        "Turnitin Plagiarism Verification (< 10%)",
        "Post-Review Journal Rebuttal Support"
      ]
    },
    {
      id: "careers",
      tag: "Careers & Internships",
      tagColor: "bg-emerald-50 text-emerald-700 border border-emerald-200",
      title: "Job Vacancies & Hands-On Internship Programs",
      desc: "Explore full-time engineering vacancies and interview-based production internships. Work on live enterprise client systems and build verified production experience under engineering mentorship.",
      icon: GraduationCap,
      iconBg: "bg-emerald-500/10 text-emerald-600 border border-emerald-200",
      link: "/careers",
      features: [
        "Current Job Vacancies (0-2 Yrs Early Career)",
        "6 Specialized Technical Internship Tracks",
        "Verified Production Experience Credentials",
        "Direct HR Desk (hr@nextechxsolutions.com)"
      ]
    }
  ];

  return (
    <div className="bg-white text-slate-800 font-sans">
      
      {/* 1. Hero Section */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-slate-950 via-[#0B1428] to-[#0F1D3D] text-white border-b border-blue-900/50 overflow-hidden">
        <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
        <div className="absolute top-1/4 -right-40 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 left-1/4 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs sm:text-sm font-bold text-cyan-300 font-heading"
          >
            <Sparkles className="w-4 h-4 text-cyan-400" />
            <span>Comprehensive Enterprise Capabilities</span>
          </motion.div>

          <motion.h1
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Our Core Services & <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-300">
              Technical Capabilities
            </span>
          </motion.h1>

          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed"
          >
            High-performance digital engineering delivered with clear milestone scopes, transparent pricing in Indian Rupees (₹), and dedicated technical support.
          </motion.p>

          <div className="pt-4 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-lg shadow-blue-500/25 transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Request a Quotation</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-cyan-400" />
              <span>Book Strategy Call</span>
            </button>
          </div>
        </div>
      </section>

      {/* 2. Detailed Service Cards Grid */}
      <section className="py-20 lg:py-28 bg-slate-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          {serviceCards.map((srv, index) => {
            const Icon = srv.icon;
            return (
              <motion.div
                key={srv.id}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: index * 0.1 }}
                className="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-lg hover:shadow-xl transition-shadow flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8"
              >
                <div className="max-w-2xl space-y-4 text-left">
                  <div className={`inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono ${srv.tagColor}`}>
                    <Icon className="w-3.5 h-3.5" />
                    <span>{srv.tag}</span>
                  </div>

                  <h2 className="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                    {srv.title}
                  </h2>

                  <p className="text-slate-600 text-sm sm:text-base leading-relaxed">
                    {srv.desc}
                  </p>

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-3 text-xs sm:text-sm text-slate-700">
                    {srv.features.map((feat, i) => (
                      <div key={i} className="flex items-center gap-2.5">
                        <div className="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                          <Check className="w-3.5 h-3.5 stroke-[2.5]" />
                        </div>
                        <span className="font-semibold text-slate-800">{feat}</span>
                      </div>
                    ))}
                  </div>
                </div>

                <div className="flex flex-col gap-3 shrink-0 w-full lg:w-64 pt-4 lg:pt-0">
                  <Link
                    to={srv.link}
                    className="w-full py-3.5 px-6 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-md font-heading transition-all flex items-center justify-center gap-2"
                  >
                    <span>Explore Practice</span>
                    <ArrowRight className="w-4 h-4" />
                  </Link>
                  <button
                    onClick={onOpenQuote}
                    className="w-full py-3 px-6 rounded-xl border border-slate-300 hover:border-blue-400 hover:bg-blue-50/50 text-slate-700 font-bold text-xs text-center transition-colors font-heading"
                  >
                    Get Instant Quote
                  </button>
                </div>
              </motion.div>
            );
          })}
        </div>
      </section>

      {/* 3. Bottom Assurance CTA */}
      <section className="py-16 bg-white border-t border-slate-200 text-center">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-mono">
            <ShieldCheck className="w-4 h-4 text-blue-600" />
            <span>ISO-Aligned Quality • 100% Milestone Guarantees</span>
          </div>
          <h3 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
            Ready to Accelerate Your Digital Transformation?
          </h3>
          <p className="text-sm sm:text-base text-slate-600 max-w-xl mx-auto">
            Discuss your technical requirements with a Solutions Architect. Receive a clear roadmap and fixed-price quotation within 24 hours.
          </p>
          <div className="pt-2 flex items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-md font-heading transition-all"
            >
              Request Custom Quotation
            </button>
            <Link
              to="/contact"
              className="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-bold text-sm font-heading transition-colors"
            >
              Contact Us Directly
            </Link>
          </div>
        </div>
      </section>

    </div>
  );
}

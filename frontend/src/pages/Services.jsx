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
  Globe2,
  CheckCircle2,
  Lock,
  Users,
  Server,
  FileCheck,
  ExternalLink
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function Services({ onOpenQuote, onOpenConsultation }) {
  const serviceCards = [
    {
      id: "ai-automation",
      tag: "AI & Autonomous Systems",
      badgeText: "Enterprise Automation",
      title: "Intelligent AI Agents, RAG Chatbots & Workflow Automation",
      desc: "Architect and deploy bespoke conversational AI agents, official WhatsApp Cloud API triggers, autonomous multi-step pipelines (n8n), and intelligent OCR document extraction that eliminate manual operational bottlenecks.",
      icon: Bot,
      link: "/ai-automation",
      exploreText: "Explore AI Practice",
      quoteText: "Get AI Quote",
      features: [
        "Custom RAG AI Chatbots with Enterprise Context",
        "Official WhatsApp Business Cloud API Integration",
        "n8n Multi-Platform Automated Pipelines",
        "Intelligent OCR for Invoices, Receipts & KYC"
      ],
      deliverable: "Fixed Milestone SOW • Production Deployment"
    },
    {
      id: "it-services",
      tag: "Software & Cloud Engineering",
      badgeText: "Full-Stack & Cloud",
      title: "Enterprise Web Applications, Microservices & Cloud Infrastructure",
      desc: "From early MVP architectures to high-concurrency production platforms. We engineer ultra-responsive web applications, resilient backend microservices in Python & Node.js, and multi-region cloud infrastructures.",
      icon: Code2,
      link: "/it-services",
      exploreText: "Explore IT Practice",
      quoteText: "Get Software Quote",
      features: [
        "Full-Stack SaaS Platforms & Modern Web Applications",
        "High-Throughput RESTful & GraphQL Microservices",
        "Automated Docker CI/CD & AWS Cloud Architecture",
        "Transparent Milestone-Based Delivery SOWs"
      ],
      deliverable: "Clean Architecture • 100% Code Ownership"
    },
    {
      id: "research-publication",
      tag: "Academic & Doctoral Advisory",
      badgeText: "Indexed Publishing",
      title: "Research Paper Structuring, Writing & Global Indexed Publication",
      desc: "End-to-end guidance for university faculty, PhD scholars, and students to structure novel academic manuscripts and navigate peer-reviewed indexed submissions in Scopus, IEEE Xplore, and Springer Nature.",
      icon: BookOpen,
      link: "/research-publication",
      exploreText: "Explore Research Advisory",
      quoteText: "Inquire Advisory",
      features: [
        "Scopus (Q1/Q2), IEEE Xplore & Springer Guidance",
        "Mathematical Modeling & Algorithmic Design",
        "Turnitin Similarity Verification (< 10% Strict)",
        "Camera-Ready Formatting & Rebuttal Assistance"
      ],
      deliverable: "Peer-Reviewed Target • Full Confidentiality"
    },
    {
      id: "careers",
      tag: "Careers & Internships",
      badgeText: "Talent & Mentorship",
      title: "Engineering Vacancies & Hands-On Production Internships",
      desc: "Structured interview-based production internships and early-career vacancies. Work directly on live client systems, contribute to production codebases, and earn verified credentials under senior mentorship.",
      icon: GraduationCap,
      link: "/careers",
      exploreText: "Explore Opportunities",
      quoteText: "Apply Now",
      features: [
        "Current Job Vacancies (0-2 Yrs Experience Tracks)",
        "6 Specialized Technical Internship Tracks",
        "Live Production Project Experience",
        "Verified Experience Letters & HR Credentials"
      ],
      deliverable: "Online-First Delivery • Verified Credentials"
    }
  ];

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
      
      {/* 1. Hero Section: Clean White Background, Navy Typography, Tech Visual */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle grid background */}
        <div className="absolute inset-0 bg-grid-corporate opacity-40 pointer-events-none" />
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
                Engineering Solutions <br />
                <span className="text-blue-600">Built for Enterprise Scale.</span>
              </motion.h1>

              <motion.p
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.4, delay: 0.2 }}
                className="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed"
              >
                From autonomous AI agents and cloud microservices to indexed academic publications and structured internships. Delivered with clear milestone scopes, transparent pricing, and dedicated engineering oversight.
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

            {/* Right Column: Attractive Technology Visual (Corporate Architecture Blueprint) */}
            <div className="lg:col-span-5">
              <motion.div
                initial={{ opacity: 0, scale: 0.96 }}
                animate={{ opacity: 1, scale: 1 }}
                transition={{ duration: 0.5, delay: 0.2 }}
                className="bg-slate-50/90 rounded-2xl p-6 sm:p-7 border border-slate-200/90 shadow-sm relative"
              >
                {/* Visual Header */}
                <div className="flex items-center justify-between pb-5 border-b border-slate-200/80 mb-5">
                  <div className="flex items-center gap-2">
                    <div className="w-3 h-3 rounded-full bg-red-400/80" />
                    <div className="w-3 h-3 rounded-full bg-amber-400/80" />
                    <div className="w-3 h-3 rounded-full bg-emerald-400/80" />
                    <span className="ml-2 text-xs font-mono font-bold text-slate-700 uppercase tracking-wider">
                      Technical Architecture Blueprint
                    </span>
                  </div>
                  <div className="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-mono font-medium">
                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
                    <span>Production Ready</span>
                  </div>
                </div>

                {/* Architecture Layers */}
                <div className="space-y-3">
                  
                  {/* Layer 1 */}
                  <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                    <div className="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                      <Bot className="w-4 h-4" />
                    </div>
                    <div className="text-left flex-1 min-w-0">
                      <div className="flex items-center justify-between">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">AI & Workflow Layer</h4>
                        <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">RAG • Agents</span>
                      </div>
                      <p className="text-[11px] text-slate-500 mt-0.5 truncate">
                        Autonomous n8n pipelines, WhatsApp Cloud API, Vector DBs
                      </p>
                    </div>
                  </div>

                  {/* Layer 2 */}
                  <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                    <div className="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                      <Code2 className="w-4 h-4" />
                    </div>
                    <div className="text-left flex-1 min-w-0">
                      <div className="flex items-center justify-between">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Cloud & Microservices</h4>
                        <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">React • Node • Py</span>
                      </div>
                      <p className="text-[11px] text-slate-500 mt-0.5 truncate">
                        RESTful & GraphQL microservices, Docker CI/CD, AWS Cloud
                      </p>
                    </div>
                  </div>

                  {/* Layer 3 */}
                  <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                    <div className="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                      <BookOpen className="w-4 h-4" />
                    </div>
                    <div className="text-left flex-1 min-w-0">
                      <div className="flex items-center justify-between">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Academic & Research Core</h4>
                        <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">Scopus • IEEE</span>
                      </div>
                      <p className="text-[11px] text-slate-500 mt-0.5 truncate">
                        Mathematical modeling, algorithms, Turnitin &lt;10% verification
                      </p>
                    </div>
                  </div>

                  {/* Layer 4 */}
                  <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                    <div className="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                      <GraduationCap className="w-4 h-4" />
                    </div>
                    <div className="text-left flex-1 min-w-0">
                      <div className="flex items-center justify-between">
                        <h4 className="text-xs font-bold text-slate-900 font-heading">Engineering Talent Lab</h4>
                        <span className="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">Live Projects</span>
                      </div>
                      <p className="text-[11px] text-slate-500 mt-0.5 truncate">
                        Production internships across 6 specialized technology tracks
                      </p>
                    </div>
                  </div>

                </div>

                {/* Blueprint Footer */}
                <div className="mt-5 pt-4 border-t border-slate-200/80 flex items-center justify-between text-[11px] text-slate-500 font-mono">
                  <span>Governance: ISO-Aligned</span>
                  <span className="text-blue-600 font-medium">Bilateral NDA Covered</span>
                </div>
              </motion.div>
            </div>

          </div>
        </div>
      </section>

      {/* 2. Services Grid: 2x2 Equal-Height Card Layout */}
      <section className="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          {/* Section Heading */}
          <div className="text-center max-w-3xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <span>Core Service Catalog</span>
            </div>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Specialized Technology Practices
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Every practice is led by senior engineering architects with transparent delivery scopes, verifiable technical milestones, and comprehensive code handover.
            </p>
          </div>

          {/* Equal-Height 2x2 Grid */}
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            {serviceCards.map((srv, index) => {
              const Icon = srv.icon;
              const isCareer = srv.id === 'careers';

              return (
                <div
                  key={srv.id}
                  className="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left"
                >
                  {/* Top: Icon + Badge + Title + Description */}
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
                      <ul className="space-y-2.5">
                        {srv.features.map((feat, i) => (
                          <li key={i} className="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                            <div className="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                              <Check className="w-3 h-3 stroke-[2.5]" />
                            </div>
                            <span className="leading-tight">{feat}</span>
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>

                  {/* Bottom: Milestone info & Action Buttons */}
                  <div className="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div className="flex items-center justify-between text-xs font-mono text-slate-500">
                      <span className="text-slate-400">Standard Framework:</span>
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

      {/* 3. Why Choose Us: Corporate Approach & Engineering Capabilities */}
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

import React, { useState, useRef, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  ArrowRight, 
  Bot, 
  Layers, 
  Code2, 
  BookOpen,
  GraduationCap,
  ShieldCheck, 
  CheckCircle2, 
  Sparkles, 
  Clock, 
  ChevronRight, 
  Award, 
  Zap, 
  Users, 
  Target, 
  Check, 
  Briefcase, 
  Mail, 
  Phone, 
  MessageSquare, 
  Loader2, 
  AlertCircle,
  Globe2,
  FileText,
  Send,
  TrendingUp,
  Cpu,
  Terminal,
  Lock,
  CheckSquare,
  Headphones
} from 'lucide-react';
import HeroTechIllustration from '../components/HeroTechIllustration';
import HeroBackground from '../components/HeroBackground';
import TechMarquee from '../components/TechMarquee';
import AutoScrollingProjects from '../components/AutoScrollingProjects';
import { siteConfig } from '../config/siteConfig';
import { api } from '../services/api';
import confetti from 'canvas-confetti';

export default function Home({ onOpenQuote, onOpenConsultation, onOpenRegister }) {

  // Exactly 5 Core Services
  const services = [
    {
      id: "ai-automation",
      title: "AI & Automation",
      subtitle: "Autonomous AI agents and automated business workflows",
      desc: "Intelligent autonomous agents, conversational AI chatbots, and streamlined workflow automation designed to eliminate manual bottlenecks.",
      icon: Bot,
      link: "/services/ai-automation",
      cardGradient: "bg-gradient-to-br from-[#2563EB] via-[#1D4ED8] to-[#1E3A8A]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(37,99,235,0.45)]",
      borderColor: "border-blue-400/30 hover:border-blue-300",
      btnGradient: "bg-gradient-to-r from-[#06b6d4] to-[#0ea5e9] hover:from-[#22d3ee] hover:to-[#38bdf8] text-white",
      btnText: "Explore AI & Automation",
      features: [
        "Custom RAG AI Chatbots with Enterprise Context",
        "Official WhatsApp Business Cloud API Automated Flows",
        "Autonomous Multi-Step Event Pipelines (n8n)",
        "Intelligent OCR Document Extraction (Invoices & KYC)"
      ]
    },
    {
      id: "software-development",
      title: "Software Development",
      subtitle: "Custom web applications and high-performance microservices",
      desc: "End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern platforms.",
      icon: Code2,
      link: "/services/software-development",
      cardGradient: "bg-gradient-to-br from-[#7C3AED] via-[#6D28D9] to-[#4C1D95]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(124,58,237,0.45)]",
      borderColor: "border-purple-400/30 hover:border-purple-300",
      btnGradient: "bg-gradient-to-r from-[#a855f7] to-[#9333ea] hover:from-[#c084fc] hover:to-[#a855f7] text-white",
      btnText: "Explore Software Development",
      features: [
        "Custom Enterprise Web Applications",
        "High-Throughput RESTful & GraphQL Microservices",
        "Cross-Platform iOS & Android Mobile Apps",
        "Automated CI/CD Pipelines & Cloud Architecture"
      ]
    },
    {
      id: "saas-development",
      title: "SaaS Development",
      subtitle: "Multi-tenant cloud architecture and subscription platforms",
      desc: "Complete Software-as-a-Service product engineering from multi-tenant cloud architecture to recurring billing and role management.",
      icon: Layers,
      link: "/services/saas-development",
      cardGradient: "bg-gradient-to-br from-[#0284C7] via-[#0369A1] to-[#1E3A8A]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(2,132,199,0.45)]",
      borderColor: "border-cyan-400/30 hover:border-cyan-300",
      btnGradient: "bg-gradient-to-r from-[#0284c7] to-[#0ea5e9] hover:from-[#38bdf8] hover:to-[#0284c7] text-white",
      btnText: "Explore SaaS Development",
      features: [
        "Multi-Tenant Cloud SaaS Architectures",
        "Subscription Billing & Payment Gateway Integration",
        "Role-Based Access Control (RBAC) & Admin Portals",
        "High-Availability Cloud Hosting (99.9% Uptime)"
      ]
    },
    {
      id: "data-annotation",
      title: "Data Annotation",
      subtitle: "High-precision training datasets for AI and ML models",
      desc: "Precision data labeling and annotation solutions providing clean, structured ground-truth datasets for computer vision and NLP models.",
      icon: CheckSquare,
      link: "/services/data-annotation",
      cardGradient: "bg-gradient-to-br from-[#0D9488] via-[#0F766E] to-[#115E59]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(13,148,136,0.45)]",
      borderColor: "border-teal-400/30 hover:border-teal-300",
      btnGradient: "bg-gradient-to-r from-[#14b8a6] to-[#0d9488] hover:from-[#2dd4bf] hover:to-[#14b8a6] text-white",
      btnText: "Explore Data Annotation",
      features: [
        "Image Annotation (Polygons, Keypoints & Polylines)",
        "Text Annotation & NER Entity Tagging",
        "Video Annotation & Multi-Frame Object Tracking",
        "Object Detection with 2D & 3D Bounding Boxes"
      ]
    },
    {
      id: "bpo-services",
      title: "BPO Services",
      subtitle: "Dedicated business process outsourcing and customer support",
      desc: "Professional BPO solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.",
      icon: Headphones,
      link: "/services/bpo-services",
      cardGradient: "bg-gradient-to-br from-[#475569] via-[#334155] to-[#1E293B]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(71,85,105,0.45)]",
      borderColor: "border-slate-400/30 hover:border-slate-300",
      btnGradient: "bg-gradient-to-r from-[#64748b] to-[#475569] hover:from-[#94a3b8] hover:to-[#64748b] text-white",
      btnText: "Explore BPO Services",
      features: [
        "Multichannel Customer Support (Email, Chat & Tickets)",
        "Accurate Data Entry & Digital Records Verification",
        "Order Processing & Fulfillment Catalog Management",
        "SLA-Backed Quality Auditing & Operational Reporting"
      ]
    }
  ];

  // Why Choose Us Pillars
  const whyChooseUs = [
    {
      icon: Zap,
      title: "Latest AI & Technology",
      desc: "We use modern AI tools and reliable software architectures to deliver real, measurable results for your business."
    },
    {
      icon: ShieldCheck,
      title: "100% Privacy & Data Security",
      desc: "Your data, ideas, and code are completely protected with strict privacy standards and signed NDAs."
    },
    {
      icon: Award,
      title: "Industry Best Practices",
      desc: "Strict automated testing, version control, and clean architecture standards across every project delivery."
    },
    {
      icon: Target,
      title: "Direct Access to Experts",
      desc: "Work directly with experienced software engineers, AI developers, and cloud architects."
    },
    {
      icon: Users,
      title: "Clear & Honest Updates",
      desc: "Regular progress updates, step-by-step demos, and direct, friendly communication over WhatsApp and video calls."
    }
  ];

  // Contact form state
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    company: '',
    service_interest: 'AI Automation Solutions',
    message: ''
  });
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      await api.submitContact(formData);
      setSuccess(true);
      confetti({
        particleCount: 50,
        spread: 60,
        origin: { y: 0.7 }
      });
      setFormData({
        name: '',
        email: '',
        phone: '',
        company: '',
        service_interest: 'AI Automation Solutions',
        message: ''
      });
    } catch (err) {
      setError(err.message || 'Failed to transmit message. Please try again or WhatsApp us.');
    } finally {
      setLoading(false);
    }
  };

  // Smooth scroll handler with header offset
  const scrollToSection = (e, sectionId) => {
    e.preventDefault();
    const element = document.getElementById(sectionId);
    if (element) {
      const headerOffset = 85;
      const elementPosition = element.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    }
  };

  return (
    <div className="bg-white text-slate-800 font-sans">
      
      {/* ============================================================ */}
      {/* 1. HERO SECTION (Futuristic AI & Next-Gen Tech Architecture) */}
      {/* ============================================================ */}
      <section 
        id="hero" 
        className="relative pt-8 sm:pt-16 lg:pt-20 pb-16 lg:pb-28 overflow-hidden bg-[#030712] border-b border-cyan-950/60 text-white"
      >
        {/* Futuristic Multi-Layered Tech Background */}
        <HeroBackground />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center min-h-[500px] sm:min-h-[580px]">
            
            {/* Left Content Column (7 cols on lg) */}
            <motion.div 
              initial={{ opacity: 0, y: 25 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, ease: "easeOut" }}
              className="lg:col-span-7 space-y-5 sm:space-y-6 text-left"
            >
              
              {/* Eyebrow Badges: Glowing Tech Pills */}
              <div className="flex flex-wrap items-center gap-2.5 sm:gap-3">
                <div className="inline-flex items-center gap-2 px-3 sm:px-3.5 py-1 sm:py-1.5 rounded-full bg-cyan-500/15 border border-cyan-400/40 text-cyan-300 text-[11px] sm:text-xs font-semibold tracking-wide backdrop-blur-md shadow-[0_0_15px_rgba(6,182,212,0.25)] font-heading">
                  <Sparkles className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-cyan-400 animate-pulse" />
                  <span>Next-Gen AI & Software Solutions</span>
                </div>
                <div className="inline-flex items-center gap-2 px-3 sm:px-3.5 py-1 sm:py-1.5 rounded-full bg-indigo-500/15 border border-indigo-400/40 text-indigo-200 text-[11px] sm:text-xs font-semibold tracking-wide backdrop-blur-md shadow-[0_0_15px_rgba(99,102,241,0.25)] font-heading">
                  <span className="w-2 h-2 rounded-full bg-emerald-400 animate-pulse shadow-[0_0_8px_rgba(52,211,153,0.9)]" />
                  <span>Enterprise Ready</span>
                </div>
              </div>

              {/* Bold Headline with Radiant Electric Cyan & Violet-Blue Gradient Highlights */}
              <h1 className="text-3xl xs:text-4xl sm:text-5xl lg:text-5xl xl:text-6xl font-black text-white tracking-tight leading-[1.14] sm:leading-[1.1] font-heading">
                Architecting Tomorrow with{' '}
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-sky-300 to-blue-400 drop-shadow-[0_0_25px_rgba(6,182,212,0.45)]">
                  Intelligent AI
                </span>{' '}
                &{' '}
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-300 to-purple-400 drop-shadow-[0_0_25px_rgba(99,102,241,0.4)]">
                  Advanced IT Solutions
                </span>
              </h1>

              {/* Clear, High-Impact Professional Subtitle */}
              <p className="text-base sm:text-lg lg:text-xl text-slate-200/90 max-w-xl leading-relaxed font-normal">
                Empowering businesses through intelligent automation, innovative software, and next-generation technology solutions engineered for real-world growth.
              </p>

              {/* Action Buttons: Explore Services and Contact Us */}
              <div className="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 sm:gap-4">
                <a
                  href="#services"
                  onClick={(e) => scrollToSection(e, 'services')}
                  className="w-full sm:w-auto px-7 sm:px-8 py-3.5 sm:py-4 rounded-xl bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 hover:from-cyan-400 hover:via-blue-500 hover:to-indigo-500 text-white font-bold text-sm sm:text-base shadow-[0_0_25px_rgba(6,182,212,0.35)] hover:shadow-[0_0_35px_rgba(6,182,212,0.55)] transition-all duration-300 flex items-center justify-center gap-2 active:scale-95 font-heading group"
                >
                  <span>Explore Services</span>
                  <ArrowRight className="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform" />
                </a>

                <a
                  href="#contact"
                  onClick={(e) => scrollToSection(e, 'contact')}
                  className="w-full sm:w-auto px-7 sm:px-8 py-3.5 sm:py-4 rounded-xl bg-slate-900/80 hover:bg-slate-800/90 text-white border border-cyan-400/40 hover:border-cyan-300 font-bold text-sm sm:text-base backdrop-blur-md transition-all duration-300 flex items-center justify-center gap-2 shadow-[0_4px_20px_rgba(0,0,0,0.3)] active:scale-95 font-heading group"
                >
                  <span>Contact Us</span>
                  <ChevronRight className="w-4 h-4 sm:w-5 sm:h-5 text-slate-300 group-hover:translate-x-1 group-hover:text-cyan-300 transition-all" />
                </a>
              </div>

              {/* Enterprise Trust Indicators Row */}
              <div className="pt-4 flex flex-wrap items-center gap-y-2 gap-x-6 text-xs text-slate-300/90 font-medium border-t border-slate-800/80">
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.9)]" />
                  <span>99.9% Uptime SLA</span>
                </div>
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-cyan-400 shadow-[0_0_8px_rgba(6,182,212,0.9)]" />
                  <span>Enterprise AI Architecture</span>
                </div>
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_rgba(129,140,248,0.9)]" />
                  <span>100% NDA & Data Privacy</span>
                </div>
              </div>

            </motion.div>

            {/* Right Technology Visual (5 cols on lg) */}
            <motion.div 
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 0.7, ease: "easeOut", delay: 0.2 }}
              className="lg:col-span-5 flex items-center justify-center w-full"
            >
              <HeroTechIllustration />
            </motion.div>

          </div>
        </div>
      </section>

      {/* ============================================================ */}
      {/* 2. TECHNOLOGY STACK MARQUEE */}
      {/* ============================================================ */}
      <section className="bg-slate-50/70 border-y border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5 pb-2">
          <p className="text-center text-xs uppercase tracking-widest font-bold text-slate-500 font-heading">
            Enterprise Technology Stack & Cloud Infrastructure
          </p>
        </div>
        <TechMarquee />
      </section>

      {/* ============================================================ */}
      {/* 4. ABOUT US SECTION (Very Light Grey / Soft Blue Theme) */}
      {/* ============================================================ */}
      <section 
        id="about" 
        className="py-20 lg:py-24 bg-slate-50 border-b border-slate-200/80 relative"
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Column: Story & Metrics (7 cols) */}
            <div className="lg:col-span-7 space-y-7 text-left">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100/90 border border-blue-200 text-blue-900 text-sm font-bold uppercase tracking-wider font-heading shadow-xs">
                <Sparkles className="w-4 h-4 text-blue-700" />
                <span>Your Vision • Our Technology</span>
              </div>

              <h2 className="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
                  Your Vision. Our Technology.
                </span>
                <span className="block mt-2 text-2xl sm:text-4xl text-slate-900 font-extrabold">
                  Building Smart Software, AI Automation & Cloud Solutions
                </span>
              </h2>

              <p className="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                We help businesses build modern software, automate everyday workflows, and scale robust cloud applications worldwide.
              </p>

              {/* 4 Structured Metric Cards */}
              <div className="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-2">
                <div className="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                  <div className="text-3xl font-black text-blue-600 font-heading">99.9%</div>
                  <div className="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">Uptime Reliability SLA</div>
                </div>
                <div className="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                  <div className="text-3xl font-black text-blue-600 font-heading">4+</div>
                  <div className="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">Core Service Areas</div>
                </div>
                <div className="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                  <div className="text-3xl font-black text-slate-900 font-heading">100%</div>
                  <div className="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">Privacy & NDA Protected</div>
                </div>
                <div className="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                  <div className="text-3xl font-black text-emerald-600 font-heading">24/7</div>
                  <div className="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">Dedicated Tech Support</div>
                </div>
              </div>

              <div className="pt-2">
                <Link
                  to="/about"
                  className="inline-flex items-center gap-2 text-base font-bold text-blue-600 hover:text-blue-700 group font-heading"
                >
                  <span>Learn more about our company and standards</span>
                  <ArrowRight className="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                </Link>
              </div>
            </div>

            {/* Right Column: Operating Principles (5 cols) */}
            <div className="lg:col-span-5 space-y-4">
              <div className="p-7 sm:p-9 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-6 text-left">
                <h3 className="text-lg font-bold text-slate-900 flex items-center gap-2.5 font-heading">
                  <ShieldCheck className="w-6 h-6 text-blue-600" />
                  <span>Our Operating Principles</span>
                </h3>

                <div className="space-y-4 text-sm text-slate-600">
                  <div className="flex items-start gap-3.5">
                    <div className="w-6 h-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                      1
                    </div>
                    <div>
                      <strong className="text-slate-900 block text-sm font-bold font-heading">Clean & Reliable Code:</strong>
                      We build fast, high-quality software that is easy to manage and built to grow with your business.
                    </div>
                  </div>

                  <div className="flex items-start gap-3.5">
                    <div className="w-6 h-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                      2
                    </div>
                    <div>
                      <strong className="text-slate-900 block text-sm font-bold font-heading">100% Privacy & Data Security:</strong>
                      Your data, project details, and code are always safe, private, and protected under NDA.
                    </div>
                  </div>

                  <div className="flex items-start gap-3.5">
                    <div className="w-6 h-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                      3
                    </div>
                    <div>
                      <strong className="text-slate-900 block text-sm font-bold font-heading">Cloud & DevOps Automation:</strong>
                      Zero-downtime CI/CD pipelines, containerized deployments, and high-availability cloud infrastructure.
                    </div>
                  </div>

                  <div className="flex items-start gap-3.5">
                    <div className="w-6 h-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5 font-bold text-xs">
                      4
                    </div>
                    <div>
                      <strong className="text-slate-900 block text-sm font-bold font-heading">Real-World Internship Experience:</strong>
                      Practical internship program with real client projects guided by experienced engineering mentors.
                    </div>
                  </div>
                </div>

                <div className="pt-3 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-slate-800">
                  <span className="font-heading">Operating Model</span>
                  <span className="text-blue-600 font-semibold">100% Online-First Delivery</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* ============================================================ */}
      {/* 5. OUR SERVICES SECTION (Premium Dark Navy & Colorful Gradient Cards) */}
      {/* ============================================================ */}
      <section 
        id="services" 
        className="py-24 lg:py-32 bg-gradient-to-b from-[#0B1428] via-[#0F1D3D] to-[#172554] text-white relative overflow-hidden select-none"
      >
        {/* Subtle Ambient Background Gradients for Depth */}
        <div className="absolute top-0 left-1/4 w-[600px] h-[600px] bg-blue-600/15 rounded-full blur-[140px] pointer-events-none" />
        <div className="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-indigo-600/15 rounded-full blur-[140px] pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-25 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14 relative z-10">
          
          {/* Section Header */}
          <div className="text-center max-w-3xl mx-auto space-y-4">
            <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/20 border border-blue-400/40 text-cyan-300 text-xs font-bold uppercase tracking-wider font-heading shadow-xs">
              <Sparkles className="w-4 h-4 text-cyan-300" />
              <span>Specialized Enterprise Solutions</span>
            </div>
            <h2 className="text-3xl sm:text-5xl lg:text-6xl font-black text-white font-heading tracking-tight leading-tight">
              Our Core Services & Capabilities
            </h2>
            <p className="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
              Explore our 5 core technology and business practices. Click any card to view detailed specifications, offerings, and engagement options.
            </p>
          </div>

          {/* 5 Cards Grid */}
          <div className="flex flex-wrap justify-center gap-6 sm:gap-8 max-w-6xl mx-auto items-stretch">
            {services.map((srv) => {
              const Icon = srv.icon;
              return (
                <Link
                  key={srv.id}
                  to={srv.link}
                  className={`w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] group rounded-2xl sm:rounded-3xl p-5 sm:p-7 border ${srv.borderColor} ${srv.cardGradient} shadow-xl hover:-translate-y-2.5 ${srv.glowColor} transition-all duration-300 flex flex-col justify-between text-left relative overflow-hidden cursor-pointer`}
                >
                  {/* Top Header Row: Icon + Title + Subtitle + Ribbon */}
                  <div>
                    <div className="flex flex-col sm:flex-row sm:items-start justify-between gap-3 mb-5 sm:mb-6">
                      <div className="flex items-center gap-3.5 sm:gap-4">
                        <div className="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-white/20 backdrop-blur-xs flex items-center justify-center text-white shrink-0 group-hover:scale-110 transition-transform shadow-xs">
                          <Icon className="w-6 h-6 sm:w-7 sm:h-7 stroke-[2.2]" />
                        </div>
                        <div className="min-w-0">
                          <h3 className="text-xl sm:text-2xl lg:text-3xl font-black text-white font-heading tracking-tight leading-snug">
                            {srv.title}
                          </h3>
                          <p className="text-xs sm:text-sm text-white/90 font-medium leading-tight mt-0.5 sm:mt-1">
                            {srv.subtitle}
                          </p>
                        </div>
                      </div>
                      {srv.badgeRibbon && (
                        <span className="self-start sm:self-auto shrink-0 text-[10px] sm:text-xs font-extrabold uppercase tracking-wider bg-white/20 text-white px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full border border-white/30 font-heading">
                          {srv.badgeRibbon}
                        </span>
                      )}
                    </div>

                    {/* Attractive Feature List with Translucent Circular Checkmarks */}
                    <div className="space-y-3 sm:space-y-4 mb-6 sm:mb-8">
                      {srv.features.map((feature, i) => (
                        <div key={i} className="flex items-start gap-2.5 sm:gap-3.5 text-left">
                          <div className="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-white/25 flex items-center justify-center shrink-0 shadow-2xs mt-0.5">
                            <Check className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-white stroke-[3]" />
                          </div>
                          <span className="text-xs sm:text-sm lg:text-base font-semibold text-white leading-snug sm:leading-tight">
                            {feature}
                          </span>
                        </div>
                      ))}
                    </div>
                  </div>

                  {/* Full-Width Gradient CTA Button Inside Card */}
                  <div className={`w-full py-3 sm:py-4 px-4 sm:px-6 rounded-xl sm:rounded-2xl ${srv.btnGradient} font-black text-xs sm:text-sm lg:text-base shadow-lg flex items-center justify-center gap-2 group-hover:scale-[1.02] transition-all font-heading tracking-wide`}>
                    <Sparkles className="w-4 h-4 sm:w-5 sm:h-5 text-white" />
                    <span className="text-white font-black">{srv.btnText}</span>
                    <ArrowRight className="w-4 h-4 sm:w-5 sm:h-5 text-white group-hover:translate-x-1.5 transition-transform" />
                  </div>
                </Link>
              );
            })}
          </div>

        </div>
      </section>

      {/* ============================================================ */}
      {/* 6. HORIZONTAL AUTO-SCROLLING CASE STUDIES RAIL */}
      {/* ============================================================ */}
      <AutoScrollingProjects onOpenQuote={onOpenQuote} />

      {/* ============================================================ */}
      {/* 7. CAREERS & INTERNSHIPS SECTION (Dark Navy Theme with Colorful Gradient Cards) */}
      {/* ============================================================ */}
      <section 
        id="careers" 
        className="py-24 lg:py-32 bg-gradient-to-b from-[#0B1428] via-[#0F1D3D] to-[#172554] text-white relative overflow-hidden select-none border-b border-blue-900/50"
      >
        {/* Subtle Ambient Background Gradients for Depth (Optimized for Mobile) */}
        <div className="absolute top-0 right-1/4 w-[600px] h-[600px] bg-blue-600/15 rounded-full blur-[140px] pointer-events-none hidden sm:block" />
        <div className="absolute bottom-0 left-1/4 w-[600px] h-[600px] bg-cyan-600/15 rounded-full blur-[140px] pointer-events-none hidden sm:block" />
        <div className="absolute inset-0 bg-grid-corporate opacity-25 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 sm:space-y-14 relative z-10">
          
          <div className="text-center max-w-3xl mx-auto space-y-3 sm:space-y-4">
            <div className="inline-flex items-center gap-2 px-3.5 sm:px-4 py-1.5 sm:py-2 rounded-full bg-blue-500/20 border border-blue-400/40 text-cyan-300 text-[11px] sm:text-xs font-bold uppercase tracking-wider font-heading shadow-xs">
              <Sparkles className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-cyan-300" />
              <span>We Are Hiring • Join NexTechX</span>
            </div>
            <h2 className="text-2xl sm:text-4xl lg:text-5xl font-black text-white font-heading tracking-tight leading-tight">
              Technology Internship Opportunities
            </h2>
            <p className="text-sm sm:text-base lg:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
              Hands-on, interview-based technology internships. Currently, we are offering internship opportunities. Stay connected for future updates.
            </p>
          </div>

          {/* Master Clickable Careers Showcase Card */}
          <Link
            to="/careers"
            className="group block relative w-full rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#0B1428]/95 via-[#0F1D3D]/90 to-[#172554]/95 border-2 border-blue-500/40 hover:border-cyan-400/80 shadow-xl hover:shadow-[0_25px_70px_rgba(6,182,212,0.25)] p-5 sm:p-8 lg:p-12 overflow-hidden text-left cursor-pointer transition-all duration-300"
          >
            {/* Top accent gradient bar */}
            <div className="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-500 via-cyan-400 to-indigo-500" />
            
            {/* Decorative background ambient blur */}
            <div className="absolute -top-24 -right-24 w-80 h-80 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none group-hover:bg-cyan-500/25 transition-colors hidden sm:block" />

            <div className="relative z-10 space-y-6 sm:space-y-9">
              
              {/* Header Badges + Title */}
              <div className="flex flex-col md:flex-row md:items-center justify-between gap-5 border-b border-slate-700/80 pb-5 sm:pb-7">
                <div className="space-y-2.5 sm:space-y-3">
                  <div className="flex flex-wrap items-center gap-2">
                    <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-600 text-white text-[11px] sm:text-xs font-bold font-heading shadow-xs">
                      <Sparkles className="w-3.5 h-3.5" />
                      <span>Active Internship Tracks</span>
                    </span>
                    <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 text-[11px] sm:text-xs font-bold font-heading">
                      <span className="w-2 h-2 rounded-full bg-emerald-400 animate-pulse" />
                      <span>Interview-Based Selection</span>
                    </span>
                  </div>

                  <h3 className="text-xl sm:text-3xl lg:text-4xl font-black text-white group-hover:text-cyan-300 transition-colors font-heading tracking-tight">
                    Build Practical Production Experience with NexTechX
                  </h3>
                  <p className="text-xs sm:text-base text-slate-300 max-w-2xl leading-relaxed">
                    Currently, we are offering internship opportunities across AI/ML, Full-Stack Web, Cloud DevOps, and Data Analytics. Stay connected for future updates.
                  </p>
                </div>

                {/* Primary Action Button */}
                <div className="w-full sm:w-auto shrink-0">
                  <div className="w-full sm:w-auto px-5 sm:px-7 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-gradient-to-r from-blue-600 via-sky-500 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-white font-black text-xs sm:text-base shadow-lg group-hover:shadow-[0_10px_25px_rgba(6,182,212,0.4)] flex items-center justify-center gap-2 sm:gap-2.5 transition-all font-heading">
                    <span>Explore Internships & Apply</span>
                    <ArrowRight className="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1.5 transition-transform" />
                  </div>
                </div>
              </div>

              {/* 4 Colorful Gradient Domain Preview Cards (Services Type Design) */}
              <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {/* 1. AI & Machine Learning - Blue Gradient */}
                <div className="p-6 rounded-2xl bg-gradient-to-br from-[#2563EB] via-[#1D4ED8] to-[#1E3A8A] border border-blue-400/40 text-white shadow-xl hover:-translate-y-2 hover:shadow-[0_15px_35px_rgba(37,99,235,0.45)] transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                  <div className="space-y-3">
                    <div className="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-xs flex items-center justify-center font-bold text-white shadow-xs">
                      <Bot className="w-6 h-6 stroke-[2.2]" />
                    </div>
                    <h4 className="text-lg sm:text-xl font-black text-white font-heading">AI & Machine Learning</h4>
                    <p className="text-xs sm:text-sm text-white/90 leading-snug font-normal">
                      Build smart AI chatbots, RAG search engines, and real-time machine learning applications.
                    </p>
                  </div>
                  <div>
                    <span className="inline-block px-3 py-1 rounded-full bg-white/20 border border-white/25 text-xs font-bold text-white font-heading">
                      Live AI Agent Project
                    </span>
                  </div>
                </div>

                {/* 2. Full Stack Development - Purple Gradient */}
                <div className="p-6 rounded-2xl bg-gradient-to-br from-[#7C3AED] via-[#6D28D9] to-[#4C1D95] border border-purple-400/40 text-white shadow-xl hover:-translate-y-2 hover:shadow-[0_15px_35px_rgba(124,58,237,0.45)] transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                  <div className="space-y-3">
                    <div className="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-xs flex items-center justify-center font-bold text-white shadow-xs">
                      <Code2 className="w-6 h-6 stroke-[2.2]" />
                    </div>
                    <h4 className="text-lg sm:text-xl font-black text-white font-heading">Full Stack Development</h4>
                    <p className="text-xs sm:text-sm text-white/90 leading-snug font-normal">
                      Build modern web applications from scratch using React, Node.js, and databases.
                    </p>
                  </div>
                  <div>
                    <span className="inline-block px-3 py-1 rounded-full bg-white/20 border border-white/25 text-xs font-bold text-white font-heading">
                      Web SaaS Capstone
                    </span>
                  </div>
                </div>

                {/* 3. Data Analytics & Power BI - Emerald Gradient */}
                <div className="p-6 rounded-2xl bg-gradient-to-br from-[#059669] via-[#047857] to-[#064E3B] border border-emerald-400/40 text-white shadow-xl hover:-translate-y-2 hover:shadow-[0_15px_35px_rgba(5,150,105,0.45)] transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                  <div className="space-y-3">
                    <div className="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-xs flex items-center justify-center font-bold text-white shadow-xs">
                      <Layers className="w-6 h-6 stroke-[2.2]" />
                    </div>
                    <h4 className="text-lg sm:text-xl font-black text-white font-heading">Data Analytics & Power BI</h4>
                    <p className="text-xs sm:text-sm text-white/90 leading-snug font-normal">
                      Analyze business data, create interactive dashboards, and report key business metrics.
                    </p>
                  </div>
                  <div>
                    <span className="inline-block px-3 py-1 rounded-full bg-white/20 border border-white/25 text-xs font-bold text-white font-heading">
                      Executive BI Dashboard
                    </span>
                  </div>
                </div>

                {/* 4. Cybersecurity & Cloud - Cyan Gradient */}
                <div className="p-6 rounded-2xl bg-gradient-to-br from-[#0284C7] via-[#0369A1] to-[#1E3A8A] border border-cyan-400/40 text-white shadow-xl hover:-translate-y-2 hover:shadow-[0_15px_35px_rgba(2,132,199,0.45)] transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                  <div className="space-y-3">
                    <div className="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-xs flex items-center justify-center font-bold text-white shadow-xs">
                      <ShieldCheck className="w-6 h-6 stroke-[2.2]" />
                    </div>
                    <h4 className="text-lg sm:text-xl font-black text-white font-heading">Cybersecurity & Cloud</h4>
                    <p className="text-xs sm:text-sm text-white/90 leading-snug font-normal">
                      Learn cloud deployment on AWS, server protection, and practical IT security practices.
                    </p>
                  </div>
                  <div>
                    <span className="inline-block px-3 py-1 rounded-full bg-white/20 border border-white/25 text-xs font-bold text-white font-heading">
                      Cloud Defense Capstone
                    </span>
                  </div>
                </div>

              </div>

              {/* Bottom Perks & Action Footnote */}
              <div className="pt-6 border-t border-slate-700/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-sm text-slate-200 font-semibold">
                <div className="flex flex-wrap items-center gap-4 sm:gap-6">
                  <span className="flex items-center gap-2">
                    <CheckCircle2 className="w-5 h-5 text-emerald-400 shrink-0" />
                    <span>ISO-Aligned Certificate</span>
                  </span>
                  <span className="flex items-center gap-2">
                    <CheckCircle2 className="w-5 h-5 text-emerald-400 shrink-0" />
                    <span>Letter of Recommendation</span>
                  </span>
                  <span className="flex items-center gap-2">
                    <CheckCircle2 className="w-5 h-5 text-emerald-400 shrink-0" />
                    <span>1-on-1 Code Reviews</span>
                  </span>
                  <span className="flex items-center gap-2">
                    <CheckCircle2 className="w-5 h-5 text-emerald-400 shrink-0" />
                    <span>Live Client Project</span>
                  </span>
                </div>

                <span className="text-cyan-400 group-hover:text-cyan-300 font-bold group-hover:underline flex items-center gap-1.5 shrink-0 font-heading">
                  <span>Click to view syllabus & Apply Online</span>
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                </span>
              </div>

            </div>
          </Link>

        </div>
      </section>

      {/* ============================================================ */}
      {/* 8. WHY CHOOSE US SECTION (Pure White Background) */}
      {/* ============================================================ */}
      <section id="why-choose-us" className="py-20 lg:py-24 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-3xl mx-auto space-y-3.5">
            <span className="text-xs uppercase tracking-widest font-extrabold text-blue-600 font-heading">
              Proven Reliability
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-slate-900 font-heading tracking-tight">
              Why Choose Us
            </h2>
            <p className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
              We operate with corporate discipline, measurable accountability, and unyielding focus on delivery success.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
            {whyChooseUs.map((pillar, idx) => {
              const Icon = pillar.icon;
              return (
                <div
                  key={idx}
                  className="p-7 rounded-2xl bg-white border border-slate-200/90 shadow-xs hover:shadow-md hover:border-blue-300 transition-all space-y-3.5"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-lg font-bold text-slate-900 font-heading">
                    {pillar.title}
                  </h3>
                  <p className="text-sm text-slate-600 leading-relaxed font-normal">
                    {pillar.desc}
                  </p>
                </div>
              );
            })}

            {/* Sixth Card: Free Technical Advisory */}
            <div className="p-7 rounded-2xl bg-blue-600 text-white shadow-sm space-y-4 flex flex-col justify-between">
              <div className="space-y-3">
                <span className="text-xs font-bold uppercase tracking-wider bg-white/20 px-2.5 py-1 rounded inline-block font-heading">
                  No-Obligation Discovery
                </span>
                <h3 className="text-xl font-bold font-heading">
                  30-Min Technical Architecture Discovery
                </h3>
                <p className="text-sm text-blue-100 leading-relaxed">
                  Discuss your project scope, AI automation requirements, or custom software timeline with our technical solutions leads.
                </p>
              </div>
              <div>
                <button
                  onClick={onOpenConsultation}
                  className="w-full py-3.5 rounded-xl bg-white text-blue-600 font-bold text-sm hover:bg-slate-50 transition-colors font-heading shadow-xs"
                >
                  Schedule Advisory Call
                </button>
              </div>
            </div>
          </div>

        </div>
      </section>

      {/* ============================================================ */}
      {/* 9. CONTACT US SECTION (Soft Blue Theme) */}
      {/* ============================================================ */}
      <section 
        id="contact" 
        className="py-20 lg:py-28 bg-gradient-to-b from-slate-50 to-blue-50/40 border-t border-slate-200/80"
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-2xl mx-auto space-y-3.5">
            <span className="text-xs uppercase tracking-widest font-extrabold text-blue-600 font-heading">
              Get in Touch
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-slate-900 font-heading tracking-tight">
              Connect with Our Solutions Team
            </h2>
            <p className="text-base sm:text-lg text-slate-600">
              Have an IT project, need custom AI automation, or inquiring about internships? Fill in the details below.
            </p>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {/* Form (7 cols) */}
            <div className="lg:col-span-7 p-7 sm:p-10 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-6 text-left">
              <div>
                <h3 className="text-2xl font-bold text-slate-900 font-heading">Send a Business Inquiry</h3>
                <p className="text-sm text-slate-500 mt-1">
                  Our engineering and advisory team will review and respond within 24 hours.
                </p>
              </div>

              {success ? (
                <div className="py-12 text-center space-y-3.5 animate-in fade-in duration-200">
                  <div className="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto border border-emerald-200">
                    <CheckCircle2 className="w-9 h-9" />
                  </div>
                  <h4 className="text-xl font-bold text-slate-900 font-heading">Inquiry Transmitted Successfully</h4>
                  <p className="text-sm text-slate-600 max-w-sm mx-auto">
                    Thank you for reaching out. A Technical Solutions Architect will connect with you shortly.
                  </p>
                </div>
              ) : (
                <form onSubmit={handleSubmit} className="space-y-4">
                  {error && (
                    <div className="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-600 text-sm flex items-center gap-2">
                      <AlertCircle className="w-4 h-4 shrink-0" />
                      <span>{error}</span>
                    </div>
                  )}

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Your Full Name *</label>
                      <input
                        type="text"
                        required
                        value={formData.name}
                        onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                        placeholder="e.g. Elena Rostova"
                        className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                      />
                    </div>
                    <div>
                      <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Business Email Address *</label>
                      <input
                        type="email"
                        required
                        value={formData.email}
                        onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                        placeholder="elena@company.com"
                        className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                      />
                    </div>
                  </div>

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Phone / WhatsApp Number</label>
                      <input
                        type="tel"
                        value={formData.phone}
                        onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                        placeholder="+91 93098 35085"
                        className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                      />
                    </div>
                    <div>
                      <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Company / University / Institute</label>
                      <input
                        type="text"
                        value={formData.company}
                        onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                        placeholder="Organization Name"
                        className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                      />
                    </div>
                  </div>

                  <div>
                    <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Area of Interest *</label>
                    <select
                      value={formData.service_interest}
                      onChange={(e) => setFormData({ ...formData, service_interest: e.target.value })}
                      className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors font-medium"
                    >
                      <option value="AI Automation Solutions">AI Automation & Autonomous Agents</option>
                      <option value="IT & Software Solutions">IT & Software Solutions (Web/Cloud/DevOps)</option>
                      <option value="Internship Programs">Internship Opportunities</option>
                      <option value="Other / General Partnership">Other / General Partnership</option>
                    </select>
                  </div>

                  <div>
                    <label className="block text-sm font-bold text-slate-700 mb-1.5 font-heading">Project Scope / Technical Requirements *</label>
                    <textarea
                      rows={4}
                      required
                      value={formData.message}
                      onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                      placeholder="Briefly describe your objectives, data requirements, tech stack, or expected timeline..."
                      className="w-full bg-slate-50/60 border border-slate-200 rounded-xl p-4 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white resize-none transition-colors"
                    />
                  </div>

                  <div className="pt-2">
                    <button
                      type="submit"
                      disabled={loading}
                      className="w-full py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-base shadow-md flex items-center justify-center gap-2.5 transition-all disabled:opacity-50 font-heading"
                    >
                      {loading ? (
                        <>
                          <Loader2 className="w-5 h-5 animate-spin" />
                          <span>Transmitting Inquiry...</span>
                        </>
                      ) : (
                        <>
                          <Send className="w-5 h-5" />
                          <span>Send Inquiry</span>
                        </>
                      )}
                    </button>
                  </div>
                </form>
              )}
            </div>

            {/* Direct Channels (5 cols) */}
            <div className="lg:col-span-5 space-y-6 text-left">
              <div className="p-7 sm:p-8 rounded-2xl bg-white border border-slate-200 space-y-6 shadow-sm">
                <h3 className="text-lg font-bold text-slate-900 flex items-center gap-2 font-heading">
                  <Sparkles className="w-5 h-5 text-blue-600" />
                  <span>Immediate Channels</span>
                </h3>

                <div className="space-y-3.5">
                  <a
                    href={siteConfig.whatsappUrl}
                    target="_blank"
                    rel="noreferrer"
                    className="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 hover:border-emerald-400 transition-all flex items-center gap-4 group"
                  >
                    <div className="p-3 rounded-xl bg-emerald-100 text-emerald-700 group-hover:scale-105 transition-transform">
                      <MessageSquare className="w-5 h-5" />
                    </div>
                    <div>
                      <div className="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition-colors font-heading">
                        Chat on Official WhatsApp
                      </div>
                      <div className="text-xs text-slate-500 mt-0.5">
                        Average response time: &lt; 15 minutes
                      </div>
                    </div>
                  </a>

                  <div className="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-1">
                    <div className="flex items-center gap-2 text-blue-600 text-xs font-bold uppercase tracking-wider font-heading">
                      <Mail className="w-4 h-4" />
                      <span>Direct Inquiries Email:</span>
                    </div>
                    <a href={`mailto:${siteConfig.email}`} className="text-sm text-slate-800 hover:text-blue-600 transition-colors block font-semibold">
                      {siteConfig.email}
                    </a>
                  </div>

                  <div className="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-1">
                    <div className="flex items-center gap-2 text-indigo-600 text-xs font-bold uppercase tracking-wider font-heading">
                      <Phone className="w-4 h-4" />
                      <span>Enterprise Desk Helpline:</span>
                    </div>
                    <a href={`tel:${siteConfig.phoneTel || siteConfig.phone}`} className="text-sm text-slate-800 hover:text-indigo-600 transition-colors block font-semibold">
                      {siteConfig.phone}
                    </a>
                  </div>
                </div>

                <div className="pt-2 space-y-2.5">
                  <button
                    onClick={onOpenQuote}
                    className="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold flex items-center justify-center gap-2 transition-all shadow-sm font-heading"
                  >
                    <Sparkles className="w-4 h-4 text-blue-200" />
                    <span>Request a Quotation</span>
                  </button>
                  <button
                    onClick={onOpenConsultation}
                    className="w-full py-3.5 rounded-xl bg-white border border-slate-200 hover:border-blue-500 hover:bg-blue-50/50 text-slate-800 hover:text-blue-700 text-sm font-bold flex items-center justify-center gap-2 transition-all shadow-xs font-heading"
                  >
                    <Clock className="w-4 h-4 text-blue-600" />
                    <span>Book 30-Min Strategy Call</span>
                  </button>
                </div>
              </div>

              {/* Connect With Us Online */}
              <div className="p-7 sm:p-8 rounded-2xl bg-white border border-slate-200 space-y-4 shadow-sm text-sm">
                <h3 className="font-bold text-slate-900 flex items-center gap-2 font-heading">
                  <Globe2 className="w-5 h-5 text-blue-600" />
                  <span>Connect With Us Online</span>
                </h3>

                <div className="space-y-3">
                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5 text-sm font-heading">100% Online-First Delivery:</strong>
                    <p className="text-slate-600 leading-relaxed text-xs">
                      We operate entirely online as a modern digital technology firm, delivering AI automation, enterprise web applications, and scalable cloud solutions worldwide without geographical borders.
                    </p>
                  </div>
                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5 text-sm font-heading">Seamless Digital Collaboration:</strong>
                    <p className="text-slate-600 leading-relaxed text-xs">
                      Collaborate directly with our solution architects and software engineers via WhatsApp, scheduled Google Meet sessions, email, and live git repositories.
                    </p>
                  </div>
                </div>

                <div className="pt-2 flex items-center gap-2 text-emerald-700 text-xs font-bold">
                  <ShieldCheck className="w-4 h-4 text-emerald-600" />
                  <span>All Inquiries Protected by Mutual Enterprise NDA</span>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section>

    </div>
  );
}
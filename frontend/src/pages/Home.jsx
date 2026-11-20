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
  Lock
} from 'lucide-react';
import HeroTechIllustration from '../components/HeroTechIllustration';
import TechMarquee from '../components/TechMarquee';
import AutoScrollingProjects from '../components/AutoScrollingProjects';
import { siteConfig } from '../config/siteConfig';
import { api } from '../services/api';
import confetti from 'canvas-confetti';

export default function Home({ onOpenQuote, onOpenConsultation, onOpenRegister }) {

  // 4 Specialized Core Services (with vibrant card gradients matching reference 2x2 design)
  const services = [
    {
      id: "ai-automation",
      title: "AI Automation Solutions",
      subtitle: "Smart AI chatbots and automated business workflows",
      desc: "We build custom AI assistants, WhatsApp chatbots, and automated workflows to save time and reduce business costs.",
      icon: Bot,
      link: "/ai-automation",
      cardGradient: "bg-gradient-to-br from-[#2563EB] via-[#1D4ED8] to-[#1E3A8A]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(37,99,235,0.45)]",
      borderColor: "border-blue-400/30 hover:border-blue-300",
      btnGradient: "bg-gradient-to-r from-[#06b6d4] to-[#0ea5e9] hover:from-[#22d3ee] hover:to-[#38bdf8] text-white",
      btnText: "Explore AI Automation",
      features: [
        "Custom AI Chatbots & Smart Assistants",
        "WhatsApp & CRM Customer Support Bots",
        "Automated Business Workflows",
        "Fast Document & Invoice Data Processing"
      ]
    },
    {
      id: "it-services",
      title: "Software & Web Development",
      subtitle: "Custom websites and web apps built for your business",
      desc: "Custom web platforms, mobile apps, secure cloud infrastructure, and interactive business dashboards.",
      icon: Code2,
      link: "/it-services",
      cardGradient: "bg-gradient-to-br from-[#7C3AED] via-[#6D28D9] to-[#4C1D95]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(124,58,237,0.45)]",
      borderColor: "border-purple-400/30 hover:border-purple-300",
      btnGradient: "bg-gradient-to-r from-[#a855f7] to-[#9333ea] hover:from-[#c084fc] hover:to-[#a855f7] text-white",
      btnText: "Get Your Software Built",
      features: [
        "Custom Web & Mobile Applications",
        "Fast, Secure & Scalable Cloud Systems",
        "Business Dashboards & Analytics",
        "High Quality at Transparent & Fair Pricing"
      ]
    },
    {
      id: "research-publication",
      title: "Research Paper Publication",
      subtitle: "Complete support to write and publish research papers",
      desc: "Step-by-step guidance for students, faculty, and PhD scholars to publish papers in top global journals.",
      icon: BookOpen,
      link: "/research-publication",
      cardGradient: "bg-gradient-to-br from-[#EA580C] via-[#DC2626] to-[#991B1B]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(234,88,12,0.45)]",
      borderColor: "border-orange-400/30 hover:border-orange-300",
      btnGradient: "bg-gradient-to-r from-[#f97316] to-[#ea580c] hover:from-[#fb923c] hover:to-[#f97316] text-white",
      btnText: "Publish Your Research Paper",
      badgeRibbon: "100+ Papers Published",
      features: [
        "100+ Papers Published in Scopus & IEEE",
        "Topic Selection & Proposal Writing Guidance",
        "Literature Review & Paper Structuring",
        "Plagiarism Check & Verification (Turnitin < 10%)"
      ]
    },
    {
      id: "careers",
      title: "Internship Opportunities",
      subtitle: "Hands-On Technical Internships & Real Projects",
      desc: "Work on live IT systems, modern AI applications, and enterprise web software guided by experienced engineering leads and mentors.",
      icon: GraduationCap,
      link: "/careers",
      cardGradient: "bg-gradient-to-br from-[#0284C7] via-[#0369A1] to-[#1E3A8A]",
      glowColor: "hover:shadow-[0_20px_50px_rgba(2,132,199,0.45)]",
      borderColor: "border-cyan-400/30 hover:border-cyan-300",
      btnGradient: "bg-gradient-to-r from-[#0284c7] to-[#0ea5e9] hover:from-[#38bdf8] hover:to-[#0284c7] text-white",
      btnText: "Explore Internship Opportunities",
      badgeRibbon: "Open Now",
      features: [
        "Hands-On IT & AI Project Mentorship",
        "Work on 100% Real-World Client Systems",
        "Official Certificate & Recommendation Letter",
        "One-on-One Code Reviews and Guidance"
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

  // Autoplay-safe video ref for high cross-browser compatibility
  const videoRef = useRef(null);
  useEffect(() => {
    if (videoRef.current) {
      videoRef.current.defaultMuted = true;
      videoRef.current.muted = true;
      videoRef.current.play().catch(() => {});
    }
  }, []);

  return (
    <div className="bg-white text-slate-800 font-sans">
      
      {/* ============================================================ */}
      {/* 1. HERO SECTION (Premium International AI & Tech Animated Video Theme) */}
      {/* ============================================================ */}
      <section 
        id="hero" 
        className="relative pt-6 sm:pt-16 pb-16 lg:pb-28 overflow-hidden bg-[#060c1d] border-b border-blue-950/80 text-white"
      >
        {/* 1. Premium Animated Video Background with Seamless Loop & Mobile-First Source Ordering (Layer 0) */}
        <div className="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-0">
          <video
            ref={videoRef}
            autoPlay
            loop
            muted
            playsInline
            preload="metadata"
            poster="/images/hero-video-poster.webp"
            className="w-full h-full object-cover object-center scale-105 transform will-change-transform opacity-60 mix-blend-screen transition-opacity duration-1000"
          >
            {/* Mobile Video First for 4G/5G mobile bandwidth efficiency */}
            <source src="/videos/hero-ai-network-mobile.mp4" type="video/mp4" media="(max-width: 768px)" />
            <source src="/videos/hero-ai-network.mp4" type="video/mp4" />
            {/* Fallback Static WebP Image */}
            <img 
              src="/images/hero-video-poster.webp" 
              alt="AI Technology & Neural Network" 
              className="w-full h-full object-cover object-center opacity-45" 
            />
          </video>
        </div>

        {/* 2. Dark Navy Multi-Layer Gradient Overlays for Crystal-Clear Text Readability (Layer 1) */}
        <div className="absolute inset-0 bg-gradient-to-b from-[#060c1d]/90 via-[#071330]/75 to-[#0b1c44]/95 pointer-events-none z-10" />
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_35%_40%,rgba(6,12,29,0.3)_0%,rgba(6,12,29,0.85)_80%)] pointer-events-none z-10" />

        {/* 3. Glowing Ambient Volumetric Accents (Hidden on mobile to eliminate GPU rasterization lag) */}
        <div className="absolute top-0 right-0 w-[650px] h-[550px] bg-gradient-to-bl from-cyan-500/20 via-blue-600/15 to-transparent rounded-full blur-[120px] pointer-events-none z-10 animate-pulse-slow hidden sm:block" />
        <div className="absolute top-1/3 -left-32 w-[550px] h-[550px] bg-gradient-to-tr from-indigo-600/20 via-blue-700/15 to-transparent rounded-full blur-[130px] pointer-events-none z-10 hidden sm:block" />
        <div className="absolute bottom-0 right-1/4 w-[450px] h-[300px] bg-blue-500/10 rounded-full blur-[100px] pointer-events-none z-10 hidden sm:block" />
        
        {/* 4. Subtle Futuristic Tech Matrix Grid Overlay (Layer 1) */}
        <div 
          className="absolute inset-0 pointer-events-none z-10 opacity-20"
          style={{
            backgroundImage: `radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px), linear-gradient(to right, rgba(59, 130, 246, 0.05) 1px, transparent 1px), linear-gradient(to bottom, rgba(59, 130, 246, 0.05) 1px, transparent 1px)`,
            backgroundSize: '24px 24px, 48px 48px, 48px 48px',
            maskImage: 'radial-gradient(ellipse 85% 75% at 50% 35%, #000 60%, transparent 100%)'
          }}
        />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 items-center min-h-[480px] sm:min-h-[580px]">
            
            {/* Left Content Column (7 cols) */}
            <motion.div 
              initial={{ opacity: 0, y: 25 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, ease: "easeOut" }}
              className="lg:col-span-7 space-y-5 sm:space-y-7 text-left"
            >
              
              {/* Eyebrow Badges: Glowing Tech Pills */}
              <div className="flex flex-wrap items-center gap-2 sm:gap-3">
                <div className="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1 sm:py-1.5 rounded-full bg-blue-500/15 border border-blue-400/35 text-cyan-300 text-[11px] sm:text-sm font-semibold tracking-wide backdrop-blur-md shadow-xs font-heading">
                  <Sparkles className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-cyan-400" />
                  <span>Technology & Innovation</span>
                </div>
                <div className="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1 sm:py-1.5 rounded-full bg-indigo-500/15 border border-indigo-400/35 text-indigo-200 text-[11px] sm:text-sm font-semibold tracking-wide backdrop-blur-md shadow-xs font-heading">
                  <Zap className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-indigo-400" />
                  <span>AI-Powered Solutions</span>
                </div>
              </div>

              {/* Bold Headline with Electric Cyan/Blue Highlight */}
              <h1 className="text-2xl xs:text-3xl sm:text-5xl lg:text-5xl xl:text-[4rem] font-black text-white tracking-tight leading-[1.12] sm:leading-[1.08] font-heading">
                Architecting Tomorrow with{' '}
                <span className="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-sky-300 to-blue-400 drop-shadow-[0_0_25px_rgba(6,182,212,0.35)] mt-1">
                  Intelligent AI & Advanced IT Solutions
                </span>
              </h1>

              {/* Concise 2-Line Description */}
              <p className="text-sm sm:text-lg lg:text-xl text-slate-300 max-w-xl leading-relaxed font-normal">
                Empowering businesses through intelligent automation, innovative software and next-generation technology solutions.
              </p>

              {/* Action Buttons: Explore Services and Contact Us */}
              <div className="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3 sm:gap-4">
                <a
                  href="#services"
                  onClick={(e) => scrollToSection(e, 'services')}
                  className="w-full sm:w-auto px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-white font-bold text-sm sm:text-base shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 active:scale-95 font-heading group"
                >
                  <span>Explore Services</span>
                  <ArrowRight className="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform" />
                </a>

                <a
                  href="#contact"
                  onClick={(e) => scrollToSection(e, 'contact')}
                  className="w-full sm:w-auto px-6 sm:px-7 py-3.5 sm:py-4 rounded-xl bg-slate-900/80 hover:bg-slate-800 text-white border border-slate-700/80 hover:border-cyan-400/60 font-bold text-sm sm:text-base transition-all duration-300 flex items-center justify-center gap-2 shadow-sm active:scale-95 font-heading group"
                >
                  <span>Contact Us</span>
                  <ChevronRight className="w-4 h-4 sm:w-5 sm:h-5 text-slate-400 group-hover:translate-x-1 group-hover:text-cyan-400 transition-all" />
                </a>
              </div>

              {/* Enterprise Micro Trust Row */}
              <div className="pt-4 flex flex-wrap items-center gap-6 text-xs text-slate-400 font-medium border-t border-slate-800/80">
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]" />
                  <span>99.9% Uptime SLA</span>
                </div>
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-cyan-400 shadow-[0_0_8px_rgba(6,182,212,0.8)]" />
                  <span>Enterprise AI Architecture</span>
                </div>
                <div className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_rgba(129,140,248,0.8)]" />
                  <span>100% NDA & Data Privacy</span>
                </div>
              </div>

            </motion.div>

            {/* Right Technology Visual (5 cols) */}
            <motion.div 
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 0.7, ease: "easeOut", delay: 0.2 }}
              className="lg:col-span-5 flex items-center justify-center"
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
              Explore our core technology practices, engineering pods, and certified publication advisory. Click any card to view detailed specifications, workflows, and inquiry options.
            </p>
          </div>

          {/* 4 Colorful Gradient Cards in a 2x2 Grid (Responsive on all viewports) */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 lg:gap-10 max-w-5xl mx-auto items-stretch">
            {services.map((srv) => {
              const Icon = srv.icon;
              return (
                <Link
                  key={srv.id}
                  to={srv.link}
                  className={`w-full group rounded-2xl sm:rounded-3xl p-5 sm:p-8 lg:p-9 border ${srv.borderColor} ${srv.cardGradient} shadow-xl hover:-translate-y-2.5 ${srv.glowColor} transition-all duration-300 flex flex-col justify-between text-left relative overflow-hidden cursor-pointer`}
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
              <span>We Are Hiring • Join NextTechX</span>
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
                    Build Practical Production Experience with NextTechX
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
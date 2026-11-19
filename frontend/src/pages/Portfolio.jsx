import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { 
  Briefcase, 
  Sparkles, 
  CheckCircle2, 
  Layers, 
  Bot, 
  Code2, 
  BookOpen, 
  TrendingUp, 
  ShieldCheck, 
  ArrowRight,
  PhoneCall,
  Clock,
  Filter,
  Award,
  FileText,
  Cloud,
  Database,
  Zap,
  ChevronRight,
  Cpu,
  Lock,
  Globe2,
  ExternalLink,
  X,
  Eye,
  Check,
  Send,
  MapPin,
  FileSpreadsheet
} from 'lucide-react';
import { api } from '../services/api';
import { siteConfig } from '../config/siteConfig';

export default function Portfolio({ onOpenQuote, onOpenConsultation }) {
  const [portfolio, setPortfolio] = useState([]);
  const [activeCategory, setActiveCategory] = useState('All');
  const [loading, setLoading] = useState(true);
  const [selectedProject, setSelectedProject] = useState(null);

  // Clear, genuine project deliverables written in simple English with rich visual mockup specs
  const fallbackProjects = [
    {
      id: "proj-1",
      title: "WhatsApp AI Customer Support Bot",
      category: "AI & Chatbots",
      domain: "Banking & Financial Services",
      metrics: "Answers 84% of customer questions automatically 24/7",
      description: "A smart WhatsApp assistant that answers customer questions instantly. It checks account balances, shares loan status, and hands over complex questions to human staff when needed.",
      technologies: ["WhatsApp Business", "OpenAI GPT", "Python FastAPI", "PostgreSQL"],
      highlight: "Instant answers with zero waiting time on WhatsApp.",
      deliveryTime: "2 Weeks",
      mockupType: "whatsapp",
      colorGradient: "from-emerald-600 via-teal-600 to-cyan-700",
      accentBg: "bg-emerald-50 text-emerald-700 border-emerald-200"
    },
    {
      id: "proj-2",
      title: "Online Shipping & Vehicle Tracking Portal",
      category: "Websites & Apps",
      domain: "Transport & Logistics",
      metrics: "Made vehicle dispatch 40% faster with live tracking",
      description: "A clean web dashboard for tracking delivery trucks on a live map. Helps dispatchers plan faster delivery routes, assign drivers, and share digital receipts with customers.",
      technologies: ["React.js", "Python FastAPI", "Live Maps API", "Cloud VPS"],
      highlight: "Drivers and office staff stay updated in real time.",
      deliveryTime: "3 Weeks",
      mockupType: "tracking",
      colorGradient: "from-blue-600 via-indigo-600 to-slate-900",
      accentBg: "bg-blue-50 text-blue-700 border-blue-200"
    },
    {
      id: "proj-3",
      title: "Cloud Infrastructure & CI/CD Microservices",
      category: "Websites & Apps",
      domain: "FinTech & Cloud Platforms",
      metrics: "Reduced deployment downtime by 99.9% with automated rollbacks",
      description: "Automated Docker and Kubernetes deployment pipeline on AWS with GitHub Actions, Terraform provisioning, and continuous health monitoring.",
      technologies: ["AWS EKS", "Docker", "GitHub Actions", "Terraform", "PostgreSQL"],
      highlight: "Zero-downtime rolling updates and automated scaling.",
      deliveryTime: "3 Weeks",
      mockupType: "tracking",
      colorGradient: "from-purple-600 via-indigo-600 to-slate-900",
      accentBg: "bg-purple-50 text-purple-700 border-purple-200"
    },
    {
      id: "proj-4",
      title: "Automatic Bill & Medical Invoice Reader",
      category: "AI & Chatbots",
      domain: "Healthcare & Clinics",
      metrics: "Saves 90% of paperwork time; reads bills in under 5 minutes",
      description: "A smart document reader that scans doctor bills, patient forms, and medicine receipts. It automatically pulls out names, dates, test names, and costs without typing by hand.",
      technologies: ["AI Document OCR", "Python", "SQLite / Postgres", "Secure Cloud"],
      highlight: "Private patient data stays safe and encrypted.",
      deliveryTime: "2 Weeks",
      mockupType: "invoice",
      colorGradient: "from-indigo-600 via-purple-600 to-slate-900",
      accentBg: "bg-indigo-50 text-indigo-700 border-indigo-200"
    },
    {
      id: "proj-5",
      title: "Business Sales & Profit Dashboard",
      category: "Data Dashboards",
      domain: "Shops & E-Commerce",
      metrics: "Gives shop owners daily sales and profit numbers in one place",
      description: "A clear visual dashboard made in Power BI. Shows shop owners which items sell fastest, daily profits, and inventory levels across multiple store locations.",
      technologies: ["Power BI", "Excel & SQL", "Automated Reports", "Python"],
      highlight: "Simple color-coded charts that anyone can understand.",
      deliveryTime: "1 - 2 Weeks",
      mockupType: "dashboard",
      colorGradient: "from-cyan-600 via-blue-600 to-indigo-900",
      accentBg: "bg-cyan-50 text-cyan-700 border-cyan-200"
    },
    {
      id: "proj-6",
      title: "Computer Vision & Image Tagging Tool",
      category: "AI & Chatbots",
      domain: "Security & Drone Cameras",
      metrics: "99.8% tagging accuracy across thousands of photos",
      description: "An AI tool that automatically spots and boxes cars, people, and objects in camera and drone photos. Used for outdoor security and traffic monitoring.",
      technologies: ["OpenCV", "AI Vision Models", "Python", "Quality Checks"],
      highlight: "High accuracy even in low-light and night photos.",
      deliveryTime: "3 Weeks",
      mockupType: "vision",
      colorGradient: "from-violet-600 via-purple-600 to-slate-900",
      accentBg: "bg-violet-50 text-violet-700 border-violet-200"
    }
  ];

  useEffect(() => {
    setLoading(true);
    api.getPortfolio()
      .then(data => {
        setPortfolio(fallbackProjects);
      })
      .catch(() => {
        setPortfolio(fallbackProjects);
      })
      .finally(() => {
        setLoading(false);
      });
  }, []);

  const categories = [
    { label: 'All Projects', value: 'All', count: fallbackProjects.length },
    { label: 'AI & Chatbots', value: 'AI & Chatbots', icon: Bot, count: fallbackProjects.filter(p => p.category === 'AI & Chatbots').length },
    { label: 'Websites & Apps', value: 'Websites & Apps', icon: Code2, count: fallbackProjects.filter(p => p.category === 'Websites & Apps').length },
    { label: 'Data Dashboards', value: 'Data Dashboards', icon: TrendingUp, count: fallbackProjects.filter(p => p.category === 'Data Dashboards').length },
  ];

  const filteredProjects = activeCategory === 'All' 
    ? portfolio 
    : portfolio.filter(p => p.category === activeCategory);

  const simpleGuarantees = [
    {
      icon: ShieldCheck,
      title: "100% Privacy & NDA",
      desc: "We sign a legal agreement before we start. Your idea, files, and project details stay 100% private."
    },
    {
      icon: Code2,
      title: "You Own All Code",
      desc: "When the project is finished, you own every line of code, design, and file. No hidden monthly software fees."
    },
    {
      icon: Award,
      title: "Production-Tested Code",
      desc: "Every line of code is rigorously tested with automated unit, integration, and security checks before deployment."
    },
    {
      icon: Zap,
      title: "Clear & Fair Pricing",
      desc: "We give you a fixed price in Indian Rupees (₹) upfront. You only pay for what was agreed, with zero surprises."
    }
  ];

  // Render stylized interactive preview mockup headers for each project
  const renderCardMockup = (project) => {
    switch (project.mockupType) {
      case 'whatsapp':
        return (
          <div className="relative h-44 bg-gradient-to-br from-emerald-900 via-teal-900 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <div className="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-emerald-300">WhatsApp AI Assistant</span>
              </div>
              <span className="text-[10px] bg-emerald-950/80 border border-emerald-600/40 text-emerald-300 px-2 py-0.5 rounded-full font-mono font-bold">
                24/7 Live
              </span>
            </div>
            
            {/* Simulated Chat Bubbles */}
            <div className="space-y-2 relative z-10 max-w-[90%]">
              <div className="bg-white/10 backdrop-blur-xs border border-white/10 text-[11px] text-slate-200 p-2 rounded-xl rounded-tl-xs shadow-xs">
                💬 "Hi, what is my account balance?"
              </div>
              <div className="bg-emerald-600/90 text-[11px] text-white p-2 rounded-xl rounded-tr-xs shadow-xs ml-auto max-w-[85%] text-right font-medium">
                ⚡ "Your balance is ₹24,500. Anything else?"
              </div>
            </div>

            <div className="flex items-center justify-between text-[10px] text-emerald-200/80 pt-1 border-t border-emerald-800/40 relative z-10 font-mono">
              <span>Avg Response: 0.8s</span>
              <span>100% Automated</span>
            </div>
          </div>
        );

      case 'tracking':
        return (
          <div className="relative h-44 bg-gradient-to-br from-blue-900 via-indigo-950 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <MapPin className="w-3.5 h-3.5 text-blue-400" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-blue-300">Fleet Dispatch GPS</span>
              </div>
              <span className="text-[10px] bg-blue-950/80 border border-blue-500/40 text-blue-300 px-2 py-0.5 rounded-full font-mono font-bold">
                Live Route
              </span>
            </div>

            {/* Simulated GPS Transit Route */}
            <div className="relative z-10 p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/10 space-y-1.5">
              <div className="flex items-center justify-between text-xs font-bold text-white">
                <span>Truck #MH-12-AB-1024</span>
                <span className="text-emerald-400 text-[10px] font-mono">On Time</span>
              </div>
              <div className="w-full bg-slate-800 h-1.5 rounded-full overflow-hidden">
                <div className="bg-blue-400 h-full w-3/4 rounded-full" />
              </div>
              <div className="flex justify-between text-[10px] text-slate-300 font-mono">
                <span>Origin: Hub A</span>
                <span className="text-blue-300 font-semibold">ETA: 42 Mins</span>
              </div>
            </div>

            <div className="flex items-center justify-between text-[10px] text-blue-200/80 pt-1 border-t border-blue-800/40 relative z-10 font-mono">
              <span>GPS Refresh: 5s</span>
              <span>Cloud Synced</span>
            </div>
          </div>
        );

      case 'research':
        return (
          <div className="relative h-44 bg-gradient-to-br from-amber-900 via-orange-950 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <Award className="w-3.5 h-3.5 text-amber-400" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-amber-300">Journal Publication</span>
              </div>
              <span className="text-[10px] bg-amber-950/80 border border-amber-500/40 text-amber-300 px-2 py-0.5 rounded-full font-mono font-bold">
                Turnitin &lt; 10%
              </span>
            </div>

            {/* Simulated Academic Paper Preview */}
            <div className="relative z-10 p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/10 space-y-1">
              <div className="text-[10px] font-mono text-amber-300/90 uppercase tracking-wider">LaTeX / IEEE Format</div>
              <div className="text-xs font-bold text-white line-clamp-1">Multi-Modal Deep Learning Paper</div>
              <div className="flex items-center gap-2 text-[10px] text-emerald-300 font-medium">
                <Check className="w-3 h-3 text-emerald-400" />
                <span>Original Research • Peer Review Ready</span>
              </div>
            </div>

            <div className="flex items-center justify-between text-[10px] text-amber-200/80 pt-1 border-t border-amber-800/40 relative z-10 font-mono">
              <span>Scopus & IEEE Index</span>
              <span>100% Original</span>
            </div>
          </div>
        );

      case 'invoice':
        return (
          <div className="relative h-44 bg-gradient-to-br from-indigo-900 via-purple-950 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <FileText className="w-3.5 h-3.5 text-indigo-400" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-indigo-300">Automated OCR Scanner</span>
              </div>
              <span className="text-[10px] bg-indigo-950/80 border border-indigo-500/40 text-indigo-300 px-2 py-0.5 rounded-full font-mono font-bold">
                99.8% Accuracy
              </span>
            </div>

            {/* Simulated OCR Extraction */}
            <div className="relative z-10 p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/10 space-y-1 text-[11px] font-mono">
              <div className="flex justify-between text-slate-300">
                <span>Invoice #8492</span>
                <span className="text-emerald-400">Extracted ✓</span>
              </div>
              <div className="flex justify-between text-white font-bold">
                <span>Total Amount:</span>
                <span className="text-indigo-300">₹18,450.00</span>
              </div>
              <div className="text-[10px] text-slate-300 flex justify-between">
                <span>GST: 18%</span>
                <span className="text-cyan-300">Direct to Excel</span>
              </div>
            </div>

            <div className="flex items-center justify-between text-[10px] text-indigo-200/80 pt-1 border-t border-indigo-800/40 relative z-10 font-mono">
              <span>Scan Time: 3.2s</span>
              <span>Encrypted & Safe</span>
            </div>
          </div>
        );

      case 'dashboard':
        return (
          <div className="relative h-44 bg-gradient-to-br from-cyan-900 via-blue-950 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <TrendingUp className="w-3.5 h-3.5 text-cyan-400" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-cyan-300">Power BI Analytics</span>
              </div>
              <span className="text-[10px] bg-cyan-950/80 border border-cyan-500/40 text-cyan-300 px-2 py-0.5 rounded-full font-mono font-bold">
                Daily Sales
              </span>
            </div>

            {/* Simulated Bar Graph / Metric Sparkline */}
            <div className="relative z-10 p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/10 flex items-end justify-between gap-1.5 h-14">
              <div className="w-full bg-cyan-500/40 h-5 rounded-sm" />
              <div className="w-full bg-cyan-500/60 h-8 rounded-sm" />
              <div className="w-full bg-cyan-400 h-11 rounded-sm" />
              <div className="w-full bg-blue-500/70 h-7 rounded-sm" />
              <div className="w-full bg-cyan-400 h-12 rounded-sm" />
              <div className="w-full bg-indigo-400 h-9 rounded-sm" />
              <div className="w-full bg-cyan-300 h-14 rounded-sm" />
            </div>

            <div className="flex items-center justify-between text-[10px] text-cyan-200/80 pt-1 border-t border-cyan-800/40 relative z-10 font-mono">
              <span>Revenue: +34% MoM</span>
              <span>Multi-Store View</span>
            </div>
          </div>
        );

      default: // vision
        return (
          <div className="relative h-44 bg-gradient-to-br from-violet-900 via-purple-950 to-slate-900 p-4 text-white overflow-hidden flex flex-col justify-between">
            <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
            <div className="flex items-center justify-between relative z-10">
              <div className="flex items-center gap-2">
                <Cpu className="w-3.5 h-3.5 text-violet-400" />
                <span className="text-[11px] font-bold tracking-wide uppercase text-violet-300">Computer Vision AI</span>
              </div>
              <span className="text-[10px] bg-violet-950/80 border border-violet-500/40 text-violet-300 px-2 py-0.5 rounded-full font-mono font-bold">
                Real-Time Box
              </span>
            </div>

            {/* Simulated Camera Bounding Box */}
            <div className="relative z-10 p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/10 flex items-center justify-between">
              <div className="border border-violet-400 border-dashed p-1.5 rounded-md text-[10px] font-mono text-violet-200">
                [Vehicle: 99.8%]
              </div>
              <div className="border border-cyan-400 border-dashed p-1.5 rounded-md text-[10px] font-mono text-cyan-200">
                [Pedestrian: 98.4%]
              </div>
            </div>

            <div className="flex items-center justify-between text-[10px] text-violet-200/80 pt-1 border-t border-violet-800/40 relative z-10 font-mono">
              <span>FPS: 60 • Night Vision</span>
              <span>Automated Logs</span>
            </div>
          </div>
        );
    }
  };

  return (
    <div className="bg-white text-slate-800">
      
      {/* 1. HERO SECTION WITH MODERN GRADIENT & ABSTRACT SHAPES */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/60 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle decorative glow shapes */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <Briefcase className="w-4 h-4 text-blue-600" />
            <span>Proven Deliverables • 100% Genuine Work</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Our Work — <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Simple, Useful & Reliable Solutions
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            Explore the software, smart chatbots, web applications, and data dashboards we build for businesses.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Get a Free Price Quote</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-blue-600" />
              <span>Book a Free Call</span>
            </button>
          </div>

          {/* 4 Stat Highlights */}
          <div className="pt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-blue-600 font-heading">99.9%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Uptime Reliability</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-indigo-600 font-heading">100%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Code Ownership</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-emerald-600 font-heading">&lt; 15 min</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Fast Response SLA</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-cyan-600 font-heading">24/7</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Fast Support</div>
            </div>
          </div>
        </div>
      </section>

      {/* 2. CATEGORY FILTER TABS WITH COUNTERS */}
      <section className="py-6 bg-white border-b border-slate-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-wrap items-center justify-center gap-2 p-1.5 rounded-2xl bg-slate-100 border border-slate-200 max-w-4xl mx-auto">
            {categories.map((cat) => {
              const isSelected = activeCategory === cat.value;
              const Icon = cat.icon;
              return (
                <button
                  key={cat.value}
                  onClick={() => setActiveCategory(cat.value)}
                  className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-bold tracking-wide transition-all flex items-center gap-2 font-heading ${
                    isSelected
                      ? 'bg-blue-600 text-white shadow-sm'
                      : 'text-slate-600 hover:text-slate-900 hover:bg-white/60'
                  }`}
                >
                  {Icon && <Icon className="w-4 h-4" />}
                  <span>{cat.label}</span>
                  <span className={`text-[10px] px-1.5 py-0.5 rounded-full font-mono ${
                    isSelected ? 'bg-blue-700 text-white' : 'bg-slate-200 text-slate-600'
                  }`}>
                    {cat.count}
                  </span>
                </button>
              );
            })}
          </div>
        </div>
      </section>

      {/* 3. CASE STUDIES GRID WITH VISUAL MOCKUP HEADERS & VIEW PROJECT BUTTONS */}
      <section className="py-16 lg:py-24 bg-slate-50/50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Featured Deliverables
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Projects We Have Built
            </h2>
            <p className="text-sm text-slate-600">
              Each project includes complete source code handover, live cloud deployment, and friendly training.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {filteredProjects.map((project, idx) => (
              <motion.div
                key={project.id || idx}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.4, delay: idx * 0.08 }}
                whileHover={{ y: -6 }}
                className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
              >
                <div>
                  {/* Visual Mockup Header */}
                  {renderCardMockup(project)}

                  {/* Card Content Body */}
                  <div className="p-6 sm:p-7 space-y-4">
                    {/* Category Pill & Domain */}
                    <div className="flex items-center justify-between gap-2">
                      <span className={`px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider border font-heading ${project.accentBg}`}>
                        {project.category}
                      </span>
                      <span className="text-xs font-semibold text-slate-500 truncate">
                        {project.domain}
                      </span>
                    </div>

                    {/* Title */}
                    <h3 className="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug font-heading">
                      {project.title}
                    </h3>

                    {/* Short Simple Description */}
                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {project.description}
                    </p>

                    {/* Key Result Banner */}
                    <div className="p-3.5 rounded-xl bg-blue-50/90 border border-blue-100 space-y-1">
                      <div className="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-blue-700 font-heading">
                        <TrendingUp className="w-3.5 h-3.5" />
                        <span>Key Result:</span>
                      </div>
                      <p className="text-xs sm:text-sm font-bold text-blue-950">
                        {project.metrics}
                      </p>
                    </div>

                    {/* Technologies Tag Pills */}
                    <div className="pt-1">
                      <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2 font-heading">
                        Tools Used:
                      </div>
                      <div className="flex flex-wrap gap-1.5">
                        {project.technologies?.map((tech, tIdx) => (
                          <span
                            key={tIdx}
                            className="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-medium border border-slate-200"
                          >
                            {tech}
                          </span>
                        ))}
                      </div>
                    </div>
                  </div>
                </div>

                {/* Card Bottom Actions: View Project & Inquire */}
                <div className="px-6 py-4 bg-slate-50/80 border-t border-slate-100 flex items-center justify-between gap-2">
                  <button
                    onClick={() => setSelectedProject(project)}
                    className="inline-flex items-center gap-1.5 text-xs font-bold text-slate-700 hover:text-blue-600 transition-colors font-heading py-1"
                  >
                    <Eye className="w-3.5 h-3.5 text-blue-500" />
                    <span>View Project</span>
                  </button>

                  <button
                    onClick={onOpenQuote}
                    className="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700 transition-all font-heading bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg border border-blue-200"
                  >
                    <span>Get Pricing</span>
                    <ArrowRight className="w-3 h-3" />
                  </button>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* 4. DARK HIGHLIGHT SECTION: WHY CLIENTS TRUST OUR WORK */}
      <section className="py-20 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white relative overflow-hidden border-b border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Our Commitments
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-white font-heading">
              Why You Can Trust Our Work
            </h2>
            <p className="text-sm text-slate-300">
              Clear guarantees that protect your project, your ideas, and your investment from start to finish.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {simpleGuarantees.map((std, idx) => {
              const Icon = std.icon;
              return (
                <div 
                  key={idx}
                  className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3.5 text-left group"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-base font-bold text-white font-heading">
                    {std.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                    {std.desc}
                  </p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 5. BOTTOM CTA BANNER */}
      <section className="py-16 bg-slate-900 text-white relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-blue-900/40 via-indigo-900/40 to-slate-900 pointer-events-none" />
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
          <h2 className="text-2xl sm:text-4xl font-extrabold tracking-tight font-heading">
            Have an Idea, Website, or System in Mind?
          </h2>
          <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            Tell us about your project. We will check what is needed and give you a simple, clear price quote in 24 hours.
          </p>
          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-md transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Ask for a Free Quote</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <a
              href={siteConfig.whatsappUrl}
              target="_blank"
              rel="noreferrer"
              className="px-7 py-3.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm border border-slate-700 transition-all flex items-center gap-2 font-heading"
            >
              <span>Chat on WhatsApp</span>
            </a>
          </div>
        </div>
      </section>

      {/* 7. INTERACTIVE "VIEW PROJECT DETAILS" MODAL */}
      <AnimatePresence>
        {selectedProject && (
          <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/70 backdrop-blur-sm">
            <motion.div
              initial={{ opacity: 0, scale: 0.95, y: 20 }}
              animate={{ opacity: 1, scale: 1, y: 0 }}
              exit={{ opacity: 0, scale: 0.95, y: 20 }}
              className="bg-white rounded-3xl max-w-xl w-full overflow-hidden shadow-2xl border border-slate-200 text-left relative"
            >
              {/* Header Mockup Banner */}
              {renderCardMockup(selectedProject)}

              {/* Close Button */}
              <button
                onClick={() => setSelectedProject(null)}
                className="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-colors z-20"
              >
                <X className="w-4 h-4" />
              </button>

              <div className="p-6 sm:p-8 space-y-5">
                <div>
                  <span className={`px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider border font-heading ${selectedProject.accentBg}`}>
                    {selectedProject.category}
                  </span>
                  <h3 className="text-xl sm:text-2xl font-bold text-slate-900 mt-2 font-heading">
                    {selectedProject.title}
                  </h3>
                  <p className="text-xs text-slate-500 mt-0.5">
                    Sector: <strong>{selectedProject.domain}</strong> • Delivery: <strong>{selectedProject.deliveryTime}</strong>
                  </p>
                </div>

                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {selectedProject.description}
                </p>

                {/* Outcome */}
                <div className="p-4 rounded-xl bg-blue-50 border border-blue-100 space-y-1">
                  <div className="text-[11px] font-bold uppercase tracking-wider text-blue-700 font-heading">
                    Impact & Outcome:
                  </div>
                  <p className="text-xs sm:text-sm font-bold text-blue-900">
                    {selectedProject.metrics}
                  </p>
                </div>

                {/* Tech Stack */}
                <div className="space-y-1.5">
                  <div className="text-xs font-bold uppercase tracking-wider text-slate-400 font-heading">
                    Technologies Implemented:
                  </div>
                  <div className="flex flex-wrap gap-2">
                    {selectedProject.technologies?.map((tech, idx) => (
                      <span key={idx} className="px-3 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold border border-slate-200">
                        {tech}
                      </span>
                    ))}
                  </div>
                </div>

                {/* Action Buttons */}
                <div className="pt-3 border-t border-slate-100 flex items-center justify-end gap-3">
                  <button
                    onClick={() => setSelectedProject(null)}
                    className="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold font-heading transition-colors"
                  >
                    Close
                  </button>
                  <button
                    onClick={() => {
                      setSelectedProject(null);
                      onOpenQuote();
                    }}
                    className="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold font-heading flex items-center gap-1.5 transition-colors shadow-sm"
                  >
                    <span>Request This Solution</span>
                    <ArrowRight className="w-3.5 h-3.5" />
                  </button>
                </div>
              </div>
            </motion.div>
          </div>
        )}
      </AnimatePresence>

    </div>
  );
}

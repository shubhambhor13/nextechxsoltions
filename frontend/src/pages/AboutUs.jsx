import React from 'react';
import { motion } from 'framer-motion';
import { siteConfig } from '../config/siteConfig';
import TechMarquee from '../components/TechMarquee';
import { 
  Building2, 
  Target, 
  Eye, 
  Award, 
  ShieldCheck, 
  Globe2, 
  Sparkles, 
  CheckCircle2, 
  Cpu, 
  Bot,
  Layers,
  Code2,
  Headphones,
  GraduationCap,
  TrendingUp,
  Lock,
  Zap,
  ArrowRight,
  BookOpen,
  Cloud,
  PhoneCall,
  Check
} from 'lucide-react';

export default function AboutUs({ onOpenQuote, onOpenConsultation }) {
  // Organizational Capability Pods (No individual/personal names whatsoever)
  const deliveryPods = [
    {
      title: "AI & Smart Automation Team",
      desc: "Specialized team building custom AI chatbots, workflow automation, and smart document data extraction.",
      icon: Bot,
      metrics: "Sub-Second AI Response",
      gradientStripe: "from-blue-600 to-cyan-500",
      iconColor: "text-blue-600 bg-blue-50 border-blue-200"
    },
    {
      title: "Cloud & Web Engineering Team",
      desc: "Full-stack engineers building modern websites, custom mobile apps, and scalable cloud systems.",
      icon: Cloud,
      metrics: "99.9% Uptime Reliability",
      gradientStripe: "from-indigo-600 to-blue-500",
      iconColor: "text-indigo-600 bg-indigo-50 border-indigo-200"
    },
    {
      title: "Backend & Database Specialists",
      desc: "Engineers specialized in building fast, secure databases and high-traffic business APIs.",
      icon: Cpu,
      metrics: "High-Speed Data Pipelines",
      gradientStripe: "from-sky-600 to-cyan-500",
      iconColor: "text-sky-600 bg-sky-50 border-sky-200"
    },
    {
      title: "24/7 Dedicated Support Helpdesk",
      desc: "Round-the-clock technical support team ready to assist your users and resolve issues quickly.",
      icon: Headphones,
      metrics: "15-Minute Response SLA",
      gradientStripe: "from-purple-600 to-indigo-500",
      iconColor: "text-purple-600 bg-purple-50 border-purple-200"
    },
    {
      title: "DevOps & Cloud Infrastructure Pod",
      desc: "Cloud architects managing automated CI/CD pipelines, container orchestration, and multi-region AWS/GCP deployments.",
      icon: Cloud,
      metrics: "99.9% Uptime Reliability",
      gradientStripe: "from-amber-600 to-orange-500",
      iconColor: "text-amber-700 bg-amber-50 border-amber-200"
    },
    {
      title: "Security & Privacy Team",
      desc: "Security specialists ensuring 100% data safety, signed NDAs, and international privacy standards.",
      icon: Lock,
      metrics: "100% NDA & Confidential",
      gradientStripe: "from-emerald-600 to-teal-500",
      iconColor: "text-emerald-700 bg-emerald-50 border-emerald-200"
    }
  ];

  const organizationalValues = [
    {
      title: "High-Quality Clean Code",
      desc: "We write clean, well-tested code that is fast, reliable, and built to grow with your business.",
      icon: Code2
    },
    {
      title: "Clear & Honest Pricing",
      desc: "Transparent project timelines and pricing with regular progress updates and no hidden surprises.",
      icon: Target
    },
    {
      title: "100% Privacy & Security",
      desc: "Your proprietary data, code, and project ideas are always protected under signed NDAs.",
      icon: ShieldCheck
    },
    {
      title: "Real Business Results",
      desc: "Every AI assistant or software app we build is designed to save you time and reduce your costs.",
      icon: TrendingUp
    }
  ];

  return (
    <div className="bg-white text-slate-800">
      
      {/* 1. HERO SECTION WITH MODERN GRADIENT & ABSTRACT SHAPES */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle decorative glow shapes */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <Sparkles className="w-4 h-4 text-blue-600" />
            <span>Your Vision • Our Technology</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            About Us — <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Engineering Enterprise Intelligence & Scale
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed"
          >
            {siteConfig.companyName} is an enterprise IT solutions and artificial intelligence company. We build smart AI chatbots, automated business workflows, and mission-critical cloud software platforms worldwide.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Partner With Us</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-blue-600" />
              <span>Schedule a Free Call</span>
            </button>
          </div>

          {/* 4 Stats Cards */}
          <div className="pt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-amber-600 font-heading">99.9%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Uptime Reliability SLA</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-blue-600 font-heading">4+</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Core Tech Practices</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-indigo-600 font-heading">100%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">NDA & Privacy Protected</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-emerald-600 font-heading">24/7</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Dedicated Tech Helpdesk</div>
            </div>
          </div>

        </div>
      </section>

      {/* 2. MISSION & VISION DUAL HIGH-IMPACT CARDS */}
      <section className="py-20 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <motion.div 
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              whileHover={{ y: -4 }}
              className="p-5 sm:p-10 rounded-2xl sm:rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-300 transition-all duration-300 space-y-4 text-left relative overflow-hidden group"
            >
              <div className="h-2 w-full bg-gradient-to-r from-blue-600 to-cyan-500 absolute top-0 left-0" />
              <div className="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                <Target className="w-7 h-7" />
              </div>
              <h3 className="text-2xl font-bold text-slate-900 font-heading">Our Corporate Mission</h3>
              <p className="text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                To empower businesses through smart AI automation, robust cloud software, and scalable digital architectures — while providing practical, hands-on internships that prepare students for real industry careers.
              </p>
            </motion.div>

            <motion.div 
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              whileHover={{ y: -4 }}
              className="p-5 sm:p-10 rounded-2xl sm:rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-indigo-300 transition-all duration-300 space-y-4 text-left relative overflow-hidden group"
            >
              <div className="h-2 w-full bg-gradient-to-r from-indigo-600 to-purple-500 absolute top-0 left-0" />
              <div className="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                <Eye className="w-7 h-7" />
              </div>
              <h3 className="text-2xl font-bold text-slate-900 font-heading">Our Long-Term Vision</h3>
              <p className="text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                To be the most trusted technology solutions partner for modern businesses, recognized for reliable engineering, honest pricing, strict confidentiality, and measurable business growth.
              </p>
            </motion.div>

          </div>
        </div>
      </section>

      {/* 3. CORE ORGANIZATIONAL DELIVERY PODS (NO INDIVIDUAL NAMES) */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
          
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Organizational Architecture
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-slate-900 font-heading tracking-tight">
              Specialized Engineering Pods
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Our multidisciplinary engineers operate in dedicated functional pods, each equipped with modern toolchains and guaranteed quality SLAs.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {deliveryPods.map((pod, idx) => {
              const Icon = pod.icon;
              return (
                <motion.div
                  key={idx}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.08 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden text-left group"
                >
                  <div className={`h-2 bg-gradient-to-r ${pod.gradientStripe}`} />

                  <div className="p-7 sm:p-8 space-y-5">
                    <div className="flex items-center justify-between">
                      <div className={`w-12 h-12 rounded-2xl flex items-center justify-center border ${pod.iconColor} group-hover:scale-105 transition-transform shadow-xs`}>
                        <Icon className="w-6 h-6" />
                      </div>
                      <span className="text-[11px] font-bold text-blue-700 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 font-mono">
                        {pod.metrics}
                      </span>
                    </div>

                    <h3 className="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors font-heading">
                      {pod.title}
                    </h3>

                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {pod.desc}
                    </p>
                  </div>

                  <div className="px-7 py-4 bg-slate-50/80 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm">
                    <span className="flex items-center gap-1.5 text-emerald-600 font-semibold">
                      <CheckCircle2 className="w-4 h-4 text-emerald-500" />
                      <span>Dedicated Unit</span>
                    </span>
                    <button
                      onClick={onOpenQuote}
                      className="text-blue-600 hover:text-blue-700 font-bold transition-colors font-heading text-xs flex items-center gap-1"
                    >
                      <span>Inquire Unit</span>
                      <ArrowRight className="w-3.5 h-3.5" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>

        </div>
      </section>

      {/* Infinite Auto-Scrolling Technology & Capabilities Ticker */}
      <TechMarquee />

      {/* 4. DARK NAVY HIGHLIGHT SECTION: GUIDING PRINCIPLES */}
      <section className="py-20 lg:py-28 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white relative overflow-hidden border-t border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Operational Standards
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-white font-heading tracking-tight">
              The Principles That Guide Our Code & Delivery
            </h2>
            <p className="text-sm sm:text-base text-slate-300">
              Clear commitments that define how we build systems, protect intellectual property, and guarantee delivery success.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {organizationalValues.map((val, idx) => {
              const Icon = val.icon;
              return (
                <div 
                  key={idx} 
                  className="p-7 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3.5 text-left group"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-lg font-bold text-white font-heading">{val.title}</h3>
                  <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">{val.desc}</p>
                </div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 5. CONNECT WITH US ONLINE */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-4 sm:p-8 lg:p-12 rounded-2xl sm:rounded-3xl bg-slate-50 border border-slate-200/90 shadow-sm space-y-6 sm:space-y-8">
            <div className="text-center max-w-2xl mx-auto space-y-2">
              <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
                Online-First Operation
              </span>
              <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                Connect With Us Online
              </h2>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                We operate as an agile, online-first technology company delivering enterprise AI automation, modern software, and scalable cloud solutions to clients across the globe.
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
              <div className="p-7 rounded-2xl bg-white border border-slate-200/90 space-y-4 shadow-xs flex flex-col justify-between text-left">
                <div className="space-y-3">
                  <div className="flex items-center gap-2.5 text-blue-600">
                    <div className="p-2.5 rounded-xl bg-blue-50 border border-blue-200">
                      <Globe2 className="w-5 h-5 text-blue-600" />
                    </div>
                    <h4 className="font-bold text-base text-slate-900 font-heading">Online-First Global Delivery</h4>
                  </div>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                    Our distributed engineering pods collaborate digitally to design, build, and deploy custom software, AI workflows, and cloud applications worldwide with sub-second responsiveness and zero geographical barriers.
                  </p>
                </div>
                <div className="text-xs text-slate-700 font-medium pt-3 border-t border-slate-100 flex flex-wrap items-center gap-4">
                  <a href={`mailto:${siteConfig.email}`} className="text-blue-600 hover:text-blue-700 font-semibold">
                    ✉️ {siteConfig.email}
                  </a>
                  <a href={`tel:${siteConfig.phone}`} className="text-slate-700 hover:text-slate-900 font-semibold">
                    📞 {siteConfig.phone}
                  </a>
                </div>
              </div>

              <div className="p-7 rounded-2xl bg-white border border-slate-200/90 space-y-4 shadow-xs flex flex-col justify-between text-left">
                <div className="space-y-3">
                  <div className="flex items-center gap-2.5 text-emerald-600">
                    <div className="p-2.5 rounded-xl bg-emerald-50 border border-emerald-200">
                      <Sparkles className="w-5 h-5 text-emerald-600" />
                    </div>
                    <h4 className="font-bold text-base text-slate-900 font-heading">Seamless Digital Collaboration</h4>
                  </div>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                    Engage directly with our technical architects via scheduled video discovery calls, official WhatsApp desk, email, and live git repositories. All client engagements are protected by mutual enterprise NDAs.
                  </p>
                </div>
                <div className="pt-3 border-t border-slate-100 flex flex-wrap items-center gap-3">
                  <button
                    onClick={onOpenConsultation}
                    className="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all flex items-center gap-1.5 font-heading shadow-sm"
                  >
                    <PhoneCall className="w-3.5 h-3.5" />
                    <span>Book Strategy Call</span>
                  </button>
                  <button
                    onClick={onOpenQuote}
                    className="px-5 py-2.5 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 hover:text-blue-700 text-xs font-bold transition-colors font-heading"
                  >
                    Request a Quotation
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

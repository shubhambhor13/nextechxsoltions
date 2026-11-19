import React from 'react';
import { motion } from 'framer-motion';
import { 
  Building2, 
  Sparkles, 
  CheckCircle2, 
  ArrowRight, 
  PhoneCall, 
  GraduationCap, 
  ShoppingBag, 
  HeartPulse, 
  Landmark, 
  Rocket, 
  Truck, 
  Users, 
  ShieldCheck, 
  Layers, 
  Bot, 
  Cpu, 
  Database, 
  Code2, 
  TrendingUp, 
  Lock, 
  MessageSquare,
  Check,
  Zap,
  Globe2,
  AlertCircle
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function Industries({ onOpenQuote, onOpenConsultation }) {
  const industries = [
    {
      id: 'manufacturing',
      title: 'Manufacturing & Industrial Units',
      tag: 'Factories & Inventory',
      icon: Layers,
      color: 'bg-amber-50 text-amber-700 border-amber-200',
      badgeColor: 'text-amber-800 bg-amber-100',
      gradientHeader: 'from-amber-600 via-orange-600 to-amber-700',
      keyMetric: 'Real-Time Inventory Tracking',
      description: 'We build digital inventory management portals, equipment maintenance logs, and production telemetry dashboards.',
      challenges: [
        'Manual paper registers for raw material stock and finished goods',
        'Unplanned machinery downtime and delayed maintenance schedules',
        'Lack of real-time visibility into factory floor output and shift yields'
      ],
      solutions: [
        'Digital barcoding and QR code inventory tracking for warehouse staff',
        'Automated preventative maintenance alerts sent directly via WhatsApp',
        'Live Power BI dashboards showing daily shift production and defect rates',
        'Role-based staff portal for purchase orders and material requisitions'
      ],
      technologies: ['React.js', 'Python FastAPI', 'Power BI', 'PostgreSQL']
    },
    {
      id: 'ecommerce',
      title: 'Online Stores & Retail Shops',
      tag: 'Shops & E-Commerce',
      icon: ShoppingBag,
      color: 'bg-blue-50 text-blue-700 border-blue-200',
      badgeColor: 'text-blue-800 bg-blue-100',
      gradientHeader: 'from-blue-600 via-indigo-600 to-blue-700',
      keyMetric: '24/7 WhatsApp AI Orders',
      description: 'We build WhatsApp tools that answer customer questions 24/7, send order tracking links, and help you sell more products.',
      challenges: [
        'Customers ask questions on WhatsApp late at night when staff are offline',
        'Counting stock by hand between stores and websites takes too long',
        'Repetitive messages asking "Where is my order?" take up all your time'
      ],
      solutions: [
        'Smart WhatsApp bot that answers customer questions 24/7',
        'Automatic order tracking links sent straight to the customer’s phone',
        'Automatic reminders sent to customers who leave items in their cart',
        'Simple Power BI sales screens showing daily profits and top products'
      ],
      technologies: ['WhatsApp Business API', 'Shopify & WooCommerce', 'Node.js', 'Fast Database']
    },
    {
      id: 'healthcare',
      title: 'Hospitals, Clinics & Diagnostic Labs',
      tag: 'Doctors & Clinics',
      icon: HeartPulse,
      color: 'bg-emerald-50 text-emerald-700 border-emerald-200',
      badgeColor: 'text-emerald-800 bg-emerald-100',
      gradientHeader: 'from-emerald-600 via-teal-600 to-emerald-700',
      keyMetric: 'Zero Paper Waiting Lines',
      description: 'We make it easy for patients to book doctor appointments on WhatsApp and receive their blood test reports directly on their phones.',
      challenges: [
        'Phone lines stay busy all morning with appointment requests',
        'Staff waste hours typing patient details from paper forms into computers',
        'Patients call repeatedly asking if their medical test report is ready'
      ],
      solutions: [
        'Patients book doctor visits in 30 seconds directly on WhatsApp',
        'Test reports (PDF) are sent automatically to patients when ready',
        'Smart document scanner reads doctor bills and prescription notes automatically',
        'All patient health records stay completely safe and private'
      ],
      technologies: ['WhatsApp Alerts', 'Document Scanner', 'Python', 'Secure Cloud Storage']
    },
    {
      id: 'fintech',
      title: 'Finance, CA & Tax Consultants',
      tag: 'Accounts & Tax',
      icon: Landmark,
      color: 'bg-indigo-50 text-indigo-700 border-indigo-200',
      badgeColor: 'text-indigo-800 bg-indigo-100',
      gradientHeader: 'from-indigo-600 via-purple-600 to-indigo-800',
      keyMetric: 'Automatic GST & Bill OCR',
      description: 'We automate invoice entry, bank statement reading, and tax filing reminders so your team spends less time on manual data entry.',
      challenges: [
        'Entering numbers by hand from hundreds of paper bills and receipts',
        'Chasing clients repeatedly for missing bank statements and GST bills',
        'Making monthly profit-and-loss reports by hand in Excel'
      ],
      solutions: [
        'Automatic bill reader that extracts amounts, GST, and dates into Excel',
        'Automatic WhatsApp and email reminders for clients to send tax documents',
        'Visual Power BI dashboards that show business income, expenses, and profit',
        'Secure client portal for uploading confidential financial documents'
      ],
      technologies: ['Power BI', 'Excel & SQL', 'Bill Scanner', 'Python']
    },
    {
      id: 'startups',
      title: 'New Tech Startups & Founders',
      tag: 'Startups & Software',
      icon: Rocket,
      color: 'bg-purple-50 text-purple-700 border-purple-200',
      badgeColor: 'text-purple-800 bg-purple-100',
      gradientHeader: 'from-purple-600 via-pink-600 to-slate-900',
      keyMetric: 'Launch MVP in 3 Weeks',
      description: 'We turn your new software idea into a working website or app in just a few weeks, with full code ownership handed over to you.',
      challenges: [
        'Need to launch a working prototype fast without spending too much money',
        'Hard to find trustworthy developers who write clean, working code',
        'Need modern tools like AI chatbots and mobile-friendly screens'
      ],
      solutions: [
        'Complete website and web app development using React and Python',
        'Built-in smart AI chatbots to help your early users',
        'Fast cloud launch on Netlify or AWS with free SSL security',
        'You own 100% of the source code and files from day one'
      ],
      technologies: ['React.js', 'Python FastAPI', 'Cloud Hosting', 'Clean Code']
    },
    {
      id: 'logistics',
      title: 'Transport, Trucks & Delivery',
      tag: 'Logistics & Fleet',
      icon: Truck,
      color: 'bg-cyan-50 text-cyan-700 border-cyan-200',
      badgeColor: 'text-cyan-800 bg-cyan-100',
      gradientHeader: 'from-cyan-600 via-blue-600 to-slate-900',
      keyMetric: 'Live GPS Map Tracking',
      description: 'We build live vehicle tracking maps and automatic WhatsApp updates so customers always know where their shipment is.',
      challenges: [
        'Customers constantly calling: "Where is my truck? When will it reach?"',
        'Paper trip sheets and driver receipts getting lost on long routes',
        'No clear picture of which delivery routes are fast and which are slow'
      ],
      solutions: [
        'Live map dashboard showing truck locations and expected arrival times',
        'Automatic WhatsApp messages sent when a parcel is picked up and delivered',
        'Digital delivery receipt signed directly on the driver’s phone screen',
        'Clear daily reports showing total trips and on-time deliveries'
      ],
      technologies: ['Live Maps', 'WhatsApp Updates', 'React.js', 'Fast Database']
    },
    {
      id: 'edtech',
      title: 'Student Training & Institutes',
      tag: 'Students & Colleges',
      icon: Users,
      color: 'bg-rose-50 text-rose-700 border-rose-200',
      badgeColor: 'text-rose-800 bg-rose-100',
      gradientHeader: 'from-rose-600 via-red-600 to-slate-900',
      keyMetric: 'Practical Project Experience',
      description: 'We provide practical online internships and project training so students learn the real tools used by IT companies.',
      challenges: [
        'College books teach mostly old theory instead of what companies need today',
        'Students struggle to get real project experience for their resumes',
        'Colleges want trusted industry partners to help students get placed'
      ],
      solutions: [
        '8 to 12-week practical online internships in Python, AI, Web, and Data',
        'Hands-on practice on real software projects with engineering mentor guidance',
        'Verified completion certificates and individual recommendation letters',
        'Flexible evening and weekend batches for college students'
      ],
      technologies: ['Python', 'Power BI', 'Web Development', 'Git & GitHub']
    }
  ];

  const valuePillars = [
    {
      icon: ShieldCheck,
      title: '100% Privacy Guarantee',
      desc: 'We sign a legal NDA before discussing your project. Your data, ideas, and client records stay 100% confidential.'
    },
    {
      icon: Code2,
      title: 'You Own All the Code',
      desc: 'We hand over all files and code to you. You never have to pay us recurring software license fees.'
    },
    {
      icon: TrendingUp,
      title: 'Real Measurable Results',
      desc: 'We focus on clear results: faster work, fewer phone calls, automated workflows, or more sales.'
    },
    {
      icon: Building2,
      title: 'Simple Online Process',
      desc: 'We work with you online over WhatsApp and video calls. No need to travel or visit an office.'
    }
  ];

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
            <Building2 className="w-4 h-4 text-blue-600" />
            <span>Tailored Solutions For Every Sector</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Industries We Serve — <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Technology Built for Your Daily Needs
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            See how {siteConfig.companyName} builds websites, WhatsApp bots, and software solutions customized to your specific industry.
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
        </div>
      </section>

      {/* 2. INDUSTRIES DETAILED CARDS GRID */}
      <section className="py-16 lg:py-24 bg-slate-50/50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Our Industry Coverage
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Solutions Designed for Real Everyday Problems
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              We do not use confusing one-size-fits-all templates. Every project is built around the exact way your business works.
            </p>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {industries.map((ind, idx) => {
              const Icon = ind.icon;
              return (
                <motion.div
                  key={ind.id}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.06 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden text-left group"
                >
                  {/* Top Color Accent Header Stripe with Key Metric */}
                  <div className={`h-2.5 bg-gradient-to-r ${ind.gradientHeader}`} />

                  <div className="p-7 sm:p-8 space-y-6">
                    {/* Top Header Row */}
                    <div className="flex items-start justify-between gap-4">
                      <div className="flex items-center gap-3.5">
                        <div className={`w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 border ${ind.color} group-hover:scale-105 transition-transform shadow-xs`}>
                          <Icon className="w-7 h-7" />
                        </div>
                        <div>
                          <span className={`px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider font-heading ${ind.badgeColor}`}>
                            {ind.tag}
                          </span>
                          <h3 className="text-xl font-bold text-slate-900 mt-1 font-heading group-hover:text-blue-600 transition-colors">
                            {ind.title}
                          </h3>
                        </div>
                      </div>

                      <span className="hidden sm:inline-block px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700 border border-slate-200 shrink-0 font-mono">
                        {ind.keyMetric}
                      </span>
                    </div>

                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {ind.description}
                    </p>

                    {/* Common Problem Box with soft red tint */}
                    <div className="p-4 rounded-2xl bg-rose-50/60 border border-rose-100 space-y-2">
                      <div className="flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-rose-700 font-heading">
                        <AlertCircle className="w-3.5 h-3.5 text-rose-600" />
                        <span>Common Problems You Might Face:</span>
                      </div>
                      <ul className="space-y-1.5 text-xs text-slate-700">
                        {ind.challenges.map((c, cIdx) => (
                          <li key={cIdx} className="flex items-start gap-2">
                            <span className="text-rose-500 font-bold shrink-0">•</span>
                            <span>{c}</span>
                          </li>
                        ))}
                      </ul>
                    </div>

                    {/* How We Help You Box with soft emerald tint */}
                    <div className="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-100 space-y-2">
                      <div className="flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-emerald-800 font-heading">
                        <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                        <span>How We Help You:</span>
                      </div>
                      <ul className="space-y-1.5 text-xs sm:text-sm text-slate-700 font-medium">
                        {ind.solutions.map((s, sIdx) => (
                          <li key={sIdx} className="flex items-start gap-2">
                            <Check className="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5" />
                            <span>{s}</span>
                          </li>
                        ))}
                      </ul>
                    </div>

                    {/* Main Tools Used */}
                    <div className="pt-1">
                      <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2 font-heading">
                        Main Tools Used:
                      </div>
                      <div className="flex flex-wrap gap-1.5">
                        {ind.technologies.map((t, tIdx) => (
                          <span
                            key={tIdx}
                            className="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-medium border border-slate-200"
                          >
                            {t}
                          </span>
                        ))}
                      </div>
                    </div>
                  </div>

                  {/* Card Bottom CTA */}
                  <div className="px-7 py-4 bg-slate-50/80 border-t border-slate-100 flex items-center justify-between">
                    <span className="text-xs font-semibold text-slate-500">Need a system for this field?</span>
                    <button
                      onClick={onOpenQuote}
                      className="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700 transition-colors font-heading bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg border border-blue-200"
                    >
                      <span>Ask About Pricing</span>
                      <ArrowRight className="w-3 h-3" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 3. DARK HIGHLIGHT SECTION: STANDARDS & VALUE PILLARS */}
      <section className="py-20 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white relative overflow-hidden border-y border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Our Standards
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-white font-heading">
              Standards We Always Follow
            </h2>
            <p className="text-sm text-slate-300">
              No matter what industry you are in, we guarantee complete privacy, honest work, and simple communication.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {valuePillars.map((p, idx) => {
              const Icon = p.icon;
              return (
                <div 
                  key={idx}
                  className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3.5 text-left group"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-base font-bold text-white font-heading">
                    {p.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                    {p.desc}
                  </p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 4. BOTTOM CTA BANNER */}
      <section className="py-16 bg-slate-900 text-white relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-blue-900/40 via-indigo-900/40 to-slate-900 pointer-events-none" />
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
          <h2 className="text-2xl sm:text-4xl font-extrabold tracking-tight font-heading">
            Don't See Your Business Listed?
          </h2>
          <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            We can build custom websites, WhatsApp tools, or research solutions for any kind of business. Send us a message and we will tell you how we can help.
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

    </div>
  );
}

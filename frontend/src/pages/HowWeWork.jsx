import React from 'react';
import { motion } from 'framer-motion';
import { 
  Workflow, 
  Sparkles, 
  CheckCircle2, 
  ArrowRight, 
  PhoneCall, 
  Search, 
  Layout, 
  Code2, 
  ShieldCheck, 
  Rocket, 
  Headphones, 
  FileText, 
  Lock, 
  Zap, 
  Globe2, 
  Clock, 
  Terminal, 
  Laptop, 
  MessageSquare, 
  GitBranch, 
  Cloud,
  Check,
  Calendar,
  Layers
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function HowWeWork({ onOpenQuote, onOpenConsultation }) {
  const phases = [
    {
      step: '01',
      title: 'Free Friendly Call',
      duration: '1 - 2 Days',
      icon: Search,
      color: 'bg-blue-50 text-blue-600 border-blue-200',
      badge: 'Step 1: First Chat',
      gradientAccent: 'from-blue-600 to-indigo-600',
      summary: 'We talk with you to understand your idea, budget, and timeline. We answer all your questions in simple words.',
      deliverables: [
        'Friendly 20-minute video or phone call',
        'Simple explanation of the best solution for your need',
        'Clear price quote in Rupees (₹) or Dollars ($) with no hidden fees',
        'Signed mutual NDA to keep your idea 100% private and safe'
      ]
    },
    {
      step: '02',
      title: 'Drawing the Screens',
      duration: '3 - 5 Days',
      icon: Layout,
      color: 'bg-indigo-50 text-indigo-600 border-indigo-200',
      badge: 'Step 2: Visual Plan',
      gradientAccent: 'from-indigo-600 to-purple-600',
      summary: 'Before writing any code, we show you pictures and clickable designs of your website or application.',
      deliverables: [
        'Clickable designs you can tap and test on your phone',
        'Clear layouts for mobile, tablet, and computer screens',
        'You review the design and ask for any changes',
        'Coding starts only after you are 100% satisfied'
      ]
    },
    {
      step: '03',
      title: 'Building the Project',
      duration: '1 - 3 Weeks',
      icon: Code2,
      color: 'bg-purple-50 text-purple-600 border-purple-200',
      badge: 'Step 3: Development',
      gradientAccent: 'from-purple-600 to-pink-600',
      summary: 'We build your website, mobile app, AI bot, or cloud system using clean, modern, and reliable tools.',
      deliverables: [
        'Fast and modern website or mobile application',
        'Smart AI chatbot or automated WhatsApp replies',
        'Private live link so you can test as we build',
        'Weekly video or WhatsApp updates so you never feel lost'
      ]
    },
    {
      step: '04',
      title: 'Testing Everything',
      duration: '2 - 4 Days',
      icon: ShieldCheck,
      color: 'bg-emerald-50 text-emerald-600 border-emerald-200',
      badge: 'Step 4: Quality Check',
      gradientAccent: 'from-emerald-600 to-teal-600',
      summary: 'We test every single button, form, and page on phones, tablets, and computers to make sure there are zero errors.',
      deliverables: [
        'Tested on iPhone, Android phones, tablets, and laptops',
        'All forms, buttons, and payment links verified',
        'Automated error checking and code quality verification',
        'Fast loading speed and strong data security'
      ]
    },
    {
      step: '05',
      title: 'Launch & Handover',
      duration: '1 - 2 Days',
      icon: Rocket,
      color: 'bg-cyan-50 text-cyan-600 border-cyan-200',
      badge: 'Step 5: Going Live',
      gradientAccent: 'from-cyan-600 to-blue-600',
      summary: 'We put your website or system live on the internet and hand over 100% of all files and code to you.',
      deliverables: [
        'Published live on your own custom domain name (.com, .in, etc.)',
        'Free SSL padlock security certificate installed',
        '100% source code ownership transferred to your GitHub or drive',
        'Short video tutorial showing you how to manage your site'
      ]
    },
    {
      step: '06',
      title: 'Free Support & Help',
      duration: 'Included Free',
      icon: Headphones,
      color: 'bg-amber-50 text-amber-600 border-amber-200',
      badge: 'Step 6: We Stay With You',
      gradientAccent: 'from-amber-600 to-orange-600',
      summary: 'We do not disappear after launch. We give you free warranty support and quick answers whenever you need help.',
      deliverables: [
        'Free bug fixing and minor text changes after launch',
        'Quick help over WhatsApp and phone call',
        'Help adding new features whenever your business grows',
        'Automatic daily backups to protect your data'
      ]
    }
  ];

  const collaborationTools = [
    {
      name: 'WhatsApp',
      category: 'Quick Chat',
      icon: MessageSquare,
      color: 'text-emerald-600 bg-emerald-50 border-emerald-200',
      desc: 'Send quick questions and get helpful replies in a few minutes.'
    },
    {
      name: 'Google Meet & Zoom',
      category: 'Screen Sharing',
      icon: Laptop,
      color: 'text-blue-600 bg-blue-50 border-blue-200',
      desc: 'Friendly face-to-face video calls to review progress together.'
    },
    {
      name: 'Figma',
      category: 'Visual Designs',
      icon: Layout,
      color: 'text-purple-600 bg-purple-50 border-purple-200',
      desc: 'See exactly how your website or app looks before we write code.'
    },
    {
      name: 'GitHub',
      category: 'Your Code',
      icon: GitBranch,
      color: 'text-slate-800 bg-slate-100 border-slate-300',
      desc: 'Where all your code is safely saved and handed over to you.'
    },
    {
      name: 'Automations (n8n)',
      category: 'Workflows',
      icon: Zap,
      color: 'text-amber-600 bg-amber-50 border-amber-200',
      desc: 'Connects WhatsApp, forms, and Google Sheets to save your time.'
    },
    {
      name: 'Fast Cloud Hosting',
      category: 'Reliable Servers',
      icon: Cloud,
      color: 'text-cyan-600 bg-cyan-50 border-cyan-200',
      desc: 'Keeps your website running super fast 24/7 without crashing.'
    }
  ];

  const guarantees = [
    {
      icon: Lock,
      title: 'You Own 100% of the Code',
      desc: 'All source code, design files, and documentation belong to you. No monthly rent or hidden lock-in fees.'
    },
    {
      icon: ShieldCheck,
      title: '100% Privacy & NDA',
      desc: 'We sign a legal Non-Disclosure Agreement. Your business ideas and project details remain completely confidential.'
    },
    {
      icon: Zap,
      title: 'Clear Fixed Pricing',
      desc: 'Itemized quotes in Rupees (₹) or Dollars ($). You only pay milestone by milestone as work is completed.'
    },
    {
      icon: Laptop,
      title: 'Talk Directly to Engineers',
      desc: 'No middle managers or smooth salesmen. You talk directly with the friendly engineer building your project.'
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
            <Workflow className="w-4 h-4 text-blue-600" />
            <span>Simple 6-Step Process • Clear & Friendly</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            How We Work With You — <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Simple, Honest & On Time
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            We follow 6 easy steps to build your project. You always know what is happening, what it costs, and when it will be done.
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

      {/* 2. STEP-BY-STEP CONNECTED TIMELINE */}
      <section className="py-16 lg:py-24 bg-slate-50/50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Step-by-Step Timeline
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Our 6 Easy Steps to Success
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              Follow our clear timeline from the first friendly chat to launching live on the web.
            </p>
          </div>

          {/* Desktop Timeline Progression Ribbon */}
          <div className="hidden lg:block relative max-w-5xl mx-auto px-4 mb-4">
            {/* Connecting Track Line */}
            <div className="absolute top-1/2 left-8 right-8 -translate-y-1/2 h-1 bg-gradient-to-r from-blue-500 via-indigo-500 via-purple-500 to-cyan-500 rounded-full" />
            
            {/* 6 Connected Nodes */}
            <div className="relative z-10 flex items-center justify-between">
              {phases.map((p, idx) => (
                <div key={idx} className="flex flex-col items-center group">
                  <div className="w-10 h-10 rounded-full bg-white border-2 border-blue-600 shadow-md flex items-center justify-center font-bold text-xs text-blue-700 font-mono group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    {p.step}
                  </div>
                  <span className="text-[11px] font-bold text-slate-700 mt-2 font-heading">
                    {p.title.split(' ')[0]} {p.title.split(' ')[1] || ''}
                  </span>
                </div>
              ))}
            </div>
          </div>

          {/* 6 Step Cards Grid */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {phases.map((phase, idx) => {
              const Icon = phase.icon;
              return (
                <motion.div
                  key={phase.step}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.08 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden text-left group"
                >
                  {/* Top Step Accent Header Stripe */}
                  <div className={`h-2 bg-gradient-to-r ${phase.gradientAccent}`} />

                  <div className="p-7 sm:p-8 space-y-5">
                    {/* Header Row */}
                    <div className="flex items-center justify-between gap-2">
                      <div className={`w-12 h-12 rounded-2xl flex items-center justify-center border ${phase.color} font-black text-base font-heading group-hover:scale-105 transition-transform shadow-xs`}>
                        <Icon className="w-6 h-6" />
                      </div>
                      <div className="text-right">
                        <span className="text-3xl font-black text-slate-200 font-heading block group-hover:text-blue-500 transition-colors">
                          {phase.step}
                        </span>
                        <span className="text-[11px] font-bold text-blue-600 uppercase tracking-wider font-mono">
                          {phase.duration}
                        </span>
                      </div>
                    </div>

                    <div>
                      <span className="text-xs font-bold text-blue-600 uppercase tracking-wider font-heading">
                        {phase.badge}
                      </span>
                      <h3 className="text-lg sm:text-xl font-bold text-slate-900 mt-1 font-heading group-hover:text-blue-600 transition-colors">
                        {phase.title}
                      </h3>
                    </div>

                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {phase.summary}
                    </p>

                    {/* Milestone Deliverables */}
                    <div className="pt-3 space-y-2 border-t border-slate-100">
                      <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 font-heading">
                        What You Get in This Step:
                      </div>
                      <ul className="space-y-2 text-xs text-slate-700 font-medium">
                        {phase.deliverables.map((item, dIdx) => (
                          <li key={dIdx} className="flex items-start gap-2">
                            <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5" />
                            <span>{item}</span>
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>

                  <div className="px-7 py-3.5 bg-slate-50/80 border-t border-slate-100 flex items-center justify-between">
                    <span className="text-xs font-semibold text-slate-500">Step {phase.step} of 06</span>
                    <button
                      onClick={onOpenQuote}
                      className="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 font-heading"
                    >
                      <span>Ask About This Step</span>
                      <ArrowRight className="w-3.5 h-3.5" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 3. DIGITAL COLLABORATION TOOLS */}
      <section className="py-16 lg:py-24 bg-white border-y border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Stay in Touch
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Simple Apps We Use to Work Together
            </h2>
            <p className="text-sm text-slate-600">
              We use easy, familiar tools so you can chat, see progress, and test your project anytime from your phone or laptop.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {collaborationTools.map((tool, idx) => {
              const Icon = tool.icon;
              return (
                <div 
                  key={idx}
                  className="p-6 rounded-2xl bg-white border border-slate-200/90 hover:border-blue-400 hover:shadow-lg transition-all duration-300 space-y-3 text-left group"
                >
                  <div className="flex items-center justify-between">
                    <div className="flex items-center gap-3">
                      <div className={`w-10 h-10 rounded-xl flex items-center justify-center border ${tool.color} group-hover:scale-105 transition-transform`}>
                        <Icon className="w-5 h-5" />
                      </div>
                      <h3 className="text-base font-bold text-slate-900 font-heading">
                        {tool.name}
                      </h3>
                    </div>
                    <span className="text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">
                      {tool.category}
                    </span>
                  </div>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                    {tool.desc}
                  </p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 4. DARK HIGHLIGHT SECTION: CORE GUARANTEES */}
      <section className="py-20 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white relative overflow-hidden border-b border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Peace of Mind
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-white font-heading">
              Our 4 Simple Promises to You
            </h2>
            <p className="text-sm text-slate-300">
              We keep everything clear and honest so you never have to worry about surprise costs or delays.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {guarantees.map((g, idx) => {
              const Icon = g.icon;
              return (
                <div 
                  key={idx}
                  className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3.5 text-left group"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-600/20 border border-blue-500/30 text-blue-400 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-base font-bold text-white font-heading">
                    {g.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                    {g.desc}
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
            Ready to Start Your Project With Us?
          </h2>
          <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            Message us or request a free price quote. We will understand your needs and give you a clear price and timeline within 24 hours.
          </p>
          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-md transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Get a Free Price Quote</span>
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

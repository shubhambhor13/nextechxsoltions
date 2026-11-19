import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Workflow, 
  MessageSquare, 
  Mail, 
  Cpu, 
  Database, 
  FileText, 
  Sparkles, 
  CheckCircle2, 
  ArrowRight, 
  Zap, 
  Calculator,
  ShieldCheck,
  ChevronRight,
  PhoneCall,
  Activity,
  Layers,
  Check
} from 'lucide-react';
import AutomationVisualizer from '../components/AutomationVisualizer';
import AutoScrollingProjects from '../components/AutoScrollingProjects';

export default function AIAutomation({ onOpenQuote, onOpenConsultation }) {
  // Interactive ROI Calculator State
  const [teamSize, setTeamSize] = useState(15);
  const [hourlyRate, setHourlyRate] = useState(800);
  const [repetitiveHoursPerWeek, setRepetitiveHoursPerWeek] = useState(12);

  // Calculated ROI
  const weeklyHoursSaved = Math.round(teamSize * repetitiveHoursPerWeek * 0.75);
  const monthlySavings = Math.round(weeklyHoursSaved * 4.33 * hourlyRate);
  const annualSavings = Math.round(monthlySavings * 12);

  const automationSolutions = [
    {
      id: "ai-chatbots",
      title: "AI Chatbot & RAG Agents",
      icon: Bot,
      desc: "Custom generative AI assistants trained on proprietary corporate repositories, knowledge bases, and product catalogs with strict zero-hallucination protocols.",
      features: [
        "Hybrid Vector Search (Pinecone / pgvector)",
        "Automated human handoff on low confidence",
        "Multi-turn contextual conversational memory",
        "Omnichannel Web, Mobile & Slack integrations"
      ],
      gradientStripe: "from-blue-600 to-cyan-500",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200"
    },
    {
      id: "whatsapp-automation",
      title: "WhatsApp & Omnichannel Bots",
      icon: MessageSquare,
      desc: "Transform WhatsApp into an autonomous 24/7 sales, customer support, and order-tracking channel with official Meta Cloud API integration.",
      features: [
        "Automated order status & invoice dispatch",
        "Interactive button menus & dynamic lists",
        "Multi-agent shared team routing inbox",
        "Broadcast segmentation with 98%+ open rate"
      ],
      gradientStripe: "from-emerald-600 to-teal-500",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200"
    },
    {
      id: "n8n-workflow",
      title: "n8n Enterprise Orchestration",
      icon: Workflow,
      desc: "Self-hosted, distributed n8n workflows connecting your legacy systems. Execute multi-step webhooks, data transformations, and event triggers.",
      features: [
        "Self-hosted privacy: Zero data retention by third parties",
        "500+ pre-built native API connectors",
        "Custom Python / Node.js script execution blocks",
        "Automated retries, exponential backoff & alerts"
      ],
      gradientStripe: "from-indigo-600 to-blue-500",
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200"
    },
    {
      id: "autonomous-agents",
      title: "Autonomous Multi-Step AI Agents",
      icon: Cpu,
      desc: "Goal-driven AI agents capable of planning, querying databases, executing code, and triggering actions across multiple enterprise systems.",
      features: [
        "ReAct reasoning & function calling loops",
        "Safe sandboxed code execution environments",
        "Deterministic human approval gates for critical actions",
        "Full cryptographic execution audit trails"
      ],
      gradientStripe: "from-purple-600 to-indigo-500",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200"
    },
    {
      id: "crm-automation",
      title: "CRM & ERP Automated Pipelines",
      icon: Database,
      desc: "Eliminate manual lead logging and duplicate records. Seamless bidirectional synchronization across HubSpot, Salesforce, Zoho, and PostgreSQL.",
      features: [
        "Real-time lead scoring & automated SDR routing",
        "De-duplication & enriched firmographic data",
        "Trigger custom Slack/Teams deal velocity alerts",
        "Pipeline velocity analytics & sync health monitoring"
      ],
      gradientStripe: "from-sky-600 to-cyan-500",
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200"
    },
    {
      id: "document-processing",
      title: "Intelligent Document Processing (IDP)",
      icon: FileText,
      desc: "Automated OCR extraction from invoices, receipts, contracts, and identity documents with 99.4% field accuracy.",
      features: [
        "Parses unstructured tables, forms & handwriting",
        "Automated validation against ERP purchase orders",
        "Export directly to QuickBooks, SAP, or SQL databases",
        "Confidential redaction of PII and sensitive data"
      ],
      gradientStripe: "from-amber-600 to-orange-500",
      badgeColor: "bg-amber-50 text-amber-700 border-amber-200"
    },
    {
      id: "email-automation",
      title: "Smart Email Triage & Drafting",
      icon: Mail,
      desc: "AI classifies incoming enterprise emails, extracts attachments, drafts contextual replies for review, and tags relevant stakeholders.",
      features: [
        "Urgency & sentiment classification",
        "Automated RFQ / RFP parsing and ticket creation",
        "Drafts responses in your corporate brand tone",
        "Gmail & Microsoft 365 Exchange integration"
      ],
      gradientStripe: "from-teal-600 to-emerald-500",
      badgeColor: "bg-teal-50 text-teal-700 border-teal-200"
    },
    {
      id: "business-process",
      title: "End-to-End Process Automation",
      icon: Zap,
      desc: "Holistic modernization of legacy manual routines. From employee onboarding to vendor compliance and recurring report generation.",
      features: [
        "Multi-tier executive approval workflows",
        "Automated compliance checks & PDF generation",
        "Eliminates up to 85% of operational delays",
        "Complete SLA monitoring dashboard"
      ],
      gradientStripe: "from-rose-600 to-pink-500",
      badgeColor: "bg-rose-50 text-rose-700 border-rose-200"
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
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <Sparkles className="w-4 h-4 text-blue-600" />
            <span>Autonomous Intelligence & n8n Enterprise Orchestration</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Streamline Operations with <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Autonomous AI & Workflow Automation
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            We architect and deploy custom RAG chatbots, WhatsApp bots, automated invoice parsers, and self-healing n8n orchestrations that eliminate human overhead.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={onOpenQuote}
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Get Automation Proposal</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <button
              onClick={onOpenConsultation}
              className="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <PhoneCall className="w-4 h-4 text-blue-600" />
              <span>Book Automation Audit</span>
            </button>
          </div>
        </div>
      </section>

      {/* 2. DARK NAVY INTERACTIVE AUTOMATION ENGINE VISUALIZER */}
      <section className="py-20 lg:py-28 bg-gradient-to-b from-[#0B1428] via-[#0F1D3D] to-[#172554] text-white relative overflow-hidden border-b border-blue-900/50">
        <div className="absolute top-0 left-1/4 w-[600px] h-[600px] bg-blue-600/15 rounded-full blur-[140px] pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-25 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-3">
            <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/20 border border-blue-400/40 text-cyan-300 text-xs font-bold uppercase tracking-wider font-heading">
              <Activity className="w-4 h-4" />
              <span>Interactive Architecture</span>
            </div>
            <h2 className="text-3xl sm:text-5xl font-black text-white font-heading tracking-tight">
              Live Multi-Node Orchestration Engine
            </h2>
            <p className="text-sm sm:text-base text-slate-300">
              Simulate enterprise webhook dispatches, AI RAG vector lookups, and automated CRM syncs.
            </p>
          </div>
          <AutomationVisualizer onOpenQuote={onOpenQuote} />
        </div>
      </section>

      {/* 3. 8 SPECIALIZED AUTOMATION SOLUTIONS GRID */}
      <section className="py-20 lg:py-28 bg-slate-50/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Core Capabilities
            </span>
            <h2 className="text-3xl sm:text-5xl font-black text-slate-900 font-heading tracking-tight">
              Full-Spectrum Automation Solutions
            </h2>
            <p className="text-sm sm:text-base text-slate-600">
              Engineered with high concurrency, complete privacy compliance, and zero vendor lock-in.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {automationSolutions.map((sol, idx) => {
              const Icon = sol.icon;
              return (
                <motion.div
                  key={sol.id}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.06 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden text-left group"
                >
                  <div className={`h-2 bg-gradient-to-r ${sol.gradientStripe}`} />

                  <div className="p-6 sm:p-7 space-y-4">
                    <div className="flex items-center justify-between">
                      <div className={`w-12 h-12 rounded-2xl flex items-center justify-center border ${sol.badgeColor} group-hover:scale-105 transition-transform shadow-xs`}>
                        <Icon className="w-6 h-6" />
                      </div>
                    </div>

                    <h3 className="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug font-heading">
                      {sol.title}
                    </h3>

                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {sol.desc}
                    </p>

                    <ul className="space-y-2 pt-3 border-t border-slate-100 text-xs text-slate-700 font-medium">
                      {sol.features.map((f, fIdx) => (
                        <li key={fIdx} className="flex items-start gap-2">
                          <Check className="w-3.5 h-3.5 text-blue-600 shrink-0 mt-0.5" />
                          <span className="leading-snug">{f}</span>
                        </li>
                      ))}
                    </ul>
                  </div>

                  <div className="px-6 py-3.5 bg-slate-50/80 border-t border-slate-100 flex items-center justify-between">
                    <button
                      onClick={onOpenQuote}
                      className="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 transition-colors font-heading"
                    >
                      <span>Request Demo</span>
                      <ChevronRight className="w-4 h-4" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Auto-Scrolling Live Automation Case Studies */}
      <AutoScrollingProjects onOpenQuote={onOpenQuote} />

      {/* 4. INTERACTIVE ROI CALCULATOR WITH ELEVATED DESIGN */}
      <section className="py-20 lg:py-28 bg-white border-t border-slate-200/80">
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-8 sm:p-12 rounded-3xl bg-slate-50 border border-slate-200/90 shadow-sm space-y-10">
            <div className="text-center max-w-2xl mx-auto space-y-2">
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-bold font-heading">
                <Calculator className="w-4 h-4 text-blue-600" />
                <span>Interactive ROI Modeler</span>
              </div>
              <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                Estimate Your Annual Savings
              </h2>
              <p className="text-xs sm:text-sm text-slate-600">
                Calculate projected labor savings achieved by automating repetitive operational tasks.
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
              {/* Input Sliders */}
              <div className="space-y-6 text-left">
                <div>
                  <div className="flex justify-between text-xs sm:text-sm font-semibold text-slate-700 mb-2 font-heading">
                    <span>Operational Team Size</span>
                    <span className="text-blue-600 font-bold">{teamSize} members</span>
                  </div>
                  <input
                    type="range"
                    min="3"
                    max="150"
                    value={teamSize}
                    onChange={(e) => setTeamSize(Number(e.target.value))}
                    className="w-full accent-blue-600 bg-slate-200 h-2.5 rounded-lg cursor-pointer"
                  />
                </div>

                <div>
                  <div className="flex justify-between text-xs sm:text-sm font-semibold text-slate-700 mb-2 font-heading">
                    <span>Average Staff Hourly Cost (₹ INR)</span>
                    <span className="text-blue-600 font-bold">₹{hourlyRate.toLocaleString('en-IN')}/hr</span>
                  </div>
                  <input
                    type="range"
                    min="300"
                    max="3000"
                    step="50"
                    value={hourlyRate}
                    onChange={(e) => setHourlyRate(Number(e.target.value))}
                    className="w-full accent-blue-600 bg-slate-200 h-2.5 rounded-lg cursor-pointer"
                  />
                </div>

                <div>
                  <div className="flex justify-between text-xs sm:text-sm font-semibold text-slate-700 mb-2 font-heading">
                    <span>Repetitive Task Hours / Person / Week</span>
                    <span className="text-blue-600 font-bold">{repetitiveHoursPerWeek} hrs</span>
                  </div>
                  <input
                    type="range"
                    min="4"
                    max="30"
                    value={repetitiveHoursPerWeek}
                    onChange={(e) => setRepetitiveHoursPerWeek(Number(e.target.value))}
                    className="w-full accent-blue-600 bg-slate-200 h-2.5 rounded-lg cursor-pointer"
                  />
                </div>
              </div>

              {/* Projected Output Card */}
              <div className="p-8 rounded-3xl bg-white border border-slate-200/90 text-center space-y-6 shadow-sm">
                <div>
                  <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 font-heading">
                    Projected Annual Labor Savings (INR)
                  </div>
                  <div className="text-3xl sm:text-5xl font-black text-blue-600 mt-2 font-heading tracking-tight">
                    ₹{annualSavings.toLocaleString('en-IN')}
                  </div>
                </div>

                <div className="grid grid-cols-2 gap-3 pt-3 border-t border-slate-100 text-left">
                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div className="text-[10px] text-slate-500 font-medium">Weekly Hours Recovered</div>
                    <div className="text-base sm:text-lg font-bold text-slate-900 font-heading">{weeklyHoursSaved} hrs/wk</div>
                  </div>
                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div className="text-[10px] text-slate-500 font-medium">Monthly Savings</div>
                    <div className="text-base sm:text-lg font-bold text-blue-600 font-heading">₹{monthlySavings.toLocaleString('en-IN')}</div>
                  </div>
                </div>

                <button
                  onClick={onOpenQuote}
                  className="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm shadow-md flex items-center justify-center gap-2 transition-all font-heading"
                >
                  <Sparkles className="w-4 h-4" />
                  <span>Claim Your Automation ROI</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

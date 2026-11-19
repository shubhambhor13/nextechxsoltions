import React from 'react';
import { motion } from 'framer-motion';
import { 
  BookOpen, 
  Award, 
  CheckCircle2, 
  ArrowRight, 
  FileText, 
  Search, 
  Edit3, 
  ShieldCheck, 
  Send, 
  Sparkles, 
  Target, 
  GraduationCap, 
  Users, 
  Briefcase, 
  Layers, 
  Clock, 
  Check, 
  AlertCircle,
  HelpCircle,
  ExternalLink,
  PhoneCall,
  ChevronRight
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';
import PublishedResearchMarquee from '../components/PublishedResearchMarquee';

export default function ResearchPublication({ onOpenQuote, onOpenConsultation }) {

  // 8 Core Services
  const coreServices = [
    {
      id: "topic-selection",
      title: "Research Topic Selection",
      desc: "Identifying novel, contemporary, and high-impact research topics aligned with emerging trends in AI/ML, Data Science, Cloud, IoT, and Engineering domains to ensure high journal acceptance rates.",
      icon: Target,
      tag: "Ideation & Scope",
      accentGradient: "from-blue-600 via-indigo-600 to-cyan-500",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200"
    },
    {
      id: "research-guidance",
      title: "Research Guidance",
      desc: "One-on-one technical advisory on problem formulation, theoretical frameworks, mathematical modeling, simulation workflows, and empirical experimental design.",
      icon: HelpCircle,
      tag: "Methodology",
      accentGradient: "from-indigo-600 via-purple-600 to-blue-500",
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200"
    },
    {
      id: "literature-review",
      title: "Literature Review Support",
      desc: "Comprehensive PRISMA-compliant survey of recent high-impact 2022–2026 indexed papers (IEEE, Elsevier, Springer) to establish clear research gaps and benchmark existing baselines.",
      icon: Search,
      tag: "Gap Analysis",
      accentGradient: "from-sky-500 via-blue-600 to-indigo-600",
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200"
    },
    {
      id: "paper-writing",
      title: "Research Paper Writing",
      desc: "Full manuscript drafting following standard academic structures (IMRaD): Abstract, Introduction, Literature Review, Proposed Architecture/Methodology, Empirical Results, and Conclusion.",
      icon: Edit3,
      tag: "Drafting",
      accentGradient: "from-purple-600 via-pink-600 to-indigo-600",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200"
    },
    {
      id: "paper-revision",
      title: "Paper Revision Support",
      desc: "Comprehensive assistance in responding to peer reviewer comments, point-by-point rebuttal letter drafting, manuscript revisions, and camera-ready paper refinements.",
      icon: FileText,
      tag: "Reviewer Defense",
      accentGradient: "from-emerald-600 via-teal-600 to-cyan-600",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200"
    },
    {
      id: "formatting-referencing",
      title: "Formatting & Referencing",
      desc: "Pixel-perfect template adherence for IEEE, Springer (LNCS), Elsevier, Nature, ACM, and UGC Care guidelines with automated Mendeley, Zotero, and BibTeX citation formatting.",
      icon: Layers,
      tag: "LaTeX & Word",
      accentGradient: "from-amber-500 via-orange-600 to-blue-600",
      badgeColor: "bg-amber-50 text-amber-700 border-amber-200"
    },
    {
      id: "journal-selection",
      title: "Journal Selection Guidance",
      desc: "Strategic matchmaking to identify genuine Scopus (Q1–Q4), Web of Science (SCI/SCIE), and UGC-CARE approved journals while rigorously screening out predatory publishers.",
      icon: Award,
      tag: "Indexing Match",
      accentGradient: "from-rose-500 via-red-600 to-purple-600",
      badgeColor: "bg-rose-50 text-rose-700 border-rose-200"
    },
    {
      id: "publication-support",
      title: "End-to-End Publication Support",
      desc: "Complete publication lifecycle handling: editorial portal submission, correspondence management, copyright documentation, proofreading, and final indexing verification.",
      icon: CheckCircle2,
      tag: "Full Lifecycle",
      accentGradient: "from-cyan-500 via-blue-600 to-indigo-600",
      badgeColor: "bg-cyan-50 text-cyan-700 border-cyan-200"
    }
  ];

  // Target Audiences
  const targetAudiences = [
    {
      title: "Students",
      subtitle: "B.Tech • M.Tech • MS • MCA",
      desc: "Assistance for final-year capstone research, IEEE student conference papers, and postgraduate thesis publication requirements.",
      icon: GraduationCap,
      color: "bg-blue-50 text-blue-700 border-blue-200",
      accentGradient: "from-blue-600 to-indigo-600"
    },
    {
      title: "Academicians & Faculty",
      subtitle: "Professors • Lecturers • HODs",
      desc: "Publications designed to boost Academic Performance Indicators (API scores), university promotion criteria, and institutional grant deliverables.",
      icon: Users,
      color: "bg-indigo-50 text-indigo-700 border-indigo-200",
      accentGradient: "from-indigo-600 to-purple-600"
    },
    {
      title: "PhD & Doctoral Scholars",
      subtitle: "Research Fellows • Doctoral Candidates",
      desc: "Rigorous research paper writing and revision support targeting high-impact factor SCI, SCIE, and Scopus journals required for PhD thesis submission.",
      icon: Award,
      color: "bg-amber-50 text-amber-800 border-amber-200",
      accentGradient: "from-amber-500 to-orange-600"
    },
    {
      title: "Working Professionals & R&D",
      subtitle: "Industry Scientists • Tech Leads",
      desc: "Translating proprietary industrial innovations, algorithmic case studies, and engineering prototypes into prestigious international conference and journal publications.",
      icon: Briefcase,
      color: "bg-sky-50 text-sky-700 border-sky-200",
      accentGradient: "from-sky-500 to-blue-600"
    }
  ];

  // 6-Step Publication Process
  const steps = [
    {
      step: "01",
      title: "Discovery & Topic Finalization",
      desc: "We analyze your academic background, target deadlines, and domain interest to define a novel, viable problem statement."
    },
    {
      step: "02",
      title: "Literature Survey & Gap Analysis",
      desc: "Systematic screening of indexed literature to position your paper's novelty against state-of-the-art baselines."
    },
    {
      step: "03",
      title: "Technical Drafting & Methodology",
      desc: "Formulation of the proposed architecture, algorithms, mathematical proofs, experimental data tables, and comparative charts."
    },
    {
      step: "04",
      title: "Quality Audit & Turnitin Check",
      desc: "Rigorous technical review and plagiarism screening to guarantee originality below strict university & journal thresholds (< 10%)."
    },
    {
      step: "05",
      title: "Journal Matching & Formatting",
      desc: "Selecting the optimal journal (Scopus / WoS / IEEE) and applying journal-specific LaTeX or MS Word typesetting."
    },
    {
      step: "06",
      title: "Submission, Rebuttal & Indexing",
      desc: "Managing submission portals, addressing peer-review comments with point-by-point rebuttal letters until final publication acceptance."
    }
  ];

  // Supported Indexing & Standards
  const indexings = [
    "Scopus Indexed Journals (Q1 - Q4)",
    "Web of Science (SCI / SCIE / ESCI)",
    "IEEE Xplore Conferences & Transactions",
    "Springer & Springer Nature Series",
    "Elsevier & ScienceDirect",
    "UGC-CARE Approved Journals"
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
        {/* Subtle decorative glow shapes & tech grid */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-amber-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Content */}
            <motion.div 
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5 }}
              className="lg:col-span-7 space-y-6 text-left"
            >
              
              <div className="flex flex-wrap items-center gap-2">
                <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-amber-200 text-amber-800 text-xs font-semibold shadow-xs font-heading">
                  <Sparkles className="w-3.5 h-3.5 text-amber-600" />
                  <span>Academic & Scientific Publishing Excellence</span>
                </div>
                <div className="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white border border-blue-200 text-blue-700 text-xs font-bold shadow-xs font-heading">
                  <Award className="w-3.5 h-3.5 text-blue-600" />
                  <span>100+ Papers Published</span>
                </div>
              </div>

              <h1 className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.15] font-heading">
                Research Paper Writing &{' '}
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
                  Publication Support
                </span>
              </h1>

              <p className="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl font-normal">
                Comprehensive, end-to-end guidance for Students, Academicians, PhD Scholars, and Researchers. From novel topic selection and deep literature reviews to peer-review rebuttal defense and publication in Scopus, IEEE, Springer, and UGC-CARE journals.
              </p>

              {/* CTAs */}
              <div className="pt-2 flex flex-wrap items-center gap-4">
                <button
                  onClick={onOpenQuote}
                  className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
                >
                  <span>Submit Paper / Inquire</span>
                  <ArrowRight className="w-4 h-4" />
                </button>

                <button
                  onClick={onOpenConsultation}
                  className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
                >
                  <PhoneCall className="w-4 h-4 text-blue-600" />
                  <span>Book Free Advisory Call</span>
                </button>
              </div>

              {/* Verified Trust Badges */}
              <div className="pt-6 border-t border-slate-200 grid grid-cols-2 sm:grid-cols-3 gap-3 text-xs text-slate-600">
                <div className="flex items-center gap-2 font-medium">
                  <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0" />
                  <span>Turnitin &lt; 10% Guaranteed</span>
                </div>
                <div className="flex items-center gap-2 font-medium">
                  <ShieldCheck className="w-4 h-4 text-blue-600 shrink-0" />
                  <span>100% NDA & Confidential</span>
                </div>
                <div className="flex items-center gap-2 font-medium">
                  <Award className="w-4 h-4 text-amber-600 shrink-0" />
                  <span>Scopus & WoS Aligned</span>
                </div>
              </div>

            </motion.div>

            {/* Right Visual: Publication Dossier Card */}
            <motion.div 
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 0.6, delay: 0.15 }}
              className="lg:col-span-5"
            >
              <div className="relative bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 shadow-xl space-y-6 text-left">
                
                {/* Visual Top Ribbon with Poster-Inspired Accent */}
                <div className="flex items-center justify-between pb-4 border-b border-slate-100">
                  <div className="flex items-center gap-3">
                    <div className="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold shadow-xs">
                      <BookOpen className="w-5 h-5" />
                    </div>
                    <div>
                      <h4 className="text-sm font-bold text-slate-900 leading-tight font-heading">Peer-Reviewed Dossier</h4>
                      <p className="text-[11px] text-slate-500 font-mono">IEEE • Scopus • Springer Aligned</p>
                    </div>
                  </div>
                  <span className="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-amber-50 text-amber-800 border border-amber-300 font-heading">
                    Publication Ready
                  </span>
                </div>

                {/* Illustrated Paper Structure Preview */}
                <div className="space-y-3 bg-slate-50/80 p-4 rounded-2xl border border-slate-200/80 text-xs">
                  <div className="flex items-center justify-between font-semibold text-slate-800">
                    <span>Manuscript Verification</span>
                    <span className="text-emerald-600 flex items-center gap-1 font-mono font-bold">
                      <Check className="w-3.5 h-3.5" /> Plagiarism: 4%
                    </span>
                  </div>

                  <div className="space-y-2 pt-1 text-[11px] text-slate-600">
                    <div className="flex items-center justify-between py-1 border-b border-slate-200/60">
                      <span>1. Abstract & Novel Problem Statement</span>
                      <span className="font-mono text-blue-600 font-semibold">Verified</span>
                    </div>
                    <div className="flex items-center justify-between py-1 border-b border-slate-200/60">
                      <span>2. Systematic Literature Review (PRISMA)</span>
                      <span className="font-mono text-blue-600 font-semibold">42 Citations</span>
                    </div>
                    <div className="flex items-center justify-between py-1 border-b border-slate-200/60">
                      <span>3. Mathematical Architecture & Simulation</span>
                      <span className="font-mono text-blue-600 font-semibold">Validated</span>
                    </div>
                    <div className="flex items-center justify-between py-1">
                      <span>4. Journal Format (LaTeX / BibTeX)</span>
                      <span className="font-mono text-emerald-600 font-semibold">IEEE Trans</span>
                    </div>
                  </div>
                </div>

                {/* Target Journal Badges */}
                <div className="space-y-2">
                  <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 font-heading">
                    Targeted Indexing Platforms
                  </div>
                  <div className="flex flex-wrap gap-2 text-[11px] font-semibold text-slate-700">
                    <span className="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200">Scopus (Q1/Q2)</span>
                    <span className="px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 border border-indigo-200">Web of Science</span>
                    <span className="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-800 border border-amber-200">IEEE Xplore</span>
                    <span className="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-800 border border-slate-200">UGC-CARE</span>
                  </div>
                </div>

                <div className="pt-2">
                  <button
                    onClick={onOpenQuote}
                    className="w-full py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors flex items-center justify-center gap-2 font-heading shadow-sm"
                  >
                    <span>Check Your Manuscript Scope</span>
                    <ArrowRight className="w-3.5 h-3.5" />
                  </button>
                </div>

              </div>
            </motion.div>

          </div>
        </div>
      </section>

      {/* 2. TARGET AUDIENCE SECTION WITH ROUNDED-3XL ELEVATED CARDS */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Audience Pathways
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Tailored Publication Pathways
            </h2>
            <p className="text-sm text-slate-600 font-normal">
              Customized publication strategies designed specifically for each academic and industry tier.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {targetAudiences.map((aud, idx) => {
              const Icon = aud.icon;
              return (
                <motion.div
                  key={idx}
                  initial={{ opacity: 0, y: 16 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: idx * 0.1 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 overflow-hidden flex flex-col justify-between text-left group"
                >
                  <div className={`h-1.5 w-full bg-gradient-to-r ${aud.accentGradient}`} />
                  <div className="p-6 sm:p-7 space-y-4">
                    <div className={`w-12 h-12 rounded-2xl flex items-center justify-center border ${aud.color} group-hover:scale-105 transition-transform shadow-xs`}>
                      <Icon className="w-6 h-6" />
                    </div>
                    <div>
                      <h3 className="text-lg font-bold text-slate-900 font-heading">{aud.title}</h3>
                      <div className="text-xs font-semibold text-blue-600 mt-0.5 font-mono">{aud.subtitle}</div>
                    </div>
                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {aud.desc}
                    </p>
                  </div>
                  <div className="p-4 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between">
                    <button
                      onClick={onOpenQuote}
                      className="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 font-heading"
                    >
                      <span>Inquire Path</span>
                      <ChevronRight className="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Horizontal Auto-Scrolling 100+ Published Papers Rail */}
      <section className="relative">
        <PublishedResearchMarquee onOpenQuote={onOpenQuote} />
      </section>

      {/* 3. COMPLETE SERVICE DESCRIPTIONS (8 Core Services Grid) */}
      <section className="bg-slate-50/70 border-y border-slate-200/80 py-20 lg:py-28">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          
          <div className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase tracking-widest font-extrabold text-blue-600 font-heading">
              End-to-End Capabilities
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Complete Research Paper Services
            </h2>
            <p className="text-sm text-slate-600">
              From the initial spark of an idea to certified publication indexing, our expert research mentors guide you through every milestone.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {coreServices.map((srv, idx) => {
              const Icon = srv.icon;
              return (
                <motion.div
                  key={srv.id}
                  initial={{ opacity: 0, y: 16 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.35, delay: idx * 0.05 }}
                  whileHover={{ y: -6 }}
                  className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:border-blue-400 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
                >
                  <div className={`h-1.5 w-full bg-gradient-to-r ${srv.accentGradient}`} />

                  <div className="p-6 space-y-3.5">
                    <div className="flex items-center justify-between">
                      <div className="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100 group-hover:scale-105 transition-transform shadow-xs">
                        <Icon className="w-5 h-5" />
                      </div>
                      <span className="text-[10px] font-bold text-slate-500 uppercase tracking-wider bg-slate-100 px-2.5 py-1 rounded-full font-mono">
                        {srv.tag}
                      </span>
                    </div>

                    <h3 className="text-lg font-bold text-slate-900 leading-snug font-heading group-hover:text-blue-600 transition-colors">
                      {srv.title}
                    </h3>

                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                      {srv.desc}
                    </p>
                  </div>

                  <div className="p-4 bg-slate-50/70 border-t border-slate-100">
                    <button
                      onClick={onOpenQuote}
                      className="text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 group font-heading"
                    >
                      <span>Inquire for {srv.title}</span>
                      <ArrowRight className="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" />
                    </button>
                  </div>
                </motion.div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 4. STEP-BY-STEP PUBLICATION PROCESS */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase tracking-widest font-extrabold text-blue-600 font-heading">
              Methodical Workflow
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              6-Stage Research Publication Roadmap
            </h2>
            <p className="text-sm text-slate-600">
              A structured, transparent roadmap ensuring zero delays and guaranteed manuscript quality.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {steps.map((st, idx) => (
              <motion.div
                key={idx}
                whileHover={{ y: -4 }}
                className="p-7 rounded-3xl bg-slate-50/70 border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all space-y-3 relative overflow-hidden text-left"
              >
                <div className="text-4xl font-black text-blue-600/20 font-mono">
                  {st.step}
                </div>
                <h3 className="text-lg font-bold text-slate-900 font-heading">
                  {st.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                  {st.desc}
                </p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* 5. DARK NAVY QUALITY BENCHMARKS & INDEXING STANDARDS */}
      <section className="py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-black text-white relative overflow-hidden border-y border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div className="lg:col-span-6 space-y-6 text-left">
              <span className="text-xs uppercase tracking-widest font-extrabold text-blue-400 font-heading">
                Quality Benchmarks
              </span>
              <h2 className="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-heading">
                Why Researchers Trust Our Advisory
              </h2>
              <p className="text-sm text-slate-300 leading-relaxed font-normal">
                Academic publishing demands deep technical domain expertise, strict adherence to publishing ethics, and zero tolerance for plagiarism. We ensure your manuscript meets the highest international scientific standards.
              </p>

              <div className="space-y-4">
                <div className="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 flex items-start gap-3.5 hover:border-blue-500/50 transition-colors">
                  <CheckCircle2 className="w-5 h-5 text-emerald-400 shrink-0 mt-0.5" />
                  <div>
                    <h4 className="text-sm font-bold text-white font-heading">Zero Plagiarism & Turnitin Reports</h4>
                    <p className="text-xs text-slate-400 mt-0.5">Every draft is screened with authenticated Turnitin checks to ensure similarity remains well below 10%.</p>
                  </div>
                </div>

                <div className="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 flex items-start gap-3.5 hover:border-blue-500/50 transition-colors">
                  <ShieldCheck className="w-5 h-5 text-blue-400 shrink-0 mt-0.5" />
                  <div>
                    <h4 className="text-sm font-bold text-white font-heading">100% Intellectual Property Confidentiality</h4>
                    <p className="text-xs text-slate-400 mt-0.5">Your research datasets, models, and conclusions remain 100% your proprietary property under mutual NDA.</p>
                  </div>
                </div>

                <div className="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 flex items-start gap-3.5 hover:border-blue-500/50 transition-colors">
                  <Award className="w-5 h-5 text-amber-400 shrink-0 mt-0.5" />
                  <div>
                    <h4 className="text-sm font-bold text-white font-heading">Genuine High-Acceptance Journal Indexing</h4>
                    <p className="text-xs text-slate-400 mt-0.5">We target authentic Scopus, Web of Science, IEEE Xplore, and UGC-CARE approved journals with zero predatory risks.</p>
                  </div>
                </div>
              </div>
            </div>

            <div className="lg:col-span-6 bg-slate-900/90 p-8 rounded-3xl border border-slate-800 shadow-2xl space-y-6 text-left">
              <h3 className="text-xl font-bold text-white font-heading">
                Supported Publication Portals
              </h3>
              <p className="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                We assist authors with manuscript styling, citation mapping, and submission systems across all premier worldwide indexing directories:
              </p>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                {indexings.map((idxName, i) => (
                  <div key={i} className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/80 flex items-center gap-2.5 font-medium text-slate-200">
                    <Check className="w-4 h-4 text-blue-400 shrink-0" />
                    <span>{idxName}</span>
                  </div>
                ))}
              </div>

              <div className="p-4 rounded-2xl bg-blue-950/60 border border-blue-800/60 text-xs text-blue-200 space-y-2">
                <div className="font-bold flex items-center gap-1.5 text-blue-300 font-heading">
                  <Sparkles className="w-4 h-4 text-blue-400" />
                  <span>Fast-Track Conference & Journal Deadlines</span>
                </div>
                <p className="text-xs text-slate-300 leading-relaxed">
                  Have an urgent IEEE conference submission or university semester deadline? Our advisory team can expedite literature gap synthesis and formatting within 7 to 14 days.
                </p>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* 6. CALL TO ACTION / ENQUIRY BANNER */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-8 sm:p-14 rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 text-white text-center space-y-6 shadow-2xl relative overflow-hidden border border-blue-400/30">
            
            <div className="space-y-3 max-w-2xl mx-auto relative z-10">
              <span className="px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-white/20 text-white border border-white/30 inline-block font-heading">
                Start Your Publication Journey
              </span>
              <h2 className="text-2xl sm:text-4xl font-extrabold tracking-tight font-heading">
                Ready to Publish Your Research in Top Journals?
              </h2>
              <p className="text-sm sm:text-base text-blue-100 leading-relaxed font-normal">
                Share your research domain, existing abstract, or target journal requirements. Our academic advisory panel will evaluate your topic within 24 hours.
              </p>
            </div>

            <div className="pt-2 flex flex-wrap items-center justify-center gap-4 relative z-10">
              <button
                onClick={onOpenQuote}
                className="px-6 py-3.5 rounded-xl bg-white text-blue-600 font-bold text-sm shadow-md hover:bg-slate-50 transition-all flex items-center gap-2 active:scale-95 font-heading"
              >
                <span>Submit Paper Abstract</span>
                <ArrowRight className="w-4 h-4" />
              </button>

              <a
                href={siteConfig.whatsappUrl}
                target="_blank"
                rel="noreferrer"
                className="px-6 py-3.5 rounded-xl bg-blue-700/80 hover:bg-blue-800 text-white font-semibold text-sm transition-colors border border-blue-400/40 flex items-center gap-2 font-heading"
              >
                <span>WhatsApp Advisory Team</span>
              </a>
            </div>

          </div>
        </div>
      </section>

    </div>
  );
}

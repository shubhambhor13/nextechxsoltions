import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { 
  GraduationCap, 
  Sparkles, 
  CheckCircle2, 
  Clock, 
  Award, 
  Briefcase, 
  Users, 
  Code2, 
  ChevronRight, 
  Building,
  ShieldCheck, 
  Send, 
  Loader2, 
  FileText, 
  UserCheck, 
  ArrowRight, 
  GitBranch, 
  Layers,
  Terminal,
  Zap,
  Check,
  Mail
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';
import { api } from '../services/api';
import confetti from 'canvas-confetti';
import TechMarquee from '../components/TechMarquee';

export default function Internship({ onOpenRegister, onSelectCourseForRegister }) {
  const [inlineForm, setInlineForm] = useState({
    full_name: '',
    email: '',
    phone: '',
    qualification: 'B.Tech / B.E (CSE / IT)',
    current_status: 'Final Year Student (2026 Batch)',
    course_selected: 'Artificial Intelligence & Machine Learning',
    batch_timing: 'Weekend Batch (Sat & Sun, 10 AM - 1 PM)',
    resume_link: '',
    statement: ''
  });
  const [loading, setLoading] = useState(false);
  const [submitted, setSubmitted] = useState(false);

  const handleInlineSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    try {
      await api.registerStudent(inlineForm);
      setSubmitted(true);
      confetti({ particleCount: 90, spread: 70, origin: { y: 0.6 } });
      setTimeout(() => {
        setSubmitted(false);
        setInlineForm({
          full_name: '',
          email: '',
          phone: '',
          qualification: 'B.Tech / B.E (CSE / IT)',
          current_status: 'Final Year Student (2026 Batch)',
          course_selected: 'Artificial Intelligence & Machine Learning',
          batch_timing: 'Weekend Batch (Sat & Sun, 10 AM - 1 PM)',
          resume_link: '',
          statement: ''
        });
      }, 5000);
    } catch (err) {
      alert(err.message || 'Error submitting application');
    } finally {
      setLoading(false);
    }
  };

  const internshipDomains = [
    {
      title: "AI & Machine Learning Research Intern",
      domain: "Artificial Intelligence",
      badge: "High Demand",
      desc: "Work on neural network training, computer vision object detection (YOLO), Transformer models, and RAG agent deployment.",
      skills: ["PyTorch", "OpenCV", "Hugging Face", "FastAPI", "Vector DBs"],
      liveProject: "Autonomous Video Object Detection & Edge Inference Pipeline",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      accentGradient: "from-blue-600 via-indigo-600 to-cyan-500"
    },
    {
      title: "Full Stack Web Engineering Intern",
      domain: "Software Engineering",
      badge: "Core Track",
      desc: "Architect enterprise web apps using React 18, Tailwind CSS, Python FastAPI / Node.js, and automated AWS deployments.",
      skills: ["React.js", "Tailwind CSS", "FastAPI", "PostgreSQL", "Docker", "AWS"],
      liveProject: "Multi-Tenant Cloud Operations Portal & Telemetry Dashboard",
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200",
      accentGradient: "from-indigo-600 via-purple-600 to-blue-500"
    },
    {
      title: "Data Analytics & Power BI Intern",
      domain: "Business Intelligence",
      badge: "Corporate Choice",
      desc: "Transform complex corporate datasets into interactive executive dashboards with advanced SQL, DAX, and automated ETL.",
      skills: ["Power BI", "Advanced SQL", "DAX", "Python Pandas", "Data Modeling"],
      liveProject: "Executive Financial KPI & Churn Prediction Cockpit",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      accentGradient: "from-emerald-600 via-teal-600 to-cyan-600"
    },
    {
      title: "Python Automation & Workflow Intern",
      domain: "Automation & Scripting",
      badge: "Fast Track",
      desc: "Develop automated RPA scrapers, asynchronous webhook workers, and n8n multi-system integrations.",
      skills: ["Python 3.12", "Asyncio", "Playwright", "n8n", "Redis", "FastAPI"],
      liveProject: "Omnichannel WhatsApp Lead Qualification & CRM Sync Bot",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      accentGradient: "from-purple-600 via-pink-600 to-indigo-600"
    },
    {
      title: "Java Enterprise Microservices Intern",
      domain: "Backend Systems",
      badge: "Enterprise",
      desc: "Build high-throughput, fault-tolerant microservices using Java 21, Spring Boot 3, Kafka event streaming, and Hibernate.",
      skills: ["Java 21", "Spring Boot 3", "Apache Kafka", "Docker", "PostgreSQL"],
      liveProject: "High-Concurrency Payment Ledger & Webhook Gateway",
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200",
      accentGradient: "from-sky-500 via-blue-600 to-indigo-600"
    },
    {
      title: "Cyber Security & SOC Defense Intern",
      domain: "Security Operations",
      badge: "Specialized",
      desc: "Gain hands-on experience in vulnerability assessment, ethical penetration testing, SIEM log analysis, and incident response.",
      skills: ["Wireshark", "Burp Suite", "Nmap", "Splunk SIEM", "Linux Hardening"],
      liveProject: "SOC Incident Triage & Automated Vulnerability Audit",
      badgeColor: "bg-rose-50 text-rose-700 border-rose-200",
      accentGradient: "from-rose-500 via-pink-600 to-indigo-600"
    }
  ];

  const eligibilityCriteria = [
    {
      title: "Target Academic Degree",
      desc: "B.Tech / B.E (CSE, IT, ECE, EEE), BCA, MCA, B.Sc / M.Sc Computer Science, Data Science, or related engineering backgrounds.",
      icon: GraduationCap
    },
    {
      title: "Eligible Cohorts",
      desc: "Final Year Students, Pre-Final Year, Recent Graduates, and motivated engineers seeking real production experience.",
      icon: Users
    },
    {
      title: "Technical Interview Clearance",
      desc: "Clear a 1-on-1 virtual technical interview with our engineering leads assessing domain fundamentals and coding aptitude.",
      icon: Code2
    },
    {
      title: "Time & Sprint Commitment",
      desc: "Dedicate 8–12 hours weekly for project deliverables, sprint reviews, and 1-on-1 mentor syncs (flexible remote timings).",
      icon: Clock
    }
  ];

  const benefits = [
    {
      title: "Live Production Project Experience",
      desc: "Work on genuine client repositories with real-world schemas, active CI/CD, and peer pull-request code reviews.",
      icon: GitBranch
    },
    {
      title: "ISO-Verified Experience Certificate",
      desc: "Receive an industry-recognized experience credential with unique digital verification QR for your LinkedIn profile.",
      icon: Award
    },
    {
      title: "1-on-1 Engineering Architect Mentorship",
      desc: "Direct weekly guidance from veteran staff engineers on system design, code optimization, and industry standards.",
      icon: Users
    },
    {
      title: "Letter of Recommendation (LOR)",
      desc: "Official formal recommendation letter highlighting your contributions for top performers, helpful for jobs and higher studies.",
      icon: FileText
    },
    {
      title: "Interview-Based Selection & Direct PPO",
      desc: "Strictly merit-driven selection. Outstanding interns who deliver live client modules receive direct Pre-Placement Offers (PPO).",
      icon: UserCheck
    },
    {
      title: "Stipend & Milestone Bonuses",
      desc: "Performance-linked rewards, project milestone bonuses, and direct corporate placement referrals upon successful deployment.",
      icon: Sparkles
    }
  ];

  const applicationSteps = [
    {
      num: "01",
      title: "Submit Profile & Resume",
      desc: "Select your target domain track and submit your academic details, GitHub, and resume for initial review."
    },
    {
      num: "02",
      title: "Technical Interview Round",
      desc: "Shortlisted candidates attend a 1-on-1 virtual technical interview with our engineering leads to verify domain skills."
    },
    {
      num: "03",
      title: "Offer Letter & Pod Allocation",
      desc: "Selected candidates receive an official Internship Offer Letter, NDA, and get assigned to an active client project pod."
    },
    {
      num: "04",
      title: "Live Sprints & Experience Credential",
      desc: "Build and deploy production features in weekly Agile sprints, earning verified corporate experience credentials and LOR."
    }
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
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-emerald-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Ambient Glows & Tech Grid */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-emerald-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-emerald-200 text-xs sm:text-sm font-bold text-emerald-700 shadow-xs font-heading"
          >
            <Briefcase className="w-4 h-4 text-emerald-600" />
            <span>Interview-Based Selection • Live Engineering Internship</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Launch Your Career with a <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 via-teal-600 to-blue-600">
              Real-World Engineering Internship
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal"
          >
            Gain verified production experience working on live client projects. Candidate selection is strictly interview-based with 1-on-1 mentorship from engineering architects, verified experience credentials, and direct performance-based full-time hiring opportunities.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={() => onOpenRegister?.()}
              className="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Apply for Technical Interview</span>
              <ArrowRight className="w-4 h-4" />
            </button>
            <a
              href="#internship-domains"
              className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-emerald-500 hover:bg-emerald-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <span>Explore 6 Tracks ↓</span>
            </a>
          </div>

          {/* Direct HR Email Badge */}
          <div className="pt-1 flex items-center justify-center gap-2 text-xs text-slate-600 font-mono">
            <Mail className="w-4 h-4 text-emerald-600" />
            <span>Direct HR Desk:</span>
            <a href={`mailto:${siteConfig.emailHr}?subject=Internship%20Inquiry%20-%20NexTechX`} className="text-emerald-700 hover:text-emerald-800 font-bold underline">
              {siteConfig.emailHr}
            </a>
          </div>

          {/* Quick Metrics */}
          <div className="pt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-emerald-600 font-heading">100%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Live Client Repos</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-blue-600 font-heading">100%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Interview-Based</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-indigo-600 font-heading">1:1</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Architect Mentorship</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-amber-600 font-heading">ISO</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Verified Credential</div>
            </div>
          </div>
        </div>
      </section>

      {/* Auto-Scrolling Technologies & Domains Marquee */}
      <TechMarquee />

      {/* 2. INTERNSHIP DOMAINS WITH ROUNDED-3XL ELEVATED CARDS */}
      <section id="internship-domains" className="py-20 lg:py-28 bg-white scroll-mt-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <motion.div {...fadeIn} className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-emerald-600 font-heading">
              Open Tracks
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Available Internship Roles & Domains
            </h2>
            <p className="text-sm text-slate-600 font-normal">
              Select a specialized track tailored to your career goals and current skill profile.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {internshipDomains.map((role, idx) => (
              <motion.div
                key={idx}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.4, delay: idx * 0.08 }}
                whileHover={{ y: -6 }}
                className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 hover:border-emerald-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
              >
                <div className={`h-1.5 w-full bg-gradient-to-r ${role.accentGradient}`} />

                <div className="p-7 space-y-4">
                  <div className="flex items-center justify-between">
                    <span className={`px-3 py-1 rounded-full text-[10px] font-bold border font-heading ${role.badgeColor}`}>
                      {role.domain}
                    </span>
                    <span className="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1 font-heading">
                      <Sparkles className="w-3 h-3 text-emerald-600" />
                      <span>Live Client Project</span>
                    </span>
                  </div>

                  <h3 className="text-xl sm:text-2xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors font-heading">
                    {role.title}
                  </h3>

                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                    {role.desc}
                  </p>

                  {/* Skills */}
                  <div>
                    <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2 font-heading">
                      Tech Stack:
                    </div>
                    <div className="flex flex-wrap gap-1.5">
                      {role.skills.map((sk, sIdx) => (
                        <span
                          key={sIdx}
                          className="px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-xs font-semibold"
                        >
                          {sk}
                        </span>
                      ))}
                    </div>
                  </div>

                  {/* Capstone Banner */}
                  <div className="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-100 space-y-1.5">
                    <div className="text-xs font-bold uppercase tracking-wider text-emerald-800 flex items-center gap-1.5 font-heading">
                      <GitBranch className="w-4 h-4 text-emerald-600" />
                      <span>Live Capstone Project:</span>
                    </div>
                    <div className="text-slate-800 text-xs sm:text-sm leading-relaxed font-semibold">
                      {role.liveProject}
                    </div>
                  </div>
                </div>

                <div className="p-6 bg-slate-50/70 border-t border-slate-100">
                  <button
                    onClick={() => {
                      onSelectCourseForRegister?.(role.title);
                      onOpenRegister?.();
                    }}
                    className="w-full py-3.5 px-6 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition-all font-heading active:scale-95"
                  >
                    <span>Apply Now</span>
                    <ArrowRight className="w-4 h-4" />
                  </button>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* 3. ELIGIBILITY CRITERIA */}
      <section className="py-20 lg:py-28 bg-slate-50/70 border-y border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <motion.div {...fadeIn} className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-emerald-600 font-heading">
              Candidate Profile
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Who is Eligible to Apply?
            </h2>
            <p className="text-sm text-slate-600">
              Our internship is engineered for motivated learners who want practical exposure over rote memorization.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {eligibilityCriteria.map((item, idx) => {
              const Icon = item.icon;
              return (
                <motion.div 
                  key={idx} 
                  whileHover={{ y: -4 }}
                  className="p-7 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:border-emerald-400 hover:shadow-md transition-all space-y-3.5 text-left"
                >
                  <div className="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 shadow-xs">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">{item.title}</h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">{item.desc}</p>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 4. BENEFITS & PERKS */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <motion.div {...fadeIn} className="text-center max-w-3xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Internship Advantages
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              What You Receive as an Engineering Intern
            </h2>
            <p className="text-sm text-slate-600">
              Tangible, career-accelerating benefits that make your profile stand out to top corporate hiring managers.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {benefits.map((b, idx) => {
              const Icon = b.icon;
              return (
                <motion.div
                  key={idx}
                  whileHover={{ y: -4 }}
                  className="p-7 rounded-3xl bg-slate-50/70 border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all space-y-3.5 text-left"
                >
                  <div className="w-12 h-12 rounded-2xl bg-white text-blue-600 shadow-xs border border-slate-200 flex items-center justify-center">
                    <Icon className="w-6 h-6" />
                  </div>
                  <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">{b.title}</h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">{b.desc}</p>
                </motion.div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 5. 4-STEP APPLICATION PROCESS */}
      <section className="py-20 bg-slate-50/70 border-y border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <motion.div {...fadeIn} className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Step-by-Step Pathway
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
              Application & Onboarding Process
            </h2>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {applicationSteps.map((step, idx) => (
              <div
                key={idx}
                className="p-7 rounded-3xl bg-white border border-slate-200/90 shadow-sm space-y-3 relative text-left"
              >
                <div className="text-4xl font-black font-mono text-emerald-600">
                  {step.num}
                </div>
                <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                  {step.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                  {step.desc}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 6. FAST-TRACK INLINE APPLICATION FORM */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-8 sm:p-14 rounded-3xl bg-slate-50/80 border border-slate-200/90 shadow-lg space-y-8 text-left">
            <div className="text-center space-y-2">
              <div className="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold font-heading">
                <Send className="w-3.5 h-3.5" />
                <span>Interview-Based Selection</span>
              </div>
              <h2 className="text-2xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                Apply for Technical Interview Round
              </h2>
              <p className="text-xs sm:text-sm text-slate-600 font-normal">
                Direct corporate internship applications are open. Shortlisted candidates are selected through a 1-on-1 technical interview.
              </p>
              <p className="text-xs text-slate-500 font-mono pt-1">
                Direct HR Desk: <a href={`mailto:${siteConfig.emailHr}`} className="text-emerald-700 hover:text-emerald-800 font-bold underline">{siteConfig.emailHr}</a>
              </p>
            </div>

            {submitted ? (
              <div className="py-12 text-center space-y-3 animate-in fade-in zoom-in duration-300">
                <div className="w-16 h-16 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto border border-emerald-300">
                  <CheckCircle2 className="w-9 h-9" />
                </div>
                <h3 className="text-xl font-bold text-slate-900 font-heading">Application Successfully Transmitted!</h3>
                <p className="text-xs sm:text-sm text-slate-600 max-w-sm mx-auto">
                  Our engineering team will review your application and reach out via WhatsApp and Email to schedule your technical interview round.
                </p>
              </div>
            ) : (
              <form onSubmit={handleInlineSubmit} className="space-y-4">
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Candidate Full Name *</label>
                    <input
                      type="text"
                      required
                      value={inlineForm.full_name}
                      onChange={(e) => setInlineForm({ ...inlineForm, full_name: e.target.value })}
                      placeholder="e.g. Rahul Sharma"
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    />
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Email Address *</label>
                    <input
                      type="email"
                      required
                      value={inlineForm.email}
                      onChange={(e) => setInlineForm({ ...inlineForm, email: e.target.value })}
                      placeholder="rahul@example.com"
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    />
                  </div>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">WhatsApp Contact Number *</label>
                    <input
                      type="tel"
                      required
                      value={inlineForm.phone}
                      onChange={(e) => setInlineForm({ ...inlineForm, phone: e.target.value })}
                      placeholder="+91 98765 43210"
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    />
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Target Internship Domain *</label>
                    <select
                      value={inlineForm.course_selected}
                      onChange={(e) => setInlineForm({ ...inlineForm, course_selected: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    >
                      <option value="Artificial Intelligence & Machine Learning">AI & Machine Learning Research Intern</option>
                      <option value="Full Stack Modern Web Development">Full Stack Engineering Intern</option>
                      <option value="Data Analytics & Power BI Mastery">Data Analytics & Power BI Intern</option>
                      <option value="Python Enterprise & Workflow Automation">Python Automation & Workflow Intern</option>
                      <option value="Java Enterprise & Microservices">Java Enterprise Microservices Intern</option>
                      <option value="Cyber Security & SOC Defense">Cyber Security & SOC Defense Intern</option>
                    </select>
                  </div>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Academic Degree / College</label>
                    <select
                      value={inlineForm.qualification}
                      onChange={(e) => setInlineForm({ ...inlineForm, qualification: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    >
                      <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                      <option value="B.Tech / B.E (ECE / Other)">B.Tech / B.E (ECE / Other)</option>
                      <option value="BCA / MCA">BCA / MCA</option>
                      <option value="B.Sc / M.Sc Data Science / CS">B.Sc / M.Sc Data Science / CS</option>
                      <option value="Recent Graduate (Seeking Immediate Experience)">Recent Graduate (Seeking Immediate Experience)</option>
                      <option value="Career Transitioner">Career Transitioner</option>
                    </select>
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Current Graduation Cohort</label>
                    <select
                      value={inlineForm.current_status}
                      onChange={(e) => setInlineForm({ ...inlineForm, current_status: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                    >
                      <option value="Final Year Student (2026 Batch)">Final Year Student (2026 Batch)</option>
                      <option value="Pre-Final Year (2027 Batch)">Pre-Final Year (2027 Batch)</option>
                      <option value="2025 Recent Graduate">2025 Recent Graduate</option>
                      <option value="2024 Graduate">2024 Graduate</option>
                    </select>
                  </div>
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">Resume / LinkedIn Profile URL (Optional)</label>
                  <input
                    type="url"
                    value={inlineForm.resume_link}
                    onChange={(e) => setInlineForm({ ...inlineForm, resume_link: e.target.value })}
                    placeholder="https://linkedin.com/in/... or Google Drive link"
                    className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/20 transition-all"
                  />
                </div>

                <div className="pt-3">
                  <button
                    type="submit"
                    disabled={loading}
                    className="w-full py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all disabled:opacity-50 active:scale-98 font-heading"
                  >
                    {loading ? (
                      <span className="flex items-center justify-center gap-2">
                        <Loader2 className="w-4 h-4 animate-spin" />
                        <span>Submitting Application...</span>
                      </span>
                    ) : (
                      <span>Submit Application for Interview Round</span>
                    )}
                  </button>
                </div>
              </form>
            )}
          </div>
        </div>
      </section>

    </div>
  );
}

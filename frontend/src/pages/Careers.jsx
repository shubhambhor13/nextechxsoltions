import React, { useState, useEffect, useRef } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { 
  Briefcase, 
  GraduationCap, 
  Sparkles, 
  CheckCircle2, 
  AlertCircle, 
  Upload, 
  FileText, 
  Send, 
  Loader2, 
  X, 
  Mail, 
  Phone, 
  User, 
  Building, 
  MapPin, 
  Clock, 
  ArrowRight, 
  Check, 
  ShieldCheck, 
  Layers, 
  ChevronRight,
  GitBranch,
  Code2,
  Cpu
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';
import { api } from '../services/api';
import confetti from 'canvas-confetti';
import TechMarquee from '../components/TechMarquee';

export default function Careers({ onOpenQuote, onOpenConsultation }) {
  const [activeTab, setActiveTab] = useState('all'); // 'all', 'jobs', 'internships'
  const [selectedRole, setSelectedRole] = useState(null);
  
  // Application Form State
  const [formData, setFormData] = useState({
    full_name: '',
    email: '',
    phone: '',
    applying_for: 'Job', // 'Job' or 'Internship'
    position: 'Full-Stack Software Engineer (React & Python)',
    education: 'B.Tech / B.E (CSE / IT)',
    message: ''
  });

  const [resumeFile, setResumeFile] = useState(null);
  const [fileError, setFileError] = useState('');
  const [submitting, setSubmitting] = useState(false);
  const [submitSuccess, setSubmitSuccess] = useState(false);
  const [submitError, setSubmitError] = useState('');

  const formRef = useRef(null);
  const fileInputRef = useRef(null);

  // Job Vacancies List (Entry to Mid Level - No Senior Roles)
  const jobVacancies = [
    {
      id: "job-fullstack",
      title: "Full-Stack Software Engineer (React & Python)",
      department: "Engineering & Product",
      type: "Full-Time",
      workplace: "Remote / Hybrid",
      experience: "0-2 Years / Early Career",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      accentGradient: "from-blue-600 via-indigo-600 to-cyan-500",
      desc: "Develop and maintain modern web applications, SaaS client portals, and responsive REST APIs using React 18, Tailwind CSS, Python FastAPI, and PostgreSQL.",
      skills: ["React 18", "Python FastAPI", "PostgreSQL", "Docker", "Git", "REST APIs"],
      responsibilities: [
        "Build modern frontend user interfaces and connect backend endpoints",
        "Write clean, modular code with active Git version control",
        "Participate in sprint planning and collaborate directly with engineering mentors"
      ]
    },
    {
      id: "job-ai-engineer",
      title: "AI & Workflow Automation Developer",
      department: "AI Automation Labs",
      type: "Full-Time",
      workplace: "100% Remote",
      experience: "0-2 Years / Early Career",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      accentGradient: "from-purple-600 via-indigo-600 to-pink-500",
      desc: "Develop practical AI automation workflows, WhatsApp business bots, and Retrieval-Augmented Generation (RAG) tools using Python, LangChain, and APIs.",
      skills: ["Python", "OpenAI APIs", "LangChain", "FastAPI", "Vector DBs", "Webhooks"],
      responsibilities: [
        "Build automated conversational bots and business workflow integrations",
        "Implement document search and knowledge retrieval pipelines",
        "Test and monitor AI model prompts, latency, and response quality"
      ]
    },
    {
      id: "job-devops-cloud",
      title: "DevOps & Cloud Associate Engineer",
      department: "Cloud & Infrastructure",
      type: "Full-Time",
      workplace: "100% Remote",
      experience: "0-2 Years / Early Career",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      accentGradient: "from-emerald-600 via-teal-600 to-blue-500",
      desc: "Configure containerized deployments, manage CI/CD build scripts, server monitoring, and cloud hosting for client web applications.",
      skills: ["Docker", "Linux", "GitHub Actions", "AWS / VPS", "Nginx", "SSL"],
      responsibilities: [
        "Maintain CI/CD deployment pipelines on GitHub Actions",
        "Monitor server uptime, system logs, and resource utilization",
        "Assist in configuring domains, SSL certificates, and database backups"
      ]
    },
    {
      id: "job-bi-analyst",
      title: "Data Analyst & Business Intelligence Associate",
      department: "Analytics & Intelligence",
      type: "Full-Time",
      workplace: "Remote / Hybrid",
      experience: "0-2 Years / Early Career",
      badgeColor: "bg-amber-50 text-amber-700 border-amber-200",
      accentGradient: "from-amber-600 via-orange-600 to-red-500",
      desc: "Transform corporate datasets into interactive executive dashboards using Power BI, DAX formulas, SQL queries, and Excel models.",
      skills: ["Power BI", "SQL", "DAX", "Python Pandas", "Excel Models", "Data Visualization"],
      responsibilities: [
        "Design visual KPI reports and interactive executive dashboards",
        "Write SQL queries to extract, clean, and validate business data",
        "Document metrics and present weekly performance summaries"
      ]
    }
  ];

  // Internship Opportunities List
  const internshipRoles = [
    {
      id: "intern-aiml",
      title: "AI & Machine Learning Research Intern",
      domain: "Artificial Intelligence",
      badge: "High Demand",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      accentGradient: "from-blue-600 via-indigo-600 to-cyan-500",
      desc: "Work on neural network training, computer vision object detection (YOLO), Transformer models, and RAG agent deployment.",
      skills: ["PyTorch", "OpenCV", "Hugging Face", "FastAPI", "Vector DBs"],
      liveProject: "Autonomous Video Object Detection & Edge Inference Pipeline"
    },
    {
      id: "intern-web",
      title: "Full Stack Web Engineering Intern",
      domain: "Software Engineering",
      badge: "Core Track",
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200",
      accentGradient: "from-indigo-600 via-purple-600 to-blue-500",
      desc: "Architect enterprise web apps using React 18, Tailwind CSS, Python FastAPI / Node.js, and automated AWS deployments.",
      skills: ["React.js", "Tailwind CSS", "FastAPI", "PostgreSQL", "Docker", "AWS"],
      liveProject: "Multi-Tenant Cloud Operations Portal & Telemetry Dashboard"
    },
    {
      id: "intern-data",
      title: "Data Analytics & Power BI Intern",
      domain: "Business Intelligence",
      badge: "Corporate Choice",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      accentGradient: "from-emerald-600 via-teal-600 to-cyan-500",
      desc: "Transform complex corporate datasets into interactive executive dashboards with advanced SQL, DAX, and automated ETL.",
      skills: ["Power BI", "Advanced SQL", "DAX", "Python Pandas", "Excel Models"],
      liveProject: "Executive Corporate KPI & Revenue Intelligence Dashboard"
    },
    {
      id: "intern-python",
      title: "Python Automation & Workflow Intern",
      domain: "Automation & DevOps",
      badge: "High Concurrency",
      badgeColor: "bg-cyan-50 text-cyan-700 border-cyan-200",
      accentGradient: "from-cyan-600 via-teal-600 to-blue-500",
      desc: "High-concurrency backend services with FastAPI, task queues, web scraping, and automated business workflows.",
      skills: ["FastAPI", "Async Python", "Celery / Redis", "Selenium", "Webhooks"],
      liveProject: "Enterprise Data Harvester & Real-Time Sync Pipeline"
    },
    {
      id: "intern-java",
      title: "Java Enterprise Microservices Intern",
      domain: "Enterprise Systems",
      badge: "Robust Backend",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      accentGradient: "from-purple-600 via-indigo-600 to-blue-500",
      desc: "Production microservices, Spring Boot 3, Spring Security, Hibernate ORM, and enterprise architecture design.",
      skills: ["Java 21", "Spring Boot", "Microservices", "Docker", "PostgreSQL"],
      liveProject: "High-Throughput Order Management & Settlement Microservice"
    },
    {
      id: "intern-cyber",
      title: "Cyber Security & SOC Defense Intern",
      domain: "Security & SOC",
      badge: "Defense Focus",
      badgeColor: "bg-rose-50 text-rose-700 border-rose-200",
      accentGradient: "from-rose-600 via-red-600 to-amber-500",
      desc: "Hands-on penetration testing, network defensive protocols, vulnerability scanning, and SOC analysis.",
      skills: ["Kali Linux", "Wireshark", "Burp Suite", "OWASP Top 10", "SOC Triage"],
      liveProject: "Vulnerability Assessment & Threat Defense Simulation Lab"
    }
  ];

  // When clicking Apply Now on any Card
  const handleApplyClick = (type, title) => {
    setFormData(prev => ({
      ...prev,
      applying_for: type,
      position: title
    }));
    setSelectedRole(title);
    
    // Smooth scroll to application form
    if (formRef.current) {
      const headerOffset = 110;
      const elementPosition = formRef.current.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    }
  };

  // Handle File Selection
  const handleFileChange = (e) => {
    const file = e.target.files?.[0];
    if (!file) return;

    // Check extension
    const ext = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
    if (!['.pdf', '.doc', '.docx'].includes(ext)) {
      setFileError('Invalid file format. Please upload a PDF, DOC, or DOCX document.');
      setResumeFile(null);
      return;
    }

    // Check size (max 10MB)
    if (file.size > 10 * 1024 * 1024) {
      setFileError('File size exceeds 10 MB limit. Please upload a smaller file.');
      setResumeFile(null);
      return;
    }

    setFileError('');
    setResumeFile(file);
  };

  const handleRemoveFile = () => {
    setResumeFile(null);
    setFileError('');
    if (fileInputRef.current) {
      fileInputRef.current.value = '';
    }
  };

  // Handle Form Submit
  const handleSubmit = async (e) => {
    e.preventDefault();
    setSubmitError('');

    if (!resumeFile) {
      setFileError('Please attach your resume (PDF/DOC/DOCX) before submitting.');
      return;
    }

    setSubmitting(true);

    try {
      const postData = new FormData();
      postData.append('full_name', formData.full_name);
      postData.append('email', formData.email);
      postData.append('phone', formData.phone);
      postData.append('applying_for', formData.applying_for);
      postData.append('position', formData.position);
      postData.append('education', formData.education);
      postData.append('message', formData.message);
      postData.append('resume', resumeFile);

      await api.applyCareer(postData);

      setSubmitSuccess(true);
      confetti({ particleCount: 110, spread: 80, origin: { y: 0.6 } });

      // Reset form after successful submission
      setTimeout(() => {
        setFormData({
          full_name: '',
          email: '',
          phone: '',
          applying_for: 'Job',
          position: 'Full-Stack Software Engineer (React & Python)',
          education: 'B.Tech / B.E (CSE / IT)',
          message: ''
        });
        setResumeFile(null);
        if (fileInputRef.current) fileInputRef.current.value = '';
      }, 5000);

    } catch (err) {
      setSubmitError(err.message || 'An error occurred while submitting your application. Please try again.');
    } finally {
      setSubmitting(false);
    }
  };

  const fadeIn = {
    initial: { opacity: 0, y: 20 },
    whileInView: { opacity: 1, y: 0 },
    viewport: { once: true, margin: "-40px" },
    transition: { duration: 0.5, ease: "easeOut" }
  };

  return (
    <div className="bg-white text-slate-800">
      
      {/* 1. HERO SECTION */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Glow ambient background elements */}
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
            <span>Careers & Talent Acquisition • NextTechX Solutions</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Build the Future of Enterprise IT <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Jobs & Hands-On Internships
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal"
          >
            Join a forward-thinking software and AI development firm. Whether you are an experienced engineer looking for high-impact vacancies or a student seeking an interview-based production internship, your journey starts here.
          </motion.p>

          {/* Direct HR Contact Badge */}
          <div className="pt-2 flex items-center justify-center text-xs font-mono text-slate-600">
            <div className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-blue-50 border border-blue-200 text-blue-700 shadow-xs">
              <Mail className="w-4 h-4 text-blue-600" />
              <span>Direct HR Desk:</span>
              <a href="mailto:hr@nextechxsolutions.com" className="font-bold underline hover:text-blue-800">
                hr@nextechxsolutions.com
              </a>
            </div>
          </div>

          <div className="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a
              href="#opportunities"
              onClick={() => setActiveTab('jobs')}
              className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <span>Explore Job Vacancies</span>
              <ArrowRight className="w-4 h-4" />
            </a>
            <a
              href="#opportunities"
              onClick={() => setActiveTab('internships')}
              className="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <GraduationCap className="w-4 h-4" />
              <span>View Internship Roles</span>
            </a>
            <a
              href="#apply-form"
              className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <span>Direct Application Form ↓</span>
            </a>
          </div>

          {/* Quick Metrics */}
          <div className="pt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-blue-600 font-heading">100%</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Remote & Hybrid</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-emerald-600 font-heading">Direct</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Interview Selection</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-indigo-600 font-heading">Live</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Client Repositories</div>
            </div>
            <div className="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow">
              <div className="text-2xl sm:text-3xl font-black text-amber-600 font-heading">PPO</div>
              <div className="text-xs sm:text-sm text-slate-600 font-semibold mt-1">Full-Time Conversion</div>
            </div>
          </div>
        </div>
      </section>

      {/* Auto-Scrolling Technologies Marquee */}
      <TechMarquee />

      {/* 2. OPPORTUNITIES TABS & DISPLAY SECTION */}
      <section id="opportunities" className="py-20 lg:py-28 bg-white scroll-mt-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
          
          <motion.div {...fadeIn} className="text-center max-w-3xl mx-auto space-y-3">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Current Openings
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Find Your Opportunity at NextTechX
            </h2>
            <p className="text-sm text-slate-600 font-normal">
              Select between experienced engineering vacancies or structured interview-based internship roles.
            </p>

            {/* Filter Tabs */}
            <div className="pt-4 flex flex-wrap items-center justify-center gap-2">
              <button
                onClick={() => setActiveTab('all')}
                className={`px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all ${
                  activeTab === 'all'
                    ? 'bg-slate-900 text-white shadow-md'
                    : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
                }`}
              >
                All Opportunities ({jobVacancies.length + internshipRoles.length})
              </button>
              <button
                onClick={() => setActiveTab('jobs')}
                className={`px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all flex items-center gap-1.5 ${
                  activeTab === 'jobs'
                    ? 'bg-blue-600 text-white shadow-md'
                    : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
                }`}
              >
                <Briefcase className="w-3.5 h-3.5" />
                <span>Job Vacancies ({jobVacancies.length})</span>
              </button>
              <button
                onClick={() => setActiveTab('internships')}
                className={`px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all flex items-center gap-1.5 ${
                  activeTab === 'internships'
                    ? 'bg-emerald-600 text-white shadow-md'
                    : 'bg-slate-100 text-slate-600 hover:bg-slate-200'
                }`}
              >
                <GraduationCap className="w-3.5 h-3.5" />
                <span>Internships ({internshipRoles.length})</span>
              </button>
            </div>
          </motion.div>

          {/* A. JOB VACANCIES CARDS */}
          {(activeTab === 'all' || activeTab === 'jobs') && (
            <div className="space-y-6 pt-4">
              <div className="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div className="p-2 rounded-lg bg-blue-50 text-blue-600 border border-blue-200">
                  <Briefcase className="w-4 h-4" />
                </div>
                <div>
                  <h3 className="text-xl font-extrabold text-slate-900 font-heading">
                    Current Job Vacancies (Full-Time Engineering)
                  </h3>
                  <p className="text-xs text-slate-500">
                    Experienced engineering roles across frontend, backend microservices, AI systems, and cloud infrastructure.
                  </p>
                </div>
              </div>

              <div className="grid grid-cols-1 lg:grid-cols-2 gap-7">
                {jobVacancies.map((job) => (
                  <motion.div
                    key={job.id}
                    initial={{ opacity: 0, y: 15 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    whileHover={{ y: -4 }}
                    className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
                  >
                    <div className={`h-1.5 w-full bg-gradient-to-r ${job.accentGradient}`} />
                    
                    <div className="p-7 space-y-4">
                      <div className="flex flex-wrap items-center justify-between gap-2">
                        <span className={`px-3 py-1 rounded-full text-[10px] font-bold border font-heading ${job.badgeColor}`}>
                          {job.department}
                        </span>
                        <div className="flex items-center gap-1.5 text-xs font-semibold text-slate-500 font-heading">
                          <span className="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">{job.type}</span>
                          <span className="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">{job.workplace}</span>
                          <span className="px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200">{job.experience}</span>
                        </div>
                      </div>

                      <h4 className="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors font-heading">
                        {job.title}
                      </h4>

                      <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                        {job.desc}
                      </p>

                      {/* Responsibilities list */}
                      <div className="space-y-1.5 pt-1">
                        <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 font-heading">
                          Core Responsibilities:
                        </div>
                        {job.responsibilities.map((resp, rIdx) => (
                          <div key={rIdx} className="flex items-start gap-2 text-xs text-slate-700">
                            <CheckCircle2 className="w-3.5 h-3.5 text-blue-600 shrink-0 mt-0.5" />
                            <span>{resp}</span>
                          </div>
                        ))}
                      </div>

                      {/* Tech Stack */}
                      <div className="pt-2">
                        <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1.5 font-heading">
                          Required Tech Stack:
                        </div>
                        <div className="flex flex-wrap gap-1.5">
                          {job.skills.map((sk, sIdx) => (
                            <span
                              key={sIdx}
                              className="px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-xs font-semibold font-mono"
                            >
                              {sk}
                            </span>
                          ))}
                        </div>
                      </div>
                    </div>

                    <div className="p-6 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between gap-4">
                      <div className="text-xs text-slate-500">
                        Direct HR Desk: <strong className="text-slate-700 font-mono">hr@nextechxsolutions.com</strong>
                      </div>
                      <button
                        onClick={() => handleApplyClick('Job', job.title)}
                        className="py-2.5 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm flex items-center gap-1.5 shadow-sm hover:shadow-md transition-all font-heading active:scale-95"
                      >
                        <span>Apply Now</span>
                        <ArrowRight className="w-4 h-4" />
                      </button>
                    </div>
                  </motion.div>
                ))}
              </div>
            </div>
          )}

          {/* B. INTERNSHIP OPPORTUNITIES CARDS */}
          {(activeTab === 'all' || activeTab === 'internships') && (
            <div className="space-y-6 pt-10">
              <div className="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div className="p-2 rounded-lg bg-emerald-50 text-emerald-600 border border-emerald-200">
                  <GraduationCap className="w-4 h-4" />
                </div>
                <div>
                  <h3 className="text-xl font-extrabold text-slate-900 font-heading">
                    Internship Opportunities (Live Client Projects)
                  </h3>
                  <p className="text-xs text-slate-500">
                    Interview-based technical internships with real codebase contributions and 1-on-1 architect mentorship.
                  </p>
                </div>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                {internshipRoles.map((role) => (
                  <motion.div
                    key={role.id}
                    initial={{ opacity: 0, y: 15 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    whileHover={{ y: -4 }}
                    className="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-emerald-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left"
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

                      <h4 className="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors font-heading">
                        {role.title}
                      </h4>

                      <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                        {role.desc}
                      </p>

                      {/* Capstone Project */}
                      <div className="p-3.5 rounded-2xl bg-emerald-50/70 border border-emerald-100 space-y-1">
                        <div className="text-[11px] font-bold uppercase tracking-wider text-emerald-800 flex items-center gap-1 font-heading">
                          <GitBranch className="w-3.5 h-3.5 text-emerald-600" />
                          <span>Assigned Live Module:</span>
                        </div>
                        <div className="text-slate-800 text-xs font-semibold leading-relaxed">
                          {role.liveProject}
                        </div>
                      </div>

                      {/* Tech Stack */}
                      <div>
                        <div className="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1.5 font-heading">
                          Tech Competencies:
                        </div>
                        <div className="flex flex-wrap gap-1.5">
                          {role.skills.map((sk, sIdx) => (
                            <span
                              key={sIdx}
                              className="px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-xs font-semibold font-mono"
                            >
                              {sk}
                            </span>
                          ))}
                        </div>
                      </div>
                    </div>

                    <div className="p-6 bg-slate-50/70 border-t border-slate-100">
                      <button
                        onClick={() => handleApplyClick('Internship', role.title)}
                        className="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 shadow-sm hover:shadow-md transition-all font-heading active:scale-95"
                      >
                        <span>Apply Now</span>
                        <ArrowRight className="w-4 h-4" />
                      </button>
                    </div>
                  </motion.div>
                ))}
              </div>
            </div>
          )}

        </div>
      </section>

      {/* 3. CAREER APPLICATION FORM SECTION */}
      <section id="apply-form" ref={formRef} className="py-20 lg:py-28 bg-slate-50/70 border-t border-slate-200 scroll-mt-20">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="p-8 sm:p-12 rounded-3xl bg-white border border-slate-200/90 shadow-xl space-y-8 text-left">
            
            <div className="text-center space-y-2 border-b border-slate-200 pb-6">
              <div className="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold font-heading">
                <Send className="w-3.5 h-3.5" />
                <span>NextTechX Talent Application Portal</span>
              </div>
              <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                Career & Internship Application Form
              </h2>
              <p className="text-xs sm:text-sm text-slate-600 font-normal max-w-xl mx-auto">
                Submit your profile and attach your resume. All applications are directly reviewed by our HR team at <strong className="text-slate-800">hr@nextechxsolutions.com</strong>.
              </p>
            </div>

            {submitSuccess ? (
              <div className="py-12 text-center space-y-4 animate-in fade-in zoom-in duration-300">
                <div className="w-16 h-16 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto border border-emerald-300 shadow-sm">
                  <CheckCircle2 className="w-9 h-9" />
                </div>
                <h3 className="text-2xl font-bold text-slate-900 font-heading">
                  Application Transmitted Successfully!
                </h3>
                <p className="text-sm text-slate-600 max-w-md mx-auto leading-relaxed">
                  Thank you, <strong className="text-blue-600">{formData.full_name}</strong>! Your application for <span className="font-semibold text-slate-900">"{formData.position}"</span> and your resume have been successfully transmitted to our recruitment team.
                </p>
                <div className="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 max-w-md mx-auto text-xs text-emerald-800">
                  Our HR desk will review your credentials and contact you within 24 to 48 hours via WhatsApp or Email.
                </div>
                <button
                  onClick={() => setSubmitSuccess(false)}
                  className="px-6 py-2.5 rounded-xl bg-slate-900 text-white font-semibold text-xs hover:bg-slate-800 transition-colors"
                >
                  Submit Another Application
                </button>
              </div>
            ) : (
              <form onSubmit={handleSubmit} className="space-y-6">
                
                {submitError && (
                  <div className="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm flex items-center gap-2.5">
                    <AlertCircle className="w-5 h-5 shrink-0 text-red-600" />
                    <span>{submitError}</span>
                  </div>
                )}

                {/* 1. Candidate Name & Email */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Full Name *
                    </label>
                    <div className="relative">
                      <User className="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" />
                      <input
                        type="text"
                        required
                        value={formData.full_name}
                        onChange={(e) => setFormData({ ...formData, full_name: e.target.value })}
                        placeholder="e.g. Rahul Sharma"
                        className="w-full bg-white border border-slate-300 rounded-xl pl-10 pr-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                  </div>

                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Email Address *
                    </label>
                    <div className="relative">
                      <Mail className="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" />
                      <input
                        type="email"
                        required
                        value={formData.email}
                        onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                        placeholder="rahul@example.com"
                        className="w-full bg-white border border-slate-300 rounded-xl pl-10 pr-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                  </div>
                </div>

                {/* 2. Phone Number & Applying For (Job or Internship) */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Phone Number *
                    </label>
                    <div className="relative">
                      <Phone className="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" />
                      <input
                        type="tel"
                        required
                        value={formData.phone}
                        onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                        placeholder="+91 98765 43210"
                        className="w-full bg-white border border-slate-300 rounded-xl pl-10 pr-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                  </div>

                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Applying For (Category) *
                    </label>
                    <div className="grid grid-cols-2 gap-2">
                      <button
                        type="button"
                        onClick={() => {
                          setFormData({
                            ...formData,
                            applying_for: 'Job',
                            position: jobVacancies[0].title
                          });
                        }}
                        className={`py-3 px-3 rounded-xl border text-xs font-bold transition-all flex items-center justify-center gap-1.5 ${
                          formData.applying_for === 'Job'
                            ? 'bg-blue-600 text-white border-blue-600 shadow-sm'
                            : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50'
                        }`}
                      >
                        <Briefcase className="w-3.5 h-3.5" />
                        <span>Job Vacancy</span>
                      </button>

                      <button
                        type="button"
                        onClick={() => {
                          setFormData({
                            ...formData,
                            applying_for: 'Internship',
                            position: internshipRoles[0].title
                          });
                        }}
                        className={`py-3 px-3 rounded-xl border text-xs font-bold transition-all flex items-center justify-center gap-1.5 ${
                          formData.applying_for === 'Internship'
                            ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm'
                            : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50'
                        }`}
                      >
                        <GraduationCap className="w-3.5 h-3.5" />
                        <span>Internship</span>
                      </button>
                    </div>
                  </div>
                </div>

                {/* 3. Position / Role & Education */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Position / Internship Role *
                    </label>
                    <select
                      required
                      value={formData.position}
                      onChange={(e) => setFormData({ ...formData, position: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all font-medium"
                    >
                      {formData.applying_for === 'Job' ? (
                        <optgroup label="Available Job Vacancies">
                          {jobVacancies.map((job) => (
                            <option key={job.id} value={job.title}>{job.title}</option>
                          ))}
                        </optgroup>
                      ) : (
                        <optgroup label="Available Internship Domains">
                          {internshipRoles.map((role) => (
                            <option key={role.id} value={role.title}>{role.title}</option>
                          ))}
                        </optgroup>
                      )}
                    </select>
                  </div>

                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Education / Highest Degree *
                    </label>
                    <select
                      required
                      value={formData.education}
                      onChange={(e) => setFormData({ ...formData, education: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all"
                    >
                      <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                      <option value="B.Tech / B.E (ECE / Electrical / Other)">B.Tech / B.E (ECE / Other)</option>
                      <option value="BCA / MCA">BCA / MCA</option>
                      <option value="M.Tech / M.E">M.Tech / M.E</option>
                      <option value="B.Sc / M.Sc Computer Science / IT">B.Sc / M.Sc Computer Science</option>
                      <option value="Diploma in Engineering">Diploma in Engineering</option>
                      <option value="Other Degree / Self-Taught Developer">Other Degree / Self-Taught</option>
                    </select>
                  </div>
                </div>

                {/* 4. Resume Upload (PDF / DOC / DOCX) */}
                <div>
                  <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                    Resume Upload (PDF / DOC / DOCX) *
                  </label>
                  
                  <div className="relative">
                    <input
                      type="file"
                      ref={fileInputRef}
                      onChange={handleFileChange}
                      accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                      className="hidden"
                      id="resume-file-input"
                    />

                    {!resumeFile ? (
                      <label
                        htmlFor="resume-file-input"
                        className="flex flex-col items-center justify-center p-6 border-2 border-dashed border-slate-300 rounded-2xl hover:border-blue-500 hover:bg-blue-50/40 cursor-pointer transition-all text-center group"
                      >
                        <div className="w-12 h-12 rounded-full bg-blue-50 group-hover:bg-blue-100 text-blue-600 flex items-center justify-center transition-colors mb-2">
                          <Upload className="w-5 h-5" />
                        </div>
                        <span className="text-xs sm:text-sm font-bold text-slate-800 font-heading">
                          Click to browse and upload your resume
                        </span>
                        <span className="text-[11px] text-slate-500 mt-1">
                          Supported formats: PDF, DOC, DOCX (Max size: 10 MB)
                        </span>
                      </label>
                    ) : (
                      <div className="p-4 rounded-2xl bg-emerald-50/80 border border-emerald-200 flex items-center justify-between">
                        <div className="flex items-center gap-3">
                          <div className="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0">
                            <FileText className="w-5 h-5" />
                          </div>
                          <div>
                            <div className="text-xs sm:text-sm font-bold text-slate-900 max-w-[260px] sm:max-w-md truncate">
                              {resumeFile.name}
                            </div>
                            <div className="text-[11px] text-emerald-700 font-semibold font-mono">
                              {(resumeFile.size / 1024).toFixed(1)} KB • Ready to send
                            </div>
                          </div>
                        </div>

                        <button
                          type="button"
                          onClick={handleRemoveFile}
                          className="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors"
                          title="Remove attached file"
                        >
                          <X className="w-5 h-5" />
                        </button>
                      </div>
                    )}
                  </div>

                  {fileError && (
                    <p className="text-xs text-red-600 font-semibold mt-1.5 flex items-center gap-1">
                      <AlertCircle className="w-3.5 h-3.5" />
                      <span>{fileError}</span>
                    </p>
                  )}
                </div>

                {/* 5. Message / Cover Note */}
                <div>
                  <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                    Message / Cover Statement (Optional)
                  </label>
                  <textarea
                    rows={3}
                    value={formData.message}
                    onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                    placeholder="Briefly tell us about your experience, notable projects, GitHub/LinkedIn links, or reason for applying..."
                    className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all resize-none"
                  />
                </div>

                {/* Submit Action */}
                <div className="pt-2">
                  <button
                    type="submit"
                    disabled={submitting}
                    className="w-full py-4 rounded-xl bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all disabled:opacity-50 active:scale-98 font-heading"
                  >
                    {submitting ? (
                      <span className="flex items-center justify-center gap-2">
                        <Loader2 className="w-4 h-4 animate-spin" />
                        <span>Uploading Resume & Transmitting Application...</span>
                      </span>
                    ) : (
                      <span className="flex items-center justify-center gap-2">
                        <Send className="w-4 h-4" />
                        <span>Submit Application & Resume to HR</span>
                      </span>
                    )}
                  </button>

                  <div className="pt-3 text-center text-xs text-slate-500 font-mono">
                    Direct HR Inquiries: <a href="mailto:hr@nextechxsolutions.com" className="text-blue-600 hover:underline font-bold">hr@nextechxsolutions.com</a>
                  </div>
                </div>

              </form>
            )}

          </div>

        </div>
      </section>

    </div>
  );
}

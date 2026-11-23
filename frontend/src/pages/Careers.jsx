import React, { useState, useRef } from 'react';
import { motion } from 'framer-motion';
import { 
  Briefcase, 
  GraduationCap, 
  Upload, 
  FileText, 
  X, 
  CheckCircle2, 
  AlertCircle, 
  ArrowRight, 
  Mail, 
  User, 
  Phone, 
  Sparkles,
  GitBranch,
  Shield,
  Clock,
  MapPin,
  Info
} from 'lucide-react';
import confetti from 'canvas-confetti';
import TechMarquee from '../components/TechMarquee';
import { api } from '../services/api';

export default function Careers({ onOpenQuote, onOpenConsultation }) {
  const [selectedRole, setSelectedRole] = useState(null);
  
  // Application Form State (Focused Exclusively on Internship Opportunities)
  const [formData, setFormData] = useState({
    full_name: '',
    email: '',
    phone: '',
    applying_for: 'Internship',
    position: 'AI & Machine Learning Research Intern',
    education: 'B.Tech / B.E (CSE / IT)',
    message: ''
  });

  const [resumeFile, setResumeFile] = useState(null);
  const [fileError, setFileError] = useState('');
  const [submitting, setSubmitting] = useState(false);
  const [submitSuccess, setSubmitSuccess] = useState(false);
  const [emailSentStatus, setEmailSentStatus] = useState(false);
  const [submitError, setSubmitError] = useState('');

  const formRef = useRef(null);
  const fileInputRef = useRef(null);

  // Available Internship Opportunities List
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
  const handleApplyClick = (title) => {
    setFormData(prev => ({
      ...prev,
      applying_for: 'Internship',
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

    // Check file format
    const fileExt = file.name.split('.').pop().toLowerCase();
    const validExtensions = ['pdf', 'doc', 'docx'];

    if (!validExtensions.includes(fileExt)) {
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

  // Remove File
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
      postData.append('applying_for', 'Internship');
      postData.append('position', formData.position);
      postData.append('education', formData.education);
      postData.append('message', formData.message);
      postData.append('resume', resumeFile);

      const res = await api.applyCareer(postData);

      setEmailSentStatus(Boolean(res && (res.applicant_email_sent || res.email_sent)));
      setSubmitSuccess(true);
      confetti({ particleCount: 110, spread: 80, origin: { y: 0.6 } });

      // Reset form after successful submission
      setTimeout(() => {
        setFormData({
          full_name: '',
          email: '',
          phone: '',
          applying_for: 'Internship',
          position: 'AI & Machine Learning Research Intern',
          education: 'B.Tech / B.E (CSE / IT)',
          message: ''
        });
        setResumeFile(null);
        if (fileInputRef.current) fileInputRef.current.value = '';
      }, 5000);

    } catch (err) {
      const rawMsg = err.message || '';
      let msg = 'An error occurred while submitting your application. Please try again.';
      if (rawMsg.includes('Failed to fetch') || rawMsg.includes('NetworkError')) {
        msg = 'Connection error: Unable to reach the server. Please check your internet connection and try submitting again.';
      } else if (rawMsg) {
        msg = rawMsg;
      }
      setSubmitError(msg);
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
    <div className="bg-slate-50 min-h-screen text-slate-800">
      
      {/* 1. HERO SECTION */}
      <section className="relative pt-32 pb-20 lg:pt-40 lg:pb-28 bg-gradient-to-b from-blue-50/80 via-white to-slate-50 overflow-hidden border-b border-slate-200/80">
        
        {/* Subtle Decorative Gradients */}
        <div className="absolute top-0 right-1/4 w-[500px] h-[500px] bg-blue-400/10 rounded-full blur-[120px] pointer-events-none hidden sm:block" />
        <div className="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-400/10 rounded-full blur-[120px] pointer-events-none hidden sm:block" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <GraduationCap className="w-4 h-4 text-blue-600" />
            <span>Careers & Internships • NexTechX Solutions</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl xs:text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Launch Your Journey in Advanced Tech <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Technical Internships & Career Growth
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal"
          >
            Join a forward-thinking software and AI development firm. Currently, we are offering internship opportunities. Stay connected for future updates.
          </motion.p>

          {/* Official Recruitment Status Notice Banner */}
          <div className="pt-1 max-w-2xl mx-auto">
            <div className="p-4 sm:p-5 rounded-2xl bg-blue-50/90 border border-blue-200/90 text-blue-900 flex items-center justify-center gap-3 text-xs sm:text-sm font-semibold shadow-xs">
              <Info className="w-5 h-5 text-blue-600 flex-shrink-0" />
              <span>Currently, we are offering internship opportunities. Stay connected for future updates.</span>
            </div>
          </div>

          {/* Direct HR Contact Badge */}
          <div className="pt-1 flex items-center justify-center text-xs font-mono text-slate-600">
            <div className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-700 shadow-xs">
              <Mail className="w-4 h-4 text-blue-600" />
              <span>Direct HR Desk:</span>
              <a href="mailto:hr@nextechxsolutions.com" className="font-bold text-blue-600 underline hover:text-blue-800">
                hr@nextechxsolutions.com
              </a>
            </div>
          </div>

          <div className="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a
              href="#opportunities"
              className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading"
            >
              <GraduationCap className="w-4 h-4" />
              <span>Explore Internship Opportunities</span>
              <ArrowRight className="w-4 h-4" />
            </a>
            <a
              href="#apply-form"
              className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
            >
              <span>Direct Application Form â†“</span>
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

      {/* 2. INTERNSHIP OPPORTUNITIES SECTION */}
      <section id="opportunities" className="py-20 lg:py-28 bg-white scroll-mt-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
          
          <motion.div {...fadeIn} className="text-center max-w-3xl mx-auto space-y-3">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Current Openings
            </span>
            <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Available Internship Opportunities
            </h2>
            <p className="text-sm text-slate-600 font-normal">
              Currently, we are offering internship opportunities. Stay connected for future updates.
            </p>

            <div className="pt-2 flex justify-center">
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold">
                <Sparkles className="w-4 h-4 text-emerald-600" />
                <span>Active Internship Programs ({internshipRoles.length} Tracks Open)</span>
              </div>
            </div>
          </motion.div>

          {/* INTERNSHIP CARDS GRID */}
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
                    onClick={() => handleApplyClick(role.title)}
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
      </section>

      {/* 3. APPLICATION PROCESS STEPS */}
      <section className="py-20 bg-slate-50 border-t border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
          <motion.div {...fadeIn} className="text-center max-w-2xl mx-auto space-y-3">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
              Transparent Selection
            </span>
            <h2 className="text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Our 3-Step Selection Process
            </h2>
            <p className="text-sm text-slate-600 font-normal">
              Direct, merit-based candidate onboarding with zero unnecessary delays.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="p-8 rounded-3xl bg-white border border-slate-200/90 shadow-sm relative space-y-4">
              <div className="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 font-extrabold text-xl flex items-center justify-center font-heading">
                1
              </div>
              <h3 className="text-lg font-bold text-slate-900 font-heading">Submit Profile & Resume</h3>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                Fill the online application form below and attach your latest resume (PDF/DOC). Applications are received directly by our HR acquisition team.
              </p>
            </div>

            <div className="p-8 rounded-3xl bg-white border border-slate-200/90 shadow-sm relative space-y-4">
              <div className="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 font-extrabold text-xl flex items-center justify-center font-heading">
                2
              </div>
              <h3 className="text-lg font-bold text-slate-900 font-heading">Technical Interview / Assessment</h3>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                Participate in a 30-minute structured discussion covering your technical interests, coding foundation, and domain alignment with our lead mentors.
              </p>
            </div>

            <div className="p-8 rounded-3xl bg-white border border-slate-200/90 shadow-sm relative space-y-4">
              <div className="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 font-extrabold text-xl flex items-center justify-center font-heading">
                3
              </div>
              <h3 className="text-lg font-bold text-slate-900 font-heading">Offer Letter & Team Onboarding</h3>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                Receive your official NexTechX onboarding credentials, repository access, project milestone schedule, and dedicated technical mentor.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* 4. CAREER & INTERNSHIP APPLICATION FORM SECTION */}
      <section id="apply-form" ref={formRef} className="py-20 lg:py-28 bg-white scroll-mt-20">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="rounded-3xl bg-slate-50/90 border border-slate-200 shadow-xl p-6 sm:p-10 lg:p-12 space-y-8">
            <div className="text-center space-y-3">
              <span className="text-xs uppercase font-extrabold tracking-wider text-emerald-600 font-heading">
                Direct Submission
              </span>
              <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Internship Application Form
              </h2>
              <p className="text-xs sm:text-sm text-slate-600 font-normal max-w-xl mx-auto">
                Submit your profile and attach your resume. All applications are directly reviewed by our HR team at <strong className="text-slate-800">hr@nextechxsolutions.com</strong>.
              </p>

              {/* Status Notice */}
              <div className="pt-1">
                <div className="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 border border-blue-200 text-blue-900 text-xs font-semibold">
                  <Info className="w-4 h-4 text-blue-600 shrink-0" />
                  <span>Currently, we are offering internship opportunities. Stay connected for future updates.</span>
                </div>
              </div>
            </div>

            {/* Success Notification */}
            {submitSuccess ? (
              <motion.div 
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                className="p-8 sm:p-10 rounded-2xl bg-emerald-50/90 border border-emerald-200 text-center space-y-4 shadow-sm"
              >
                <div className="w-16 h-16 rounded-full bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-md">
                  <CheckCircle2 className="w-8 h-8" />
                </div>
                <h3 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                  Thank You for Applying!
                </h3>
                <div className="space-y-3 max-w-lg mx-auto text-slate-700 text-sm sm:text-base leading-relaxed">
                  <p>
                    Thank you for your interest in <strong className="text-slate-900 font-bold">NEXTECHX SOLUTIONS</strong>. Your application has been received successfully.
                  </p>
                  <p>
                    For any queries, please contact our HR team at{' '}
                    <a 
                      href="mailto:hr@nextechxsolutions.com" 
                      className="text-blue-600 hover:text-blue-700 font-bold underline transition-colors"
                    >
                      hr@nextechxsolutions.com
                    </a>.
                  </p>
                  <p className="font-semibold text-slate-900">
                    We appreciate your interest in joining our team!
                  </p>
                </div>

                {emailSentStatus ? (
                  <div className="p-3.5 rounded-xl bg-blue-50/80 border border-blue-200/80 text-xs text-blue-900 max-w-md mx-auto space-y-1">
                    <p className="font-bold flex items-center justify-center gap-1.5">
                      <CheckCircle2 className="w-3.5 h-3.5 text-blue-600" />
                      <span>Confirmation Email Dispatched</span>
                    </p>
                    <p className="text-blue-800">
                      A formal acknowledgement receipt has been sent to your registered email address. Shortlisted candidates will be contacted directly regarding the next evaluation rounds.
                    </p>
                  </div>
                ) : (
                  <div className="p-3.5 rounded-xl bg-slate-100/80 border border-slate-200 text-xs text-slate-700 max-w-md mx-auto space-y-1">
                    <p className="font-bold flex items-center justify-center gap-1.5 text-slate-900">
                      <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                      <span>Application & Resume Logged</span>
                    </p>
                    <p className="text-slate-600">
                      Your details and resume are saved in our HR recruitment database.
                    </p>
                  </div>
                )}
                <div className="pt-2">
                  <button
                    type="button"
                    onClick={() => setSubmitSuccess(false)}
                    className="px-6 py-2.5 rounded-xl bg-slate-900 text-white text-xs sm:text-sm font-bold hover:bg-slate-800 transition-colors shadow-sm"
                  >
                    Submit Another Application
                  </button>
                </div>
              </motion.div>
            ) : (
              <form onSubmit={handleSubmit} className="space-y-6">
                
                {submitError && (
                  <div className="p-4 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center gap-3 text-red-600 text-sm">
                    <AlertCircle className="w-5 h-5 flex-shrink-0" />
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

                {/* 2. Phone Number & Program Category */}
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
                    <div className="py-3 px-4 rounded-xl border border-emerald-300 bg-emerald-50/70 text-emerald-800 text-xs sm:text-sm font-bold flex items-center gap-2">
                      <GraduationCap className="w-4 h-4 text-emerald-600" />
                      <span>Internship Opportunities</span>
                    </div>
                  </div>
                </div>

                {/* 3. Position / Role & Education */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label className="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">
                      Target Internship Role *
                    </label>
                    <select
                      required
                      value={formData.position}
                      onChange={(e) => setFormData({ ...formData, position: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all font-medium"
                    >
                      {internshipRoles.map((role) => (
                        <option key={role.id} value={role.title}>{role.title}</option>
                      ))}
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
                      className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all font-medium"
                    >
                      <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                      <option value="B.Tech / B.E (Other Branches)">B.Tech / B.E (Other Branches)</option>
                      <option value="M.Tech / M.E">M.Tech / M.E</option>
                      <option value="MCA / M.Sc (Computer Science / IT)">MCA / M.Sc (Computer Science / IT)</option>
                      <option value="BCA / B.Sc (IT / Computer Science)">BCA / B.Sc (IT / Computer Science)</option>
                      <option value="Diploma in Engineering">Diploma in Engineering</option>
                      <option value="Other Degree / Self-Taught">Other Degree / Self-Taught</option>
                    </select>
                  </div>
                </div>

                {/* 4. Resume Upload */}
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
                            <div className="text-xs sm:text-sm font-bold text-slate-900 max-w-[140px] xs:max-w-[200px] sm:max-w-md truncate">
                              {resumeFile.name}
                            </div>
                            <div className="text-[11px] text-emerald-700 font-semibold font-mono">
                              {(resumeFile.size / 1024).toFixed(1)} KB â€¢ Ready to send
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
                    placeholder="Briefly describe your programming experience, project repositories, or reasons for applying..."
                    className="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 transition-all resize-none"
                  />
                </div>

                {/* Submit Action */}
                <div className="pt-2">
                  <button
                    type="submit"
                    disabled={submitting}
                    className="w-full py-4 rounded-xl bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold text-sm sm:text-base shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 active:scale-98 disabled:opacity-60 font-heading"
                  >
                    {submitting ? (
                      <div className="flex items-center gap-2">
                        <div className="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin" />
                        <span>Transmitting Resume & Details...</span>
                      </div>
                    ) : (
                      <>
                        <Upload className="w-4 h-4" />
                        <span>Submit Application & Resume to HR</span>
                      </>
                    )}
                  </button>

                  <p className="text-[11px] text-center text-slate-500 mt-3 font-mono">
                    Direct HR Inquiries: <a href="mailto:hr@nextechxsolutions.com" className="text-blue-600 hover:underline font-bold">hr@nextechxsolutions.com</a>
                  </p>
                </div>

              </form>
            )}

          </div>

        </div>
      </section>

    </div>
  );
}

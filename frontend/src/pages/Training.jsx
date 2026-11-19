import React, { useState, useEffect } from 'react';
import { motion } from 'framer-motion';
import { 
  GraduationCap, 
  Sparkles, 
  CheckCircle2, 
  Clock, 
  Award, 
  BookOpen, 
  Users, 
  Code2, 
  ChevronRight, 
  Layers, 
  Cpu,
  BarChart3,
  ShieldCheck,
  Send,
  Loader2,
  Calendar,
  ArrowRight
} from 'lucide-react';
import { api } from '../services/api';
import confetti from 'canvas-confetti';
import TechMarquee from '../components/TechMarquee';

export default function Training({ onOpenRegister, onSelectCourseForRegister }) {
  const [courses, setCourses] = useState([]);
  const [syllabusModal, setSyllabusModal] = useState(null);

  // Quick Inline Enrollment Form
  const [inlineForm, setInlineForm] = useState({
    full_name: '',
    email: '',
    phone: '',
    qualification: 'B.Tech / B.E (CSE / IT)',
    current_status: 'Student / Professional',
    course_selected: 'Artificial Intelligence & Machine Learning',
    batch_timing: 'Weekend Batch (Sat & Sun, 10 AM - 1 PM)',
    resume_link: '',
    statement: ''
  });
  const [loading, setLoading] = useState(false);
  const [submitted, setSubmitted] = useState(false);

  useEffect(() => {
    api.getCourses()
      .then(data => setCourses(data || []))
      .catch(err => console.error("Could not fetch courses", err));
  }, []);

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
          current_status: 'Student / Professional',
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

  const trainingPillars = [
    {
      title: "Industry-Led Curriculum",
      desc: "Designed and updated quarterly by veteran tech architects to match current market demands.",
      icon: BookOpen
    },
    {
      title: "Hands-on Code Labs",
      desc: "80% practical coding, live deployment pipelines, and architecture reviews for every student.",
      icon: Code2
    },
    {
      title: "Verified Credentials",
      desc: "Earn recognized course certification and project credentials verifiable online.",
      icon: Award
    },
    {
      title: "Flexible Learning Formats",
      desc: "Weekend intensives, evening batches, and self-paced tracks with weekly 1-on-1 mentor syncs.",
      icon: Clock
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
      
      {/* 1. HERO BANNER */}
      <section className="relative pt-14 pb-16 lg:pb-24 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-xs font-semibold text-blue-700"
          >
            <GraduationCap className="w-3.5 h-3.5 text-blue-600" />
            <span>Professional Engineering Training Programs</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto"
          >
            Master Cutting-Edge Tech with <br />
            <span className="text-blue-600">
              Industry-Grade Training
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            Accelerate your technical career with comprehensive courses in Python, Java Enterprise, Data Analytics & Power BI, AI/ML, Cyber Security, and Modern Full Stack Development.
          </motion.p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={() => onOpenRegister?.()}
              className="px-6 py-3.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all"
            >
              Enroll in a Training Track
            </button>
            <a
              href="#training-catalog"
              className="px-6 py-3.5 rounded-lg border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors"
            >
              Browse Courses ↓
            </a>
          </div>

          {/* Training Metrics */}
          <div className="pt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-3xl mx-auto text-left">
            <div className="p-4 rounded-xl bg-slate-50 border border-slate-200">
              <div className="text-2xl font-black text-blue-600">2,500+</div>
              <div className="text-xs text-slate-600 font-medium">Engineers Trained</div>
            </div>
            <div className="p-4 rounded-xl bg-slate-50 border border-slate-200">
              <div className="text-2xl font-black text-indigo-600">6</div>
              <div className="text-xs text-slate-600 font-medium">Flagship Tracks</div>
            </div>
            <div className="p-4 rounded-xl bg-slate-50 border border-slate-200">
              <div className="text-2xl font-black text-emerald-600">80%</div>
              <div className="text-xs text-slate-600 font-medium">Hands-on Lab Ratio</div>
            </div>
            <div className="p-4 rounded-xl bg-slate-50 border border-slate-200">
              <div className="text-2xl font-black text-sky-600">100%</div>
              <div className="text-xs text-slate-600 font-medium">Verified Certification</div>
            </div>
          </div>
        </div>
      </section>

      {/* Auto-Scrolling Technologies Ticker */}
      <TechMarquee />

      {/* 2. PILLARS OF TRAINING */}
      <section className="py-20 bg-slate-50/70 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {trainingPillars.map((p, idx) => {
              const Icon = p.icon;
              return (
                <div
                  key={idx}
                  className="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3 text-left"
                >
                  <div className="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <Icon className="w-5 h-5" />
                  </div>
                  <h3 className="text-base font-bold text-slate-900">{p.title}</h3>
                  <p className="text-xs text-slate-600 leading-relaxed">{p.desc}</p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 3. COURSES CATALOG */}
      <section id="training-catalog" className="py-20 lg:py-28 bg-white scroll-mt-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <motion.div {...fadeIn} className="flex flex-col md:flex-row items-start md:items-end justify-between gap-4 mb-12">
            <div>
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold uppercase tracking-wider mb-2">
                <BookOpen className="w-3.5 h-3.5" />
                <span>Course Catalog</span>
              </div>
              <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Specialized Engineering Courses
              </h2>
            </div>
            <p className="text-xs sm:text-sm text-slate-600 max-w-sm">
              All programs include structured weekly modules, coding labs, capstone projects, and industry credentials.
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {courses.map((course) => (
              <motion.div
                key={course.id}
                whileHover={{ y: -4 }}
                className="p-7 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-400 transition-all flex flex-col justify-between group"
              >
                <div>
                  <div className="flex items-center justify-between mb-3">
                    <span className="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200">
                      {course.category}
                    </span>
                    <span className="text-[11px] font-mono text-slate-500 flex items-center gap-1">
                      <Clock className="w-3 h-3 text-blue-600" />
                      {course.duration}
                    </span>
                  </div>

                  <h3 className="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                    {course.title}
                  </h3>
                  <p className="text-xs text-slate-600 mt-2 leading-relaxed">
                    {course.description}
                  </p>

                  {/* Skills tags */}
                  <div className="flex flex-wrap gap-1.5 my-4">
                    {course.skills.map((sk, sIdx) => (
                      <span
                        key={sIdx}
                        className="px-2 py-0.5 rounded bg-slate-50 border border-slate-200 text-slate-600 text-[10px] font-medium"
                      >
                        {sk}
                      </span>
                    ))}
                  </div>

                  {/* Modules snapshot */}
                  <div className="pt-3 border-t border-slate-100 space-y-1.5 text-xs text-slate-700">
                    <div className="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                      Syllabus Highlights:
                    </div>
                    {course.modules.slice(0, 3).map((mod, mIdx) => (
                      <div key={mIdx} className="flex items-start gap-1.5 text-[11px] text-slate-600">
                        <CheckCircle2 className="w-3.5 h-3.5 text-blue-600 shrink-0 mt-0.5" />
                        <span className="line-clamp-1">{mod}</span>
                      </div>
                    ))}
                  </div>
                </div>

                <div className="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between gap-2">
                  <button
                    onClick={() => setSyllabusModal(course)}
                    className="text-xs text-slate-600 hover:text-blue-600 flex items-center gap-1 font-semibold"
                  >
                    <BookOpen className="w-3.5 h-3.5 text-blue-600" />
                    <span>View Details</span>
                  </button>

                  <button
                    onClick={() => {
                      onSelectCourseForRegister?.(course.title);
                      onOpenRegister?.();
                    }}
                    className="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs flex items-center gap-1.5 shadow-sm transition-all"
                  >
                    <span>Register Now</span>
                    <ChevronRight className="w-3 h-3" />
                  </button>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* 4. SYLLABUS MODAL */}
      {syllabusModal && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto">
          <div className="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onClick={() => setSyllabusModal(null)} />
          <div className="relative w-full max-w-2xl bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 z-10 space-y-6 shadow-2xl">
            <div className="flex items-center justify-between pb-4 border-b border-slate-100">
              <div>
                <span className="text-[10px] font-bold uppercase text-blue-600 tracking-wider">Curriculum Details</span>
                <h3 className="text-xl font-bold text-slate-900">{syllabusModal.title}</h3>
              </div>
              <button 
                onClick={() => setSyllabusModal(null)}
                className="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors"
              >
                ✕
              </button>
            </div>

            <div className="space-y-4 max-h-[55vh] overflow-y-auto pr-2 text-xs">
              <div className="space-y-2">
                <h4 className="font-bold text-slate-900 uppercase text-[11px] tracking-wider">Full Module Breakdown:</h4>
                {syllabusModal.modules.map((m, idx) => (
                  <div key={idx} className="p-3 rounded-lg bg-slate-50 border border-slate-200 flex items-start gap-2">
                    <span className="font-mono text-blue-600 font-bold">0{idx + 1}.</span>
                    <span className="text-slate-700">{m}</span>
                  </div>
                ))}
              </div>

              <div className="space-y-2 pt-2">
                <h4 className="font-bold text-blue-700 uppercase text-[11px] tracking-wider">Course Outcomes & Deliverables:</h4>
                {syllabusModal.internship_perks.map((p, idx) => (
                  <div key={idx} className="flex items-center gap-2 text-slate-700">
                    <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600 shrink-0" />
                    <span>{p}</span>
                  </div>
                ))}
              </div>
            </div>

            <div className="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
              <button
                onClick={() => setSyllabusModal(null)}
                className="px-4 py-2 text-xs text-slate-600 hover:text-slate-900"
              >
                Close
              </button>
              <button
                onClick={() => {
                  const courseTitle = syllabusModal.title;
                  setSyllabusModal(null);
                  onSelectCourseForRegister?.(courseTitle);
                  onOpenRegister?.();
                }}
                className="px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 font-semibold text-xs text-white shadow-sm transition-colors"
              >
                Enroll in this Course →
              </button>
            </div>
          </div>
        </div>
      )}

      {/* 5. FAST-TRACK ENROLLMENT FORM */}
      <section className="py-20 bg-slate-50/70 border-t border-slate-200/80">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-8 sm:p-12 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-6">
            <div className="text-center space-y-2">
              <div className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold">
                <Send className="w-3.5 h-3.5" />
                <span>Training Registration</span>
              </div>
              <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900">
                Enroll in Upcoming Training Batches
              </h2>
              <p className="text-xs sm:text-sm text-slate-600">
                Choose your preferred timing and track. Receive syllabus details and schedule immediately.
              </p>
            </div>

            {submitted ? (
              <div className="py-10 text-center space-y-3">
                <div className="w-14 h-14 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto">
                  <CheckCircle2 className="w-8 h-8" />
                </div>
                <h3 className="text-lg font-bold text-slate-900">Registration Successfully Recorded!</h3>
                <p className="text-xs text-slate-600">
                  Our academic team will reach out with onboarding materials, curriculum schedules, and lab access.
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
                      placeholder="e.g. Sneha Patel"
                      className="w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                    />
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Email Address *</label>
                    <input
                      type="email"
                      required
                      value={inlineForm.email}
                      onChange={(e) => setInlineForm({ ...inlineForm, email: e.target.value })}
                      placeholder="sneha@example.com"
                      className="w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
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
                      className="w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                    />
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Target Training Program *</label>
                    <select
                      value={inlineForm.course_selected}
                      onChange={(e) => setInlineForm({ ...inlineForm, course_selected: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                    >
                      <option value="Artificial Intelligence & Machine Learning">Artificial Intelligence & Machine Learning (12 Wks)</option>
                      <option value="Data Analytics & Power BI Mastery">Data Analytics & Power BI Mastery (8 Wks)</option>
                      <option value="Full Stack Modern Web Development">Full Stack Modern Web Development (12 Wks)</option>
                      <option value="Python Enterprise & Workflow Automation">Python Enterprise & Workflow Automation (8 Wks)</option>
                      <option value="Java Enterprise & Microservices">Java Enterprise & Microservices (10 Wks)</option>
                      <option value="Cyber Security & SOC Defense">Cyber Security & SOC Defense (8 Wks)</option>
                    </select>
                  </div>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Current Background</label>
                    <select
                      value={inlineForm.qualification}
                      onChange={(e) => setInlineForm({ ...inlineForm, qualification: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                    >
                      <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                      <option value="BCA / MCA">BCA / MCA</option>
                      <option value="B.Sc / M.Sc Data Science">B.Sc / M.Sc Data Science</option>
                      <option value="Working Professional (Upskilling)">Working Professional (Upskilling)</option>
                      <option value="Other Degree">Other Degree</option>
                    </select>
                  </div>
                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Preferred Schedule</label>
                    <select
                      value={inlineForm.batch_timing}
                      onChange={(e) => setInlineForm({ ...inlineForm, batch_timing: e.target.value })}
                      className="w-full bg-white border border-slate-300 rounded-lg px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                    >
                      <option value="Weekend Batch (Sat & Sun, 10 AM - 1 PM)">Weekend Batch (Sat & Sun, 10 AM - 1 PM)</option>
                      <option value="Weekday Morning (Mon - Thu, 9 AM - 11 AM)">Weekday Morning (Mon - Thu, 9 AM - 11 AM)</option>
                      <option value="Weekday Evening (Mon - Thu, 6:30 PM - 8:30 PM)">Weekday Evening (Mon - Thu, 6:30 PM - 8:30 PM)</option>
                    </select>
                  </div>
                </div>

                <div className="pt-3">
                  <button
                    type="submit"
                    disabled={loading}
                    className="w-full py-3.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all disabled:opacity-50"
                  >
                    {loading ? (
                      <span className="flex items-center justify-center gap-2">
                        <Loader2 className="w-4 h-4 animate-spin" />
                        <span>Submitting Registration...</span>
                      </span>
                    ) : (
                      <span>Register for Training Track</span>
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

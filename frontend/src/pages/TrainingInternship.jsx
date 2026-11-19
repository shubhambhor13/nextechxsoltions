import React, { useState, useEffect } from 'react';
import { 
  GraduationCap, 
  Sparkles, 
  CheckCircle2, 
  Clock, 
  Award, 
  BookOpen, 
  Users, 
  Code2, 
  ArrowRight, 
  FileCheck, 
  Layers, 
  ChevronRight, 
  Download, 
  Building,
  ShieldCheck,
  Send,
  Loader2
} from 'lucide-react';
import { api } from '../services/api';
import confetti from 'canvas-confetti';

export default function TrainingInternship({ onOpenRegister, onSelectCourseForRegister }) {
  const [courses, setCourses] = useState([]);
  const [selectedCourse, setSelectedCourse] = useState(null);
  const [syllabusModal, setSyllabusModal] = useState(null);

  // Quick Inline Application Form
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

  useEffect(() => {
    api.getCourses()
      .then(data => {
        setCourses(data);
        if (data.length > 0) setSelectedCourse(data[0]);
      })
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

  const perks = [
    {
      title: "Real Production Client Projects",
      desc: "No trivial to-do apps. Work on actual NLP models, Power BI executive dashboards, and enterprise React/FastAPI systems.",
      icon: Code2
    },
    {
      title: "ISO-Verified Experience Certificate",
      desc: "Receive recognized experience credentials and a verified digital certificate detailing your contribution.",
      icon: Award
    },
    {
      title: "1-on-1 Engineering Mentorship",
      desc: "Weekly pull request reviews, architecture guidance, and system design advice from staff engineers.",
      icon: Users
    },
    {
      title: "Career & Placement Acceleration",
      desc: "Resume optimization, live mock technical interviews, and direct referral opportunities with corporate partners.",
      icon: Building
    }
  ];

  return (
    <div className="space-y-20 pb-20">
      
      {/* 1. HERO BANNER */}
      <section className="relative pt-12 pb-16 overflow-hidden">
        <div className="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-5">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-xs font-semibold text-emerald-300">
            <GraduationCap className="w-3.5 h-3.5" />
            <span>Engineering Academy • Winter 2026 Batch</span>
          </div>

          <h1 className="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
            Bridge the Gap Between Campus & <br />
            <span className="bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent">
              High-Paying Tech Careers
            </span>
          </h1>

          <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            Immersive, hands-on training and internship tracks designed by veteran tech leads. Master in-demand stacks: Python, Java, Power BI, AI/ML, Cyber Security, and Modern Web Development.
          </p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button
              onClick={() => onOpenRegister?.()}
              className="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-600 hover:opacity-95 text-white font-bold text-sm shadow-xl shadow-emerald-500/20 flex items-center gap-2"
            >
              <Sparkles className="w-4 h-4" />
              <span>Apply for Internship Cohort</span>
            </button>
            <a
              href="#courses-catalog"
              className="px-6 py-3.5 rounded-2xl bg-navy-900 border border-slate-700 text-slate-200 font-semibold text-sm hover:bg-slate-800 transition-colors"
            >
              Explore Course Catalog ↓
            </a>
          </div>

          {/* Quick Metrics */}
          <div className="pt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-3xl mx-auto text-left">
            <div className="p-3.5 rounded-2xl bg-navy-900/60 border border-slate-800">
              <div className="text-2xl font-black text-emerald-400">2,500+</div>
              <div className="text-xs text-slate-300">Students & Interns</div>
            </div>
            <div className="p-3.5 rounded-2xl bg-navy-900/60 border border-slate-800">
              <div className="text-2xl font-black text-cyan-400">96.4%</div>
              <div className="text-xs text-slate-300">Placement Support</div>
            </div>
            <div className="p-3.5 rounded-2xl bg-navy-900/60 border border-slate-800">
              <div className="text-2xl font-black text-purple-400">1:1</div>
              <div className="text-xs text-slate-300">Architect Mentorship</div>
            </div>
            <div className="p-3.5 rounded-2xl bg-navy-900/60 border border-slate-800">
              <div className="text-2xl font-black text-amber-400">100%</div>
              <div className="text-xs text-slate-300">Live Project Portfolio</div>
            </div>
          </div>
        </div>
      </section>

      {/* 2. CORE PERKS */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-2xl mx-auto mb-12">
          <h2 className="text-2xl sm:text-3xl font-extrabold text-white">
            Why Our Internship Outperforms Traditional Institutes
          </h2>
          <p className="text-xs text-slate-400 mt-2">
            No endless theory lectures. We simulate an actual Agile sprint cycle with standups, git branches, and deployments.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {perks.map((p, idx) => {
            const Icon = p.icon;
            return (
              <div key={idx} className="p-6 rounded-2xl bg-navy-900/50 border border-slate-800 space-y-3">
                <div className="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
                  <Icon className="w-5 h-5" />
                </div>
                <h3 className="text-sm font-bold text-white">{p.title}</h3>
                <p className="text-xs text-slate-400 leading-relaxed">{p.desc}</p>
              </div>
            );
          })}
        </div>
      </section>

      {/* 3. COURSES CATALOG & DETAILED CURRICULUM */}
      <section id="courses-catalog" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <div className="flex flex-col md:flex-row items-start md:items-end justify-between gap-4 mb-10">
          <div>
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-semibold uppercase tracking-wider mb-2">
              <BookOpen className="w-3.5 h-3.5" />
              <span>Flagship Programs</span>
            </div>
            <h2 className="text-3xl font-extrabold text-white">
              Explore Our Training & Internship Tracks
            </h2>
          </div>
          <p className="text-xs text-slate-400 max-w-sm">
            All programs include weekly live coaching, project code evaluations, verified certification, and career placement preparation.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {courses.map((course) => (
            <div
              key={course.id}
              className="p-6 rounded-3xl bg-navy-900/70 border border-slate-800 hover:border-emerald-500/40 transition-all flex flex-col justify-between group shadow-xl"
            >
              <div>
                <div className="flex items-center justify-between mb-3">
                  <span className="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-300 border border-emerald-500/30">
                    {course.category}
                  </span>
                  <span className="text-[10px] font-mono text-cyan-400 flex items-center gap-1">
                    <Clock className="w-3 h-3" />
                    {course.duration}
                  </span>
                </div>

                <h3 className="text-lg font-bold text-white group-hover:text-emerald-300 transition-colors">
                  {course.title}
                </h3>
                <p className="text-xs text-slate-400 mt-2 leading-relaxed">
                  {course.description}
                </p>

                {/* Skills tags */}
                <div className="flex flex-wrap gap-1.5 my-4">
                  {course.skills.map((sk, sIdx) => (
                    <span
                      key={sIdx}
                      className="px-2 py-0.5 rounded bg-navy-950 border border-slate-800 text-slate-300 text-[10px] font-mono"
                    >
                      {sk}
                    </span>
                  ))}
                </div>

                {/* Key modules snapshot */}
                <div className="pt-3 border-t border-slate-800/80 space-y-1.5 text-xs text-slate-300">
                  <div className="text-[10px] font-bold uppercase tracking-wider text-slate-500">
                    Curriculum Highlights:
                  </div>
                  {course.modules.slice(0, 3).map((mod, mIdx) => (
                    <div key={mIdx} className="flex items-start gap-1.5 text-[11px] text-slate-400">
                      <CheckCircle2 className="w-3 h-3 text-emerald-400 shrink-0 mt-0.5" />
                      <span className="line-clamp-1">{mod}</span>
                    </div>
                  ))}
                </div>
              </div>

              <div className="pt-5 mt-5 border-t border-slate-800 flex items-center justify-between gap-2">
                <button
                  onClick={() => setSyllabusModal(course)}
                  className="text-xs text-slate-300 hover:text-white flex items-center gap-1 font-semibold"
                >
                  <BookOpen className="w-3.5 h-3.5 text-cyan-400" />
                  <span>Full Syllabus</span>
                </button>

                <button
                  onClick={() => {
                    onSelectCourseForRegister?.(course.title);
                    onOpenRegister?.();
                  }}
                  className="px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 hover:opacity-90 text-white font-bold text-xs flex items-center gap-1.5 shadow-md shadow-emerald-500/20"
                >
                  <span>Apply Now</span>
                  <ChevronRight className="w-3 h-3" />
                </button>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* 4. SYLLABUS MODAL */}
      {syllabusModal && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto">
          <div className="fixed inset-0 bg-navy-950/80 backdrop-blur-md" onClick={() => setSyllabusModal(null)} />
          <div className="relative w-full max-w-2xl bg-navy-900 border border-slate-700 rounded-3xl p-6 sm:p-8 z-10 space-y-6">
            <div className="flex items-center justify-between pb-4 border-b border-slate-800">
              <div>
                <span className="text-[10px] font-bold uppercase text-emerald-400 tracking-wider">Course Syllabus</span>
                <h3 className="text-xl font-bold text-white">{syllabusModal.title}</h3>
              </div>
              <button 
                onClick={() => setSyllabusModal(null)}
                className="p-1 rounded-lg text-slate-400 hover:text-white"
              >
                ✕
              </button>
            </div>

            <div className="space-y-4 max-h-[55vh] overflow-y-auto pr-2 text-xs">
              <div className="space-y-2">
                <h4 className="font-bold text-slate-200 uppercase text-[11px] tracking-wider">Module Breakdown:</h4>
                {syllabusModal.modules.map((m, idx) => (
                  <div key={idx} className="p-3 rounded-xl bg-navy-950 border border-slate-800 flex items-start gap-2">
                    <span className="font-mono text-cyan-400 font-bold">0{idx + 1}.</span>
                    <span className="text-slate-200">{m}</span>
                  </div>
                ))}
              </div>

              <div className="space-y-2 pt-2">
                <h4 className="font-bold text-emerald-400 uppercase text-[11px] tracking-wider">Internship Deliverables:</h4>
                {syllabusModal.internship_perks.map((p, idx) => (
                  <div key={idx} className="flex items-center gap-2 text-slate-300">
                    <CheckCircle2 className="w-3.5 h-3.5 text-emerald-400 shrink-0" />
                    <span>{p}</span>
                  </div>
                ))}
              </div>
            </div>

            <div className="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
              <button
                onClick={() => setSyllabusModal(null)}
                className="px-4 py-2 text-xs text-slate-400 hover:text-white"
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
                className="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 font-bold text-xs text-white"
              >
                Apply for this Track →
              </button>
            </div>
          </div>
        </div>
      )}

      {/* 5. INLINE STUDENT REGISTRATION FORM */}
      <section className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="p-8 sm:p-10 rounded-3xl bg-navy-900/90 border border-slate-700/80 shadow-2xl space-y-6">
          <div className="text-center space-y-2">
            <div className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-semibold">
              <Send className="w-3.5 h-3.5" />
              <span>Fast-Track Admission Form</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-white">
              Enroll in Winter 2026 Batch
            </h2>
            <p className="text-xs text-slate-400">
              Limited slots per cohort to maintain 1-on-1 mentor code evaluation standards.
            </p>
          </div>

          {submitted ? (
            <div className="py-10 text-center space-y-3">
              <div className="w-14 h-14 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mx-auto">
                <CheckCircle2 className="w-8 h-8" />
              </div>
              <h3 className="text-lg font-bold text-white">Application Successfully Recorded!</h3>
              <p className="text-xs text-slate-300">
                Our counselor will reach out on WhatsApp to finalize your batch timing and deliver onboarding instructions.
              </p>
            </div>
          ) : (
            <form onSubmit={handleInlineSubmit} className="space-y-4">
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">Candidate Full Name *</label>
                  <input
                    type="text"
                    required
                    value={inlineForm.full_name}
                    onChange={(e) => setInlineForm({ ...inlineForm, full_name: e.target.value })}
                    placeholder="e.g. Sneha Patel"
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
                  />
                </div>
                <div>
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">Email Address *</label>
                  <input
                    type="email"
                    required
                    value={inlineForm.email}
                    onChange={(e) => setInlineForm({ ...inlineForm, email: e.target.value })}
                    placeholder="sneha@example.com"
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">WhatsApp Contact Number *</label>
                  <input
                    type="tel"
                    required
                    value={inlineForm.phone}
                    onChange={(e) => setInlineForm({ ...inlineForm, phone: e.target.value })}
                    placeholder="+91 98765 43210"
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
                  />
                </div>
                <div>
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">Target Training Program *</label>
                  <select
                    value={inlineForm.course_selected}
                    onChange={(e) => setInlineForm({ ...inlineForm, course_selected: e.target.value })}
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
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
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">Educational Degree</label>
                  <select
                    value={inlineForm.qualification}
                    onChange={(e) => setInlineForm({ ...inlineForm, qualification: e.target.value })}
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
                  >
                    <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                    <option value="BCA / MCA">BCA / MCA</option>
                    <option value="B.Sc / M.Sc Data Science">B.Sc / M.Sc Data Science</option>
                    <option value="Working Professional">Working Professional</option>
                    <option value="Other Degree">Other Degree</option>
                  </select>
                </div>
                <div>
                  <label className="block text-xs font-semibold text-slate-300 mb-1.5">Preferred Batch Timing</label>
                  <select
                    value={inlineForm.batch_timing}
                    onChange={(e) => setInlineForm({ ...inlineForm, batch_timing: e.target.value })}
                    className="w-full bg-navy-950 border border-slate-800 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500"
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
                  className="w-full py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-600 to-cyan-600 hover:opacity-95 text-white font-bold text-sm shadow-xl shadow-emerald-500/25 flex items-center justify-center gap-2 transition-all disabled:opacity-50"
                >
                  {loading ? (
                    <>
                      <Loader2 className="w-4 h-4 animate-spin" />
                      <span>Submitting Registration...</span>
                    </>
                  ) : (
                    <>
                      <Sparkles className="w-4 h-4" />
                      <span>Submit Application for Winter 2026 Batch</span>
                    </>
                  )}
                </button>
              </div>
            </form>
          )}
        </div>
      </section>

    </div>
  );
}


import React, { useState, useEffect } from 'react';
import { X, GraduationCap, CheckCircle2, AlertCircle, Loader2, Sparkles, Send, Award, BookOpen } from 'lucide-react';
import { api } from '../services/api';
import siteConfig from '../config/siteConfig';
import confetti from 'canvas-confetti';

export default function StudentRegisterModal({ isOpen, onClose, preselectedCourse = '' }) {
  const [formData, setFormData] = useState({
    full_name: '',
    email: '',
    phone: '',
    qualification: 'B.Tech / B.E (CSE / IT / ECE)',
    current_status: 'Final Year Student (2026 Batch)',
    course_selected: 'Artificial Intelligence & Machine Learning',
    batch_timing: 'Weekend Batch (Sat & Sun, 10 AM - 1 PM)',
    resume_link: '',
    statement: ''
  });

  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');

  useEffect(() => {
    if (preselectedCourse) {
      const lower = preselectedCourse.toLowerCase();
      if (lower.includes('ai') || lower.includes('machine learning')) {
        setFormData(prev => ({ ...prev, course_selected: 'Artificial Intelligence & Machine Learning' }));
      } else if (lower.includes('analytics') || lower.includes('power bi')) {
        setFormData(prev => ({ ...prev, course_selected: 'Data Analytics & Power BI Mastery' }));
      } else if (lower.includes('web') || lower.includes('full stack')) {
        setFormData(prev => ({ ...prev, course_selected: 'Full Stack Modern Web Development' }));
      } else if (lower.includes('python') || lower.includes('workflow')) {
        setFormData(prev => ({ ...prev, course_selected: 'Python Enterprise & Workflow Automation' }));
      } else if (lower.includes('java') || lower.includes('microservices')) {
        setFormData(prev => ({ ...prev, course_selected: 'Java Enterprise & Microservices' }));
      } else if (lower.includes('cyber') || lower.includes('soc') || lower.includes('security')) {
        setFormData(prev => ({ ...prev, course_selected: 'Cyber Security & SOC Defense' }));
      } else {
        setFormData(prev => ({ ...prev, course_selected: preselectedCourse }));
      }
    }
  }, [preselectedCourse]);

  if (!isOpen) return null;

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      await api.registerStudent(formData);
      setSuccess(true);
      confetti({
        particleCount: 90,
        spread: 70,
        origin: { y: 0.6 }
      });
      setTimeout(() => {
        setSuccess(false);
        onClose();
        setFormData({
          full_name: '',
          email: '',
          phone: '',
          qualification: 'B.Tech / B.E (CSE / IT / ECE)',
          current_status: 'Final Year Student (2026 Batch)',
          course_selected: 'Artificial Intelligence & Machine Learning',
          batch_timing: 'Weekend Batch (Sat & Sun, 10 AM - 1 PM)',
          resume_link: '',
          statement: ''
        });
      }, 4000);
    } catch (err) {
      setError(err.message || 'Registration failed. Please check your details and try again.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto">
      <div 
        className="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" 
        onClick={onClose}
      />

      <div className="relative w-full max-w-2xl bg-white border border-slate-200 rounded-2xl shadow-2xl overflow-hidden z-10 animate-in fade-in zoom-in-95 duration-200">
        
        {/* Header */}
        <div className="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-slate-50/80">
          <div className="flex items-center gap-2.5">
            <div className="p-2 rounded-xl bg-blue-50 border border-blue-200 text-blue-600">
              <GraduationCap className="w-5 h-5" />
            </div>
            <div>
              <h3 className="text-base font-bold text-slate-900">Apply for Industry Internship</h3>
              <p className="text-xs text-slate-500">Interview-Based Selection • Live Projects • HR: <span className="font-semibold text-emerald-600">{siteConfig.emailHr}</span></p>
            </div>
          </div>
          <button 
            onClick={onClose}
            className="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        {/* Form Body */}
        <div className="p-6">
          {success ? (
            <div className="py-8 text-center space-y-4">
              <div className="w-16 h-16 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center mx-auto">
                <CheckCircle2 className="w-8 h-8" />
              </div>
              <h4 className="text-xl sm:text-2xl font-extrabold text-slate-900 font-heading">
                Thank You for Applying!
              </h4>
              <div className="space-y-2 text-xs sm:text-sm text-slate-700 max-w-md mx-auto leading-relaxed">
                <p>
                  Thank you for your interest in <strong className="text-slate-900 font-bold">NEXTECHX SOLUTIONS</strong>. Your application has been received successfully.
                </p>
                <p>
                  For any queries, please contact our HR team at{' '}
                  <a 
                    href="mailto:hr@nextechxsolutions.com" 
                    className="text-blue-600 hover:text-blue-700 font-bold underline"
                  >
                    hr@nextechxsolutions.com
                  </a>.
                </p>
                <p className="font-semibold text-slate-900">
                  We appreciate your interest in joining our team!
                </p>
              </div>
            </div>
          ) : (
            <form onSubmit={handleSubmit} className="space-y-4">
              {error && (
                <div className="p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs flex items-center gap-2">
                  <AlertCircle className="w-4 h-4 shrink-0" />
                  <span>{error}</span>
                </div>
              )}

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Candidate Full Name *
                  </label>
                  <input
                    type="text"
                    required
                    value={formData.full_name}
                    onChange={(e) => setFormData({ ...formData, full_name: e.target.value })}
                    placeholder="e.g. Rahul Sharma"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Email Address *
                  </label>
                  <input
                    type="email"
                    required
                    value={formData.email}
                    onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                    placeholder="rahul@example.com"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    WhatsApp Phone Number *
                  </label>
                  <input
                    type="tel"
                    required
                    value={formData.phone}
                    onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                    placeholder="+91 98765 43210"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Degree / Qualification *
                  </label>
                  <select
                    value={formData.qualification}
                    onChange={(e) => setFormData({ ...formData, qualification: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="B.Tech / B.E (CSE / IT / ECE)">B.Tech / B.E (CSE / IT / ECE)</option>
                    <option value="BCA / MCA">BCA / MCA</option>
                    <option value="B.Sc / M.Sc Data Science / CS">B.Sc / M.Sc Data Science / CS</option>
                    <option value="Non-CS Engineering Graduate">Non-CS Engineering Graduate</option>
                    <option value="Working Professional (Tech/Non-Tech)">Working Professional (Tech/Non-Tech)</option>
                    <option value="Other Degree">Other Degree</option>
                  </select>
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Select Internship Domain *
                  </label>
                  <select
                    value={formData.course_selected}
                    onChange={(e) => setFormData({ ...formData, course_selected: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="Artificial Intelligence & Machine Learning">Artificial Intelligence & Machine Learning</option>
                    <option value="Data Analytics & Power BI Mastery">Data Analytics & Power BI Mastery</option>
                    <option value="Full Stack Modern Web Development">Full Stack Modern Web Development</option>
                    <option value="Python Enterprise & Workflow Automation">Python Enterprise & Workflow Automation</option>
                    <option value="Java Enterprise & Microservices">Java Enterprise & Microservices</option>
                    <option value="Cyber Security & SOC Defense">Cyber Security & SOC Defense</option>
                  </select>
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Preferred Batch Timing *
                  </label>
                  <select
                    value={formData.batch_timing}
                    onChange={(e) => setFormData({ ...formData, batch_timing: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="Weekend Batch (Sat & Sun, 10 AM - 1 PM)">Weekend Batch (Sat & Sun, 10 AM - 1 PM)</option>
                    <option value="Weekday Morning (Mon - Thu, 9 AM - 11 AM)">Weekday Morning (Mon - Thu, 9 AM - 11 AM)</option>
                    <option value="Weekday Evening (Mon - Thu, 6:30 PM - 8:30 PM)">Weekday Evening (Mon - Thu, 6:30 PM - 8:30 PM)</option>
                    <option value="Self-Paced with 1-on-1 Mentor Sync">Self-Paced with 1-on-1 Mentor Sync</option>
                  </select>
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Current Status
                  </label>
                  <select
                    value={formData.current_status}
                    onChange={(e) => setFormData({ ...formData, current_status: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="Final Year Student (2026 Batch)">Final Year Student (2026 Batch)</option>
                    <option value="Pre-Final Year Student (2027 Batch)">Pre-Final Year Student (2027 Batch)</option>
                    <option value="Recent Graduate (Seeking Immediate Placement)">Recent Graduate (Seeking Immediate Placement)</option>
                    <option value="Working Professional (Career Upskilling)">Working Professional (Career Upskilling)</option>
                  </select>
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Resume / LinkedIn URL (Optional)
                  </label>
                  <input
                    type="url"
                    value={formData.resume_link}
                    onChange={(e) => setFormData({ ...formData, resume_link: e.target.value })}
                    placeholder="https://linkedin.com/in/... or Google Drive link"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>
              </div>

              <div>
                <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                  Why do you want to join this program? (Optional)
                </label>
                <textarea
                  rows={2}
                  value={formData.statement}
                  onChange={(e) => setFormData({ ...formData, statement: e.target.value })}
                  placeholder="Tell us about your learning goals, current technical projects, or career ambitions..."
                  className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white resize-none transition-colors"
                />
              </div>

              <div className="pt-2 flex items-center justify-end gap-3">
                <button
                  type="button"
                  onClick={onClose}
                  className="px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-colors"
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  disabled={loading}
                  className="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-xs font-semibold text-white flex items-center gap-2 shadow-sm disabled:opacity-50 transition-all"
                >
                  {loading ? (
                    <>
                      <Loader2 className="w-4 h-4 animate-spin" />
                      <span>Submitting Application...</span>
                    </>
                  ) : (
                    <>
                      <Send className="w-4 h-4" />
                      <span>Submit Application for Interview</span>
                    </>
                  )}
                </button>
              </div>
            </form>
          )}
        </div>
      </div>
    </div>
  );
}

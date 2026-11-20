import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { siteConfig } from '../config/siteConfig';
import { 
  Mail, 
  Phone, 
  MessageSquare, 
  Sparkles, 
  CheckCircle2, 
  AlertCircle, 
  Loader2, 
  Send, 
  Clock, 
  ShieldCheck, 
  Building, 
  ArrowRight, 
  PhoneCall, 
  Lock, 
  Globe2,
  ChevronRight,
  Zap,
  Check
} from 'lucide-react';
import { api } from '../services/api';
import confetti from 'canvas-confetti';

export default function ContactUs({ onOpenQuote, onOpenConsultation }) {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    company: '',
    service_interest: 'AI Automation & Workflows',
    message: ''
  });

  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      await api.submitContact(formData);
      setSuccess(true);
      confetti({ particleCount: 75, spread: 60, origin: { y: 0.6 } });
      setTimeout(() => {
        setSuccess(false);
        setFormData({
          name: '',
          email: '',
          phone: '',
          company: '',
          service_interest: 'AI Automation & Workflows',
          message: ''
        });
      }, 5000);
    } catch (err) {
      setError(err.message || 'Failed to send message. Please try again or WhatsApp us.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="bg-white text-slate-800">
      
      {/* 1. HERO SECTION WITH MODERN GRADIENT & TECH BACKGROUND */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Ambient Glows & Tech Grid */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -16 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <MessageSquare className="w-4 h-4 text-blue-600" />
            <span>Direct Enterprise Support & Technical Inquiries</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 16 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Let's Architect Your Next <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Technical Breakthrough
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 16 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal"
          >
            Have an enterprise project, need custom AI automation, seeking IT software solutions, or inquiring about internships? Reach our engineering team directly.
          </motion.p>
        </div>
      </section>

      {/* 2. MAIN CONTACT GRID */}
      <section className="py-20 lg:py-28 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            {/* Left Column: Form (7 cols) */}
            <motion.div 
              initial={{ opacity: 0, x: -20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              className="lg:col-span-7 p-4 sm:p-8 lg:p-12 rounded-2xl sm:rounded-3xl bg-white border border-slate-200/90 shadow-xl space-y-6 text-left relative overflow-hidden"
            >
              {/* Top Accent Stripe */}
              <div className="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500" />

              <div>
                <span className="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
                  Direct Channel
                </span>
                <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading mt-1">
                  Send Us an Inquiry
                </h2>
                <p className="text-xs sm:text-sm text-slate-500 mt-1 font-normal">
                  Fill out the details below. Our technical solutions team will review and reply within 24 hours.
                </p>
              </div>

              {success ? (
                <div className="py-14 text-center space-y-3 animate-in fade-in zoom-in duration-300">
                  <div className="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto border border-emerald-200">
                    <CheckCircle2 className="w-9 h-9" />
                  </div>
                  <h3 className="text-xl font-bold text-slate-900 font-heading">Message Transmitted Successfully!</h3>
                  <p className="text-xs sm:text-sm text-slate-600 max-w-sm mx-auto">
                    Thank you for reaching out. A Technical Solutions Architect will analyze your requirements and connect with you shortly.
                  </p>
                </div>
              ) : (
                <form onSubmit={handleSubmit} className="space-y-4">
                  {error && (
                    <div className="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs flex items-center gap-2 font-medium">
                      <AlertCircle className="w-4 h-4 shrink-0" />
                      <span>{error}</span>
                    </div>
                  )}

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-xs font-semibold text-slate-700 mb-1.5">Your Full Name *</label>
                      <input
                        type="text"
                        required
                        value={formData.name}
                        onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                        placeholder="e.g. Elena Rostova"
                        className="w-full bg-slate-50/70 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                    <div>
                      <label className="block text-xs font-semibold text-slate-700 mb-1.5">Business Email Address *</label>
                      <input
                        type="email"
                        required
                        value={formData.email}
                        onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                        placeholder="elena@company.com"
                        className="w-full bg-slate-50/70 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                  </div>

                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-xs font-semibold text-slate-700 mb-1.5">Phone / WhatsApp Number</label>
                      <input
                        type="tel"
                        value={formData.phone}
                        onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                        placeholder="+91 93098 35085"
                        className="w-full bg-slate-50/70 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                    <div>
                      <label className="block text-xs font-semibold text-slate-700 mb-1.5">Company / Organization</label>
                      <input
                        type="text"
                        value={formData.company}
                        onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                        placeholder="Acme Enterprises"
                        className="w-full bg-slate-50/70 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all"
                      />
                    </div>
                  </div>

                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Area of Interest *</label>
                    <select
                      value={formData.service_interest}
                      onChange={(e) => setFormData({ ...formData, service_interest: e.target.value })}
                      className="w-full bg-slate-50/70 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all"
                    >
                      <option value="AI Automation & Workflows">AI Automation & Autonomous Agents</option>
                      <option value="Custom Software & Web/Mobile Development">Custom Software & Web/Mobile Development</option>
                      <option value="Cloud Architecture & DevOps CI/CD">Cloud Architecture & DevOps CI/CD</option>
                      <option value="Executive BI Dashboards (Power BI)">Executive BI Dashboards (Power BI)</option>
                      <option value="Internship Program Inquiries">Internship Program Inquiries</option>
                      <option value="Other / General Partnership">Other / General Partnership</option>
                    </select>
                  </div>

                  <div>
                    <label className="block text-xs font-semibold text-slate-700 mb-1.5">Project Scope / Technical Requirements *</label>
                    <textarea
                      rows={4}
                      required
                      value={formData.message}
                      onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                      placeholder="Briefly describe your objectives, data volume, tech stack, or expected timeline..."
                      className="w-full bg-slate-50/70 border border-slate-300 rounded-xl p-4 text-xs sm:text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-500/20 resize-none transition-all"
                    />
                  </div>

                  <div className="pt-2">
                    <button
                      type="submit"
                      disabled={loading}
                      className="w-full py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg flex items-center justify-center gap-2 transition-all disabled:opacity-50 active:scale-98 font-heading"
                    >
                      {loading ? (
                        <>
                          <Loader2 className="w-4 h-4 animate-spin" />
                          <span>Transmitting Inquiry...</span>
                        </>
                      ) : (
                        <>
                          <Send className="w-4 h-4" />
                          <span>Send Technical Inquiry</span>
                        </>
                      )}
                    </button>
                  </div>
                </form>
              )}
            </motion.div>

            {/* Right Column: Direct Channels & Information (5 cols) */}
            <motion.div 
              initial={{ opacity: 0, x: 20 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              className="lg:col-span-5 space-y-6 text-left"
            >
              {/* Instant Communication Card */}
              <div className="p-4 sm:p-7 rounded-2xl sm:rounded-3xl bg-white border border-slate-200/90 space-y-4 sm:space-y-5 shadow-lg">
                <div className="flex items-center justify-between pb-3 border-b border-slate-100">
                  <h3 className="text-base font-bold text-slate-900 flex items-center gap-2 font-heading">
                    <Sparkles className="w-4 h-4 text-blue-600" />
                    <span>Immediate Channels</span>
                  </h3>
                  <span className="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full font-mono">
                    Online Now
                  </span>
                </div>

                <div className="space-y-3">
                  <a
                    href={siteConfig.whatsappUrl}
                    target="_blank"
                    rel="noreferrer"
                    className="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200 hover:border-emerald-400 transition-all flex items-center gap-4 group"
                  >
                    <div className="p-3 rounded-xl bg-emerald-100 text-emerald-700 group-hover:scale-105 transition-transform shadow-xs">
                      <MessageSquare className="w-5 h-5" />
                    </div>
                    <div>
                      <div className="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition-colors font-heading">
                        Chat on Official WhatsApp
                      </div>
                      <div className="text-xs text-slate-500 font-mono">
                        Average response time: &lt; 15 minutes
                      </div>
                    </div>
                  </a>

                  <div className="p-4 rounded-2xl bg-blue-50/70 border border-blue-200 space-y-1">
                    <div className="flex items-center gap-2 text-blue-700 text-xs font-semibold font-heading">
                      <Mail className="w-4 h-4" />
                      <span>Client Inquiries & Proposals:</span>
                    </div>
                    <a href={`mailto:${siteConfig.emailContact}`} className="text-xs sm:text-sm text-slate-800 hover:text-blue-600 transition-colors block font-semibold">
                      {siteConfig.emailContact}
                    </a>
                  </div>

                  <div className="p-4 rounded-2xl bg-cyan-50/70 border border-cyan-200 space-y-1">
                    <div className="flex items-center gap-2 text-cyan-700 text-xs font-semibold font-heading">
                      <Mail className="w-4 h-4" />
                      <span>General Information & Support:</span>
                    </div>
                    <a href={`mailto:${siteConfig.emailGeneral}`} className="text-xs sm:text-sm text-slate-800 hover:text-cyan-600 transition-colors block font-semibold">
                      {siteConfig.emailGeneral}
                    </a>
                  </div>

                  <div className="p-4 rounded-2xl bg-purple-50/70 border border-purple-200 space-y-1">
                    <div className="flex items-center gap-2 text-purple-700 text-xs font-semibold font-heading">
                      <Mail className="w-4 h-4" />
                      <span>Internship & HR Inquiries:</span>
                    </div>
                    <a href={`mailto:${siteConfig.emailHr}`} className="text-xs sm:text-sm text-slate-800 hover:text-purple-600 transition-colors block font-semibold">
                      {siteConfig.emailHr}
                    </a>
                  </div>

                  <div className="p-4 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-1">
                    <div className="flex items-center gap-2 text-indigo-600 text-xs font-semibold font-heading">
                      <Phone className="w-4 h-4" />
                      <span>Enterprise Desk Hotline:</span>
                    </div>
                    <a href={`tel:${siteConfig.phoneTel || siteConfig.phone}`} className="text-xs sm:text-sm text-slate-700 hover:text-indigo-600 transition-colors block font-semibold font-mono">
                      {siteConfig.phone}
                    </a>
                  </div>
                </div>

                {/* Consultation & Quote Triggers */}
                <div className="pt-2 space-y-2">
                  <button
                    onClick={onOpenQuote}
                    className="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold flex items-center justify-center gap-2 transition-all shadow-md font-heading active:scale-98"
                  >
                    <Sparkles className="w-3.5 h-3.5 text-blue-200" />
                    <span>Request a Detailed Quotation</span>
                  </button>
                  <button
                    onClick={onOpenConsultation}
                    className="w-full py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 hover:text-blue-700 text-xs font-bold flex items-center justify-center gap-2 transition-all shadow-xs font-heading"
                  >
                    <PhoneCall className="w-3.5 h-3.5 text-blue-600" />
                    <span>Book 30-Min Strategy Call</span>
                  </button>
                </div>
              </div>

              {/* Connect With Us Online */}
              <div className="p-4 sm:p-7 rounded-2xl sm:rounded-3xl bg-slate-50/70 border border-slate-200/90 space-y-4 shadow-sm text-xs">
                <h3 className="font-bold text-slate-900 flex items-center gap-2 text-sm font-heading">
                  <Globe2 className="w-4 h-4 text-blue-600" />
                  <span>Connect With Us Online</span>
                </h3>

                <div className="space-y-3">
                  <div className="p-3.5 rounded-2xl bg-white border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5 text-xs font-heading">100% Online-First Delivery:</strong>
                    <p className="text-slate-600 leading-relaxed text-xs font-normal">
                      We operate entirely online as a modern digital technology company, delivering AI automation, custom software, and cloud applications to clients worldwide without geographical constraints.
                    </p>
                  </div>
                  <div className="p-3.5 rounded-2xl bg-white border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5 text-xs font-heading">Seamless Digital Collaboration:</strong>
                    <p className="text-slate-600 leading-relaxed text-xs font-normal">
                      Work directly with our solution architects and engineers via WhatsApp, scheduled Google Meet or Zoom sessions, email, and live version control.
                    </p>
                  </div>
                </div>

                <div className="pt-2 flex items-center gap-2 text-emerald-700 text-xs font-medium">
                  <ShieldCheck className="w-4 h-4 text-emerald-600 shrink-0" />
                  <span>All communications are protected under mutual NDA.</span>
                </div>
              </div>
            </motion.div>

          </div>
        </div>
      </section>

      {/* 3. DARK NAVY SLA & CONFIDENTIALITY GUARANTEE SECTION */}
      <section className="py-20 bg-gradient-to-b from-slate-950 via-slate-900 to-black text-white relative overflow-hidden border-t border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-10">
          <div className="max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Our Response Promise
            </span>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-white font-heading">
              Fast, Confidential & Guaranteed Response SLA
            </h2>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
              <Clock className="w-6 h-6 text-blue-400" />
              <h4 className="text-sm font-bold text-white font-heading">24-Hour SLA Guarantee</h4>
              <p className="text-xs text-slate-400 leading-relaxed">
                Every business inquiry is reviewed by a technical architect and replied to within 24 business hours.
              </p>
            </div>
            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
              <ShieldCheck className="w-6 h-6 text-indigo-400" />
              <h4 className="text-sm font-bold text-white font-heading">Strict Non-Disclosure (NDA)</h4>
              <p className="text-xs text-slate-400 leading-relaxed">
                Your proprietary data, diagrams, and business ideas are protected by signed non-disclosure agreements.
              </p>
            </div>
            <div className="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
              <Globe2 className="w-6 h-6 text-emerald-400" />
              <h4 className="text-sm font-bold text-white font-heading">Global Online Delivery</h4>
              <p className="text-xs text-slate-400 leading-relaxed">
                Active project pods supporting clients smoothly across Indian Standard Time (IST), UTC, and US timezones.
              </p>
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

import React, { useState } from 'react';
import { X, Sparkles, CheckCircle2, AlertCircle, Loader2, IndianRupee, Calendar, Building, Send } from 'lucide-react';
import { api } from '../services/api';
import confetti from 'canvas-confetti';

export default function QuotationModal({ isOpen, onClose }) {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    company: '',
    service_category: 'AI Automation & Chatbots',
    budget_range: '₹50,000 - ₹2,00,000',
    project_timeline: '1 - 2 Months',
    requirements: ''
  });

  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');

  if (!isOpen) return null;

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      await api.submitQuotation(formData);
      setSuccess(true);
      confetti({
        particleCount: 80,
        spread: 60,
        origin: { y: 0.6 }
      });
      setTimeout(() => {
        setSuccess(false);
        onClose();
        setFormData({
          name: '',
          email: '',
          phone: '',
          company: '',
          service_category: 'AI Automation & Chatbots',
          budget_range: '₹50,000 - ₹2,00,000',
          project_timeline: '1 - 2 Months',
          requirements: ''
        });
      }, 4000);
    } catch (err) {
      setError(err.message || 'Failed to submit quotation request. Please try again.');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto">
      {/* Backdrop */}
      <div 
        className="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" 
        onClick={onClose}
      />

      {/* Modal Dialog */}
      <div className="relative w-full max-w-2xl bg-white border border-slate-200 rounded-2xl shadow-2xl overflow-hidden z-10 animate-in fade-in zoom-in-95 duration-200">
        
        {/* Header */}
        <div className="flex items-center justify-between px-6 py-4 border-b border-slate-200 bg-slate-50/80">
          <div className="flex items-center gap-2.5">
            <div className="p-2 rounded-xl bg-blue-50 border border-blue-200 text-blue-600">
              <Sparkles className="w-5 h-5" />
            </div>
            <div>
              <h3 className="text-base font-bold text-slate-900">Request an Enterprise Quotation</h3>
              <p className="text-xs text-slate-500">Get a scoped technical proposal & architecture estimate within 24 hours.</p>
            </div>
          </div>
          <button 
            onClick={onClose}
            className="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        {/* Content */}
        <div className="p-6">
          {success ? (
            <div className="py-12 text-center space-y-4">
              <div className="w-16 h-16 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center mx-auto">
                <CheckCircle2 className="w-8 h-8" />
              </div>
              <h4 className="text-xl font-bold text-slate-900">Quotation Request Received!</h4>
              <p className="text-sm text-slate-600 max-w-md mx-auto">
                Our solutions engineering team will review your requirements and provide a customized technical scope and price quotation to <strong className="text-blue-600">{formData.email}</strong>.
              </p>
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
                    Your Name *
                  </label>
                  <input
                    type="text"
                    required
                    value={formData.name}
                    onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                    placeholder="e.g. Alex Mercer"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Work Email *
                  </label>
                  <input
                    type="email"
                    required
                    value={formData.email}
                    onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                    placeholder="alex@company.com"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Phone / WhatsApp *
                  </label>
                  <input
                    type="tel"
                    required
                    value={formData.phone}
                    onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                    placeholder="+91 93098 35085"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Company / Organization
                  </label>
                  <input
                    type="text"
                    value={formData.company}
                    onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                    placeholder="e.g. Apex Global Ltd"
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Service Domain *
                  </label>
                  <select
                    value={formData.service_category}
                    onChange={(e) => setFormData({ ...formData, service_category: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="AI Automation & Chatbots">AI Automation & Chatbots</option>
                    <option value="n8n Workflow Automation">n8n Workflow Automation</option>
                    <option value="Custom Software Development">Custom Software Development</option>
                    <option value="Web & Mobile App Development">Web & Mobile App Development</option>
                    <option value="Cloud Solutions & DevOps">Cloud Solutions & DevOps</option>
                    <option value="Internship Inquiries">Internship Inquiries</option>
                  </select>
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5 flex items-center gap-1">
                    <IndianRupee className="w-3.5 h-3.5 text-blue-600" />
                    <span>Estimated Budget (INR ₹)</span>
                  </label>
                  <select
                    value={formData.budget_range}
                    onChange={(e) => setFormData({ ...formData, budget_range: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="Under ₹50,000">Under ₹50,000</option>
                    <option value="₹50,000 - ₹2,00,000">₹50,000 - ₹2,00,000</option>
                    <option value="₹2,00,000 - ₹5,00,000">₹2,00,000 - ₹5,00,000</option>
                    <option value="₹5,00,000+">₹5,00,000+</option>
                    <option value="Flexible / Needs Sizing">Flexible / Needs Sizing</option>
                  </select>
                </div>

                <div>
                  <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                    Expected Timeline
                  </label>
                  <select
                    value={formData.project_timeline}
                    onChange={(e) => setFormData({ ...formData, project_timeline: e.target.value })}
                    className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
                  >
                    <option value="Immediate (< 2 Weeks)">Immediate (&lt; 2 Weeks)</option>
                    <option value="1 - 2 Months">1 - 2 Months</option>
                    <option value="3 - 6 Months">3 - 6 Months</option>
                    <option value="Ongoing Retainer">Ongoing Retainer</option>
                  </select>
                </div>
              </div>

              <div>
                <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                  Project Scope & Technical Requirements *
                </label>
                <textarea
                  required
                  rows={3}
                  value={formData.requirements}
                  onChange={(e) => setFormData({ ...formData, requirements: e.target.value })}
                  placeholder="Describe your current tech stack, key objectives, APIs to integrate, volume of users, or business pain points..."
                  className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors resize-none"
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
                      <span>Generating Estimate...</span>
                    </>
                  ) : (
                    <>
                      <Send className="w-4 h-4" />
                      <span>Submit Quotation Request</span>
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

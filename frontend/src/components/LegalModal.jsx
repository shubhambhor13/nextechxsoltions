import React from 'react';
import { X, ShieldCheck, FileText, Lock, CheckCircle2 } from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function LegalModal({ isOpen, onClose, documentType = 'privacy' }) {
  if (!isOpen) return null;

  const contentMap = {
    privacy: {
      title: "Privacy & Data Protection Policy",
      subtitle: "Enterprise-grade confidentiality, zero-retention defaults, and privacy compliance.",
      icon: ShieldCheck,
      sections: [
        {
          heading: "1. Information We Collect",
          body: `We only collect information directly submitted through our inquiry forms, quote requests, and consultation schedules—including name, email address, phone/WhatsApp number, organization name, and technical project scope. We do not sell, rent, or lease client data to third parties.`
        },
        {
          heading: "2. Proprietary Data & Code Confidentiality",
          body: `All source code, proprietary models, business logic, datasets, and technical documentation shared with ${siteConfig.companyName} remain the exclusive intellectual property of the client. We operate under strict compartmentalized access controls.`
        },
        {
          heading: "3. Zero Unsolicited Communications",
          body: `We respect your communications channel. Your contact details are solely used for technical discussions, quotation transmissions, and requested sprint updates.`
        },
        {
          heading: "4. Security & Compliance",
          body: `All website form transmissions are encrypted using TLS 1.3. Internal data storage complies with international zero-trust security best practices.`
        }
      ]
    },
    terms: {
      title: "Terms of Service & Engagement",
      subtitle: "Operational standards, delivery milestones, and clear engagement terms.",
      icon: FileText,
      sections: [
        {
          heading: "1. Scope of Services",
          body: `${siteConfig.companyName} provides custom software engineering, AI workflow automation, cloud DevOps, and academic research paper publication advisory. Deliverables are defined through mutually approved Statements of Work (SOW).`
        },
        {
          heading: "2. Clear & Transparent Pricing",
          body: `All project quotations and fees are presented upfront with transparent milestone deliverables. No hidden fees or unexpected recurring costs are billed without written client authorization.`
        },
        {
          heading: "3. Intellectual Property Rights",
          body: `Upon completion of payment milestones, all custom code, application artifacts, and project deliverables belong 100% to the client with full commercial usage rights.`
        },
        {
          heading: "4. Service Level Agreements (SLAs)",
          body: `We maintain strict delivery timelines, weekly sprint demos, automated QA passes, and a guaranteed rapid response time (< 15 min) for active enterprise support accounts.`
        }
      ]
    },
    nda: {
      title: "Mutual Non-Disclosure Agreement (NDA)",
      subtitle: "Standard bilateral confidentiality terms protecting all technical communications.",
      icon: Lock,
      sections: [
        {
          heading: "1. Bilateral Confidentiality",
          body: `Both parties agree that all project briefs, architectural schematics, business formulas, datasets, and proprietary algorithms disclosed during technical consultations shall remain strictly confidential.`
        },
        {
          heading: "2. Permitted Use",
          body: `Confidential Information will be utilized solely to evaluate, scope, architect, and execute the technical engagements requested by the client.`
        },
        {
          heading: "3. Non-Disclosure Commitment",
          body: `${siteConfig.companyName} binds all software engineers, AI researchers, and advisory panel members to rigorous confidentiality obligations matching these standards.`
        },
        {
          heading: "4. Formal NDA Execution",
          body: `Need a custom signed enterprise NDA on your corporate paper before disclosing technical repositories? Contact us via email or WhatsApp and our desk will execute within 4 business hours.`
        }
      ]
    }
  };

  const doc = contentMap[documentType] || contentMap.privacy;
  const Icon = doc.icon;

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto">
      {/* Backdrop */}
      <div 
        className="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" 
        onClick={onClose}
      />

      {/* Modal Dialog */}
      <div className="relative w-full max-w-2xl bg-white border border-slate-200 rounded-3xl shadow-2xl overflow-hidden z-10 animate-in fade-in zoom-in-95 duration-200 max-h-[85vh] flex flex-col">
        
        {/* Header */}
        <div className="flex items-center justify-between px-6 py-5 border-b border-slate-200 bg-slate-50/90 shrink-0">
          <div className="flex items-center gap-3">
            <div className="p-2.5 rounded-2xl bg-blue-50 border border-blue-200 text-blue-600">
              <Icon className="w-5 h-5" />
            </div>
            <div>
              <h3 className="text-lg font-bold text-slate-900 font-heading">{doc.title}</h3>
              <p className="text-xs text-slate-500 font-medium">{doc.subtitle}</p>
            </div>
          </div>
          <button 
            onClick={onClose}
            className="p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 transition-colors"
            aria-label="Close modal"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        {/* Scrollable Body */}
        <div className="p-6 sm:p-8 overflow-y-auto space-y-6 text-left">
          {doc.sections.map((sec, idx) => (
            <div key={idx} className="space-y-1.5 p-4 rounded-2xl bg-slate-50 border border-slate-200/80">
              <h4 className="text-sm font-bold text-slate-900 font-heading flex items-center gap-2">
                <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0" />
                <span>{sec.heading}</span>
              </h4>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal pl-6">
                {sec.body}
              </p>
            </div>
          ))}

          <div className="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2.5">
            <ShieldCheck className="w-5 h-5 text-emerald-600 shrink-0" />
            <span>Questions regarding our policies? Email our compliance team directly at <a href={`mailto:${siteConfig.email}`} className="font-bold underline">{siteConfig.email}</a>.</span>
          </div>
        </div>

        {/* Footer */}
        <div className="px-6 py-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between text-xs text-slate-500 shrink-0">
          <span>&copy; {new Date().getFullYear()} {siteConfig.companyName}</span>
          <button
            onClick={onClose}
            className="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-colors font-heading"
          >
            Understood & Close
          </button>
        </div>

      </div>
    </div>
  );
}


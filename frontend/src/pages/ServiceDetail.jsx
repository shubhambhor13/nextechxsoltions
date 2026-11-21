import React from 'react';
import { Link, useParams, Navigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Layers, 
  CheckSquare, 
  Headphones, 
  Check, 
  ArrowRight, 
  ChevronRight,
  Sparkles,
  PhoneCall,
  ShieldCheck,
  Cpu,
  Workflow,
  CheckCircle2,
  Terminal,
  Server,
  Zap,
  Activity
} from 'lucide-react';
import { servicesData, getServiceBySlug } from '../config/servicesData';
import { siteConfig } from '../config/siteConfig';

const iconMap = {
  Bot,
  Code2,
  Layers,
  CheckSquare,
  Headphones
};

export default function ServiceDetail({ serviceId, onOpenQuote, onOpenConsultation }) {
  const { slug } = useParams();
  const currentSlug = serviceId || slug;
  const service = getServiceBySlug(currentSlug);

  if (!service) {
    return <Navigate to="/services" replace />;
  }

  const IconComponent = iconMap[service.iconName] || Bot;

  return (
    <div className="bg-white text-slate-800 font-sans selection:bg-blue-600/10 selection:text-blue-700 min-h-screen">
      
      {/* 1. Hero Section: Overview, Badge, Tech Pill Indicators */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />
        <div className="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-6">
          
          {/* Breadcrumb Navigation */}
          <div className="flex items-center gap-2 text-xs font-mono text-slate-500">
            <Link to="/" className="hover:text-blue-600 transition-colors">Home</Link>
            <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
            <Link to="/services" className="hover:text-blue-600 transition-colors">Services</Link>
            <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
            <span className="text-slate-900 font-semibold">{service.title}</span>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            {/* Left Column: Title, Overview & Actions */}
            <div className="lg:col-span-8 space-y-5">
              <div className="flex items-center gap-3">
                <div className={`w-12 h-12 rounded-xl bg-gradient-to-br ${service.theme.gradient} text-white flex items-center justify-center shrink-0 shadow-sm`}>
                  <IconComponent className="w-6 h-6 stroke-[2]" />
                </div>
                <span className={`inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono ${service.theme.badgeColor}`}>
                  {service.badge}
                </span>
              </div>

              <h1 className="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                {service.title}
              </h1>

              <p className="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                {service.overview}
              </p>

              <div className="pt-2 flex flex-wrap items-center gap-3.5">
                <Link
                  to="/contact"
                  className={`px-7 py-3.5 rounded-xl ${service.theme.btnClass} text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2`}
                >
                  <span>Inquire About {service.title}</span>
                  <ArrowRight className="w-4 h-4" />
                </Link>

                {onOpenQuote && (
                  <button
                    onClick={onOpenQuote}
                    className="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors font-heading"
                  >
                    Request Quotation
                  </button>
                )}
              </div>
            </div>

            {/* Right Column: Quick Highlights Panel */}
            <div className="lg:col-span-4">
              <div className="bg-slate-50/90 rounded-2xl p-6 border border-slate-200/90 shadow-2xs space-y-4">
                <h3 className="text-xs font-bold text-slate-900 uppercase tracking-wider font-mono flex items-center gap-2">
                  <Activity className="w-4 h-4 text-blue-600" />
                  <span>Practice Snapshot</span>
                </h3>

                <div className="space-y-3 text-xs text-slate-600">
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80">
                    <span className="font-bold text-slate-900 block font-heading mb-0.5">Delivery Model</span>
                    <span>Agile Sprints • Fixed Milestone SOWs</span>
                  </div>
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80">
                    <span className="font-bold text-slate-900 block font-heading mb-0.5">Code & IP Ownership</span>
                    <span>100% Client Retained with Mutual NDA</span>
                  </div>
                  <div className="p-3 rounded-xl bg-white border border-slate-200/80">
                    <span className="font-bold text-slate-900 block font-heading mb-0.5">Engineering Lead</span>
                    <span>Direct Technical Architect Collaboration</span>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section>

      {/* 2. Core Concepts Section */}
      <section className="py-16 lg:py-20 bg-white border-b border-slate-200/80">
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
          <div className="space-y-2">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Cpu className="w-3.5 h-3.5 text-blue-600" />
              <span>Architectural Principles</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Core Technical Concepts
            </h2>
            <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
              Fundamental technical concepts and engineering standards underpinning our {service.title} implementations.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {service.coreConcepts.map((concept, idx) => (
              <div 
                key={idx}
                className="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5"
              >
                <div className="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">
                  0{idx + 1}
                </div>
                <h3 className="text-base font-bold text-slate-900 font-heading">
                  {concept.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {concept.desc}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 3. Our Offerings Section */}
      <section className="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
          <div className="space-y-2">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Sparkles className="w-3.5 h-3.5 text-blue-600" />
              <span>Comprehensive Services</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Our Specific Offerings
            </h2>
            <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
              Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {service.offerings.map((offering, idx) => (
              <div 
                key={idx}
                className="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3"
              >
                <div className="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                  <Check className="w-3.5 h-3.5 stroke-[2.5]" />
                </div>
                <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                  {offering.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {offering.desc}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 4. Special Quality Process Section (for Data Annotation) */}
      {service.qualityProcess && (
        <section className="py-16 lg:py-20 bg-white border-b border-slate-200/80">
          <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
            <div className="space-y-2">
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <ShieldCheck className="w-3.5 h-3.5 text-emerald-600" />
                <span>Accuracy Assurance</span>
              </div>
              <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Multi-Tier Quality Process
              </h2>
              <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
                How we enforce strict quality thresholds and achieve &gt;99% labeling accuracy.
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              {service.qualityProcess.map((qp, idx) => (
                <div key={idx} className="p-6 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-2.5">
                  <span className="text-xs font-mono font-bold text-emerald-600 uppercase block">{qp.step}</span>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">{qp.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>
      )}

      {/* 5. Technology Stack Section */}
      <section className="py-16 lg:py-20 bg-white border-b border-slate-200/80">
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
          <div className="space-y-2">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Terminal className="w-3.5 h-3.5 text-blue-600" />
              <span>Production Stack</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Technology Stack & Tooling
            </h2>
            <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
              Battle-tested tools, languages, and frameworks leveraged across our {service.title} lifecycle.
            </p>
          </div>

          <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            {service.techStack.map((tech, idx) => (
              <div 
                key={idx}
                className="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between"
              >
                <span className="text-[11px] font-mono text-slate-500 uppercase tracking-wide">{tech.category}</span>
                <span className="text-sm font-bold text-slate-900 font-heading mt-1">{tech.name}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 6. End-to-End Workflow Pipeline */}
      <section className="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
          <div className="space-y-2">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Workflow className="w-3.5 h-3.5 text-blue-600" />
              <span>Structured Execution</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Our End-to-End Workflow
            </h2>
            <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
              From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {service.workflow.map((flow, idx) => (
              <div 
                key={idx}
                className="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative"
              >
                <div className="flex items-center justify-between">
                  <span className="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">
                    Step {flow.step}
                  </span>
                </div>
                <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                  {flow.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {flow.desc}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 7. Business Applications Section */}
      <section className="py-16 lg:py-20 bg-white border-b border-slate-200/80">
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
          <div className="space-y-2">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <CheckCircle2 className="w-3.5 h-3.5 text-blue-600" />
              <span>Practical Impact</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
              Business Applications
            </h2>
            <p className="text-sm sm:text-base text-slate-600 max-w-2xl">
              How organizations leverage our {service.title} capabilities to gain measurable competitive advantage.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {service.businessApplications.map((app, idx) => (
              <div 
                key={idx}
                className="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/80 space-y-2.5"
              >
                <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                  {app.title}
                </h3>
                <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  {app.desc}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 8. Closing Contact CTA Section */}
      <section className="py-16 lg:py-20 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
          <div className="rounded-3xl border border-slate-200 bg-slate-50/80 p-8 sm:p-12 space-y-5">
            <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
              Ready to Accelerate Your Business With {service.title}?
            </h2>

            <p className="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
              Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
            </p>

            <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
              <Link
                to="/contact"
                className={`px-7 py-3.5 rounded-xl ${service.theme.btnClass} text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2`}
              >
                <span>Contact Us Today</span>
                <ArrowRight className="w-4 h-4" />
              </Link>

              {onOpenQuote && (
                <button
                  onClick={onOpenQuote}
                  className="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-all font-heading"
                >
                  Request Custom Quotation
                </button>
              )}
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

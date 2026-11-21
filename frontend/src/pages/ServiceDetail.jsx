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
  PhoneCall
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
    <div className="bg-white text-slate-800 font-sans selection:bg-blue-600/10 selection:text-blue-700 min-h-screen flex flex-col justify-between">
      <div>
        {/* Top Breadcrumb & Hero Section */}
        <section className="pt-10 pb-16 lg:pt-14 lg:pb-20 bg-gradient-to-b from-slate-50/70 via-white to-white border-b border-slate-200/80 relative overflow-hidden">
          <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />
          
          <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left">
            {/* Breadcrumb */}
            <div className="flex items-center gap-2 text-xs font-mono text-slate-500 mb-6">
              <Link to="/" className="hover:text-blue-600 transition-colors">Home</Link>
              <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
              <Link to="/services" className="hover:text-blue-600 transition-colors">Services</Link>
              <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
              <span className="text-slate-900 font-semibold">{service.title}</span>
            </div>

            {/* Service Badge & Icon */}
            <div className="flex items-center gap-3.5 mb-5">
              <div className="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 shadow-xs">
                <IconComponent className="w-6 h-6 stroke-[1.9]" />
              </div>
              <span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                Core Service Practice
              </span>
            </div>

            {/* Professional Service Title */}
            <h1 className="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading mb-5">
              {service.title}
            </h1>

            {/* Short and Attractive Introduction */}
            <p className="text-base sm:text-lg text-slate-600 leading-relaxed max-w-3xl">
              {service.intro}
            </p>
          </div>
        </section>

        {/* Content Section: What We Offer & How We Help Businesses */}
        <section className="py-16 lg:py-20 bg-white">
          <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14 text-left">
            
            {/* 1. What We Offer */}
            <div className="space-y-6">
              <div className="border-b border-slate-200 pb-3">
                <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading tracking-tight">
                  What We Offer
                </h2>
              </div>

              <div className="grid grid-cols-1 gap-3.5 pt-1">
                {service.offerings.map((item, idx) => (
                  <div 
                    key={idx}
                    className="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 flex items-start gap-3.5 hover:border-blue-200 transition-colors"
                  >
                    <div className="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                      <Check className="w-3.5 h-3.5 stroke-[2.5]" />
                    </div>
                    <span className="text-sm sm:text-base font-medium text-slate-800 leading-relaxed">
                      {item}
                    </span>
                  </div>
                ))}
              </div>
            </div>

            {/* 2. How We Help Businesses */}
            <div className="space-y-4">
              <div className="border-b border-slate-200 pb-3">
                <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading tracking-tight">
                  How We Help Your Business
                </h2>
              </div>

              <div className="p-6 sm:p-7 rounded-2xl bg-blue-50/40 border border-blue-100/90 text-slate-700 leading-relaxed text-sm sm:text-base">
                <p>{service.helpText}</p>
              </div>
            </div>

            {/* 3. Contact Us Action Section */}
            <div className="pt-6 border-t border-slate-200">
              <div className="rounded-2xl bg-slate-50 border border-slate-200 p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div className="space-y-1.5 text-center sm:text-left">
                  <h3 className="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                    Ready to get started with {service.title}?
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600">
                    Discuss your project specifications directly with our solutions engineering team.
                  </p>
                </div>

                <div className="flex flex-wrap items-center gap-3 shrink-0">
                  <Link
                    to="/contact"
                    className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-xs transition-colors font-heading flex items-center gap-2"
                  >
                    <span>Contact Us</span>
                    <ArrowRight className="w-4 h-4" />
                  </Link>

                  {onOpenQuote && (
                    <button
                      onClick={onOpenQuote}
                      className="px-5 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-colors font-heading"
                    >
                      Request Quote
                    </button>
                  )}
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>
  );
}

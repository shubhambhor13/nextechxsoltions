import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Layers, 
  CheckSquare, 
  Headphones, 
  ArrowRight, 
  Check, 
  PhoneCall, 
  Sparkles,
  ChevronRight
} from 'lucide-react';
import { servicesData } from '../config/servicesData';
import { siteConfig } from '../config/siteConfig';

const iconMap = {
  Bot,
  Code2,
  Layers,
  CheckSquare,
  Headphones
};

export default function Services({ onOpenQuote, onOpenConsultation }) {
  return (
    <div className="bg-white text-slate-800 font-sans selection:bg-blue-600/10 selection:text-blue-700 min-h-screen">
      
      {/* 1. Hero Section: Clean White Background, Navy Typography */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-20 bg-gradient-to-b from-slate-50/70 via-white to-white border-b border-slate-200/80 overflow-hidden">
        <div className="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none" />
        
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold tracking-wide uppercase font-mono">
            <Sparkles className="w-3.5 h-3.5 text-blue-600" />
            <span>Enterprise Technical Services</span>
          </div>

          <h1 className="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
            Our Core Services
          </h1>

          <p className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Delivering focused artificial intelligence, software engineering, SaaS development, data labeling, and business process outsourcing solutions.
          </p>
        </div>
      </section>

      {/* 2. Services Grid: Exactly 5 Clickable Equal-Height Service Cards */}
      <section className="py-16 lg:py-24 bg-slate-50/50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="flex flex-wrap justify-center gap-8 items-stretch">
            {servicesData.map((srv) => {
              const Icon = iconMap[srv.iconName] || Bot;

              return (
                <Link
                  key={srv.id}
                  to={`/services/${srv.slug}`}
                  className="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer"
                >
                  <div className="space-y-5">
                    {/* Icon and Tag */}
                    <div className="flex items-center justify-between gap-4">
                      <div className="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <Icon className="w-6 h-6 stroke-[1.9]" />
                      </div>
                      <span className="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                        <span>Details</span>
                        <ChevronRight className="w-3.5 h-3.5 ml-0.5" />
                      </span>
                    </div>

                    {/* Title */}
                    <h3 className="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                      {srv.title}
                    </h3>

                    {/* Short Professional Description */}
                    <p className="text-slate-600 text-sm leading-relaxed">
                      {srv.shortDesc}
                    </p>

                    {/* What We Offer Checklist */}
                    <div className="pt-2 border-t border-slate-100">
                      <h4 className="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                        Key Capabilities:
                      </h4>
                      <ul className="space-y-2">
                        {srv.offerings.slice(0, 4).map((offering, i) => (
                          <li key={i} className="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                            <div className="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                              <Check className="w-3 h-3 stroke-[2.5]" />
                            </div>
                            <span className="leading-tight">{offering}</span>
                          </li>
                        ))}
                      </ul>
                    </div>
                  </div>

                  {/* Bottom Action CTA */}
                  <div className="pt-6 mt-6 border-t border-slate-100">
                    <div className="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                      <span>View Service Details</span>
                      <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </div>
                  </div>
                </Link>
              );
            })}
          </div>

        </div>
      </section>

      {/* 3. Closing Contact CTA Section */}
      <section className="py-16 lg:py-20 bg-white border-t border-slate-200/80">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 border border-blue-200/80 text-xs font-semibold font-mono">
            <span>Get In Touch</span>
          </div>

          <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Ready to Discuss Your Project Requirements?
          </h2>

          <p className="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Contact our engineering team to evaluate your scope and receive actionable technical guidance.
          </p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <Link
              to="/contact"
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-xs transition-colors font-heading flex items-center gap-2"
            >
              <span>Contact Us</span>
              <ArrowRight className="w-4 h-4" />
            </Link>

            {onOpenQuote && (
              <button
                onClick={onOpenQuote}
                className="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors font-heading"
              >
                Request Quotation
              </button>
            )}
          </div>
        </div>
      </section>

    </div>
  );
}

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
  Sparkles,
  ChevronRight,
  ShieldCheck,
  PhoneCall
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
      
      {/* 1. Hero Section: Attractive, Premium Corporate Header */}
      <section className="relative pt-14 pb-16 lg:pt-20 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle grid background */}
        <div className="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none" />
        <div className="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 left-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none" />
        
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-5">
          <motion.div
            initial={{ opacity: 0, y: -10 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold tracking-wide uppercase font-mono"
          >
            <Sparkles className="w-3.5 h-3.5 text-blue-600" />
            <span>Enterprise Technical Capabilities</span>
          </motion.div>

          <motion.h1
            initial={{ opacity: 0, y: 15 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.4, delay: 0.1 }}
            className="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight font-heading"
          >
            Our Services
          </motion.h1>

          <motion.p
            initial={{ opacity: 0, y: 15 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.4, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            Delivering focused digital engineering, cloud software architectures, intelligent automation, precision data labeling, and business process outsourcing solutions designed to accelerate growth.
          </motion.p>
        </div>
      </section>

      {/* 2. Services Grid: 5 Modern Colorful Cards with Professional Gradients & Unique Identities */}
      <section className="py-16 lg:py-24 bg-slate-50/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="flex flex-wrap justify-center gap-8 items-stretch">
            {servicesData.map((srv, index) => {
              const Icon = iconMap[srv.iconName] || Bot;

              return (
                <motion.div
                  key={srv.id}
                  initial={{ opacity: 0, y: 25 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: index * 0.1 }}
                  className="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex"
                >
                  <Link
                    to={`/services/${srv.slug}`}
                    className="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden"
                  >
                    {/* Top Decorative Gradient Accent Bar */}
                    <div className={`absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r ${srv.theme.gradient}`} />

                    <div className="space-y-5">
                      {/* Top Header: Icon & Category Badge */}
                      <div className="flex items-center justify-between gap-4 pt-1">
                        <div className={`w-14 h-14 rounded-2xl bg-gradient-to-br ${srv.theme.gradient} text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300`}>
                          <Icon className="w-7 h-7 stroke-[2]" />
                        </div>
                        <span className={`inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono ${srv.theme.badgeColor}`}>
                          {srv.badge}
                        </span>
                      </div>

                      {/* Title */}
                      <h2 className="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        {srv.title}
                      </h2>

                      {/* Short Description */}
                      <p className="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                        {srv.shortDesc}
                      </p>

                      {/* Key Capabilities Preview */}
                      <div className="pt-2 border-t border-slate-100">
                        <h3 className="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                          Core Capabilities:
                        </h3>
                        <ul className="space-y-2">
                          {srv.offerings.slice(0, 4).map((offering, i) => (
                            <li key={i} className="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                              <div className="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <Check className="w-3 h-3 stroke-[2.5]" />
                              </div>
                              <span className="leading-tight font-medium">{offering.title}</span>
                            </li>
                          ))}
                        </ul>
                      </div>
                    </div>

                    {/* Bottom Action: Colorful Gradient Explore Button */}
                    <div className="pt-6 mt-6 border-t border-slate-100">
                      <div className={`w-full py-3.5 px-5 rounded-xl ${srv.theme.btnClass} text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-blue-500/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg`}>
                        <span>Explore Service</span>
                        <ArrowRight className="w-4 h-4 group-hover:translate-x-1.5 transition-transform" />
                      </div>
                    </div>
                  </Link>
                </motion.div>
              );
            })}
          </div>

        </div>
      </section>

      {/* 3. Closing Contact CTA Section */}
      <section className="py-16 lg:py-20 bg-white border-t border-slate-200/80">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 border border-blue-200/80 text-xs font-semibold font-mono">
            <ShieldCheck className="w-3.5 h-3.5 text-blue-600" />
            <span>Structured Engagements • Zero Ambiguity</span>
          </div>

          <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
            Ready to Discuss Your Project Requirements?
          </h2>

          <p className="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
          </p>

          <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
            <Link
              to="/contact"
              className="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all font-heading flex items-center gap-2 active:scale-95"
            >
              <span>Contact Us</span>
              <ArrowRight className="w-4 h-4" />
            </Link>

            {onOpenQuote && (
              <button
                onClick={onOpenQuote}
                className="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading"
              >
                Request Quotation
              </button>
            )}

            {onOpenConsultation && (
              <button
                onClick={onOpenConsultation}
                className="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2"
              >
                <PhoneCall className="w-4 h-4 text-blue-600" />
                <span>Book Strategy Call</span>
              </button>
            )}
          </div>
        </div>
      </section>

    </div>
  );
}

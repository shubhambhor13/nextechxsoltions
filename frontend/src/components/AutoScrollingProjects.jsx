import React from 'react';
import { motion } from 'framer-motion';
import { 
  Briefcase, 
  Sparkles, 
  TrendingUp, 
  CheckCircle2, 
  ArrowRight,
  Bot,
  Layers,
  Code2,
  Headphones,
  Cpu
} from 'lucide-react';

export default function AutoScrollingProjects({ onOpenQuote }) {
  const caseStudies = [
    {
      title: "Omnichannel WhatsApp & AI Support Bot",
      client: "FinCore Global Services",
      category: "AI Automation",
      metric: "84% Resolution Velocity Uplift",
      metricDetail: "120,000+ monthly conversations handled with sub-second SLA",
      technologies: ["OpenAI GPT-4o", "n8n", "WhatsApp Cloud API", "PostgreSQL"],
      icon: Bot,
      color: "from-blue-600 to-indigo-600",
      accent: "text-blue-600"
    },
    {
      title: "Enterprise Multi-Tenant SaaS Platform",
      client: "AeroVision Dynamics",
      category: "IT Solutions",
      metric: "99.99% Guaranteed Uptime",
      metricDetail: "Modern high-throughput microservices handling 2M+ daily requests",
      technologies: ["React 18", "Python FastAPI", "Docker & K8s", "AWS EKS"],
      icon: Cpu,
      color: "from-indigo-600 to-purple-600",
      accent: "text-indigo-600"
    },
    {
      title: "Cloud Fleet Telematics & IoT Control Center",
      client: "TransGlobal Freightways",
      category: "IT Solutions",
      metric: "40% Dispatch Turnaround Gain",
      metricDetail: "2,400 active commercial vehicles telemetry synced real-time",
      technologies: ["React 18", "FastAPI", "Kafka", "AWS EKS", "TimescaleDB"],
      icon: Code2,
      color: "from-blue-600 to-cyan-600",
      accent: "text-blue-600"
    },
    {
      title: "Intelligent Healthcare Invoice OCR Pipeline",
      client: "MediCare Shield Health",
      category: "AI Automation",
      metric: "92% Manual Cost Reduction",
      metricDetail: "4.8 minutes turnaround on unstructured handwritten claims",
      technologies: ["Azure Doc Intelligence", "n8n", "Python", "PostgreSQL"],
      icon: Bot,
      color: "from-emerald-600 to-teal-600",
      accent: "text-emerald-600"
    },
    {
      title: "24/7 Global Tier-2 Technical Helpdesk Hub",
      client: "CloudScale SaaS",
      category: "BPO Services",
      metric: "98.4% Customer CSAT",
      metricDetail: "Follow-the-sun support pods with guaranteed 15-minute response SLA",
      technologies: ["Zendesk", "Datadog", "Jira Service", "Slack Handoff"],
      icon: Headphones,
      color: "from-purple-600 to-pink-600",
      accent: "text-purple-600"
    }
  ];

  return (
    <div className="py-12 relative overflow-hidden select-none bg-slate-50/70 border-y border-slate-200/80">
      
      {/* Side gradient blur masks */}
      <div className="absolute top-0 bottom-0 left-0 w-20 sm:w-36 bg-gradient-to-r from-slate-50 to-transparent z-20 pointer-events-none" />
      <div className="absolute top-0 bottom-0 right-0 w-20 sm:w-36 bg-gradient-to-l from-slate-50 to-transparent z-20 pointer-events-none" />

      {/* Header Badge */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 flex items-center justify-between">
        <div className="flex items-center gap-2">
          <span className="flex h-2 w-2 rounded-full bg-blue-600 animate-pulse" />
          <span className="text-xs font-bold uppercase tracking-wider text-slate-700 font-heading">
            Enterprise Case Studies
          </span>
        </div>
      </div>

      {/* Marquee Track */}
      <div className="relative flex overflow-hidden w-full group/track">
        <div className="animate-marquee flex items-center gap-6 py-3 hover:[animation-play-state:paused]">
          {[...caseStudies, ...caseStudies, ...caseStudies].map((study, idx) => {
            const Icon = study.icon;
            return (
              <div
                key={idx}
                className="w-[360px] sm:w-[420px] p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 hover:shadow-xl transition-all duration-300 flex flex-col justify-between shrink-0 shadow-sm group/card relative overflow-hidden text-left cursor-pointer"
              >
                <div className="space-y-4">
                  <div className="flex items-center justify-between">
                    <span className="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-50 text-blue-700 border border-blue-200">
                      {study.category}
                    </span>
                    <span className="text-xs sm:text-sm text-slate-500 font-semibold">
                      {study.client}
                    </span>
                  </div>

                  <h4 className="text-lg sm:text-xl font-bold text-slate-900 group-hover/card:text-blue-600 transition-colors leading-snug">
                    {study.title}
                  </h4>

                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
                    <div className="flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-blue-700">
                      <TrendingUp className="w-4 h-4 text-blue-600" />
                      <span>{study.metric}</span>
                    </div>
                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-medium">
                      {study.metricDetail}
                    </p>
                  </div>

                  <div className="flex flex-wrap gap-2 pt-1">
                    {study.technologies.map((t, tIdx) => (
                      <span
                        key={tIdx}
                        className="px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 shadow-2xs"
                      >
                        {t}
                      </span>
                    ))}
                  </div>
                </div>

                <div className="pt-4 mt-5 border-t border-slate-100 flex items-center justify-between">
                  <span className="text-xs text-slate-500 font-semibold">Production SLA</span>
                  <button
                    onClick={onOpenQuote}
                    className="text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 transition-colors"
                  >
                    <span>View Architecture</span>
                    <ArrowRight className="w-4 h-4" />
                  </button>
                </div>
              </div>
            );
          })}
        </div>
      </div>

    </div>
  );
}

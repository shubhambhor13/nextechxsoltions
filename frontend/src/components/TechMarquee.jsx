import React from 'react';
import { 
  Bot, 
  Cpu, 
  Workflow, 
  Layers, 
  Database, 
  Code2, 
  Cloud, 
  ShieldCheck, 
  Zap, 
  Sparkles,
  BarChart3,
  Server,
  Activity
} from 'lucide-react';

export default function TechMarquee() {
  const technologies = [
    { name: "Python", category: "AI & Automation", icon: Code2, color: "text-blue-600 bg-blue-50" },
    { name: "Java Enterprise", category: "Microservices", icon: Server, color: "text-amber-600 bg-amber-50" },
    { name: "React & Vite", category: "Frontend Core", icon: Zap, color: "text-cyan-600 bg-cyan-50" },
    { name: "PyTorch", category: "Deep Learning", icon: Bot, color: "text-orange-600 bg-orange-50" },
    { name: "n8n Workflows", category: "Automation", icon: Workflow, color: "text-pink-600 bg-pink-50" },
    { name: "OpenAI GPT-4", category: "RAG Agents", icon: Sparkles, color: "text-emerald-600 bg-emerald-50" },
    { name: "AWS & Cloud", category: "Infrastructure", icon: Cloud, color: "text-indigo-600 bg-indigo-50" },
    { name: "TypeScript", category: "Full Stack", icon: Code2, color: "text-purple-600 bg-purple-50" },
    { name: "Power BI", category: "Data Analytics", icon: BarChart3, color: "text-yellow-600 bg-yellow-50" },
    { name: "PostgreSQL", category: "Database", icon: Database, color: "text-blue-600 bg-blue-50" },
    { name: "FastAPI", category: "High Performance", icon: Cpu, color: "text-teal-600 bg-teal-50" },
    { name: "Docker & K8s", category: "DevOps", icon: Activity, color: "text-sky-600 bg-sky-50" }
  ];

  return (
    <div className="py-7 relative overflow-hidden select-none border-y border-slate-200/80 bg-slate-50/70">
      
      {/* Side gradient masks for smooth fade in/out on white/light grey */}
      <div className="absolute top-0 bottom-0 left-0 w-20 sm:w-36 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none" />
      <div className="absolute top-0 bottom-0 right-0 w-20 sm:w-36 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none" />

      {/* Single clean continuously auto-scrolling rail */}
      <div className="relative flex overflow-hidden w-full group/track">
        <div className="animate-marquee flex items-center gap-6 py-2 hover:[animation-play-state:paused]">
          {/* Tripled list for seamless infinite loop on any screen resolution */}
          {[...technologies, ...technologies, ...technologies].map((tech, idx) => {
            const Icon = tech.icon;
            return (
              <div
                key={idx}
                className="flex items-center gap-3.5 px-5 py-3 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:border-blue-400 hover:shadow-md transition-all shrink-0 cursor-pointer"
              >
                <div className={`p-2 rounded-xl ${tech.color} shrink-0`}>
                  <Icon className="w-5 h-5" />
                </div>
                <div className="text-left">
                  <span className="text-sm font-bold text-slate-900 tracking-wide block font-heading">
                    {tech.name}
                  </span>
                  <span className="text-xs text-slate-500 font-medium block mt-0.5">
                    {tech.category}
                  </span>
                </div>
              </div>
            );
          })}
        </div>
      </div>

    </div>
  );
}

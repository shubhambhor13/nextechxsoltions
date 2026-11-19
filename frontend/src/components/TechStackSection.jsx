import React, { useState } from 'react';
import { 
  Code2, 
  BrainCircuit, 
  Cloud, 
  BarChart3, 
  Workflow, 
  Layers, 
  CheckCircle2 
} from 'lucide-react';

export default function TechStackSection() {
  const [activeTab, setActiveTab] = useState('all');

  const categories = [
    { id: 'all', label: 'All Technologies' },
    { id: 'ai', label: 'AI & Automation' },
    { id: 'fullstack', label: 'Web & Backend' },
    { id: 'data', label: 'Data & Analytics' },
    { id: 'cloud', label: 'Cloud & Infrastructure' }
  ];

  const technologies = [
    { name: 'Python 3.12', category: 'ai', role: 'AI Models & FastAPI Core', level: 'Primary Language' },
    { name: 'PyTorch & TorchVision', category: 'ai', role: 'Deep Learning & Neural Vision', level: 'AI Framework' },
    { name: 'OpenAI GPT-4 & LLMs', category: 'ai', role: 'Generative RAG & Custom Agents', level: 'AI Ecosystem' },
    { name: 'n8n Workflow Engine', category: 'ai', role: 'Multi-System Automation', level: 'Automation' },
    { name: 'React 18 & Vite', category: 'fullstack', role: 'Modern High-Speed Frontends', level: 'Frontend Core' },
    { name: 'Python FastAPI', category: 'fullstack', role: 'High-Throughput Async REST/WebSockets', level: 'Backend Core' },
    { name: 'Java 21 & Spring Boot', category: 'fullstack', role: 'Enterprise Microservices', level: 'Enterprise' },
    { name: 'Tailwind CSS', category: 'fullstack', role: 'Bespoke Modern Design Systems', level: 'Styling' },
    { name: 'PostgreSQL & TimescaleDB', category: 'data', role: 'Relational & Time-Series Data', level: 'Database' },
    { name: 'Power BI & DAX', category: 'data', role: 'Enterprise Executive Dashboards', level: 'BI Engine' },
    { name: 'YOLOv8 & OpenCV', category: 'ai', role: 'Real-Time Computer Vision & Detection', level: 'Computer Vision' },
    { name: 'Next.js & Turbopack', category: 'fullstack', role: 'Server-Side Rendering & Edge Routing', level: 'Framework' },
    { name: 'AWS & Cloud Architecture', category: 'cloud', role: 'EKS, S3, RDS & Serverless Lambda', level: 'Cloud Host' },
    { name: 'Docker & Kubernetes', category: 'cloud', role: 'Container Orchestration & CI/CD', level: 'DevOps' },
    { name: 'Apache Kafka', category: 'cloud', role: 'Real-Time Event Streaming', level: 'Messaging' },
    { name: 'Redis Cache', category: 'cloud', role: 'In-Memory State & Rate Limiting', level: 'Caching' }
  ];

  const filtered = activeTab === 'all' 
    ? technologies 
    : technologies.filter(t => t.category === activeTab);

  return (
    <section className="py-20 bg-navy-950 relative overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-semibold uppercase tracking-wider mb-3">
            <Layers className="w-3.5 h-3.5" />
            <span>Industrial Grade Foundation</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
            Engineered With Modern <span className="bg-gradient-to-r from-cyan-400 via-indigo-400 to-purple-400 bg-clip-text text-transparent">Production Stacks</span>
          </h2>
          <p className="mt-3 text-sm text-slate-400">
            We do not use deprecated or fragile legacy toolchains. Every solution and syllabus is anchored in market-leading, high-concurrency technologies.
          </p>

          {/* Filter Tabs */}
          <div className="flex flex-wrap items-center justify-center gap-2 mt-8">
            {categories.map((cat) => (
              <button
                key={cat.id}
                onClick={() => setActiveTab(cat.id)}
                className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all ${
                  activeTab === cat.id
                    ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/20'
                    : 'bg-navy-900 border border-slate-800 text-slate-400 hover:text-white hover:bg-slate-800/60'
                }`}
              >
                {cat.label}
              </button>
            ))}
          </div>
        </div>

        {/* Tech Grid */}
        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
          {filtered.map((item, idx) => (
            <div
              key={idx}
              className="p-4 rounded-xl bg-navy-900/50 border border-slate-800 hover:border-cyan-500/40 hover:bg-navy-900 transition-all duration-200 group"
            >
              <div className="flex items-center justify-between mb-2">
                <span className="text-[10px] uppercase font-bold text-slate-500 group-hover:text-cyan-400 transition-colors">
                  {item.level}
                </span>
                <CheckCircle2 className="w-3.5 h-3.5 text-slate-700 group-hover:text-emerald-400 transition-colors" />
              </div>
              <h4 className="text-sm font-bold text-white group-hover:text-cyan-200 transition-colors">
                {item.name}
              </h4>
              <p className="text-xs text-slate-400 mt-1 line-clamp-1">
                {item.role}
              </p>
            </div>
          ))}
        </div>

      </div>
    </section>
  );
}


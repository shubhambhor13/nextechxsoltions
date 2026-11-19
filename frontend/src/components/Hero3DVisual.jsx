import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Cpu, 
  Workflow, 
  Layers, 
  Sparkles, 
  ShieldCheck, 
  Activity, 
  Zap,
  CheckCircle2,
  Database
} from 'lucide-react';

export default function Hero3DVisual() {
  const [activeNode, setActiveNode] = useState(0);

  const nodes = [
    {
      title: "Autonomous AI Agents",
      metric: "98.8% CSAT",
      sub: "RAG & GPT-4o Orchestration",
      icon: Bot,
      color: "from-cyan-500 to-blue-600",
      glow: "rgba(6, 182, 212, 0.4)",
      borderColor: "border-cyan-500/40",
      textColor: "text-cyan-400"
    },
    {
      title: "n8n Workflow Engine",
      metric: "< 45ms SLA",
      sub: "Autonomous Event Pipelines",
      icon: Workflow,
      color: "from-blue-600 to-indigo-600",
      glow: "rgba(99, 102, 241, 0.4)",
      borderColor: "border-indigo-500/40",
      textColor: "text-indigo-400"
    },
    {
      title: "Enterprise Web & SaaS",
      metric: "99.99% Uptime",
      sub: "Microservices & Cloud DevOps",
      icon: Cpu,
      color: "from-indigo-600 to-purple-600",
      glow: "rgba(168, 85, 247, 0.4)",
      borderColor: "border-purple-500/40",
      textColor: "text-purple-400"
    },
    {
      title: "Cloud Microservices",
      metric: "99.9% Uptime",
      sub: "FastAPI, AWS EKS & Kafka",
      icon: Cpu,
      color: "from-purple-600 to-pink-600",
      glow: "rgba(236, 72, 153, 0.4)",
      borderColor: "border-pink-500/40",
      textColor: "text-pink-400"
    }
  ];

  return (
    <div className="relative w-full max-w-xl mx-auto h-[460px] sm:h-[540px] flex items-center justify-center select-none overflow-hidden">
      
      {/* Background radial glow */}
      <div className="absolute inset-0 bg-gradient-to-tr from-cyan-500/15 via-indigo-500/10 to-purple-600/15 rounded-full blur-3xl pointer-events-none" />

      {/* Orbiting Concentric Cyber Rings */}
      <motion.div 
        animate={{ rotate: 360 }}
        transition={{ duration: 40, repeat: Infinity, ease: "linear" }}
        className="absolute w-[340px] h-[340px] sm:w-[420px] sm:h-[420px] rounded-full border border-cyan-500/20 border-dashed pointer-events-none"
      />
      <motion.div 
        animate={{ rotate: -360 }}
        transition={{ duration: 60, repeat: Infinity, ease: "linear" }}
        className="absolute w-[260px] h-[260px] sm:w-[320px] sm:h-[320px] rounded-full border border-purple-500/25 pointer-events-none"
      />
      <motion.div 
        animate={{ rotate: 180 }}
        transition={{ duration: 30, repeat: Infinity, ease: "linear" }}
        className="absolute w-[180px] h-[180px] sm:w-[220px] sm:h-[220px] rounded-full border border-blue-400/30 border-dotted pointer-events-none"
      />

      {/* Connecting animated energy lines SVG */}
      <svg className="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible opacity-50">
        <defs>
          <linearGradient id="cyber-line-grad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stopColor="#06b6d4" stopOpacity="0.8" />
            <stop offset="50%" stopColor="#6366f1" stopOpacity="0.5" />
            <stop offset="100%" stopColor="#a855f7" stopOpacity="0.8" />
          </linearGradient>
        </defs>
        {/* Radiating lines from center (50%, 50%) */}
        <line x1="50%" y1="50%" x2="15%" y2="20%" stroke="url(#cyber-line-grad)" strokeWidth="1.5" strokeDasharray="4 4" />
        <line x1="50%" y1="50%" x2="85%" y2="20%" stroke="url(#cyber-line-grad)" strokeWidth="1.5" strokeDasharray="4 4" />
        <line x1="50%" y1="50%" x2="15%" y2="80%" stroke="url(#cyber-line-grad)" strokeWidth="1.5" strokeDasharray="4 4" />
        <line x1="50%" y1="50%" x2="85%" y2="80%" stroke="url(#cyber-line-grad)" strokeWidth="1.5" strokeDasharray="4 4" />

        {/* Pulsing Animated Packets */}
        <circle cx="32%" cy="35%" r="3" fill="#38bdf8" className="animate-ping" />
        <circle cx="68%" cy="35%" r="3" fill="#818cf8" className="animate-ping" />
        <circle cx="32%" cy="65%" r="3" fill="#c084fc" className="animate-ping" />
        <circle cx="68%" cy="65%" r="3" fill="#f472b6" className="animate-ping" />
      </svg>

      {/* Central 3D Holographic AI Core */}
      <motion.div
        animate={{
          scale: [1, 1.04, 1],
          boxShadow: [
            "0 0 35px rgba(6, 182, 212, 0.3), inset 0 0 20px rgba(99, 102, 241, 0.3)",
            "0 0 60px rgba(168, 85, 247, 0.4), inset 0 0 30px rgba(6, 182, 212, 0.4)",
            "0 0 35px rgba(6, 182, 212, 0.3), inset 0 0 20px rgba(99, 102, 241, 0.3)"
          ]
        }}
        transition={{ duration: 4, repeat: Infinity, ease: "easeInOut" }}
        className="relative z-10 w-28 h-28 sm:w-36 sm:h-36 rounded-3xl bg-gradient-to-br from-navy-900 via-slate-900 to-navy-950 border-2 border-cyan-400/50 flex flex-col items-center justify-center p-3 text-center cursor-pointer backdrop-blur-2xl group shadow-2xl"
      >
        <div className="absolute -inset-1 rounded-3xl bg-gradient-to-r from-cyan-500 via-indigo-500 to-purple-600 opacity-30 blur-lg group-hover:opacity-60 transition-opacity" />
        
        <div className="relative z-10 flex flex-col items-center">
          <div className="relative w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-cyan-500 via-indigo-600 to-purple-600 p-[1.5px] flex items-center justify-center mb-1 shadow-lg">
            <div className="w-full h-full bg-navy-950 rounded-[14px] flex items-center justify-center">
              <Cpu className="w-5 h-5 sm:w-6 sm:h-6 text-cyan-300 animate-pulse" />
            </div>
          </div>
          <span className="text-[11px] sm:text-xs font-black tracking-wider text-white uppercase">
            AI Core
          </span>
          <span className="flex items-center gap-1 text-[9px] font-mono text-emerald-400">
            <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping" />
            <span>Active v2.0</span>
          </span>
        </div>
      </motion.div>

      {/* Floating Telemetry Nodes in 4 Quadrants */}
      
      {/* Node 1: Top-Left (Autonomous AI) */}
      <motion.div
        animate={{ y: [0, -8, 0] }}
        transition={{ duration: 4.5, repeat: Infinity, ease: "easeInOut" }}
        onMouseEnter={() => setActiveNode(0)}
        className="absolute top-4 sm:top-8 left-0 sm:left-2 z-20"
      >
        <div className="p-3 sm:p-4 rounded-2xl bg-navy-900/90 backdrop-blur-xl border border-cyan-500/30 shadow-xl hover:border-cyan-400 hover:shadow-cyan-500/20 transition-all cursor-pointer group max-w-[190px] sm:max-w-[210px]">
          <div className="flex items-center gap-2 mb-1.5">
            <div className="p-1.5 rounded-xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-400">
              <Bot className="w-4 h-4" />
            </div>
            <span className="text-[10px] font-bold uppercase tracking-wider text-cyan-400">
              AI Agents
            </span>
          </div>
          <div className="text-xs sm:text-sm font-bold text-white leading-tight">
            GPT-4o & RAG
          </div>
          <div className="flex items-center justify-between text-[10px] text-slate-400 mt-1 font-mono">
            <span>Accuracy:</span>
            <span className="text-emerald-400 font-bold">98.8% CSAT</span>
          </div>
        </div>
      </motion.div>

      {/* Node 2: Top-Right (Workflow Automation) */}
      <motion.div
        animate={{ y: [0, 8, 0] }}
        transition={{ duration: 5, repeat: Infinity, ease: "easeInOut", delay: 0.5 }}
        onMouseEnter={() => setActiveNode(1)}
        className="absolute top-4 sm:top-8 right-0 sm:right-2 z-20"
      >
        <div className="p-3 sm:p-4 rounded-2xl bg-navy-900/90 backdrop-blur-xl border border-indigo-500/30 shadow-xl hover:border-indigo-400 hover:shadow-indigo-500/20 transition-all cursor-pointer group max-w-[190px] sm:max-w-[210px]">
          <div className="flex items-center gap-2 mb-1.5">
            <div className="p-1.5 rounded-xl bg-indigo-500/10 border border-indigo-500/30 text-indigo-400">
              <Workflow className="w-4 h-4" />
            </div>
            <span className="text-[10px] font-bold uppercase tracking-wider text-indigo-400">
              Automation
            </span>
          </div>
          <div className="text-xs sm:text-sm font-bold text-white leading-tight">
            n8n Orchestration
          </div>
          <div className="flex items-center justify-between text-[10px] text-slate-400 mt-1 font-mono">
            <span>Latency:</span>
            <span className="text-cyan-400 font-bold">&lt; 45ms</span>
          </div>
        </div>
      </motion.div>

      {/* Node 3: Bottom-Left (Cloud & SaaS) */}
      <motion.div
        animate={{ y: [0, 8, 0] }}
        transition={{ duration: 4.8, repeat: Infinity, ease: "easeInOut", delay: 1 }}
        onMouseEnter={() => setActiveNode(2)}
        className="absolute bottom-6 sm:bottom-10 left-0 sm:left-2 z-20"
      >
        <div className="p-3 sm:p-4 rounded-2xl bg-navy-900/90 backdrop-blur-xl border border-purple-500/30 shadow-xl hover:border-purple-400 hover:shadow-purple-500/20 transition-all cursor-pointer group max-w-[190px] sm:max-w-[210px]">
          <div className="flex items-center gap-2 mb-1.5">
            <div className="p-1.5 rounded-xl bg-purple-500/10 border border-purple-500/30 text-purple-400">
              <Cpu className="w-4 h-4" />
            </div>
            <span className="text-[10px] font-bold uppercase tracking-wider text-purple-400">
              Cloud SaaS
            </span>
          </div>
          <div className="text-xs sm:text-sm font-bold text-white leading-tight">
            Microservices & API
          </div>
          <div className="flex items-center justify-between text-[10px] text-slate-400 mt-1 font-mono">
            <span>Uptime SLA:</span>
            <span className="text-emerald-400 font-bold">99.99%</span>
          </div>
        </div>
      </motion.div>

      {/* Node 4: Bottom-Right (Cloud Microservices) */}
      <motion.div
        animate={{ y: [0, -8, 0] }}
        transition={{ duration: 5.2, repeat: Infinity, ease: "easeInOut", delay: 1.5 }}
        onMouseEnter={() => setActiveNode(3)}
        className="absolute bottom-6 sm:bottom-10 right-0 sm:right-2 z-20"
      >
        <div className="p-3 sm:p-4 rounded-2xl bg-navy-900/90 backdrop-blur-xl border border-pink-500/30 shadow-xl hover:border-pink-400 hover:shadow-pink-500/20 transition-all cursor-pointer group max-w-[190px] sm:max-w-[210px]">
          <div className="flex items-center gap-2 mb-1.5">
            <div className="p-1.5 rounded-xl bg-pink-500/10 border border-pink-500/30 text-pink-400">
              <Activity className="w-4 h-4" />
            </div>
            <span className="text-[10px] font-bold uppercase tracking-wider text-pink-400">
              Cloud Ops
            </span>
          </div>
          <div className="text-xs sm:text-sm font-bold text-white leading-tight">
            AWS EKS & Kafka
          </div>
          <div className="flex items-center justify-between text-[10px] text-slate-400 mt-1 font-mono">
            <span>Uptime:</span>
            <span className="text-cyan-400 font-bold">99.9%</span>
          </div>
        </div>
      </motion.div>

      {/* Subtle Live Stream Status Pill at the very bottom center */}
      <div className="absolute -bottom-4 z-30 flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-950/90 border border-slate-700/80 shadow-2xl backdrop-blur-md text-[11px] text-slate-300 font-mono">
        <span className="w-2 h-2 rounded-full bg-emerald-400 animate-ping" />
        <span className="text-slate-400">Telemetry:</span>
        <span className="text-cyan-300 font-bold">Zero Dropped Frames</span>
      </div>

    </div>
  );
}


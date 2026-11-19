import React from 'react';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Sparkles, 
  ShieldCheck 
} from 'lucide-react';

export default function HeroTechIllustration() {
  return (
    <div className="relative w-full max-w-lg lg:max-w-xl mx-auto flex items-center justify-center select-none py-6 lg:py-4 overflow-hidden">
      
      {/* 1. Multi-layered Ambient Volumetric Glows */}
      <div className="absolute -top-12 -right-12 w-80 h-80 bg-cyan-500/25 rounded-full blur-[100px] pointer-events-none animate-pulse-slow" />
      <div className="absolute -bottom-12 -left-12 w-80 h-80 bg-blue-600/30 rounded-full blur-[110px] pointer-events-none animate-pulse-slow" style={{ animationDelay: '2s' }} />
      <div className="absolute inset-0 m-auto w-96 h-96 bg-indigo-500/20 rounded-full blur-[120px] pointer-events-none" />

      {/* 2. Concentric Holographic Tech Orbital Guide Rings */}
      <div className="absolute inset-0 flex items-center justify-center pointer-events-none opacity-40">
        <div className="w-[480px] h-[480px] rounded-full border border-cyan-400/20 border-dashed animate-spin" style={{ animationDuration: '60s' }} />
        <div className="absolute w-[380px] h-[380px] rounded-full border border-indigo-400/25 border-dotted animate-spin" style={{ animationDuration: '45s', animationDirection: 'reverse' }} />
        <div className="absolute w-[280px] h-[280px] rounded-full border border-blue-400/20" />
      </div>

      {/* 3. Main Central 3D Quantum AI Core Artwork Container */}
      <motion.div 
        animate={{ y: [0, -12, 0] }}
        transition={{ duration: 6, repeat: Infinity, ease: "easeInOut" }}
        className="relative z-20 w-full rounded-3xl overflow-hidden border border-cyan-400/30 bg-slate-900/60 backdrop-blur-xl shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8),0_0_50px_rgba(6,182,212,0.3)] group"
      >
        {/* Soft Metallic Glow Edge Top Reflection */}
        <div className="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-cyan-400/80 to-transparent z-10" />

        {/* 3D Rendered Quantum AI Core Image */}
        <div className="relative aspect-video w-full overflow-hidden bg-slate-950 flex items-center justify-center">
          <img 
            src="/images/hero-ai-3d-core.jpg" 
            alt="3D Quantum AI Neural Core"
            className="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700 ease-out"
          />
          {/* Subtle Ambient Vignette to blend image borders into dark hero seamlessly */}
          <div className="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-slate-950/40 pointer-events-none" />
          <div className="absolute inset-0 bg-gradient-to-r from-slate-950/60 via-transparent to-slate-950/60 pointer-events-none" />
        </div>

        {/* Sleek Bottom Telemetry Status Pill */}
        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800/80 flex items-center justify-between text-xs font-mono">
          <div className="flex items-center gap-2">
            <span className="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse shadow-[0_0_8px_rgba(52,211,153,0.8)]" />
            <span className="text-slate-300 font-semibold tracking-wide">QUANTUM AI ENGINE</span>
          </div>
          <div className="flex items-center gap-1.5 text-cyan-400 text-[11px]">
            <Sparkles className="w-3.5 h-3.5" />
            <span>High-Performance Core</span>
          </div>
        </div>
      </motion.div>

      {/* 4. Elegant 3D Floating Satellite Badge: Top-Left (Security & Privacy) */}
      <motion.div 
        animate={{ y: [0, -8, 0], x: [0, -3, 0] }}
        transition={{ duration: 4.8, repeat: Infinity, ease: "easeInOut", delay: 0.2 }}
        className="absolute -top-5 left-0 sm:-left-4 z-30 flex items-center gap-3 px-4 py-2 rounded-2xl bg-slate-900/95 backdrop-blur-xl border border-emerald-500/40 shadow-[0_15px_35px_rgba(0,0,0,0.7),0_0_20px_rgba(16,185,129,0.25)] text-left hover:scale-105 transition-transform"
      >
        <div className="w-8 h-8 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md shadow-emerald-500/30">
          <ShieldCheck className="w-4 h-4" />
        </div>
        <div>
          <div className="text-xs font-bold text-white font-heading">100% NDA Protected</div>
          <div className="text-[10px] text-emerald-300/90 font-medium">Enterprise Security</div>
        </div>
      </motion.div>

      {/* 5. Elegant 3D Floating Satellite Badge: Top-Right (AI Automation) */}
      <motion.div 
        animate={{ y: [0, 8, 0], x: [0, 4, 0] }}
        transition={{ duration: 5.2, repeat: Infinity, ease: "easeInOut", delay: 0.5 }}
        className="absolute -top-5 right-0 sm:-right-4 z-30 flex items-center gap-3 px-4 py-2 rounded-2xl bg-slate-900/95 backdrop-blur-xl border border-cyan-400/40 shadow-[0_15px_35px_rgba(0,0,0,0.7),0_0_25px_rgba(6,182,212,0.3)] text-left hover:scale-105 transition-transform"
      >
        <div className="w-8 h-8 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white shadow-md shadow-cyan-500/30">
          <Bot className="w-4 h-4" />
        </div>
        <div>
          <div className="text-xs font-bold text-white font-heading flex items-center gap-1.5">
            AI Automation
            <Sparkles className="w-3 h-3 text-cyan-300" />
          </div>
          <div className="text-[10px] text-cyan-300/90 font-medium">Smart Bots & Workflows</div>
        </div>
      </motion.div>

      {/* 6. Elegant 3D Floating Satellite Badge: Bottom-Right (Software & Web) */}
      <motion.div 
        animate={{ y: [0, -8, 0], x: [0, 4, 0] }}
        transition={{ duration: 5.5, repeat: Infinity, ease: "easeInOut", delay: 1 }}
        className="absolute -bottom-6 right-0 sm:-right-4 z-30 flex items-center gap-3 px-4 py-2 rounded-2xl bg-slate-900/95 backdrop-blur-xl border border-indigo-500/40 shadow-[0_15px_35px_rgba(0,0,0,0.7),0_0_25px_rgba(99,102,241,0.3)] text-left hover:scale-105 transition-transform"
      >
        <div className="w-8 h-8 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white shadow-md shadow-indigo-500/30">
          <Code2 className="w-4 h-4" />
        </div>
        <div>
          <div className="text-xs font-bold text-white font-heading">Software & Web</div>
          <div className="text-[10px] text-indigo-300/90 font-medium">Custom Web & Cloud Systems</div>
        </div>
      </motion.div>

    </div>
  );
}

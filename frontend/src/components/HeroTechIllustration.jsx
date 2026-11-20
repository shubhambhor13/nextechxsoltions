import React from 'react';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Sparkles, 
  ShieldCheck, 
  Cpu, 
  Activity,
  Zap
} from 'lucide-react';

export default function HeroTechIllustration() {
  return (
    <div className="relative w-full max-w-lg lg:max-w-xl xl:max-w-2xl mx-auto flex items-center justify-center select-none py-8 sm:py-10 lg:py-8 overflow-visible">
      
      {/* 1. Multi-Tone Ambient Volumetric Glow Nebulas Behind Core */}
      <div 
        className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 sm:w-96 h-72 sm:h-96 bg-cyan-400/25 rounded-full blur-[90px] pointer-events-none animate-hero-pulse-glow" 
        style={{ animationDuration: '5s' }}
      />
      <div 
        className="absolute top-1/3 right-4 w-60 sm:w-80 h-60 sm:h-80 bg-purple-600/20 rounded-full blur-[100px] pointer-events-none animate-hero-pulse-glow" 
        style={{ animationDuration: '7s', animationDelay: '1.5s' }}
      />
      <div 
        className="absolute bottom-4 left-4 w-64 sm:w-80 h-64 sm:h-80 bg-blue-600/25 rounded-full blur-[110px] pointer-events-none" 
      />

      {/* 2. Concentric Holographic HUD Orbital Guide Rings */}
      <div className="absolute inset-0 flex items-center justify-center pointer-events-none opacity-50 sm:opacity-60">
        {/* Outer Orbital Ring with Glowing Cyan Orbit Bead */}
        <div 
          className="relative w-[340px] h-[340px] sm:w-[460px] sm:h-[460px] lg:w-[520px] lg:h-[520px] rounded-full border border-cyan-400/25 border-dashed animate-spin" 
          style={{ animationDuration: '60s' }}
        >
          {/* Orbit Bead 1 */}
          <div className="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-cyan-300 shadow-[0_0_12px_#00f2fe]" />
          {/* Orbit Bead 2 */}
          <div className="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-2.5 h-2.5 rounded-full bg-purple-400 shadow-[0_0_10px_#c084fc]" />
        </div>

        {/* Middle Orbital Ring (Counter-Rotating) */}
        <div 
          className="absolute w-[270px] h-[270px] sm:w-[370px] sm:h-[370px] lg:w-[420px] lg:h-[420px] rounded-full border border-indigo-400/30 border-dotted animate-spin" 
          style={{ animationDuration: '40s', animationDirection: 'reverse' }}
        >
          {/* Counter Orbit Bead */}
          <div className="absolute top-1/2 -right-1.5 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-blue-400 shadow-[0_0_10px_#60a5fa]" />
        </div>

        {/* Inner HUD Tech Circle with Cardinal Reticle Brackets */}
        <div className="absolute w-[200px] h-[200px] sm:w-[280px] sm:h-[280px] lg:w-[320px] lg:h-[320px] rounded-full border border-cyan-300/20">
          <span className="absolute -top-1 left-1/2 -translate-x-1/2 w-4 h-0.5 bg-cyan-400/70" />
          <span className="absolute -bottom-1 left-1/2 -translate-x-1/2 w-4 h-0.5 bg-cyan-400/70" />
          <span className="absolute top-1/2 -left-1 -translate-y-1/2 w-0.5 h-4 bg-cyan-400/70" />
          <span className="absolute top-1/2 -right-1 -translate-y-1/2 w-0.5 h-4 bg-cyan-400/70" />
        </div>
      </div>

      {/* 3. Main Central 3D Quantum AI Core Artwork Container */}
      <motion.div 
        animate={{ y: [0, -10, 0] }}
        transition={{ duration: 6, repeat: Infinity, ease: "easeInOut" }}
        className="relative z-20 w-full max-w-[380px] sm:max-w-[460px] lg:max-w-[510px] rounded-2xl sm:rounded-3xl border border-cyan-400/40 bg-gradient-to-b from-slate-900/80 via-slate-950/90 to-[#030712]/95 backdrop-blur-xl shadow-[0_25px_60px_-15px_rgba(0,0,0,0.85),0_0_40px_rgba(6,182,212,0.3)] group overflow-hidden"
      >
        {/* Soft Metallic Glow Edge Top Reflection */}
        <div className="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-cyan-300/90 to-transparent z-10" />

        {/* Cyber HUD Corner Brackets */}
        <div className="absolute top-2.5 left-2.5 w-3 h-3 border-t-2 border-l-2 border-cyan-400/70 pointer-events-none z-10" />
        <div className="absolute top-2.5 right-2.5 w-3 h-3 border-t-2 border-r-2 border-cyan-400/70 pointer-events-none z-10" />
        <div className="absolute bottom-12 left-2.5 w-3 h-3 border-b-2 border-l-2 border-cyan-400/70 pointer-events-none z-10" />
        <div className="absolute bottom-12 right-2.5 w-3 h-3 border-b-2 border-r-2 border-cyan-400/70 pointer-events-none z-10" />

        {/* 3D Rendered Quantum AI Core Image (Complete, Uncropped & Fully Visible) */}
        <div className="relative w-full bg-slate-950/60 flex items-center justify-center p-2 sm:p-3 pt-3 sm:pt-4">
          {/* Subtle Ambient Pulse directly behind the orb */}
          <div className="absolute inset-0 m-auto w-48 sm:w-64 h-48 sm:h-64 bg-cyan-400/15 rounded-full blur-[50px] pointer-events-none animate-hero-pulse-glow" />

          <img 
            src="/images/hero-ai-3d-core.webp" 
            alt="3D Quantum AI Neural Core"
            width="550"
            height="310"
            loading="eager"
            decoding="async"
            className="w-full h-auto object-contain object-center transform group-hover:scale-105 transition-transform duration-700 ease-out drop-shadow-[0_0_30px_rgba(6,182,212,0.35)]"
          />
        </div>

        {/* Sleek Bottom Telemetry Status Bar */}
        <div className="px-3.5 sm:px-5 py-2.5 sm:py-3 bg-slate-950/95 border-t border-cyan-500/25 flex items-center justify-between text-xs font-mono">
          <div className="flex items-center gap-2">
            <span className="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse shadow-[0_0_10px_rgba(52,211,153,0.9)]" />
            <span className="text-slate-200 font-semibold tracking-wide text-[11px] sm:text-xs">QUANTUM AI ENGINE ACTIVE</span>
          </div>
          <div className="flex items-center gap-1.5 text-cyan-300 text-[10px] sm:text-[11px]">
            <Sparkles className="w-3.5 h-3.5 text-cyan-400 animate-spin" style={{ animationDuration: '10s' }} />
            <span className="px-1.5 py-0.5 rounded bg-cyan-500/20 text-cyan-300 border border-cyan-400/30 font-bold">99.8% ACCURACY</span>
          </div>
        </div>
      </motion.div>

      {/* 4. Elegant 3D Floating Glassmorphism Satellite Card: Top-Left (AI Automation) */}
      <motion.div 
        animate={{ y: [0, -8, 0] }}
        transition={{ duration: 4.8, repeat: Infinity, ease: "easeInOut" }}
        className="absolute -top-3 left-0 sm:-top-6 sm:-left-4 lg:-left-6 z-30 flex items-center gap-2 sm:gap-3 px-2.5 py-1.5 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-slate-900/90 backdrop-blur-xl border border-cyan-400/40 shadow-[0_12px_32px_rgba(0,0,0,0.6),0_0_20px_rgba(6,182,212,0.25)] hover:border-cyan-300 transition-all text-left group/card"
      >
        <div className="w-7 h-7 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white shadow-[0_0_12px_rgba(6,182,212,0.5)]">
          <Bot className="w-3.5 h-3.5 sm:w-4.5 sm:h-4.5" />
        </div>
        <div>
          <div className="text-[11px] sm:text-xs font-bold text-white font-heading flex items-center gap-1">
            <span>AI Automation</span>
            <Sparkles className="w-3 h-3 text-cyan-300" />
          </div>
          <div className="text-[9px] sm:text-[10px] text-cyan-200/90 font-medium">Smart Bots & Workflows</div>
        </div>
      </motion.div>

      {/* 5. Elegant 3D Floating Glassmorphism Satellite Card: Top-Right (Enterprise Security) */}
      <motion.div 
        animate={{ y: [0, 8, 0] }}
        transition={{ duration: 5.2, repeat: Infinity, ease: "easeInOut", delay: 0.3 }}
        className="absolute -top-3 right-0 sm:-top-6 sm:-right-4 lg:-right-6 z-30 flex items-center gap-2 sm:gap-3 px-2.5 py-1.5 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-slate-900/90 backdrop-blur-xl border border-emerald-400/40 shadow-[0_12px_32px_rgba(0,0,0,0.6),0_0_20px_rgba(16,185,129,0.25)] hover:border-emerald-300 transition-all text-left group/card"
      >
        <div className="w-7 h-7 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-[0_0_12px_rgba(16,185,129,0.5)]">
          <ShieldCheck className="w-3.5 h-3.5 sm:w-4.5 sm:h-4.5" />
        </div>
        <div>
          <div className="text-[11px] sm:text-xs font-bold text-white font-heading">Enterprise Guard</div>
          <div className="text-[9px] sm:text-[10px] text-emerald-200/90 font-medium">100% NDA & Zero-Trust</div>
        </div>
      </motion.div>

      {/* 6. Elegant 3D Floating Glassmorphism Satellite Card: Bottom-Left (Software & Cloud) */}
      <motion.div 
        animate={{ y: [0, -7, 0] }}
        transition={{ duration: 5.6, repeat: Infinity, ease: "easeInOut", delay: 0.6 }}
        className="absolute -bottom-3 left-0 sm:-bottom-6 sm:-left-4 lg:-left-6 z-30 flex items-center gap-2 sm:gap-3 px-2.5 py-1.5 sm:px-4 sm:py-2.5 rounded-xl sm:rounded-2xl bg-slate-900/90 backdrop-blur-xl border border-indigo-400/40 shadow-[0_12px_32px_rgba(0,0,0,0.6),0_0_20px_rgba(99,102,241,0.25)] hover:border-indigo-300 transition-all text-left group/card"
      >
        <div className="w-7 h-7 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white shadow-[0_0_12px_rgba(99,102,241,0.5)]">
          <Code2 className="w-3.5 h-3.5 sm:w-4.5 sm:h-4.5" />
        </div>
        <div>
          <div className="text-[11px] sm:text-xs font-bold text-white font-heading">Software & Cloud</div>
          <div className="text-[9px] sm:text-[10px] text-indigo-200/90 font-medium">High-Speed Microservices</div>
        </div>
      </motion.div>

      {/* 7. Elegant 3D Floating Glassmorphism Satellite Card: Bottom-Right (Neural Performance) */}
      <motion.div 
        animate={{ y: [0, 7, 0] }}
        transition={{ duration: 5.0, repeat: Infinity, ease: "easeInOut", delay: 0.9 }}
        className="absolute -bottom-3 right-0 sm:-bottom-5 sm:-right-3 lg:-right-5 z-30 flex items-center gap-2 sm:gap-2.5 px-2.5 py-1.5 sm:px-3.5 sm:py-2 rounded-xl sm:rounded-2xl bg-slate-900/90 backdrop-blur-xl border border-sky-400/40 shadow-[0_10px_28px_rgba(0,0,0,0.6),0_0_15px_rgba(56,189,248,0.25)] hover:border-sky-300 transition-all text-left group/card"
      >
        <div className="w-6 h-6 sm:w-8 sm:h-8 rounded-lg sm:rounded-xl bg-gradient-to-br from-sky-500 to-blue-600 flex items-center justify-center text-white shadow-[0_0_10px_rgba(56,189,248,0.5)]">
          <Zap className="w-3 h-3 sm:w-4 sm:h-4" />
        </div>
        <div>
          <div className="text-[10px] sm:text-xs font-mono font-bold text-sky-300 flex items-center gap-1">
            <span>&lt; 45ms Latency</span>
          </div>
          <div className="text-[9px] sm:text-[10px] text-slate-300 font-medium">High-Speed Architecture</div>
        </div>
      </motion.div>

    </div>
  );
}

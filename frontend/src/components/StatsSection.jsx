import React from 'react';
import { motion } from 'framer-motion';
import { Zap, ShieldCheck, Users, TrendingUp, Sparkles, Award } from 'lucide-react';
import AnimatedCounter from './AnimatedCounter';

export default function StatsSection() {
  const stats = [
    {
      value: "150+",
      label: "Enterprise Deployments",
      sublabel: "Across US, Europe & APAC",
      icon: Zap,
      gradient: "from-cyan-400 via-blue-400 to-indigo-400",
      accent: "rgba(6, 182, 212, 0.15)",
      border: "border-cyan-500/20 hover:border-cyan-400/50"
    },
    {
      value: "99.9%",
      label: "Enterprise Uptime & Cloud SLA",
      sublabel: "Dual-layer peer QA verification",
      icon: ShieldCheck,
      gradient: "from-blue-400 via-indigo-400 to-purple-400",
      accent: "rgba(59, 130, 246, 0.15)",
      border: "border-blue-500/20 hover:border-blue-400/50"
    },
    {
      value: "2,500+",
      label: "Engineers Trained & Placed",
      sublabel: "In AI/ML, Fullstack & Analytics",
      icon: Users,
      gradient: "from-indigo-400 via-purple-400 to-pink-400",
      accent: "rgba(99, 102, 241, 0.15)",
      border: "border-indigo-500/20 hover:border-indigo-400/50"
    },
    {
      value: "85%",
      label: "Operational Cost Reduction",
      sublabel: "Via autonomous RAG & n8n workflows",
      icon: TrendingUp,
      gradient: "from-purple-400 via-pink-400 to-rose-400",
      accent: "rgba(168, 85, 247, 0.15)",
      border: "border-purple-500/20 hover:border-purple-400/50"
    }
  ];

  return (
    <section className="py-16 relative overflow-hidden bg-navy-950/90 border-y border-slate-800/80">
      {/* Background ambient light */}
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,rgba(120,119,198,0.15),rgba(255,255,255,0))] pointer-events-none" />
      <div className="absolute top-1/2 left-1/4 -translate-y-1/2 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none" />
      <div className="absolute top-1/2 right-1/4 -translate-y-1/2 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <motion.div 
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
        >
          {stats.map((stat, idx) => {
            const Icon = stat.icon;
            return (
              <motion.div
                key={idx}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: idx * 0.1 }}
                whileHover={{ y: -6, transition: { duration: 0.2 } }}
                className={`relative p-6 rounded-3xl bg-slate-900/40 backdrop-blur-xl border ${stat.border} transition-all duration-300 group shadow-xl hover:shadow-2xl overflow-hidden`}
              >
                {/* Glow pill behind icon */}
                <div 
                  className="absolute top-0 right-0 w-32 h-32 rounded-full blur-2xl pointer-events-none transition-opacity duration-300 opacity-20 group-hover:opacity-40"
                  style={{ background: stat.accent }}
                />

                <div className="flex items-center justify-between mb-4">
                  <div className="w-12 h-12 rounded-2xl bg-navy-950/80 border border-slate-800 flex items-center justify-center text-cyan-400 group-hover:scale-110 group-hover:border-cyan-500/40 transition-all duration-300 shadow-inner">
                    <Icon className="w-6 h-6 text-cyan-400 group-hover:text-cyan-300 transition-colors" />
                  </div>
                  <span className="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-800/60 border border-slate-700/60 text-[10px] font-bold uppercase tracking-wider text-slate-300">
                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" />
                    <span>Verified</span>
                  </span>
                </div>

                <div className={`text-3xl sm:text-4xl font-black bg-gradient-to-r ${stat.gradient} bg-clip-text text-transparent tracking-tight`}>
                  <AnimatedCounter value={stat.value} duration={2} />
                </div>

                <div className="text-sm font-bold text-white mt-2 group-hover:text-cyan-200 transition-colors">
                  {stat.label}
                </div>

                <div className="text-xs text-slate-400 mt-1 leading-relaxed">
                  {stat.sublabel}
                </div>
              </motion.div>
            );
          })}
        </motion.div>
      </div>
    </section>
  );
}

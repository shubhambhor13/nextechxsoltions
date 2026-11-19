import React, { useState, useEffect, useRef } from 'react';
import { Award, Bot, BookOpen, ShieldCheck, TrendingUp, CheckCircle2 } from 'lucide-react';

function CounterItem({ end, suffix = "", prefix = "", duration = 1800, isDecimal = false }) {
  const [count, setCount] = useState(0);
  const [hasAnimated, setHasAnimated] = useState(false);
  const elementRef = useRef(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && !hasAnimated) {
          setHasAnimated(true);
        }
      },
      { threshold: 0.25 }
    );

    if (elementRef.current) {
      observer.observe(elementRef.current);
    }

    return () => observer.disconnect();
  }, [hasAnimated]);

  useEffect(() => {
    if (!hasAnimated) return;

    let startTime = null;
    let frameId;

    const animate = (currentTime) => {
      if (!startTime) startTime = currentTime;
      const progress = Math.min((currentTime - startTime) / duration, 1);
      
      // easeOutCubic
      const ease = 1 - Math.pow(1 - progress, 3);
      
      if (isDecimal) {
        setCount((ease * end).toFixed(1));
      } else {
        setCount(Math.floor(ease * end));
      }

      if (progress < 1) {
        frameId = requestAnimationFrame(animate);
      } else {
        setCount(isDecimal ? end.toFixed(1) : end);
      }
    };

    frameId = requestAnimationFrame(animate);
    return () => cancelAnimationFrame(frameId);
  }, [hasAnimated, end, duration, isDecimal]);

  return (
    <span ref={elementRef} className="font-extrabold text-slate-900 tracking-tight font-heading tabular-nums">
      {prefix}{count}{suffix}
    </span>
  );
}

export default function HomeStatistics() {
  const stats = [
    {
      id: 1,
      end: 100,
      suffix: "+",
      label: "Research Papers Published",
      subtext: "Scopus Q1/Q2, IEEE Xplore, Springer & UGC Care",
      icon: Award,
      color: "text-amber-600 bg-amber-50 border-amber-200",
      accent: "text-amber-600"
    },
    {
      id: 2,
      end: 50,
      suffix: "+",
      label: "AI & Automation Solutions",
      subtext: "Custom GPT-4o RAG agents & self-healing workflows",
      icon: Bot,
      color: "text-blue-600 bg-blue-50 border-blue-200",
      accent: "text-blue-600"
    },
    {
      id: 3,
      end: 100,
      suffix: "%",
      label: "End-to-End Publication Support",
      subtext: "Scope formulation, Turnitin < 10% & peer review",
      icon: BookOpen,
      color: "text-indigo-600 bg-indigo-50 border-indigo-200",
      accent: "text-indigo-600"
    },
    {
      id: 4,
      end: 99.9,
      suffix: "%",
      isDecimal: true,
      label: "Professional IT Services",
      subtext: "Cloud uptime, enterprise apps & 24/7 technical ops",
      icon: ShieldCheck,
      color: "text-emerald-600 bg-emerald-50 border-emerald-200",
      accent: "text-emerald-600"
    }
  ];

  return (
    <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 sm:-mt-10 mb-8 sm:mb-14">
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        {stats.map((stat) => {
          const Icon = stat.icon;
          return (
            <div
              key={stat.id}
              className="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between space-y-4 group text-left"
            >
              <div className="flex items-center justify-between">
                <div className={`p-3 rounded-2xl border ${stat.color} group-hover:scale-105 transition-transform`}>
                  <Icon className="w-6 h-6" />
                </div>
                <span className="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 px-2.5 py-1 rounded-full border border-slate-200 font-heading">
                  Verified Metric
                </span>
              </div>

              <div>
                <div className="text-3xl sm:text-5xl font-black">
                  <CounterItem 
                    end={stat.end} 
                    suffix={stat.suffix} 
                    isDecimal={stat.isDecimal} 
                  />
                </div>
                <h4 className="text-base sm:text-lg font-bold text-slate-900 mt-2 font-heading group-hover:text-blue-600 transition-colors">
                  {stat.label}
                </h4>
                <p className="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed font-normal">
                  {stat.subtext}
                </p>
              </div>

              <div className="pt-3 border-t border-slate-100 flex items-center gap-2 text-xs text-emerald-700 font-bold">
                <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0" />
                <span>Enterprise Verified Standard</span>
              </div>
            </div>
          );
        })}
      </div>
    </div>
  );
}

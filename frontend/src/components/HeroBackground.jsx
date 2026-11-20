import React, { useRef, useEffect } from 'react';

export default function HeroBackground() {
  const videoRef = useRef(null);

  useEffect(() => {
    if (videoRef.current) {
      videoRef.current.defaultMuted = true;
      videoRef.current.muted = true;
      videoRef.current.play().catch(() => {});
    }
  }, []);

  return (
    <div className="absolute inset-0 w-full h-full overflow-hidden pointer-events-none select-none z-0">
      
      {/* 1. Deep Cosmic Foundation Gradient */}
      <div className="absolute inset-0 bg-gradient-to-br from-[#030712] via-[#06122e] to-[#0a1845]" />

      {/* 2. Seamless Video Texture Layer (Synaptic Neural Pulses) */}
      <div className="absolute inset-0 w-full h-full overflow-hidden opacity-40 mix-blend-screen">
        <video
          ref={videoRef}
          autoPlay
          loop
          muted
          playsInline
          preload="metadata"
          poster="/images/hero-video-poster.webp"
          className="w-full h-full object-cover object-center scale-105 transform will-change-transform transition-opacity duration-1000"
        >
          <source src="/videos/hero-ai-network-mobile.mp4" type="video/mp4" media="(max-width: 768px)" />
          <source src="/videos/hero-ai-network.mp4" type="video/mp4" />
          <img 
            src="/images/hero-video-poster.webp" 
            alt="AI Neural Network Texture" 
            className="w-full h-full object-cover object-center opacity-30" 
          />
        </video>
      </div>

      {/* 3. Volumetric Glowing Nebulas & Atmospheric Electric Light Fields */}
      {/* Radiant Electric Cyan Bloom behind Illustration (Top Right) */}
      <div 
        className="absolute -top-24 right-0 w-[550px] sm:w-[700px] h-[550px] sm:h-[700px] bg-gradient-to-br from-cyan-400/25 via-blue-500/20 to-transparent rounded-full blur-[110px] animate-hero-pulse-glow" 
        style={{ animationDuration: '6s' }}
      />
      
      {/* Deep Electric Blue Energy Field (Center/Left) */}
      <div 
        className="absolute top-1/4 -left-24 w-[500px] sm:w-[650px] h-[500px] sm:h-[650px] bg-gradient-to-tr from-blue-600/25 via-indigo-600/15 to-transparent rounded-full blur-[120px]" 
      />

      {/* Futuristic Purple / Cyber Violet Accent (Bottom Center/Left) */}
      <div 
        className="absolute -bottom-32 left-1/4 w-[450px] sm:w-[580px] h-[450px] sm:h-[580px] bg-gradient-to-tl from-purple-600/20 via-fuchsia-600/10 to-transparent rounded-full blur-[115px] animate-hero-pulse-glow" 
        style={{ animationDuration: '8s', animationDelay: '2s' }}
      />

      {/* 4. Connected Cyber Neural Constellation & Data Lines (SVG Overlay) */}
      <svg 
        className="absolute inset-0 w-full h-full opacity-35" 
        xmlns="http://www.w3.org/2000/svg"
        aria-hidden="true"
      >
        <defs>
          <linearGradient id="cyberLineGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stopColor="#00f2fe" stopOpacity="0.6" />
            <stop offset="50%" stopColor="#3b82f6" stopOpacity="0.4" />
            <stop offset="100%" stopColor="#8b5cf6" stopOpacity="0" />
          </linearGradient>
          <linearGradient id="cyberLineGrad2" x1="100%" y1="0%" x2="0%" y2="100%">
            <stop offset="0%" stopColor="#38bdf8" stopOpacity="0.5" />
            <stop offset="100%" stopColor="#6366f1" stopOpacity="0.2" />
          </linearGradient>
          <filter id="cyberGlow" x="-20%" y="-20%" width="140%" height="140%">
            <feGaussianBlur stdDeviation="3" result="blur" />
            <feMerge>
              <feMergeNode in="blur" />
              <feMergeNode in="SourceGraphic" />
            </feMerge>
          </filter>
        </defs>

        {/* Network Synapse Interconnect Lines */}
        <g strokeWidth="1" className="hidden sm:block">
          <line x1="12%" y1="20%" x2="28%" y2="35%" stroke="url(#cyberLineGrad1)" strokeDasharray="4,4" className="animate-pulse" style={{ animationDuration: '4s' }} />
          <line x1="28%" y1="35%" x2="42%" y2="18%" stroke="url(#cyberLineGrad2)" />
          <line x1="42%" y1="18%" x2="65%" y2="30%" stroke="url(#cyberLineGrad1)" strokeDasharray="6,4" />
          <line x1="65%" y1="30%" x2="82%" y2="15%" stroke="url(#cyberLineGrad2)" />
          <line x1="65%" y1="30%" x2="75%" y2="55%" stroke="url(#cyberLineGrad1)" />
          <line x1="75%" y1="55%" x2="88%" y2="68%" stroke="url(#cyberLineGrad2)" strokeDasharray="3,3" />
          <line x1="28%" y1="35%" x2="35%" y2="65%" stroke="url(#cyberLineGrad2)" />
          <line x1="35%" y1="65%" x2="52%" y2="80%" stroke="url(#cyberLineGrad1)" strokeDasharray="5,5" />
          <line x1="52%" y1="80%" x2="75%" y2="55%" stroke="url(#cyberLineGrad2)" />
        </g>

        {/* Constellation Synapse Glowing Nodes */}
        <g filter="url(#cyberGlow)">
          <circle cx="12%" cy="20%" r="3.5" fill="#00f2fe" opacity="0.8" />
          <circle cx="28%" cy="35%" r="4.5" fill="#38bdf8" opacity="0.9" />
          <circle cx="42%" cy="18%" r="3" fill="#818cf8" opacity="0.7" />
          <circle cx="65%" cy="30%" r="5" fill="#00f2fe" opacity="0.95" />
          <circle cx="82%" cy="15%" r="3.5" fill="#38bdf8" opacity="0.8" />
          <circle cx="75%" cy="55%" r="4.5" fill="#a855f7" opacity="0.85" />
          <circle cx="88%" cy="68%" r="3" fill="#00f2fe" opacity="0.7" />
          <circle cx="35%" cy="65%" r="4" fill="#3b82f6" opacity="0.8" />
          <circle cx="52%" cy="80%" r="3.5" fill="#818cf8" opacity="0.75" />
        </g>
      </svg>

      {/* 5. Animated Shimmering Cyber Particles */}
      <div className="absolute inset-0 overflow-hidden">
        {[
          { top: '15%', left: '18%', size: 'w-1.5 h-1.5', color: 'bg-cyan-400', delay: '0s', dur: '7s' },
          { top: '35%', left: '8%', size: 'w-2 h-2', color: 'bg-blue-400', delay: '1.5s', dur: '8.5s' },
          { top: '65%', left: '22%', size: 'w-1 h-1', color: 'bg-indigo-300', delay: '3s', dur: '6s' },
          { top: '25%', left: '48%', size: 'w-1.5 h-1.5', color: 'bg-cyan-300', delay: '0.8s', dur: '9s' },
          { top: '75%', left: '42%', size: 'w-2 h-2', color: 'bg-purple-400', delay: '2.2s', dur: '7.5s' },
          { top: '18%', left: '72%', size: 'w-2 h-2', color: 'bg-cyan-400', delay: '1s', dur: '8s' },
          { top: '45%', left: '85%', size: 'w-1.5 h-1.5', color: 'bg-blue-300', delay: '3.5s', dur: '6.5s' },
          { top: '70%', left: '78%', size: 'w-1.5 h-1.5', color: 'bg-purple-300', delay: '2s', dur: '9.5s' },
          { top: '85%', left: '92%', size: 'w-1 h-1', color: 'bg-cyan-400', delay: '4s', dur: '7s' },
          { top: '55%', left: '60%', size: 'w-2 h-2', color: 'bg-sky-400', delay: '1.8s', dur: '8.2s' },
        ].map((p, idx) => (
          <div
            key={idx}
            className={`absolute rounded-full ${p.size} ${p.color} animate-hero-particle shadow-[0_0_8px_currentColor] pointer-events-none`}
            style={{
              top: p.top,
              left: p.left,
              animationDelay: p.delay,
              animationDuration: p.dur,
            }}
          />
        ))}
      </div>

      {/* 6. Subtle High-Tech Matrix Perspective Grid */}
      <div 
        className="absolute inset-0 opacity-25"
        style={{
          backgroundImage: `
            linear-gradient(to right, rgba(0, 242, 254, 0.08) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(59, 130, 246, 0.08) 1px, transparent 1px)
          `,
          backgroundSize: '40px 40px',
          maskImage: 'radial-gradient(ellipse 90% 75% at 50% 40%, #000 40%, transparent 100%)'
        }}
      />

      {/* 7. Directional Radial Scrim for High-Contrast Text Legibility */}
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_25%_45%,rgba(3,7,18,0.72)_0%,rgba(3,7,18,0.35)_60%,transparent_100%)] pointer-events-none" />

      {/* 8. Top & Bottom Subtle Cyber Horizon Edge Fade */}
      <div className="absolute top-0 inset-x-0 h-16 bg-gradient-to-b from-[#030712] to-transparent pointer-events-none" />
      <div className="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-[#030712] to-transparent pointer-events-none" />

    </div>
  );
}

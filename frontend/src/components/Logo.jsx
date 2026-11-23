import React from 'react';
import { siteConfig } from '../config/siteConfig';

export default function Logo({ 
  size = 'md', 
  showText = true, 
  variant = 'light', 
  className = '',
  showTagline = true 
}) {
  const isDark = variant === 'dark';

  // Responsive sizing presets for the official circular badge
  const badgeSizeClasses = {
    sm: 'w-8 h-8 sm:w-8.5 sm:h-8.5',
    md: 'w-9 h-9 sm:w-10 sm:h-10 xl:w-10.5 xl:h-10.5',
    lg: 'w-12 h-12 sm:w-13 sm:h-13',
    xl: 'w-16 h-16 sm:w-20 sm:h-20'
  };

  const textSizes = {
    sm: {
      brand: 'text-sm sm:text-base',
      tagline: 'text-[7.5px] sm:text-[8px]'
    },
    md: {
      brand: 'text-[15px] sm:text-base xl:text-lg',
      tagline: 'text-[8px] sm:text-[8.5px] xl:text-[9.5px]'
    },
    lg: {
      brand: 'text-lg sm:text-xl xl:text-2xl',
      tagline: 'text-[10px] sm:text-xs'
    },
    xl: {
      brand: 'text-2xl sm:text-3xl',
      tagline: 'text-xs sm:text-sm'
    }
  };

  const currentBadgeSize = badgeSizeClasses[size] || badgeSizeClasses.md;
  const currentTextSize = textSizes[size] || textSizes.md;

  // Use the optimized NexTechX emblem badge
  const badgeSrc = isDark 
    ? '/images/nextechx-badge-dark.webp' 
    : '/images/nextechx-badge.webp';

  return (
    <div className={`inline-flex items-center gap-2 sm:gap-2.5 select-none transition-transform duration-200 group-hover:scale-[1.02] ${className}`}>
      {/* Official NexTechX 3D Emblem Badge */}
      <img 
        src={badgeSrc} 
        alt={`${siteConfig.companyName} Emblem`}
        className={`${currentBadgeSize} object-contain shrink-0 drop-shadow-[0_0_8px_rgba(6,182,212,0.3)] rounded-full`}
        loading="eager"
        decoding="async"
        width="40"
        height="40"
      />

      {/* Brand Typography */}
      {showText && (
        <div className="text-left flex flex-col justify-center min-w-0">
          <div className={`flex items-center font-heading font-black tracking-tight leading-none whitespace-nowrap ${currentTextSize.brand}`}>
            <span className={isDark ? 'text-white' : 'text-slate-900'}>
              NexTech
            </span>
            <span className="text-cyan-500 ml-0.5">
              X
            </span>
            <span className={`ml-1 font-bold ${isDark ? 'text-cyan-400' : 'text-blue-600'}`}>
              Solutions
            </span>
          </div>

          {showTagline && (
            <p className={`whitespace-nowrap tracking-wider font-bold uppercase font-heading mt-0.5 hidden sm:block ${currentTextSize.tagline} ${isDark ? 'text-cyan-400/90' : 'text-slate-500'}`}>
              {siteConfig.tagline}
            </p>
          )}
        </div>
      )}
    </div>
  );
}


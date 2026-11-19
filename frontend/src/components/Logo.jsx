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
    sm: 'w-7 h-7 sm:w-8 sm:h-8',
    md: 'w-8 h-8 sm:w-9 sm:h-9 xl:w-10 xl:h-10',
    lg: 'w-11 h-11 sm:w-13 sm:h-13',
    xl: 'w-14 h-14 sm:w-16 sm:h-16'
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

  // Use the new NextTechX emblem badge
  const badgeSrc = isDark 
    ? '/images/nexttechx-badge-dark.png' 
    : '/images/nexttechx-badge.png';

  return (
    <div className={`inline-flex items-center gap-2 sm:gap-2.5 select-none transition-transform duration-200 group-hover:scale-[1.02] ${className}`}>
      {/* Official NextTechX 3D Emblem Badge */}
      <img 
        src={badgeSrc} 
        alt={`${siteConfig.companyName} Emblem`}
        className={`${currentBadgeSize} object-contain shrink-0 drop-shadow-sm rounded-full`}
        loading="eager"
        decoding="async"
      />

      {/* Brand Typography */}
      {showText && (
        <div className="text-left flex flex-col justify-center">
          <div className={`flex items-center font-heading font-black tracking-tight leading-none whitespace-nowrap ${currentTextSize.brand}`}>
            <span className={isDark ? 'text-white' : 'text-slate-900'}>
              NextTech
            </span>
            <span className="text-cyan-500 ml-0.5">
              X
            </span>
            <span className={`ml-1 font-bold ${isDark ? 'text-cyan-400' : 'text-blue-600'}`}>
              Solutions
            </span>
          </div>

          {showTagline && (
            <p className={`whitespace-nowrap tracking-wider font-bold uppercase font-heading mt-0.5 ${currentTextSize.tagline} ${isDark ? 'text-cyan-400/90' : 'text-slate-500'}`}>
              {siteConfig.tagline}
            </p>
          )}
        </div>
      )}
    </div>
  );
}


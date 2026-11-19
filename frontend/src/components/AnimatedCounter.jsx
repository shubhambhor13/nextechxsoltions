import React, { useEffect, useState, useRef } from 'react';
import { useInView } from 'framer-motion';

export default function AnimatedCounter({ value, duration = 1.8 }) {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-50px' });
  const [displayValue, setDisplayValue] = useState(0);

  // Parse numeric part and suffix (e.g., "150+" -> num: 150, suffix: "+", "99.85%" -> num: 99.85, suffix: "%")
  const numericMatch = value.match(/([\d,.]+)/);
  const rawNumber = numericMatch ? parseFloat(numericMatch[0].replace(/,/g, '')) : 0;
  const isDecimal = numericMatch && numericMatch[0].includes('.');
  const prefix = value.substring(0, value.indexOf(numericMatch ? numericMatch[0] : ''));
  const suffix = value.substring((value.indexOf(numericMatch ? numericMatch[0] : '') || 0) + (numericMatch ? numericMatch[0].length : 0));

  useEffect(() => {
    if (!isInView) return;

    let startTime = null;
    let animationFrame = null;

    const step = (timestamp) => {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / (duration * 1000), 1);
      // Ease out cubic
      const easeProgress = 1 - Math.pow(1 - progress, 3);
      const current = easeProgress * rawNumber;

      setDisplayValue(isDecimal ? current.toFixed(2) : Math.floor(current).toLocaleString());

      if (progress < 1) {
        animationFrame = requestAnimationFrame(step);
      } else {
        setDisplayValue(isDecimal ? rawNumber.toFixed(2) : rawNumber.toLocaleString());
      }
    };

    animationFrame = requestAnimationFrame(step);
    return () => cancelAnimationFrame(animationFrame);
  }, [isInView, rawNumber, duration, isDecimal]);

  return (
    <span ref={ref} className="tabular-nums">
      {prefix}{displayValue}{suffix}
    </span>
  );
}


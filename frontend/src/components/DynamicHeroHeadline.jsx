import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

export default function DynamicHeroHeadline() {
  const phrases = [
    "Autonomous Future",
    "Intelligent AI Agents",
    "Enterprise n8n Pipelines",
    "High-Precision Vision Data",
    "Scalable Cloud Systems"
  ];

  const [currentIndex, setCurrentIndex] = useState(0);

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentIndex((prev) => (prev + 1) % phrases.length);
    }, 3200);
    return () => clearInterval(timer);
  }, [phrases.length]);

  return (
    <h1 className="text-4xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight leading-[1.15]">
      Architecting the <br />
      <span className="inline-block relative min-h-[1.25em]">
        <AnimatePresence mode="wait">
          <motion.span
            key={currentIndex}
            initial={{ opacity: 0, y: 20, filter: 'blur(8px)' }}
            animate={{ opacity: 1, y: 0, filter: 'blur(0px)' }}
            exit={{ opacity: 0, y: -20, filter: 'blur(8px)' }}
            transition={{ duration: 0.5, ease: 'easeOut' }}
            className="inline-block bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400 bg-clip-text text-transparent font-black"
          >
            {phrases[currentIndex]}
          </motion.span>
        </AnimatePresence>
      </span> <br />
      of Enterprise Tech.
    </h1>
  );
}


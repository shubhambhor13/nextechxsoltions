/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        navy: {
          950: '#060913',
          900: '#0a0f1e',
          850: '#0e162c',
          800: '#131e3d',
          700: '#1e2c56',
        },
        electric: {
          cyan: '#00f2fe',
          blue: '#4facfe',
          violet: '#8a2be2',
          purple: '#9d4edd',
        }
      },
      fontFamily: {
        heading: ['Manrope', 'sans-serif'],
        sans: ['Inter', 'Plus Jakarta Sans', 'system-ui', 'sans-serif'],
        mono: ['JetBrains Mono', 'Fira Code', 'monospace']
      },
      fontSize: {
        '2xs': ['0.8rem', { lineHeight: '1.25rem' }],
        'xs': ['0.875rem', { lineHeight: '1.35rem' }],
        'sm': ['1rem', { lineHeight: '1.5rem' }],
        'base': ['1.125rem', { lineHeight: '1.75rem' }],
        'lg': ['1.25rem', { lineHeight: '1.85rem' }],
        'xl': ['1.4rem', { lineHeight: '2rem' }],
        '2xl': ['1.75rem', { lineHeight: '2.25rem' }],
        '3xl': ['2.2rem', { lineHeight: '2.6rem' }],
        '4xl': ['2.75rem', { lineHeight: '3.1rem' }],
        '5xl': ['3.5rem', { lineHeight: '1.15' }],
        '6xl': ['4.25rem', { lineHeight: '1.1' }],
        '7xl': ['5.25rem', { lineHeight: '1.05' }],
      },
      animation: {
        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'float-slow': 'float 6s ease-in-out infinite',
        'glow-pulse': 'glow 3s ease-in-out infinite alternate',
        'marquee': 'marquee 68s linear infinite',
        'marquee-fast': 'marquee 50s linear infinite',
        'marquee-slow': 'marquee 90s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-12px)' },
        },
        glow: {
          '0%': { opacity: '0.4', filter: 'blur(20px)' },
          '100%': { opacity: '0.8', filter: 'blur(30px)' },
        },
        marquee: {
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-50%)' },
        },
        'marquee-reverse': {
          '0%': { transform: 'translateX(-50%)' },
          '100%': { transform: 'translateX(0%)' },
        }
      },
      backgroundImage: {
        'radial-glow': 'radial-gradient(circle at 50% 0%, rgba(59, 130, 246, 0.18) 0%, rgba(139, 92, 246, 0.12) 40%, transparent 75%)',
        'grid-pattern': 'linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px), linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px)',
      }
    },
  },
  plugins: [],
}


import React, { useState, useEffect, useRef } from 'react';
import { Link, useLocation, useNavigate } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import { siteConfig } from '../config/siteConfig';
import Logo from './Logo';
import { 
  Cpu, 
  Menu, 
  X, 
  ChevronRight, 
  ChevronDown, 
  ShieldCheck, 
  Bot, 
  Layers, 
  Code2,
  BookOpen,
  GraduationCap,
  Sparkles,
  ArrowRight,
  Briefcase
} from 'lucide-react';

export default function Navbar({ onOpenQuote, onOpenConsultation }) {
  const [isOpen, setIsOpen] = useState(false);
  const [servicesDropdownOpen, setServicesDropdownOpen] = useState(false);
  const [mobileServicesOpen, setMobileServicesOpen] = useState(true);
  const [scrolled, setScrolled] = useState(false);
  const [activeSection, setActiveSection] = useState('hero');
  
  const location = useLocation();
  const navigate = useNavigate();
  const dropdownRef = useRef(null);

  // Detect scroll offset for sticky header shadow
  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 15);
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  // Close mobile & dropdown menus on route change
  useEffect(() => {
    setIsOpen(false);
    setServicesDropdownOpen(false);
  }, [location.pathname]);

  // Click outside listener for Services dropdown
  useEffect(() => {
    const handleClickOutside = (event) => {
      if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
        setServicesDropdownOpen(false);
      }
    };
    document.addEventListener('mousedown', handleClickOutside);
    return () => document.removeEventListener('mousedown', handleClickOutside);
  }, []);

  // SCROLL-SPY: Track active section on homepage accurately with IntersectionObserver & Viewport Geometry
  useEffect(() => {
    if (location.pathname !== '/') return;

    const sectionIds = ['hero', 'about', 'services', 'careers', 'contact'];

    // Header height offset: 105px fixed navbar + announcement bar buffer
    const HEADER_OFFSET = 115;

    const updateActiveSection = () => {
      // 1. When in the top area of the page, Home is strictly active by default
      if (window.scrollY < 150) {
        setActiveSection('hero');
        return;
      }

      // 2. Contact Us is active ONLY when the Contact section is genuinely visible in the viewport
      const contactEl = document.getElementById('contact');
      if (contactEl) {
        const cRect = contactEl.getBoundingClientRect();
        const isAtBottom = window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 50;
        if (cRect.top <= HEADER_OFFSET + 80 || (isAtBottom && cRect.top < window.innerHeight)) {
          setActiveSection('contact');
          return;
        }
      }

      // 3. For hero, about, services, internship: find which section currently spans the reading focal line
      for (let i = 0; i < sectionIds.length - 1; i++) {
        const id = sectionIds[i];
        const el = document.getElementById(id);
        if (el) {
          const rect = el.getBoundingClientRect();
          if (rect.top <= HEADER_OFFSET && rect.bottom > HEADER_OFFSET) {
            setActiveSection(id);
            return;
          }
        }
      }
    };

    // Ensure Home is active on initial mount
    updateActiveSection();

    // Use IntersectionObserver with rootMargin matching the sticky header
    const observer = new IntersectionObserver(
      () => {
        updateActiveSection();
      },
      {
        root: null,
        rootMargin: '-85px 0px -40% 0px',
        threshold: [0, 0.2, 0.5]
      }
    );

    sectionIds.forEach((id) => {
      const el = document.getElementById(id);
      if (el) observer.observe(el);
    });

    window.addEventListener('scroll', updateActiveSection, { passive: true });
    window.addEventListener('resize', updateActiveSection, { passive: true });

    // Double check after fonts and images render
    const timer = setTimeout(updateActiveSection, 100);

    return () => {
      observer.disconnect();
      window.removeEventListener('scroll', updateActiveSection);
      window.removeEventListener('resize', updateActiveSection);
      clearTimeout(timer);
    };
  }, [location.pathname]);

  const serviceSubItems = [
    {
      name: 'AI Automation Solutions',
      path: '/ai-automation',
      desc: 'Autonomous GPT-4o RAG Agents, WhatsApp & n8n Workflows',
      icon: Bot,
      color: 'text-blue-600 bg-blue-50 border border-blue-200'
    },
    {
      name: 'Software & Web Development',
      path: '/it-services',
      desc: 'Enterprise Web Applications, Microservices & Cloud DevOps',
      icon: Code2,
      color: 'text-purple-600 bg-purple-50 border border-purple-200'
    },
    {
      name: 'Research Paper Publication',
      path: '/research-publication',
      desc: 'Scopus, IEEE, Springer & UGC-CARE Indexed Advisory',
      icon: BookOpen,
      color: 'text-amber-600 bg-amber-50 border border-amber-200'
    },
    {
      name: 'Careers & Internships',
      path: '/careers',
      desc: 'Technical Internships, Live Projects & Career Growth',
      icon: Briefcase,
      color: 'text-cyan-600 bg-cyan-50 border border-cyan-200'
    }
  ];

  const isServicesActiveRoute = [
    '/services',
    '/ai-automation', 
    '/it-services', 
    '/research-publication'
  ].includes(location.pathname);

  // Smooth scroll handler that accurately accounts for sticky header height
  const handleNavClick = (target) => {
    if (target === 'hero' || target === 'home') {
      if (location.pathname === '/') {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        setActiveSection('hero');
      } else {
        navigate('/');
      }
    } else if (target === 'about') {
      if (location.pathname === '/') {
        const el = document.getElementById('about');
        if (el) {
          const headerOffset = 105;
          const pos = el.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({ top: pos, behavior: 'smooth' });
          setActiveSection('about');
        }
      } else {
        navigate('/about');
      }
    } else if (target === 'services') {
      if (location.pathname === '/') {
        const el = document.getElementById('services');
        if (el) {
          const headerOffset = 105;
          const pos = el.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({ top: pos, behavior: 'smooth' });
          setActiveSection('services');
        }
      } else {
        navigate('/#services');
      }
    } else if (target === 'careers' || target === 'internship') {
      navigate('/careers');
    } else if (target === 'contact') {
      if (location.pathname === '/') {
        const el = document.getElementById('contact');
        if (el) {
          const headerOffset = 105;
          const pos = el.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({ top: pos, behavior: 'smooth' });
          setActiveSection('contact');
        }
      } else {
        navigate('/contact');
      }
    }
    setIsOpen(false);
  };

  // Determine active highlights based on route or scroll-spy (Home active by default, Contact only when visible)
  const isHomeActive = location.pathname === '/' && activeSection === 'hero';
  const isAboutActive = location.pathname === '/about' || (location.pathname === '/' && activeSection === 'about');
  const isServicesActive = isServicesActiveRoute || (location.pathname === '/' && activeSection === 'services');
  const isPortfolioActive = location.pathname === '/portfolio' || location.pathname === '/our-work';
  const isIndustriesActive = location.pathname === '/industries' || location.pathname === '/industries-we-serve';
  const isHowWeWorkActive = location.pathname === '/how-we-work' || location.pathname === '/methodology';
  const isFaqsActive = location.pathname === '/faqs' || location.pathname === '/faq';
  const isCareersActive = location.pathname === '/careers' || location.pathname === '/internship' || (location.pathname === '/' && (activeSection === 'careers' || activeSection === 'internship'));
  const isContactActive = (location.pathname === '/contact' || (location.pathname === '/' && activeSection === 'contact')) && activeSection !== 'hero';

  return (
    <>
      {/* 1. Permanently Fixed Top Header Container */}
      <div 
        id="main-fixed-navbar"
        className="fixed top-0 left-0 right-0 z-50 w-full transition-all duration-300"
      >
        {/* Main Clean White Header */}
        <header 
          className={`w-full transition-all duration-300 ${
            scrolled 
              ? 'bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-md shadow-slate-900/5 py-3' 
              : 'bg-white/95 backdrop-blur-sm border-b border-slate-200/80 py-3.5 sm:py-4'
          }`}
        >
        <div className="max-w-7xl mx-auto px-2 sm:px-4 lg:px-4 xl:px-8 flex items-center justify-between gap-1.5 xl:gap-6">
          
          {/* Brand Logo */}
          <Link to="/" className="group shrink-0 mr-1 sm:mr-3 lg:mr-2 xl:mr-5">
            <Logo size="md" variant="light" showTagline={true} />
          </Link>

          {/* Desktop Nav Links with Scroll-Spy Active Indicators */}
          <nav className="hidden lg:flex items-center gap-0.5 xl:gap-1.5">
            
            {/* 1. Home */}
            <Link
              to="/"
              onClick={() => {
                if (location.pathname === '/') {
                  window.scrollTo({ top: 0, behavior: 'smooth' });
                }
              }}
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isHomeActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>Home</span>
              {isHomeActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 2. About Us */}
            <Link
              to="/about"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isAboutActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>About Us</span>
              {isAboutActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 3. Services Dropdown */}
            <div 
              ref={dropdownRef}
              className="relative"
              onMouseEnter={() => setServicesDropdownOpen(true)}
              onMouseLeave={() => setServicesDropdownOpen(false)}
            >
              <button
                type="button"
                onClick={(e) => {
                  e.preventDefault();
                  setServicesDropdownOpen(prev => !prev);
                }}
                className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap flex items-center gap-1 ${
                  isServicesActive
                    ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                    : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
                }`}
                aria-haspopup="true"
                aria-expanded={servicesDropdownOpen}
              >
                <span>Services</span>
                <ChevronDown className={`w-3.5 h-3.5 transition-transform duration-200 ${servicesDropdownOpen ? 'rotate-180 text-blue-600' : 'text-slate-400'}`} />
                {isServicesActive && (
                  <motion.span 
                    layoutId="activeNavPill"
                    className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                    transition={{ type: "spring", stiffness: 380, damping: 30 }}
                  />
                )}
              </button>

              {/* Animated Services Dropdown Menu */}
              <AnimatePresence>
                {servicesDropdownOpen && (
                  <motion.div
                    initial={{ opacity: 0, y: 10, scale: 0.97 }}
                    animate={{ opacity: 1, y: 0, scale: 1 }}
                    exit={{ opacity: 0, y: 8, scale: 0.97 }}
                    transition={{ duration: 0.18, ease: "easeOut" }}
                    className="absolute top-full left-0 mt-2 w-[440px] sm:w-[480px] rounded-2xl bg-white border border-slate-200 shadow-2xl p-3 z-50 divide-y divide-slate-100"
                  >
                    <div className="px-3.5 py-2.5 flex items-center justify-between">
                      <div className="flex items-center gap-2">
                        <Sparkles className="w-4 h-4 text-blue-600" />
                        <span className="text-xs font-bold uppercase tracking-wider text-slate-500 font-heading">
                          Core Enterprise Practices
                        </span>
                      </div>
                      <span className="text-xs font-semibold text-blue-600">Enterprise Practices</span>
                    </div>

                    <div className="py-2 space-y-1.5">
                      {serviceSubItems.map((item) => {
                        const Icon = item.icon;
                        const isSubActive = location.pathname === item.path;
                        return (
                          <Link
                            key={item.path}
                            to={item.path}
                            onClick={() => setServicesDropdownOpen(false)}
                            className={`flex items-start gap-3.5 p-3 rounded-xl transition-all group ${
                              isSubActive
                                ? 'bg-blue-50/90 text-blue-700'
                                : 'text-slate-800 hover:bg-slate-50 hover:text-blue-600'
                            }`}
                          >
                            <div className={`p-2.5 rounded-xl shrink-0 ${item.color} group-hover:scale-105 transition-transform`}>
                              <Icon className="w-5 h-5" />
                            </div>
                            <div className="flex-1 min-w-0">
                              <div className="flex items-center justify-between gap-2">
                                <span className="text-sm font-bold text-slate-900 group-hover:text-blue-600 font-heading truncate">
                                  {item.name}
                                </span>
                                <ChevronRight className="w-4 h-4 text-slate-300 group-hover:text-blue-600 group-hover:translate-x-0.5 transition-all shrink-0" />
                              </div>
                              <p className="text-xs text-slate-500 mt-0.5 leading-relaxed line-clamp-1">
                                {item.desc}
                              </p>
                            </div>
                          </Link>
                        );
                      })}
                    </div>

                    <div className="pt-2 px-1">
                      <Link
                        to="/services"
                        onClick={() => setServicesDropdownOpen(false)}
                        className="w-full py-2.5 px-3 rounded-xl bg-slate-50 hover:bg-blue-50 text-blue-600 hover:text-blue-700 text-xs font-bold flex items-center justify-center gap-2 transition-colors font-heading"
                      >
                        <span>Explore All Services</span>
                        <ArrowRight className="w-3.5 h-3.5" />
                      </Link>
                    </div>
                  </motion.div>
                )}
              </AnimatePresence>
            </div>

            {/* 4. Portfolio / Our Work */}
            <Link
              to="/portfolio"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isPortfolioActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>Portfolio</span>
              {isPortfolioActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 5. Industries We Serve */}
            <Link
              to="/industries"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isIndustriesActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>Industries</span>
              {isIndustriesActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 6. How We Work */}
            <Link
              to="/how-we-work"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isHowWeWorkActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>How We Work</span>
              {isHowWeWorkActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 7. FAQs */}
            <Link
              to="/faqs"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isFaqsActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>FAQs</span>
              {isFaqsActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 8. Careers */}
            <Link
              to="/careers"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isCareersActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>Careers</span>
              {isCareersActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

            {/* 9. Contact Us */}
            <Link
              to="/contact"
              className={`relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap ${
                isContactActive
                  ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs'
                  : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50'
              }`}
            >
              <span>Contact Us</span>
              {isContactActive && (
                <motion.span 
                  layoutId="activeNavPill"
                  className="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"
                  transition={{ type: "spring", stiffness: 380, damping: 30 }}
                />
              )}
            </Link>

          </nav>

          {/* Action CTAs: 6. Get a Quote Button */}
          <div className="hidden lg:flex items-center gap-1.5 xl:gap-3 shrink-0">
            <button
              onClick={onOpenQuote}
              className="px-3 lg:px-3.5 xl:px-5 py-2 xl:py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs lg:text-xs xl:text-sm font-bold shadow-sm transition-all hover:shadow active:scale-95 flex items-center gap-1 xl:gap-1.5 font-heading shrink-0 whitespace-nowrap"
            >
              <span>Get a Quote</span>
              <ChevronRight className="w-3.5 h-3.5 text-blue-200" />
            </button>
          </div>

          {/* Mobile Menu Button */}
          <div className="flex items-center gap-2 lg:hidden">
            <button
              onClick={onOpenQuote}
              className="text-xs font-semibold px-3 py-1.5 rounded-lg bg-blue-600 text-white shadow-sm font-heading"
            >
              Get a Quote
            </button>
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="p-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors"
              aria-label="Toggle Menu"
            >
              {isOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>

        </div>

        {/* Mobile Navigation Drawer */}
        <AnimatePresence>
          {isOpen && (
            <motion.div
              initial={{ opacity: 0, height: 0 }}
              animate={{ opacity: 1, height: 'auto' }}
              exit={{ opacity: 0, height: 0 }}
              className="lg:hidden border-t border-slate-200 bg-white/95 backdrop-blur-md px-5 pt-4 pb-8 space-y-2.5 shadow-2xl max-h-[calc(100vh-80px)] overflow-y-auto"
            >
              <Link
                to="/"
                onClick={() => {
                  setIsOpen(false);
                  window.scrollTo({ top: 0, behavior: 'smooth' });
                }}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isHomeActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                Home
              </Link>
              
              <Link
                to="/about"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isAboutActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                About Us
              </Link>

              {/* Mobile Services Submenu */}
              <div>
                <button
                  onClick={() => setMobileServicesOpen(!mobileServicesOpen)}
                  className={`w-full flex items-center justify-between px-4 py-3 rounded-xl text-base font-semibold ${
                    isServicesActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                  }`}
                >
                  <span>Services</span>
                  <ChevronDown className={`w-4 h-4 transition-transform ${mobileServicesOpen ? 'rotate-180 text-blue-600' : 'text-slate-400'}`} />
                </button>
                {mobileServicesOpen && (
                  <div className="pl-4 pr-3 py-2 space-y-2 bg-slate-50 rounded-2xl mt-1.5 border border-slate-100">
                    {serviceSubItems.map((item) => (
                      <Link
                        key={item.path}
                        to={item.path}
                        onClick={() => setIsOpen(false)}
                        className={`block px-3.5 py-2.5 rounded-xl text-sm font-bold ${
                          location.pathname === item.path ? 'text-blue-600 bg-white shadow-xs' : 'text-slate-700 hover:text-blue-600'
                        }`}
                      >
                        {item.name}
                      </Link>
                    ))}
                    <Link
                      to="/services"
                      onClick={() => setIsOpen(false)}
                      className="block px-3.5 py-2.5 rounded-xl text-sm font-extrabold text-blue-600 bg-blue-50/80 hover:bg-blue-100"
                    >
                      Explore All Services →
                    </Link>
                  </div>
                )}
              </div>

              {/* Portfolio */}
              <Link
                to="/portfolio"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isPortfolioActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                Portfolio / Our Work
              </Link>

              {/* Industries */}
              <Link
                to="/industries"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isIndustriesActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                Industries We Serve
              </Link>

              {/* How We Work */}
              <Link
                to="/how-we-work"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isHowWeWorkActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                How We Work
              </Link>

              {/* FAQs */}
              <Link
                to="/faqs"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isFaqsActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                FAQs
              </Link>

              <Link
                to="/careers"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isCareersActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                Careers & Internships
              </Link>

              <Link
                to="/contact"
                onClick={() => setIsOpen(false)}
                className={`block w-full text-left px-4 py-3 rounded-xl text-base font-semibold ${
                  isContactActive ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50'
                }`}
              >
                Contact Us
              </Link>
            </motion.div>
          )}
        </AnimatePresence>

      </header>
    </div>

    {/* 2. Top Spacing Buffer: Guarantees the fixed header never overlaps page content */}
    <div 
      className="h-[105px] sm:h-[115px] w-full shrink-0 pointer-events-none" 
      aria-hidden="true" 
    />
  </>
);
}
import React, { useState, useEffect, Suspense, lazy } from 'react';
import { BrowserRouter, Routes, Route, Navigate, useLocation } from 'react-router-dom';
import { AnimatePresence, motion } from 'framer-motion';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import AIChatbot from './components/AIChatbot';
import QuotationModal from './components/QuotationModal';
import ConsultationModal from './components/ConsultationModal';
import StudentRegisterModal from './components/StudentRegisterModal';
import { siteConfig } from './config/siteConfig';

// Code-split route pages with React.lazy for instant mobile loading & optimal bundle chunking
const Home = lazy(() => import('./pages/Home'));
const AboutUs = lazy(() => import('./pages/AboutUs'));
const Services = lazy(() => import('./pages/Services'));
const ServiceDetail = lazy(() => import('./pages/ServiceDetail'));
const AIAutomation = lazy(() => import('./pages/AIAutomation'));
const ITServices = lazy(() => import('./pages/ITServices'));
const ResearchPublication = lazy(() => import('./pages/ResearchPublication'));
const Internship = lazy(() => import('./pages/Internship'));
const Careers = lazy(() => import('./pages/Careers'));
const Portfolio = lazy(() => import('./pages/Portfolio'));
const Industries = lazy(() => import('./pages/Industries'));
const HowWeWork = lazy(() => import('./pages/HowWeWork'));
const FAQs = lazy(() => import('./pages/FAQs'));
const ContactUs = lazy(() => import('./pages/ContactUs'));
const PrivacyPolicy = lazy(() => import('./pages/PrivacyPolicy'));
const AdminDashboard = lazy(() => import('./pages/AdminDashboard'));

// Ultra-lightweight Route Loading Skeleton
function PageLoading() {
  return (
    <div className="min-h-[55vh] flex items-center justify-center py-20 bg-white" aria-label="Loading page">
      <div className="flex flex-col items-center gap-3">
        <div className="w-9 h-9 border-3 border-blue-600/20 border-t-blue-600 rounded-full animate-spin" />
        <span className="text-xs font-semibold text-slate-500 font-mono tracking-wider uppercase">Loading NextTechX...</span>
      </div>
    </div>
  );
}

// Helper component to ensure every page starts from the top on navigation,
// while correctly preserving and offsetting anchor links (with sticky navbar clearance)
function ScrollToTop() {
  const { pathname, hash } = useLocation();

  useEffect(() => {
    // Disable native browser scroll restoration so navigating to a new route never restores old scroll positions
    if (typeof window !== 'undefined' && 'scrollRestoration' in window.history) {
      window.history.scrollRestoration = 'manual';
    }
  }, []);

  useEffect(() => {
    if (hash) {
      const targetId = hash.replace('#', '');
      let attempts = 0;
      const tryScroll = () => {
        const element = document.getElementById(targetId);
        if (element) {
          const headerOffset = 105;
          const elementPosition = element.getBoundingClientRect().top;
          const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
          window.scrollTo({ top: Math.max(0, offsetPosition), behavior: 'smooth' });
        } else if (attempts < 15) {
          attempts++;
          setTimeout(tryScroll, 70);
        }
      };
      const timer = setTimeout(tryScroll, 100);
      return () => clearTimeout(timer);
    } else {
      // Instant reset to absolute top (0, 0) across all document scrolling elements
      const snapToTop = () => {
        const html = document.documentElement;
        const originalBehavior = html.style.scrollBehavior;
        html.style.scrollBehavior = 'auto';
        window.scrollTo(0, 0);
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;
        html.style.scrollBehavior = originalBehavior;
      };

      snapToTop();
      const raf = requestAnimationFrame(snapToTop);
      const timer1 = setTimeout(snapToTop, 50);
      const timer2 = setTimeout(snapToTop, 220); // Fires immediately after page transitions complete

      return () => {
        cancelAnimationFrame(raf);
        clearTimeout(timer1);
        clearTimeout(timer2);
      };
    }
  }, [pathname, hash]);

  return null;
}

// Helper component for direct external redirects (e.g. /linkedin)
function ExternalRedirect({ to }) {
  useEffect(() => {
    if (typeof window !== 'undefined' && to) {
      window.location.href = to;
    }
  }, [to]);

  return (
    <div className="min-h-[55vh] flex flex-col items-center justify-center p-6 text-center bg-white" aria-label="Redirecting">
      <div className="w-9 h-9 border-3 border-blue-600/20 border-t-blue-600 rounded-full animate-spin mb-4" />
      <h2 className="text-lg font-bold text-slate-900 font-heading">Redirecting to LinkedIn...</h2>
      <p className="text-xs text-slate-500 mt-1 max-w-sm">
        Taking you to the official NextTechX Solutions company profile.
      </p>
      <a 
        href={to} 
        className="mt-4 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-colors inline-block"
      >
        Click here if not redirected automatically
      </a>
    </div>
  );
}

function AnimatedRoutes({
  onOpenQuote,
  onOpenConsultation,
  onOpenRegister,
  onSelectCourse
}) {
  const location = useLocation();

  const handleAnimationComplete = () => {
    // If route change does not target a specific hash, guarantee top position once animation completes
    if (!location.hash) {
      const html = document.documentElement;
      const originalBehavior = html.style.scrollBehavior;
      html.style.scrollBehavior = 'auto';
      window.scrollTo(0, 0);
      document.documentElement.scrollTop = 0;
      document.body.scrollTop = 0;
      html.style.scrollBehavior = originalBehavior;
    }
  };

  return (
    <AnimatePresence mode="wait">
      <motion.div
        key={location.pathname}
        initial={{ opacity: 0, y: 8 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: -8 }}
        transition={{ duration: 0.18, ease: "easeOut" }}
        onAnimationComplete={handleAnimationComplete}
      >
        <Suspense fallback={<PageLoading />}>
          <Routes location={location} key={location.pathname}>
          {/* 1. Home (Single-Page Landing with all core sections) */}
          <Route 
            path="/" 
            element={
              <Home 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
                onOpenRegister={onOpenRegister}
              />
            } 
          />

          {/* 2. About Us */}
          <Route 
            path="/about" 
            element={
              <AboutUs 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* 3. Dedicated Services Overview Page */}
          <Route 
            path="/services" 
            element={
              <Services 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/our-services" 
            element={<Navigate to="/services" replace />} 
          />

          {/* 5 Core Individual Service Detail Pages */}
          <Route 
            path="/services/ai-automation" 
            element={
              <ServiceDetail 
                serviceId="ai-automation"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/ai-automation" 
            element={
              <ServiceDetail 
                serviceId="ai-automation"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          <Route 
            path="/services/software-development" 
            element={
              <ServiceDetail 
                serviceId="software-development"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/software-development" 
            element={
              <ServiceDetail 
                serviceId="software-development"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          <Route 
            path="/services/saas-development" 
            element={
              <ServiceDetail 
                serviceId="saas-development"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/saas-development" 
            element={
              <ServiceDetail 
                serviceId="saas-development"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          <Route 
            path="/services/data-annotation" 
            element={
              <ServiceDetail 
                serviceId="data-annotation"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/data-annotation" 
            element={
              <ServiceDetail 
                serviceId="data-annotation"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          <Route 
            path="/services/bpo-services" 
            element={
              <ServiceDetail 
                serviceId="bpo-services"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/bpo-services" 
            element={
              <ServiceDetail 
                serviceId="bpo-services"
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          <Route 
            path="/services/:slug" 
            element={
              <ServiceDetail 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* Legacy IT Services Redirect */}
          <Route 
            path="/it-services" 
            element={<Navigate to="/services/software-development" replace />} 
          />
          <Route 
            path="/about-us" 
            element={<Navigate to="/about" replace />} 
          />
          <Route 
            path="/contact-us" 
            element={<Navigate to="/contact" replace />} 
          />
          <Route 
            path="/our-work" 
            element={<Navigate to="/portfolio" replace />} 
          />
          <Route 
            path="/work" 
            element={<Navigate to="/portfolio" replace />} 
          />
          {/* 4. Careers & Opportunities (Jobs & Internships) */}
          <Route 
            path="/careers" 
            element={
              <Careers 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* Legacy & Synonym Redirects */}
          <Route 
            path="/career" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/jobs" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/job" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/internship" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/internships" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/training" 
            element={<Navigate to="/careers" replace />} 
          />
          <Route 
            path="/training-internship" 
            element={<Navigate to="/careers" replace />} 
          />

          {/* 5. Our Work / Portfolio */}
          <Route 
            path="/portfolio" 
            element={
              <Portfolio 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* 6. Industries We Serve */}
          <Route 
            path="/industries" 
            element={
              <Industries 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/industries-we-serve" 
            element={<Navigate to="/industries" replace />} 
          />

          {/* 7. How We Work */}
          <Route 
            path="/how-we-work" 
            element={
              <HowWeWork 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/methodology" 
            element={<Navigate to="/how-we-work" replace />} 
          />

          {/* 8. FAQs */}
          <Route 
            path="/faqs" 
            element={
              <FAQs 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/faq" 
            element={<Navigate to="/faqs" replace />} 
          />

          {/* 9. Contact Us */}
          <Route 
            path="/contact" 
            element={
              <ContactUs 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* 10. Privacy Policy */}
          <Route 
            path="/privacy-policy" 
            element={
              <PrivacyPolicy 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/privacy" 
            element={<Navigate to="/privacy-policy" replace />} 
          />

          {/* External Social Redirects */}
          <Route 
            path="/linkedin" 
            element={<ExternalRedirect to={siteConfig.linkedinUrl || "https://www.linkedin.com/company/nextechx-solutions/"} />} 
          />
          <Route 
            path="/linkedin-company" 
            element={<ExternalRedirect to={siteConfig.linkedinUrl || "https://www.linkedin.com/company/nextechx-solutions/"} />} 
          />

          {/* Admin Management Portal */}
          <Route 
            path="/admin" 
            element={<AdminDashboard />} 
          />

          {/* Fallback 404 */}
          <Route 
            path="*" 
            element={
              <div className="min-h-[60vh] flex flex-col items-center justify-center text-center p-6 space-y-4">
                <h1 className="text-6xl font-black text-blue-600">404</h1>
                <h2 className="text-xl font-bold text-slate-900">Page Not Found</h2>
                <p className="text-xs text-slate-500 max-w-sm">
                  The requested page does not exist or has been relocated.
                </p>
                <a href="/" className="px-5 py-2.5 rounded-xl bg-blue-600 text-white font-semibold text-xs">
                  Return to Homepage
                </a>
              </div>
            } 
          />
        </Routes>
        </Suspense>
      </motion.div>
    </AnimatePresence>
  );
}

export default function App() {
  const [isQuoteOpen, setIsQuoteOpen] = useState(false);
  const [isConsultOpen, setIsConsultOpen] = useState(false);
  const [isRegisterOpen, setIsRegisterOpen] = useState(false);
  const [preselectedCourse, setPreselectedCourse] = useState('');

  const handleOpenRegisterWithCourse = (courseName) => {
    setPreselectedCourse(courseName || '');
    setIsRegisterOpen(true);
  };

  return (
    <BrowserRouter>
      <ScrollToTop />
      <div className="min-h-screen bg-white text-slate-900 flex flex-col font-sans selection:bg-blue-100 selection:text-blue-900 relative">
        
        {/* Navigation Bar */}
        <Navbar 
          onOpenQuote={() => setIsQuoteOpen(true)}
          onOpenConsultation={() => setIsConsultOpen(true)}
        />

        {/* Dynamic Animated Route View */}
        <main className="flex-1 relative z-10">
          <AnimatedRoutes
            onOpenQuote={() => setIsQuoteOpen(true)}
            onOpenConsultation={() => setIsConsultOpen(true)}
            onOpenRegister={() => setIsRegisterOpen(true)}
            onSelectCourse={handleOpenRegisterWithCourse}
          />
        </main>

        {/* Global Footer */}
        <Footer onOpenQuote={() => setIsQuoteOpen(true)} />

        {/* AI Website Assistant Widget */}
        <AIChatbot 
          onOpenQuote={() => setIsQuoteOpen(true)}
          onOpenConsultation={() => setIsConsultOpen(true)}
          onOpenRegister={() => setIsRegisterOpen(true)}
        />

        {/* Reusable Enterprise Modals */}
        <QuotationModal 
          isOpen={isQuoteOpen} 
          onClose={() => setIsQuoteOpen(false)} 
        />
        
        <ConsultationModal 
          isOpen={isConsultOpen} 
          onClose={() => setIsConsultOpen(false)} 
        />

        <StudentRegisterModal 
          isOpen={isRegisterOpen} 
          onClose={() => setIsRegisterOpen(false)}
          preselectedCourse={preselectedCourse}
        />

      </div>
    </BrowserRouter>
  );
}

import React, { useState, useEffect } from 'react';
import { BrowserRouter, Routes, Route, Navigate, useLocation } from 'react-router-dom';
import { AnimatePresence, motion } from 'framer-motion';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import AIChatbot from './components/AIChatbot';
import QuotationModal from './components/QuotationModal';
import ConsultationModal from './components/ConsultationModal';
import StudentRegisterModal from './components/StudentRegisterModal';

// Pages
import Home from './pages/Home';
import AboutUs from './pages/AboutUs';
import Services from './pages/Services';
import AIAutomation from './pages/AIAutomation';
import ITServices from './pages/ITServices';
import ResearchPublication from './pages/ResearchPublication';
import Internship from './pages/Internship';
import Careers from './pages/Careers';
import Portfolio from './pages/Portfolio';
import Industries from './pages/Industries';
import HowWeWork from './pages/HowWeWork';
import FAQs from './pages/FAQs';
import ContactUs from './pages/ContactUs';
import AdminDashboard from './pages/AdminDashboard';

// Helper component to scroll window to top on route change or to hash element with fixed header offset
function ScrollToTop() {
  const { pathname, hash } = useLocation();
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
          window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
        } else if (attempts < 10) {
          attempts++;
          setTimeout(tryScroll, 100);
        }
      };
      const timer = setTimeout(tryScroll, 150);
      return () => clearTimeout(timer);
    } else {
      window.scrollTo(0, 0);
    }
  }, [pathname, hash]);
  return null;
}

function AnimatedRoutes({
  onOpenQuote,
  onOpenConsultation,
  onOpenRegister,
  onSelectCourse
}) {
  const location = useLocation();

  return (
    <AnimatePresence mode="wait">
      <motion.div
        key={location.pathname}
        initial={{ opacity: 0, y: 8 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: -8 }}
        transition={{ duration: 0.2, ease: "easeOut" }}
      >
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

          {/* 3. Core Services Dedicated Detail Pages */}
          <Route 
            path="/ai-automation" 
            element={
              <AIAutomation 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/it-services" 
            element={
              <ITServices 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />
          <Route 
            path="/research-publication" 
            element={
              <ResearchPublication 
                onOpenQuote={onOpenQuote}
                onOpenConsultation={onOpenConsultation}
              />
            } 
          />

          {/* Dedicated Services Overview Page */}
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

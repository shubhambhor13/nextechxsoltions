import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { siteConfig } from '../config/siteConfig';
import Logo from './Logo';
import LegalModal from './LegalModal';
import { 
  Cpu, 
  Mail, 
  Phone, 
  ArrowRight, 
  CheckCircle2, 
  ShieldCheck, 
  Linkedin,
  Twitter,
  Github,
  Globe,
  ChevronRight,
  Sparkles
} from 'lucide-react';

export default function Footer({ onOpenQuote }) {
  const [newsletterEmail, setNewsletterEmail] = useState('');
  const [subscribed, setSubscribed] = useState(false);
  const [legalModalOpen, setLegalModalOpen] = useState(false);
  const [legalDocType, setLegalDocType] = useState('privacy');

  const openLegal = (type) => {
    setLegalDocType(type);
    setLegalModalOpen(true);
  };

  const handleSubscribe = (e) => {
    e.preventDefault();
    if (newsletterEmail.trim()) {
      setSubscribed(true);
      setTimeout(() => {
        setSubscribed(false);
        setNewsletterEmail('');
      }, 5000);
    }
  };

  return (
    <footer className="bg-gradient-to-b from-slate-950 via-slate-900 to-black text-slate-300 border-t border-slate-800/80 pt-16 pb-12 relative overflow-hidden">
      {/* Subtle Corporate Grid & Ambient Glow */}
      <div className="absolute inset-0 bg-grid-corporate opacity-5 pointer-events-none" />
      <div className="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {/* Top Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-6 xl:gap-10 pb-12 border-b border-slate-800/80 text-left">
          
          {/* Col 1 & 2: Brand & Mission */}
          <div className="lg:col-span-2 space-y-4">
            <Link to="/" className="inline-flex group">
              <Logo size="md" variant="dark" />
            </Link>

            <p className="text-sm text-slate-400 leading-relaxed max-w-sm font-normal">
              Engineering high-impact artificial intelligence, autonomous workflow pipelines, modern IT software, and scalable enterprise cloud solutions.
            </p>

            <div className="flex items-center gap-3 pt-1">
              <div className="flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-800/90 border border-slate-700/80 text-xs text-slate-300 font-mono">
                <ShieldCheck className="w-3.5 h-3.5 text-blue-400" />
                <span>ISO-Aligned Quality Standards</span>
              </div>
            </div>

            {/* Newsletter */}
            <div className="pt-2">
              <h4 className="text-xs font-bold text-slate-300 uppercase tracking-wider mb-2 font-heading">
                Subscribe to Technology Dispatch
              </h4>
              {subscribed ? (
                <div className="flex items-center gap-2 p-2.5 rounded-xl bg-emerald-950/60 border border-emerald-800 text-emerald-300 text-xs">
                  <CheckCircle2 className="w-4 h-4" />
                  <span>Subscribed! Thank you for joining.</span>
                </div>
              ) : (
                <form onSubmit={handleSubscribe} className="flex gap-2 max-w-sm">
                  <input
                    type="email"
                    required
                    value={newsletterEmail}
                    onChange={(e) => setNewsletterEmail(e.target.value)}
                    placeholder="Enter corporate email..."
                    className="flex-1 bg-slate-800/90 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                  />
                  <button
                    type="submit"
                    className="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs transition-colors shadow-sm font-heading"
                  >
                    Subscribe
                  </button>
                </form>
              )}
            </div>
          </div>

          {/* Col 3 & 4: Services and Quick Links */}
          <div className="grid grid-cols-2 gap-6 sm:gap-8 lg:contents">
            {/* Our Services */}
            <div className="space-y-4">
              <h3 className="text-sm font-bold text-white uppercase tracking-wider font-heading">
                Our Services
              </h3>
              <ul className="space-y-2.5 text-xs sm:text-sm text-slate-300 font-medium leading-snug">
                <li>
                  <Link to="/services/ai-automation" className="hover:text-blue-400 transition-colors">
                    AI & Automation
                  </Link>
                </li>
                <li>
                  <Link to="/services/software-development" className="hover:text-blue-400 transition-colors">
                    Software Development
                  </Link>
                </li>
                <li>
                  <Link to="/services/saas-development" className="hover:text-blue-400 transition-colors">
                    SaaS Development
                  </Link>
                </li>
                <li>
                  <Link to="/services/data-annotation" className="hover:text-blue-400 transition-colors">
                    Data Annotation
                  </Link>
                </li>
                <li>
                  <Link to="/services/bpo-services" className="hover:text-blue-400 transition-colors">
                    BPO Services
                  </Link>
                </li>
              </ul>
            </div>

            {/* Quick Links */}
            <div className="space-y-4">
              <h3 className="text-sm font-bold text-white uppercase tracking-wider font-heading">
                Quick Links
              </h3>
              <ul className="space-y-2.5 text-xs sm:text-sm text-slate-300 font-medium leading-snug">
                <li>
                  <Link to="/" className="hover:text-blue-400 transition-colors">
                    Home
                  </Link>
                </li>
                <li>
                  <Link to="/about" className="hover:text-blue-400 transition-colors">
                    About Us
                  </Link>
                </li>
                <li>
                  <Link to="/portfolio" className="hover:text-blue-400 transition-colors">
                    Portfolio / Our Work
                  </Link>
                </li>
                <li>
                  <Link to="/industries" className="hover:text-blue-400 transition-colors">
                    Industries We Serve
                  </Link>
                </li>
                <li>
                  <Link to="/how-we-work" className="hover:text-blue-400 transition-colors">
                    How We Work
                  </Link>
                </li>
                <li>
                  <Link to="/faqs" className="hover:text-blue-400 transition-colors">
                    FAQs
                  </Link>
                </li>
                <li>
                  <Link to="/careers" className="hover:text-blue-400 transition-colors">
                    Careers & Internships
                  </Link>
                </li>
                <li>
                  <Link to="/contact" className="hover:text-blue-400 transition-colors">
                    Contact Us
                  </Link>
                </li>
                <li>
                  <button 
                    onClick={onOpenQuote} 
                    className="hover:text-blue-400 transition-colors text-left"
                  >
                    Request a Quotation
                  </button>
                </li>
              </ul>
            </div>
          </div>

          {/* Col 5: Connect With Us Online */}
          <div className="space-y-4">
            <h3 className="text-sm font-bold text-white uppercase tracking-wider font-heading">
              Connect Online
            </h3>
            <div className="space-y-3 text-sm text-slate-300 font-medium">
              <div className="flex items-center gap-3">
                <Globe className="w-5 h-5 text-blue-400 shrink-0" />
                <span className="leading-snug">
                  {siteConfig.deliveryModel}
                </span>
              </div>
              <div className="flex items-center gap-3">
                <Mail className="w-5 h-5 text-blue-400 shrink-0" />
                <a href={`mailto:${siteConfig.emailContact}`} className="hover:text-white transition-colors break-all">
                  {siteConfig.emailContact}
                </a>
              </div>
              <div className="flex items-center gap-3">
                <Phone className="w-5 h-5 text-blue-400 shrink-0" />
                <a href={`tel:${siteConfig.phoneTel || siteConfig.phone}`} className="hover:text-white transition-colors font-mono">
                  {siteConfig.phone}
                </a>
              </div>
            </div>

            <div className="pt-2">
              <a
                href={siteConfig.whatsappUrl}
                target="_blank"
                rel="noreferrer"
                className="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-950 text-emerald-300 border border-emerald-800 text-xs font-bold hover:bg-emerald-900 transition-colors font-heading shadow-xs"
              >
                <span>WhatsApp Solutions Desk</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </a>
            </div>
          </div>

        </div>

        {/* Bottom Bar */}
        <div className="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
          <div className="flex flex-col sm:flex-row items-center gap-3 text-center sm:text-left">
            <span>&copy; {new Date().getFullYear()} {siteConfig.companyName}. All rights reserved.</span>
            <span className="hidden sm:inline text-slate-700">•</span>
            <span className="text-slate-400 font-medium">Enterprise Online-First IT Delivery</span>
          </div>

          {/* Social Links */}
          <div className="flex items-center gap-3 text-slate-400">
            <a 
              href={siteConfig.linkedinUrl || "https://www.linkedin.com/company/nextechx-solutions/"} 
              target="_blank" 
              rel="noopener noreferrer" 
              className="p-2.5 rounded-xl bg-slate-800/80 border border-slate-700/60 hover:bg-blue-600 hover:text-white transition-colors"
              aria-label="NextTechX Solutions on LinkedIn"
              title="NextTechX Solutions on LinkedIn"
            >
              <Linkedin className="w-4 h-4" />
            </a>
            <a 
              href="https://twitter.com" 
              target="_blank" 
              rel="noreferrer" 
              className="p-2.5 rounded-xl bg-slate-800/80 border border-slate-700/60 hover:bg-slate-700 hover:text-white transition-colors"
              aria-label="Twitter / X"
            >
              <Twitter className="w-4 h-4" />
            </a>
            <a 
              href="https://github.com" 
              target="_blank" 
              rel="noreferrer" 
              className="p-2.5 rounded-xl bg-slate-800/80 border border-slate-700/60 hover:bg-slate-700 hover:text-white transition-colors"
              aria-label="GitHub"
            >
              <Github className="w-4 h-4" />
            </a>
          </div>

          {/* Legal Document Triggers */}
          <div className="flex items-center gap-6">
            <Link 
              to="/privacy-policy"
              className="hover:text-slate-300 transition-colors underline-offset-4 hover:underline"
            >
              Privacy Policy
            </Link>
            <button 
              type="button"
              onClick={() => openLegal('terms')}
              className="hover:text-slate-300 transition-colors underline-offset-4 hover:underline"
            >
              Terms of Service
            </button>
            <button 
              type="button"
              onClick={() => openLegal('nda')}
              className="hover:text-slate-300 transition-colors underline-offset-4 hover:underline"
            >
              Mutual NDA Agreement
            </button>
            <a 
              href="admin-login.php" 
              className="text-slate-600 hover:text-slate-400 transition-colors text-[11px] font-mono"
              title="Restricted Staff Access"
            >
              Admin Access
            </a>
          </div>
        </div>

      </div>

      {/* Legal & Policy Modal */}
      <LegalModal
        isOpen={legalModalOpen}
        onClose={() => setLegalModalOpen(false)}
        documentType={legalDocType}
      />
    </footer>
  );
}

import React, { useState, useMemo } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { 
  HelpCircle, 
  Search, 
  ChevronDown, 
  Sparkles, 
  ArrowRight, 
  PhoneCall, 
  MessageSquare, 
  Mail, 
  ShieldCheck, 
  CheckCircle2, 
  Bot, 
  Code2, 
  BookOpen, 
  GraduationCap, 
  Workflow,
  Check,
  Zap,
  Lock,
  Clock
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function FAQs({ onOpenQuote, onOpenConsultation }) {
  const [searchQuery, setSearchQuery] = useState('');
  const [activeCategory, setActiveCategory] = useState('All');
  const [openIndex, setOpenIndex] = useState(0); // first item open by default

  const faqData = [
    // 1. General & Engagement
    {
      category: 'General & Pricing',
      categoryIcon: Workflow,
      question: 'How does your 100% online IT service work?',
      answer: 'We work with you completely online through Google Meet, Zoom, and WhatsApp. We show you clickable screens and live preview links as we build. You never have to travel or visit an office, which saves you time and keeps our prices low and fair.'
    },
    {
      category: 'General & Pricing',
      categoryIcon: Workflow,
      question: 'Do you sign an NDA before we share our idea?',
      answer: 'Yes, always. We sign a legal Non-Disclosure Agreement (NDA) with you before you share any idea, document, or research data. Everything you share remains 100% private and protected.'
    },
    {
      category: 'General & Pricing',
      categoryIcon: Workflow,
      question: 'How do you calculate your project prices?',
      answer: 'We give you a fixed price quote in Indian Rupees (₹) or US Dollars ($) based on the work needed. There are no surprise fees or hidden hourly charges. You pay in small steps (milestones) as each part is delivered.'
    },
    {
      category: 'General & Pricing',
      categoryIcon: Workflow,
      question: 'Do I own all the source code after the project is done?',
      answer: 'Yes, 100%. Once final payment is made, all code, designs, and files belong completely to you. We transfer everything to your GitHub or Google Drive. There are no ongoing rent fees.'
    },

    // 2. AI & Software Development
    {
      category: 'AI & Software',
      categoryIcon: Bot,
      question: 'Can you connect an AI chatbot to my WhatsApp number?',
      answer: 'Yes! We connect smart AI chatbots directly to your official WhatsApp Business number. The bot can answer customer questions 24/7, check orders, take bookings, and pass complex chats to your human team instantly.'
    },
    {
      category: 'AI & Software',
      categoryIcon: Code2,
      question: 'What programming languages and tools do you use?',
      answer: 'We use modern, reliable tools such as React, Vite, and Tailwind CSS for fast websites; Python and Node.js for backend servers; and safe cloud platforms like Netlify, Render, and AWS.'
    },
    {
      category: 'AI & Software',
      categoryIcon: Code2,
      question: 'How long does it take to build a website or software?',
      answer: 'Small tools and WhatsApp bots take 1 to 2 weeks. Complete custom websites and business portals usually take 3 to 6 weeks. We give you a clear delivery date before we start.'
    },
    {
      category: 'AI & Software',
      categoryIcon: Code2,
      question: 'Where will my website or software be hosted?',
      answer: 'We can host it on your chosen cloud account (such as Netlify, Render, AWS, or your own server). We also help you connect your custom domain name and install free SSL padlock security.'
    },

    // 3. Internship & Hands-On Engineering
    {
      category: 'Internships',
      categoryIcon: GraduationCap,
      question: 'How does the internship selection process work?',
      answer: 'Our selection is strictly interview-based. After submitting your application and resume, shortlisted candidates are invited to a 1-on-1 virtual technical interview with our engineering lead. Candidates who clear the interview receive an official Internship Offer Letter and are assigned to a live client project pod.'
    },
    {
      category: 'Internships',
      categoryIcon: GraduationCap,
      question: 'Are the internships online or in-person?',
      answer: 'All internships are 100% online. You collaborate with your team, attend live mentor sessions, and complete real client project tasks from home. We provide flexible evening and weekend project syncs for college students and working professionals.'
    },
    {
      category: 'Internships',
      categoryIcon: GraduationCap,
      question: 'Will I work on real projects or just watch lectures?',
      answer: 'You will build real working projects! You will write actual code for websites, AI tools, or data dashboards with step-by-step guidance from experienced engineering mentors.'
    },
    {
      category: 'Internships',
      categoryIcon: GraduationCap,
      question: 'Do I get a verified certificate and recommendation letter?',
      answer: 'Yes. When you complete your capstone project, you receive an official certificate with an online verification ID, plus a signed Letter of Recommendation (LOR) for your job applications.'
    },
    {
      category: 'Internships',
      categoryIcon: GraduationCap,
      question: 'Which internship domains can I choose from?',
      answer: 'We offer tracks in: AI & Machine Learning, Data Analytics & Power BI, Full-Stack Web Development (React & Node/Python), Python & Automation, Java Spring Boot, and Cyber Security.'
    }
  ];

  const categories = [
    { label: 'All Questions', value: 'All', count: faqData.length },
    { label: 'General & Pricing', value: 'General & Pricing', icon: Workflow, count: faqData.filter(f => f.category === 'General & Pricing').length },
    { label: 'AI & Software', value: 'AI & Software', icon: Bot, count: faqData.filter(f => f.category === 'AI & Software').length },
    { label: 'Internships', value: 'Internships', icon: GraduationCap, count: faqData.filter(f => f.category === 'Internships').length }
  ];

  const filteredFaqs = useMemo(() => {
    return faqData.filter(faq => {
      const matchesCategory = activeCategory === 'All' || faq.category === activeCategory;
      const q = searchQuery.toLowerCase().trim();
      const matchesSearch = !q || 
        faq.question.toLowerCase().includes(q) || 
        faq.answer.toLowerCase().includes(q) ||
        faq.category.toLowerCase().includes(q);
      return matchesCategory && matchesSearch;
    });
  }, [activeCategory, searchQuery]);

  const toggleAccordion = (idx) => {
    setOpenIndex(prev => prev === idx ? null : idx);
  };

  return (
    <div className="bg-white text-slate-800">
      
      {/* 1. HERO SECTION WITH MODERN GRADIENT & ABSTRACT SHAPES */}
      <section className="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/60 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle decorative glow shapes */}
        <div className="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <motion.div 
            initial={{ opacity: 0, y: -15 }}
            animate={{ opacity: 1, y: 0 }}
            className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading"
          >
            <HelpCircle className="w-4 h-4 text-blue-600" />
            <span>Clear Answers • No Confusion</span>
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            className="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading"
          >
            Frequently Asked <br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
              Questions & Answers
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed"
          >
            Quick and simple answers about how we work, project pricing, research paper help, and student internships.
          </motion.p>

          {/* Interactive Search Bar */}
          <div className="pt-4 max-w-2xl mx-auto">
            <div className="relative">
              <Search className="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" />
              <input
                type="text"
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                placeholder="Search any topic: WhatsApp bot, pricing, NDA, certificate, paper..."
                className="w-full bg-white border border-slate-300 rounded-2xl pl-12 pr-16 py-3.5 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:ring-4 focus:ring-blue-100 shadow-md transition-all"
              />
              {searchQuery && (
                <button
                  onClick={() => setSearchQuery('')}
                  className="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400 hover:text-slate-600 px-2 py-1 rounded bg-slate-100"
                >
                  Clear
                </button>
              )}
            </div>

            {/* Quick Keyword Pills */}
            <div className="flex flex-wrap items-center justify-center gap-1.5 mt-3 text-xs text-slate-500">
              <span className="font-semibold text-slate-400">Popular:</span>
              {['Pricing', 'WhatsApp Bot', 'NDA', 'Turnitin', 'Internship'].map((tag) => (
                <button
                  key={tag}
                  onClick={() => setSearchQuery(tag)}
                  className="px-2.5 py-0.5 rounded-full bg-slate-100 hover:bg-blue-50 hover:text-blue-600 text-slate-600 text-[11px] font-medium transition-colors"
                >
                  {tag}
                </button>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* 2. CATEGORY FILTER TABS WITH COUNTERS */}
      <section className="py-6 bg-white border-b border-slate-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-wrap items-center justify-center gap-2 p-1.5 rounded-2xl bg-slate-100 border border-slate-200 max-w-4xl mx-auto">
            {categories.map((cat) => {
              const isSelected = activeCategory === cat.value;
              const Icon = cat.icon;
              return (
                <button
                  key={cat.value}
                  onClick={() => {
                    setActiveCategory(cat.value);
                    setOpenIndex(0);
                  }}
                  className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-bold tracking-wide transition-all flex items-center gap-2 font-heading ${
                    isSelected
                      ? 'bg-blue-600 text-white shadow-sm'
                      : 'text-slate-600 hover:text-slate-900 hover:bg-white/60'
                  }`}
                >
                  {Icon && <Icon className="w-4 h-4" />}
                  <span>{cat.label}</span>
                  <span className={`text-[10px] px-1.5 py-0.5 rounded-full font-mono ${
                    isSelected ? 'bg-blue-700 text-white' : 'bg-slate-200 text-slate-600'
                  }`}>
                    {cat.count}
                  </span>
                </button>
              );
            })}
          </div>
        </div>
      </section>

      {/* 3. MODERN ACCORDION FAQ ITEMS */}
      <section className="py-16 lg:py-24 bg-slate-50/50">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
          {filteredFaqs.length === 0 ? (
            <div className="text-center py-16 space-y-3 bg-white rounded-3xl border border-slate-200 p-8">
              <p className="text-base font-semibold text-slate-600">
                No matching questions found for "{searchQuery}".
              </p>
              <button
                onClick={() => { setSearchQuery(''); setActiveCategory('All'); }}
                className="text-sm font-bold text-blue-600 hover:text-blue-700 underline font-heading"
              >
                Reset search filters
              </button>
            </div>
          ) : (
            filteredFaqs.map((faq, idx) => {
              const isOpen = openIndex === idx;
              const Icon = faq.categoryIcon;
              return (
                <motion.div
                  key={idx}
                  initial={{ opacity: 0, y: 10 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ duration: 0.2 }}
                  className={`rounded-2xl border transition-all duration-200 overflow-hidden ${
                    isOpen 
                      ? 'bg-white border-blue-500 shadow-md ring-2 ring-blue-50' 
                      : 'bg-white border-slate-200/90 hover:border-slate-300 shadow-xs'
                  }`}
                >
                  <button
                    onClick={() => toggleAccordion(idx)}
                    className="w-full px-6 py-5 flex items-center justify-between text-left gap-4 hover:bg-slate-50/50 transition-colors"
                  >
                    <div className="space-y-1.5 pr-2">
                      <div className="flex items-center gap-2">
                        <span className="text-[10px] font-bold uppercase tracking-wider text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-md border border-blue-200 font-heading">
                          {faq.category}
                        </span>
                      </div>
                      <h3 className={`text-base sm:text-lg font-bold font-heading leading-snug transition-colors ${
                        isOpen ? 'text-blue-600' : 'text-slate-900'
                      }`}>
                        {faq.question}
                      </h3>
                    </div>

                    <div className={`w-9 h-9 rounded-full flex items-center justify-center shrink-0 border transition-transform duration-200 ${
                      isOpen ? 'bg-blue-600 text-white border-blue-600 rotate-180 shadow-xs' : 'bg-slate-100 text-slate-500 border-slate-200'
                    }`}>
                      <ChevronDown className="w-4 h-4" />
                    </div>
                  </button>

                  <AnimatePresence>
                    {isOpen && (
                      <motion.div
                        initial={{ height: 0, opacity: 0 }}
                        animate={{ height: 'auto', opacity: 1 }}
                        exit={{ height: 0, opacity: 0 }}
                        transition={{ duration: 0.25, ease: 'easeOut' }}
                      >
                        <div className="px-6 pb-6 pt-2 border-t border-slate-100 bg-gradient-to-b from-blue-50/20 to-white">
                          <div className="flex items-start gap-3 p-4 rounded-xl bg-blue-50/60 border border-blue-100/80">
                            <CheckCircle2 className="w-4 h-4 text-blue-600 shrink-0 mt-0.5" />
                            <p className="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal">
                              {faq.answer}
                            </p>
                          </div>
                        </div>
                      </motion.div>
                    )}
                  </AnimatePresence>
                </motion.div>
              );
            })
          )}
        </div>
      </section>

      {/* 4. DARK HIGHLIGHT SECTION: QUICK HELP HOTLINE */}
      <section className="py-20 bg-gradient-to-b from-slate-900 via-slate-900 to-blue-950 text-white relative overflow-hidden border-y border-slate-800">
        <div className="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none" />
        <div className="absolute top-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
          <div className="text-center max-w-2xl mx-auto space-y-2">
            <span className="text-xs uppercase font-extrabold tracking-wider text-blue-400 font-heading">
              Direct Support
            </span>
            <h2 className="text-2xl sm:text-4xl font-extrabold text-white font-heading">
              Quick Help When You Need It
            </h2>
            <p className="text-sm text-slate-300">
              We believe in honest, fast communication without waiting in queues or talking to automated phone trees.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3 text-left">
              <div className="w-12 h-12 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
                <MessageSquare className="w-6 h-6" />
              </div>
              <h3 className="text-base font-bold text-white font-heading">
                WhatsApp Fast Reply
              </h3>
              <p className="text-xs sm:text-sm text-slate-300 leading-relaxed">
                Message us directly on WhatsApp. We reply within 15 minutes during standard working hours.
              </p>
            </div>

            <div className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3 text-left">
              <div className="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 text-blue-400 flex items-center justify-center">
                <PhoneCall className="w-6 h-6" />
              </div>
              <h3 className="text-base font-bold text-white font-heading">
                Free 20-Min Call
              </h3>
              <p className="text-xs sm:text-sm text-slate-300 leading-relaxed">
                Book a quick video or phone call with a solutions engineer to talk about your idea and budget.
              </p>
            </div>

            <div className="p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-blue-500/50 hover:bg-slate-800 transition-all duration-300 space-y-3 text-left">
              <div className="w-12 h-12 rounded-xl bg-indigo-500/20 border border-indigo-500/30 text-indigo-400 flex items-center justify-center">
                <Lock className="w-6 h-6" />
              </div>
              <h3 className="text-base font-bold text-white font-heading">
                100% Signed NDA
              </h3>
              <p className="text-xs sm:text-sm text-slate-300 leading-relaxed">
                Your ideas and documents are protected by law before you share any details with us.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* 5. "STILL HAVE QUESTIONS?" SUPPORT CARD */}
      <section className="py-16 bg-white">
        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="p-8 sm:p-12 rounded-3xl bg-gradient-to-b from-blue-50/50 to-slate-50 border border-slate-200 shadow-sm text-center space-y-6">
            <div className="w-16 h-16 rounded-2xl bg-blue-600 text-white flex items-center justify-center mx-auto shadow-md">
              <MessageSquare className="w-8 h-8" />
            </div>

            <div className="max-w-xl mx-auto space-y-2">
              <h2 className="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                Still Have Questions?
              </h2>
              <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                We are always happy to help! Send us a quick message on WhatsApp or book a friendly call with our team.
              </p>
            </div>

            <div className="pt-2 flex flex-wrap items-center justify-center gap-4">
              <a
                href={siteConfig.whatsappUrl}
                target="_blank"
                rel="noreferrer"
                className="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition-all flex items-center gap-2 active:scale-95 font-heading"
              >
                <MessageSquare className="w-4 h-4" />
                <span>Chat on WhatsApp (+91 93098 35085)</span>
              </a>

              <button
                onClick={onOpenQuote}
                className="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition-all flex items-center gap-2 active:scale-95 font-heading"
              >
                <span>Get a Free Price Quote</span>
                <ArrowRight className="w-4 h-4" />
              </button>

              <button
                onClick={onOpenConsultation}
                className="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading"
              >
                <PhoneCall className="w-4 h-4 text-blue-600" />
                <span>Book a Free Call</span>
              </button>
            </div>
          </div>
        </div>
      </section>

    </div>
  );
}

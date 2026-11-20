import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import { 
  ShieldCheck, 
  Lock, 
  FileText, 
  Server, 
  UserCheck, 
  EyeOff, 
  Cpu, 
  Key, 
  Mail, 
  Phone, 
  MessageSquare, 
  ArrowLeft, 
  ArrowRight, 
  CheckCircle2, 
  AlertCircle, 
  Database, 
  Globe, 
  Clock, 
  FileCode, 
  GraduationCap, 
  ExternalLink,
  ChevronRight,
  Sparkles,
  HelpCircle
} from 'lucide-react';
import { siteConfig } from '../config/siteConfig';

export default function PrivacyPolicy({ onOpenQuote, onOpenConsultation }) {
  const [activeSection, setActiveSection] = useState('overview');

  const policySections = [
    { id: 'overview', title: '1. Overview & Commitment', icon: ShieldCheck },
    { id: 'information-collected', title: '2. Information We Collect', icon: Database },
    { id: 'how-we-use-data', title: '3. How We Use Information', icon: Cpu },
    { id: 'ip-confidentiality', title: '4. Code & Client IP Confidentiality', icon: Lock },
    { id: 'internship-privacy', title: '5. Student & Resume Privacy', icon: GraduationCap },
    { id: 'third-parties', title: '6. Third-Party Infrastructure', icon: Server },
    { id: 'security-standards', title: '7. Data Security & Storage', icon: Key },
    { id: 'cookies-tracking', title: '8. Cookies & Local Storage', icon: EyeOff },
    { id: 'user-rights', title: '9. Your Legal Rights & Choices', icon: UserCheck },
    { id: 'contact-dpo', title: '10. Contact Our Compliance Desk', icon: Mail }
  ];

  const executiveHighlights = [
    {
      icon: Lock,
      title: '100% Client IP Ownership',
      desc: 'All source code, proprietary models, business logic, and datasets developed for or shared by clients remain strictly client property under signed mutual NDAs. We never claim IP rights.',
      color: 'blue'
    },
    {
      icon: EyeOff,
      title: 'Zero Public AI Training',
      desc: 'We strictly pledge never to feed, fine-tune, or leak client source code, confidential business data, or private communication records into public commercial AI models.',
      color: 'indigo'
    },
    {
      icon: ShieldCheck,
      title: 'Zero Data Monetization',
      desc: 'We never sell, broker, rent, or lease any client, visitor, or candidate information. Your data is used exclusively to evaluate, build, and support requested IT deliverables.',
      color: 'emerald'
    },
    {
      icon: Server,
      title: 'Enterprise Encryption',
      desc: 'All data transmissions are protected via TLS 1.3 encryption in-transit and AES-256 for internal credentials and databases, aligned with international zero-trust standards.',
      color: 'cyan'
    }
  ];

  return (
    <div className="min-h-screen bg-slate-50 text-slate-800 font-sans selection:bg-blue-600 selection:text-white">
      {/* 1. Header & Hero Section */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-20 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white overflow-hidden">
        {/* Futuristic Background Accents */}
        <div className="absolute inset-0 bg-grid-white/[0.04] bg-[size:32px_32px] pointer-events-none" />
        <div className="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-0 right-10 w-80 h-80 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          {/* Breadcrumb / Back Navigation */}
          <div className="mb-6">
            <Link 
              to="/" 
              className="inline-flex items-center gap-2 text-xs font-mono text-cyan-400 hover:text-cyan-300 transition-colors bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg border border-white/10 backdrop-blur-sm"
            >
              <ArrowLeft className="w-3.5 h-3.5" />
              <span>Back to Homepage</span>
            </Link>
          </div>

          <div className="max-w-3xl">
            {/* Trust Pill */}
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
              <ShieldCheck className="w-3.5 h-3.5 text-cyan-400" />
              <span>Enterprise Compliance • Last Updated: November 2026</span>
            </div>

            <h1 className="text-3xl sm:text-4xl lg:text-5xl font-black font-heading text-white tracking-tight leading-tight">
              Privacy & Data Protection Policy
            </h1>
            <p className="mt-4 text-base sm:text-lg text-slate-300 leading-relaxed">
              At <strong className="text-white font-semibold">{siteConfig.companyName}</strong> (&ldquo;{siteConfig.companyShort}&rdquo;, &ldquo;we&rdquo;, &ldquo;our&rdquo;, or &ldquo;us&rdquo;), we are committed to safeguarding your proprietary technology, commercial intellectual property, and personal information with enterprise-grade integrity.
            </p>
            <p className="mt-2 text-xs sm:text-sm text-slate-400 font-mono">
              Operating Model: {siteConfig.operatingModel} • Zero-Trust Data Architecture
            </p>
          </div>
        </div>
      </section>

      {/* 2. Executive Highlights Cards */}
      <section className="relative -mt-8 z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          {executiveHighlights.map((card, idx) => {
            const Icon = card.icon;
            return (
              <motion.div
                key={idx}
                initial={{ opacity: 0, y: 15 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.3, delay: idx * 0.05 }}
                className="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-md shadow-slate-900/5 hover:shadow-lg transition-all"
              >
                <div className="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3.5 border border-blue-100">
                  <Icon className="w-5 h-5" />
                </div>
                <h3 className="text-sm font-bold text-slate-900 font-heading mb-1.5">
                  {card.title}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {card.desc}
                </p>
              </motion.div>
            );
          })}
        </div>
      </section>

      {/* 3. Main Body Content & Sidebar Navigation */}
      <main className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
          
          {/* Sticky Sidebar Navigation (Desktop) */}
          <aside className="hidden lg:block lg:col-span-4 sticky top-28 bg-white rounded-2xl p-4 border border-slate-200 shadow-sm">
            <div className="flex items-center gap-2 px-3 py-2 border-b border-slate-100 mb-3">
              <FileText className="w-4 h-4 text-blue-600" />
              <span className="text-xs font-bold uppercase tracking-wider text-slate-800 font-heading">
                Document Index
              </span>
            </div>
            <nav className="space-y-1">
              {policySections.map((sec) => {
                const NavIcon = sec.icon;
                const isActive = activeSection === sec.id;
                return (
                  <a
                    key={sec.id}
                    href={`#${sec.id}`}
                    onClick={() => setActiveSection(sec.id)}
                    className={`flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-medium transition-colors ${
                      isActive 
                        ? 'bg-blue-600 text-white font-semibold shadow-sm shadow-blue-500/20' 
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                    }`}
                  >
                    <NavIcon className={`w-3.5 h-3.5 shrink-0 ${isActive ? 'text-white' : 'text-slate-400'}`} />
                    <span className="truncate">{sec.title}</span>
                  </a>
                );
              })}
            </nav>

            <div className="mt-6 pt-4 border-t border-slate-100">
              <div className="bg-slate-50 rounded-xl p-3 text-[11px] text-slate-600 space-y-2 border border-slate-200/60">
                <p className="font-semibold text-slate-800 flex items-center gap-1.5">
                  <ShieldCheck className="w-3.5 h-3.5 text-blue-600" />
                  Direct Privacy Contact
                </p>
                <p className="text-slate-500">
                  Email our compliance desk directly for data access or bilateral NDA execution:
                </p>
                <a 
                  href={`mailto:${siteConfig.email}`} 
                  className="font-mono text-blue-600 hover:underline block truncate font-medium"
                >
                  {siteConfig.email}
                </a>
              </div>
            </div>
          </aside>

          {/* Policy Text & Deep Dives */}
          <div className="lg:col-span-8 space-y-10">

            {/* Section 1: Overview & Scope */}
            <section id="overview" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-blue-100/80 text-blue-600 flex items-center justify-center font-bold text-sm">
                  1
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Overview & Commitment
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Applicable across all NextTechX digital touchpoints</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>
                  This Privacy and Data Protection Policy governs all interactions with <strong>{siteConfig.companyName}</strong> (&ldquo;{siteConfig.companyShort}&rdquo;), our official website (<code className="text-xs bg-slate-100 px-1.5 py-0.5 rounded text-blue-600 font-mono">nextechxsolutions.com</code>), subdomains, inquiry portals, AI chatbot interfaces, and remote collaboration workflows.
                </p>
                <p>
                  As an online-first IT solutions and artificial intelligence consultancy, our primary mandate is providing robust software architecture, automated enterprise workflows, and publication advisory. We do not operate as an advertising network, data reseller, or consumer surveillance vendor. We only collect the minimal personal or enterprise data strictly necessary to scope, architect, deliver, and support approved technological solutions.
                </p>
                <div className="p-4 rounded-2xl bg-blue-50/60 border border-blue-100 text-xs text-blue-900 space-y-1">
                  <p className="font-bold flex items-center gap-1.5">
                    <CheckCircle2 className="w-4 h-4 text-blue-600" />
                    Core Guiding Principle
                  </p>
                  <p className="text-blue-800">
                    &ldquo;{siteConfig.tagline}&rdquo; means our technology empowers you without ever compromising the privacy of your users, your internal business logic, or your proprietary algorithms.
                  </p>
                </div>
              </div>
            </section>

            {/* Section 2: Information We Collect */}
            <section id="information-collected" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-indigo-100/80 text-indigo-600 flex items-center justify-center font-bold text-sm">
                  2
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Categories of Information We Collect
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Transparent, explicit collection criteria</p>
                </div>
              </div>

              <div className="space-y-4 text-sm text-slate-600 leading-relaxed">
                <p>We categorize collected information into the following defined streams:</p>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div className="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <h4 className="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                      <FileCode className="w-4 h-4 text-blue-600" />
                      Client & Project Inquiries
                    </h4>
                    <ul className="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                      <li>Full Name and Corporate Designation</li>
                      <li>Official / Corporate Email Address</li>
                      <li>Phone / WhatsApp Contact Number</li>
                      <li>Organization, Enterprise, or Institution Name</li>
                      <li>High-level project scope, tech stack, and budget bracket</li>
                    </ul>
                  </div>

                  <div className="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <h4 className="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                      <GraduationCap className="w-4 h-4 text-emerald-600" />
                      Internship Candidates
                    </h4>
                    <ul className="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                      <li>Applicant Name, Email, and Phone Number</li>
                      <li>Academic institution, degree, and graduation year</li>
                      <li>Target internship track (AI, Web, App, Cloud)</li>
                      <li>Curriculum Vitae / Resume file (PDF / DOCX)</li>
                      <li>GitHub, LinkedIn, or portfolio project hyperlinks</li>
                    </ul>
                  </div>

                  <div className="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <h4 className="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                      <Cpu className="w-4 h-4 text-purple-600" />
                      AI Assistant Interactions
                    </h4>
                    <ul className="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                      <li>Queries and messages typed into the website AI chatbot</li>
                      <li>Session-bound context tokens to maintain coherent conversations</li>
                      <li>Voluntarily submitted contact leads during chatbot interaction</li>
                    </ul>
                  </div>

                  <div className="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                    <h4 className="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                      <Server className="w-4 h-4 text-slate-600" />
                      Technical Diagnostics
                    </h4>
                    <ul className="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                      <li>Standard HTTP request headers and user-agent string</li>
                      <li>Anonymized IP address (used for rate-limiting & DDoS mitigation)</li>
                      <li>Timestamps and requested endpoints</li>
                      <li>No invasive fingerprinting or cross-site tracking mechanisms</li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>

            {/* Section 3: How We Use Information */}
            <section id="how-we-use-data" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-cyan-100/80 text-cyan-700 flex items-center justify-center font-bold text-sm">
                  3
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    How We Use Collected Information
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Strictly limited to technical execution and legitimate business purposes</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>We process collected data exclusively under the following lawful bases:</p>
                <div className="space-y-2.5">
                  <div className="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/60">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900 text-xs block">Technical Proposal & Quotation Formulation:</strong>
                      <span className="text-xs text-slate-600">Analyzing project parameters to provide accurate timelines, architectural schematics, milestone deliverables, and fixed-price financial proposals.</span>
                    </div>
                  </div>

                  <div className="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/60">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900 text-xs block">Client Communication & Sprint Updates:</strong>
                      <span className="text-xs text-slate-600">Holding scheduled Google Meet/Zoom architectural calls, delivering weekly staging previews, and providing proactive WhatsApp sprint status notifications.</span>
                    </div>
                  </div>

                  <div className="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/60">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900 text-xs block">Internship Candidate Evaluation:</strong>
                      <span className="text-xs text-slate-600">Assessing technical suitability, scheduling coding evaluations, and coordinating onboarding cohorts for student internship programs.</span>
                    </div>
                  </div>

                  <div className="flex items-start gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/60">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900 text-xs block">System Integrity & Abuse Prevention:</strong>
                      <span className="text-xs text-slate-600">Preventing automated bot spam, SQL injection attempts, rate-limiting server endpoints, and enforcing admin panel authentication controls.</span>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            {/* Section 4: Code & Client IP Confidentiality */}
            <section id="ip-confidentiality" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-blue-100/80 text-blue-600 flex items-center justify-center font-bold text-sm">
                  4
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Source Code & Client Intellectual Property Protection
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Zero-leakage, absolute client ownership guarantee</p>
                </div>
              </div>

              <div className="space-y-4 text-sm text-slate-600 leading-relaxed">
                <p>
                  As an engineering partner to startups, enterprises, and researchers, we recognize that intellectual property is your most vital asset. We maintain strict organizational and technical guarantees:
                </p>

                <div className="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 text-xs text-amber-900 space-y-2">
                  <div className="flex items-center gap-2 font-bold text-amber-900">
                    <AlertCircle className="w-4 h-4 text-amber-600" />
                    <span>Our Absolute &ldquo;Zero Public AI Training&rdquo; Pledge</span>
                  </div>
                  <p className="text-amber-800 leading-relaxed">
                    Under no circumstances does {siteConfig.companyName} feed, upload, or allow client source code, database structures, business logic, or academic research drafts to be ingested by public artificial intelligence foundation models for training purposes. All AI agent workflows developed for your systems operate in isolated, private, tenant-specific runtime environments.
                  </p>
                </div>

                <ul className="space-y-2 text-xs">
                  <li className="flex items-start gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0" />
                    <span><strong>100% Transfer of Deliverables:</strong> Upon payment milestone satisfaction, full intellectual property rights, repository access, and deployment credentials are fully transferred to the client.</span>
                  </li>
                  <li className="flex items-start gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0" />
                    <span><strong>Mutual Bilateral NDAs:</strong> We routinely execute bilateral Non-Disclosure Agreements prior to evaluating architectural blueprints or receiving proprietary credentials.</span>
                  </li>
                  <li className="flex items-start gap-2">
                    <span className="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0" />
                    <span><strong>Compartmentalized Pod Access:</strong> Only engineers assigned directly to your project pod have credentialed access to your private Git repositories and staging environments.</span>
                  </li>
                </ul>
              </div>
            </section>

            {/* Section 5: Student & Resume Privacy */}
            <section id="internship-privacy" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-emerald-100/80 text-emerald-600 flex items-center justify-center font-bold text-sm">
                  5
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Internship Candidates & Resume Privacy Policy
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Dedicated protections for aspiring engineers and students</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>
                  <strong className="text-slate-900">Important Note on Openings:</strong> {siteConfig.companyName} currently offers <em>Internship Opportunities only</em>. We do not have active full-time job vacancies at this time. All submissions through our Careers portal are reviewed specifically for structured internship programs.
                </p>

                <div className="bg-slate-50 rounded-2xl p-4 border border-slate-200 space-y-2 text-xs">
                  <p className="font-bold text-slate-800">Candidate Privacy Standards:</p>
                  <ul className="space-y-1.5 list-disc list-inside text-slate-600">
                    <li>Submitted resumes and portfolios are accessible solely by our authorized HR Review Panel (<code className="font-mono text-blue-600">{siteConfig.emailHr}</code>).</li>
                    <li>We never share, trade, or distribute applicant contact info or resumes with external commercial headhunters, job aggregators, or marketing lists.</li>
                    <li>Candidate files are retained for the duration of the active evaluation cycle (maximum 6 months) and are permanently purged upon candidate request.</li>
                    <li>Applicants may request full deletion of their resume record at any time by emailing <code className="font-mono text-blue-600">{siteConfig.emailHr}</code> with the subject &ldquo;Privacy: Purge Application Data&rdquo;.</li>
                  </ul>
                </div>
              </div>
            </section>

            {/* Section 6: Third-Party Infrastructure */}
            <section id="third-parties" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-purple-100/80 text-purple-600 flex items-center justify-center font-bold text-sm">
                  6
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Third-Party Processors & Infrastructure
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Enterprise hosting and audited sub-processors</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>
                  To deliver reliable online IT services, we partner only with reputable, enterprise-grade cloud providers that maintain high-tier security certifications (ISO 27001, SOC 2 Type II, GDPR alignment):
                </p>

                <div className="space-y-2 text-xs">
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200/70 flex items-start gap-3">
                    <Server className="w-4 h-4 text-blue-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900">Cloud Web Hosting & Server Infrastructure:</strong>
                      <span className="text-slate-600 ml-1">Hosted on secure high-performance servers with automated SSL certification, firewalls, and DDoS shielding.</span>
                    </div>
                  </div>

                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200/70 flex items-start gap-3">
                    <MessageSquare className="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900">Client Communications & Video Conferencing:</strong>
                      <span className="text-slate-600 ml-1">Google Workspace (Gmail, Meet), Zoom, and official Meta WhatsApp Business API channels, operating under end-to-end transport security.</span>
                    </div>
                  </div>

                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200/70 flex items-start gap-3">
                    <Cpu className="w-4 h-4 text-purple-600 mt-0.5 shrink-0" />
                    <div>
                      <strong className="text-slate-900">AI Assistant Processing APIs:</strong>
                      <span className="text-slate-600 ml-1">Website assistant interactions utilize enterprise API tiers with zero-retention defaults for training models.</span>
                    </div>
                  </div>
                </div>
                <p className="text-xs text-slate-500 italic">
                  We do not embed third-party tracking pixels (e.g. ad retargeting beacons, cross-site identity graphs) on our website.
                </p>
              </div>
            </section>

            {/* Section 7: Data Security Standards */}
            <section id="security-standards" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-blue-100/80 text-blue-600 flex items-center justify-center font-bold text-sm">
                  7
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Data Security & Retention Protocols
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Defense-in-depth security implementation</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>
                  We implement multi-layered defenses to prevent unauthorized access, data alteration, disclosure, or destruction:
                </p>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                    <h5 className="font-bold text-slate-900 mb-1 flex items-center gap-1.5">
                      <Lock className="w-3.5 h-3.5 text-blue-600" />
                      In-Transit & At-Rest Encryption
                    </h5>
                    <p className="text-slate-600">All browser and API transmissions are enforced over TLS 1.3 with HSTS. Internal databases and configuration keys are encrypted at rest with AES-256.</p>
                  </div>

                  <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                    <h5 className="font-bold text-slate-900 mb-1 flex items-center gap-1.5">
                      <Key className="w-3.5 h-3.5 text-blue-600" />
                      Role-Based Access (RBAC)
                    </h5>
                    <p className="text-slate-600">Access to inquiry logs, resumes, and admin consoles requires authenticated multi-factor credentials with least-privilege scoping.</p>
                  </div>
                </div>

                <div className="mt-2 text-xs text-slate-600 space-y-1">
                  <p><strong>Data Retention Timelines:</strong></p>
                  <ul className="list-disc list-inside space-y-1 text-slate-500">
                    <li>Active Project Documentation: Retained during development and for the 60-day post-launch warranty window.</li>
                    <li>Technical Inquiries & Quotes: Retained for up to 12 months for commercial reference, unless deletion is requested earlier.</li>
                    <li>Candidate Internship Resumes: Retained for up to 6 months for active selection rounds.</li>
                  </ul>
                </div>
              </div>
            </section>

            {/* Section 8: Cookies & Web Storage */}
            <section id="cookies-tracking" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-indigo-100/80 text-indigo-600 flex items-center justify-center font-bold text-sm">
                  8
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Cookies & Browser Storage Technologies
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Strictly functional, non-invasive storage</p>
                </div>
              </div>

              <div className="space-y-3 text-sm text-slate-600 leading-relaxed">
                <p>
                  Our website relies only on <strong>essential, privacy-respecting storage</strong> to enable basic functionality:
                </p>
                <div className="bg-slate-50 rounded-2xl p-4 border border-slate-200 text-xs space-y-2">
                  <div className="flex items-start gap-2">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" />
                    <div>
                      <strong>Essential UI Preferences:</strong>
                      <span className="text-slate-600 ml-1">Storing temporary client state (e.g., chatbot open/close state, banner dismissals) in your local browser session.</span>
                    </div>
                  </div>
                  <div className="flex items-start gap-2">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" />
                    <div>
                      <strong>Security & CSRF Tokens:</strong>
                      <span className="text-slate-600 ml-1">Encrypted authentication cookies when logging into our authorized operations portal.</span>
                    </div>
                  </div>
                  <div className="flex items-start gap-2">
                    <AlertCircle className="w-4 h-4 text-blue-600 shrink-0 mt-0.5" />
                    <div>
                      <strong>No Third-Party Ad Cookies:</strong>
                      <span className="text-slate-600 ml-1">We do not sell advertising space or allow third-party behavioral networks to set tracking cookies on your device.</span>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            {/* Section 9: User Rights & Choices */}
            <section id="user-rights" className="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-emerald-100/80 text-emerald-600 flex items-center justify-center font-bold text-sm">
                  9
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Your Data Protection Rights
                  </h2>
                  <p className="text-xs text-slate-500 font-mono">Full control over your personal & project records</p>
                </div>
              </div>

              <div className="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                <p>
                  Regardless of your geographical location, {siteConfig.companyName} grants you comprehensive rights regarding your records:
                </p>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5">Right of Access & Inspection:</strong>
                    <span className="text-slate-600">Request a transparent copy of all inquiry or consultation data we have on file for you.</span>
                  </div>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5">Right to Rectification:</strong>
                    <span className="text-slate-600">Update or correct inaccurate contact, company, or technical information promptly.</span>
                  </div>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5">Right to Erasure (&ldquo;Right to be Forgotten&rdquo;):</strong>
                    <span className="text-slate-600">Request the complete, irreversible deletion of your contact records, quotes, or resumes.</span>
                  </div>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <strong className="text-slate-900 block mb-0.5">Right to Data Portability:</strong>
                    <span className="text-slate-600">Obtain your submitted briefs and project artifacts in standard structured formats (JSON, PDF, CSV).</span>
                  </div>
                </div>

                <p className="text-xs text-slate-500">
                  To exercise any of these rights, email us at <a href={`mailto:${siteConfig.email}`} className="text-blue-600 font-medium underline">{siteConfig.email}</a>. We respond to all verified data subject requests within 48 business hours.
                </p>
              </div>
            </section>

            {/* Section 10: Contact Our Compliance Desk */}
            <section id="contact-dpo" className="bg-gradient-to-br from-slate-900 to-slate-950 text-white rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-xl scroll-mt-24">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-9 h-9 rounded-xl bg-blue-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm border border-blue-400/30">
                  10
                </div>
                <div>
                  <h2 className="text-xl sm:text-2xl font-bold text-white font-heading">
                    Contact Our Privacy & Compliance Desk
                  </h2>
                  <p className="text-xs text-cyan-300 font-mono">Direct escalation point for security & legal inquiries</p>
                </div>
              </div>

              <div className="space-y-4 text-sm text-slate-300 leading-relaxed">
                <p>
                  If you have questions regarding this Privacy Policy, wish to execute an enterprise bilateral NDA, or need to exercise your privacy rights, please connect directly with our compliance desk:
                </p>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                  <div className="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <span className="text-xs text-cyan-400 font-mono uppercase tracking-wider block mb-1">
                      General & Client Inquiries
                    </span>
                    <a 
                      href={`mailto:${siteConfig.email}`} 
                      className="text-white hover:text-cyan-300 font-bold text-sm flex items-center gap-2 transition-colors"
                    >
                      <Mail className="w-4 h-4 text-cyan-400" />
                      <span>{siteConfig.email}</span>
                    </a>
                    <p className="text-[11px] text-slate-400 mt-2">
                      Response SLA: Under 24 hours for legal and enterprise data requests.
                    </p>
                  </div>

                  <div className="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <span className="text-xs text-emerald-400 font-mono uppercase tracking-wider block mb-1">
                      Candidate & Internship Privacy
                    </span>
                    <a 
                      href={`mailto:${siteConfig.emailHr}`} 
                      className="text-white hover:text-emerald-300 font-bold text-sm flex items-center gap-2 transition-colors"
                    >
                      <Mail className="w-4 h-4 text-emerald-400" />
                      <span>{siteConfig.emailHr}</span>
                    </a>
                    <p className="text-[11px] text-slate-400 mt-2">
                      Direct mailbox for student applications, resume updates, and purge requests.
                    </p>
                  </div>
                </div>

                <div className="pt-2 flex flex-wrap items-center gap-4 text-xs text-slate-400 border-t border-white/10">
                  <span className="flex items-center gap-1.5">
                    <Phone className="w-3.5 h-3.5 text-cyan-400" />
                    <span>Phone: {siteConfig.phone}</span>
                  </span>
                  <span>•</span>
                  <a 
                    href={siteConfig.whatsappUrl} 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    className="text-emerald-400 hover:text-emerald-300 flex items-center gap-1 transition-colors"
                  >
                    <MessageSquare className="w-3.5 h-3.5" />
                    <span>Direct WhatsApp Desk</span>
                  </a>
                  <span>•</span>
                  <span className="font-mono text-slate-400">Model: {siteConfig.operatingModel}</span>
                </div>
              </div>
            </section>

            {/* Bottom Action Card */}
            <div className="p-6 rounded-3xl bg-blue-600 text-white flex flex-col sm:flex-row items-center justify-between gap-4 shadow-lg shadow-blue-600/20">
              <div>
                <h4 className="text-base font-bold font-heading">
                  Ready to discuss your enterprise IT or AI vision?
                </h4>
                <p className="text-xs text-blue-100 mt-0.5">
                  Backed by 100% intellectual property ownership and standard bilateral NDAs.
                </p>
              </div>
              <div className="flex items-center gap-2.5 shrink-0 w-full sm:w-auto">
                {onOpenQuote && (
                  <button
                    onClick={onOpenQuote}
                    className="flex-1 sm:flex-none px-4 py-2.5 rounded-xl bg-white text-blue-700 font-bold text-xs hover:bg-blue-50 transition-colors shadow-sm"
                  >
                    Request Quotation
                  </button>
                )}
                {onOpenConsultation && (
                  <button
                    onClick={onOpenConsultation}
                    className="flex-1 sm:flex-none px-4 py-2.5 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold text-xs transition-colors border border-blue-500/50"
                  >
                    Book Consultation
                  </button>
                )}
              </div>
            </div>

          </div>
        </div>
      </main>
    </div>
  );
}

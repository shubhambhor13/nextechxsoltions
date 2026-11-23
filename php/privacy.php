<?php
$page_title = "Privacy & Data Protection Policy — NexTechX Solutions";
$page_desc = "Enterprise-grade confidentiality, zero-retention defaults, and privacy compliance standards for NexTechX Solutions.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Privacy Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
            <span>Enterprise Compliance • Last Updated: November 2026</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight">
            Privacy & Data Protection Policy
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-3xl mx-auto mt-4 leading-relaxed">
            At <strong><?= SITE_NAME ?></strong>, we are committed to safeguarding your proprietary technology, commercial intellectual property, and personal data with enterprise-grade integrity.
        </p>
        <p class="mt-2 text-xs sm:text-sm text-slate-400 font-mono">
            Operating Model: <?= SITE_OPERATING_MODEL ?> • Zero-Trust Data Architecture
        </p>
    </div>
</section>

<!-- Executive Highlights Cards -->
<section class="relative -mt-8 z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3.5 border border-blue-100">
                <i data-lucide="lock" class="w-5 h-5"></i>
            </div>
            <h3 class="text-sm font-bold text-slate-900 font-heading mb-1.5">100% Client IP Ownership</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                All source code, proprietary models, business logic, and datasets developed for or shared by clients remain strictly client property under signed mutual NDAs.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-3.5 border border-indigo-100">
                <i data-lucide="eye-off" class="w-5 h-5"></i>
            </div>
            <h3 class="text-sm font-bold text-slate-900 font-heading mb-1.5">Zero Public AI Training</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                We strictly pledge never to feed, fine-tune, or leak client source code, confidential business data, or private communication records into public commercial AI models.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3.5 border border-emerald-100">
                <i data-lucide="shield-check" class="w-5 h-5"></i>
            </div>
            <h3 class="text-sm font-bold text-slate-900 font-heading mb-1.5">Zero Data Monetization</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                We never sell, broker, rent, or lease any client, visitor, or candidate information. Your data is used exclusively to evaluate, build, and support requested IT deliverables.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-3.5 border border-cyan-100">
                <i data-lucide="server" class="w-5 h-5"></i>
            </div>
            <h3 class="text-sm font-bold text-slate-900 font-heading mb-1.5">Enterprise Encryption</h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                All data transmissions are protected via TLS 1.3 encryption in-transit and AES-256 for internal credentials and databases, aligned with international zero-trust standards.
            </p>
        </div>
    </div>
</section>

<!-- Main Policy Body -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

        <!-- Sticky Index Sidebar -->
        <aside class="hidden lg:block lg:col-span-4 sticky top-28 bg-white rounded-2xl p-4 border border-slate-200 shadow-sm">
            <div class="flex items-center gap-2 px-3 py-2 border-b border-slate-100 mb-3">
                <i data-lucide="file-text" class="w-4 h-4 text-blue-600"></i>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-800 font-heading">Document Index</span>
            </div>
            <nav class="space-y-1 text-xs">
                <a href="#overview" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>1. Overview & Commitment</span>
                </a>
                <a href="#info-collected" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>2. Information We Collect</span>
                </a>
                <a href="#how-we-use" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>3. How We Use Information</span>
                </a>
                <a href="#ip-protection" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>4. Code & Client IP Confidentiality</span>
                </a>
                <a href="#internship-policy" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>5. Student & Resume Privacy</span>
                </a>
                <a href="#third-parties" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>6. Third-Party Infrastructure</span>
                </a>
                <a href="#security" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>7. Data Security & Storage</span>
                </a>
                <a href="#cookies" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>8. Cookies & Local Storage</span>
                </a>
                <a href="#rights" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>9. Your Legal Rights & Choices</span>
                </a>
                <a href="#compliance-desk" class="flex items-center gap-2 px-3 py-2 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <span>10. Contact Our Compliance Desk</span>
                </a>
            </nav>

            <div class="mt-6 pt-4 border-t border-slate-100">
                <div class="bg-slate-50 rounded-xl p-3 text-[11px] text-slate-600 space-y-1.5 border border-slate-200/60">
                    <p class="font-semibold text-slate-800 flex items-center gap-1.5">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-600"></i>
                        Direct Privacy Contact
                    </p>
                    <p class="text-slate-500">Email our compliance desk directly for data access or bilateral NDA execution:</p>
                    <a href="mailto:<?= SITE_EMAIL ?>" class="font-mono text-blue-600 hover:underline block truncate font-medium"><?= SITE_EMAIL ?></a>
                </div>
            </div>
        </aside>

        <!-- Detailed Policy Sections -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Section 1 -->
            <section id="overview" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">1</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Overview & Commitment</h2>
                </div>
                <div class="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                    <p>
                        This Privacy and Data Protection Policy governs all interactions with <strong><?= SITE_NAME ?></strong>, our official website (<code class="text-xs bg-slate-100 px-1.5 py-0.5 rounded text-blue-600 font-mono">nextechxsolutions.com</code>), subdomains, inquiry forms, AI chatbot interfaces, and remote collaboration workflows.
                    </p>
                    <p>
                        As an online-first IT solutions and artificial intelligence consultancy, our primary mandate is providing robust software architecture, automated enterprise workflows, and publication advisory. We do not operate as an advertising network, data reseller, or consumer surveillance vendor. We only collect the minimal personal or enterprise data strictly necessary to scope, architect, deliver, and support approved technological solutions.
                    </p>
                    <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100 text-xs text-blue-900">
                        <p class="font-bold mb-1">Core Guiding Principle:</p>
                        <p>&ldquo;<?= SITE_TAGLINE ?>&rdquo; means our technology empowers you without ever compromising the privacy of your users, your internal business logic, or your proprietary algorithms.</p>
                    </div>
                </div>
            </section>

            <!-- Section 2 -->
            <section id="info-collected" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">2</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Categories of Information We Collect</h2>
                </div>
                <div class="space-y-4 text-sm text-slate-600 leading-relaxed">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                            <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                                <i data-lucide="file-code" class="w-4 h-4 text-blue-600"></i>
                                Client & Project Inquiries
                            </h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li>Full Name and Corporate Designation</li>
                                <li>Official / Corporate Email Address</li>
                                <li>Phone / WhatsApp Contact Number</li>
                                <li>Organization or Institution Name</li>
                                <li>High-level project scope and tech stack preferences</li>
                            </ul>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/70">
                            <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-1.5">
                                <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-600"></i>
                                Internship Candidates
                            </h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li>Applicant Name, Email, and Phone Number</li>
                                <li>Academic institution, degree, and graduation year</li>
                                <li>Target internship track (AI, Web, App, Cloud)</li>
                                <li>Curriculum Vitae / Resume file (PDF / DOCX)</li>
                                <li>GitHub, LinkedIn, or portfolio project hyperlinks</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 3 -->
            <section id="how-we-use" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold text-sm">3</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">How We Use Collected Information</h2>
                </div>
                <div class="space-y-3 text-sm text-slate-600 leading-relaxed">
                    <p>We process collected data exclusively for legitimate technological and business execution:</p>
                    <ul class="space-y-2 text-xs">
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0"></i>
                            <span><strong>Technical Proposals & Quotes:</strong> Formulating milestone scopes, system architecture, and transparent fixed-price deliverables.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0"></i>
                            <span><strong>Sprint Updates & Demos:</strong> Conducting remote Google Meet calls and WhatsApp sprint notifications.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0"></i>
                            <span><strong>Internship Candidate Screening:</strong> Assessing technical qualification and onboarding student candidates into active internship batches.</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Section 4 -->
            <section id="ip-protection" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">4</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Code & Client IP Confidentiality</h2>
                </div>
                <div class="space-y-4 text-sm text-slate-600 leading-relaxed">
                    <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 text-xs text-amber-900 space-y-2">
                        <div class="flex items-center gap-2 font-bold text-amber-900">
                            <i data-lucide="alert-circle" class="w-4 h-4 text-amber-600"></i>
                            <span>Our Absolute &ldquo;Zero Public AI Training&rdquo; Pledge</span>
                        </div>
                        <p class="text-amber-800 leading-relaxed">
                            Under no circumstances does <?= SITE_NAME ?> feed, upload, or allow client source code, database structures, business logic, or academic research drafts to be ingested by public artificial intelligence foundation models for training purposes. All AI agent workflows developed for your systems operate in isolated, private environments.
                        </p>
                    </div>

                    <ul class="space-y-2 text-xs">
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0"></span>
                            <span><strong>100% Transfer of Deliverables:</strong> Upon payment milestone satisfaction, full intellectual property rights and repository access belong completely to the client.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0"></span>
                            <span><strong>Mutual Bilateral NDAs:</strong> We routinely execute bilateral Non-Disclosure Agreements prior to evaluating architectural blueprints or receiving proprietary credentials.</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Section 5 -->
            <section id="internship-policy" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">5</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Student & Resume Privacy Policy</h2>
                </div>
                <div class="space-y-3.5 text-sm text-slate-600 leading-relaxed">
                    <p>
                        <strong>Notice on Opportunities:</strong> <?= SITE_NAME ?> currently offers <em>Internship Opportunities only</em>. We do not have active full-time job vacancies at this time. All submissions through our Careers portal are reviewed specifically for structured internship programs.
                    </p>
                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200 space-y-2 text-xs">
                        <p class="font-bold text-slate-800">Candidate Privacy Standards:</p>
                        <ul class="space-y-1.5 list-disc list-inside text-slate-600">
                            <li>Submitted resumes and portfolios are accessible solely by our authorized HR Review Panel (<code class="font-mono text-blue-600"><?= SITE_HR_EMAIL ?></code>).</li>
                            <li>We never share, trade, or distribute applicant contact info or resumes with external commercial headhunters or job boards.</li>
                            <li>Candidate files are retained for the duration of the active evaluation cycle (maximum 6 months) and are permanently purged upon candidate request.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Section 6 -->
            <section id="third-parties" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-sm">6</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Third-Party Infrastructure</h2>
                </div>
                <div class="space-y-3 text-sm text-slate-600 leading-relaxed">
                    <p>We work exclusively with enterprise infrastructure providers maintaining high-tier security standards (TLS 1.3, ISO 27001):</p>
                    <ul class="space-y-2 text-xs">
                        <li class="flex items-start gap-2">
                            <i data-lucide="server" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5"></i>
                            <span><strong>Cloud Hosting:</strong> Enterprise-tier web infrastructure with automated SSL and DDoS shielding.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-lucide="message-square" class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span><strong>Communications:</strong> Google Workspace (Gmail, Meet), Zoom, and official Meta WhatsApp Business API channels.</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Section 7 -->
            <section id="security" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">7</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Data Security & Storage</h2>
                </div>
                <div class="space-y-3 text-sm text-slate-600 leading-relaxed">
                    <p>All browser transmissions are secured via TLS 1.3 encryption. Internal credentials, database structures, and production secrets are encrypted at rest with AES-256 under role-based access control.</p>
                </div>
            </section>

            <!-- Section 8 -->
            <section id="cookies" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">8</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Cookies & Local Storage</h2>
                </div>
                <div class="space-y-3 text-sm text-slate-600 leading-relaxed">
                    <p>Our website utilizes only essential session storage (temporary UI state, CSRF tokens, and secure admin session keys). We do not deploy third-party advertising cookies, retargeting beacons, or identity graph trackers.</p>
                </div>
            </section>

            <!-- Section 9 -->
            <section id="rights" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">9</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">Your Legal Rights & Choices</h2>
                </div>
                <div class="space-y-3 text-sm text-slate-600 leading-relaxed">
                    <p>You have full authority to request access to, rectification of, or complete erasure of any submitted inquiry or resume records. Simply email our compliance desk at <a href="mailto:<?= SITE_EMAIL ?>" class="text-blue-600 font-semibold underline"><?= SITE_EMAIL ?></a>.</p>
                </div>
            </section>

            <!-- Section 10 -->
            <section id="compliance-desk" class="bg-gradient-to-br from-slate-900 to-slate-950 text-white rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-xl scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-blue-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm border border-blue-400/30">10</div>
                    <h2 class="text-xl sm:text-2xl font-bold text-white font-heading">Contact Our Compliance Desk</h2>
                </div>
                <div class="space-y-4 text-sm text-slate-300 leading-relaxed">
                    <p>For inquiries regarding this Privacy Policy, NDA execution, or data subject requests:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                            <span class="text-xs text-cyan-400 font-mono uppercase tracking-wider block mb-1">General & Client Inquiries</span>
                            <a href="mailto:<?= SITE_EMAIL ?>" class="text-white hover:text-cyan-300 font-bold text-sm flex items-center gap-2">
                                <i data-lucide="mail" class="w-4 h-4 text-cyan-400"></i>
                                <span><?= SITE_EMAIL ?></span>
                            </a>
                        </div>
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                            <span class="text-xs text-emerald-400 font-mono uppercase tracking-wider block mb-1">Candidate & Internship Privacy</span>
                            <a href="mailto:<?= SITE_HR_EMAIL ?>" class="text-white hover:text-emerald-300 font-bold text-sm flex items-center gap-2">
                                <i data-lucide="mail" class="w-4 h-4 text-emerald-400"></i>
                                <span><?= SITE_HR_EMAIL ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="pt-2 flex flex-wrap items-center gap-4 text-xs text-slate-400 border-t border-white/10">
                        <span class="flex items-center gap-1.5">
                            <i data-lucide="phone" class="w-3.5 h-3.5 text-cyan-400"></i>
                            <span>Phone: <?= SITE_PHONE ?></span>
                        </span>
                        <span>•</span>
                        <a href="<?= SITE_WHATSAPP_URL ?>" target="_blank" class="text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                            <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                            <span>Direct WhatsApp Desk</span>
                        </a>
                        <span>•</span>
                        <span class="font-mono text-slate-400">Model: <?= SITE_OPERATING_MODEL ?></span>
                    </div>
                </div>
            </section>

        </div>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

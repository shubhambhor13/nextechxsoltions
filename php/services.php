<?php
$page_title = "Enterprise IT & AI Engineering Services";
$page_desc = "Explore enterprise technical services from NextTechX Solutions: AI Automation, Custom Web & SaaS Engineering, Cloud DevOps, Cross-Platform Mobile Apps, and Academic Research Publication.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. HERO SECTION (Clean Corporate Light Styling) -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-32 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute inset-0 bg-grid-corporate opacity-25 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading">
            <i data-lucide="layers" class="w-4 h-4 text-blue-600"></i>
            <span>Enterprise IT Engineering • Artificial Intelligence • Cloud DevOps</span>
        </div>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading">
            Enterprise IT Engineering & <br />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
                High-Impact Digital Solutions
            </span>
        </h1>

        <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            We architect production-grade software applications, autonomous AI pipelines, resilient multi-cloud infrastructures, and global research publication frameworks. Delivered with milestone precision, transparent scopes, and dedicated technical pods.
        </p>

        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 active:scale-95 font-heading">
                <span>Request a Quotation</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading">
                <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                <span>Book Strategy Call</span>
            </button>
        </div>

        <!-- Trust Value Badges Strip -->
        <div class="pt-8 max-w-4xl mx-auto grid grid-cols-2 sm:grid-cols-4 gap-3">
            <div class="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
                <span class="block text-xs font-mono uppercase tracking-wider text-slate-400">Production SLA</span>
                <span class="text-sm font-bold text-slate-900 font-heading">99.9% Uptime</span>
            </div>
            <div class="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
                <span class="block text-xs font-mono uppercase tracking-wider text-slate-400">Contracts</span>
                <span class="text-sm font-bold text-slate-900 font-heading">Milestone SOWs</span>
            </div>
            <div class="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
                <span class="block text-xs font-mono uppercase tracking-wider text-slate-400">IP Transfer</span>
                <span class="text-sm font-bold text-slate-900 font-heading">100% Client Owned</span>
            </div>
            <div class="px-3.5 py-2.5 rounded-xl bg-white/80 border border-slate-200/90 shadow-2xs text-left">
                <span class="block text-xs font-mono uppercase tracking-wider text-slate-400">Confidentiality</span>
                <span class="text-sm font-bold text-slate-900 font-heading">Mutual NDA First</span>
            </div>
        </div>
    </div>
</section>

<!-- 2. CORE ENTERPRISE PRACTICES GRID -->
<section class="py-20 lg:py-28 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
                Our Core Practices
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
                Specialized Engineering Capabilities
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                Architected for enterprise security, sub-second latency, and seamless multi-region scalability.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Practice 1: AI Automation -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-cyan-50 text-cyan-700 border-cyan-200">
                            <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                            <span>AI & Autonomous Systems</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-cyan-50 text-cyan-600 border border-cyan-200">
                            <i data-lucide="bot" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Intelligent AI Agents, RAG Chatbots & n8n Workflow Automation
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Deploy intelligent customer-facing conversational agents with enterprise vector search, official WhatsApp Cloud API triggers, autonomous multi-step pipelines, and smart OCR document processors.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Custom RAG AI Chatbots with Enterprise Vector Memory</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Official WhatsApp Business Cloud API Automated Flows</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">n8n Multi-Platform Automated Event Pipelines</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Intelligent OCR Document Extraction (Invoices, KYC, ID)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="ai-automation.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore AI Practice</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Get AI Automation Quote
                    </button>
                </div>
            </div>

            <!-- Practice 2: Web & SaaS Engineering -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-blue-50 text-blue-700 border-blue-200">
                            <i data-lucide="code-2" class="w-3.5 h-3.5"></i>
                            <span>Custom Web & SaaS Engineering</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-blue-50 text-blue-600 border border-blue-200">
                            <i data-lucide="code-2" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Scalable SaaS Platforms, Web Applications & Microservices
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Engineer ultra-responsive web applications in React 18, Next.js, and TypeScript, backed by high-throughput RESTful & GraphQL microservices in Python (FastAPI) and Node.js.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Full-Stack SaaS Platforms & Multi-Tenant Architectures</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">High-Concurrency RESTful & GraphQL API Gateways</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Enterprise Admin Portals with Role-Based Access (RBAC)</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Sub-Second Core Web Vitals & WCAG 2.1 Accessibility</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="it-services.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore Software Practice</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Get Software Quote
                    </button>
                </div>
            </div>

            <!-- Practice 3: Cloud Infrastructure & DevOps -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-indigo-50 text-indigo-700 border-indigo-200">
                            <i data-lucide="cloud" class="w-3.5 h-3.5"></i>
                            <span>Cloud Architecture & DevOps</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-indigo-50 text-indigo-600 border border-indigo-200">
                            <i data-lucide="cloud" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Zero-Downtime AWS/GCP Cloud Architecture & Docker CI/CD
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Automated Terraform infrastructure-as-code, Docker containerization, Kubernetes cluster orchestration, and resilient multi-region cloud configurations engineered for 99.99% uptime.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Kubernetes (EKS / GKE) Container Microservice Orchestration</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Automated GitHub Actions / GitLab CI/CD Delivery Pipelines</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Cloud Cost Auditing & Infrastructure Optimization (25-45% Savings)</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Disaster Recovery, Automated Backups & 24/7 Datadog Telemetry</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="it-services.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore Cloud Practice</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Request Cloud Proposal
                    </button>
                </div>
            </div>

            <!-- Practice 4: Mobile Applications -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-sky-50 text-sky-700 border-sky-200">
                            <i data-lucide="smartphone" class="w-3.5 h-3.5"></i>
                            <span>Mobile Engineering</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-sky-50 text-sky-600 border border-sky-200">
                            <i data-lucide="smartphone" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Native-Performance iOS & Android Enterprise Applications
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Modern mobile applications built with React Native and Flutter, featuring seamless offline-first local synchronization, biometric authentication, and enterprise device integrations.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Single Unified Cross-Platform Codebase for iOS & Android</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Offline-First Sync with SQLite & WatermelonDB</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Biometric Auth, Hardware Device Integration & Push Triggers</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">App Store & Google Play Production Deployment & Maintenance</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="it-services.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore Mobile Practice</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Request Mobile Proposal
                    </button>
                </div>
            </div>

            <!-- Practice 5: Data & Business Intelligence -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-emerald-50 text-emerald-700 border-emerald-200">
                            <i data-lucide="bar-chart-3" class="w-3.5 h-3.5"></i>
                            <span>Data & Business Intelligence</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-emerald-50 text-emerald-600 border border-emerald-200">
                            <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Modern Data Warehousing, ETL Pipelines & Power BI Telemetry
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Transform raw transactional records into high-performance analytical warehouses. Build automated ETL pipelines and interactive Power BI dashboards that give leadership crystal-clear clarity.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">High-Volume ETL/ELT Pipelines with Python & Apache Spark</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Snowflake, BigQuery & PostgreSQL TimescaleDB Modeling</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Interactive Power BI Executive Dashboards with Row-Level Security</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Automated KPI Alerts, Anomaly Detection & Financial Reports</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="it-services.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore Data Practice</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-blue-500 hover:bg-blue-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Request Data Proposal
                    </button>
                </div>
            </div>

            <!-- Practice 6: Research Publication -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-slate-200/90 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold font-mono border bg-amber-50 text-amber-700 border-amber-200">
                            <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                            <span>Academic & Doctoral Advisory</span>
                        </div>
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 bg-amber-50 text-amber-600 border border-amber-200">
                            <i data-lucide="book-open" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
                        Scopus, IEEE & Springer Indexed Research Manuscript Advisory
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        End-to-end guidance for university faculty, PhD candidates, and research scholars to structure novel academic manuscripts and navigate indexed peer-reviewed journal submissions.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3 font-heading">
                            Key Capabilities:
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Scopus (Q1/Q2), IEEE Xplore & Springer Nature Indexing Guidance</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Algorithmic Formulation, Mathematical Modeling & Experiments</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Turnitin Similarity Verification & Plagiarism Reduction (&lt; 10%)</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                                </div>
                                <span class="font-semibold text-slate-800 leading-snug">Peer-Review Rebuttal Handling & Camera-Ready Formatting</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center gap-3">
                    <a href="research-publication.php" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs sm:text-sm text-center shadow-xs font-heading transition-all flex items-center justify-center gap-2">
                        <span>Explore Research Advisory</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <button onclick="openQuoteModal()" class="w-full sm:flex-1 py-3 px-4 rounded-xl border border-slate-300 hover:border-amber-500 hover:bg-amber-50/40 text-slate-700 font-bold text-xs text-center transition-colors font-heading">
                        Inquire Publication Support
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. ENTERPRISE DELIVERY FRAMEWORK -->
<section class="py-20 lg:py-28 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
        
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
                Predictable Engineering Execution
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
                Our 4-Stage Delivery Framework
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                Every client engagement follows an agile, transparent lifecycle designed to eliminate technical ambiguity and ensure on-time milestone delivery.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/90 relative hover:border-blue-300 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-mono font-bold text-sm flex items-center justify-center mb-4 shadow-xs">
                    01
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">
                    Technical Discovery & SOW
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    We analyze your system requirements, data workflows, and business KPIs to deliver an exhaustive architectural blueprint with milestone deliverables and a fixed-price SOW.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/90 relative hover:border-blue-300 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-mono font-bold text-sm flex items-center justify-center mb-4 shadow-xs">
                    02
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">
                    Architecture & Prototype
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Our architects map database schemas, API contracts, security protocols, and interactive Figma UI prototypes for stakeholder validation before coding begins.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/90 relative hover:border-blue-300 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-mono font-bold text-sm flex items-center justify-center mb-4 shadow-xs">
                    03
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">
                    Agile Sprints & QA
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Development proceeds in transparent bi-weekly sprints with automated CI/CD unit testing, end-to-end integration checks, and live staging previews.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/90 relative hover:border-blue-300 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white font-mono font-bold text-sm flex items-center justify-center mb-4 shadow-xs">
                    04
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">
                    Zero-Downtime Deploy & SLAs
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    We handle production rollouts with automated database migrations, comprehensive IP & source handover, real-time APM telemetry, and dedicated SLA support.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- 4. ENTERPRISE GOVERNANCE & GUARANTEES -->
<section class="py-20 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">
                Enterprise Governance
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
                Enterprise-Grade Assurances
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                Contractually guaranteed security, absolute confidentiality, and complete IP transfer.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="lock" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading">
                    100% IP & Code Ownership
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Complete transfer of all repository commits, cloud configurations, schemas, and intellectual property directly to your organization upon project completion.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading">
                    Transparent Milestone SOWs
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Fixed-scope deliverables and milestone billing in Indian Rupees (₹) or USD ($). Zero hidden fees or unexpected infrastructure charges.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading">
                    Strict Mutual Confidentiality
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Enforceable non-disclosure agreements (NDAs) signed prior to discovery calls to safeguard proprietary IP, business secrets, and database schemas.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
                <h4 class="text-base font-bold text-slate-900 font-heading">
                    Guaranteed Production SLAs
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Production deployments backed by 99.9% uptime targets, continuous automated health checks, and rapid incident response pods.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- 5. CAREERS & TALENT CALLOUT (Dedicated, Non-Service Section) -->
<section class="py-12 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-slate-50 via-blue-50/50 to-slate-50 rounded-2xl p-6 sm:p-8 border border-blue-200/70 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                    <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                </div>
                <div class="space-y-1">
                    <h4 class="text-lg font-bold text-slate-900 font-heading">
                        Looking for Engineering Careers or Hands-On Internship Programs?
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 max-w-2xl">
                        We mentor early-career developers and offer interview-based production internships across 6 specialized technology tracks.
                    </p>
                </div>
            </div>
            <a href="careers.php" class="px-6 py-3 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-800 font-bold text-xs sm:text-sm shrink-0 shadow-2xs font-heading transition-all flex items-center gap-2">
                <span>Explore Careers & Internships</span>
                <i data-lucide="arrow-right" class="w-4 h-4 text-blue-600"></i>
            </a>
        </div>
    </div>
</section>

<!-- 6. BOTTOM CTA HERO BANNER -->
<section class="py-20 bg-gradient-to-b from-slate-950 via-[#0B1428] to-[#0F1D3D] text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute top-1/2 -right-40 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 -left-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-cyan-300 text-xs font-mono">
            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-cyan-400"></i>
            <span>Milestone-Based Fixed Scopes • Rapid 24-Hour Quotations</span>
        </div>

        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white font-heading tracking-tight leading-tight">
            Ready to Accelerate Your Digital Transformation?
        </h3>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Discuss your technical requirements with a Solutions Architect. Receive an actionable roadmap and fixed-price proposal within 24 hours.
        </p>

        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-lg shadow-blue-500/25 transition-all font-heading active:scale-95 flex items-center gap-2">
                <span>Request Custom Quotation</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
            <button onclick="openConsultationModal()" class="px-8 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-cyan-400"></i>
                <span>Book Strategy Call</span>
            </button>
            <a href="contact.php" class="px-6 py-3.5 rounded-xl border border-white/15 hover:bg-white/5 text-slate-300 font-bold text-sm font-heading transition-colors">
                Contact Us Directly
            </a>
        </div>

        <div class="pt-4 text-xs text-slate-400 font-mono">
            Direct Inquiries: <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="text-cyan-400 hover:underline"><?= SITE_EMAIL_CONTACT ?></a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

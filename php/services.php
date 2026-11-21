<?php
$page_title = "Enterprise Services & Solutions";
$page_desc = "Explore specialized technical services from NextTechX Solutions: AI Automation, Custom Web & SaaS, Cloud DevOps, Mobile Apps, Data Analytics, Data Annotation, and Academic Research Publication.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section: Clean White Background, Navy Typography, Corporate Matrix Visual -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-20 bg-white border-b border-slate-200/80 overflow-hidden">
    <!-- Subtle grid background -->
    <div class="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Heading, Value Proposition & Actions -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold tracking-wide uppercase font-mono">
                    <i data-lucide="layers" class="w-3.5 h-3.5 text-blue-600"></i>
                    <span>Enterprise Technical Practices</span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-[1.15] font-heading">
                    Full-Lifecycle Digital Engineering & <br />
                    <span class="text-blue-600">Advanced Technology Services.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
                    From custom software engineering and enterprise cloud architecture to autonomous AI agents, machine learning data annotation, and indexed academic publications. Delivered with structured milestone clarity and institutional accountability.
                </p>

                <!-- Key Assurance Indicators -->
                <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-xs sm:text-sm text-slate-700 pt-1">
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0"></i>
                        <span class="font-medium">Milestone-Based SOWs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0"></i>
                        <span class="font-medium">Full Code & IP Ownership</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600 shrink-0"></i>
                        <span class="font-medium">Direct Architect Access</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm hover:shadow transition-all flex items-center gap-2 active:scale-95 font-heading">
                        <span>Request a Quotation</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all flex items-center gap-2 font-heading">
                        <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                        <span>Schedule Architecture Call</span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Technology Visual (Capability Matrix) -->
            <div class="lg:col-span-5">
                <div class="bg-slate-50/90 rounded-2xl p-6 sm:p-7 border border-slate-200/90 shadow-sm relative">
                    <!-- Visual Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-slate-200/80 mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-amber-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-400"></div>
                            <span class="ml-2 text-xs font-mono font-bold text-slate-700 uppercase tracking-wider">
                                Engineering Capability Matrix
                            </span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-mono font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>8 Practices Active</span>
                        </div>
                    </div>

                    <!-- Capability Matrix Rows -->
                    <div class="space-y-2.5">
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">AI & Workflow Automation</h4>
                                    <p class="text-[11px] text-slate-500">Autonomous Agents • WhatsApp API • n8n</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Enterprise</span>
                        </div>

                        <div class="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="check-square" class="w-3.5 h-3.5"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Data Annotation Services</h4>
                                    <p class="text-[11px] text-slate-500">Image, Text, Video & Bounding Boxes</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">99%+ SLA</span>
                        </div>

                        <div class="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="code-2" class="w-3.5 h-3.5"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Web, Cloud & Mobile</h4>
                                    <p class="text-[11px] text-slate-500">React, Python, AWS Docker & Microservices</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Full-Stack</span>
                        </div>

                        <div class="p-3 rounded-xl bg-white border border-slate-200/80 flex items-center justify-between shadow-2xs">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Research & Internships</h4>
                                    <p class="text-[11px] text-slate-500">Scopus/IEEE Publications & Engineering Talent</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">Verified</span>
                        </div>
                    </div>

                    <!-- Blueprint Footer -->
                    <div class="mt-4 pt-3.5 border-t border-slate-200/80 flex items-center justify-between text-[11px] text-slate-500 font-mono">
                        <span>Delivery: Online-First Global</span>
                        <span class="text-blue-600 font-medium">Bilateral NDA Protected</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. Services Grid Section: Category Filters + 2-Column Equal-Height Cards -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <span>Complete Service Catalog</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our Core Technical Practices
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Every practice is delivered with structured milestone scopes, verifiable technical deliverables, and dedicated senior engineering oversight.
            </p>

            <!-- Interactive Category Filter Pills -->
            <div class="pt-4 flex flex-wrap items-center justify-center gap-2" id="service-filter-container">
                <button onclick="filterServices('all')" id="btn-filter-all" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all font-heading bg-blue-600 text-white shadow-xs">
                    All Services (8)
                </button>
                <button onclick="filterServices('ai-data')" id="btn-filter-ai-data" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all font-heading bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50">
                    AI & Data Solutions (3)
                </button>
                <button onclick="filterServices('software-cloud')" id="btn-filter-software-cloud" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all font-heading bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50">
                    Software & Cloud (3)
                </button>
                <button onclick="filterServices('academic-careers')" id="btn-filter-academic-careers" class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all font-heading bg-white border border-slate-200 text-slate-600 hover:border-slate-300 hover:bg-slate-50">
                    Academic & Careers (2)
                </button>
            </div>
        </div>

        <!-- Equal-Height Grid: 2 Columns on Desktop -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch" id="services-grid">
            
            <!-- Service 1: AI Automation -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="ai-data">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="bot" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            AI & Autonomous Systems
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Intelligent AI Agents, RAG Chatbots & n8n Workflow Automation
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Deploy intelligent customer-facing conversational agents with enterprise vector search, official WhatsApp Cloud API triggers, autonomous multi-step pipelines, and smart OCR document processors.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Custom RAG AI Chatbots with Vector Memory</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Official WhatsApp Business Cloud API Flows</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">n8n Multi-Platform Automated Event Pipelines</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Intelligent OCR (Invoices, KYC, ID Cards)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Fixed Milestone SOW • Production Deployment</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="ai-automation.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore AI Practice</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Get AI Quote
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 2: Custom Web & SaaS Engineering -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="software-cloud">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="code-2" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Custom Web & SaaS Engineering
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Scalable SaaS Platforms, Web Applications & Microservices
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Engineer ultra-responsive web applications in React 18, Next.js, and TypeScript, backed by high-throughput RESTful & GraphQL microservices in Python (FastAPI) and Node.js.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Full-Stack SaaS Platforms & Multi-Tenancy</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">High-Concurrency RESTful & GraphQL APIs</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Enterprise Admin Portals with RBAC Security</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Sub-Second Core Web Vitals & WCAG 2.1</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Clean Architecture • 100% Code Ownership</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Web Engineering</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Get Software Quote
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 3: Cloud Architecture & DevOps -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="software-cloud">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="cloud" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Cloud Architecture & DevOps
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Zero-Downtime AWS/GCP Cloud Architecture & Docker CI/CD
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Automated Terraform infrastructure-as-code, Docker containerization, Kubernetes cluster orchestration, and resilient multi-region cloud configurations engineered for 99.99% uptime.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Kubernetes (EKS / GKE) Container Orchestration</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Automated GitHub Actions & GitLab CI/CD</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Cloud Cost Audits (25-45% Spend Savings)</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Disaster Recovery, Auto-Backups & 24/7 Monitoring</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">99.99% Uptime • Infrastructure as Code</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Cloud DevOps</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Request Cloud Proposal
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 4: Mobile Engineering -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="software-cloud">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="smartphone" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Mobile Engineering
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Native-Performance iOS & Android Enterprise Applications
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Modern mobile applications built with React Native and Flutter, featuring seamless offline-first local synchronization, biometric authentication, and enterprise device integrations.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Single Unified Codebase for iOS & Android</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Offline-First Sync with SQLite & WatermelonDB</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Biometric Auth, Hardware & Push Triggers</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">App Store & Play Store Production Release</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Cross-Platform Store Release • Offline-First</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Mobile Apps</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Request Mobile Quote
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 5: Data & Business Intelligence -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="ai-data">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="bar-chart-3" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Data & Business Intelligence
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Modern Data Warehousing, ETL Pipelines & Power BI Telemetry
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Transform raw transactional records into high-performance analytical warehouses. Build automated ETL pipelines and interactive Power BI dashboards that give leadership crystal-clear clarity.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">High-Volume ETL/ELT Pipelines (Python/Spark)</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Snowflake, BigQuery & PostgreSQL Modeling</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Interactive Power BI Dashboards with RLS</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Automated KPI Alerts & Financial Telemetry</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Single Source of Truth • Real-Time Analytics</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Data Analytics</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Request Data Proposal
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 6: Data Annotation Services (NEW!) -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="ai-data">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="check-square" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            AI & Machine Learning Data
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Professional Data Annotation & Labeling Solutions
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Professional data annotation and labeling solutions for AI and Machine Learning projects. High-precision human-in-the-loop annotation pipelines ensuring enterprise-grade ground-truth datasets for production models.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Image Annotation (Polygons & Keypoints)</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Text Annotation & NER Entity Tagging</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Video Annotation & Multi-Frame Tracking</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Structured Data Labeling & Categorization</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Multi-Class Image Classification</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Object Detection and 2D/3D Bounding Boxes</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Multi-Format (JSON, YOLO, COCO) • 99%+ SLA</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="contact.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Inquire Data Solutions</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Get Annotation Quote
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 7: Academic & Doctoral Advisory -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="academic-careers">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="book-open" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Academic & Doctoral Advisory
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Research Paper Structuring, Writing & Global Indexed Publication
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        End-to-end guidance for university faculty, PhD scholars, and students to structure novel academic manuscripts and navigate peer-reviewed indexed submissions in Scopus, IEEE Xplore, and Springer Nature.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Scopus (Q1/Q2), IEEE Xplore & Springer Guidance</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Mathematical Modeling & Algorithmic Design</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Turnitin Similarity Verification (&lt; 10% Strict)</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Camera-Ready Formatting & Rebuttal Assistance</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Peer-Reviewed Target • Full Confidentiality</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="research-publication.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Research Advisory</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Inquire Advisory
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service 8: Careers & Internships -->
            <div class="service-item bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left" data-category="academic-careers">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="graduation-cap" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Careers & Internships
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Job Vacancies & Hands-On Production Internship Programs
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Explore full-time engineering vacancies and structured interview-based production internships. Work on live enterprise client systems and build verified production experience under engineering mentorship.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Current Job Vacancies (0-2 Yrs Experience)</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">6 Specialized Technical Internship Tracks</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Live Production Project Experience</span>
                            </li>
                            <li class="flex items-start gap-2 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Verified Experience Letters & HR Credentials</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Framework:</span>
                        <span class="font-medium text-slate-700">Online-First Delivery • Verified Credentials</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="careers.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore Opportunities</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <a href="careers.php#apply" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Apply Now</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 3. Why Choose Us: Corporate Approach & Engineering Standards -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Institutional Standards</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Why Organizations Partner With NextTechX
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                We operate with corporate-grade discipline. Our technical engagements prioritize structural accountability, verifiable progress, and lasting value.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-50/60 rounded-2xl p-6 border border-slate-200/80 text-left space-y-3 hover:border-blue-200 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="file-check" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">
                    Milestone-Based Delivery
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Every project operates with clearly defined deliverables, verifiable technical acceptance criteria, and phased approval gates. Zero hidden fees or scope ambiguity.
                </p>
            </div>

            <div class="bg-slate-50/60 rounded-2xl p-6 border border-slate-200/80 text-left space-y-3 hover:border-blue-200 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="cpu" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">
                    Production-Grade Engineering
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    We adhere strictly to modern architectural standards, modular microservice patterns, strict type-safety, automated testing, and comprehensive documentation.
                </p>
            </div>

            <div class="bg-slate-50/60 rounded-2xl p-6 border border-slate-200/80 text-left space-y-3 hover:border-blue-200 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">
                    Architect-Led Collaboration
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Work directly with seasoned software engineers and technical leads throughout the lifecycle. Enjoy transparent weekly sprint reviews and proactive async updates.
                </p>
            </div>

            <div class="bg-slate-50/60 rounded-2xl p-6 border border-slate-200/80 text-left space-y-3 hover:border-blue-200 transition-colors">
                <div class="w-10 h-10 rounded-xl bg-blue-100/70 text-blue-700 flex items-center justify-center shrink-0">
                    <i data-lucide="lock" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold text-slate-900 font-heading">
                    Complete IP & Data Protection
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Clients retain 100% intellectual property ownership upon milestone completion, backed by enforceable bilateral non-disclosure agreements (NDA) and secure protocols.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- 4. Contact CTA: Professional Closing Banner with Clear Contact Options -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="rounded-3xl border border-slate-200 bg-slate-50/70 p-8 sm:p-12 lg:p-14 space-y-6 shadow-2xs">
            
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold font-mono">
                <span>Initiate Your Engagement</span>
            </div>

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
                Ready to Discuss Your Project Requirements?
            </h2>

            <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Connect directly with our solutions engineering team. We assess technical specifications, provide architectural recommendations, and furnish fixed-scope milestone quotations within 24 to 48 hours.
            </p>

            <div class="pt-2 flex flex-wrap items-center justify-center gap-3.5">
                <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                    <span>Request Custom Quotation</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
                <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                    <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                    <span>Schedule Strategy Call</span>
                </button>
                <a href="contact.php" class="px-6 py-3.5 rounded-xl border border-slate-200 hover:bg-white text-slate-700 font-semibold text-sm transition-colors font-heading">
                    Contact Us Directly
                </a>
            </div>

            <div class="pt-4 border-t border-slate-200/70 text-xs text-slate-500 font-mono flex flex-wrap items-center justify-center gap-4 sm:gap-6">
                <span>Inquiries: <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="text-blue-600 hover:underline"><?= SITE_EMAIL_CONTACT ?></a></span>
                <span>•</span>
                <span>Recruitment: <a href="mailto:<?= SITE_EMAIL_HR ?>" class="text-blue-600 hover:underline"><?= SITE_EMAIL_HR ?></a></span>
                <span>•</span>
                <span><?= SITE_DELIVERY_MODEL ?></span>
            </div>

        </div>
    </div>
</section>

<!-- Category Filter Script -->
<script>
function filterServices(category) {
    const items = document.querySelectorAll('.service-item');
    const buttons = document.querySelectorAll('.filter-btn');

    // Update active button styles
    buttons.forEach(btn => {
        btn.classList.remove('bg-blue-600', 'text-white', 'shadow-xs');
        btn.classList.add('bg-white', 'border', 'border-slate-200', 'text-slate-600');
    });

    const activeBtn = document.getElementById('btn-filter-' + category);
    if (activeBtn) {
        activeBtn.classList.remove('bg-white', 'border', 'border-slate-200', 'text-slate-600');
        activeBtn.classList.add('bg-blue-600', 'text-white', 'shadow-xs');
    }

    // Filter items
    items.forEach(item => {
        if (category === 'all' || item.getAttribute('data-category') === category) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });

    if (window.lucide) {
        lucide.createIcons();
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

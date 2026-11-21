<?php
$page_title = "Enterprise Services & Solutions";
$page_desc = "Explore specialized technical services from NextTechX Solutions: AI Automation, Custom Software, Enterprise Cloud, Academic Research Publication, and Technical Internships.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section: Clean White Background, Navy Typography, Tech Visual -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-white border-b border-slate-200/80 overflow-hidden">
    <!-- Subtle grid background -->
    <div class="absolute inset-0 bg-grid-corporate opacity-40 pointer-events-none"></div>
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
                    Engineering Solutions <br />
                    <span class="text-blue-600">Built for Enterprise Scale.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
                    From autonomous AI agents and cloud microservices to indexed academic publications and structured internships. Delivered with clear milestone scopes, transparent pricing, and dedicated engineering oversight.
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

            <!-- Right Column: Technology Visual (Architecture Blueprint) -->
            <div class="lg:col-span-5">
                <div class="bg-slate-50/90 rounded-2xl p-6 sm:p-7 border border-slate-200/90 shadow-sm relative">
                    <!-- Visual Header -->
                    <div class="flex items-center justify-between pb-5 border-b border-slate-200/80 mb-5">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-400/80"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400/80"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400/80"></div>
                            <span class="ml-2 text-xs font-mono font-bold text-slate-700 uppercase tracking-wider">
                                Technical Architecture Blueprint
                            </span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-mono font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Production Ready</span>
                        </div>
                    </div>

                    <!-- Architecture Layers -->
                    <div class="space-y-3">
                        
                        <!-- Layer 1 -->
                        <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="bot" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">AI & Workflow Layer</h4>
                                    <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">RAG • Agents</span>
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                                    Autonomous n8n pipelines, WhatsApp Cloud API, Vector DBs
                                </p>
                            </div>
                        </div>

                        <!-- Layer 2 -->
                        <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="code-2" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Cloud & Microservices</h4>
                                    <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">React • Node • Py</span>
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                                    RESTful & GraphQL microservices, Docker CI/CD, AWS Cloud
                                </p>
                            </div>
                        </div>

                        <!-- Layer 3 -->
                        <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="book-open" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Academic & Research Core</h4>
                                    <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">Scopus • IEEE</span>
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                                    Mathematical modeling, algorithms, Turnitin &lt;10% verification
                                </p>
                            </div>
                        </div>

                        <!-- Layer 4 -->
                        <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 flex items-start gap-3 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-xs font-bold text-slate-900 font-heading">Engineering Talent Lab</h4>
                                    <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-1.5 py-0.5 rounded">Live Projects</span>
                                </div>
                                <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                                    Production internships across 6 specialized technology tracks
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Blueprint Footer -->
                    <div class="mt-5 pt-4 border-t border-slate-200/80 flex items-center justify-between text-[11px] text-slate-500 font-mono">
                        <span>Governance: ISO-Aligned</span>
                        <span class="text-blue-600 font-medium">Bilateral NDA Covered</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. Services Grid: 2x2 Equal-Height Card Layout -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <span>Core Service Catalog</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Specialized Technology Practices
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Every practice is led by senior engineering architects with transparent delivery scopes, verifiable technical milestones, and comprehensive code handover.
            </p>
        </div>

        <!-- Equal-Height 2x2 Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- Practice 1: AI Automation -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left">
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
                        Intelligent AI Agents, RAG Chatbots & Workflow Automation
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Architect and deploy bespoke conversational AI agents, official WhatsApp Cloud API triggers, autonomous multi-step pipelines (n8n), and intelligent OCR document extraction that eliminate manual operational bottlenecks.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="space-y-2.5">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Custom RAG AI Chatbots with Enterprise Context</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Official WhatsApp Business Cloud API Integration</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">n8n Multi-Platform Automated Pipelines</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Intelligent OCR for Invoices, Receipts & KYC</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Standard Framework:</span>
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

            <!-- Practice 2: Software Engineering -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left">
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                            <i data-lucide="code-2" class="w-6 h-6 stroke-[1.8]"></i>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-800 border border-blue-200/70">
                            Software & Cloud Engineering
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading leading-snug">
                        Enterprise Web Applications, Microservices & Cloud Infrastructure
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        From early MVP architectures to high-concurrency production platforms. We engineer ultra-responsive web applications, resilient backend microservices in Python & Node.js, and multi-region cloud infrastructures.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="space-y-2.5">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Full-Stack SaaS Platforms & Modern Web Applications</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">High-Throughput RESTful & GraphQL Microservices</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Automated Docker CI/CD & AWS Cloud Architecture</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Transparent Milestone-Based Delivery SOWs</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between text-xs font-mono text-slate-500">
                        <span class="text-slate-400">Standard Framework:</span>
                        <span class="font-medium text-slate-700">Clean Architecture • 100% Code Ownership</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs sm:text-sm text-center shadow-xs transition-colors font-heading flex items-center justify-center gap-2">
                            <span>Explore IT Practice</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <button onclick="openQuoteModal()" class="w-full py-3 px-4 rounded-xl border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-semibold text-xs sm:text-sm text-center transition-colors font-heading">
                            Get Software Quote
                        </button>
                    </div>
                </div>
            </div>

            <!-- Practice 3: Research Publication -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left">
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
                        <ul class="space-y-2.5">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Scopus (Q1/Q2), IEEE Xplore & Springer Guidance</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Mathematical Modeling & Algorithmic Design</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Turnitin Similarity Verification (&lt; 10% Strict)</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
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
                        <span class="text-slate-400">Standard Framework:</span>
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

            <!-- Practice 4: Careers & Internships -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-blue-300 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between h-full text-left">
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
                        Engineering Vacancies & Hands-On Production Internships
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Structured interview-based production internships and early-career vacancies. Work directly on live client systems, contribute to production codebases, and earn verified credentials under senior mentorship.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities & Deliverables:
                        </h4>
                        <ul class="space-y-2.5">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Current Job Vacancies (0-2 Yrs Experience Tracks)</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">6 Specialized Technical Internship Tracks</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Live Production Project Experience</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
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
                        <span class="text-slate-400">Standard Framework:</span>
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

<!-- 3. Why Choose Us: Corporate Approach & Engineering Capabilities -->
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

<?php require_once __DIR__ . '/includes/footer.php'; ?>

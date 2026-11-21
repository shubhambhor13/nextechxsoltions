<?php
$page_title = "BPO Services — NEXTECHX SOLUTIONS";
$page_desc = "Scalable back-office operations, multichannel customer support, and business processing.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section with Interactive Operations Hub Graphic -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-[500px] h-[500px] bg-blue-700/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">BPO Services</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-7 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="headphones" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-slate-100 text-slate-800 border border-slate-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-700 animate-pulse"></span>
                        <span>Business Process Outsourcing</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    BPO Services
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl">
                    Our BPO Services practice delivers reliable, SLA-backed operational management for growing enterprises. By delegating data-intensive administrative tasks, back-office processing, and multichannel customer inquiries to our dedicated teams, organizations reduce operating overhead, eliminate staffing bottlenecks, and focus their internal resources on strategic growth.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-800 hover:from-blue-800 hover:to-indigo-900 text-white font-bold text-sm shadow-md transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span>Inquire About BPO Services</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                        <i data-lucide="phone-call" class="w-4 h-4 text-blue-700"></i>
                        <span>Book Strategy Call</span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Bespoke High-Tech Illustration / Interactive Graphic -->
            <div class="lg:col-span-5">
                <div class="relative w-full max-w-lg mx-auto">
                    <div class="absolute -inset-2 bg-gradient-to-r from-blue-700/20 via-slate-800/30 to-indigo-900/30 rounded-3xl blur-xl opacity-70 pointer-events-none"></div>
                    <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                <span class="ml-2 text-xs font-mono text-slate-400">Operations Command Hub — Desk 01</span>
                            </div>
                            <span class="text-[10px] font-mono text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">
                                SLA: 99.4%
                            </span>
                        </div>

                        <div class="p-5 grid grid-cols-2 gap-3 text-xs">
                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">First Response Time</span>
                                <span class="text-xl font-black text-cyan-400 font-heading">42s</span>
                                <span class="text-[10px] text-slate-400 font-mono block">Benchmark: &lt;60s</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Daily Throughput</span>
                                <span class="text-xl font-black text-white font-heading">5,400+</span>
                                <span class="text-[10px] text-emerald-400 font-mono block">Tickets & Records</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Quality Audit</span>
                                <span class="text-xl font-black text-emerald-400 font-heading">99.2%</span>
                                <span class="text-[10px] text-slate-400 font-mono block">Secondary Review</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Coverage Model</span>
                                <span class="text-xl font-black text-white font-heading">24/7/365</span>
                                <span class="text-[10px] text-slate-400 font-mono block">Redundant Shifts</span>
                            </div>
                        </div>

                        <div class="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
                            <span class="text-blue-400">● Zendesk • Freshdesk • Custom ERP</span>
                            <span class="text-slate-300">ISO 9001 / SOC 2 Aligned</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Practice Value Drivers / Highlights Strip -->
<section class="bg-slate-50/80 border-b border-slate-200/80 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-left">
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Delivery Framework</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Dedicated Operations Pods</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Security & Legal</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Strict NDA & Clean Desk</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">SLA Governance</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">99.4% Accuracy Contract</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Architecture</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Encrypted VPN Terminals</span>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Concepts Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Operational Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Fundamental operational concepts and governance standards underpinning our BPO implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="briefcase" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">01</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Business Process Management (BPM)</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Systematic mapping, execution, and continuous optimization of recurring corporate operational workflows.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="users" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">02</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Operational Support & Scaling</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Flexible, dedicated workforce capacity that scales up or down with seasonal peaks and business volume changes.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="file-spreadsheet" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">03</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Data Processing & Digitisation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Rapid conversion of unstructured physical or digital records into clean, validated enterprise databases.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="headphones" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">04</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multichannel Customer Experience</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Professional customer engagement across email, live chat, ticketing systems, and social touchpoints.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="check-circle" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">05</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">SLA & Quality Governance</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Contractual Service Level Agreements (SLAs) with strict accuracy benchmarks, turnaround timeframes, and audit reports.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="shield" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">06</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Information Security & NDAs</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Strict data privacy protocols, role-based terminal access, and mutual non-disclosure agreements protecting corporate records.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer Section -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                What We Offer
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Tailored capabilities and modular operational solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">High-Volume Data Entry & Cleansing</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Accurate digitization, database de-duplication, format standardisation, and validation of corporate records.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Back-Office Operational Support</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Routine administrative operations, invoice verification, transaction logging, and reconciliation tasks.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multichannel Customer Support</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Dedicated tier-1 and tier-2 customer support covering email, live web chat, and Zendesk/Freshdesk ticketing.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">eCommerce Catalog Management</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Product listings, SKU attribute population, inventory level updates, and marketplace catalog maintenance.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Document Indexing & Archiving</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Digital filing, metadata tagging, categorization, and secure archiving of corporate contracts and forms.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality Assurance & Compliance Auditing</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Independent secondary audits of operational outputs to ensure full regulatory and corporate standard adherence.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Operational Systems & Tools Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Operational Tooling</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Operational Systems & Platforms
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Industry-standard helpdesk, CRM, and communication platforms leveraged across our BPO operations.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Ticketing Systems</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Zendesk & Freshdesk</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Customer Support</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Intercom & LiveChat</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Data Tools</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Google Workspace & Office 365</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">CRM Ecosystem</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Salesforce & HubSpot CRM</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Integration</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Custom ERP Gateways</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Security</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Encrypted Secure Terminals</span>
            </div>
        </div>
    </div>
</section>

<!-- 6. Our Workflow (Connected Step-by-Step Pipeline) -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Execution Pipeline</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our End-to-End Workflow
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative">
            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 01</span>
                        <span class="text-slate-300 text-xs font-mono">01 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Requirement Analysis & Scoping</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Auditing current operational processes, volume volumes, turnaround requirements, and defining strict SLA benchmarks.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Operational Process Audit & Baseline SLA Benchmarks</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 02</span>
                        <span class="text-slate-300 text-xs font-mono">02 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Process Planning & SOP Formulation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Authoring comprehensive Standard Operating Procedures (SOPs), quality checklists, and escalation matrix protocols.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Standard Operating Procedures (SOPs) & Checklists</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 03</span>
                        <span class="text-slate-300 text-xs font-mono">03 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Team Training & Pilot Trial</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Rigorous training of dedicated operators on client tooling, followed by a controlled pilot execution run.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Trained Dedicated Pod & Pilot Validation Report</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 04</span>
                        <span class="text-slate-300 text-xs font-mono">04 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Full-Scale Production Execution</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Day-to-day operational execution under dedicated team leads with continuous process adherence.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Full Operational Transition & Live Ticket Routing</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 05</span>
                        <span class="text-slate-300 text-xs font-mono">05 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Quality Checking & Auditing</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Randomized secondary auditing of processed batches to maintain >99% operational accuracy SLAs.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Randomized Daily QA Audits (&gt;99% Accuracy)</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-slate-100 text-slate-800 border border-slate-300">Step 06</span>
                        <span class="text-slate-300 text-xs font-mono">06 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Daily Reporting & KPI Delivery</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Real-time productivity dashboards, daily throughput metrics, and monthly strategic review presentations.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Real-Time Productivity KPI Dashboard</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Applications & Use Cases Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Applications & Use Cases
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Real-world operational implementations delivering measurable outcomes for our clients.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-400 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Consumer Tech & High-Growth eCommerce
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Customer Service Outsourcing for Tech & Retail
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Handling high volumes of customer return inquiries, account questions, and basic technical troubleshooting.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>45-Second Average Response Time on Live Queues</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-400 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Real Estate & Title Insurance
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Real Estate & Legal Document Processing
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Indexation, title search verification, and standardized digital archiving of property contracts and filings.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Zero-Backlog Property Document Verification</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-400 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Corporate Finance & Shared Services
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Finance & Accounts Payable Triage
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Validating vendor invoices, matching receipt items, and staging accounting entries for controller approval.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>100% On-Time Vendor Invoice Reconciliations</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-400 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Healthcare Provider Networks
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Healthcare Patient Records Administration
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        HIPAA-aligned scheduling, intake form digitization, and administrative patient database upkeep.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>HIPAA-Compliant Patient Intake & Scheduling</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-blue-700/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-blue-300 border border-white/15 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-400"></i>
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            Ready to Streamline Back-Office & Customer Operations?
        </h2>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Connect directly with our operations directors to evaluate your required headcount, SLA targets, and workflows.
        </p>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold text-sm shadow-lg shadow-blue-600/20 transition-all font-heading flex items-center gap-2 active:scale-95">
                <span>Inquire About BPO Teams</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading">
                Request Quotation
            </button>

            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-blue-400"></i>
                <span>Book Operations Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

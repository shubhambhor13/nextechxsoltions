<?php
$page_title = "BPO Services — NEXTECHX SOLUTIONS";
$page_desc = "Scalable back-office operations, multichannel customer support, and business processing.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-96 h-96 bg-slate-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-6">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">BPO Services</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="headphones" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-slate-100 text-slate-800 border border-slate-300">
                        Business Process Outsourcing
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    BPO Services
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Our BPO Services practice delivers reliable, SLA-backed operational management for growing enterprises. By delegating data-intensive administrative tasks, back-office processing, and multichannel customer inquiries to our dedicated teams, organizations reduce operating overhead, eliminate staffing bottlenecks, and focus their internal resources on strategic growth.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-800 hover:from-blue-800 hover:to-indigo-900 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                        <span>Inquire About BPO Services</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors font-heading">
                        Request Quotation
                    </button>
                </div>
            </div>

            <!-- Right Column: Quick Highlights Panel -->
            <div class="lg:col-span-4">
                <div class="bg-slate-50/90 rounded-2xl p-6 border border-slate-200/90 shadow-2xs space-y-4">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider font-mono flex items-center gap-2">
                        <i data-lucide="activity" class="w-4 h-4 text-blue-700"></i>
                        <span>Practice Snapshot</span>
                    </h3>

                    <div class="space-y-3 text-xs text-slate-600">
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">SLA Benchmark</span>
                            <span>99.2% Accuracy • Strict Turnaround</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Workforce Scaling</span>
                            <span>Elastic Capacity with Dedicated Team Leads</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Data Security</span>
                            <span>Encrypted Terminals & Mutual Non-Disclosure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Core Concepts Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Operational Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Fundamental operational concepts and governance standards underpinning our BPO implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">01</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Business Process Management (BPM)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Systematic mapping, execution, and continuous optimization of recurring corporate operational workflows.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">02</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Operational Support & Scaling</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Flexible, dedicated workforce capacity that scales up or down with seasonal peaks and business volume changes.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">03</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Data Processing & Digitisation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Rapid conversion of unstructured physical or digital records into clean, validated enterprise databases.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">04</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Multichannel Customer Experience</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Professional customer engagement across email, live chat, ticketing systems, and social touchpoints.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">05</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">SLA & Quality Governance</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Contractual Service Level Agreements (SLAs) with strict accuracy benchmarks, turnaround timeframes, and audit reports.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-slate-400 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-slate-200/80 text-slate-800 flex items-center justify-center font-bold text-xs font-mono">06</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Information Security & NDAs</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Strict data privacy protocols, role-based terminal access, and mutual non-disclosure agreements protecting corporate records.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Offerings Section -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our Specific Offerings
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Tailored capabilities and modular operational solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">High-Volume Data Entry & Cleansing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Accurate digitization, database de-duplication, format standardisation, and validation of corporate records.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Back-Office Operational Support</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Routine administrative operations, invoice verification, transaction logging, and reconciliation tasks.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multichannel Customer Support</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Dedicated tier-1 and tier-2 customer support covering email, live web chat, and Zendesk/Freshdesk ticketing.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">eCommerce Catalog Management</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Product listings, SKU attribute population, inventory level updates, and marketplace catalog maintenance.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Document Indexing & Archiving</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Digital filing, metadata tagging, categorization, and secure archiving of corporate contracts and forms.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality Assurance & Compliance Auditing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Independent secondary audits of operational outputs to ensure full regulatory and corporate standard adherence.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Tools & Technology Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Operational Tooling</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Operational Systems & Platforms
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Industry-standard helpdesk, CRM, and communication platforms leveraged across our BPO operations.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Ticketing Systems</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Zendesk & Freshdesk</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Customer Support</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Intercom & LiveChat</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Data Tools</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Google Workspace & Office 365</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">CRM Ecosystem</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Salesforce & HubSpot CRM</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Integration</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Custom ERP Gateways</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Security</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Encrypted Secure Terminals</span>
            </div>
        </div>
    </div>
</section>

<!-- 5. End-to-End Workflow Pipeline -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Structured Execution</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our End-to-End Workflow
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 01</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Requirement Analysis & Scoping</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Auditing current operational processes, volume volumes, turnaround requirements, and defining strict SLA benchmarks.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 02</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Process Planning & SOP Formulation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Authoring comprehensive Standard Operating Procedures (SOPs), quality checklists, and escalation matrix protocols.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 03</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Team Training & Pilot Trial</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Rigorous training of dedicated operators on client tooling, followed by a controlled pilot execution run.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 04</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Full-Scale Production Execution</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Day-to-day operational execution under dedicated team leads with continuous process adherence.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 05</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality Checking & Auditing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Randomized secondary auditing of processed batches to maintain >99% operational accuracy SLAs.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-slate-100 text-slate-800">Step 06</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Daily Reporting & KPI Delivery</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Real-time productivity dashboards, daily throughput metrics, and monthly strategic review presentations.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Real-World Business Applications -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-blue-700"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Business Applications
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                High-leverage business process outsourcing use cases managed with NextTechX operations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Customer Service Outsourcing for Tech & Retail</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Handling high volumes of customer return inquiries, account questions, and basic technical troubleshooting.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Real Estate & Legal Document Processing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Indexation, title search verification, and standardized digital archiving of property contracts and filings.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Finance & Accounts Payable Triage</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Validating vendor invoices, matching receipt items, and staging accounting entries for controller approval.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Healthcare Patient Records Administration</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">HIPAA-aligned scheduling, intake form digitization, and administrative patient database upkeep.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Closing CTA Section -->
<section class="py-16 lg:py-20 bg-slate-50/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Streamline Back-Office & Customer Operations
        </h2>
        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Discuss your required headcount, SLA targets, and process requirements with our BPO operations directors.
        </p>
        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-800 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                <span>Inquire About BPO Teams</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-blue-700"></i>
                <span>Book Operations Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<?php
$page_title = "SaaS Development — NEXTECHX SOLUTIONS";
$page_desc = "Multi-tenant platforms, recurring subscription billing, and cloud-native scalability.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section with Interactive SaaS Metric Hub Graphic -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-[500px] h-[500px] bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">SaaS Development</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-7 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="layers" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-sky-50 text-sky-700 border border-sky-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-600 animate-pulse"></span>
                        <span>Cloud Product Engineering</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    SaaS Development
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl">
                    Our SaaS Development practice builds commercial, cloud-native software products engineered for recurring revenue and rapid customer scaling. We engineer robust multi-tenant architectures that guarantee tenant data isolation, streamlined billing workflows, automated user onboarding, and elastic cloud infrastructure.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-bold text-sm shadow-md transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span>Inquire About SaaS Development</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                        <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                        <span>Book Strategy Call</span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Bespoke High-Tech Illustration / Interactive Graphic -->
            <div class="lg:col-span-5">
                <div class="relative w-full max-w-lg mx-auto">
                    <div class="absolute -inset-2 bg-gradient-to-r from-sky-500/20 via-blue-600/20 to-indigo-700/20 rounded-3xl blur-xl opacity-70 pointer-events-none"></div>
                    <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                <span class="ml-2 text-xs font-mono text-slate-400">SaaS Multi-Tenant Cloud Cluster</span>
                            </div>
                            <span class="text-[10px] font-mono text-sky-400 bg-sky-950 px-2 py-0.5 rounded border border-sky-800">
                                AWS ECS Active
                            </span>
                        </div>

                        <div class="p-5 grid grid-cols-2 gap-3 text-xs">
                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Active Tenants</span>
                                <span class="text-xl font-black text-white font-heading">1,480+</span>
                                <span class="text-[10px] text-emerald-400 font-mono block">Tenant RLS Isolated</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Billing Engine</span>
                                <span class="text-xl font-black text-white font-heading">Stripe / Webhook</span>
                                <span class="text-[10px] text-sky-400 font-mono block">Automated Invoicing</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Availability SLA</span>
                                <span class="text-xl font-black text-emerald-400 font-heading">99.99%</span>
                                <span class="text-[10px] text-slate-400 font-mono block">Multi-AZ Failover</span>
                            </div>

                            <div class="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
                                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Global Latency</span>
                                <span class="text-xl font-black text-cyan-400 font-heading">38 ms</span>
                                <span class="text-[10px] text-slate-400 font-mono block">CloudFront Edge CDN</span>
                            </div>
                        </div>

                        <div class="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
                            <span class="text-sky-400">● Role-Based Access Control (RBAC)</span>
                            <span class="text-slate-300">SOC2 Type II Ready</span>
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
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Agile Sprints & Fixed SOWs</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Security & Legal</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">100% Client Code & IP</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Leadership</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Direct Architect Access</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Architecture</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Zero-Vendor-Lock-In</span>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Concepts Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Architectural Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Fundamental technical concepts and engineering standards underpinning our SaaS Development practice.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="cloud" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">01</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Cloud-Native Computing</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Elastic containerized architectures on AWS and Google Cloud that auto-scale compute and storage dynamically with user load.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="layers" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">02</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Shared or isolated database schemas ensuring rigorous tenant data segregation, optimal cost efficiency, and tenant security.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="credit-card" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">03</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Subscription Management</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated recurring billing, tiered pricing plans, usage-based metering, and self-service customer upgrade/downgrade flows.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="trending-up" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">04</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Horizontal Scalability</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stateless microservices, distributed caching, and read-replica databases engineered to support rapid user base growth.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="lock" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">05</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Enterprise Security & Compliance</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end data encryption at rest and in transit, comprehensive audit logging, GDPR compliance, and automated backups.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-sky-100 hover:border-sky-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="bar-chart-3" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">06</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Centralized Telemetry</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Product analytics, feature flags, user onboarding heatmaps, and server performance monitoring in real time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer Section -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                What We Offer
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom SaaS Platform Engineering</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Complete conception and implementation of subscription-based B2B or B2C web and mobile cloud platforms.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multi-Tenant Cloud Architecture</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-security tenant isolation schemas designed for enterprise data privacy and rapid horizontal scaling.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Subscription Billing & Gateways</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Turnkey integration with Stripe, Razorpay, and PayPal supporting recurring billing, pro-rata calculations, and invoices.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Admin & Executive Dashboards</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Granular administrative control panels for user management, MRR/ARR analytics, churn tracking, and audit trails.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Role-Based Access Control (RBAC)</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Configurable workspace hierarchies allowing tenant admins to define custom permissions and member roles.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Public API & Webhook Gateways</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Developer-friendly RESTful APIs and outbound webhooks enabling customer developers to build ecosystem integrations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Technology Stack Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Production Stack</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Technology Stack & Tooling
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Battle-tested tools, languages, and frameworks leveraged across our SaaS Development lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Web Interface</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">React 18 / Next.js</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">SaaS Core</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">PHP / Laravel & Python</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Multi-Tenant DB</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">MySQL / PostgreSQL</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Billing Engine</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Stripe & Razorpay APIs</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Cloud Hosting</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">AWS ECS / CloudFront</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Session & Caching</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Redis</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Transactional Mail</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Postmark / SendGrid</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Telemetry</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Datadog / Prometheus</span>
            </div>
        </div>
    </div>
</section>

<!-- 6. Our Workflow (Connected Step-by-Step Pipeline) -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-blue-600"></i>
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
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 01</span>
                        <span class="text-slate-300 text-xs font-mono">01 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Product Strategy & Planning</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Defining monetization models, feature matrices, user personas, tenancy architecture, and technical release milestones.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">SaaS Product Roadmap & Monetization Framework</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 02</span>
                        <span class="text-slate-300 text-xs font-mono">02 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Designing the database tenancy model, authorization guardrails, billing webhooks, and scalable infrastructure topology.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Multi-Tenant Schema & Isolation Strategy</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 03</span>
                        <span class="text-slate-300 text-xs font-mono">03 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">UI/UX & User Journey Design</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Crafting friction-free sign-up funnels, workspace onboarding tours, administrative dashboards, and billing settings.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">High-Fidelity Dashboard & Onboarding Flows</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 04</span>
                        <span class="text-slate-300 text-xs font-mono">04 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Platform Development</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Building the core SaaS features, payment integration, email notification pipelines, and multi-tenant logic in agile sprints.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Core SaaS Engine & Recurring Billing Integration</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 05</span>
                        <span class="text-slate-300 text-xs font-mono">05 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Security & Load Testing</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stress-testing concurrency limits, validating tenant data boundary isolation, and auditing billing edge cases.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Tenant Isolation Security Audit & Load Benchmarks</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Step 06</span>
                        <span class="text-slate-300 text-xs font-mono">06 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Cloud Launch & Continuous Delivery</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated zero-downtime deployment, staging-to-production CI/CD, and 24/7 infrastructure health telemetry.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">Zero-Downtime AWS ECS Multi-Tenant Release</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Applications & Use Cases Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-blue-600"></i>
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
            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Enterprise Productivity & Workspaces
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        B2B Workflow & Project Management SaaS
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Collaborative team workspaces with task boards, role-based workflows, automated status notifications, and reporting.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Rapid Multi-Tenant User Provisioning</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Healthcare & Regulatory Compliance
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Vertical Industry Compliance Platforms
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Specialized platforms managing industry-specific documentation, audit tracking, regulatory reporting, and certs.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Automated Compliance Audit Trail Generation</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Marketing Tech & E-Commerce
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Analytics & Telemetry Portals
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Data aggregation SaaS products parsing customer data streams into actionable executive business intelligence.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Real-Time Multi-Channel Data Aggregation</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Professional Services & Agencies
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Digital Client Portal SaaS
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Branded client-facing hubs allowing service providers to share deliverables, collect payments, and collaborate securely.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Branded Client Collaboration & Stripe Invoicing</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-sky-300 border border-white/15 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-sky-400"></i>
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            Ready to Launch Your Scalable SaaS Product?
        </h2>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
        </p>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-bold text-sm shadow-lg shadow-sky-500/20 transition-all font-heading flex items-center gap-2 active:scale-95">
                <span>Contact SaaS Architects</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading">
                Request Quotation
            </button>

            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-sky-400"></i>
                <span>Book Strategy Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

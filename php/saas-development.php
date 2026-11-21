<?php
$page_title = "SaaS Development — NEXTECHX SOLUTIONS";
$page_desc = "Multi-tenant platforms, recurring subscription billing, and cloud-native scalability.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-6">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">SaaS Development</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="layers" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-sky-50 text-sky-700 border border-sky-200">
                        Cloud Product Engineering
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    SaaS Development
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Our SaaS Development practice builds commercial, cloud-native software products engineered for recurring revenue and rapid customer scaling. We engineer robust multi-tenant architectures that guarantee tenant data isolation, streamlined billing workflows, automated user onboarding, and elastic cloud infrastructure.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                        <span>Inquire About SaaS Development</span>
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
                        <i data-lucide="activity" class="w-4 h-4 text-blue-600"></i>
                        <span>Practice Snapshot</span>
                    </h3>

                    <div class="space-y-3 text-xs text-slate-600">
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Delivery Model</span>
                            <span>Agile Sprints • Fixed Milestone SOWs</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Code & IP Ownership</span>
                            <span>100% Client Retained with Mutual NDA</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Engineering Lead</span>
                            <span>Direct Technical Architect Collaboration</span>
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
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Architectural Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Fundamental technical concepts and engineering standards underpinning our SaaS Development implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">01</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Cloud-Native Computing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Elastic containerized architectures on AWS and Google Cloud that auto-scale compute and storage dynamically with user load.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">02</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Shared or isolated database schemas ensuring rigorous tenant data segregation, optimal cost efficiency, and tenant security.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">03</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Subscription Management</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated recurring billing, tiered pricing plans, usage-based metering, and self-service customer upgrade/downgrade flows.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">04</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Horizontal Scalability</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stateless microservices, distributed caching, and read-replica databases engineered to support rapid user base growth.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">05</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Enterprise Security & Compliance</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end data encryption at rest and in transit, comprehensive audit logging, GDPR compliance, and automated backups.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">06</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Centralized Telemetry</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Product analytics, feature flags, user onboarding heatmaps, and server performance monitoring in real time.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Offerings Section -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our Specific Offerings
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom SaaS Platform Engineering</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Complete conception and implementation of subscription-based B2B or B2C web and mobile cloud platforms.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multi-Tenant Cloud Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-security tenant isolation schemas designed for enterprise data privacy and rapid horizontal scaling.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Subscription Billing & Gateways</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Turnkey integration with Stripe, Razorpay, and PayPal supporting recurring billing, pro-rata calculations, and invoices.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Admin & Executive Dashboards</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Granular administrative control panels for user management, MRR/ARR analytics, churn tracking, and audit trails.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Role-Based Access Control (RBAC)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Configurable workspace hierarchies allowing tenant admins to define custom permissions and member roles.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Public API & Webhook Gateways</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Developer-friendly RESTful APIs and outbound webhooks enabling customer developers to build ecosystem integrations.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Technology Stack Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Production Stack</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Technology Stack & Tooling
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Battle-tested tools, languages, and frameworks leveraged across our SaaS Development lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Web Interface</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">React 18 / Next.js</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">SaaS Core</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">PHP / Laravel & Python</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Multi-Tenant DB</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">MySQL / PostgreSQL</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Billing Engine</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Stripe & Razorpay APIs</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Cloud Hosting</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">AWS ECS / CloudFront</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Session & Caching</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Redis</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Transactional Mail</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Postmark / SendGrid</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Telemetry</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Datadog / Prometheus</span>
            </div>
        </div>
    </div>
</section>

<!-- 5. End-to-End Workflow Pipeline -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-blue-600"></i>
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
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 01</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Product Strategy & Planning</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Defining monetization models, feature matrices, user personas, tenancy architecture, and technical release milestones.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 02</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Designing the database tenancy model, authorization guardrails, billing webhooks, and scalable infrastructure topology.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 03</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">UI/UX & User Journey Design</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Crafting friction-free sign-up funnels, workspace onboarding tours, administrative dashboards, and billing settings.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 04</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Platform Development</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Building the core SaaS features, payment integration, email notification pipelines, and multi-tenant logic in agile sprints.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 05</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Security & Load Testing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stress-testing concurrency limits, validating tenant data boundary isolation, and auditing billing edge cases.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 06</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Cloud Launch & Continuous Delivery</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated zero-downtime deployment, staging-to-production CI/CD, and 24/7 infrastructure health telemetry.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Real-World Business Applications -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-blue-600"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Business Applications
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                High-leverage enterprise SaaS product use cases built with NextTechX engineering.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">B2B Workflow & Project Management SaaS</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Collaborative team workspaces with task boards, role-based workflows, automated status notifications, and reporting.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Vertical Industry Compliance Platforms</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Specialized platforms managing industry-specific documentation, audit tracking, regulatory reporting, and certs.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Analytics & Telemetry Portals</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Data aggregation SaaS products parsing customer data streams into actionable executive business intelligence.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Digital Client Portal SaaS</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Branded client-facing hubs allowing service providers to share deliverables, collect payments, and collaborate securely.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Closing CTA Section -->
<section class="py-16 lg:py-20 bg-slate-50/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Launch Your Scalable SaaS Product
        </h2>
        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Discuss your tenancy model, recurring billing, and architectural roadmap with our cloud product architects today.
        </p>
        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                <span>Contact SaaS Architects</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                <span>Book Technical Consultation</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

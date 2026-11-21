<?php
$page_title = "Software Development — NEXTECHX SOLUTIONS";
$page_desc = "Enterprise web platforms, scalable microservices, and high-performance applications.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-6">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">Software Development</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="code-2" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-purple-50 text-purple-700 border border-purple-200">
                        Custom Engineering
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    Software Development
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Our Software Development practice designs and engineers resilient digital products tailored to your operational models. We adhere to clean code principles, modular microservice architectures, and robust security protocols—ensuring your software remains scalable, maintainable, and high-performing as your organization expands.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                        <span>Inquire About Software Development</span>
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
                        <i data-lucide="activity" class="w-4 h-4 text-purple-600"></i>
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
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-purple-600"></i>
                <span>Architectural Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Fundamental technical concepts and engineering standards underpinning our Software Development implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">01</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Frontend Engineering</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Ultra-responsive, accessible user interfaces built with React, Next.js, and TypeScript, engineered for sub-second Core Web Vitals.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">02</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Backend Microservices</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-throughput asynchronous servers in Python (FastAPI), Node.js, and modern PHP engineered for high concurrent workloads.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">03</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Database Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Normalized relational schemas (MySQL, PostgreSQL) and NoSQL caching layers (Redis) optimized for low latency and data integrity.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">04</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">API Design & Gateways</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Strictly typed RESTful and GraphQL API contracts with rate limiting, comprehensive documentation, and seamless versioning.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">05</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Authentication & Security</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Enterprise identity standards (JWT, OAuth2, RBAC, MFA) ensuring comprehensive data protection and granular user authorization.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-purple-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-purple-100/70 text-purple-700 flex items-center justify-center font-bold text-xs font-mono">06</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Software Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Domain-Driven Design (DDD), Clean Architecture, and decoupled services ensuring codebases remain extensible and debt-free.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Offerings Section -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-purple-600"></i>
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
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom Web Applications</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Bespoke operational web systems, customer portals, and internal enterprise tools built with React and Tailwind CSS.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Enterprise Backend Systems</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Resilient business logic engines, automated batch processors, and distributed event-driven microservices.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">API Development & Integration</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-performance API gateways connecting third-party services, payment providers, and legacy software.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Database Engineering & Optimization</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Schema design, index tuning, automated backups, and database clustering for zero-data-loss resilience.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Cross-Platform Mobile Apps</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-performance iOS and Android applications built with unified React Native codebases and offline sync.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Cloud Infrastructure & DevOps</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated GitHub Actions CI/CD pipelines, Docker containerization, and AWS/GCP cloud configurations.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Technology Stack Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-purple-600"></i>
                <span>Production Stack</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Technology Stack & Tooling
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Battle-tested tools, languages, and frameworks leveraged across our Software Development lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Frontend</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">React / Next.js</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Language</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">JavaScript / TypeScript</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Backend</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Python / FastAPI</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Backend</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">PHP / Laravel</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Databases</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">MySQL / PostgreSQL</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Styling</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">HTML5 / Tailwind CSS</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">DevOps</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Docker & CI/CD</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Hosting</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">AWS / Cloudflare</span>
            </div>
        </div>
    </div>
</section>

<!-- 5. End-to-End Workflow Pipeline -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-purple-600"></i>
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
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 01</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Requirement Gathering</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Deep-dive workshops to analyze business goals, functional user stories, system dependencies, and technical criteria.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 02</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">UI/UX & System Architecture</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Creating wireframes, interactive user flows, database entity-relationship models, and modular architecture blueprints.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 03</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Agile Development Sprints</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Iterative two-week sprint cycles with clean modular code, automated linting, unit test coverage, and transparent demo reviews.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 04</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality Assurance & Security</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end integration testing, cross-browser validation, performance profiling, and vulnerability security audits.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 05</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Production Deployment</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Zero-downtime deployment through automated CI/CD pipelines with rollback mechanisms, CDN caching, and SSL security.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-purple-50 text-purple-700">Step 06</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Maintenance & Evolution</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Proactive uptime monitoring, security patching, database optimization, and continuous feature enhancements.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Real-World Business Applications -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-purple-600"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Business Applications
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                High-leverage enterprise software use cases built with NextTechX engineering.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Enterprise ERP & Operations Portals</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Custom management portals synchronizing inventory, purchase workflows, finance, and human resources in a unified interface.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Customer Self-Service Portals</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Secure customer accounts for billing management, service requests, automated document generation, and support tracking.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">High-Concurrency Booking Engines</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Fast, resilient transaction engines handling peak user traffic, real-time seat/slot reservations, and payment processing.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Supply Chain & Logistics Tracking</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Real-time dispatch telemetry, consignment tracking, and automated status notifications across distribution networks.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Closing CTA Section -->
<section class="py-16 lg:py-20 bg-slate-50/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Build Scalable Custom Software with NextTechX
        </h2>
        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Discuss your architecture, milestones, and technical scope with our engineering architects today.
        </p>
        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                <span>Contact Engineering Team</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-purple-600"></i>
                <span>Book Technical Consultation</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

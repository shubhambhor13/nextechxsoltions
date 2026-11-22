<?php
$page_title = "Software Development — NEXTECHX SOLUTIONS";
$page_desc = "Enterprise web platforms, scalable microservices, and high-performance applications.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Visually Attractive Hero Section with Bespoke Graphic -->
<section class="relative pt-10 pb-16 lg:pt-14 lg:pb-20 bg-gradient-to-b from-slate-50 via-white to-white border-b border-slate-200/90 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>
    <div class="absolute -top-24 right-1/4 w-[550px] h-[550px] bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">Software Development</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-7 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="code-2" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-purple-50 text-purple-800 border-purple-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                        <span>Custom Engineering</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    Software Development
                </h1>

                <p class="text-lg sm:text-xl font-medium text-slate-700 leading-snug">
                    Enterprise web platforms, scalable microservices, and high-performance applications.
                </p>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-normal max-w-2xl">
                    End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span>Inquire About Software Development</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading shadow-2xs">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2 shadow-2xs">
                        <i data-lucide="phone-call" class="w-4 h-4 text-purple-600"></i>
                        <span>Book Strategy Call</span>
                    </button>
                </div>

                <!-- Trust Badges Row -->
                <div class="pt-4 flex flex-wrap items-center gap-4 text-xs font-medium text-slate-500 border-t border-slate-200/80">
                    <span class="flex items-center gap-1.5">
                        <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                        <span>100% Client Code & IP</span>
                    </span>
                    <span class="text-slate-300">•</span>
                    <span class="flex items-center gap-1.5">
                        <i data-lucide="lock" class="w-4 h-4 text-blue-600"></i>
                        <span>Mutual NDA Protected</span>
                    </span>
                    <span class="text-slate-300">•</span>
                    <span class="flex items-center gap-1.5">
                        <i data-lucide="clock" class="w-4 h-4 text-indigo-600"></i>
                        <span>24-Hour Scoping Turnaround</span>
                    </span>
                </div>
            </div>

            <!-- Right Column: Bespoke High-Tech Illustration -->
            <div class="lg:col-span-5">
                
                    <div class="relative w-full max-w-lg mx-auto">
                        <div class="absolute -inset-2 bg-gradient-to-r from-indigo-600/25 via-purple-600/25 to-pink-500/25 rounded-3xl blur-2xl opacity-75 pointer-events-none"></div>
                        <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                            <div class="flex items-center justify-between px-4 py-3 bg-slate-950/90 border-b border-slate-800">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                    <span class="ml-2 text-xs font-mono text-slate-400">nextechx-core-api.ts</span>
                                </div>
                                <span class="text-[10px] font-mono text-purple-400 bg-purple-950 px-2.5 py-0.5 rounded border border-purple-800">
                                    TypeScript 5.4 • Strict
                                </span>
                            </div>
                            <div class="p-5 space-y-3">
                                <div class="p-3 rounded-xl bg-slate-800/70 border border-purple-500/30 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-300 flex items-center justify-center">
                                            <i data-lucide="layout" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white text-xs">Frontend Client Layer</p>
                                            <p class="text-[11px] text-slate-400 font-mono">React 18 / Next.js • Tailwind CSS</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-emerald-400">LCP 0.8s</span>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-800/70 border border-indigo-500/30 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-300 flex items-center justify-center">
                                            <i data-lucide="server" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white text-xs">Microservice API Gateway</p>
                                            <p class="text-[11px] text-slate-400 font-mono">Python FastAPI / Node.js • JWT Auth</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-cyan-400">Rate-Limited</span>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-800/70 border border-slate-700/60 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-pink-500/20 text-pink-300 flex items-center justify-center">
                                            <i data-lucide="database" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white text-xs">Persistence & Cache</p>
                                            <p class="text-[11px] text-slate-400 font-mono">PostgreSQL + Redis Distributed Cache</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-slate-300">Pool Active</span>
                                </div>
                            </div>
                            <div class="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
                                <span class="text-emerald-400">✓ CI/CD Build #1842 Passing</span>
                                <span class="text-slate-300">Coverage: <strong class="text-purple-400">92.4%</strong></span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Dedicated Service Overview & Strategic Pillars -->
<section class="py-16 lg:py-20 bg-gradient-to-b from-white via-slate-50/70 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-5 space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="compass" class="w-3.5 h-3.5 text-current"></i>
                    <span>Executive Overview</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Engineering Value & Practice Scope
                </h2>
            </div>
            <div class="lg:col-span-7">
                <p class="text-base sm:text-lg text-slate-700 leading-relaxed font-normal bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs">
                    Our Software Development practice designs and engineers resilient digital products tailored to your operational models. We adhere to clean code principles, modular microservice architectures, and robust security protocols—ensuring your software remains scalable, maintainable, and high-performing as your organization expands.
                </p>
            </div>
        </div>

        <!-- 3 Strategic Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="layers" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Domain-Driven Clean Code</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Strict TypeScript interfaces, decoupled service boundaries, and maintainable layered architectures free of technical debt.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="zap" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Sub-Second Performance</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Core Web Vitals optimization, asynchronous message queues, distributed Redis caching, and indexed relational database queries.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Zero-Vulnerability DevSecOps</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated GitHub Actions CI/CD pipelines, automated dependency vulnerability scanners, and Docker containerized deployments.</p>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 3. Core Technical Concepts & Technologies -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-current"></i>
                <span>Architectural Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Fundamental technical concepts and engineering standards underpinning our Software Development practice.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="layout" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">01</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Frontend Engineering</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Ultra-responsive, accessible user interfaces built with React, Next.js, and TypeScript, engineered for sub-second Core Web Vitals.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="server" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">02</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Backend Microservices</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-throughput asynchronous servers in Python (FastAPI), Node.js, and modern PHP engineered for high concurrent workloads.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="database" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">03</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Database Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Normalized relational schemas (MySQL, PostgreSQL) and NoSQL caching layers (Redis) optimized for low latency and data integrity.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="network" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">04</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">API Design & Gateways</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Strictly typed RESTful and GraphQL API contracts with rate limiting, comprehensive documentation, and seamless versioning.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="shield-check" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">05</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Authentication & Security</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Enterprise identity standards (JWT, OAuth2, RBAC, MFA) ensuring comprehensive data protection and granular user authorization.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-purple-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="layers" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">06</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Software Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Domain-Driven Design (DDD), Clean Architecture, and decoupled services ensuring codebases remain extensible and debt-free.</p>
                    </div>
                </div>
        </div>

        <!-- Technology Stack & Tooling Integrated Section -->
        <div class="pt-8 space-y-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="terminal" class="w-3.5 h-3.5 text-current"></i>
                    <span>Production Tooling & Tech Stack</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Technologies & Frameworks We Leverage
                </h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Frontend</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">React / Next.js</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Language</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">JavaScript / TypeScript</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Backend</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Python / FastAPI</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Backend</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">PHP / Laravel</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Databases</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">MySQL / PostgreSQL</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Styling</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">HTML5 / Tailwind CSS</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">DevOps</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Docker & CI/CD</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Hosting</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">AWS / Cloudflare</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer (Specific Capabilities with Deliverables) -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-50/70 via-slate-50/40 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-current"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                What We Offer
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Modular enterprise solutions and concrete capability modules designed for high performance.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Custom Web Applications</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Bespoke operational web systems, customer portals, and internal enterprise tools built with React and Tailwind CSS.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>React & TypeScript Modern Stack</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Sub-Second LCP Performance</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Fully Responsive Design</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Enterprise Backend Systems</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Resilient business logic engines, automated batch processors, and distributed event-driven microservices.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Microservices Architecture</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Asynchronous Event Queues</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>High-Throughput Load Balancing</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">API Development & Integration</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-performance API gateways connecting third-party services, payment providers, and legacy software.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Strict OpenAPI / Swagger Specs</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>JWT / OAuth2 Security Layers</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Rate Limiting & Threat Shielding</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Database Engineering & Optimization</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Schema design, index tuning, automated backups, and database clustering for zero-data-loss resilience.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>ACID-Compliant Relational Schemas</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Redis In-Memory Caching</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Automated Replication & Backups</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Cross-Platform Mobile Apps</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-performance iOS and Android applications built with unified React Native codebases and offline sync.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Unified React Native Codebase</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Offline Data Sync & Caching</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Native Biometric Authentication</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Cloud Infrastructure & DevOps</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated GitHub Actions CI/CD pipelines, Docker containerization, and AWS/GCP cloud configurations.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Automated GitHub Actions CI/CD</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Docker Containerization</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>AWS / Cloudflare Infrastructure</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 5. Our Workflow (Connected Step-by-Step Process) -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-white via-slate-50/60 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-current"></i>
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
            
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 01
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Requirement Gathering</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Deep-dive workshops to analyze business goals, functional user stories, system dependencies, and technical criteria.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Product Requirements Document (PRD) & User Stories
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 02
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">UI/UX & System Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Creating wireframes, interactive user flows, database entity-relationship models, and modular architecture blueprints.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Figma UI/UX Prototypes & Architecture Blueprints
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 03
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Agile Development Sprints</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Iterative two-week sprint cycles with clean modular code, automated linting, unit test coverage, and transparent demo reviews.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Production-Grade Codebase with 85%+ Test Coverage
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 04
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Quality Assurance & Security</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end integration testing, cross-browser validation, performance profiling, and vulnerability security audits.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Security Audit, Load Testing & Penetration Report
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 05
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Production Deployment</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Zero-downtime deployment through automated CI/CD pipelines with rollback mechanisms, CDN caching, and SSL security.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Automated CI/CD Pipeline & Multi-Region Launch
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200">
                                Step 06
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Maintenance & Evolution</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Proactive uptime monitoring, security patching, database optimization, and continuous feature enhancements.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-purple-50/90 text-purple-900 border-purple-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            99.9% Uptime SLA & Quarterly Feature Enhancements
                        </span>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 6. Applications and Use Cases -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-50 text-purple-800 border-purple-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-current"></i>
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
            
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Corporate Operations & Manufacturing
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Enterprise ERP & Operations Portals</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Custom management portals synchronizing inventory, purchase workflows, finance, and human resources in a unified interface.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Unified Real-Time Operational Visibility</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Banking & Financial Services
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Customer Self-Service Portals</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Secure customer accounts for billing management, service requests, automated document generation, and support tracking.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Sub-Second Transaction Processing Latency</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Hospitality & Travel
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">High-Concurrency Booking Engines</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Fast, resilient transaction engines handling peak user traffic, real-time seat/slot reservations, and payment processing.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Zero-Downtime Peak Traffic Scalability</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Logistics & Global Freight
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Supply Chain & Logistics Tracking</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Real-time dispatch telemetry, consignment tracking, and automated status notifications across distribution networks.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>End-to-End Real-Time Consignment Tracking</span>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 7. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-cyan-300 border border-white/15 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-cyan-400"></i>
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            Ready to Discuss Your Software Development Requirements?
        </h2>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
        </p>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-bold text-sm shadow-lg shadow-cyan-500/20 transition-all font-heading flex items-center gap-2 active:scale-95">
                <span>Contact Engineering Team</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading">
                Request Quotation
            </button>

            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-cyan-400"></i>
                <span>Book Strategy Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<?php
require_once __DIR__ . '/includes/cms.php';
$service = cms_get_service('saas-development');
$page_seo = cms_get_page_seo('saas-development');
$page_title = $page_seo['meta_title'] ?? (($service['title'] ?? "SaaS Development") . " — " . SITE_NAME);
$page_desc = $page_seo['meta_description'] ?? ($service['short_desc'] ?? "Multi-tenant platforms, recurring subscription billing, and cloud-native scalability.");
require_once __DIR__ . '/includes/header.php';

$srv_title = $service['title'] ?? 'SaaS Development';
$srv_badge = $service['badge'] ?? 'Cloud Product Engineering';
$srv_short = $service['short_desc'] ?? 'Multi-tenant platforms, recurring subscription billing, and cloud-native scalability.';
$srv_content = $service['content'] ?? [];
$srv_overview = !empty($srv_content['overview']) ? $srv_content['overview'] : 'From MVP inception to venture-scale SaaS platforms with frictionless billing, multi-tenancy, and global uptime.';
$srv_cta = $srv_content['cta'] ?? [];
$srv_cta_title = $srv_cta['title'] ?? ('Ready to Discuss Your ' . $srv_title . ' Requirements?');
$srv_cta_sub = $srv_cta['subtitle'] ?? 'Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.';
$srv_cta_btn = $srv_cta['button_text'] ?? ('Inquire About ' . $srv_title);
$srv_cta_url = $srv_cta['button_url'] ?? 'contact.php';
?>

<!-- 1. Visually Attractive Hero Section with Bespoke Graphic -->
<section class="relative pt-10 pb-16 lg:pt-14 lg:pb-20 bg-gradient-to-b from-slate-50 via-white to-white border-b border-slate-200/90 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>
    <div class="absolute -top-24 right-1/4 w-[550px] h-[550px] bg-sky-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold"><?= htmlspecialchars($srv_title) ?></span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-7 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="layers" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-sky-50 text-sky-800 border-sky-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                        <span><?= htmlspecialchars($srv_badge) ?></span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    <?= htmlspecialchars($srv_title) ?>
                </h1>

                <p class="text-lg sm:text-xl font-medium text-slate-700 leading-snug">
                    <?= htmlspecialchars($srv_short) ?>
                </p>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-normal max-w-2xl">
                    Complete Software-as-a-Service product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="<?= htmlspecialchars($srv_cta_url) ?>" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span><?= htmlspecialchars($srv_cta_btn) ?></span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading shadow-2xs">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2 shadow-2xs">
                        <i data-lucide="phone-call" class="w-4 h-4 text-sky-600"></i>
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
                        <div class="absolute -inset-2 bg-gradient-to-r from-sky-500/25 via-blue-600/25 to-indigo-700/25 rounded-3xl blur-2xl opacity-75 pointer-events-none"></div>
                        <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                            <div class="flex items-center justify-between px-4 py-3 bg-slate-950/90 border-b border-slate-800">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                    <span class="ml-2 text-xs font-mono text-slate-400">SaaS Multi-Tenant Cloud Cluster</span>
                                </div>
                                <span class="text-[10px] font-mono text-sky-400 bg-sky-950 px-2.5 py-0.5 rounded border border-sky-800">
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

<!-- 2. Dedicated Service Overview & Strategic Pillars -->
<section class="py-16 lg:py-20 bg-gradient-to-b from-white via-slate-50/70 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-5 space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="compass" class="w-3.5 h-3.5 text-current"></i>
                    <span>Executive Overview</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Engineering Value & Practice Scope
                </h2>
            </div>
            <div class="lg:col-span-7">
                <p class="text-base sm:text-lg text-slate-700 leading-relaxed font-normal bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs">
                    Our SaaS Development practice builds commercial, cloud-native software products engineered for recurring revenue and rapid customer scaling. We engineer robust multi-tenant architectures that guarantee tenant data isolation, streamlined billing workflows, automated user onboarding, and elastic cloud infrastructure.
                </p>
            </div>
        </div>

        <!-- 3 Strategic Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Row-Level Security Tenancy</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Guaranteed database tenant data isolation, custom workspace partition schemas, and strict cross-tenant leakage prevention.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="credit-card" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Turnkey Subscription Engine</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Native Stripe and Razorpay integrations handling recurring monthly/annual plans, automated invoicing, usage metering, and dunning.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="cloud" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Multi-AZ 99.99% Availability</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Cloud-native containerized architecture on AWS ECS with auto-scaling compute, failover read-replicas, and CloudFront edge delivery.</p>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 3. Core Technical Concepts & Technologies -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-current"></i>
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
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="cloud" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">01</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Cloud-Native Computing</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Elastic containerized architectures on AWS and Google Cloud that auto-scale compute and storage dynamically with user load.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="layers" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">02</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Shared or isolated database schemas ensuring rigorous tenant data segregation, optimal cost efficiency, and tenant security.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="credit-card" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">03</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Subscription Management</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated recurring billing, tiered pricing plans, usage-based metering, and self-service customer upgrade/downgrade flows.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="trending-up" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">04</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Horizontal Scalability</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stateless microservices, distributed caching, and read-replica databases engineered to support rapid user base growth.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="lock" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">05</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Enterprise Security & Compliance</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end data encryption at rest and in transit, comprehensive audit logging, GDPR compliance, and automated backups.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-sky-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="bar-chart-3" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">06</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Centralized Telemetry</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Product analytics, feature flags, user onboarding heatmaps, and server performance monitoring in real time.</p>
                    </div>
                </div>
        </div>

        <!-- Technology Stack & Tooling Integrated Section -->
        <div class="pt-8 space-y-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="terminal" class="w-3.5 h-3.5 text-current"></i>
                    <span>Production Tooling & Tech Stack</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Technologies & Frameworks We Leverage
                </h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Web Interface</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">React 18 / Next.js</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">SaaS Core</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">PHP / Laravel & Python</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Multi-Tenant DB</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">MySQL / PostgreSQL</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Billing Engine</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Stripe & Razorpay APIs</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Cloud Hosting</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">AWS ECS / CloudFront</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Session & Caching</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Redis</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Transactional Mail</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Postmark / SendGrid</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Telemetry</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Datadog / Prometheus</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer (Specific Capabilities with Deliverables) -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-50/70 via-slate-50/40 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Custom SaaS Platform Engineering</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Complete conception and implementation of subscription-based B2B or B2C web and mobile cloud platforms.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Scalable Modular Architecture</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Tenant-Aware State Management</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Clean Code & Automated Tests</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Multi-Tenant Cloud Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-security tenant isolation schemas designed for enterprise data privacy and rapid horizontal scaling.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Row-Level Data Isolation (RLS)</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Shared Compute & Storage Efficiency</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Zero Cross-Tenant Leakage</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Subscription Billing & Gateways</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Turnkey integration with Stripe, Razorpay, and PayPal supporting recurring billing, pro-rata calculations, and invoices.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Stripe / Razorpay Integration</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Tiered & Usage-Based Pricing</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Automated Invoicing & Proration</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Admin & Executive Dashboards</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Granular administrative control panels for user management, MRR/ARR analytics, churn tracking, and audit trails.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>MRR / ARR Financial Telemetry</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>User Churn & Retention Analytics</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Granular Tenant Control Panel</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Role-Based Access Control (RBAC)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Configurable workspace hierarchies allowing tenant admins to define custom permissions and member roles.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Custom Permissions Engine</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>SSO & SAML 2.0 Integration</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Comprehensive Audit Logging</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-700 border border-sky-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Public API & Webhook Gateways</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Developer-friendly RESTful APIs and outbound webhooks enabling customer developers to build ecosystem integrations.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Developer Portal & Sandbox</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Outbound Event Webhooks</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Tokenized API Key Management</span>
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
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 01
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Product Strategy & Planning</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Defining monetization models, feature matrices, user personas, tenancy architecture, and technical release milestones.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            SaaS Product Roadmap & Monetization Framework
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 02
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Multi-Tenant Architecture</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Designing the database tenancy model, authorization guardrails, billing webhooks, and scalable infrastructure topology.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Multi-Tenant Schema & Isolation Strategy
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 03
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">UI/UX & User Journey Design</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Crafting friction-free sign-up funnels, workspace onboarding tours, administrative dashboards, and billing settings.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            High-Fidelity Dashboard & Onboarding Flows
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 04
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Platform Development</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Building the core SaaS features, payment integration, email notification pipelines, and multi-tenant logic in agile sprints.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Core SaaS Engine & Recurring Billing Integration
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 05
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Security & Load Testing</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Stress-testing concurrency limits, validating tenant data boundary isolation, and auditing billing edge cases.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Tenant Isolation Security Audit & Load Benchmarks
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200">
                                Step 06
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Cloud Launch & Continuous Delivery</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated zero-downtime deployment, staging-to-production CI/CD, and 24/7 infrastructure health telemetry.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-sky-50/90 text-sky-900 border-sky-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Zero-Downtime AWS ECS Multi-Tenant Release
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
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-50 text-sky-800 border-sky-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                            Enterprise Productivity & Workspaces
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">B2B Workflow & Project Management SaaS</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Collaborative team workspaces with task boards, role-based workflows, automated status notifications, and reporting.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Rapid Multi-Tenant User Provisioning</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Healthcare & Regulatory Compliance
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Vertical Industry Compliance Platforms</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Specialized platforms managing industry-specific documentation, audit tracking, regulatory reporting, and certs.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Automated Compliance Audit Trail Generation</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Marketing Tech & E-Commerce
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Analytics & Telemetry Portals</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Data aggregation SaaS products parsing customer data streams into actionable executive business intelligence.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Real-Time Multi-Channel Data Aggregation</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Professional Services & Agencies
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Digital Client Portal SaaS</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Branded client-facing hubs allowing service providers to share deliverables, collect payments, and collaborate securely.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Branded Client Collaboration & Stripe Invoicing</span>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 7. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-sky-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-cyan-300 border border-white/15 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-cyan-400"></i>
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            <?= htmlspecialchars($srv_cta_title) ?>
        </h2>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            <?= htmlspecialchars($srv_cta_sub) ?>
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

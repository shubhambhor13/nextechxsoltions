<?php
$page_title = "IT & Custom Software Solutions";
$page_desc = "Enterprise web development, custom software engineering, mobile apps, and cloud infrastructure from NexTechX Solutions.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-blue-300 text-xs font-mono mb-4">
            <i data-lucide="code-2" class="w-3.5 h-3.5"></i>
            <span>Engineering High-Throughput Software</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            IT & Custom Software Solutions
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            From modern responsive web platforms to resilient backend microservices and mobile apps. We build secure, maintainable digital products aligned with your business goals.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm shadow-lg shadow-blue-500/25 transition-all font-heading">
                Request Software Quote (INR ₹)
            </button>
            <a href="portfolio.php" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-semibold transition-colors">
                View Past Projects
            </a>
        </div>
    </div>
</section>

<!-- Practice Areas -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold font-mono uppercase tracking-wider text-blue-600">Engineering Disciplines</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 mt-2">
                Production-Ready Development Capabilities
            </h2>
            <p class="text-base text-slate-600 mt-3">
                Full-lifecycle engineering with clean source code, transparent git tracking, and documented APIs.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Web Development -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="globe" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Enterprise Web Platforms</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Ultra-fast single-page and multi-page web applications engineered with React, Next.js, and Tailwind CSS.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>SaaS portals & custom customer portals</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Progressive Web Apps (PWAs) & Jamstack</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Sub-second Core Web Vitals optimization</span></li>
                </ul>
            </div>

            <!-- Backend Engineering -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="server" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Custom Microservices & APIs</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    High-throughput backend architectures engineered in Python FastAPI and Node.js for heavy concurrent traffic.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>Secure RESTful & GraphQL endpoints</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>Role-based access control (RBAC) & JWT auth</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>PostgreSQL, Redis caching & SQLite engines</span></li>
                </ul>
            </div>

            <!-- Mobile Development -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="smartphone" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Mobile Applications</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Cross-platform iOS and Android applications built with React Native and Flutter for seamless native performance.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-600"></i><span>Unified iOS and Android single codebase</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-600"></i><span>Push notifications & background sync</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-600"></i><span>App Store & Google Play submission management</span></li>
                </ul>
            </div>

            <!-- Cloud & DevOps -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center">
                    <i data-lucide="cloud" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Cloud Infrastructure & DevOps</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Containerized application environments using Docker and automated CI/CD pipelines deployed to AWS and DigitalOcean.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Automated GitHub Actions CI/CD workflows</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Docker containerization & health checks</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Automated database backup & SSL encryption</span></li>
                </ul>
            </div>

            <!-- Business Intelligence -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="bar-chart-3" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Business Dashboards & Analytics</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Custom real-time analytics dashboards and Power BI reports connecting your operational databases into visual KPIs.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Executive KPI dashboards & revenue analytics</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Automated scheduled Excel / PDF exports</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Direct SQL query optimization</span></li>
                </ul>
            </div>

            <!-- Support & SLA -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="headphones" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold font-heading text-slate-900">Dedicated Maintenance & SLA</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Guaranteed uptime monitoring, security patching, and ongoing feature iterations to keep your platform ahead.
                </p>
                <ul class="space-y-2 text-xs text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Quarterly dependency & vulnerability audits</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Fast turnaround bug triage & hotfix releases</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Transparent hourly or monthly retainer billing</span></li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900">Have a Software Project in Mind?</h2>
        <p class="text-slate-600 text-base mt-3 max-w-2xl mx-auto">
            Discuss your technical architecture with our engineering leads. All quotations are provided in Indian Rupees (INR ₹) tailored to your exact milestones.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md font-heading transition-all">
                Request a Custom Quote
            </button>
            <a href="contact.php" class="px-8 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors">
                Book a Technical Call
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

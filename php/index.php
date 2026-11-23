<?php
$page_title = "Enterprise IT Solutions, AI Automation & Technology Internships";
$page_desc = "NexTechX Solutions engineers high-impact artificial intelligence, autonomous workflow pipelines, modern IT software, and scalable enterprise cloud solutions. Your Vision Our Technology.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section with AI Futuristic Atmosphere -->
<section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden bg-slate-950 text-white py-20 lg:py-28">
    <!-- Video / Ambient Background -->
    <div class="absolute inset-0 z-0 overflow-hidden opacity-30">
        <video autoplay loop muted playsinline poster="assets/images/hero-video-poster.jpg" class="w-full h-full object-cover">
            <source src="assets/videos/hero-ai-network.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-950/90 to-slate-950"></div>
    </div>
    
    <!-- Glowing Orbs -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <!-- Top Pill Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs sm:text-sm font-mono mb-6 backdrop-blur-sm">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
            <span>Enterprise IT Solutions • Autonomous AI Systems</span>
            <span class="text-blue-400">⚡</span>
            <span class="text-slate-300">ISO-Aligned Delivery</span>
        </div>

        <!-- Main Headline -->
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-white max-w-5xl mx-auto leading-[1.15]">
            Engineering Intelligent <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-400 bg-clip-text text-transparent">AI & IT Software</span> for Modern Enterprises
        </h1>

        <!-- Subtitle -->
        <p class="text-lg sm:text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed font-normal">
            We build autonomous workflow automations, enterprise software platforms, cloud architectures, and empower next-gen engineers through corporate mentorship.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold text-base shadow-lg shadow-blue-500/25 hover:shadow-cyan-500/30 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-2 font-heading">
                <span>Request a Free Quotation (INR ₹)</span>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
            <a href="services.php" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-slate-900/80 hover:bg-slate-800 border border-slate-700/80 text-slate-200 font-semibold text-base backdrop-blur-sm hover:border-slate-500 transition-all flex items-center justify-center gap-2">
                <i data-lucide="layers" class="w-5 h-5 text-cyan-400"></i>
                <span>Explore All Services</span>
            </a>
        </div>

        <!-- Metric Counter Badges -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 max-w-4xl mx-auto">
            <div class="p-4 sm:p-5 rounded-2xl bg-slate-900/70 border border-slate-800/80 backdrop-blur-sm">
                <div class="text-3xl sm:text-4xl font-extrabold text-cyan-400 font-heading">99.8%</div>
                <div class="text-xs text-slate-400 uppercase tracking-wider mt-1 font-mono">Uptime SLA</div>
            </div>
            <div class="p-4 sm:p-5 rounded-2xl bg-slate-900/70 border border-slate-800/80 backdrop-blur-sm">
                <div class="text-3xl sm:text-4xl font-extrabold text-blue-400 font-heading">50+</div>
                <div class="text-xs text-slate-400 uppercase tracking-wider mt-1 font-mono">Deployments</div>
            </div>
            <div class="p-4 sm:p-5 rounded-2xl bg-slate-900/70 border border-slate-800/80 backdrop-blur-sm">
                <div class="text-3xl sm:text-4xl font-extrabold text-emerald-400 font-heading">100+</div>
                <div class="text-xs text-slate-400 uppercase tracking-wider mt-1 font-mono">Research Papers</div>
            </div>
            <div class="p-4 sm:p-5 rounded-2xl bg-slate-900/70 border border-slate-800/80 backdrop-blur-sm">
                <div class="text-3xl sm:text-4xl font-extrabold text-purple-400 font-heading">1000+</div>
                <div class="text-xs text-slate-400 uppercase tracking-wider mt-1 font-mono">Interns Trained</div>
            </div>
        </div>

    </div>
</section>

<!-- Core Services Showcase (3 Official Cards) -->
<section class="py-20 lg:py-28 bg-slate-50 relative overflow-hidden" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-3">
                <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                <span>Our Core Technical Practices</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                Specialized Enterprise Capabilities
            </h2>
            <p class="text-base sm:text-lg text-slate-600 mt-4 leading-relaxed">
                We deliver robust digital infrastructure, autonomous AI automations, and academic publication advisory with rigorous quality assurance.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: AI Automation Solutions -->
            <div class="rounded-3xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-900 text-white p-8 shadow-xl flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 border border-blue-400/30">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-cyan-300 mb-6 border border-white/20">
                        <i data-lucide="bot" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-mono uppercase tracking-wider text-cyan-300">Intelligent Workflows</span>
                    <h3 class="text-2xl font-bold font-heading text-white mt-1">AI Automation Solutions</h3>
                    <p class="text-blue-100 text-sm mt-3 leading-relaxed">
                        Custom autonomous AI assistants, WhatsApp chatbots, and n8n workflows that eliminate operational bottlenecks and cut overhead costs.
                    </p>
                    <ul class="mt-6 space-y-2.5 text-xs text-blue-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-300 shrink-0"></i><span>Custom AI Chatbots & RAG Agents</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-300 shrink-0"></i><span>WhatsApp & Omni-Channel Automation</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-300 shrink-0"></i><span>n8n Pipeline Integration with ERP/CRM</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-300 shrink-0"></i><span>Intelligent Document Processing (OCR)</span></li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="ai-automation.php" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 text-slate-900 font-bold text-sm flex items-center justify-center gap-2 shadow-md transition-all font-heading">
                        <span>Explore AI Automation</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2: IT & Software Solutions -->
            <div class="rounded-3xl bg-gradient-to-br from-purple-700 via-indigo-800 to-slate-900 text-white p-8 shadow-xl flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 border border-purple-400/30">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-purple-300 mb-6 border border-white/20">
                        <i data-lucide="code-2" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-mono uppercase tracking-wider text-purple-300">Scalable Systems</span>
                    <h3 class="text-2xl font-bold font-heading text-white mt-1">IT & Software Solutions</h3>
                    <p class="text-purple-100 text-sm mt-3 leading-relaxed">
                        High-performance custom web applications, mobile platforms, enterprise cloud architectures, and interactive analytics dashboards.
                    </p>
                    <ul class="mt-6 space-y-2.5 text-xs text-purple-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-300 shrink-0"></i><span>Custom Web & Mobile Platforms (React, Node, Python)</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-300 shrink-0"></i><span>Enterprise Cloud Architecture & DevOps</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-300 shrink-0"></i><span>REST & GraphQL Microservices Architecture</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-300 shrink-0"></i><span>Milestone-Based Transparent Delivery</span></li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="it-services.php" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-purple-400 to-indigo-400 hover:from-purple-300 hover:to-indigo-300 text-slate-900 font-bold text-sm flex items-center justify-center gap-2 shadow-md transition-all font-heading">
                        <span>Get Your Software Built</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Card 3: Research Paper Writing & Publication -->
            <div class="rounded-3xl bg-gradient-to-br from-amber-600 via-orange-700 to-red-900 text-white p-8 shadow-xl flex flex-col justify-between hover:-translate-y-2 transition-all duration-300 border border-orange-400/30 relative">
                <div class="absolute top-4 right-4 px-2.5 py-1 rounded-full bg-white/20 text-[11px] font-bold font-mono">
                    100+ Papers Published
                </div>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-amber-300 mb-6 border border-white/20">
                        <i data-lucide="book-open" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-mono uppercase tracking-wider text-amber-300">Academic Advisory</span>
                    <h3 class="text-2xl font-bold font-heading text-white mt-1">Research Paper Publication</h3>
                    <p class="text-orange-100 text-sm mt-3 leading-relaxed">
                        Step-by-step guidance for faculty, PhD scholars, and students to structure and publish original research in top global indexed journals.
                    </p>
                    <ul class="mt-6 space-y-2.5 text-xs text-orange-100">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-300 shrink-0"></i><span>Scopus (Q1/Q2), IEEE Xplore & Springer Nature</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-300 shrink-0"></i><span>Novel Problem Statement & Methodology</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-300 shrink-0"></i><span>Turnitin Similarity Verification (&lt; 10%)</span></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-300 shrink-0"></i><span>Peer Review Rebuttal & Camera-Ready Prep</span></li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="research-publication.php" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-amber-400 to-orange-400 hover:from-amber-300 hover:to-orange-300 text-slate-900 font-bold text-sm flex items-center justify-center gap-2 shadow-md transition-all font-heading">
                        <span>Publish Your Paper</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Technology Internship Academy Banner -->
<section class="py-16 bg-slate-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
        <div class="max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-400/30 text-emerald-400 text-xs font-mono mb-3">
                <i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i>
                <span>Corporate Mentorship Program</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-white">
                Launch Your Tech Career with Real Enterprise Experience
            </h2>
            <p class="text-slate-300 text-base mt-3 leading-relaxed">
                Work directly on production-grade codebases, AI pipelines, and cloud systems. Get direct 1-on-1 industry mentorship and verified corporate internship certification.
            </p>
            <div class="flex flex-wrap gap-2 mt-4 text-xs font-mono text-emerald-300">
                <span class="px-2.5 py-1 rounded-lg bg-slate-800 border border-slate-700">AI & Machine Learning</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-800 border border-slate-700">Data Analytics & Power BI</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-800 border border-slate-700">Full Stack Web Dev</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-800 border border-slate-700">Python Automation</span>
                <span class="px-2.5 py-1 rounded-lg bg-slate-800 border border-slate-700">Cyber Security</span>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 shrink-0">
            <button onclick="openApplyModal()" class="px-8 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition-all shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-2 font-heading">
                <span>Apply for Internship</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
            <a href="careers.php" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 font-semibold text-sm transition-all flex items-center justify-center gap-2">
                <span>Explore Careers & Vacancies</span>
            </a>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-20 bg-gradient-to-r from-blue-700 via-indigo-800 to-slate-900 text-white text-center relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 relative z-10 space-y-6">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading leading-tight">
            Ready to Build Your Next Digital Product?
        </h2>
        <p class="text-lg text-blue-100 max-w-2xl mx-auto leading-relaxed">
            Connect with our engineering team today for an upfront scope assessment and price quote in Indian Rupees (₹).
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <button onclick="openQuoteModal()" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-white text-blue-900 hover:bg-blue-50 font-extrabold text-base shadow-xl transition-transform hover:scale-105 font-heading">
                Request a Custom Quote
            </button>
            <a href="contact.php" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-base transition-colors">
                Contact Technical Team
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

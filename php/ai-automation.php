<?php
require_once __DIR__ . '/includes/cms.php';
$service = cms_get_service('ai-automation');
$page_seo = cms_get_page_seo('ai-automation');
$page_title = $page_seo['meta_title'] ?? (($service['title'] ?? "AI & Automation") . " — " . SITE_NAME);
$page_desc = $page_seo['meta_description'] ?? ($service['short_desc'] ?? "Intelligent autonomous agents, generative AI, and end-to-end workflow automation.");
require_once __DIR__ . '/includes/header.php';

$srv_title = $service['title'] ?? 'AI & Automation';
$srv_badge = $service['badge'] ?? 'Autonomous Intelligence';
$srv_short = $service['short_desc'] ?? 'Intelligent autonomous agents, generative AI, and end-to-end workflow automation.';
$srv_content = $service['content'] ?? [];
$srv_overview = !empty($srv_content['overview']) ? $srv_content['overview'] : 'Empower your enterprise with intelligent conversational agents, autonomous multi-step workflow pipelines, computer vision, and predictive machine learning models.';
$srv_cta = $srv_content['cta'] ?? [];
$srv_cta_title = $srv_cta['title'] ?? ('Ready to Discuss Your ' . $srv_title . ' Requirements?');
$srv_cta_sub = $srv_cta['subtitle'] ?? 'Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.';
$srv_cta_btn = $srv_cta['button_text'] ?? ('Inquire About ' . $srv_title);
$srv_cta_url = $srv_cta['button_url'] ?? 'contact.php';
?>

<!-- 1. Visually Attractive Hero Section with Bespoke Graphic -->
<section class="relative pt-10 pb-16 lg:pt-14 lg:pb-20 bg-gradient-to-b from-slate-50 via-white to-white border-b border-slate-200/90 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>
    <div class="absolute -top-24 right-1/4 w-[550px] h-[550px] bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

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
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="bot" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-cyan-50 text-cyan-800 border-cyan-200">
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
                    <?= htmlspecialchars($srv_overview) ?>
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="<?= htmlspecialchars($srv_cta_url) ?>" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span><?= htmlspecialchars($srv_cta_btn) ?></span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading shadow-2xs">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2 shadow-2xs">
                        <i data-lucide="phone-call" class="w-4 h-4 text-cyan-600"></i>
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
                        <div class="absolute -inset-2 bg-gradient-to-r from-blue-600/25 via-cyan-500/25 to-indigo-600/25 rounded-3xl blur-2xl opacity-75 pointer-events-none"></div>
                        <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                            <div class="flex items-center justify-between px-4 py-3 bg-slate-950/90 border-b border-slate-800">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                    <span class="ml-2 text-xs font-mono text-slate-400">agent_orchestrator.py</span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-950 text-emerald-400 border border-emerald-800/80 text-[10px] font-mono">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>LIVE PIPELINE</span>
                                </span>
                            </div>
                            <div class="p-5 space-y-3.5 text-xs">
                                <div class="p-3 rounded-xl bg-slate-800/70 border border-slate-700/60 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-cyan-500/10 text-cyan-400 flex items-center justify-center border border-cyan-500/20">
                                            <i data-lucide="zap" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-200">Inbound Event Ingestion</p>
                                            <p class="text-[11px] text-slate-400 font-mono">WhatsApp Cloud API & ERP Webhook</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-cyan-400 bg-cyan-950/80 px-2 py-0.5 rounded border border-cyan-800/50">200 OK</span>
                                </div>
                                <div class="flex justify-center -my-1">
                                    <div class="w-0.5 h-3 bg-gradient-to-b from-cyan-500 to-indigo-500"></div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-800/90 border border-indigo-500/40 flex items-center justify-between shadow-inner">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center border border-indigo-500/40">
                                            <i data-lucide="brain" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white">Cognitive RAG Retrieval</p>
                                            <p class="text-[11px] text-slate-300 font-mono">Vector Embeddings + Claude 3.5 Sonnet</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-indigo-300 bg-indigo-950 px-2.5 py-0.5 rounded border border-indigo-800">Match 99.4%</span>
                                </div>
                                <div class="flex justify-center -my-1">
                                    <div class="w-0.5 h-3 bg-gradient-to-b from-indigo-500 to-blue-500"></div>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-800/70 border border-slate-700/60 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center border border-emerald-500/20">
                                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-200">Automated Resolution & DB Sync</p>
                                            <p class="text-[11px] text-slate-400 font-mono">Invoice Approved & Customer Notified</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-mono text-emerald-400 bg-emerald-950/80 px-2 py-0.5 rounded border border-emerald-800/50">COMPLETE</span>
                                </div>
                            </div>
                            <div class="px-5 py-3 bg-slate-950/90 border-t border-slate-800/80 flex items-center justify-between text-[11px] font-mono text-slate-400">
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="clock" class="w-3.5 h-3.5 text-cyan-400"></i>
                                    <span>Latency: <strong class="text-white">210ms</strong></span>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                                    <span>Guardrails: <strong class="text-emerald-400">Enforced</strong></span>
                                </span>
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
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="compass" class="w-3.5 h-3.5 text-current"></i>
                    <span>Executive Overview</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Engineering Value & Practice Scope
                </h2>
            </div>
            <div class="lg:col-span-7">
                <p class="text-base sm:text-lg text-slate-700 leading-relaxed font-normal bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs">
                    Our AI & Automation practice builds intelligent, production-ready systems that transform operational efficiency. We combine state-of-the-art Large Language Models (LLMs), autonomous event-driven agents, and computer vision pipelines to eliminate manual overhead, accelerate decision-making, and create responsive customer experiences.
                </p>
            </div>
        </div>

        <!-- 3 Strategic Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Enterprise RAG & Guardrails</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Private vector embeddings and isolated document stores ensuring zero data leakage, hallucination shielding, and strict SOC 2 compliance.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="zap" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Autonomous Event Pipelines</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Event-driven microservices connecting WhatsApp, ERPs, CRMs, and payment gateways with sub-second response telemetry.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs">
                            <i data-lucide="brain" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Human-in-the-Loop Safeguards</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated confidence scoring that immediately flags ambiguous edge cases for human review while auto-executing high-confidence tasks.</p>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 3. Core Technical Concepts & Technologies -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-current"></i>
                <span>Architectural Principles</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Fundamental technical concepts and engineering standards underpinning our AI & Automation practice.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="brain" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">01</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Artificial Intelligence (AI)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Foundational algorithms and neural systems capable of reasoning, planning, and executing complex cognitive tasks autonomously.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="cpu" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">02</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Machine Learning (ML)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Supervised and unsupervised models trained on structured enterprise data to generate predictive insights and automated classifications.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="sparkles" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">03</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Generative AI & LLMs</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Custom retrieval-augmented generation (RAG) architectures leveraging GPT-4o, Claude, and open-source models with private enterprise context.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="message-square" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">04</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Natural Language Processing (NLP)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-precision semantic understanding, sentiment analysis, entity extraction, and multilingual translation for enterprise text streams.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="eye" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">05</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Computer Vision</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated visual inspection, optical character recognition (OCR), facial verification, and object tracking across images and video feeds.</p>
                    </div>
                </div>
                <div class="p-6 sm:p-7 rounded-2xl bg-white border border-slate-200/90 hover:border-cyan-400 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                            <i data-lucide="zap" class="w-5 h-5 stroke-[2]"></i>
                        </div>
                        <span class="text-xs font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 border border-slate-200">06</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Intelligent Automation (IA)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Connecting AI decision nodes directly into existing operational APIs, ERPs, and CRMs to automate multi-step business transactions.</p>
                    </div>
                </div>
        </div>

        <!-- Technology Stack & Tooling Integrated Section -->
        <div class="pt-8 space-y-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
                    <i data-lucide="terminal" class="w-3.5 h-3.5 text-current"></i>
                    <span>Production Tooling & Tech Stack</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 font-heading">
                    Technologies & Frameworks We Leverage
                </h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Core Language</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Python</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Frameworks</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">FastAPI / PyTorch</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Foundation Models</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">OpenAI & Claude LLMs</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Agent Orchestration</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">LangChain & LlamaIndex</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Vector Databases</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">ChromaDB / Pinecone</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Event Pipelines</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">n8n Automation Engine</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Messaging Gateway</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">WhatsApp Cloud API</span>
                </div>
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50/80 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-sm transition-all flex flex-col justify-between">
                    <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Cloud Deployment</span>
                    <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Docker & AWS ECS</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer (Specific Capabilities with Deliverables) -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-50/70 via-slate-50/40 to-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Custom RAG AI Chatbots</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Context-aware conversational assistants trained on private company documentation, SOPs, and knowledge repositories.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Private Vector Database Indexing</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Role-Based Knowledge Retrieval</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Multilingual Query Support</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Autonomous AI Agents</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Goal-driven multi-step agents that proactively plan tasks, query databases, invoke APIs, and deliver verifiable outcomes.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Multi-Step Planning & Execution</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>API & Tool Calling Functions</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Self-Correction & Fallbacks</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Business Process Automation</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end digitisation of routine back-office approvals, customer triage, and transaction workflows.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>ERP & CRM System Sync</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Approval Chains & Escalations</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Audit Trail & Compliance Logs</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Workflow Automation (n8n & Webhooks)</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-platform automated event pipelines synchronising CRMs, payment gateways, email systems, and messaging apps.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Cross-Platform Event Triggers</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Payload Transformation & Parsing</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>High-Volume Message Queues</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Intelligent OCR Document Extraction</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated extraction and structured validation of data from invoices, purchase orders, identity cards, and receipts.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Key-Value Document Parsing</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Table & Line Item Recognition</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Multi-Format PDF/Image Support</span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-4 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-700 border border-cyan-200 flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 stroke-[2.5]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Enterprise AI Integration</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Seamless embedding of AI microservices into your existing web, mobile, and legacy ERP infrastructure.</p>
                        <div class="pt-3 border-t border-slate-100 space-y-2">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block font-semibold">Core Capabilities:</span>
                            <ul class="space-y-1.5">
                                
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Microservice Architecture</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>Low-Latency REST/gRPC Endpoints</span>
                                    </li>
                                    <li class="flex items-center gap-2 text-xs text-slate-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                                        <span>On-Premise & Cloud Hybrid Support</span>
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
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 01
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Requirement Analysis</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">We analyze manual friction points, existing data sources, and business objectives to define measurable automation KPIs.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Feasibility Assessment & Automation Blueprint
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 02
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 1: Discovery</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">AI Solution Design</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Architecting the prompt strategy, vector embedding pipeline, data schemas, security guardrails, and system integrations.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Architecture Schema & Security Guardrail Specs
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 03
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Development & Tuning</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Engineering custom microservices, fine-tuning retrieval models, and building structured workflow triggers in Python.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Functional Agent Prototype & Retrieval Model
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 04
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 2: Execution</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">API Integration</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Connecting the AI engine directly with your operational tools (WhatsApp, CRM, databases, ERP, and payment platforms).</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            End-to-End API Webhooks & ERP Connections
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 05
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Rigorous Testing & QA</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Validating model accuracy, latency thresholds, hallucinations, edge-case fallbacks, and data privacy security controls.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            QA Validation Report & Accuracy Audit
                        </span>
                    </div>
                </div>
                <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400 transition-all duration-300 space-y-4 relative flex flex-col justify-between group">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200">
                                Step 06
                            </span>
                            <span class="text-slate-400 text-xs font-mono font-medium">Phase 3: Launch</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Deployment & Monitoring</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Zero-downtime cloud release with continuous telemetry, prompt performance tracking, and automated failure retries.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-100">
                        <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                        <span class="text-xs font-semibold bg-cyan-50/90 text-cyan-900 border-cyan-200/80 px-3 py-1.5 rounded-lg block leading-tight">
                            Production Deployment & Live Telemetry
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
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-50 text-cyan-800 border-cyan-200 text-xs font-semibold uppercase tracking-wider font-mono">
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
                            Fintech & Customer Support
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">24/7 Omnichannel Customer Support</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Resolving up to 70% of inbound customer queries instantly across web chat and WhatsApp without human agent intervention.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>70% Instant First-Contact Resolution</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Supply Chain & Corporate Finance
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Automated Accounts Payable & Invoicing</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Ingesting incoming vendor invoices via OCR, reconciling against purchase orders, and pushing to accounting software.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>85% Manual AP Cycle Time Reduction</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            Enterprise HR Operations
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">HR & Employee Onboarding Assistant</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Guiding new hires through documentation, policy lookups, hardware provisioning, and automated training modules.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>Zero-Wait Onboarding Processing</span>
                    </div>
                </div>
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-slate-400 hover:bg-white hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                            B2B Sales & Marketing
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">Sales Lead Qualification & Routing</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Instant conversational qualification of website leads, calendar appointment booking, and CRM data enrichment.</p>
                    </div>
                    <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200/90">
                        <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                        <span>3.2x Faster Qualified Lead Routing</span>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- 7. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

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

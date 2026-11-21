<?php
$page_title = "Services — NEXTECHX SOLUTIONS";
$page_desc = "Explore our 5 core services: AI & Automation, Software Development, SaaS Development, Data Annotation, and BPO Services.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-20 bg-gradient-to-b from-slate-50/70 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/80 text-blue-800 text-xs font-semibold tracking-wide uppercase font-mono">
            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-blue-600"></i>
            <span>Enterprise Technical Services</span>
        </div>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight font-heading">
            Our Services
        </h1>

        <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Delivering focused digital engineering, cloud software architectures, intelligent automation, precision data labeling, and business process outsourcing solutions designed to accelerate growth.
        </p>
    </div>
</section>

<!-- 2. Services Grid: Exactly 5 Service Cards with Modern Colorful Gradients -->
<section class="py-16 lg:py-24 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-wrap justify-center gap-8 items-stretch">
            
            <!-- Card 1: AI & Automation -->
            <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                <a href="ai-automation.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>

                    <div class="space-y-5">
                        <div class="flex items-center justify-between gap-4 pt-1">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                <i data-lucide="bot" class="w-7 h-7 stroke-[2]"></i>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-700 border border-blue-200">
                                Autonomous Intelligence
                            </span>
                        </div>

                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                            AI & Automation
                        </h2>

                        <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                            Empower your enterprise with intelligent conversational agents, autonomous multi-step workflow pipelines, computer vision, and predictive machine learning models.
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                Core Capabilities:
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Custom RAG AI Chatbots</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Autonomous AI Agents</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Business Process Automation</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Workflow Automation (n8n & Webhooks)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-blue-500/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                            <span>Explore Service</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2: Software Development -->
            <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                <a href="software-development.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500"></div>

                    <div class="space-y-5">
                        <div class="flex items-center justify-between gap-4 pt-1">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                <i data-lucide="code-2" class="w-7 h-7 stroke-[2]"></i>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-purple-50 text-purple-700 border border-purple-200">
                                Custom Engineering
                            </span>
                        </div>

                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                            Software Development
                        </h2>

                        <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                            End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                Core Capabilities:
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Custom Web Applications</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Enterprise Backend Systems</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">API Development & Integration</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Database Engineering & Optimization</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-indigo-500/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                            <span>Explore Service</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3: SaaS Development -->
            <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                <a href="saas-development.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-700"></div>

                    <div class="space-y-5">
                        <div class="flex items-center justify-between gap-4 pt-1">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                <i data-lucide="layers" class="w-7 h-7 stroke-[2]"></i>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-sky-50 text-sky-700 border border-sky-200">
                                Cloud Product Engineering
                            </span>
                        </div>

                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                            SaaS Development
                        </h2>

                        <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                            Complete Software-as-a-Service product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                Core Capabilities:
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Custom SaaS Platform Engineering</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Multi-Tenant Cloud Architecture</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Subscription Billing & Gateways</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Admin & Executive Dashboards</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-sky-600 to-blue-600 text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-sky-500/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                            <span>Explore Service</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 4: Data Annotation -->
            <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                <a href="data-annotation.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-teal-600 via-emerald-600 to-cyan-600"></div>

                    <div class="space-y-5">
                        <div class="flex items-center justify-between gap-4 pt-1">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                <i data-lucide="check-square" class="w-7 h-7 stroke-[2]"></i>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-emerald-50 text-emerald-700 border border-emerald-200">
                                AI & ML Training Datasets
                            </span>
                        </div>

                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                            Data Annotation
                        </h2>

                        <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                            High-precision data labeling and annotation solutions providing clean, structured ground-truth datasets for computer vision and NLP models.
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                Core Capabilities:
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">2D & 3D Bounding Boxes</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Polygon & Semantic Segmentation</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Image Classification & Tagging</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Text Annotation & NER</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-emerald-500/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                            <span>Explore Service</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 5: BPO Services -->
            <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                <a href="bpo-services.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-700 via-slate-800 to-indigo-900"></div>

                    <div class="space-y-5">
                        <div class="flex items-center justify-between gap-4 pt-1">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-700 via-slate-800 to-indigo-900 text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                <i data-lucide="headphones" class="w-7 h-7 stroke-[2]"></i>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono bg-slate-100 text-slate-800 border border-slate-300">
                                Business Process Outsourcing
                            </span>
                        </div>

                        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                            BPO Services
                        </h2>

                        <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                            Professional Business Process Outsourcing solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                Core Capabilities:
                            </h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">High-Volume Data Entry & Cleansing</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Back-Office Operational Support</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">Multichannel Customer Support</span>
                                </li>
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                    <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                    </div>
                                    <span class="leading-tight font-medium">eCommerce Catalog Management</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-800 text-white font-bold text-xs sm:text-sm text-center shadow-md shadow-blue-900/10 transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                            <span>Explore Service</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- 3. Closing Contact CTA Section -->
<section class="py-16 lg:py-20 bg-white border-t border-slate-200/80">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 border border-blue-200/80 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-600"></i>
            <span>Structured Engagements • Zero Ambiguity</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
            Ready to Discuss Your Project Requirements?
        </h2>

        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
        </p>

        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm transition-all font-heading flex items-center gap-2 active:scale-95">
                <span>Contact Us</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading">
                Request Quotation
            </button>

            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-blue-600"></i>
                <span>Book Strategy Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

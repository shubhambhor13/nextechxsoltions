<?php
$page_title = "Services — NEXTECHX SOLUTIONS";
$page_desc = "Explore our core services: AI & Automation, Software Development, SaaS Development, Data Annotation, and BPO Services.";
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

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
            Our Core Services
        </h1>

        <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Delivering focused artificial intelligence, software engineering, SaaS development, data labeling, and business process outsourcing solutions.
        </p>
    </div>
</section>

<!-- 2. Services Grid: Exactly 5 Service Cards -->
<section class="py-16 lg:py-24 bg-slate-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-wrap justify-center gap-8 items-stretch">
            
            <!-- Card 1: AI & Automation -->
            <a href="ai-automation.php" class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <i data-lucide="bot" class="w-6 h-6 stroke-[1.9]"></i>
                        </div>
                        <span class="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                            <span>Details</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i>
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        AI & Automation
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Intelligent autonomous agents, conversational AI chatbots, and streamlined workflow automation designed to eliminate manual bottlenecks and accelerate operational velocity.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities:
                        </h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Custom RAG AI Chatbots with Enterprise Context</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Official WhatsApp Business Cloud API Flows</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Autonomous Event & Workflow Pipelines (n8n)</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Intelligent OCR for Invoices, Receipts & KYC</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100">
                    <div class="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                        <span>View Service Details</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- Card 2: Software Development -->
            <a href="software-development.php" class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <i data-lucide="code-2" class="w-6 h-6 stroke-[1.9]"></i>
                        </div>
                        <span class="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                            <span>Details</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i>
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        Software Development
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        End-to-end custom software engineering built for high reliability, performance, and enterprise scalability across modern web and mobile platforms.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities:
                        </h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Custom Enterprise Web Applications</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">High-Throughput RESTful & GraphQL Microservices</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Cross-Platform iOS & Android Mobile Engineering</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Automated CI/CD & Cloud Infrastructure</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100">
                    <div class="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                        <span>View Service Details</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- Card 3: SaaS Development -->
            <a href="saas-development.php" class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <i data-lucide="layers" class="w-6 h-6 stroke-[1.9]"></i>
                        </div>
                        <span class="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                            <span>Details</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i>
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        SaaS Development
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Complete Software-as-a-Service (SaaS) product development—from multi-tenant architecture and subscription billing to secure user role management and cloud deployment.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities:
                        </h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Multi-Tenant Cloud Architectures</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Subscription Billing & Payment Gateways</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Role-Based Access Control (RBAC) & Portals</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">High-Availability Cloud Hosting (99.9% SLA)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100">
                    <div class="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                        <span>View Service Details</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- Card 4: Data Annotation -->
            <a href="data-annotation.php" class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <i data-lucide="check-square" class="w-6 h-6 stroke-[1.9]"></i>
                        </div>
                        <span class="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                            <span>Details</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i>
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        Data Annotation
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        High-precision data labeling and annotation solutions that provide clean, structured ground-truth datasets for AI and Machine Learning models.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities:
                        </h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Image Annotation (Polygons & Keypoints)</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Text Annotation & NER Entity Tagging</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Video Annotation & Multi-Frame Object Tracking</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Object Detection & 2D/3D Bounding Boxes</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100">
                    <div class="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                        <span>View Service Details</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- Card 5: BPO Services -->
            <a href="bpo-services.php" class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] bg-white rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <i data-lucide="headphones" class="w-6 h-6 stroke-[1.9]"></i>
                        </div>
                        <span class="inline-flex items-center text-xs font-semibold font-mono text-blue-600 group-hover:translate-x-0.5 transition-transform">
                            <span>Details</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i>
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                        BPO Services
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        Professional Business Process Outsourcing (BPO) solutions that streamline day-to-day back-office operations, customer support, and administrative workflows.
                    </p>

                    <div class="pt-2 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider font-mono mb-3">
                            Key Capabilities:
                        </h4>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Multichannel Customer Support (Email & Chat)</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Data Entry & Digital Records Verification</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Order Processing & Catalog Management</span>
                            </li>
                            <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                <div class="w-4 h-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                </div>
                                <span class="leading-tight">Quality Assurance Auditing & Reporting</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100">
                    <div class="w-full py-3 px-4 rounded-xl bg-slate-50 group-hover:bg-blue-600 group-hover:text-white text-slate-800 font-semibold text-xs sm:text-sm text-center transition-all font-heading flex items-center justify-center gap-2">
                        <span>View Service Details</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>
</section>

<!-- 3. Closing Contact CTA Section -->
<section class="py-16 lg:py-20 bg-white border-t border-slate-200/80">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 border border-blue-200/80 text-xs font-semibold font-mono">
            <span>Get In Touch</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Ready to Discuss Your Project Requirements?
        </h2>

        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Contact our engineering team to evaluate your scope and receive actionable technical guidance.
        </p>

        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-xs transition-colors font-heading flex items-center gap-2">
                <span>Contact Us</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors font-heading">
                Request Quotation
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<?php
$page_title = "AI & Automation — NEXTECHX SOLUTIONS";
$page_desc = "Intelligent autonomous agents, generative AI, and end-to-end workflow automation.";
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
            <span class="text-slate-900 font-semibold">AI & Automation</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="bot" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-blue-50 text-blue-700 border border-blue-200">
                        Autonomous Intelligence
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    AI & Automation
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Our AI & Automation practice builds intelligent, production-ready systems that transform operational efficiency. We combine state-of-the-art Large Language Models (LLMs), autonomous event-driven agents, and computer vision pipelines to eliminate manual overhead, accelerate decision-making, and create responsive customer experiences.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                        <span>Inquire About AI & Automation</span>
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
                Fundamental technical concepts and engineering standards underpinning our AI & Automation implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">01</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Artificial Intelligence (AI)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Foundational algorithms and neural systems capable of reasoning, planning, and executing complex cognitive tasks autonomously.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">02</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Machine Learning (ML)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Supervised and unsupervised models trained on structured enterprise data to generate predictive insights and automated classifications.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">03</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Generative AI & LLMs</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Custom retrieval-augmented generation (RAG) architectures leveraging GPT-4o, Claude, and open-source models with private enterprise context.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">04</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Natural Language Processing (NLP)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">High-precision semantic understanding, sentiment analysis, entity extraction, and multilingual translation for enterprise text streams.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">05</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Computer Vision</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated visual inspection, optical character recognition (OCR), facial verification, and object tracking across images and video feeds.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-blue-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-blue-700 flex items-center justify-center font-bold text-xs font-mono">06</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Intelligent Automation (IA)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Connecting AI decision nodes directly into existing operational APIs, ERPs, and CRMs to automate multi-step business transactions.</p>
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
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom RAG AI Chatbots</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Context-aware conversational assistants trained on private company documentation, SOPs, and knowledge repositories.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Autonomous AI Agents</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Goal-driven multi-step agents that proactively plan tasks, query databases, invoke APIs, and deliver verifiable outcomes.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Business Process Automation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">End-to-end digitisation of routine back-office approvals, customer triage, and transaction workflows.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Workflow Automation (n8n & Webhooks)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-platform automated event pipelines synchronising CRMs, payment gateways, email systems, and messaging apps.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Intelligent OCR Document Extraction</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated extraction and structured validation of data from invoices, purchase orders, identity cards, and receipts.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Enterprise AI Integration</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Seamless embedding of AI microservices into your existing web, mobile, and legacy ERP infrastructure.</p>
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
                Battle-tested tools, languages, and frameworks leveraged across our AI & Automation lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Core Language</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Python</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Frameworks</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">FastAPI / PyTorch</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Foundation Models</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">OpenAI & Claude LLMs</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Agent Orchestration</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">LangChain & LlamaIndex</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Vector Databases</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">ChromaDB / Pinecone</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Event Pipelines</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">n8n Automation Engine</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Messaging Gateway</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">WhatsApp Cloud API</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Cloud Deployment</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Docker & AWS ECS</span>
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
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Requirement Analysis</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">We analyze manual friction points, existing data sources, and business objectives to define measurable automation KPIs.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 02</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">AI Solution Design</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Architecting the prompt strategy, vector embedding pipeline, data schemas, security guardrails, and system integrations.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 03</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Development & Tuning</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Engineering custom microservices, fine-tuning retrieval models, and building structured workflow triggers in Python.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 04</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">API Integration</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Connecting the AI engine directly with your operational tools (WhatsApp, CRM, databases, ERP, and payment platforms).</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 05</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Rigorous Testing & QA</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Validating model accuracy, latency thresholds, hallucinations, edge-case fallbacks, and data privacy security controls.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700">Step 06</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Deployment & Monitoring</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Zero-downtime cloud release with continuous telemetry, prompt performance tracking, and automated failure retries.</p>
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
                High-leverage enterprise automation use cases built with NextTechX engineering.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">24/7 Omnichannel Customer Support</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Resolving up to 70% of inbound customer queries instantly across web chat and WhatsApp without human agent intervention.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Automated Accounts Payable & Invoicing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Ingesting incoming vendor invoices via OCR, reconciling against purchase orders, and pushing to accounting software.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">HR & Employee Onboarding Assistant</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Guiding new hires through documentation, policy lookups, hardware provisioning, and automated training modules.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Sales Lead Qualification & Routing</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Instant conversational qualification of website leads, calendar appointment booking, and CRM data enrichment.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Closing CTA Section -->
<section class="py-16 lg:py-20 bg-slate-50/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Accelerate Operations with Intelligent AI
        </h2>
        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Discuss your automation objectives with our AI engineering architects today.
        </p>
        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                <span>Contact Our AI Team</span>
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

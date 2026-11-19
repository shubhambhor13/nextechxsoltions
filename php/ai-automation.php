<?php
$page_title = "AI Automation & Workflow Solutions";
$page_desc = "Custom AI Chatbots, WhatsApp Cloud API Bots, n8n Orchestrations, and Intelligent Document Processing from NextTechX Solutions.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="bot" class="w-3.5 h-3.5"></i>
            <span>Intelligent Enterprise Automation</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            AI Automation Solutions
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Eliminate repetitive operational work. We build custom conversational AI agents, WhatsApp business bots, and autonomous n8n workflows that save time and reduce operating costs.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-extrabold text-sm shadow-lg shadow-cyan-500/20 transition-all font-heading">
                Calculate Automation Quotation
            </button>
            <a href="#solutions" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-semibold transition-colors">
                View 4 Core Architectures
            </a>
        </div>
    </div>
</section>

<!-- 4 Core Architectures -->
<section id="solutions" class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold font-mono uppercase tracking-wider text-blue-600">Architectures</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 mt-2">
                Proven AI & Workflow Solutions
            </h2>
            <p class="text-base text-slate-600 mt-3">
                Deployed using secure self-hosted environments with zero unauthorized data sharing.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Solution 1: AI Chatbots & RAG -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="bot" class="w-6 h-6"></i>
                </div>
                <h3 class="text-2xl font-bold font-heading text-slate-900">AI Chatbot & RAG Agents</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Custom generative AI assistants trained on your proprietary PDFs, FAQs, and product catalogs with strict zero-hallucination protocols.
                </p>
                <ul class="space-y-2 text-sm text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Hybrid Vector Search (pgvector / Pinecone)</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Automated human agent escalation on low confidence</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Multi-turn contextual conversational memory</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Omnichannel Web, Mobile & Slack integrations</span></li>
                </ul>
            </div>

            <!-- Solution 2: WhatsApp Automation -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="message-square" class="w-6 h-6"></i>
                </div>
                <h3 class="text-2xl font-bold font-heading text-slate-900">WhatsApp Cloud API Automation</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Transform WhatsApp into an autonomous 24/7 lead intake, order-tracking, and customer support channel with official Meta Cloud API integration.
                </p>
                <ul class="space-y-2 text-sm text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Automated lead qualification & instant invoice dispatch</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Interactive button menus and dynamic catalog lists</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>Multi-agent shared team routing inbox</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-600"></i><span>98%+ message open rates with zero latency</span></li>
                </ul>
            </div>

            <!-- Solution 3: n8n Orchestration -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="workflow" class="w-6 h-6"></i>
                </div>
                <h3 class="text-2xl font-bold font-heading text-slate-900">n8n Enterprise Orchestration</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Self-hosted, distributed n8n pipelines connecting CRMs, databases, and billing tools. Execute webhooks, data mappings, and automatic event handling.
                </p>
                <ul class="space-y-2 text-sm text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>Self-hosted on your cloud: Zero third-party data retention</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>500+ pre-built native API connectors</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>Custom Python / Node.js logic execution blocks</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-600"></i><span>Automated failure alerts & exponential retry logic</span></li>
                </ul>
            </div>

            <!-- Solution 4: Intelligent Document Processing -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-shadow space-y-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <h3 class="text-2xl font-bold font-heading text-slate-900">Intelligent Document Processing (IDP)</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Extract structured JSON data directly from scanned invoices, bank statements, identity cards, and legal PDFs with AI-backed accuracy.
                </p>
                <ul class="space-y-2 text-sm text-slate-700 pt-2">
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Multi-lingual OCR extraction with bounding box precision</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Automated field mapping to ERP / Accounting databases</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>High-confidence fraud detection & checksum validation</span></li>
                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Reduces manual data entry time by up to 85%</span></li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- Interactive ROI Savings Calculator -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-900 text-white shadow-2xl relative overflow-hidden">
            <div class="max-w-2xl">
                <span class="text-xs font-mono uppercase tracking-wider text-cyan-400">Financial Impact Estimator</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-heading text-white mt-1">Estimate Your Automation Savings (INR ₹)</h2>
                <p class="text-slate-300 text-sm mt-2">See how much time and money your organization can reclaim each year.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div>
                    <label class="block text-xs font-mono uppercase text-slate-400 mb-2">Team Size: <span id="teamVal" class="text-cyan-400 font-bold">15</span> people</label>
                    <input type="range" id="teamInput" min="2" max="100" value="15" class="w-full accent-cyan-400" oninput="calculateROI()">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase text-slate-400 mb-2">Hourly Cost: ₹<span id="rateVal" class="text-cyan-400 font-bold">800</span> / hr</label>
                    <input type="range" id="rateInput" min="200" max="3000" step="100" value="800" class="w-full accent-cyan-400" oninput="calculateROI()">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase text-slate-400 mb-2">Repetitive Hours: <span id="hoursVal" class="text-cyan-400 font-bold">12</span> hrs/wk</label>
                    <input type="range" id="hoursInput" min="2" max="30" value="12" class="w-full accent-cyan-400" oninput="calculateROI()">
                </div>
            </div>

            <div class="mt-8 p-6 rounded-2xl bg-slate-800/80 border border-slate-700/80 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                <div>
                    <div class="text-xs text-slate-400 uppercase font-mono">Weekly Hours Saved</div>
                    <div id="weeklySaved" class="text-2xl sm:text-3xl font-extrabold text-cyan-300 font-heading mt-1">135 hrs</div>
                </div>
                <div>
                    <div class="text-xs text-slate-400 uppercase font-mono">Monthly Cost Saved</div>
                    <div id="monthlySaved" class="text-2xl sm:text-3xl font-extrabold text-blue-400 font-heading mt-1">₹4,67,640</div>
                </div>
                <div>
                    <div class="text-xs text-slate-400 uppercase font-mono">Estimated Annual Savings</div>
                    <div id="annualSaved" class="text-2xl sm:text-3xl font-extrabold text-emerald-400 font-heading mt-1">₹56,11,680</div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-slate-900 font-bold text-sm shadow-md transition-all font-heading">
                    Request an AI Automation Proposal
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    function calculateROI() {
        const team = parseInt(document.getElementById('teamInput').value);
        const rate = parseInt(document.getElementById('rateInput').value);
        const hours = parseInt(document.getElementById('hoursInput').value);

        document.getElementById('teamVal').innerText = team;
        document.getElementById('rateVal').innerText = rate;
        document.getElementById('hoursVal').innerText = hours;

        const weeklyHours = Math.round(team * hours * 0.75);
        const monthly = Math.round(weeklyHours * 4.33 * rate);
        const annual = Math.round(monthly * 12);

        document.getElementById('weeklySaved').innerText = weeklyHours.toLocaleString('en-IN') + ' hrs';
        document.getElementById('monthlySaved').innerText = '₹' + monthly.toLocaleString('en-IN');
        document.getElementById('annualSaved').innerText = '₹' + annual.toLocaleString('en-IN');
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

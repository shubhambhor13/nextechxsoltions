<?php
$page_title = "Enterprise Services & Solutions";
$page_desc = "Explore specialized technical services from NextTechX Solutions: AI Automation, Custom Software, Enterprise Cloud, and Academic Research Publication.";
require_once __DIR__ . '/includes/header.php';
?>

<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="layers" class="w-3.5 h-3.5"></i>
            <span>Comprehensive Technical Practices</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Our Enterprise Services
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            High-performance digital engineering delivered with clear milestone scopes, transparent pricing in Indian Rupees (₹), and dedicated technical support.
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Practice 1: AI Automation -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-100 text-cyan-800 text-xs font-bold font-mono">
                    <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                    <span>AI & Workflow Automation</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">
                    Intelligent Chatbots, Agents & n8n Automation Workflows
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    We architect smart customer-facing conversational bots, WhatsApp messaging triggers, autonomous multi-step agents, and intelligent document extraction systems that save thousands of manual hours.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-sm text-slate-700">
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Custom RAG AI Chatbots</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>WhatsApp Cloud API Automation</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>n8n Multi-App Orchestration</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-cyan-600"></i><span>Invoice & ID OCR Processing</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="ai-automation.php" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm text-center shadow-md font-heading transition-colors">
                    Explore AI Practice Details
                </a>
                <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors text-center">
                    Get AI Automation Quote
                </button>
            </div>
        </div>

        <!-- Practice 2: IT Software Development -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold font-mono">
                    <i data-lucide="code-2" class="w-3.5 h-3.5"></i>
                    <span>Custom Software Engineering</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">
                    Custom Web Applications, Mobile Platforms & Enterprise Cloud
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    From early MVP prototypes to high-traffic production platforms. We engineer responsive web apps in React, backend microservices in Python & Node.js, and multi-region cloud infrastructures.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-sm text-slate-700">
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Enterprise Web & Mobile Apps</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Secure RESTful & GraphQL APIs</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Cloud Migration & Docker DevOps</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-600"></i><span>Transparent Milestone-Based SOWs</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="it-services.php" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm text-center shadow-md font-heading transition-colors">
                    Explore IT Practice Details
                </a>
                <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors text-center">
                    Get Software Quote
                </button>
            </div>
        </div>

        <!-- Practice 3: Research Paper Publication -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold font-mono">
                    <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                    <span>Academic & Doctoral Advisory</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">
                    Research Paper Structuring, Writing & Global Indexed Publication
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    End-to-end guidance for university faculty, PhD scholars, and students to structure novel academic manuscripts and navigate peer-reviewed indexed submissions in Scopus, IEEE Xplore, and Springer Nature.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-sm text-slate-700">
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Scopus (Q1/Q2), IEEE & Springer Indexing</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Literature Survey & PRISMA Protocols</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Turnitin Similarity Verification (&lt; 10%)</span></div>
                    <div class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-amber-600"></i><span>Camera-Ready Formatting & Revision Guidance</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-3 shrink-0 w-full sm:w-auto">
                <a href="research-publication.php" class="px-6 py-3.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-sm text-center shadow-md font-heading transition-colors">
                    Explore Research Advisory
                </a>
                <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors text-center">
                    Inquire Publication Support
                </button>
            </div>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

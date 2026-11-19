<?php
$page_title = "Research Paper Writing & Publication Advisory";
$page_desc = "End-to-end research guidance, Turnitin plagiarism check, and publication support for Scopus, IEEE Xplore, Springer, and UGC-CARE journals.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 border border-amber-400/30 text-amber-300 text-xs font-mono mb-4">
            <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
            <span>Over 100+ Papers Published in Indexed Journals</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Research Paper Writing & Publication
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Comprehensive academic advisory for university faculty, PhD scholars, and postgraduate researchers. From novel topic selection and empirical modeling to Scopus, IEEE, and Springer Nature publication.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-slate-900 font-extrabold text-sm shadow-lg shadow-amber-500/20 transition-all font-heading">
                Inquire Publication Support
            </button>
            <a href="#services" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-semibold transition-colors">
                Explore Advisory Process
            </a>
        </div>
    </div>
</section>

<!-- Indexed Journal Coverage -->
<section class="py-12 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-6 font-mono">
            Indexed In Top Global Peer-Reviewed Repositories
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="text-lg font-extrabold text-slate-900 font-heading">Scopus Indexed</div>
                <div class="text-xs text-amber-600 font-semibold mt-0.5">Q1, Q2, Q3, Q4 Journals</div>
            </div>
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="text-lg font-extrabold text-slate-900 font-heading">IEEE Xplore</div>
                <div class="text-xs text-blue-600 font-semibold mt-0.5">Conferences & Transactions</div>
            </div>
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="text-lg font-extrabold text-slate-900 font-heading">Springer Nature</div>
                <div class="text-xs text-indigo-600 font-semibold mt-0.5">Book Series & Journals</div>
            </div>
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="text-lg font-extrabold text-slate-900 font-heading">UGC-CARE Listed</div>
                <div class="text-xs text-emerald-600 font-semibold mt-0.5">Indian Academic Standards</div>
            </div>
        </div>
    </div>
</section>

<!-- 8 Core Services -->
<section id="services" class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold font-mono uppercase tracking-wider text-amber-700">Advisory Pipeline</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 mt-2">
                Complete Academic Publication Support
            </h2>
            <p class="text-base text-slate-600 mt-3">
                Ethical, rigorous support ensuring your manuscripts meet the highest international editorial standards.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="target" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Topic Selection</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Formulating contemporary, high-impact topics in AI/ML, Cloud, IoT, and Computer Science to maximize acceptance probability.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Literature Review</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    PRISMA-compliant survey of recent 2022–2026 indexed papers to establish clear research gaps and benchmark baselines.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Paper Structuring</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Structuring manuscripts into IEEE/Springer formats with clear introduction, methodology, mathematical formulations, and discussion.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Turnitin Verification</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Official Turnitin plagiarism verification ensuring similarity is strictly under 10% with zero AI-generated text flags.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="award" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Journal Matching</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Identifying legitimate, non-predatory indexed journals matching your specific sub-discipline, scope, and target timeframe.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center">
                    <i data-lucide="send" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Submission Advisory</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Preparing cover letters, conflict of interest declarations, suggested reviewers, and navigating ScholarOne / Editorial Manager.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Peer Review Rebuttals</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Formulating point-by-point reviewer rebuttals, supplemental experiments, and revised manuscripts to secure final acceptance.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
                <h3 class="text-base font-bold font-heading text-slate-900">Camera-Ready Proofs</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Managing LaTeX typesetting, high-resolution vector figures, author affiliations, and final DOI proofreading.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900">Publish Your Research With Confidence</h2>
        <p class="text-slate-600 text-base mt-3 max-w-2xl mx-auto">
            Discuss your paper proposal, thesis chapter, or conference submission with our academic advisory specialists today.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openQuoteModal()" class="px-8 py-3.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-sm shadow-md font-heading transition-all">
                Request Publication Quotation
            </button>
            <a href="contact.php" class="px-8 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors">
                Connect With Academic Advisor
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

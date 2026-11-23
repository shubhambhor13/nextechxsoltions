<?php
$page_title = "Frequently Asked Questions (FAQs)";
$page_desc = "Clear, straightforward answers about our online IT delivery model, pricing in INR, confidentiality, research advisory, and internship programs.";
require_once __DIR__ . '/includes/header.php';

$faqs = [
    [
        "category" => "General & Pricing",
        "q" => "How does your 100% online IT service work?",
        "a" => "We work with you completely online through Google Meet, Zoom, and WhatsApp. We show you clickable screens and live preview links as we build. You never have to travel or visit an office, which saves you time and keeps our prices low and fair."
    ],
    [
        "category" => "General & Pricing",
        "q" => "Do you sign an NDA before we share our idea?",
        "a" => "Yes, always. We sign a legal Non-Disclosure Agreement (NDA) with you before you share any idea, document, or research data. Everything you share remains 100% private and protected."
    ],
    [
        "category" => "General & Pricing",
        "q" => "How do you calculate your project prices?",
        "a" => "We give you a fixed price quote in Indian Rupees (₹) based on the work needed. There are no surprise fees or hidden hourly charges. You pay in small steps (milestones) as each phase is delivered and approved."
    ],
    [
        "category" => "General & Pricing",
        "q" => "Do I own all the source code after the project is done?",
        "a" => "Yes, 100%. Once final payment is made, all code, designs, and files belong completely to you. We transfer everything to your GitHub repository or cloud server. There are no ongoing licensing or lock-in fees."
    ],
    [
        "category" => "AI & Software",
        "q" => "What kind of AI chatbots can you build for my company?",
        "a" => "We build customer service bots that answer questions on your website or WhatsApp 24/7. They can check order status, book appointments, pull details from invoices, and pass complex questions to your human team seamlessly."
    ],
    [
        "category" => "AI & Software",
        "q" => "Will our private business data be used to train public AI models?",
        "a" => "Never. We use enterprise-grade API connections and self-hosted vector databases where your data is never retained, trained on, or shared with external parties. Strict zero-retention policies are enforced."
    ],
    [
        "category" => "Research Papers",
        "q" => "Which journals can you help us publish in?",
        "a" => "We guide researchers toward legitimate, non-predatory indexed journals in Scopus (Q1, Q2, Q3, Q4), IEEE Xplore conferences, Springer Nature series, and UGC-CARE approved lists."
    ],
    [
        "category" => "Research Papers",
        "q" => "Do you check for plagiarism before submission?",
        "a" => "Yes. Every manuscript undergoes official Turnitin similarity verification. We help you rephrase and refine text until the similarity score is safely below 10% with zero AI-generated flags."
    ],
    [
        "category" => "Internship Program",
        "q" => "How are interns selected for the program?",
        "a" => "Internship selection is strictly interview-based. After submitting your profile, shortlisted candidates attend a 1-on-1 virtual technical interview with our engineering leads. Candidates who clear the round receive an official Internship Offer Letter."
    ],
    [
        "category" => "Internship Program",
        "q" => "Are your internships open to students from all universities?",
        "a" => "Yes! We accept undergraduate, postgraduate, and diploma students from all accredited colleges across India. The entire program is conducted online with live video sessions and live project collaboration."
    ],
    [
        "category" => "Internship Program",
        "q" => "Do we get an official corporate certificate upon completion?",
        "a" => "Yes. Every student who completes their assigned project deliverables receives an official, verifiable corporate internship completion certificate and project letter from NexTechX Solutions."
    ]
];
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="help-circle" class="w-3.5 h-3.5"></i>
            <span>Clear & Honest Information</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Frequently Asked Questions
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Everything you need to know about our online IT delivery model, transparent pricing in INR (₹), code ownership, and student programs.
        </p>
    </div>
</section>

<!-- FAQs Accordion Section -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <?php foreach ($faqs as $i => $faq): ?>
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-200">
                <button onclick="toggleFaq(<?= $i ?>)" class="w-full p-6 text-left flex items-center justify-between gap-4 hover:bg-slate-50/50 transition-colors">
                    <span class="text-base sm:text-lg font-bold font-heading text-slate-900"><?= htmlspecialchars($faq['q']) ?></span>
                    <i data-lucide="chevron-down" id="faqIcon_<?= $i ?>" class="w-5 h-5 text-slate-400 transition-transform duration-200 shrink-0 <?= $i === 0 ? 'rotate-180 text-blue-600' : '' ?>"></i>
                </button>
                <div id="faqContent_<?= $i ?>" class="px-6 pb-6 text-sm text-slate-600 leading-relaxed <?= $i === 0 ? '' : 'hidden' ?>">
                    <div class="pt-2 border-t border-slate-100">
                        <?= htmlspecialchars($faq['a']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- Direct Support CTA -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">Still Have a Specific Question?</h2>
        <p class="text-slate-600 text-sm sm:text-base mt-2">Our technical leads are available to chat directly via WhatsApp or email.</p>
        <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
            <a href="<?= SITE_WHATSAPP_URL ?>" target="_blank" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md flex items-center gap-2 transition-colors font-heading">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Message on WhatsApp</span>
            </a>
            <button onclick="openQuoteModal()" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md flex items-center gap-2 transition-colors font-heading">
                <span>Request Quotation</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
</section>

<script>
    function toggleFaq(index) {
        const content = document.getElementById('faqContent_' + index);
        const icon = document.getElementById('faqIcon_' + index);
        if (content && icon) {
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
            icon.classList.toggle('text-blue-600');
        }
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

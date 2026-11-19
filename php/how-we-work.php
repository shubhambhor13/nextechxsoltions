<?php
$page_title = "How We Work — 5-Step Delivery Methodology";
$page_desc = "Our simple, transparent 5-step development process: Discovery, Visual Prototyping, Agile Coding, Quality Testing, and Official Launch.";
require_once __DIR__ . '/includes/header.php';

$steps = [
    [
        "num" => "01",
        "title" => "Friendly Discovery Call",
        "duration" => "1 - 2 Days",
        "tag" => "Step 1: First Chat",
        "icon" => "search",
        "desc" => "We talk with you to understand your goals, budget, and timeline. We answer all questions in simple, plain language.",
        "deliverables" => [
            "Friendly 20-minute video or phone call",
            "Clear technical proposal with milestone breakdown",
            "Upfront price quote in Indian Rupees (₹) with zero hidden fees",
            "Signed mutual NDA keeping your proprietary idea 100% confidential"
        ]
    ],
    [
        "num" => "02",
        "title" => "Visual Screen Prototyping",
        "duration" => "3 - 5 Days",
        "tag" => "Step 2: Interactive Plan",
        "icon" => "layout",
        "desc" => "Before writing code, we create clean visual screen layouts so you can see exactly how your product looks and functions.",
        "deliverables" => [
            "Clickable prototypes you can preview on your smartphone and computer",
            "Clear layouts tailored for mobile, tablet, and desktop viewports",
            "Selection of color palette, fonts, and button interactions",
            "Approval of screen flow before programming begins"
        ]
    ],
    [
        "num" => "03",
        "title" => "Agile Coding & Weekly Demos",
        "duration" => "1 - 3 Weeks",
        "tag" => "Step 3: Engineering",
        "icon" => "code-2",
        "desc" => "Our specialized engineers write clean, fast code. We share live demo links every week so you see real progress.",
        "deliverables" => [
            "Clean, well-documented source code in modern frameworks",
            "Private staging link where you can test live features in progress",
            "Weekly progress updates via WhatsApp or video call",
            "Immediate feedback integration into the next sprint"
        ]
    ],
    [
        "num" => "04",
        "title" => "Rigorous Quality Testing",
        "duration" => "3 - 5 Days",
        "tag" => "Step 4: Quality Check",
        "icon" => "shield-check",
        "desc" => "We test everything across iPhones, Androids, MacBooks, and Windows PCs to guarantee zero bugs, fast loading, and total security.",
        "deliverables" => [
            "Cross-browser and multi-device responsiveness testing",
            "Speed optimization for instant page loading",
            "Security verification preventing data leaks and unauthorized access",
            "Complete client walkthrough and training before handover"
        ]
    ],
    [
        "num" => "05",
        "title" => "Official Launch & Ongoing Care",
        "duration" => "Ongoing",
        "tag" => "Step 5: Go Live",
        "icon" => "rocket",
        "desc" => "We publish your application live on your domain and cloud servers. We hand over 100% of code ownership and remain available to help.",
        "deliverables" => [
            "Seamless live deployment to your domain and cloud host",
            "Full handover of source code repository, passwords, and admin rights",
            "30-day complimentary post-launch technical warranty",
            "Optional ongoing maintenance and new feature expansions"
        ]
    ]
];
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="workflow" class="w-3.5 h-3.5"></i>
            <span>Predictable 5-Step Execution</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            How We Work
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            No confusing technical jargon. We follow a simple, structured 5-step process that delivers your digital product on time, within budget, and with complete transparency.
        </p>
    </div>
</section>

<!-- Timeline Steps -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <?php foreach ($steps as $s): ?>
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm relative overflow-hidden flex flex-col md:flex-row items-start gap-6 lg:gap-8">
                <!-- Step Number Bubble -->
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-lg shadow-blue-500/20 font-heading font-black text-2xl">
                    <?= $s['num'] ?>
                </div>

                <div class="flex-1 space-y-3">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-mono font-bold"><?= $s['tag'] ?></span>
                        <span class="text-xs text-slate-400 flex items-center gap-1 font-mono"><i data-lucide="clock" class="w-3.5 h-3.5"></i> <?= $s['duration'] ?></span>
                    </div>

                    <h3 class="text-2xl font-bold font-heading text-slate-900"><?= htmlspecialchars($s['title']) ?></h3>
                    <p class="text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($s['desc']) ?></p>

                    <div class="pt-3">
                        <div class="text-xs font-mono uppercase text-slate-400 tracking-wider mb-2">What You Receive:</div>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-700">
                            <?php foreach ($s['deliverables'] as $d): ?>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5"></i>
                                    <span><?= htmlspecialchars($d) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- Bottom CTA -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900">Ready to Start with Step 1?</h2>
        <p class="text-slate-600 text-base mt-2 max-w-xl mx-auto">Book a free 20-minute chat. We will listen to your requirements and share an honest assessment.</p>
        <button onclick="openQuoteModal()" class="mt-6 px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md font-heading transition-all">
            Start Step 1: Free Friendly Call
        </button>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

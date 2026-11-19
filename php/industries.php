<?php
$page_title = "Industries We Serve";
$page_desc = "Tailored IT solutions and AI automation built for Manufacturing, E-Commerce, Healthcare, Banking, Logistics, and Education.";
require_once __DIR__ . '/includes/header.php';

$industries = [
    [
        "title" => "Manufacturing & Industrial Units",
        "tag" => "Factories & Inventory",
        "icon" => "layers",
        "desc" => "Digital inventory management, equipment maintenance alerts, and production telemetry dashboards.",
        "solutions" => [
            "QR code inventory tracking for raw materials and finished goods",
            "Preventative maintenance reminders sent directly via WhatsApp",
            "Live production dashboards showing shift output and defect rates",
            "Role-based staff portal for purchase orders and material requisition"
        ],
        "badge" => "bg-amber-50 text-amber-700 border-amber-200"
    ],
    [
        "title" => "Online Stores & Retail Shops",
        "tag" => "Retail & E-Commerce",
        "icon" => "shopping-bag",
        "desc" => "WhatsApp tools that answer customer questions 24/7, send order tracking links, and automate inventory syncing.",
        "solutions" => [
            "24/7 WhatsApp AI sales assistant and FAQ resolver",
            "Automated order confirmation, shipping links, and invoice dispatch",
            "Inventory sync between physical stores and digital web shop",
            "Customer re-engagement broadcasts with high open rates"
        ],
        "badge" => "bg-blue-50 text-blue-700 border-blue-200"
    ],
    [
        "title" => "Healthcare, Clinics & Diagnostics",
        "tag" => "Medical & Diagnostics",
        "icon" => "heart-pulse",
        "desc" => "Automated patient appointment booking, lab report delivery via WhatsApp, and smart invoice digitization.",
        "solutions" => [
            "Automated patient appointment scheduling and reminders",
            "Secure, encrypted delivery of pathology reports on WhatsApp",
            "OCR medical bill reader pulling patient details in seconds",
            "Doctor schedule management portal with SMS/WhatsApp alerts"
        ],
        "badge" => "bg-rose-50 text-rose-700 border-rose-200"
    ],
    [
        "title" => "Banking, FinTech & Accounting",
        "tag" => "Finance & Accounting",
        "icon" => "landmark",
        "desc" => "Automated customer inquiry handling, invoice parsing, and secure accounting reconciliations.",
        "solutions" => [
            "Instant account inquiry bots with strict authentication",
            "Automated bank statement & invoice data extraction into Excel/DB",
            "Payment reminder flows with direct UPI / NetBanking links",
            "Encrypted client document vault with bilateral confidentiality"
        ],
        "badge" => "bg-emerald-50 text-emerald-700 border-emerald-200"
    ],
    [
        "title" => "Logistics, Warehousing & Fleet",
        "tag" => "Transport & Supply Chain",
        "icon" => "truck",
        "desc" => "Vehicle dispatch dashboards, real-time GPS tracking, and automated proof of delivery receipts.",
        "solutions" => [
            "Live vehicle tracking on visual map dashboards",
            "Automated driver route assignment and trip logging",
            "Digital proof of delivery with customer photo/signature capture",
            "Automated vehicle fitness, fuel, and service reminders"
        ],
        "badge" => "bg-indigo-50 text-indigo-700 border-indigo-200"
    ],
    [
        "title" => "EdTech, Colleges & Training Institutes",
        "tag" => "Education & Academia",
        "icon" => "graduation-cap",
        "desc" => "Student admission lead capture, fee receipt dispatch, and research paper publication advisory.",
        "solutions" => [
            "Automated admission counseling chatbot on WhatsApp and Web",
            "Student fee payment notifications and instant PDF receipts",
            "Research paper publication advisory for faculty and PhD candidates",
            "LMS portal for assignments, attendance, and video lectures"
        ],
        "badge" => "bg-purple-50 text-purple-700 border-purple-200"
    ]
];
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
            <span>Domain-Specific Engineering</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Industries We Serve
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Every industry has unique workflows. We tailor our software architectures and AI automations to solve your specific operational challenges.
        </p>
    </div>
</section>

<!-- Industries Grid -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($industries as $ind): ?>
                <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full border text-xs font-mono font-semibold <?= $ind['badge'] ?>"><?= htmlspecialchars($ind['tag']) ?></span>
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center">
                                <i data-lucide="<?= $ind['icon'] ?>" class="w-5 h-5"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold font-heading text-slate-900"><?= htmlspecialchars($ind['title']) ?></h3>
                        <p class="text-sm text-slate-600 mt-2 leading-relaxed"><?= htmlspecialchars($ind['desc']) ?></p>

                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <div class="text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-3">Key Deliverables</div>
                            <ul class="space-y-2 text-xs text-slate-700">
                                <?php foreach ($ind['solutions'] as $sol): ?>
                                    <li class="flex items-start gap-2">
                                        <i data-lucide="check" class="w-4 h-4 text-blue-600 shrink-0 mt-0.5"></i>
                                        <span><?= htmlspecialchars($sol) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <button onclick="openQuoteModal()" class="w-full py-2.5 px-4 rounded-xl bg-slate-50 hover:bg-blue-600 hover:text-white text-blue-600 text-xs font-bold transition-all flex items-center justify-center gap-1.5 font-heading">
                            <span>Inquire for this Industry</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Bottom CTA -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900">Don't See Your Exact Industry Listed?</h2>
        <p class="text-slate-600 text-base mt-2 max-w-xl mx-auto">We build custom digital workflows and software for niche businesses across all sectors.</p>
        <button onclick="openQuoteModal()" class="mt-6 px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md font-heading transition-all">
            Discuss Your Custom Requirement
        </button>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

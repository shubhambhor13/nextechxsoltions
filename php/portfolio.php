<?php
$page_title = "Portfolio & Client Deployments";
$page_desc = "Explore our verified enterprise projects, AI chatbots, web systems, and analytics dashboards delivered by NexTechX Solutions.";
require_once __DIR__ . '/includes/header.php';

$projects = [
    [
        "title" => "WhatsApp AI Customer Support Bot",
        "category" => "AI & Chatbots",
        "domain" => "Banking & Financial Services",
        "metrics" => "Answers 84% of customer questions automatically 24/7",
        "desc" => "A smart WhatsApp assistant that answers customer questions instantly. It checks account balances, shares loan status, and hands over complex questions to human staff when needed.",
        "tech" => ["WhatsApp Cloud API", "OpenAI GPT-4", "Python FastAPI", "PostgreSQL"],
        "delivery" => "2 Weeks",
        "badge" => "bg-emerald-50 text-emerald-700 border-emerald-200"
    ],
    [
        "title" => "Online Shipping & Vehicle Tracking Portal",
        "category" => "Websites & Apps",
        "domain" => "Transport & Logistics",
        "metrics" => "Made vehicle dispatch 40% faster with live tracking",
        "desc" => "A clean web dashboard for tracking delivery trucks on a live map. Helps dispatchers plan faster delivery routes, assign drivers, and share digital receipts with customers.",
        "tech" => ["React.js", "Python FastAPI", "Live Maps API", "Cloud VPS"],
        "delivery" => "3 Weeks",
        "badge" => "bg-blue-50 text-blue-700 border-blue-200"
    ],
    [
        "title" => "Cloud Infrastructure & CI/CD Microservices",
        "category" => "Websites & Apps",
        "domain" => "FinTech & Cloud Platforms",
        "metrics" => "Reduced deployment downtime by 99.9% with automated rollbacks",
        "desc" => "Automated Docker and Kubernetes deployment pipeline on AWS with GitHub Actions, Terraform provisioning, and continuous health monitoring.",
        "tech" => ["AWS EKS", "Docker", "GitHub Actions", "Terraform", "PostgreSQL"],
        "delivery" => "3 Weeks",
        "badge" => "bg-purple-50 text-purple-700 border-purple-200"
    ],
    [
        "title" => "Automatic Bill & Medical Invoice Reader",
        "category" => "AI & Chatbots",
        "domain" => "Healthcare & Clinics",
        "metrics" => "Saves 90% of paperwork time; reads bills in under 5 minutes",
        "desc" => "A smart document reader that scans doctor bills, patient forms, and medicine receipts. It automatically pulls out names, dates, test names, and costs without typing by hand.",
        "tech" => ["AI Document OCR", "Python", "SQLite / Postgres", "Secure Cloud"],
        "delivery" => "2 Weeks",
        "badge" => "bg-indigo-50 text-indigo-700 border-indigo-200"
    ],
    [
        "title" => "Business Sales & Profit Dashboard",
        "category" => "Data Dashboards",
        "domain" => "Retail & E-Commerce",
        "metrics" => "Gives shop owners daily sales and profit numbers in one place",
        "desc" => "A clear visual dashboard made in Power BI. Shows shop owners which items sell fastest, daily profits, and inventory levels across multiple store locations.",
        "tech" => ["Power BI", "Excel & SQL", "Automated Reports", "Python"],
        "delivery" => "1 - 2 Weeks",
        "badge" => "bg-cyan-50 text-cyan-700 border-cyan-200"
    ],
    [
        "title" => "Computer Vision & Defect Detection System",
        "category" => "AI & Chatbots",
        "domain" => "Manufacturing & Quality Control",
        "metrics" => "99.8% tagging accuracy across thousands of camera frames",
        "desc" => "Computer vision software inspecting production lines for component misalignment and packaging tears in real-time.",
        "tech" => ["PyTorch", "OpenCV", "FastAPI", "Docker"],
        "delivery" => "4 Weeks",
        "badge" => "bg-amber-50 text-amber-700 border-amber-200"
    ]
];
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
            <span>Verified Technical Deliverables</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Our Work & Client Deployments
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Real enterprise software, AI chatbots, and analytics pipelines delivered with high velocity and measurable client impact.
        </p>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $p): ?>
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div class="p-6 sm:p-8 space-y-4">
                        <div class="flex items-center justify-between text-xs font-mono">
                            <span class="px-2.5 py-1 rounded-full border <?= $p['badge'] ?> font-semibold"><?= htmlspecialchars($p['category']) ?></span>
                            <span class="text-slate-400 flex items-center gap-1"><i data-lucide="clock" class="w-3.5 h-3.5"></i> <?= htmlspecialchars($p['delivery']) ?></span>
                        </div>

                        <div>
                            <span class="text-xs font-mono uppercase tracking-wider text-slate-400"><?= htmlspecialchars($p['domain']) ?></span>
                            <h3 class="text-xl font-bold font-heading text-slate-900 mt-1"><?= htmlspecialchars($p['title']) ?></h3>
                        </div>

                        <div class="p-3 rounded-xl bg-blue-50/70 border border-blue-100 text-xs text-blue-900 font-semibold flex items-center gap-2">
                            <i data-lucide="trending-up" class="w-4 h-4 text-blue-600 shrink-0"></i>
                            <span><?= htmlspecialchars($p['metrics']) ?></span>
                        </div>

                        <p class="text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($p['desc']) ?></p>

                        <div class="pt-2">
                            <div class="text-[11px] font-mono text-slate-400 uppercase tracking-wider mb-2">Tech Stack</div>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($p['tech'] as $t): ?>
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-mono"><?= htmlspecialchars($t) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 pt-0 border-t border-slate-100 mt-4">
                        <button onclick="openQuoteModal()" class="w-full py-2.5 px-4 rounded-xl bg-slate-900 hover:bg-blue-600 text-white text-xs font-bold transition-colors flex items-center justify-center gap-1.5 font-heading">
                            <span>Request Similar Solution</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Quote Banner -->
<section class="py-16 bg-white border-t border-slate-200 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900">Need a Solution Tailored to Your Business?</h2>
        <p class="text-slate-600 text-base mt-2 max-w-xl mx-auto">Get an upfront price quote in Indian Rupees (₹) with guaranteed milestone delivery.</p>
        <button onclick="openQuoteModal()" class="mt-6 px-8 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md font-heading transition-all">
            Get a 24-Hour Scope Estimate
        </button>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

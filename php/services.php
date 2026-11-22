<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';

$page_seo = cms_get_page_seo('services');
$page_title = $page_seo['meta_title'] ?? ("Services — " . SITE_NAME);
$page_desc = $page_seo['meta_description'] ?? "Explore our core services: AI & Automation, Software Development, SaaS Development, Data Annotation, and BPO Services.";
require_once __DIR__ . '/includes/header.php';

// Dynamic CMS Services retrieval
$services_list = cms_get_services(true);

// Theme accent styles helper
function get_service_card_style($color) {
    switch ($color) {
        case 'cyan':
            return [
                'bar' => 'from-cyan-500 via-blue-600 to-indigo-600',
                'icon_bg' => 'from-cyan-500 via-blue-600 to-indigo-600',
                'badge' => 'bg-cyan-50 text-cyan-800 border-cyan-200',
                'btn' => 'from-cyan-600 to-blue-600',
                'check' => 'text-cyan-600 bg-cyan-50'
            ];
        case 'indigo':
            return [
                'bar' => 'from-indigo-600 via-blue-600 to-violet-600',
                'icon_bg' => 'from-indigo-600 via-blue-600 to-violet-600',
                'badge' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                'btn' => 'from-indigo-600 to-blue-600',
                'check' => 'text-indigo-600 bg-indigo-50'
            ];
        case 'emerald':
            return [
                'bar' => 'from-emerald-500 via-teal-600 to-cyan-600',
                'icon_bg' => 'from-emerald-500 via-teal-600 to-cyan-600',
                'badge' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                'btn' => 'from-emerald-600 to-teal-700',
                'check' => 'text-emerald-600 bg-emerald-50'
            ];
        case 'purple':
            return [
                'bar' => 'from-purple-600 via-indigo-600 to-blue-700',
                'icon_bg' => 'from-purple-600 via-indigo-600 to-blue-700',
                'badge' => 'bg-purple-50 text-purple-800 border-purple-200',
                'btn' => 'from-purple-600 to-indigo-700',
                'check' => 'text-purple-600 bg-purple-50'
            ];
        case 'blue':
        default:
            return [
                'bar' => 'from-blue-600 via-indigo-600 to-cyan-500',
                'icon_bg' => 'from-blue-600 via-indigo-600 to-cyan-500',
                'badge' => 'bg-blue-50 text-blue-700 border-blue-200',
                'btn' => 'from-blue-600 to-cyan-600',
                'check' => 'text-blue-600 bg-blue-50'
            ];
    }
}
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

<!-- 2. Services Grid: Dynamically Rendered From CMS -->
<section class="py-16 lg:py-24 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-wrap justify-center gap-8 items-stretch">
            
            <?php foreach ($services_list as $srv): 
                $content = $srv['content'] ?? [];
                $style = get_service_card_style($srv['color'] ?? 'blue');
                $offerings = $content['offerings'] ?? [];
            ?>
                <!-- Service Card: <?= htmlspecialchars($srv['title']) ?> -->
                <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] flex">
                    <a href="<?= htmlspecialchars($srv['slug']) ?>.php" class="w-full bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 p-7 sm:p-8 flex flex-col justify-between text-left group cursor-pointer relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r <?= $style['bar'] ?>"></div>

                        <div class="space-y-5">
                            <div class="flex items-center justify-between gap-4 pt-1">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br <?= $style['icon_bg'] ?> text-white flex items-center justify-center shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                    <i data-lucide="<?= htmlspecialchars($srv['icon'] ?? 'layers') ?>" class="w-7 h-7 stroke-[2]"></i>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold font-mono <?= $style['badge'] ?>">
                                    <?= htmlspecialchars($srv['badge'] ?? 'Enterprise Practice') ?>
                                </span>
                            </div>

                            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading group-hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($srv['title']) ?>
                            </h2>

                            <p class="text-slate-600 text-sm leading-relaxed min-h-[4.5rem]">
                                <?= htmlspecialchars($srv['short_desc'] ?? '') ?>
                            </p>

                            <?php if (!empty($offerings)): ?>
                            <div class="pt-2 border-t border-slate-100">
                                <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider font-mono mb-3">
                                    Core Capabilities:
                                </h3>
                                <ul class="space-y-2">
                                    <?php foreach (array_slice($offerings, 0, 4) as $off): ?>
                                        <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700">
                                            <div class="w-4 h-4 rounded-full <?= $style['check'] ?> flex items-center justify-center shrink-0 mt-0.5">
                                                <i data-lucide="check" class="w-3 h-3 stroke-[2.5]"></i>
                                            </div>
                                            <span class="leading-tight font-medium"><?= htmlspecialchars($off['title'] ?? '') ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100">
                            <div class="w-full py-3.5 px-5 rounded-xl bg-gradient-to-r <?= $style['btn'] ?> text-white font-bold text-xs sm:text-sm text-center shadow-md transition-all font-heading flex items-center justify-center gap-2 group-hover:shadow-lg">
                                <span>Explore Service</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

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

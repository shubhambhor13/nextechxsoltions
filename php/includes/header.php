<?php
require_once __DIR__ . '/config.php';

$page_title = isset($page_title) ? $page_title . ' — ' . SITE_NAME : SITE_NAME . ' — Enterprise IT Solutions, AI Automation & Technology Internships';
$page_desc = isset($page_desc) ? $page_desc : 'NextTechX Solutions delivers enterprise IT solutions, autonomous AI workflows, cloud infrastructure, and technology internship programs. Your Vision Our Technology.';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-28 overflow-x-clip">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
    
    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="favicon.png">
    <link rel="apple-touch-icon" href="favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN with Custom Extensions) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        navy: {
                            950: '#060913',
                            900: '#0a0f1e',
                            850: '#0e162c',
                            800: '#131e3d',
                            700: '#1e2c56',
                        },
                        electric: {
                            cyan: '#00f2fe',
                            blue: '#4facfe',
                            violet: '#8a2be2',
                            purple: '#9d4edd',
                        }
                    },
                    fontFamily: {
                        heading: ['Manrope', 'sans-serif'],
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        html { font-size: 16.5px; }
        @media (min-width: 1024px) { html { font-size: 17px; } }
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Manrope', 'Inter', sans-serif; letter-spacing: -0.02em; }
        .bg-grid-corporate {
            background-image: 
                linear-gradient(to right, rgba(15, 23, 42, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 3rem 3rem;
        }
        .corporate-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .corporate-card:hover {
            border-color: #93c5fd;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.08);
            transform: translateY(-2px);
        }
        ::-webkit-scrollbar { width: 7px; height: 7px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563eb; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased selection:bg-blue-600/15 selection:text-blue-700 min-h-screen overflow-x-clip flex flex-col">

    <!-- 1. Top Fixed Navigation Wrapper -->
    <div class="fixed top-0 left-0 right-0 z-50 w-full">
        
        <!-- Top Operational Notification Bar -->
        <div class="w-full bg-slate-900 text-slate-300 py-1.5 px-4 text-xs border-b border-slate-800/80 transition-all duration-300">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="font-medium text-slate-200">Online-First Global IT Delivery</span>
                    <span class="text-slate-500 hidden sm:inline">•</span>
                    <span class="text-slate-400 hidden sm:inline">ISO-Aligned Quality Standards</span>
                </div>
                <div class="flex items-center gap-3 sm:gap-4 text-xs font-mono">
                    <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="hover:text-cyan-400 flex items-center gap-1.5 transition-colors">
                        <i data-lucide="mail" class="w-3.5 h-3.5 text-cyan-400"></i>
                        <span><?= SITE_EMAIL_CONTACT ?></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Clean White Sticky Header -->
        <header id="mainHeader" class="w-full bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-sm py-2.5 sm:py-3 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-4 xl:px-8 flex items-center justify-between gap-1.5 xl:gap-6">
                
                <!-- Brand Logo -->
                <a href="index.php" class="group shrink-0 mr-1 sm:mr-3 lg:mr-2 xl:mr-5">
                    <?= render_logo(false, 'md', true) ?>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden lg:flex items-center gap-0.5 xl:gap-1.5">
                    <!-- Home -->
                    <a href="index.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('home') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>Home</span>
                        <?php if (is_active('home')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- About Us -->
                    <a href="about.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('about') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>About Us</span>
                        <?php if (is_active('about')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- Services Dropdown -->
                    <div class="relative group" id="servicesDropdown">
                        <a href="services.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap flex items-center gap-1 <?= in_array(basename($_SERVER['PHP_SELF'], '.php'), ['services', 'it-services', 'ai-automation', 'research-publication']) ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                            <span>Services</span>
                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180 text-slate-400"></i>
                            <?php if (in_array(basename($_SERVER['PHP_SELF'], '.php'), ['services', 'it-services', 'ai-automation', 'research-publication'])): ?>
                                <span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span>
                            <?php endif; ?>
                        </a>

                        <!-- Dropdown Menu -->
                        <div class="absolute top-full left-0 mt-1 w-[400px] rounded-2xl bg-white border border-slate-200 shadow-2xl p-2.5 z-50 hidden group-hover:block transition-all">
                            <div class="px-3 py-2 border-b border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-heading">Core Enterprise Practices</span>
                                <span class="text-[11px] font-semibold text-blue-600">Explore</span>
                            </div>
                            <div class="py-1.5 space-y-1">
                                <a href="ai-automation.php" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                    <div class="p-2 rounded-lg bg-cyan-500/10 text-cyan-600"><i data-lucide="bot" class="w-4 h-4"></i></div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-900 group-hover/item:text-blue-600">AI & Workflow Automation</div>
                                        <p class="text-xs text-slate-500 line-clamp-1">n8n, autonomous agents, RAG chatbots</p>
                                    </div>
                                </a>
                                <a href="it-services.php" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                    <div class="p-2 rounded-lg bg-blue-500/10 text-blue-600"><i data-lucide="code" class="w-4 h-4"></i></div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-900 group-hover/item:text-blue-600">IT & Custom Software</div>
                                        <p class="text-xs text-slate-500 line-clamp-1">Web, mobile, enterprise cloud & APIs</p>
                                    </div>
                                </a>
                                <a href="research-publication.php" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                    <div class="p-2 rounded-lg bg-emerald-500/10 text-emerald-600"><i data-lucide="book-open" class="w-4 h-4"></i></div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-900 group-hover/item:text-blue-600">Research Paper Publication</div>
                                        <p class="text-xs text-slate-500 line-clamp-1">IEEE, Scopus, Springer & UGC-CARE advisory</p>
                                    </div>
                                </a>
                            </div>
                            <div class="pt-2 border-t border-slate-100">
                                <a href="services.php" class="w-full py-2 px-3 rounded-xl bg-slate-50 hover:bg-blue-50 text-blue-600 text-xs font-bold flex items-center justify-center gap-1.5 transition-colors font-heading">
                                    <span>View All Services</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio -->
                    <a href="portfolio.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('portfolio') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>Portfolio</span>
                        <?php if (is_active('portfolio')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- Industries -->
                    <a href="industries.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('industries') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>Industries</span>
                        <?php if (is_active('industries')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- How We Work -->
                    <a href="how-we-work.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('how-we-work') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>How We Work</span>
                        <?php if (is_active('how-we-work')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- FAQs -->
                    <a href="faqs.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('faqs') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>FAQs</span>
                        <?php if (is_active('faqs')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- Careers -->
                    <a href="careers.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('careers') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>Careers</span>
                        <?php if (is_active('careers')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>

                    <!-- Contact Us -->
                    <a href="contact.php" class="relative px-2 xl:px-3 py-1.5 xl:py-2 rounded-xl text-xs lg:text-[13px] xl:text-[15px] font-semibold transition-all whitespace-nowrap <?= is_active('contact') ? 'text-blue-600 bg-blue-50/90 font-bold shadow-xs' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' ?>">
                        <span>Contact Us</span>
                        <?php if (is_active('contact')): ?><span class="absolute bottom-0 left-1.5 right-1.5 h-0.5 bg-blue-600 rounded-full"></span><?php endif; ?>
                    </a>
                </nav>

                <!-- Action CTA: Get a Quote -->
                <div class="hidden lg:flex items-center gap-1.5 xl:gap-3 shrink-0">
                    <button onclick="openQuoteModal()" class="px-3.5 lg:px-4 xl:px-5 py-2 xl:py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs lg:text-xs xl:text-sm font-bold shadow-sm transition-all hover:shadow active:scale-95 flex items-center gap-1 xl:gap-1.5 font-heading shrink-0 whitespace-nowrap">
                        <span>Get a Quote</span>
                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-200"></i>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 lg:hidden">
                    <button onclick="openQuoteModal()" class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-blue-600 text-white shadow-sm font-heading">
                        Get a Quote
                    </button>
                    <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="p-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors" aria-label="Toggle Menu">
                        <i data-lucide="menu" id="menuIcon" class="w-6 h-6"></i>
                    </button>
                </div>

            </div>

            <!-- Mobile Navigation Drawer -->
            <div id="mobileDrawer" class="hidden lg:hidden border-t border-slate-200 bg-white/95 backdrop-blur-md px-5 pt-4 pb-8 space-y-2.5 shadow-2xl max-h-[calc(100vh-80px)] overflow-y-auto">
                <a href="index.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('home') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Home</a>
                <a href="about.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('about') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">About Us</a>
                <a href="services.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('services') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Services Overview</a>
                <a href="ai-automation.php" class="block px-6 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-blue-600">↳ AI & Workflow Automation</a>
                <a href="it-services.php" class="block px-6 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-blue-600">↳ IT & Software Solutions</a>
                <a href="research-publication.php" class="block px-6 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-blue-600">↳ Research Paper Publication</a>
                <a href="portfolio.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('portfolio') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Portfolio</a>
                <a href="industries.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('industries') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Industries</a>
                <a href="how-we-work.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('how-we-work') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">How We Work</a>
                <a href="faqs.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('faqs') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">FAQs</a>
                <a href="careers.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('careers') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Careers & Internships</a>
                <a href="contact.php" class="block px-4 py-3 rounded-xl text-base font-semibold <?= is_active('contact') ? 'text-blue-600 bg-blue-50 font-bold' : 'text-slate-800 hover:bg-slate-50' ?>">Contact Us</a>
            </div>
        </header>

    </div>

    <!-- 2. Top Spacing Buffer: Guarantees the fixed header never overlaps page content -->
    <div class="h-[95px] sm:h-[105px] w-full shrink-0 pointer-events-none" aria-hidden="true"></div>

    <main class="flex-grow">

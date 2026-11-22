<?php
// NextTechX Solutions - SaaS Master Admin Dashboard & Complete Website CMS
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';

// Session Inactivity Timeout (2 Hours)
$SESSION_TIMEOUT = 7200;
if (!empty($_SESSION['admin_user'])) {
    if (!empty($_SESSION['admin_last_activity']) && (time() - $_SESSION['admin_last_activity'] > $SESSION_TIMEOUT)) {
        session_unset();
        session_destroy();
        header('Location: admin-login.php?timeout=1');
        exit;
    }
    $_SESSION['admin_last_activity'] = time();
}

// Enforce authentication gate
if (empty($_SESSION['admin_user'])) {
    header('Location: admin-login.php');
    exit;
}

$current_admin = $_SESSION['admin_user'];
$current_role = $current_admin['role'] ?? 'super_admin';
$admin_name = htmlspecialchars($current_admin['full_name'] ?? $current_admin['username'] ?? 'Administrator');
$admin_email = htmlspecialchars($current_admin['email'] ?? 'admin@nextechxsolutions.com');
$admin_initials = strtoupper(substr($current_admin['username'] ?? 'AD', 0, 2));

// CSRF Token
if (empty($_SESSION['cms_csrf_token'])) {
    $_SESSION['cms_csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['cms_csrf_token'];

// Load data
$all_pages = cms_get_pages();
$site_settings = cms_get_all_settings();
$appearance_settings = cms_get_appearance();
$nav_items = cms_get_navigation('primary_header');
$stats = cms_get_dashboard_stats();
$all_services = cms_get_services(false);
$all_opportunities = cms_get_career_opportunities(false);
$all_forms = cms_get_forms();
$all_templates = cms_get_email_templates();
$all_testimonials = cms_get_testimonials('all', false);
$all_articles = cms_get_articles(null);
$chatbot_cfg = cms_get_chatbot_config();
$activity_logs = cms_get_activity_logs(30);
$admin_users = cms_get_admin_users();
$global_announcement = cms_get_global_announcement();
$cookie_notice = cms_get_cookie_notice();
$is_maint = cms_is_maintenance_mode();
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaS Master Admin Console — <?= htmlspecialchars(SITE_NAME) ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        navy: { 950: '#060913', 900: '#0a0f1e', 850: '#0e162c', 800: '#131e3d', 700: '#1e2c56' },
                        royal: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' },
                        accent: { purple: '#7c3aed', violet: '#6366f1' }
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
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Chart.js for SaaS KPI Trends -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Manrope', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f8fafc; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .tab-btn.active {
            background-color: #2563eb !important;
            color: #ffffff !important;
            font-weight: 600;
            box-shadow: 0 4px 14px -2px rgba(37, 99, 235, 0.28);
        }
        .tab-btn.active i { color: #ffffff !important; }
        .saas-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1.25rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.03);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .saas-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05);
        }
    </style>
</head>
<body class="h-full bg-slate-50 text-slate-800 antialiased selection:bg-blue-600/15 selection:text-blue-700 flex flex-col overflow-hidden">

    <!-- Top Toast Notification System -->
    <div id="toastNotification" class="fixed top-5 right-5 z-50 transform transition-all duration-300 translate-y-[-120%] opacity-0 pointer-events-none flex items-center gap-3 px-5 py-3.5 rounded-2xl shadow-xl text-xs font-semibold max-w-md"></div>

    <div class="flex-1 flex overflow-hidden">
        
        <!-- ============================================================== -->
        <!-- SIDEBAR NAVIGATION (Clean White / Royal Navy Accent)           -->
        <!-- ============================================================== -->
        <aside id="adminSidebar" class="w-72 bg-white border-r border-slate-200/90 flex flex-col shrink-0 z-30 transition-all duration-300 fixed md:relative -translate-x-full md:translate-x-0 h-full shadow-xs">
            
            <!-- Sidebar Header & Brand -->
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <a href="admin.php" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-navy-950 via-royal-600 to-accent-purple flex items-center justify-center text-white shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                        <i data-lucide="shield-check" class="w-5 h-5 stroke-[2.2]"></i>
                    </div>
                    <div>
                        <div class="text-sm font-black text-slate-900 tracking-tight font-heading leading-tight">NEXTECHX</div>
                        <div class="text-[10px] font-mono tracking-widest text-royal-600 font-bold uppercase">ADMIN CONSOLE</div>
                    </div>
                </a>
                <button onclick="toggleMobileSidebar()" class="md:hidden p-1.5 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-50">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Navigation Links Scroll Area -->
            <nav class="flex-1 overflow-y-auto p-3.5 space-y-6 custom-scrollbar text-xs">
                
                <!-- Group 1: Workspace Core -->
                <div class="space-y-1">
                    <div class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">Core Workspace</div>
                    <button onclick="switchTab('overview')" id="nav-overview" class="tab-btn active w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="layout-dashboard" class="w-4 h-4 text-slate-500"></i>
                        <span>Overview & Metrics</span>
                    </button>
                    <button onclick="switchTab('pages')" id="nav-pages" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="file-text" class="w-4 h-4 text-slate-500"></i>
                        <span>Page Content CMS</span>
                    </button>
                    <button onclick="switchTab('services')" id="nav-services" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="layers" class="w-4 h-4 text-slate-500"></i>
                        <span class="flex-1">Services & Practices</span>
                        <span class="px-1.5 py-0.5 rounded-md bg-blue-50 text-blue-700 font-mono text-[10px] font-bold">5</span>
                    </button>
                    <button onclick="switchTab('careers')" id="nav-careers" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="briefcase" class="w-4 h-4 text-slate-500"></i>
                        <span class="flex-1">Careers & Openings</span>
                        <span class="px-1.5 py-0.5 rounded-md bg-emerald-50 text-emerald-700 font-mono text-[10px] font-bold"><?= count($all_opportunities) ?></span>
                    </button>
                    <button onclick="switchTab('inquiries')" id="nav-inquiries" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="inbox" class="w-4 h-4 text-slate-500"></i>
                        <span class="flex-1">Inquiries & Leads</span>
                        <span class="px-1.5 py-0.5 rounded-md bg-purple-50 text-purple-700 font-mono text-[10px] font-bold">Inbound</span>
                    </button>
                </div>

                <!-- Group 2: Site Assets & Identity -->
                <div class="space-y-1">
                    <div class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">Site Assets & Brand</div>
                    <button onclick="switchTab('navigation')" id="nav-navigation" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="menu" class="w-4 h-4 text-slate-500"></i>
                        <span>Navigation & Menus</span>
                    </button>
                    <button onclick="switchTab('media')" id="nav-media" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="image" class="w-4 h-4 text-slate-500"></i>
                        <span>Media Library</span>
                    </button>
                    <button onclick="switchTab('appearance')" id="nav-appearance" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="palette" class="w-4 h-4 text-slate-500"></i>
                        <span>Theme & Styling</span>
                    </button>
                    <button onclick="switchTab('settings')" id="nav-settings" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="settings" class="w-4 h-4 text-slate-500"></i>
                        <span>Global Settings</span>
                    </button>
                </div>

                <!-- Group 3: Engagement & Growth -->
                <div class="space-y-1">
                    <div class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">Marketing & Comms</div>
                    <button onclick="switchTab('forms')" id="nav-forms" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="check-square" class="w-4 h-4 text-slate-500"></i>
                        <span>Forms Engine</span>
                    </button>
                    <button onclick="switchTab('emails')" id="nav-emails" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="mail" class="w-4 h-4 text-slate-500"></i>
                        <span>Email Templates</span>
                    </button>
                    <button onclick="switchTab('testimonials')" id="nav-testimonials" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="star" class="w-4 h-4 text-slate-500"></i>
                        <span>Client Testimonials</span>
                    </button>
                    <button onclick="switchTab('articles')" id="nav-articles" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="newspaper" class="w-4 h-4 text-slate-500"></i>
                        <span>Articles & News</span>
                    </button>
                    <button onclick="switchTab('seo')" id="nav-seo" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="globe" class="w-4 h-4 text-slate-500"></i>
                        <span>SEO & Dynamic Sitemap</span>
                    </button>
                    <button onclick="switchTab('chatbot')" id="nav-chatbot" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="bot" class="w-4 h-4 text-slate-500"></i>
                        <span>AI Assistant Config</span>
                    </button>
                </div>

                <!-- Group 4: Governance & System -->
                <div class="space-y-1">
                    <div class="px-3 text-[10px] font-bold uppercase tracking-wider text-slate-400 font-mono">Governance</div>
                    <?php if (cms_user_can('manage_users')): ?>
                    <button onclick="switchTab('users')" id="nav-users" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="users" class="w-4 h-4 text-slate-500"></i>
                        <span>Admin Users & RBAC</span>
                    </button>
                    <?php endif; ?>
                    <button onclick="switchTab('logs')" id="nav-logs" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="activity" class="w-4 h-4 text-slate-500"></i>
                        <span>Audit Activity Trail</span>
                    </button>
                    <button onclick="switchTab('global_controls')" id="nav-global_controls" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition-all text-left">
                        <i data-lucide="shield-alert" class="w-4 h-4 text-slate-500"></i>
                        <span>Maintenance & Banner</span>
                    </button>
                </div>

            </nav>

            <!-- Bottom User Profile Card -->
            <div class="p-3.5 border-t border-slate-100 bg-slate-50/50">
                <div class="flex items-center justify-between p-2 rounded-2xl bg-white border border-slate-200/80 shadow-2xs">
                    <div class="flex items-center gap-2.5 overflow-hidden">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-royal-600 to-accent-purple text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                            <?= $admin_initials ?>
                        </div>
                        <div class="overflow-hidden">
                            <div class="text-xs font-bold text-slate-900 truncate font-heading"><?= $admin_name ?></div>
                            <div class="text-[10px] text-slate-500 font-mono uppercase font-semibold"><?= str_replace('_', ' ', $current_role) ?></div>
                        </div>
                    </div>
                    <button onclick="handleAdminLogout()" title="Sign Out" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

        </aside>

        <!-- ============================================================== -->
        <!-- MAIN CONTENT WORKSPACE                                         -->
        <!-- ============================================================== -->
        <main class="flex-1 flex flex-col min-w-0 bg-slate-50/70 overflow-hidden">
            
            <!-- Top Header Bar -->
            <header class="bg-white/95 backdrop-blur-md border-b border-slate-200/90 px-6 py-3.5 flex items-center justify-between gap-4 shrink-0 shadow-2xs z-20">
                
                <div class="flex items-center gap-3">
                    <button onclick="toggleMobileSidebar()" class="md:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <!-- Breadcrumbs -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400 font-mono">Console</span>
                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-300"></i>
                        <span id="currentTabBreadcrumb" class="font-bold text-slate-800 font-heading">Overview & Metrics</span>
                    </div>
                </div>

                <!-- Center Search Input -->
                <div class="hidden lg:flex items-center flex-1 max-w-md mx-4">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="search" class="w-3.5 h-3.5"></i>
                        </div>
                        <input type="text" id="globalCmsSearch" onkeyup="handleGlobalSearch(event)" placeholder="Search pages, services, candidates, inquiries... (Ctrl + K)"
                            class="w-full pl-9 pr-4 py-1.5 bg-slate-100/70 border border-slate-200/80 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all">
                    </div>
                </div>

                <!-- Right Action Controls -->
                <div class="flex items-center gap-3">
                    
                    <!-- Live Website Link -->
                    <a href="index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold shadow-2xs transition-all font-heading">
                        <i data-lucide="external-link" class="w-3.5 h-3.5 text-royal-600"></i>
                        <span>Live Site</span>
                    </a>

                    <!-- Status Pill -->
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-800 text-[11px] font-mono">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="hidden sm:inline">Production</span>
                    </div>

                    <!-- Change Password Modal Trigger -->
                    <button onclick="openChangePasswordModal()" title="Change Master Password" class="p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors">
                        <i data-lucide="key" class="w-4 h-4"></i>
                    </button>

                    <!-- Sign Out -->
                    <button onclick="handleAdminLogout()" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-rose-50 hover:text-rose-600 text-slate-700 text-xs font-semibold transition-colors flex items-center gap-1.5 font-heading">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                        <span class="hidden sm:inline">Logout</span>
                    </button>
                </div>

            </header>

            <!-- Main Tab Scrollable Container -->
            <div class="flex-1 overflow-y-auto p-5 sm:p-8 space-y-8 custom-scrollbar">

                <!-- TAB 1: OVERVIEW & METRICS -->
                <div id="tab-overview" class="tab-pane space-y-6">
                    
                    <!-- Top Welcome & Status Banner -->
                    <div class="saas-card p-6 sm:p-8 bg-gradient-to-r from-navy-950 via-slate-900 to-navy-900 text-white relative overflow-hidden">
                        <div class="absolute -right-20 -top-20 w-80 h-80 bg-royal-600/20 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div class="space-y-2">
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-royal-100 text-xs font-mono border border-white/15">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span>Enterprise SaaS CMS • Unified System</span>
                                </div>
                                <h1 class="text-2xl sm:text-3xl font-black font-heading tracking-tight">
                                    Welcome back, <?= $admin_name ?>
                                </h1>
                                <p class="text-xs sm:text-sm text-slate-300 max-w-xl font-normal leading-relaxed">
                                    Control your complete digital enterprise from this unified dashboard. Manage content, inbound client inquiries, student recruitment, and global configuration.
                                </p>
                            </div>
                            <div class="flex flex-wrap items-center gap-3">
                                <button onclick="switchTab('services')" class="px-4 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-500 text-white font-bold text-xs shadow-md transition-all font-heading flex items-center gap-2">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                    <span>Manage Services</span>
                                </button>
                                <button onclick="switchTab('inquiries')" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/20 font-semibold text-xs transition-all font-heading flex items-center gap-2">
                                    <i data-lucide="inbox" class="w-4 h-4"></i>
                                    <span>View Inquiries</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- KPI Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        
                        <!-- Metric 1: Services -->
                        <div class="saas-card p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Core Practices</span>
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-royal-600 flex items-center justify-center">
                                    <i data-lucide="layers" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-black text-slate-900 font-heading">
                                <?= count($all_services) ?>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                                <span class="text-emerald-700 font-semibold font-mono flex items-center gap-0.5">
                                    <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
                                    100% Active
                                </span>
                                <span>• 5 Core Offerings</span>
                            </div>
                        </div>

                        <!-- Metric 2: Applications -->
                        <div class="saas-card p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Internship Applicants</span>
                                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                    <i data-lucide="users" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-black text-slate-900 font-heading">
                                <?= (int)($stats['total_applications'] ?? 0) ?>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                                <span class="text-emerald-700 font-semibold font-mono flex items-center gap-0.5">
                                    <i data-lucide="trending-up" class="w-3.5 h-3.5"></i>
                                    <?= count($all_opportunities) ?> Tracks
                                </span>
                                <span>• Pipeline Active</span>
                            </div>
                        </div>

                        <!-- Metric 3: Inquiries -->
                        <div class="saas-card p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Total Client Leads</span>
                                <div class="w-9 h-9 rounded-xl bg-purple-50 text-accent-purple flex items-center justify-center">
                                    <i data-lucide="inbox" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-black text-slate-900 font-heading">
                                <?= (int)($stats['total_inquiries'] ?? 0) ?>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                                <span class="text-accent-purple font-semibold font-mono flex items-center gap-0.5">
                                    <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                                    Quotes & Consultations
                                </span>
                            </div>
                        </div>

                        <!-- Metric 4: Managed Pages -->
                        <div class="saas-card p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-mono">Managed Pages</span>
                                <div class="w-9 h-9 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                                    <i data-lucide="globe" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-black text-slate-900 font-heading">
                                <?= count($all_pages) ?>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-xs text-slate-500">
                                <span class="text-royal-600 font-semibold font-mono flex items-center gap-0.5">
                                    <i data-lucide="file-check" class="w-3.5 h-3.5"></i>
                                    Full SEO Control
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- Charts & Recent Activity Two-Column Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                        
                        <!-- Left 8 Cols: SaaS Analytics Trend Chart -->
                        <div class="lg:col-span-8 saas-card p-6 space-y-4">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-900 font-heading">Inbound Inquiries & Application Velocity</h3>
                                    <p class="text-xs text-slate-500">Telemetry aggregated across quotation requests, contact messages, and internship applicants</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-royal-700 text-[11px] font-semibold font-mono">
                                        <span class="w-1.5 h-1.5 rounded-full bg-royal-600"></span>
                                        Realtime DB
                                    </span>
                                </div>
                            </div>
                            <div class="h-64 w-full">
                                <canvas id="saasMetricsChart"></canvas>
                            </div>
                        </div>

                        <!-- Right 4 Cols: Quick Actions & Audit Trail -->
                        <div class="lg:col-span-4 saas-card p-6 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900 font-heading mb-1">Quick CMS Operations</h3>
                                <p class="text-xs text-slate-500 mb-4">Direct shortcuts to primary management modules</p>
                                <div class="space-y-2">
                                    <button onclick="openNewServiceModal()" class="w-full py-2.5 px-3.5 rounded-xl border border-slate-200 hover:border-royal-300 hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center justify-between transition-colors">
                                        <span class="flex items-center gap-2">
                                            <i data-lucide="plus" class="w-4 h-4 text-royal-600"></i>
                                            <span>Add New Service Card</span>
                                        </span>
                                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                                    </button>
                                    <button onclick="switchTab('careers')" class="w-full py-2.5 px-3.5 rounded-xl border border-slate-200 hover:border-royal-300 hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center justify-between transition-colors">
                                        <span class="flex items-center gap-2">
                                            <i data-lucide="briefcase" class="w-4 h-4 text-emerald-600"></i>
                                            <span>Review Candidate Applications</span>
                                        </span>
                                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                                    </button>
                                    <button onclick="switchTab('seo')" class="w-full py-2.5 px-3.5 rounded-xl border border-slate-200 hover:border-royal-300 hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center justify-between transition-colors">
                                        <span class="flex items-center gap-2">
                                            <i data-lucide="globe" class="w-4 h-4 text-purple-600"></i>
                                            <span>Update Page Meta & Sitemap</span>
                                        </span>
                                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                                    </button>
                                    <button onclick="switchTab('global_controls')" class="w-full py-2.5 px-3.5 rounded-xl border border-slate-200 hover:border-royal-300 hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center justify-between transition-colors">
                                        <span class="flex items-center gap-2">
                                            <i data-lucide="shield-alert" class="w-4 h-4 text-amber-600"></i>
                                            <span>Announcement Bar & Maintenance</span>
                                        </span>
                                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                                <span>Engine: SQLite PDO / JSON</span>
                                <span>Hostinger LiteSpeed</span>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- TAB 2: PAGE CONTENT CMS -->
                <div id="tab-pages" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Page Content & Sections Editor</h2>
                                <p class="text-xs text-slate-500">Edit titles, headings, body text, buttons, and callout blocks across all 14 website pages</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <select id="pageSelectDropdown" onchange="loadPageSections(this.value)" class="px-3.5 py-2 rounded-xl border border-slate-300 bg-white text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-royal-500/20 focus:border-royal-600">
                                    <?php foreach ($all_pages as $p): ?>
                                        <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?> (<?= htmlspecialchars($p['slug']) ?>.php)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div id="pageSectionsContainer" class="space-y-4">
                            <!-- Dynamically loaded sections -->
                        </div>
                    </div>
                </div>

                <!-- TAB 3: SERVICES MANAGEMENT -->
                <div id="tab-services" class="tab-pane hidden space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 font-heading">Services & Practice Areas</h2>
                            <p class="text-xs text-slate-500">Manage all five core services, add new practices, edit technical concepts, offerings, workflows, and CTAs</p>
                        </div>
                        <button onclick="openNewServiceModal()" class="px-4 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md transition-all font-heading flex items-center gap-2">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            <span>Add New Service</span>
                        </button>
                    </div>

                    <!-- Services Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="servicesCardsList">
                        <?php foreach ($all_services as $srv): 
                            $cnt = $srv['content'] ?? [];
                            $offs = $cnt['offerings'] ?? [];
                            $wkf = $cnt['workflow'] ?? [];
                        ?>
                            <div class="saas-card p-6 flex flex-col justify-between text-left relative overflow-hidden group">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between gap-2">
                                        <div class="w-12 h-12 rounded-2xl bg-royal-50 text-royal-600 flex items-center justify-center font-bold">
                                            <i data-lucide="<?= htmlspecialchars($srv['icon'] ?? 'layers') ?>" class="w-6 h-6"></i>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-2.5 py-1 rounded-full text-[11px] font-mono font-semibold <?= !empty($srv['is_active']) ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' ?>">
                                                <?= !empty($srv['is_active']) ? 'Published' : 'Draft' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-[11px] font-mono font-bold text-royal-600 uppercase"><?= htmlspecialchars($srv['badge'] ?? 'Enterprise Practice') ?></div>
                                        <h3 class="text-lg font-extrabold text-slate-900 font-heading mt-0.5"><?= htmlspecialchars($srv['title']) ?></h3>
                                        <p class="text-xs text-slate-500 line-clamp-2 mt-1.5"><?= htmlspecialchars($srv['short_desc'] ?? '') ?></p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-2 text-xs font-mono text-slate-600 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                        <div>Capabilities: <span class="font-bold text-slate-900"><?= count($offs) ?></span></div>
                                        <div>Workflow: <span class="font-bold text-slate-900"><?= count($wkf) ?: 4 ?> Steps</span></div>
                                    </div>
                                </div>

                                <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between gap-2">
                                    <a href="<?= htmlspecialchars($srv['slug']) ?>.php" target="_blank" class="text-xs font-semibold text-slate-500 hover:text-royal-600 flex items-center gap-1 font-heading">
                                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                        <span>View Page</span>
                                    </a>
                                    <button onclick="editService('<?= htmlspecialchars($srv['slug']) ?>')" class="px-3.5 py-1.5 rounded-lg bg-royal-50 hover:bg-royal-100 text-royal-700 font-bold text-xs font-heading transition-colors flex items-center gap-1.5">
                                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                        <span>Edit Service</span>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- TAB 4: CAREERS & OPPORTUNITIES -->
                <div id="tab-careers" class="tab-pane hidden space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-200 pb-4">
                        <div class="flex items-center gap-2">
                            <button onclick="switchCareerSubTab('applications')" id="careerSubTab-apps" class="px-4 py-2 rounded-xl font-bold text-xs bg-royal-600 text-white font-heading">
                                Candidate Applications
                            </button>
                            <button onclick="switchCareerSubTab('openings')" id="careerSubTab-openings" class="px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading">
                                Openings & Tracks (<?= count($all_opportunities) ?>)
                            </button>
                        </div>
                        <button onclick="exportApplicationsCsv()" class="px-3.5 py-2 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center gap-2 font-heading shadow-2xs">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                            <span>Export CSV</span>
                        </button>
                    </div>

                    <!-- Sub-pane 1: Applications -->
                    <div id="careerSubPane-apps" class="space-y-4">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="relative w-full sm:w-80">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <i data-lucide="search" class="w-3.5 h-3.5"></i>
                                </div>
                                <input type="text" id="appSearchInput" onkeyup="filterApplications()" placeholder="Filter candidate name, email, track..."
                                    class="w-full pl-9 pr-3.5 py-2 rounded-xl border border-slate-300 bg-white text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-royal-600">
                            </div>
                            <div class="flex items-center gap-2">
                                <select id="appStatusFilter" onchange="filterApplications()" class="px-3 py-2 rounded-xl border border-slate-300 bg-white text-xs font-semibold text-slate-700">
                                    <option value="all">All Statuses</option>
                                    <option value="New">New</option>
                                    <option value="Under Review">Under Review</option>
                                    <option value="Shortlisted">Shortlisted</option>
                                    <option value="Selected">Selected</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>

                        <!-- Candidates Table -->
                        <div class="saas-card overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs">
                                    <thead class="bg-slate-50 text-slate-600 font-bold uppercase tracking-wider font-mono border-b border-slate-200">
                                        <tr>
                                            <th class="p-4">Candidate</th>
                                            <th class="p-4">Applied Track</th>
                                            <th class="p-4">Education</th>
                                            <th class="p-4">Resume</th>
                                            <th class="p-4">Status</th>
                                            <th class="p-4">Applied Date</th>
                                            <th class="p-4 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="applicationsTableBody" class="divide-y divide-slate-100">
                                        <!-- Loaded via JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Sub-pane 2: Openings Manager -->
                    <div id="careerSubPane-openings" class="hidden space-y-4">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-slate-500">Configure internship tracks, eligibility criteria, durations, and stipends</p>
                            <button onclick="openOpportunityModal()" class="px-3.5 py-2 rounded-xl bg-royal-600 text-white font-bold text-xs font-heading">
                                Add Track Opening
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="openingsList">
                            <?php foreach ($all_opportunities as $opp): ?>
                                <div class="saas-card p-5 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-blue-50 text-royal-700"><?= htmlspecialchars($opp['domain'] ?? 'Technology') ?></span>
                                        <span class="text-[11px] font-semibold text-slate-400"><?= htmlspecialchars($opp['duration'] ?? '3 Months') ?></span>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900 font-heading"><?= htmlspecialchars($opp['title']) ?></h4>
                                    <p class="text-xs text-slate-500 line-clamp-2"><?= htmlspecialchars($opp['description'] ?? '') ?></p>
                                    <div class="text-[11px] font-mono text-slate-600 border-t border-slate-100 pt-2 flex items-center justify-between">
                                        <span>Stipend: <strong class="text-slate-900"><?= htmlspecialchars($opp['stipend'] ?? 'Performance-Based') ?></strong></span>
                                        <span class="<?= !empty($opp['is_active']) ? 'text-emerald-700' : 'text-slate-400' ?> font-semibold"><?= !empty($opp['is_active']) ? '● Active' : '○ Paused' ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>

                <!-- TAB 5: INQUIRIES & SUBMISSIONS -->
                <div id="tab-inquiries" class="tab-pane hidden space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-200 pb-4">
                        <div class="flex items-center gap-2">
                            <button onclick="switchInquirySubTab('contacts')" id="inquirySubTab-contacts" class="px-4 py-2 rounded-xl font-bold text-xs bg-royal-600 text-white font-heading">
                                Contact Messages
                            </button>
                            <button onclick="switchInquirySubTab('quotes')" id="inquirySubTab-quotes" class="px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading">
                                Quotation Requests
                            </button>
                            <button onclick="switchInquirySubTab('consultations')" id="inquirySubTab-consultations" class="px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading">
                                Consultations
                            </button>
                        </div>
                        <button onclick="exportInquiriesCsv()" class="px-3.5 py-2 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold flex items-center gap-2 font-heading shadow-2xs">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                            <span>Export Inquiries</span>
                        </button>
                    </div>

                    <div class="saas-card overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-50 text-slate-600 font-bold uppercase tracking-wider font-mono border-b border-slate-200">
                                    <tr>
                                        <th class="p-4">Sender / Lead</th>
                                        <th class="p-4">Contact Info</th>
                                        <th class="p-4">Details / Message</th>
                                        <th class="p-4">Status</th>
                                        <th class="p-4">Received At</th>
                                        <th class="p-4 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="inquiriesTableBody" class="divide-y divide-slate-100">
                                    <!-- Loaded via JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TAB 6: NAVIGATION & MENUS -->
                <div id="tab-navigation" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900 font-heading">Header Navigation Links</h3>
                                <p class="text-xs text-slate-500">Configure top navigation menu items, destination paths, and sort order</p>
                            </div>
                        </div>
                        <div class="space-y-3" id="navigationItemsList">
                            <?php foreach ($nav_items as $idx => $nav): ?>
                                <div class="p-4 rounded-xl border border-slate-200 bg-slate-50 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-7 h-7 rounded-lg bg-white border border-slate-200 flex items-center justify-center font-mono text-xs font-bold text-slate-500">
                                            <?= $idx + 1 ?>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-slate-900"><?= htmlspecialchars($nav['title'] ?? '') ?></div>
                                            <div class="text-[11px] font-mono text-royal-600"><?= htmlspecialchars($nav['url'] ?? '') ?></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-bold">Active</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: MEDIA LIBRARY -->
                <div id="tab-media" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Media Assets & Upload Manager</h2>
                                <p class="text-xs text-slate-500">Upload SVG, PNG, WebP, JPG graphics, brochures and documents</p>
                            </div>
                            <div>
                                <label class="px-4 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md transition-all font-heading flex items-center gap-2 cursor-pointer">
                                    <i data-lucide="upload" class="w-4 h-4"></i>
                                    <span>Upload Media</span>
                                    <input type="file" id="mediaUploadInput" onchange="handleMediaUpload(this)" class="hidden" accept="image/*,.pdf,.svg">
                                </label>
                            </div>
                        </div>

                        <!-- Media Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4" id="mediaLibraryGrid">
                            <!-- Populated via loadMediaLibrary() -->
                        </div>
                    </div>
                </div>

                <!-- TAB 8: THEME & APPEARANCE -->
                <div id="tab-appearance" class="tab-pane hidden space-y-6">
                    <form onsubmit="saveAppearance(event)" class="saas-card p-6 sm:p-8 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h2 class="text-base font-bold text-slate-900 font-heading">Corporate Theme & Visual Styling</h2>
                            <p class="text-xs text-slate-500">Customize brand colors, typography, card border radius, and header layouts</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2 font-heading">Primary Brand Color</label>
                                <div class="flex items-center gap-3">
                                    <input type="color" name="primary_color" value="<?= htmlspecialchars($appearance_settings['primary_color'] ?? '#2563eb') ?>" class="w-10 h-10 rounded-xl cursor-pointer border border-slate-300">
                                    <input type="text" name="primary_color_text" value="<?= htmlspecialchars($appearance_settings['primary_color'] ?? '#2563eb') ?>" class="flex-1 px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2 font-heading">Accent Color</label>
                                <div class="flex items-center gap-3">
                                    <input type="color" name="accent_color" value="<?= htmlspecialchars($appearance_settings['accent_color'] ?? '#7c3aed') ?>" class="w-10 h-10 rounded-xl cursor-pointer border border-slate-300">
                                    <input type="text" name="accent_color_text" value="<?= htmlspecialchars($appearance_settings['accent_color'] ?? '#7c3aed') ?>" class="flex-1 px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2 font-heading">Card Border Radius</label>
                                <select name="border_radius" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs text-slate-800 bg-white">
                                    <option value="rounded-xl">Standard (rounded-xl)</option>
                                    <option value="rounded-2xl" selected>Modern SaaS (rounded-2xl)</option>
                                    <option value="rounded-3xl">Pill Luxury (rounded-3xl)</option>
                                </select>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-5 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md font-heading transition-all">
                                Save Styling Configuration
                            </button>
                        </div>
                    </form>
                </div>

                <!-- TAB 9: GLOBAL SETTINGS -->
                <div id="tab-settings" class="tab-pane hidden space-y-6">
                    <form onsubmit="saveSiteSettings(event)" class="saas-card p-6 sm:p-8 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h2 class="text-base font-bold text-slate-900 font-heading">Global Website Configuration</h2>
                            <p class="text-xs text-slate-500">Corporate legal identity, official contact channels, and social media handles</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Company Legal Name</label>
                                <input type="text" name="company_name" value="<?= htmlspecialchars($site_settings['company_name'] ?? SITE_NAME) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Tagline</label>
                                <input type="text" name="tagline" value="<?= htmlspecialchars($site_settings['tagline'] ?? SITE_TAGLINE) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Official Contact Email</label>
                                <input type="email" name="email_contact" value="<?= htmlspecialchars($site_settings['email_contact'] ?? SITE_EMAIL_CONTACT) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Phone Number</label>
                                <input type="text" name="phone_contact" value="<?= htmlspecialchars($site_settings['phone_contact'] ?? SITE_PHONE) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">LinkedIn Page URL</label>
                                <input type="url" name="linkedin_url" value="<?= htmlspecialchars($site_settings['linkedin_url'] ?? SITE_LINKEDIN_URL) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">WhatsApp Connect URL</label>
                                <input type="url" name="whatsapp_url" value="<?= htmlspecialchars($site_settings['whatsapp_url'] ?? SITE_WHATSAPP_URL) ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                            </div>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-5 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md font-heading transition-all">
                                Update Global Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- TAB 10: FORMS ENGINE -->
                <div id="tab-forms" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h2 class="text-base font-bold text-slate-900 font-heading">Centralized Forms Management</h2>
                            <p class="text-xs text-slate-500">Manage field validations, notification recipients, and custom confirmation responses</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php foreach ($all_forms as $k => $f): ?>
                                <div class="p-5 rounded-2xl border border-slate-200 bg-slate-50/60 space-y-3">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-bold text-slate-900 font-heading"><?= htmlspecialchars($f['title'] ?? ucfirst($k)) ?></h3>
                                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-bold">Active Engine</span>
                                    </div>
                                    <p class="text-xs text-slate-500"><?= htmlspecialchars($f['success_message'] ?? '') ?></p>
                                    <div class="text-[11px] font-mono text-slate-600 border-t border-slate-200 pt-2 flex items-center justify-between">
                                        <span>Fields: <?= count($f['fields'] ?? []) ?> active</span>
                                        <span>Recipient: <?= htmlspecialchars($f['recipient_email'] ?? 'Default HR/Sales') ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 11: EMAIL TEMPLATES -->
                <div id="tab-emails" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Transactional Email Notifications</h2>
                                <p class="text-xs text-slate-500">Automated acknowledgment and internal dispatch templates powered by Hostinger SMTP</p>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-mono font-semibold border border-emerald-200">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                SMTP Connected
                            </span>
                        </div>
                        <div class="space-y-4">
                            <?php foreach ($all_templates as $t): ?>
                                <div class="p-5 rounded-2xl border border-slate-200 bg-white space-y-2">
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs font-bold text-royal-600 font-mono"><?= htmlspecialchars($t['template_key']) ?></div>
                                        <span class="text-[11px] font-mono text-slate-400">Hostinger Port 465 SSL</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900 font-heading"><?= htmlspecialchars($t['subject']) ?></h4>
                                    <div class="pt-2 flex flex-wrap gap-1.5 text-[10px] font-mono text-slate-500">
                                        <span class="px-2 py-0.5 rounded bg-slate-100">Variables: {{applicant_name}}</span>
                                        <span class="px-2 py-0.5 rounded bg-slate-100">{{position}}</span>
                                        <span class="px-2 py-0.5 rounded bg-slate-100">{{company_name}}</span>
                                        <span class="px-2 py-0.5 rounded bg-slate-100">{{hr_email}}</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 12: TESTIMONIALS -->
                <div id="tab-testimonials" class="tab-pane hidden space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900 font-heading">Client Testimonials & Reviews</h2>
                            <p class="text-xs text-slate-500">Verified corporate client feedback and enterprise endorsements</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        <?php foreach ($all_testimonials as $t): ?>
                            <div class="saas-card p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-amber-400 text-xs">
                                        <?= str_repeat('★', (int)($t['rating'] ?? 5)) ?>
                                    </div>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-emerald-50 text-emerald-700">Published</span>
                                </div>
                                <p class="text-xs text-slate-600 italic">"<?= htmlspecialchars($t['review_text'] ?? '') ?>"</p>
                                <div class="border-t border-slate-100 pt-2">
                                    <div class="text-xs font-bold text-slate-900 font-heading"><?= htmlspecialchars($t['reviewer_name']) ?></div>
                                    <div class="text-[11px] text-slate-500"><?= htmlspecialchars($t['reviewer_title'] ?? '') ?> • <?= htmlspecialchars($t['company_name'] ?? '') ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- TAB 13: ARTICLES & NEWS -->
                <div id="tab-articles" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Articles & Engineering Dispatches</h2>
                                <p class="text-xs text-slate-500">Author and publish technical articles, AI benchmarks, and corporate announcements</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <?php foreach ($all_articles as $art): ?>
                                <div class="p-5 rounded-2xl border border-slate-200 bg-white flex items-center justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="px-2 py-0.5 rounded bg-blue-50 text-royal-700 text-[10px] font-mono font-bold"><?= htmlspecialchars($art['category'] ?? 'Engineering') ?></span>
                                            <span class="text-slate-400 text-xs">• <?= htmlspecialchars($art['published_at'] ?? '2026') ?></span>
                                        </div>
                                        <h3 class="text-sm font-bold text-slate-900 font-heading"><?= htmlspecialchars($art['title']) ?></h3>
                                        <p class="text-xs text-slate-500 line-clamp-1 mt-0.5"><?= htmlspecialchars($art['summary'] ?? '') ?></p>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-mono font-semibold bg-emerald-50 text-emerald-700">Published</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 14: SEO & SITEMAP -->
                <div id="tab-seo" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Search Engine Optimization (SEO) & XML Sitemap</h2>
                                <p class="text-xs text-slate-500">Fine-tune meta tags, OpenGraph previews, canonical URLs, and indexing robots for all 14 routes</p>
                            </div>
                            <a href="api/cms.php?action=sitemap_xml" target="_blank" class="px-4 py-2 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-royal-600 font-bold text-xs flex items-center gap-2 font-heading shadow-2xs">
                                <i data-lucide="file-code" class="w-4 h-4"></i>
                                <span>Inspect Live sitemap.xml</span>
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <?php foreach ($all_pages as $p): ?>
                                <div class="p-4 rounded-xl border border-slate-200 bg-white space-y-2 hover:border-royal-300 transition-colors">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-slate-900 font-heading"><?= htmlspecialchars($p['title']) ?></span>
                                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-blue-50 text-royal-700"><?= htmlspecialchars($p['slug']) ?>.php</span>
                                    </div>
                                    <div class="text-[11px] text-slate-500 truncate"><?= htmlspecialchars($p['meta_description'] ?? 'Default corporate meta description') ?></div>
                                    <div class="pt-1 flex items-center justify-between text-[10px] font-mono text-slate-400">
                                        <span>Priority: <?= htmlspecialchars($p['sitemap_priority'] ?? '0.8') ?></span>
                                        <span>Freq: <?= htmlspecialchars($p['sitemap_changefreq'] ?? 'weekly') ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 15: AI CHATBOT -->
                <div id="tab-chatbot" class="tab-pane hidden space-y-6">
                    <form onsubmit="saveChatbotConfig(event)" class="saas-card p-6 sm:p-8 space-y-6">
                        <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">AI Assistant Widget Configuration</h2>
                                <p class="text-xs text-slate-500">Configure assistant name, system persona prompt, and interactive capabilities</p>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-royal-700 text-xs font-mono font-semibold">
                                <span class="w-2 h-2 rounded-full bg-royal-600 animate-pulse"></span>
                                Gemini Powered
                            </span>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Assistant Name</label>
                                    <input type="text" name="assistant_name" value="<?= htmlspecialchars($chatbot_cfg['assistant_name'] ?? 'NextTechX AI Assistant') ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Widget Status</label>
                                    <select name="enabled" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs bg-white">
                                        <option value="1" <?= !empty($chatbot_cfg['enabled']) ? 'selected' : '' ?>>Enabled / Floating</option>
                                        <option value="0" <?= empty($chatbot_cfg['enabled']) ? 'selected' : '' ?>>Disabled / Hidden</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Welcome Greeting</label>
                                <input type="text" name="welcome_message" value="<?= htmlspecialchars($chatbot_cfg['welcome_message'] ?? 'Hello! How can I assist you today?') ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">System Persona & Knowledge Prompt</label>
                                <textarea name="system_prompt" rows="4" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono"><?= htmlspecialchars($chatbot_cfg['system_prompt'] ?? '') ?></textarea>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-5 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md font-heading transition-all">
                                Update AI Assistant
                            </button>
                        </div>
                    </form>
                </div>

                <!-- TAB 16: ADMIN USERS (RBAC) -->
                <?php if (cms_user_can('manage_users')): ?>
                <div id="tab-users" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <h2 class="text-base font-bold text-slate-900 font-heading">Role-Based Access Control (RBAC)</h2>
                                <p class="text-xs text-slate-500">Manage administrator logins, access tiers, and permissions</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <?php foreach ($admin_users as $u): ?>
                                <div class="p-4 rounded-xl border border-slate-200 bg-white flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-royal-50 text-royal-700 font-bold flex items-center justify-center text-xs">
                                            <?= strtoupper(substr($u['username'], 0, 2)) ?>
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-slate-900"><?= htmlspecialchars($u['full_name'] ?? $u['username']) ?></div>
                                            <div class="text-[11px] text-slate-500 font-mono"><?= htmlspecialchars($u['email']) ?></div>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-xs font-mono font-bold uppercase bg-purple-50 text-purple-700">
                                        <?= str_replace('_', ' ', $u['role']) ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- TAB 17: AUDIT LOGS -->
                <div id="tab-logs" class="tab-pane hidden space-y-6">
                    <div class="saas-card p-6 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h2 class="text-base font-bold text-slate-900 font-heading">Security Audit Trail</h2>
                            <p class="text-xs text-slate-500">Immutable ledger of administrative actions, data edits, and logins</p>
                        </div>
                        <div class="space-y-2">
                            <?php foreach ($activity_logs as $log): ?>
                                <div class="p-3.5 rounded-xl border border-slate-100 bg-slate-50/50 flex items-center justify-between text-xs font-mono">
                                    <div class="flex items-center gap-3">
                                        <span class="text-slate-400"><?= htmlspecialchars($log['created_at']) ?></span>
                                        <span class="font-bold text-royal-600"><?= htmlspecialchars($log['user_username'] ?? 'admin') ?></span>
                                        <span class="text-slate-700"><?= htmlspecialchars($log['action']) ?></span>
                                    </div>
                                    <span class="text-slate-400 text-[11px]"><?= htmlspecialchars($log['ip_address'] ?? '127.0.0.1') ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- TAB 18: GLOBAL CONTROLS -->
                <div id="tab-global_controls" class="tab-pane hidden space-y-6">
                    <form onsubmit="saveGlobalControls(event)" class="saas-card p-6 sm:p-8 space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h2 class="text-base font-bold text-slate-900 font-heading">Maintenance Mode & Announcement Bar</h2>
                            <p class="text-xs text-slate-500">Emergency website maintenance toggle and top promotional notifications</p>
                        </div>
                        <div class="space-y-6">
                            <!-- Maintenance Section -->
                            <div class="p-5 rounded-2xl bg-amber-50/50 border border-amber-200/80 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="shield-alert" class="w-5 h-5 text-amber-600"></i>
                                        <span class="text-xs font-bold text-amber-900 font-heading">Maintenance Mode Status</span>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="maintenance_mode" value="1" <?= $is_maint ? 'checked' : '' ?> class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-600"></div>
                                    </label>
                                </div>
                                <p class="text-xs text-amber-800 leading-relaxed">
                                    When activated, all public pages return HTTP 503 and display your corporate maintenance notice. Administrator consoles remain fully operational.
                                </p>
                            </div>

                            <!-- Announcement Bar -->
                            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="bell" class="w-5 h-5 text-royal-600"></i>
                                        <span class="text-xs font-bold text-slate-900 font-heading">Top Header Announcement Bar</span>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="announcement_enabled" value="1" <?= !empty($global_announcement['enabled']) ? 'checked' : '' ?> class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-royal-600"></div>
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Banner Text</label>
                                        <input type="text" name="announcement_text" value="<?= htmlspecialchars($global_announcement['text'] ?? '') ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">Destination Link</label>
                                        <input type="text" name="announcement_link" value="<?= htmlspecialchars($global_announcement['link'] ?? 'services.php') ?>" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-5 py-2.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs shadow-md font-heading transition-all">
                                Update Global Controls
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </main>

    </div>

    <!-- ============================================================== -->
    <!-- SERVICE EDITOR MODAL (Clean White SaaS Container)              -->
    <!-- ============================================================== -->
    <div id="serviceEditorModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white border border-slate-200 rounded-3xl max-w-3xl w-full max-h-[90vh] flex flex-col shadow-2xl text-left overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <h3 class="text-base font-bold text-slate-900 font-heading" id="serviceModalTitle">Edit Enterprise Service</h3>
                <button onclick="closeServiceModal()" class="p-1 rounded-lg text-slate-400 hover:text-slate-600"><i data-lucide="x" class="w-5 h-5"></i></button>
            </div>
            <form id="serviceModalForm" onsubmit="saveServiceFromModal(event)" class="flex-1 overflow-y-auto p-6 space-y-4 custom-scrollbar">
                <input type="hidden" id="modalServiceSlug" name="slug">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Service Title</label>
                        <input type="text" id="modalServiceTitle" name="title" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Badge Pill Text</label>
                        <input type="text" id="modalServiceBadge" name="badge" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Icon (Lucide)</label>
                        <input type="text" id="modalServiceIcon" name="icon" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Accent Color</label>
                        <select id="modalServiceColor" name="color" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs bg-white">
                            <option value="cyan">Cyan</option>
                            <option value="blue">Blue</option>
                            <option value="indigo">Indigo</option>
                            <option value="emerald">Emerald</option>
                            <option value="purple">Purple</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Status</label>
                        <select id="modalServiceActive" name="is_active" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs bg-white">
                            <option value="1">Published</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Short Card Description</label>
                    <textarea id="modalServiceShortDesc" name="short_desc" rows="2" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs"></textarea>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Full Detail Overview</label>
                    <textarea id="modalServiceOverview" name="overview" rows="3" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs"></textarea>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">Tech Stack Tags (Comma Separated)</label>
                    <input type="text" id="modalServiceTechStack" name="tech_stack" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-700 uppercase tracking-wider">CTA Heading</label>
                    <input type="text" id="modalServiceCtaTitle" name="cta_title" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                </div>
                <div class="p-4 border-t border-slate-100 flex items-center justify-end gap-3 pt-4">
                    <button type="button" onclick="closeServiceModal()" class="px-4 py-2 rounded-xl border border-slate-300 text-xs font-semibold text-slate-700">Cancel</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs font-heading">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- CANDIDATE INTERNAL NOTES MODAL -->
    <div id="candidateNotesModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white border border-slate-200 rounded-3xl max-w-lg w-full p-6 shadow-2xl text-left space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-bold text-slate-900 font-heading">Internal Recruitment Notes</h3>
                <button onclick="closeNotesModal()" class="text-slate-400 hover:text-slate-600"><i data-lucide="x" class="w-5 h-5"></i></button>
            </div>
            <input type="hidden" id="notesAppId">
            <textarea id="notesAppText" rows="4" placeholder="Enter interview feedback, technical ratings, or screening comments..." class="w-full p-3.5 rounded-xl border border-slate-300 text-xs text-slate-800"></textarea>
            <div class="flex justify-end gap-2 pt-2">
                <button onclick="closeNotesModal()" class="px-3.5 py-1.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-700">Cancel</button>
                <button onclick="saveCandidateNotes()" class="px-4 py-1.5 rounded-xl bg-royal-600 text-white font-bold text-xs font-heading">Save Notes</button>
            </div>
        </div>
    </div>

    <!-- CHANGE PASSWORD MODAL -->
    <div id="changePasswordModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white border border-slate-200 rounded-3xl max-w-md w-full p-6 shadow-2xl text-left space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-sm font-bold text-slate-900 font-heading">Change Password</h3>
                <button onclick="closeChangePasswordModal()" class="text-slate-400 hover:text-slate-600"><i data-lucide="x" class="w-5 h-5"></i></button>
            </div>
            <form onsubmit="handlePasswordChangeSubmit(event)" class="space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Current Password</label>
                    <input type="password" id="currentPassInput" required class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">New Password (min. 8 chars)</label>
                    <input type="password" id="newPassInput" required minlength="8" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs font-mono">
                </div>
                <div class="flex justify-end gap-2 pt-3">
                    <button type="button" onclick="closeChangePasswordModal()" class="px-3.5 py-1.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-700">Cancel</button>
                    <button type="submit" class="px-4 py-1.5 rounded-xl bg-royal-600 text-white font-bold text-xs font-heading">Update Password</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- INTERACTIVE JAVASCRIPT CONTROLLERS                             -->
    <!-- ============================================================== -->
    <script>
        // Global Datasets
        const currentServicesData = <?= json_encode($all_services, JSON_UNESCAPED_SLASHES) ?>;
        let applicationsCache = [];
        let inquiriesCache = [];
        let currentInquiryTab = 'contacts';

        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();
            initAnalyticsChart();
            loadApplications();
            loadInquiries();
            loadMediaLibrary();
            loadPageSections('home');
        });

        function toggleMobileSidebar() {
            const sb = document.getElementById('adminSidebar');
            sb.classList.toggle('-translate-x-full');
        }

        function showToast(msg, isSuccess = true) {
            const toast = document.getElementById('toastNotification');
            toast.className = isSuccess 
                ? 'fixed top-5 right-5 z-50 transition-all duration-300 flex items-center gap-3 px-5 py-3.5 rounded-2xl shadow-xl text-xs font-semibold max-w-md bg-emerald-50 border border-emerald-200 text-emerald-800'
                : 'fixed top-5 right-5 z-50 transition-all duration-300 flex items-center gap-3 px-5 py-3.5 rounded-2xl shadow-xl text-xs font-semibold max-w-md bg-rose-50 border border-rose-200 text-rose-800';
            toast.innerHTML = (isSuccess ? '<i data-lucide="check-circle" class="w-4 h-4 text-emerald-600"></i>' : '<i data-lucide="alert-circle" class="w-4 h-4 text-rose-600"></i>') + `<span>${msg}</span>`;
            toast.classList.remove('translate-y-[-120%]', 'opacity-0', 'pointer-events-none');
            if (window.lucide) lucide.createIcons();
            setTimeout(() => {
                toast.classList.add('translate-y-[-120%]', 'opacity-0', 'pointer-events-none');
            }, 3500);
        }

        function switchTab(tabId) {
            document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));

            const targetPane = document.getElementById('tab-' + tabId);
            const targetBtn = document.getElementById('nav-' + tabId);
            if (targetPane) targetPane.classList.remove('hidden');
            if (targetBtn) targetBtn.classList.add('active');

            const names = {
                overview: 'Overview & Metrics',
                pages: 'Page Content CMS',
                services: 'Services & Practices',
                careers: 'Careers & Internship Management',
                inquiries: 'Inquiries & Client Leads',
                navigation: 'Navigation & Menus',
                media: 'Media Assets Library',
                appearance: 'Theme & Appearance',
                settings: 'Global Site Settings',
                forms: 'Forms Engine',
                emails: 'Email Notification Templates',
                testimonials: 'Client Testimonials',
                articles: 'Articles & News',
                seo: 'Search Engine Optimization',
                chatbot: 'AI Assistant Configuration',
                users: 'Admin Users & RBAC',
                logs: 'Security Audit Trail',
                global_controls: 'Maintenance & Global Banner'
            };
            document.getElementById('currentTabBreadcrumb').innerText = names[tabId] || 'Console';
            if (window.innerWidth < 768) {
                document.getElementById('adminSidebar').classList.add('-translate-x-full');
            }
        }

        function handleGlobalSearch(e) {
            const q = e.target.value.toLowerCase().trim();
            if (!q) return;
            if (e.key === 'Enter') {
                if (q.includes('service')) switchTab('services');
                else if (q.includes('job') || q.includes('intern') || q.includes('career')) switchTab('careers');
                else if (q.includes('lead') || q.includes('quote') || q.includes('inquiry')) switchTab('inquiries');
                else if (q.includes('seo') || q.includes('meta')) switchTab('seo');
                else switchTab('pages');
            }
        }

        async function handleAdminLogout() {
            if (!confirm('Are you sure you want to log out of the Admin Console?')) return;
            try {
                await fetch('api/admin_auth.php?action=logout', { method: 'POST' });
            } catch (e) {}
            window.location.href = 'admin-login.php';
        }

        function openChangePasswordModal() {
            document.getElementById('changePasswordModal').classList.remove('hidden');
        }
        function closeChangePasswordModal() {
            document.getElementById('changePasswordModal').classList.add('hidden');
        }

        async function handlePasswordChangeSubmit(e) {
            e.preventDefault();
            const cur = document.getElementById('currentPassInput').value;
            const nw = document.getElementById('newPassInput').value;
            try {
                const res = await fetch('api/admin_auth.php?action=change_password', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ current_password: cur, new_password: nw })
                });
                const data = await res.json();
                if (data.success) {
                    showToast('Master password updated successfully.');
                    closeChangePasswordModal();
                } else {
                    showToast(data.message || 'Failed to update password.', false);
                }
            } catch (err) {
                showToast('Network error updating password.', false);
            }
        }

        // ==========================================
        // CHART.JS KPI GRAPH CONTROLLER
        // ==========================================
        function initAnalyticsChart() {
            const ctx = document.getElementById('saasMetricsChart');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        {
                            label: 'Candidate Applications',
                            data: [3, 7, 5, 12, 9, 14, <?= (int)($stats['total_applications'] ?? 8) ?>],
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37, 99, 235, 0.08)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 2.5
                        },
                        {
                            label: 'Quotes & Inquiries',
                            data: [2, 4, 6, 8, 5, 10, <?= (int)($stats['total_inquiries'] ?? 6) ?>],
                            borderColor: '#7c3aed',
                            backgroundColor: 'rgba(124, 58, 237, 0.05)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 2.5
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Inter', size: 11 } } }
                    },
                    scales: {
                        y: { grid: { color: '#f1f5f9' }, ticks: { font: { family: 'Inter', size: 10 } } },
                        x: { grid: { display: false }, ticks: { font: { family: 'Inter', size: 10 } } }
                    }
                }
            });
        }

        // ==========================================
        // PAGE SECTIONS CMS CONTROLLER
        // ==========================================
        async function loadPageSections(slug) {
            const container = document.getElementById('pageSectionsContainer');
            container.innerHTML = '<div class="p-8 text-center text-xs text-slate-400 font-mono">Loading sections for ' + slug + '...</div>';
            try {
                const res = await fetch(`api/cms.php?action=get_page&slug=${slug}`);
                const data = await res.json();
                if (data.success && data.sections) {
                    renderPageSections(slug, data.sections);
                } else {
                    container.innerHTML = '<div class="p-4 rounded-xl bg-slate-100 text-xs text-slate-600">No editable sections found for this route.</div>';
                }
            } catch (err) {
                container.innerHTML = '<div class="p-4 rounded-xl bg-rose-50 text-xs text-rose-700">Failed to load page content.</div>';
            }
        }

        function renderPageSections(pageSlug, sections) {
            const container = document.getElementById('pageSectionsContainer');
            container.innerHTML = '';
            sections.forEach(sec => {
                const content = sec.content || {};
                const div = document.createElement('div');
                div.className = 'saas-card p-5 space-y-4';
                div.innerHTML = `
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-royal-600"></span>
                            <h4 class="text-xs font-bold text-slate-900 uppercase font-mono tracking-wider">${escapeHtml(sec.section_key)} Section</h4>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400">Order: ${sec.sort_order || 0}</span>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Heading / Title</label>
                            <input type="text" id="sec_heading_${sec.section_key}" value="${escapeHtml(content.heading || content.title || '')}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Subtitle / Tagline</label>
                            <input type="text" id="sec_sub_${sec.section_key}" value="${escapeHtml(content.subheading || content.subtitle || '')}" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Paragraph Description</label>
                            <textarea id="sec_desc_${sec.section_key}" rows="2" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs">${escapeHtml(content.description || content.body || '')}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button onclick="saveSectionDirect('${pageSlug}', '${sec.section_key}')" class="px-4 py-1.5 rounded-xl bg-royal-600 hover:bg-royal-700 text-white font-bold text-xs font-heading shadow-xs">
                            Save Section
                        </button>
                    </div>
                `;
                container.appendChild(div);
            });
            if (window.lucide) lucide.createIcons();
        }

        async function saveSectionDirect(pageSlug, sectionKey) {
            const heading = document.getElementById(`sec_heading_${sectionKey}`)?.value || '';
            const sub = document.getElementById(`sec_sub_${sectionKey}`)?.value || '';
            const desc = document.getElementById(`sec_desc_${sectionKey}`)?.value || '';

            const sectionData = {
                heading: heading,
                title: heading,
                subheading: sub,
                subtitle: sub,
                description: desc,
                body: desc
            };

            try {
                const res = await fetch('api/cms.php?action=save_section', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ page_slug: pageSlug, section_key: sectionKey, section_data: sectionData })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`Updated section '${sectionKey}' on page '${pageSlug}'.`);
                } else {
                    showToast(data.message || 'Failed to update section', false);
                }
            } catch (err) {
                showToast('Network error saving section.', false);
            }
        }

        // ==========================================
        // SERVICES CMS CONTROLLER
        // ==========================================
        function editService(slug) {
            const s = currentServicesData.find(item => item.slug === slug);
            if (!s) return;
            document.getElementById('serviceModalTitle').innerText = 'Edit Service: ' + s.title;
            document.getElementById('modalServiceSlug').value = s.slug;
            document.getElementById('modalServiceTitle').value = s.title || '';
            document.getElementById('modalServiceBadge').value = s.badge || '';
            document.getElementById('modalServiceIcon').value = s.icon || 'layers';
            document.getElementById('modalServiceColor').value = s.color || 'blue';
            document.getElementById('modalServiceActive').value = s.is_active ? 1 : 0;
            document.getElementById('modalServiceShortDesc').value = s.short_desc || '';
            document.getElementById('modalServiceOverview').value = s.content?.overview || '';
            document.getElementById('modalServiceTechStack').value = (s.content?.tech_stack || []).join(', ');
            document.getElementById('modalServiceCtaTitle').value = s.content?.cta?.title || '';
            document.getElementById('serviceEditorModal').classList.remove('hidden');
        }

        function openNewServiceModal() {
            document.getElementById('serviceModalTitle').innerText = 'Add New Enterprise Service';
            document.getElementById('serviceModalForm').reset();
            document.getElementById('modalServiceSlug').value = '';
            document.getElementById('serviceEditorModal').classList.remove('hidden');
        }

        function closeServiceModal() {
            document.getElementById('serviceEditorModal').classList.add('hidden');
        }

        async function saveServiceFromModal(e) {
            e.preventDefault();
            const slug = document.getElementById('modalServiceSlug').value || document.getElementById('modalServiceTitle').value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            const existing = currentServicesData.find(item => item.slug === slug) || {};
            const content = existing.content || {};

            content.overview = document.getElementById('modalServiceOverview').value;
            content.tech_stack = document.getElementById('modalServiceTechStack').value.split(',').map(s => s.trim()).filter(Boolean);
            if (!content.cta) content.cta = { button_text: 'Inquire About Service', button_url: 'contact.php' };
            content.cta.title = document.getElementById('modalServiceCtaTitle').value;

            const payload = {
                slug: slug,
                service: {
                    title: document.getElementById('modalServiceTitle').value,
                    badge: document.getElementById('modalServiceBadge').value,
                    icon: document.getElementById('modalServiceIcon').value,
                    color: document.getElementById('modalServiceColor').value,
                    is_active: parseInt(document.getElementById('modalServiceActive').value),
                    short_desc: document.getElementById('modalServiceShortDesc').value,
                    content: content
                }
            };

            try {
                const res = await fetch('api/cms.php?action=save_service', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    showToast('Service saved successfully! Public pages updated.');
                    closeServiceModal();
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast(data.message || 'Error saving service', false);
                }
            } catch (err) {
                showToast('Network error saving service', false);
            }
        }

        // ==========================================
        // APPLICATIONS & INQUIRIES CONTROLLERS
        // ==========================================
        async function loadApplications() {
            try {
                const res = await fetch('api/cms.php?action=get_career_applications');
                const data = await res.json();
                if (data.success) {
                    applicationsCache = data.applications || [];
                    renderApplications(applicationsCache);
                }
            } catch (e) {}
        }

        function renderApplications(apps) {
            const tb = document.getElementById('applicationsTableBody');
            if (!tb) return;
            if (!apps.length) {
                tb.innerHTML = '<tr><td colspan="7" class="p-6 text-center text-slate-400">No candidate applications matching criteria.</td></tr>';
                return;
            }
            tb.innerHTML = '';
            apps.forEach(a => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/70 transition-colors';
                tr.innerHTML = `
                    <td class="p-4">
                        <div class="font-bold text-slate-900">${escapeHtml(a.full_name)}</div>
                        <div class="text-[11px] text-slate-500 font-mono">${escapeHtml(a.email)}</div>
                    </td>
                    <td class="p-4 font-semibold text-slate-800">${escapeHtml(a.course_selected || a.position || 'General')}</td>
                    <td class="p-4 text-slate-600">${escapeHtml(a.qualification || 'Degree')}</td>
                    <td class="p-4">
                        ${a.resume_path 
                            ? `<a href="${a.resume_path}" target="_blank" class="inline-flex items-center gap-1 text-royal-600 hover:underline font-mono text-[11px]"><i data-lucide="file-text" class="w-3.5 h-3.5"></i> Resume</a>` 
                            : '<span class="text-slate-400 font-mono text-[11px]">None</span>'}
                    </td>
                    <td class="p-4">
                        <select onchange="changeApplicationStatus(${a.id}, this.value)" class="px-2 py-1 rounded-lg border border-slate-300 text-xs font-semibold bg-white">
                            <option value="New" ${a.status === 'New' ? 'selected' : ''}>New</option>
                            <option value="Under Review" ${a.status === 'Under Review' ? 'selected' : ''}>Under Review</option>
                            <option value="Shortlisted" ${a.status === 'Shortlisted' ? 'selected' : ''}>Shortlisted</option>
                            <option value="Selected" ${a.status === 'Selected' ? 'selected' : ''}>Selected</option>
                            <option value="Rejected" ${a.status === 'Rejected' ? 'selected' : ''}>Rejected</option>
                        </select>
                    </td>
                    <td class="p-4 text-slate-400 font-mono text-[11px]">${escapeHtml(a.created_at || 'Just now')}</td>
                    <td class="p-4 text-right">
                        <button onclick="openCandidateNotes(${a.id}, '${escapeHtml(a.internal_notes || '')}')" title="Interview Notes" class="p-1.5 rounded-lg text-slate-400 hover:text-royal-600 hover:bg-slate-100">
                            <i data-lucide="message-square" class="w-4 h-4"></i>
                        </button>
                    </td>
                `;
                tb.appendChild(tr);
            });
            if (window.lucide) lucide.createIcons();
        }

        function filterApplications() {
            const q = document.getElementById('appSearchInput').value.toLowerCase().trim();
            const status = document.getElementById('appStatusFilter').value;
            const filtered = applicationsCache.filter(a => {
                const matchQ = (a.full_name?.toLowerCase().includes(q) || a.email?.toLowerCase().includes(q) || a.course_selected?.toLowerCase().includes(q));
                const matchS = status === 'all' || a.status === status;
                return matchQ && matchS;
            });
            renderApplications(filtered);
        }

        async function changeApplicationStatus(id, newStatus) {
            try {
                const res = await fetch('api/cms.php?action=update_application_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, status: newStatus })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`Candidate status changed to ${newStatus}.`);
                } else {
                    showToast('Failed to update status', false);
                }
            } catch (e) {
                showToast('Network error', false);
            }
        }

        function openCandidateNotes(id, notes) {
            document.getElementById('notesAppId').value = id;
            document.getElementById('notesAppText').value = notes || '';
            document.getElementById('candidateNotesModal').classList.remove('hidden');
        }
        function closeNotesModal() {
            document.getElementById('candidateNotesModal').classList.add('hidden');
        }
        async function saveCandidateNotes() {
            const id = document.getElementById('notesAppId').value;
            const notes = document.getElementById('notesAppText').value;
            try {
                const res = await fetch('api/cms.php?action=update_application_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, internal_notes: notes })
                });
                const data = await res.json();
                if (data.success) {
                    showToast('Internal recruitment notes saved.');
                    closeNotesModal();
                    loadApplications();
                }
            } catch (e) {}
        }

        function exportApplicationsCsv() {
            window.location.href = 'api/cms.php?action=export_applications_csv';
        }

        function switchCareerSubTab(tab) {
            document.getElementById('careerSubPane-apps').classList.toggle('hidden', tab !== 'applications');
            document.getElementById('careerSubPane-openings').classList.toggle('hidden', tab !== 'openings');
            document.getElementById('careerSubTab-apps').className = tab === 'applications' 
                ? 'px-4 py-2 rounded-xl font-bold text-xs bg-royal-600 text-white font-heading'
                : 'px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading';
            document.getElementById('careerSubTab-openings').className = tab === 'openings' 
                ? 'px-4 py-2 rounded-xl font-bold text-xs bg-royal-600 text-white font-heading'
                : 'px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading';
        }

        // Inquiries Subsystem
        async function loadInquiries() {
            try {
                const res = await fetch(`api/cms.php?action=get_inquiries&type=${currentInquiryTab}`);
                const data = await res.json();
                if (data.success) {
                    inquiriesCache = data.inquiries || [];
                    renderInquiries(inquiriesCache);
                }
            } catch (e) {}
        }

        function switchInquirySubTab(tab) {
            currentInquiryTab = tab;
            ['contacts', 'quotes', 'consultations'].forEach(t => {
                const btn = document.getElementById(`inquirySubTab-${t}`);
                if (btn) btn.className = t === tab 
                    ? 'px-4 py-2 rounded-xl font-bold text-xs bg-royal-600 text-white font-heading'
                    : 'px-4 py-2 rounded-xl font-bold text-xs text-slate-600 hover:bg-slate-100 font-heading';
            });
            loadInquiries();
        }

        function renderInquiries(items) {
            const tb = document.getElementById('inquiriesTableBody');
            if (!tb) return;
            if (!items.length) {
                tb.innerHTML = '<tr><td colspan="6" class="p-6 text-center text-slate-400">No submissions found in this category.</td></tr>';
                return;
            }
            tb.innerHTML = '';
            items.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/70 transition-colors';
                tr.innerHTML = `
                    <td class="p-4">
                        <div class="font-bold text-slate-900">${escapeHtml(item.name || item.full_name || 'Client Lead')}</div>
                        <div class="text-[11px] text-slate-500 font-mono">${escapeHtml(item.company || '')}</div>
                    </td>
                    <td class="p-4 font-mono text-[11px] text-slate-700">
                        <div>${escapeHtml(item.email || '')}</div>
                        <div class="text-slate-400">${escapeHtml(item.phone || '')}</div>
                    </td>
                    <td class="p-4 text-slate-700 max-w-xs">
                        <div class="font-semibold text-royal-700">${escapeHtml(item.service_requested || item.subject || 'Enterprise Scope')}</div>
                        <p class="text-[11px] text-slate-500 line-clamp-1">${escapeHtml(item.message || item.project_description || '')}</p>
                    </td>
                    <td class="p-4">
                        <select onchange="updateInquiryStatus('${currentInquiryTab}', ${item.id}, this.value)" class="px-2 py-1 rounded-lg border border-slate-300 text-xs font-semibold bg-white">
                            <option value="New" ${item.status === 'New' ? 'selected' : ''}>New</option>
                            <option value="Contacted" ${item.status === 'Contacted' ? 'selected' : ''}>Contacted</option>
                            <option value="In Progress" ${item.status === 'In Progress' ? 'selected' : ''}>In Progress</option>
                            <option value="Resolved" ${item.status === 'Resolved' ? 'selected' : ''}>Resolved</option>
                        </select>
                    </td>
                    <td class="p-4 text-slate-400 font-mono text-[11px]">${escapeHtml(item.created_at || 'Recently')}</td>
                    <td class="p-4 text-right">
                        <button onclick="alert('Client Lead: ' + '${escapeHtml(item.email)}')" class="p-1.5 rounded-lg text-slate-400 hover:text-royal-600">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                `;
                tb.appendChild(tr);
            });
            if (window.lucide) lucide.createIcons();
        }

        async function updateInquiryStatus(type, id, status) {
            try {
                const res = await fetch('api/cms.php?action=update_inquiry_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ type, id, status })
                });
                const data = await res.json();
                if (data.success) {
                    showToast(`Inquiry status updated to ${status}.`);
                }
            } catch (e) {}
        }

        function exportInquiriesCsv() {
            window.location.href = `api/cms.php?action=export_inquiries_csv&type=${currentInquiryTab}`;
        }

        // ==========================================
        // MEDIA LIBRARY CONTROLLER
        // ==========================================
        async function loadMediaLibrary() {
            const grid = document.getElementById('mediaLibraryGrid');
            if (!grid) return;
            try {
                const res = await fetch('api/cms.php?action=get_media');
                const data = await res.json();
                if (data.success && data.media) {
                    grid.innerHTML = '';
                    data.media.forEach(m => {
                        const div = document.createElement('div');
                        div.className = 'saas-card p-3 space-y-2 group';
                        div.innerHTML = `
                            <div class="h-28 rounded-xl bg-slate-100 flex items-center justify-center overflow-hidden">
                                <img src="${m.url}" alt="${escapeHtml(m.filename)}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                            </div>
                            <div class="text-[11px] font-mono text-slate-700 truncate" title="${escapeHtml(m.filename)}">${escapeHtml(m.filename)}</div>
                            <button onclick="copyToClipboard('${m.url}')" class="w-full py-1 rounded bg-slate-100 hover:bg-royal-50 hover:text-royal-600 text-[10px] font-mono font-bold transition-colors">
                                Copy URL
                            </button>
                        `;
                        grid.appendChild(div);
                    });
                }
            } catch (e) {}
        }

        async function handleMediaUpload(input) {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];
            const formData = new FormData();
            formData.append('file', file);
            showToast('Uploading asset: ' + file.name + '...');
            try {
                const res = await fetch('api/upload_media.php', { method: 'POST', body: formData });
                const data = await res.json();
                if (data.success) {
                    showToast('Media file uploaded successfully.');
                    loadMediaLibrary();
                } else {
                    showToast(data.message || 'Upload error', false);
                }
            } catch (err) {
                showToast('Network upload error', false);
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            showToast('Media URL copied to clipboard: ' + text);
        }

        // Form Submit Handlers
        async function saveAppearance(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            const payload = Object.fromEntries(form.entries());
            try {
                const res = await fetch('api/cms.php?action=save_appearance', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ appearance: payload })
                });
                const data = await res.json();
                if (data.success) showToast('Styling and branding appearance updated.');
                else showToast('Failed to update styling', false);
            } catch (err) { showToast('Network error', false); }
        }

        async function saveSiteSettings(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            const payload = Object.fromEntries(form.entries());
            try {
                const res = await fetch('api/cms.php?action=save_settings', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ settings: payload })
                });
                const data = await res.json();
                if (data.success) showToast('Global website settings saved.');
                else showToast('Failed to save settings', false);
            } catch (err) { showToast('Network error', false); }
        }

        async function saveChatbotConfig(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            const payload = Object.fromEntries(form.entries());
            try {
                const res = await fetch('api/cms.php?action=save_chatbot_config', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ config: payload })
                });
                const data = await res.json();
                if (data.success) showToast('AI Assistant configuration updated.');
                else showToast('Failed to update AI Assistant', false);
            } catch (err) { showToast('Network error', false); }
        }

        async function saveGlobalControls(e) {
            e.preventDefault();
            const form = new FormData(e.target);
            const payload = {
                maintenance_mode: form.get('maintenance_mode') === '1' ? '1' : '0',
                announcement_enabled: form.get('announcement_enabled') === '1' ? '1' : '0',
                announcement_text: form.get('announcement_text'),
                announcement_link: form.get('announcement_link')
            };
            try {
                const res = await fetch('api/cms.php?action=save_global_controls', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ controls: payload })
                });
                const data = await res.json();
                if (data.success) showToast('Maintenance and global controls updated.');
                else showToast('Failed to save controls', false);
            } catch (err) { showToast('Network error', false); }
        }

        function escapeHtml(str) {
            if (!str) return '';
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }
    </script>
</body>
</html>

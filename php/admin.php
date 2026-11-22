<?php
// NextTechX Solutions - Centralized Master Admin Dashboard & CMS (Part 1 & 2)
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';

// Session Security & Inactivity Timeout (2 Hours = 7200 seconds)
$SESSION_TIMEOUT = 7200;
if (!empty($_SESSION['admin_user'])) {
    if (!empty($_SESSION['admin_last_activity']) && (time() - $_SESSION['admin_last_activity'] > $SESSION_TIMEOUT)) {
        session_unset();
        session_destroy();
        header('Location: admin.php?timeout=1');
        exit;
    }
    $_SESSION['admin_last_activity'] = time();
}

$is_logged_in = !empty($_SESSION['admin_user']);
$current_admin = $_SESSION['admin_user'] ?? null;
$current_role = $_SESSION['admin_role'] ?? 'super_admin';

// CSRF Token Generation
if (empty($_SESSION['cms_csrf_token'])) {
    $_SESSION['cms_csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['cms_csrf_token'];

// Load data for dashboard rendering
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
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Master Admin Dashboard — <?= htmlspecialchars(SITE_NAME) ?></title>
    
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
                        brand: { 50: '#eff6ff', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' }
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
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Manrope', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #0f172a; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #475569; }
        .tab-btn.active {
            background-color: #2563eb !important;
            color: #ffffff !important;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }
        .tab-btn.active i { color: #ffffff !important; }
    </style>
</head>
<body class="h-full bg-slate-900 text-slate-100 antialiased selection:bg-blue-600 selection:text-white flex flex-col overflow-hidden">

<?php if (!$is_logged_in): ?>
<!-- ============================================================== -->
<!-- 1. SECURE ADMIN LOGIN SCREEN (PART 1 & 2)                      -->
<!-- ============================================================== -->
<div class="min-h-screen w-full flex items-center justify-center p-4 bg-gradient-to-br from-slate-950 via-slate-900 to-navy-950 relative overflow-hidden">
    <!-- Subtle Background Glows -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>
    
    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200/80 p-8 sm:p-10 text-slate-800 relative z-10 space-y-6">
        
        <!-- Brand Header -->
        <div class="text-center space-y-2">
            <div class="inline-flex p-3 rounded-2xl bg-blue-50 border border-blue-100 text-blue-600 mb-2">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight font-heading">
                NEXTECHX <span class="text-blue-600">SOLUTIONS</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium">
                Centralized CMS & Master Administration Portal
            </p>
        </div>

        <?php if (!empty($_GET['timeout'])): ?>
            <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs flex items-center gap-2">
                <i data-lucide="clock" class="w-4 h-4 shrink-0 text-amber-600"></i>
                <span>Your administrative session expired due to inactivity. Please sign in again.</span>
            </div>
        <?php endif; ?>

        <!-- Feedback Alert Container -->
        <div id="loginAlert" class="hidden p-3.5 rounded-xl text-xs font-medium"></div>

        <!-- Login Form -->
        <form id="adminLoginForm" onsubmit="handleAdminLogin(event)" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
            
            <div class="space-y-1.5 text-left">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Admin Username or Email</label>
                <div class="relative">
                    <i data-lucide="user" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3"></i>
                    <input type="text" name="login" required autocomplete="username"
                           placeholder="admin or admin@nextechxsolutions.com"
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 text-xs text-slate-900 font-medium transition-all">
                </div>
            </div>

            <div class="space-y-1.5 text-left">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600">Security Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3"></i>
                    <input type="password" name="password" required autocomplete="current-password"
                           placeholder="••••••••••••"
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 text-xs text-slate-900 font-medium transition-all">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" id="loginSubmitBtn"
                        class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 active:scale-[0.99] text-white text-xs font-bold uppercase tracking-wider shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                    <i data-lucide="log-in" class="w-4 h-4"></i>
                    <span>Authenticate & Access Dashboard</span>
                </button>
            </div>
        </form>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
            <span class="flex items-center gap-1"><i data-lucide="lock" class="w-3 h-3"></i> TLS 1.3 Encrypted</span>
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Public Site</a>
        </div>
    </div>
</div>

<?php else: ?>
<!-- ============================================================== -->
<!-- 2. AUTHENTICATED CENTRALIZED MASTER DASHBOARD (PART 1 & 2)     -->
<!-- ============================================================== -->
<div class="flex h-screen bg-slate-950 text-slate-100 overflow-hidden font-sans">
    
    <!-- A. Master Sidebar Navigation -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col shrink-0 select-none z-20">
        
        <!-- Sidebar Brand Header -->
        <div class="p-4 border-b border-slate-800 flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-black text-sm shrink-0 shadow-md">
                NX
            </div>
            <div class="truncate text-left">
                <h1 class="text-xs font-extrabold text-white tracking-wide uppercase font-heading truncate">
                    <?= htmlspecialchars(SITE_NAME) ?>
                </h1>
                <p class="text-[10px] text-cyan-400 font-mono truncate">Centralized Master CMS</p>
            </div>
        </div>

        <!-- Sidebar Navigation Menu with Categories -->
        <nav class="flex-1 overflow-y-auto custom-scrollbar p-3 space-y-1 text-xs font-medium">
            
            <!-- Category 1: DASHBOARD -->
            <div class="px-3 pt-2 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Analytics</div>
            
            <button onclick="switchTab('overview')" id="tabBtn-overview" class="tab-btn active w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                <span>Overview & Metrics</span>
            </button>

            <!-- Category 2: CORE CONTENT MANAGEMENT -->
            <div class="px-3 pt-3 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Content CMS</div>

            <button onclick="switchTab('services')" id="tabBtn-services" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="cpu" class="w-4 h-4 text-cyan-400"></i>
                <span>Services Management</span>
                <span class="ml-auto text-[10px] bg-blue-500/20 text-cyan-300 px-1.5 py-0.5 rounded font-mono font-bold"><?= count($all_services) ?></span>
            </button>

            <button onclick="switchTab('pages')" id="tabBtn-pages" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="file-text" class="w-4 h-4"></i>
                <span>Pages & Sections (14)</span>
            </button>

            <button onclick="switchTab('homepage')" id="tabBtn-homepage" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>Homepage Sections</span>
            </button>

            <button onclick="switchTab('about')" id="tabBtn-about" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="users" class="w-4 h-4"></i>
                <span>About Us CMS</span>
            </button>

            <button onclick="switchTab('testimonials')" id="tabBtn-testimonials" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="star" class="w-4 h-4 text-amber-400"></i>
                <span>Client Testimonials</span>
                <span class="ml-auto text-[10px] bg-slate-800 text-slate-400 px-1.5 py-0.5 rounded font-mono"><?= count($all_testimonials) ?></span>
            </button>

            <button onclick="switchTab('blog')" id="tabBtn-blog" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="newspaper" class="w-4 h-4 text-purple-400"></i>
                <span>Blog & Articles (Optional)</span>
            </button>

            <!-- Category 3: PEOPLE & SUBMISSIONS -->
            <div class="px-3 pt-3 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Talent & Inquiries</div>

            <button onclick="switchTab('careers')" id="tabBtn-careers" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-400"></i>
                <span>Careers & Applications</span>
                <span class="ml-auto text-[10px] bg-emerald-500/20 text-emerald-300 px-1.5 py-0.5 rounded font-mono font-bold"><?= $stats['careers'] ?? 0 ?></span>
            </button>

            <button onclick="switchTab('inquiries')" id="tabBtn-inquiries" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="inbox" class="w-4 h-4 text-blue-400"></i>
                <span>Inquiries & Leads</span>
                <span class="ml-auto text-[10px] bg-blue-500/20 text-blue-300 px-1.5 py-0.5 rounded font-mono font-bold"><?= ($stats['contacts'] ?? 0) + ($stats['quotations'] ?? 0) ?></span>
            </button>

            <!-- Category 4: AUTOMATION & FORMS -->
            <div class="px-3 pt-3 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Forms & Communications</div>

            <button onclick="switchTab('forms')" id="tabBtn-forms" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="form-input" class="w-4 h-4 text-indigo-400"></i>
                <span>Form Field Manager</span>
            </button>

            <button onclick="switchTab('emails')" id="tabBtn-emails" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="mail" class="w-4 h-4 text-cyan-400"></i>
                <span>Email Templates & SMTP</span>
            </button>

            <button onclick="switchTab('chatbot')" id="tabBtn-chatbot" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="bot" class="w-4 h-4 text-rose-400"></i>
                <span>AI Chatbot Configuration</span>
            </button>

            <!-- Category 5: DESIGN & ASSETS -->
            <div class="px-3 pt-3 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Design & Assets</div>

            <button onclick="switchTab('navigation')" id="tabBtn-navigation" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="menu" class="w-4 h-4"></i>
                <span>Header & Menus</span>
            </button>

            <button onclick="switchTab('appearance')" id="tabBtn-appearance" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="palette" class="w-4 h-4"></i>
                <span>Appearance & Themes</span>
            </button>

            <button onclick="switchTab('media')" id="tabBtn-media" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="image" class="w-4 h-4"></i>
                <span>Media Library</span>
            </button>

            <!-- Category 6: SETTINGS & GOVERNANCE -->
            <div class="px-3 pt-3 pb-1 text-[10px] font-mono uppercase tracking-wider text-slate-400 font-bold">Governance & Controls</div>

            <button onclick="switchTab('seo')" id="tabBtn-seo" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="globe" class="w-4 h-4 text-emerald-400"></i>
                <span>SEO & Sitemap Manager</span>
            </button>

            <button onclick="switchTab('settings')" id="tabBtn-settings" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="settings" class="w-4 h-4"></i>
                <span>Global Website Controls</span>
            </button>

            <?php if ($current_role === 'super_admin'): ?>
            <button onclick="switchTab('users')" id="tabBtn-users" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="user-check" class="w-4 h-4 text-purple-400"></i>
                <span>Admin Users & RBAC</span>
            </button>
            <?php endif; ?>

            <button onclick="switchTab('logs')" id="tabBtn-logs" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="activity" class="w-4 h-4 text-amber-400"></i>
                <span>Activity Audit Trail</span>
            </button>

            <button onclick="switchTab('security')" id="tabBtn-security" class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-left text-slate-300 hover:bg-slate-800 hover:text-white">
                <i data-lucide="shield" class="w-4 h-4"></i>
                <span>Security & Password</span>
            </button>
        </nav>

        <!-- Sidebar User Footer -->
        <div class="p-3 bg-slate-950/80 border-t border-slate-800 flex items-center justify-between text-xs">
            <div class="flex items-center gap-2.5 overflow-hidden">
                <div class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center shrink-0">
                    <?= strtoupper(substr($current_admin['username'] ?? 'A', 0, 1)) ?>
                </div>
                <div class="truncate text-left">
                    <p class="font-bold text-white text-xs truncate"><?= htmlspecialchars($current_admin['username'] ?? 'Admin') ?></p>
                    <p class="text-[10px] text-cyan-400 font-mono uppercase truncate"><?= htmlspecialchars($current_admin['role'] ?? 'super_admin') ?></p>
                </div>
            </div>
            <button onclick="handleAdminLogout()" title="Sign Out" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition-colors">
                <i data-lucide="log-out" class="w-4 h-4"></i>
            </button>
        </div>
    </aside>

    <!-- B. Main Application Canvas -->
    <div class="flex-1 flex flex-col overflow-hidden bg-slate-950">
        
        <!-- Top App Header -->
        <header class="h-16 bg-slate-900 border-b border-slate-800 px-6 flex items-center justify-between gap-4 shrink-0 shadow-sm">
            <div class="flex items-center gap-3 flex-1 max-w-md">
                <div class="relative w-full">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3"></i>
                    <input type="text" id="globalSearchInput" onkeyup="handleGlobalSearch(event)"
                           placeholder="Search CMS services, applicants, pages, inquiries..." 
                           class="w-full pl-9 pr-4 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="index.php" target="_blank" rel="noopener noreferrer" 
                   class="px-3.5 py-1.5 rounded-xl border border-slate-700 hover:bg-slate-800 text-slate-200 text-xs font-semibold flex items-center gap-1.5 transition-colors">
                    <i data-lucide="external-link" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>Preview Live Website</span>
                </a>

                <button onclick="switchTab('media')" class="px-3.5 py-1.5 rounded-xl bg-blue-600/20 text-cyan-300 border border-blue-500/30 hover:bg-blue-600/30 text-xs font-semibold flex items-center gap-1.5 transition-colors">
                    <i data-lucide="upload" class="w-3.5 h-3.5"></i>
                    <span>Upload Media</span>
                </button>

                <button onclick="handleAdminLogout()" class="px-3 py-1.5 rounded-xl border border-slate-800 hover:bg-rose-500/10 hover:text-rose-400 text-slate-400 text-xs font-medium flex items-center gap-1.5 transition-colors">
                    <i data-lucide="power" class="w-3.5 h-3.5"></i>
                    <span>Sign Out</span>
                </button>
            </div>
        </header>

        <!-- Main Scrollable Content Area -->
        <main class="flex-1 overflow-y-auto custom-scrollbar p-6 lg:p-8 space-y-8 bg-slate-950">

            <!-- ============================================================== -->
            <!-- TAB 1: OVERVIEW & SYSTEM METRICS                               -->
            <!-- ============================================================== -->
            <div id="tabContent-overview" class="space-y-8">
                <!-- Welcome Banner -->
                <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-blue-900 via-slate-900 to-indigo-950 text-white relative overflow-hidden shadow-xl border border-slate-800">
                    <div class="relative z-10 space-y-2 max-w-2xl text-left">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-cyan-300 text-xs font-mono border border-white/15">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-cyan-400"></i>
                            <span>Enterprise CMS & Master Control Engine</span>
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold font-heading tracking-tight">
                            NEXTECHX SOLUTIONS Centralized Management
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                            Full control over all 5 core services, technical workflows, candidate applications, contact inquiries, forms, email notification templates, testimonials, SEO, and global website controls.
                        </p>
                    </div>
                </div>

                <!-- Database Metrics Counter Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Active Services</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= count($all_services) ?></span>
                        <span class="text-[10px] text-cyan-400 font-medium">100% Dynamic CMS</span>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Applicants</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= $stats['careers'] ?? 0 ?></span>
                        <span class="text-[10px] text-emerald-400 font-medium">Resumes Protected</span>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Direct Inquiries</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= $stats['contacts'] ?? 0 ?></span>
                        <span class="text-[10px] text-blue-400 font-medium">Contact Messages</span>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Quotations</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= $stats['quotations'] ?? 0 ?></span>
                        <span class="text-[10px] text-indigo-400 font-medium">Commercial Scopes</span>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Strategy Calls</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= $stats['consultations'] ?? 0 ?></span>
                        <span class="text-[10px] text-purple-400 font-medium">Booked Sessions</span>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-1 text-left">
                        <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Managed Pages</span>
                        <span class="text-2xl font-black text-white font-heading block"><?= count($all_pages) ?></span>
                        <span class="text-[10px] text-amber-400 font-medium">Full SEO Metadata</span>
                    </div>
                </div>

                <!-- Quick Action Hub -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 text-left">
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="cpu" class="w-4 h-4 text-cyan-400"></i>
                            <span>Services & Core Practice</span>
                        </h3>
                        <div class="space-y-2">
                            <button onclick="switchTab('services')" class="w-full py-2.5 px-4 rounded-xl border border-slate-800 hover:border-cyan-500 hover:bg-slate-800/80 text-xs font-semibold text-slate-300 flex items-center justify-between transition-colors">
                                <span>Manage All 5 Core Services & Workflows</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                            </button>
                            <button onclick="openNewServiceModal()" class="w-full py-2.5 px-4 rounded-xl bg-cyan-600/20 text-cyan-300 border border-cyan-500/30 hover:bg-cyan-600/30 text-xs font-semibold flex items-center justify-between transition-colors">
                                <span>+ Add New Enterprise Service</span>
                                <i data-lucide="plus" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-400"></i>
                            <span>Talent & Submissions</span>
                        </h3>
                        <div class="space-y-2">
                            <button onclick="switchTab('careers')" class="w-full py-2.5 px-4 rounded-xl border border-slate-800 hover:border-emerald-500 hover:bg-slate-800/80 text-xs font-semibold text-slate-300 flex items-center justify-between transition-colors">
                                <span>Review Candidate Applications</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                            </button>
                            <button onclick="switchTab('inquiries')" class="w-full py-2.5 px-4 rounded-xl border border-slate-800 hover:border-blue-500 hover:bg-slate-800/80 text-xs font-semibold text-slate-300 flex items-center justify-between transition-colors">
                                <span>Manage Inquiries & Quote Requests</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="globe" class="w-4 h-4 text-purple-400"></i>
                            <span>SEO & Global Controls</span>
                        </h3>
                        <div class="space-y-2">
                            <button onclick="switchTab('seo')" class="w-full py-2.5 px-4 rounded-xl border border-slate-800 hover:border-purple-500 hover:bg-slate-800/80 text-xs font-semibold text-slate-300 flex items-center justify-between transition-colors">
                                <span>Per-Page SEO & Social Sharing Tags</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                            </button>
                            <button onclick="switchTab('settings')" class="w-full py-2.5 px-4 rounded-xl border border-slate-800 hover:border-amber-500 hover:bg-slate-800/80 text-xs font-semibold text-slate-300 flex items-center justify-between transition-colors">
                                <span>Maintenance Mode & Announcement Bar</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-500"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Timeline -->
                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4 text-left">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                        <h3 class="text-sm font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="activity" class="w-4 h-4 text-blue-400"></i>
                            <span>Recent Submissions & Activity</span>
                        </h3>
                        <button onclick="switchTab('logs')" class="text-xs text-cyan-400 hover:underline">View Full Audit Trail</button>
                    </div>

                    <div class="divide-y divide-slate-800/60">
                        <?php if (empty($stats['recent_activities'])): ?>
                            <p class="py-4 text-xs text-slate-500 text-center">No recent submissions recorded yet.</p>
                        <?php else: ?>
                            <?php foreach ($stats['recent_activities'] as $act): ?>
                                <div class="py-3 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full <?= $act['type'] === 'contact' ? 'bg-blue-400' : ($act['type'] === 'quotation' ? 'bg-indigo-400' : 'bg-emerald-400') ?>"></span>
                                        <div>
                                            <p class="text-xs font-semibold text-white">
                                                <?= htmlspecialchars($act['name'] ?? 'Inquiry') ?>
                                                <span class="text-slate-400 font-normal">submitted a</span>
                                                <span class="font-bold uppercase text-[10px] px-1.5 py-0.5 rounded <?= $act['type'] === 'contact' ? 'bg-blue-500/10 text-blue-400' : ($act['type'] === 'quotation' ? 'bg-indigo-500/10 text-indigo-400' : 'bg-emerald-500/10 text-emerald-400') ?>"><?= htmlspecialchars($act['type']) ?></span>
                                            </p>
                                            <p class="text-[11px] text-slate-500 font-mono"><?= htmlspecialchars($act['email'] ?? '') ?></p>
                                        </div>
                                    </div>
                                    <span class="text-[11px] text-slate-500 font-mono"><?= date('M d, H:i', strtotime($act['created_at'] ?? 'now')) ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 2: SERVICES MANAGEMENT (PART 2)                            -->
            <!-- ============================================================== -->
            <div id="tabContent-services" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="cpu" class="w-5 h-5 text-cyan-400"></i>
                            <span>Enterprise Services Management</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Manage all five core services, add future offerings, edit technical concepts, workflows, applications, and CTA buttons.
                        </p>
                    </div>
                    <button onclick="openNewServiceModal()" class="px-4 py-2 rounded-xl bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-bold flex items-center gap-2 transition-colors self-start shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>Add New Service</span>
                    </button>
                </div>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($all_services as $srv): 
                        $srv_content = $srv['content'] ?? [];
                    ?>
                        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 hover:border-slate-700 shadow-sm flex flex-col justify-between space-y-4 transition-all">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase bg-blue-500/10 text-cyan-300 border border-blue-500/20">
                                        <?= htmlspecialchars($srv['badge'] ?? 'Enterprise Practice') ?>
                                    </span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold font-mono <?= !empty($srv['is_active']) ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-slate-800 text-slate-500' ?>">
                                        <?= !empty($srv['is_active']) ? '● ACTIVE' : '○ HIDDEN' ?>
                                    </span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-600/20 text-cyan-400 border border-blue-500/30 flex items-center justify-center font-bold">
                                        <i data-lucide="<?= htmlspecialchars($srv['icon'] ?? 'layers') ?>" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-bold text-white font-heading"><?= htmlspecialchars($srv['title']) ?></h3>
                                        <span class="text-[11px] font-mono text-slate-400">Slug: /<?= htmlspecialchars($srv['slug']) ?></span>
                                    </div>
                                </div>

                                <p class="text-xs text-slate-300 line-clamp-3 leading-relaxed">
                                    <?= htmlspecialchars($srv['short_desc'] ?? '') ?>
                                </p>

                                <div class="pt-2 border-t border-slate-800 text-[11px] text-slate-400 flex items-center justify-between">
                                    <span>Concepts: <?= count($srv_content['core_concepts'] ?? []) ?></span>
                                    <span>Workflows: <?= count($srv_content['workflow'] ?? []) ?></span>
                                    <span>Use Cases: <?= count($srv_content['applications'] ?? []) ?></span>
                                </div>
                            </div>

                            <div class="pt-3 border-t border-slate-800 flex items-center gap-2">
                                <button onclick="editService('<?= htmlspecialchars($srv['slug']) ?>')" 
                                        class="flex-1 py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center justify-center gap-1.5 transition-colors">
                                    <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                    <span>Edit Service</span>
                                </button>
                                <a href="<?= htmlspecialchars($srv['slug']) ?>.php" target="_blank" 
                                   class="p-2 rounded-xl border border-slate-800 hover:bg-slate-800 text-slate-400 hover:text-white transition-colors" title="View Public Page">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                </a>
                                <?php if (!in_array($srv['slug'], ['ai-automation', 'software-development', 'saas-development', 'data-annotation', 'bpo-services'])): ?>
                                <button onclick="deleteService('<?= htmlspecialchars($srv['slug']) ?>')" 
                                        class="p-2 rounded-xl border border-slate-800 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors" title="Delete Service">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 3: CAREERS & INTERNSHIPS MANAGEMENT (PART 2)               -->
            <!-- ============================================================== -->
            <div id="tabContent-careers" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="graduation-cap" class="w-5 h-5 text-emerald-400"></i>
                            <span>Careers & Internship Management</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Manage technical openings, review confidential candidate submissions, download resumes, update applicant statuses, and export to CSV.
                        </p>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <button onclick="exportApplicationsCsv()" class="px-3.5 py-2 rounded-xl border border-emerald-500/40 bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-300 text-xs font-bold flex items-center gap-1.5 transition-colors">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            <span>Export CSV</span>
                        </button>
                        <button onclick="openNewOpportunityModal()" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold flex items-center gap-1.5 transition-colors shadow-md">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            <span>+ Add Opportunity</span>
                        </button>
                    </div>
                </div>

                <!-- Sub-Navigation Toggle: Opportunities vs Applications -->
                <div class="flex items-center gap-3 border-b border-slate-800 pb-2 text-xs font-bold">
                    <button id="careerSubTabBtn-apps" onclick="switchCareerSubTab('apps')" class="px-4 py-2 rounded-xl bg-blue-600 text-white">
                        <span>Candidate Applications (<?= $stats['careers'] ?? 0 ?>)</span>
                    </button>
                    <button id="careerSubTabBtn-opps" onclick="switchCareerSubTab('opps')" class="px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white">
                        <span>Manage Openings (<?= count($all_opportunities) ?>)</span>
                    </button>
                </div>

                <!-- Section A: Candidate Applications Table -->
                <div id="careerSection-apps" class="space-y-4">
                    <!-- Filters Bar -->
                    <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs">
                        <div class="flex items-center gap-3 flex-1 min-w-[260px]">
                            <div class="relative w-full">
                                <i data-lucide="search" class="w-4 h-4 text-slate-500 absolute left-3 top-2.5"></i>
                                <input type="text" id="appSearchInput" onkeyup="filterApplications()" placeholder="Filter candidate name, email, or phone..."
                                       class="w-full pl-9 pr-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <select id="appStatusFilter" onchange="filterApplications()" class="px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-200">
                                <option value="all">All Statuses</option>
                                <option value="New">New</option>
                                <option value="Under Review">Under Review</option>
                                <option value="Shortlisted">Shortlisted</option>
                                <option value="Selected">Selected</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                    </div>

                    <!-- Applications Data Table -->
                    <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs text-slate-300">
                                <thead class="bg-slate-950 text-slate-400 uppercase font-mono text-[11px] border-b border-slate-800">
                                    <tr>
                                        <th class="p-4">ID / Applied</th>
                                        <th class="p-4">Candidate</th>
                                        <th class="p-4">Target Role</th>
                                        <th class="p-4">Education</th>
                                        <th class="p-4">Resume File</th>
                                        <th class="p-4">Status</th>
                                        <th class="p-4 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="applicationsTableBody" class="divide-y divide-slate-800/60 font-sans">
                                    <tr>
                                        <td colspan="7" class="p-6 text-center text-slate-500">Loading candidate records...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Section B: Manage Openings Cards -->
                <div id="careerSection-opps" class="hidden space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($all_opportunities as $opp): ?>
                            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 hover:border-slate-700 shadow-sm flex flex-col justify-between space-y-4">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-emerald-500/10 text-emerald-300 border border-emerald-500/20">
                                            <?= htmlspecialchars($opp['type'] ?? 'Internship') ?>
                                        </span>
                                        <span class="text-[10px] font-mono <?= !empty($opp['is_active']) ? 'text-emerald-400' : 'text-slate-500' ?>">
                                            <?= !empty($opp['is_active']) ? '● ACTIVE' : '○ DISABLED' ?>
                                        </span>
                                    </div>
                                    <h3 class="text-base font-bold text-white font-heading"><?= htmlspecialchars($opp['title']) ?></h3>
                                    <p class="text-xs text-slate-400 line-clamp-2"><?= htmlspecialchars($opp['description'] ?? '') ?></p>
                                    <div class="text-[11px] text-slate-400 space-y-1">
                                        <div><strong>Duration:</strong> <?= htmlspecialchars($opp['duration'] ?? '3 - 6 Months') ?></div>
                                        <div><strong>Department:</strong> <?= htmlspecialchars($opp['department'] ?? 'Engineering') ?></div>
                                        <div><strong>Stipend:</strong> <?= htmlspecialchars($opp['stipend'] ?? 'Performance-based') ?></div>
                                    </div>
                                </div>
                                <div class="pt-3 border-t border-slate-800 flex items-center gap-2">
                                    <button onclick="editOpportunity('<?= htmlspecialchars($opp['slug']) ?>')" class="flex-1 py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center justify-center gap-1.5">
                                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                        <span>Edit Role</span>
                                    </button>
                                    <button onclick="deleteOpportunity('<?= htmlspecialchars($opp['slug']) ?>')" class="p-2 rounded-xl border border-slate-800 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 4: INQUIRIES & LEADS MANAGEMENT (PART 2)                   -->
            <!-- ============================================================== -->
            <div id="tabContent-inquiries" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="inbox" class="w-5 h-5 text-blue-400"></i>
                            <span>Inquiries & Client Submissions</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Track and manage incoming client advisory messages, commercial quotation requests, and booked strategy sessions.
                        </p>
                    </div>
                    <button onclick="exportInquiriesCsv()" class="px-4 py-2 rounded-xl border border-blue-500/40 bg-blue-500/10 hover:bg-blue-500/20 text-cyan-300 text-xs font-bold flex items-center gap-1.5 transition-colors self-start shadow-md">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Export CSV Report</span>
                    </button>
                </div>

                <!-- Sub-Tabs for Inquiries -->
                <div class="flex items-center gap-2 border-b border-slate-800 pb-2 text-xs font-bold">
                    <button id="inquirySubTabBtn-contact" onclick="switchInquirySubTab('contact')" class="px-4 py-2 rounded-xl bg-blue-600 text-white">
                        <span>Contact Messages (<?= $stats['contacts'] ?? 0 ?>)</span>
                    </button>
                    <button id="inquirySubTabBtn-quotation" onclick="switchInquirySubTab('quotation')" class="px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white">
                        <span>Quotation Requests (<?= $stats['quotations'] ?? 0 ?>)</span>
                    </button>
                    <button id="inquirySubTabBtn-consultation" onclick="switchInquirySubTab('consultation')" class="px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white">
                        <span>Strategy Sessions (<?= $stats['consultations'] ?? 0 ?>)</span>
                    </button>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-slate-300">
                            <thead class="bg-slate-950 text-slate-400 uppercase font-mono text-[11px] border-b border-slate-800">
                                <tr>
                                    <th class="p-4">ID & Date</th>
                                    <th class="p-4">Client Name</th>
                                    <th class="p-4">Contact Info</th>
                                    <th class="p-4">Scope / Requirements</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="inquiriesTableBody" class="divide-y divide-slate-800/60 font-sans">
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-slate-500">Loading inquiry records...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 5: FORM FIELD MANAGER (PART 2)                             -->
            <!-- ============================================================== -->
            <div id="tabContent-forms" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="form-input" class="w-5 h-5 text-indigo-400"></i>
                        <span>Centralized Forms Management</span>
                    </h2>
                    <p class="text-xs text-slate-400">
                        Configure form fields, customize required/optional validations, change recipient emails, and update feedback messages.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($all_forms as $frm): 
                        $fields = $frm['fields'] ?? [];
                    ?>
                        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase bg-indigo-500/10 text-indigo-300 border border-indigo-500/20">
                                    <?= htmlspecialchars($frm['form_key']) ?>
                                </span>
                                <span class="text-[10px] font-mono <?= !empty($frm['is_enabled']) ? 'text-emerald-400' : 'text-slate-500' ?>">
                                    <?= !empty($frm['is_enabled']) ? '● ACTIVE' : '○ DISABLED' ?>
                                </span>
                            </div>

                            <div>
                                <h3 class="text-base font-bold text-white font-heading"><?= htmlspecialchars($frm['form_title']) ?></h3>
                                <p class="text-xs text-slate-400 mt-1">Recipient: <span class="text-cyan-400 font-mono"><?= htmlspecialchars($frm['recipient_email'] ?? '') ?></span></p>
                            </div>

                            <div class="p-3 rounded-xl bg-slate-950 border border-slate-800/80 text-xs space-y-1.5">
                                <span class="text-[10px] font-mono uppercase text-slate-500 font-bold block">Active Fields (<?= count($fields) ?>)</span>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ($fields as $fld): ?>
                                        <span class="px-2 py-0.5 rounded text-[11px] bg-slate-800 text-slate-300 font-mono">
                                            <?= htmlspecialchars($fld['label'] ?? $fld['name']) ?><?= !empty($fld['required']) ? '*' : '' ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button onclick="editFormConfig('<?= htmlspecialchars($frm['form_key']) ?>')" class="w-full py-2.5 px-4 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                                    <i data-lucide="sliders" class="w-3.5 h-3.5"></i>
                                    <span>Configure Fields & Notifications</span>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 6: EMAIL TEMPLATES & SMTP (PART 2)                         -->
            <!-- ============================================================== -->
            <div id="tabContent-emails" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="mail" class="w-5 h-5 text-cyan-400"></i>
                        <span>Email Notification Templates & SMTP Governance</span>
                    </h2>
                    <p class="text-xs text-slate-400">
                        Customize applicant auto-confirmations, company notifications, and inquiry receipts with dynamic template variables.
                    </p>
                </div>

                <!-- SMTP Security Badge -->
                <div class="p-4 rounded-2xl bg-slate-900 border border-emerald-500/30 text-xs flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></div>
                        <div>
                            <p class="text-white font-bold">Hostinger SMTP Gateway: Active & Encrypted</p>
                            <p class="text-slate-400 text-[11px]">SMTP credentials remain securely protected in server environment variables (.env) and are never exposed in browser code.</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-mono bg-emerald-500/20 text-emerald-300 font-bold">TLS 1.3 SECURED</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($all_templates as $tmpl): ?>
                        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-mono font-bold uppercase bg-cyan-500/10 text-cyan-300 border border-cyan-500/20">
                                    <?= htmlspecialchars($tmpl['template_key']) ?>
                                </span>
                                <span class="text-[10px] font-mono <?= !empty($tmpl['is_active']) ? 'text-emerald-400' : 'text-slate-500' ?>">
                                    <?= !empty($tmpl['is_active']) ? '● ACTIVE' : '○ DISABLED' ?>
                                </span>
                            </div>

                            <div>
                                <h3 class="text-base font-bold text-white font-heading"><?= htmlspecialchars($tmpl['template_name']) ?></h3>
                                <p class="text-xs text-slate-300 mt-1 font-mono">Subject: <span class="text-cyan-400"><?= htmlspecialchars($tmpl['subject']) ?></span></p>
                            </div>

                            <div class="p-3 rounded-xl bg-slate-950 border border-slate-800 text-[11px] text-slate-400 line-clamp-3 font-mono">
                                <?= strip_tags($tmpl['body_html'] ?? '') ?>
                            </div>

                            <button onclick="editEmailTemplate('<?= htmlspecialchars($tmpl['template_key']) ?>')" class="w-full py-2.5 px-4 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                <span>Edit Subject, Body & Variables</span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 7: TESTIMONIALS & REVIEWS (PART 2)                         -->
            <!-- ============================================================== -->
            <div id="tabContent-testimonials" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="star" class="w-5 h-5 text-amber-400"></i>
                            <span>Testimonials & Client Endorsements</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Manage genuine client testimonials and corporate case study reviews. Unverified third-party badges are never displayed.
                        </p>
                    </div>
                    <button onclick="openNewTestimonialModal()" class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold flex items-center gap-1.5 transition-colors self-start shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>+ Add Testimonial</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($all_testimonials as $t): ?>
                        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm flex flex-col justify-between space-y-4">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-amber-400">
                                        <?php for ($i=0; $i < (int)($t['rating'] ?? 5); $i++): ?>
                                            <i data-lucide="star" class="w-3.5 h-3.5 fill-current"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="text-[10px] font-mono <?= !empty($t['is_published']) ? 'text-emerald-400' : 'text-slate-500' ?>">
                                        <?= !empty($t['is_published']) ? '● PUBLISHED' : '○ DRAFT' ?>
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300 italic leading-relaxed line-clamp-4">
                                    &ldquo;<?= htmlspecialchars($t['review_text'] ?? '') ?>&rdquo;
                                </p>
                                <div class="pt-2 border-t border-slate-800">
                                    <p class="text-xs font-bold text-white"><?= htmlspecialchars($t['client_name'] ?? '') ?></p>
                                    <p class="text-[11px] text-slate-400"><?= htmlspecialchars($t['client_title'] ?? '') ?>, <?= htmlspecialchars($t['client_company'] ?? '') ?></p>
                                    <span class="text-[10px] font-mono text-cyan-400"><?= htmlspecialchars($t['project_type'] ?? '') ?></span>
                                </div>
                            </div>
                            <div class="pt-3 border-t border-slate-800 flex items-center gap-2">
                                <button onclick="editTestimonial(<?= (int)$t['id'] ?>)" class="flex-1 py-1.5 px-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-semibold flex items-center justify-center gap-1.5">
                                    <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                    <span>Edit</span>
                                </button>
                                <button onclick="deleteTestimonial(<?= (int)$t['id'] ?>)" class="p-2 rounded-xl border border-slate-800 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 8: BLOG & ARTICLES (PART 2 - OPTIONAL)                     -->
            <!-- ============================================================== -->
            <div id="tabContent-blog" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="newspaper" class="w-5 h-5 text-purple-400"></i>
                            <span>Blog & Technical Articles Management</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Draft and publish engineering articles and technical insights. (Blog remains unforced on public website unless enabled in settings).
                        </p>
                    </div>
                    <button onclick="openNewArticleModal()" class="px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 text-white text-xs font-bold flex items-center gap-1.5 transition-colors self-start shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        <span>+ New Article</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($all_articles as $art): ?>
                        <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="px-2.5 py-0.5 rounded text-[10px] font-mono bg-purple-500/10 text-purple-300 border border-purple-500/20">
                                    <?= htmlspecialchars($art['category'] ?? 'Technology') ?>
                                </span>
                                <span class="text-[10px] font-mono <?= ($art['status'] ?? 'draft') === 'published' ? 'text-emerald-400' : 'text-amber-400' ?>">
                                    ● <?= strtoupper($art['status'] ?? 'draft') ?>
                                </span>
                            </div>
                            <h3 class="text-base font-bold text-white font-heading"><?= htmlspecialchars($art['title']) ?></h3>
                            <p class="text-xs text-slate-400 line-clamp-2"><?= htmlspecialchars($art['summary'] ?? '') ?></p>
                            <div class="text-[11px] text-slate-500 font-mono">Author: <?= htmlspecialchars($art['author'] ?? 'NextTechX Editorial') ?></div>
                            <div class="pt-3 border-t border-slate-800 flex items-center gap-2">
                                <button onclick="editArticle('<?= htmlspecialchars($art['slug']) ?>')" class="flex-1 py-1.5 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                                    Edit Article
                                </button>
                                <button onclick="deleteArticle('<?= htmlspecialchars($art['slug']) ?>')" class="p-2 rounded-xl border border-slate-800 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 9: SEO & SITEMAP MANAGEMENT (PART 2)                       -->
            <!-- ============================================================== -->
            <div id="tabContent-seo" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="globe" class="w-5 h-5 text-emerald-400"></i>
                            <span>Page-Wise SEO & Open Graph Metadata</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Configure page titles, meta descriptions, Open Graph social share tags, search indexing robots directives, and XML sitemaps.
                        </p>
                    </div>
                    <a href="api/cms.php?action=sitemap_xml" target="_blank" class="px-4 py-2 rounded-xl border border-emerald-500/40 bg-emerald-500/10 text-emerald-300 text-xs font-bold flex items-center gap-1.5 hover:bg-emerald-500/20 transition-colors self-start">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>View Live sitemap.xml</span>
                    </a>
                </div>

                <!-- Page Selector -->
                <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Select Page to Manage SEO</label>
                        <select id="seoPageSelector" onchange="loadPageSeo(this.value)" class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:ring-2 focus:ring-blue-600">
                            <?php foreach ($all_pages as $p): ?>
                                <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?> (<?= htmlspecialchars($p['slug']) ?>.php)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- SEO Fields Form -->
                    <form id="seoForm" onsubmit="savePageSeo(event)" class="space-y-4 pt-3 border-t border-slate-800">
                        <input type="hidden" id="seoCurrentSlug" name="slug" value="home">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">SEO Page Title (Title Tag)</label>
                                <input type="text" id="seoMetaTitle" name="meta_title" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Keywords (Comma Separated)</label>
                                <input type="text" id="seoKeywords" name="keywords" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Meta Description</label>
                            <textarea id="seoMetaDescription" name="meta_description" rows="2" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Open Graph (OG) Title</label>
                                <input type="text" id="seoOgTitle" name="og_title" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Social Share Image URL (OG Image)</label>
                                <input type="text" id="seoOgImage" name="og_image" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Robots Index</label>
                                <select id="seoRobotsIndex" name="robots_index" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                                    <option value="1">Index (Permit Search Engines)</option>
                                    <option value="0">Noindex (Hide From Search)</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Robots Follow</label>
                                <select id="seoRobotsFollow" name="robots_follow" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                                    <option value="1">Follow (Crawl Links)</option>
                                    <option value="0">Nofollow (Do Not Follow)</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Sitemap Priority</label>
                                <select id="seoSitemapPriority" name="sitemap_priority" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                                    <option value="1.0">1.0 (Highest)</option>
                                    <option value="0.9">0.9</option>
                                    <option value="0.8">0.8 (Standard)</option>
                                    <option value="0.5">0.5</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-300">Change Frequency</label>
                                <select id="seoSitemapChangefreq" name="sitemap_changefreq" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                        </div>

                        <div class="pt-2 flex justify-end">
                            <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center gap-2 shadow-md">
                                <i data-lucide="check" class="w-4 h-4"></i>
                                <span>Save SEO Configuration</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 10: AI CHATBOT MANAGEMENT (PART 2)                         -->
            <!-- ============================================================== -->
            <div id="tabContent-chatbot" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="bot" class="w-5 h-5 text-rose-400"></i>
                        <span>AI Chatbot Configuration & Knowledge Sources</span>
                    </h2>
                    <p class="text-xs text-slate-400">
                        Manage assistant personality, welcome greetings, knowledge sources, and language settings without exposing backend API keys.
                    </p>
                </div>

                <form id="chatbotForm" onsubmit="saveChatbotConfig(event)" class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-5">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                        <div>
                            <p class="text-xs font-bold text-white uppercase tracking-wider">AI Chatbot Operational Status</p>
                            <p class="text-xs text-slate-400">Toggle public availability of the conversational assistant on the website.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="chatbotEnabled" name="enabled" value="1" <?= !empty($chatbot_cfg['enabled']) ? 'checked' : '' ?> class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Bot Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($chatbot_cfg['name'] ?? 'NextTechX AI Assistant') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Supported Languages</label>
                            <input type="text" name="languages" value="<?= htmlspecialchars($chatbot_cfg['languages'] ?? 'English, Hindi, Marathi, Spanish, German, French') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">Welcome Message (Initial Greeting)</label>
                        <textarea name="welcome_message" rows="2" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium"><?= htmlspecialchars($chatbot_cfg['welcome_message'] ?? '') ?></textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">System Prompt & Behavioral Instructions</label>
                        <textarea name="system_prompt" rows="4" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono"><?= htmlspecialchars($chatbot_cfg['system_prompt'] ?? '') ?></textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">Website Knowledge Sources</label>
                        <input type="text" name="knowledge_sources" value="<?= htmlspecialchars($chatbot_cfg['knowledge_sources'] ?? 'Website Services, Company FAQs, Internship Details, Case Studies') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                    </div>

                    <div class="pt-3 border-t border-slate-800 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold flex items-center gap-2 shadow-md">
                            <i data-lucide="check" class="w-4 h-4"></i>
                            <span>Save Chatbot Configuration</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 11: ADMIN USERS & RBAC (PART 2)                            -->
            <!-- ============================================================== -->
            <?php if ($current_role === 'super_admin'): ?>
            <div id="tabContent-users" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="user-check" class="w-5 h-5 text-purple-400"></i>
                            <span>Admin Users & Role-Based Access Control</span>
                        </h2>
                        <p class="text-xs text-slate-400">
                            Manage authorized administrators and permissions (Super Admin, Content Manager, Application Manager).
                        </p>
                    </div>
                    <button onclick="openNewUserModal()" class="px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 text-white text-xs font-bold flex items-center gap-1.5 transition-colors self-start shadow-md">
                        <i data-lucide="user-plus" class="w-4 h-4"></i>
                        <span>+ Add New User</span>
                    </button>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-slate-300">
                            <thead class="bg-slate-950 text-slate-400 uppercase font-mono text-[11px] border-b border-slate-800">
                                <tr>
                                    <th class="p-4">ID</th>
                                    <th class="p-4">Username</th>
                                    <th class="p-4">Full Name</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4">Role</th>
                                    <th class="p-4">Last Login</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60 font-sans">
                                <?php foreach ($admin_users as $u): ?>
                                    <tr class="hover:bg-slate-800/40">
                                        <td class="p-4 font-mono"><?= $u['id'] ?></td>
                                        <td class="p-4 font-bold text-white"><?= htmlspecialchars($u['username']) ?></td>
                                        <td class="p-4"><?= htmlspecialchars($u['full_name'] ?? '—') ?></td>
                                        <td class="p-4 font-mono text-cyan-400"><?= htmlspecialchars($u['email']) ?></td>
                                        <td class="p-4">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase <?= $u['role'] === 'super_admin' ? 'bg-purple-500/20 text-purple-300' : ($u['role'] === 'content_manager' ? 'bg-blue-500/20 text-blue-300' : 'bg-emerald-500/20 text-emerald-300') ?>">
                                                <?= htmlspecialchars($u['role']) ?>
                                            </span>
                                        </td>
                                        <td class="p-4 text-slate-400 font-mono text-[11px]"><?= $u['last_login'] ? date('M d, H:i', strtotime($u['last_login'])) : 'Never' ?></td>
                                        <td class="p-4 text-right">
                                            <?php if ($u['id'] != 1): ?>
                                                <button onclick="deleteAdminUser(<?= (int)$u['id'] ?>)" class="p-1.5 rounded-lg border border-slate-800 text-rose-400 hover:bg-rose-500/10" title="Delete User">
                                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                                </button>
                                            <?php else: ?>
                                                <span class="text-[10px] text-slate-500 font-mono">Protected</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- ============================================================== -->
            <!-- TAB 12: ACTIVITY AUDIT LOGS (PART 2)                           -->
            <!-- ============================================================== -->
            <div id="tabContent-logs" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="activity" class="w-5 h-5 text-amber-400"></i>
                        <span>System Activity Audit Trail</span>
                    </h2>
                    <p class="text-xs text-slate-400">
                        Immutable timestamped audit records tracking administrative modifications, status changes, and publications.
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-slate-300">
                            <thead class="bg-slate-950 text-slate-400 uppercase font-mono text-[11px] border-b border-slate-800">
                                <tr>
                                    <th class="p-4">Timestamp</th>
                                    <th class="p-4">User</th>
                                    <th class="p-4">Action</th>
                                    <th class="p-4">Entity</th>
                                    <th class="p-4">IP Address</th>
                                    <th class="p-4">Details</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60 font-sans">
                                <?php foreach ($activity_logs as $lg): ?>
                                    <tr class="hover:bg-slate-800/40">
                                        <td class="p-4 font-mono text-[11px] text-slate-400"><?= htmlspecialchars($lg['created_at']) ?></td>
                                        <td class="p-4 font-bold text-white"><?= htmlspecialchars($lg['username']) ?></td>
                                        <td class="p-4 font-mono text-cyan-400"><?= htmlspecialchars($lg['action']) ?></td>
                                        <td class="p-4 font-mono text-slate-300"><?= htmlspecialchars($lg['entity_type'] ?? '') ?>:<?= htmlspecialchars($lg['entity_id'] ?? '') ?></td>
                                        <td class="p-4 font-mono text-[11px] text-slate-500"><?= htmlspecialchars($lg['ip_address'] ?? '127.0.0.1') ?></td>
                                        <td class="p-4 text-slate-300"><?= htmlspecialchars($lg['details'] ?? '') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 13: PAGES & SECTIONS (PART 1)                              -->
            <!-- ============================================================== -->
            <div id="tabContent-pages" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="file-text" class="w-5 h-5 text-blue-400"></i>
                        <span>Website Pages Directory (14 Managed Routes)</span>
                    </h2>
                    <p class="text-xs text-slate-400">Centralized control over all public pages, section layouts, and content blocks.</p>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-slate-300">
                            <thead class="bg-slate-950 text-slate-400 uppercase font-mono text-[11px] border-b border-slate-800">
                                <tr>
                                    <th class="p-4">Page Title</th>
                                    <th class="p-4">Route / Slug</th>
                                    <th class="p-4">Template</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60 font-sans">
                                <?php foreach ($all_pages as $page): ?>
                                    <tr class="hover:bg-slate-800/40">
                                        <td class="p-4 font-bold text-white"><?= htmlspecialchars($page['title']) ?></td>
                                        <td class="p-4 font-mono text-cyan-400">/<?= htmlspecialchars($page['slug']) ?>.php</td>
                                        <td class="p-4 font-mono text-slate-400"><?= htmlspecialchars($page['template'] ?? 'default') ?></td>
                                        <td class="p-4">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-mono uppercase bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                                <?= htmlspecialchars($page['status'] ?? 'published') ?>
                                            </span>
                                        </td>
                                        <td class="p-4 text-right space-x-2">
                                            <a href="<?= htmlspecialchars($page['slug'] === 'home' ? 'index.php' : $page['slug'] . '.php') ?>" target="_blank" class="p-1.5 rounded-lg border border-slate-800 text-slate-400 hover:text-white inline-flex" title="View Page">
                                                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                            </a>
                                            <button onclick="editPageSeoDirect('<?= htmlspecialchars($page['slug']) ?>')" class="py-1 px-2.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-cyan-300 text-[11px] font-semibold">
                                                SEO
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 14: HOMEPAGE SECTIONS (PART 1)                             -->
            <!-- ============================================================== -->
            <div id="tabContent-homepage" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="home" class="w-5 h-5 text-blue-400"></i>
                        <span>Homepage Sections & Dynamic Banners</span>
                    </h2>
                    <p class="text-xs text-slate-400">Manage Hero headlines, sub-headlines, badges, stats, and call-to-action sections.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Hero Section Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono uppercase bg-blue-500/10 text-blue-400 font-bold">Section: hero</span>
                        <h3 class="text-base font-bold text-white font-heading">Hero Banner & Dynamic Headline</h3>
                        <p class="text-xs text-slate-400">Manage headline badge, corporate title, sub-description, and primary button labels.</p>
                        <button onclick="openSectionEditor('home', 'hero')" class="w-full py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Edit Hero Section
                        </button>
                    </div>

                    <!-- Why Choose Us Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono uppercase bg-indigo-500/10 text-indigo-400 font-bold">Section: why_choose_us</span>
                        <h3 class="text-base font-bold text-white font-heading">Why Choose Us Pillars</h3>
                        <p class="text-xs text-slate-400">Manage value proposition points, SLA guarantees, and enterprise security highlights.</p>
                        <button onclick="openSectionEditor('home', 'why_choose_us')" class="w-full py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Edit Pillars Section
                        </button>
                    </div>

                    <!-- CTA Banner Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono uppercase bg-emerald-500/10 text-emerald-400 font-bold">Section: cta_banner</span>
                        <h3 class="text-base font-bold text-white font-heading">Global Closing Call-To-Action</h3>
                        <p class="text-xs text-slate-400">Manage bottom banner title, descriptive copy, and consultation button link.</p>
                        <button onclick="openSectionEditor('home', 'cta_banner')" class="w-full py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Edit CTA Banner
                        </button>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 15: ABOUT US CMS (PART 1)                                  -->
            <!-- ============================================================== -->
            <div id="tabContent-about" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="users" class="w-5 h-5 text-blue-400"></i>
                        <span>About Us CMS & Corporate Identity</span>
                    </h2>
                    <p class="text-xs text-slate-400">Edit company background, mission statement, executive vision, and core corporate values.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono uppercase bg-blue-500/10 text-blue-400 font-bold">Section: mission_vision</span>
                        <h3 class="text-base font-bold text-white font-heading">Mission & Vision Statements</h3>
                        <button onclick="openSectionEditor('about', 'mission_vision')" class="w-full py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Edit Mission & Vision
                        </button>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 shadow-sm space-y-3">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-mono uppercase bg-purple-500/10 text-purple-400 font-bold">Section: core_values</span>
                        <h3 class="text-base font-bold text-white font-heading">Core Engineering Values</h3>
                        <button onclick="openSectionEditor('about', 'core_values')" class="w-full py-2 px-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Edit Core Values
                        </button>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 16: HEADER & NAVIGATION (PART 1)                           -->
            <!-- ============================================================== -->
            <div id="tabContent-navigation" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="menu" class="w-5 h-5 text-blue-400"></i>
                        <span>Header Menu Navigation</span>
                    </h2>
                    <p class="text-xs text-slate-400">Reorder links, toggle visibility, and update menu destination paths.</p>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-slate-800 p-6 space-y-4">
                    <div class="divide-y divide-slate-800/80">
                        <?php foreach ($nav_items as $item): ?>
                            <div class="py-3 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="grip-vertical" class="w-4 h-4 text-slate-600"></i>
                                    <div>
                                        <span class="font-bold text-xs text-white"><?= htmlspecialchars($item['label']) ?></span>
                                        <span class="text-[11px] font-mono text-cyan-400 ml-2"><?= htmlspecialchars($item['url']) ?></span>
                                    </div>
                                </div>
                                <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-emerald-500/10 text-emerald-400">ACTIVE</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 17: APPEARANCE & THEMES (PART 1)                           -->
            <!-- ============================================================== -->
            <div id="tabContent-appearance" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="palette" class="w-5 h-5 text-blue-400"></i>
                        <span>Website Appearance & Themes</span>
                    </h2>
                    <p class="text-xs text-slate-400">Configure global color tokens, typography scales, and navbar styling.</p>
                </div>

                <form id="appearanceForm" onsubmit="saveAppearanceSettings(event)" class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Primary Brand Color</label>
                            <input type="text" name="primary_color" value="<?= htmlspecialchars($appearance_settings['primary_color'] ?? '#2563eb') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Accent Cyan Color</label>
                            <input type="text" name="accent_color" value="<?= htmlspecialchars($appearance_settings['accent_color'] ?? '#06b6d4') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                        </div>
                    </div>
                    <div class="pt-2 flex justify-end">
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Save Appearance
                        </button>
                    </div>
                </form>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 18: MEDIA LIBRARY (PART 1 & 2)                             -->
            <!-- ============================================================== -->
            <div id="tabContent-media" class="hidden space-y-6 text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                            <i data-lucide="image" class="w-5 h-5 text-blue-400"></i>
                            <span>Centralized Media Library</span>
                        </h2>
                        <p class="text-xs text-slate-400">Upload images, icons, and documents. Copy relative URLs directly for CMS insertion.</p>
                    </div>
                </div>

                <!-- Drag & Drop Upload Zone -->
                <div class="p-8 rounded-2xl bg-slate-900 border-2 border-dashed border-slate-800 hover:border-blue-500/50 transition-colors text-center space-y-3 cursor-pointer" onclick="document.getElementById('mediaFileInput').click()">
                    <input type="file" id="mediaFileInput" onchange="handleMediaUpload(this)" class="hidden" accept=".png,.jpg,.jpeg,.webp,.svg,.pdf,.docx">
                    <div class="inline-flex p-3 rounded-full bg-blue-600/10 text-cyan-400">
                        <i data-lucide="upload-cloud" class="w-8 h-8"></i>
                    </div>
                    <p class="text-xs font-bold text-white">Click or drag files here to upload to Media Library</p>
                    <p class="text-[11px] text-slate-500">Supports PNG, JPG, WEBP, SVG, PDF up to 15MB. Executables strictly blocked.</p>
                </div>

                <!-- Media Grid Container -->
                <div id="mediaLibraryGrid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <!-- Populated via loadMediaLibrary() -->
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 19: GLOBAL WEBSITE CONTROLS & SETTINGS (PART 2)            -->
            <!-- ============================================================== -->
            <div id="tabContent-settings" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="settings" class="w-5 h-5 text-blue-400"></i>
                        <span>Global Website Controls & Settings</span>
                    </h2>
                    <p class="text-xs text-slate-400">
                        Configure maintenance mode, global announcement banner, cookie notice, official contact channels, and branding.
                    </p>
                </div>

                <form id="globalControlsForm" onsubmit="saveGlobalControls(event)" class="space-y-6">
                    
                    <!-- Maintenance Mode Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-white">Website Maintenance Mode</h3>
                                <p class="text-xs text-slate-400">When enabled, public visitors see the maintenance message while administrators retain panel access.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="maintenance_mode" value="1" <?= !empty($site_settings['maintenance_mode']) && $site_settings['maintenance_mode'] === '1' ? 'checked' : '' ?> class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-600"></div>
                            </label>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-400">Maintenance Notice Message</label>
                            <input type="text" name="maintenance_message" value="<?= htmlspecialchars($site_settings['maintenance_message'] ?? 'We are conducting scheduled infrastructure upgrades. We will be back online shortly.') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        </div>
                    </div>

                    <!-- Announcement Bar Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-white">Global Top Announcement Bar</h3>
                                <p class="text-xs text-slate-400">Displays a prominent corporate notification banner at the very top of all public pages.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="announcement_enabled" value="1" <?= !empty($site_settings['announcement_enabled']) && $site_settings['announcement_enabled'] === '1' ? 'checked' : '' ?> class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Announcement Text</label>
                                <input type="text" name="announcement_text" value="<?= htmlspecialchars($site_settings['announcement_text'] ?? 'Online-First Global IT Delivery • ISO-Aligned Quality Standards') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Target Destination Link</label>
                                <input type="text" name="announcement_link" value="<?= htmlspecialchars($site_settings['announcement_link'] ?? 'services.php') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                        </div>
                    </div>

                    <!-- Cookie Notice Card -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-white">Cookie Consent Notice</h3>
                                <p class="text-xs text-slate-400">Informs visitors about privacy, telemetry, and security cookies.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="cookie_notice_enabled" value="1" <?= !empty($site_settings['cookie_notice_enabled']) && $site_settings['cookie_notice_enabled'] === '1' ? 'checked' : '' ?> class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-400">Notice Text</label>
                            <input type="text" name="cookie_notice_text" value="<?= htmlspecialchars($site_settings['cookie_notice_text'] ?? 'We utilize security and telemetry cookies to ensure optimal browsing performance and protect client submissions.') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        </div>
                    </div>

                    <!-- Branding & Contact Channels -->
                    <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 space-y-4">
                        <h3 class="text-sm font-bold text-white">Branding & Official Channels</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Company Name</label>
                                <input type="text" name="company_name" value="<?= htmlspecialchars($site_settings['company_name'] ?? SITE_NAME) ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-bold">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Company Tagline</label>
                                <input type="text" name="tagline" value="<?= htmlspecialchars($site_settings['tagline'] ?? SITE_TAGLINE) ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Contact Email</label>
                                <input type="email" name="email_contact" value="<?= htmlspecialchars($site_settings['email_contact'] ?? SITE_EMAIL_CONTACT) ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">HR / Recruitment Email</label>
                                <input type="email" name="email_hr" value="<?= htmlspecialchars($site_settings['email_hr'] ?? SITE_EMAIL_HR) ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">Official Phone Number</label>
                                <input type="text" name="phone_number" value="<?= htmlspecialchars($site_settings['phone_number'] ?? '+91 93098 35085') ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-400">LinkedIn URL</label>
                                <input type="text" name="linkedin_url" value="<?= htmlspecialchars($site_settings['linkedin_url'] ?? SITE_LINKEDIN_URL) ?>" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold uppercase tracking-wider shadow-md">
                            Save Global Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 20: SECURITY & PASSWORD (PART 1)                           -->
            <!-- ============================================================== -->
            <div id="tabContent-security" class="hidden space-y-6 text-left">
                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-heading flex items-center gap-2">
                        <i data-lucide="shield" class="w-5 h-5 text-blue-400"></i>
                        <span>Security & Administrator Profile</span>
                    </h2>
                    <p class="text-xs text-slate-400">Change master administrator password and review cryptographic authentication controls.</p>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 max-w-lg space-y-4">
                    <form onsubmit="handleAdminPasswordChange(event)" class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">New Administrator Password</label>
                            <input type="password" id="newPasswordInput" required minlength="6" placeholder="Minimum 6 characters" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-300">Confirm Password</label>
                            <input type="password" id="confirmPasswordInput" required minlength="6" placeholder="Re-type new password" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        </div>
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">
                            Update Administrator Password
                        </button>
                    </form>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- ============================================================== -->
<!-- 3. MODALS SYSTEM (SERVICES, OPPORTUNITIES, FORMS, EMAILS)      -->
<!-- ============================================================== -->

<!-- Service Editor Modal -->
<div id="serviceEditorModal" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-3xl w-full max-h-[90vh] flex flex-col shadow-2xl text-left overflow-hidden">
        <div class="p-5 border-b border-slate-800 flex items-center justify-between">
            <h3 class="text-base font-bold text-white font-heading" id="serviceModalTitle">Edit Enterprise Service</h3>
            <button onclick="closeServiceModal()" class="p-1 rounded-lg text-slate-400 hover:text-white"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <form id="serviceModalForm" onsubmit="saveServiceFromModal(event)" class="flex-1 overflow-y-auto p-6 space-y-4 custom-scrollbar">
            <input type="hidden" id="modalServiceSlug" name="slug">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Service Title</label>
                    <input type="text" id="modalServiceTitle" name="title" required class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Badge Text</label>
                    <input type="text" id="modalServiceBadge" name="badge" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Icon Name</label>
                    <input type="text" id="modalServiceIcon" name="icon" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-mono">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Color Accent</label>
                    <select id="modalServiceColor" name="color" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        <option value="blue">Blue</option>
                        <option value="indigo">Indigo</option>
                        <option value="cyan">Cyan</option>
                        <option value="emerald">Emerald</option>
                        <option value="purple">Purple</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Active Status</label>
                    <select id="modalServiceActive" name="is_active" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        <option value="1">Active / Published</option>
                        <option value="0">Hidden / Draft</option>
                    </select>
                </div>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Short Card Description</label>
                <textarea id="modalServiceShortDesc" name="short_desc" rows="2" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white"></textarea>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Full Service Overview Description</label>
                <textarea id="modalServiceOverview" name="overview" rows="3" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white"></textarea>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Tech Stack Pills (Comma-separated)</label>
                <input type="text" id="modalServiceTechStack" name="tech_stack" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">CTA Button Heading</label>
                <input type="text" id="modalServiceCtaTitle" name="cta_title" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
            </div>
            <div class="p-3 rounded-xl bg-slate-950 text-xs font-mono text-slate-400">
                Concepts, workflows, and use-case data are loaded and updated cleanly.
            </div>
            <div class="pt-3 border-t border-slate-800 flex justify-end gap-2">
                <button type="button" onclick="closeServiceModal()" class="px-4 py-2 rounded-xl border border-slate-800 text-slate-300 text-xs">Cancel</button>
                <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">Save & Publish Service</button>
            </div>
        </form>
    </div>
</div>

<!-- Opportunity Modal -->
<div id="oppModal" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-xl w-full max-h-[90vh] flex flex-col shadow-2xl text-left overflow-hidden">
        <div class="p-5 border-b border-slate-800 flex items-center justify-between">
            <h3 class="text-base font-bold text-white font-heading" id="oppModalTitle">Opportunity Configuration</h3>
            <button onclick="closeOppModal()" class="p-1 rounded-lg text-slate-400 hover:text-white"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>
        <form id="oppModalForm" onsubmit="saveOpportunityFromModal(event)" class="flex-1 overflow-y-auto p-6 space-y-4 custom-scrollbar">
            <input type="hidden" id="modalOppSlug" name="slug">
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Title</label>
                <input type="text" id="modalOppTitle" name="title" required class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Category</label>
                    <select id="modalOppType" name="type" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                        <option value="Internship">Internship</option>
                        <option value="Job">Job Vacancy</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Department</label>
                    <input type="text" id="modalOppDept" name="department" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Duration</label>
                    <input type="text" id="modalOppDuration" name="duration" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-300">Stipend</label>
                    <input type="text" id="modalOppStipend" name="stipend" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
                </div>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Eligibility Criteria</label>
                <input type="text" id="modalOppEligibility" name="eligibility" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white">
            </div>
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-300">Role Description</label>
                <textarea id="modalOppDesc" name="description" rows="3" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white"></textarea>
            </div>
            <div class="pt-3 border-t border-slate-800 flex justify-end gap-2">
                <button type="button" onclick="closeOppModal()" class="px-4 py-2 rounded-xl border border-slate-800 text-slate-300 text-xs">Cancel</button>
                <button type="submit" class="px-6 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold">Save Opportunity</button>
            </div>
        </form>
    </div>
</div>

<!-- Candidate Notes & Status Modal -->
<div id="candidateNotesModal" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 rounded-3xl max-w-md w-full p-6 text-left space-y-4">
        <h3 class="text-base font-bold text-white font-heading" id="notesModalTitle">Applicant Notes & Status</h3>
        <input type="hidden" id="modalAppId">
        <div class="space-y-1.5">
            <label class="text-xs font-bold text-slate-300">Application Status</label>
            <select id="modalAppStatus" class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white font-medium">
                <option value="New">New</option>
                <option value="Under Review">Under Review</option>
                <option value="Shortlisted">Shortlisted</option>
                <option value="Selected">Selected</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <div class="space-y-1.5">
            <label class="text-xs font-bold text-slate-300">Internal Interview Notes</label>
            <textarea id="modalAppNotes" rows="4" placeholder="Candidate interview feedback, strengths, assessment score..." class="w-full px-3.5 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white"></textarea>
        </div>
        <div class="flex justify-end gap-2">
            <button onclick="closeNotesModal()" class="px-4 py-2 rounded-xl border border-slate-800 text-slate-300 text-xs">Cancel</button>
            <button onclick="saveCandidateNotes()" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold">Update Notes</button>
        </div>
    </div>
</div>

<!-- Global Notification Toast Engine -->
<div id="cmsToast" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 max-w-sm p-4 rounded-2xl shadow-2xl flex items-center gap-3 border text-xs font-medium">
    <span id="toastIcon"></span>
    <span id="toastMessage"></span>
</div>

<?php endif; ?>

<!-- ============================================================== -->
<!-- 4. CLIENT JAVASCRIPT MASTER CONTROLLERS                        -->
<!-- ============================================================== -->
<script>
    // Initialize Lucide Icons
    document.addEventListener('DOMContentLoaded', () => {
        if (window.lucide) lucide.createIcons();
        <?php if ($is_logged_in): ?>
            loadApplications();
            loadInquiries('contact');
            loadMediaLibrary();
            loadPageSeo('home');
        <?php endif; ?>
    });

    // Toast Notification System
    function showToast(message, type = 'success') {
        const toast = document.getElementById('cmsToast');
        const msg = document.getElementById('toastMessage');
        const icon = document.getElementById('toastIcon');
        if (!toast) return;

        msg.textContent = message;
        if (type === 'success') {
            toast.className = 'fixed bottom-6 right-6 z-50 max-w-sm p-4 rounded-2xl shadow-2xl flex items-center gap-3 border text-xs font-bold bg-emerald-950/95 border-emerald-500/40 text-emerald-200 transition-all duration-300 transform translate-y-0 opacity-100';
            icon.innerHTML = '<i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>';
        } else {
            toast.className = 'fixed bottom-6 right-6 z-50 max-w-sm p-4 rounded-2xl shadow-2xl flex items-center gap-3 border text-xs font-bold bg-rose-950/95 border-rose-500/40 text-rose-200 transition-all duration-300 transform translate-y-0 opacity-100';
            icon.innerHTML = '<i data-lucide="alert-circle" class="w-4 h-4 text-rose-400"></i>';
        }
        if (window.lucide) lucide.createIcons();

        setTimeout(() => {
            toast.classList.add('translate-y-24', 'opacity-0');
        }, 3500);
    }

    // Switch Master Sidebar Tabs
    function switchTab(tabId) {
        document.querySelectorAll('[id^="tabContent-"]').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

        const target = document.getElementById('tabContent-' + tabId);
        const btn = document.getElementById('tabBtn-' + tabId);
        if (target) target.classList.remove('hidden');
        if (btn) btn.classList.add('active');
        if (window.lucide) lucide.createIcons();
    }

    // Admin Login AJAX Handler
    async function handleAdminLogin(e) {
        e.preventDefault();
        const form = e.target;
        const btn = document.getElementById('loginSubmitBtn');
        const alertBox = document.getElementById('loginAlert');
        const formData = new FormData(form);

        btn.disabled = true;
        btn.innerHTML = '<span>Verifying Credentials...</span>';
        alertBox.className = 'hidden';

        try {
            const res = await fetch('api/admin_auth.php?action=login', {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if (data.success) {
                alertBox.className = 'p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium block';
                alertBox.textContent = 'Authentication verified. Redirecting to workspace...';
                window.location.reload();
            } else {
                alertBox.className = 'p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium block';
                alertBox.textContent = data.message || 'Authentication failed. Please check credentials.';
                btn.disabled = false;
                btn.innerHTML = '<span>Authenticate & Access Dashboard</span>';
            }
        } catch (err) {
            alertBox.className = 'p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium block';
            alertBox.textContent = 'Server connection error. Please try again.';
            btn.disabled = false;
            btn.innerHTML = '<span>Authenticate & Access Dashboard</span>';
        }
    }

    // Admin Logout
    async function handleAdminLogout() {
        if (!confirm('Are you sure you want to sign out from the CMS?')) return;
        try {
            await fetch('api/admin_auth.php?action=logout', { method: 'POST' });
        } catch (e) {}
        window.location.reload();
    }

    // Password Change
    async function handleAdminPasswordChange(e) {
        e.preventDefault();
        const p1 = document.getElementById('newPasswordInput').value;
        const p2 = document.getElementById('confirmPasswordInput').value;
        if (p1 !== p2) {
            alert('Passwords do not match.');
            return;
        }
        try {
            const res = await fetch('api/admin_auth.php?action=change_password', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: json.stringify({ new_password: p1 })
            });
            const data = await res.json();
            if (data.success) {
                showToast('Password updated successfully!');
                e.target.reset();
            } else {
                alert(data.message || 'Password update failed.');
            }
        } catch (err) {
            alert('Network error.');
        }
    }

    // Services CRUD
    let currentServicesData = <?= json_encode($all_services) ?>;

    function editService(slug) {
        const s = currentServicesData.find(item => item.slug === slug);
        if (!s) return;
        document.getElementById('serviceModalTitle').textContent = 'Edit Service: ' + s.title;
        document.getElementById('modalServiceSlug').value = s.slug;
        document.getElementById('modalServiceTitle').value = s.title || '';
        document.getElementById('modalServiceBadge').value = s.badge || '';
        document.getElementById('modalServiceIcon').value = s.icon || 'layers';
        document.getElementById('modalServiceColor').value = s.color || 'blue';
        document.getElementById('modalServiceActive').value = s.is_active ? '1' : '0';
        document.getElementById('modalServiceShortDesc').value = s.short_desc || '';
        document.getElementById('modalServiceOverview').value = (s.content && s.content.overview) ? s.content.overview : '';
        document.getElementById('modalServiceTechStack').value = (s.content && s.content.tech_stack) ? s.content.tech_stack.join(', ') : '';
        document.getElementById('modalServiceCtaTitle').value = (s.content && s.content.cta) ? s.content.cta.title : '';
        document.getElementById('serviceEditorModal').classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
    }

    function openNewServiceModal() {
        document.getElementById('serviceModalTitle').textContent = 'Add New Enterprise Service';
        document.getElementById('modalServiceSlug').value = '';
        document.getElementById('serviceModalForm').reset();
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
        if (!content.cta) content.cta = { button_text: 'Get Started', button_url: '#contact' };
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
                showToast('Service saved and published!');
                closeServiceModal();
                setTimeout(() => window.location.reload(), 1000);
            } else {
                alert(data.message || 'Failed to save service.');
            }
        } catch (err) {
            alert('Failed to save service.');
        }
    }

    async function deleteService(slug) {
        if (!confirm('Are you sure you want to delete this service?')) return;
        try {
            const res = await fetch('api/cms.php?action=delete_service', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ slug: slug })
            });
            const data = await res.json();
            if (data.success) {
                showToast('Service removed.');
                setTimeout(() => window.location.reload(), 1000);
            }
        } catch (e) {
            alert('Error deleting service.');
        }
    }

    // Careers & Applications
    let allApplications = [];

    async function loadApplications() {
        try {
            const res = await fetch('api/cms.php?action=get_career_applications');
            const data = await res.json();
            if (data.success) {
                allApplications = data.applications || [];
                renderApplications(allApplications);
            }
        } catch (e) {}
    }

    function renderApplications(list) {
        const tbody = document.getElementById('applicationsTableBody');
        if (!tbody) return;
        if (!list || list.length === 0) {
            tbody.innerHTML = '<tr><td colspan="7" class="p-6 text-center text-slate-500">No candidate applications found.</td></tr>';
            return;
        }

        tbody.innerHTML = list.map(app => `
            <tr class="hover:bg-slate-800/40">
                <td class="p-4 font-mono text-[11px]">
                    <span class="text-white font-bold">#${app.id}</span>
                    <span class="block text-slate-500">${app.created_at ? app.created_at.substring(0, 10) : ''}</span>
                </td>
                <td class="p-4">
                    <p class="font-bold text-white text-xs">${escapeHtml(app.full_name)}</p>
                    <p class="text-[11px] text-slate-400 font-mono">${escapeHtml(app.email)}</p>
                    <p class="text-[11px] text-emerald-400 font-mono">${escapeHtml(app.phone)}</p>
                </td>
                <td class="p-4">
                    <span class="font-bold text-white">${escapeHtml(app.position)}</span>
                    <span class="block text-[10px] font-mono uppercase text-slate-500">${escapeHtml(app.applying_for)}</span>
                </td>
                <td class="p-4 text-slate-300">${escapeHtml(app.education || '—')}</td>
                <td class="p-4">
                    ${app.resume_filename ? `
                        <a href="uploads/resumes/${escapeHtml(app.resume_filename)}" target="_blank" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-blue-500/10 hover:bg-blue-500/20 text-cyan-300 font-mono text-[11px] border border-blue-500/20">
                            <i data-lucide="file" class="w-3.5 h-3.5"></i>
                            <span>View Resume</span>
                        </a>
                    ` : '<span class="text-slate-500">No file</span>'}
                </td>
                <td class="p-4">
                    <select onchange="changeApplicationStatus(${app.id}, this.value)" class="px-2.5 py-1 rounded-lg bg-slate-950 border border-slate-800 text-[11px] font-semibold text-white">
                        <option value="New" ${app.status === 'New' ? 'selected' : ''}>New</option>
                        <option value="Under Review" ${app.status === 'Under Review' ? 'selected' : ''}>Under Review</option>
                        <option value="Shortlisted" ${app.status === 'Shortlisted' ? 'selected' : ''}>Shortlisted</option>
                        <option value="Selected" ${app.status === 'Selected' ? 'selected' : ''}>Selected</option>
                        <option value="Rejected" ${app.status === 'Rejected' ? 'selected' : ''}>Rejected</option>
                    </select>
                </td>
                <td class="p-4 text-right">
                    <button onclick="openCandidateNotes(${app.id})" class="p-1.5 rounded-lg border border-slate-800 hover:bg-slate-800 text-slate-400 hover:text-white" title="Internal Notes">
                        <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                    </button>
                </td>
            </tr>
        `).join('');
        if (window.lucide) lucide.createIcons();
    }

    function filterApplications() {
        const query = (document.getElementById('appSearchInput').value || '').toLowerCase();
        const status = document.getElementById('appStatusFilter').value;

        const filtered = allApplications.filter(a => {
            const matchQ = (a.full_name || '').toLowerCase().includes(query) || (a.email || '').toLowerCase().includes(query) || (a.phone || '').includes(query);
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
                body: JSON.stringify({ id: id, status: newStatus })
            });
            const data = await res.json();
            if (data.success) {
                showToast(`Applicant #${id} status updated to ${newStatus}`);
                const app = allApplications.find(a => a.id == id);
                if (app) app.status = newStatus;
            }
        } catch (e) {
            alert('Failed to update status.');
        }
    }

    function openCandidateNotes(id) {
        const app = allApplications.find(a => a.id == id);
        if (!app) return;
        document.getElementById('modalAppId').value = id;
        document.getElementById('notesModalTitle').textContent = 'Notes: ' + app.full_name;
        document.getElementById('modalAppStatus').value = app.status || 'New';
        document.getElementById('modalAppNotes').value = app.internal_notes || '';
        document.getElementById('candidateNotesModal').classList.remove('hidden');
    }

    function closeNotesModal() {
        document.getElementById('candidateNotesModal').classList.add('hidden');
    }

    async function saveCandidateNotes() {
        const id = document.getElementById('modalAppId').value;
        const status = document.getElementById('modalAppStatus').value;
        const notes = document.getElementById('modalAppNotes').value;
        try {
            const res = await fetch('api/cms.php?action=update_application_status', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, status: status, internal_notes: notes })
            });
            const data = await res.json();
            if (data.success) {
                showToast('Applicant notes saved.');
                closeNotesModal();
                const app = allApplications.find(a => a.id == id);
                if (app) { app.status = status; app.internal_notes = notes; }
                renderApplications(allApplications);
            }
        } catch (e) {
            alert('Failed to save notes.');
        }
    }

    function exportApplicationsCsv() {
        window.location.href = 'api/cms.php?action=export_applications_csv';
    }

    function switchCareerSubTab(sub) {
        document.getElementById('careerSection-apps').classList.add('hidden');
        document.getElementById('careerSection-opps').classList.add('hidden');
        document.getElementById('careerSubTabBtn-apps').className = 'px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white';
        document.getElementById('careerSubTabBtn-opps').className = 'px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white';

        if (sub === 'apps') {
            document.getElementById('careerSection-apps').classList.remove('hidden');
            document.getElementById('careerSubTabBtn-apps').className = 'px-4 py-2 rounded-xl bg-blue-600 text-white';
        } else {
            document.getElementById('careerSection-opps').classList.remove('hidden');
            document.getElementById('careerSubTabBtn-opps').className = 'px-4 py-2 rounded-xl bg-blue-600 text-white';
        }
    }

    // Inquiries
    let currentInquiryType = 'contact';

    async function loadInquiries(type) {
        currentInquiryType = type;
        const tbody = document.getElementById('inquiriesTableBody');
        if (tbody) tbody.innerHTML = '<tr><td colspan="6" class="p-6 text-center text-slate-500">Loading inquiries...</td></tr>';
        try {
            const res = await fetch(`api/cms.php?action=get_inquiries&type=${type}`);
            const data = await res.json();
            if (data.success) {
                renderInquiries(data.inquiries || [], type);
            }
        } catch (e) {}
    }

    function renderInquiries(list, type) {
        const tbody = document.getElementById('inquiriesTableBody');
        if (!tbody) return;
        if (!list || list.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" class="p-6 text-center text-slate-500">No records found.</td></tr>';
            return;
        }

        tbody.innerHTML = list.map(inq => `
            <tr class="hover:bg-slate-800/40">
                <td class="p-4 font-mono text-[11px]">
                    <span class="text-white font-bold">#${inq.id}</span>
                    <span class="block text-slate-500">${inq.created_at ? inq.created_at.substring(0, 10) : ''}</span>
                </td>
                <td class="p-4">
                    <p class="font-bold text-white text-xs">${escapeHtml(inq.name)}</p>
                    <p class="text-[11px] text-slate-400">${escapeHtml(inq.company || 'Individual')}</p>
                </td>
                <td class="p-4">
                    <p class="font-mono text-cyan-400 text-[11px]">${escapeHtml(inq.email)}</p>
                    <p class="font-mono text-slate-400 text-[11px]">${escapeHtml(inq.phone || '—')}</p>
                </td>
                <td class="p-4 max-w-xs">
                    <span class="font-bold text-white block text-xs">${escapeHtml(inq.service_interest || inq.service_category || inq.topic || 'Inquiry')}</span>
                    <p class="text-slate-400 text-[11px] line-clamp-2">${escapeHtml(inq.message || inq.requirements || inq.notes || '')}</p>
                </td>
                <td class="p-4">
                    <select onchange="updateInquiryStatus('${type}', ${inq.id}, this.value)" class="px-2.5 py-1 rounded-lg bg-slate-950 border border-slate-800 text-[11px] text-white">
                        <option value="New" ${inq.status === 'New' ? 'selected' : ''}>New</option>
                        <option value="Contacted" ${inq.status === 'Contacted' ? 'selected' : ''}>Contacted</option>
                        <option value="In Progress" ${inq.status === 'In Progress' ? 'selected' : ''}>In Progress</option>
                        <option value="Resolved" ${inq.status === 'Resolved' ? 'selected' : ''}>Resolved</option>
                    </select>
                </td>
                <td class="p-4 text-right">
                    <span class="text-[10px] text-slate-500 font-mono">${type}</span>
                </td>
            </tr>
        `).join('');
        if (window.lucide) lucide.createIcons();
    }

    function switchInquirySubTab(type) {
        ['contact', 'quotation', 'consultation'].forEach(t => {
            const btn = document.getElementById('inquirySubTabBtn-' + t);
            if (btn) btn.className = 'px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white';
        });
        const activeBtn = document.getElementById('inquirySubTabBtn-' + type);
        if (activeBtn) activeBtn.className = 'px-4 py-2 rounded-xl bg-blue-600 text-white';
        loadInquiries(type);
    }

    async function updateInquiryStatus(type, id, status) {
        try {
            const res = await fetch('api/cms.php?action=update_inquiry_status', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ type: type, id: id, status: status })
            });
            const data = await res.json();
            if (data.success) {
                showToast(`Inquiry #${id} updated.`);
            }
        } catch (e) {}
    }

    function exportInquiriesCsv() {
        window.location.href = `api/cms.php?action=export_inquiries_csv&type=${currentInquiryType}`;
    }

    // SEO
    async function loadPageSeo(slug) {
        document.getElementById('seoCurrentSlug').value = slug;
        try {
            const res = await fetch(`api/cms.php?action=get_page_seo&slug=${slug}`);
            const data = await res.json();
            if (data.success && data.seo) {
                const s = data.seo;
                document.getElementById('seoMetaTitle').value = s.meta_title || '';
                document.getElementById('seoKeywords').value = s.keywords || '';
                document.getElementById('seoMetaDescription').value = s.meta_description || '';
                document.getElementById('seoOgTitle').value = s.og_title || '';
                document.getElementById('seoOgImage').value = s.og_image || '';
                document.getElementById('seoRobotsIndex').value = s.robots_index !== undefined ? s.robots_index : '1';
                document.getElementById('seoRobotsFollow').value = s.robots_follow !== undefined ? s.robots_follow : '1';
                document.getElementById('seoSitemapPriority').value = s.sitemap_priority || '0.8';
                document.getElementById('seoSitemapChangefreq').value = s.sitemap_changefreq || 'weekly';
            }
        } catch (e) {}
    }

    function editPageSeoDirect(slug) {
        switchTab('seo');
        document.getElementById('seoPageSelector').value = slug;
        loadPageSeo(slug);
    }

    async function savePageSeo(e) {
        e.preventDefault();
        const slug = document.getElementById('seoCurrentSlug').value;
        const payload = {
            slug: slug,
            seo: {
                meta_title: document.getElementById('seoMetaTitle').value,
                keywords: document.getElementById('seoKeywords').value,
                meta_description: document.getElementById('seoMetaDescription').value,
                og_title: document.getElementById('seoOgTitle').value,
                og_image: document.getElementById('seoOgImage').value,
                robots_index: parseInt(document.getElementById('seoRobotsIndex').value),
                robots_follow: parseInt(document.getElementById('seoRobotsFollow').value),
                sitemap_priority: parseFloat(document.getElementById('seoSitemapPriority').value),
                sitemap_changefreq: document.getElementById('seoSitemapChangefreq').value
            }
        };

        try {
            const res = await fetch('api/cms.php?action=save_page_seo', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                showToast(`SEO settings for /${slug} saved.`);
            }
        } catch (err) {
            alert('Failed to save SEO.');
        }
    }

    // Chatbot Config
    async function saveChatbotConfig(e) {
        e.preventDefault();
        const form = e.target;
        const payload = {
            chatbot: {
                enabled: form.querySelector('#chatbotEnabled').checked ? '1' : '0',
                name: form.querySelector('[name="name"]').value,
                languages: form.querySelector('[name="languages"]').value,
                welcome_message: form.querySelector('[name="welcome_message"]').value,
                system_prompt: form.querySelector('[name="system_prompt"]').value,
                knowledge_sources: form.querySelector('[name="knowledge_sources"]').value
            }
        };

        try {
            const res = await fetch('api/cms.php?action=save_chatbot_config', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) {
                showToast('AI Chatbot configuration saved.');
            }
        } catch (e) {
            alert('Failed to save chatbot settings.');
        }
    }

    // Global Controls
    async function saveGlobalControls(e) {
        e.preventDefault();
        const form = e.target;
        const controls = {
            maintenance_mode: form.querySelector('[name="maintenance_mode"]').checked ? '1' : '0',
            maintenance_message: form.querySelector('[name="maintenance_message"]').value,
            announcement_enabled: form.querySelector('[name="announcement_enabled"]').checked ? '1' : '0',
            announcement_text: form.querySelector('[name="announcement_text"]').value,
            announcement_link: form.querySelector('[name="announcement_link"]').value,
            cookie_notice_enabled: form.querySelector('[name="cookie_notice_enabled"]').checked ? '1' : '0',
            cookie_notice_text: form.querySelector('[name="cookie_notice_text"]').value,
            company_name: form.querySelector('[name="company_name"]').value,
            tagline: form.querySelector('[name="tagline"]').value,
            email_contact: form.querySelector('[name="email_contact"]').value,
            email_hr: form.querySelector('[name="email_hr"]').value,
            phone_number: form.querySelector('[name="phone_number"]').value,
            linkedin_url: form.querySelector('[name="linkedin_url"]').value
        };

        try {
            const res = await fetch('api/cms.php?action=save_global_controls', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ controls: controls })
            });
            const data = await res.json();
            if (data.success) {
                showToast('Global controls updated successfully!');
            }
        } catch (e) {
            alert('Failed to save global controls.');
        }
    }

    // Media Library
    async function loadMediaLibrary() {
        const grid = document.getElementById('mediaLibraryGrid');
        if (!grid) return;
        try {
            const res = await fetch('api/cms.php?action=get_media');
            const data = await res.json();
            if (data.success && data.media) {
                renderMediaGrid(data.media);
            }
        } catch (e) {}
    }

    function renderMediaGrid(list) {
        const grid = document.getElementById('mediaLibraryGrid');
        if (!grid) return;
        if (!list || list.length === 0) {
            grid.innerHTML = '<div class="col-span-full py-8 text-center text-slate-500 text-xs">No media files uploaded yet.</div>';
            return;
        }

        grid.innerHTML = list.map(m => `
            <div class="p-3 rounded-2xl bg-slate-900 border border-slate-800 space-y-2 group relative">
                <div class="h-24 rounded-xl bg-slate-950 flex items-center justify-center overflow-hidden border border-slate-800/60">
                    ${m.file_type && m.file_type.includes('image') ? `
                        <img src="${escapeHtml(m.file_path)}" alt="${escapeHtml(m.alt_text || m.original_name)}" class="h-full w-full object-cover">
                    ` : `
                        <i data-lucide="file" class="w-8 h-8 text-slate-600"></i>
                    `}
                </div>
                <div class="truncate">
                    <p class="text-[11px] font-bold text-white truncate" title="${escapeHtml(m.original_name)}">${escapeHtml(m.original_name)}</p>
                    <p class="text-[10px] font-mono text-slate-500">${(m.file_size / 1024).toFixed(1)} KB</p>
                </div>
                <div class="flex items-center gap-1 pt-1">
                    <button onclick="copyToClipboard('${escapeHtml(m.file_path)}')" class="flex-1 py-1 rounded bg-slate-800 hover:bg-slate-700 text-cyan-300 text-[10px] font-mono" title="Copy Relative Link">
                        Copy Link
                    </button>
                    <button onclick="deleteMedia(${m.id})" class="p-1 rounded hover:bg-rose-500/20 text-slate-400 hover:text-rose-400">
                        <i data-lucide="trash" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>
        `).join('');
        if (window.lucide) lucide.createIcons();
    }

    async function handleMediaUpload(input) {
        if (!input.files || input.files.length === 0) return;
        const file = input.files[0];
        const formData = new FormData();
        formData.append('media_file', file);
        showToast('Uploading ' + file.name + '...');

        try {
            const res = await fetch('api/upload_media.php', { method: 'POST', body: formData });
            const data = await res.json();
            if (data.success) {
                showToast('Uploaded successfully!');
                loadMediaLibrary();
            } else {
                alert(data.message || 'Upload failed.');
            }
        } catch (e) {
            alert('Upload failed.');
        }
        input.value = '';
    }

    async function deleteMedia(id) {
        if (!confirm('Delete this media asset?')) return;
        try {
            const res = await fetch('api/cms.php?action=delete_media', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            });
            const data = await res.json();
            if (data.success) {
                showToast('Media removed.');
                loadMediaLibrary();
            }
        } catch (e) {}
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        showToast('Copied URL: ' + text);
    }

    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/[&<>"']/g, function(m) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' }[m];
        });
    }
</script>
</body>
</html>

<?php
// NextTechX Solutions - Dedicated Admin Login Page
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';

// If already logged in, redirect straight to admin dashboard
if (!empty($_SESSION['admin_user'])) {
    header('Location: admin.php');
    exit;
}

// Generate CSRF Token
if (empty($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['admin_csrf_token'];

// Check if any admin users exist in DB
$existing_admins = cms_get_admin_users();
$needs_setup = empty($existing_admins);

$site_name = cms_get_setting('company_name', SITE_NAME);
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Sign In — <?= htmlspecialchars($site_name) ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
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
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Manrope', sans-serif; }
        .bg-pattern {
            background-image: 
                radial-gradient(#e2e8f0 1.2px, transparent 1.2px),
                linear-gradient(to right, rgba(241, 245, 249, 0.6) 1px, transparent 1px);
            background-size: 28px 28px, 100% 100%;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased selection:bg-blue-600/20 selection:text-blue-700 flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative bg-pattern overflow-hidden">

    <!-- Ambient Subtle Glowing Orbs -->
    <div class="absolute -top-32 left-1/4 w-[500px] h-[500px] bg-royal-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 right-1/4 w-[500px] h-[500px] bg-accent-purple/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10 px-4">
        
        <!-- Logo & Branding -->
        <div class="text-center space-y-3 mb-6">
            <a href="index.php" class="inline-flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-navy-900 via-royal-600 to-accent-purple flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:scale-105 transition-transform">
                    <i data-lucide="shield-check" class="w-6 h-6 stroke-[2.2]"></i>
                </div>
                <div class="text-left font-heading">
                    <span class="block text-xl font-black text-slate-900 tracking-tight leading-none">NEXTECHX</span>
                    <span class="block text-[11px] font-mono tracking-widest text-royal-600 uppercase mt-0.5 font-bold">SOLUTIONS</span>
                </div>
            </a>
            <h1 class="text-2xl font-black text-slate-900 font-heading tracking-tight">
                <?= $needs_setup ? 'Administrator Initial Setup' : 'Admin Control Portal' ?>
            </h1>
            <p class="text-xs text-slate-500 max-w-xs mx-auto">
                <?= $needs_setup 
                    ? 'No admin users found. Create your master administrator account below to initialize the CMS.' 
                    : 'Restricted management gateway for authorized NEXTECHX SOLUTIONS administrators.' ?>
            </p>
        </div>

        <!-- Card Container -->
        <div class="bg-white py-8 px-6 sm:px-10 shadow-xl shadow-slate-200/60 rounded-3xl border border-slate-200/90 relative">
            
            <!-- Alert Banner -->
            <div id="loginAlert" class="hidden mb-5 p-3.5 rounded-2xl text-xs font-medium flex items-start gap-2.5">
                <i data-lucide="alert-circle" class="w-4 h-4 shrink-0 mt-0.5"></i>
                <span id="loginAlertText" class="leading-relaxed"></span>
            </div>

            <?php if ($needs_setup): ?>
            <!-- Initial Administrator Setup Form -->
            <form id="setupForm" onsubmit="handleInitialSetup(event)" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">
                        Master Username
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <input type="text" name="username" required minlength="4" placeholder="e.g. admin"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all font-mono">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">
                        Corporate Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" name="email" required placeholder="admin@nextechxsolutions.com"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">
                        Master Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="setupPassword" name="password" required minlength="8" placeholder="Create strong passphrase..."
                            class="w-full pl-10 pr-10 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all font-mono">
                        <button type="button" onclick="togglePasswordVisibility('setupPassword', this)" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">Minimum 8 characters. Hashed with bcrypt on server-side.</p>
                </div>

                <div class="pt-2">
                    <button type="submit" id="setupBtn" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-navy-900 via-royal-600 to-accent-purple text-white font-bold text-xs uppercase tracking-wider font-heading hover:shadow-lg hover:shadow-royal-500/25 transition-all flex items-center justify-center gap-2">
                        <span>Initialize Master Admin</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <?php else: ?>
            <!-- Standard Secure Sign In Form -->
            <form id="loginForm" onsubmit="handleLoginSubmit(event)" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-heading">
                        Username or Corporate Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <input type="text" id="loginUsername" name="username" required autocomplete="username" placeholder="Enter username or email"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider font-heading">
                            Password
                        </label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="loginPassword" name="password" required autocomplete="current-password" placeholder="Enter password"
                            class="w-full pl-10 pr-10 py-2.5 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:border-royal-600 focus:bg-white focus:ring-2 focus:ring-royal-500/10 transition-all">
                        <button type="button" onclick="togglePasswordVisibility('loginPassword', this)" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="rememberMe" class="w-3.5 h-3.5 rounded text-royal-600 border-slate-300 focus:ring-royal-500">
                        <span class="text-slate-600 text-[11px]">Remember active session</span>
                    </label>
                    <span class="text-[11px] font-mono text-slate-400">TLS 1.3 Verified</span>
                </div>

                <div class="pt-2">
                    <button type="submit" id="loginSubmitBtn" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-navy-900 via-royal-600 to-accent-purple text-white font-bold text-xs uppercase tracking-wider font-heading hover:shadow-lg hover:shadow-royal-500/25 transition-all flex items-center justify-center gap-2">
                        <span>Sign In to Dashboard</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>
            <?php endif; ?>

            <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                <span class="flex items-center gap-1.5 font-mono">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Server Online</span>
                </span>
                <a href="index.php" class="hover:text-slate-700 transition-colors flex items-center gap-1 font-heading font-medium">
                    <i data-lucide="arrow-left" class="w-3 h-3"></i>
                    <span>Return to Public Website</span>
                </a>
            </div>

        </div>

        <!-- Security Disclaimer -->
        <p class="text-center text-[11px] text-slate-400 mt-6 font-mono">
            Protected by CSRF Token & Bcrypt Hashing • Hostinger Verified
        </p>

    </div>

    <!-- Scripts -->
    <script>
        if (window.lucide) lucide.createIcons();

        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            if (!input) return;
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            btn.innerHTML = isPassword 
                ? '<i data-lucide="eye-off" class="w-4 h-4"></i>' 
                : '<i data-lucide="eye" class="w-4 h-4"></i>';
            if (window.lucide) lucide.createIcons();
        }

        function showAlert(msg, isSuccess = false) {
            const box = document.getElementById('loginAlert');
            const txt = document.getElementById('loginAlertText');
            box.className = isSuccess 
                ? 'mb-5 p-3.5 rounded-2xl text-xs font-medium flex items-start gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-800'
                : 'mb-5 p-3.5 rounded-2xl text-xs font-medium flex items-start gap-2.5 bg-rose-50 border border-rose-200 text-rose-800';
            txt.innerText = msg;
            box.classList.remove('hidden');
        }

        async function handleLoginSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('loginSubmitBtn');
            const username = document.getElementById('loginUsername').value.trim();
            const password = document.getElementById('loginPassword').value;

            btn.disabled = true;
            btn.innerHTML = '<span class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span> Verifying Credentials...';

            try {
                const res = await fetch('api/admin_auth.php?action=login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username, password })
                });
                const data = await res.json();
                if (data.success) {
                    showAlert('Authentication successful. Loading Admin Dashboard...', true);
                    setTimeout(() => {
                        window.location.href = 'admin.php';
                    }, 600);
                } else {
                    showAlert(data.message || 'Invalid username or password.');
                    btn.disabled = false;
                    btn.innerHTML = '<span>Sign In to Dashboard</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
                    if (window.lucide) lucide.createIcons();
                }
            } catch (err) {
                showAlert('Network error connecting to authentication server.');
                btn.disabled = false;
                btn.innerHTML = '<span>Sign In to Dashboard</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
                if (window.lucide) lucide.createIcons();
            }
        }

        async function handleInitialSetup(e) {
            e.preventDefault();
            const form = document.getElementById('setupForm');
            const btn = document.getElementById('setupBtn');
            const formData = new FormData(form);

            btn.disabled = true;
            btn.innerHTML = '<span>Creating Account...</span>';

            try {
                const res = await fetch('api/cms.php?action=initial_setup', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.success) {
                    showAlert('Master Administrator initialized successfully! Redirecting...', true);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1200);
                } else {
                    showAlert(data.message || 'Failed to initialize administrator.');
                    btn.disabled = false;
                    btn.innerHTML = '<span>Initialize Master Admin</span>';
                }
            } catch (err) {
                showAlert('Network error during setup.');
                btn.disabled = false;
                btn.innerHTML = '<span>Initialize Master Admin</span>';
            }
        }
    </script>
</body>
</html>

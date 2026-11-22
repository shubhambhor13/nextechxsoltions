<?php
require_once __DIR__ . '/config.php';
$maint_msg = cms_get_setting('maintenance_message', 'NEXTECHX SOLUTIONS platform is currently undergoing scheduled platform upgrades and infrastructure enhancements. We will be back online shortly.');
$cms_company = cms_get_setting('company_name', SITE_NAME);
$cms_email = cms_get_setting('email_contact', SITE_EMAIL_CONTACT);
$cms_phone = cms_get_setting('phone_contact', SITE_PHONE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduled Maintenance — <?= htmlspecialchars($cms_company) ?></title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-200 antialiased min-h-screen flex items-center justify-center p-4 selection:bg-blue-600/30 selection:text-blue-300 relative overflow-hidden">
    <!-- Ambient Gradients -->
    <div class="absolute -top-40 left-1/4 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 right-1/4 w-[600px] h-[600px] bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-xl w-full text-center relative z-10 space-y-8">
        <!-- Logo -->
        <div class="flex justify-center">
            <a href="index.php" class="inline-flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-cyan-400 flex items-center justify-center text-white shadow-xl shadow-blue-500/20">
                    <i data-lucide="shield" class="w-6 h-6 stroke-[2.2]"></i>
                </div>
                <div class="text-left font-heading">
                    <div class="text-xl font-black text-white tracking-tight leading-none"><?= htmlspecialchars($cms_company) ?></div>
                    <div class="text-[10px] font-mono tracking-widest text-cyan-400 uppercase mt-0.5">Enterprise Systems</div>
                </div>
            </a>
        </div>

        <!-- Maintenance Card -->
        <div class="bg-slate-900/90 border border-slate-800 rounded-3xl p-8 sm:p-10 shadow-2xl backdrop-blur-md space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/25 text-amber-400 text-xs font-semibold font-mono">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                <span>Scheduled Maintenance Active</span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Enhancing Our Infrastructure
            </h1>

            <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal">
                <?= nl2br(htmlspecialchars($maint_msg)) ?>
            </p>

            <div class="pt-4 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-center gap-4 text-xs font-mono text-slate-400">
                <a href="mailto:<?= htmlspecialchars($cms_email) ?>" class="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                    <i data-lucide="mail" class="w-4 h-4 text-cyan-400"></i>
                    <span><?= htmlspecialchars($cms_email) ?></span>
                </a>
                <span class="hidden sm:inline text-slate-700">•</span>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $cms_phone) ?>" class="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                    <i data-lucide="phone" class="w-4 h-4 text-emerald-400"></i>
                    <span><?= htmlspecialchars($cms_phone) ?></span>
                </a>
            </div>
        </div>

        <!-- Admin Access Link -->
        <div class="pt-2">
            <a href="admin-login.php" class="inline-flex items-center gap-1.5 text-xs text-slate-500 hover:text-slate-300 transition-colors font-mono">
                <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                <span>Admin Access</span>
            </a>
        </div>
    </div>

    <script>
        if (window.lucide) lucide.createIcons();
    </script>
</body>
</html>

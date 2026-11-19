<?php
session_start();
require_once __DIR__ . '/includes/config.php';

$auth_error = '';

// Handle Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['admin_auth']);
    header('Location: admin.php');
    exit;
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_passcode'])) {
    if ($_POST['login_passcode'] === 'admin123') {
        $_SESSION['admin_auth'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $auth_error = 'Invalid Passcode. Default hint: admin123';
    }
}

$is_auth = !empty($_SESSION['admin_auth']);

if ($is_auth) {
    $db = get_db();
    $students = [];
    $quotes = [];
    $contacts = [];
    $consults = [];

    if ($db) {
        $stmt_students = $db->query("SELECT * FROM student_registrations ORDER BY created_at DESC");
        $students = $stmt_students ? $stmt_students->fetchAll() : [];

        $stmt_quotes = $db->query("SELECT * FROM quotation_requests ORDER BY created_at DESC");
        $quotes = $stmt_quotes ? $stmt_quotes->fetchAll() : [];

        $stmt_contacts = $db->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
        $contacts = $stmt_contacts ? $stmt_contacts->fetchAll() : [];

        $stmt_consults = $db->query("SELECT * FROM consultation_bookings ORDER BY created_at DESC");
        $consults = $stmt_consults ? $stmt_consults->fetchAll() : [];
    } else {
        $f_stu = __DIR__ . '/data/fallback_student_registrations.json';
        if (file_exists($f_stu)) $students = json_decode(file_get_contents($f_stu), true) ?: [];
        $f_quo = __DIR__ . '/data/fallback_quotation_requests.json';
        if (file_exists($f_quo)) $quotes = json_decode(file_get_contents($f_quo), true) ?: [];
        $f_con = __DIR__ . '/data/fallback_contact_messages.json';
        if (file_exists($f_con)) $contacts = json_decode(file_get_contents($f_con), true) ?: [];
        $f_csl = __DIR__ . '/data/fallback_consultation_bookings.json';
        if (file_exists($f_csl)) $consults = json_decode(file_get_contents($f_csl), true) ?: [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operations Console — <?= SITE_NAME ?></title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        h1, h2, h3, h4 { font-family: 'Manrope', 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen">

<?php if (!$is_auth): ?>
    <!-- Login Screen -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-slate-200 p-8 space-y-6">
            <div class="text-center">
                <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-500/30">
                    <i data-lucide="lock" class="w-7 h-7"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900 font-heading">Operations Portal</h1>
                <p class="text-xs text-slate-500 font-mono mt-1"><?= SITE_NAME ?> Management Console</p>
            </div>

            <?php if ($auth_error): ?>
                <div class="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-semibold">
                    <?= htmlspecialchars($auth_error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Passcode</label>
                    <input type="password" name="login_passcode" required autofocus class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="Enter security passcode...">
                    <span class="text-[11px] text-slate-400 mt-1 block">Default Passcode: <code class="bg-slate-100 px-1 rounded">admin123</code></span>
                </div>
                <button type="submit" class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md font-heading transition-colors">
                    Unlock Console
                </button>
                <div class="text-center pt-2">
                    <a href="index.php" class="text-xs text-slate-500 hover:text-blue-600 inline-flex items-center gap-1">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                        <span>Return to Main Website</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php else: ?>
    <!-- Authenticated Dashboard -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="index.php" class="inline-flex items-center gap-2 group">
                    <img src="assets/images/nexttechx-badge.png" class="w-8 h-8 rounded-full" alt="NextTechX">
                    <span class="font-bold text-slate-900 font-heading">NextTechX Console</span>
                </a>
                <span class="text-slate-300">|</span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-mono font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Live SQLite Database</span>
                </span>
            </div>

            <div class="flex items-center gap-3">
                <a href="admin.php" class="p-2 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 text-xs font-semibold flex items-center gap-1">
                    <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i>
                    <span class="hidden sm:inline">Refresh</span>
                </a>
                <a href="admin.php?action=logout" class="px-3.5 py-1.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 text-xs font-bold transition-colors">
                    Lock Portal
                </a>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        
        <!-- KPI Metrics -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between text-slate-500 text-xs font-mono">
                    <span>Student Applications</span>
                    <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 font-heading mt-2"><?= count($students) ?></div>
                <div class="text-[11px] text-emerald-600 font-medium mt-1">Active Registrations</div>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between text-slate-500 text-xs font-mono">
                    <span>Quotation Requests</span>
                    <i data-lucide="calculator" class="w-4 h-4 text-blue-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 font-heading mt-2"><?= count($quotes) ?></div>
                <div class="text-[11px] text-blue-600 font-medium mt-1">Pending Proposals</div>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between text-slate-500 text-xs font-mono">
                    <span>Contact Inquiries</span>
                    <i data-lucide="mail" class="w-4 h-4 text-indigo-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 font-heading mt-2"><?= count($contacts) ?></div>
                <div class="text-[11px] text-indigo-600 font-medium mt-1">Technical Leads</div>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between text-slate-500 text-xs font-mono">
                    <span>Consultations</span>
                    <i data-lucide="calendar" class="w-4 h-4 text-purple-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 font-heading mt-2"><?= count($consults) ?></div>
                <div class="text-[11px] text-purple-600 font-medium mt-1">Scheduled Calls</div>
            </div>
        </div>

        <!-- Section 1: Student Applications -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold font-heading text-slate-900">Student Internship Applications</h2>
                    <p class="text-xs text-slate-500">Live cohort candidates seeking corporate projects</p>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold font-mono"><?= count($students) ?> Total</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-mono border-b border-slate-200">
                        <tr>
                            <th class="p-3.5">Student</th>
                            <th class="p-3.5">Contact</th>
                            <th class="p-3.5">Course Selected</th>
                            <th class="p-3.5">Batch Timing</th>
                            <th class="p-3.5">Status</th>
                            <th class="p-3.5">Applied Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($students)): ?>
                            <tr><td colspan="6" class="p-6 text-center text-slate-400">No applications registered yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($students as $s): ?>
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3.5 font-bold text-slate-900">
                                        <?= htmlspecialchars($s['full_name']) ?>
                                        <div class="text-[11px] text-slate-400 font-normal"><?= htmlspecialchars($s['qualification']) ?></div>
                                    </td>
                                    <td class="p-3.5 text-slate-600">
                                        <div><?= htmlspecialchars($s['email']) ?></div>
                                        <div class="font-mono text-emerald-600"><?= htmlspecialchars($s['phone']) ?></div>
                                    </td>
                                    <td class="p-3.5">
                                        <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 font-semibold font-mono"><?= htmlspecialchars($s['course_selected']) ?></span>
                                    </td>
                                    <td class="p-3.5 text-slate-600"><?= htmlspecialchars($s['batch_timing'] ?? 'Flexible') ?></td>
                                    <td class="p-3.5">
                                        <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-bold uppercase"><?= htmlspecialchars($s['status']) ?></span>
                                    </td>
                                    <td class="p-3.5 text-slate-400 font-mono"><?= htmlspecialchars($s['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 2: Quotation Requests -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold font-heading text-slate-900">Quotation Requests</h2>
                    <p class="text-xs text-slate-500">Commercial proposals submitted via the quotation modal</p>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold font-mono"><?= count($quotes) ?> Total</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-mono border-b border-slate-200">
                        <tr>
                            <th class="p-3.5">Client</th>
                            <th class="p-3.5">Service Category</th>
                            <th class="p-3.5">Budget (INR)</th>
                            <th class="p-3.5">Requirements</th>
                            <th class="p-3.5">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($quotes)): ?>
                            <tr><td colspan="5" class="p-6 text-center text-slate-400">No quotation requests yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($quotes as $q): ?>
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3.5">
                                        <div class="font-bold text-slate-900"><?= htmlspecialchars($q['name']) ?></div>
                                        <div class="text-[11px] text-slate-500"><?= htmlspecialchars($q['email']) ?> • <?= htmlspecialchars($q['phone']) ?></div>
                                        <?php if (!empty($q['company'])): ?>
                                            <div class="text-[11px] text-blue-600"><?= htmlspecialchars($q['company']) ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="p-3.5 font-semibold text-slate-800"><?= htmlspecialchars($q['service_category']) ?></td>
                                    <td class="p-3.5 text-emerald-700 font-mono font-bold"><?= htmlspecialchars($q['budget_range'] ?? 'Flexible') ?></td>
                                    <td class="p-3.5 text-slate-600 max-w-sm"><?= htmlspecialchars($q['requirements']) ?></td>
                                    <td class="p-3.5 text-slate-400 font-mono"><?= htmlspecialchars($q['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 3: Contact Messages -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold font-heading text-slate-900">Direct Contact Inquiries</h2>
                    <p class="text-xs text-slate-500">Messages sent through the Contact Us page</p>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-bold font-mono"><?= count($contacts) ?> Total</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-mono border-b border-slate-200">
                        <tr>
                            <th class="p-3.5">Name</th>
                            <th class="p-3.5">Contact Info</th>
                            <th class="p-3.5">Interest</th>
                            <th class="p-3.5">Message</th>
                            <th class="p-3.5">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($contacts)): ?>
                            <tr><td colspan="5" class="p-6 text-center text-slate-400">No contact inquiries yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($contacts as $c): ?>
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3.5 font-bold text-slate-900"><?= htmlspecialchars($c['name']) ?></td>
                                    <td class="p-3.5 text-slate-600">
                                        <div><?= htmlspecialchars($c['email']) ?></div>
                                        <div class="font-mono text-slate-500"><?= htmlspecialchars($c['phone'] ?? '') ?></div>
                                    </td>
                                    <td class="p-3.5 text-blue-600 font-medium"><?= htmlspecialchars($c['service_interest'] ?? 'General') ?></td>
                                    <td class="p-3.5 text-slate-700 max-w-sm"><?= htmlspecialchars($c['message']) ?></td>
                                    <td class="p-3.5 text-slate-400 font-mono"><?= htmlspecialchars($c['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php endif; ?>

<script>
    if (window.lucide) {
        lucide.createIcons();
    }
</script>
</body>
</html>

<?php
// NexTechX Solutions - Centralized Submissions & Applications Portal
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';

$page_title = "Submissions & Applications Management – NEXTECHX SOLUTIONS";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="icon" type="image/png" href="favicon-32.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0f2b5c',
                            950: '#091e42'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap');
        body { font-family: 'Plus Jakarta Sans', -apple-system, sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col antialiased">

    <!-- Top App Bar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="index.php" class="flex items-center gap-2 group">
                    <img src="assets/images/nextechx-badge.webp" width="36" height="36" alt="NexTechX Solutions Logo" class="rounded-full shadow-xs object-contain">
                    <div class="flex flex-col">
                        <span class="text-base font-extrabold tracking-tight text-slate-900 flex items-center">
                            NEXTECH<span class="text-sky-500">X</span>
                            <span class="text-blue-700 ml-1">SOLUTIONS</span>
                        </span>
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Submissions Portal</span>
                    </div>
                </a>
                <span class="hidden sm:inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    Hostinger SMTP Active
                </span>
            </div>

            <div class="flex items-center gap-2 sm:gap-3">
                <button onclick="openSmtpTestModal()" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:border-slate-400 transition-colors shadow-2xs">
                    <i data-lucide="send" class="w-3.5 h-3.5 text-sky-600"></i>
                    <span class="hidden sm:inline">Test Delivery to</span> Gmail
                </button>
                <button onclick="exportCsv()" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 hover:border-slate-400 transition-colors shadow-2xs">
                    <i data-lucide="download" class="w-3.5 h-3.5 text-slate-500"></i>
                    <span>Export CSV</span>
                </button>
                <a href="index.php" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-lg bg-brand-900 text-white hover:bg-brand-950 transition-colors shadow-2xs">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    <span class="hidden sm:inline">View Website</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Workspace -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">

        <!-- Banner / Notification Settings Info -->
        <div class="bg-gradient-to-r from-brand-950 via-slate-900 to-brand-900 rounded-2xl p-5 sm:p-6 text-white shadow-md relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-sky-500/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-2 text-xs font-bold text-sky-400 uppercase tracking-wider">
                        <i data-lucide="shield-check" class="w-4 h-4"></i>
                        <span>Centralized Notifications Routing</span>
                    </div>
                    <h1 class="text-xl sm:text-2xl font-black tracking-tight">Form Submissions & Applications Manager</h1>
                    <p class="text-xs sm:text-sm text-slate-300 max-w-2xl">
                        All submissions across Contact, Careers, Internships, Quotes, and Consultations are automatically saved in the database first, then dispatched to <strong class="text-white">nextechxsolutions@gmail.com</strong> with attachments and auto-confirmations to applicants.
                    </p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/15 text-center min-w-[110px]">
                        <span class="block text-2xl font-black text-white" id="statTotalSubmissions">-</span>
                        <span class="block text-[10px] font-bold text-sky-200 uppercase tracking-wider">Total Submissions</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/15 text-center min-w-[110px]">
                        <span class="block text-2xl font-black text-amber-300" id="statPendingAction">-</span>
                        <span class="block text-[10px] font-bold text-amber-200 uppercase tracking-wider">Needs Action</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metric Filter Pills -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
            <button onclick="setFormFilter('career')" class="filter-card bg-white p-3.5 rounded-xl border border-slate-200 hover:border-emerald-300 transition-all text-left group shadow-2xs">
                <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                    <span class="font-semibold group-hover:text-emerald-700">Careers</span>
                    <i data-lucide="briefcase" class="w-4 h-4 text-emerald-600"></i>
                </div>
                <div class="text-xl font-black text-slate-900" id="statCareers">0</div>
                <div class="text-[10px] text-slate-400">Resumes & Candidates</div>
            </button>

            <button onclick="setFormFilter('internship')" class="filter-card bg-white p-3.5 rounded-xl border border-slate-200 hover:border-teal-300 transition-all text-left group shadow-2xs">
                <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                    <span class="font-semibold group-hover:text-teal-700">Internships</span>
                    <i data-lucide="graduation-cap" class="w-4 h-4 text-teal-600"></i>
                </div>
                <div class="text-xl font-black text-slate-900" id="statInternships">0</div>
                <div class="text-[10px] text-slate-400">Student Registrations</div>
            </button>

            <button onclick="setFormFilter('contact')" class="filter-card bg-white p-3.5 rounded-xl border border-slate-200 hover:border-blue-300 transition-all text-left group shadow-2xs">
                <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                    <span class="font-semibold group-hover:text-blue-700">Contact</span>
                    <i data-lucide="message-square" class="w-4 h-4 text-blue-600"></i>
                </div>
                <div class="text-xl font-black text-slate-900" id="statContact">0</div>
                <div class="text-[10px] text-slate-400">General Enquiries</div>
            </button>

            <button onclick="setFormFilter('quote')" class="filter-card bg-white p-3.5 rounded-xl border border-slate-200 hover:border-amber-300 transition-all text-left group shadow-2xs">
                <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                    <span class="font-semibold group-hover:text-amber-700">Quotations</span>
                    <i data-lucide="calculator" class="w-4 h-4 text-amber-600"></i>
                </div>
                <div class="text-xl font-black text-slate-900" id="statQuotes">0</div>
                <div class="text-[10px] text-slate-400">Project Estimates</div>
            </button>

            <button onclick="setFormFilter('consultation')" class="filter-card bg-white p-3.5 rounded-xl border border-slate-200 hover:border-purple-300 transition-all text-left group shadow-2xs col-span-2 sm:col-span-1">
                <div class="flex items-center justify-between text-xs text-slate-500 mb-1">
                    <span class="font-semibold group-hover:text-purple-700">Consultations</span>
                    <i data-lucide="calendar" class="w-4 h-4 text-purple-600"></i>
                </div>
                <div class="text-xl font-black text-slate-900" id="statConsultations">0</div>
                <div class="text-[10px] text-slate-400">Booked Strategy Calls</div>
            </button>
        </div>

        <!-- Controls & Filters Bar -->
        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-2xs space-y-3">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                <!-- Search -->
                <div class="relative flex-1 max-w-md">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="text" id="searchInput" oninput="applyFilters()" placeholder="Search by name, email, phone, topic, or ref ID..." class="w-full pl-9 pr-4 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 bg-slate-50/50">
                </div>

                <!-- Dropdown Filters -->
                <div class="flex flex-wrap items-center gap-2">
                    <select id="statusFilter" onchange="applyFilters()" class="text-xs border border-slate-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-sky-500">
                        <option value="">All Statuses</option>
                        <option value="new">New / Uncontacted</option>
                        <option value="under_review">Under Review</option>
                        <option value="contacted">Contacted</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="shortlisted">Shortlisted</option>
                        <option value="selected">Selected</option>
                        <option value="rejected">Rejected</option>
                        <option value="closed">Closed</option>
                    </select>

                    <select id="emailFilter" onchange="applyFilters()" class="text-xs border border-slate-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-sky-500">
                        <option value="">All Email States</option>
                        <option value="sent">Email Sent</option>
                        <option value="failed">Email Failed / Pending</option>
                    </select>

                    <button onclick="fetchSubmissions()" class="p-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors" title="Refresh Submissions">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Form Tabs -->
            <div class="flex items-center gap-1.5 border-t border-slate-100 pt-3 overflow-x-auto text-xs">
                <button onclick="setFormFilter('all')" id="tab-all" class="tab-btn px-3 py-1.5 rounded-lg font-bold bg-slate-900 text-white">All Submissions</button>
                <button onclick="setFormFilter('career')" id="tab-career" class="tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100">Careers</button>
                <button onclick="setFormFilter('internship')" id="tab-internship" class="tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100">Internships</button>
                <button onclick="setFormFilter('contact')" id="tab-contact" class="tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100">Contact</button>
                <button onclick="setFormFilter('quote')" id="tab-quote" class="tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100">Quotations</button>
                <button onclick="setFormFilter('consultation')" id="tab-consultation" class="tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100">Consultations</button>
            </div>
        </div>

        <!-- Submissions Table Card -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-2xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-semibold uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-4">Form</th>
                            <th class="py-3 px-4">Date / Ref</th>
                            <th class="py-3 px-4">Submitter</th>
                            <th class="py-3 px-4">Topic / Program</th>
                            <th class="py-3 px-4">Attachment</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Email Status</th>
                            <th class="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="submissionsTableBody" class="divide-y divide-slate-100">
                        <tr>
                            <td colspan="8" class="py-12 text-center text-slate-400">
                                <i data-lucide="loader-2" class="w-6 h-6 animate-spin mx-auto mb-2 text-sky-500"></i>
                                Loading submissions from database...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="emptyState" class="hidden py-16 text-center text-slate-400">
                <i data-lucide="inbox" class="w-10 h-10 mx-auto mb-3 text-slate-300"></i>
                <p class="font-semibold text-slate-600">No submissions found</p>
                <p class="text-xs text-slate-400 mt-0.5">Try adjusting your filters or search query.</p>
            </div>

            <!-- Table Footer -->
            <div class="bg-slate-50 px-4 py-2.5 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500">
                <div>Showing <span id="visibleCount" class="font-bold text-slate-800">0</span> submissions</div>
                <div class="text-[11px] text-slate-400">NEXTECHX SOLUTIONS Centralized DB</div>
            </div>
        </div>

    </main>

    <!-- Details Overlay Modal -->
    <div id="detailsModal" class="fixed inset-0 z-50 hidden bg-slate-950/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full border border-slate-200 shadow-2xl overflow-hidden my-8 max-h-[90vh] flex flex-col animate-in fade-in zoom-in-95 duration-150">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-2.5">
                    <span id="modalFormBadge" class="px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-sky-50 text-sky-700 border border-sky-200">Form</span>
                    <h3 class="text-base font-bold text-slate-900" id="modalTitle">Submission Details</h3>
                </div>
                <button onclick="closeDetailsModal()" class="p-1 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            
            <div class="p-6 overflow-y-auto space-y-4 text-xs flex-1" id="modalContent">
                <!-- Injected via JS -->
            </div>

            <div class="p-4 border-t border-slate-100 bg-slate-50 flex items-center justify-between gap-3">
                <div class="flex items-center gap-2" id="modalQuickLinks">
                    <!-- WhatsApp and Mailto buttons -->
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="resendModalSubmission()" id="modalResendBtn" class="px-3.5 py-2 rounded-lg bg-white border border-slate-200 font-semibold text-slate-700 hover:bg-slate-50 transition-colors flex items-center gap-1.5">
                        <i data-lucide="refresh-cw" class="w-3.5 h-3.5 text-sky-600"></i>
                        <span>Resend Email</span>
                    </button>
                    <button onclick="closeDetailsModal()" class="px-4 py-2 rounded-lg bg-slate-900 text-white font-semibold hover:bg-slate-800 transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Live SMTP Delivery Test Modal -->
    <div id="smtpModal" class="fixed inset-0 z-50 hidden bg-slate-950/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full border border-slate-200 shadow-2xl overflow-hidden p-6 space-y-4 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div class="flex items-center gap-2">
                    <div class="p-2 rounded-lg bg-sky-50 text-sky-600 border border-sky-100">
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Direct SMTP Delivery Test</h3>
                        <p class="text-[11px] text-slate-500">Verify Hostinger SMTP credentials & connection</p>
                    </div>
                </div>
                <button onclick="closeSmtpTestModal()" class="text-slate-400 hover:text-slate-700">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <div class="space-y-3 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Target Test Recipient</label>
                    <input type="email" id="smtpTestRecipient" value="nextechxsolutions@gmail.com" class="w-full px-3 py-2 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 font-mono text-xs">
                    <p class="text-[11px] text-slate-400 mt-1">Default company notification destination.</p>
                </div>

                <div id="smtpTestStatus" class="hidden p-3.5 rounded-xl border text-xs space-y-2">
                    <!-- Status message injected here -->
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-2">
                <button onclick="closeSmtpTestModal()" class="px-3.5 py-2 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50 font-semibold text-xs">Cancel</button>
                <button onclick="runSmtpTest()" id="smtpTestBtn" class="px-4 py-2 rounded-lg bg-brand-900 hover:bg-brand-950 text-white font-bold text-xs flex items-center gap-1.5 shadow-2xs">
                    <span>Dispatch Test Email</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Client-side script for dynamic table loading & actions -->
    <script>
        let allSubmissions = [];
        let activeFormFilter = 'all';
        let currentModalSubmission = null;

        document.addEventListener('DOMContentLoaded', () => {
            fetchSubmissions();
            if (window.lucide) lucide.createIcons();
        });

        async function fetchSubmissions() {
            const tbody = document.getElementById('submissionsTableBody');
            try {
                const res = await fetch('api/submissions.php?action=all');
                const data = await res.json();
                if (data.success) {
                    allSubmissions = data.submissions || [];
                    updateStats(data.counts);
                    applyFilters();
                } else {
                    tbody.innerHTML = `<tr><td colspan="8" class="py-8 text-center text-red-500 font-medium">Failed to load submissions: ${data.error || 'Server error'}</td></tr>`;
                }
            } catch (err) {
                tbody.innerHTML = `<tr><td colspan="8" class="py-8 text-center text-red-500 font-medium">Network error connecting to Submissions API</td></tr>`;
            }
        }

        function updateStats(counts) {
            if (!counts) return;
            document.getElementById('statTotalSubmissions').textContent = counts.total || 0;
            document.getElementById('statPendingAction').textContent = counts.pending_action || 0;
            document.getElementById('statCareers').textContent = counts.career || 0;
            document.getElementById('statInternships').textContent = counts.internship || 0;
            document.getElementById('statContact').textContent = counts.contact || 0;
            document.getElementById('statQuotes').textContent = counts.quote || 0;
            document.getElementById('statConsultations').textContent = counts.consultation || 0;
        }

        function setFormFilter(type) {
            activeFormFilter = type;
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.className = 'tab-btn px-3 py-1.5 rounded-lg font-medium text-slate-600 hover:bg-slate-100';
            });
            const activeTab = document.getElementById(`tab-${type}`);
            if (activeTab) {
                activeTab.className = 'tab-btn px-3 py-1.5 rounded-lg font-bold bg-slate-900 text-white';
            }
            applyFilters();
        }

        function applyFilters() {
            const query = (document.getElementById('searchInput').value || '').toLowerCase().trim();
            const statusFilter = (document.getElementById('statusFilter').value || '').toLowerCase();
            const emailFilter = (document.getElementById('emailFilter').value || '').toLowerCase();

            const filtered = allSubmissions.filter(item => {
                // Form type filter
                if (activeFormFilter !== 'all' && item.form_type !== activeFormFilter) return false;
                
                // Status filter
                if (statusFilter && (item.status || '').toLowerCase() !== statusFilter) return false;

                // Email state filter
                if (emailFilter === 'sent' && !item.email_sent) return false;
                if (emailFilter === 'failed' && item.email_sent) return false;

                // Search query filter
                if (query) {
                    const searchCorpus = [
                        item.name,
                        item.email,
                        item.phone,
                        item.company,
                        item.topic,
                        item.message,
                        item.form_title,
                        `NTX-${item.id}`
                    ].filter(Boolean).join(' ').toLowerCase();

                    if (!searchCorpus.includes(query)) return false;
                }

                return true;
            });

            renderTable(filtered);
        }

        function renderTable(items) {
            const tbody = document.getElementById('submissionsTableBody');
            const empty = document.getElementById('emptyState');
            document.getElementById('visibleCount').textContent = items.length;

            if (items.length === 0) {
                tbody.innerHTML = '';
                empty.classList.remove('hidden');
                return;
            }

            empty.classList.add('hidden');
            let html = '';

            items.forEach((item, idx) => {
                // Form Badge
                const formBadgeMap = {
                    career: '<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Career</span>',
                    internship: '<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-teal-50 text-teal-700 border border-teal-200">Intern</span>',
                    contact: '<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200">Contact</span>',
                    quote: '<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">Quote</span>',
                    consultation: '<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-50 text-purple-700 border border-purple-200">Consult</span>'
                };
                const badge = formBadgeMap[item.form_type] || `<span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700">${item.form_type}</span>`;

                // Attachment Pill
                let attHtml = '<span class="text-slate-300">-</span>';
                if (item.has_attachment) {
                    attHtml = `<a href="api/submissions.php?action=download_attachment&table=${item.table}&id=${item.id}" target="_blank" class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-800 border border-emerald-200 font-semibold text-[11px] hover:bg-emerald-100 transition-colors" title="${item.attachment_name}">
                        <i data-lucide="paperclip" class="w-3 h-3 text-emerald-600 shrink-0"></i>
                        <span class="truncate max-w-[100px]">${item.attachment_name || 'Download'}</span>
                    </a>`;
                }

                // Email indicator
                let emailBadge = '';
                if (item.email_sent) {
                    emailBadge = '<span class="inline-flex items-center gap-1 text-emerald-700 font-semibold" title="Delivered to Admin & Applicant"><i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-600"></i> Dispatched</span>';
                } else {
                    const tip = item.email_error ? item.email_error.replace(/"/g, '&quot;') : 'Pending SMTP authorization';
                    emailBadge = `<span class="inline-flex items-center gap-1 text-amber-600 font-medium cursor-help" title="${tip}"><i data-lucide="alert-circle" class="w-3.5 h-3.5 text-amber-500"></i> Queued</span>`;
                }

                // Status select dropdown
                const statuses = ['new', 'under_review', 'contacted', 'scheduled', 'shortlisted', 'selected', 'rejected', 'closed'];
                let statusOptions = '';
                statuses.forEach(s => {
                    const sel = (item.status === s) ? 'selected' : '';
                    const label = s.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
                    statusOptions += `<option value="${s}" ${sel}>${label}</option>`;
                });

                html += `
                <tr class="hover:bg-slate-50/70 transition-colors">
                    <td class="py-3 px-4 whitespace-nowrap">${badge}</td>
                    <td class="py-3 px-4 whitespace-nowrap">
                        <div class="font-medium text-slate-900">${formatDate(item.created_at)}</div>
                        <div class="text-[10px] text-slate-400 font-mono">#${item.id}</div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-bold text-slate-900">${escapeHtml(item.name)}</div>
                        <div class="text-[11px] text-slate-500"><a href="mailto:${escapeHtml(item.email)}" class="hover:text-sky-600 underline">${escapeHtml(item.email)}</a></div>
                        ${item.phone ? `<div class="text-[10px] text-slate-400">${escapeHtml(item.phone)}</div>` : ''}
                    </td>
                    <td class="py-3 px-4">
                        <div class="font-medium text-slate-800 line-clamp-1">${item.topic || '-'}</div>
                        ${item.company ? `<div class="text-[10px] text-slate-400 font-semibold">${escapeHtml(item.company)}</div>` : ''}
                    </td>
                    <td class="py-3 px-4 whitespace-nowrap">${attHtml}</td>
                    <td class="py-3 px-4 whitespace-nowrap">
                        <select onchange="updateSubmissionStatus('${item.table}', ${item.id}, this.value)" class="text-[11px] font-semibold border border-slate-200 rounded-md px-2 py-1 bg-white focus:outline-none focus:ring-1 focus:ring-sky-500 cursor-pointer">
                            ${statusOptions}
                        </select>
                    </td>
                    <td class="py-3 px-4 whitespace-nowrap">${emailBadge}</td>
                    <td class="py-3 px-4 whitespace-nowrap text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <button onclick="viewDetails(${idx})" class="p-1.5 rounded-md text-slate-500 hover:text-slate-900 hover:bg-slate-100" title="View Submission Details">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </button>
                            <button onclick="resendEmail('${item.table}', ${item.id})" class="p-1.5 rounded-md text-sky-600 hover:bg-sky-50" title="Resend Notification Email">
                                <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                            </button>
                            ${item.email ? `<a href="mailto:${escapeHtml(item.email)}?subject=Regarding%20your%20submission%20to%20NEXTECHX%20SOLUTIONS" class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50" title="Reply via Email"><i data-lucide="mail" class="w-4 h-4"></i></a>` : ''}
                            ${item.phone ? `<a href="https://wa.me/${item.phone.replace(/[^0-9]/g, '')}" target="_blank" class="p-1.5 rounded-md text-slate-500 hover:text-emerald-600 hover:bg-emerald-50" title="Chat on WhatsApp"><i data-lucide="phone" class="w-4 h-4"></i></a>` : ''}
                        </div>
                    </td>
                </tr>
                `;
            });

            tbody.innerHTML = html;
            if (window.lucide) lucide.createIcons();
        }

        async function updateSubmissionStatus(table, id, status) {
            try {
                const res = await fetch('api/submissions.php?action=update_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ table, id, status })
                });
                const data = await res.json();
                if (data.success) {
                    const item = allSubmissions.find(s => s.table === table && s.id === id);
                    if (item) item.status = status;
                } else {
                    alert('Error updating status: ' + (data.error || 'Server error'));
                }
            } catch (err) {
                alert('Network error updating status');
            }
        }

        async function resendEmail(table, id) {
            if (!confirm('Re-dispatch email notification to nextechxsolutions@gmail.com and user confirmation?')) return;
            try {
                const res = await fetch(`api/submissions.php?action=resend_email&table=${table}&id=${id}`, {
                    method: 'POST'
                });
                const data = await res.json();
                if (data.success) {
                    alert(data.message || 'Email dispatched successfully.');
                    fetchSubmissions();
                } else {
                    alert('Error: ' + (data.error || 'Failed to dispatch email'));
                }
            } catch (err) {
                alert('Network error re-sending email.');
            }
        }

        function viewDetails(index) {
            const item = allSubmissions[index];
            if (!item) return;
            currentModalSubmission = item;

            document.getElementById('modalFormBadge').textContent = item.form_title;
            document.getElementById('modalTitle').textContent = item.name + ' – Details';

            const quickLinks = document.getElementById('modalQuickLinks');
            quickLinks.innerHTML = `
                ${item.email ? `<a href="mailto:${escapeHtml(item.email)}" class="px-2.5 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50 font-medium inline-flex items-center gap-1.5"><i data-lucide="mail" class="w-3.5 h-3.5 text-blue-600"></i> Reply Email</a>` : ''}
                ${item.phone ? `<a href="https://wa.me/${item.phone.replace(/[^0-9]/g, '')}" target="_blank" class="px-2.5 py-1.5 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-50 font-medium inline-flex items-center gap-1.5"><i data-lucide="phone" class="w-3.5 h-3.5 text-emerald-600"></i> WhatsApp</a>` : ''}
            `;

            let fieldsHtml = `
            <div class="grid grid-cols-2 gap-3 p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Submitter Name</span>
                    <span class="font-bold text-slate-900">${escapeHtml(item.name)}</span>
                </div>
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Email Address</span>
                    <span class="font-semibold text-slate-900"><a href="mailto:${escapeHtml(item.email)}" class="text-sky-600 underline">${escapeHtml(item.email)}</a></span>
                </div>
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Phone Number</span>
                    <span class="font-semibold text-slate-900">${escapeHtml(item.phone || 'None')}</span>
                </div>
                <div>
                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Submission Date</span>
                    <span class="font-medium text-slate-700">${item.created_at}</span>
                </div>
                ${item.company ? `
                <div class="col-span-2">
                    <span class="text-slate-400 block text-[10px] uppercase font-bold">Company / Organization</span>
                    <span class="font-medium text-slate-800">${escapeHtml(item.company)}</span>
                </div>` : ''}
            </div>

            <div class="p-3.5 bg-white rounded-xl border border-slate-200 space-y-2">
                <span class="text-slate-400 block text-[10px] uppercase font-bold">Topic / Requirements / Scope</span>
                <div class="font-semibold text-slate-900">${item.topic}</div>
                ${item.message ? `<div class="p-3 rounded-lg bg-slate-50 border border-slate-100 text-slate-700 whitespace-pre-wrap font-sans text-xs">${escapeHtml(item.message)}</div>` : ''}
            </div>
            `;

            if (item.has_attachment) {
                fieldsHtml += `
                <div class="p-3.5 bg-emerald-50/50 rounded-xl border border-emerald-200 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i data-lucide="file-text" class="w-5 h-5 text-emerald-600"></i>
                        <div>
                            <div class="font-bold text-emerald-900">${escapeHtml(item.attachment_name)}</div>
                            <div class="text-[10px] text-emerald-700">Uploaded resume / project document</div>
                        </div>
                    </div>
                    <a href="api/submissions.php?action=download_attachment&table=${item.table}&id=${item.id}" target="_blank" class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white font-bold hover:bg-emerald-700 transition-colors inline-flex items-center gap-1.5">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                        <span>Download</span>
                    </a>
                </div>
                `;
            }

            document.getElementById('modalContent').innerHTML = fieldsHtml;
            document.getElementById('detailsModal').classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
        }

        function closeDetailsModal() {
            document.getElementById('detailsModal').classList.add('hidden');
            currentModalSubmission = null;
        }

        function resendModalSubmission() {
            if (!currentModalSubmission) return;
            resendEmail(currentModalSubmission.table, currentModalSubmission.id);
        }

        // SMTP Modal
        function openSmtpTestModal() {
            document.getElementById('smtpModal').classList.remove('hidden');
            document.getElementById('smtpTestStatus').className = 'hidden';
            if (window.lucide) lucide.createIcons();
        }

        function closeSmtpTestModal() {
            document.getElementById('smtpModal').classList.add('hidden');
        }

        async function runSmtpTest() {
            const btn = document.getElementById('smtpTestBtn');
            const statusBox = document.getElementById('smtpTestStatus');
            const recipient = document.getElementById('smtpTestRecipient').value.trim() || 'nextechxsolutions@gmail.com';

            btn.disabled = true;
            btn.innerHTML = '<span>Testing SMTP...</span>';
            statusBox.className = 'p-3.5 rounded-xl border border-blue-200 bg-blue-50 text-blue-800 text-xs block';
            statusBox.innerHTML = '<div class="flex items-center gap-2"><i data-lucide="loader-2" class="w-4 h-4 animate-spin text-blue-600"></i> Connecting to Hostinger SMTP (Port 465 SSL)...</div>';
            if (window.lucide) lucide.createIcons();

            try {
                const res = await fetch('api/submissions.php?action=test_smtp', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'recipient=' + encodeURIComponent(recipient)
                });
                const data = await res.json();
                if (data.success) {
                    statusBox.className = 'p-3.5 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-800 text-xs block space-y-1';
                    statusBox.innerHTML = `
                        <div class="font-bold text-sm text-emerald-900 flex items-center gap-1.5">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i>
                            SMTP Connection Successful!
                        </div>
                        <p>${data.message}</p>
                        <div class="text-[11px] text-emerald-700 font-mono mt-1">Host: smtp.hostinger.com | Port: ${data.port} | From: ${data.from}</div>
                    `;
                } else {
                    statusBox.className = 'p-3.5 rounded-xl border border-red-200 bg-red-50 text-red-800 text-xs block space-y-1';
                    statusBox.innerHTML = `
                        <div class="font-bold text-sm text-red-900 flex items-center gap-1.5">
                            <i data-lucide="alert-triangle" class="w-4 h-4 text-red-600"></i>
                            SMTP Delivery Notice
                        </div>
                        <p class="font-mono text-[11px] break-all">${data.error || 'Connection failed'}</p>
                    `;
                }
            } catch (err) {
                statusBox.className = 'p-3.5 rounded-xl border border-red-200 bg-red-50 text-red-800 text-xs block';
                statusBox.innerHTML = '❌ Network request error connecting to test endpoint.';
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<span>Dispatch Test Email</span><i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>';
                if (window.lucide) lucide.createIcons();
            }
        }

        function exportCsv() {
            window.location.href = `api/submissions.php?action=export_csv&table=${activeFormFilter !== 'all' ? activeFormFilter : ''}`;
        }

        function formatDate(dStr) {
            if (!dStr) return '-';
            const d = new Date(dStr);
            if (isNaN(d.getTime())) return dStr;
            return d.toLocaleDateString('en-IN', { day: '2-digit', month: 'short', year: 'numeric' });
        }

        function escapeHtml(text) {
            if (!text) return '';
            return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }
    </script>
</body>
</html>

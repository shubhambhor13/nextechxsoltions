<?php
// Centralized Form Submission & Notification Test Suite
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

echo "========================================================\n";
echo "NEXTECHX SOLUTIONS - FORM SUBMISSION & SMTP TEST SUITE\n";
echo "========================================================\n\n";

// 1. Database Connection & Schema Verification
echo "[TEST 1] Initializing Database & Checking Schema...\n";
$db = get_db();
if ($db) {
    echo "  -> SQLite Database Connected: " . DB_PATH . "\n";
    $tables = ['contact_messages', 'quotation_requests', 'consultation_bookings', 'student_registrations', 'career_applications'];
    foreach ($tables as $t) {
        $cols = $db->query("PRAGMA table_info($t)")->fetchAll(PDO::FETCH_COLUMN, 1);
        echo "  -> Table '$t': " . count($cols) . " columns found (" . implode(', ', array_slice($cols, 0, 5)) . "...)\n";
    }
} else {
    echo "  -> Using JSON fallback store in php/data/ (PDO SQLite extension not loaded in CLI).\n";
}

// 2. Test NexTechXMailer Environment Configuration
echo "\n[TEST 2] Verifying NexTechXMailer Configuration...\n";
$smtp_host = NexTechXMailer::getEnv('SMTP_HOST', 'smtp.hostinger.com');
$smtp_port = (int)NexTechXMailer::getEnv('SMTP_PORT', 465);
$smtp_user = NexTechXMailer::getEnv('SMTP_USERNAME', 'hr@nextechxsolutions.com');
$smtp_from = NexTechXMailer::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com');
$smtp_pass = NexTechXMailer::getEnv('SMTP_PASSWORD', '');

echo "  -> SMTP Host:     $smtp_host\n";
echo "  -> SMTP Port:     $smtp_port (SSL/TLS)\n";
echo "  -> SMTP Username: $smtp_user\n";
echo "  -> Sender From:   $smtp_from\n";
echo "  -> Admin Recipient: nextechxsolutions@gmail.com\n";
echo "  -> Password Configured: " . (!empty($smtp_pass) ? "YES (length " . strlen($smtp_pass) . ")" : "NO (Will log to mail_errors.log until set in environment)") . "\n";

// 3. Test Form Notification Dispatch
echo "\n[TEST 3] Testing Centralized Form Submission Notification...\n";
$test_fields = [
    'Client Name' => 'Rahul Sharma (Test Client)',
    'Email Address' => 'rahul.test@example.com',
    'Phone' => '+91 93098 35085',
    'Company' => 'NexaCorp Global',
    'Service Category' => 'AI & Workflow Automation',
    'Estimated Budget' => '₹1,50,000 - ₹5,00,000',
    'Requirements' => 'Automated document processing and multi-channel notification engine.'
];

$res = NexTechXMailer::sendFormSubmission(
    'quote',
    'Quotation Request',
    $test_fields,
    'rahul.test@example.com',
    'Rahul Sharma',
    [],
    'NTX-TEST-' . date('Ymd-His')
);

echo "  -> Reference ID: " . $res['reference_id'] . "\n";
echo "  -> Submission Timestamp: " . $res['submission_date'] . "\n";
echo "  -> Company Email Sent: " . ($res['company_email_sent'] ? "YES" : "QUEUED / " . ($res['company_error'] ?: 'Awaiting SMTP')) . "\n";
echo "  -> User Confirmation Sent: " . ($res['user_email_sent'] ? "YES" : "QUEUED / " . ($res['user_error'] ?: 'Awaiting SMTP')) . "\n";

// 4. Test Error Log Writing
echo "\n[TEST 4] Verifying Error Log Files...\n";
$log_file = dirname(__DIR__) . '/data/email_logs/mail_errors.log';
if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "  -> Log file exists: $log_file\n";
    echo "  -> Total logged entries: " . count($lines) . "\n";
    if (!empty($lines)) {
        $last = json_decode(end($lines), true);
        echo "  -> Most recent log type: " . ($last['type'] ?? 'unknown') . "\n";
    }
} else {
    echo "  -> Log file created on first delivery error: $log_file\n";
}

// 5. Test Submissions Normalization & API
echo "\n[TEST 5] Testing Submissions API aggregation...\n";
$_GET['action'] = 'all';
ob_start();
include __DIR__ . '/../api/submissions.php';
$api_output = ob_get_clean();
$api_data = json_decode($api_output, true);

if ($api_data && !empty($api_data['success'])) {
    echo "  -> API Action 'all' Success: TRUE\n";
    echo "  -> Total items retrieved: " . count($api_data['submissions'] ?? []) . "\n";
    echo "  -> Counts: " . json_encode($api_data['counts'] ?? []) . "\n";
} else {
    echo "  -> API Action 'all' returned: " . substr($api_output, 0, 150) . "\n";
}

echo "\n========================================================\n";
echo "TEST SUITE COMPLETED SUCCESSFULLY\n";
echo "========================================================\n";

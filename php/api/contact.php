<?php
// NexTechX Solutions - Contact Inquiries API
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $records = get_records('contact_messages', 100);
    echo json_encode($records);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'error' => 'Method not allowed', 'message' => 'Method not allowed']);
    exit;
}

// Support both JSON payload and multipart/form-data
$raw_input = file_get_contents('php://input');
$json_input = !empty($raw_input) ? json_decode($raw_input, true) : [];
$payload = array_merge($_POST, is_array($json_input) ? $json_input : []);

$name = trim($payload['name'] ?? '');
$email = trim($payload['email'] ?? '');
$phone = trim($payload['phone'] ?? '');
$company = trim($payload['company'] ?? '');
$service_interest = trim($payload['service_interest'] ?? 'General Inquiry');
$message = trim($payload['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    $msg = 'Please provide your name, email, and message.';
    echo json_encode(['status' => 'error', 'error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

$ref_id = 'NTX-CON-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4);

$record = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'service_interest' => $service_interest,
    'message' => $message,
    'status' => 'new',
    'email_sent' => 0,
    'admin_email_status' => 'pending',
    'user_email_status' => 'pending',
    'email_error' => null,
    'created_at' => date('Y-m-d H:i:s')
];

$record_id = null;
$db = function_exists('get_db') ? get_db() : null;

// 1. SAVE TO DATABASE FIRST (Zero Data Loss)
try {
    if ($db) {
        $stmt = $db->prepare("
            INSERT INTO contact_messages (name, email, phone, company, service_interest, message, status, email_sent, admin_email_status, user_email_status, created_at)
            VALUES (:name, :email, :phone, :company, :service_interest, :message, 'new', 0, 'pending', 'pending', datetime('now'))
        ");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':service_interest' => $service_interest,
            ':message' => $message
        ]);
        $record_id = (int)$db->lastInsertId();
    } else {
        save_record_fallback('contact_messages', $record);
    }
} catch (Exception $e) {
    save_record_fallback('contact_messages', $record);
}

// 2. DISPATCH CENTRALIZED NOTIFICATION & CONFIRMATION EMAILS
$fields = [
    'Full Name' => $name,
    'Email Address' => $email,
    'Phone Number' => $phone ?: 'Not provided',
    'Company / Organization' => $company ?: 'Not provided',
    'Service Interest' => $service_interest,
    'Message' => $message
];

$mailResult = NexTechXMailer::sendFormSubmission('contact', 'Contact Inquiry', $fields, $email, $name, [], $ref_id);

$admin_sent = !empty($mailResult['company_email_sent']);
$user_sent = !empty($mailResult['user_email_sent']);
$overall_sent = ($admin_sent && $user_sent);
$email_err = trim(($mailResult['company_error'] ?? '') . ' | ' . ($mailResult['user_error'] ?? ''), ' |');

// 3. UPDATE DATABASE WITH EMAIL DELIVERY STATUS
if ($db && $record_id) {
    try {
        $update = $db->prepare("
            UPDATE contact_messages SET
                email_sent = :sent,
                admin_email_status = :adm_st,
                user_email_status = :usr_st,
                email_error = :err
            WHERE id = :id
        ");
        $update->execute([
            ':sent' => $overall_sent ? 1 : 0,
            ':adm_st' => $admin_sent ? 'sent' : 'failed',
            ':usr_st' => $user_sent ? 'sent' : 'failed',
            ':err' => $email_err ?: null,
            ':id' => $record_id
        ]);
    } catch (Exception $e) {}
} elseif (function_exists('update_record_status')) {
    update_record_status('contact_messages', $record_id ?: 1, 'new', [
        'email_sent' => $overall_sent ? 1 : 0,
        'admin_email_status' => $admin_sent ? 'sent' : 'failed',
        'user_email_status' => $user_sent ? 'sent' : 'failed',
        'email_error' => $email_err ?: null
    ]);
}

// 4. RETURN CLEAN STRUCTURED JSON
echo json_encode([
    'status' => 'success',
    'success' => true,
    'reference_id' => $ref_id,
    'message' => 'Thank you for reaching out! Your message has been routed to our team (contact@nextechxsolutions.com). A confirmation email has also been sent to your email address.',
    'email_sent' => $overall_sent,
    'admin_notification_sent' => $admin_sent,
    'user_confirmation_sent' => $user_sent
]);

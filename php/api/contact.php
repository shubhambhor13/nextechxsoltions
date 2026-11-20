<?php
// NextTechX Solutions - Contact Inquiries API
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = function_exists('get_db') ? get_db() : null;
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM contact_messages ORDER BY id DESC LIMIT 50");
            echo json_encode($stmt->fetchAll());
            exit;
        } catch (Exception $e) {}
    }
    $fallback_file = dirname(DB_PATH) . '/fallback_contact_messages.json';
    $data = file_exists($fallback_file) ? json_decode(file_get_contents($fallback_file), true) : [];
    echo json_encode(is_array($data) ? $data : []);
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

$record = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'service_interest' => $service_interest,
    'message' => $message,
    'status' => 'new'
];

try {
    $db = function_exists('get_db') ? get_db() : null;
    if ($db) {
        $stmt = $db->prepare("
            INSERT INTO contact_messages (name, email, phone, company, service_interest, message, status, created_at)
            VALUES (:name, :email, :phone, :company, :service_interest, :message, 'new', datetime('now'))
        ");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':service_interest' => $service_interest,
            ':message' => $message
        ]);
    } else {
        save_record_fallback('contact_messages', $record);
    }

    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Thank you for reaching out! Your message has been routed to our team (' . SITE_EMAIL_CONTACT . '). We will respond shortly via email or phone.'
    ]);
} catch (Exception $e) {
    save_record_fallback('contact_messages', $record);
    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Thank you for reaching out! Your message has been routed to our team (' . SITE_EMAIL_CONTACT . '). We will respond shortly via email or phone.'
    ]);
}

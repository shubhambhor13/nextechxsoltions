<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$company = trim($_POST['company'] ?? '');
$service_interest = trim($_POST['service_interest'] ?? 'General Inquiry');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please provide your name, email, and message.']);
    exit;
}

try {
    $db = get_db();
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
        save_record_fallback('contact_messages', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'service_interest' => $service_interest,
            'message' => $message,
            'status' => 'new'
        ]);
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you for reaching out! Your message has been routed to our team (' . SITE_EMAIL_CONTACT . '). We will respond shortly via email or phone.'
    ]);
} catch (Exception $e) {
    save_record_fallback('contact_messages', [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'service_interest' => $service_interest,
        'message' => $message,
        'status' => 'new'
    ]);
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you for reaching out! Your message has been routed to our team (' . SITE_EMAIL_CONTACT . '). We will respond shortly via email or phone.'
    ]);
}
?>

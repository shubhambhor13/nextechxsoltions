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
$topic = trim($_POST['topic'] ?? 'Strategy Consultation');
$preferred_date = trim($_POST['preferred_date'] ?? date('Y-m-d'));
$preferred_time = trim($_POST['preferred_time'] ?? '10:00 AM');
$notes = trim($_POST['notes'] ?? '');

if (empty($name) || empty($email) || empty($phone)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Name, email, and phone number are required.']);
    exit;
}

try {
    $db = get_db();
    $stmt = $db->prepare("
        INSERT INTO consultation_bookings (name, email, phone, company, topic, preferred_date, preferred_time, notes, status, created_at)
        VALUES (:name, :email, :phone, :company, :topic, :preferred_date, :preferred_time, :notes, 'scheduled', datetime('now'))
    ");
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':company' => $company,
        ':topic' => $topic,
        ':preferred_date' => $preferred_date,
        ':preferred_time' => $preferred_time,
        ':notes' => $notes
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Your 30-minute strategy consultation has been reserved! Our Solutions Architect will send meeting credentials to your email and WhatsApp.'
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Failed to book consultation. Please reach out via WhatsApp at ' . SITE_PHONE]);
}
?>

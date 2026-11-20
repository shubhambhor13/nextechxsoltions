<?php
// NextTechX Solutions - Strategy Consultations API
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
            $stmt = $db->query("SELECT * FROM consultation_bookings ORDER BY id DESC LIMIT 50");
            echo json_encode($stmt->fetchAll());
            exit;
        } catch (Exception $e) {}
    }
    $fallback_file = dirname(DB_PATH) . '/fallback_consultation_bookings.json';
    $data = file_exists($fallback_file) ? json_decode(file_get_contents($fallback_file), true) : [];
    echo json_encode(is_array($data) ? $data : []);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'error' => 'Method not allowed', 'message' => 'Method not allowed']);
    exit;
}

$raw_input = file_get_contents('php://input');
$json_input = !empty($raw_input) ? json_decode($raw_input, true) : [];
$payload = array_merge($_POST, is_array($json_input) ? $json_input : []);

$name = trim($payload['name'] ?? '');
$email = trim($payload['email'] ?? '');
$phone = trim($payload['phone'] ?? '');
$company = trim($payload['company'] ?? '');
$topic = trim($payload['topic'] ?? 'Strategy Consultation');
$preferred_date = trim($payload['preferred_date'] ?? date('Y-m-d'));
$preferred_time = trim($payload['preferred_time'] ?? '10:00 AM');
$notes = trim($payload['notes'] ?? '');

if (empty($name) || empty($email) || empty($phone)) {
    http_response_code(400);
    $msg = 'Name, email, and phone number are required.';
    echo json_encode(['status' => 'error', 'error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

$record = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'topic' => $topic,
    'preferred_date' => $preferred_date,
    'preferred_time' => $preferred_time,
    'notes' => $notes,
    'status' => 'scheduled'
];

try {
    $db = function_exists('get_db') ? get_db() : null;
    if ($db) {
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
    } else {
        save_record_fallback('consultation_bookings', $record);
    }

    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Your 30-minute strategy consultation has been reserved! Our Solutions Architect will send meeting credentials to your email and WhatsApp.'
    ]);
} catch (Exception $e) {
    save_record_fallback('consultation_bookings', $record);
    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Your 30-minute strategy consultation has been reserved! Our Solutions Architect will send meeting credentials to your email and WhatsApp.'
    ]);
}

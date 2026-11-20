<?php
// NextTechX Solutions - Quotations API
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
            $stmt = $db->query("SELECT * FROM quotation_requests ORDER BY id DESC LIMIT 50");
            echo json_encode($stmt->fetchAll());
            exit;
        } catch (Exception $e) {}
    }
    $fallback_file = dirname(DB_PATH) . '/fallback_quotation_requests.json';
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
$service_category = trim($payload['service_category'] ?? '');
$budget_range = trim($payload['budget_range'] ?? 'Flexible / Needs Consultation');
$requirements = trim($payload['requirements'] ?? '');
$project_timeline = trim($payload['project_timeline'] ?? 'Flexible');

if (empty($name) || empty($email) || empty($phone) || empty($service_category) || empty($requirements)) {
    http_response_code(400);
    $msg = 'Please fill in all required fields (Name, Email, Phone, Service, Requirements).';
    echo json_encode(['status' => 'error', 'error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

$record = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'company' => $company,
    'service_category' => $service_category,
    'budget_range' => $budget_range,
    'project_timeline' => $project_timeline,
    'requirements' => $requirements,
    'status' => 'pending'
];

try {
    $db = function_exists('get_db') ? get_db() : null;
    if ($db) {
        $stmt = $db->prepare("
            INSERT INTO quotation_requests (name, email, phone, company, service_category, budget_range, project_timeline, requirements, status, created_at)
            VALUES (:name, :email, :phone, :company, :service_category, :budget_range, :project_timeline, :requirements, 'pending', datetime('now'))
        ");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':service_category' => $service_category,
            ':budget_range' => $budget_range,
            ':project_timeline' => $project_timeline,
            ':requirements' => $requirements
        ]);
    } else {
        save_record_fallback('quotation_requests', $record);
    }

    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Your quotation request has been received! Our solutions team (' . SITE_EMAIL_CONTACT . ') will review your requirements and provide a customized price estimate within 24 hours.'
    ]);
} catch (Exception $e) {
    save_record_fallback('quotation_requests', $record);
    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Your quotation request has been received! Our solutions team (' . SITE_EMAIL_CONTACT . ') will review your requirements and provide a customized price estimate within 24 hours.'
    ]);
}

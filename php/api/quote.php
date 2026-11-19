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
$service_category = trim($_POST['service_category'] ?? '');
$budget_range = trim($_POST['budget_range'] ?? 'Flexible / Needs Consultation');
$requirements = trim($_POST['requirements'] ?? '');
$project_timeline = trim($_POST['project_timeline'] ?? 'Flexible');

if (empty($name) || empty($email) || empty($phone) || empty($service_category) || empty($requirements)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields (Name, Email, Phone, Service, Requirements).']);
    exit;
}

try {
    $db = get_db();
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
        save_record_fallback('quotation_requests', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'service_category' => $service_category,
            'budget_range' => $budget_range,
            'project_timeline' => $project_timeline,
            'requirements' => $requirements,
            'status' => 'pending'
        ]);
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Your quotation request has been received! Our solutions team (' . SITE_EMAIL_CONTACT . ') will review your requirements and provide a customized price estimate within 24 hours.'
    ]);
} catch (Exception $e) {
    save_record_fallback('quotation_requests', [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'service_category' => $service_category,
        'budget_range' => $budget_range,
        'project_timeline' => $project_timeline,
        'requirements' => $requirements,
        'status' => 'pending'
    ]);
    echo json_encode([
        'status' => 'success',
        'message' => 'Your quotation request has been received! Our solutions team (' . SITE_EMAIL_CONTACT . ') will review your requirements and provide a customized price estimate within 24 hours.'
    ]);
}
?>

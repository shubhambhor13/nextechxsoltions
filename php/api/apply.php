<?php
// NextTechX Solutions - Student & Internship Registration API
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
            $stmt = $db->query("SELECT * FROM student_registrations ORDER BY id DESC LIMIT 50");
            echo json_encode($stmt->fetchAll());
            exit;
        } catch (Exception $e) {}
    }
    $fallback_file = dirname(DB_PATH) . '/fallback_student_registrations.json';
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

$full_name = trim($payload['full_name'] ?? '');
$email = trim($payload['email'] ?? '');
$phone = trim($payload['phone'] ?? '');
$qualification = trim($payload['qualification'] ?? '');
$current_status = trim($payload['current_status'] ?? 'Student');
$course_selected = trim($payload['course_selected'] ?? '');
$batch_timing = trim($payload['batch_timing'] ?? 'Flexible');
$resume_link = trim($payload['resume_link'] ?? '');
$statement = trim($payload['statement'] ?? '');

if (empty($full_name) || empty($email) || empty($phone) || empty($qualification) || empty($course_selected)) {
    http_response_code(400);
    $msg = 'Please fill in all required application fields.';
    echo json_encode(['status' => 'error', 'error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

$record = [
    'full_name' => $full_name,
    'email' => $email,
    'phone' => $phone,
    'qualification' => $qualification,
    'current_status' => $current_status,
    'course_selected' => $course_selected,
    'batch_timing' => $batch_timing,
    'resume_link' => $resume_link,
    'statement' => $statement,
    'status' => 'under_review'
];

try {
    $db = function_exists('get_db') ? get_db() : null;
    if ($db) {
        $stmt = $db->prepare("
            INSERT INTO student_registrations (full_name, email, phone, qualification, current_status, course_selected, batch_timing, resume_link, statement, status, created_at)
            VALUES (:full_name, :email, :phone, :qualification, :current_status, :course_selected, :batch_timing, :resume_link, :statement, 'under_review', datetime('now'))
        ");
        $stmt->execute([
            ':full_name' => $full_name,
            ':email' => $email,
            ':phone' => $phone,
            ':qualification' => $qualification,
            ':current_status' => $current_status,
            ':course_selected' => $course_selected,
            ':batch_timing' => $batch_timing,
            ':resume_link' => $resume_link,
            ':statement' => $statement
        ]);
    } else {
        save_record_fallback('student_registrations', $record);
    }

    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Application submitted successfully! Our HR desk (' . SITE_EMAIL_HR . ') and academic mentor will review your profile and connect with you on WhatsApp for onboarding.'
    ]);
} catch (Exception $e) {
    save_record_fallback('student_registrations', $record);
    echo json_encode([
        'status' => 'success',
        'success' => true,
        'message' => 'Application submitted successfully! Our HR desk (' . SITE_EMAIL_HR . ') and academic mentor will review your profile and connect with you on WhatsApp for onboarding.'
    ]);
}

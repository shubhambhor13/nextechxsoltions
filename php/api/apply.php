<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$qualification = trim($_POST['qualification'] ?? '');
$current_status = trim($_POST['current_status'] ?? 'Student');
$course_selected = trim($_POST['course_selected'] ?? '');
$batch_timing = trim($_POST['batch_timing'] ?? 'Flexible');
$resume_link = trim($_POST['resume_link'] ?? '');
$statement = trim($_POST['statement'] ?? '');

if (empty($full_name) || empty($email) || empty($phone) || empty($qualification) || empty($course_selected)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required application fields.']);
    exit;
}

try {
    $db = get_db();
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
        save_record_fallback('student_registrations', [
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
        ]);
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Application submitted successfully! Our HR desk (' . SITE_EMAIL_HR . ') and academic mentor will review your profile and connect with you on WhatsApp for onboarding.'
    ]);
} catch (Exception $e) {
    save_record_fallback('student_registrations', [
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
    ]);
    echo json_encode([
        'status' => 'success',
        'message' => 'Application submitted successfully! Our HR desk (' . SITE_EMAIL_HR . ') and academic mentor will review your profile and connect with you on WhatsApp for onboarding.'
    ]);
}
?>

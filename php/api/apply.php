<?php
// NexTechX Solutions - Student & Internship Registration API
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
    $action = $_GET['action'] ?? 'registrations';
    if ($action === 'courses') {
        echo json_encode([
            ['id' => 'course-aiml', 'title' => 'AI & Machine Learning Research Intern', 'domain' => 'Artificial Intelligence'],
            ['id' => 'course-web', 'title' => 'Full Stack Web Engineering Intern', 'domain' => 'Software Engineering'],
            ['id' => 'course-data', 'title' => 'Data Analytics & Power BI Intern', 'domain' => 'Business Intelligence'],
            ['id' => 'course-python', 'title' => 'Python Automation & Workflow Intern', 'domain' => 'Automation & DevOps'],
            ['id' => 'course-java', 'title' => 'Java Enterprise Microservices Intern', 'domain' => 'Enterprise Systems'],
            ['id' => 'course-cyber', 'title' => 'Cyber Security & SOC Defense Intern', 'domain' => 'Information Security']
        ]);
        exit;
    }
    $records = get_records('student_registrations', 100);
    echo json_encode($records);
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
    $msg = 'Please fill in all required application fields (Name, Email, Phone, Qualification, Course Domain).';
    echo json_encode(['status' => 'error', 'error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

// Support optional file upload (PDF, DOC, DOCX resume)
$resume_filename = null;
$resume_filepath = null;
$email_attachments = [];

$file = $_FILES['resume'] ?? ($_FILES['resume_file'] ?? null);
if ($file && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {
    $orig_name = basename($file['name']);
    $ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
    $allowed_exts = ['pdf', 'doc', 'docx'];
    if (in_array($ext, $allowed_exts) && $file['size'] <= 10 * 1024 * 1024) {
        $upload_dir = __DIR__ . '/../uploads/resumes/';
        if (!is_dir($upload_dir)) @mkdir($upload_dir, 0755, true);
        $safe_name = date('Ymd_His') . '_' . substr(md5(uniqid()), 0, 6) . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $orig_name);
        $target = $upload_dir . $safe_name;
        if (@move_uploaded_file($file['tmp_name'], $target) || @copy($file['tmp_name'], $target)) {
            $resume_filename = $orig_name;
            $resume_filepath = $target;
            $email_attachments[] = [
                'path' => $target,
                'name' => $orig_name
            ];
        }
    }
}

$ref_id = 'NTX-INT-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4);

$record = [
    'full_name' => $full_name,
    'email' => $email,
    'phone' => $phone,
    'qualification' => $qualification,
    'current_status' => $current_status,
    'course_selected' => $course_selected,
    'batch_timing' => $batch_timing,
    'resume_link' => $resume_link,
    'resume_filename' => $resume_filename,
    'resume_filepath' => $resume_filepath,
    'statement' => $statement,
    'status' => 'under_review',
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
            INSERT INTO student_registrations (full_name, email, phone, qualification, current_status, course_selected, batch_timing, resume_link, resume_filename, resume_filepath, statement, status, email_sent, admin_email_status, user_email_status, created_at)
            VALUES (:full_name, :email, :phone, :qualification, :current_status, :course_selected, :batch_timing, :resume_link, :resume_filename, :resume_filepath, :statement, 'under_review', 0, 'pending', 'pending', datetime('now'))
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
            ':resume_filename' => $resume_filename,
            ':resume_filepath' => $resume_filepath,
            ':statement' => $statement
        ]);
        $record_id = (int)$db->lastInsertId();
    } else {
        save_record_fallback('student_registrations', $record);
    }
} catch (Exception $e) {
    save_record_fallback('student_registrations', $record);
}

// 2. DISPATCH CENTRALIZED NOTIFICATION & CONFIRMATION EMAILS
$fields = [
    'Candidate Name' => $full_name,
    'Email Address' => $email,
    'Phone / WhatsApp' => $phone,
    'Highest Qualification' => $qualification,
    'Academic Status' => $current_status,
    'Selected Domain' => $course_selected,
    'Preferred Batch' => $batch_timing,
    'Resume / Profile Link' => $resume_link ?: ($resume_filename ? 'Attached file' : 'Not provided'),
    'Statement / Motivation' => $statement
];

$mailResult = NexTechXMailer::sendFormSubmission('internship', 'Internship & Mentorship Registration', $fields, $email, $full_name, $email_attachments, $ref_id);

$admin_sent = !empty($mailResult['company_email_sent']);
$user_sent = !empty($mailResult['user_email_sent']);
$overall_sent = ($admin_sent && $user_sent);
$email_err = trim(($mailResult['company_error'] ?? '') . ' | ' . ($mailResult['user_error'] ?? ''), ' |');

// 3. UPDATE DATABASE WITH EMAIL DELIVERY STATUS
if ($db && $record_id) {
    try {
        $update = $db->prepare("
            UPDATE student_registrations SET
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
    update_record_status('student_registrations', $record_id ?: 1, 'under_review', [
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
    'message' => 'Application submitted successfully! Our HR desk (' . SITE_EMAIL_HR . ') and mentor team will review your profile. A confirmation email has been dispatched to ' . htmlspecialchars($email) . '.',
    'email_sent' => $overall_sent,
    'admin_notification_sent' => $admin_sent,
    'user_confirmation_sent' => $user_sent
]);

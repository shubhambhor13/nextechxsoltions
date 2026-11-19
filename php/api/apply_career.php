<?php
require_once __DIR__ . '/../includes/config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed. Use POST.']);
    exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$applying_for = trim($_POST['applying_for'] ?? 'Job');
$position = trim($_POST['position'] ?? '');
$education = trim($_POST['education'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($full_name) || empty($email) || empty($phone) || empty($position) || empty($education)) {
    http_response_code(400);
    echo json_encode(['error' => 'All required fields (Full Name, Email, Phone, Position, Education) must be provided.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Please provide a valid email address.']);
    exit;
}

// Validate file upload
if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'Please attach your resume file (PDF, DOC, or DOCX).']);
    exit;
}

$file = $_FILES['resume'];
$original_filename = basename($file['name']);
$file_ext = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));

$allowed_extensions = ['pdf', 'doc', 'docx'];
if (!in_array($file_ext, $allowed_extensions)) {
    http_response_code(400);
    echo json_encode(['error' => "Invalid file format '.$file_ext'. Only PDF, DOC, and DOCX files are allowed."]);
    exit;
}

if ($file['size'] > 10 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode(['error' => 'File size exceeds maximum allowed limit of 10 MB.']);
    exit;
}

// Upload directory
$upload_dir = __DIR__ . '/../uploads/resumes/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

$sanitized_name = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $original_filename);
$stored_filename = date('Ymd_His') . '_' . $sanitized_name;
$target_filepath = $upload_dir . $stored_filename;

if (!move_uploaded_file($file['tmp_name'], $target_filepath)) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save uploaded resume file on server.']);
    exit;
}

// 1. Send Email with Attachment to nextechxsolutions@gmail.com
$to = 'nextechxsolutions@gmail.com';
$hr_email = SITE_EMAIL_HR;
$subject = "[$applying_for APPLICATION] $position - $full_name";

$boundary = md5(time());

// Headers
$headers = "From: " . SITE_NAME . " Careers <careers@nextechxsolutions.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

// Plain text and HTML body
$body = "--$boundary\r\n";
$body .= "Content-Type: text/html; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

$body .= "<html><body style='font-family: Arial, sans-serif; line-height: 1.6; color: #1e293b;'>";
$body .= "<div style='max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;'>";
$body .= "<div style='background: #0f172a; color: #fff; padding: 20px;'>";
$body .= "<h2 style='margin: 0; color: #38bdf8;'>NextTechX Careers & Internships</h2>";
$body .= "<p style='margin: 5px 0 0; font-size: 14px;'>New $applying_for Application Received</p>";
$body .= "</div>";
$body .= "<div style='padding: 20px;'>";
$body .= "<p><strong>Candidate Full Name:</strong> " . htmlspecialchars($full_name) . "</p>";
$body .= "<p><strong>Email Address:</strong> <a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></p>";
$body .= "<p><strong>Phone Number:</strong> <a href='tel:" . htmlspecialchars($phone) . "'>" . htmlspecialchars($phone) . "</a></p>";
$body .= "<p><strong>Applying Category:</strong> " . htmlspecialchars($applying_for) . "</p>";
$body .= "<p><strong>Target Position / Role:</strong> " . htmlspecialchars($position) . "</p>";
$body .= "<p><strong>Highest Education:</strong> " . htmlspecialchars($education) . "</p>";
$body .= "<p><strong>Cover Note / Message:</strong><br><blockquote style='background: #f1f5f9; padding: 10px; border-left: 3px solid #0284c7;'>" . nl2br(htmlspecialchars($message ?: 'None provided.')) . "</blockquote></p>";
$body .= "<p><strong>Attached Resume:</strong> " . htmlspecialchars($original_filename) . "</p>";
$body .= "</div>";
$body .= "<div style='background: #f8fafc; padding: 12px 20px; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0;'>";
$body .= "Submitted via NextTechX Careers Portal on " . date('Y-m-d H:i:s') . "<br>Direct HR Desk: $hr_email";
$body .= "</div>";
$body .= "</div>";
$body .= "</body></html>\r\n\r\n";

// Attachment
if (file_exists($target_filepath)) {
    $file_content = file_get_contents($target_filepath);
    $encoded_content = chunk_split(base64_encode($file_content));

    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/octet-stream; name=\"$original_filename\"\r\n";
    $body .= "Content-Description: $original_filename\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$original_filename\"; size=" . filesize($target_filepath) . ";\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= $encoded_content . "\r\n\r\n";
}

$body .= "--$boundary--";

// Send email
$mail_sent = @mail($to, $subject, $body, $headers);

// 2. Save in database or fallback
$record = [
    'full_name' => $full_name,
    'email' => $email,
    'phone' => $phone,
    'applying_for' => $applying_for,
    'position' => $position,
    'education' => $education,
    'message' => $message,
    'resume_filename' => $original_filename,
    'resume_filepath' => $target_filepath,
    'email_sent' => $mail_sent ? 1 : 0,
    'created_at' => date('Y-m-d H:i:s')
];

$db = get_db();
if ($db) {
    try {
        $db->exec("
            CREATE TABLE IF NOT EXISTS career_applications (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                full_name TEXT NOT NULL,
                email TEXT NOT NULL,
                phone TEXT NOT NULL,
                applying_for TEXT NOT NULL,
                position TEXT NOT NULL,
                education TEXT NOT NULL,
                resume_filename TEXT,
                resume_filepath TEXT,
                message TEXT,
                email_sent INTEGER DEFAULT 0,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )
        ");
        $stmt = $db->prepare("
            INSERT INTO career_applications (full_name, email, phone, applying_for, position, education, resume_filename, resume_filepath, message, email_sent, created_at)
            VALUES (:full_name, :email, :phone, :applying_for, :position, :education, :resume_filename, :resume_filepath, :message, :email_sent, datetime('now'))
        ");
        $stmt->execute([
            ':full_name' => $full_name,
            ':email' => $email,
            ':phone' => $phone,
            ':applying_for' => $applying_for,
            ':position' => $position,
            ':education' => $education,
            ':resume_filename' => $original_filename,
            ':resume_filepath' => $target_filepath,
            ':message' => $message,
            ':email_sent' => $mail_sent ? 1 : 0
        ]);
    } catch (Exception $e) {
        save_record_fallback('career_applications', $record);
    }
} else {
    save_record_fallback('career_applications', $record);
}

echo json_encode([
    'success' => true,
    'message' => "Thank you, $full_name! Your $applying_for application for '$position' and resume have been transmitted to nextechxsolutions@gmail.com and our HR desk.",
    'email_sent' => $mail_sent,
    'attachment' => $original_filename
]);

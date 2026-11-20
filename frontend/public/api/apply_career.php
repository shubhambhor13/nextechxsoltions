<?php
// NextTechX Solutions - Career Applications API
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';

// Support GET: Return vacancies or applications
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? 'vacancies';
    if ($action === 'applications') {
        $db = function_exists('get_db') ? get_db() : null;
        if ($db) {
            try {
                $stmt = $db->query("SELECT id, full_name, email, phone, applying_for, position, education, resume_filename, email_sent, created_at FROM career_applications ORDER BY id DESC");
                echo json_encode($stmt->fetchAll());
                exit;
            } catch (Exception $e) {}
        }
        $fallback_file = dirname(DB_PATH) . '/fallback_career_applications.json';
        $apps = file_exists($fallback_file) ? json_decode(file_get_contents($fallback_file), true) : [];
        echo json_encode(is_array($apps) ? $apps : []);
        exit;
    }

    // Default GET: Return vacancies list (0-2 years, No senior roles)
    echo json_encode([
        'jobs' => [
            [
                'id' => 'job-fullstack',
                'title' => 'Full-Stack Software Engineer (React & Python)',
                'department' => 'Engineering & Product',
                'type' => 'Full-Time',
                'workplace' => 'Remote / Hybrid',
                'experience' => '0-2 Years / Early Career',
                'description' => 'Develop and maintain modern web applications, SaaS client portals, and responsive REST APIs using React 18, Tailwind CSS, Python FastAPI, and PostgreSQL.'
            ],
            [
                'id' => 'job-ai-engineer',
                'title' => 'AI & Workflow Automation Developer',
                'department' => 'AI Automation Labs',
                'type' => 'Full-Time',
                'workplace' => '100% Remote',
                'experience' => '0-2 Years / Early Career',
                'description' => 'Develop practical AI automation workflows, WhatsApp business bots, and Retrieval-Augmented Generation (RAG) tools using Python, LangChain, and APIs.'
            ],
            [
                'id' => 'job-devops-cloud',
                'title' => 'DevOps & Cloud Associate Engineer',
                'department' => 'Cloud & Infrastructure',
                'type' => 'Full-Time',
                'workplace' => '100% Remote',
                'experience' => '0-2 Years / Early Career',
                'description' => 'Configure containerized deployments, manage CI/CD build scripts, server monitoring, and cloud hosting for client web applications.'
            ],
            [
                'id' => 'job-bi-analyst',
                'title' => 'Data Analyst & Business Intelligence Associate',
                'department' => 'Analytics & Intelligence',
                'type' => 'Full-Time',
                'workplace' => 'Remote / Hybrid',
                'experience' => '0-2 Years / Early Career',
                'description' => 'Transform corporate datasets into interactive executive dashboards using Power BI, DAX formulas, SQL queries, and Excel models.'
            ]
        ],
        'internships' => [
            [
                'id' => 'intern-aiml',
                'title' => 'AI & Machine Learning Research Intern',
                'department' => 'Artificial Intelligence',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-web',
                'title' => 'Full Stack Web Engineering Intern',
                'department' => 'Software Engineering',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-bi',
                'title' => 'Power BI & Data Analytics Intern',
                'department' => 'Data Science & BI',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-security',
                'title' => 'Cyber Security & Ethical Defense Intern',
                'department' => 'Information Security',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ]
        ]
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed. Use POST.', 'message' => 'Method not allowed. Use POST.']);
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
    $msg = 'All required fields (Full Name, Email, Phone, Position, Education) must be provided.';
    echo json_encode(['error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    $msg = 'Please provide a valid email address.';
    echo json_encode(['error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

// Validate file upload
$file = $_FILES['resume'] ?? null;
if (!$file || !isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    $msg = 'Please attach your resume file (PDF, DOC, or DOCX).';
    echo json_encode(['error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

$original_filename = basename($file['name']);
$file_ext = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
$allowed_extensions = ['pdf', 'doc', 'docx'];

if (!in_array($file_ext, $allowed_extensions)) {
    http_response_code(400);
    $msg = "Invalid file format '.$file_ext'. Only PDF, DOC, and DOCX files are allowed.";
    echo json_encode(['error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

if ($file['size'] > 10 * 1024 * 1024) {
    http_response_code(400);
    $msg = 'File size exceeds maximum allowed limit of 10 MB.';
    echo json_encode(['error' => $msg, 'message' => $msg, 'detail' => $msg]);
    exit;
}

// Upload directory & storage
$upload_dir = __DIR__ . '/../uploads/resumes/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

$sanitized_name = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $original_filename);
$stored_filename = date('Ymd_His') . '_' . $sanitized_name;
$target_filepath = $upload_dir . $stored_filename;

$saved = @move_uploaded_file($file['tmp_name'], $target_filepath);
if (!$saved) {
    // Fallback: try temp folder if webroot uploads has permission restriction
    $fallback_dir = sys_get_temp_dir() . '/nexttechx_resumes/';
    @mkdir($fallback_dir, 0755, true);
    $target_filepath = $fallback_dir . $stored_filename;
    if (is_uploaded_file($file['tmp_name'])) {
        @copy($file['tmp_name'], $target_filepath);
    }
}

// Read attachment content
$file_content = '';
if (file_exists($target_filepath)) {
    $file_content = @file_get_contents($target_filepath);
}

// 1. Send Email with Attachment to nextechxsolutions@gmail.com
$to = 'nextechxsolutions@gmail.com';
$hr_email = defined('SITE_EMAIL_HR') ? SITE_EMAIL_HR : 'hr@nextechxsolutions.com';
$subject = "[$applying_for APPLICATION] $position - $full_name";

$boundary = md5(uniqid(time(), true));

$headers = "From: NextTechX Careers <careers@nextechxsolutions.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

$body = "--$boundary\r\n";
$body .= "Content-Type: text/html; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

$body .= "<html><body style='font-family: Arial, sans-serif; line-height: 1.6; color: #1e293b;'>";
$body .= "<div style='max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;'>";
$body .= "<div style='background: #0f172a; color: #fff; padding: 20px;'>";
$body .= "<h2 style='margin: 0; color: #38bdf8;'>NextTechX Solutions - Careers & Internships</h2>";
$body .= "<p style='margin: 5px 0 0; font-size: 14px;'>New $applying_for Application Received</p>";
$body .= "</div>";
$body .= "<div style='padding: 20px;'>";
$body .= "<p><strong>Candidate Name:</strong> " . htmlspecialchars($full_name) . "</p>";
$body .= "<p><strong>Email Address:</strong> <a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></p>";
$body .= "<p><strong>Phone Number:</strong> <a href='tel:" . htmlspecialchars($phone) . "'>" . htmlspecialchars($phone) . "</a></p>";
$body .= "<p><strong>Applying Category:</strong> " . htmlspecialchars($applying_for) . "</p>";
$body .= "<p><strong>Target Position / Role:</strong> " . htmlspecialchars($position) . "</p>";
$body .= "<p><strong>Highest Education:</strong> " . htmlspecialchars($education) . "</p>";
$body .= "<p><strong>Message / Note:</strong><br><blockquote style='background: #f1f5f9; padding: 10px; border-left: 3px solid #0284c7;'>" . nl2br(htmlspecialchars($message ?: 'None provided.')) . "</blockquote></p>";
$body .= "<p><strong>Attached Resume:</strong> " . htmlspecialchars($original_filename) . "</p>";
$body .= "</div>";
$body .= "<div style='background: #f8fafc; padding: 12px 20px; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0;'>";
$body .= "Submitted via NextTechX Careers Portal on " . date('Y-m-d H:i:s') . "<br>Direct HR Desk: $hr_email";
$body .= "</div>";
$body .= "</div></body></html>\r\n\r\n";

if (!empty($file_content)) {
    $encoded_content = chunk_split(base64_encode($file_content));
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/octet-stream; name=\"$original_filename\"\r\n";
    $body .= "Content-Description: $original_filename\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$original_filename\"; size=" . strlen($file_content) . ";\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= $encoded_content . "\r\n\r\n";
}
$body .= "--$boundary--";

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

$db = function_exists('get_db') ? get_db() : null;
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
        if (function_exists('save_record_fallback')) {
            save_record_fallback('career_applications', $record);
        }
    }
} else {
    if (function_exists('save_record_fallback')) {
        save_record_fallback('career_applications', $record);
    }
}

echo json_encode([
    'success' => true,
    'message' => "Thank you, $full_name! Your $applying_for application for '$position' and resume have been transmitted to nextechxsolutions@gmail.com and our HR desk.",
    'email_sent' => $mail_sent,
    'attachment' => $original_filename
]);

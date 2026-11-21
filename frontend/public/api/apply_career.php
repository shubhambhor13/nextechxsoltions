<?php
// NextTechX Solutions - Career & Internship Applications API
// Enterprise Application Workflow & Automated Multi-Recipient SMTP Notifications

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

/**
 * Ensure career_applications schema is fully migrated
 */
function ensure_career_table($db) {
    if (!$db) return;
    try {
        $db->exec("
            CREATE TABLE IF NOT EXISTS career_applications (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                full_name TEXT NOT NULL,
                email TEXT NOT NULL,
                phone TEXT NOT NULL,
                applying_for TEXT NOT NULL,
                position TEXT NOT NULL,
                education TEXT,
                resume_filename TEXT,
                resume_filepath TEXT,
                message TEXT,
                email_sent INTEGER DEFAULT 0,
                applicant_email_status TEXT DEFAULT 'pending',
                company_email_status TEXT DEFAULT 'pending',
                email_error TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )
        ");
        $cols = $db->query("PRAGMA table_info(career_applications)")->fetchAll(PDO::FETCH_COLUMN, 1);
        if (!in_array('applicant_email_status', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN applicant_email_status TEXT DEFAULT 'pending'");
        }
        if (!in_array('company_email_status', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN company_email_status TEXT DEFAULT 'pending'");
        }
        if (!in_array('email_error', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN email_error TEXT");
        }
    } catch (Exception $e) {}
}

// Support GET: Return vacancies or applications list
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? 'vacancies';

    // 1. Applications List for Authorized Operations
    if ($action === 'applications') {
        $db = function_exists('get_db') ? get_db() : null;
        if ($db) {
            ensure_career_table($db);
            try {
                $stmt = $db->query("SELECT id, full_name, email, phone, applying_for, position, education, resume_filename, email_sent, applicant_email_status, company_email_status, email_error, created_at FROM career_applications ORDER BY id DESC");
                echo json_encode($stmt->fetchAll());
                exit;
            } catch (Exception $e) {
                try {
                    $stmt = $db->query("SELECT id, full_name, email, phone, applying_for, position, education, resume_filename, email_sent, applicant_email_status, company_email_status, created_at FROM career_applications ORDER BY id DESC");
                    echo json_encode($stmt->fetchAll());
                    exit;
                } catch (Exception $e2) {}
            }
        }
        $fallback_file = dirname(DB_PATH) . '/fallback_career_applications.json';
        $apps = file_exists($fallback_file) ? json_decode(file_get_contents($fallback_file), true) : [];
        echo json_encode(is_array($apps) ? $apps : []);
        exit;
    }

    // 1B. Direct SMTP Delivery Test Action (Without application or database records)
    if ($action === 'direct_test') {
        $expected_key = 'ntx_secure_test_smtp_delivery_2026';
        $provided_key = $_GET['auth'] ?? $_SERVER['HTTP_X_ADMIN_AUTH'] ?? '';

        if ($provided_key !== $expected_key) {
            http_response_code(403);
            echo json_encode(['error' => 'Access Denied. Unauthorized diagnostic request.']);
            exit;
        }

        $results = [
            'timestamp' => date('Y-m-d H:i:s T'),
            'test_type' => 'Direct Hostinger SMTP Delivery Test (No Database Record)',
            'configuration' => [
                'host' => NextTechXMailer::getEnv('SMTP_HOST', 'smtp.hostinger.com'),
                'port' => (int) NextTechXMailer::getEnv('SMTP_PORT', 465),
                'encryption' => NextTechXMailer::getEnv('SMTP_ENCRYPTION', 'ssl'),
                'username' => NextTechXMailer::getEnv('SMTP_USERNAME', 'hr@nextechxsolutions.com'),
                'from_email' => NextTechXMailer::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com'),
                'from_name' => NextTechXMailer::getEnv('SMTP_FROM_NAME', 'NEXTECHX SOLUTIONS'),
                'password_configured' => !empty(NextTechXMailer::getEnv('SMTP_PASSWORD', '')),
                'password_length' => strlen(NextTechXMailer::getEnv('SMTP_PASSWORD', '')),
                'password_source' => !empty(getenv('SMTP_PASSWORD')) ? 'getenv' : (!empty($_ENV['SMTP_PASSWORD']) ? '_ENV' : 'none')
            ],
            'test_1_applicant' => null,
            'test_2_company' => null
        ];

        // Test 1 – Applicant Email
        // To: shubhambhor1320@gmail.com
        // From: hr@nextechxsolutions.com
        // Subject: Test Email – NEXTECHX SOLUTIONS
        try {
            $mail1 = NextTechXMailer::createMailer(465, 'ssl');
            $mail1->clearAddresses();
            $mail1->clearAttachments();
            $mail1->clearReplyTos();
            $mail1->addAddress('shubhambhor1320@gmail.com', 'Shubham Bhor');
            $mail1->addReplyTo('hr@nextechxsolutions.com', 'NEXTECHX SOLUTIONS HR');
            $mail1->Subject = 'Test Email – NEXTECHX SOLUTIONS';
            $mail1->isHTML(true);
            $mail1->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e2e8f0; border-radius: 8px;">
                    <h2 style="color: #0f172a; margin-top: 0;">NEXTECHX SOLUTIONS</h2>
                    <p style="color: #334155; font-size: 15px; line-height: 1.6;">Dear Shubham,</p>
                    <p style="color: #334155; font-size: 15px; line-height: 1.6;">This is a direct <strong>Hostinger SMTP Delivery Test</strong> from NEXTECHX SOLUTIONS.</p>
                    <div style="background-color: #f8fafc; border-left: 4px solid #0284c7; padding: 12px 16px; margin: 16px 0;">
                        <p style="margin: 0; font-size: 14px; color: #0f172a;"><strong>Sender:</strong> hr@nextechxsolutions.com</p>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Recipient:</strong> shubhambhor1320@gmail.com</p>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Timestamp:</strong> ' . date('d M Y, h:i:s A T') . '</p>
                    </div>
                    <p style="color: #64748b; font-size: 13px;">If you are reading this email, direct SMTP authentication and delivery via smtp.hostinger.com (Port 465 SSL) is functioning properly.</p>
                    <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;">
                    <p style="color: #94a3b8; font-size: 12px; margin: 0;">NEXTECHX SOLUTIONS &bull; <a href="https://nextechxsolutions.com" style="color: #0284c7;">nextechxsolutions.com</a></p>
                </div>
            ';
            $mail1->AltBody = "NEXTECHX SOLUTIONS\nDirect Hostinger SMTP Delivery Test\n\nSender: hr@nextechxsolutions.com\nRecipient: shubhambhor1320@gmail.com\nTimestamp: " . date('d M Y, h:i:s A T');

            $mail1->send();
            $results['test_1_applicant'] = [
                'recipient' => 'shubhambhor1320@gmail.com',
                'from' => 'hr@nextechxsolutions.com',
                'subject' => 'Test Email – NEXTECHX SOLUTIONS',
                'accepted_by_smtp' => true,
                'status' => 'Email accepted by smtp.hostinger.com for delivery',
                'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -6)
            ];
        } catch (\Throwable $e) {
            $results['test_1_applicant'] = [
                'recipient' => 'shubhambhor1320@gmail.com',
                'from' => 'hr@nextechxsolutions.com',
                'subject' => 'Test Email – NEXTECHX SOLUTIONS',
                'accepted_by_smtp' => false,
                'error' => $e->getMessage() . (!empty($mail1->ErrorInfo) ? (' | ' . $mail1->ErrorInfo) : ''),
                'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -8)
            ];
        }

        // Test 2 – Company Email
        // To: nextechxsolutions@gmail.com
        // From: hr@nextechxsolutions.com
        // Subject: SMTP Delivery Test – NEXTECHX SOLUTIONS
        try {
            $mail2 = NextTechXMailer::createMailer(465, 'ssl');
            $mail2->clearAddresses();
            $mail2->clearAttachments();
            $mail2->clearReplyTos();
            $mail2->addAddress('nextechxsolutions@gmail.com', 'NEXTECHX SOLUTIONS Admin Desk');
            $mail2->addReplyTo('hr@nextechxsolutions.com', 'NEXTECHX SOLUTIONS HR');
            $mail2->Subject = 'SMTP Delivery Test – NEXTECHX SOLUTIONS';
            $mail2->isHTML(true);
            $mail2->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e2e8f0; border-radius: 8px;">
                    <h2 style="color: #0f172a; margin-top: 0;">NEXTECHX SOLUTIONS — Company Notification</h2>
                    <p style="color: #334155; font-size: 15px; line-height: 1.6;">Team NEXTECHX SOLUTIONS,</p>
                    <p style="color: #334155; font-size: 15px; line-height: 1.6;">This is a direct <strong>Company Notification SMTP Delivery Test</strong>.</p>
                    <div style="background-color: #f8fafc; border-left: 4px solid #10b981; padding: 12px 16px; margin: 16px 0;">
                        <p style="margin: 0; font-size: 14px; color: #0f172a;"><strong>Sender:</strong> hr@nextechxsolutions.com</p>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Recipient:</strong> nextechxsolutions@gmail.com</p>
                        <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Timestamp:</strong> ' . date('d M Y, h:i:s A T') . '</p>
                    </div>
                    <p style="color: #64748b; font-size: 13px;">If you are reading this email, company notification delivery via smtp.hostinger.com is active.</p>
                    <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;">
                    <p style="color: #94a3b8; font-size: 12px; margin: 0;">NEXTECHX SOLUTIONS &bull; <a href="https://nextechxsolutions.com" style="color: #10b981;">nextechxsolutions.com</a></p>
                </div>
            ';
            $mail2->AltBody = "NEXTECHX SOLUTIONS\nCompany Notification SMTP Delivery Test\n\nSender: hr@nextechxsolutions.com\nRecipient: nextechxsolutions@gmail.com\nTimestamp: " . date('d M Y, h:i:s A T');

            $mail2->send();
            $results['test_2_company'] = [
                'recipient' => 'nextechxsolutions@gmail.com',
                'from' => 'hr@nextechxsolutions.com',
                'subject' => 'SMTP Delivery Test – NEXTECHX SOLUTIONS',
                'accepted_by_smtp' => true,
                'status' => 'Email accepted by smtp.hostinger.com for delivery',
                'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -6)
            ];
        } catch (\Throwable $e) {
            $results['test_2_company'] = [
                'recipient' => 'nextechxsolutions@gmail.com',
                'from' => 'hr@nextechxsolutions.com',
                'subject' => 'SMTP Delivery Test – NEXTECHX SOLUTIONS',
                'accepted_by_smtp' => false,
                'error' => $e->getMessage() . (!empty($mail2->ErrorInfo) ? (' | ' . $mail2->ErrorInfo) : ''),
                'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -8)
            ];
        }

        echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // 2. Safe Resend Action (Retry email delivery without duplicating applications)
    if ($action === 'resend_email' && !empty($_GET['id'])) {
        $app_id = (int)$_GET['id'];
        $app = null;
        $db = function_exists('get_db') ? get_db() : null;
        if ($db) {
            ensure_career_table($db);
            try {
                $stmt = $db->prepare("SELECT * FROM career_applications WHERE id = :id");
                $stmt->execute([':id' => $app_id]);
                $app = $stmt->fetch();
            } catch (Exception $e) {}
        }

        if (!$app) {
            http_response_code(404);
            echo json_encode(['error' => 'Application record not found for retry.']);
            exit;
        }

        $res_applicant = NextTechXMailer::sendApplicantConfirmation($app);
        $res_company = NextTechXMailer::sendCompanyNotification($app, $app['resume_filepath'] ?? null, $app['resume_filename'] ?? null);

        $app_sent = !empty($res_applicant['success']);
        $comp_sent = !empty($res_company['success']);

        if ($db) {
            try {
                $update = $db->prepare("UPDATE career_applications SET 
                    applicant_email_status = :app_st,
                    company_email_status = :comp_st,
                    email_sent = :sent,
                    email_error = :err
                    WHERE id = :id");
                $update->execute([
                    ':app_st' => $app_sent ? 'sent' : 'failed',
                    ':comp_st' => $comp_sent ? 'sent' : 'failed',
                    ':sent' => ($app_sent && $comp_sent) ? 1 : 0,
                    ':err' => ($res_applicant['error'] ?? '') . ' | ' . ($res_company['error'] ?? ''),
                    ':id' => $app_id
                ]);
            } catch (Exception $e) {
                try {
                    $update = $db->prepare("UPDATE career_applications SET 
                        applicant_email_status = :app_st,
                        company_email_status = :comp_st,
                        email_sent = :sent
                        WHERE id = :id");
                    $update->execute([
                        ':app_st' => $app_sent ? 'sent' : 'failed',
                        ':comp_st' => $comp_sent ? 'sent' : 'failed',
                        ':sent' => ($app_sent && $comp_sent) ? 1 : 0,
                        ':id' => $app_id
                    ]);
                } catch (Exception $e2) {}
            }
        }

        echo json_encode([
            'success' => true,
            'message' => 'Email retry dispatched.',
            'applicant_email_sent' => $app_sent,
            'company_email_sent' => $comp_sent,
            'applicant_error' => $app_sent ? null : ($res_applicant['error'] ?? 'SMTP dispatch failed'),
            'applicant_meta' => $res_applicant['meta'] ?? null,
            'applicant_smtp_dialog' => $res_applicant['smtp_dialog'] ?? null,
            'company_error' => $comp_sent ? null : ($res_company['error'] ?? 'SMTP dispatch failed'),
            'company_meta' => $res_company['meta'] ?? null,
            'company_smtp_dialog' => $res_company['smtp_dialog'] ?? null
        ]);
        exit;
    }

    // 3. Download Resume Action (Safely serve stored applicant resume from disk)
    if ($action === 'download_resume' && !empty($_GET['id'])) {
        $app_id = (int)$_GET['id'];
        $app = null;
        $db = function_exists('get_db') ? get_db() : null;
        if ($db) {
            $stmt = $db->prepare("SELECT resume_filename, resume_filepath FROM career_applications WHERE id = :id");
            $stmt->execute([':id' => $app_id]);
            $app = $stmt->fetch();
        }

        if ($app && !empty($app['resume_filepath']) && file_exists($app['resume_filepath'])) {
            $fpath = $app['resume_filepath'];
            $orig_name = !empty($app['resume_filename']) ? $app['resume_filename'] : basename($fpath);
            $mime = 'application/octet-stream';
            if (function_exists('mime_content_type')) {
                $mime = mime_content_type($fpath) ?: $mime;
            }

            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mime);
            header('Content-Disposition: attachment; filename="' . basename($orig_name) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fpath));
            readfile($fpath);
            exit;
        }

        http_response_code(404);
        echo json_encode(['error' => 'Resume file not found on server disk.']);
        exit;
    }

    // Default GET: Return opportunities list (Jobs empty - currently offering internships only)
    echo json_encode([
        'notice' => 'Currently, we are offering internship opportunities. Stay connected for future updates.',
        'jobs' => [],
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
                'id' => 'intern-data',
                'title' => 'Data Analytics & Power BI Intern',
                'department' => 'Business Intelligence',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-python',
                'title' => 'Python Automation & Workflow Intern',
                'department' => 'Automation & DevOps',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-java',
                'title' => 'Java Enterprise Microservices Intern',
                'department' => 'Enterprise Systems',
                'type' => 'Internship',
                'workplace' => '100% Online Remote',
                'selection' => 'Interview-Based'
            ],
            [
                'id' => 'intern-cyber',
                'title' => 'Cyber Security & SOC Defense Intern',
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

// ---------------------------------------------------------
// 1. INPUT EXTRACTION & SANITIZATION
// ---------------------------------------------------------
$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$applying_for = trim($_POST['applying_for'] ?? 'Internship');
$position = trim($_POST['position'] ?? '');
$education = trim($_POST['education'] ?? '');
$message = trim($_POST['message'] ?? '');

// ---------------------------------------------------------
// 2. COMPREHENSIVE BACKEND VALIDATION
// ---------------------------------------------------------

// Check required textual fields
if (empty($full_name) || empty($email) || empty($phone) || empty($position) || empty($education)) {
    http_response_code(400);
    $msg = 'All required fields (Full Name, Email, Phone, Target Position, Education) must be provided.';
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

// Validate email syntax & DNS-ready format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    $msg = 'Please provide a valid email address (e.g., yourname@domain.com).';
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

// Enforce rule: Job applications only accepted when active job vacancies are published
if (strcasecmp($applying_for, 'Job') === 0) {
    http_response_code(400);
    $msg = 'Currently, NEXTECHX SOLUTIONS is offering internship opportunities only. We are not accepting direct job vacancy applications at this time.';
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

// Normalize category to Internship
if (empty($applying_for) || strcasecmp($applying_for, 'Internship') === 0) {
    $applying_for = 'Internship';
}

// Validate file upload
$file = $_FILES['resume'] ?? null;
if (!$file || !isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    $msg = 'Please attach your resume file (PDF, DOC, or DOCX).';
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

$original_filename = basename($file['name']);
$file_ext = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
$allowed_extensions = ['pdf', 'doc', 'docx'];

if (!in_array($file_ext, $allowed_extensions)) {
    http_response_code(400);
    $msg = "Invalid file format '.$file_ext'. Only PDF, DOC, and DOCX files are allowed.";
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

if ($file['size'] > 10 * 1024 * 1024) {
    http_response_code(400);
    $msg = 'File size exceeds maximum allowed limit of 10 MB.';
    echo json_encode(['error' => $msg, 'message' => $msg]);
    exit;
}

// ---------------------------------------------------------
// 3. SECURE FILE PERSISTENCE
// ---------------------------------------------------------
$upload_dir = __DIR__ . '/../uploads/resumes/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

$sanitized_name = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $original_filename);
$stored_filename = date('Ymd_His') . '_' . substr(md5(uniqid()), 0, 6) . '_' . $sanitized_name;
$target_filepath = $upload_dir . $stored_filename;

$saved = @move_uploaded_file($file['tmp_name'], $target_filepath);
if (!$saved) {
    if (file_exists($file['tmp_name'])) {
        $saved = @copy($file['tmp_name'], $target_filepath);
    }
    if (!$saved) {
        // Fallback: system temp directory if uploads has restrictive file permissions
        $fallback_dir = sys_get_temp_dir() . '/nexttechx_resumes/';
        @mkdir($fallback_dir, 0755, true);
        $target_filepath = $fallback_dir . $stored_filename;
        if (file_exists($file['tmp_name'])) {
            @copy($file['tmp_name'], $target_filepath);
        }
    }
}

// ---------------------------------------------------------
// 4. SAVE APPLICATION TO DATABASE FIRST (Zero Data Loss)
// ---------------------------------------------------------
$application_id = null;
$db = function_exists('get_db') ? get_db() : null;

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
    'email_sent' => 0,
    'applicant_email_status' => 'pending',
    'company_email_status' => 'pending',
    'email_error' => null,
    'created_at' => date('Y-m-d H:i:s')
];

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
                applicant_email_status TEXT DEFAULT 'pending',
                company_email_status TEXT DEFAULT 'pending',
                email_error TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )
        ");

        // Gracefully add any columns if schema is from an earlier iteration
        $cols = $db->query("PRAGMA table_info(career_applications)")->fetchAll(PDO::FETCH_COLUMN, 1);
        if (!in_array('applicant_email_status', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN applicant_email_status TEXT DEFAULT 'pending'");
        }
        if (!in_array('company_email_status', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN company_email_status TEXT DEFAULT 'pending'");
        }
        if (!in_array('email_error', $cols)) {
            $db->exec("ALTER TABLE career_applications ADD COLUMN email_error TEXT");
        }

        $stmt = $db->prepare("
            INSERT INTO career_applications (full_name, email, phone, applying_for, position, education, resume_filename, resume_filepath, message, email_sent, applicant_email_status, company_email_status, created_at)
            VALUES (:full_name, :email, :phone, :applying_for, :position, :education, :resume_filename, :resume_filepath, :message, 0, 'pending', 'pending', datetime('now'))
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
            ':message' => $message
        ]);
        $application_id = (int) $db->lastInsertId();
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

$record['id'] = $application_id ?: ('NTX-' . date('Ymd') . '-' . rand(1000, 9999));

// ---------------------------------------------------------
// 5. DISPATCH AUTOMATIC SMTP NOTIFICATIONS VIA PHPMAILER
// ---------------------------------------------------------
// 5A. Send Applicant Confirmation Email
$applicant_result = NextTechXMailer::sendApplicantConfirmation($record);

// 5B. Send Company Notification Email (with attached resume)
$company_result = NextTechXMailer::sendCompanyNotification($record, $target_filepath, $original_filename);

$applicant_sent = !empty($applicant_result['success']);
$company_sent = !empty($company_result['success']);
$overall_sent = ($applicant_sent && $company_sent);

$email_errors = [];
if (!$applicant_sent && !empty($applicant_result['error'])) {
    $email_errors[] = "Applicant confirmation: " . $applicant_result['error'];
}
if (!$company_sent && !empty($company_result['error'])) {
    $email_errors[] = "Company notification: " . $company_result['error'];
}
$combined_error = implode(' | ', $email_errors);

// ---------------------------------------------------------
// 6. UPDATE DATABASE DELIVERY STATUS
// ---------------------------------------------------------
if ($db && $application_id) {
    try {
        $update = $db->prepare("
            UPDATE career_applications SET 
                applicant_email_status = :app_st,
                company_email_status = :comp_st,
                email_sent = :sent,
                email_error = :err
            WHERE id = :id
        ");
        $update->execute([
            ':app_st' => $applicant_sent ? 'sent' : 'failed',
            ':comp_st' => $company_sent ? 'sent' : 'failed',
            ':sent' => $overall_sent ? 1 : ($applicant_sent || $company_sent ? 1 : 0),
            ':err' => $combined_error ?: null,
            ':id' => $application_id
        ]);
    } catch (Exception $e) {}
}

// ---------------------------------------------------------
// 7. RETURN STRUCTURED SUCCESS RESPONSE TO FRONTEND
// ---------------------------------------------------------
http_response_code(200);
echo json_encode([
    'success' => true,
    'id' => $record['id'],
    'message' => "Thank you for your interest in NEXTECHX SOLUTIONS. Your application has been received successfully. For any queries, please contact our HR team at " . SITE_EMAIL_HR . ". We appreciate your interest in joining our team!",
    'applicant_email_sent' => $applicant_sent,
    'company_email_sent' => $company_sent,
    'email_sent' => $overall_sent,
    'email_status_detail' => $overall_sent ? 'All confirmation & notification emails dispatched successfully.' : ($applicant_sent ? 'Applicant confirmation dispatched; admin alert pending.' : ($company_sent ? 'Admin alert dispatched; applicant confirmation pending.' : 'Application saved in HR database. Outbound email pending SMTP authorization.')),
    'attachment' => $original_filename
]);

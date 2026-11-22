<?php
// NextTechX Solutions - Centralized Submissions & Applications Management API
if (!headers_sent()) {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
}

$request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($request_method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

$action = $_GET['action'] ?? ($_POST['action'] ?? 'all');

// Helper to normalize rows into a unified schema for the management portal
function normalize_submission($row, $table) {
    $type_map = [
        'career_applications' => ['type' => 'career', 'title' => 'Career Application', 'badge' => 'emerald'],
        'student_registrations' => ['type' => 'internship', 'title' => 'Internship Registration', 'badge' => 'teal'],
        'contact_messages' => ['type' => 'contact', 'title' => 'Contact Inquiry', 'badge' => 'blue'],
        'quotation_requests' => ['type' => 'quote', 'title' => 'Quotation Request', 'badge' => 'amber'],
        'consultation_bookings' => ['type' => 'consultation', 'title' => 'Consultation Booking', 'badge' => 'purple']
    ];

    $cfg = $type_map[$table] ?? ['type' => 'other', 'title' => 'General Submission', 'badge' => 'slate'];
    
    $name = $row['full_name'] ?? ($row['name'] ?? 'Unknown');
    $email = $row['email'] ?? '';
    $phone = $row['phone'] ?? '';
    $company = $row['company'] ?? '';
    $date = $row['created_at'] ?? '';
    $status = $row['status'] ?? 'new';
    $email_sent = (int)($row['email_sent'] ?? 0);
    $admin_st = $row['admin_email_status'] ?? ($row['company_email_status'] ?? 'pending');
    $user_st = $row['user_email_status'] ?? ($row['applicant_email_status'] ?? 'pending');
    $email_err = $row['email_error'] ?? '';

    // Form-specific detail strings
    $topic = '';
    $message = '';
    $attachment_name = '';
    $attachment_path = '';

    if ($table === 'career_applications') {
        $topic = ($row['position'] ?? '') . ' (' . ($row['education'] ?? '') . ')';
        $message = $row['message'] ?? '';
        $attachment_name = $row['resume_filename'] ?? '';
        $attachment_path = $row['resume_filepath'] ?? '';
    } elseif ($table === 'student_registrations') {
        $topic = ($row['course_selected'] ?? '') . ' &bull; ' . ($row['batch_timing'] ?? '');
        $message = ($row['statement'] ?? '') . (!empty($row['resume_link']) ? "\nResume Link: " . $row['resume_link'] : '');
        $attachment_name = $row['resume_filename'] ?? '';
        $attachment_path = $row['resume_filepath'] ?? '';
    } elseif ($table === 'contact_messages') {
        $topic = $row['service_interest'] ?? 'General Inquiry';
        $message = $row['message'] ?? '';
    } elseif ($table === 'quotation_requests') {
        $topic = ($row['service_category'] ?? '') . ' (' . ($row['budget_range'] ?? '') . ')';
        $message = $row['requirements'] ?? '';
        $attachment_name = $row['attachment_filename'] ?? '';
        $attachment_path = $row['attachment_filepath'] ?? '';
    } elseif ($table === 'consultation_bookings') {
        $topic = ($row['topic'] ?? '') . ' &bull; ' . ($row['preferred_date'] ?? '') . ' ' . ($row['preferred_time'] ?? '');
        $message = $row['notes'] ?? '';
    }

    return [
        'id' => (int)($row['id'] ?? 0),
        'table' => $table,
        'form_type' => $cfg['type'],
        'form_title' => $cfg['title'],
        'badge_color' => $cfg['badge'],
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'topic' => $topic,
        'message' => $message,
        'has_attachment' => (!empty($attachment_path) && file_exists($attachment_path)),
        'attachment_name' => $attachment_name ?: (!empty($attachment_path) ? basename($attachment_path) : ''),
        'attachment_path' => $attachment_path,
        'status' => $status,
        'email_sent' => $email_sent,
        'admin_email_status' => $admin_st,
        'user_email_status' => $user_st,
        'email_error' => $email_err,
        'created_at' => $date,
        'raw' => $row
    ];
}

// -------------------------------------------------------------
// ACTION: ALL SUBMISSIONS (Aggregated)
// -------------------------------------------------------------
if ($action === 'all' || $action === 'list') {
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
    $tables = [
        'career_applications',
        'student_registrations',
        'contact_messages',
        'quotation_requests',
        'consultation_bookings'
    ];

    $all_items = [];
    $counts = [
        'total' => 0,
        'career' => 0,
        'internship' => 0,
        'contact' => 0,
        'quote' => 0,
        'consultation' => 0,
        'pending_action' => 0
    ];

    foreach ($tables as $t) {
        $rows = get_records($t, 150);
        foreach ($rows as $r) {
            $normalized = normalize_submission($r, $t);
            $all_items[] = $normalized;
            $counts['total']++;
            $ft = $normalized['form_type'];
            if (isset($counts[$ft])) $counts[$ft]++;
            if (in_array(strtolower($normalized['status']), ['new', 'pending', 'under_review'])) {
                $counts['pending_action']++;
            }
        }
    }

    // Sort descending by date
    usort($all_items, function($a, $b) {
        return strtotime($b['created_at']) <=> strtotime($a['created_at']);
    });

    echo json_encode([
        'success' => true,
        'counts' => $counts,
        'submissions' => $all_items
    ]);
    exit;
}

// -------------------------------------------------------------
// ACTION: UPDATE STATUS
// -------------------------------------------------------------
if ($action === 'update_status' && $request_method === 'POST') {
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
    $raw = file_get_contents('php://input');
    $json = !empty($raw) ? json_decode($raw, true) : [];
    $payload = array_merge($_POST, is_array($json) ? $json : []);

    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $payload['table'] ?? '');
    $id = (int)($payload['id'] ?? 0);
    $status = trim($payload['status'] ?? 'new');

    $allowed_tables = ['career_applications', 'student_registrations', 'contact_messages', 'quotation_requests', 'consultation_bookings'];
    if (!in_array($table, $allowed_tables) || !$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid table or submission ID']);
        exit;
    }

    $ok = update_record_status($table, $id, $status);
    echo json_encode([
        'success' => (bool)$ok,
        'table' => $table,
        'id' => $id,
        'status' => $status,
        'message' => $ok ? 'Status updated successfully' : 'Failed to update status'
    ]);
    exit;
}

// -------------------------------------------------------------
// ACTION: RESEND EMAIL NOTIFICATION
// -------------------------------------------------------------
if ($action === 'resend_email') {
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table'] ?? ($_POST['table'] ?? ''));
    $id = (int)($_GET['id'] ?? ($_POST['id'] ?? 0));

    $allowed_tables = ['career_applications', 'student_registrations', 'contact_messages', 'quotation_requests', 'consultation_bookings'];
    if (!in_array($table, $allowed_tables) || !$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid table or submission ID']);
        exit;
    }

    $record = get_record_by_id($table, $id);
    if (!$record) {
        http_response_code(404);
        echo json_encode(['error' => 'Submission record not found.']);
        exit;
    }

    $normalized = normalize_submission($record, $table);
    $attachments = [];
    if (!empty($normalized['attachment_path']) && file_exists($normalized['attachment_path'])) {
        $attachments[] = [
            'path' => $normalized['attachment_path'],
            'name' => $normalized['attachment_name'] ?: basename($normalized['attachment_path'])
        ];
    }

    // Build fields map
    $fields = [];
    if ($table === 'career_applications') {
        $fields = [
            'Full Name' => $record['full_name'] ?? '',
            'Email Address' => $record['email'] ?? '',
            'Phone' => $record['phone'] ?? '',
            'Target Position' => $record['position'] ?? '',
            'Applying For' => $record['applying_for'] ?? 'Internship',
            'Education' => $record['education'] ?? '',
            'Message' => $record['message'] ?? ''
        ];
    } elseif ($table === 'student_registrations') {
        $fields = [
            'Candidate Name' => $record['full_name'] ?? '',
            'Email Address' => $record['email'] ?? '',
            'Phone' => $record['phone'] ?? '',
            'Qualification' => $record['qualification'] ?? '',
            'Course Selected' => $record['course_selected'] ?? '',
            'Batch Timing' => $record['batch_timing'] ?? '',
            'Statement' => $record['statement'] ?? ''
        ];
    } elseif ($table === 'contact_messages') {
        $fields = [
            'Full Name' => $record['name'] ?? '',
            'Email Address' => $record['email'] ?? '',
            'Phone' => $record['phone'] ?? '',
            'Company' => $record['company'] ?? '',
            'Service Interest' => $record['service_interest'] ?? '',
            'Message' => $record['message'] ?? ''
        ];
    } elseif ($table === 'quotation_requests') {
        $fields = [
            'Client Name' => $record['name'] ?? '',
            'Email Address' => $record['email'] ?? '',
            'Phone' => $record['phone'] ?? '',
            'Company' => $record['company'] ?? '',
            'Service Category' => $record['service_category'] ?? '',
            'Budget Range' => $record['budget_range'] ?? '',
            'Timeline' => $record['project_timeline'] ?? '',
            'Requirements' => $record['requirements'] ?? ''
        ];
    } elseif ($table === 'consultation_bookings') {
        $fields = [
            'Client Name' => $record['name'] ?? '',
            'Email Address' => $record['email'] ?? '',
            'Phone' => $record['phone'] ?? '',
            'Company' => $record['company'] ?? '',
            'Topic' => $record['topic'] ?? '',
            'Preferred Date' => $record['preferred_date'] ?? '',
            'Preferred Time' => $record['preferred_time'] ?? '',
            'Notes' => $record['notes'] ?? ''
        ];
    }

    $ref_id = 'NTX-' . strtoupper(substr($normalized['form_type'], 0, 3)) . '-' . date('Ymd') . '-' . str_pad($id, 4, '0', STR_PAD_LEFT);
    $res = NextTechXMailer::sendFormSubmission(
        $normalized['form_type'],
        $normalized['form_title'],
        $fields,
        $normalized['email'],
        $normalized['name'],
        $attachments,
        $ref_id
    );

    $admin_sent = !empty($res['company_email_sent']);
    $user_sent = !empty($res['user_email_sent']);
    $overall_sent = ($admin_sent && $user_sent);
    $email_err = trim(($res['company_error'] ?? '') . ' | ' . ($res['user_error'] ?? ''), ' |');

    // Update in DB
    $extra_updates = [
        'email_sent' => $overall_sent ? 1 : ($admin_sent || $user_sent ? 1 : 0),
        'email_error' => $email_err ?: null
    ];
    if ($table === 'career_applications') {
        $extra_updates['company_email_status'] = $admin_sent ? 'sent' : 'failed';
        $extra_updates['applicant_email_status'] = $user_sent ? 'sent' : 'failed';
    } else {
        $extra_updates['admin_email_status'] = $admin_sent ? 'sent' : 'failed';
        $extra_updates['user_email_status'] = $user_sent ? 'sent' : 'failed';
    }
    update_record_status($table, $id, $record['status'] ?? 'under_review', $extra_updates);

    echo json_encode([
        'success' => true,
        'message' => 'Email notification retry executed.',
        'admin_notification_sent' => $admin_sent,
        'user_confirmation_sent' => $user_sent,
        'overall_sent' => $overall_sent,
        'admin_error' => $res['company_error'] ?? null,
        'user_error' => $res['user_error'] ?? null,
        'smtp_meta' => NextTechXMailer::$last_smtp_meta ?? null
    ]);
    exit;
}

// -------------------------------------------------------------
// ACTION: DOWNLOAD ATTACHMENT
// -------------------------------------------------------------
if ($action === 'download_attachment') {
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table'] ?? '');
    $id = (int)($_GET['id'] ?? 0);

    $record = get_record_by_id($table, $id);
    if (!$record) {
        http_response_code(404);
        echo "Record not found.";
        exit;
    }

    $normalized = normalize_submission($record, $table);
    $fpath = $normalized['attachment_path'];
    $fname = $normalized['attachment_name'] ?: basename($fpath);

    if (!empty($fpath) && file_exists($fpath) && is_readable($fpath)) {
        $mime = 'application/octet-stream';
        if (function_exists('mime_content_type')) {
            $mime = mime_content_type($fpath) ?: $mime;
        }

        header('Content-Description: File Transfer');
        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . basename($fname) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fpath));
        readfile($fpath);
        exit;
    }

    http_response_code(404);
    echo "Attachment file not found on disk: " . htmlspecialchars($fname);
    exit;
}

// -------------------------------------------------------------
// ACTION: DIRECT SMTP TEST
// -------------------------------------------------------------
if ($action === 'test_smtp') {
    if (!headers_sent()) header('Content-Type: application/json; charset=utf-8');
    $recipient = trim($_POST['recipient'] ?? ($_GET['recipient'] ?? 'nextechxsolutions@gmail.com'));
    if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        $recipient = 'nextechxsolutions@gmail.com';
    }

    $result = NextTechXMailer::testSmtpDelivery($recipient);
    echo json_encode($result);
    exit;
}

// -------------------------------------------------------------
// ACTION: EXPORT CSV
// -------------------------------------------------------------
if ($action === 'export_csv') {
    $tables = [
        'career_applications',
        'student_registrations',
        'contact_messages',
        'quotation_requests',
        'consultation_bookings'
    ];

    $filter_table = $_GET['table'] ?? '';
    if (!empty($filter_table) && in_array($filter_table, $tables)) {
        $tables = [$filter_table];
    }

    $all_items = [];
    foreach ($tables as $t) {
        $rows = get_records($t, 500);
        foreach ($rows as $r) {
            $all_items[] = normalize_submission($r, $t);
        }
    }

    usort($all_items, function($a, $b) {
        return strtotime($b['created_at']) <=> strtotime($a['created_at']);
    });

    $filename = 'nextechx_submissions_' . date('Ymd_His') . '.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    // BOM for Excel compatibility
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

    // Headers
    fputcsv($output, [
        'ID',
        'Form Type',
        'Date & Time',
        'Candidate / Client Name',
        'Email Address',
        'Phone Number',
        'Company',
        'Topic / Position / Service',
        'Message / Requirements',
        'Attachment',
        'Status',
        'Email Dispatched',
        'Admin Email Status',
        'User Email Status'
    ]);

    foreach ($all_items as $sub) {
        fputcsv($output, [
            $sub['id'],
            $sub['form_title'],
            $sub['created_at'],
            $sub['name'],
            $sub['email'],
            $sub['phone'],
            $sub['company'],
            $sub['topic'],
            $sub['message'],
            $sub['attachment_name'],
            $sub['status'],
            $sub['email_sent'] ? 'Yes' : 'No',
            $sub['admin_email_status'],
            $sub['user_email_status']
        ]);
    }

    fclose($output);
    exit;
}

// Default 404
http_response_code(404);
echo json_encode(['error' => 'Unknown action']);

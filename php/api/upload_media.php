<?php
// NexTechX Solutions - Secure Media Upload Handler
session_start();
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/cms.php';

// Verify Admin Session
if (empty($_SESSION['admin_user'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Unauthorized. Admin session required.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['media_file'])) {
    echo json_encode(['success' => false, 'error' => 'No media file provided.']);
    exit;
}

$file = $_FILES['media_file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'error' => 'File upload error code: ' . $file['error']]);
    exit;
}

// 1. Strict Size Limit (15 MB)
$max_size = 15 * 1024 * 1024;
if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'error' => 'File size exceeds 15 MB limit.']);
    exit;
}

// 2. Strict Extension Whitelist
$original_name = $file['name'];
$ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
$allowed_extensions = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif', 'pdf', 'doc', 'docx', 'mp4'];

if (!in_array($ext, $allowed_extensions)) {
    echo json_encode(['success' => false, 'error' => "File extension '.{$ext}' is not permitted."]);
    exit;
}

// Prevent double extensions or executable bypasses
if (preg_match('/\.(php|phtml|phar|pl|py|cgi|sh|bat|cmd|exe)(\.|$)/i', $original_name)) {
    echo json_encode(['success' => false, 'error' => 'Executable file patterns are strictly prohibited.']);
    exit;
}

// 3. Strict MIME Type Validation
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

$allowed_mimes = [
    'image/png', 'image/jpeg', 'image/webp', 'image/svg+xml', 'image/gif',
    'application/pdf', 'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'video/mp4'
];

if (!in_array($mime, $allowed_mimes)) {
    // Handle SVG MIME variations safely
    if ($ext === 'svg' && (strpos($mime, 'xml') !== false || strpos($mime, 'svg') !== false)) {
        // allowed
    } else {
        echo json_encode(['success' => false, 'error' => "Invalid file MIME type ({$mime})."]);
        exit;
    }
}

// 4. Generate Safe Unique Filename
$clean_basename = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($original_name, PATHINFO_FILENAME));
$unique_name = $clean_basename . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

$upload_dir = __DIR__ . '/../uploads/media';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

$target_path = $upload_dir . '/' . $unique_name;
$relative_path = 'uploads/media/' . $unique_name;

if (!move_uploaded_file($file['tmp_name'], $target_path)) {
    echo json_encode(['success' => false, 'error' => 'Failed to save uploaded file to disk.']);
    exit;
}

// Also mirror to frontend/public/uploads/media if directory exists
$frontend_dir = __DIR__ . '/../../frontend/public/uploads/media';
if (is_dir(dirname($frontend_dir))) {
    @mkdir($frontend_dir, 0755, true);
    @copy($target_path, $frontend_dir . '/' . $unique_name);
}

// 5. Record in Database & CMS Media Store
$alt_text = trim($_POST['alt_text'] ?? pathinfo($original_name, PATHINFO_FILENAME));
$media_record = cms_save_media([
    'original_name' => $original_name,
    'file_name' => $unique_name,
    'file_path' => $relative_path,
    'file_size' => (int)$file['size'],
    'file_type' => $mime,
    'alt_text' => $alt_text
]);

echo json_encode([
    'success' => true,
    'message' => 'File uploaded successfully.',
    'media' => $media_record,
    'url' => $relative_path
]);

<?php
// NextTechX Solutions - Secure Admin Authentication & Session API
session_start();
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/cms.php';

// Session Security & Expiry (2 Hours timeout)
$session_timeout = 7200;
if (isset($_SESSION['admin_auth_time']) && (time() - $_SESSION['admin_auth_time'] > $session_timeout)) {
    unset($_SESSION['admin_user']);
    unset($_SESSION['admin_auth_time']);
    unset($_SESSION['admin_csrf_token']);
}

// Generate CSRF token if not exists
if (empty($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

// Read JSON input if sent as application/json
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true) ?: [];
if (!empty($json_data['action']) && empty($action)) {
    $action = $json_data['action'];
}

switch ($action) {
    case 'login':
        $username = trim($json_data['username'] ?? $_POST['username'] ?? '');
        $password = (string)($json_data['password'] ?? $_POST['password'] ?? '');

        if (!$username || !$password) {
            echo json_encode(['success' => false, 'message' => 'Username and password are required.']);
            exit;
        }

        $user = cms_admin_authenticate($username, $password);
        if ($user) {
            // Regenerate session ID to prevent fixation
            session_regenerate_id(true);
            $_SESSION['admin_user'] = $user;
            $_SESSION['admin_auth_time'] = time();
            $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));

            echo json_encode([
                'success' => true,
                'message' => 'Authentication successful.',
                'user' => $user,
                'csrf_token' => $_SESSION['admin_csrf_token']
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }
        break;

    case 'check':
        if (!empty($_SESSION['admin_user'])) {
            $_SESSION['admin_auth_time'] = time(); // Refresh activity
            echo json_encode([
                'authenticated' => true,
                'user' => $_SESSION['admin_user'],
                'csrf_token' => $_SESSION['admin_csrf_token']
            ]);
        } else {
            echo json_encode(['authenticated' => false]);
        }
        break;

    case 'logout':
        unset($_SESSION['admin_user']);
        unset($_SESSION['admin_auth_time']);
        unset($_SESSION['admin_csrf_token']);
        session_destroy();
        echo json_encode(['success' => true, 'message' => 'Logged out successfully.']);
        break;

    case 'change_password':
        if (empty($_SESSION['admin_user'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized.']);
            exit;
        }

        $current_password = (string)($json_data['current_password'] ?? $_POST['current_password'] ?? '');
        $new_password = (string)($json_data['new_password'] ?? $_POST['new_password'] ?? '');
        $user_id = $_SESSION['admin_user']['id'];
        $username = $_SESSION['admin_user']['username'];

        // Verify current password
        $verify = cms_admin_authenticate($username, $current_password);
        if (!$verify) {
            echo json_encode(['success' => false, 'message' => 'Current password is incorrect.']);
            exit;
        }

        $res = cms_admin_change_password($user_id, $new_password);
        echo json_encode($res);
        break;

    default:
        echo json_encode([
            'status' => 'active',
            'authenticated' => !empty($_SESSION['admin_user'])
        ]);
        break;
}

<?php
// NextTechX Solutions - Global Configuration & Database Setup
error_reporting(E_ALL);
ini_set('display_errors', '0');

define('SITE_NAME', 'NextTechX Solutions');
define('SITE_TAGLINE', 'Your Vision Our Technology');
define('SITE_EMAIL', 'contact@nextechxsolutions.com');
define('SITE_EMAIL_CONTACT', 'contact@nextechxsolutions.com');
define('SITE_EMAIL_HR', 'hr@nextechxsolutions.com');
define('SITE_EMAIL_HR_ALT', 'hr@nextechxsolutions.com');
define('SITE_EMAIL_GENERAL', 'nextechxsolutions@gmail.com');
define('SITE_PHONE', '+91 93098 35085');
define('SITE_PHONE_TEL', '+919309835085');
define('SITE_WHATSAPP_URL', 'https://wa.me/919309835085?text=Hello%20NextTechX%20Solutions,%20I%20would%20like%20to%20inquire%20about%20your%20services%20and%20programs.');
define('SITE_LINKEDIN_URL', 'https://www.linkedin.com/company/nextechx-solutions/');
define('SITE_DELIVERY_MODEL', 'Online-First Global Delivery');
function get_persistent_db_path() {
    if (!empty($_SERVER['DOCUMENT_ROOT'])) {
        $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\');
        $parent = dirname($doc_root);
        // If parent is outside web root (standard Hostinger /home/u.../domains/...), use persistent storage
        if (is_dir($parent) && is_writable($parent)) {
            $persistent_dir = $parent . '/nextechx_persistent_data';
            if (is_dir($persistent_dir) || @mkdir($persistent_dir, 0755, true)) {
                $p_db = $persistent_dir . '/app.db';
                // Copy existing local DB if newly initializing persistent DB
                $local_db = __DIR__ . '/../data/app.db';
                if (!file_exists($p_db) && file_exists($local_db)) {
                    @copy($local_db, $p_db);
                }
                return $p_db;
            }
        }
    }
    return __DIR__ . '/../data/app.db';
}

define('DB_PATH', get_persistent_db_path());

/**
 * Get PDO SQLite database connection (returns null if pdo_sqlite driver unavailable)
 */
function get_db() {
    static $pdo = null;
    if ($pdo === null) {
        if (!extension_loaded('pdo_sqlite')) {
            return null;
        }
        $db_dir = dirname(DB_PATH);
        if (!is_dir($db_dir)) {
            mkdir($db_dir, 0755, true);
        }
        try {
            $pdo = new PDO('sqlite:' . DB_PATH);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Ensure tables exist
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS contact_messages (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL,
                    email TEXT NOT NULL,
                    phone TEXT,
                    company TEXT,
                    service_interest TEXT,
                    message TEXT NOT NULL,
                    status TEXT DEFAULT 'new',
                    email_sent INTEGER DEFAULT 0,
                    admin_email_status TEXT DEFAULT 'pending',
                    user_email_status TEXT DEFAULT 'pending',
                    email_error TEXT,
                    created_at TEXT DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS quotation_requests (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL,
                    email TEXT NOT NULL,
                    phone TEXT NOT NULL,
                    company TEXT,
                    service_category TEXT NOT NULL,
                    budget_range TEXT,
                    project_timeline TEXT,
                    requirements TEXT NOT NULL,
                    attachment_filename TEXT,
                    attachment_filepath TEXT,
                    status TEXT DEFAULT 'pending',
                    email_sent INTEGER DEFAULT 0,
                    admin_email_status TEXT DEFAULT 'pending',
                    user_email_status TEXT DEFAULT 'pending',
                    email_error TEXT,
                    created_at TEXT DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS consultation_bookings (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL,
                    email TEXT NOT NULL,
                    phone TEXT NOT NULL,
                    company TEXT,
                    topic TEXT NOT NULL,
                    preferred_date TEXT NOT NULL,
                    preferred_time TEXT NOT NULL,
                    notes TEXT,
                    status TEXT DEFAULT 'scheduled',
                    email_sent INTEGER DEFAULT 0,
                    admin_email_status TEXT DEFAULT 'pending',
                    user_email_status TEXT DEFAULT 'pending',
                    email_error TEXT,
                    created_at TEXT DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS student_registrations (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    full_name TEXT NOT NULL,
                    email TEXT NOT NULL,
                    phone TEXT NOT NULL,
                    qualification TEXT NOT NULL,
                    current_status TEXT NOT NULL,
                    course_selected TEXT NOT NULL,
                    batch_timing TEXT NOT NULL,
                    resume_link TEXT,
                    resume_filename TEXT,
                    resume_filepath TEXT,
                    statement TEXT,
                    status TEXT DEFAULT 'under_review',
                    email_sent INTEGER DEFAULT 0,
                    admin_email_status TEXT DEFAULT 'pending',
                    user_email_status TEXT DEFAULT 'pending',
                    email_error TEXT,
                    created_at TEXT DEFAULT CURRENT_TIMESTAMP
                );
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
                    status TEXT DEFAULT 'under_review',
                    email_sent INTEGER DEFAULT 0,
                    applicant_email_status TEXT DEFAULT 'pending',
                    company_email_status TEXT DEFAULT 'pending',
                    email_error TEXT,
                    created_at TEXT DEFAULT CURRENT_TIMESTAMP
                );
            ");

            // Automatic safe column migrations for existing SQLite databases
            $tables_columns = [
                'contact_messages' => ['email_sent' => 'INTEGER DEFAULT 0', 'admin_email_status' => "TEXT DEFAULT 'pending'", 'user_email_status' => "TEXT DEFAULT 'pending'", 'email_error' => 'TEXT'],
                'quotation_requests' => ['attachment_filename' => 'TEXT', 'attachment_filepath' => 'TEXT', 'email_sent' => 'INTEGER DEFAULT 0', 'admin_email_status' => "TEXT DEFAULT 'pending'", 'user_email_status' => "TEXT DEFAULT 'pending'", 'email_error' => 'TEXT'],
                'consultation_bookings' => ['email_sent' => 'INTEGER DEFAULT 0', 'admin_email_status' => "TEXT DEFAULT 'pending'", 'user_email_status' => "TEXT DEFAULT 'pending'", 'email_error' => 'TEXT'],
                'student_registrations' => ['resume_filename' => 'TEXT', 'resume_filepath' => 'TEXT', 'email_sent' => 'INTEGER DEFAULT 0', 'admin_email_status' => "TEXT DEFAULT 'pending'", 'user_email_status' => "TEXT DEFAULT 'pending'", 'email_error' => 'TEXT'],
                'career_applications' => ['status' => "TEXT DEFAULT 'under_review'", 'applicant_email_status' => "TEXT DEFAULT 'pending'", 'company_email_status' => "TEXT DEFAULT 'pending'", 'email_error' => 'TEXT']
            ];

            foreach ($tables_columns as $table => $cols) {
                try {
                    $existing = $pdo->query("PRAGMA table_info($table)")->fetchAll(PDO::FETCH_COLUMN, 1);
                    foreach ($cols as $col => $def) {
                        if (!in_array($col, $existing)) {
                            $pdo->exec("ALTER TABLE $table ADD COLUMN $col $def");
                        }
                    }
                } catch (\Throwable $migErr) {}
            }
        } catch (Exception $e) {
            $pdo = null;
        }
    }
    return $pdo;
}

/**
 * Fallback store if SQLite PDO is not configured
 */
function save_record_fallback($table, $data) {
    $db_dir = dirname(DB_PATH);
    if (!is_dir($db_dir)) {
        mkdir($db_dir, 0755, true);
    }
    $file = $db_dir . '/fallback_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $table) . '.json';
    $records = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if (!is_array($records)) $records = [];
    $data['id'] = count($records) + 1;
    $data['created_at'] = date('Y-m-d H:i:s');
    $records[] = $data;
    file_put_contents($file, json_encode($records, JSON_PRETTY_PRINT));
    return true;
}

/**
 * Fetch all records from SQLite or fallback JSON
 */
function get_records($table, $limit = 250) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM " . preg_replace('/[^a-zA-Z0-9_]/', '', $table) . " ORDER BY id DESC LIMIT " . (int)$limit);
            return $stmt->fetchAll();
        } catch (\Throwable $e) {}
    }
    $db_dir = dirname(DB_PATH);
    $file = $db_dir . '/fallback_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $table) . '.json';
    if (file_exists($file)) {
        $arr = json_decode(file_get_contents($file), true);
        if (is_array($arr)) {
            usort($arr, fn($a, $b) => ($b['id'] ?? 0) <=> ($a['id'] ?? 0));
            return array_slice($arr, 0, $limit);
        }
    }
    return [];
}

/**
 * Update record status in SQLite or fallback JSON
 */
function update_record_status($table, $id, $status, $extra = []) {
    $db = get_db();
    if ($db) {
        try {
            $sets = ["status = :status"];
            $params = [':status' => $status, ':id' => (int)$id];
            foreach ($extra as $k => $v) {
                $clean_k = preg_replace('/[^a-zA-Z0-9_]/', '', $k);
                $sets[] = "$clean_k = :$clean_k";
                $params[":$clean_k"] = $v;
            }
            $sql = "UPDATE " . preg_replace('/[^a-zA-Z0-9_]/', '', $table) . " SET " . implode(', ', $sets) . " WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute($params);
        } catch (\Throwable $e) {}
    }
    $db_dir = dirname(DB_PATH);
    $file = $db_dir . '/fallback_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $table) . '.json';
    if (file_exists($file)) {
        $arr = json_decode(file_get_contents($file), true);
        if (is_array($arr)) {
            foreach ($arr as &$item) {
                if (($item['id'] ?? null) == $id) {
                    $item['status'] = $status;
                    foreach ($extra as $k => $v) {
                        $item[$k] = $v;
                    }
                    file_put_contents($file, json_encode($arr, JSON_PRETTY_PRINT));
                    return true;
                }
            }
        }
    }
    return false;
}

/**
 * Get single record by ID
 */
function get_record_by_id($table, $id) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM " . preg_replace('/[^a-zA-Z0-9_]/', '', $table) . " WHERE id = :id");
            $stmt->execute([':id' => (int)$id]);
            return $stmt->fetch();
        } catch (\Throwable $e) {}
    }
    $db_dir = dirname(DB_PATH);
    $file = $db_dir . '/fallback_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $table) . '.json';
    if (file_exists($file)) {
        $arr = json_decode(file_get_contents($file), true);
        if (is_array($arr)) {
            foreach ($arr as $item) {
                if (($item['id'] ?? null) == $id) return $item;
            }
        }
    }
    return null;
}

/**
 * Return active CSS classes if page matches
 */
function is_active($page) {
    $current = basename($_SERVER['PHP_SELF'], '.php');
    if ($current === 'index' && $page === 'home') return true;
    return $current === $page;
}

/**
 * Render the official NextTechX logo with circular 3D emblem & tagline
 */
function render_logo($is_dark = false, $size = 'md', $show_tagline = true) {
    $badge_src = $is_dark ? 'assets/images/nexttechx-badge-dark.webp' : 'assets/images/nexttechx-badge.webp';
    $name_color = $is_dark ? 'text-white' : 'text-slate-900';
    $tagline_color = $is_dark ? 'text-cyan-400/90' : 'text-slate-500';
    
    // Size scales
    $badge_sz = 'w-8 h-8 sm:w-9 sm:h-9 xl:w-10 xl:h-10';
    $brand_text = 'text-[15px] sm:text-base xl:text-lg';
    $tagline_text = 'text-[8px] sm:text-[8.5px] xl:text-[9.5px]';

    if ($size === 'sm') {
        $badge_sz = 'w-7 h-7 sm:w-8 sm:h-8';
        $brand_text = 'text-sm sm:text-base';
        $tagline_text = 'text-[7.5px] sm:text-[8px]';
    } elseif ($size === 'lg') {
        $badge_sz = 'w-11 h-11 sm:w-13 sm:h-13';
        $brand_text = 'text-lg sm:text-xl xl:text-2xl';
        $tagline_text = 'text-[10px] sm:text-xs';
    }

    $html = '<div class="inline-flex items-center gap-2 sm:gap-2.5 select-none transition-transform duration-200 group-hover:scale-[1.02]">';
    $html .= '<img src="' . htmlspecialchars($badge_src) . '" alt="NextTechX Solutions Emblem" class="' . $badge_sz . ' object-contain shrink-0 drop-shadow-sm rounded-full" loading="eager">';
    $html .= '<div class="text-left flex flex-col justify-center">';
    $html .= '<div class="flex items-center font-heading font-black tracking-tight leading-none whitespace-nowrap ' . $brand_text . '">';
    $html .= '<span class="' . $name_color . '">NextTech</span>';
    $html .= '<span class="text-cyan-500 ml-0.5">X</span>';
    $html .= '<span class="ml-1 font-bold ' . ($is_dark ? 'text-cyan-400' : 'text-blue-600') . '">Solutions</span>';
    $html .= '</div>';
    if ($show_tagline) {
        $html .= '<p class="whitespace-nowrap tracking-wider font-bold uppercase font-heading mt-0.5 ' . $tagline_text . ' ' . $tagline_color . '">' . SITE_TAGLINE . '</p>';
    }
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
?>

<?php
// NextTechX Solutions - Centralized Website CMS REST API (Part 1 & 2)
session_start();
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/cms.php';

// Helper to check admin authorization
function require_admin_auth($required_permission = null) {
    if (empty($_SESSION['admin_user'])) {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Unauthorized. Admin session required.']);
        exit;
    }
    if ($required_permission !== null) {
        $role = $_SESSION['admin_role'] ?? 'super_admin';
        if (!cms_user_can($required_permission, $role)) {
            http_response_code(403);
            echo json_encode(['success' => false, 'error' => "Forbidden. Your role ({$role}) cannot perform this action."]);
            exit;
        }
    }
}

// Read input payload
$raw_input = file_get_contents('php://input');
$json_input = json_decode($raw_input, true) ?: [];
$action = $_GET['action'] ?? $json_input['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'initial_setup':
        $existing = cms_get_admin_users();
        if (!empty($existing)) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Initial setup is locked because an administrator already exists.']);
            exit;
        }
        $u = trim($_POST['username'] ?? $json_input['username'] ?? '');
        $em = trim($_POST['email'] ?? $json_input['email'] ?? '');
        $pw = (string)($_POST['password'] ?? $json_input['password'] ?? '');
        if (strlen($u) < 3 || !filter_var($em, FILTER_VALIDATE_EMAIL) || strlen($pw) < 8) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Username (>=3 chars), valid email, and password (>=8 chars) required.']);
            exit;
        }
        $res = cms_create_admin_user([
            'username' => $u,
            'email' => $em,
            'full_name' => 'Master Administrator',
            'role' => 'super_admin',
            'password' => $pw
        ]);
        echo json_encode($res);
        exit;

    // ==========================================
    // 1. PUBLIC READ ENDPOINTS
    // ==========================================

    case 'get_settings':
        echo json_encode(['success' => true, 'settings' => cms_get_all_settings()]);
        break;

    case 'get_appearance':
        echo json_encode(['success' => true, 'appearance' => cms_get_appearance()]);
        break;

    case 'get_navigation':
        $loc = $_GET['location'] ?? 'primary_header';
        echo json_encode(['success' => true, 'navigation' => cms_get_navigation($loc)]);
        break;

    case 'get_page':
        $slug = trim($_GET['slug'] ?? 'home');
        $page = cms_get_page($slug);
        $sections = cms_get_page_sections($slug, true);
        echo json_encode(['success' => true, 'page' => $page, 'sections' => $sections]);
        break;

    case 'get_section':
        $slug = trim($_GET['slug'] ?? 'home');
        $key = trim($_GET['key'] ?? 'hero');
        $section = cms_get_section($slug, $key, null);
        echo json_encode(['success' => $section !== null, 'section' => $section]);
        break;

    case 'get_services_public':
    case 'get_services':
        $active_only = !isset($_GET['all']) || $_GET['all'] !== '1';
        echo json_encode(['success' => true, 'services' => cms_get_services($active_only)]);
        break;

    case 'get_service':
        $slug = trim($_GET['slug'] ?? '');
        $srv = cms_get_service($slug);
        echo json_encode(['success' => $srv !== null, 'service' => $srv]);
        break;

    case 'get_career_opportunities_public':
    case 'get_career_opportunities':
        $active_only = !isset($_GET['all']) || $_GET['all'] !== '1';
        echo json_encode(['success' => true, 'opportunities' => cms_get_career_opportunities($active_only)]);
        break;

    case 'get_career_opportunity':
        $slug = trim($_GET['slug'] ?? '');
        $opp = cms_get_career_opportunity($slug);
        echo json_encode(['success' => $opp !== null, 'opportunity' => $opp]);
        break;

    case 'get_testimonials_public':
    case 'get_testimonials':
        $loc = $_GET['location'] ?? 'all';
        $published_only = !isset($_GET['all']) || $_GET['all'] !== '1';
        echo json_encode(['success' => true, 'testimonials' => cms_get_testimonials($loc, $published_only)]);
        break;

    case 'get_articles_public':
    case 'get_articles':
        $status = isset($_GET['all']) && $_GET['all'] === '1' ? null : 'published';
        echo json_encode(['success' => true, 'articles' => cms_get_articles($status)]);
        break;

    case 'get_article':
        $slug = trim($_GET['slug'] ?? '');
        $art = cms_get_article($slug);
        echo json_encode(['success' => $art !== null, 'article' => $art]);
        break;

    case 'get_form_config':
        $key = trim($_GET['key'] ?? 'contact_form');
        $f = cms_get_form($key);
        echo json_encode(['success' => $f !== null, 'form' => $f]);
        break;

    case 'get_chatbot_config':
        echo json_encode(['success' => true, 'chatbot' => cms_get_chatbot_config()]);
        break;

    case 'get_global_controls':
        echo json_encode([
            'success' => true,
            'maintenance' => cms_is_maintenance_mode(),
            'announcement' => cms_get_global_announcement(),
            'cookie_notice' => cms_get_cookie_notice()
        ]);
        break;

    case 'sitemap_xml':
        header('Content-Type: application/xml; charset=utf-8');
        echo cms_generate_sitemap_xml();
        exit;

    // ==========================================
    // 2. PROTECTED ADMIN SERVICES ENDPOINTS
    // ==========================================

    case 'save_service':
        require_admin_auth('services');
        $slug = trim($json_input['slug'] ?? $_POST['slug'] ?? '');
        $data = $json_input['service'] ?? $_POST['service'] ?? $json_input;
        if (!$slug) {
            echo json_encode(['success' => false, 'message' => 'Service slug is required.']);
            exit;
        }
        $saved = cms_save_service($slug, $data);
        echo json_encode(['success' => $saved, 'message' => 'Service saved successfully.', 'service' => cms_get_service($slug)]);
        break;

    case 'delete_service':
        require_admin_auth('services');
        $slug = trim($json_input['slug'] ?? $_POST['slug'] ?? '');
        if (!$slug) {
            echo json_encode(['success' => false, 'message' => 'Service slug required.']);
            exit;
        }
        $deleted = cms_delete_service($slug);
        echo json_encode(['success' => $deleted, 'message' => 'Service deleted successfully.']);
        break;

    case 'reorder_services':
        require_admin_auth('services');
        $slugs = $json_input['ordered_slugs'] ?? [];
        $reordered = cms_reorder_services($slugs);
        echo json_encode(['success' => $reordered, 'message' => 'Services reordered successfully.']);
        break;

    // ==========================================
    // 3. PROTECTED CAREERS & APPLICATIONS ENDPOINTS
    // ==========================================

    case 'save_career_opportunity':
        require_admin_auth('careers');
        $data = $json_input['opportunity'] ?? $_POST['opportunity'] ?? $json_input;
        $saved = cms_save_career_opportunity($data);
        echo json_encode(['success' => $saved, 'message' => 'Opportunity saved successfully.']);
        break;

    case 'delete_career_opportunity':
        require_admin_auth('careers');
        $slug = trim($json_input['slug'] ?? $_POST['slug'] ?? $json_input['id'] ?? '');
        $deleted = cms_delete_career_opportunity($slug);
        echo json_encode(['success' => $deleted, 'message' => 'Opportunity deleted successfully.']);
        break;

    case 'get_career_applications':
        require_admin_auth('applications');
        $filters = [
            'status' => $_GET['status'] ?? 'all',
            'position' => $_GET['position'] ?? 'all',
            'search' => $_GET['search'] ?? ''
        ];
        $apps = cms_get_career_applications($filters);
        echo json_encode(['success' => true, 'applications' => $apps]);
        break;

    case 'update_application_status':
        require_admin_auth('applications');
        $id = (int)($json_input['id'] ?? $_POST['id'] ?? 0);
        $status = trim($json_input['status'] ?? $_POST['status'] ?? '');
        $notes = $json_input['internal_notes'] ?? $_POST['internal_notes'] ?? null;
        if (!$id || !$status) {
            echo json_encode(['success' => false, 'message' => 'ID and status are required.']);
            exit;
        }
        $updated = cms_update_application_status($id, $status, $notes);
        echo json_encode(['success' => $updated, 'message' => "Application status updated to {$status}."]);
        break;

    case 'export_applications_csv':
        require_admin_auth('export');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=nextechx_career_applications_' . date('Ymd_His') . '.csv');
        echo cms_export_applications_csv();
        exit;

    // ==========================================
    // 4. INQUIRIES & CONTACTS ENDPOINTS
    // ==========================================

    case 'get_inquiries':
        require_admin_auth('inquiries');
        $type = $_GET['type'] ?? 'contact';
        $filters = ['status' => $_GET['status'] ?? 'all', 'search' => $_GET['search'] ?? ''];
        echo json_encode(['success' => true, 'type' => $type, 'inquiries' => cms_get_inquiries($type, $filters)]);
        break;

    case 'update_inquiry_status':
        require_admin_auth('inquiries');
        $type = trim($json_input['type'] ?? $_POST['type'] ?? 'contact');
        $id = (int)($json_input['id'] ?? $_POST['id'] ?? 0);
        $status = trim($json_input['status'] ?? $_POST['status'] ?? '');
        $notes = $json_input['internal_notes'] ?? $_POST['internal_notes'] ?? null;
        $updated = cms_update_inquiry_status($type, $id, $status, $notes);
        echo json_encode(['success' => $updated, 'message' => "Inquiry status updated to {$status}."]);
        break;

    case 'export_inquiries_csv':
        require_admin_auth('export');
        $type = $_GET['type'] ?? 'contact';
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=nextechx_{$type}_inquiries_" . date('Ymd_His') . ".csv");
        echo cms_export_inquiries_csv($type);
        exit;

    // ==========================================
    // 5. FORMS MANAGEMENT ENDPOINTS
    // ==========================================

    case 'get_forms':
        require_admin_auth('sections');
        echo json_encode(['success' => true, 'forms' => cms_get_forms()]);
        break;

    case 'save_form':
        require_admin_auth('sections');
        $key = trim($json_input['form_key'] ?? $_POST['form_key'] ?? '');
        $data = $json_input['form_data'] ?? $_POST['form_data'] ?? $json_input;
        if (!$key) {
            echo json_encode(['success' => false, 'message' => 'form_key is required.']);
            exit;
        }
        $saved = cms_save_form($key, $data);
        echo json_encode(['success' => $saved, 'message' => 'Form configuration saved.']);
        break;

    // ==========================================
    // 6. EMAIL TEMPLATES ENDPOINTS
    // ==========================================

    case 'get_email_templates':
        require_admin_auth('sections');
        echo json_encode(['success' => true, 'templates' => cms_get_email_templates()]);
        break;

    case 'save_email_template':
        require_admin_auth('sections');
        $key = trim($json_input['template_key'] ?? $_POST['template_key'] ?? '');
        $data = $json_input['template'] ?? $_POST['template'] ?? $json_input;
        if (!$key) {
            echo json_encode(['success' => false, 'message' => 'template_key is required.']);
            exit;
        }
        $saved = cms_save_email_template($key, $data);
        echo json_encode(['success' => $saved, 'message' => 'Email template saved successfully.']);
        break;

    // ==========================================
    // 7. TESTIMONIALS ENDPOINTS
    // ==========================================

    case 'save_testimonial':
        require_admin_auth('testimonials');
        $data = $json_input['testimonial'] ?? $_POST['testimonial'] ?? $json_input;
        $saved = cms_save_testimonial($data);
        echo json_encode(['success' => $saved, 'message' => 'Testimonial saved.']);
        break;

    case 'delete_testimonial':
        require_admin_auth('testimonials');
        $id = (int)($json_input['id'] ?? $_POST['id'] ?? 0);
        $del = cms_delete_testimonial($id);
        echo json_encode(['success' => $del, 'message' => 'Testimonial removed.']);
        break;

    // ==========================================
    // 8. BLOG & ARTICLES ENDPOINTS
    // ==========================================

    case 'save_article':
        require_admin_auth('articles');
        $data = $json_input['article'] ?? $_POST['article'] ?? $json_input;
        $saved = cms_save_article($data);
        echo json_encode(['success' => $saved, 'message' => 'Article saved.']);
        break;

    case 'delete_article':
        require_admin_auth('articles');
        $slug = trim($json_input['slug'] ?? $_POST['slug'] ?? '');
        $del = cms_delete_article($slug);
        echo json_encode(['success' => $del, 'message' => 'Article deleted.']);
        break;

    // ==========================================
    // 9. SEO MANAGEMENT ENDPOINTS
    // ==========================================

    case 'get_page_seo':
        require_admin_auth('seo');
        $slug = trim($_GET['slug'] ?? 'home');
        echo json_encode(['success' => true, 'slug' => $slug, 'seo' => cms_get_page_seo($slug)]);
        break;

    case 'save_page_seo':
        require_admin_auth('seo');
        $slug = trim($json_input['slug'] ?? $_POST['slug'] ?? '');
        $seo_data = $json_input['seo'] ?? $_POST['seo'] ?? $json_input;
        if (!$slug) {
            echo json_encode(['success' => false, 'message' => 'Page slug is required.']);
            exit;
        }
        $saved = cms_save_page_seo($slug, $seo_data);
        echo json_encode(['success' => $saved, 'message' => 'SEO settings updated.']);
        break;

    // ==========================================
    // 10. CHATBOT CONFIGURATION ENDPOINTS
    // ==========================================

    case 'save_chatbot_config':
        require_admin_auth('appearance');
        $data = $json_input['chatbot'] ?? $_POST['chatbot'] ?? $json_input;
        $saved = cms_save_chatbot_config($data);
        echo json_encode(['success' => $saved, 'message' => 'Chatbot settings saved.']);
        break;

    // ==========================================
    // 11. ADMIN USERS & RBAC ENDPOINTS
    // ==========================================

    case 'get_admin_users':
        require_admin_auth('super_admin');
        echo json_encode(['success' => true, 'users' => cms_get_admin_users()]);
        break;

    case 'save_admin_user':
        require_admin_auth('super_admin');
        $data = $json_input['user'] ?? $_POST['user'] ?? $json_input;
        $res = cms_save_admin_user($data);
        echo json_encode($res);
        break;

    case 'delete_admin_user':
        require_admin_auth('super_admin');
        $id = (int)($json_input['id'] ?? $_POST['id'] ?? 0);
        $res = cms_delete_admin_user($id);
        echo json_encode($res);
        break;

    // ==========================================
    // 12. AUDIT LOGS ENDPOINTS
    // ==========================================

    case 'get_activity_logs':
        require_admin_auth('super_admin');
        $limit = (int)($_GET['limit'] ?? 50);
        echo json_encode(['success' => true, 'logs' => cms_get_activity_logs($limit)]);
        break;

    // ==========================================
    // 13. GLOBAL CONTROLS & SETTINGS
    // ==========================================

    case 'save_global_controls':
        require_admin_auth('super_admin');
        $settings = $json_input['controls'] ?? $_POST['controls'] ?? $json_input;
        $saved = cms_save_settings($settings);
        echo json_encode(['success' => $saved, 'message' => 'Global website controls updated.']);
        break;

    case 'get_dashboard_stats':
        require_admin_auth();
        echo json_encode(['success' => true, 'stats' => cms_get_dashboard_stats()]);
        break;

    case 'get_all_pages':
        require_admin_auth();
        echo json_encode(['success' => true, 'pages' => cms_get_pages()]);
        break;

    case 'save_page':
        require_admin_auth('pages');
        $page_data = $json_input['page'] ?? $_POST['page'] ?? [];
        if (empty($page_data['slug'])) {
            echo json_encode(['success' => false, 'message' => 'Page slug is required.']);
            exit;
        }
        $saved = cms_save_page($page_data);
        echo json_encode(['success' => $saved, 'message' => 'Page saved successfully.']);
        break;

    case 'get_page_sections_admin':
        require_admin_auth('sections');
        $slug = trim($_GET['slug'] ?? 'home');
        $sections = cms_get_page_sections($slug, false);
        echo json_encode(['success' => true, 'page_slug' => $slug, 'sections' => $sections]);
        break;

    case 'save_section':
        require_admin_auth('sections');
        $slug = trim($json_input['page_slug'] ?? $_POST['page_slug'] ?? '');
        $key = trim($json_input['section_key'] ?? $_POST['section_key'] ?? '');
        $sec_data = $json_input['section_data'] ?? $_POST['section_data'] ?? [];
        if (!$slug || !$key) {
            echo json_encode(['success' => false, 'message' => 'page_slug and section_key are required.']);
            exit;
        }
        $saved = cms_save_section($slug, $key, $sec_data);
        echo json_encode(['success' => $saved, 'message' => 'Section saved and published successfully.', 'section' => cms_get_section($slug, $key)]);
        break;

    case 'delete_section':
        require_admin_auth('sections');
        $slug = trim($json_input['page_slug'] ?? $_POST['page_slug'] ?? '');
        $key = trim($json_input['section_key'] ?? $_POST['section_key'] ?? '');
        $deleted = cms_delete_section($slug, $key);
        echo json_encode(['success' => $deleted, 'message' => 'Section deleted successfully.']);
        break;

    case 'reorder_sections':
        require_admin_auth('sections');
        $slug = trim($json_input['page_slug'] ?? '');
        $keys = $json_input['ordered_keys'] ?? [];
        $reordered = cms_reorder_sections($slug, $keys);
        echo json_encode(['success' => $reordered, 'message' => 'Sections reordered successfully.']);
        break;

    case 'save_settings':
        require_admin_auth('super_admin');
        $settings = $json_input['settings'] ?? $_POST['settings'] ?? [];
        $saved = cms_save_settings($settings);
        echo json_encode(['success' => $saved, 'message' => 'Site settings saved successfully.']);
        break;

    case 'save_appearance':
        require_admin_auth('appearance');
        $appearance = $json_input['appearance'] ?? $_POST['appearance'] ?? [];
        $saved = cms_save_appearance($appearance);
        echo json_encode(['success' => $saved, 'message' => 'Appearance settings saved successfully.']);
        break;

    case 'save_navigation':
        require_admin_auth('appearance');
        $nav_items = $json_input['navigation'] ?? $_POST['navigation'] ?? [];
        $saved = cms_save_navigation($nav_items);
        echo json_encode(['success' => $saved, 'message' => 'Navigation saved successfully.']);
        break;

    case 'get_media':
        require_admin_auth('media');
        echo json_encode(['success' => true, 'media' => cms_get_media()]);
        break;

    case 'delete_media':
        require_admin_auth('media');
        $media_id = (int)($json_input['id'] ?? $_POST['id'] ?? 0);
        $del = cms_delete_media($media_id);
        echo json_encode(['success' => $del, 'message' => 'Media file deleted.']);
        break;

    case 'get_leads':
        require_admin_auth('inquiries');
        $type = $_GET['type'] ?? 'all';
        $leads = ['contacts' => [], 'quotations' => [], 'consultations' => [], 'students' => [], 'careers' => []];
        $db = get_db();
        if ($db) {
            try {
                if ($type === 'all' || $type === 'contacts') $leads['contacts'] = $db->query("SELECT * FROM contact_messages ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
                if ($type === 'all' || $type === 'quotations') $leads['quotations'] = $db->query("SELECT * FROM quotation_requests ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
                if ($type === 'all' || $type === 'consultations') $leads['consultations'] = $db->query("SELECT * FROM consultation_bookings ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
                if ($type === 'all' || $type === 'students') $leads['students'] = $db->query("SELECT * FROM student_registrations ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
                if ($type === 'all' || $type === 'careers') $leads['careers'] = $db->query("SELECT * FROM career_applications ORDER BY id DESC LIMIT 100")->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {}
        }
        echo json_encode(['success' => true, 'leads' => $leads]);
        break;

    case 'update_lead_status':
        require_admin_auth('inquiries');
        $table = trim($json_input['table'] ?? '');
        $id = (int)($json_input['id'] ?? 0);
        $status = trim($json_input['status'] ?? '');
        $allowed = ['contacts' => 'contact_messages', 'quotations' => 'quotation_requests', 'consultations' => 'consultation_bookings', 'students' => 'student_registrations', 'careers' => 'career_applications'];
        if (!isset($allowed[$table]) || !$id || !$status) {
            echo json_encode(['success' => false, 'message' => 'Invalid parameters.']);
            exit;
        }
        $real = $allowed[$table];
        $db = get_db();
        if ($db) {
            try {
                $stmt = $db->prepare("UPDATE {$real} SET status = ? WHERE id = ?");
                $stmt->execute([$status, $id]);
            } catch (Exception $e) {}
        }
        echo json_encode(['success' => true, 'message' => "Status updated to {$status}."]);
        break;

    default:
        echo json_encode([
            'status' => 'active',
            'version' => '2.0.0',
            'modules' => [
                'services', 'careers', 'applications', 'inquiries', 'forms',
                'email_templates', 'testimonials', 'articles', 'seo', 'chatbot',
                'rbac', 'activity_logs', 'global_controls'
            ]
        ]);
        break;
}

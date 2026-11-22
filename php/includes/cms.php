<?php
// NextTechX Solutions - Centralized Website CMS Foundation & Database Engine
require_once __DIR__ . '/config.php';

/**
 * File path helper for JSON fallback storage
 */
function cms_fallback_file($name) {
    $dir = __DIR__ . '/../data';
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    return $dir . '/cms_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $name) . '.json';
}

function cms_read_json($name, $default = []) {
    $file = cms_fallback_file($name);
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        return is_array($data) ? $data : $default;
    }
    return $default;
}

function cms_write_json($name, $data) {
    $file = cms_fallback_file($name);
    return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

// ==========================================
// 1. ADMIN AUTHENTICATION
// ==========================================

function cms_admin_authenticate($login, $password) {
    $login = trim($login);
    $db = get_db();

    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM admin_users WHERE username = ? OR email = ? LIMIT 1");
            $stmt->execute([$login, $login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password_hash'])) {
                // Update last login
                $upd = $db->prepare("UPDATE admin_users SET last_login = CURRENT_TIMESTAMP WHERE id = ?");
                $upd->execute([$user['id']]);
                unset($user['password_hash']);
                return $user;
            }
        } catch (Exception $e) {
            // fallback below
        }
    }

    // JSON Fallback
    $users = cms_read_json('admin_users', []);
    foreach ($users as $u) {
        if (($u['username'] === $login || $u['email'] === $login) && password_verify($password, $u['password_hash'])) {
            $user_copy = $u;
            unset($user_copy['password_hash']);
            return $user_copy;
        }
    }

    return false;
}

function cms_admin_change_password($user_id, $new_password) {
    if (strlen($new_password) < 6) {
        return ['success' => false, 'message' => 'Password must be at least 6 characters.'];
    }
    $new_hash = password_hash($new_password, PASSWORD_BCRYPT);
    $db = get_db();

    if ($db) {
        try {
            $stmt = $db->prepare("UPDATE admin_users SET password_hash = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->execute([$new_hash, $user_id]);
        } catch (Exception $e) {}
    }

    // Also update JSON fallback
    $users = cms_read_json('admin_users', []);
    foreach ($users as &$u) {
        if ($u['id'] == $user_id) {
            $u['password_hash'] = $new_hash;
            $u['updated_at'] = date('Y-m-d H:i:s');
        }
    }
    cms_write_json('admin_users', $users);

    return ['success' => true, 'message' => 'Password updated successfully.'];
}

// ==========================================
// 2. SITE SETTINGS & APPEARANCE
// ==========================================

function cms_get_setting($key, $default = '') {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT setting_value FROM cms_site_settings WHERE setting_key = ? LIMIT 1");
            $stmt->execute([$key]);
            $val = $stmt->fetchColumn();
            if ($val !== false && $val !== null) return $val;
        } catch (Exception $e) {}
    }
    $settings = cms_read_json('site_settings', []);
    return isset($settings[$key]) ? $settings[$key] : $default;
}

function cms_get_all_settings() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT setting_key, setting_value FROM cms_site_settings");
            $res = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res[$row['setting_key']] = $row['setting_value'];
            }
            if (!empty($res)) return $res;
        } catch (Exception $e) {}
    }
    return cms_read_json('site_settings', []);
}

function cms_save_settings($data) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_site_settings (setting_key, setting_value, updated_at) VALUES (?, ?, CURRENT_TIMESTAMP)");
            foreach ($data as $k => $v) {
                $stmt->execute([$k, (string)$v]);
            }
        } catch (Exception $e) {}
    }
    // Update JSON fallback
    $existing = cms_read_json('site_settings', []);
    foreach ($data as $k => $v) {
        $existing[$k] = (string)$v;
    }
    cms_write_json('site_settings', $existing);
    return true;
}

function cms_get_appearance() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT theme_key, theme_value FROM cms_appearance");
            $res = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res[$row['theme_key']] = $row['theme_value'];
            }
            if (!empty($res)) return $res;
        } catch (Exception $e) {}
    }
    return cms_read_json('appearance', []);
}

function cms_save_appearance($data) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_appearance (theme_key, theme_value, updated_at) VALUES (?, ?, CURRENT_TIMESTAMP)");
            foreach ($data as $k => $v) {
                $stmt->execute([$k, (string)$v]);
            }
        } catch (Exception $e) {}
    }
    $existing = cms_read_json('appearance', []);
    foreach ($data as $k => $v) {
        $existing[$k] = (string)$v;
    }
    cms_write_json('appearance', $existing);
    return true;
}

// ==========================================
// 3. NAVIGATION MANAGEMENT
// ==========================================

function cms_get_navigation($location = 'primary_header') {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM cms_navigation WHERE menu_location = ? AND is_active = 1 ORDER BY sort_order ASC, id ASC");
            $stmt->execute([$location]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($res)) return $res;
        } catch (Exception $e) {}
    }
    $all = cms_read_json('navigation', []);
    $filtered = array_filter($all, function($item) use ($location) {
        return (!isset($item['menu_location']) || $item['menu_location'] === $location) && (!isset($item['is_active']) || $item['is_active']);
    });
    usort($filtered, function($a, $b) {
        return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0);
    });
    return array_values($filtered);
}

function cms_save_navigation($items) {
    $db = get_db();
    if ($db) {
        try {
            $db->exec("DELETE FROM cms_navigation WHERE menu_location = 'primary_header'");
            $stmt = $db->prepare("INSERT INTO cms_navigation (id, menu_location, parent_id, label, url, target, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $id = 1;
            foreach ($items as $item) {
                $stmt->execute([
                    $id++,
                    $item['menu_location'] ?? 'primary_header',
                    $item['parent_id'] ?? 0,
                    $item['label'],
                    $item['url'],
                    $item['target'] ?? '_self',
                    $item['sort_order'] ?? 0,
                    isset($item['is_active']) ? (int)$item['is_active'] : 1
                ]);
            }
        } catch (Exception $e) {}
    }
    cms_write_json('navigation', $items);
    return true;
}

// ==========================================
// 4. PAGES & SECTIONS CMS
// ==========================================

function cms_get_pages() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM cms_pages ORDER BY title ASC");
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($res)) return $res;
        } catch (Exception $e) {}
    }
    return cms_read_json('pages', []);
}

function cms_get_page($slug) {
    $pages = cms_get_pages();
    foreach ($pages as $p) {
        if ($p['slug'] === $slug) return $p;
    }
    return null;
}

function cms_save_page($data) {
    $slug = trim($data['slug'] ?? '');
    if (!$slug) return false;

    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_pages (slug, title, meta_title, meta_description, status, template, updated_at) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([
                $slug,
                $data['title'] ?? ucfirst($slug),
                $data['meta_title'] ?? ($data['title'] . ' — NEXTECHX SOLUTIONS'),
                $data['meta_description'] ?? '',
                $data['status'] ?? 'published',
                $data['template'] ?? 'default'
            ]);
        } catch (Exception $e) {}
    }

    $pages = cms_read_json('pages', []);
    $found = false;
    foreach ($pages as &$p) {
        if ($p['slug'] === $slug) {
            $p = array_merge($p, $data);
            $found = true;
            break;
        }
    }
    if (!$found) {
        $pages[] = array_merge(['slug' => $slug, 'title' => ucfirst($slug), 'status' => 'published', 'template' => 'default'], $data);
    }
    cms_write_json('pages', $pages);
    return true;
}

function cms_get_page_sections($page_slug, $published_only = true) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM cms_sections WHERE page_slug = ?";
            if ($published_only) {
                $sql .= " AND is_enabled = 1 AND status = 'published'";
            }
            $sql .= " ORDER BY sort_order ASC, id ASC";
            $stmt = $db->prepare($sql);
            $stmt->execute([$page_slug]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                foreach ($rows as &$r) {
                    $r['content'] = json_decode($r['content_json'], true) ?: [];
                }
                return $rows;
            }
        } catch (Exception $e) {}
    }

    $all_sections = cms_read_json('sections', []);
    $filtered = [];
    foreach ($all_sections as $s) {
        if ($s['page_slug'] === $page_slug) {
            if (!$published_only || (!empty($s['is_enabled']) && ($s['status'] ?? 'published') === 'published')) {
                $filtered[] = $s;
            }
        }
    }
    usort($filtered, function($a, $b) {
        return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0);
    });
    return array_values($filtered);
}

function cms_get_section($page_slug, $section_key, $default = []) {
    $sections = cms_get_page_sections($page_slug, true);
    foreach ($sections as $s) {
        if ($s['section_key'] === $section_key) {
            return is_array($s['content']) ? $s['content'] : $default;
        }
    }
    return $default;
}

function cms_save_section($page_slug, $section_key, $data) {
    $db = get_db();
    $content_json = json_encode($data['content'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    $title = $data['section_title'] ?? ucfirst(str_replace('_', ' ', $section_key));
    $type = $data['section_type'] ?? 'standard';
    $sort = (int)($data['sort_order'] ?? 0);
    $is_enabled = isset($data['is_enabled']) ? (int)$data['is_enabled'] : 1;
    $status = $data['status'] ?? 'published';

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_sections (page_slug, section_key, section_title, section_type, content_json, sort_order, is_enabled, status, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$page_slug, $section_key, $title, $type, $content_json, $sort, $is_enabled, $status]);
        } catch (Exception $e) {}
    }

    $sections = cms_read_json('sections', []);
    $found = false;
    foreach ($sections as &$s) {
        if ($s['page_slug'] === $page_slug && $s['section_key'] === $section_key) {
            $s['section_title'] = $title;
            $s['section_type'] = $type;
            $s['content'] = $data['content'] ?? [];
            $s['sort_order'] = $sort;
            $s['is_enabled'] = $is_enabled;
            $s['status'] = $status;
            $s['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $sections[] = [
            'page_slug' => $page_slug,
            'section_key' => $section_key,
            'section_title' => $title,
            'section_type' => $type,
            'content' => $data['content'] ?? [],
            'sort_order' => $sort,
            'is_enabled' => $is_enabled,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    cms_write_json('sections', $sections);

    // Save version history
    cms_create_version('section', "{$page_slug}:{$section_key}", json_encode($data['content'] ?? []));

    return true;
}

function cms_delete_section($page_slug, $section_key) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_sections WHERE page_slug = ? AND section_key = ?");
            $stmt->execute([$page_slug, $section_key]);
        } catch (Exception $e) {}
    }

    $sections = cms_read_json('sections', []);
    $sections = array_filter($sections, function($s) use ($page_slug, $section_key) {
        return !($s['page_slug'] === $page_slug && $s['section_key'] === $section_key);
    });
    cms_write_json('sections', array_values($sections));
    return true;
}

function cms_reorder_sections($page_slug, $ordered_keys) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("UPDATE cms_sections SET sort_order = ? WHERE page_slug = ? AND section_key = ?");
            foreach ($ordered_keys as $idx => $key) {
                $stmt->execute([$idx + 1, $page_slug, $key]);
            }
        } catch (Exception $e) {}
    }

    $sections = cms_read_json('sections', []);
    foreach ($sections as &$s) {
        if ($s['page_slug'] === $page_slug) {
            $pos = array_search($s['section_key'], $ordered_keys);
            if ($pos !== false) {
                $s['sort_order'] = $pos + 1;
            }
        }
    }
    cms_write_json('sections', $sections);
    return true;
}

// ==========================================
// 5. MEDIA LIBRARY
// ==========================================

function cms_get_media() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM cms_media ORDER BY created_at DESC");
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($res)) return $res;
        } catch (Exception $e) {}
    }
    return cms_read_json('media', []);
}

function cms_save_media($record) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT INTO cms_media (original_name, file_name, file_path, file_size, file_type, alt_text) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $record['original_name'],
                $record['file_name'],
                $record['file_path'],
                $record['file_size'],
                $record['file_type'],
                $record['alt_text'] ?? ''
            ]);
            $record['id'] = $db->lastInsertId();
        } catch (Exception $e) {}
    }
    $media = cms_read_json('media', []);
    if (!isset($record['id'])) $record['id'] = count($media) + 1;
    $record['created_at'] = date('Y-m-d H:i:s');
    array_unshift($media, $record);
    cms_write_json('media', $media);
    return $record;
}

function cms_delete_media($id) {
    $db = get_db();
    $media = cms_read_json('media', []);
    $target = null;
    foreach ($media as $m) {
        if ($m['id'] == $id) {
            $target = $m;
            break;
        }
    }

    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_media WHERE id = ?");
            $stmt->execute([$id]);
        } catch (Exception $e) {}
    }

    $media = array_filter($media, function($m) use ($id) { return $m['id'] != $id; });
    cms_write_json('media', array_values($media));

    // Delete physical file if exists
    if ($target && !empty($target['file_path'])) {
        $real_path = __DIR__ . '/../' . ltrim($target['file_path'], '/');
        if (file_exists($real_path)) {
            @unlink($real_path);
        }
    }
    return true;
}

// ==========================================
// 6. VERSION HISTORY & ROLLBACK
// ==========================================

function cms_create_version($entity_type, $entity_id, $version_data, $created_by = 'admin') {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT INTO cms_versions (entity_type, entity_id, version_data, created_by) VALUES (?, ?, ?, ?)");
            $stmt->execute([$entity_type, $entity_id, $version_data, $created_by]);
        } catch (Exception $e) {}
    }
    return true;
}

// ==========================================
// 7. LIVE DATABASE STATS FOR ADMIN OVERVIEW
// ==========================================

function cms_get_dashboard_stats() {
    $db = get_db();
    $stats = [
        'contacts' => 0,
        'quotations' => 0,
        'consultations' => 0,
        'students' => 0,
        'careers' => 0,
        'pages_count' => count(cms_get_pages()),
        'media_count' => count(cms_get_media()),
        'recent_activities' => []
    ];

    if ($db) {
        try {
            $stats['contacts'] = (int)$db->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
            $stats['quotations'] = (int)$db->query("SELECT COUNT(*) FROM quotation_requests")->fetchColumn();
            $stats['consultations'] = (int)$db->query("SELECT COUNT(*) FROM consultation_bookings")->fetchColumn();
            $stats['students'] = (int)$db->query("SELECT COUNT(*) FROM student_registrations")->fetchColumn();
            $stats['careers'] = (int)$db->query("SELECT COUNT(*) FROM career_applications")->fetchColumn();

            // Recent Submissions
            $recent = [];
            $q1 = $db->query("SELECT 'contact' as type, name, email, created_at, status FROM contact_messages ORDER BY id DESC LIMIT 4");
            if ($q1) while ($r = $q1->fetch(PDO::FETCH_ASSOC)) $recent[] = $r;

            $q2 = $db->query("SELECT 'quotation' as type, name, email, created_at, status FROM quotation_requests ORDER BY id DESC LIMIT 4");
            if ($q2) while ($r = $q2->fetch(PDO::FETCH_ASSOC)) $recent[] = $r;

            $q3 = $db->query("SELECT 'career' as type, full_name as name, email, created_at, status FROM career_applications ORDER BY id DESC LIMIT 4");
            if ($q3) while ($r = $q3->fetch(PDO::FETCH_ASSOC)) $recent[] = $r;

            usort($recent, function($a, $b) {
                return strtotime($b['created_at'] ?? 'now') <=> strtotime($a['created_at'] ?? 'now');
            });
            $stats['recent_activities'] = array_slice($recent, 0, 6);
        } catch (Exception $e) {}
    }

    return $stats;
}


// ==========================================
// 8. SERVICES MANAGEMENT (PART 2)
// ==========================================

function cms_get_services($active_only = false) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM cms_services";
            if ($active_only) $sql .= " WHERE is_active = 1";
            $sql .= " ORDER BY sort_order ASC, id ASC";
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                foreach ($rows as &$r) {
                    $r['content'] = json_decode($r['content_json'] ?? '{}', true) ?: [];
                }
                return $rows;
            }
        } catch (Exception $e) {}
    }

    $all = cms_read_json('services', []);
    if ($active_only) {
        $all = array_filter($all, function($s) { return !empty($s['is_active']); });
    }
    usort($all, function($a, $b) {
        return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0);
    });
    foreach ($all as &$item) {
        if (!isset($item['content'])) {
            $item['content'] = $item['content_json'] ?? [];
        }
    }
    return array_values($all);
}

function cms_get_service($slug) {
    $services = cms_get_services(false);
    foreach ($services as $s) {
        if ($s['slug'] === $slug) {
            return $s;
        }
    }
    return null;
}

function cms_save_service($slug, $data) {
    $db = get_db();
    $title = $data['title'] ?? ucfirst(str_replace('-', ' ', $slug));
    $short_desc = $data['short_desc'] ?? '';
    $badge = $data['badge'] ?? 'Enterprise Practice';
    $icon = $data['icon'] ?? 'layers';
    $color = $data['color'] ?? 'blue';
    $sort_order = (int)($data['sort_order'] ?? 0);
    $is_active = isset($data['is_active']) ? (int)$data['is_active'] : 1;
    $content = $data['content'] ?? ($data['content_json'] ?? []);
    if (is_string($content)) $content = json_decode($content, true) ?: [];
    $content_json = json_encode($content, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_services 
                (slug, title, short_desc, badge, icon, color, sort_order, is_active, content_json, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$slug, $title, $short_desc, $badge, $icon, $color, $sort_order, $is_active, $content_json]);
        } catch (Exception $e) {}
    }

    // JSON fallback
    $services = cms_read_json('services', []);
    $found = false;
    foreach ($services as &$s) {
        if ($s['slug'] === $slug) {
            $s['title'] = $title;
            $s['short_desc'] = $short_desc;
            $s['badge'] = $badge;
            $s['icon'] = $icon;
            $s['color'] = $color;
            $s['sort_order'] = $sort_order;
            $s['is_active'] = $is_active;
            $s['content_json'] = $content;
            $s['content'] = $content;
            $s['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $services[] = [
            'slug' => $slug,
            'title' => $title,
            'short_desc' => $short_desc,
            'badge' => $badge,
            'icon' => $icon,
            'color' => $color,
            'sort_order' => $sort_order,
            'is_active' => $is_active,
            'content_json' => $content,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    cms_write_json('services', $services);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_service', 'service', $slug, "Saved service: {$title}");
    return true;
}

function cms_delete_service($slug) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_services WHERE slug = ?");
            $stmt->execute([$slug]);
        } catch (Exception $e) {}
    }
    $services = cms_read_json('services', []);
    $services = array_filter($services, function($s) use ($slug) { return $s['slug'] !== $slug; });
    cms_write_json('services', array_values($services));
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'delete_service', 'service', $slug, "Deleted service: {$slug}");
    return true;
}

function cms_reorder_services($ordered_slugs) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("UPDATE cms_services SET sort_order = ? WHERE slug = ?");
            foreach ($ordered_slugs as $idx => $slug) {
                $stmt->execute([$idx + 1, $slug]);
            }
        } catch (Exception $e) {}
    }
    $services = cms_read_json('services', []);
    foreach ($services as &$s) {
        $pos = array_search($s['slug'], $ordered_slugs);
        if ($pos !== false) $s['sort_order'] = $pos + 1;
    }
    cms_write_json('services', $services);
    return true;
}

// ==========================================
// 9. CAREERS & INTERNSHIPS MANAGEMENT
// ==========================================

function cms_get_career_opportunities($active_only = false) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM cms_careers_opportunities";
            if ($active_only) $sql .= " WHERE is_active = 1";
            $sql .= " ORDER BY sort_order ASC, id ASC";
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                foreach ($rows as &$r) {
                    $r['responsibilities'] = json_decode($r['responsibilities'] ?? '[]', true) ?: [];
                    $r['requirements'] = json_decode($r['requirements'] ?? '[]', true) ?: [];
                    $r['skills'] = json_decode($r['skills'] ?? '[]', true) ?: [];
                }
                return $rows;
            }
        } catch (Exception $e) {}
    }
    $all = cms_read_json('careers_opportunities', []);
    if ($active_only) {
        $all = array_filter($all, function($c) { return !empty($c['is_active']); });
    }
    usort($all, function($a, $b) { return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0); });
    foreach ($all as &$item) {
        if (is_string($item['responsibilities'] ?? null)) $item['responsibilities'] = json_decode($item['responsibilities'], true) ?: [];
        if (is_string($item['requirements'] ?? null)) $item['requirements'] = json_decode($item['requirements'], true) ?: [];
        if (is_string($item['skills'] ?? null)) $item['skills'] = json_decode($item['skills'], true) ?: [];
    }
    return array_values($all);
}

function cms_get_career_opportunity($slug) {
    $items = cms_get_career_opportunities(false);
    foreach ($items as $item) {
        if ($item['slug'] === $slug || (isset($item['id']) && $item['id'] == $slug)) return $item;
    }
    return null;
}

function cms_save_career_opportunity($data) {
    $db = get_db();
    $slug = trim($data['slug'] ?? ('opp-' . time()));
    $title = $data['title'] ?? 'Untitled Opportunity';
    $type = $data['type'] ?? 'Internship';
    $department = $data['department'] ?? 'Engineering';
    $location = $data['location'] ?? 'Remote (Global)';
    $duration = $data['duration'] ?? '3 - 6 Months';
    $stipend = $data['stipend'] ?? 'Stipend + Certificate + Letter of Recommendation';
    $eligibility = $data['eligibility'] ?? '';
    $desc = $data['description'] ?? '';
    $resp = is_array($data['responsibilities'] ?? null) ? json_encode($data['responsibilities']) : ($data['responsibilities'] ?? '[]');
    $req = is_array($data['requirements'] ?? null) ? json_encode($data['requirements']) : ($data['requirements'] ?? '[]');
    $skills = is_array($data['skills'] ?? null) ? json_encode($data['skills']) : ($data['skills'] ?? '[]');
    $sort_order = (int)($data['sort_order'] ?? 0);
    $is_active = isset($data['is_active']) ? (int)$data['is_active'] : 1;

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_careers_opportunities 
                (slug, title, type, department, location, duration, stipend, eligibility, description, responsibilities, requirements, skills, sort_order, is_active, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$slug, $title, $type, $department, $location, $duration, $stipend, $eligibility, $desc, $resp, $req, $skills, $sort_order, $is_active]);
        } catch (Exception $e) {}
    }

    $all = cms_read_json('careers_opportunities', []);
    $found = false;
    foreach ($all as &$item) {
        if ($item['slug'] === $slug) {
            $item = array_merge($item, $data);
            $item['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $all[] = array_merge(['slug' => $slug, 'title' => $title, 'type' => $type, 'sort_order' => $sort_order, 'is_active' => $is_active], $data);
    }
    cms_write_json('careers_opportunities', $all);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_opportunity', 'career', $slug, "Saved opportunity: {$title}");
    return true;
}

function cms_delete_career_opportunity($slug) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_careers_opportunities WHERE slug = ? OR id = ?");
            $stmt->execute([$slug, $slug]);
        } catch (Exception $e) {}
    }
    $all = cms_read_json('careers_opportunities', []);
    $all = array_filter($all, function($c) use ($slug) { return $c['slug'] !== $slug && ($c['id'] ?? '') != $slug; });
    cms_write_json('careers_opportunities', array_values($all));
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'delete_opportunity', 'career', $slug, "Deleted opportunity: {$slug}");
    return true;
}

function cms_get_career_applications($filters = []) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM career_applications WHERE 1=1";
            $params = [];
            if (!empty($filters['status']) && $filters['status'] !== 'all') {
                $sql .= " AND status = ?";
                $params[] = $filters['status'];
            }
            if (!empty($filters['position']) && $filters['position'] !== 'all') {
                $sql .= " AND position = ?";
                $params[] = $filters['position'];
            }
            if (!empty($filters['search'])) {
                $sql .= " AND (full_name LIKE ? OR email LIKE ? OR phone LIKE ?)";
                $s = '%' . $filters['search'] . '%';
                $params[] = $s; $params[] = $s; $params[] = $s;
            }
            $sql .= " ORDER BY id DESC";
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {}
    }
    return [];
}

function cms_update_application_status($id, $status, $internal_notes = null) {
    $valid_statuses = ['New', 'Under Review', 'Shortlisted', 'Selected', 'Rejected'];
    if (!in_array($status, $valid_statuses)) return false;

    $db = get_db();
    if ($db) {
        try {
            if ($internal_notes !== null) {
                $stmt = $db->prepare("UPDATE career_applications SET status = ?, internal_notes = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
                $stmt->execute([$status, $internal_notes, $id]);
            } else {
                $stmt = $db->prepare("UPDATE career_applications SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
                $stmt->execute([$status, $id]);
            }
            cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'update_status', 'career_application', (string)$id, "Changed status to {$status}");
            return true;
        } catch (Exception $e) {}
    }
    return false;
}

function cms_export_applications_csv() {
    $apps = cms_get_career_applications();
    $output = fopen('php://temp', 'r+');
    fputcsv($output, ['ID', 'Full Name', 'Email', 'Phone', 'Category', 'Target Position', 'Education', 'Resume File', 'Status', 'Internal Notes', 'Applied Date']);
    foreach ($apps as $a) {
        fputcsv($output, [
            $a['id'] ?? '',
            $a['full_name'] ?? '',
            $a['email'] ?? '',
            $a['phone'] ?? '',
            $a['applying_for'] ?? '',
            $a['position'] ?? '',
            $a['education'] ?? '',
            $a['resume_filename'] ?? '',
            $a['status'] ?? 'New',
            $a['internal_notes'] ?? '',
            $a['created_at'] ?? ''
        ]);
    }
    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);
    return $csv;
}

// ==========================================
// 10. INQUIRIES & CONTACTS MANAGEMENT
// ==========================================

function cms_get_inquiries($type = 'contact', $filters = []) {
    $db = get_db();
    $table = 'contact_messages';
    if ($type === 'quotation') $table = 'quotation_requests';
    if ($type === 'consultation') $table = 'consultation_bookings';

    if ($db) {
        try {
            $sql = "SELECT * FROM {$table} WHERE 1=1";
            $params = [];
            if (!empty($filters['status']) && $filters['status'] !== 'all') {
                $sql .= " AND status = ?";
                $params[] = $filters['status'];
            }
            if (!empty($filters['search'])) {
                $sql .= " AND (name LIKE ? OR email LIKE ? OR phone LIKE ?)";
                $s = '%' . $filters['search'] . '%';
                $params[] = $s; $params[] = $s; $params[] = $s;
            }
            $sql .= " ORDER BY id DESC";
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {}
    }
    return [];
}

function cms_update_inquiry_status($type, $id, $status, $internal_notes = null) {
    $table = 'contact_messages';
    if ($type === 'quotation') $table = 'quotation_requests';
    if ($type === 'consultation') $table = 'consultation_bookings';

    $db = get_db();
    if ($db) {
        try {
            if ($internal_notes !== null) {
                $stmt = $db->prepare("UPDATE {$table} SET status = ?, internal_notes = ? WHERE id = ?");
                $stmt->execute([$status, $internal_notes, $id]);
            } else {
                $stmt = $db->prepare("UPDATE {$table} SET status = ? WHERE id = ?");
                $stmt->execute([$status, $id]);
            }
            cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'update_inquiry', $type, (string)$id, "Updated {$type} #{$id} status to {$status}");
            return true;
        } catch (Exception $e) {}
    }
    return false;
}

function cms_export_inquiries_csv($type = 'contact') {
    $records = cms_get_inquiries($type);
    $output = fopen('php://temp', 'r+');
    if ($type === 'contact') {
        fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Company', 'Service Interest', 'Message', 'Status', 'Internal Notes', 'Date']);
        foreach ($records as $r) {
            fputcsv($output, [$r['id'], $r['name'], $r['email'], $r['phone'], $r['company'], $r['service_interest'], $r['message'], $r['status'] ?? 'New', $r['internal_notes'] ?? '', $r['created_at']]);
        }
    } else if ($type === 'quotation') {
        fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Company', 'Service Category', 'Budget Range', 'Timeline', 'Requirements', 'Status', 'Internal Notes', 'Date']);
        foreach ($records as $r) {
            fputcsv($output, [$r['id'], $r['name'], $r['email'], $r['phone'], $r['company'], $r['service_category'], $r['budget_range'], $r['project_timeline'], $r['requirements'], $r['status'] ?? 'New', $r['internal_notes'] ?? '', $r['created_at']]);
        }
    }
    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);
    return $csv;
}

// ==========================================
// 11. FORMS MANAGEMENT
// ==========================================

function cms_get_forms() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM cms_forms ORDER BY id ASC");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                foreach ($rows as &$r) {
                    $r['fields'] = json_decode($r['fields_json'] ?? '[]', true) ?: [];
                }
                return $rows;
            }
        } catch (Exception $e) {}
    }
    $all = cms_read_json('forms', []);
    foreach ($all as &$f) {
        if (!isset($f['fields'])) $f['fields'] = json_decode($f['fields_json'] ?? '[]', true) ?: [];
    }
    return $all;
}

function cms_get_form($form_key) {
    $forms = cms_get_forms();
    foreach ($forms as $f) {
        if ($f['form_key'] === $form_key) return $f;
    }
    return null;
}

function cms_save_form($form_key, $data) {
    $db = get_db();
    $title = $data['form_title'] ?? ucfirst(str_replace('_', ' ', $form_key));
    $recipient = $data['recipient_email'] ?? 'contact@nextechxsolutions.com';
    $success_msg = $data['success_message'] ?? 'Submission successful.';
    $error_msg = $data['error_message'] ?? 'Submission failed. Please try again.';
    $is_enabled = isset($data['is_enabled']) ? (int)$data['is_enabled'] : 1;
    $fields = $data['fields'] ?? ($data['fields_json'] ?? []);
    if (is_string($fields)) $fields = json_decode($fields, true) ?: [];
    $fields_json = json_encode($fields, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_forms 
                (form_key, form_title, recipient_email, success_message, error_message, is_enabled, fields_json, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$form_key, $title, $recipient, $success_msg, $error_msg, $is_enabled, $fields_json]);
        } catch (Exception $e) {}
    }

    $all = cms_read_json('forms', []);
    $found = false;
    foreach ($all as &$f) {
        if ($f['form_key'] === $form_key) {
            $f['form_title'] = $title;
            $f['recipient_email'] = $recipient;
            $f['success_message'] = $success_msg;
            $f['error_message'] = $error_msg;
            $f['is_enabled'] = $is_enabled;
            $f['fields_json'] = $fields;
            $f['fields'] = $fields;
            $f['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $all[] = [
            'form_key' => $form_key,
            'form_title' => $title,
            'recipient_email' => $recipient,
            'success_message' => $success_msg,
            'error_message' => $error_msg,
            'is_enabled' => $is_enabled,
            'fields_json' => $fields,
            'fields' => $fields,
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    cms_write_json('forms', $all);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_form', 'form', $form_key, "Saved form settings for {$form_key}");
    return true;
}

// ==========================================
// 12. EMAIL TEMPLATES MANAGEMENT
// ==========================================

function cms_get_email_templates() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM cms_email_templates ORDER BY id ASC");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) return $rows;
        } catch (Exception $e) {}
    }
    return cms_read_json('email_templates', []);
}

function cms_get_email_template($key) {
    $templates = cms_get_email_templates();
    foreach ($templates as $t) {
        if ($t['template_key'] === $key) return $t;
    }
    return null;
}

function cms_save_email_template($key, $data) {
    $db = get_db();
    $name = $data['template_name'] ?? ucfirst(str_replace('_', ' ', $key));
    $subject = $data['subject'] ?? '';
    $body = $data['body_html'] ?? '';
    $signature = $data['signature'] ?? '';
    $is_active = isset($data['is_active']) ? (int)$data['is_active'] : 1;

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_email_templates 
                (template_key, template_name, subject, body_html, signature, is_active, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$key, $name, $subject, $body, $signature, $is_active]);
        } catch (Exception $e) {}
    }

    $all = cms_read_json('email_templates', []);
    $found = false;
    foreach ($all as &$t) {
        if ($t['template_key'] === $key) {
            $t['template_name'] = $name;
            $t['subject'] = $subject;
            $t['body_html'] = $body;
            $t['signature'] = $signature;
            $t['is_active'] = $is_active;
            $t['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $all[] = [
            'template_key' => $key,
            'template_name' => $name,
            'subject' => $subject,
            'body_html' => $body,
            'signature' => $signature,
            'is_active' => $is_active,
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    cms_write_json('email_templates', $all);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_email_template', 'email_template', $key, "Saved email template: {$name}");
    return true;
}

// ==========================================
// 13. TESTIMONIALS & REVIEWS MANAGEMENT
// ==========================================

function cms_get_testimonials($location = 'all', $published_only = false) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM cms_testimonials WHERE 1=1";
            if ($published_only) $sql .= " AND is_published = 1";
            if ($location !== 'all') $sql .= " AND (display_location = 'all' OR display_location = " . $db->quote($location) . ")";
            $sql .= " ORDER BY sort_order ASC, id ASC";
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) return $rows;
        } catch (Exception $e) {}
    }

    $all = cms_read_json('testimonials', []);
    if ($published_only) {
        $all = array_filter($all, function($t) { return !empty($t['is_published']); });
    }
    if ($location !== 'all') {
        $all = array_filter($all, function($t) use ($location) {
            return ($t['display_location'] ?? 'all') === 'all' || ($t['display_location'] ?? '') === $location;
        });
    }
    usort($all, function($a, $b) { return ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0); });
    return array_values($all);
}

function cms_save_testimonial($data) {
    $db = get_db();
    $id = !empty($data['id']) ? (int)$data['id'] : null;
    $name = $data['client_name'] ?? 'Client';
    $title = $data['client_title'] ?? '';
    $company = $data['client_company'] ?? '';
    $img = $data['client_image'] ?? '';
    $rating = (int)($data['rating'] ?? 5);
    $text = $data['review_text'] ?? '';
    $project = $data['project_type'] ?? '';
    $loc = $data['display_location'] ?? 'all';
    $sort = (int)($data['sort_order'] ?? 0);
    $is_pub = isset($data['is_published']) ? (int)$data['is_published'] : 1;

    if ($db) {
        try {
            if ($id) {
                $stmt = $db->prepare("UPDATE cms_testimonials SET client_name=?, client_title=?, client_company=?, client_image=?, rating=?, review_text=?, project_type=?, display_location=?, sort_order=?, is_published=?, updated_at=CURRENT_TIMESTAMP WHERE id=?");
                $stmt->execute([$name, $title, $company, $img, $rating, $text, $project, $loc, $sort, $is_pub, $id]);
            } else {
                $stmt = $db->prepare("INSERT INTO cms_testimonials (client_name, client_title, client_company, client_image, rating, review_text, project_type, display_location, sort_order, is_published) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name, $title, $company, $img, $rating, $text, $project, $loc, $sort, $is_pub]);
                $id = (int)$db->lastInsertId();
            }
        } catch (Exception $e) {}
    }

    $all = cms_read_json('testimonials', []);
    $found = false;
    if (!$id) $id = time();
    $record = [
        'id' => $id,
        'client_name' => $name,
        'client_title' => $title,
        'client_company' => $company,
        'client_image' => $img,
        'rating' => $rating,
        'review_text' => $text,
        'project_type' => $project,
        'display_location' => $loc,
        'sort_order' => $sort,
        'is_published' => $is_pub,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    foreach ($all as &$t) {
        if ($t['id'] == $id) {
            $t = array_merge($t, $record);
            $found = true;
            break;
        }
    }
    if (!$found) $all[] = $record;
    cms_write_json('testimonials', $all);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_testimonial', 'testimonial', (string)$id, "Saved testimonial for {$name}");
    return true;
}

function cms_delete_testimonial($id) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_testimonials WHERE id = ?");
            $stmt->execute([$id]);
        } catch (Exception $e) {}
    }
    $all = cms_read_json('testimonials', []);
    $all = array_filter($all, function($t) use ($id) { return $t['id'] != $id; });
    cms_write_json('testimonials', array_values($all));
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'delete_testimonial', 'testimonial', (string)$id, "Deleted testimonial #{$id}");
    return true;
}

// ==========================================
// 14. BLOG & ARTICLES MANAGEMENT
// ==========================================

function cms_get_articles($status = null) {
    $db = get_db();
    if ($db) {
        try {
            $sql = "SELECT * FROM cms_articles WHERE 1=1";
            if ($status) $sql .= " AND status = " . $db->quote($status);
            $sql .= " ORDER BY id DESC";
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) return $rows;
        } catch (Exception $e) {}
    }
    $all = cms_read_json('articles', []);
    if ($status) {
        $all = array_filter($all, function($a) use ($status) { return ($a['status'] ?? 'draft') === $status; });
    }
    return array_values($all);
}

function cms_get_article($slug) {
    $articles = cms_get_articles();
    foreach ($articles as $a) {
        if ($a['slug'] === $slug) return $a;
    }
    return null;
}

function cms_save_article($data) {
    $db = get_db();
    $slug = trim($data['slug'] ?? ('article-' . time()));
    $title = $data['title'] ?? 'Untitled Article';
    $summary = $data['summary'] ?? '';
    $content = $data['content'] ?? '';
    $category = $data['category'] ?? 'Technology';
    $tags = $data['tags'] ?? '';
    $img = $data['featured_image'] ?? '';
    $author = $data['author'] ?? 'NextTechX Editorial Team';
    $status = $data['status'] ?? 'draft';
    $meta_title = $data['meta_title'] ?? ($title . ' — NEXTECHX SOLUTIONS');
    $meta_desc = $data['meta_description'] ?? $summary;
    $pub_at = ($status === 'published' && empty($data['published_at'])) ? date('Y-m-d H:i:s') : ($data['published_at'] ?? null);

    if ($db) {
        try {
            $stmt = $db->prepare("INSERT OR REPLACE INTO cms_articles 
                (slug, title, summary, content, category, tags, featured_image, author, status, meta_title, meta_description, published_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$slug, $title, $summary, $content, $category, $tags, $img, $author, $status, $meta_title, $meta_desc, $pub_at]);
        } catch (Exception $e) {}
    }

    $all = cms_read_json('articles', []);
    $found = false;
    $record = [
        'slug' => $slug,
        'title' => $title,
        'summary' => $summary,
        'content' => $content,
        'category' => $category,
        'tags' => $tags,
        'featured_image' => $img,
        'author' => $author,
        'status' => $status,
        'meta_title' => $meta_title,
        'meta_description' => $meta_desc,
        'published_at' => $pub_at,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    foreach ($all as &$a) {
        if ($a['slug'] === $slug) {
            $a = array_merge($a, $record);
            $found = true;
            break;
        }
    }
    if (!$found) $all[] = $record;
    cms_write_json('articles', $all);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_article', 'article', $slug, "Saved article: {$title}");
    return true;
}

function cms_delete_article($slug) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM cms_articles WHERE slug = ?");
            $stmt->execute([$slug]);
        } catch (Exception $e) {}
    }
    $all = cms_read_json('articles', []);
    $all = array_filter($all, function($a) use ($slug) { return $a['slug'] !== $slug; });
    cms_write_json('articles', array_values($all));
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'delete_article', 'article', $slug, "Deleted article: {$slug}");
    return true;
}

// ==========================================
// 15. SEO MANAGEMENT & SITEMAP GENERATOR
// ==========================================

function cms_get_page_seo($slug) {
    $page = cms_get_page($slug);
    if (!$page) return [];
    return [
        'meta_title' => $page['meta_title'] ?? ($page['title'] . ' — NEXTECHX SOLUTIONS'),
        'meta_description' => $page['meta_description'] ?? '',
        'keywords' => $page['keywords'] ?? cms_get_setting('default_meta_keywords', ''),
        'og_title' => $page['og_title'] ?? $page['meta_title'] ?? '',
        'og_description' => $page['og_description'] ?? $page['meta_description'] ?? '',
        'og_image' => $page['og_image'] ?? cms_get_setting('default_og_image', ''),
        'canonical_url' => $page['canonical_url'] ?? (cms_get_setting('website_url', 'https://nextechxsolutions.com') . '/' . ($slug === 'home' ? '' : ($slug . '.php'))),
        'robots_index' => isset($page['robots_index']) ? (int)$page['robots_index'] : 1,
        'robots_follow' => isset($page['robots_follow']) ? (int)$page['robots_follow'] : 1,
        'sitemap_priority' => $page['sitemap_priority'] ?? 0.8,
        'sitemap_changefreq' => $page['sitemap_changefreq'] ?? 'weekly'
    ];
}

function cms_save_page_seo($slug, $data) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("UPDATE cms_pages SET 
                meta_title = ?, meta_description = ?, keywords = ?, og_title = ?, 
                og_description = ?, og_image = ?, canonical_url = ?, robots_index = ?, 
                robots_follow = ?, sitemap_priority = ?, sitemap_changefreq = ?, updated_at = CURRENT_TIMESTAMP
                WHERE slug = ?");
            $stmt->execute([
                $data['meta_title'] ?? '',
                $data['meta_description'] ?? '',
                $data['keywords'] ?? '',
                $data['og_title'] ?? '',
                $data['og_description'] ?? '',
                $data['og_image'] ?? '',
                $data['canonical_url'] ?? '',
                isset($data['robots_index']) ? (int)$data['robots_index'] : 1,
                isset($data['robots_follow']) ? (int)$data['robots_follow'] : 1,
                $data['sitemap_priority'] ?? 0.8,
                $data['sitemap_changefreq'] ?? 'weekly',
                $slug
            ]);
        } catch (Exception $e) {}
    }

    $pages = cms_read_json('pages', []);
    foreach ($pages as &$p) {
        if ($p['slug'] === $slug) {
            $p = array_merge($p, $data);
            $p['updated_at'] = date('Y-m-d H:i:s');
            break;
        }
    }
    cms_write_json('pages', $pages);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_seo', 'page_seo', $slug, "Saved SEO settings for page: {$slug}");
    return true;
}

function cms_generate_sitemap_xml() {
    $pages = cms_get_pages();
    $base_url = rtrim(cms_get_setting('website_url', 'https://nextechxsolutions.com'), '/');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "
";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "
";

    foreach ($pages as $p) {
        if (isset($p['robots_index']) && $p['robots_index'] == 0) continue;
        $slug = $p['slug'];
        $loc = ($slug === 'home') ? $base_url . '/' : $base_url . '/' . $slug . '.php';
        $priority = $p['sitemap_priority'] ?? (($slug === 'home') ? '1.0' : '0.8');
        $changefreq = $p['sitemap_changefreq'] ?? 'weekly';
        $lastmod = date('Y-m-d', strtotime($p['updated_at'] ?? 'now'));

        $xml .= "  <url>
";
        $xml .= "    <loc>" . htmlspecialchars($loc) . "</loc>
";
        $xml .= "    <lastmod>{$lastmod}</lastmod>
";
        $xml .= "    <changefreq>{$changefreq}</changefreq>
";
        $xml .= "    <priority>{$priority}</priority>
";
        $xml .= "  </url>
";
    }

    // Add published services
    $services = cms_get_services(true);
    foreach ($services as $s) {
        $loc = $base_url . '/' . $s['slug'] . '.php';
        $xml .= "  <url>
";
        $xml .= "    <loc>" . htmlspecialchars($loc) . "</loc>
";
        $xml .= "    <lastmod>" . date('Y-m-d', strtotime($s['updated_at'] ?? 'now')) . "</lastmod>
";
        $xml .= "    <changefreq>weekly</changefreq>
";
        $xml .= "    <priority>0.9</priority>
";
        $xml .= "  </url>
";
    }

    $xml .= '</urlset>';
    return $xml;
}

// ==========================================
// 16. CHATBOT CONFIGURATION
// ==========================================

function cms_get_chatbot_config() {
    return [
        'enabled' => cms_get_setting('chatbot_enabled', '1') === '1',
        'name' => cms_get_setting('chatbot_name', 'NextTechX AI Assistant'),
        'welcome_message' => cms_get_setting('chatbot_welcome_message', 'Hello! Welcome to NextTechX Solutions. How can I assist you with our AI, Software, SaaS, Data Annotation, or BPO engineering services today?'),
        'system_prompt' => cms_get_setting('chatbot_system_prompt', ''),
        'languages' => cms_get_setting('chatbot_languages', 'English, Hindi, Marathi, Spanish, German, French'),
        'theme_color' => cms_get_setting('chatbot_theme_color', '#2563eb'),
        'knowledge_sources' => cms_get_setting('chatbot_knowledge_sources', 'Website Services, Company FAQs, Internship Details, Case Studies')
    ];
}

function cms_save_chatbot_config($data) {
    $settings = [
        'chatbot_enabled' => !empty($data['enabled']) ? '1' : '0',
        'chatbot_name' => $data['name'] ?? 'NextTechX AI Assistant',
        'chatbot_welcome_message' => $data['welcome_message'] ?? '',
        'chatbot_system_prompt' => $data['system_prompt'] ?? '',
        'chatbot_languages' => $data['languages'] ?? '',
        'chatbot_theme_color' => $data['theme_color'] ?? '#2563eb',
        'chatbot_knowledge_sources' => $data['knowledge_sources'] ?? ''
    ];
    cms_save_settings($settings);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_chatbot_config', 'chatbot', 'config', 'Updated AI Chatbot configuration');
    return true;
}

// ==========================================
// 17. ADMIN USERS & ROLE-BASED ACCESS CONTROL (RBAC)
// ==========================================

function cms_get_admin_users() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT id, username, email, full_name, role, last_login, created_at, updated_at FROM admin_users ORDER BY id ASC");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) return $rows;
        } catch (Exception $e) {}
    }
    $users = cms_read_json('admin_users', []);
    foreach ($users as &$u) unset($u['password_hash']);
    return $users;
}

function cms_save_admin_user($data) {
    $db = get_db();
    $id = !empty($data['id']) ? (int)$data['id'] : null;
    $username = trim($data['username'] ?? '');
    $email = trim($data['email'] ?? '');
    $full_name = trim($data['full_name'] ?? '');
    $role = $data['role'] ?? 'content_manager';
    $password = trim($data['password'] ?? '');

    if (!$username || !$email) return ['success' => false, 'message' => 'Username and email are required.'];

    $hash = $password ? password_hash($password, PASSWORD_BCRYPT) : null;

    if ($db) {
        try {
            if ($id) {
                if ($hash) {
                    $stmt = $db->prepare("UPDATE admin_users SET username=?, email=?, full_name=?, role=?, password_hash=?, updated_at=CURRENT_TIMESTAMP WHERE id=?");
                    $stmt->execute([$username, $email, $full_name, $role, $hash, $id]);
                } else {
                    $stmt = $db->prepare("UPDATE admin_users SET username=?, email=?, full_name=?, role=?, updated_at=CURRENT_TIMESTAMP WHERE id=?");
                    $stmt->execute([$username, $email, $full_name, $role, $id]);
                }
            } else {
                if (!$password) return ['success' => false, 'message' => 'Password is required for new admin user.'];
                $stmt = $db->prepare("INSERT INTO admin_users (username, email, full_name, role, password_hash) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$username, $email, $full_name, $role, $hash]);
                $id = (int)$db->lastInsertId();
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    $users = cms_read_json('admin_users', []);
    $found = false;
    foreach ($users as &$u) {
        if ($u['id'] == $id) {
            $u['username'] = $username;
            $u['email'] = $email;
            $u['full_name'] = $full_name;
            $u['role'] = $role;
            if ($hash) $u['password_hash'] = $hash;
            $u['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
    }
    if (!$found) {
        $users[] = [
            'id' => $id ?: (time()),
            'username' => $username,
            'email' => $email,
            'full_name' => $full_name,
            'role' => $role,
            'password_hash' => $hash,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    cms_write_json('admin_users', $users);
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'save_user', 'admin_user', (string)$id, "Saved admin user: {$username} ({$role})");
    return ['success' => true, 'message' => 'User saved successfully.'];
}

function cms_delete_admin_user($id) {
    if ($id == 1) return ['success' => false, 'message' => 'Cannot delete primary Super Admin.'];
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM admin_users WHERE id = ?");
            $stmt->execute([$id]);
        } catch (Exception $e) {}
    }
    $users = cms_read_json('admin_users', []);
    $users = array_filter($users, function($u) use ($id) { return $u['id'] != $id; });
    cms_write_json('admin_users', array_values($users));
    cms_log_activity($_SESSION['admin_user_id'] ?? 1, $_SESSION['admin_username'] ?? 'admin', 'delete_user', 'admin_user', (string)$id, "Deleted admin user #{$id}");
    return ['success' => true, 'message' => 'User deleted successfully.'];
}

function cms_user_can($action, $user_role = null) {
    if (!$user_role) $user_role = $_SESSION['admin_role'] ?? 'super_admin';
    if ($user_role === 'super_admin') return true;

    // Content Manager Permissions
    if ($user_role === 'content_manager') {
        $allowed = ['pages', 'sections', 'services', 'articles', 'testimonials', 'appearance', 'seo', 'media'];
        return in_array($action, $allowed);
    }

    // Application Manager Permissions
    if ($user_role === 'application_manager') {
        $allowed = ['careers', 'applications', 'inquiries', 'contacts', 'quotations', 'consultations', 'export'];
        return in_array($action, $allowed);
    }

    return false;
}

// ==========================================
// 18. ACTIVITY AUDIT LOGS
// ==========================================

function cms_log_activity($user_id, $username, $action, $entity_type, $entity_id, $details = '') {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT INTO cms_activity_logs (user_id, username, action, entity_type, entity_id, details, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $username, $action, $entity_type, $entity_id, $details, $ip]);
        } catch (Exception $e) {}
    }
    $logs = cms_read_json('activity_logs', []);
    array_unshift($logs, [
        'id' => count($logs) + 1,
        'user_id' => $user_id,
        'username' => $username,
        'action' => $action,
        'entity_type' => $entity_type,
        'entity_id' => $entity_id,
        'details' => $details,
        'ip_address' => $ip,
        'created_at' => date('Y-m-d H:i:s')
    ]);
    if (count($logs) > 200) $logs = array_slice($logs, 0, 200);
    cms_write_json('activity_logs', $logs);
    return true;
}

function cms_get_activity_logs($limit = 50) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM cms_activity_logs ORDER BY id DESC LIMIT ?");
            $stmt->execute([$limit]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) return $rows;
        } catch (Exception $e) {}
    }
    $logs = cms_read_json('activity_logs', []);
    return array_slice($logs, 0, $limit);
}

// ==========================================
// 19. GLOBAL WEBSITE CONTROLS
// ==========================================

function cms_is_maintenance_mode() {
    return cms_get_setting('maintenance_mode', '0') === '1';
}

function cms_get_global_announcement() {
    return [
        'enabled' => cms_get_setting('announcement_enabled', '1') === '1',
        'text' => cms_get_setting('announcement_text', 'Online-First Global IT Delivery • ISO-Aligned Quality Standards'),
        'link' => cms_get_setting('announcement_link', 'services.php'),
        'bg' => cms_get_setting('announcement_bg', 'bg-slate-900')
    ];
}

function cms_get_cookie_notice() {
    return [
        'enabled' => cms_get_setting('cookie_notice_enabled', '1') === '1',
        'text' => cms_get_setting('cookie_notice_text', 'We utilize security and telemetry cookies to ensure optimal browsing performance and protect client submissions.')
    ];
}

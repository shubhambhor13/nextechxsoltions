<?php
// NexTechX Solutions - LinkedIn Redirection Endpoint
require_once __DIR__ . '/includes/config.php';
header("Location: " . SITE_LINKEDIN_URL, true, 301);
exit();

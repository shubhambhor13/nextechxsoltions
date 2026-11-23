<?php
// NexTechX Solutions - Automated Application Email & SMTP Notification System
// Powered by PHPMailer & Gmail SMTP with StartTLS security

// Autoload PHPMailer via Composer from available vendor locations
$autoload_paths = [
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/vendor/autoload.php',
    dirname(__DIR__) . '/vendor/autoload.php'
];

$autoloader_found = false;
foreach ($autoload_paths as $p) {
    if (file_exists($p)) {
        require_once $p;
        $autoloader_found = true;
        break;
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (file_exists(__DIR__ . '/cms.php')) {
    require_once __DIR__ . '/cms.php';
}

class NexTechXMailer {

    public static $last_password_source = null;
    public static $last_smtp_debug = [];
    public static $last_smtp_meta = [];

    /**
     * Securely retrieve environment variable with priority:
     * 1. getenv() / getenv('REDIRECT_*')
     * 2. $_ENV / $_ENV['REDIRECT_*']
     * 3. $_SERVER / $_SERVER['REDIRECT_*']
     * 4. apache_getenv()
     * 5. .env file in project hierarchy
     */
    public static function getEnv($key, $default = null) {
        $set_src = function($src) use ($key) {
            if ($key === 'SMTP_PASSWORD') {
                self::$last_password_source = $src;
            }
        };

        $clean = function($val, $k) {
            if ($val === false || $val === null) return null;
            $val = trim((string)$val);
            if ($val === '') return null;
            // Strip surrounding quotes
            if ((str_starts_with($val, '"') && str_ends_with($val, '"')) ||
                (str_starts_with($val, "'") && str_ends_with($val, "'"))) {
                $val = substr($val, 1, -1);
            }
            // For Gmail 16-character App Passwords, strip any spaces (e.g., 'abcd efgh ijkl mnop' -> 'abcdefghijklmnop')
            if ($k === 'SMTP_PASSWORD' && strlen($val) === 19 && substr_count($val, ' ') === 3) {
                $val = str_replace(' ', '', $val);
            }
            return $val;
        };

        // 1. Native getenv (direct and Apache REDIRECT_ prefix)
        $v = $clean(getenv($key), $key);
        if ($v !== null) { $set_src('getenv'); return $v; }

        $v = $clean(getenv('REDIRECT_' . $key), $key);
        if ($v !== null) { $set_src('getenv_REDIRECT'); return $v; }

        // 2. Superglobal $_ENV
        if (isset($_ENV[$key])) {
            $v = $clean($_ENV[$key], $key);
            if ($v !== null) { $set_src('$_ENV'); return $v; }
        }
        if (isset($_ENV['REDIRECT_' . $key])) {
            $v = $clean($_ENV['REDIRECT_' . $key], $key);
            if ($v !== null) { $set_src('$_ENV_REDIRECT'); return $v; }
        }

        // 3. Superglobal $_SERVER (common in FastCGI, PHP-FPM, Hostinger LiteSpeed)
        if (isset($_SERVER[$key])) {
            $v = $clean($_SERVER[$key], $key);
            if ($v !== null) { $set_src('$_SERVER'); return $v; }
        }
        if (isset($_SERVER['REDIRECT_' . $key])) {
            $v = $clean($_SERVER['REDIRECT_' . $key], $key);
            if ($v !== null) { $set_src('$_SERVER_REDIRECT'); return $v; }
        }

        // 4. Apache getenv if available
        if (function_exists('apache_getenv')) {
            $v = $clean(@apache_getenv($key), $key);
            if ($v !== null) { $set_src('apache_getenv'); return $v; }
            $v = $clean(@apache_getenv('REDIRECT_' . $key), $key);
            if ($v !== null) { $set_src('apache_getenv_REDIRECT'); return $v; }
        }

        static $env_parsed = false;
        static $env_cache = [];

        if (!$env_parsed) {
            $env_parsed = true;
            $doc_root = !empty($_SERVER['DOCUMENT_ROOT']) ? rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') : null;
            $candidates = array_filter([
                __DIR__ . '/.env',
                dirname(__DIR__) . '/.env',
                dirname(__DIR__, 2) . '/.env',
                dirname(__DIR__) . '/data/.env',
                $doc_root ? $doc_root . '/.env' : null,
                $doc_root ? $doc_root . '/php/.env' : null,
                $doc_root ? dirname($doc_root) . '/.env' : null
            ]);

            foreach ($candidates as $file) {
                if (file_exists($file) && is_readable($file)) {
                    $lines = @file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    if (is_array($lines)) {
                        foreach ($lines as $line) {
                            $line = trim($line);
                            if ($line === '' || strpos($line, '#') === 0) continue;
                            if (strpos($line, '=') !== false) {
                                list($k, $val) = explode('=', $line, 2);
                                $k = trim($k);
                                $val = $clean($val, $k);
                                if ($val !== null && !isset($env_cache[$k])) {
                                    $env_cache[$k] = $val;
                                    if ($k === 'SMTP_PASSWORD') {
                                        self::$last_password_source = '.env (' . basename($file) . ')';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $env_cache[$key] ?? $default;
    }

    /**
     * Create and configure a fresh PHPMailer instance
     * Supports Hostinger SMTP (Port 465 with SSL/SMTPS) as primary, with full fallback support
     */
    public static function createMailer($override_port = null, $override_enc = null) {
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            throw new Exception("PHPMailer class is not loaded. Ensure Composer autoload has run.");
        }

        $mail = new PHPMailer(true);

        $host = self::getEnv('SMTP_HOST', 'smtp.hostinger.com');
        $port = $override_port ?: (int) self::getEnv('SMTP_PORT', 465);
        $encryption = $override_enc ?: strtolower((string) self::getEnv('SMTP_ENCRYPTION', ($port === 465 ? 'ssl' : 'tls')));
        $username = strtolower(trim(self::getEnv('SMTP_USERNAME', 'hr@nextechxsolutions.com')));
        $password = self::getEnv('SMTP_PASSWORD', '');
        $from_email = self::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com');
        $from_name = self::getEnv('SMTP_FROM_NAME', 'NEXTECHX SOLUTIONS');

        // Fail fast with clear actionable error if SMTP_PASSWORD is not provided
        if (empty($password)) {
            throw new Exception("SMTP_PASSWORD is not configured. Please set your Hostinger email password in your server environment variables or .env file.");
        }

        $mail->isSMTP();
        $mail->Host = $host;
        $mail->Port = $port;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->Hostname = 'nextechxsolutions.com';

        // Configure encryption: SMTPS for port 465 / SSL, STARTTLS for port 587 / TLS
        if ($encryption === 'ssl' || $encryption === 'smtps' || $port === 465) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } elseif ($encryption === 'tls' || $encryption === 'starttls' || $port === 587) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }

        // Configure CA bundle to guarantee TLS/SSL certificate verification succeeds across all servers
        $ca_candidates = array_filter([
            dirname(__DIR__) . '/cacert.pem',
            __DIR__ . '/../cacert.pem',
            __DIR__ . '/cacert.pem'
        ]);

        $ca_file = null;
        foreach ($ca_candidates as $c) {
            if (file_exists($c) && is_readable($c)) {
                $ca_file = realpath($c);
                break;
            }
        }

        if ($ca_file) {
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                    'allow_self_signed' => false,
                    'cafile' => $ca_file
                ]
            ];
        }

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Timeout = 7;

        // Sensible default sender from hr@nextechxsolutions.com
        $mail->setFrom($from_email, $from_name);

        // Securely capture SMTP protocol conversation to diagnose server response without leaking secrets
        self::$last_smtp_debug = [];
        $smtp_buffer = [];
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = function($str, $level) use (&$smtp_buffer, $password, $username) {
            $line = trim($str);
            if ($line === '') return;
            if (!empty($password)) {
                $line = str_replace($password, '***', $line);
                $b64 = base64_encode($password);
                $line = str_replace($b64, '***PASS_B64***', $line);
            }
            if (preg_match('/^(CLIENT -> SERVER: )([A-Za-z0-9+\/=]{8,})/i', $line, $m)) {
                $line = $m[1] . '***AUTH_CREDENTIALS***';
            }
            $smtp_buffer[] = $line;
            self::$last_smtp_debug[] = $line;
        };

        self::$last_smtp_meta = [
            'host' => $host,
            'port' => $port,
            'encryption' => $mail->SMTPSecure,
            'username' => $username,
            'password_set' => !empty($password),
            'password_length' => strlen($password),
            'password_has_leading_trailing_space' => ($password !== trim($password)),
            'password_has_dollar_sign' => (strpos($password, '$') !== false),
            'password_has_quotes' => (strpos($password, '"') !== false || strpos($password, "'") !== false),
            'password_source' => self::$last_password_source ?? 'unknown',
            'ca_file_used' => $ca_file ? basename($ca_file) : 'system_default'
        ];

        return $mail;
    }

    /**
     * Log email errors safely (sanitizing sensitive passwords)
     */
    public static function logError($type, $error_message, $recipient) {
        $log_dir = dirname(__DIR__) . '/data/email_logs';
        if (!is_dir($log_dir)) {
            @mkdir($log_dir, 0755, true);
        }

        // Sanitize password or secrets from error logs
        $sanitized = preg_replace('/password[=:][^\s&]+/i', 'password=***', $error_message);

        $log_entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'type' => $type,
            'recipient' => $recipient,
            'error' => $sanitized
        ];

        $log_file = $log_dir . '/mail_errors.log';
        @file_put_contents($log_file, json_encode($log_entry) . PHP_EOL, FILE_APPEND);
    }

    /**
     * Centralized Form Submission Dispatcher
     * Handles both:
     * 1. Admin/Company Email Notification to nextechxsolutions@gmail.com (with all fields & attachments)
     * 2. Automatic Confirmation Email to Applicant / Visitor
     */
    public static function sendFormSubmission($form_type, $form_title, $fields, $user_email, $user_name = '', $attachments = [], $reference_id = null) {
        $prefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $form_type), 0, 3));
        if (empty($prefix)) $prefix = 'REQ';
        $ref_id = $reference_id ?: ('NTX-' . $prefix . '-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4));
        $submission_date = date('d M Y, h:i A T');
        $user_name = trim($user_name) ?: 'Valued Visitor';
        $user_email = trim($user_email);

        $company_to = 'nextechxsolutions@gmail.com';
        $hr_from = self::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com');
        $from_name = self::getEnv('SMTP_FROM_NAME', 'NEXTECHX SOLUTIONS');

        $company_success = false;
        $company_error = null;
        $user_success = false;
        $user_error = null;

        // Normalize attachments array: support string filepath or array of ['path' => '...', 'name' => '...']
        $normalized_attachments = [];
        if (!empty($attachments)) {
            if (is_string($attachments)) {
                $attachments = [$attachments];
            }
            foreach ($attachments as $att) {
                if (is_string($att) && file_exists($att)) {
                    $normalized_attachments[] = [
                        'path' => realpath($att) ?: $att,
                        'name' => basename($att)
                    ];
                } elseif (is_array($att) && !empty($att['path']) && file_exists($att['path'])) {
                    $normalized_attachments[] = [
                        'path' => realpath($att['path']) ?: $att['path'],
                        'name' => !empty($att['name']) ? $att['name'] : basename($att['path'])
                    ];
                }
            }
        }

        // =========================================================
        // 1. DISPATCH COMPANY / ADMIN NOTIFICATION
        // =========================================================
        $admin_subject = "[$form_title] New Submission from {$user_name} – NEXTECHX SOLUTIONS";
        $admin_html = self::buildAdminNotificationHtml([
            'form_type' => $form_type,
            'form_title' => $form_title,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'fields' => $fields,
            'reference_id' => $ref_id,
            'submission_date' => $submission_date,
            'attachments' => $normalized_attachments
        ]);

        $admin_plain = "NEW FORM SUBMISSION – NEXTECHX SOLUTIONS\n" .
            "============================================================\n" .
            "Form Type:     $form_title\n" .
            "Reference ID:  $ref_id\n" .
            "Date & Time:   $submission_date\n" .
            "Submitter:     $user_name\n" .
            "Email:         $user_email\n\n" .
            "SUBMITTED DETAILS:\n" .
            "------------------------------------------------------------\n";
        foreach ($fields as $label => $val) {
            if (is_array($val)) $val = implode(', ', $val);
            $admin_plain .= str_pad($label . ":", 24) . " $val\n";
        }
        if (!empty($normalized_attachments)) {
            $admin_plain .= "\nATTACHMENTS:\n";
            foreach ($normalized_attachments as $a) {
                $admin_plain .= " - " . $a['name'] . "\n";
            }
        }
        $admin_plain .= "\n============================================================\nNEXTECHX SOLUTIONS Centralized Form Engine\nhttps://nextechxsolutions.com";

        try {
            $mailAdmin = self::createMailer();
            $mailAdmin->addAddress($company_to, 'NEXTECHX SOLUTIONS Admin Desk');
            if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                $mailAdmin->addReplyTo($user_email, $user_name);
            }
            $mailAdmin->Subject = $admin_subject;
            $mailAdmin->isHTML(true);
            $mailAdmin->Body = $admin_html;
            $mailAdmin->AltBody = $admin_plain;

            foreach ($normalized_attachments as $att) {
                try {
                    $mailAdmin->addAttachment($att['path'], $att['name']);
                } catch (\Throwable $attErr) {
                    self::logError('admin_notification_attachment', $attErr->getMessage(), $company_to);
                }
            }

            $mailAdmin->send();
            $company_success = true;
        } catch (\Throwable $e) {
            $err465 = $e->getMessage() . (!empty($mailAdmin->ErrorInfo) ? (' | ' . $mailAdmin->ErrorInfo) : '');
            $is_auth = (stripos($err465, 'authenticate') !== false || stripos($err465, '535') !== false);
            if (!$is_auth) {
                try {
                    $mailAdminRetry = self::createMailer(587, 'tls');
                    $mailAdminRetry->addAddress($company_to, 'NEXTECHX SOLUTIONS Admin Desk');
                    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                        $mailAdminRetry->addReplyTo($user_email, $user_name);
                    }
                    $mailAdminRetry->Subject = $admin_subject;
                    $mailAdminRetry->isHTML(true);
                    $mailAdminRetry->Body = $admin_html;
                    $mailAdminRetry->AltBody = $admin_plain;

                    foreach ($normalized_attachments as $att) {
                        try { $mailAdminRetry->addAttachment($att['path'], $att['name']); } catch (\Throwable $t) {}
                    }

                    $mailAdminRetry->send();
                    $company_success = true;
                } catch (\Throwable $retryErr) {
                    $company_error = "Port 465: $err465 | Port 587: " . $retryErr->getMessage();
                    self::logError('admin_notification', $company_error, $company_to);
                }
            } else {
                $company_error = "Port 465 Auth Error: $err465";
                self::logError('admin_notification', $company_error, $company_to);
            }
        }

        // =========================================================
        // 2. DISPATCH USER CONFIRMATION EMAIL
        // =========================================================
        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $user_subject_map = [
                'contact' => "Thank You for Contacting NEXTECHX SOLUTIONS [Ref: $ref_id]",
                'career' => "Application Received – NEXTECHX SOLUTIONS [Ref: $ref_id]",
                'internship' => "Internship Application Received – NEXTECHX SOLUTIONS [Ref: $ref_id]",
                'quote' => "Quotation Request Received – NEXTECHX SOLUTIONS [Ref: $ref_id]",
                'consultation' => "Consultation Confirmed – NEXTECHX SOLUTIONS [Ref: $ref_id]"
            ];
            $user_subject = $user_subject_map[$form_type] ?? "Submission Received – NEXTECHX SOLUTIONS [Ref: $ref_id]";

            $user_html = self::buildUserConfirmationHtml([
                'form_type' => $form_type,
                'form_title' => $form_title,
                'user_name' => $user_name,
                'fields' => $fields,
                'reference_id' => $ref_id,
                'submission_date' => $submission_date,
                'hr_email' => $hr_from
            ]);

            $user_plain = "Dear $user_name,\n\n" .
                "Thank you for contacting NEXTECHX SOLUTIONS.\n\n" .
                "We are pleased to confirm that we have received your $form_title (Reference ID: $ref_id).\n\n" .
                "Our team will carefully review your submitted details and connect with you shortly.\n\n" .
                "If you have any questions, feel free to reach out to our team at $hr_from.\n\n" .
                "Best Regards,\n" .
                "NEXTECHX SOLUTIONS Team\n" .
                "Website: https://nextechxsolutions.com\n" .
                "Email: $hr_from\n" .
                "Phone: +91 93098 35085";

            try {
                $mailUser = self::createMailer();
                $mailUser->addAddress($user_email, $user_name);
                $mailUser->addReplyTo($hr_from, 'NEXTECHX SOLUTIONS Desk');
                $mailUser->Subject = $user_subject;
                $mailUser->isHTML(true);
                $mailUser->Body = $user_html;
                $mailUser->AltBody = $user_plain;

                $mailUser->send();
                $user_success = true;
            } catch (\Throwable $e) {
                $err465 = $e->getMessage() . (!empty($mailUser->ErrorInfo) ? (' | ' . $mailUser->ErrorInfo) : '');
                $is_auth = (stripos($err465, 'authenticate') !== false || stripos($err465, '535') !== false);
                if (!$is_auth) {
                    try {
                        $mailUserRetry = self::createMailer(587, 'tls');
                        $mailUserRetry->addAddress($user_email, $user_name);
                        $mailUserRetry->addReplyTo($hr_from, 'NEXTECHX SOLUTIONS Desk');
                        $mailUserRetry->Subject = $user_subject;
                        $mailUserRetry->isHTML(true);
                        $mailUserRetry->Body = $user_html;
                        $mailUserRetry->AltBody = $user_plain;

                        $mailUserRetry->send();
                        $user_success = true;
                    } catch (\Throwable $retryErr) {
                        $user_error = "Port 465: $err465 | Port 587: " . $retryErr->getMessage();
                        self::logError('user_confirmation', $user_error, $user_email);
                    }
                } else {
                    $user_error = "Port 465 Auth Error: $err465";
                    self::logError('user_confirmation', $user_error, $user_email);
                }
            }
        }

        return [
            'success' => ($company_success && ($user_success || empty($user_email))),
            'company_email_sent' => $company_success,
            'user_email_sent' => $user_success,
            'company_error' => $company_error,
            'user_error' => $user_error,
            'reference_id' => $ref_id,
            'submission_date' => $submission_date
        ];
    }

    /**
     * Direct SMTP Delivery Test Action (Without application or database records)
     * Used for real-time testing and administrative verification
     */
    public static function testSmtpDelivery($test_recipient = 'nextechxsolutions@gmail.com') {
        $timestamp = date('d M Y, h:i:s A T');
        $from = self::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com');
        $subject = "Live SMTP Test Notification – NEXTECHX SOLUTIONS";

        $html = '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e2e8f0; border-radius: 8px;">
            <h2 style="color: #0f172a; margin-top: 0;">NEXTECHX SOLUTIONS</h2>
            <p style="color: #334155; font-size: 15px; line-height: 1.6;">Hello Team,</p>
            <p style="color: #334155; font-size: 15px; line-height: 1.6;">This is a live <strong>Centralized Email Delivery Verification</strong> sent from NEXTECHX SOLUTIONS Form System.</p>
            <div style="background-color: #f8fafc; border-left: 4px solid #0284c7; padding: 12px 16px; margin: 16px 0;">
                <p style="margin: 0; font-size: 14px; color: #0f172a;"><strong>Sender:</strong> ' . htmlspecialchars($from) . '</p>
                <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Recipient:</strong> ' . htmlspecialchars($test_recipient) . '</p>
                <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Timestamp:</strong> ' . $timestamp . '</p>
                <p style="margin: 4px 0 0 0; font-size: 14px; color: #0f172a;"><strong>Status:</strong> Active & Functional</p>
            </div>
            <p style="color: #94a3b8; font-size: 12px; margin: 0;">NEXTECHX SOLUTIONS &bull; <a href="https://nextechxsolutions.com" style="color: #0284c7;">nextechxsolutions.com</a></p>
        </div>';

        $plain = "NEXTECHX SOLUTIONS\nLive SMTP Test Notification\nSender: $from\nRecipient: $test_recipient\nTimestamp: $timestamp\nStatus: Active & Functional";

        try {
            $mail = self::createMailer();
            $mail->clearAddresses();
            $mail->addAddress($test_recipient, 'NEXTECHX SOLUTIONS Admin');
            $mail->addReplyTo($from, 'NEXTECHX SOLUTIONS HR');
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $html;
            $mail->AltBody = $plain;
            $mail->send();

            return [
                'success' => true,
                'recipient' => $test_recipient,
                'from' => $from,
                'message' => 'Test email successfully dispatched to ' . $test_recipient,
                'port' => 465,
                'meta' => self::$last_smtp_meta,
                'smtp_dialog' => array_slice(self::$last_smtp_debug, -6)
            ];
        } catch (\Throwable $e) {
            $err465 = $e->getMessage() . (!empty($mail->ErrorInfo) ? (' | ' . $mail->ErrorInfo) : '');
            $is_auth = (stripos($err465, 'authenticate') !== false || stripos($err465, '535') !== false);
            if (!$is_auth) {
                try {
                    $retry = self::createMailer(587, 'tls');
                    $retry->clearAddresses();
                    $retry->addAddress($test_recipient, 'NEXTECHX SOLUTIONS Admin');
                    $retry->addReplyTo($from, 'NEXTECHX SOLUTIONS HR');
                    $retry->Subject = $subject;
                    $retry->isHTML(true);
                    $retry->Body = $html;
                    $retry->AltBody = $plain;
                    $retry->send();

                    return [
                        'success' => true,
                        'recipient' => $test_recipient,
                        'from' => $from,
                        'message' => 'Test email successfully dispatched via Port 587 STARTTLS to ' . $test_recipient,
                        'port' => 587,
                        'meta' => self::$last_smtp_meta,
                        'smtp_dialog' => array_slice(self::$last_smtp_debug, -6)
                    ];
                } catch (\Throwable $reErr) {
                    $full_err = "Port 465: $err465 | Port 587: " . $reErr->getMessage();
                    self::logError('test_smtp', $full_err, $test_recipient);
                    return [
                        'success' => false,
                        'recipient' => $test_recipient,
                        'error' => $full_err,
                        'meta' => self::$last_smtp_meta,
                        'smtp_dialog' => array_slice(self::$last_smtp_debug, -8)
                    ];
                }
            } else {
                self::logError('test_smtp', $err465, $test_recipient);
                return [
                    'success' => false,
                    'recipient' => $test_recipient,
                    'error' => $err465,
                    'meta' => self::$last_smtp_meta,
                    'smtp_dialog' => array_slice(self::$last_smtp_debug, -8)
                ];
            }
        }
    }

    /**
     * Responsive Corporate HTML Template for Company/Admin Notification
     */
    public static function buildAdminNotificationHtml($p) {
        $formTitle = htmlspecialchars($p['form_title']);
        $userName = htmlspecialchars($p['user_name']);
        $userEmail = htmlspecialchars($p['user_email']);
        $refId = htmlspecialchars($p['reference_id']);
        $subDate = htmlspecialchars($p['submission_date']);
        $fields = $p['fields'];
        $attachments = $p['attachments'];
        $websiteUrl = 'https://nextechxsolutions.com';

        // Badge color based on form type
        $badgeBg = '#e0f2fe';
        $badgeColor = '#0369a1';
        if (strpos(strtolower($formTitle), 'career') !== false || strpos(strtolower($formTitle), 'intern') !== false) {
            $badgeBg = '#ecfdf5';
            $badgeColor = '#047857';
        } elseif (strpos(strtolower($formTitle), 'quote') !== false) {
            $badgeBg = '#fef3c7';
            $badgeColor = '#b45309';
        } elseif (strpos(strtolower($formTitle), 'consult') !== false) {
            $badgeBg = '#ede9fe';
            $badgeColor = '#6d28d9';
        }

        // Build Table Rows
        $tableRows = '';
        $messageBlock = '';
        foreach ($fields as $label => $val) {
            if (is_array($val)) $val = implode(', ', $val);
            $cleanVal = htmlspecialchars((string)$val);
            if (strtolower($label) === 'message' || strtolower($label) === 'requirements' || strtolower($label) === 'notes' || strtolower($label) === 'statement') {
                if (!empty($val)) {
                    $messageBlock = '<div style="margin-top: 20px; padding: 14px 16px; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px;">
                        <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #64748b; margin-bottom: 6px;">' . htmlspecialchars($label) . '</div>
                        <div style="font-size: 13.5px; color: #1e293b; line-height: 1.6; white-space: pre-wrap;">' . $cleanVal . '</div>
                    </div>';
                }
            } else {
                $displayVal = $cleanVal;
                if (strtolower($label) === 'email') {
                    $displayVal = '<a href="mailto:' . $cleanVal . '" style="color: #0284c7; text-decoration: none;">' . $cleanVal . '</a>';
                } elseif (strtolower($label) === 'phone' || strtolower($label) === 'whatsapp') {
                    $displayVal = '<a href="tel:' . $cleanVal . '" style="color: #0284c7; text-decoration: none;">' . $cleanVal . '</a>';
                }
                $tableRows .= '<tr>
                    <td style="padding: 7px 0; color: #64748b; font-size: 13px; font-weight: 500; width: 38%; vertical-align: top;">' . htmlspecialchars($label) . ':</td>
                    <td style="padding: 7px 0; color: #0f172a; font-size: 13.5px; font-weight: 600; vertical-align: top;">' . $displayVal . '</td>
                </tr>';
            }
        }

        // Attachments Row
        $attHtml = '';
        if (!empty($attachments)) {
            $attList = [];
            foreach ($attachments as $a) {
                $attList[] = '<span style="color: #059669; font-weight: 700;">' . htmlspecialchars($a['name']) . '</span>';
            }
            $tableRows .= '<tr>
                <td style="padding: 7px 0; color: #64748b; font-size: 13px; font-weight: 500; width: 38%; vertical-align: top;">Attached File(s):</td>
                <td style="padding: 7px 0; font-size: 13.5px; vertical-align: top;">' . implode(', ', $attList) . '</td>
            </tr>';
        }

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{$formTitle} – NEXTECHX SOLUTIONS</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b;">
  <div style="width: 100%; background-color: #f8fafc; padding: 36px 12px; box-sizing: border-box;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
      <tr>
        <td style="padding: 24px 32px 20px 32px; border-bottom: 1px solid #e2e8f0; background-color: #ffffff;">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="vertical-align: middle;">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td style="vertical-align: middle; padding-right: 12px;">
                      <img src="https://nextechxsolutions.com/favicon.png" width="34" height="34" alt="NEXTECHX SOLUTIONS Logo" style="display: block; border: 0; outline: none; border-radius: 6px;">
                    </td>
                    <td style="vertical-align: middle;">
                      <span style="font-size: 17px; font-weight: 800; color: #0f172a; letter-spacing: -0.3px;">
                        NEXTECHX <span style="color: #0284c7;">SOLUTIONS</span>
                      </span>
                    </td>
                  </tr>
                </table>
              </td>
              <td style="vertical-align: middle; text-align: right;">
                <span style="font-size: 11px; font-weight: 700; color: {$badgeColor}; background-color: {$badgeBg}; padding: 4px 10px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.5px;">{$formTitle}</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td style="padding: 32px 32px 28px 32px; background-color: #ffffff;">
          <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0;">New {$formTitle} Received</h2>
          <p style="font-size: 14px; color: #475569; margin: 0 0 16px 0; line-height: 1.5;">
            A visitor has submitted a new <strong>{$formTitle}</strong> via the NEXTECHX SOLUTIONS website.
          </p>

          <div style="border: 1px solid #e2e8f0; border-radius: 6px; background-color: #f8fafc; margin: 20px 0; padding: 16px 20px;">
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #64748b; margin-bottom: 12px;">Submission Metadata & Details</div>
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 7px 0; color: #64748b; font-size: 13px; font-weight: 500; width: 38%; vertical-align: top;">Reference ID:</td>
                <td style="padding: 7px 0; color: #0f172a; font-size: 13.5px; font-weight: 700; font-family: SFMono-Regular, Consolas, Monaco, monospace; vertical-align: top;">{$refId}</td>
              </tr>
              <tr>
                <td style="padding: 7px 0; color: #64748b; font-size: 13px; font-weight: 500; width: 38%; vertical-align: top;">Submission Time:</td>
                <td style="padding: 7px 0; color: #0f172a; font-size: 13.5px; font-weight: 600; vertical-align: top;">{$subDate}</td>
              </tr>
              {$tableRows}
            </table>
          </div>

          {$messageBlock}

          <div style="margin-top: 24px;">
            <a href="mailto:{$userEmail}?subject=Regarding%20your%20submission%20to%20NEXTECHX%20SOLUTIONS%20[Ref:%20{$refId}]" style="display: inline-block; padding: 10px 20px; background-color: #0f2b48; color: #ffffff !important; text-decoration: none; font-size: 13px; font-weight: 600; border-radius: 6px;">Reply to Submitter</a>
            <a href="{$websiteUrl}/submissions.php" style="display: inline-block; margin-left: 8px; padding: 10px 18px; background-color: #f1f5f9; color: #0f172a !important; text-decoration: none; font-size: 13px; font-weight: 600; border-radius: 6px; border: 1px solid #e2e8f0;">Open Submissions Portal</a>
          </div>
        </td>
      </tr>

      <tr>
        <td style="padding: 20px 32px; border-top: 1px solid #e2e8f0; background-color: #ffffff;">
          <p style="font-size: 12px; color: #64748b; line-height: 1.6; margin: 0;">
            <strong style="color: #0f172a; font-size: 13px;">NEXTECHX SOLUTIONS</strong> &bull; Centralized Form Submission System<br>
            Website: <a href="{$websiteUrl}" target="_blank" rel="noopener" style="color: #0284c7; text-decoration: underline;">{$websiteUrl}</a> &bull;
            Admin Recipient: <span style="color: #0f172a; font-weight: 600;">nextechxsolutions@gmail.com</span>
          </p>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }

    /**
     * Responsive Corporate HTML Template for Applicant / User Confirmation
     */
    public static function buildUserConfirmationHtml($p) {
        $userName = htmlspecialchars($p['user_name']);
        $formTitle = htmlspecialchars($p['form_title']);
        $formType = $p['form_type'];
        $refId = htmlspecialchars($p['reference_id']);
        $subDate = htmlspecialchars($p['submission_date']);
        $fields = $p['fields'];
        $hrEmail = htmlspecialchars($p['hr_email']);
        $websiteUrl = 'https://nextechxsolutions.com';

        // Customized reassurance message per form type
        $reassurance = "We are pleased to confirm that we have received your request. Our team will review your submission and connect with you shortly.";
        if ($formType === 'contact') {
            $reassurance = "Thank you for contacting NEXTECHX SOLUTIONS. We have received your inquiry and our technical solutions team will review your message and get in touch with you within 24 hours.";
        } elseif ($formType === 'quote') {
            $reassurance = "Thank you for requesting an enterprise quotation from NEXTECHX SOLUTIONS. Our solutions engineering team is reviewing your project requirements to prepare a comprehensive scope and price estimate.";
        } elseif ($formType === 'consultation') {
            $reassurance = "Your strategy consultation with NEXTECHX SOLUTIONS has been reserved. Our Solutions Architect will connect with you at your chosen date and time.";
        } elseif ($formType === 'career' || $formType === 'internship') {
            $reassurance = "Thank you for your interest in NEXTECHX SOLUTIONS. We are pleased to confirm that we have received your application. Our recruitment team will carefully review your credentials and contact you regarding the next steps.";
        }

        // Summary Rows for user
        $summaryRows = '';
        foreach ($fields as $label => $val) {
            if (is_array($val)) $val = implode(', ', $val);
            if (in_array(strtolower($label), ['service category', 'service interest', 'target position', 'position', 'course selected', 'internship domain', 'consultation topic', 'topic', 'budget range', 'preferred date'])) {
                $summaryRows .= '<tr>
                    <td style="padding: 6px 0; color: #64748b; font-size: 13px; font-weight: 500; width: 40%; vertical-align: top;">' . htmlspecialchars($label) . ':</td>
                    <td style="padding: 6px 0; color: #0f172a; font-size: 13.5px; font-weight: 600; vertical-align: top;">' . htmlspecialchars((string)$val) . '</td>
                </tr>';
            }
        }

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You – NEXTECHX SOLUTIONS</title>
</head>
<body style="margin: 0; padding: 0; background-color: #ffffff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #111827;">
  <div style="width: 100%; background-color: #ffffff; padding: 36px 16px; box-sizing: border-box;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="max-width: 580px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px;">
      <tr>
        <td style="padding: 28px 36px 22px 36px; border-bottom: 1px solid #e5e7eb; background-color: #ffffff;">
          <table cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="vertical-align: middle; padding-right: 12px;">
                <img src="https://nextechxsolutions.com/favicon.png" width="32" height="32" alt="NEXTECHX SOLUTIONS Logo" style="display: block; border: 0; outline: none; border-radius: 4px;">
              </td>
              <td style="vertical-align: middle;">
                <span style="font-size: 16px; font-weight: 800; color: #0f2b5c; letter-spacing: 0.4px;">
                  NEXTECHX SOLUTIONS
                </span>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td style="padding: 36px 36px 32px 36px; background-color: #ffffff;">
          <p style="font-size: 15px; font-weight: 600; color: #111827; line-height: 1.6; margin: 0 0 16px 0;">
            Dear {$userName},
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 16px 0;">
            {$reassurance}
          </p>

          <div style="border: 1px solid #e5e7eb; border-radius: 6px; background-color: #f9fafb; margin: 20px 0; padding: 14px 18px;">
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #6b7280; margin-bottom: 10px;">Submission Confirmation</div>
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 5px 0; color: #6b7280; font-size: 13px; font-weight: 500; width: 40%; vertical-align: top;">Reference ID:</td>
                <td style="padding: 5px 0; color: #0f2b5c; font-size: 13px; font-weight: 700; font-family: SFMono-Regular, Consolas, Monaco, monospace; vertical-align: top;">{$refId}</td>
              </tr>
              <tr>
                <td style="padding: 5px 0; color: #6b7280; font-size: 13px; font-weight: 500; width: 40%; vertical-align: top;">Date & Time:</td>
                <td style="padding: 5px 0; color: #111827; font-size: 13px; font-weight: 600; vertical-align: top;">{$subDate}</td>
              </tr>
              {$summaryRows}
            </table>
          </div>

          <p style="font-size: 14px; color: #374151; line-height: 1.7; margin: 0 0 24px 0;">
            If you have any questions or additional requirements, please reply to this email or contact our support desk directly at <a href="mailto:{$hrEmail}" style="color: #0f2b5c; font-weight: 600; text-decoration: underline;">{$hrEmail}</a>.
          </p>

          <p style="font-size: 14px; color: #111827; line-height: 1.65; margin: 0;">
            Best Regards,<br>
            <strong style="color: #0f2b5c;">NEXTECHX SOLUTIONS Team</strong><br>
            <a href="mailto:{$hrEmail}" style="color: #0f2b5c; text-decoration: underline;">{$hrEmail}</a><br>
            <a href="{$websiteUrl}" target="_blank" rel="noopener" style="color: #0f2b5c; text-decoration: underline;">{$websiteUrl}</a>
          </p>
        </td>
      </tr>

      <tr>
        <td style="padding: 20px 36px; border-top: 1px solid #e5e7eb; background-color: #ffffff;">
          <p style="font-size: 12px; color: #6b7280; line-height: 1.5; margin: 0;">
            <strong style="color: #0f2b5c; font-size: 12px; letter-spacing: 0.4px;">NEXTECHX SOLUTIONS</strong> &bull; Enterprise Technology & Engineering
          </p>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }

    /**
     * 1. Send Applicant Confirmation Email
     */
    public static function sendApplicantConfirmation($data) {
        $full_name = htmlspecialchars(trim($data['full_name'] ?? 'Candidate'));
        $email = trim($data['email'] ?? '');
        $position = htmlspecialchars(trim($data['position'] ?? 'Internship Track'));
        $applying_for = htmlspecialchars(trim($data['applying_for'] ?? 'Internship'));
        $education = htmlspecialchars(trim($data['education'] ?? 'Degree'));
        $app_id = $data['id'] ?? ('NTX-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4));
        $hr_email = self::getEnv('SMTP_FROM_EMAIL', 'hr@nextechxsolutions.com');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Invalid applicant email address'];
        }

        $subject = "Thank You for Applying – NEXTECHX SOLUTIONS";
        $submission_date = date('d M Y, h:i A');

        // Check dynamic CMS email template
        $use_cms_template = false;
        if (function_exists('cms_get_email_template')) {
            $tpl = cms_get_email_template('applicant_confirmation');
            if ($tpl && !empty($tpl['is_active'])) {
                $replacements = [
                    '{{applicant_name}}' => $full_name,
                    '{{full_name}}' => $full_name,
                    '{{position}}' => $position,
                    '{{applying_for}}' => $applying_for,
                    '{{education}}' => $education,
                    '{{application_id}}' => $app_id,
                    '{{company_name}}' => 'NEXTECHX SOLUTIONS',
                    '{{hr_email}}' => $hr_email,
                    '{{date}}' => $submission_date,
                    '{{date_time}}' => $submission_date
                ];
                $subject = str_replace(array_keys($replacements), array_values($replacements), $tpl['subject'] ?? $subject);
                $htmlBody = str_replace(array_keys($replacements), array_values($replacements), $tpl['body_html'] ?? '');
                $use_cms_template = true;
            }
        }

        if (!$use_cms_template) {
            // Generate Clean Corporate Responsive HTML Email Template
            $htmlBody = self::buildApplicantEmailHtml([
                'full_name' => $full_name,
                'position' => $position,
                'applying_for' => $applying_for,
                'education' => $education,
                'app_id' => $app_id,
                'hr_email' => $hr_email,
                'date_time' => $submission_date
            ]);
        }

        $plainBody = "Dear $full_name,\n\n" .
            "Thank you for your interest in NEXTECHX SOLUTIONS.\n\n" .
            "We are pleased to confirm that we have received your application for the $position position.\n\n" .
            "Our recruitment team will carefully review your application. If your profile matches our requirements, we will contact you regarding the next steps.\n\n" .
            "If you have any questions, feel free to reach out to our HR team.\n\n" .
            "Thank you for considering NEXTECHX SOLUTIONS. We appreciate your interest!\n\n" .
            "Best Regards,\n" .
            "HR Team\n" .
            "NEXTECHX SOLUTIONS\n" .
            "$hr_email\n" .
            "https://nextechxsolutions.com";

        try {
            $mail = self::createMailer();
            $mail->addAddress($email, $full_name);
            $mail->addReplyTo($hr_email, 'NEXTECHX SOLUTIONS HR Desk');
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $htmlBody;
            $mail->AltBody = $plainBody;

            $mail->send();
            return ['success' => true, 'message' => 'Applicant confirmation email sent'];
        } catch (\Throwable $e) {
            $err465 = $e->getMessage() . (!empty($mail->ErrorInfo) ? (' | ' . $mail->ErrorInfo) : '');
            $meta465 = self::$last_smtp_meta;
            $dialog465 = self::$last_smtp_debug;

            // Only attempt Port 587 fallback if Port 465 suffered a network/connection failure,
            // NOT an authentication rejection (since the same credentials on Port 587 will fail identically)
            $is_auth_error = (stripos($err465, 'authenticate') !== false || stripos($err465, '535') !== false);
            if (!$is_auth_error) {
                // Try port 587 with STARTTLS fallback
                try {
                    $retryMail = self::createMailer(587, 'tls');
                    $retryMail->addAddress($email, $full_name);
                    $retryMail->addReplyTo($hr_email, 'NEXTECHX SOLUTIONS HR Desk');
                    $retryMail->Subject = $subject;
                    $retryMail->isHTML(true);
                    $retryMail->Body = $htmlBody;
                    $retryMail->AltBody = $plainBody;

                    $retryMail->send();
                    return ['success' => true, 'message' => 'Applicant confirmation email sent via Port 587 STARTTLS'];
                } catch (\Throwable $retryErr) {
                    $err587 = $retryErr->getMessage() . (!empty($retryMail->ErrorInfo) ? (' | ' . $retryMail->ErrorInfo) : '');
                    $meta587 = self::$last_smtp_meta;
                    $dialog587 = self::$last_smtp_debug;

                    self::logError('applicant_confirmation', "Port 465: $err465 | Port 587: $err587", $email);
                    return [
                        'success' => false,
                        'error' => "Port 465: $err465 | Port 587: $err587",
                        'meta' => [
                            'port_465' => $meta465,
                            'port_587' => $meta587
                        ],
                        'smtp_dialog' => [
                            'port_465' => array_slice($dialog465, -6),
                            'port_587' => array_slice($dialog587, -6)
                        ]
                    ];
                }
            } else {
                self::logError('applicant_confirmation', "Port 465: $err465", $email);
                return [
                    'success' => false,
                    'error' => "Port 465: $err465",
                    'meta' => [
                        'port_465' => $meta465
                    ],
                    'smtp_dialog' => [
                        'port_465' => array_slice($dialog465, -6)
                    ]
                ];
            }
        }
    }

    /**
     * 2. Send Company Notification Email
     */
    public static function sendCompanyNotification($data, $resume_filepath = null, $resume_filename = null) {
        $full_name = htmlspecialchars(trim($data['full_name'] ?? 'Applicant'));
        $email = trim($data['email'] ?? '');
        $phone = htmlspecialchars(trim($data['phone'] ?? ''));
        $position = htmlspecialchars(trim($data['position'] ?? ''));
        $applying_for = htmlspecialchars(trim($data['applying_for'] ?? 'Internship'));
        $education = htmlspecialchars(trim($data['education'] ?? ''));
        $message = htmlspecialchars(trim($data['message'] ?? 'None provided'));
        $app_id = $data['id'] ?? ('NTX-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4));
        $submission_date = date('d M Y, h:i A');

        $company_to = 'nextechxsolutions@gmail.com';
        $subject = "New Application Received – $full_name – $position";

        // Check dynamic CMS email template
        $use_cms_company_template = false;
        if (function_exists('cms_get_email_template')) {
            $tpl = cms_get_email_template('company_application_notification');
            if ($tpl && !empty($tpl['is_active'])) {
                $replacements = [
                    '{{applicant_name}}' => $full_name,
                    '{{full_name}}' => $full_name,
                    '{{email}}' => $email,
                    '{{phone}}' => $phone,
                    '{{position}}' => $position,
                    '{{applying_for}}' => $applying_for,
                    '{{education}}' => $education,
                    '{{application_id}}' => $app_id,
                    '{{message}}' => $message,
                    '{{date}}' => $submission_date,
                    '{{date_time}}' => $submission_date
                ];
                $subject = str_replace(array_keys($replacements), array_values($replacements), $tpl['subject'] ?? $subject);
                $htmlBody = str_replace(array_keys($replacements), array_values($replacements), $tpl['body_html'] ?? '');
                $use_cms_company_template = true;
            }
        }

        if (!$use_cms_company_template) {
            $htmlBody = self::buildCompanyEmailHtml([
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'position' => $position,
                'applying_for' => $applying_for,
                'education' => $education,
                'message' => $message,
                'app_id' => $app_id,
                'date_time' => $submission_date,
                'has_resume' => ($resume_filepath && file_exists($resume_filepath)),
                'resume_filename' => $resume_filename
            ]);
        }

        $plainBody = "NEW APPLICATION RECEIVED – NEXTECHX SOLUTIONS\n\n" .
            "Candidate Name: $full_name\n" .
            "Email Address: $email\n" .
            "Phone Number: $phone\n" .
            "Application Reference ID: $app_id\n" .
            "Applied Position: $position\n" .
            "Application Type: $applying_for\n" .
            "Highest Education: $education\n" .
            "Submission Date: $submission_date\n" .
            ($resume_filename ? "Resume Attachment: $resume_filename\n" : "No resume attached\n") .
            "\nApplicant Message:\n$message\n\n" .
            "NEXTECHX SOLUTIONS\n" .
            "Website: https://nextechxsolutions.com\n" .
            "Email: hr@nextechxsolutions.com";

        try {
            $mail = self::createMailer();
            $mail->addAddress($company_to, 'NEXTECHX SOLUTIONS Team');
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($email, $full_name);
            }
            $mail->Subject = $subject;
            $mail->isHTML(true);
            $mail->Body = $htmlBody;
            $mail->AltBody = $plainBody;

            // Attach Resume if available (fail-safe so attachment access issues never block notification delivery)
            if (!empty($resume_filepath)) {
                $real_resume = realpath($resume_filepath) ?: $resume_filepath;
                if (file_exists($real_resume) && is_readable($real_resume)) {
                    try {
                        $att_name = $resume_filename ?: basename($real_resume);
                        $mail->addAttachment($real_resume, $att_name);
                    } catch (\Throwable $att_err) {
                        self::logError('company_notification_attachment', $att_err->getMessage(), $company_to);
                    }
                }
            }

            $mail->send();
            return ['success' => true, 'message' => 'Company notification email sent'];
        } catch (\Throwable $e) {
            $err465 = $e->getMessage() . (!empty($mail->ErrorInfo) ? (' | ' . $mail->ErrorInfo) : '');
            $meta465 = self::$last_smtp_meta;
            $dialog465 = self::$last_smtp_debug;

            // Only attempt Port 587 fallback if Port 465 suffered a network/connection failure,
            // NOT an authentication rejection (since the same credentials on Port 587 will fail identically)
            $is_auth_error = (stripos($err465, 'authenticate') !== false || stripos($err465, '535') !== false);
            if (!$is_auth_error) {
                // Try port 587 with STARTTLS fallback
                try {
                    $retryMail = self::createMailer(587, 'tls');
                    $retryMail->addAddress($company_to, 'NEXTECHX SOLUTIONS Team');
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $retryMail->addReplyTo($email, $full_name);
                    }
                    $retryMail->Subject = $subject;
                    $retryMail->isHTML(true);
                    $retryMail->Body = $htmlBody;
                    $retryMail->AltBody = $plainBody;

                    if (!empty($resume_filepath)) {
                        $real_resume = realpath($resume_filepath) ?: $resume_filepath;
                        if (file_exists($real_resume) && is_readable($real_resume)) {
                            try {
                                $att_name = $resume_filename ?: basename($real_resume);
                                $retryMail->addAttachment($real_resume, $att_name);
                            } catch (\Throwable $att_err) {}
                        }
                    }

                    $retryMail->send();
                    return ['success' => true, 'message' => 'Company notification email sent via Port 587 STARTTLS'];
                } catch (\Throwable $retryErr) {
                    $err587 = $retryErr->getMessage() . (!empty($retryMail->ErrorInfo) ? (' | ' . $retryMail->ErrorInfo) : '');
                    $meta587 = self::$last_smtp_meta;
                    $dialog587 = self::$last_smtp_debug;

                    self::logError('company_notification', "Port 465: $err465 | Port 587: $err587", $company_to);
                    return [
                        'success' => false,
                        'error' => "Port 465: $err465 | Port 587: $err587",
                        'meta' => [
                            'port_465' => $meta465,
                            'port_587' => $meta587
                        ],
                        'smtp_dialog' => [
                            'port_465' => array_slice($dialog465, -6),
                            'port_587' => array_slice($dialog587, -6)
                        ]
                    ];
                }
            } else {
                self::logError('company_notification', "Port 465: $err465", $company_to);
                return [
                    'success' => false,
                    'error' => "Port 465: $err465",
                    'meta' => [
                        'port_465' => $meta465
                    ],
                    'smtp_dialog' => [
                        'port_465' => array_slice($dialog465, -6)
                    ]
                ];
            }
        }
    }

    /**
     * Premium Minimal Corporate HTML Template for Applicant Confirmation Email
     * Clean white background, navy/black accents, subtle grey dividers, zero unnecessary summary boxes
     */
    private static function buildApplicantEmailHtml($p) {
        $name = $p['full_name'];
        $pos = $p['position'];
        $hrEmail = 'hr@nextechxsolutions.com';
        $websiteUrl = 'https://nextechxsolutions.com';

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Applying – NEXTECHX SOLUTIONS</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #ffffff;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #111827;
      -webkit-font-smoothing: antialiased;
    }
    table {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }
    td {
      padding: 0;
    }
    .email-wrapper {
      width: 100%;
      background-color: #ffffff;
      padding: 40px 16px;
    }
    .email-container {
      max-width: 580px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
    }
    .header-cell {
      padding: 28px 36px 22px 36px;
      border-bottom: 1px solid #e5e7eb;
      background-color: #ffffff;
    }
    .content-cell {
      padding: 36px 36px 32px 36px;
      background-color: #ffffff;
    }
    .footer-cell {
      padding: 22px 36px;
      border-top: 1px solid #e5e7eb;
      background-color: #ffffff;
    }
    @media only screen and (max-width: 600px) {
      .email-wrapper {
        padding: 16px 8px !important;
      }
      .header-cell, .content-cell, .footer-cell {
        padding-left: 20px !important;
        padding-right: 20px !important;
      }
      .content-cell {
        padding-top: 28px !important;
        padding-bottom: 24px !important;
      }
    }
  </style>
</head>
<body style="margin: 0; padding: 0; background-color: #ffffff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #111827;">
  <div class="email-wrapper" style="width: 100%; background-color: #ffffff; padding: 40px 16px;">
    <table class="email-container" width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="max-width: 580px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 6px;">
      
      <!-- 1. Header: Logo & Company Name -->
      <tr>
        <td class="header-cell" style="padding: 28px 36px 22px 36px; border-bottom: 1px solid #e5e7eb; background-color: #ffffff;">
          <table cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="vertical-align: middle; padding-right: 12px;">
                <img src="https://nextechxsolutions.com/favicon.png" width="32" height="32" alt="NEXTECHX SOLUTIONS Logo" style="display: block; border: 0; outline: none; border-radius: 4px;">
              </td>
              <td style="vertical-align: middle;">
                <span style="font-size: 16px; font-weight: 800; color: #0f2b5c; letter-spacing: 0.4px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
                  NEXTECHX SOLUTIONS
                </span>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <!-- 2. Message Body -->
      <tr>
        <td class="content-cell" style="padding: 36px 36px 32px 36px; background-color: #ffffff;">
          <p style="font-size: 15px; font-weight: 600; color: #111827; line-height: 1.6; margin: 0 0 18px 0;">
            Dear {$name},
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 16px 0;">
            Thank you for your interest in <strong style="color: #0f2b5c;">NEXTECHX SOLUTIONS</strong>.
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 16px 0;">
            We are pleased to confirm that we have received your application for the <strong style="color: #0f2b5c;">{$pos}</strong> position.
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 16px 0;">
            Our recruitment team will carefully review your application. If your profile matches our requirements, we will contact you regarding the next steps.
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 16px 0;">
            If you have any questions, feel free to reach out to our HR team.
          </p>

          <p style="font-size: 14.5px; color: #374151; line-height: 1.7; margin: 0 0 28px 0;">
            Thank you for considering NEXTECHX SOLUTIONS. We appreciate your interest!
          </p>

          <p style="font-size: 14px; color: #111827; line-height: 1.65; margin: 0;">
            Best Regards,<br>
            <strong style="color: #0f2b5c;">HR Team</strong><br>
            <strong style="color: #0f2b5c;">NEXTECHX SOLUTIONS</strong><br>
            <a href="mailto:{$hrEmail}" style="color: #0f2b5c; text-decoration: underline;">{$hrEmail}</a><br>
            <a href="{$websiteUrl}" target="_blank" rel="noopener" style="color: #0f2b5c; text-decoration: underline;">{$websiteUrl}</a>
          </p>
        </td>
      </tr>

      <!-- 3. Professional Corporate Footer -->
      <tr>
        <td class="footer-cell" style="padding: 20px 36px; border-top: 1px solid #e5e7eb; background-color: #ffffff;">
          <p style="font-size: 12px; color: #6b7280; line-height: 1.5; margin: 0;">
            <strong style="color: #0f2b5c; font-size: 12px; letter-spacing: 0.4px;">NEXTECHX SOLUTIONS</strong>
          </p>
        </td>
      </tr>

    </table>
  </div>
</body>
</html>
HTML;
    }

    /**
     * Responsive HTML Template for Company Notification Email
     * Matching clean corporate design: white background, navy/black accents, subtle summary table
     */
    private static function buildCompanyEmailHtml($p) {
        $name = $p['full_name'];
        $email = $p['email'];
        $phone = $p['phone'];
        $pos = $p['position'];
        $type = $p['applying_for'];
        $edu = $p['education'];
        $msg = $p['message'];
        $appId = $p['app_id'];
        $submissionDate = $p['date_time'];
        $hasResume = $p['has_resume'];
        $resumeName = $p['resume_filename'] ?: 'Attached';
        $websiteUrl = 'https://nextechxsolutions.com';
        $hrEmail = 'hr@nextechxsolutions.com';

        $resumeBadge = $hasResume 
            ? "<span style='color:#059669; font-weight:700;'>Attached ({$resumeName})</span>" 
            : "<span style='color:#64748b; font-weight:500;'>No file attached</span>";

        $msgBlock = (!empty($msg) && $msg !== 'None provided')
            ? "<div style='margin-top: 20px; padding: 14px 16px; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px;'>
                <div style='font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #64748b; margin-bottom: 6px;'>Applicant Message / Cover Note</div>
                <div style='font-size: 13px; color: #1e293b; line-height: 1.6; white-space: pre-wrap;'>" . htmlspecialchars($msg) . "</div>
               </div>"
            : "";

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Application Received – NEXTECHX SOLUTIONS</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f8fafc;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #1e293b;
      -webkit-font-smoothing: antialiased;
    }
    table {
      border-collapse: collapse;
    }
    .email-wrapper {
      width: 100%;
      background-color: #f8fafc;
      padding: 36px 12px;
    }
    .email-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      overflow: hidden;
    }
    .header-table {
      width: 100%;
      padding: 24px 32px 20px 32px;
      border-bottom: 1px solid #e2e8f0;
      background-color: #ffffff;
    }
    .content-cell {
      padding: 32px 32px 28px 32px;
      background-color: #ffffff;
    }
    .summary-box {
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      background-color: #f8fafc;
      margin: 20px 0;
      padding: 16px 20px;
    }
    .summary-title {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #64748b;
      margin-bottom: 12px;
    }
    .summary-table {
      width: 100%;
      font-size: 13.5px;
    }
    .summary-table td {
      padding: 6px 0;
      vertical-align: top;
    }
    .summary-label {
      color: #64748b;
      width: 40%;
      font-weight: 500;
    }
    .summary-value {
      color: #0f172a;
      font-weight: 600;
    }
    .footer-table {
      width: 100%;
      border-top: 1px solid #e2e8f0;
      padding: 24px 32px;
      background-color: #ffffff;
    }
    .btn {
      display: inline-block;
      padding: 9px 18px;
      background-color: #0f2b48;
      color: #ffffff !important;
      text-decoration: none;
      font-size: 12px;
      font-weight: 600;
      border-radius: 6px;
      margin-top: 16px;
    }
    @media only screen and (max-width: 600px) {
      .header-table, .content-cell, .footer-table {
        padding-left: 20px !important;
        padding-right: 20px !important;
      }
      .summary-box {
        padding: 14px 16px !important;
      }
      .summary-label {
        width: 46% !important;
      }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <table class="email-container" width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
      <!-- 1. Header with Logo & Notification Badge -->
      <tr>
        <td class="header-table">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="vertical-align: middle;">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td style="vertical-align: middle; padding-right: 12px;">
                      <img src="https://nextechxsolutions.com/favicon.png" width="34" height="34" alt="NEXTECHX SOLUTIONS Logo" style="display: block; border: 0; outline: none; border-radius: 6px;">
                    </td>
                    <td style="vertical-align: middle;">
                      <span style="font-size: 17px; font-weight: 800; color: #0f172a; letter-spacing: -0.3px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
                        NEXTECHX <span style="color: #0284c7;">SOLUTIONS</span>
                      </span>
                    </td>
                  </tr>
                </table>
              </td>
              <td style="vertical-align: middle; text-align: right;">
                <span style="font-size: 11px; font-weight: 700; color: #0284c7; background-color: #e0f2fe; padding: 4px 10px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.5px;">New Application</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <!-- 2. Content -->
      <tr>
        <td class="content-cell">
          <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0;">New Application Received</h2>
          <p style="font-size: 14px; color: #475569; margin: 0 0 16px 0; line-height: 1.5;">
            A new candidate application has been received through the NEXTECHX SOLUTIONS Careers portal.
          </p>

          <!-- 3. Candidate & Application Details -->
          <div class="summary-box">
            <div class="summary-title">Applicant & Position Details</div>
            <table class="summary-table" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td class="summary-label">Candidate Name:</td>
                <td class="summary-value">{$name}</td>
              </tr>
              <tr>
                <td class="summary-label">Email Address:</td>
                <td class="summary-value"><a href="mailto:{$email}" style="color: #0284c7; text-decoration: none;">{$email}</a></td>
              </tr>
              <tr>
                <td class="summary-label">Phone Number:</td>
                <td class="summary-value"><a href="tel:{$phone}" style="color: #0284c7; text-decoration: none;">{$phone}</a></td>
              </tr>
              <tr>
                <td class="summary-label">Application Reference ID:</td>
                <td class="summary-value" style="font-family: SFMono-Regular, Consolas, Monaco, monospace;">{$appId}</td>
              </tr>
              <tr>
                <td class="summary-label">Applied Position:</td>
                <td class="summary-value">{$pos}</td>
              </tr>
              <tr>
                <td class="summary-label">Application Type:</td>
                <td class="summary-value">{$type}</td>
              </tr>
              <tr>
                <td class="summary-label">Highest Education:</td>
                <td class="summary-value">{$edu}</td>
              </tr>
              <tr>
                <td class="summary-label">Submission Date:</td>
                <td class="summary-value">{$submissionDate}</td>
              </tr>
              <tr>
                <td class="summary-label">Resume Attachment:</td>
                <td class="summary-value">{$resumeBadge}</td>
              </tr>
            </table>
          </div>

          {$msgBlock}

          <div style="margin-top: 20px;">
            <a href="mailto:{$email}?subject=Regarding%20your%20application%20at%20NEXTECHX%20SOLUTIONS" class="btn">Reply to Candidate</a>
          </div>
        </td>
      </tr>

      <!-- 4. Professional Footer -->
      <tr>
        <td class="footer-table">
          <p style="font-size: 12px; color: #64748b; line-height: 1.65; margin: 0;">
            <strong style="color: #0f172a; font-size: 13px;">NEXTECHX SOLUTIONS</strong><br>
            Website: <a href="{$websiteUrl}" target="_blank" rel="noopener" style="color: #0284c7; text-decoration: underline;">{$websiteUrl}</a><br>
            Email: <a href="mailto:{$hrEmail}" style="color: #0284c7; text-decoration: underline;">{$hrEmail}</a>
          </p>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }
}

// Backward-compatibility alias
if (!class_exists('NextTechXMailer', false)) {
    class_alias('NexTechXMailer', 'NextTechXMailer');
}

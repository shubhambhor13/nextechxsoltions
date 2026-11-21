<?php
// NextTechX Solutions - Automated Application Email & SMTP Notification System
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

class NextTechXMailer {

    /**
     * Securely retrieve environment variable with priority:
     * 1. getenv() / getenv('REDIRECT_*')
     * 2. $_ENV / $_ENV['REDIRECT_*']
     * 3. $_SERVER / $_SERVER['REDIRECT_*']
     * 4. apache_getenv()
     * 5. .env file in project hierarchy
     */
    public static function getEnv($key, $default = null) {
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
            if ($k === 'SMTP_PASSWORD') {
                $val = str_replace(' ', '', $val);
            }
            return $val;
        };

        // 1. Native getenv (direct and Apache REDIRECT_ prefix)
        $v = $clean(getenv($key), $key);
        if ($v !== null) return $v;

        $v = $clean(getenv('REDIRECT_' . $key), $key);
        if ($v !== null) return $v;

        // 2. Superglobal $_ENV
        if (isset($_ENV[$key])) {
            $v = $clean($_ENV[$key], $key);
            if ($v !== null) return $v;
        }
        if (isset($_ENV['REDIRECT_' . $key])) {
            $v = $clean($_ENV['REDIRECT_' . $key], $key);
            if ($v !== null) return $v;
        }

        // 3. Superglobal $_SERVER (common in FastCGI, PHP-FPM, Hostinger LiteSpeed)
        if (isset($_SERVER[$key])) {
            $v = $clean($_SERVER[$key], $key);
            if ($v !== null) return $v;
        }
        if (isset($_SERVER['REDIRECT_' . $key])) {
            $v = $clean($_SERVER['REDIRECT_' . $key], $key);
            if ($v !== null) return $v;
        }

        // 4. Apache getenv if available
        if (function_exists('apache_getenv')) {
            $v = $clean(@apache_getenv($key), $key);
            if ($v !== null) return $v;
            $v = $clean(@apache_getenv('REDIRECT_' . $key), $key);
            if ($v !== null) return $v;
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
                $doc_root ? $doc_root . '/php/.env' : null
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
                                if ($val !== null) {
                                    $env_cache[$k] = $val;
                                }
                            }
                        }
                    }
                    break;
                }
            }
        }

        return $env_cache[$key] ?? $default;
    }

    /**
     * Create and configure a fresh PHPMailer instance
     */
    public static function createMailer() {
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            throw new Exception("PHPMailer class is not loaded. Ensure Composer autoload has run.");
        }

        $mail = new PHPMailer(true);

        $host = self::getEnv('SMTP_HOST', 'smtp.gmail.com');
        $port = (int) self::getEnv('SMTP_PORT', 587);
        $username = self::getEnv('SMTP_USERNAME', 'nextechxsolutions@gmail.com');
        $password = self::getEnv('SMTP_PASSWORD', '');
        $from_email = self::getEnv('SMTP_FROM_EMAIL', 'nextechxsolutions@gmail.com');
        $from_name = self::getEnv('SMTP_FROM_NAME', 'NEXTECHX SOLUTIONS');

        // Fail fast with clear actionable error if SMTP_PASSWORD is not provided
        if (empty($password)) {
            throw new Exception("SMTP_PASSWORD is not configured. Please set your 16-character Gmail App Password in your server environment variables or .env file.");
        }

        $mail->isSMTP();
        $mail->Host = $host;
        $mail->Port = $port;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;

        if ($port === 465) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        // Configure CA bundle to guarantee TLS certificate verification succeeds across all servers
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
        $mail->Timeout = 15;

        // Sensible default sender
        $mail->setFrom($from_email, $from_name);

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
     * 1. Send Applicant Confirmation Email
     */
    public static function sendApplicantConfirmation($data) {
        $full_name = htmlspecialchars(trim($data['full_name'] ?? 'Candidate'));
        $email = trim($data['email'] ?? '');
        $position = htmlspecialchars(trim($data['position'] ?? 'Internship Track'));
        $applying_for = htmlspecialchars(trim($data['applying_for'] ?? 'Internship'));
        $education = htmlspecialchars(trim($data['education'] ?? 'Degree'));
        $app_id = $data['id'] ?? ('NTX-' . date('Ymd') . '-' . substr(md5(uniqid()), 0, 4));
        $hr_email = 'hr@nextechxsolutions.com';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Invalid applicant email address'];
        }

        $subject = "Application Received – NEXTECHX SOLUTIONS";

        // Generate Responsive HTML Email Template
        $htmlBody = self::buildApplicantEmailHtml([
            'full_name' => $full_name,
            'position' => $position,
            'applying_for' => $applying_for,
            'education' => $education,
            'app_id' => $app_id,
            'hr_email' => $hr_email,
            'date_time' => date('d M Y, h:i A T')
        ]);

        $plainBody = "Dear $full_name,\n\n" .
            "Thank you for applying to NEXTECHX SOLUTIONS.\n" .
            "We have successfully received your application for the $position ($applying_for) position.\n\n" .
            "Application Reference: $app_id\n" .
            "Submitted On: " . date('d M Y, h:i A') . "\n\n" .
            "Our HR and technical review team will carefully evaluate your submission. Shortlisted candidates will be contacted regarding the next steps in our recruitment process.\n\n" .
            "Please note that this message confirms receipt of your application and does not constitute a selection or interview confirmation.\n\n" .
            "If you have any questions, you can reach our HR team at $hr_email or phone/WhatsApp +91 93098 35085.\n\n" .
            "Warm regards,\nNEXTECHX SOLUTIONS Team\nhttps://nextechxsolutions.com";

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
        } catch (Exception $e) {
            $err = $e->getMessage();
            self::logError('applicant_confirmation', $err, $email);
            return ['success' => false, 'error' => $err];
        } catch (\Throwable $t) {
            $err = $t->getMessage();
            self::logError('applicant_confirmation', $err, $email);
            return ['success' => false, 'error' => $err];
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
        $date_time = date('Y-m-d H:i:s T');

        $company_to = 'nextechxsolutions@gmail.com';
        $subject = "New Application Received – $full_name – $position";

        $htmlBody = self::buildCompanyEmailHtml([
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'position' => $position,
            'applying_for' => $applying_for,
            'education' => $education,
            'message' => $message,
            'app_id' => $app_id,
            'date_time' => $date_time,
            'has_resume' => ($resume_filepath && file_exists($resume_filepath)),
            'resume_filename' => $resume_filename
        ]);

        $plainBody = "NEW APPLICATION RECEIVED - NEXTECHX SOLUTIONS\n\n" .
            "Candidate Name: $full_name\n" .
            "Email Address: $email\n" .
            "Phone Number: $phone\n" .
            "Application Type: $applying_for\n" .
            "Applied Position: $position\n" .
            "Highest Education: $education\n" .
            "Submission Time: $date_time\n" .
            "Application ID: $app_id\n\n" .
            "Applicant Message:\n$message\n\n" .
            ($resume_filename ? "Attached Resume: $resume_filename\n" : "No resume attached\n");

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
        } catch (Exception $e) {
            $err = $e->getMessage();
            self::logError('company_notification', $err, $company_to);
            return ['success' => false, 'error' => $err];
        } catch (\Throwable $t) {
            $err = $t->getMessage();
            self::logError('company_notification', $err, $company_to);
            return ['success' => false, 'error' => $err];
        }
    }

    /**
     * Responsive HTML Template for Applicant Confirmation
     */
    private static function buildApplicantEmailHtml($p) {
        $name = $p['full_name'];
        $pos = $p['position'];
        $type = $p['applying_for'];
        $edu = $p['education'];
        $appId = $p['app_id'];
        $hrEmail = $p['hr_email'];
        $dt = $p['date_time'];

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Received</title>
  <style>
    body { margin:0; padding:0; background-color:#f1f5f9; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; color:#1e293b; }
    table { border-collapse:collapse; }
    .wrapper { width:100%; table-layout:fixed; background-color:#f1f5f9; padding:30px 10px; }
    .container { max-width:600px; margin:0 auto; background-color:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e2e8f0; box-shadow:0 10px 25px -5px rgba(15,23,42,0.06); }
    .header { background:linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding:32px 30px; text-align:center; }
    .brand-title { color:#ffffff; font-size:22px; font-weight:800; letter-spacing:-0.5px; margin:0; }
    .brand-accent { color:#38bdf8; }
    .brand-tagline { color:#94a3b8; font-size:11px; text-transform:uppercase; letter-spacing:1.5px; margin-top:6px; font-weight:700; }
    .badge { display:inline-block; padding:4px 12px; background:rgba(56,189,248,0.12); border:1px solid rgba(56,189,248,0.3); border-radius:999px; color:#38bdf8; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:12px; }
    .content { padding:36px 32px; }
    .greeting { font-size:18px; font-weight:700; color:#0f172a; margin-top:0; margin-bottom:14px; }
    .lead-text { font-size:14px; line-height:1.65; color:#334155; margin-bottom:24px; }
    .summary-card { background-color:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:20px; margin-bottom:24px; }
    .summary-title { font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px; color:#64748b; margin-top:0; margin-bottom:12px; }
    .summary-row { padding:7px 0; border-bottom:1px solid #edf2f7; font-size:13px; }
    .summary-row:last-child { border-bottom:none; }
    .summary-label { color:#64748b; width:40%; font-weight:600; display:inline-block; }
    .summary-value { color:#0f172a; width:58%; font-weight:700; display:inline-block; }
    .next-steps-card { background-color:#eff6ff; border-left:4px solid #2563eb; border-radius:0 12px 12px 0; padding:18px 20px; margin-bottom:24px; }
    .next-steps-title { font-size:13px; font-weight:800; color:#1e40af; margin:0 0 6px 0; }
    .next-steps-text { font-size:12px; line-height:1.6; color:#1e3a8a; margin:0; }
    .notice-box { background-color:#fffbeb; border:1px solid #fef3c7; border-radius:10px; padding:14px 16px; font-size:11.5px; line-height:1.55; color:#92400e; margin-bottom:24px; }
    .contact-card { background-color:#f8fafc; border:1px dashed #cbd5e1; border-radius:12px; padding:18px; font-size:12px; color:#475569; line-height:1.6; }
    .contact-card a { color:#2563eb; font-weight:700; text-decoration:none; }
    .footer { background-color:#0f172a; color:#94a3b8; padding:24px 30px; text-align:center; font-size:11px; line-height:1.6; }
    .footer a { color:#38bdf8; text-decoration:none; }
  </style>
</head>
<body>
  <div class="wrapper">
    <table class="container" width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td class="header">
          <div class="badge">Official Confirmation</div>
          <h1 class="brand-title">NEXTECH<span class="brand-accent">X</span> SOLUTIONS</h1>
          <div class="brand-tagline">Your Vision Our Technology</div>
        </td>
      </tr>
      <tr>
        <td class="content">
          <p class="greeting">Dear {$name},</p>
          <p class="lead-text">
            Thank you for applying to <strong>NEXTECHX SOLUTIONS</strong>. We are pleased to confirm that your application for the <strong>{$pos}</strong> ({$type}) position has been successfully received by our recruitment portal.
          </p>

          <div class="summary-card">
            <div class="summary-title">Application Summary</div>
            <div class="summary-row">
              <span class="summary-label">Reference ID:</span>
              <span class="summary-value" style="font-family:monospace; color:#2563eb;">{$appId}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Target Position:</span>
              <span class="summary-value">{$pos}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Track / Category:</span>
              <span class="summary-value">{$type}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Highest Education:</span>
              <span class="summary-value">{$edu}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Submitted On:</span>
              <span class="summary-value">{$dt}</span>
            </div>
          </div>

          <div class="next-steps-card">
            <h4 class="next-steps-title">What Happens Next?</h4>
            <p class="next-steps-text">
              Our HR review panel and engineering leads are evaluating incoming applications based on technical foundation, domain passion, and current batch availability. If your profile matches our requirements, our talent acquisition team will contact you directly via Email or WhatsApp regarding subsequent steps and interview scheduling.
            </p>
          </div>

          <div class="notice-box">
            <strong>Important Notice:</strong> This message confirms that your application has been received into our system. It does not constitute an offer of engagement, selection, or interview confirmation.
          </div>

          <div class="contact-card">
            <strong>Need to follow up or submit an updated portfolio?</strong><br>
            Feel free to connect directly with our HR team at 
            <a href="mailto:{$hrEmail}">{$hrEmail}</a> or reach out via WhatsApp at <strong>+91 93098 35085</strong>.
          </div>
        </td>
      </tr>
      <tr>
        <td class="footer">
          &copy; 2026 NEXTECHX SOLUTIONS. All rights reserved.<br>
          Distributed Online IT Solutions & Services • Online-First Global Delivery<br>
          <a href="https://nextechxsolutions.com">nextechxsolutions.com</a>
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
        $dt = $p['date_time'];
        $hasResume = $p['has_resume'];
        $resumeName = $p['resume_filename'] ?: 'Attached';

        $resumeBadge = $hasResume 
            ? "<span style='color:#059669; font-weight:700;'>Attached ({$resumeName})</span>" 
            : "<span style='color:#d97706; font-weight:600;'>No file attached</span>";

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Application Received</title>
  <style>
    body { margin:0; padding:0; background-color:#f1f5f9; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; color:#1e293b; }
    .wrapper { width:100%; table-layout:fixed; background-color:#f1f5f9; padding:30px 10px; }
    .container { max-width:620px; margin:0 auto; background-color:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e2e8f0; }
    .header { background:#0f172a; padding:26px 30px; }
    .badge { display:inline-block; padding:4px 10px; background:#0284c7; border-radius:6px; color:#ffffff; font-size:10.5px; font-weight:800; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; }
    .title { color:#ffffff; font-size:20px; font-weight:800; margin:0; }
    .content { padding:30px; }
    .info-table { width:100%; border-collapse:collapse; margin-bottom:20px; }
    .info-table td { padding:10px 12px; border-bottom:1px solid #f1f5f9; font-size:13px; }
    .label { color:#64748b; font-weight:600; width:35%; }
    .val { color:#0f172a; font-weight:700; width:65%; }
    .message-box { background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:16px; margin-bottom:20px; }
    .actions { padding-top:10px; text-align:center; }
    .btn { display:inline-block; padding:11px 22px; background:#2563eb; color:#ffffff !important; border-radius:10px; font-weight:700; font-size:12.5px; text-decoration:none; margin-right:8px; }
    .btn-secondary { background:#059669; }
    .footer { background:#f8fafc; border-top:1px solid #e2e8f0; padding:16px; text-align:center; font-size:11px; color:#94a3b8; }
  </style>
</head>
<body>
  <div class="wrapper">
    <table class="container" width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td class="header">
          <div class="badge">New Candidate Submission</div>
          <h2 class="title">{$name} – {$pos}</h2>
        </td>
      </tr>
      <tr>
        <td class="content">
          <table class="info-table">
            <tr>
              <td class="label">Candidate Name:</td>
              <td class="val">{$name}</td>
            </tr>
            <tr>
              <td class="label">Email Address:</td>
              <td class="val"><a href="mailto:{$email}" style="color:#2563eb;">{$email}</a></td>
            </tr>
            <tr>
              <td class="label">Phone / WhatsApp:</td>
              <td class="val"><a href="tel:{$phone}" style="color:#2563eb;">{$phone}</a></td>
            </tr>
            <tr>
              <td class="label">Application Type:</td>
              <td class="val">{$type}</td>
            </tr>
            <tr>
              <td class="label">Target Role / Track:</td>
              <td class="val">{$pos}</td>
            </tr>
            <tr>
              <td class="label">Education / Degree:</td>
              <td class="val">{$edu}</td>
            </tr>
            <tr>
              <td class="label">Submission Timestamp:</td>
              <td class="val">{$dt}</td>
            </tr>
            <tr>
              <td class="label">Resume Attachment:</td>
              <td class="val">{$resumeBadge}</td>
            </tr>
          </table>

          <div class="message-box">
            <strong style="font-size:12px; color:#475569; text-transform:uppercase; letter-spacing:0.5px;">Applicant Message / Cover Statement:</strong>
            <p style="margin:8px 0 0 0; font-size:13px; color:#1e293b; line-height:1.55; white-space:pre-wrap;">{$msg}</p>
          </div>

          <div class="actions">
            <a href="mailto:{$email}?subject=Regarding%20your%20application%20at%20NEXTECHX%20SOLUTIONS" class="btn">Reply to Candidate</a>
            <a href="https://wa.me/{$phone}" class="btn btn-secondary" target="_blank">Open WhatsApp</a>
          </div>
        </td>
      </tr>
      <tr>
        <td class="footer">
          NextTechX Solutions Recruitment Hub • Automated Notification<br>
          Candidate submitted via Careers Page at {$dt}
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
HTML;
    }
}

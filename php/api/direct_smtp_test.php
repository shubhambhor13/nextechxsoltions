<?php
// NextTechX Solutions - Secure Temporary SMTP Delivery Verification
// Direct testing for Test 1 (Applicant) and Test 2 (Company)

header('Content-Type: application/json; charset=utf-8');

$expected_key = 'ntx_secure_test_smtp_delivery_2026';
$provided_key = $_GET['auth'] ?? $_SERVER['HTTP_X_ADMIN_AUTH'] ?? '';

if ($provided_key !== $expected_key) {
    http_response_code(403);
    echo json_encode(['error' => 'Access Denied. Unauthorized diagnostic request.']);
    exit;
}

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

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

// Test 1: Applicant Email
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

    $sent1 = $mail1->send();
    $results['test_1_applicant'] = [
        'recipient' => 'shubhambhor1320@gmail.com',
        'subject' => 'Test Email – NEXTECHX SOLUTIONS',
        'accepted_by_smtp' => true,
        'message' => 'Email accepted by smtp.hostinger.com for delivery to shubhambhor1320@gmail.com',
        'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -6)
    ];
} catch (\Throwable $e) {
    $results['test_1_applicant'] = [
        'recipient' => 'shubhambhor1320@gmail.com',
        'subject' => 'Test Email – NEXTECHX SOLUTIONS',
        'accepted_by_smtp' => false,
        'error' => $e->getMessage() . (!empty($mail1->ErrorInfo) ? (' | ' . $mail1->ErrorInfo) : ''),
        'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -8)
    ];
}

// Test 2: Company Email
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

    $sent2 = $mail2->send();
    $results['test_2_company'] = [
        'recipient' => 'nextechxsolutions@gmail.com',
        'subject' => 'SMTP Delivery Test – NEXTECHX SOLUTIONS',
        'accepted_by_smtp' => true,
        'message' => 'Email accepted by smtp.hostinger.com for delivery to nextechxsolutions@gmail.com',
        'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -6)
    ];
} catch (\Throwable $e) {
    $results['test_2_company'] = [
        'recipient' => 'nextechxsolutions@gmail.com',
        'subject' => 'SMTP Delivery Test – NEXTECHX SOLUTIONS',
        'accepted_by_smtp' => false,
        'error' => $e->getMessage() . (!empty($mail2->ErrorInfo) ? (' | ' . $mail2->ErrorInfo) : ''),
        'smtp_dialog' => array_slice(NextTechXMailer::$last_smtp_debug, -8)
    ];
}

echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

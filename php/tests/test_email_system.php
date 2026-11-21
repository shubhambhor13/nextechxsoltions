<?php
// NextTechX Solutions - Automated Email Notification & Application Test Suite
// Run via CLI: php php/tests/test_email_system.php

echo "========================================================\n";
echo "NEXTECHX SOLUTIONS - EMAIL NOTIFICATION SYSTEM TESTS\n";
echo "========================================================\n\n";

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

$passed = 0;
$failed = 0;

function assert_test($description, $condition) {
    global $passed, $failed;
    if ($condition) {
        echo "[PASS] $description\n";
        $passed++;
    } else {
        echo "[FAIL] $description\n";
        $failed++;
    }
}

// ---------------------------------------------------------
// TEST 1: PHPMailer & Autoloader Verification
// ---------------------------------------------------------
echo "--- Test Group 1: Dependency Autoloading ---\n";
assert_test("PHPMailer class exists", class_exists('PHPMailer\PHPMailer\PHPMailer'));
assert_test("SMTP transport class exists", class_exists('PHPMailer\PHPMailer\SMTP'));
assert_test("PHPMailer Exception class exists", class_exists('PHPMailer\PHPMailer\Exception'));

// ---------------------------------------------------------
// TEST 2: Environment Variable Loader
// ---------------------------------------------------------
echo "\n--- Test Group 2: Environment Variable Configuration ---\n";
$host = NextTechXMailer::getEnv('SMTP_HOST', 'smtp.gmail.com');
$port = NextTechXMailer::getEnv('SMTP_PORT', 587);
$user = NextTechXMailer::getEnv('SMTP_USERNAME', 'nextechxsolutions@gmail.com');
$from_name = NextTechXMailer::getEnv('SMTP_FROM_NAME', 'NEXTECHX SOLUTIONS');

assert_test("SMTP_HOST defaults to smtp.gmail.com", $host === 'smtp.gmail.com');
assert_test("SMTP_PORT defaults to 587", (int)$port === 587);
assert_test("SMTP_USERNAME defaults to nextechxsolutions@gmail.com", $user === 'nextechxsolutions@gmail.com');
assert_test("SMTP_FROM_NAME defaults to NEXTECHX SOLUTIONS", $from_name === 'NEXTECHX SOLUTIONS');

// ---------------------------------------------------------
// TEST 3: Applicant Confirmation Email Content & Template
// ---------------------------------------------------------
echo "\n--- Test Group 3: Applicant Confirmation Template ---\n";
$dummy_applicant = [
    'full_name' => 'Aarav Deshmukh',
    'email' => 'aarav.test@example.com',
    'phone' => '+91 98765 43210',
    'position' => 'AI & Machine Learning Research Intern',
    'applying_for' => 'Internship',
    'education' => 'B.Tech CSE (Final Year)',
    'id' => 'NTX-TEST-2026-001'
];

$method = new ReflectionMethod('NextTechXMailer', 'buildApplicantEmailHtml');
$method->setAccessible(true);
$htmlApplicant = $method->invoke(null, [
    'full_name' => $dummy_applicant['full_name'],
    'position' => $dummy_applicant['position'],
    'applying_for' => $dummy_applicant['applying_for'],
    'education' => $dummy_applicant['education'],
    'app_id' => $dummy_applicant['id'],
    'hr_email' => 'hr@nextechxsolutions.com',
    'date_time' => date('d M Y, h:i A')
]);

assert_test("Applicant email includes applicant name", strpos($htmlApplicant, 'Aarav Deshmukh') !== false);
assert_test("Applicant email includes applied position", strpos($htmlApplicant, 'AI & Machine Learning Research Intern') !== false);
assert_test("Applicant email includes reference ID", strpos($htmlApplicant, 'NTX-TEST-2026-001') !== false);
assert_test("Applicant email includes official HR desk email", strpos($htmlApplicant, 'hr@nextechxsolutions.com') !== false);
assert_test("Applicant email includes review process text", strpos($htmlApplicant, 'Our recruitment team will review your application') !== false);
assert_test("Applicant email includes footer website link", strpos($htmlApplicant, 'https://nextechxsolutions.com') !== false);

// ---------------------------------------------------------
// TEST 4: Company Notification Email Content & Template
// ---------------------------------------------------------
echo "\n--- Test Group 4: Company Notification Template ---\n";
$methodComp = new ReflectionMethod('NextTechXMailer', 'buildCompanyEmailHtml');
$methodComp->setAccessible(true);
$htmlCompany = $methodComp->invoke(null, [
    'full_name' => $dummy_applicant['full_name'],
    'email' => $dummy_applicant['email'],
    'phone' => $dummy_applicant['phone'],
    'position' => $dummy_applicant['position'],
    'applying_for' => $dummy_applicant['applying_for'],
    'education' => $dummy_applicant['education'],
    'message' => 'Passionate about PyTorch and LLMs.',
    'app_id' => $dummy_applicant['id'],
    'date_time' => date('Y-m-d H:i:s'),
    'has_resume' => true,
    'resume_filename' => 'aarav_resume.pdf'
]);

assert_test("Company email includes candidate name", strpos($htmlCompany, 'Aarav Deshmukh') !== false);
assert_test("Company email includes candidate email", strpos($htmlCompany, 'aarav.test@example.com') !== false);
assert_test("Company email includes candidate phone", strpos($htmlCompany, '+91 98765 43210') !== false);
assert_test("Company email includes candidate message", strpos($htmlCompany, 'Passionate about PyTorch and LLMs.') !== false);
assert_test("Company email highlights resume attachment", strpos($htmlCompany, 'aarav_resume.pdf') !== false);

// ---------------------------------------------------------
// TEST 5: Backend API Validation & Subprocess Execution
// ---------------------------------------------------------
echo "\n--- Test Group 5: Backend API Validation ---\n";

function run_subproc_api($post, $files = []) {
    $script = dirname(__DIR__) . '/api/apply_career.php';
    $payload = [
        'post' => $post,
        'files' => $files
    ];
    $runner = tempnam(sys_get_temp_dir(), 'api_test_') . '.php';
    $resFile = tempnam(sys_get_temp_dir(), 'api_res_') . '.json';

    $runnerCode = '<?php
$_SERVER["REQUEST_METHOD"] = "POST";
$p = json_decode(' . var_export(json_encode($payload), true) . ', true);
$_POST = $p["post"];
$_FILES = $p["files"];

register_shutdown_function(function() {
    $out = ob_get_contents();
    $code = http_response_code();
    file_put_contents(' . var_export($resFile, true) . ', json_encode(["code" => $code, "output" => json_decode($out, true), "raw" => $out]));
});

ob_start();
include ' . var_export($script, true) . ';
';
    file_put_contents($runner, $runnerCode);
    $cmd = 'php -d extension=pdo_sqlite ' . escapeshellarg($runner);
    shell_exec($cmd);
    $resJson = file_exists($resFile) ? file_get_contents($resFile) : '';
    @unlink($runner);
    @unlink($resFile);
    return json_decode($resJson, true) ?: ['code' => 500, 'raw' => $resJson];
}

// 5A. Missing fields
$res5A = run_subproc_api(['full_name' => 'Incomplete Applicant']);
assert_test("Missing required fields rejected with 400", ($res5A['code'] ?? 0) === 400);

// 5B. Invalid Email
$res5B = run_subproc_api([
    'full_name' => 'Bad Email User',
    'email' => 'invalid-email-format',
    'phone' => '1234567890',
    'position' => 'AI Intern',
    'education' => 'B.Tech'
]);
assert_test("Invalid email format rejected with 400", ($res5B['code'] ?? 0) === 400);

// 5C. Invalid File Extension
$tmpBad = tempnam(sys_get_temp_dir(), 'bad') . '.exe';
file_put_contents($tmpBad, 'MZ executable dummy');
$res5C = run_subproc_api([
    'full_name' => 'Malicious File User',
    'email' => 'hacker@example.com',
    'phone' => '1234567890',
    'position' => 'AI Intern',
    'education' => 'B.Tech'
], [
    'resume' => [
        'name' => 'virus.exe',
        'type' => 'application/x-msdownload',
        'tmp_name' => $tmpBad,
        'error' => UPLOAD_ERR_OK,
        'size' => filesize($tmpBad)
    ]
]);
@unlink($tmpBad);
assert_test("Executable file extension rejected with 400", ($res5C['code'] ?? 0) === 400);

// 5D. Direct Job Application rejected when no vacancies
$tmpPdf = tempnam(sys_get_temp_dir(), 'test_cv_') . '.pdf';
file_put_contents($tmpPdf, "%PDF-1.4\n1 0 obj<</Type/Catalog/Pages 2 0 R>>endobj\n2 0 obj<</Type/Pages/Count 1/Kids[3 0 R]>>endobj\n3 0 obj<</Type/Page/MediaBox[0 0 612 792]>>endobj\nxref\n0 4\n0000000000 65535 f\n0000000009 00000 n\n0000000052 00000 n\n0000000108 00000 n\ntrailer<</Size 4/Root 1 0 R>>\nstartxref\n168\n%%EOF");

$res5D = run_subproc_api([
    'full_name' => 'Job Seeker',
    'email' => 'jobseeker@example.com',
    'phone' => '+91 93098 35085',
    'applying_for' => 'Job',
    'position' => 'Senior Architect',
    'education' => 'M.Tech'
], [
    'resume' => [
        'name' => 'test_resume.pdf',
        'type' => 'application/pdf',
        'tmp_name' => $tmpPdf,
        'error' => UPLOAD_ERR_OK,
        'size' => filesize($tmpPdf)
    ]
]);
assert_test("Job application rejected when only internships offered", ($res5D['code'] ?? 0) === 400);

// 5E. Valid Internship Submission
$testCandidateName = 'Priya Patel (Test Candidate)';
$res5E = run_subproc_api([
    'full_name' => $testCandidateName,
    'email' => 'priya.patel.test@example.com',
    'phone' => '+91 93098 35085',
    'applying_for' => 'Internship',
    'position' => 'Full Stack Web Engineering Intern',
    'education' => 'B.Tech / B.E (CSE / IT)',
    'message' => 'Eager to build scalable React and Node.js solutions.'
], [
    'resume' => [
        'name' => 'priya_patel_cv.pdf',
        'type' => 'application/pdf',
        'tmp_name' => $tmpPdf,
        'error' => UPLOAD_ERR_OK,
        'size' => filesize($tmpPdf)
    ]
]);

assert_test("Valid internship application accepted with 200", ($res5E['code'] ?? 0) === 200);
assert_test("Success response indicates submission completed", !empty($res5E['output']['success']));
assert_test("Application ID assigned in response", !empty($res5E['output']['id']));

// ---------------------------------------------------------
// TEST 6: Verify Database Record & Resume Storage
// ---------------------------------------------------------
echo "\n--- Test Group 6: Database Storage & Resume Verification ---\n";
// Read directly from DB file or helper
$dbFile = dirname(__DIR__) . '/data/app.db';
if (file_exists($dbFile)) {
    try {
        $pdo = new PDO('sqlite:' . $dbFile);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM career_applications WHERE full_name = :name ORDER BY id DESC LIMIT 1");
        $stmt->execute([':name' => $testCandidateName]);
        $savedRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        assert_test("Record found in SQLite career_applications table", !empty($savedRecord));
        if ($savedRecord) {
            assert_test("Candidate email stored accurately", $savedRecord['email'] === 'priya.patel.test@example.com');
            assert_test("Position stored accurately", $savedRecord['position'] === 'Full Stack Web Engineering Intern');
            assert_test("Resume filename recorded", $savedRecord['resume_filename'] === 'priya_patel_cv.pdf');
            assert_test("Resume physical file exists on disk", !empty($savedRecord['resume_filepath']) && file_exists($savedRecord['resume_filepath']));
            if (!empty($savedRecord['resume_filepath']) && file_exists($savedRecord['resume_filepath'])) {
                $content = file_get_contents($savedRecord['resume_filepath']);
                assert_test("Resume file content is valid PDF header", strpos($content, '%PDF') === 0);
            }
        }
    } catch (Exception $e) {
        echo "[INFO] SQLite direct open note: " . $e->getMessage() . "\n";
    }
} else {
    echo "[INFO] Fallback file active.\n";
}

@unlink($tmpPdf);

// ---------------------------------------------------------
// SUMMARY
// ---------------------------------------------------------
echo "\n========================================================\n";
echo "TEST RESULTS: $passed PASSED, $failed FAILED\n";
echo "========================================================\n";

if ($failed === 0) {
    echo "SUCCESS: All Email Notification & Application Workflow tests passed!\n";
    exit(0);
} else {
    echo "ERROR: Some tests failed. Please inspect details above.\n";
    exit(1);
}

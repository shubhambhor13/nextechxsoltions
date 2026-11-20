<?php
// NextTechX Solutions - Chatbot Assistant API
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';

$raw_input = file_get_contents('php://input');
$input = !empty($raw_input) ? json_decode($raw_input, true) : [];
$payload = array_merge($_POST, is_array($input) ? $input : []);
$message = strtolower(trim($payload['message'] ?? ''));

if (empty($message)) {
    echo json_encode(['reply' => "How can I assist you with NextTechX Solutions today?"]);
    exit;
}

// Smart contextual knowledge base responses
if (preg_match('/(internship|training|course|learn|student|batch|curriculum|syllabus|fee)/i', $message)) {
    $reply = "<p class='font-semibold text-slate-900'>🎓 NextTechX Technology Internship Academy</p>"
           . "<p>We provide hands-on, live-project corporate mentorship programs:</p>"
           . "<ul class='list-disc pl-4 space-y-1 mt-1 text-slate-700'>"
           . "<li><strong>AI & Machine Learning</strong>: Deep Learning, LLMs, Computer Vision & Edge AI</li>"
           . "<li><strong>Data Analytics & Power BI</strong>: SQL, DAX, Interactive Executive Dashboards</li>"
           . "<li><strong>Full Stack Web Development</strong>: React, Node.js, FastAPI & Cloud Infrastructure</li>"
           . "<li><strong>Python & Enterprise Systems</strong>: High-throughput backend systems & automation</li>"
           . "<li><strong>Cyber Security</strong>: SOC analysis, penetration testing & defensive protocols</li>"
           . "</ul>"
           . "<p class='text-xs text-slate-600 mt-2'>Direct HR / Student Inquiries: <a href='mailto:" . SITE_EMAIL_HR . "' class='text-emerald-600 font-semibold underline'>" . SITE_EMAIL_HR . "</a></p>"
           . "<div class='pt-2'><a href='/careers#opportunities' class='inline-block px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700 transition-colors'>View Opportunities</a></div>";
} elseif (preg_match('/(price|pricing|cost|budget|quote|estimate|how much|inr|rupee)/i', $message)) {
    $reply = "<p class='font-semibold text-slate-900'>💼 Transparent Quotations in Indian Rupees (₹)</p>"
           . "<p>At NextTechX Solutions, pricing is tailored precisely to your milestone scope:</p>"
           . "<ul class='list-disc pl-4 space-y-1 mt-1 text-slate-700'>"
           . "<li><strong>Custom Software & Web Apps</strong>: Starting from ₹50,000 for verified production MVPs</li>"
           . "<li><strong>AI & n8n Workflow Automation</strong>: Automated lead pipelines, WhatsApp bots, & IDP</li>"
           . "<li><strong>Research Paper Publication Advisory</strong>: Scopus, IEEE & Springer indexed guidance</li>"
           . "</ul>";
} elseif (preg_match('/(automation|n8n|chatbot|whatsapp|agent|document|ai)/i', $message)) {
    $reply = "<p class='font-semibold text-slate-900'>🤖 AI & Workflow Automation Solutions</p>"
           . "<p>We streamline operational friction using modern autonomous architectures:</p>"
           . "<ul class='list-disc pl-4 space-y-1 mt-1 text-slate-700'>"
           . "<li><strong>Custom Autonomous Agents</strong>: Multi-agent pipelines executing complex tasks</li>"
           . "<li><strong>n8n Enterprise Integration</strong>: Connect CRM, ERP, databases, and messaging channels</li>"
           . "<li><strong>Intelligent Document Processing (IDP)</strong>: High-accuracy OCR for invoices & KYC documents</li>"
           . "</ul>"
           . "<p class='mt-1 text-slate-600'>Would you like a technical architecture consultation?</p>";
} elseif (preg_match('/(research|paper|publish|scopus|ieee|springer|ugc|thesis)/i', $message)) {
    $reply = "<p class='font-semibold text-slate-900'>📚 Academic & Research Publication Advisory</p>"
           . "<p>We provide comprehensive advisory for faculty, PhD scholars, and postgraduate engineers:</p>"
           . "<ul class='list-disc pl-4 space-y-1 mt-1 text-slate-700'>"
           . "<li>Mathematical and experimental framework formulation</li>"
           . "<li>Turnitin plagiarism verification (&lt; 10%)</li>"
           . "<li>Peer-reviewed submission guidance for Scopus Q1/Q2, IEEE Xplore, and Springer Nature</li>"
           . "</ul>";
} elseif (preg_match('/(contact|phone|call|email|whatsapp|address|location)/i', $message)) {
    $reply = "<p class='font-semibold text-slate-900'>📞 Connect With NextTechX Solutions</p>"
           . "<ul class='space-y-1.5 mt-1 text-slate-700 text-xs'>"
           . "<li>💼 <strong>Client Proposals</strong>: <a href='mailto:" . SITE_EMAIL_CONTACT . "' class='text-blue-600 font-bold underline'>" . SITE_EMAIL_CONTACT . "</a></li>"
           . "<li>🎓 <strong>HR & Careers Desk</strong>: <a href='mailto:" . SITE_EMAIL_HR . "' class='text-purple-600 font-bold underline'>" . SITE_EMAIL_HR . "</a></li>"
           . "<li>📱 <strong>WhatsApp Hotline</strong>: +91 93098 35085</li>"
           . "<li>🌐 <strong>Delivery Model</strong>: Online-First Global Remote Delivery</li>"
           . "</ul>"
           . "<div class='pt-2'><a href='" . SITE_WHATSAPP_URL . "' target='_blank' class='inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700 transition-colors'>Open WhatsApp Chat</a></div>";
} else {
    $reply = "<p>I'd be delighted to assist you with <strong>NextTechX Solutions</strong>!</p>"
           . "<p>Would you like to explore our <strong>Custom Software Development</strong>, deploy <strong>AI & n8n Workflow Automation</strong>, explore <strong>Engineering Careers & Internships</strong>, or get a <strong>Fast Price Quotation in INR (₹)</strong>?</p>";
}

echo json_encode(['reply' => $reply]);

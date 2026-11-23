<?php
// NexTechX Solutions - Intelligent AI Assistant API
// Supports real AI (Google Gemini / OpenAI) with secure server-side integration
// and an intelligent centralized corporate knowledge engine for 100% reliable responses.

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

if (empty($_SERVER['REQUEST_METHOD'])) {
    // When included via CLI test or script, do not execute HTTP handler
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/ai_keys.php';
require_once __DIR__ . '/../includes/knowledge_base.php';

$raw_input = file_get_contents('php://input');
$input = !empty($raw_input) ? json_decode($raw_input, true) : [];
$payload = array_merge($_POST, is_array($input) ? $input : []);

$message = trim($payload['message'] ?? '');
$session_id = trim($payload['session_id'] ?? 'guest_' . bin2hex(random_bytes(4)));
$history = is_array($payload['history'] ?? null) ? $payload['history'] : [];

if (empty($message)) {
    echo json_encode([
        'status' => 'success',
        'reply' => "Hello! 👋 I'm your **NexTechX AI Assistant**. How can I help power your enterprise solutions, AI automation, or internship journey today?",
        'suggested_actions' => [
            "Explore AI Automation",
            "View Internship Opportunities",
            "Request Enterprise Quote",
            "Contact Our Architects"
        ],
        'source' => 'system'
    ]);
    exit;
}

// Log message to SQLite chat_logs if available
try {
    $db = get_db();
    if ($db) {
        $db->exec("CREATE TABLE IF NOT EXISTS chat_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            session_id TEXT NOT NULL,
            role TEXT NOT NULL,
            content TEXT NOT NULL,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        )");
        $stmt = $db->prepare("INSERT INTO chat_logs (session_id, role, content) VALUES (?, 'user', ?)");
        $stmt->execute([$session_id, $message]);
    }
} catch (Exception $e) {
    // Non-blocking log failure
}

$kb = get_company_knowledge_base();

// -------------------------------------------------------------
// 1. ATTEMPT REAL AI API CALL (Gemini or OpenAI) IF KEY CONFIGURED
// -------------------------------------------------------------
$ai_reply = null;
$source = 'knowledge_base';

// 1A. Google Gemini API
if (!empty(GEMINI_API_KEY)) {
    $ai_reply = call_gemini_api(GEMINI_API_KEY, $message, $history, $kb);
    if (!empty($ai_reply)) {
        $source = 'gemini';
    }
}

// 1B. OpenAI API (if Gemini not configured or failed)
if (empty($ai_reply) && !empty(OPENAI_API_KEY)) {
    $ai_reply = call_openai_api(OPENAI_API_KEY, $message, $history, $kb);
    if (!empty($ai_reply)) {
        $source = 'openai';
    }
}

// -------------------------------------------------------------
// 2. INTELLIGENT KNOWLEDGE BASE & NLP ENGINE (Fallback / Direct)
// -------------------------------------------------------------
if (empty($ai_reply)) {
    $result = generate_intelligent_response($message, $history, $kb);
    $ai_reply = $result['reply'];
    $suggested_actions = $result['suggested_actions'];
} else {
    // Generate contextual action chips for AI response
    $suggested_actions = derive_action_chips($message, $ai_reply);
}

// Log assistant reply
try {
    if (isset($db) && $db) {
        $stmt = $db->prepare("INSERT INTO chat_logs (session_id, role, content) VALUES (?, 'assistant', ?)");
        $stmt->execute([$session_id, $ai_reply]);
    }
} catch (Exception $e) {}

echo json_encode([
    'status' => 'success',
    'reply' => $ai_reply,
    'suggested_actions' => $suggested_actions,
    'source' => $source
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
exit;

// =============================================================
// HELPER FUNCTIONS
// =============================================================

/**
 * Call Google Gemini API with system instructions and chat history
 */
function call_gemini_api($api_key, $message, $history, $kb) {
    $system_prompt = build_system_prompt($kb);
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . urlencode($api_key);

    $contents = [];
    
    // Add up to 6 recent history turns for context
    $recent_history = array_slice($history, -6);
    foreach ($recent_history as $h) {
        $role = ($h['role'] === 'user') ? 'user' : 'model';
        $text = trim($h['content'] ?? '');
        if (!empty($text)) {
            $contents[] = [
                'role' => $role,
                'parts' => [['text' => $text]]
            ];
        }
    }

    // Add current message
    $contents[] = [
        'role' => 'user',
        'parts' => [['text' => $message]]
    ];

    $payload = [
        'system_instruction' => [
            'parts' => [['text' => $system_prompt]]
        ],
        'contents' => $contents,
        'generationConfig' => [
            'temperature' => 0.5,
            'maxOutputTokens' => 800,
            'topP' => 0.95
        ]
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_TIMEOUT => 12,
        CURLOPT_CONNECTTIMEOUT => 6,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 200 && $response) {
        $json = json_decode($response, true);
        $reply = $json['candidates'][0]['content']['parts'][0]['text'] ?? null;
        if (!empty($reply)) {
            return trim($reply);
        }
    }
    return null;
}

/**
 * Call OpenAI Chat Completions API
 */
function call_openai_api($api_key, $message, $history, $kb) {
    $system_prompt = build_system_prompt($kb);
    $url = "https://api.openai.com/v1/chat/completions";

    $messages = [
        ['role' => 'system', 'content' => $system_prompt]
    ];

    $recent_history = array_slice($history, -6);
    foreach ($recent_history as $h) {
        $role = ($h['role'] === 'user') ? 'user' : 'assistant';
        $text = trim($h['content'] ?? '');
        if (!empty($text)) {
            $messages[] = ['role' => $role, 'content' => $text];
        }
    }

    $messages[] = ['role' => 'user', 'content' => $message];

    $payload = [
        'model' => 'gpt-4o-mini',
        'messages' => $messages,
        'temperature' => 0.5,
        'max_tokens' => 800
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        ],
        CURLOPT_TIMEOUT => 12,
        CURLOPT_CONNECTTIMEOUT => 6,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 200 && $response) {
        $json = json_decode($response, true);
        $reply = $json['choices'][0]['message']['content'] ?? null;
        if (!empty($reply)) {
            return trim($reply);
        }
    }
    return null;
}

/**
 * Build System Instructions using Centralized Knowledge Base
 */
function build_system_prompt($kb) {
    $co = $kb['company'];
    $ct = $kb['contact'];
    $careers = $kb['careers_and_internships'];
    
    return "You are the official AI Assistant for {$co['name']} ({$co['tagline']}).
Your role is to guide visitors, clients, and students by providing accurate, helpful, and natural answers about the company, its services, internships, and technology.

CRITICAL RULES:
1. COMPANY SCOPE: Answer questions using the verified company knowledge provided below. Never invent services, prices, team members, or claims.
2. INTERNSHIPS ONLY: Currently, NexTechX Solutions offers INTERNSHIP OPPORTUNITIES ONLY. Do not claim there are job vacancies. If asked about jobs or hiring, politely explain that currently only internship opportunities are available.
3. HR CONTACT: For HR and internship queries, always state the official email: {$ct['hr_email']}.
4. CLIENT CONTACT: For client proposals and services, state: {$ct['client_email']} and WhatsApp: {$ct['phone']}.
5. MULTILINGUAL: Understand English, Hindi, and Marathi naturally. If a user asks in Marathi or Hindi, reply respectfully in that language or simple English as appropriate.
6. NAVIGATION LINKS: When mentioning pages, provide markdown links:
   - Careers & Internships: [Careers & Internships](/careers)
   - AI Automation: [AI Automation Solutions](/ai-automation)
   - IT Services: [IT & Software Solutions](/it-services)
   - Research Publication: [Research Publication](/research-publication)
   - Contact Us: [Contact Us](#contact)
7. GENERAL TECH: You are knowledgeable in technology (AI, ML, React, Python, n8n, Cloud, Docker, Kubernetes, etc.). Explain concepts clearly and connect them to how NexTechX Solutions implements them.
8. HONESTY: If specific requested info (e.g., exact custom price for a complex private project) is not public, say so clearly and direct the visitor to request a quotation or contact the team.

COMPANY INFORMATION:
- Name: {$co['name']}
- Overview: {$co['overview']}
- Delivery Model: {$co['delivery_model']}
- SLA: {$co['sla_and_metrics']['uptime']}, {$co['sla_and_metrics']['ai_response']}, {$co['sla_and_metrics']['security']}
- Core Services:
  1. AI Automation Solutions: AI chatbots with RAG, WhatsApp automation, n8n orchestrations, Autonomous multi-agent pipelines, CRM/ERP pipelines, IDP document processing.
  2. IT & Software Solutions: Enterprise Web Apps (React/Next.js), Custom Backend Software (Python FastAPI, Java Spring Boot), Mobile Apps (React Native/Flutter), Cloud DevOps (Docker/Kubernetes/AWS), Data Analytics, Executive BI Dashboards (Power BI), 24/7 BPO & Tech Support.
  3. Research Paper Publication Advisory: Topic selection, research guidance, literature review, manuscript writing, paper revision, formatting (IEEE/Springer/Elsevier), journal selection (Scopus/UGC-CARE), Turnitin <10% plagiarism check.
  4. Technology Internships: Hands-on live corporate projects in AI/ML, Full Stack Web, Data Analytics, Python Automation, Java Microservices, Cyber Security.

TONE: Professional, welcoming, concise, structured with bullet points where helpful.";
}

/**
 * Intelligent Multi-Intent Knowledge & NLP Engine
 * Used when no external API key is present or when API fails/times out.
 */
function generate_intelligent_response($message, $history, $kb) {
    $text = mb_strtolower(trim($message), 'UTF-8');
    $co = $kb['company'];
    $ct = $kb['contact'];
    $careers = $kb['careers_and_internships'];
    
    // Check previous message context from history
    $prev_context = '';
    if (!empty($history)) {
        $last_turn = end($history);
        $prev_context = mb_strtolower($last_turn['content'] ?? '', 'UTF-8');
    }

    // ---------------------------------------------------------
    // A. SPECIFIC TECHNOLOGY EXPLAINERS (RAG, n8n, ML, etc.)
    // ---------------------------------------------------------
    if (preg_match('/\b(what is rag|explain rag|how rag works|what does rag mean)\b/i', $text) ||
        (preg_match('/\b(what is|explain)\b/i', $text) && preg_match('/\brag\b/i', $text))) {
        $reply = "💡 **What is RAG (Retrieval-Augmented Generation)?**\n\n"
               . "RAG is an advanced AI architecture that connects Large Language Models (like Gemini or GPT) to private, verified corporate data repositories.\n\n"
               . "Instead of relying solely on public web knowledge, a RAG system first performs a vector similarity search across your proprietary company documents, SOPs, and product manuals (using vector databases like Pinecone or pgvector) and injects that verified context directly into the AI prompt.\n\n"
               . "**Key Business Advantages**:\n"
               . "• **Zero Hallucinations**: Responses are strictly grounded in your company's actual data.\n"
               . "• **100% Data Privacy**: Private corporate data is never used to train public foundation models.\n"
               . "• **Dynamic Updates**: Knowledge updates instantly when you add new documents without costly model retraining.\n\n"
               . "👉 Learn how NexTechX Solutions deploys custom RAG assistants on our [AI Automation Solutions](/ai-automation) page, or [Contact Us](#contact) for an architecture blueprint.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore AI Automation", "Request Quotation", "View Services"]
        ];
    }

    if (preg_match('/\b(what is n8n|explain n8n|how n8n works|why n8n)\b/i', $text) ||
        (preg_match('/\b(what is|explain)\b/i', $text) && preg_match('/\bn8n\b/i', $text))) {
        $reply = "💡 **What is n8n?**\n\n"
               . "n8n is an enterprise-grade workflow automation platform that connects your business software, databases, CRMs, and messaging channels through visual node-based execution and custom scripts.\n\n"
               . "Unlike cloud-only automation services like Zapier, n8n can be **self-hosted on your own private cloud/servers**, guaranteeing total data confidentiality with zero third-party data retention.\n\n"
               . "**How NexTechX Solutions Leverages n8n**:\n"
               . "• Connecting CRM (HubSpot/Salesforce) with ERP and payment databases in real-time.\n"
               . "• Automated WhatsApp notification dispatches and invoice generation.\n"
               . "• Multi-step data validation and webhook trigger pipelines.\n\n"
               . "👉 Explore our automation capabilities on the [AI Automation Solutions](/ai-automation) page!";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore AI Automation", "Request Quotation", "Contact Us"]
        ];
    }

    // ---------------------------------------------------------
    // B. HINDI / HINGLISH LANGUAGE QUERIES
    // ---------------------------------------------------------
    if (preg_match('/(नमस्ते|कैसे|करें|नौकरी|सेवाएं|संपर्क|कॉल|व्हाट्सएप|बारे में|बताएं|चाहिए|दीजिए)/u', $text) ||
        preg_match('/(kaise|kya hai|kare|sampark|batao|chahiye|jankari|naukri)/i', $text)) {
        if (preg_match('/(internship|training|apply|apply kare|seekhna|student|batch)/i', $text) || preg_match('/(इंटर्नशिप|विद्यार्थी)/u', $text)) {
            $reply = "नमस्ते! 🙏 **NexTechX Solutions** में वर्तमान में विशेष रूप से **इंटर्नशिप के अवसर** उपलब्ध हैं:\n\n"
                   . "• **AI & Machine Learning Research Intern**\n"
                   . "• **Full Stack Web Engineering Intern** (React, FastAPI, Node.js)\n"
                   . "• **Data Analytics & Power BI Intern**\n"
                   . "• **Python Automation & Workflow Intern**\n"
                   . "• **Java Enterprise Microservices Intern**\n"
                   . "• **Cyber Security & SOC Defense Intern**\n\n"
                   . "📝 **आवेदन कैसे करें?**\n"
                   . "आप हमारे [Careers & Internships](/careers) पेज पर जाकर आवेदन फॉर्म भर सकते हैं और अपना Resume (CV) अपलोड कर सकते हैं।\n\n"
                   . "📧 HR ईमेल: **hr@nextechxsolutions.com**";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Apply for Internship", "All Services", "Contact Us"]
            ];
        } elseif (preg_match('/(job|jobs|vacancy|naukri|experienced)/i', $text) || preg_match('/(नौकरी)/u', $text)) {
            $reply = "वर्तमान में **NexTechX Solutions** में केवल **इंटर्नशिप अवसर (Internships)** उपलब्ध हैं। इस समय अनुभवी पदों के लिए कोई जॉब वैकेंसी उपलब्ध नहीं है।\n\n"
                   . "*\"Currently, we are offering internship opportunities. Stay connected for future updates.\"*\n\n"
                   . "यदि आप छात्र या नए ग्रेजुएट हैं और व्यावहारिक प्रोजेक्ट्स पर काम करना चाहते हैं, तो कृपया [Careers & Internships](/careers) पेज देखें या **hr@nextechxsolutions.com** पर संपर्क करें।";
            return [
                'reply' => $reply,
                'suggested_actions' => ["View Internships", "Explore Services", "Contact HR"]
            ];
        } elseif (preg_match('/(contact|sampark|call|email|whatsapp)/i', $text) || preg_match('/(संपर्क|कॉल)/u', $text)) {
            $reply = "नमस्ते! 🙏 आप **NexTechX Solutions** से निम्नलिखित माध्यमों से संपर्क कर सकते हैं:\n\n"
                   . "• 💼 क्लाइंट प्रस्ताव व पूछताछ: **contact@nextechxsolutions.com**\n"
                   . "• 🎓 HR व इंटर्नशिप पूछताछ: **hr@nextechxsolutions.com**\n"
                   . "• 📱 फोन / व्हाट्सएप: **+91 93098 35085**\n"
                   . "• 💬 [WhatsApp पर चैट करें](https://wa.me/919309835085)\n"
                   . "• 📝 वेबसाइट संपर्क फॉर्म: [Contact Us](#contact)";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Request Quotation", "Schedule Free Call", "Explore Services"]
            ];
        } else {
            $reply = "नमस्ते! 👋 मैं **NexTechX Solutions AI Assistant** हूँ।\n\n"
                   . "हम मुख्य रूप से निम्नलिखित सेवाएं प्रदान करते हैं:\n"
                   . "1. **[AI Automation Solutions](/ai-automation)**: स्मार्ट AI चैटबॉट्स, n8n ऑटोमेशन और डॉक्यूमेंट प्रोसेसिंग।\n"
                   . "2. **[IT & Software Solutions](/it-services)**: वेब व मोबाइल ऐप्स, क्लाउड सिस्टम्स और बैकएंड डेवलपमेंट।\n"
                   . "3. **[Research Paper Publication](/research-publication)**: IEEE, Scopus और Springer पब्लिकेशन में तकनीकी सहायता।\n"
                   . "4. **[Internship Programs](/careers)**: छात्रों के लिए लाइव प्रोजेक्ट्स पर आधारित कॉर्पोरेट इंटर्नशिप।\n\n"
                   . "📞 **संपर्क विवरण**:\n"
                   . "• ईमेल: **contact@nextechxsolutions.com**\n"
                   . "• व्हाट्सएप: **+91 93098 35085**";
            return [
                'reply' => $reply,
                'suggested_actions' => ["AI Automation", "Software Engineering", "Internships", "Contact Us"]
            ];
        }
    }

    // ---------------------------------------------------------
    // C. MARATHI LANGUAGE QUERIES
    // ---------------------------------------------------------
    if (preg_match('/(माहिती|नमस्कार|कसे|करावे|द्या|प्रकल्प|अर्ज|पत्ता|सांगा|काय|कोणत्या|आहेत|उपलब्ध|कंपनीमध्ये|तुमच्या|आम्हाला)/u', $text)) {
        if (preg_match('/(इंटर्नशिप|शिकणे|विद्यार्थी|करिअर|अर्ज)/u', $text)) {
            $reply = "नमस्कार! 🙏 **NexTechX Solutions** मध्ये सध्या खालील तंत्रज्ञान क्षेत्रांत **इंटर्नशिपच्या संधी** उपलब्ध आहेत:\n\n"
                   . "• **AI & Machine Learning Research Intern**\n"
                   . "• **Full Stack Web Engineering Intern** (React, FastAPI, Node.js)\n"
                   . "• **Data Analytics & Power BI Intern**\n"
                   . "• **Python Automation & Workflow Intern**\n"
                   . "• **Java Enterprise Microservices Intern**\n"
                   . "• **Cyber Security & SOC Defense Intern**\n\n"
                   . "✨ **अर्ज कसा करावा?**\n"
                   . "तुम्ही थेट आमच्या [Careers & Internships](/careers) पेजवर जाऊन ऑनलाइन अर्ज करू शकता आणि तुमचा Resume अपलोड करू शकता.\n\n"
                   . "📧 थेट HR संपर्क: **hr@nextechxsolutions.com**";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Apply for Internship", "View All Services", "Contact Us"]
            ];
        } elseif (preg_match('/(सेवा|काम|सर्व्हिसेस|प्रकल्प)/u', $text)) {
            $reply = "NexTechX Solutions द्वारे खालील प्रमुख सेवा पुरविल्या जातात:\n\n"
                   . "1. **[AI Automation Solutions](/ai-automation)**: स्मार्ट AI चॅटबॉट्स, व्हॉट्सअॅप ऑटोमेशन, n8n वर्कफ्लो आणि डॉक्युमेंट प्रोसेसिंग.\n"
                   . "2. **[IT & Software Solutions](/it-services)**: वेब ॲप्स (React/Next.js), कस्टम सॉफ्टवेअर, मोबाईल ॲप्स आणि क्लाउड इन्फ्रास्ट्रक्चर.\n"
                   . "3. **[Research Publication](/research-publication)**: IEEE, Scopus आणि Springer जर्नल्ससाठी संशोधन पेपर मार्गदर्शन व पब्लिकेशन सल्ला.\n"
                   . "4. **[Internship Programs](/careers)**: विद्यार्थ्यांना प्रत्यक्ष कॉर्पोरेट प्रकल्पांवर आधारित इंटर्नशिप प्रशिक्षण.\n\n"
                   . "अधिक माहितीसाठी किंवा प्रोजेक्ट कोटेशनसाठी तुम्ही [Contact Us](#contact) द्वारे संपर्क साधू शकता.";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Explore AI Services", "Request Quotation", "View Internships"]
            ];
        } else {
            $reply = "नमस्कार! 🙏 मी **NexTechX Solutions AI Assistant** आहे.\n\n"
                   . "आम्ही AI ऑटोमेशन, कस्टम सॉफ्टवेअर डेव्हलपमेंट, रिसर्च पब्लिकेशन सल्ला आणि विद्यार्थी इंटर्नशिप प्रदान करतो.\n\n"
                   . "तुम्हाला कोणत्या विषयाबद्दल अधिक माहिती हवी आहे?\n"
                   . "• ईमेल: **contact@nextechxsolutions.com**\n"
                   . "• व्हॉट्सअॅप: **+91 93098 35085**";
            return [
                'reply' => $reply,
                'suggested_actions' => ["AI Automation", "Software Solutions", "Internships", "Contact Details"]
            ];
        }
    }

    // ---------------------------------------------------------
    // C. JOB VACANCIES VS INTERNSHIP POLICY CHECK (Strict Rule)
    // ---------------------------------------------------------
    if (preg_match('/(job vacancy|job vacancies|job openings|jobs available|full-time job|experienced job|hiring for job|current openings|career openings)/i', $text) && 
        !preg_match('/(intern|internship)/i', $text)) {
        $reply = "Currently, **NexTechX Solutions** is offering **internship opportunities only**. We do not have open experienced job vacancies at this time.\n\n"
               . "*\"Currently, we are offering internship opportunities. Stay connected for future updates.\"*\n\n"
               . "If you are a student, recent graduate, or aspiring engineer seeking hands-on industry experience, you can explore our available internship tracks on the [Careers & Internships](/careers) page.\n\n"
               . "For any talent inquiries, you may reach our HR desk at [hr@nextechxsolutions.com](mailto:hr@nextechxsolutions.com).";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore Internship Roles", "Contact HR", "View Services"]
        ];
    }

    // ---------------------------------------------------------
    // D. INTERNSHIPS & APPLICATION PROCESS
    // ---------------------------------------------------------
    if (preg_match('/(intern|internship|training|course|learn|apply.*intern|how to apply|eligibility|stipend|mentor|certificate)/i', $text)) {
        $reply = "🎓 **NexTechX Solutions Technology Internship Program**\n\n"
               . "We provide immersive, project-driven corporate internships designed to transition students into industry-ready software engineers.\n\n"
               . "**Available Internship Tracks**:\n"
               . "1. **AI & Machine Learning Research Intern**: PyTorch, YOLO, Computer Vision & RAG Agents.\n"
               . "2. **Full Stack Web Engineering Intern**: React 18, Tailwind CSS, FastAPI, PostgreSQL, Docker & AWS.\n"
               . "3. **Data Analytics & Power BI Intern**: Advanced SQL, DAX, Python Pandas & Executive Dashboards.\n"
               . "4. **Python Automation & Workflow Intern**: High-concurrency FastAPI, Redis, Selenium & Webhooks.\n"
               . "5. **Java Enterprise Microservices Intern**: Java 21, Spring Boot 3, Microservices & Docker.\n"
               . "6. **Cyber Security & SOC Defense Intern**: Kali Linux, Burp Suite, OWASP Top 10 & Threat Analysis.\n\n"
               . "📋 **How to Apply**:\n"
               . "1. Visit the [Careers & Internships](/careers) page.\n"
               . "2. Choose your preferred track and scroll to the application form.\n"
               . "3. Fill in your details and upload your Resume (PDF or DOCX, max 5MB).\n"
               . "4. Submit the form, or email your resume directly to [hr@nextechxsolutions.com](mailto:hr@nextechxsolutions.com).\n\n"
               . "✨ *All interns receive direct 1-on-1 mentorship, live corporate project deployments, and verified completion certificates.*";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Apply for Internship", "Contact HR Desk", "View IT Services"]
        ];
    }

    // ---------------------------------------------------------
    // E. AI AUTOMATION SOLUTIONS
    // ---------------------------------------------------------
    if (preg_match('/(ai automation|what is ai automation|chatbot|whatsapp bot|n8n|autonomous agent|rag|document processing|idp|vector|ocr)/i', $text)) {
        $reply = "🤖 **AI Automation Solutions at NexTechX Solutions**\n\n"
               . "AI Automation combines artificial intelligence, machine learning, and autonomous workflows to eliminate repetitive operational bottlenecks and empower teams with instant intelligence.\n\n"
               . "**Our Core Capabilities**:\n"
               . "• **Custom AI Chatbots & RAG Agents**: Enterprise generative AI trained securely on your company's proprietary documents, FAQs, and product catalogs with zero hallucination protocols and hybrid vector search.\n"
               . "• **WhatsApp Business Automation**: Official Meta Cloud API integration for 24/7 autonomous sales, lead qualification, order tracking, and dynamic menu routing.\n"
               . "• **n8n Enterprise Orchestration**: Distributed, self-hosted workflows connecting CRMs, ERPs, databases, and third-party APIs with complete data privacy.\n"
               . "• **Autonomous Multi-Step AI Agents**: Goal-driven agents executing complex multi-system workflows using ReAct reasoning and safe execution sandboxes.\n"
               . "• **Intelligent Document Processing (IDP)**: 99.4% accurate OCR extraction from invoices, contracts, receipts, and handwritten forms directly into your accounting or ERP database.\n\n"
               . "👉 Explore our full architecture and interactive ROI calculator on the [AI Automation Solutions](/ai-automation) page, or [Contact Us](#contact) for a technical architecture consultation.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore AI Automation", "Request Quotation", "Schedule Consultation"]
        ];
    }

    // ---------------------------------------------------------
    // F. IT & SOFTWARE SOLUTIONS (WEB, MOBILE, CLOUD, DATA, BPO)
    // ---------------------------------------------------------
    if (preg_match('/(it services|software|web development|mobile app|cloud|devops|react|fastapi|spring boot|docker|kubernetes|bpo|bi dashboard|data analytics)/i', $text)) {
        $reply = "💻 **Enterprise IT & Software Engineering Solutions**\n\n"
               . "NexTechX Solutions architects production-grade software engineered for performance, security, and enterprise scale:\n\n"
               . "• **Enterprise Web Applications**: Engineered with React 18, Next.js, and Tailwind CSS for sub-second Core Web Vitals and multi-tenant SaaS architectures.\n"
               . "• **Custom Backend Software**: High-throughput microservices in Python FastAPI and Java Spring Boot featuring Apache Kafka event streams and 99%+ test coverage.\n"
               . "• **Cross-Platform Mobile Apps**: Native-performance iOS & Android mobile applications built using React Native and Flutter with offline-first synchronization.\n"
               . "• **Cloud Infrastructure & DevOps**: Automated CI/CD pipelines, Docker containerization, Kubernetes (EKS/GKE) orchestration, and Terraform IaC on AWS, GCP, and Azure.\n"
               . "• **Data Analytics & BI Dashboards**: High-volume ETL data pipelines and interactive executive Power BI dashboards with advanced DAX calculations.\n"
               . "• **24/7 BPO & Dedicated Tech Helpdesk**: Offshore engineering pods with guaranteed 15-minute response SLAs.\n\n"
               . "👉 Learn more on our [IT & Software Solutions](/it-services) page or request a customized project quote.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["View IT Services", "Request Quotation", "Book Consultation"]
        ];
    }

    // ---------------------------------------------------------
    // G. RESEARCH PAPER PUBLICATION ADVISORY
    // ---------------------------------------------------------
    if (preg_match('/(research|paper|publish|scopus|ieee|springer|ugc|turnitin|plagiarism|journal|conference|thesis)/i', $text)) {
        $reply = "📚 **Research Paper Writing & Publication Advisory**\n\n"
               . "NexTechX Solutions provides end-to-end academic advisory for engineering students, faculty members, and PhD scholars:\n\n"
               . "**Our 8-Step Advisory Services**:\n"
               . "1. **Novel Topic Selection**: Identifying high-impact research areas across AI/ML, Cloud, IoT, and Cyber Security.\n"
               . "2. **Theoretical & Mathematical Guidance**: Formulating problem statements, simulation models, and baseline comparisons.\n"
               . "3. **PRISMA Literature Surveys**: In-depth analysis of 2022–2026 indexed literature.\n"
               . "4. **Manuscript Drafting**: Writing standard IMRaD structured academic papers.\n"
               . "5. **Peer Review Defense & Rebuttal**: Answering reviewer comments and revising manuscripts.\n"
               . "6. **Template Formatting**: Exact adherence to IEEE, Springer (LNCS), Elsevier, Nature, ACM, and UGC Care guidelines with BibTeX citations.\n"
               . "7. **Journal Matchmaking**: Targeted submission to genuine Scopus (Q1–Q4), Web of Science, and UGC-CARE approved journals (screening out predatory publishers).\n"
               . "8. **Turnitin Plagiarism Verification**: Guaranteeing a similarity index strictly below 10%.\n\n"
               . "👉 Read full guidelines on our [Research Publication](/research-publication) page or get in touch for an advisory consultation.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Publish Research Paper", "Request Quotation", "Schedule Free Call"]
        ];
    }

    // ---------------------------------------------------------
    // H. CONTACT DETAILS & CONSULTATION
    // ---------------------------------------------------------
    if (preg_match('/(contact|phone|call|email|whatsapp|address|location|reach|office|consultation|talk to)/i', $text)) {
        $reply = "📞 **Connect With NexTechX Solutions**\n\n"
               . "We operate an **Online-First Global Remote Delivery Model**, serving clients and partners worldwide with 24/7 responsiveness:\n\n"
               . "• 💼 **Client Inquiries & Project Proposals**: [contact@nextechxsolutions.com](mailto:contact@nextechxsolutions.com)\n"
               . "• 🎓 **HR Desk & Student Internships**: [hr@nextechxsolutions.com](mailto:hr@nextechxsolutions.com)\n"
               . "• 📱 **Phone / WhatsApp Hotline**: [+91 93098 35085](tel:+919309835085)\n"
               . "• 💬 **WhatsApp Direct Chat**: [Start WhatsApp Chat](https://wa.me/919309835085)\n"
               . "• 📝 **Website Contact Form**: [Contact Us Form](#contact)\n\n"
               . "Would you like to schedule a free 30-minute technical architecture consultation or request a customized project quote?";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Request Quotation", "Schedule Free Call", "Explore Services"]
        ];
    }

    // ---------------------------------------------------------
    // I. PRICING & QUOTATION
    // ---------------------------------------------------------
    if (preg_match('/(price|pricing|cost|quote|quotation|estimate|budget|how much|charges|rate|inr|rupee)/i', $text)) {
        $reply = "💼 **Transparent Milestone-Based Pricing in INR (₹) & USD**\n\n"
               . "At NexTechX Solutions, all quotations are transparently scoped to your milestone requirements with zero hidden fees:\n\n"
               . "• **Custom Software & Web/Mobile MVPs**: Tailored packages starting from ₹50,000 for verified production builds.\n"
               . "• **AI Chatbots & n8n Workflow Automation**: Scoped based on vector store requirements, integration endpoints, and bot channels.\n"
               . "• **Research Paper Advisory**: Scaled according to manuscript depth, mathematical modeling, and target journal index (Scopus Q1/Q2/IEEE).\n"
               . "• **Technology Internships**: Hands-on mentorship tracks with live project deployments.\n\n"
               . "👉 You can submit a project quotation request directly using our **Request a Quote** modal, or email [contact@nextechxsolutions.com](mailto:contact@nextechxsolutions.com) with your project scope.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Request Quotation", "Book Consultation", "Explore Services"]
        ];
    }

    // ---------------------------------------------------------
    // J. ABOUT US / COMPANY BACKGROUND
    // ---------------------------------------------------------
    if (preg_match('/(about us|who are you|about nextechx|company background|who is nextech|what is nextechx)/i', $text)) {
        $reply = "🏢 **About NexTechX Solutions**\n\n"
               . "NexTechX Solutions (*\"Your Vision Our Technology\"*) is an enterprise IT solutions and artificial intelligence company. We build custom AI assistants, automated business workflows, and mission-critical cloud software platforms worldwide.\n\n"
               . "**Our Core Delivery Pillars**:\n"
               . "• **99.9% Uptime Reliability SLA**: Enterprise cloud architectures with zero-downtime CI/CD.\n"
               . "• **100% Signed NDAs & Zero-Trust**: Complete IP ownership and data protection for all clients.\n"
               . "• **Sub-Second AI Response**: High-throughput vector search and optimized inference pipelines.\n"
               . "• **24/7 Dedicated Helpdesk**: 15-minute response SLA on mission-critical support incidents.\n\n"
               . "👉 Discover more on our [About Us](/about) page or connect with our engineering team.";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore Services", "View Portfolio", "Contact Us"]
        ];
    }

    // ---------------------------------------------------------
    // K. PORTFOLIO & CASE STUDIES
    // ---------------------------------------------------------
    if (preg_match('/(portfolio|case study|projects|past work|clients|track record)/i', $text)) {
        $reply = "🏆 **Proven Enterprise Case Studies & Track Record**\n\n"
               . "Here are a few flagship production platforms engineered by NexTechX Solutions:\n\n"
               . "• **Multi-Tenant Healthcare Cloud Portal**: HIPAA-compliant EHR synchronization, telehealth video consultations, and automated clinical workflows.\n"
               . "• **AI Autonomous Support Agent**: RAG-powered customer agent integrated with Zendesk & WhatsApp, reducing support ticket volume by 68%.\n"
               . "• **FinTech High-Throughput Settlement Engine**: Microservices architecture processing high-volume transactions with automated ledger reconciliation.\n"
               . "• **Logistics & Fleet Telemetry System**: Real-time GPS tracking and automated dispatch optimization.\n"
               . "• **Real Estate Automated CRM Pipeline**: WhatsApp and HubSpot integration with automatic lead qualification.\n\n"
               . "👉 Explore our full case studies on the [Portfolio](/portfolio) page!";
        return [
            'reply' => $reply,
            'suggested_actions' => ["View Portfolio", "Request Quotation", "Contact Us"]
        ];
    }

    // ---------------------------------------------------------
    // L. HOW WE WORK / AGILE LIFECYCLE
    // ---------------------------------------------------------
    if (preg_match('/(how we work|how do you work|process|lifecycle|agile|methodology|steps)/i', $text)) {
        $reply = "⚙️ **Our 5-Stage Agile Engineering Lifecycle**\n\n"
               . "1. **Discovery & Architecture Blueprint**: Feasibility analysis, technical requirements specification, and sprint milestones.\n"
               . "2. **UI/UX Design & Prototyping**: Interactive Figma wireframes, design systems, and responsive prototypes.\n"
               . "3. **Agile Sprint Engineering**: Bi-weekly milestone demos, clean code practices, and automated testing.\n"
               . "4. **QA, Security & Performance Hardening**: Automated test suites, penetration testing, and signed NDA protection.\n"
               . "5. **Deployment & 24/7 SLA Support**: Zero-downtime release, user training, and continuous Datadog telemetry.\n\n"
               . "👉 Read more details on our [How We Work](/how-we-work) page!";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Explore Services", "Schedule Free Call", "Contact Us"]
        ];
    }

    // ---------------------------------------------------------
    // M. GENERAL TECHNOLOGY QUESTIONS (AI, RAG, React, FastAPI, etc.)
    // ---------------------------------------------------------
    if (preg_match('/(what is|explain|difference between|how does|definition of)/i', $text)) {
        if (preg_match('/(rag|retrieval augmented)/i', $text)) {
            $reply = "💡 **What is RAG (Retrieval-Augmented Generation)?**\n\n"
                   . "RAG is an AI framework that connects a Large Language Model (like GPT or Gemini) to external corporate knowledge bases and private documents.\n\n"
                   . "Instead of relying solely on general public training data, a RAG system first searches your company's proprietary documents using **Vector Databases** (such as Pinecone or pgvector) and feeds the exact factual context into the model.\n\n"
                   . "**Why NexTechX Solutions implements RAG**:\n"
                   . "• **Zero Hallucinations**: Responses are strictly grounded in your verified company data.\n"
                   . "• **Data Privacy**: Your proprietary information is not used to train public models.\n"
                   . "• **Instant Updates**: Simply update your documents without expensive model retraining.\n\n"
                   . "Learn how we build custom RAG bots on our [AI Automation Solutions](/ai-automation) page!";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Explore AI Automation", "Request Quotation", "View Services"]
            ];
        }
        if (preg_match('/(machine learning|deep learning)/i', $text)) {
            $reply = "💡 **What is Machine Learning?**\n\n"
                   . "Machine Learning (ML) is a branch of artificial intelligence where algorithms learn patterns and make predictions from data without being explicitly programmed.\n\n"
                   . "At **NexTechX Solutions**, we build production ML solutions including:\n"
                   . "• Predictive analytics (customer churn, sales forecasting)\n"
                   . "• Computer Vision (object detection, quality inspection using YOLO)\n"
                   . "• Natural Language Processing (sentiment analysis, intent classification)\n\n"
                   . "We also offer a dedicated **AI & Machine Learning Research Internship** for students. Visit [Careers & Internships](/careers) to apply!";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Apply for AI Internship", "AI Automation", "Contact Us"]
            ];
        }
        if (preg_match('/(n8n)/i', $text)) {
            $reply = "💡 **What is n8n?**\n\n"
                   . "n8n is a powerful, self-hostable workflow automation tool that lets businesses connect disparate applications (like CRMs, databases, email, and messaging apps) through visual node-based workflows and custom code.\n\n"
                   . "Unlike cloud-only alternatives like Zapier, n8n can be **self-hosted on your own secure servers**, ensuring 100% data privacy and zero data leakage to third parties.\n\n"
                   . "NexTechX Solutions specializes in deploying self-hosted enterprise n8n workflows for automated lead routing, invoice processing, and database synchronization. Learn more on our [AI Automation](/ai-automation) page!";
            return [
                'reply' => $reply,
                'suggested_actions' => ["Explore AI Automation", "Request Quotation", "Contact Us"]
            ];
        }
    }

    // ---------------------------------------------------------
    // N. CONTEXTUAL FOLLOW-UP CHECK FROM PREVIOUS CHAT HISTORY
    // ---------------------------------------------------------
    if (preg_match('/(internship|intern)/i', $prev_context) && preg_match('/(apply|form|how|where|resume|qualification|duration)/i', $text)) {
        $reply = "To apply for an internship at NexTechX Solutions:\n\n"
               . "1. Go directly to our [Careers & Internships](/careers) page.\n"
               . "2. Review the 6 available tracks (AI/ML, Web Dev, Data Analytics, Python, Java, Cyber Security).\n"
               . "3. Fill out the application form with your contact details and academic background.\n"
               . "4. Attach your Resume (PDF or DOCX, max 5MB) and submit.\n\n"
               . "Our HR team reviews all submissions and will get in touch with you at [hr@nextechxsolutions.com](mailto:hr@nextechxsolutions.com).";
        return [
            'reply' => $reply,
            'suggested_actions' => ["Go to Careers Page", "Contact HR Desk", "Explore Services"]
        ];
    }

    // ---------------------------------------------------------
    // O. DEFAULT COMPREHENSIVE OVERVIEW (Friendly, Structured)
    // ---------------------------------------------------------
    $reply = "Hello! 👋 I'm your **NexTechX AI Assistant**, your interactive guide to our enterprise IT solutions and programs.\n\n"
           . "Here is how I can assist you today:\n"
           . "• **[AI Automation Solutions](/ai-automation)**: AI chatbots, WhatsApp bots, n8n workflows & document processing.\n"
           . "• **[IT & Software Solutions](/it-services)**: Enterprise React web apps, Python/Java backends, mobile apps & cloud DevOps.\n"
           . "• **[Research Publication Advisory](/research-publication)**: Guidance for Scopus, IEEE & Springer indexed journals.\n"
           . "• **[Careers & Internships](/careers)**: Hands-on live-project internships with corporate mentorship.\n"
           . "• **[Contact & Quotations](#contact)**: Reach our team at **contact@nextechxsolutions.com** or call/WhatsApp **+91 93098 35085**.\n\n"
           . "What would you like to explore?";
    
    return [
        'reply' => $reply,
        'suggested_actions' => [
            "Explore AI Automation",
            "View Internship Opportunities",
            "Request Enterprise Quote",
            "Contact Our Team"
        ]
    ];
}

/**
 * Derive contextual action chips from response content
 */
function derive_action_chips($message, $reply) {
    $r = mb_strtolower($reply, 'UTF-8');
    $chips = [];

    if (strpos($r, 'intern') !== false || strpos($r, 'career') !== false) {
        $chips[] = "Apply for Internship";
        $chips[] = "Contact HR Desk";
    }
    if (strpos($r, 'automation') !== false || strpos($r, 'chatbot') !== false) {
        $chips[] = "Explore AI Automation";
        $chips[] = "Request Quotation";
    }
    if (strpos($r, 'software') !== false || strpos($r, 'web') !== false || strpos($r, 'cloud') !== false) {
        $chips[] = "View IT Services";
        $chips[] = "Book Consultation";
    }
    if (strpos($r, 'research') !== false || strpos($r, 'scopus') !== false) {
        $chips[] = "Publish Research Paper";
    }
    if (empty($chips) || count($chips) < 3) {
        $chips[] = "Request Enterprise Quote";
        $chips[] = "Contact Our Team";
    }

    return array_values(array_unique(array_slice($chips, 0, 4)));
}

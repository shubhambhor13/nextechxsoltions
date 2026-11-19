<?php
$page_title = "Careers & Internships — Job Vacancies & Technical Tracks";
$page_desc = "Explore career opportunities, experienced software engineering job vacancies, and interview-based technical internships with NextTechX Solutions. Apply online.";
require_once __DIR__ . '/includes/header.php';

$job_vacancies = [
    [
        "id" => "job-fullstack",
        "title" => "Full-Stack Software Engineer (React & Python)",
        "dept" => "Engineering & Product",
        "type" => "Full-Time",
        "workplace" => "Remote / Hybrid",
        "exp" => "0-2 Years / Early Career",
        "badgeColor" => "bg-blue-50 text-blue-700 border-blue-200",
        "desc" => "Develop and maintain modern web applications, SaaS client portals, and responsive REST APIs using React 18, Tailwind CSS, Python FastAPI, and PostgreSQL.",
        "skills" => ["React 18", "Python FastAPI", "PostgreSQL", "Docker", "Git", "REST APIs"],
        "responsibilities" => [
            "Build modern frontend user interfaces and connect backend endpoints",
            "Write clean, modular code with active Git version control",
            "Participate in sprint planning and collaborate directly with engineering mentors"
        ]
    ],
    [
        "id" => "job-ai-engineer",
        "title" => "AI & Workflow Automation Developer",
        "dept" => "AI Automation Labs",
        "type" => "Full-Time",
        "workplace" => "100% Remote",
        "exp" => "0-2 Years / Early Career",
        "badgeColor" => "bg-purple-50 text-purple-700 border-purple-200",
        "desc" => "Develop practical AI automation workflows, WhatsApp business bots, and Retrieval-Augmented Generation (RAG) tools using Python, LangChain, and APIs.",
        "skills" => ["Python", "OpenAI APIs", "LangChain", "FastAPI", "Vector DBs", "Webhooks"],
        "responsibilities" => [
            "Build automated conversational bots and business workflow integrations",
            "Implement document search and knowledge retrieval pipelines",
            "Test and monitor AI model prompts, latency, and response quality"
        ]
    ],
    [
        "id" => "job-devops-cloud",
        "title" => "DevOps & Cloud Associate Engineer",
        "dept" => "Cloud & Infrastructure",
        "type" => "Full-Time",
        "workplace" => "100% Remote",
        "exp" => "0-2 Years / Early Career",
        "badgeColor" => "bg-emerald-50 text-emerald-700 border-emerald-200",
        "desc" => "Configure containerized deployments, manage CI/CD build scripts, server monitoring, and cloud hosting for client web applications.",
        "skills" => ["Docker", "Linux", "GitHub Actions", "AWS / VPS", "Nginx", "SSL"],
        "responsibilities" => [
            "Maintain CI/CD deployment pipelines on GitHub Actions",
            "Monitor server uptime, system logs, and resource utilization",
            "Assist in configuring domains, SSL certificates, and database backups"
        ]
    ],
    [
        "id" => "job-bi-analyst",
        "title" => "Data Analyst & Business Intelligence Associate",
        "dept" => "Analytics & Intelligence",
        "type" => "Full-Time",
        "workplace" => "Remote / Hybrid",
        "exp" => "0-2 Years / Early Career",
        "badgeColor" => "bg-amber-50 text-amber-700 border-amber-200",
        "desc" => "Transform corporate datasets into interactive executive dashboards using Power BI, DAX formulas, SQL queries, and Excel models.",
        "skills" => ["Power BI", "SQL", "DAX", "Python Pandas", "Excel Models", "Data Visualization"],
        "responsibilities" => [
            "Design visual KPI reports and interactive executive dashboards",
            "Write SQL queries to extract, clean, and validate business data",
            "Document metrics and present weekly performance summaries"
        ]
    ]
];

$internship_roles = [
    [
        "id" => "intern-aiml",
        "title" => "AI & Machine Learning Research Intern",
        "domain" => "Artificial Intelligence",
        "badgeColor" => "bg-blue-50 text-blue-700 border-blue-200",
        "desc" => "Work on deep neural networks, computer vision (YOLO), Transformer architectures, and production RAG agents.",
        "skills" => ["PyTorch", "OpenCV", "Hugging Face", "FastAPI", "Vector DBs"],
        "liveProject" => "Autonomous Video Analytics & Edge Inference Pipeline"
    ],
    [
        "id" => "intern-web",
        "title" => "Full Stack Web Engineering Intern",
        "domain" => "Software Engineering",
        "badgeColor" => "bg-indigo-50 text-indigo-700 border-indigo-200",
        "desc" => "Architect modern web apps with React 18, Tailwind CSS, Python FastAPI / Node.js, and automated cloud deployments.",
        "skills" => ["React.js", "Tailwind CSS", "FastAPI", "PostgreSQL", "Docker", "AWS"],
        "liveProject" => "Multi-Tenant Cloud Operations Portal & Telemetry Dashboard"
    ],
    [
        "id" => "intern-data",
        "title" => "Data Analytics & Power BI Intern",
        "domain" => "Business Intelligence",
        "badgeColor" => "bg-emerald-50 text-emerald-700 border-emerald-200",
        "desc" => "Transform complex datasets into interactive executive dashboards with advanced SQL, DAX formulas, and automated ETL workflows.",
        "skills" => ["Power BI", "Advanced SQL", "DAX", "Pandas", "Excel Models"],
        "liveProject" => "Executive Corporate KPI & Revenue Intelligence Dashboard"
    ],
    [
        "id" => "intern-python",
        "title" => "Python Automation & Workflow Intern",
        "domain" => "Automation & DevOps",
        "badgeColor" => "bg-cyan-50 text-cyan-700 border-cyan-200",
        "desc" => "Develop high-throughput asynchronous backend APIs, event queues, and business automation workflows using Python.",
        "skills" => ["FastAPI", "AsyncIO", "Celery / Redis", "Selenium", "Webhooks"],
        "liveProject" => "Enterprise Data Harvester & Real-Time Sync Pipeline"
    ],
    [
        "id" => "intern-java",
        "title" => "Java Enterprise Microservices Intern",
        "domain" => "Enterprise Systems",
        "badgeColor" => "bg-purple-50 text-purple-700 border-purple-200",
        "desc" => "Implement robust microservices architectures, Spring Boot services, secure REST endpoints, and transactional data layers.",
        "skills" => ["Java 21", "Spring Boot", "Microservices", "Docker", "PostgreSQL"],
        "liveProject" => "High-Throughput Order Management & Settlement Microservice"
    ],
    [
        "id" => "intern-cyber",
        "title" => "Cyber Security & SOC Defense Intern",
        "domain" => "Information Security",
        "badgeColor" => "bg-rose-50 text-rose-700 border-rose-200",
        "desc" => "Hands-on vulnerability assessments, ethical penetration testing, packet analysis, and security incident investigations.",
        "skills" => ["Kali Linux", "Wireshark", "Burp Suite", "OWASP Top 10", "SOC Triage"],
        "liveProject" => "Vulnerability Assessment & Threat Defense Simulation Lab"
    ]
];
?>

<!-- 1. Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading">
            <i data-lucide="briefcase" class="w-4 h-4 text-blue-600"></i>
            <span>Careers & Talent Acquisition • NextTechX Solutions</span>
        </div>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading">
            Build the Future of Enterprise IT <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
                Jobs & Hands-On Internships
            </span>
        </h1>

        <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal">
            Join a forward-thinking software and AI development firm. Whether you are an experienced engineer looking for high-impact vacancies or a student seeking an interview-based production internship, your journey starts here.
        </p>

        <!-- HR Badges -->
        <div class="pt-2 flex items-center justify-center text-xs font-mono text-slate-600">
            <div class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-blue-50 border border-blue-200 text-blue-700 shadow-xs">
                <i data-lucide="mail" class="w-4 h-4 text-blue-600"></i>
                <span>Direct HR Desk:</span>
                <a href="mailto:<?= SITE_EMAIL_HR ?>" class="font-bold underline hover:text-blue-800"><?= SITE_EMAIL_HR ?></a>
            </div>
        </div>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="#opportunities" onclick="filterTab('jobs')" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 font-heading">
                <span>Explore Job Vacancies</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <a href="#opportunities" onclick="filterTab('internships')" class="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 font-heading">
                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                <span>View Internship Roles</span>
            </a>
            <a href="#apply-form" class="px-6 py-3.5 rounded-xl bg-white border border-slate-300 hover:border-blue-500 hover:bg-blue-50/50 text-slate-700 font-bold text-sm shadow-xs transition-all flex items-center gap-2 font-heading">
                <span>Direct Application Form ↓</span>
            </a>
        </div>
    </div>
</section>

<!-- 2. Opportunities Display Section -->
<section id="opportunities" class="py-20 lg:py-28 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="text-xs uppercase font-extrabold tracking-wider text-blue-600 font-heading">Current Openings</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Find Your Opportunity at NextTechX
            </h2>
            <p class="text-sm text-slate-600 font-normal">
                Select between experienced engineering vacancies or structured interview-based internship roles.
            </p>

            <!-- Filter Buttons -->
            <div class="pt-4 flex items-center justify-center gap-2">
                <button id="btn-tab-all" onclick="filterTab('all')" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-slate-900 text-white shadow-md transition-all">
                    All Opportunities (<?= count($job_vacancies) + count($internship_roles) ?>)
                </button>
                <button id="btn-tab-jobs" onclick="filterTab('jobs')" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-all flex items-center gap-1.5">
                    <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
                    <span>Job Vacancies (<?= count($job_vacancies) ?>)</span>
                </button>
                <button id="btn-tab-internships" onclick="filterTab('internships')" class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-all flex items-center gap-1.5">
                    <i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i>
                    <span>Internships (<?= count($internship_roles) ?>)</span>
                </button>
            </div>
        </div>

        <!-- A. Job Vacancies Grid -->
        <div id="section-jobs" class="space-y-6 pt-4">
            <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div class="p-2 rounded-lg bg-blue-50 text-blue-600 border border-blue-200">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 font-heading">Current Job Vacancies (Full-Time Engineering)</h3>
                    <p class="text-xs text-slate-500">Experienced engineering roles across frontend, backend microservices, AI systems, and cloud infrastructure.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                <?php foreach ($job_vacancies as $job): ?>
                    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left">
                        <div class="p-7 space-y-4">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold border font-heading <?= $job['badgeColor'] ?>">
                                    <?= htmlspecialchars($job['dept']) ?>
                                </span>
                                <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-500 font-heading">
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700"><?= $job['type'] ?></span>
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700"><?= $job['workplace'] ?></span>
                                    <span class="px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200"><?= $job['exp'] ?></span>
                                </div>
                            </div>

                            <h4 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors font-heading">
                                <?= htmlspecialchars($job['title']) ?>
                            </h4>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($job['desc']) ?></p>

                            <div class="space-y-1.5 pt-1">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 font-heading">Core Responsibilities:</div>
                                <?php foreach ($job['responsibilities'] as $resp): ?>
                                    <div class="flex items-start gap-2 text-xs text-slate-700">
                                        <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-blue-600 shrink-0 mt-0.5"></i>
                                        <span><?= htmlspecialchars($resp) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="pt-2">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1.5 font-heading">Required Tech Stack:</div>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ($job['skills'] as $sk): ?>
                                        <span class="px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-xs font-semibold font-mono"><?= htmlspecialchars($sk) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-slate-50/70 border-t border-slate-100 flex items-center justify-between gap-4">
                            <div class="text-xs text-slate-500 font-mono">
                                Desk: <strong class="text-slate-700"><?= SITE_EMAIL_HR ?></strong>
                            </div>
                            <button onclick="prefillApply('Job', '<?= addslashes($job['title']) ?>')" class="py-2.5 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm flex items-center gap-1.5 shadow-sm hover:shadow-md transition-all font-heading">
                                <span>Apply Now</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- B. Internship Opportunities Grid -->
        <div id="section-internships" class="space-y-6 pt-10">
            <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-600 border border-emerald-200">
                    <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 font-heading">Internship Opportunities (Live Client Projects)</h3>
                    <p class="text-xs text-slate-500">Interview-based technical internships with real codebase contributions and 1-on-1 architect mentorship.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                <?php foreach ($internship_roles as $role): ?>
                    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-xl hover:border-emerald-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left">
                        <div class="p-7 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold border font-heading <?= $role['badgeColor'] ?>">
                                    <?= htmlspecialchars($role['domain']) ?>
                                </span>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1 font-heading">
                                    <i data-lucide="sparkles" class="w-3 h-3 text-emerald-600"></i>
                                    <span>Live Client Project</span>
                                </span>
                            </div>

                            <h4 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors font-heading">
                                <?= htmlspecialchars($role['title']) ?>
                            </h4>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($role['desc']) ?></p>

                            <div class="p-3.5 rounded-2xl bg-emerald-50/70 border border-emerald-100 space-y-1">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-emerald-800 flex items-center gap-1 font-heading">
                                    <i data-lucide="git-branch" class="w-3.5 h-3.5 text-emerald-600"></i>
                                    <span>Assigned Live Module:</span>
                                </div>
                                <div class="text-slate-800 text-xs font-semibold leading-relaxed">
                                    <?= htmlspecialchars($role['liveProject']) ?>
                                </div>
                            </div>

                            <div>
                                <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1.5 font-heading">Tech Competencies:</div>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ($role['skills'] as $sk): ?>
                                        <span class="px-2.5 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-slate-700 text-xs font-semibold font-mono"><?= htmlspecialchars($sk) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-slate-50/70 border-t border-slate-100">
                            <button onclick="prefillApply('Internship', '<?= addslashes($role['title']) ?>')" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 shadow-sm hover:shadow-md transition-all font-heading">
                                <span>Apply Now</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- 3. Career Application Form Section -->
<section id="apply-form" class="py-20 lg:py-28 bg-slate-50/70 border-t border-slate-200 scroll-mt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="p-8 sm:p-12 rounded-3xl bg-white border border-slate-200 shadow-xl space-y-8 text-left">
            <div class="text-center space-y-2 border-b border-slate-200 pb-6">
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold font-heading">
                    <i data-lucide="send" class="w-3.5 h-3.5"></i>
                    <span>NextTechX Talent Application Portal</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                    Career & Internship Application Form
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 font-normal max-w-xl mx-auto">
                    Submit your profile and attach your resume. All applications are directly reviewed by our HR desk at <strong class="text-slate-800"><?= SITE_EMAIL_HR ?></strong>.
                </p>
            </div>

            <div id="applySuccessAlert" class="hidden py-10 text-center space-y-4">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto border border-emerald-300">
                    <i data-lucide="check-circle-2" class="w-9 h-9"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 font-heading">Application Transmitted Successfully!</h3>
                <p class="text-sm text-slate-600 max-w-md mx-auto" id="applySuccessMsg">
                    Your application and resume have been successfully transmitted to our recruitment team.
                </p>
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 max-w-md mx-auto text-xs text-emerald-800">
                    Our HR desk will review your profile and reach out within 24 to 48 hours via WhatsApp or Email.
                </div>
            </div>

            <form id="careerForm" onsubmit="handleCareerSubmit(event)" enctype="multipart/form-data" class="space-y-6">
                <div id="applyErrorAlert" class="hidden p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Full Name *</label>
                        <input type="text" name="full_name" required placeholder="e.g. Rahul Sharma" class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Email Address *</label>
                        <input type="email" name="email" required placeholder="rahul@example.com" class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210" class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Applying For *</label>
                        <select name="applying_for" id="applying_for_select" onchange="updatePositionOptions()" required class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 font-bold">
                            <option value="Job">Job Vacancy (Full-Time)</option>
                            <option value="Internship">Internship Opportunity</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Position / Internship Role *</label>
                        <select name="position" id="position_select" required class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 font-medium">
                            <?php foreach ($job_vacancies as $j): ?>
                                <option value="<?= htmlspecialchars($j['title']) ?>"><?= htmlspecialchars($j['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Education / Highest Degree *</label>
                        <select name="education" required class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20">
                            <option value="B.Tech / B.E (CSE / IT)">B.Tech / B.E (CSE / IT)</option>
                            <option value="B.Tech / B.E (ECE / Other)">B.Tech / B.E (ECE / Other)</option>
                            <option value="BCA / MCA">BCA / MCA</option>
                            <option value="M.Tech / M.E">M.Tech / M.E</option>
                            <option value="B.Sc / M.Sc Computer Science">B.Sc / M.Sc Computer Science</option>
                            <option value="Diploma in Engineering">Diploma in Engineering</option>
                            <option value="Other Degree / Self-Taught Developer">Other Degree / Self-Taught</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Resume Upload (PDF / DOC / DOCX) *</label>
                    <input type="file" name="resume" id="resume_file" required accept=".pdf,.doc,.docx" class="w-full p-3 border border-slate-300 rounded-xl text-xs sm:text-sm bg-white focus:outline-none focus:border-blue-600">
                    <p class="text-[11px] text-slate-500 mt-1">Accepted: PDF, DOC, DOCX. Max file size: 10 MB.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Message / Cover Statement (Optional)</label>
                    <textarea name="message" rows="3" placeholder="Briefly describe your experience, GitHub/LinkedIn links, or reasons for applying..." class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 resize-none"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" id="careerSubmitBtn" class="w-full py-4 rounded-xl bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all font-heading">
                        Submit Application & Resume to HR
                    </button>
                    <div class="pt-3 text-center text-xs text-slate-500 font-mono">
                        Direct HR Inquiries: <a href="mailto:<?= SITE_EMAIL_HR ?>" class="text-blue-600 hover:underline font-bold"><?= SITE_EMAIL_HR ?></a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

<script>
const jobOptions = <?= json_encode(array_column($job_vacancies, 'title')) ?>;
const internshipOptions = <?= json_encode(array_column($internship_roles, 'title')) ?>;

function filterTab(tab) {
    const jobs = document.getElementById('section-jobs');
    const internships = document.getElementById('section-internships');
    const btnAll = document.getElementById('btn-tab-all');
    const btnJobs = document.getElementById('btn-tab-jobs');
    const btnInternships = document.getElementById('btn-tab-internships');

    [btnAll, btnJobs, btnInternships].forEach(b => {
        b.className = "px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-all flex items-center gap-1.5";
    });

    if (tab === 'jobs') {
        jobs.style.display = 'block';
        internships.style.display = 'none';
        btnJobs.className = "px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-blue-600 text-white shadow-md transition-all flex items-center gap-1.5";
    } else if (tab === 'internships') {
        jobs.style.display = 'none';
        internships.style.display = 'block';
        btnInternships.className = "px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-emerald-600 text-white shadow-md transition-all flex items-center gap-1.5";
    } else {
        jobs.style.display = 'block';
        internships.style.display = 'block';
        btnAll.className = "px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold bg-slate-900 text-white shadow-md transition-all";
    }
}

function updatePositionOptions(selectedVal) {
    const typeSelect = document.getElementById('applying_for_select');
    const posSelect = document.getElementById('position_select');
    const type = typeSelect.value;
    const list = type === 'Job' ? jobOptions : internshipOptions;

    posSelect.innerHTML = '';
    list.forEach(item => {
        const opt = document.createElement('option');
        opt.value = item;
        opt.textContent = item;
        if (selectedVal && selectedVal === item) opt.selected = true;
        posSelect.appendChild(opt);
    });
}

function prefillApply(type, title) {
    const typeSelect = document.getElementById('applying_for_select');
    typeSelect.value = type;
    updatePositionOptions(title);
    
    const formSec = document.getElementById('apply-form');
    if (formSec) {
        formSec.scrollIntoView({ behavior: 'smooth' });
    }
}

async function handleCareerSubmit(e) {
    e.preventDefault();
    const btn = document.getElementById('careerSubmitBtn');
    const errAlert = document.getElementById('applyErrorAlert');
    const successAlert = document.getElementById('applySuccessAlert');
    const form = document.getElementById('careerForm');

    errAlert.classList.add('hidden');
    errAlert.textContent = '';
    btn.disabled = true;
    btn.textContent = 'Uploading Resume & Transmitting...';

    const formData = new FormData(form);

    try {
        const res = await fetch('api/apply_career.php', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        if (!res.ok || data.error) {
            throw new Error(data.error || 'Submission failed');
        }
        form.classList.add('hidden');
        successAlert.classList.remove('hidden');
    } catch (err) {
        errAlert.textContent = err.message || 'Error transmitting application';
        errAlert.classList.remove('hidden');
    } finally {
        btn.disabled = false;
        btn.textContent = 'Submit Application & Resume to HR';
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

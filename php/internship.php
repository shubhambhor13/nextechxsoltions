<?php
$page_title = "Technology Internship & Corporate Mentorship Academy";
$page_desc = "Hands-on technology internship tracks in AI/ML, Data Analytics, Full Stack, Python, Java Enterprise, and Cyber Security with NextTechX Solutions.";
require_once __DIR__ . '/includes/header.php';

$tracks = [
    [
        "title" => "AI & Machine Learning",
        "badge" => "Flagship Track",
        "badgeColor" => "bg-blue-50 text-blue-700 border-blue-200",
        "desc" => "Master Deep Learning, PyTorch, Large Language Models (LLMs), Computer Vision, and autonomous agents.",
        "skills" => ["PyTorch", "HuggingFace", "FastAPI", "Vector DBs", "Docker"]
    ],
    [
        "title" => "Data Analytics & Power BI",
        "badge" => "High Demand",
        "badgeColor" => "bg-emerald-50 text-emerald-700 border-emerald-200",
        "desc" => "Advanced SQL, business intelligence storytelling, DAX calculations, and interactive executive reporting dashboards.",
        "skills" => ["Advanced SQL", "Power BI", "DAX", "Python Pandas", "Excel Models"]
    ],
    [
        "title" => "Full Stack Web Development",
        "badge" => "Enterprise Project",
        "badgeColor" => "bg-indigo-50 text-indigo-700 border-indigo-200",
        "desc" => "Build scalable SaaS applications from scratch using React 18, Tailwind CSS, Node.js, and cloud deployments.",
        "skills" => ["React 18", "Tailwind CSS", "Node.js / Express", "PostgreSQL", "Cloud VPS"]
    ],
    [
        "title" => "Python Full-Stack & Automation",
        "badge" => "Automation Core",
        "badgeColor" => "bg-cyan-50 text-cyan-700 border-cyan-200",
        "desc" => "High-concurrency backend services with FastAPI, task queues, web scraping, and automated business workflows.",
        "skills" => ["FastAPI", "Async Python", "n8n Webhooks", "Selenium", "Redis"]
    ],
    [
        "title" => "Java Enterprise Development",
        "badge" => "Corporate Ready",
        "badgeColor" => "bg-purple-50 text-purple-700 border-purple-200",
        "desc" => "Production microservices, Spring Boot, Spring Security, Hibernate ORM, and enterprise architecture design.",
        "skills" => ["Java 21", "Spring Boot", "Microservices", "Docker", "PostgreSQL"]
    ],
    [
        "title" => "Cyber Security & Ethical Hacking",
        "badge" => "Defense & SOC",
        "badgeColor" => "bg-rose-50 text-rose-700 border-rose-200",
        "desc" => "Hands-on penetration testing, network defensive protocols, vulnerability scanning, and SOC analysis.",
        "skills" => ["Kali Linux", "Wireshark", "Burp Suite", "OWASP Top 10", "SOC Triage"]
    ]
];
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-400/30 text-emerald-300 text-xs font-mono mb-4">
            <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
            <span>Interview-Based Selection • Live Client Projects</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Technology Internship Program
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Gain verified production engineering experience on live client repositories. Candidate selection is strictly interview-based with 1-on-1 industry mentorship and direct full-time PPO opportunities.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button onclick="openApplyModal()" class="px-8 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-sm shadow-lg shadow-emerald-500/25 transition-all font-heading">
                Apply for Technical Interview
            </button>
            <a href="#tracks" class="px-6 py-3.5 rounded-2xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-semibold transition-colors">
                Explore All 6 Tracks
            </a>
        </div>
        <div class="mt-6 flex items-center justify-center gap-2 text-xs text-slate-400 font-mono">
            <i data-lucide="mail" class="w-4 h-4 text-emerald-400"></i>
            <span>Direct HR Desk:</span>
            <a href="mailto:<?= SITE_EMAIL_HR ?>?subject=Internship%20Inquiry%20-%20NextTechX%20Solutions" class="text-emerald-400 hover:text-emerald-300 font-bold underline transition-colors"><?= SITE_EMAIL_HR ?></a>
        </div>
    </div>
</section>

<!-- Tracks Grid -->
<section id="tracks" class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold font-mono uppercase tracking-wider text-emerald-600">Curated Industry Programs</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 mt-2">
                Specialized Technology Tracks
            </h2>
            <p class="text-base text-slate-600 mt-3">
                Each program includes live weekly workshops, code reviews, and corporate deliverables for your resume.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($tracks as $t): ?>
                <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-xs font-mono">
                            <span class="px-2.5 py-1 rounded-full border font-semibold <?= $t['badgeColor'] ?>"><?= $t['badge'] ?></span>
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1 font-heading">
                                <i data-lucide="sparkles" class="w-3 h-3 text-emerald-600"></i>
                                <span>Live Client Project</span>
                            </span>
                        </div>

                        <h3 class="text-xl font-bold font-heading text-slate-900"><?= htmlspecialchars($t['title']) ?></h3>
                        <p class="text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($t['desc']) ?></p>

                        <div class="pt-2">
                            <div class="text-[11px] font-mono uppercase tracking-wider text-slate-400 mb-2">Key Competencies</div>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($t['skills'] as $s): ?>
                                    <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-xs font-mono"><?= htmlspecialchars($s) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100">
                        <button onclick="openApplyModal('<?= htmlspecialchars($t['title']) ?>')" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold transition-colors flex items-center justify-center gap-1.5 font-heading shadow-md hover:shadow-lg">
                            <span>Apply Now</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Direct Application Form on Page -->
<section class="py-16 lg:py-20 bg-white border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm">
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="text-xs font-bold font-mono uppercase tracking-wider text-emerald-600">Interview-Based Application</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900 mt-1">Apply for Technical Interview Round</h2>
                <p class="text-slate-600 text-sm mt-2">Submit your details below. Our engineering team will review your application and contact you to schedule your technical interview.</p>
                <p class="text-xs text-slate-500 mt-1.5 font-mono">
                    Direct HR / Resume Inquiries: <a href="mailto:<?= SITE_EMAIL_HR ?>" class="text-emerald-600 hover:text-emerald-700 font-semibold underline"><?= SITE_EMAIL_HR ?></a>
                </p>
            </div>

            <form onsubmit="handleApplySubmit(event)" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Full Name *</label>
                        <input type="text" name="full_name" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white" placeholder="e.g. Aman Verma">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Email Address *</label>
                        <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white" placeholder="aman@gmail.com">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">WhatsApp Phone *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white" placeholder="+91 98765 43210">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Highest Qualification *</label>
                        <input type="text" name="qualification" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white" placeholder="B.Tech / BCA / MCA / Diploma">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Current Academic Status *</label>
                        <select name="current_status" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white">
                            <option value="Final Year Student">Final Year Student</option>
                            <option value="Pre-Final Year Student">Pre-Final Year Student</option>
                            <option value="Recent Graduate">Recent Graduate</option>
                            <option value="Working Professional Looking to Pivot">Working Professional</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Select Internship Domain *</label>
                        <select name="course_selected" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm bg-white">
                            <option value="AI & Machine Learning">AI & Machine Learning</option>
                            <option value="Data Analytics & Power BI">Data Analytics & Power BI</option>
                            <option value="Full Stack Web Development">Full Stack Web Development</option>
                            <option value="Python Full-Stack & Automation">Python Full-Stack & Automation</option>
                            <option value="Java Enterprise Development">Java Enterprise Development</option>
                            <option value="Cyber Security & Ethical Hacking">Cyber Security & Ethical Hacking</option>
                        </select>
                    </div>
                </div>

                <div class="pt-2 text-center">
                    <button type="submit" class="w-full py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all font-heading">
                        Submit Application for Technical Interview
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

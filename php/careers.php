<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/cms.php';

$page_seo = cms_get_page_seo('careers');
$page_title = $page_seo['meta_title'] ?? ("Careers & Internships — " . SITE_NAME);
$page_desc = $page_seo['meta_description'] ?? "Explore interview-based technical internships and student programs with NextTechX Solutions. Apply online.";
require_once __DIR__ . '/includes/header.php';

$cms_opps = cms_get_career_opportunities(true);
if (!empty($cms_opps)) {
    $internship_roles = [];
    foreach ($cms_opps as $opp) {
        $internship_roles[] = [
            "id" => $opp['slug'],
            "title" => $opp['title'],
            "domain" => $opp['department'] ?? 'Engineering',
            "badgeColor" => "bg-blue-50 text-blue-700 border-blue-200",
            "desc" => $opp['description'] ?? '',
            "skills" => is_array($opp['skills']) ? $opp['skills'] : (json_decode($opp['skills'] ?? '[]', true) ?: []),
            "liveProject" => $opp['duration'] ?? 'Live Client Project Track'
        ];
    }
} else {
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
}
?>

<!-- 1. Hero Section -->
<section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-gradient-to-b from-blue-50/70 via-slate-50/50 to-white border-b border-slate-200/80 overflow-hidden text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-blue-200 text-xs sm:text-sm font-bold text-blue-700 shadow-xs font-heading">
            <i data-lucide="graduation-cap" class="w-4 h-4 text-blue-600"></i>
            <span>Careers & Internships • NextTechX Solutions</span>
        </div>

        <h1 class="text-3xl xs:text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto font-heading">
            Launch Your Journey in Advanced Tech <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600">
                Technical Internships & Career Growth
            </span>
        </h1>

        <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed font-normal">
            Join a forward-thinking software and AI development firm. Currently, we are offering internship opportunities. Stay connected for future updates.
        </p>

        <!-- Official Status Notice -->
        <div class="pt-1 max-w-2xl mx-auto">
            <div class="p-4 sm:p-5 rounded-2xl bg-blue-50/90 border border-blue-200/90 text-blue-900 flex items-center justify-center gap-3 text-xs sm:text-sm font-semibold shadow-xs">
                <i data-lucide="info" class="w-5 h-5 text-blue-600 shrink-0"></i>
                <span>Currently, we are offering internship opportunities. Stay connected for future updates.</span>
            </div>
        </div>

        <!-- HR Badges -->
        <div class="pt-1 flex items-center justify-center text-xs font-mono text-slate-600">
            <div class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-white border border-slate-200 text-slate-700 shadow-xs">
                <i data-lucide="mail" class="w-4 h-4 text-blue-600"></i>
                <span>Direct HR Desk:</span>
                <a href="mailto:<?= SITE_EMAIL_HR ?>" class="font-bold text-blue-600 underline hover:text-blue-800"><?= SITE_EMAIL_HR ?></a>
            </div>
        </div>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="#opportunities" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2 font-heading">
                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                <span>Explore Internship Opportunities</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
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
                Available Internship Opportunities
            </h2>
            <p class="text-sm text-slate-600 font-normal">
                Currently, we are offering internship opportunities. Stay connected for future updates.
            </p>

            <div class="pt-2 flex justify-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold">
                    <i data-lucide="sparkles" class="w-4 h-4 text-emerald-600"></i>
                    <span>Active Internship Programs (<?= count($internship_roles) ?> Tracks Open)</span>
                </div>
            </div>
        </div>

        <!-- Internship Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
            <?php foreach ($internship_roles as $role): ?>
                <div class="rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-emerald-400 transition-all duration-300 flex flex-col justify-between overflow-hidden group text-left">
                    <div class="h-1.5 w-full bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500"></div>
                    
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

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                            <?= htmlspecialchars($role['desc']) ?>
                        </p>

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
                        <button onclick="applyForRole('<?= htmlspecialchars($role['title']) ?>')" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 shadow-sm hover:shadow-md transition-all font-heading">
                            <span>Apply Now</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- 3. Application Form Section -->
<section id="apply-form" class="py-20 lg:py-28 bg-slate-50/80 border-t border-slate-200 scroll-mt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="rounded-3xl bg-white border border-slate-200/90 shadow-xl p-6 sm:p-10 lg:p-12 space-y-8">
            <div class="text-center space-y-3">
                <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-600 font-heading">Direct Submission</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Internship Application Form
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 font-normal max-w-xl mx-auto">
                    Submit your profile and attach your resume. All applications are directly reviewed by our HR team at <strong class="text-slate-800"><?= SITE_EMAIL_HR ?></strong>.
                </p>

                <div class="pt-1">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 border border-blue-200 text-blue-900 text-xs font-semibold">
                        <i data-lucide="info" class="w-4 h-4 text-blue-600 shrink-0"></i>
                        <span>Currently, we are offering internship opportunities. Stay connected for future updates.</span>
                    </div>
                </div>
            </div>

            <div id="applySuccessAlert" class="hidden p-8 sm:p-10 rounded-2xl bg-emerald-50/90 border border-emerald-200 text-center space-y-4 shadow-sm">
                <div class="w-16 h-16 rounded-full bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-md">
                    <i data-lucide="check" class="w-8 h-8"></i>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">Thank You for Applying!</h3>
                <div class="space-y-3 max-w-lg mx-auto text-slate-700 text-sm sm:text-base leading-relaxed" id="applySuccessMsg">
                    <p>Thank you for your interest in <strong class="text-slate-900 font-bold">NEXTECHX SOLUTIONS</strong>. Your application has been received successfully.</p>
                    <p>For any queries, please contact our HR team at <a href="mailto:<?= SITE_EMAIL_HR ?>" class="text-blue-600 hover:text-blue-700 font-bold underline transition-colors"><?= SITE_EMAIL_HR ?></a>.</p>
                    <p class="font-semibold text-slate-900">We appreciate your interest in joining our team!</p>
                </div>
                <div class="pt-2">
                    <button type="button" onclick="location.reload()" class="px-6 py-2.5 rounded-xl bg-slate-900 text-white text-xs sm:text-sm font-bold hover:bg-slate-800 transition-colors shadow-sm">
                        Submit Another Application
                    </button>
                </div>
            </div>

            <div id="applyErrorAlert" class="hidden p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm"></div>

            <form id="careerApplicationForm" class="space-y-6" enctype="multipart/form-data">
                <input type="hidden" name="applying_for" value="Internship">

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
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Applying For (Category) *</label>
                        <div class="py-3 px-4 rounded-xl border border-emerald-300 bg-emerald-50/70 text-emerald-800 text-xs sm:text-sm font-bold flex items-center gap-2">
                            <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-600"></i>
                            <span>Internship Opportunities</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider font-heading">Target Internship Role *</label>
                        <select name="position" id="position_select" required class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 font-medium">
                            <?php foreach ($internship_roles as $r): ?>
                                <option value="<?= htmlspecialchars($r['title']) ?>"><?= htmlspecialchars($r['title']) ?></option>
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
                    <textarea name="message" rows="3" placeholder="Briefly describe your programming experience, project repositories, or reasons for applying..." class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-500/20 resize-none"></textarea>
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
function applyForRole(title) {
    const sel = document.getElementById('position_select');
    if (sel) {
        sel.value = title;
    }
    const formSec = document.getElementById('apply-form');
    if (formSec) {
        const offset = 105;
        const pos = formSec.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: pos, behavior: 'smooth' });
    }
}

document.getElementById('careerApplicationForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('careerSubmitBtn');
    const errAlert = document.getElementById('applyErrorAlert');
    const succAlert = document.getElementById('applySuccessAlert');
    
    errAlert.classList.add('hidden');
    errAlert.innerText = '';
    btn.disabled = true;
    btn.innerHTML = '<span class="animate-pulse">Transmitting Resume & Application to HR...</span>';

    try {
        const formData = new FormData(this);
        const res = await fetch('api/apply_career.php', {
            method: 'POST',
            body: formData
        });
        const data = await res.json().catch(() => ({}));
        if (!res.ok) {
            throw new Error(data.error || data.message || 'Submission failed. Please check your network connection.');
        }

        succAlert.classList.remove('hidden');
        this.reset();
        this.classList.add('hidden');
        if (typeof lucide !== 'undefined') lucide.createIcons();
    } catch (err) {
        errAlert.innerText = err.message || 'An error occurred while submitting your application. Please try again.';
        errAlert.classList.remove('hidden');
    } finally {
        btn.disabled = false;
        btn.innerText = 'Submit Application & Resume to HR';
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

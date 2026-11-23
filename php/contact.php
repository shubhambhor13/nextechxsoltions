<?php
$page_title = "Contact Us & Global Technical Inquiries";
$page_desc = "Get in touch with NexTechX Solutions. Fast 24-hour turnaround on project inquiries, price quotes, and technical consultations.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-cyan-300 text-xs font-mono mb-4">
            <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
            <span>Direct Technical Access • Fast Response</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight">
            Contact NexTechX Solutions
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-3xl mx-auto mt-6 leading-relaxed">
            Have a project in mind or need technical guidance? Send us a message or connect directly on WhatsApp. We provide upfront scopes and honest technical guidance.
        </p>
    </div>
</section>

<!-- Contact Info & Form -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <!-- Left Info Panel -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-xs font-bold font-mono uppercase tracking-wider text-blue-600">Direct Contact</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900 mt-1">Get In Touch Directly</h2>
                    <p class="text-slate-600 text-sm mt-2 leading-relaxed">
                        We operate as an online-first IT solutions provider. We connect with clients globally via high-definition video calls, Slack, email, and WhatsApp.
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- Contact & Proposals -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4 hover:border-blue-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <i data-lucide="briefcase" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <div class="text-xs font-mono uppercase text-slate-400">Client Proposals & Inquiries</div>
                            <div class="text-base font-bold text-slate-900 mt-0.5"><?= SITE_EMAIL_CONTACT ?></div>
                            <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="text-xs font-semibold text-blue-600 hover:text-blue-700 mt-1 inline-flex items-center gap-1">
                                <span>Email Business Desk</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- General & All Inquiries -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4 hover:border-cyan-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center shrink-0">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <div class="text-xs font-mono uppercase text-slate-400">General Information & Support</div>
                            <div class="text-base font-bold text-slate-900 mt-0.5"><?= SITE_EMAIL_GENERAL ?></div>
                            <a href="mailto:<?= SITE_EMAIL_GENERAL ?>" class="text-xs font-semibold text-cyan-600 hover:text-cyan-700 mt-1 inline-flex items-center gap-1">
                                <span>Send General Mail</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- HR & Internship -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4 hover:border-purple-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <div class="text-xs font-mono uppercase text-slate-400">Internship & Student Careers (HR)</div>
                            <div class="text-base font-bold text-slate-900 mt-0.5"><?= SITE_EMAIL_HR ?></div>
                            <a href="mailto:<?= SITE_EMAIL_HR ?>?subject=Internship%20Inquiry%20-%20NexTechX%20Solutions" class="text-xs font-semibold text-purple-600 hover:text-purple-700 mt-1 inline-flex items-center gap-1">
                                <span>Email HR Desk</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp Hotline -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4 hover:border-emerald-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <div class="text-xs font-mono uppercase text-slate-400">Instant WhatsApp Hotline</div>
                            <div class="text-base font-bold text-slate-900 mt-0.5"><?= SITE_PHONE ?></div>
                            <a href="<?= SITE_WHATSAPP_URL ?>" target="_blank" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 mt-1 inline-flex items-center gap-1">
                                <span>Open WhatsApp Chat</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Operating Model -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                            <i data-lucide="globe" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <div class="text-xs font-mono uppercase text-slate-400">Operating Model</div>
                            <div class="text-base font-bold text-slate-900 mt-0.5"><?= SITE_DELIVERY_MODEL ?></div>
                            <p class="text-xs text-slate-500 mt-1">Distributed remote engineering with global SLA coverage.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-slate-900 text-white shadow-lg space-y-3">
                    <h3 class="text-base font-bold font-heading">Need a 30-Min Strategy Call?</h3>
                    <p class="text-xs text-slate-300">Schedule a free 30-minute discovery video session with our technical architect.</p>
                    <button onclick="openQuoteModal()" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-xs font-heading shadow-md transition-all">
                        Book Free Consultation Call
                    </button>
                </div>
            </div>

            <!-- Right Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm">
                    <h2 class="text-2xl font-extrabold font-heading text-slate-900">Send Us an Inquiry</h2>
                    <p class="text-slate-600 text-sm mt-1 mb-6">Fill in the details below and we will get back to you within 24 hours.</p>

                    <div id="contactAlert" class="hidden p-4 rounded-xl text-sm mb-4"></div>

                    <form id="contactPageForm" onsubmit="handleContactPageSubmit(event)" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Your Name *</label>
                                <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="e.g. Vikram Malhotra">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Email Address *</label>
                                <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="vikram@example.com">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Phone / WhatsApp *</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="+91 98765 43210">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Company / Organization</label>
                                <input type="text" name="company" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="e.g. TechCorp">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Area of Interest *</label>
                            <select name="service_interest" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm bg-white">
                                <option value="AI Automation & Workflows">AI Automation & Workflows (Chatbots, n8n)</option>
                                <option value="Custom Software & Web Development">Custom Software & Web Development</option>
                                <option value="Research Paper Writing & Publication">Research Paper Writing & Publication</option>
                                <option value="Cloud Infrastructure & DevOps">Cloud Infrastructure & DevOps</option>
                                <option value="Technology Mentorship & Internship">Technology Mentorship & Internship</option>
                                <option value="General Technical Partnership">General Technical Partnership</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Your Message or Project Summary *</label>
                            <textarea name="message" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="Please describe what you are looking to build or solve..."></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" id="contactSubmitBtn" class="w-full py-3.5 px-6 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 font-heading">
                                <span>Send Message</span>
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    async function handleContactPageSubmit(e) {
        e.preventDefault();
        const btn = document.getElementById('contactSubmitBtn');
        const alertBox = document.getElementById('contactAlert');
        const form = document.getElementById('contactPageForm');
        const formData = new FormData(form);

        btn.disabled = true;
        btn.innerHTML = '<span>Sending Message...</span>';
        alertBox.className = 'hidden';

        try {
            const res = await fetch('api/contact.php', {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if (data.status === 'success') {
                alertBox.className = 'p-4 rounded-xl text-sm bg-emerald-50 border border-emerald-200 text-emerald-800 font-medium block mb-4';
                alertBox.innerHTML = '✅ ' + data.message;
                form.reset();
            } else {
                alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block mb-4';
                alertBox.innerHTML = '❌ ' + (data.message || 'Error submitting message.');
            }
        } catch (err) {
            alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block mb-4';
            alertBox.innerHTML = '❌ Connection error. Please message directly on WhatsApp at <?= SITE_PHONE ?>.';
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<span>Send Message</span><i data-lucide="send" class="w-4 h-4"></i>';
            if (window.lucide) lucide.createIcons();
        }
    }
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

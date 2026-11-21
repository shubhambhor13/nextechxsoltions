    </main>

    <!-- Global Footer -->
    <footer class="bg-gradient-to-b from-slate-950 via-slate-900 to-black text-slate-300 border-t border-slate-800/80 pt-16 pb-12 relative overflow-hidden">
        <!-- Subtle Corporate Grid Background -->
        <div class="absolute inset-0 bg-grid-corporate opacity-5 pointer-events-none"></div>
        <div class="absolute -top-32 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Top Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-6 xl:gap-10 pb-12 border-b border-slate-800/80 text-left">
                
                <!-- Col 1 & 2: Brand & Mission -->
                <div class="lg:col-span-2 space-y-4">
                    <a href="index.php" class="inline-flex group">
                        <?= render_logo(true, 'md', true) ?>
                    </a>

                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm font-normal">
                        Engineering high-impact artificial intelligence, autonomous workflow pipelines, modern IT software, and scalable enterprise cloud solutions.
                    </p>

                    <div class="flex items-center gap-3 pt-1">
                        <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-800/90 border border-slate-700/80 text-xs text-slate-300 font-mono">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-400"></i>
                            <span>ISO-Aligned Quality Standards</span>
                        </div>
                    </div>

                    <!-- Direct Contact Chips -->
                    <div class="pt-2 space-y-2 text-xs text-slate-400 font-mono">
                        <div class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-cyan-400"></i>
                            <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="hover:text-white transition-colors"><?= SITE_EMAIL_CONTACT ?></a>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="phone-call" class="w-4 h-4 text-emerald-400"></i>
                            <a href="tel:<?= SITE_PHONE_TEL ?>" class="hover:text-white transition-colors"><?= SITE_PHONE ?></a>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="globe" class="w-4 h-4 text-blue-400"></i>
                            <span><?= SITE_DELIVERY_MODEL ?></span>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Practices -->
                <div>
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wider mb-4 font-heading">
                        Enterprise Solutions
                    </h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="ai-automation.php" class="hover:text-cyan-400 transition-colors">AI & Autonomous Agents</a></li>
                        <li><a href="ai-automation.php" class="hover:text-cyan-400 transition-colors">n8n Workflow Automation</a></li>
                        <li><a href="it-services.php" class="hover:text-cyan-400 transition-colors">Custom Software Development</a></li>
                        <li><a href="it-services.php" class="hover:text-cyan-400 transition-colors">Enterprise Cloud & APIs</a></li>
                        <li><a href="research-publication.php" class="hover:text-cyan-400 transition-colors">Research Paper Publication</a></li>
                    </ul>
                </div>

                <!-- Col 4: Corporate -->
                <div>
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wider mb-4 font-heading">
                        Company & Career
                    </h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="about.php" class="hover:text-blue-400 transition-colors">About NextTechX</a></li>
                        <li><a href="portfolio.php" class="hover:text-blue-400 transition-colors">Client Portfolio / Work</a></li>
                        <li><a href="industries.php" class="hover:text-blue-400 transition-colors">Industries We Serve</a></li>
                        <li><a href="how-we-work.php" class="hover:text-blue-400 transition-colors">How We Work (Timeline)</a></li>
                        <li><a href="faqs.php" class="hover:text-blue-400 transition-colors">Frequently Asked Questions</a></li>
                        <li><a href="careers.php" class="hover:text-emerald-400 transition-colors font-medium">Careers & Internships</a></li>
                    </ul>
                </div>

                <!-- Col 5: Governance -->
                <div>
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wider mb-4 font-heading">
                        Governance & Legal
                    </h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="javascript:void(0)" onclick="alert('Client Confidentiality Agreement (NDA): All client intellectual property, databases, and proprietary workflows are protected under bilateral non-disclosure.')" class="hover:text-slate-200 transition-colors">Confidentiality & NDA</a></li>
                        <li><a href="privacy.php" class="hover:text-slate-200 transition-colors">Data Privacy Policy</a></li>
                        <li><a href="javascript:void(0)" onclick="alert('Terms of Service: Distributed online IT solutions delivered strictly in accordance with approved milestone-based scopes of work.')" class="hover:text-slate-200 transition-colors">Terms of Service</a></li>
                        <li><a href="admin.php" class="hover:text-blue-400 transition-colors flex items-center gap-1.5"><i data-lucide="lock" class="w-3.5 h-3.5 text-slate-400"></i> <span>Operations Console</span></a></li>
                    </ul>
                    <div class="mt-6">
                        <button onclick="openQuoteModal()" class="w-full py-2.5 px-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-xs font-bold transition-all shadow-md flex items-center justify-center gap-1.5 font-heading">
                            <span>Request Quotation</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; <?= date('Y') ?> NextTechX Solutions. All rights reserved. <?= SITE_TAGLINE ?>.</p>
                <div class="flex items-center gap-4 text-slate-400">
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-mono text-emerald-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>Systems Operational</span>
                    </span>
                    <span>•</span>
                    <a href="<?= SITE_WHATSAPP_URL ?>" target="_blank" class="hover:text-cyan-400 flex items-center gap-1 transition-colors">
                        <i data-lucide="message-circle" class="w-3.5 h-3.5 text-emerald-400"></i>
                        <span>WhatsApp Connect</span>
                    </a>
                    <span>•</span>
                    <a href="<?= SITE_LINKEDIN_URL ?>" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 flex items-center gap-1 transition-colors">
                        <i data-lucide="linkedin" class="w-3.5 h-3.5 text-blue-400"></i>
                        <span>LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <?php require_once __DIR__ . '/modals.php'; ?>
    <?php require_once __DIR__ . '/chatbot.php'; ?>

    <!-- Interactive Client Scripts -->
    <script>
        // Initialize Lucide Icons
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                lucide.createIcons();
            }
        });

        // Mobile Menu Drawer Toggle
        function toggleMobileMenu() {
            const drawer = document.getElementById('mobileDrawer');
            if (drawer) {
                drawer.classList.toggle('hidden');
            }
        }

        // Modal Controllers
        function openQuoteModal() {
            const m = document.getElementById('quoteModal');
            if (m) m.classList.remove('hidden');
        }
        function closeQuoteModal() {
            const m = document.getElementById('quoteModal');
            if (m) m.classList.add('hidden');
        }

        function openApplyModal(courseName = '') {
            const m = document.getElementById('applyModal');
            if (m) {
                m.classList.remove('hidden');
                if (courseName) {
                    const select = m.querySelector('select[name="course_selected"]');
                    if (select) select.value = courseName;
                }
            }
        }
        function closeApplyModal() {
            const m = document.getElementById('applyModal');
            if (m) m.classList.add('hidden');
        }

        // Quotation Form AJAX Submission
        async function handleQuoteSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('quoteSubmitBtn');
            const alertBox = document.getElementById('quoteAlert');
            const form = document.getElementById('quoteForm');
            const formData = new FormData(form);

            btn.disabled = true;
            btn.innerHTML = '<span>Submitting Request...</span>';
            alertBox.className = 'hidden';

            try {
                const res = await fetch('api/quote.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.status === 'success') {
                    alertBox.className = 'p-4 rounded-xl text-sm bg-emerald-50 border border-emerald-200 text-emerald-800 font-medium block';
                    alertBox.innerHTML = '✅ ' + data.message;
                    form.reset();
                    setTimeout(() => { closeQuoteModal(); alertBox.className = 'hidden'; }, 3000);
                } else {
                    alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block';
                    alertBox.innerHTML = '❌ ' + (data.message || 'Submission failed. Please try again.');
                }
            } catch (err) {
                alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block';
                alertBox.innerHTML = '❌ Network error. Please connect directly via WhatsApp.';
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<span>Submit Quotation Request</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
                if (window.lucide) lucide.createIcons();
            }
        }

        // Student Apply Form AJAX Submission
        async function handleApplySubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('applySubmitBtn');
            const alertBox = document.getElementById('applyAlert');
            const form = document.getElementById('applyForm');
            const formData = new FormData(form);

            btn.disabled = true;
            btn.innerHTML = '<span>Submitting Application...</span>';
            alertBox.className = 'hidden';

            try {
                const res = await fetch('api/apply.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.status === 'success') {
                    alertBox.className = 'p-4 rounded-xl text-sm bg-emerald-50 border border-emerald-200 text-emerald-800 font-medium block';
                    alertBox.innerHTML = '🎉 ' + data.message;
                    form.reset();
                    setTimeout(() => { closeApplyModal(); alertBox.className = 'hidden'; }, 3500);
                } else {
                    alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block';
                    alertBox.innerHTML = '❌ ' + (data.message || 'Submission error. Please try again.');
                }
            } catch (err) {
                alertBox.className = 'p-4 rounded-xl text-sm bg-red-50 border border-red-200 text-red-800 font-medium block';
                alertBox.innerHTML = '❌ Connection error. Please reach out to us directly.';
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<span>Submit Application</span><i data-lucide="check-circle" class="w-4 h-4"></i>';
                if (window.lucide) lucide.createIcons();
            }
        }

        // AI Chatbot Assistant Controller
        function toggleChatbot() {
            const win = document.getElementById('chatbotWindow');
            if (win) {
                win.classList.toggle('hidden');
                if (!win.classList.contains('hidden')) {
                    document.getElementById('chatInput')?.focus();
                }
            }
        }

        function appendChatMessage(sender, text) {
            const box = document.getElementById('chatMessages');
            if (!box) return;

            const div = document.createElement('div');
            div.className = sender === 'user' ? 'flex items-start justify-end gap-2.5' : 'flex items-start gap-2.5';

            if (sender === 'user') {
                div.innerHTML = `
                    <div class="bg-blue-600 text-white p-3 rounded-2xl rounded-tr-sm shadow-xs max-w-[85%] leading-relaxed text-xs sm:text-sm">
                        ${text}
                    </div>
                `;
            } else {
                div.innerHTML = `
                    <div class="w-7 h-7 rounded-full bg-blue-600 text-white flex items-center justify-center shrink-0 text-xs">
                        <i data-lucide="bot" class="w-3.5 h-3.5 text-cyan-300"></i>
                    </div>
                    <div class="bg-white p-3.5 rounded-2xl rounded-tl-sm border border-slate-200 shadow-xs max-w-[85%] text-slate-800 leading-relaxed text-xs sm:text-sm space-y-2">
                        ${text}
                    </div>
                `;
            }

            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
            if (window.lucide) lucide.createIcons();
        }

        async function handleChatSubmit(e) {
            e.preventDefault();
            const input = document.getElementById('chatInput');
            const query = input.value.trim();
            if (!query) return;

            input.value = '';
            appendChatMessage('user', query);

            // Display typing indicator
            const typingId = 'typing_' + Date.now();
            const box = document.getElementById('chatMessages');
            const typingDiv = document.createElement('div');
            typingDiv.id = typingId;
            typingDiv.className = 'flex items-center gap-2 text-xs text-slate-400 italic';
            typingDiv.innerHTML = '<span class="inline-block w-2 h-2 rounded-full bg-blue-500 animate-bounce"></span> NextTechX Assistant is thinking...';
            box.appendChild(typingDiv);
            box.scrollTop = box.scrollHeight;

            try {
                const res = await fetch('api/chat.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: query })
                });
                const data = await res.json();
                document.getElementById(typingId)?.remove();
                appendChatMessage('ai', data.reply || "I am here to help you with our IT solutions, AI automation pipelines, research paper publication, or student internships. Would you like to request a quotation?");
            } catch (err) {
                document.getElementById(typingId)?.remove();
                appendChatMessage('ai', "Our team is ready to help you! You can request a tailored quotation in Indian Rupees (₹) via our Get a Quote form, or message us directly on WhatsApp at +91 93098 35085.");
            }
        }

        function sendQuickMessage(msg) {
            document.getElementById('chatInput').value = msg;
            handleChatSubmit(new Event('submit'));
        }
    </script>
</body>
</html>

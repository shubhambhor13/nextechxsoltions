<!-- Quotation Modal -->
<div id="quoteModal" class="fixed inset-0 z-50 hidden bg-slate-950/70 backdrop-blur-sm overflow-y-auto flex items-center justify-center p-4">
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 p-6 sm:p-8 text-white relative">
            <button onclick="closeQuoteModal()" class="absolute top-5 right-5 p-2 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors" aria-label="Close">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 text-xs font-semibold mb-2">
                <i data-lucide="calculator" class="w-3.5 h-3.5"></i>
                <span>Fast 24-Hour Scope & Price Estimate</span>
            </div>
            <h3 class="text-2xl sm:text-3xl font-extrabold font-heading">Request a Customized Quotation</h3>
            <p class="text-blue-100 text-sm mt-1">Get an upfront, transparent estimate tailored to your exact technical specifications.</p>
            <p class="text-xs text-blue-200/90 mt-1.5 font-mono">Direct proposals desk: <a href="mailto:<?= SITE_EMAIL_CONTACT ?>" class="underline font-semibold hover:text-white"><?= SITE_EMAIL_CONTACT ?></a></p>
        </div>

        <form id="quoteForm" onsubmit="handleQuoteSubmit(event)" class="p-6 sm:p-8 space-y-4">
            <div id="quoteAlert" class="hidden p-4 rounded-xl text-sm"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Full Name *</label>
                    <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="e.g. Rahul Sharma">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Business Email *</label>
                    <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="rahul@company.com">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Phone Number *</label>
                    <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="+91 98765 43210">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Company / Organization</label>
                    <input type="text" name="company" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="e.g. NexaCorp Ltd">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Service Category *</label>
                    <select name="service_category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm bg-white">
                        <option value="">Select a Service</option>
                        <option value="AI & Workflow Automation">AI & Workflow Automation (n8n, Agents)</option>
                        <option value="IT & Custom Software Development">IT & Custom Software Development</option>
                        <option value="Research Paper Writing & Publication">Research Paper Writing & Publication</option>
                        <option value="Cloud Infrastructure & DevOps">Cloud Infrastructure & DevOps</option>
                        <option value="Technology Mentorship & Training">Technology Mentorship & Training</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Estimated Budget (INR)</label>
                    <select name="budget_range" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm bg-white">
                        <option value="Flexible / Needs Consultation">Flexible / Needs Consultation</option>
                        <option value="Under ₹50,000">Under ₹50,000 (Small Pilot / MVP)</option>
                        <option value="₹50,000 - ₹1,50,000">₹50,000 - ₹1,50,000 (Standard System)</option>
                        <option value="₹1,50,000 - ₹5,00,000">₹1,50,000 - ₹5,00,000 (Enterprise Solution)</option>
                        <option value="₹5,00,000+">₹5,00,000+ (Complex Platform)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Project Details & Requirements *</label>
                <textarea name="requirements" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-600 focus:outline-none text-sm" placeholder="Please outline your objectives, required features, or current challenges..."></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Project Brief / Specification Document (Optional)</label>
                <input type="file" name="attachment" accept=".pdf,.doc,.docx,.txt,.zip" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-slate-200 rounded-xl">
                <p class="text-[10px] text-slate-400 mt-0.5">Accepted: PDF, DOC, DOCX, TXT, ZIP (Max 15 MB)</p>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeQuoteModal()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-sm font-semibold transition-colors">
                    Cancel
                </button>
                <button type="submit" id="quoteSubmitBtn" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                    <span>Submit Quotation Request</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Student Application Modal -->
<div id="applyModal" class="fixed inset-0 z-50 hidden bg-slate-950/70 backdrop-blur-sm overflow-y-auto flex items-center justify-center p-4">
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden my-8">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-800 p-6 sm:p-8 text-white relative">
            <button onclick="closeApplyModal()" class="absolute top-5 right-5 p-2 rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors" aria-label="Close">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 text-xs font-semibold mb-2">
                <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
                <span>Interview-Based Selection</span>
            </div>
            <h3 class="text-2xl sm:text-3xl font-extrabold font-heading">Apply for Technology Internship</h3>
            <p class="text-emerald-100 text-sm mt-1">Immerse yourself in live enterprise projects. Selection strictly through technical interview.</p>
            <p class="text-xs text-emerald-200/90 mt-1.5 font-mono">Direct HR Desk: <a href="mailto:<?= SITE_EMAIL_HR ?>" class="underline font-semibold hover:text-white"><?= SITE_EMAIL_HR ?></a></p>
        </div>

        <form id="applyForm" onsubmit="handleApplySubmit(event)" class="p-6 sm:p-8 space-y-4">
            <div id="applyAlert" class="hidden p-4 rounded-xl text-sm"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Full Name *</label>
                    <input type="text" name="full_name" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="e.g. Priya Patel">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Email Address *</label>
                    <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="priya@gmail.com">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">WhatsApp / Phone *</label>
                    <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="+91 98765 43210">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Highest Qualification *</label>
                    <input type="text" name="qualification" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="e.g. B.Tech / BCA / MCA / Diploma">
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

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Upload Resume (PDF, DOC, DOCX)</label>
                    <input type="file" name="resume" accept=".pdf,.doc,.docx" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Or Resume / LinkedIn Link</label>
                    <input type="url" name="resume_link" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="https://drive.google.com/... or LinkedIn URL">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Why do you want to join this track?</label>
                <textarea name="statement" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-600 focus:outline-none text-sm" placeholder="Share your career goals or what you wish to build..."></textarea>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeApplyModal()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-sm font-semibold transition-colors">
                    Cancel
                </button>
                <button type="submit" id="applySubmitBtn" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                    <span>Submit Application for Technical Interview</span>
                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                </button>
            </div>
        </form>
    </div>
</div>

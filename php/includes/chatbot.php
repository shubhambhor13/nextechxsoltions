<!-- Floating AI Chatbot Assistant -->
<div id="aiChatbotContainer" class="fixed bottom-6 right-6 z-40 select-none">
    <!-- Trigger Button -->
    <button id="chatbotTrigger" onclick="toggleChatbot()" class="relative p-3.5 sm:p-4 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl hover:shadow-blue-500/25 transition-all duration-300 hover:scale-105 flex items-center justify-center group" aria-label="Open AI Assistant">
        <span class="absolute -top-1 -right-1 w-3.5 h-3.5 rounded-full bg-emerald-400 border-2 border-white animate-pulse"></span>
        <i data-lucide="sparkles" class="w-6 h-6 transition-transform group-hover:rotate-12"></i>
    </button>

    <!-- Chat Window -->
    <div id="chatbotWindow" class="hidden absolute bottom-16 right-0 w-[360px] sm:w-[420px] max-w-[calc(100vw-32px)] bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col h-[540px] max-h-[calc(100vh-120px)] animate-in fade-in slide-in-from-bottom-4 duration-200">
        <!-- Header -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 p-4 text-white flex items-center justify-between border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="relative w-9 h-9 rounded-full bg-slate-900 flex items-center justify-center shadow-md">
                    <img src="assets/images/nextechx-badge.webp" alt="NexTechX" class="w-9 h-9 rounded-full object-contain">
                    <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full bg-emerald-400 border-2 border-slate-900 animate-pulse"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm font-heading leading-tight flex items-center gap-1.5">
                        <span>NexTechX AI Assistant</span>
                    </h4>
                    <span class="text-[11px] text-cyan-300 font-mono">Enterprise Solutions Guide</span>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <button onclick="resetChatMessages()" title="Restart Conversation" class="p-1.5 rounded-lg hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">
                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                </button>
                <button onclick="toggleChatbot()" class="p-1.5 rounded-lg hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="chatMessages" class="flex-1 p-4 overflow-y-auto space-y-3 bg-slate-50 text-xs sm:text-sm">
            <div class="flex items-start gap-2.5">
                <img src="assets/images/nextechx-badge.webp" alt="AI" class="w-7 h-7 rounded-full object-contain shrink-0 shadow-xs">
                <div class="bg-white p-3.5 rounded-2xl rounded-tl-sm border border-slate-200 shadow-xs max-w-[85%] text-slate-800 leading-relaxed space-y-2">
                    <p>Hello! 👋 I'm your **NexTechX AI Assistant**.</p>
                    <p class="text-xs text-slate-600">I can answer questions about our **AI Automation Solutions**, **IT & Software Engineering**, **Research Publication Advisory**, or guide you through applying for our **Technology Internships**.</p>
                </div>
            </div>

            <!-- Quick Action Chips -->
            <div class="pt-1 flex flex-wrap gap-1.5">
                <button onclick="sendQuickMessage('What services does your company provide?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-blue-600 hover:bg-blue-50 text-xs font-semibold transition-colors shadow-xs">
                    💼 Company Services
                </button>
                <button onclick="sendQuickMessage('How can I apply for an internship?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-emerald-600 hover:bg-emerald-50 text-xs font-semibold transition-colors shadow-xs">
                    🎓 Apply for Internship
                </button>
                <button onclick="sendQuickMessage('What is AI Automation?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-cyan-600 hover:bg-cyan-50 text-xs font-semibold transition-colors shadow-xs">
                    🤖 What is AI Automation?
                </button>
                <button onclick="sendQuickMessage('Can I contact your company?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-purple-600 hover:bg-purple-50 text-xs font-semibold transition-colors shadow-xs">
                    📞 Contact Information
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <form onsubmit="handleChatSubmit(event)" class="p-3 bg-white border-t border-slate-200 flex items-center gap-2">
            <input type="text" id="chatInput" placeholder="Ask about AI automation, internships, pricing..." class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 text-xs sm:text-sm bg-slate-50">
            <button type="submit" class="p-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white transition-colors shrink-0">
                <i data-lucide="send" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
</div>

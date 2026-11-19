<!-- Floating AI Chatbot Assistant -->
<div id="aiChatbotContainer" class="fixed bottom-6 right-6 z-40">
    <!-- Trigger Button -->
    <button id="chatbotTrigger" onclick="toggleChatbot()" class="relative p-3.5 sm:p-4 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl hover:shadow-blue-500/25 transition-all duration-300 hover:scale-105 flex items-center justify-center group" aria-label="Open AI Assistant">
        <span class="absolute -top-1 -right-1 w-3.5 h-3.5 rounded-full bg-emerald-400 border-2 border-white animate-pulse"></span>
        <i data-lucide="sparkles" class="w-6 h-6 transition-transform group-hover:rotate-12"></i>
    </button>

    <!-- Chat Window -->
    <div id="chatbotWindow" class="hidden absolute bottom-16 right-0 w-[360px] sm:w-[420px] max-w-[calc(100vw-32px)] bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col h-[520px] max-h-[calc(100vh-120px)] animate-in fade-in slide-in-from-bottom-4 duration-200">
        <!-- Header -->
        <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 p-4 text-white flex items-center justify-between border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="relative w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center shadow-md">
                    <i data-lucide="bot" class="w-5 h-5 text-cyan-300"></i>
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-emerald-400 border border-slate-900"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm font-heading leading-tight flex items-center gap-1.5">
                        <span>NextTechX AI Assistant</span>
                    </h4>
                    <span class="text-[11px] text-cyan-300 font-mono">Enterprise Solutions Guide</span>
                </div>
            </div>
            <button onclick="toggleChatbot()" class="p-1.5 rounded-full hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chatMessages" class="flex-1 p-4 overflow-y-auto space-y-3 bg-slate-50 text-xs sm:text-sm">
            <div class="flex items-start gap-2.5">
                <div class="w-7 h-7 rounded-full bg-blue-600 text-white flex items-center justify-center shrink-0 text-xs">
                    <i data-lucide="bot" class="w-3.5 h-3.5 text-cyan-300"></i>
                </div>
                <div class="bg-white p-3.5 rounded-2xl rounded-tl-sm border border-slate-200 shadow-xs max-w-[85%] text-slate-800 leading-relaxed space-y-2">
                    <p>Hello! 👋 I'm your interactive solutions guide for <strong>NextTechX Solutions</strong>.</p>
                    <p class="text-xs text-slate-500">How can I assist your business or career goals today?</p>
                </div>
            </div>

            <!-- Quick Action Chips -->
            <div class="pt-1 flex flex-wrap gap-1.5">
                <button onclick="sendQuickMessage('What IT and AI services do you offer?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-blue-600 hover:bg-blue-50 text-xs font-semibold transition-colors">
                    💼 Enterprise Services
                </button>
                <button onclick="sendQuickMessage('How much does a custom software or AI project cost?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-blue-600 hover:bg-blue-50 text-xs font-semibold transition-colors">
                    💰 Pricing in INR (₹)
                </button>
                <button onclick="sendQuickMessage('Tell me about your Technology Internship programs')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-emerald-600 hover:bg-emerald-50 text-xs font-semibold transition-colors">
                    🎓 Student Internships
                </button>
                <button onclick="sendQuickMessage('How can I publish a research paper in Scopus or IEEE?')" class="px-3 py-1.5 rounded-full bg-white border border-slate-200 text-purple-600 hover:bg-purple-50 text-xs font-semibold transition-colors">
                    📚 Research Publication
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <form onsubmit="handleChatSubmit(event)" class="p-3 bg-white border-t border-slate-200 flex items-center gap-2">
            <input type="text" id="chatInput" placeholder="Ask about services, pricing, internships..." class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600 text-xs sm:text-sm bg-slate-50">
            <button type="submit" class="p-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                <i data-lucide="send" class="w-4 h-4"></i>
            </button>
        </form>
    </div>
</div>

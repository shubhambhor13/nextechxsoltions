import React, { useState, useRef, useEffect } from 'react';
import { 
  Bot, 
  X, 
  Send, 
  Sparkles, 
  MessageSquare, 
  Loader2, 
  User, 
  ChevronDown, 
  ArrowRight,
  Maximize2,
  Minimize2,
  RefreshCw
} from 'lucide-react';
import { api } from '../services/api';

export default function AIChatbot({ onOpenQuote, onOpenConsultation, onOpenRegister }) {
  const [isOpen, setIsOpen] = useState(false);
  const [inputMessage, setInputMessage] = useState('');
  const [loading, setLoading] = useState(false);
  const [sessionId] = useState(() => 'sess_' + Math.random().toString(36).substring(2, 9));
  
  const [messages, setMessages] = useState([
    {
      id: 'welcome-1',
      role: 'assistant',
      content: "Hello! 👋 I'm your **AI Solutions Assistant**, your interactive guide to our Enterprise IT Solutions, AI Automation, and Internship opportunities.\n\nHow can I help power your business or learning journey today?",
      suggested_actions: [
        "Explore AI Automation",
        "Explore Internship Opportunities",
        "Request Quotation for AI Bot",
        "Book a Consultation"
      ]
    }
  ]);

  const messagesEndRef = useRef(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: 'smooth' });
  };

  useEffect(() => {
    if (isOpen) {
      scrollToBottom();
    }
  }, [messages, isOpen]);

  const handleSendMessage = async (textToSend) => {
    const text = (textToSend || inputMessage).trim();
    if (!text || loading) return;

    const userMsg = {
      id: 'user_' + Date.now(),
      role: 'user',
      content: text
    };

    setMessages(prev => [...prev, userMsg]);
    setInputMessage('');
    setLoading(true);

    try {
      const response = await api.sendChatMessage(text, sessionId);
      const assistantMsg = {
        id: 'asst_' + Date.now(),
        role: 'assistant',
        content: response.reply,
        suggested_actions: response.suggested_actions || []
      };
      setMessages(prev => [...prev, assistantMsg]);
    } catch (err) {
      setMessages(prev => [
        ...prev,
        {
          id: 'err_' + Date.now(),
          role: 'assistant',
          content: "I apologize, but I encountered a momentary connection hiccup. Please try again or connect directly with our engineering team via WhatsApp.",
          suggested_actions: ["Request Quotation", "Book Consultation"]
        }
      ]);
    } finally {
      setLoading(false);
    }
  };

  const handleActionClick = (actionText) => {
    if (actionText.includes("Quotation") || actionText.includes("Quote")) {
      onOpenQuote?.();
    } else if (actionText.includes("Consultation") || actionText.includes("Call")) {
      onOpenConsultation?.();
    } else if (actionText.includes("Internship") || actionText.includes("Course") || actionText.includes("Register")) {
      onOpenRegister?.();
    } else {
      handleSendMessage(actionText);
    }
  };

  const handleResetChat = () => {
    setMessages([
      {
        id: 'welcome-reset',
        role: 'assistant',
        content: "Chat restarted! How can I assist you with our services, research publication, or internship opportunities?",
        suggested_actions: [
          "Research Paper Publication",
          "Explore Internship Opportunities",
          "Request Quotation for AI Bot",
          "Book a Consultation"
        ]
      }
    ]);
  };

  return (
    <>
      {/* Floating Trigger Button */}
      <div className="fixed bottom-6 right-6 z-40">
        {!isOpen && (
          <button
            onClick={() => setIsOpen(true)}
            className="group relative flex items-center gap-2.5 px-4 py-3 rounded-full bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg shadow-blue-500/25 active:scale-95 transition-all duration-200"
            aria-label="Open AI Assistant"
          >
            <span className="relative flex items-center justify-center w-6 h-6 rounded-full bg-white/20 text-white">
              <Bot className="w-4 h-4" />
            </span>
            <span className="relative text-xs tracking-wide hidden sm:inline">Ask AI Assistant</span>
            <span className="relative flex h-2 w-2 rounded-full bg-emerald-300"></span>
          </button>
        )}
      </div>

      {/* Floating Chat Modal */}
      {isOpen && (
        <div className="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 w-[92vw] sm:w-[400px] h-[540px] max-h-[85vh] bg-white border border-slate-200 rounded-2xl shadow-2xl flex flex-col overflow-hidden z-50 animate-in fade-in slide-in-from-bottom-4 duration-200">
          
          {/* Header */}
          <div className="flex items-center justify-between px-4 py-3 bg-slate-50 border-b border-slate-200">
            <div className="flex items-center gap-2.5">
              <div className="relative">
                <div className="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white">
                  <Bot className="w-4.5 h-4.5" />
                </div>
                <span className="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-500 border-2 border-white rounded-full"></span>
              </div>
              <div>
                <div className="flex items-center gap-1.5">
                  <h4 className="text-xs font-bold text-slate-900">AI Assistant</h4>
                  <span className="px-1.5 py-0.2 text-[9px] font-semibold bg-blue-100 text-blue-700 rounded">Online</span>
                </div>
                <p className="text-[10px] text-slate-500">IT Solutions • AI • Training Guide</p>
              </div>
            </div>

            <div className="flex items-center gap-1">
              <button
                onClick={handleResetChat}
                title="Restart Chat"
                className="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 rounded-lg transition-colors"
              >
                <RefreshCw className="w-3.5 h-3.5" />
              </button>
              <button
                onClick={() => setIsOpen(false)}
                title="Close Chat"
                className="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 rounded-lg transition-colors"
              >
                <X className="w-4 h-4" />
              </button>
            </div>
          </div>

          {/* Messages Feed */}
          <div className="flex-1 overflow-y-auto p-4 space-y-4 text-xs bg-white">
            {messages.map((msg) => (
              <div
                key={msg.id}
                className={`flex gap-2.5 ${msg.role === 'user' ? 'justify-end' : 'justify-start'}`}
              >
                {msg.role === 'assistant' && (
                  <div className="w-7 h-7 rounded-lg bg-slate-100 border border-slate-200 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                    <Bot className="w-4 h-4" />
                  </div>
                )}

                <div className="max-w-[85%] space-y-2">
                  <div
                    className={`p-3 rounded-2xl leading-relaxed whitespace-pre-wrap ${
                      msg.role === 'user'
                        ? 'bg-blue-600 text-white rounded-tr-none shadow-sm'
                        : 'bg-slate-100 border border-slate-200/80 text-slate-800 rounded-tl-none'
                    }`}
                  >
                    {msg.content}
                  </div>

                  {/* Render Suggested Action Chips */}
                  {msg.suggested_actions && msg.suggested_actions.length > 0 && (
                    <div className="flex flex-wrap gap-1.5 pt-1">
                      {msg.suggested_actions.map((act, idx) => (
                        <button
                          key={idx}
                          onClick={() => handleActionClick(act)}
                          className="px-2.5 py-1 rounded-full bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-700 text-[11px] font-medium transition-all flex items-center gap-1 active:scale-95"
                        >
                          <span>{act}</span>
                          <ArrowRight className="w-3 h-3 text-blue-500" />
                        </button>
                      ))}
                    </div>
                  )}
                </div>

                {msg.role === 'user' && (
                  <div className="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 mt-0.5">
                    <User className="w-4 h-4" />
                  </div>
                )}
              </div>
            ))}

            {loading && (
              <div className="flex gap-2.5 justify-start">
                <div className="w-7 h-7 rounded-lg bg-slate-100 border border-slate-200 text-blue-600 flex items-center justify-center shrink-0">
                  <Bot className="w-4 h-4" />
                </div>
                <div className="p-3 rounded-2xl bg-slate-100 border border-slate-200 rounded-tl-none flex items-center gap-1.5 text-slate-500 text-xs">
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce"></span>
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce [animation-delay:0.2s]"></span>
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce [animation-delay:0.4s]"></span>
                  <span className="ml-1 text-[11px]">Thinking...</span>
                </div>
              </div>
            )}

            <div ref={messagesEndRef} />
          </div>

          {/* Input Area */}
          <div className="p-3 bg-slate-50 border-t border-slate-200">
            <form
              onSubmit={(e) => {
                e.preventDefault();
                handleSendMessage();
              }}
              className="flex items-center gap-2"
            >
              <input
                type="text"
                value={inputMessage}
                onChange={(e) => setInputMessage(e.target.value)}
                placeholder="Ask about AI automation, internships, or pricing..."
                className="flex-1 bg-white border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 transition-colors"
              />
              <button
                type="submit"
                disabled={!inputMessage.trim() || loading}
                className="p-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white disabled:opacity-40 disabled:cursor-not-allowed transition-all shadow-sm"
              >
                <Send className="w-4 h-4" />
              </button>
            </form>
            <div className="flex items-center justify-between pt-2 px-1 text-[10px] text-slate-500">
              <span>Powered by AI Engine</span>
              <button
                onClick={onOpenQuote}
                className="hover:text-blue-600 transition-colors underline"
              >
                Need Enterprise Quote?
              </button>
            </div>
          </div>

        </div>
      )}
    </>
  );
}

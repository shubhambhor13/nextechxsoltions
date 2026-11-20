import React, { useState, useRef, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { 
  Bot, 
  X, 
  Send, 
  Sparkles, 
  User, 
  ArrowRight,
  RefreshCw,
  ExternalLink,
  RotateCcw
} from 'lucide-react';
import { api } from '../services/api';

export default function AIChatbot({ onOpenQuote, onOpenConsultation, onOpenRegister }) {
  const navigate = useNavigate();
  const [isOpen, setIsOpen] = useState(false);
  const [inputMessage, setInputMessage] = useState('');
  const [loading, setLoading] = useState(false);
  const [sessionId] = useState(() => 'sess_' + Math.random().toString(36).substring(2, 9));
  
  const initialMessages = [
    {
      id: 'welcome-1',
      role: 'assistant',
      content: "Hello! 👋 I'm your **NextTechX AI Assistant**.\n\nI can answer questions about our **AI Automation Solutions**, **IT & Software Engineering**, **Research Publication Advisory**, or guide you through applying for our **Technology Internships**.\n\nHow can I assist your business or career journey today?",
      suggested_actions: [
        "What services does your company provide?",
        "How can I apply for an internship?",
        "What is AI Automation?",
        "Can I contact your company?"
      ]
    }
  ];

  const [messages, setMessages] = useState(initialMessages);
  const messagesEndRef = useRef(null);
  const inputRef = useRef(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: 'smooth' });
  };

  useEffect(() => {
    if (isOpen) {
      scrollToBottom();
      setTimeout(() => inputRef.current?.focus(), 150);
    }
  }, [messages, isOpen]);

  // Handle smart link clicks inside message bubbles
  const handleLinkClick = (e, url) => {
    e.preventDefault();
    if (!url) return;

    if (url.startsWith('/')) {
      navigate(url);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    } else if (url.startsWith('#')) {
      const targetId = url.replace('#', '');
      const element = document.getElementById(targetId);
      if (element) {
        const headerOffset = 100;
        const elementPosition = element.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
      } else {
        navigate('/' + url);
      }
    } else if (url.startsWith('mailto:') || url.startsWith('tel:') || url.startsWith('http')) {
      window.open(url, '_blank', 'noopener,noreferrer');
    }
  };

  // Custom Markdown & Link Formatter
  const renderFormattedText = (text) => {
    if (!text) return null;

    const lines = text.split('\n');
    return lines.map((line, lineIdx) => {
      const trimmed = line.trim();
      if (!trimmed) {
        return <div key={lineIdx} className="h-1.5" />;
      }

      const isBullet = trimmed.startsWith('•') || trimmed.startsWith('-');
      const isNumbered = /^\d+\.\s/.test(trimmed);
      const cleanLine = isBullet 
        ? trimmed.replace(/^[•\-]\s*/, '') 
        : isNumbered 
          ? trimmed.replace(/^\d+\.\s*/, '') 
          : line;

      // Parse inline formatting: [label](url) and **bold**
      const parseInline = (str) => {
        const parts = [];
        const regex = /(\[([^\]]+)\]\(([^)]+)\))|(\*\*([^*]+)\*\*)/g;
        let lastIdx = 0;
        let match;

        while ((match = regex.exec(str)) !== null) {
          if (match.index > lastIdx) {
            parts.push(str.substring(lastIdx, match.index));
          }

          if (match[1]) {
            // [label](url)
            const label = match[2];
            const url = match[3];
            parts.push(
              <a
                key={`link-${match.index}`}
                href={url}
                onClick={(e) => handleLinkClick(e, url)}
                className="font-bold text-blue-600 hover:text-blue-800 underline decoration-blue-300 underline-offset-2 transition-colors cursor-pointer inline-flex items-center gap-0.5"
              >
                <span>{label}</span>
                {url.startsWith('http') && <ExternalLink className="w-2.5 h-2.5 inline" />}
              </a>
            );
          } else if (match[4]) {
            // **bold**
            const boldText = match[5];
            parts.push(
              <strong key={`bold-${match.index}`} className="font-bold text-slate-900">
                {boldText}
              </strong>
            );
          }
          lastIdx = regex.lastIndex;
        }

        if (lastIdx < str.length) {
          parts.push(str.substring(lastIdx));
        }

        return parts.length > 0 ? parts : str;
      };

      if (isBullet) {
        return (
          <div key={lineIdx} className="flex items-start gap-1.5 my-1 pl-1">
            <span className="text-blue-500 font-bold shrink-0 leading-tight">•</span>
            <span className="flex-1 leading-relaxed">{parseInline(cleanLine)}</span>
          </div>
        );
      }

      if (isNumbered) {
        const numMatch = trimmed.match(/^(\d+)\./);
        const num = numMatch ? numMatch[1] : '1';
        return (
          <div key={lineIdx} className="flex items-start gap-1.5 my-1 pl-1">
            <span className="text-blue-600 font-bold font-mono text-[11px] shrink-0 leading-tight">{num}.</span>
            <span className="flex-1 leading-relaxed">{parseInline(cleanLine)}</span>
          </div>
        );
      }

      return (
        <div key={lineIdx} className="my-0.5 leading-relaxed">
          {parseInline(line)}
        </div>
      );
    });
  };

  const handleSendMessage = async (textToSend) => {
    const text = (textToSend || inputMessage).trim();
    if (!text || loading) return;

    const userMsg = {
      id: 'user_' + Date.now(),
      role: 'user',
      content: text
    };

    // Construct conversation history for multi-turn context
    const historyPayload = [...messages, userMsg].slice(-8).map(m => ({
      role: m.role === 'user' ? 'user' : 'assistant',
      content: m.content
    }));

    setMessages(prev => [...prev, userMsg]);
    setInputMessage('');
    setLoading(true);

    try {
      const response = await api.sendChatMessage(text, sessionId, historyPayload);
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
          content: "I apologize, but I encountered a momentary connection hiccup. Please try asking again or reach out directly to our engineering desk at contact@nextechxsolutions.com.",
          suggested_actions: ["Request Quotation", "View Internship Opportunities", "Contact Our Architects"]
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
    } else if (actionText.includes("Apply for Internship") || actionText.includes("Careers Page")) {
      navigate('/careers');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
      handleSendMessage(actionText);
    }
  };

  const handleResetChat = () => {
    setMessages(initialMessages);
  };

  return (
    <>
      {/* Floating Trigger Button */}
      <div className="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-40 select-none">
        {!isOpen && (
          <button
            onClick={() => setIsOpen(true)}
            className="group relative flex items-center gap-2 px-3.5 py-2.5 sm:px-4 sm:py-3 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold shadow-xl shadow-blue-500/25 active:scale-95 transition-all duration-300"
            aria-label="Open AI Assistant"
          >
            <span className="relative flex items-center justify-center w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-white/20 text-white">
              <Bot className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-cyan-300" />
            </span>
            <span className="relative text-xs tracking-wide font-heading hidden sm:inline">Ask AI Assistant</span>
            <span className="relative flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
          </button>
        )}
      </div>

      {/* Floating Chat Modal (Fully responsive with inset-x-3 on mobile to prevent overflow) */}
      {isOpen && (
        <div className="fixed inset-x-3 bottom-3 sm:inset-x-auto sm:right-6 sm:bottom-6 sm:w-[420px] max-w-[calc(100vw-24px)] h-[550px] max-h-[85vh] bg-white border border-slate-200/90 rounded-2xl sm:rounded-3xl shadow-2xl flex flex-col overflow-hidden z-50 animate-in fade-in slide-in-from-bottom-4 duration-200">
          
          {/* Header */}
          <div className="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white border-b border-slate-800">
            <div className="flex items-center gap-2.5">
              <div className="relative">
                <div className="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white shadow-xs">
                  <Bot className="w-4.5 h-4.5 text-cyan-200" />
                </div>
                <span className="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-400 border-2 border-slate-900 rounded-full animate-pulse"></span>
              </div>
              <div>
                <div className="flex items-center gap-1.5">
                  <h4 className="text-xs font-bold text-white font-heading">NextTechX AI Assistant</h4>
                  <span className="px-1.5 py-0.2 text-[9px] font-semibold bg-cyan-500/20 text-cyan-300 border border-cyan-400/30 rounded">Active</span>
                </div>
                <p className="text-[10px] text-slate-300">Enterprise IT • AI Solutions • Careers</p>
              </div>
            </div>

            <div className="flex items-center gap-1">
              <button
                onClick={handleResetChat}
                title="Restart Conversation"
                className="p-1.5 text-slate-400 hover:text-white hover:bg-white/10 rounded-lg transition-colors"
                aria-label="Restart Conversation"
              >
                <RotateCcw className="w-3.5 h-3.5" />
              </button>
              <button
                onClick={() => setIsOpen(false)}
                title="Close Chat"
                className="p-1.5 text-slate-400 hover:text-white hover:bg-white/10 rounded-lg transition-colors"
                aria-label="Close Chat"
              >
                <X className="w-4 h-4" />
              </button>
            </div>
          </div>

          {/* Messages Feed */}
          <div className="flex-1 overflow-y-auto p-4 space-y-3.5 text-xs bg-slate-50/60">
            {messages.map((msg) => (
              <div
                key={msg.id}
                className={`flex gap-2.5 ${msg.role === 'user' ? 'justify-end' : 'justify-start'}`}
              >
                {msg.role === 'assistant' && (
                  <div className="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0 mt-0.5 shadow-xs">
                    <Bot className="w-4 h-4 text-cyan-200" />
                  </div>
                )}

                <div className="max-w-[88%] space-y-2">
                  <div
                    className={`p-3.5 rounded-2xl text-xs sm:text-[13px] leading-relaxed ${
                      msg.role === 'user'
                        ? 'bg-blue-600 text-white rounded-tr-none shadow-sm'
                        : 'bg-white border border-slate-200/90 text-slate-800 rounded-tl-none shadow-xs'
                    }`}
                  >
                    {renderFormattedText(msg.content)}
                  </div>

                  {/* Render Suggested Action Chips */}
                  {msg.suggested_actions && msg.suggested_actions.length > 0 && (
                    <div className="flex flex-wrap gap-1.5 pt-1">
                      {msg.suggested_actions.map((act, idx) => (
                        <button
                          key={idx}
                          onClick={() => handleActionClick(act)}
                          className="px-2.5 py-1 rounded-full bg-white hover:bg-blue-50 border border-slate-200 hover:border-blue-300 text-blue-700 text-[11px] font-semibold transition-all flex items-center gap-1 active:scale-95 shadow-xs font-heading"
                        >
                          <span>{act}</span>
                          <ArrowRight className="w-2.5 h-2.5 text-blue-500" />
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
                <div className="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-xs">
                  <Bot className="w-4 h-4 text-cyan-200" />
                </div>
                <div className="p-3 rounded-2xl bg-white border border-slate-200 rounded-tl-none flex items-center gap-1.5 text-slate-500 text-xs shadow-xs">
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce"></span>
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce [animation-delay:0.2s]"></span>
                  <span className="w-1.5 h-1.5 rounded-full bg-blue-600 animate-bounce [animation-delay:0.4s]"></span>
                  <span className="ml-1 text-[11px] font-medium text-slate-600">Generating AI response...</span>
                </div>
              </div>
            )}

            <div ref={messagesEndRef} />
          </div>

          {/* Input Area */}
          <div className="p-3 bg-white border-t border-slate-200">
            <form
              onSubmit={(e) => {
                e.preventDefault();
                handleSendMessage();
              }}
              className="flex items-center gap-2"
            >
              <input
                ref={inputRef}
                type="text"
                value={inputMessage}
                onChange={(e) => setInputMessage(e.target.value)}
                placeholder="Ask about AI automation, internships, pricing..."
                className="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
              />
              <button
                type="submit"
                disabled={!inputMessage.trim() || loading}
                className="p-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white disabled:opacity-40 disabled:cursor-not-allowed transition-all shadow-sm active:scale-95 shrink-0"
                aria-label="Send message"
              >
                <Send className="w-4 h-4" />
              </button>
            </form>
            <div className="flex items-center justify-between pt-2 px-1 text-[10px] text-slate-500">
              <span className="flex items-center gap-1">
                <Sparkles className="w-2.5 h-2.5 text-blue-500" />
                <span>NextTechX Knowledge AI</span>
              </span>
              <button
                onClick={onOpenQuote}
                className="hover:text-blue-600 transition-colors underline font-medium"
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

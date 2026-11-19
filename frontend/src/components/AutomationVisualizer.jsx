import React, { useState } from 'react';
import { 
  Play, 
  CheckCircle2, 
  Workflow, 
  Bot, 
  FileText, 
  Send, 
  Database, 
  Sparkles, 
  RefreshCw,
  Cpu,
  Layers,
  ArrowRight
} from 'lucide-react';

export default function AutomationVisualizer({ onOpenQuote }) {
  const [activeWorkflow, setActiveWorkflow] = useState('whatsapp');
  const [activeStep, setActiveStep] = useState(0);
  const [isSimulating, setIsSimulating] = useState(false);

  const workflows = {
    whatsapp: {
      title: "Omnichannel WhatsApp & Lead Qualification",
      steps: [
        { title: "Incoming Message", desc: "Customer queries via WhatsApp / Web Chat", type: "trigger" },
        { title: "AI Intent Classifier", desc: "GPT-4 classifies intent & urgency", type: "agent" },
        { title: "Vector Knowledge Base", desc: "Retrieves company FAQ & pricing SLA", type: "rag" },
        { title: "n8n Workflow Router", desc: "Dispatches CRM lead & auto-responds", type: "n8n" },
        { title: "Live Sync Execution", desc: "Synced to Salesforce, Slack & DB", type: "output" }
      ]
    },
    invoice: {
      title: "Intelligent Document & Invoice OCR Processing",
      steps: [
        { title: "PDF / Scan Upload", desc: "Vendor email or portal file received", type: "trigger" },
        { title: "OCR Entity Extraction", desc: "Computer vision parses line items & tax", type: "agent" },
        { title: "ERP & PO Validation", desc: "Cross-checks against active purchase order", type: "rag" },
        { title: "n8n Approval Pipeline", desc: "Auto-routes invoice > ₹50,000 to manager", type: "n8n" },
        { title: "QuickBooks / SAP Update", desc: "Settles ledger with audit trail", type: "output" }
      ]
    },
    support: {
      title: "Autonomous Tier-1 Customer Incident Triage",
      steps: [
        { title: "Zendesk Ticket Raised", desc: "New ticket opened by enterprise user", type: "trigger" },
        { title: "Diagnostic AI Agent", desc: "Checks server logs & error patterns", type: "agent" },
        { title: "Runbook Solution Fetch", desc: "Identifies step-by-step resolution", type: "rag" },
        { title: "n8n Self-Healing Hook", desc: "Restarts container or resets token", type: "n8n" },
        { title: "Ticket Resolved & Logged", desc: "Notifies customer in < 45 seconds", type: "output" }
      ]
    }
  };

  const currentSteps = workflows[activeWorkflow].steps;

  const runSimulation = () => {
    setIsSimulating(true);
    setActiveStep(0);
    let step = 0;
    const interval = setInterval(() => {
      step++;
      if (step < currentSteps.length) {
        setActiveStep(step);
      } else {
        clearInterval(interval);
        setTimeout(() => setIsSimulating(false), 800);
      }
    }, 900);
  };

  return (
    <div className="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
      
      {/* Control Bar */}
      <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 pb-6 border-b border-slate-100">
        <div>
          <div className="flex items-center gap-2 mb-1">
            <span className="flex h-2 w-2 rounded-full bg-blue-600 animate-ping"></span>
            <span className="text-xs font-bold text-blue-600 uppercase tracking-wider">
              Interactive Workflow Engine
            </span>
          </div>
          <h3 className="text-xl font-bold text-slate-900">
            {workflows[activeWorkflow].title}
          </h3>
        </div>

        <div className="flex flex-wrap items-center gap-2.5">
          <div className="flex items-center p-1 rounded-lg bg-slate-100 border border-slate-200">
            <button
              onClick={() => { setActiveWorkflow('whatsapp'); setActiveStep(0); }}
              className={`px-3 py-1.5 rounded-md text-xs font-semibold transition-all ${
                activeWorkflow === 'whatsapp' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-600 hover:text-slate-900'
              }`}
            >
              WhatsApp & Chatbot
            </button>
            <button
              onClick={() => { setActiveWorkflow('invoice'); setActiveStep(0); }}
              className={`px-3 py-1.5 rounded-md text-xs font-semibold transition-all ${
                activeWorkflow === 'invoice' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-600 hover:text-slate-900'
              }`}
            >
              Document OCR
            </button>
            <button
              onClick={() => { setActiveWorkflow('support'); setActiveStep(0); }}
              className={`px-3 py-1.5 rounded-md text-xs font-semibold transition-all ${
                activeWorkflow === 'support' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-600 hover:text-slate-900'
              }`}
            >
              Support Triage
            </button>
          </div>

          <button
            onClick={runSimulation}
            disabled={isSimulating}
            className="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-sm disabled:opacity-50 transition-all"
          >
            {isSimulating ? (
              <>
                <RefreshCw className="w-3.5 h-3.5 animate-spin" />
                <span>Simulating...</span>
              </>
            ) : (
              <>
                <Play className="w-3.5 h-3.5 fill-current" />
                <span>Run Live Simulation</span>
              </>
            )}
          </button>
        </div>
      </div>

      {/* Nodes Stepper Flow */}
      <div className="py-8">
        <div className="grid grid-cols-1 md:grid-cols-5 gap-4 relative">
          
          {currentSteps.map((step, idx) => {
            const isCompleted = idx < activeStep;
            const isCurrent = idx === activeStep;

            return (
              <div
                key={idx}
                className={`relative p-4 rounded-xl border transition-all duration-300 text-left ${
                  isCurrent
                    ? 'bg-blue-50/70 border-blue-400 shadow-sm scale-105'
                    : isCompleted
                    ? 'bg-emerald-50/50 border-emerald-300'
                    : 'bg-slate-50 border-slate-200 opacity-80'
                }`}
              >
                {/* Status indicator */}
                <div className="flex items-center justify-between mb-3">
                  <span className="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                    Node 0{idx + 1}
                  </span>
                  {isCompleted ? (
                    <CheckCircle2 className="w-4 h-4 text-emerald-600" />
                  ) : isCurrent ? (
                    <span className="w-2.5 h-2.5 rounded-full bg-blue-600 animate-ping" />
                  ) : (
                    <span className="w-2 h-2 rounded-full bg-slate-300" />
                  )}
                </div>

                <h4 className={`text-xs font-bold leading-tight ${isCurrent ? 'text-blue-900' : isCompleted ? 'text-emerald-900' : 'text-slate-800'}`}>
                  {step.title}
                </h4>
                <p className="text-[11px] text-slate-500 mt-1 leading-snug">
                  {step.desc}
                </p>

                {/* Simulated payload badge */}
                {isCurrent && (
                  <div className="mt-3 px-2 py-1 rounded bg-blue-100/70 text-[10px] text-blue-700 font-medium flex items-center gap-1">
                    <Sparkles className="w-3 h-3" />
                    <span>Processing payload...</span>
                  </div>
                )}
              </div>
            );
          })}
        </div>
      </div>

      {/* Footer Info & Hook */}
      <div className="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div className="text-xs text-slate-600 text-left">
          <strong className="text-slate-900">Zero Maintenance Overhead:</strong> Built on robust n8n distributed clusters with auto-retry, dead-letter queues, and Slack alerts.
        </div>
        <button
          onClick={onOpenQuote}
          className="text-xs font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 transition-colors"
        >
          <span>Automate Your Workflow</span>
          <ArrowRight className="w-3.5 h-3.5" />
        </button>
      </div>

    </div>
  );
}

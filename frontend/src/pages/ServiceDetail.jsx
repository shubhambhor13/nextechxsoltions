import React from 'react';
import { Link, useParams, Navigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import { 
  Bot, 
  Code2, 
  Layers, 
  CheckSquare, 
  Headphones, 
  Check, 
  ArrowRight, 
  ChevronRight,
  Sparkles,
  PhoneCall,
  ShieldCheck,
  Cpu,
  Workflow,
  CheckCircle2,
  Terminal,
  Server,
  Zap,
  Activity,
  Brain,
  MessageSquare,
  Eye,
  Layout,
  Database,
  Network,
  Cloud,
  CreditCard,
  TrendingUp,
  Lock,
  BarChart3,
  Camera,
  FileText,
  Video,
  Mic,
  Award,
  Briefcase,
  Users,
  FileSpreadsheet,
  CheckCircle,
  Shield,
  Clock,
  Send,
  Boxes,
  Compass,
  FileCode,
  Gauge
} from 'lucide-react';
import { servicesData, getServiceBySlug } from '../config/servicesData';
import { siteConfig } from '../config/siteConfig';

// Master Icon Registry for Core Concepts and Capabilities
const iconMap = {
  Bot, Code2, Layers, CheckSquare, Headphones,
  Brain, Cpu, Sparkles, MessageSquare, Eye, Zap,
  Layout, Server, Database, Network, ShieldCheck,
  Cloud, CreditCard, TrendingUp, Lock, BarChart3,
  Camera, FileText, Video, Mic, Award,
  Briefcase, Users, FileSpreadsheet, CheckCircle, Shield
};

// ==========================================
// 1. BESPOKE HERO GRAPHIC: AI & AUTOMATION
// ==========================================
function AiHeroGraphic() {
  return (
    <div className="relative w-full max-w-lg mx-auto">
      <div className="absolute -inset-2 bg-gradient-to-r from-blue-600/20 via-cyan-500/20 to-indigo-600/20 rounded-3xl blur-xl opacity-70 pointer-events-none" />
      <div className="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
        {/* Window Top Bar */}
        <div className="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
          <div className="flex items-center gap-2">
            <div className="w-3 h-3 rounded-full bg-rose-500/80" />
            <div className="w-3 h-3 rounded-full bg-amber-500/80" />
            <div className="w-3 h-3 rounded-full bg-emerald-500/80" />
            <span className="ml-2 text-xs font-mono text-slate-400">agent_orchestrator.py</span>
          </div>
          <span className="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-950 text-emerald-400 border border-emerald-800/80 text-[10px] font-mono">
            <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" />
            <span>LIVE PIPELINE</span>
          </span>
        </div>

        {/* Visual Pipeline Nodes */}
        <div className="p-5 space-y-3.5 text-xs">
          {/* Node 1 */}
          <div className="p-3 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-cyan-500/10 text-cyan-400 flex items-center justify-center border border-cyan-500/20">
                <Zap className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-slate-200">Inbound Event Ingestion</p>
                <p className="text-[11px] text-slate-400 font-mono">WhatsApp Cloud API & ERP Webhook</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-cyan-400 bg-cyan-950/80 px-2 py-0.5 rounded border border-cyan-800/50">200 OK</span>
          </div>

          {/* Flow Connector Arrow */}
          <div className="flex justify-center -my-1">
            <div className="w-0.5 h-3 bg-gradient-to-b from-cyan-500 to-indigo-500" />
          </div>

          {/* Node 2 */}
          <div className="p-3 rounded-xl bg-slate-800/90 border border-indigo-500/30 flex items-center justify-between shadow-inner">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center border border-indigo-500/40">
                <Brain className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-white">Cognitive RAG Retrieval</p>
                <p className="text-[11px] text-slate-300 font-mono">Vector Embeddings + Claude 3.5 Sonnet</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-indigo-300 bg-indigo-950 px-2 py-0.5 rounded border border-indigo-800">Match 99.4%</span>
          </div>

          {/* Flow Connector Arrow */}
          <div className="flex justify-center -my-1">
            <div className="w-0.5 h-3 bg-gradient-to-b from-indigo-500 to-blue-500" />
          </div>

          {/* Node 3 */}
          <div className="p-3 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center border border-emerald-500/20">
                <CheckCircle2 className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-slate-200">Automated Resolution & DB Sync</p>
                <p className="text-[11px] text-slate-400 font-mono">Invoice Approved & Customer Notified</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-emerald-400 bg-emerald-950/80 px-2 py-0.5 rounded border border-emerald-800/50">COMPLETE</span>
          </div>
        </div>

        {/* Console Telemetry Footer */}
        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800/80 flex items-center justify-between text-[11px] font-mono text-slate-400">
          <span className="flex items-center gap-1.5">
            <Clock className="w-3.5 h-3.5 text-cyan-400" />
            <span>Latency: <strong className="text-white">210ms</strong></span>
          </span>
          <span className="flex items-center gap-1.5">
            <ShieldCheck className="w-3.5 h-3.5 text-emerald-400" />
            <span>Guardrails: <strong className="text-emerald-400">Enforced</strong></span>
          </span>
        </div>
      </div>
    </div>
  );
}

// ==========================================
// 2. BESPOKE HERO GRAPHIC: SOFTWARE DEV
// ==========================================
function SoftwareHeroGraphic() {
  return (
    <div className="relative w-full max-w-lg mx-auto">
      <div className="absolute -inset-2 bg-gradient-to-r from-indigo-600/20 via-purple-600/20 to-pink-500/20 rounded-3xl blur-xl opacity-70 pointer-events-none" />
      <div className="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
        <div className="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
          <div className="flex items-center gap-2">
            <div className="w-3 h-3 rounded-full bg-rose-500/80" />
            <div className="w-3 h-3 rounded-full bg-amber-500/80" />
            <div className="w-3 h-3 rounded-full bg-emerald-500/80" />
            <span className="ml-2 text-xs font-mono text-slate-400">nextechx-core-api.ts</span>
          </div>
          <span className="text-[10px] font-mono text-purple-400 bg-purple-950 px-2 py-0.5 rounded border border-purple-800">
            TypeScript 5.4 • Strict
          </span>
        </div>

        <div className="p-5 space-y-3">
          {/* Architecture Layer 1: Frontend */}
          <div className="p-3 rounded-xl bg-slate-800/70 border border-purple-500/30 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-purple-500/20 text-purple-300 flex items-center justify-center">
                <Layout className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-white text-xs">Frontend Client Layer</p>
                <p className="text-[11px] text-slate-400 font-mono">React 18 / Next.js • Tailwind CSS</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-emerald-400">LCP 0.8s</span>
          </div>

          {/* Architecture Layer 2: API Gateway */}
          <div className="p-3 rounded-xl bg-slate-800/70 border border-indigo-500/30 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-indigo-500/20 text-indigo-300 flex items-center justify-center">
                <Server className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-white text-xs">Microservice API Gateway</p>
                <p className="text-[11px] text-slate-400 font-mono">Python FastAPI / Node.js • JWT Auth</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-cyan-400">Rate-Limited</span>
          </div>

          {/* Architecture Layer 3: Database & Cache */}
          <div className="p-3 rounded-xl bg-slate-800/70 border border-slate-700/60 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-7 h-7 rounded-lg bg-pink-500/20 text-pink-300 flex items-center justify-center">
                <Database className="w-4 h-4" />
              </div>
              <div>
                <p className="font-semibold text-white text-xs">Persistence & Cache</p>
                <p className="text-[11px] text-slate-400 font-mono">PostgreSQL + Redis Distributed Cache</p>
              </div>
            </div>
            <span className="text-[10px] font-mono text-slate-300">Pool Active</span>
          </div>
        </div>

        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
          <span className="text-emerald-400">✓ CI/CD Build #1842 Passing</span>
          <span className="text-slate-300">Coverage: <strong className="text-purple-400">92.4%</strong></span>
        </div>
      </div>
    </div>
  );
}

// ==========================================
// 3. BESPOKE HERO GRAPHIC: SAAS DEVELOPMENT
// ==========================================
function SaasHeroGraphic() {
  return (
    <div className="relative w-full max-w-lg mx-auto">
      <div className="absolute -inset-2 bg-gradient-to-r from-sky-500/20 via-blue-600/20 to-indigo-700/20 rounded-3xl blur-xl opacity-70 pointer-events-none" />
      <div className="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
        <div className="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
          <div className="flex items-center gap-2">
            <div className="w-3 h-3 rounded-full bg-rose-500/80" />
            <div className="w-3 h-3 rounded-full bg-amber-500/80" />
            <div className="w-3 h-3 rounded-full bg-emerald-500/80" />
            <span className="ml-2 text-xs font-mono text-slate-400">SaaS Multi-Tenant Cloud Cluster</span>
          </div>
          <span className="text-[10px] font-mono text-sky-400 bg-sky-950 px-2 py-0.5 rounded border border-sky-800">
            AWS ECS Active
          </span>
        </div>

        <div className="p-5 grid grid-cols-2 gap-3 text-xs">
          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Active Tenants</span>
            <span className="text-xl font-black text-white font-heading">1,480+</span>
            <span className="text-[10px] text-emerald-400 font-mono block">Tenant RLS Isolated</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Billing Engine</span>
            <span className="text-xl font-black text-white font-heading">Stripe / Webhook</span>
            <span className="text-[10px] text-sky-400 font-mono block">Automated Invoicing</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Availability SLA</span>
            <span className="text-xl font-black text-emerald-400 font-heading">99.99%</span>
            <span className="text-[10px] text-slate-400 font-mono block">Multi-AZ Failover</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Global Latency</span>
            <span className="text-xl font-black text-cyan-400 font-heading">38 ms</span>
            <span className="text-[10px] text-slate-400 font-mono block">CloudFront Edge CDN</span>
          </div>
        </div>

        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
          <span className="text-sky-400">● Role-Based Access Control (RBAC)</span>
          <span className="text-slate-300">SOC2 Type II Ready</span>
        </div>
      </div>
    </div>
  );
}

// ==========================================
// 4. BESPOKE HERO GRAPHIC: DATA ANNOTATION
// ==========================================
function AnnotationHeroGraphic() {
  return (
    <div className="relative w-full max-w-lg mx-auto">
      <div className="absolute -inset-2 bg-gradient-to-r from-teal-600/20 via-emerald-600/20 to-cyan-600/20 rounded-3xl blur-xl opacity-70 pointer-events-none" />
      <div className="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
        <div className="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
          <div className="flex items-center gap-2">
            <div className="w-3 h-3 rounded-full bg-rose-500/80" />
            <div className="w-3 h-3 rounded-full bg-amber-500/80" />
            <div className="w-3 h-3 rounded-full bg-emerald-500/80" />
            <span className="ml-2 text-xs font-mono text-slate-400">CVAT Studio — Batch #4092</span>
          </div>
          <span className="text-[10px] font-mono text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">
            QA Consensus &gt;99%
          </span>
        </div>

        <div className="p-5 space-y-3 text-xs">
          {/* Simulated Annotation Canvas Frame */}
          <div className="p-3.5 rounded-xl bg-slate-950 border border-slate-800 relative overflow-hidden space-y-2.5">
            <div className="flex items-center justify-between text-[10px] font-mono text-slate-400 border-b border-slate-800 pb-1.5">
              <span>Frame: 1048 / 5000</span>
              <span>Labels: BoundingBox + Polygon</span>
            </div>

            <div className="space-y-1.5 font-mono text-[11px]">
              <div className="flex items-center justify-between p-2 rounded bg-emerald-950/60 border border-emerald-500/40 text-emerald-300">
                <span className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-emerald-400" />
                  <span>[Vehicle_Autonomous]</span>
                </span>
                <span className="text-slate-300 font-bold">99.4% conf (x:140, y:280)</span>
              </div>

              <div className="flex items-center justify-between p-2 rounded bg-cyan-950/60 border border-cyan-500/40 text-cyan-300">
                <span className="flex items-center gap-2">
                  <span className="w-2 h-2 rounded-full bg-cyan-400" />
                  <span>[Pedestrian_Crossing]</span>
                </span>
                <span className="text-slate-300 font-bold">98.9% conf (x:380, y:210)</span>
              </div>
            </div>
          </div>

          <div className="grid grid-cols-2 gap-2 text-[11px] font-mono text-slate-300">
            <div className="p-2.5 rounded-lg bg-slate-800/80 border border-slate-700/60">
              <span className="text-slate-400 block text-[10px]">Inter-Annotator Agreement</span>
              <strong className="text-emerald-400 text-sm">99.8% Index</strong>
            </div>
            <div className="p-2.5 rounded-lg bg-slate-800/80 border border-slate-700/60">
              <span className="text-slate-400 block text-[10px]">Export Format</span>
              <strong className="text-cyan-400 text-sm">YOLOv8 & COCO</strong>
            </div>
          </div>
        </div>

        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
          <span className="text-emerald-400">✓ Phase 4 Multi-Tier QA Passed</span>
          <span className="text-slate-300">Zero Leakage Storage</span>
        </div>
      </div>
    </div>
  );
}

// ==========================================
// 5. BESPOKE HERO GRAPHIC: BPO SERVICES
// ==========================================
function BpoHeroGraphic() {
  return (
    <div className="relative w-full max-w-lg mx-auto">
      <div className="absolute -inset-2 bg-gradient-to-r from-blue-700/20 via-slate-800/30 to-indigo-900/30 rounded-3xl blur-xl opacity-70 pointer-events-none" />
      <div className="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
        <div className="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
          <div className="flex items-center gap-2">
            <div className="w-3 h-3 rounded-full bg-rose-500/80" />
            <div className="w-3 h-3 rounded-full bg-amber-500/80" />
            <div className="w-3 h-3 rounded-full bg-emerald-500/80" />
            <span className="ml-2 text-xs font-mono text-slate-400">Operations Command Hub — Desk 01</span>
          </div>
          <span className="text-[10px] font-mono text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">
            SLA: 99.4%
          </span>
        </div>

        <div className="p-5 grid grid-cols-2 gap-3 text-xs">
          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">First Response Time</span>
            <span className="text-xl font-black text-cyan-400 font-heading">42s</span>
            <span className="text-[10px] text-slate-400 font-mono block">Benchmark: &lt;60s</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Daily Throughput</span>
            <span className="text-xl font-black text-white font-heading">5,400+</span>
            <span className="text-[10px] text-emerald-400 font-mono block">Tickets & Records</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Quality Audit</span>
            <span className="text-xl font-black text-emerald-400 font-heading">99.2%</span>
            <span className="text-[10px] text-slate-400 font-mono block">Secondary Review</span>
          </div>

          <div className="p-3.5 rounded-xl bg-slate-800/80 border border-slate-700/70 space-y-1">
            <span className="text-[10px] font-mono text-slate-400 uppercase tracking-wider block">Coverage Model</span>
            <span className="text-xl font-black text-white font-heading">24/7/365</span>
            <span className="text-[10px] text-slate-400 font-mono block">Redundant Shifts</span>
          </div>
        </div>

        <div className="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
          <span className="text-blue-400">● Zendesk • Freshdesk • Custom ERP</span>
          <span className="text-slate-300">ISO 9001 / SOC 2 Aligned</span>
        </div>
      </div>
    </div>
  );
}

// Graphic Selector
function RenderServiceHeroGraphic({ type }) {
  switch (type) {
    case 'ai': return <AiHeroGraphic />;
    case 'software': return <SoftwareHeroGraphic />;
    case 'saas': return <SaasHeroGraphic />;
    case 'annotation': return <AnnotationHeroGraphic />;
    case 'bpo': return <BpoHeroGraphic />;
    default: return <AiHeroGraphic />;
  }
}

// ==========================================
// MAIN SERVICE DETAIL PAGE COMPONENT
// ==========================================
export default function ServiceDetail({ serviceId, onOpenQuote, onOpenConsultation }) {
  const { slug } = useParams();
  const currentSlug = serviceId || slug;
  const service = getServiceBySlug(currentSlug);

  if (!service) {
    return <Navigate to="/services" replace />;
  }

  const MainIcon = iconMap[service.iconName] || Bot;

  return (
    <div className="bg-white text-slate-800 font-sans selection:bg-blue-600/10 selection:text-blue-700 min-h-screen">
      
      {/* ======================================================== */}
      {/* 1. VISUALLY ATTRACTIVE HERO SECTION WITH BESPOKE GRAPHIC */}
      {/* ======================================================== */}
      <section className="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
        {/* Subtle Corporate Grid & Soft Radial Glow */}
        <div className="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none" />
        <div className={`absolute -top-32 right-1/4 w-[500px] h-[500px] ${service.theme.glowBg} rounded-full blur-3xl pointer-events-none`} />

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
          
          {/* Breadcrumb Navigation */}
          <div className="flex items-center gap-2 text-xs font-mono text-slate-500">
            <Link to="/" className="hover:text-blue-600 transition-colors">Home</Link>
            <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
            <Link to="/services" className="hover:text-blue-600 transition-colors">Services</Link>
            <ChevronRight className="w-3.5 h-3.5 text-slate-400" />
            <span className="text-slate-900 font-semibold">{service.title}</span>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Column: Heading, Badge, Description, CTAs */}
            <div className="lg:col-span-7 space-y-6">
              <div className="flex items-center gap-3">
                <div className={`w-12 h-12 rounded-xl bg-gradient-to-br ${service.theme.gradient} text-white flex items-center justify-center shrink-0 shadow-md`}>
                  <MainIcon className="w-6 h-6 stroke-[2]" />
                </div>
                <span className={`inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono ${service.theme.badgeColor}`}>
                  <span className="w-1.5 h-1.5 rounded-full bg-current animate-pulse" />
                  <span>{service.badge}</span>
                </span>
              </div>

              <h1 className="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                {service.title}
              </h1>

              <p className="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl">
                {service.overview}
              </p>

              {/* Action Buttons */}
              <div className="pt-2 flex flex-wrap items-center gap-3.5">
                <Link
                  to="/contact"
                  className={`px-7 py-3.5 rounded-xl ${service.theme.btnClass} text-white font-bold text-sm shadow-md transition-all font-heading flex items-center gap-2 active:scale-95`}
                >
                  <span>Inquire About {service.title}</span>
                  <ArrowRight className="w-4 h-4" />
                </Link>

                {onOpenQuote && (
                  <button
                    onClick={onOpenQuote}
                    className="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading"
                  >
                    Request Quotation
                  </button>
                )}

                {onOpenConsultation && (
                  <button
                    onClick={onOpenConsultation}
                    className="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2"
                  >
                    <PhoneCall className="w-4 h-4 text-blue-600" />
                    <span>Book Strategy Call</span>
                  </button>
                )}
              </div>
            </div>

            {/* Right Column: Visual High-Tech Illustration / Interactive Graphic */}
            <div className="lg:col-span-5">
              <RenderServiceHeroGraphic type={service.heroGraphicType} />
            </div>

          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 2. PRACTICE VALUE DRIVERS / HIGHLIGHTS STRIP            */}
      {/* ======================================================== */}
      <section className="bg-slate-50/80 border-b border-slate-200/80 py-6">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4 text-left">
            <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
              <span className="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Delivery Framework</span>
              <span className="text-xs sm:text-sm font-bold text-slate-900 font-heading">Agile Sprints & Fixed SOWs</span>
            </div>
            <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
              <span className="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Security & Legal</span>
              <span className="text-xs sm:text-sm font-bold text-slate-900 font-heading">100% Client Code & IP</span>
            </div>
            <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
              <span className="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Leadership</span>
              <span className="text-xs sm:text-sm font-bold text-slate-900 font-heading">Direct Architect Access</span>
            </div>
            <div className="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
              <span className="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Architecture</span>
              <span className="text-xs sm:text-sm font-bold text-slate-900 font-heading">Zero-Vendor-Lock-In</span>
            </div>
          </div>
        </div>
      </section>

      {/* ======================================================== */}
      {/* 3. CORE TECHNICAL CONCEPTS                              */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
          
          <div className="space-y-3 max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Cpu className="w-3.5 h-3.5 text-blue-600" />
              <span>Architectural Principles</span>
            </div>
            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Core Technical Concepts
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Fundamental technical concepts and engineering standards underpinning our {service.title} practice.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {service.coreConcepts.map((concept, idx) => {
              const ConceptIcon = iconMap[concept.iconName] || Cpu;
              return (
                <div 
                  key={idx}
                  className={`p-6 sm:p-7 rounded-2xl bg-white border ${service.theme.cardBorder} shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between`}
                >
                  <div className="flex items-center justify-between">
                    <div className={`w-10 h-10 rounded-xl bg-gradient-to-br ${service.theme.gradient} text-white flex items-center justify-center shadow-xs`}>
                      <ConceptIcon className="w-5 h-5 stroke-[2]" />
                    </div>
                    <span className="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">
                      0{idx + 1}
                    </span>
                  </div>

                  <div className="space-y-2">
                    <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                      {concept.title}
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                      {concept.desc}
                    </p>
                  </div>
                </div>
              );
            })}
          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 4. WHAT WE OFFER (SPECIFIC CAPABILITIES)                 */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
          
          <div className="space-y-3 max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Sparkles className="w-3.5 h-3.5 text-blue-600" />
              <span>Comprehensive Services</span>
            </div>
            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              What We Offer
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {service.offerings.map((offering, idx) => (
              <div 
                key={idx}
                className="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-blue-300 transition-all duration-300 space-y-3 flex flex-col justify-between"
              >
                <div className="space-y-3">
                  <div className="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center border border-blue-100">
                    <Check className="w-4 h-4 stroke-[2.5]" />
                  </div>
                  <h3 className="text-base sm:text-lg font-bold text-slate-900 font-heading">
                    {offering.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {offering.desc}
                  </p>
                </div>
              </div>
            ))}
          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 5. SPECIAL QUALITY PROCESS (FOR DATA ANNOTATION)         */}
      {/* ======================================================== */}
      {service.qualityProcess && (
        <section className="py-16 lg:py-24 bg-white border-b border-slate-200/80">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
            <div className="space-y-3 max-w-3xl">
              <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <ShieldCheck className="w-3.5 h-3.5 text-emerald-600" />
                <span>Accuracy Assurance</span>
              </div>
              <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Multi-Tier Quality Process
              </h2>
              <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
                How we enforce strict quality thresholds and achieve &gt;99% labeling accuracy.
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              {service.qualityProcess.map((qp, idx) => (
                <div key={idx} className="p-6 rounded-2xl bg-slate-50/80 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-3">
                  <span className="text-xs font-mono font-bold text-emerald-700 uppercase block tracking-wide">{qp.step}</span>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">{qp.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>
      )}

      {/* ======================================================== */}
      {/* 6. TECHNOLOGY STACK & TOOLING                           */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
          
          <div className="space-y-3 max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Terminal className="w-3.5 h-3.5 text-blue-600" />
              <span>Production Stack</span>
            </div>
            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Technology Stack & Tooling
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Battle-tested tools, languages, and frameworks leveraged across our {service.title} lifecycle.
            </p>
          </div>

          <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            {service.techStack.map((tech, idx) => (
              <div 
                key={idx}
                className="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-blue-300 hover:bg-white transition-all flex flex-col justify-between"
              >
                <span className="text-[11px] font-mono text-slate-500 uppercase tracking-wide">{tech.category}</span>
                <span className="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">{tech.name}</span>
              </div>
            ))}
          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 7. OUR WORKFLOW (CONNECTED STEP-BY-STEP PROCESS)         */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
          
          <div className="space-y-3 max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Workflow className="w-3.5 h-3.5 text-blue-600" />
              <span>Execution Pipeline</span>
            </div>
            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Our End-to-End Workflow
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
          </div>

          {/* Connected Step Pipeline Grid */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative">
            {service.workflow.map((flow, idx) => (
              <div 
                key={idx}
                className="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-blue-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between"
              >
                <div className="space-y-3">
                  <div className="flex items-center justify-between">
                    <span className="text-xs font-mono font-bold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                      Step {flow.step}
                    </span>
                    <span className="text-slate-300 text-xs font-mono">0{idx + 1} / 06</span>
                  </div>

                  <h3 className="text-lg font-bold text-slate-900 font-heading">
                    {flow.title}
                  </h3>

                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {flow.desc}
                  </p>
                </div>

                {flow.deliverable && (
                  <div className="pt-3 border-t border-slate-100">
                    <span className="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span className="text-xs font-semibold text-blue-700 bg-blue-50/80 px-2.5 py-1 rounded-md block border border-blue-200/60 leading-tight">
                      {flow.deliverable}
                    </span>
                  </div>
                )}
              </div>
            ))}
          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 8. APPLICATIONS AND USE CASES                           */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-white border-b border-slate-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
          
          <div className="space-y-3 max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-blue-50 text-blue-800 text-xs font-semibold uppercase tracking-wider font-mono">
              <Zap className="w-3.5 h-3.5 text-blue-600" />
              <span>Enterprise Impact</span>
            </div>
            <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
              Applications & Use Cases
            </h2>
            <p className="text-sm sm:text-base text-slate-600 leading-relaxed">
              Real-world operational implementations delivering measurable outcomes for our clients.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {service.businessApplications.map((app, idx) => (
              <div 
                key={idx}
                className="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-blue-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between"
              >
                <div className="space-y-3">
                  {app.industry && (
                    <span className="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                      {app.industry}
                    </span>
                  )}
                  <h3 className="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                    {app.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {app.desc}
                  </p>
                </div>

                {app.impact && (
                  <div className="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <CheckCircle2 className="w-4 h-4 text-emerald-600 shrink-0" />
                    <span>{app.impact}</span>
                  </div>
                )}
              </div>
            ))}
          </div>

        </div>
      </section>

      {/* ======================================================== */}
      {/* 9. CONTACT US CTA BANNER                                */}
      {/* ======================================================== */}
      <section className="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white relative overflow-hidden">
        <div className="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none" />
        <div className="absolute -bottom-20 left-1/3 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none" />

        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-cyan-300 border border-white/15 text-xs font-semibold font-mono">
            <ShieldCheck className="w-3.5 h-3.5 text-cyan-400" />
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
          </div>

          <h2 className="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            Ready to Discuss Your {service.title} Requirements?
          </h2>

          <p className="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
          </p>

          <div className="pt-3 flex flex-wrap items-center justify-center gap-4">
            <Link
              to="/contact"
              className="px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-bold text-sm shadow-lg shadow-cyan-500/20 transition-all font-heading flex items-center gap-2 active:scale-95"
            >
              <span>Contact Engineering Team</span>
              <ArrowRight className="w-4 h-4" />
            </Link>

            {onOpenQuote && (
              <button
                onClick={onOpenQuote}
                className="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading"
              >
                Request Quotation
              </button>
            )}

            {onOpenConsultation && (
              <button
                onClick={onOpenConsultation}
                className="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading flex items-center gap-2"
              >
                <PhoneCall className="w-4 h-4 text-cyan-400" />
                <span>Book Strategy Call</span>
              </button>
            )}
          </div>
        </div>
      </section>

    </div>
  );
}

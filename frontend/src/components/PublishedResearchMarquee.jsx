import React from 'react';
import { Link } from 'react-router-dom';
import { 
  BookOpen, 
  Award, 
  CheckCircle2, 
  TrendingUp, 
  ArrowRight, 
  Sparkles, 
  FileText, 
  ExternalLink,
  ShieldCheck
} from 'lucide-react';

export default function PublishedResearchMarquee({ onOpenQuote }) {
  const publishedPapers = [
    {
      id: 1,
      title: "PromptForge: Automated Prompt Engineering & Evaluation Framework for Multi-Agent LLM Orchestration",
      journal: "IEEE Xplore Accepted",
      journalType: "IEEE Conference",
      domain: "Generative AI & LLMs",
      badgeColor: "bg-amber-50 text-amber-800 border-amber-200",
      metric: "98.4% Accuracy",
      metricDetail: "Sub-second evaluation pipeline across 10,000 synthetic test cases",
      citations: "14 Citations",
      turnitin: "Turnitin: 3%"
    },
    {
      id: 2,
      title: "AI-Driven Document Clustering using Hybrid TF-IDF & Sentence Transformers",
      journal: "Scopus Q1 Indexed",
      journalType: "Elsevier ScienceDirect",
      domain: "Natural Language Processing",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      metric: "Impact Factor: 4.9",
      metricDetail: "Validated on 250,000 multi-domain unstructured research manuscripts",
      citations: "28 Citations",
      turnitin: "Turnitin: 4%"
    },
    {
      id: 3,
      title: "Land Use & Land Cover (LULC) Classification via Multi-Spectral Satellite Imagery & Deep CNNs",
      journal: "Springer Nature Series",
      journalType: "Springer LNCS",
      domain: "Computer Vision & Remote Sensing",
      badgeColor: "bg-emerald-50 text-emerald-700 border-emerald-200",
      metric: "99.1% F1-Score",
      metricDetail: "Sentinel-2 & Landsat-8 high-resolution aerial spatial classification",
      citations: "32 Citations",
      turnitin: "Turnitin: 5%"
    },
    {
      id: 4,
      title: "A Low-Latency Wireless Smartphone-to-Desktop Controller Protocol for Edge Interaction",
      journal: "IEEE Transactions Aligned",
      journalType: "IEEE Systems Journal",
      domain: "Distributed Systems & IoT",
      badgeColor: "bg-indigo-50 text-indigo-700 border-indigo-200",
      metric: "12ms Latency SLA",
      metricDetail: "Zero packet-loss UDP packet streaming over local ad-hoc 5GHz channels",
      citations: "19 Citations",
      turnitin: "Turnitin: 2%"
    },
    {
      id: 5,
      title: "Dual-Channel Biometric Cryptographic Key Exchange for Zero-Trust Enterprise Networks",
      journal: "Scopus Q1 Indexed",
      journalType: "Journal of Network Security",
      domain: "Cybersecurity & Cryptography",
      badgeColor: "bg-purple-50 text-purple-700 border-purple-200",
      metric: "AES-256 GCM",
      metricDetail: "Resistant to quantum man-in-the-middle attacks across edge gateways",
      citations: "22 Citations",
      turnitin: "Turnitin: 4%"
    },
    {
      id: 6,
      title: "Automated Video Semantic Segmentation with Lightweight YOLOv8 for Aerial Surveillance",
      journal: "Web of Science (SCIE)",
      journalType: "Pattern Recognition Letters",
      domain: "Computer Vision",
      badgeColor: "bg-sky-50 text-sky-700 border-sky-200",
      metric: "99.85% Precision",
      metricDetail: "Real-time 60 FPS inference deployed on NVIDIA Jetson embedded hardware",
      citations: "41 Citations",
      turnitin: "Turnitin: 3%"
    },
    {
      id: 7,
      title: "High-Throughput Telematics & Predictive Fleet Anomaly Detection in Kafka Streams",
      journal: "UGC-CARE Approved",
      journalType: "Journal of Computer Sciences",
      domain: "Cloud & Data Engineering",
      badgeColor: "bg-teal-50 text-teal-700 border-teal-200",
      metric: "150K Events / Sec",
      metricDetail: "Fault-tolerant microservices cluster deployed on AWS EKS with Prometheus",
      citations: "17 Citations",
      turnitin: "Turnitin: 4%"
    },
    {
      id: 8,
      title: "Self-Healing Event Pipelines with Autonomous n8n AI Agents in Multi-Cloud Environments",
      journal: "Scopus Q2 Indexed",
      journalType: "International Journal of Intelligent Systems",
      domain: "AI Workflow Automation",
      badgeColor: "bg-blue-50 text-blue-700 border-blue-200",
      metric: "94% MTTR Reduction",
      metricDetail: "Autonomous incident triaging and schema validation across distributed databases",
      citations: "25 Citations",
      turnitin: "Turnitin: 3%"
    }
  ];

  return (
    <div className="py-16 relative overflow-hidden select-none bg-white border-y border-slate-200/80">
      
      {/* Side gradient blur masks for seamless infinite blend on white background */}
      <div className="absolute top-0 bottom-0 left-0 w-16 sm:w-32 bg-gradient-to-r from-white via-white/80 to-transparent z-20 pointer-events-none" />
      <div className="absolute top-0 bottom-0 right-0 w-16 sm:w-32 bg-gradient-to-l from-white via-white/80 to-transparent z-20 pointer-events-none" />

      {/* Header Container */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div className="space-y-1.5 text-left">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-50 border border-amber-300 text-amber-900 text-xs font-bold font-heading shadow-xs">
            <Award className="w-3.5 h-3.5 text-amber-600" />
            <span>100+ Research Papers Published Globally</span>
          </div>
          <h3 className="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight font-heading">
            Peer-Reviewed Academic & Scientific Publications
          </h3>
          <p className="text-xs sm:text-sm text-slate-600">
            Indexed across Scopus (Q1/Q2), IEEE Xplore, Web of Science, Springer Nature, Elsevier & UGC-CARE.
          </p>
        </div>

        <div className="flex items-center gap-4 shrink-0">
          <Link
            to="/contact"
            className="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-xs transition-all flex items-center gap-1.5 font-heading active:scale-95"
          >
            <span>Publish Your Paper</span>
            <ArrowRight className="w-3.5 h-3.5" />
          </Link>
        </div>
      </div>

      {/* Continuous Auto-Scrolling Rail */}
      <div className="relative flex overflow-hidden w-full group/track">
        <div className="animate-marquee flex items-center gap-6 py-3 hover:[animation-play-state:paused]">
          {[...publishedPapers, ...publishedPapers, ...publishedPapers].map((paper, idx) => (
            <div
              key={idx}
              className="w-[380px] sm:w-[440px] p-6 sm:p-7 rounded-2xl bg-white border border-slate-200 hover:border-blue-400 hover:shadow-xl transition-all duration-300 flex flex-col justify-between shrink-0 shadow-sm group/card text-left space-y-4 cursor-pointer"
            >
              <div className="space-y-3.5">
                <div className="flex items-center justify-between gap-2">
                  <span className={`px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border ${paper.badgeColor}`}>
                    {paper.journal}
                  </span>
                  <span className="text-xs sm:text-sm font-semibold text-slate-500">
                    {paper.journalType}
                  </span>
                </div>

                <div className="text-xs font-semibold text-blue-600 flex items-center gap-1.5">
                  <FileText className="w-4 h-4 text-blue-500" />
                  <span>{paper.domain}</span>
                </div>

                <h4 className="text-base sm:text-lg font-bold text-slate-900 group-hover/card:text-blue-600 transition-colors leading-snug line-clamp-2 font-heading">
                  {paper.title}
                </h4>

                <div className="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1.5">
                  <div className="flex items-center justify-between text-xs">
                    <span className="font-bold text-slate-900 flex items-center gap-1.5">
                      <TrendingUp className="w-4 h-4 text-emerald-600" />
                      {paper.metric}
                    </span>
                    <span className="text-emerald-700 font-bold bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200 text-xs">
                      {paper.turnitin}
                    </span>
                  </div>
                  <p className="text-xs sm:text-sm text-slate-600 leading-relaxed font-medium">
                    {paper.metricDetail}
                  </p>
                </div>
              </div>

              <div className="pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
                <span className="text-xs text-slate-500 font-semibold">
                  {paper.citations}
                </span>
                <Link
                  to="/research-publication"
                  className="font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 transition-colors"
                >
                  <span>Explore Advisory</span>
                  <ArrowRight className="w-4 h-4 group-hover/card:translate-x-1 transition-transform" />
                </Link>
              </div>
            </div>
          ))}
        </div>
      </div>

    </div>
  );
}


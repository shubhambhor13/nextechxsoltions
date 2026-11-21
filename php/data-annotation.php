<?php
$page_title = "Data Annotation — NEXTECHX SOLUTIONS";
$page_desc = "High-precision data labeling, image annotation, and ground-truth validation for AI models.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section with Interactive Annotation Studio Graphic -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-35 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-8">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">Data Annotation</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-7 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shrink-0 shadow-md">
                        <i data-lucide="check-square" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-emerald-50 text-emerald-700 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                        <span>AI & ML Training Datasets</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    Data Annotation
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal max-w-2xl">
                    Our Data Annotation practice provides enterprise-grade ground-truth datasets essential for training accurate machine learning and deep learning models. Combining human-in-the-loop specialist labelers with multi-tier quality assurance protocols, we deliver consistently accurate, clean, and format-ready training data for computer vision, natural language processing, and multimodal AI pipelines.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 text-white font-bold text-sm shadow-md transition-all font-heading flex items-center gap-2 active:scale-95">
                        <span>Inquire About Data Annotation</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading">
                        Request Quotation
                    </button>

                    <button onclick="openConsultationModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-800 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                        <i data-lucide="phone-call" class="w-4 h-4 text-emerald-600"></i>
                        <span>Book Strategy Call</span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Bespoke High-Tech Illustration / Interactive Graphic -->
            <div class="lg:col-span-5">
                <div class="relative w-full max-w-lg mx-auto">
                    <div class="absolute -inset-2 bg-gradient-to-r from-teal-600/20 via-emerald-600/20 to-cyan-600/20 rounded-3xl blur-xl opacity-70 pointer-events-none"></div>
                    <div class="relative rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl overflow-hidden font-sans text-left">
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-950/80 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                                <span class="ml-2 text-xs font-mono text-slate-400">CVAT Studio — Batch #4092</span>
                            </div>
                            <span class="text-[10px] font-mono text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">
                                QA Consensus &gt;99%
                            </span>
                        </div>

                        <div class="p-5 space-y-3 text-xs">
                            <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 relative overflow-hidden space-y-2.5">
                                <div class="flex items-center justify-between text-[10px] font-mono text-slate-400 border-b border-slate-800 pb-1.5">
                                    <span>Frame: 1048 / 5000</span>
                                    <span>Labels: BoundingBox + Polygon</span>
                                </div>

                                <div class="space-y-1.5 font-mono text-[11px]">
                                    <div class="flex items-center justify-between p-2 rounded bg-emerald-950/60 border border-emerald-500/40 text-emerald-300">
                                        <span class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                            <span>[Vehicle_Autonomous]</span>
                                        </span>
                                        <span class="text-slate-300 font-bold">99.4% conf (x:140, y:280)</span>
                                    </div>

                                    <div class="flex items-center justify-between p-2 rounded bg-cyan-950/60 border border-cyan-500/40 text-cyan-300">
                                        <span class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                                            <span>[Pedestrian_Crossing]</span>
                                        </span>
                                        <span class="text-slate-300 font-bold">98.9% conf (x:380, y:210)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 text-[11px] font-mono text-slate-300">
                                <div class="p-2.5 rounded-lg bg-slate-800/80 border border-slate-700/60">
                                    <span class="text-slate-400 block text-[10px]">Inter-Annotator Agreement</span>
                                    <strong class="text-emerald-400 text-sm">99.8% Index</strong>
                                </div>
                                <div class="p-2.5 rounded-lg bg-slate-800/80 border border-slate-700/60">
                                    <span class="text-slate-400 block text-[10px]">Export Format</span>
                                    <strong class="text-cyan-400 text-sm">YOLOv8 & COCO</strong>
                                </div>
                            </div>
                        </div>

                        <div class="px-5 py-3 bg-slate-950/90 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
                            <span class="text-emerald-400">✓ Phase 4 Multi-Tier QA Passed</span>
                            <span class="text-slate-300">Zero Leakage Storage</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Practice Value Drivers / Highlights Strip -->
<section class="bg-slate-50/80 border-b border-slate-200/80 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-left">
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Delivery Framework</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Dedicated Labeling Pods</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Security & Legal</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">100% Client Dataset IP</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Accuracy SLA</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">&gt;99% Precision Benchmark</span>
            </div>
            <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Architecture</span>
                <span class="text-xs sm:text-sm font-bold text-slate-900 font-heading">Encrypted Cloud Staging</span>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Concepts Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Annotation Fundamentals</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Fundamental technical concepts and engineering standards underpinning our Data Annotation practice.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="check-square" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">01</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Ground-Truth Data Labeling</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Assigning precise, verified semantic metadata to raw data records so machine learning algorithms can learn accurately.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="camera" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">02</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Computer Vision Annotation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Pixel-accurate visual marking including bounding boxes, polygons, keypoints, and semantic segmentation masks.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="file-text" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">03</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Text & NLP Annotation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Categorizing unstructured textual data with sentiment labels, intent classes, and Named Entity Recognition (NER) tags.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="video" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">04</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Temporal Video Annotation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Continuous frame-by-frame object tracking, event timestamping, and trajectory labeling across sequential video feeds.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="mic" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">05</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Audio & Speech Tagging</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Speech-to-text transcription alignment, acoustic event tagging, speaker identification, and phonetic labeling.</p>
                </div>
            </div>

            <div class="p-6 sm:p-7 rounded-2xl bg-white border border-emerald-100 hover:border-emerald-300 shadow-2xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 space-y-3.5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shadow-xs">
                        <i data-lucide="award" class="w-5 h-5 stroke-[2]"></i>
                    </div>
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">06</span>
                </div>
                <div class="space-y-2">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality SLA Verification</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-tier consensus audits and algorithmic validation ensuring dataset accuracy consistently exceeds 99%.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Offer Section -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                What We Offer
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">2D & 3D Bounding Boxes</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Precision rectangular and cuboid boundary labeling for object detection and spatial orientation models.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Polygon & Semantic Segmentation</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Pixel-perfect multi-point polygon tracing for irregular objects, geographic terrain, and biomedical imaging.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Image Classification & Tagging</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Single-label and multi-label categorization across large volumes of visual assets based on strict ontologies.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Text Annotation & NER</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Token-level tagging of entities (people, organizations, locations, dates) and text sentiment classifications.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Video Object Tracking</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Continuous trajectory tracking across high-framerate video clips with persistent object IDs and re-identification.</p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-2xs hover:shadow-lg hover:border-emerald-300 transition-all duration-300 space-y-3 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100">
                        <i data-lucide="check" class="w-4 h-4 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom Formats (COCO, YOLO, VOC)</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Delivering annotated datasets directly in your model's required format (JSON, XML, YOLO txt, Pascal VOC, CSV).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Special Multi-Tier Quality Process Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Accuracy Assurance</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Multi-Tier Quality Process
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                How we enforce strict quality thresholds and achieve &gt;99% labeling accuracy.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/80 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-3">
                <span class="text-xs font-mono font-bold text-emerald-700 uppercase block tracking-wide">Phase 1: Guidelines</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">We formulate comprehensive annotation guidelines with visual examples, edge cases, and strict acceptance criteria.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/80 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-3">
                <span class="text-xs font-mono font-bold text-emerald-700 uppercase block tracking-wide">Phase 2: Pilot Labeling</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">A sample dataset batch is labeled and calibrated with your engineering team to verify alignment on edge cases.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/80 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-3">
                <span class="text-xs font-mono font-bold text-emerald-700 uppercase block tracking-wide">Phase 3: Production Labeling</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Dedicated annotators tag the bulk dataset under continuous peer-review and real-time supervisor sampling.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/80 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-3">
                <span class="text-xs font-mono font-bold text-emerald-700 uppercase block tracking-wide">Phase 4: Multi-Tier QA</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated schema integrity checks combined with secondary human audit passes to guarantee >99% precision.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Technology Stack Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Production Stack</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Technology Stack & Tooling
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Battle-tested tools, languages, and frameworks leveraged across our Data Annotation lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Annotation Platform</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">CVAT / Label Studio</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Pre-Processing</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Python / OpenCV</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Standard Schemas</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">COCO / YOLO Formats</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Data Export</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Pascal VOC / JSON</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Secure Staging</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">AWS S3 / Cloud Storage</span>
            </div>
            <div class="p-4 sm:p-5 rounded-xl bg-slate-50/70 border border-slate-200/80 hover:border-emerald-300 hover:bg-white transition-all flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Validation</span>
                <span class="text-sm sm:text-base font-bold text-slate-900 font-heading mt-1.5">Consensus QA Algorithms</span>
            </div>
        </div>
    </div>
</section>

<!-- 7. Our Workflow (Connected Step-by-Step Pipeline) -->
<section class="py-16 lg:py-24 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Execution Pipeline</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our End-to-End Workflow
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative">
            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 01</span>
                        <span class="text-slate-300 text-xs font-mono">01 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Data Collection & Ingestion</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Secure transfer and staging of raw images, video streams, or text documents into encrypted enterprise storage.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">Encrypted Data Ingestion & Sanitization Log</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 02</span>
                        <span class="text-slate-300 text-xs font-mono">02 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Guideline & Taxonomy Calibration</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Creating detailed annotation instructions, class ontologies, and edge-case resolution rules.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">Calibrated Annotation Playbook & Taxonomy</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 03</span>
                        <span class="text-slate-300 text-xs font-mono">03 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Precision Annotation Execution</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Specialist annotators perform high-precision labeling following calibrated guidelines.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">High-Throughput Ground-Truth Labeled Batches</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 04</span>
                        <span class="text-slate-300 text-xs font-mono">04 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Quality Review & Consensus</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-tier review passes, inter-annotator agreement calculations, and supervisor spot checks.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">Consensus Audit & Inter-Annotator Agreement Index</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 05</span>
                        <span class="text-slate-300 text-xs font-mono">05 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Validation & Schema Formatting</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated syntax and coordinate checks converting results into standard YOLO, COCO, or custom JSON formats.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">Formatted Datasets in YOLO, COCO & Custom JSON</span>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-emerald-400/80 transition-all duration-300 space-y-4 relative flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-bold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Step 06</span>
                        <span class="text-slate-300 text-xs font-mono">06 / 06</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 font-heading">Secure Dataset Delivery</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Encrypted dataset package delivery with comprehensive QA audit certificates and summary reporting.</p>
                </div>
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wider block mb-1">Tangible Output:</span>
                    <span class="text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-2.5 py-1 rounded-md block border border-emerald-200/60 leading-tight">Signed QA Precision Certificate & Secure Delivery</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Applications & Use Cases Section -->
<section class="py-16 lg:py-24 bg-white border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 text-left">
        <div class="space-y-3 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                Applications & Use Cases
            </h2>
            <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                Real-world operational implementations delivering measurable outcomes for our clients.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-emerald-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Autonomous Vehicles & Robotics
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Autonomous Driving & Robotics
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Annotating pedestrian paths, lane lines, traffic signs, and obstacle boundaries for autonomous navigation models.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Sub-Pixel Accurate Lane & Obstacle Detection</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-emerald-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        eCommerce & Retail AI
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        eCommerce Visual Search & Cataloging
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Tagging product apparel, accessories, colors, and visual styles to power recommendation engines and visual search.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>Multi-Attribute Product Catalog Enrichment</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-emerald-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Medical Technology & Radiology
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Healthcare & Medical Image Analysis
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Precise anatomical region and anomaly polygon delineation across radiographic and microscopic scan sets.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>High-Confidence Anomaly Segmentation Masks</span>
                </div>
            </div>

            <div class="p-7 sm:p-8 rounded-2xl bg-slate-50/70 border border-slate-200/90 hover:border-emerald-300 hover:bg-white transition-all duration-300 space-y-4 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 rounded-full bg-slate-200/80 text-slate-700 font-mono text-xs font-semibold">
                        Document Intelligence & Legal
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 font-heading">
                        Document AI & Automated OCR
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Bounding box and key-value transcription across hundreds of thousands of handwritten forms and receipts.
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-200/60 flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50/80 px-3 py-1.5 rounded-lg border border-emerald-200">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 shrink-0"></i>
                    <span>99.8% Field Extraction Precision on Complex Forms</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. Contact Us CTA Banner -->
<section class="py-16 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-teal-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-20 pointer-events-none"></div>
    <div class="absolute -bottom-20 left-1/3 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-emerald-300 border border-white/15 text-xs font-semibold font-mono">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
            <span>Mutual Non-Disclosure • Enterprise Confidentiality</span>
        </div>

        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white font-heading tracking-tight">
            Ready to Scale Your AI Models with Precision Labeled Data?
        </h2>

        <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto leading-relaxed">
            Connect directly with our solutions engineering team to evaluate your scope and receive actionable technical guidance.
        </p>

        <div class="pt-3 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-600 hover:to-emerald-600 text-white font-bold text-sm shadow-lg shadow-emerald-500/20 transition-all font-heading flex items-center gap-2 active:scale-95">
                <span>Request Sample Annotation Pilot</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>

            <button onclick="openQuoteModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading">
                Request Quotation
            </button>

            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/20 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-emerald-400"></i>
                <span>Book Strategy Call</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

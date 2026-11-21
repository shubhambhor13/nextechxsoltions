<?php
$page_title = "Data Annotation — NEXTECHX SOLUTIONS";
$page_desc = "High-precision data labeling, image annotation, and ground-truth validation for AI models.";
require_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Hero Section -->
<section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 bg-gradient-to-b from-slate-50/80 via-white to-white border-b border-slate-200/80 overflow-hidden">
    <div class="absolute inset-0 bg-grid-corporate opacity-30 pointer-events-none"></div>
    <div class="absolute -top-32 right-1/4 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-left space-y-6">
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
            <a href="index.php" class="hover:text-blue-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <a href="services.php" class="hover:text-blue-600 transition-colors">Services</a>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
            <span class="text-slate-900 font-semibold">Data Annotation</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Left Column: Title, Overview & Actions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="check-square" class="w-6 h-6 stroke-[2]"></i>
                    </div>
                    <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-semibold font-mono bg-emerald-50 text-emerald-700 border border-emerald-200">
                        AI & ML Training Datasets
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight font-heading">
                    Data Annotation
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Our Data Annotation practice provides enterprise-grade ground-truth datasets essential for training accurate machine learning and deep learning models. Combining human-in-the-loop specialist labelers with multi-tier quality assurance protocols, we deliver consistently accurate, clean, and format-ready training data for computer vision, natural language processing, and multimodal AI pipelines.
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                        <span>Inquire About Data Annotation</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <button onclick="openQuoteModal()" class="px-6 py-3.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold text-sm transition-colors font-heading">
                        Request Quotation
                    </button>
                </div>
            </div>

            <!-- Right Column: Quick Highlights Panel -->
            <div class="lg:col-span-4">
                <div class="bg-slate-50/90 rounded-2xl p-6 border border-slate-200/90 shadow-2xs space-y-4">
                    <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider font-mono flex items-center gap-2">
                        <i data-lucide="activity" class="w-4 h-4 text-emerald-600"></i>
                        <span>Practice Snapshot</span>
                    </h3>

                    <div class="space-y-3 text-xs text-slate-600">
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Delivery Model</span>
                            <span>Dedicated Labeling Pods • Tiered QA</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Accuracy Benchmark</span>
                            <span>&gt;99% Verified Precision Threshold</span>
                        </div>
                        <div class="p-3 rounded-xl bg-white border border-slate-200/80">
                            <span class="font-bold text-slate-900 block font-heading mb-0.5">Data Privacy</span>
                            <span>Encrypted Storage • ISO/SOC2 Standards</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Core Concepts Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Annotation Fundamentals</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Core Technical Concepts
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Fundamental technical concepts and engineering standards underpinning our Data Annotation implementations.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">01</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Ground-Truth Data Labeling</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Assigning precise, verified semantic metadata to raw data records so machine learning algorithms can learn accurately.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">02</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Computer Vision Annotation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Pixel-accurate visual marking including bounding boxes, polygons, keypoints, and semantic segmentation masks.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">03</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Text & NLP Annotation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Categorizing unstructured textual data with sentiment labels, intent classes, and Named Entity Recognition (NER) tags.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">04</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Temporal Video Annotation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Continuous frame-by-frame object tracking, event timestamping, and trajectory labeling across sequential video feeds.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">05</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Audio & Speech Tagging</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Speech-to-text transcription alignment, acoustic event tagging, speaker identification, and phonetic labeling.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/60 border border-slate-200/90 hover:border-emerald-300 transition-colors space-y-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-700 flex items-center justify-center font-bold text-xs font-mono">06</div>
                <h3 class="text-base font-bold text-slate-900 font-heading">Quality SLA Verification</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-tier consensus audits and algorithmic validation ensuring dataset accuracy consistently exceeds 99%.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Our Offerings Section -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Comprehensive Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our Specific Offerings
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Tailored capabilities and modular technical solutions engineered for your business requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">2D & 3D Bounding Boxes</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Precision rectangular and cuboid boundary labeling for object detection and spatial orientation models.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Polygon & Semantic Segmentation</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Pixel-perfect multi-point polygon tracing for irregular objects, geographic terrain, and biomedical imaging.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Image Classification & Tagging</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Single-label and multi-label categorization across large volumes of visual assets based on strict ontologies.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Text Annotation & NER</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Token-level tagging of entities (people, organizations, locations, dates) and text sentiment classifications.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Video Object Tracking</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Continuous trajectory tracking across high-framerate video clips with persistent object IDs and re-identification.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check" class="w-3.5 h-3.5 stroke-[2.5]"></i>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Custom Formats (COCO, YOLO, VOC)</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Delivering annotated datasets directly in your model's required format (JSON, XML, YOLO txt, Pascal VOC, CSV).</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Special Quality Process Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Accuracy Assurance</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Multi-Tier Quality Process
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                How we enforce strict quality thresholds and achieve &gt;99% labeling accuracy.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-2.5">
                <span class="text-xs font-mono font-bold text-emerald-600 uppercase block">Phase 1: Guidelines</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">We formulate comprehensive annotation guidelines with visual examples, edge cases, and strict acceptance criteria.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-2.5">
                <span class="text-xs font-mono font-bold text-emerald-600 uppercase block">Phase 2: Pilot Labeling</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">A sample dataset batch is labeled and calibrated with your engineering team to verify alignment on edge cases.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-2.5">
                <span class="text-xs font-mono font-bold text-emerald-600 uppercase block">Phase 3: Production Labeling</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Dedicated annotators tag the bulk dataset under continuous peer-review and real-time supervisor sampling.</p>
            </div>
            <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-200 space-y-2.5">
                <span class="text-xs font-mono font-bold text-emerald-600 uppercase block">Phase 4: Multi-Tier QA</span>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated schema integrity checks combined with secondary human audit passes to guarantee >99% precision.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Technology Stack Section -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="terminal" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Production Stack</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Technology Stack & Tooling
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                Battle-tested tools, languages, and frameworks leveraged across our Data Annotation lifecycle.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Annotation Platform</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">CVAT / Label Studio</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Pre-Processing</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Python / OpenCV</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Standard Schemas</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">COCO / YOLO Formats</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Data Export</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Pascal VOC / JSON</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Secure Staging</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">AWS S3 / Cloud Storage</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-50/60 border border-slate-200/80 flex flex-col justify-between">
                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wide">Validation</span>
                <span class="text-sm font-bold text-slate-900 font-heading mt-1">Consensus QA Algorithms</span>
            </div>
        </div>
    </div>
</section>

<!-- 6. End-to-End Workflow Pipeline -->
<section class="py-16 lg:py-20 bg-slate-50/60 border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="workflow" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Structured Execution</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Our End-to-End Workflow
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                From requirement discovery to deployment and continuous maintenance—our disciplined execution process.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 01</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Data Collection & Ingestion</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Secure transfer and staging of raw images, video streams, or text documents into encrypted enterprise storage.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 02</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Guideline & Taxonomy Calibration</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Creating detailed annotation instructions, class ontologies, and edge-case resolution rules.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 03</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Precision Annotation Execution</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Specialist annotators perform high-precision labeling following calibrated guidelines.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 04</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Quality Review & Consensus</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Multi-tier review passes, inter-annotator agreement calculations, and supervisor spot checks.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 05</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Validation & Schema Formatting</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Automated syntax and coordinate checks converting results into standard YOLO, COCO, or custom JSON formats.</p>
            </div>
            <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200/90 shadow-2xs space-y-3 relative">
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700">Step 06</span>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Secure Dataset Delivery</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Encrypted dataset package delivery with comprehensive QA audit certificates and summary reporting.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Real-World Business Applications -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 text-left">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-semibold uppercase tracking-wider font-mono">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-emerald-600"></i>
                <span>Enterprise Impact</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-heading">
                Business Applications
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                High-leverage enterprise computer vision & NLP use cases built with NextTechX annotation.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Autonomous Driving & Robotics</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Annotating pedestrian paths, lane lines, traffic signs, and obstacle boundaries for autonomous navigation models.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">eCommerce Visual Search & Cataloging</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Tagging product apparel, accessories, colors, and visual styles to power recommendation engines and visual search.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Healthcare & Medical Image Analysis</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Precise anatomical region and anomaly polygon delineation across radiographic and microscopic scan sets.</p>
            </div>
            <div class="p-6 sm:p-7 rounded-2xl bg-slate-50/60 border border-slate-200/90 space-y-2">
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-heading">Document AI & Automated OCR</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">Bounding box and key-value transcription across hundreds of thousands of handwritten forms and receipts.</p>
            </div>
        </div>
    </div>
</section>

<!-- 8. Closing CTA Section -->
<section class="py-16 lg:py-20 bg-slate-50/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading tracking-tight">
            Scale Your AI Models with Precision Labeled Data
        </h2>
        <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto leading-relaxed">
            Send us a sample batch for calibration or discuss custom annotation volumes with our dataset managers.
        </p>
        <div class="pt-2 flex flex-wrap items-center justify-center gap-4">
            <a href="contact.php" class="px-7 py-3.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 text-white font-bold text-sm shadow-sm transition-all font-heading flex items-center gap-2">
                <span>Request Sample Annotation Pilot</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <button onclick="openConsultationModal()" class="px-7 py-3.5 rounded-xl border border-slate-300 hover:bg-white text-slate-700 font-semibold text-sm transition-all font-heading flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4 text-emerald-600"></i>
                <span>Book Technical Consultation</span>
            </button>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

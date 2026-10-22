@extends('layouts.app')

@section('title', 'omid norouzi — ' . $project->title)

@push('head')
<meta name="description" content="{{ $project->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($project->excerpt ?? $project->title), 160) }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400;500;600&family=VT323&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/single-portfolio.css') }}">
@endpush

@section('content')

@php
    $galleryUrls = collect($project->gallery ?? [])
        ->filter()
        ->map(fn ($path) => \Illuminate\Support\Facades\Storage::disk('public')->url($path))
        ->values();

    $mainImageUrl = $project->featured_image
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($project->featured_image)
        : ($galleryUrls->first() ?: asset('assets/images/pixel-img.png'));

    $highlights = \App\Models\PortfolioProject::lines($project->highlights);
    $features = \App\Models\PortfolioProject::lines($project->features);
    $techLevels = collect($project->tech_levels ?? []);
    $technologies = collect($project->technologies ?? []);

    $tabs = collect([
        'details' => ['DETAILS', \App\Models\PortfolioProject::paragraphs($project->details), $features],
        'challenges' => ['CHALLENGES', \App\Models\PortfolioProject::paragraphs($project->challenges), []],
        'solutions' => ['SOLUTIONS', \App\Models\PortfolioProject::paragraphs($project->solutions), []],
        'results' => ['RESULTS', \App\Models\PortfolioProject::paragraphs($project->results), []],
    ])->filter(fn ($tab) => count($tab[1]) || count($tab[2]));

    $siteHost = $project->project_url
        ? (parse_url($project->project_url, PHP_URL_HOST) ?: $project->project_url)
        : null;
@endphp

<!-- =====================================================
     BACK LINK
===================================================== -->
<section class="single-portfolio">

    <div class="sp-shell">

        <a href="{{ route('portfolio.index') }}" class="back-link">
            <span class="back-arrow">&lt;</span>
            <span>back to all projects</span>
        </a>


        <!-- =====================================================
             MAIN CONTENT AREA
        ====================================================== -->
        <div class="sp-main">


            <!-- =====================================================
                 LEFT COLUMN — Project Description
            ====================================================== -->
            <div class="sp-left">

                <div class="sp-title-block">
                    <h1 class="sp-title">
                        <span class="sp-prompt">&gt;</span>
                        {{ $project->title }}
                    </h1>

                    @if ($project->project_type)
                        <span class="sp-subtitle">{{ $project->project_type }}</span>
                    @endif

                    @if ($project->excerpt)
                        <p class="sp-description">{{ $project->excerpt }}</p>
                    @endif
                </div>

                <div class="sp-overview">
                    <h3 class="sp-overview-title">
                        <span class="hash">#</span> Project Overview
                    </h3>
                    @php
                        preg_match_all(
                            '/<p\b[^>]*>(.*?)<\/p>/is',
                            $project->description ?? '',
                            $descriptionParagraphs
                        );
                    @endphp

                    @if (!empty($descriptionParagraphs[1]))
                        @foreach ($descriptionParagraphs[1] as $paragraph)
                            <p class="sp-overview-text">{{ trim(strip_tags($paragraph)) }}</p>
                        @endforeach
                    @elseif ($project->description)
                        <p class="sp-overview-text">{{ trim(strip_tags($project->description)) }}</p>
                    @elseif ($project->excerpt)
                        <p class="sp-overview-text">{{ $project->excerpt }}</p>
                    @endif
                </div>

                <div class="sp-actions">

                    {{-- دکمه اول: سایت اصلی پروژه --}}
                    <a
                        href="{{ $project->project_url ?: '#' }}"
                        class="sp-btn sp-btn-primary"
                        @if ($project->project_url)
                            target="_blank" rel="noopener noreferrer"
                        @else
                            onclick="return false;" aria-disabled="true"
                        @endif
                    >
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
                                <path d="M2 12h20"/>
                            </svg>
                        </span>
                        <span class="sp-btn-text">VIEW LIVE SITE</span>
                        <span class="sp-btn-arrow">↗</span>
                    </a>

                    {{-- دکمه دوم: پرونده پروژه (فقط اگر لینک ثبت شده باشد) --}}
                    @if ($project->case_study_url)
                    <a
                        href="{{ $project->case_study_url }}"
                        target="_blank" rel="noopener noreferrer"
                        class="sp-btn sp-btn-secondary"
                    >
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                            </svg>
                        </span>
                        <span class="sp-btn-text">CASE STUDY (PDF)</span>
                        <span class="sp-btn-arrow">↗</span>
                    </a>
                    @endif

                    {{-- دکمه سوم: مخزن کد پروژه --}}
                    <a
                        href="{{ $project->source_url ?: '#' }}"
                        class="sp-btn sp-btn-github"
                        @if ($project->source_url)
                            target="_blank" rel="noopener noreferrer"
                        @else
                            onclick="return false;" aria-disabled="true"
                        @endif
                    >
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </span>
                        <span class="sp-btn-text">VIEW ON GITHUB</span>
                    </a>

                </div>

            </div>


            <!-- =====================================================
                 CENTER COLUMN — Browser Preview
            ====================================================== -->
            <div class="sp-center">

                <!-- Browser Mockup -->
                <div class="sp-browser">
                    <div class="sp-browser-bar">
                        <div class="sp-browser-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="sp-browser-url">
                            <svg class="sp-lock-icon" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <span>{{ $siteHost ?: $project->slug }}</span>
                        </div>
                    </div>
                    <div class="sp-browser-image">
                        <img
                            src="{{ $mainImageUrl }}"
                            alt="{{ $project->title }} — Preview"
                        >
                    </div>
                </div>

                <!-- Thumbnail Gallery -->
                @if ($galleryUrls->count() > 0)
                    <div class="sp-gallery">
                        <button class="sp-gallery-arrow sp-gallery-prev" aria-label="Previous">‹</button>
                        <div class="sp-gallery-track">
                            @foreach ($galleryUrls as $url)
                                <div class="sp-gallery-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ $url }}" alt="{{ $project->title }} — {{ $loop->iteration }}" loading="lazy">
                                </div>
                            @endforeach
                        </div>
                        <button class="sp-gallery-arrow sp-gallery-next" aria-label="Next">›</button>
                    </div>
                @endif

            </div>


            <!-- =====================================================
                 RIGHT COLUMN — Info Sidebar
            ====================================================== -->
            <div class="sp-right">

                <!-- Project Info Card -->
                <div class="sp-info-card">
                    <h3 class="sp-card-title">Project Info</h3>

                    @if ($project->client)
                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Client</span>
                            <span class="sp-info-value">{{ $project->client }}</span>
                        </div>
                    </div>
                    @endif

                    @if ($project->project_type)
                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Category</span>
                            <span class="sp-info-value">{{ $project->project_type }}</span>
                        </div>
                    </div>
                    @endif

                    @if ($project->project_date)
                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Date</span>
                            <span class="sp-info-value">{{ $project->project_date }}</span>
                        </div>
                    </div>
                    @endif

                    @if ($siteHost)
                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Website</span>
                            <span class="sp-info-value">{{ $siteHost }}</span>
                        </div>
                    </div>
                    @endif

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Status</span>
                            <span class="sp-info-value sp-status-live">
                                <span class="sp-status-dot"></span>
                                {{ $project->project_url ? 'LIVE' : 'CASE STUDY' }}
                            </span>
                        </div>
                    </div>
                </div>

                @if (count($highlights))
                    <!-- Highlights Card -->
                    <div class="sp-highlights-card">
                        <h3 class="sp-card-title">Highlights</h3>
                        <ul class="sp-highlights-list">
                            @foreach ($highlights as $highlight)
                                <li>
                                    <span class="sp-highlight-bullet">◉</span>
                                    {{ $highlight }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

        </div>


        <!-- =====================================================
             BOTTOM SECTION — Tabs, Tech Stack, Gallery
        ====================================================== -->
        <div class="sp-bottom">

            @if ($tabs->isNotEmpty())
            <!-- Tabs Section -->
            <div class="sp-tabs-section">
                <div class="sp-tab-nav">
                    @foreach ($tabs as $key => $tab)
                        <button class="sp-tab {{ $loop->first ? 'active' : '' }}" data-tab="{{ $key }}">{{ $tab[0] }}</button>
                    @endforeach
                </div>

                @foreach ($tabs as $key => $tab)
                    <div class="sp-tab-content" id="{{ $key }}" @unless ($loop->first) style="display:none;" @endunless>
                        @foreach ($tab[1] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach

                        @if (count($tab[2]))
                            <ul class="sp-details-list">
                                @foreach ($tab[2] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
            @endif

            @if ($technologies->isNotEmpty())
            <!-- Tech Stack Section -->
            <div class="sp-tech-section">
                <h3 class="sp-section-title">Tech Stack</h3>

                @foreach ($technologies as $tech)
                    @php
                        $level = $techLevels->get($tech);
                        $level = is_numeric($level) ? max(0, min(100, (int) $level)) : null;
                    @endphp
                    <div class="sp-tech-item">
                        <div class="sp-tech-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M3 12h18"/></svg>
                        </div>
                        <span class="sp-tech-name">{{ $tech }}</span>
                        @if ($level !== null)
                            <div class="sp-tech-bar">
                                <div class="sp-tech-bar-fill" style="--progress: {{ $level }}%;"></div>
                            </div>
                            <span class="sp-tech-percent">{{ $level }}%</span>
                        @endif
                    </div>
                @endforeach
            </div>
            @endif

            @if ($galleryUrls->count() > 0)
            <!-- Gallery Section -->
            <div class="sp-gallery-section">
                <h3 class="sp-section-title">Gallery</h3>
                <div class="sp-gallery-grid">
                    @foreach ($galleryUrls as $url)
                        <div class="sp-gallery-thumb {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ $url }}" alt="{{ $project->title }} — Gallery {{ $loop->iteration }}" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

    </div>

</section>

@endsection

@push('scripts')
<script>
    // === HAMBURGER MENU ===
    (function() {
        var hamburger = document.querySelector('.hamburger');
        var navLinks = document.querySelector('.nav-links');
        var overlay = document.querySelector('.mobile-overlay');
        if (!hamburger || !navLinks) return;
        function toggleMenu() {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            if (overlay) overlay.classList.toggle('active');
            document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
        }
        hamburger.addEventListener('click', toggleMenu);
        if (overlay) overlay.addEventListener('click', toggleMenu);
        navLinks.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) toggleMenu();
            });
        });
    })();

    // Tab Switching
    document.querySelectorAll('.sp-tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.sp-tab').forEach(function(t) {
                t.classList.remove('active');
            });
            document.querySelectorAll('.sp-tab-content').forEach(function(c) {
                c.style.display = 'none';
            });
            this.classList.add('active');
            document.getElementById(this.dataset.tab).style.display = 'block';
        });
    });

    // === GALLERY: Click thumbnail to replace main image ===
    var mainImage = document.querySelector('.sp-browser-image img');
    var trackItems = document.querySelectorAll('.sp-gallery .sp-gallery-item');
    var gridThumbs = document.querySelectorAll('.sp-gallery-section .sp-gallery-thumb');
    var currentTrackIndex = 0;

    function setMainImage(src) {
        if (mainImage && src) {
            mainImage.src = src;
            mainImage.style.opacity = '0';
            setTimeout(function() {
                mainImage.style.transition = 'opacity 0.3s ease';
                mainImage.style.opacity = '1';
            }, 50);
        }
    }

    function setActiveTrack(index) {
        trackItems.forEach(function(item) { item.classList.remove('active'); });
        if (trackItems[index]) {
            trackItems[index].classList.add('active');
            currentTrackIndex = index;
        }
    }

    function setActiveGrid(thumb) {
        gridThumbs.forEach(function(t) { t.classList.remove('active'); });
        thumb.classList.add('active');
    }

    // Track thumbnail clicks → update main image
    trackItems.forEach(function(item, i) {
        item.addEventListener('click', function() {
            setActiveTrack(i);
            var img = item.querySelector('img');
            if (img) setMainImage(img.src);
            // Sync grid thumbnails
            if (gridThumbs[i]) {
                setActiveGrid(gridThumbs[i]);
            }
        });
    });

    // Grid thumbnail clicks → update main image
    gridThumbs.forEach(function(thumb, i) {
        thumb.addEventListener('click', function() {
            setActiveGrid(thumb);
            var img = thumb.querySelector('img');
            if (img) setMainImage(img.src);
            // Sync track thumbnails
            setActiveTrack(i);
        });
    });

    // Arrow navigation
    var prevButton = document.querySelector('.sp-gallery-prev');
    var nextButton = document.querySelector('.sp-gallery-next');

    if (trackItems.length > 0 && prevButton) {
        prevButton.addEventListener('click', function() {
            var newIndex = (currentTrackIndex - 1 + trackItems.length) % trackItems.length;
            setActiveTrack(newIndex);
            var img = trackItems[newIndex].querySelector('img');
            if (img) setMainImage(img.src);
            if (gridThumbs[newIndex]) setActiveGrid(gridThumbs[newIndex]);
        });
    }

    if (trackItems.length > 0 && nextButton) {
        nextButton.addEventListener('click', function() {
            var newIndex = (currentTrackIndex + 1) % trackItems.length;
            setActiveTrack(newIndex);
            var img = trackItems[newIndex].querySelector('img');
            if (img) setMainImage(img.src);
            if (gridThumbs[newIndex]) setActiveGrid(gridThumbs[newIndex]);
        });
    }
</script>
@endpush

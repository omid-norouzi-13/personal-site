@extends('layouts.app')

@section('title', 'Omid.dev — دانشگاه کشاورزی تهران')

@push('head')
    <meta name="description" content="Omid.dev - دانشگاه کشاورزی تهران — iProcul Project Details">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400;500;600&family=VT323&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/single-portfolio.css') }}">
@endpush

@section('content')

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
                        دانشگاه کشاورزی تهران
                    </h1>
                    <span class="sp-subtitle">خبری / فروشگاهی</span>
                    <p class="sp-description">
                        وب‌سایت خبری و فروشگاهی دانشگاه کشاورزی
                        تهران با قابلیت فروش آنلاین از طریق
                        درگاه پرداخت و مجوزهای لازم.
                    </p>
                </div>

                <div class="sp-overview">
                    <h3 class="sp-overview-title">
                        <span class="hash">#</span> Project Overview
                    </h3>
                    <p class="sp-overview-text">
                        این پروژه به صورت کامل از صفر تا صد توسط
                        شخص خودم آنالیز، دیباگ و طراحی شد. طرح
                        انجام شده برای پروژه توسط دکتر مجتبی دلشاد
                        در اختیار ما قرار داده شد و توسط بنده به
                        صورت کامل طرح پیاده‌سازی و لحاظ شد.
                    </p>
                    <p class="sp-overview-text">
                        تمام قسمت‌های مهم سایت در یک بخش حدوداً
                        700 پیکسلی پیاده‌سازی و نمایش داده می‌شه.
                        درگاه پرداخت برای سایت لحاظ شده و تمام
                        مجوزهای مورد نیاز برای فعالیت در سایت
                        گرفته شده و نمایش داده شده.
                    </p>
                    <p class="sp-overview-text">
                        تمام سناریوهای مهم در سایت برای آنلاین
                        کردن و لحاظ کردن قابلیت‌ها به طور کامل
                        توسط بنده ایده‌دهی و انجام شده و هم اکنون
                        پروژه به صورت آنلاین درحال فعالیت هست.
                    </p>
                </div>

                <div class="sp-actions">
                    <a href="https://iprocul.ir" class="sp-btn sp-btn-primary" target="_blank" rel="noopener noreferrer">
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                        </span>
                        <span class="sp-btn-text">VIEW LIVE SITE</span>
                        <span class="sp-btn-arrow">↗</span>
                    </a>
                    <a href="#" class="sp-btn sp-btn-secondary">
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        </span>
                        <span class="sp-btn-text">CASE STUDY (PDF)</span>
                        <span class="sp-btn-arrow">↗</span>
                    </a>
                    <a href="#" class="sp-btn sp-btn-github">
                        <span class="sp-btn-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
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
                            <span>https://iprocul.ir</span>
                        </div>
                    </div>
                    <div class="sp-browser-image">
                        <img src="{{ asset('assets/images/iprocul1.jpg') }}" alt="دانشگاه کشاورزی تهران — iProcul Preview">
                    </div>
                </div>

                <!-- Thumbnail Gallery -->
                <div class="sp-gallery">
                    <button class="sp-gallery-arrow sp-gallery-prev" aria-label="Previous">‹</button>
                    <div class="sp-gallery-track">
                        <div class="sp-gallery-item active">
                            <img src="{{ asset('assets/images/iprocul1.jpg') }}" alt="Thumbnail 1">
                        </div>
                        <div class="sp-gallery-item">
                            <img src="{{ asset('assets/images/iprocul2.jpg') }}" alt="Thumbnail 2">
                        </div>
                        <div class="sp-gallery-item">
                            <img src="{{ asset('assets/images/iprocul3.jpg') }}" alt="Thumbnail 3">
                        </div>
                        <div class="sp-gallery-item">
                            <img src="{{ asset('assets/images/iprocul4.jpg') }}" alt="Thumbnail 4">
                        </div>
                        <div class="sp-gallery-item">
                            <img src="{{ asset('assets/images/iprocul5.jpg') }}" alt="Thumbnail 5">
                        </div>
                    </div>
                    <button class="sp-gallery-arrow sp-gallery-next" aria-label="Next">›</button>
                </div>

            </div>


            <!-- =====================================================
                 RIGHT COLUMN — Info Sidebar
            ====================================================== -->
            <div class="sp-right">

                <!-- Project Info Card -->
                <div class="sp-info-card">
                    <h3 class="sp-card-title">Project Info</h3>

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Client</span>
                            <span class="sp-info-value">دانشگاه کشاورزی تهران</span>
                        </div>
                    </div>

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Category</span>
                            <span class="sp-info-value">خبری / فروشگاهی</span>
                        </div>
                    </div>

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Date</span>
                            <span class="sp-info-value">1403 / 2024</span>
                        </div>
                    </div>

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Website</span>
                            <span class="sp-info-value">iprocul.ir</span>
                        </div>
                    </div>

                    <div class="sp-info-row">
                        <div class="sp-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <div class="sp-info-content">
                            <span class="sp-info-label">Status</span>
                            <span class="sp-info-value sp-status-live">
                                <span class="sp-status-dot"></span>
                                LIVE
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Highlights Card -->
                <div class="sp-highlights-card">
                    <h3 class="sp-card-title">Highlights</h3>
                    <ul class="sp-highlights-list">
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            آنالیز و دیباگ کامل از صفر تا صد
                        </li>
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            طراحی پیاده‌سازی شده توسط دکتر دلشاد
                        </li>
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            درگاه پرداخت آنلاین
                        </li>
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            مجوزهای لازم برای فعالیت سایت
                        </li>
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            بخش خبری و فروشگاهی (WooCommerce)
                        </li>
                        <li>
                            <span class="sp-highlight-bullet">◉</span>
                            ریسپانسیو و بهینه‌سازی شده
                        </li>
                    </ul>
                </div>

            </div>

        </div>


        <!-- =====================================================
             BOTTOM SECTION — Tabs, Tech Stack, Gallery
        ====================================================== -->
        <div class="sp-bottom">

            <!-- Tabs Section -->
            <div class="sp-tabs-section">
                <div class="sp-tab-nav">
                    <button class="sp-tab active" data-tab="details">DETAILS</button>
                    <button class="sp-tab" data-tab="challenges">CHALLENGES</button>
                    <button class="sp-tab" data-tab="solutions">SOLUTIONS</button>
                    <button class="sp-tab" data-tab="results">RESULTS</button>
                </div>

                <div class="sp-tab-content" id="details">
                    <p>
                        این پروژه به صورت کامل از صفر تا صد توسط شخص خودم
                        آنالیز، دیباگ و طراحی شد. طرح انجام شده توسط
                        دکتر مجتبی دلشاد ارائه و توسط بنده پیاده‌سازی شد.
                    </p>
                    <ul class="sp-details-list">
                        <li>طراحی و پیاده‌سازی کامل قالب WordPress</li>
                        <li>بخش خبری با سیستم مدیریت محتوا</li>
                        <li>فروشگاه آنلاین با WooCommerce</li>
                        <li>درگاه پرداخت آنلاین</li>
                        <li>اخذ تمام مجوزهای لازم برای فعالیت</li>
                        <li>بهینه‌سازی عملکرد و سرعت سایت</li>
                    </ul>
                </div>

                <div class="sp-tab-content" id="challenges" style="display:none;">
                    <p>
                        بزرگترین چالش این پروژه پیاده‌سازی دقیق طرح ارائه
                        شده توسط دکتر دلشاد بود که شامل بخش‌های مختلف
                        خبری، فروشگاهی و اطلاع‌رسانی بود. تمام قسمت‌های
                        مهم سایت باید در یک بخش حدوداً 700 پیکسلی
                        پیاده‌سازی و نمایش داده می‌شد.
                    </p>
                </div>

                <div class="sp-tab-content" id="solutions" style="display:none;">
                    <p>
                        تمام سناریوهای مهم در سایت برای آنلاین کردن و
                        لحاظ کردن قابلیت‌ها به طور کامل توسط بنده
                        ایده‌دهی و انجام شد. درگاه پرداخت، مجوزهای
                        لازم و سیستم فروشگاهی همگی از صفر پیاده‌سازی شدند.
                    </p>
                </div>

                <div class="sp-tab-content" id="results" style="display:none;">
                    <p>
                        پروژه هم اکنون به صورت آنلاین درحال فعالیت هست
                        و تمام بخش‌های مورد نیاز از جمله بخش خبری،
                        فروشگاهی، درگاه پرداخت و مجوزها فعال هستند.
                    </p>
                </div>
            </div>

            <!-- Tech Stack Section -->
            <div class="sp-tech-section">
                <h3 class="sp-section-title">Tech Stack</h3>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M3 12h18"/></svg>
                    </div>
                    <span class="sp-tech-name">WordPress</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 95%;"></div>
                    </div>
                    <span class="sp-tech-percent">95%</span>
                </div>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <span class="sp-tech-name">WooCommerce</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 90%;"></div>
                    </div>
                    <span class="sp-tech-percent">90%</span>
                </div>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <span class="sp-tech-name">PHP</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 85%;"></div>
                    </div>
                    <span class="sp-tech-percent">85%</span>
                </div>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 13h4"/></svg>
                    </div>
                    <span class="sp-tech-name">JavaScript</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 70%;"></div>
                    </div>
                    <span class="sp-tech-percent">70%</span>
                </div>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M13 2v7h7"/></svg>
                    </div>
                    <span class="sp-tech-name">HTML5</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 90%;"></div>
                    </div>
                    <span class="sp-tech-percent">90%</span>
                </div>

                <div class="sp-tech-item">
                    <div class="sp-tech-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16v16H4z"/><path d="M4 9h16"/><path d="M9 4v16"/></svg>
                    </div>
                    <span class="sp-tech-name">CSS3</span>
                    <div class="sp-tech-bar">
                        <div class="sp-tech-bar-fill" style="--progress: 85%;"></div>
                    </div>
                    <span class="sp-tech-percent">85%</span>
                </div>
            </div>

            <!-- Gallery Section -->
            <div class="sp-gallery-section">
                <h3 class="sp-section-title">Gallery</h3>
                <div class="sp-gallery-grid">
                    <div class="sp-gallery-thumb active">
                        <img src="{{ asset('assets/images/pixel-img.png') }}" alt="Gallery 1">
                    </div>
                    <div class="sp-gallery-thumb">
                        <img src="{{ asset('assets/images/pixel-img.png') }}" alt="Gallery 2">
                    </div>
                    <div class="sp-gallery-thumb">
                        <img src="{{ asset('assets/images/pixel-img.png') }}" alt="Gallery 3">
                    </div>
                    <div class="sp-gallery-thumb">
                        <img src="{{ asset('assets/images/pixel-img.png') }}" alt="Gallery 4">
                    </div>
                </div>
            </div>

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
    document.querySelector('.sp-gallery-prev').addEventListener('click', function() {
        var newIndex = (currentTrackIndex - 1 + trackItems.length) % trackItems.length;
        setActiveTrack(newIndex);
        var img = trackItems[newIndex].querySelector('img');
        if (img) setMainImage(img.src);
        if (gridThumbs[newIndex]) setActiveGrid(gridThumbs[newIndex]);
    });

    document.querySelector('.sp-gallery-next').addEventListener('click', function() {
        var newIndex = (currentTrackIndex + 1) % trackItems.length;
        setActiveTrack(newIndex);
        var img = trackItems[newIndex].querySelector('img');
        if (img) setMainImage(img.src);
        if (gridThumbs[newIndex]) setActiveGrid(gridThumbs[newIndex]);
    });
</script>
@endpush

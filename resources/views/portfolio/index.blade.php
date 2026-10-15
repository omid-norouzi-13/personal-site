@extends('layouts.app')

@section('title', 'omid norouzi — Featured Projects')

@push('head')
    <meta name="description" content="Omid - Developer Portfolio. Featured projects, websites and applications.">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=VT323&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/portfolio.css') }}">
@endpush

@section('content')

<section class="projects-section" id="projects">

    <div class="projects-shell">

        <!-- Section Header -->
        <header class="projects-header">

            <div class="projects-intro">

                <div class="terminal-label">
                    <span class="prompt-symbol">&gt;</span>
                    <span>featured_projects</span>
                    <span class="cursor"></span>
                </div>

                <h2>
                    // Featured Projects
                </h2>

                <p>
                    A selection of websites, applications and tools
                    I've built, customized and deployed.
                </p>

                <div class="project-counter">
                    <span>&gt;</span>
                    total_projects:
                    <strong>01</strong>
                </div>

            </div>

            <!-- Filters -->
            <div class="project-filters" role="tablist">

                <button class="project-filter active" data-filter="all">
                    ALL
                </button>

                <button class="project-filter" data-filter="wordpress">
                    WORDPRESS
                </button>

                <button class="project-filter" data-filter="webapp">
                    WEB APPS
                </button>

                <button class="project-filter" data-filter="plugin">
                    PLUGINS
                </button>

                <button class="project-filter" data-filter="design">
                    DESIGN
                </button>

            </div>

        </header>


        <!-- Projects Grid -->
        <div class="projects-grid">


            <!-- Project 01 -->
            <article class="project-card"
                     data-category="wordpress">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        iprocul.ir
                    </span>

                    <span class="project-status live">
                        <i></i>
                        LIVE
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>

                            <small>
                                https://iprocul.ir
                            </small>
                        </div>

                        <div class="project-image">
                            <img
                                src="{{ asset('assets/images/iprocul.jpg') }}"
                                alt="iProcul — دانشگاه کشاورزی تهران"
                                loading="lazy"
                            >
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            01 / 06
                        </div>

                        <h3>
                            دانشگاه کشاورزی تهران
                        </h3>

                        <span class="project-type">
                            خبری / فروشگاهی
                        </span>

                        <p>
                            این پروژه به صورت کامل از صفر تا صد
                            توسط شخص خودم آنالیز، دیباگ و طراحی
                            شد. طرح پیاده‌سازی شده توسط دکتر
                            مجتبی دلشاد ارائه و توسط بنده به
                            صورت کامل اجرا شد.
                        </p>


                        <div class="project-tech">

                            <span>WordPress</span>
                            <span>WooCommerce</span>
                            <span>PHP</span>
                            <span>Custom Theme</span>
                            <span>Payment Gateway</span>

                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a
                        href="https://iprocul.ir"
                        class="project-btn primary"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        VIEW LIVE
                        <span>↗</span>
                    </a>

                    <a
                        href="{{ route('portfolio.show', 'iprocul') }}"
                        class="project-btn secondary"
                    >
                        CASE STUDY
                        <span>→</span>
                    </a>

                </div>

            </article>


            <!-- Project 02 — Coming Soon -->
            <article class="project-card coming-soon"
                     data-category="wordpress">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        coming-soon
                    </span>

                    <span class="project-status dev">
                        ◇ COMING SOON
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <small>https://coming-soon.ir</small>
                        </div>

                        <div class="project-image" style="display:flex;align-items:center;justify-content:center;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;">
                            <!-- <img src="" alt="Coming Soon"> -->
                            COMING SOON
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            02 / 06
                        </div>

                        <h3>COMING SOON</h3>

                        <span class="project-type">
                            Coming Soon
                        </span>

                        <p>COMING SOON</p>

                        <div class="project-tech">
                            <span>—</span>
                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a href="#" class="project-btn primary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>↗</span>
                    </a>

                    <a href="#" class="project-btn secondary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>→</span>
                    </a>

                </div>

            </article>


            <!-- Project 03 — Coming Soon -->
            <article class="project-card coming-soon"
                     data-category="wordpress">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        coming-soon
                    </span>

                    <span class="project-status dev">
                        ◇ COMING SOON
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <small>https://coming-soon.ir</small>
                        </div>

                        <div class="project-image" style="display:flex;align-items:center;justify-content:center;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;">
                            <!-- <img src="" alt="Coming Soon"> -->
                            COMING SOON
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            03 / 06
                        </div>

                        <h3>COMING SOON</h3>

                        <span class="project-type">
                            Coming Soon
                        </span>

                        <p>COMING SOON</p>

                        <div class="project-tech">
                            <span>—</span>
                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a href="#" class="project-btn primary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>↗</span>
                    </a>

                    <a href="#" class="project-btn secondary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>→</span>
                    </a>

                </div>

            </article>


            <!-- Project 04 — Coming Soon -->
            <article class="project-card coming-soon"
                     data-category="webapp">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        coming-soon
                    </span>

                    <span class="project-status dev">
                        ◇ COMING SOON
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <small>https://coming-soon.ir</small>
                        </div>

                        <div class="project-image" style="display:flex;align-items:center;justify-content:center;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;">
                            <!-- <img src="" alt="Coming Soon"> -->
                            COMING SOON
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            04 / 06
                        </div>

                        <h3>COMING SOON</h3>

                        <span class="project-type">
                            Coming Soon
                        </span>

                        <p>COMING SOON</p>

                        <div class="project-tech">
                            <span>—</span>
                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a href="#" class="project-btn primary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>↗</span>
                    </a>

                    <a href="#" class="project-btn secondary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>→</span>
                    </a>

                </div>

            </article>


            <!-- Project 05 — Coming Soon -->
            <article class="project-card coming-soon"
                     data-category="design">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        coming-soon
                    </span>

                    <span class="project-status dev">
                        ◇ COMING SOON
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <small>https://coming-soon.ir</small>
                        </div>

                        <div class="project-image" style="display:flex;align-items:center;justify-content:center;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;">
                            <!-- <img src="" alt="Coming Soon"> -->
                            COMING SOON
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            05 / 06
                        </div>

                        <h3>COMING SOON</h3>

                        <span class="project-type">
                            Coming Soon
                        </span>

                        <p>COMING SOON</p>

                        <div class="project-tech">
                            <span>—</span>
                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a href="#" class="project-btn primary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>↗</span>
                    </a>

                    <a href="#" class="project-btn secondary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>→</span>
                    </a>

                </div>

            </article>


            <!-- Project 06 — Coming Soon -->
            <article class="project-card coming-soon"
                     data-category="plugin">

                <div class="project-window-bar">

                    <div class="window-controls">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <span class="project-domain">
                        coming-soon
                    </span>

                    <span class="project-status dev">
                        ◇ COMING SOON
                    </span>

                </div>


                <div class="project-content">

                    <div class="project-preview">

                        <div class="browser-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <small>https://coming-soon.ir</small>
                        </div>

                        <div class="project-image" style="display:flex;align-items:center;justify-content:center;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;">
                            <!-- <img src="" alt="Coming Soon"> -->
                            COMING SOON
                        </div>

                    </div>


                    <div class="project-info">

                        <div class="project-number">
                            06 / 06
                        </div>

                        <h3>COMING SOON</h3>

                        <span class="project-type">
                            Coming Soon
                        </span>

                        <p>COMING SOON</p>

                        <div class="project-tech">
                            <span>—</span>
                        </div>

                    </div>

                </div>


                <div class="project-actions">

                    <a href="#" class="project-btn primary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>↗</span>
                    </a>

                    <a href="#" class="project-btn secondary" style="pointer-events:none;opacity:0.3;">
                        COMING SOON
                        <span>→</span>
                    </a>

                </div>

            </article>

        </div>


        <!-- Projects Footer -->
        <div class="projects-footer">

            <div class="terminal-command">

                <span class="command-prompt">$</span>

                <span class="command-text">
                    ./view-all-projects
                </span>

                <span class="cursor"></span>

            </div>

            <a href="#" class="all-projects-link">
                VIEW ALL PROJECTS
                <span>→</span>
            </a>

        </div>

    </div>

</section>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/portfolio.js') }}"></script>
@endpush

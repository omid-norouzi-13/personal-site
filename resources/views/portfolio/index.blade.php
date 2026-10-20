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
                    <strong>{{ str_pad((string) $projects->count(), 2, '0', STR_PAD_LEFT) }}</strong>
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

            @forelse ($projects as $project)
                @php
                    $technologies = $project->technologies ?? [];

                    $lowerTechnologies = collect($technologies)
                        ->map(fn ($technology) => mb_strtolower((string) $technology));

                    if ($lowerTechnologies->contains(
                        fn ($technology) => str_contains($technology, 'plugin')
                    )) {
                        $category = 'plugin';
                    } elseif ($lowerTechnologies->contains(
                        fn ($technology) =>
                            str_contains($technology, 'design') ||
                            str_contains($technology, 'figma') ||
                            str_contains($technology, 'ui/ux')
                    )) {
                        $category = 'design';
                    } elseif ($lowerTechnologies->contains(
                        fn ($technology) =>
                            str_contains($technology, 'wordpress') ||
                            str_contains($technology, 'woocommerce')
                    )) {
                        $category = 'wordpress';
                    } else {
                        $category = 'webapp';
                    }

                    $projectDomain = $project->project_url
                        ? (parse_url($project->project_url, PHP_URL_HOST) ?: $project->slug)
                        : $project->slug;
                @endphp

                <article class="project-card"
                         data-category="{{ $category }}">

                    <div class="project-window-bar">
                        <div class="window-controls">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <span class="project-domain">
                            {{ $projectDomain }}
                        </span>

                        <span class="project-status {{ $project->project_url ? 'live' : 'dev' }}">
                            @if ($project->project_url)
                                <i></i>
                                LIVE
                            @else
                                ◇ CASE STUDY
                            @endif
                        </span>
                    </div>

                    <div class="project-content">
                        <div class="project-preview">
                            <div class="browser-bar">
                                <span></span>
                                <span></span>
                                <span></span>

                                <small>
                                    {{ $project->project_url ?: route('portfolio.show', ['slug' => $project->slug]) }}
                                </small>
                            </div>

                            <div class="project-image">
                                @if ($project->featured_image)
                                    <img
                                        src="{{ asset('storage/' . ltrim($project->featured_image, '/')) }}"
                                        alt="{{ $project->title }}"
                                        loading="lazy"
                                    >
                                @else
                                    <div style="display:flex;align-items:center;justify-content:center;min-height:180px;background:#080b0a;color:#3a3520;font-size:12px;letter-spacing:0.05em;width:100%;">
                                        NO PREVIEW
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="project-info">
                            <div class="project-number">
                                {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                /
                                {{ str_pad((string) $projects->count(), 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <h3>{{ $project->title }}</h3>

                            <span class="project-type">
                                {{ implode(' / ', array_slice($technologies, 0, 2)) ?: 'PROJECT' }}
                            </span>

                            <p>
                                {{ $project->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($project->description ?? ''), 180) }}
                            </p>

                            <div class="project-tech">
                                @forelse ($technologies as $technology)
                                    <span>{{ $technology }}</span>
                                @empty
                                    <span>—</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="project-actions">
                        @if ($project->project_url)
                            <a
                                href="{{ $project->project_url }}"
                                class="project-btn primary"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                VIEW LIVE
                                <span>↗</span>
                            </a>
                        @endif

                        <a
                            href="{{ route('portfolio.show', ['slug' => $project->slug]) }}"
                            class="project-btn secondary"
                        >
                            CASE STUDY
                            <span>→</span>
                        </a>
                    </div>

                </article>

            @empty
                <article class="project-card">
                    <div class="project-info">
                        <h3>NO PUBLISHED PROJECTS</h3>
                        <p>There are no published projects yet.</p>
                    </div>
                </article>
            @endforelse

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

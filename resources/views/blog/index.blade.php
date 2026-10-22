@extends('layouts.app')

@section('title', 'Blog Archive | omid.dev')

@push('head')
    <meta name="description" content="Articles, tutorials and thoughts about web development, WordPress and more.">
    <link rel="stylesheet" href="{{ asset('assets/css/archive-blog.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('nav')
    @include('partials.nav-blog')
@endsection

@section('content')

    <!-- ==================================================
         HERO SECTION
    ================================================== -->

    <div class="blog-hero">

        <!-- LEFT SIDE -->
        <div class="blog-hero-left">

            <h1 class="hero-title">
                &gt; Blog_Archive<span class="cursor">_</span>
            </h1>

            <p class="hero-desc">
                Articles, tutorials and thoughts
                about Web Development, WordPress
                and more.
            </p>

            <p class="hero-total">
                &gt; total_posts: <span>{{ $totalPosts }}</span>
            </p>

        </div>

        <!-- RIGHT SIDE - CATEGORIES MONITOR -->
        <div class="blog-hero-right">

            <div class="monitor-frame">

                <div class="monitor-screen">

                    <p class="monitor-label">
                        // Categories
                    </p>

                    <p class="monitor-item">
                        <a href="{{ route('blog.index') }}">&gt; All</a>
                    </p>

                    @foreach ($categories as $category)
                        <p class="monitor-item">
                            <a href="{{ route('blog.index', ['category' => $category->slug]) }}">&gt; {{ $category->name }}</a>
                        </p>
                    @endforeach

                </div>

            </div>

        </div>

    </div>


    <!-- ==================================================
         FILTER SECTION
    ================================================== -->

    <form class="filter-section" method="GET" action="{{ route('blog.index') }}">

        <!-- SEARCH -->
        <div class="filter-box">
            <label class="filter-label" for="blog-search">&gt; Search</label>
            <div class="search-input-wrap">
                <input
                    type="text"
                    id="blog-search"
                    name="q"
                    value="{{ $search }}"
                    class="search-input"
                    placeholder="search articles..."
                >
                <button class="search-btn" type="submit" aria-label="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <!-- CATEGORY FILTER -->
        <div class="filter-box">
            <label class="filter-label" for="blog-category">&gt; Filter by Category</label>
            <select class="filter-select" id="blog-category" name="category" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}" @selected($activeCategory === $category->slug)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </form>


    <!-- ==================================================
         BLOG POSTS
    ================================================== -->

    <div class="posts-list">

        @forelse ($posts as $post)

            <article class="post-card">

                <div class="post-thumb">
                    @if ($post->image_url)
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" loading="lazy">
                    @else
                        <div class="post-thumb-empty">NO IMAGE</div>
                    @endif
                </div>

                <div class="post-info">

                    <p class="post-meta">
                        {{ $post->display_date->format('M d, Y') }}
                        @if ($post->category)
                            &nbsp;&bull;&nbsp; {{ $post->category->name }}
                        @endif
                    </p>

                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>

                    <p class="post-excerpt">
                        {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 160) }}
                    </p>

                    <a href="{{ route('blog.show', $post->slug) }}" class="post-link">
                        &gt; read more
                    </a>

                </div>

                <div class="post-readtime">
                    <span class="readtime-num">{{ str_pad((string) $post->reading_time, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="readtime-label">min read</span>
                </div>

            </article>

        @empty

            <article class="post-card">
                <div class="post-info">
                    <h2 class="post-title">No articles found</h2>
                    <p class="post-excerpt">
                        @if ($search !== '' || $activeCategory !== '')
                            Nothing matches your filters.
                            <a href="{{ route('blog.index') }}" class="post-link">&gt; clear filters</a>
                        @else
                            No articles have been published yet.
                        @endif
                    </p>
                </div>
            </article>

        @endforelse

    </div>


    <!-- ==================================================
         PAGINATION
    ================================================== -->

    @if ($posts->hasPages())
        @php
            $current = $posts->currentPage();
            $last = $posts->lastPage();
            $from = max(1, $current - 2);
            $to = min($last, $current + 2);
        @endphp

        <nav class="pagination" aria-label="Pagination">

            @if ($posts->onFirstPage())
                <button class="page-btn" disabled>&lt;</button>
            @else
                <a class="page-btn" href="{{ $posts->previousPageUrl() }}" rel="prev">&lt;</a>
            @endif

            @if ($from > 1)
                <a class="page-btn" href="{{ $posts->url(1) }}">1</a>
                @if ($from > 2)
                    <span class="page-btn" aria-hidden="true">…</span>
                @endif
            @endif

            @for ($page = $from; $page <= $to; $page++)
                @if ($page === $current)
                    <span class="page-btn active" aria-current="page">{{ $page }}</span>
                @else
                    <a class="page-btn" href="{{ $posts->url($page) }}">{{ $page }}</a>
                @endif
            @endfor

            @if ($to < $last)
                @if ($to < $last - 1)
                    <span class="page-btn" aria-hidden="true">…</span>
                @endif
                <a class="page-btn" href="{{ $posts->url($last) }}">{{ $last }}</a>
            @endif

            @if ($posts->hasMorePages())
                <a class="page-btn" href="{{ $posts->nextPageUrl() }}" rel="next">&gt;</a>
            @else
                <button class="page-btn" disabled>&gt;</button>
            @endif

        </nav>
    @endif

@include('partials.footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/archive-blog.js') }}"></script>
@endpush

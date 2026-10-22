@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' | omid.dev')

@push('head')
    @php
        $metaDescription = $post->meta_description
            ?: ($post->excerpt ?: \Illuminate\Support\Str::limit(trim(strip_tags($post->content)), 160));
    @endphp
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ route('blog.show', $post->slug) }}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    @if ($post->image_url)
        <meta property="og:image" content="{{ $post->image_url }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/single-blog.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('nav')
    @include('partials.nav-blog')
@endsection

@section('content')

    @php
        $shareUrl = urlencode(route('blog.show', $post->slug));
        $shareTitle = urlencode($post->title);
    @endphp

    <!-- ==================================================
         BACK LINK
    ================================================== -->

    <div class="back-link-wrap">
        <a href="{{ route('blog.index') }}" class="back-link">
            &lt; back to blog
        </a>
    </div>


    <!-- ==================================================
         ARTICLE LAYOUT
    ================================================== -->

    <div class="article-layout">


        <!-- ==================================================
             MAIN CONTENT
        ================================================== -->

        <main class="article-main">


            <!-- ARTICLE HEADER -->
            <div class="article-header">

                <h1 class="article-title">
                    {{ $post->title }}
                </h1>

                <div class="article-meta">
                    <span class="meta-item">
                        <i class="fa-regular fa-calendar"></i>
                        {{ $post->display_date->format('M d, Y') }}
                    </span>
                    @if ($post->category)
                        <span class="meta-item">
                            <i class="fa-solid fa-folder"></i>
                            {{ $post->category->name }}
                        </span>
                    @endif
                    <span class="meta-item">
                        <i class="fa-regular fa-clock"></i>
                        {{ $post->reading_time }} min read
                    </span>
                </div>

            </div>


            <!-- FEATURED IMAGE -->
            @if ($post->image_url)
                <div class="featured-image">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                </div>
            @endif


            <!-- ARTICLE CONTENT (فقط ادمین می‌تواند محتوا را ویرایش کند) -->
            <div class="article-content">
                {!! $contentHtml !!}
            </div>


            <!-- SHARE SECTION -->
            <div class="share-section">

                <span class="share-label">
                    &gt; Share this article
                </span>

                <div class="share-buttons">
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                       class="share-btn twitter" target="_blank" rel="noopener noreferrer" aria-label="Share on X">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                       class="share-btn linkedin" target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                       class="share-btn facebook" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="share-btn copy" aria-label="Copy link">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>

            </div>


        </main>


        <!-- ==================================================
             SIDEBAR
        ================================================== -->

        <aside class="article-sidebar">


            <!-- TABLE OF CONTENTS -->
            @if (count($toc))
                <div class="sidebar-box">
                    <h3 class="sidebar-title">&gt; Table of Contents</h3>
                    <ol class="toc-list">
                        @foreach ($toc as $item)
                            <li><a href="#{{ $item['id'] }}">{{ $item['title'] }}</a></li>
                        @endforeach
                    </ol>
                </div>
            @endif


            <!-- CATEGORIES -->
            @if ($categories->isNotEmpty())
                <div class="sidebar-box">
                    <h3 class="sidebar-title">&gt; Categories</h3>
                    <ul class="category-list">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                <span class="cat-count">{{ $category->posts_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- LATEST POSTS -->
            @if ($latestPosts->isNotEmpty())
                <div class="sidebar-box">
                    <h3 class="sidebar-title">&gt; Latest Posts</h3>

                    @foreach ($latestPosts as $latest)
                        <div class="latest-post">
                            <div class="latest-thumb">
                                @if ($latest->image_url)
                                    <img src="{{ $latest->image_url }}" alt="{{ $latest->title }}" loading="lazy">
                                @endif
                            </div>
                            <div class="latest-info">
                                <a href="{{ route('blog.show', $latest->slug) }}" class="latest-title">
                                    {{ $latest->title }}
                                </a>
                                <span class="latest-date">{{ $latest->display_date->format('M d, Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


        </aside>

    </div>

@include('partials.footer')

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/single-blog.js') }}"></script>
@endpush

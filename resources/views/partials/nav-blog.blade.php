{{-- Navbar used by: blog archive, single blog (its CSS expects this simpler markup) --}}

<nav class="nav">

    <a href="{{ route('home') }}" class="logo">
        omid.dev
    </a>

    <button class="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <ul class="nav-links">
        <li><a href="{{ route('home') }}">HOME</a></li>
        <li><a href="{{ route('home') }}#about">ABOUT</a></li>
        <li><a href="{{ route('portfolio.index') }}">PROJECTS</a></li>
        <li><a href="{{ route('home') }}#skills">SKILLS</a></li>
        <li><a href="{{ route('blog.index') }}" @class(['active' => request()->routeIs('blog.*')])>BLOG</a></li>
        <li><a href="{{ route('home') }}#contact">CONTACT</a></li>
    </ul>

    <div class="window-controls">
        <span>&minus;</span>
        <span>&square;</span>
        <span>&times;</span>
    </div>

</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-overlay"></div>

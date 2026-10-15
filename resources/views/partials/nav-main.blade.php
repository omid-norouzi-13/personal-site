{{-- Navbar used by: home, portfolio, single portfolio --}}

<nav class="nav">

    <div class="logo_div">
        <a href="{{ route('home') }}" class="logo">
            omid.dev
        </a>
    </div>

    <div>
        <button class="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="menu">
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>HOME</a></li>
            <li><a href="{{ route('home') }}#about">ABOUT</a></li>
            <li><a href="{{ route('portfolio.index') }}" @class(['active' => request()->routeIs('portfolio.*')])>PROJECTS</a></li>
            <li><a href="{{ route('home') }}#skills">SKILLS</a></li>
            <li><a href="{{ route('blog.index') }}" @class(['active' => request()->routeIs('blog.*')])>BLOG</a></li>
            <li><a href="{{ route('home') }}#contact">CONTACT</a></li>
        </ul>
    </div>

    <div class="window-controls">
        <span>&minus;</span>
        <span>&square;</span>
        <span>&times;</span>
    </div>

</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-overlay"></div>

@extends('layouts.app')

@section('title', 'omid norouzi | wordpress developer')

@push('head')
    <meta name="description" content="Omid Norouzi - WordPress developer and technical specialist with 4 years of professional experience.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <script
    src="https://kit.fontawesome.com/4854f4915c.js"
    crossorigin="anonymous">
    </script>
@endpush

@section('content')

    <!-- ==================================================
         HERO
    ================================================== -->

    <div class="section1" id="home">


        <div class="title">

            <h1>
                &gt; hi! i am omid norouzi_
            </h1>


            <h2>
                wordpress developer | technical specialist
            </h2>


            <p>
                i design, build and extend wordpress websites.
                <br>
                custom plugins, bug fixing and technical consulting
                &mdash; 4 years of professional experience.
            </p>


            <button class="btn" type="button" onclick="location.href='{{ route('portfolio.index') }}';">
                &gt; view my work
            </button>


            <!-- SOCIAL BUTTONS -->

            <div class="social-btn">

                <button type="button" aria-label="GitHub"
                    onclick="window.open('https://github.com/omid-norouzi-13', '_blank', 'noopener');">
                    <i class="fa-brands fa-github"></i>
                </button>

                <button type="button" aria-label="Telegram"
                    onclick="window.open('https://t.me/omiidnr', '_blank', 'noopener');">
                    <i class="fa-brands fa-telegram"></i>
                </button>

                <button type="button" aria-label="Email"
                    onclick="location.href='mailto:dev@omidnr.ir';">
                    <i class="fa-solid fa-envelope"></i>
                </button>

            </div>


            <!-- INFO BOX -->

            <div class="info-box">

                <div>
                    <span class="label">
                        name :
                    </span>

                    <span class="value">
                        omid norouzi
                    </span>
                </div>

                <div>
                    <span class="label">
                        role :
                    </span>

                    <span class="value">
                        wordpress developer
                    </span>
                </div>

                <div>
                    <span class="label">
                        experience :
                    </span>

                    <span class="value">
                        4 years
                    </span>
                </div>

                <div>
                    <span class="label">
                        company :
                    </span>

                    <span class="value">
                        zobdegan web
                    </span>
                </div>

                <div>
                    <span class="label">
                        focus :
                    </span>

                    <span class="value">
                        wordpress • elementor • plugins • e-commerce
                    </span>
                </div>

                <div>
                    <span class="label">
                        available_for_work :
                    </span>

                    <span class="true">
                        true
                    </span>
                </div>

            </div>

        </div>


        <div class="two"></div>

    </div>



    <!-- ==================================================
         ABOUT / SKILLS / CURRENTLY
    ================================================== -->

    <div class="container">


        <!-- ================= ABOUT ================= -->

        <div class="section" id="about">

            <div>

                <h3 class="about_title">
                    // About me
                </h3>


                <div class="about-content">

                    <img
                        src="{{ asset('assets/images/pixel-img.png') }}"
                        alt="Omid Norouzi"
                    >


                    <div class="about_text fa-text" lang="fa" dir="rtl">

                        <p>
                            من امید نوروزی هستم؛ توسعه‌دهنده وردپرس و
                            تکنیکال من با ۴ سال تجربه حرفه‌ای در حوزه وب.
                            در شرکت فنی مهندسی زبدگان وب، طراحی و توسعه
                            کامل سایت‌های وردپرسی را بر عهده دارم.
                        </p>


                        <p>
                            افزونه‌ها را مطابق نیاز کارفرما شخصی‌سازی
                            می‌کنم، خطاهای وردپرس را ریشه‌یابی و برطرف
                            می‌کنم و در جلسات، به‌عنوان کارشناس وب،
                            مشاوره فنی ارائه می‌دهم.
                        </p>


                        <p class="light_color" dir="ltr">
                            &gt; more about me
                        </p>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= SKILLS ================= -->

        <div class="section">

            <section class="skills-box">

                <div class="skills-title">
                    // Skills
                </div>


                <div class="skill">

                    <span class="skill-name">
                        WordPress
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 95%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        95%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        Elementor
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 95%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        95%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        E-commerce
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 90%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        90%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        Plugins
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 85%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        85%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        Debugging
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 90%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        90%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        SEO
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 80%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        80%
                    </span>

                </div>


                <div class="skill">

                    <span class="skill-name">
                        Payment
                    </span>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="--progress: 85%;">
                        </div>

                    </div>

                    <span class="skill-percent">
                        85%
                    </span>

                </div>


            </section>

        </div>



        <!-- ================= CURRENTLY ================= -->

        <div class="section currently-section">

            <div class="currently-box">

                <h3 class="currently-title">
                    // Currently
                </h3>


                <div class="currently-list">

                    <p>
                        &gt; working: Zobdegan Web
                    </p>

                    <p>
                        &gt; focus: WordPress &amp; Plugins
                    </p>

                    <p>
                        &gt; role: Technical Specialist
                    </p>

                    <p>
                        &gt; learning: something new, daily
                    </p>

                </div>


                <!-- DIGITAL CLOCK -->

                <div class="clock">

                    <div class="clock-screen">

                        <span id="digital-clock">
                            00:00:00
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ==================================================
         BOTTOM SECTION
    ================================================== -->

    <div class="bottom-section">


        <!-- ==================================================
             FEATURED PROJECTS
        ================================================== -->

        <section class="projects-panel" id="projects">


            <!-- PROJECT HEADER -->

            <div class="projects-header">

                <h3>
                    // Featured Projects
                </h3>


                <a href="#projects">
                    &gt; view all projects
                </a>

            </div>



            <!-- PROJECT SLIDER -->

            <div class="projects-slider">


                <!-- PREVIOUS -->

                <button
                    class="slider-arrow slider-prev"
                    type="button"
                    aria-label="Previous project">

                    ‹

                </button>



                <!-- VIEWPORT -->

                <div class="projects-viewport">

                    <div class="projects-track">


                        <!-- PROJECT 01 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="http://iprocul.ir/" target="_blank" rel="noopener noreferrer">iprocul.ir</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 02 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://mohifa.com/" target="_blank" rel="noopener noreferrer">mohifa.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 03 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-stethoscope"></i>

                            </div>


                            <h4>
                                <a href="https://medmedicalclinic.com/" target="_blank" rel="noopener noreferrer">medmedicalclinic.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 04 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://horsaart.com/" target="_blank" rel="noopener noreferrer">horsaart.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 05 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://saminard.com/" target="_blank" rel="noopener noreferrer">saminard.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 06 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://tabarestantablo.ir/" target="_blank" rel="noopener noreferrer">tabarestantablo.ir</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 07 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://masihacompany.com/" target="_blank" rel="noopener noreferrer">masihacompany.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 08 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="https://banycker.com/" target="_blank" rel="noopener noreferrer">banycker.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 09 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-dumbbell"></i>

                            </div>


                            <h4>
                                <a href="https://kiyanisport.com/" target="_blank" rel="noopener noreferrer">kiyanisport.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>



                        <!-- PROJECT 10 -->

                        <article class="project-card">

                            <div class="project-icon">

                                <i class="fa-solid fa-globe"></i>

                            </div>


                            <h4>
                                <a href="http://avalabkhand.com/" target="_blank" rel="noopener noreferrer">avalabkhand.com</a>
                            </h4>


                            <p>
                                WordPress
                                <br>
                                + Elementor
                            </p>


                            <span class="project-year">
                                live site &nearr;
                            </span>

                        </article>




                    </div>

                </div>



                <!-- NEXT -->

                <button
                    class="slider-arrow slider-next"
                    type="button"
                    aria-label="Next project">

                    ›

                </button>

            </div>



            <!-- PAGINATION -->

            <div class="project-pagination">

                <!-- dots are generated by javascript.js -->

            </div>


        </section>



        <!-- ==================================================
             CODE EDITOR
        ================================================== -->

        <section class="code-panel">


            <div class="code-tabs">

                <div class="code-tab active" data-tab="about">
                    about.py
                </div>

                <div class="code-tab" data-tab="skills">
                    skills.json
                </div>

                <div class="code-tab" data-tab="projects">
                    projects.php
                </div>

                <div class="code-tab" data-tab="workflow">
                    workflow.json
                </div>

                <div class="code-tab" data-tab="contact">
                    contact.js
                </div>


                <div class="window-controls">

                    <span>−</span>

                    <span>□</span>

                    <span>×</span>

                </div>

            </div>


            <!-- ABOUT TAB CONTENT -->
            <div class="code-content" data-content="about" style="display: block;">

                <div class="code-row">
                    <span class="line-number">1</span>
                    <span class="code"><span class="keyword">class</span> About:</span>
                </div>

                <div class="code-row">
                    <span class="line-number">2</span>
                    <span class="code indent-1"><span class="keyword">def</span> __init__(self):</span>
                </div>

                <div class="code-row">
                    <span class="line-number">3</span>
                    <span class="code indent-2">self.name = <span class="string">'Omid Norouzi'</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">4</span>
                    <span class="code indent-2">self.role = <span class="string">'WordPress Developer'</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">5</span>
                    <span class="code indent-2">self.experience = <span class="string">'4 years'</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">6</span>
                    <span class="code indent-2">self.company = <span class="string">'Zobdegan Web'</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">7</span>
                    <span class="code"></span>
                </div>

                <div class="code-row">
                    <span class="line-number">8</span>
                    <span class="code indent-1"><span class="keyword">def</span> say_hello(self):</span>
                </div>

                <div class="code-row">
                    <span class="line-number">9</span>
                    <span class="code indent-2">print(<span class="string">f"Hello! I'm {self.name}. I build with WordPress."</span>)</span>
                </div>

                <div class="code-row">
                    <span class="line-number">10</span>
                    <span class="code"></span>
                </div>

                <div class="code-row">
                    <span class="line-number">11</span>
                    <span class="code"><span class="keyword">if</span> __name__ == <span class="string">'__main__'</span>:</span>
                </div>

                <div class="code-row">
                    <span class="line-number">12</span>
                    <span class="code indent-1">me = About()</span>
                </div>

                <div class="code-row">
                    <span class="line-number">13</span>
                    <span class="code indent-1">me.say_hello()</span>
                </div>

                <div class="code-cursor">&gt;_</div>
            </div>


            <!-- SKILLS TAB CONTENT -->
            <div class="code-content" data-content="skills" style="display: none;">

                <div class="code-row">
                    <span class="line-number">1</span>
                    <span class="code">{</span>
                </div>

                <div class="code-row">
                    <span class="line-number">2</span>
                    <span class="code indent-1"><span class="string">"developer"</span>: <span class="string">"Omid Norouzi"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">3</span>
                    <span class="code indent-1"><span class="string">"skills"</span>: {</span>
                </div>

                <div class="code-row">
                    <span class="line-number">4</span>
                    <span class="code indent-2"><span class="string">"WordPress"</span>: <span class="keyword">95</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">5</span>
                    <span class="code indent-2"><span class="string">"Elementor"</span>: <span class="keyword">95</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">6</span>
                    <span class="code indent-2"><span class="string">"E-commerce"</span>: <span class="keyword">90</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">7</span>
                    <span class="code indent-2"><span class="string">"Plugins"</span>: <span class="keyword">85</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">8</span>
                    <span class="code indent-2"><span class="string">"Debugging"</span>: <span class="keyword">90</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">9</span>
                    <span class="code indent-2"><span class="string">"SEO"</span>: <span class="keyword">80</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">10</span>
                    <span class="code indent-2"><span class="string">"Payment"</span>: <span class="keyword">85</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">11</span>
                    <span class="code indent-1">},</span>
                </div>

                <div class="code-row">
                    <span class="line-number">12</span>
                    <span class="code indent-1"><span class="string">"available"</span>: <span class="keyword">true</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">13</span>
                    <span class="code">}</span>
                </div>

                <div class="code-cursor">&gt;_</div>
            </div>


            <!-- PROJECTS TAB CONTENT -->
            <div class="code-content" data-content="projects" style="display: none;">

                <div class="code-row">
                    <span class="line-number">1</span>
                    <span class="code">&lt;?php</span>
                </div>

                <div class="code-row">
                    <span class="line-number">2</span>
                    <span class="code"></span>
                </div>

                <div class="code-row">
                    <span class="line-number">3</span>
                    <span class="code indent-1"><span class="keyword">class</span> <span class="string">Projects</span> {</span>
                </div>

                <div class="code-row">
                    <span class="line-number">4</span>
                    <span class="code indent-2"><span class="keyword">public</span> <span class="keyword">function</span> getAll() {</span>
                </div>

                <div class="code-row">
                    <span class="line-number">5</span>
                    <span class="code indent-2"><span class="keyword">return</span> [</span>
                </div>

                <div class="code-row">
                    <span class="line-number">6</span>
                    <span class="code indent-2"><a class="string" href="http://iprocul.ir/" target="_blank" rel="noopener noreferrer">"iprocul.ir"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">7</span>
                    <span class="code indent-2"><a class="string" href="https://mohifa.com/" target="_blank" rel="noopener noreferrer">"mohifa.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">8</span>
                    <span class="code indent-2"><a class="string" href="https://medmedicalclinic.com/" target="_blank" rel="noopener noreferrer">"medmedicalclinic.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">9</span>
                    <span class="code indent-2"><a class="string" href="https://horsaart.com/" target="_blank" rel="noopener noreferrer">"horsaart.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">10</span>
                    <span class="code indent-2"><a class="string" href="https://saminard.com/" target="_blank" rel="noopener noreferrer">"saminard.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">11</span>
                    <span class="code indent-2"><a class="string" href="https://tabarestantablo.ir/" target="_blank" rel="noopener noreferrer">"tabarestantablo.ir"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">12</span>
                    <span class="code indent-2"><a class="string" href="https://masihacompany.com/" target="_blank" rel="noopener noreferrer">"masihacompany.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">13</span>
                    <span class="code indent-2"><a class="string" href="https://banycker.com/" target="_blank" rel="noopener noreferrer">"banycker.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">14</span>
                    <span class="code indent-2"><a class="string" href="https://kiyanisport.com/" target="_blank" rel="noopener noreferrer">"kiyanisport.com"</a>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">15</span>
                    <span class="code indent-2"><a class="string" href="http://avalabkhand.com/" target="_blank" rel="noopener noreferrer">"avalabkhand.com"</a></span>
                </div>

                <div class="code-row">
                    <span class="line-number">16</span>
                    <span class="code indent-2">];</span>
                </div>

                <div class="code-row">
                    <span class="line-number">17</span>
                    <span class="code indent-1">}</span>
                </div>

                <div class="code-row">
                    <span class="line-number">18</span>
                    <span class="code">}</span>
                </div>

                <div class="code-cursor">&gt;_</div>
            </div>


            <!-- WORKFLOW TAB CONTENT -->
            <div class="code-content" data-content="workflow" style="display: none;">

                <div class="code-row">
                    <span class="line-number">1</span>
                    <span class="code">{</span>
                </div>

                <div class="code-row">
                    <span class="line-number">2</span>
                    <span class="code indent-1"><span class="string">"design"</span>: <span class="string">"UI/UX by the graphic team"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">3</span>
                    <span class="code indent-1"><span class="string">"approval"</span>: <span class="string">"client sign-off first"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">4</span>
                    <span class="code indent-1"><span class="string">"build"</span>: <span class="string">"WordPress + Elementor"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">5</span>
                    <span class="code indent-1"><span class="string">"shops"</span>: {</span>
                </div>

                <div class="code-row">
                    <span class="line-number">6</span>
                    <span class="code indent-2"><span class="string">"gateways"</span>: [<span class="string">"Torob Pay"</span>, <span class="string">"DigiPay"</span>, <span class="string">"SnappPay"</span>, ...],</span>
                </div>

                <div class="code-row">
                    <span class="line-number">7</span>
                    <span class="code indent-2"><span class="string">"toggle"</span>: <span class="string">"on/off per client request"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">8</span>
                    <span class="code indent-2"><span class="string">"categories"</span>: <span class="string">"clean, SEO-driven structure"</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">9</span>
                    <span class="code indent-1">}</span>
                </div>

                <div class="code-row">
                    <span class="line-number">10</span>
                    <span class="code">}</span>
                </div>

                <div class="code-cursor">&gt;_</div>
            </div>


            <!-- CONTACT TAB CONTENT -->
            <div class="code-content" data-content="contact" style="display: none;">

                <div class="code-row">
                    <span class="line-number">1</span>
                    <span class="code"><span class="keyword">const</span> contact = {</span>
                </div>

                <div class="code-row">
                    <span class="line-number">2</span>
                    <span class="code indent-1">name: <span class="string">"Omid Norouzi"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">3</span>
                    <span class="code indent-1">role: <span class="string">"WordPress Developer"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">4</span>
                    <span class="code indent-1">github: <span class="string">"omid-norouzi-13"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">5</span>
                    <span class="code indent-1">telegram: <span class="string">"@@omiidnr"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">6</span>
                    <span class="code indent-1">email: <span class="string">"dev@omidnr.ir"</span>,</span>
                </div>

                <div class="code-row">
                    <span class="line-number">7</span>
                    <span class="code indent-1">available: <span class="keyword">true</span></span>
                </div>

                <div class="code-row">
                    <span class="line-number">8</span>
                    <span class="code">};</span>
                </div>

                <div class="code-row">
                    <span class="line-number">9</span>
                    <span class="code"></span>
                </div>

                <div class="code-row">
                    <span class="line-number">10</span>
                    <span class="code">console.log(<span class="string">"Let's connect!"</span>);</span>
                </div>

                <div class="code-cursor">&gt;_</div>
            </div>

        </section>



        <!-- ==================================================
             TERMINAL
        ================================================== -->

        <section class="terminal-panel">


            <div class="terminal-header">

                <span>
                    &gt;_ terminal
                </span>


                <div class="terminal-controls">

                    <span>−</span>

                    <span>□</span>

                    <span>×</span>

                </div>

            </div>



            <div class="terminal-content">


                <p>

                    <span class="terminal-key">
                        Stack:
                    </span>

                    WordPress

                </p>


                <p>

                    <span class="terminal-key">
                        Build:
                    </span>

                    Elementor

                </p>


                <p>

                    <span class="terminal-key">
                        Flow:
                    </span>

                    UI/UX &rarr; code

                </p>


                <p>

                    <span class="terminal-key">
                        Exp:
                    </span>

                    4 years

                </p>


                <p>

                    <span class="terminal-key">
                        Firm:
                    </span>

                    Zobdegan Web

                </p>


                <div class="terminal-space"></div>


                <p class="terminal-command">
                    &gt; ls projects/
                </p>


                <p>

                    <span class="project-number">
                        01
                    </span>

                    iprocul.ir

                </p>


                <p>

                    <span class="project-number">
                        02
                    </span>

                    mohifa.com

                </p>


                <p>

                    <span class="project-number">
                        03
                    </span>

                    medmedicalclinic.com

                </p>


                <p>

                    <span class="project-number">
                        ...
                    </span>

                    +7 more

                </p>


                <div class="terminal-space small"></div>

                <p class="terminal-prompt">

                    &gt;

                    <span class="blink">
                        |
                    </span>

                </p>

            </div>

        </section>

    </div>

@endsection

@push('scripts')
    

    <script src="{{ asset('assets/js/javascript.js') }}"></script>
@endpush

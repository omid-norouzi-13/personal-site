/* =====================================================
   DIGITAL CLOCK
===================================================== */

function updateClock() {

    const clock =
        document.getElementById("digital-clock");


    if (!clock) return;


    const now =
        new Date();


    const hours =
        String(
            now.getHours()
        ).padStart(2, "0");


    const minutes =
        String(
            now.getMinutes()
        ).padStart(2, "0");


    const seconds =
        String(
            now.getSeconds()
        ).padStart(2, "0");


    clock.textContent =
        `${hours}:${minutes}:${seconds}`;

}


updateClock();


setInterval(
    updateClock,
    1000
);


/* =====================================================
   FEATURED PROJECTS SLIDER
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {


        const slider =
            document.querySelector(
                ".projects-panel"
            );


        if (!slider) return;


        const track =
            slider.querySelector(
                ".projects-track"
            );


        const cards =
            slider.querySelectorAll(
                ".project-card"
            );


        const prevButton =
            slider.querySelector(
                ".slider-prev"
            );


        const nextButton =
            slider.querySelector(
                ".slider-next"
            );


        const pagination =
            slider.querySelectorAll(
                ".project-pagination button"
            );


        if (
            !track ||
            !cards.length ||
            !prevButton ||
            !nextButton
        ) {
            return;
        }


        let currentIndex = 0;

        let cardsPerView = 4;

        let autoPlay;


        /* =================================================
           CARDS PER VIEW
        ================================================= */

        function updateCardsPerView() {

            if (window.innerWidth <= 600) {

                cardsPerView = 1;

            } else if (window.innerWidth <= 850) {

                cardsPerView = 2;

            } else if (window.innerWidth <= 1100) {

                cardsPerView = 3;

            } else {

                cardsPerView = 4;

            }


            const maxIndex =
                Math.max(
                    0,
                    cards.length - cardsPerView
                );


            if (
                currentIndex >
                maxIndex
            ) {

                currentIndex =
                    maxIndex;

            }

        }


        /* =================================================
           MAX INDEX
        ================================================= */

        function getMaxIndex() {

            return Math.max(
                0,
                cards.length - cardsPerView
            );

        }


        /* =================================================
           UPDATE SLIDER
        ================================================= */

        function updateSlider() {

            if (!cards[0]) return;


            const cardWidth =
                cards[0].getBoundingClientRect().width;


            const trackStyle =
                window.getComputedStyle(track);


            const gap =
                parseFloat(
                    trackStyle.columnGap
                ) || 10;


            const moveAmount =
                (cardWidth + gap) *
                currentIndex;


            track.style.transform =
                `translateX(-${moveAmount}px)`;


            updatePagination();

        }


        /* =================================================
           PAGINATION
        ================================================= */

        function updatePagination() {

            const maxIndex =
                getMaxIndex();


            pagination.forEach(
                function (button, index) {

                    button.classList.toggle(
                        "active",
                        index === currentIndex
                    );

                }
            );


            prevButton.disabled =
                currentIndex === 0;


            nextButton.disabled =
                currentIndex >= maxIndex;


            prevButton.style.opacity =
                currentIndex === 0
                    ? "0.35"
                    : "1";


            nextButton.style.opacity =
                currentIndex >= maxIndex
                    ? "0.35"
                    : "1";

        }


        /* =================================================
           NEXT
        ================================================= */

        function nextSlide() {

            const maxIndex =
                getMaxIndex();


            if (
                currentIndex <
                maxIndex
            ) {

                currentIndex++;

            } else {

                currentIndex = 0;

            }


            updateSlider();

        }


        /* =================================================
           PREVIOUS
        ================================================= */

        function previousSlide() {

            const maxIndex =
                getMaxIndex();


            if (
                currentIndex >
                0
            ) {

                currentIndex--;

            } else {

                currentIndex =
                    maxIndex;

            }


            updateSlider();

        }


        /* =================================================
           BUTTON EVENTS
        ================================================= */

        nextButton.addEventListener(
            "click",
            function () {

                nextSlide();

                restartAutoPlay();

            }
        );


        prevButton.addEventListener(
            "click",
            function () {

                previousSlide();

                restartAutoPlay();

            }
        );


        /* =================================================
           PAGINATION EVENTS
        ================================================= */

        pagination.forEach(
            function (button, index) {

                button.addEventListener(
                    "click",
                    function () {

                        const maxIndex =
                            getMaxIndex();


                        currentIndex =
                            Math.min(
                                index,
                                maxIndex
                            );


                        updateSlider();

                        restartAutoPlay();

                    }
                );

            }
        );


        /* =================================================
           AUTO PLAY
        ================================================= */

        function startAutoPlay() {

            clearInterval(
                autoPlay
            );


            autoPlay =
                setInterval(
                    function () {

                        nextSlide();

                    },
                    5000
                );

        }


        function stopAutoPlay() {

            clearInterval(
                autoPlay
            );

        }


        function restartAutoPlay() {

            stopAutoPlay();

            startAutoPlay();

        }


        /* =================================================
           PAUSE ON HOVER
        ================================================= */

        slider.addEventListener(
            "mouseenter",
            stopAutoPlay
        );


        slider.addEventListener(
            "mouseleave",
            startAutoPlay
        );


        /* =================================================
           TOUCH / SWIPE
        ================================================= */

        let touchStartX = 0;

        let touchEndX = 0;


        slider.addEventListener(
            "touchstart",
            function (event) {

                touchStartX =
                    event.changedTouches[0].screenX;

                stopAutoPlay();

            },
            {
                passive: true
            }
        );


        slider.addEventListener(
            "touchend",
            function (event) {

                touchEndX =
                    event.changedTouches[0].screenX;


                const difference =
                    touchStartX -
                    touchEndX;


                if (
                    Math.abs(difference) > 45
                ) {

                    if (difference > 0) {

                        nextSlide();

                    } else {

                        previousSlide();

                    }

                }


                startAutoPlay();

            },
            {
                passive: true
            }
        );


        /* =================================================
           KEYBOARD
        ================================================= */

        slider.addEventListener(
            "keydown",
            function (event) {

                if (
                    event.key === "ArrowRight"
                ) {

                    nextSlide();

                }


                if (
                    event.key === "ArrowLeft"
                ) {

                    previousSlide();

                }

            }
        );


        /* =================================================
           RESIZE
        ================================================= */

        window.addEventListener(
            "resize",
            function () {

                updateCardsPerView();

                updateSlider();

            }
        );


        /* =================================================
           INITIALIZE
        ================================================= */

        updateCardsPerView();

        updateSlider();

        startAutoPlay();


    }
);


/* =====================================================
   CODE TABS
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const tabs =
            document.querySelectorAll(
                ".code-tab"
            );

        const panels =
            document.querySelectorAll(
                ".code-tab-panel"
            );

        if (
            !tabs.length ||
            !panels.length
        ) {
            return;
        }

        tabs.forEach(
            function (tab) {

                tab.addEventListener(
                    "click",
                    function () {

                        // حذف active از همه تب‌ها
                        tabs.forEach(
                            function (t) {
                                t.classList.remove(
                                    "active"
                                );
                            }
                        );

                        // اضافه active به تب کلیک شده
                        this.classList.add(
                            "active"
                        );

                        // مخفی کردن همه پنل‌ها
                        panels.forEach(
                            function (p) {
                                p.classList.remove(
                                    "active"
                                );
                            }
                        );

                        // نمایش پنل مربوطه
                        const tabId =
                            this.getAttribute(
                                "data-tab"
                            );

                        const targetPanel =
                            document.getElementById(
                                "panel-" + tabId
                            );

                        if (targetPanel) {
                            targetPanel.classList.add(
                                "active"
                            );
                        }

                    }
                );

            }
        );

    }
);
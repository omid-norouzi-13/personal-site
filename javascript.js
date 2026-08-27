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
   CODE TABS - DRAG TO SCROLL
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const tabsContainer =
            document.querySelector(
                ".code-tabs"
            );


        if (!tabsContainer) return;


        let isDragging = false;

        let startX = 0;

        let scrollLeft = 0;


        tabsContainer.addEventListener(
            "mousedown",
            function (e) {

                isDragging = true;

                startX =
                    e.pageX - tabsContainer.offsetLeft;

                scrollLeft =
                    tabsContainer.scrollLeft;

                tabsContainer.style.cursor =
                    "grabbing";

            }
        );


        tabsContainer.addEventListener(
            "mouseleave",
            function () {

                isDragging = false;

                tabsContainer.style.cursor =
                    "grab";

            }
        );


        tabsContainer.addEventListener(
            "mouseup",
            function () {

                isDragging = false;

                tabsContainer.style.cursor =
                    "grab";

            }
        );


        tabsContainer.addEventListener(
            "mousemove",
            function (e) {

                if (!isDragging) return;

                e.preventDefault();

                const x =
                    e.pageX - tabsContainer.offsetLeft;

                const walk =
                    (x - startX) * 1.5;

                tabsContainer.scrollLeft =
                    scrollLeft - walk;

            }
        );


    }
);


/* =====================================================
   CODE TABS - SWITCHING
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {


        const codePanel =
            document.querySelector(
                ".code-panel"
            );


        if (!codePanel) return;


        const tabs =
            codePanel.querySelectorAll(
                ".code-tab"
            );


        const contents =
            codePanel.querySelectorAll(
                ".code-content"
            );


        if (
            !tabs.length ||
            !contents.length
        ) {
            return;
        }


        /* =================================================
           SWITCH TAB
        ================================================= */

        function switchTab(
            targetTab
        ) {

            tabs.forEach(
                function (tab) {

                    tab.classList.remove(
                        "active"
                    );

                }
            );


            contents.forEach(
                function (content) {

                    content.style.display =
                        "none";

                }
            );


            targetTab.classList.add(
                "active"
            );


            const tabName =
                targetTab.getAttribute(
                    "data-tab"
                );


            const targetContent =
                codePanel.querySelector(
                    '[data-content="' +
                    tabName +
                    '"]'
                );


            if (
                targetContent
            ) {

                /* Re-trigger fade-in animation */
                targetContent.style.animation = 'none';
                targetContent.offsetHeight;
                targetContent.style.animation = '';

                targetContent.style.display =
                    "block";

            }

        }


        /* =================================================
           CLICK EVENTS
        ================================================= */

        tabs.forEach(
            function (tab) {

                tab.addEventListener(
                    "click",
                    function () {

                        switchTab(
                            tab
                        );

                    }
                );

            }
        );


        /* =================================================
           TOUCH / SWIPE ON TABS
        ================================================= */

        let touchStartX = 0;
        let touchEndX = 0;


        const tabsContainer =
            codePanel.querySelector(
                ".code-tabs"
            );


        if (
            tabsContainer
        ) {

            tabsContainer.addEventListener(
                "touchstart",
                function (event) {

                    touchStartX =
                        event.changedTouches[0].screenX;

                },
                {
                    passive: true
                }
            );


            tabsContainer.addEventListener(
                "touchend",
                function (event) {

                    touchEndX =
                        event.changedTouches[0].screenX;


                    const difference =
                        touchStartX -
                        touchEndX;


                    if (
                        Math.abs(difference) > 40
                    ) {


                        let activeIndex = -1;


                        tabs.forEach(
                            function (tab, index) {

                                if (
                                    tab.classList.contains(
                                        "active"
                                    )
                                ) {

                                    activeIndex =
                                        index;

                                }

                            }
                        );


                        let newIndex = -1;


                        if (
                            difference > 0
                        ) {

                            /* Swipe Left - Next Tab */
                            newIndex =
                                Math.min(
                                    activeIndex + 1,
                                    tabs.length - 1
                                );

                        } else {

                            /* Swipe Right - Previous Tab */
                            newIndex =
                                Math.max(
                                    activeIndex - 1,
                                    0
                                );

                        }


                        if (
                            newIndex !== -1 &&
                            newIndex !== activeIndex
                        ) {

                            switchTab(
                                tabs[newIndex]
                            );

                        }

                    }

                },
                {
                    passive: true
                }
            );

        }


    }
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
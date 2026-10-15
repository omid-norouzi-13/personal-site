/* =====================================================
   HAMBURGER MENU - MOBILE NAVIGATION
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const hamburger =
            document.querySelector(
                ".hamburger"
            );

        const navLinks =
            document.querySelector(
                ".nav-links"
            );

        const overlay =
            document.querySelector(
                ".mobile-overlay"
            );

        if (
            !hamburger ||
            !navLinks
        ) {
            return;
        }


        function toggleMenu() {

            hamburger.classList.toggle(
                "active"
            );

            navLinks.classList.toggle(
                "active"
            );

            if (overlay) {
                overlay.classList.toggle(
                    "active"
                );
            }

            document.body.style.overflow =
                navLinks.classList.contains(
                    "active"
                )
                    ? "hidden"
                    : "";

        }


        hamburger.addEventListener(
            "click",
            toggleMenu
        );


        if (overlay) {

            overlay.addEventListener(
                "click",
                toggleMenu
            );

        }


        navLinks.querySelectorAll("a")
            .forEach(function (link) {

                link.addEventListener(
                    "click",
                    function () {

                        if (
                            window.innerWidth <= 768
                        ) {
                            toggleMenu();
                        }

                    }
                );

            });

    }
);

/* =====================================================
   FOOTER CLOCK
===================================================== */

function updateFooterClock() {

    const clock =
        document.getElementById("footer-clock");

    if (!clock) return;

    const now = new Date();

    const hours =
        String(now.getHours()).padStart(2, "0");

    const minutes =
        String(now.getMinutes()).padStart(2, "0");

    const seconds =
        String(now.getSeconds()).padStart(2, "0");

    clock.textContent =
        `${hours}:${minutes}:${seconds}`;

}

updateFooterClock();
setInterval(updateFooterClock, 1000);


/* =====================================================
   TABLE OF CONTENTS - SMOOTH SCROLL
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const tocLinks =
            document.querySelectorAll(".toc-list a");

        tocLinks.forEach(
            function (link) {

                link.addEventListener(
                    "click",
                    function (e) {

                        e.preventDefault();

                        const targetId =
                            this.getAttribute("href");

                        const target =
                            document.querySelector(targetId);

                        if (target) {

                            target.scrollIntoView({
                                behavior: "smooth",
                                block: "start"
                            });

                        }

                    }
                );

            }
        );

    }
);


/* =====================================================
   SHARE - COPY LINK
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const copyBtn =
            document.querySelector(".share-btn.copy");

        if (!copyBtn) return;

        copyBtn.addEventListener(
            "click",
            function (e) {

                e.preventDefault();

                navigator.clipboard.writeText(
                    window.location.href
                ).then(
                    function () {

                        copyBtn.innerHTML =
                            '<i class="fa-solid fa-check"></i>';

                        setTimeout(
                            function () {

                                copyBtn.innerHTML =
                                    '<i class="fa-solid fa-link"></i>';

                            },
                            2000
                        );

                    }
                );

            }
        );

    }
);

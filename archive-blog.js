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
   SEARCH FILTER
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const searchInput =
            document.querySelector(".search-input");

        const posts =
            document.querySelectorAll(".post-card");

        if (!searchInput || !posts.length) return;

        searchInput.addEventListener(
            "input",
            function () {

                const query =
                    this.value.toLowerCase().trim();

                posts.forEach(
                    function (post) {

                        const text =
                            post.textContent.toLowerCase();

                        if (
                            text.includes(query) ||
                            query === ""
                        ) {
                            post.style.display = "";
                        } else {
                            post.style.display = "none";
                        }

                    }
                );

            }
        );

    }
);


/* =====================================================
   CATEGORY FILTER
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const filterSelect =
            document.querySelector(".filter-select");

        const posts =
            document.querySelectorAll(".post-card");

        if (!filterSelect || !posts.length) return;

        filterSelect.addEventListener(
            "change",
            function () {

                const selected =
                    this.value.toLowerCase().trim();

                posts.forEach(
                    function (post) {

                        const meta =
                            post.querySelector(".post-meta");

                        if (!meta) return;

                        const category =
                            meta.textContent.toLowerCase();

                        if (
                            selected === "all categories" ||
                            category.includes(selected)
                        ) {
                            post.style.display = "";
                        } else {
                            post.style.display = "none";
                        }

                    }
                );

            }
        );

    }
);


/* =====================================================
   PAGINATION (Visual Only)
===================================================== */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const buttons =
            document.querySelectorAll(".page-btn");

        buttons.forEach(
            function (btn) {

                btn.addEventListener(
                    "click",
                    function () {

                        if (this.disabled) return;

                        buttons.forEach(
                            function (b) {
                                b.classList.remove("active");
                            }
                        );

                        if (
                            this.textContent.trim() !==
                            "&lt;" &&
                            this.textContent.trim() !==
                            "&gt;"
                        ) {
                            this.classList.add("active");
                        }

                    }
                );

            }
        );

    }
);

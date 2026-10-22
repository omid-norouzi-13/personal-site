/* =====================================================
   FOOTER CLOCK
   (جستجو، فیلتر دسته‌بندی و صفحه‌بندی حالا سمت سرور و
   داخل BlogPostController انجام می‌شوند.)
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

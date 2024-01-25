const scrollBtn = document.getElementById("scroll-to-top");

if (scrollBtn) {

    scrollBtn.addEventListener("click", function () {
        window.scroll({ top: 0, left: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            scrollBtn.classList.add("active");
        } else {
            scrollBtn.classList.remove("active");
        }
    });
}
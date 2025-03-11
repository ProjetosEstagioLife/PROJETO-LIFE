window.addEventListener("scroll", function () {
    let logos = document.getElementById("logosContainer");

    if (window.scrollY > 30) {
        logos.classList.remove("notscrolledLogo");
        logos.classList.add("scrolledLogo"); // Encolhe o header
    } else {
        logos.classList.remove("scrolledLogo"); // Volta ao tamanho normal
        logos.classList.add("notscrolledLogo");
    }
});
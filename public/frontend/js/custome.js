document.getElementById("showLogin").addEventListener("click", function () {
    document.getElementById("loginForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
    this.classList.add("active");
    document.getElementById("showRegister").classList.remove("active");
});

document.getElementById("showRegister").addEventListener("click", function () {
    document.getElementById("registerForm").style.display = "block";
    document.getElementById("loginForm").style.display = "none";
    this.classList.add("active");
    document.getElementById("showLogin").classList.remove("active");
});
$(document).ready(function () {
    $('.slider-active').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     const showLoginBtn = document.getElementById("showLogin");
//     const showRegisterBtn = document.getElementById("showRegister");
//     const loginForm = document.getElementById("loginForm");
//     const registerForm = document.getElementById("registerForm");

//     showLoginBtn.addEventListener("click", function () {
//         loginForm.style.display = "block";
//         registerForm.style.display = "none";
//         showLoginBtn.classList.add("active");
//         showRegisterBtn.classList.remove("active");
//     });

//     showRegisterBtn.addEventListener("click", function () {
//         loginForm.style.display = "none";
//         registerForm.style.display = "block";
//         showRegisterBtn.classList.add("active");
//         showLoginBtn.classList.remove("active");
//     });
// });
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


const tl = gsap.timeline({reversed: true, paused: true})
    .to(".nav-backdrop", {autoAlpha: 1, duration: 0.4, ease: "power2.inOut"}, "-=0.2")
    .to(".banner-content", {transform: "translateY(-2rem)", opacity: "0", duration: 0.4, ease: "power2.inOut"})
    .to("nav .container", {height: "auto", paddingBottom: "3rem", duration: 0.4, ease: "power3.inOut"}, "-=0.4")
    .to("nav .nav-menu", {visibility: "visible", duration: 0.4, ease: "power3.inOut"}, "-=0.4")
    .from("nav .nav-item", {autoAlpha: 0, duration: 0.2}, "-=0.2");

function openNav() {
    const navBtn = document.getElementById("nav-button-icon");
    const navContainer = document.querySelector("nav .container");

    navBtn.onclick = function (e) {
        navBtn.classList.toggle("active");
        tl.reversed() ? tl.play() : tl.reverse();
    };

    document.addEventListener("click", function(e) {
        if (!navContainer.contains(e.target) && !tl.reversed()) {
            tl.reverse();
            navBtn.classList.remove("active");
        }
    });
}

openNav();
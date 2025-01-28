"use strict";
// closing warning message

const warningMessage = document.querySelector(".warning")
const closeWarning = document.querySelector(".warning > span")

const closeWarningFunc = () => {
    warningMessage.style.display = "none"
}

closeWarning.addEventListener('click', closeWarningFunc)
setTimeout(closeWarningFunc, 20000)

// revealing section while scrolling

const sectionParts = document.querySelectorAll(".reveal");
const firstSect = document.querySelector(".reveal_first");
const collectionsSection = document.querySelector(".collections__title");

const windowHeight = window.innerHeight;
function reveal() {
    window.addEventListener("load", function () {
        firstSect?.classList.add("is-visible");
    })
    window.addEventListener("scroll", function () {
        firstSect?.classList.add("is-visible");
        sectionParts.forEach((section) => {
            const sectionTop = section.getBoundingClientRect().top;
            if (sectionTop < windowHeight - 200) {
                section.classList.add("is-visible");

                const video = section.querySelector("video");
                if (video) {
                    video.play();
                }
            } else {
                const video = section.querySelector("video");
                if (video) {
                    video.pause();
                    video.currentTime = 0;
                }
            }
        });
    });
}

reveal();

// hamburger menu tablet and mobile

let hamburgerBtn = document.querySelector(".plate");
let pageTopNav = document.querySelector(".header__top-nav");
let windowWidth = window.innerWidth;
let navbar = document.querySelector(".navbar");

const responsiveHamburger = () => {
    if (windowWidth <= 768 && windowWidth > 600) {
        hamburgerBtn.addEventListener("click", function () {
            this.classList.toggle("active");
            pageTopNav.classList.toggle("active");
        });
    } else if (windowWidth <= 600) {
        hamburgerBtn.addEventListener("click", function () {
            this.classList.toggle("active");
            navbar.classList.toggle("active");
        });
    }
};

responsiveHamburger();

// select langs

let langSelect = document.querySelector(".header__top-langs > ul > li");
let selectedLang = document.getElementById("selected_lang");
let langOptions = document.querySelectorAll("#lang_option");
let htmlLang = document.querySelector("html").lang

langSelect.addEventListener("click", () => {
    langSelect.classList.toggle("active");
});

function changeLanguage() {
    langOptions.forEach((lang) => {
        lang.addEventListener("click", (e) => {
            e.stopPropagation();
        });
    });
    if (htmlLang === "az") {
        selectedLang.innerText = "AZE";
    } else if (htmlLang === "ru") {
        selectedLang.innerText = "RU";
    } else if (htmlLang === "en-gb") {
        selectedLang.innerText = "ENG";
    }
}

changeLanguage();

// navbar menu active class added active page

let navbarMenuLinks = document.querySelectorAll(".navbar__menu>li>a");
let navbarMenu = document.querySelector(".navbar__menu")
let navbarMenuList = document.querySelectorAll(".navbar__menu > li");

function addActiveClass() {
    navbarMenuLinks.forEach((link) => {
        const href = link.getAttribute("href")
        const dataUrl = navbarMenu.getAttribute("data-url")
        if (dataUrl === href) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
}

addActiveClass();

// go to top button

const goTopBtn = document.querySelector(".goToTop_btn");

window.addEventListener("scroll", function () {
    if (goTopBtn) {
        if (window.scrollY > 450) {
            goTopBtn.style.display = "flex";
        } else {
            goTopBtn.style.display = "none";
        }
    }
});

goTopBtn?.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// auto move to first section

function scrollToSecondSection() {
    if (window.location.pathname === '/'
        || window.location.pathname === '/en'
        || window.location.pathname === '/ru') {

        let targetElement = document.querySelector('main section:first-child')
        setTimeout(function () {
            if (windowWidth > 992 && !(window.pageYOffset || document.documentElement.scrollTop >= 260)) {
                window.scrollTo({
                    top: 260,
                    behavior: "smooth",
                });
            }
        }, 1000);
    }
}

window.addEventListener('load', scrollToSecondSection);

// block save as video and img

$(document).ready(function () {
    $('video').bind('contextmenu', function () { return false; });
});

let allImages = document.querySelectorAll("img");
allImages.forEach((value) => {
    value.oncontextmenu = (e) => {
        e.preventDefault();
    }
})
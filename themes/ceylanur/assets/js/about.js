"use strict"

let aboutSecText = document.querySelector(".about__part:first-child > div:last-child")
const moreBtn = document.querySelector(".about_load_more > button")

function showMore() {
    const windowWidth = window.innerWidth

    if (windowWidth <= 600) {
        aboutSecText.style.display = "none"
        moreBtn.addEventListener("click", () => {
            if (aboutSecText.style.display === "none") {
                aboutSecText.style.display = "block"
                moreBtn.innerText = moreBtn.getAttribute("data-less")
            } else {
                aboutSecText.style.display = "none"
                moreBtn.innerText = moreBtn.getAttribute("data-more")
            }
        })
    }
}

showMore()
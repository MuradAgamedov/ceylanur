"use strict";

let summaries = document.querySelectorAll(".summary");

summaries.forEach((summary) => {
    summary.addEventListener("click", function () {
        this.classList.toggle("active");
    });
});

// let galeryImg = document.querySelector(".gdi > img")
// const parentDiv = galeryImg?.parentElement

// console.log(galeryImg?.height)

// if(parentDiv) {
//     parentDiv.style.height = galeryImg?.height + "px"
// }


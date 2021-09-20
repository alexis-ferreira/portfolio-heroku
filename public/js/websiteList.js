"use strict";

let thumbnail = document.getElementsByClassName('thumbnail');
// console.log(thumbnail);

let scrollBar = document.getElementById('fadeScrollBar');
// console.log(scrollBar);

let sectionWebsite = document.getElementById('website-list');


addEventListener('DOMContentLoaded', function () {

    sectionWebsite.style.marginLeft = 0 + "px";
    sectionWebsite.style.opacity = "1";
})

for (let i = 0; i < thumbnail.length; i++) {

    thumbnail[i].addEventListener('mouseenter', function () {

        thumbnail[i].style.height = 200 + "px";
        thumbnail[i].style.maxWidth = 400 + "px";
        thumbnail[i].style.transition = "max-width 500ms, width 500ms, height 500ms";

        scrollBar.style.display = "block";

        setTimeout(function () {

            scrollBar.style.opacity = "1";
        }, 10)
    })

    thumbnail[i].addEventListener('mouseleave', function () {

        thumbnail[i].style.height = 140 + "px";
        thumbnail[i].style.maxWidth = 250 + "px";
        thumbnail[i].style.transition = "max-width 500ms, width 500ms, height 500ms";

        scrollBar.style.opacity = "0";

        setTimeout(function () {

            scrollBar.style.display = "none";
        }, 10)
    })
}

let viewAllWebsite = document.getElementsByClassName('viewAllWebsite');

viewAllWebsite[0].addEventListener('mouseenter', function () {

    viewAllWebsite[0].style.color = "#e50914";
    viewAllWebsite[0].style.transition = "color 300ms";
})

viewAllWebsite[0].addEventListener('mouseleave', function () {

    viewAllWebsite[0].style.color = "white";
    viewAllWebsite[0].style.transition = "color 300ms";
})
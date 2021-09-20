"use strict";

let btnMenuBack = document.getElementById('btnMenuBack');

let menuBack = document.getElementById('menuBack');

let menuIsOpen = false;

btnMenuBack.addEventListener('click', function () {

    if (menuIsOpen) {

        menuIsOpen = false;

        menuBack.style.top = -36 + "px";

        setTimeout(
            function () {
                menuBack.style.display = "none";
            }, 400)
    } else {

        menuIsOpen = true;

        menuBack.style.display = "block";
        setTimeout(
            function () {
                menuBack.style.top = 57 + "px";
            }, 100)
    }
})




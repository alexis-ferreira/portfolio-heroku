"use strict";

let body = document.getElementsByTagName("body");
body = body[0];

let profile = document.getElementById("profile");

let hoverHome = document.getElementById('hoverHome');

let profilePicture = document.getElementsByClassName('picture-user-profile');
profilePicture = profilePicture[0];

hoverHome.addEventListener('mouseenter', function () {

    profilePicture.style.border = "3px solid white";
    profilePicture.style.transition = "border 200ms";
})

hoverHome.addEventListener('mouseleave', function () {

    profilePicture.style.border = "0px solid rgba(255, 255, 255, 0)";
})

addEventListener('DOMContentLoaded', function () {

    body.style.height = window.innerHeight + "px";

    profile.style.opacity = "1";
    profile.style.transition = "opacity 3s";
})

addEventListener('resize', function () {

    body.style.height = window.innerHeight + "px";
})
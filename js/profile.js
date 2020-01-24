var modal0 = document.querySelector(".modal0");
var trigger0 = document.querySelector(".button");
var closeButton0 = document.querySelector(".close-button0");

function toggleModal0() {
    modal0.classList.toggle("show-modal0");
}

function windowOnClick0(event0) {
    if (event.target === modal0) {
        toggleModal0();
    }
}

trigger0.addEventListener("click", toggleModal0);
closeButton0.addEventListener("click", toggleModal0);
window.addEventListener("click", windowOnClick0);
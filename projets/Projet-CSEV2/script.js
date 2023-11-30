let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("content-img-partenaire");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

function showMenuHamburger(){
    const menuHamburger = document.getElementById("container-menu-deroulant")
    const buttonHamburger = document.getElementById("menu-hamburger")

    buttonHamburger.addEventListener('click', () => {
        menuHamburger.style.right ='0';
        menuHamburger.style.paddingLeft = '60%';
    })
}

function hideHamburger(){
    const menuHamburger = document.getElementById("container-menu-deroulant")
    const hide = document.getElementById("hide-menu-deroulant")

    hide.addEventListener('click', () => {
        menuHamburger.style.paddingLeft = '0';
        menuHamburger.style.right ='-60%';
    })
}
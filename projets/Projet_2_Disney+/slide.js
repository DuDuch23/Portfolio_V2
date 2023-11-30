let cardContainers = [...document.querySelectorAll('.content-films-series-slider')];
let slidePrev = [...document.querySelectorAll('.slide-prev')];
let slideNext = [...document.querySelectorAll('.slide-next')];

cardContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    slideNext[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth - 200;
    })

    slidePrev[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth + 200;
    })
})

function scrollHorizontally()
{
    var scrollContainer = document.getElementById('content-carroussel');
    scrollContainer.scrollLeft += 2000; // Vitesse de déplacement en px
  
    if (scrollContainer.scrollLeft >= (scrollContainer.scrollWidth - scrollContainer.clientWidth)) // Vérifie si le défilement atteint la fin de la div
    {
        scrollContainer.scrollLeft = 0; // Retourne au début
    }
}
setInterval(scrollHorizontally, 5000); // Intervalle de 5s
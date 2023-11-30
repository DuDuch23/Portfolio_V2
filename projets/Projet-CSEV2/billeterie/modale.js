const slider2 = document.querySelector('.contenant-image-slider2');
const slides2 = slider2.querySelectorAll('.slide-image');
const prevBtn2 = document.querySelector('.fleche-gauche2');
const nextBtn2 = document.querySelector('.fleche-droite2');
const dots2 = document.querySelectorAll('.btn-nav2');
let slideIndex2 = 0;

function showSlide2(n) {
  // Affiche le slide correspondant à l'index donné
  slides2.forEach(slide => slide.style.display = 'none');
  dots2.forEach(dot2 => dot2.classList.remove('active'));
  slides2[n].style.display = 'block';
  dots2[n].classList.add('active');
}

function nextSlide2() {
  // Passe au slide suivant
  slideIndex2++;
  if (slideIndex2 > slides2.length - 1) {
    slideIndex2 = 0;
  }
  showSlide2(slideIndex2);
  
  // Met à jour le bouton actif
  updateActiveButton2();
}

function prevSlide2() {
  // Passe au slide précédent
  slideIndex2--;
  if (slideIndex2 < 0) {
    slideIndex2 = slides2.length - 1;
  }
  showSlide2(slideIndex2);
  
  // Met à jour le bouton actif
  updateActiveButton2();
}

function currentSlide2(n) {
  // Affiche le slide correspondant au bouton cliqué
  slideIndex2 = n;
  showSlide2(slideIndex2);
  
  // Met à jour le bouton actif
  updateActiveButton2();
}

function updateActiveButton2() {
  // Met à jour le bouton actif
  dots2.forEach((dot2, index) => {
    if (index === slideIndex2) {
      dot2.classList.add('active');
    } else {
      dot2.classList.remove('active');
    }
  });
}

// Affiche le premier slide et le bouton actif au chargement de la page
showSlide2(slideIndex2);
updateActiveButton2();

// Ajoute les événements click pour les flèches et les boutons
prevBtn2.addEventListener('click', prevSlide2);
nextBtn2.addEventListener('click', nextSlide2);
dots2.forEach((dot2, index) => {
  dot2.addEventListener('click', () => currentSlide2(index));
  // Met à jour le bouton actif lorsqu'il est cliqué
  dot2.addEventListener('click', updateActiveButton2);
});

// Définit l'intervalle de temps entre chaque changement de slide en millisecondes
const intervalTime2 = 5000;

// Démarre l'animation automatique
let slideInterval2 = setInterval(() => {
  nextSlide2();
}, intervalTime2);

// Arrête l'animation automatique lorsqu'un bouton est cliqué
const sliderContainer2 = document.querySelector('.contenant-slider2');
sliderContainer2.addEventListener('click', () => {
  clearInterval(slideInterval2);
  slideInterval2 = setInterval(() => {
    nextSlide2();
  }, intervalTime2);
});

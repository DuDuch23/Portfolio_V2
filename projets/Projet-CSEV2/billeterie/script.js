function initSlider() {
  const slider = document.querySelector('.contenant-image-slider');
  const slides = slider.querySelectorAll('.slide-image');
  const prevBtn = document.querySelectorAll('.fleche-gauche')[0];
  const nextBtn = document.querySelectorAll('.fleche-droite')[0];
  const dots = document.querySelectorAll('.btn-nav');
  let slideIndex = 0;

  function showSlide(n) {
    // Affiche le slide correspondant à l'index donné
    slides.forEach(slide => slide.style.display = 'none');
    dots.forEach(dot => dot.classList.remove('active'));
    slides[n].style.display = 'block';
    dots[n].classList.add('active');
  }

  function nextSlide() {
    // Passe au slide suivant
    slideIndex++;
    if (slideIndex > slides.length - 1) {
      slideIndex = 0;
    }
    showSlide(slideIndex);

    // Met à jour le bouton actif
    updateActiveButton();
  }

  function prevSlide() {
    // Passe au slide précédent
    slideIndex--;
    if (slideIndex < 0) {
      slideIndex = slides.length - 1;
    }
    showSlide(slideIndex);

    // Met à jour le bouton actif
    updateActiveButton();
  }

  function currentSlide(n) {
    // Affiche le slide correspondant au bouton cliqué
    slideIndex = n;
    showSlide(slideIndex);

    // Met à jour le bouton actif
    updateActiveButton();
  }

  function updateActiveButton() {
    // Met à jour le bouton actif
    dots.forEach((dot, index) => {
      if (index === slideIndex) {
        dot.classList.add('active');
      } else {
        dot.classList.remove('active');
      }
    });
  }

  // Affiche le premier slide et le bouton actif au chargement de la page
  showSlide(slideIndex);
  updateActiveButton();

  // Ajoute les événements click pour les flèches et les boutons
  prevBtn.addEventListener('click', prevSlide);
  nextBtn.addEventListener('click', nextSlide);
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => currentSlide(index));
    // Met à jour le bouton actif lorsqu'il est cliqué
    dot.addEventListener('click', updateActiveButton);
  });

  // Définit l'intervalle de temps entre chaque changement de slide en millisecondes
  const intervalTime = 5000;

  // Démarre l'animation automatique
  let slideInterval = setInterval(() => {
    nextSlide();
  }, intervalTime);

  // Arrête l'animation automatique lorsqu'un bouton est cliqué
  const sliderContainer = document.querySelector('.contenant-slider');
  sliderContainer.addEventListener('click', () => {
    clearInterval(slideInterval);
    slideInterval = setInterval(() => {
      nextSlide();
    }, intervalTime);
  });
}

if (document.querySelector('.banderole')) {
  initSlider();
}



const menuHamburger = document.querySelector(".menu-hamburger");
const dropDownMenu = document.querySelector(".dropdown_menu");
menuHamburger.addEventListener('click', function () {
    dropDownMenu.classList.toggle('open');
    });
window.addEventListener('click', function(e) {
    if (!dropDownMenu.contains(e.target) && !menuHamburger.contains(e.target)) {
      dropDownMenu.classList.remove('open');
    }
});


const flecheBanderole = document.querySelector(".fleche-banderole");
const sectionBanderole = document.querySelector(".banderole");

flecheBanderole.addEventListener("click", function() {
  if (sectionBanderole.classList.contains("afficher")) {
    sectionBanderole.classList.remove("afficher");
  } else {
    sectionBanderole.classList.add("afficher");
  }
});





function openModalOffre(id){
  var modal = document.getElementById("myModalOffre-"+id);
  modal.style.display = "block";
}
function closeModalOffre(id){
  var modal = document.getElementById("myModalOffre-"+id);
  modal.style.display = "none";
}
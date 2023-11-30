const navbar = document.querySelector("nav");
const navlink = navbar.querySelectorAll("a");

navlink.forEach((link) => {
    link.addEventListener("click", (event) => {
    event.preventDefault();
    const sectionId = link.getAttribute("href");
    navbar.style.display = "none";
    setTimeout(() => {
        navbar.style.display = "block";
        const section = document.querySelector(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: "smooth" });
        }
    }, 500);
  });
});

function modal(){
    var menuHamburger = document.getElementById("menu-hamburger")
    var buttonHamburger = document.getElementById("container-nav-bar")
    menuHamburger.style.display = "block";
    buttonHamburger.style.display = "none";

}
function hideHamburger(){
    var menuHamburger = document.getElementById("menu-hamburger")
    var buttonHamburger = document.getElementById("container-nav-bar")
    menuHamburger.style.display = "none";
    buttonHamburger.style.display = "grid";
}

function fullScreenModalProjet(){
    let btnFullScreen = document.querySelectorAll(".button_full_screen_modal");
    let fichesProjet = document.querySelectorAll(".fiche_projet");

    
}

function showModalProjet(){

    let btnLearnMore = document.querySelectorAll(".button_learn_more");
    let fichesProjet = document.querySelectorAll(".fiche_projet");
    
    btnLearnMore.forEach((button, index) => { // Le for parcourt tout les boutons learn_more existant
        
        button.addEventListener("click", function() { // Ajoute un event click pour chaque bouton learn_more existant
            
            let ficheProjet = fichesProjet[index];

            if(ficheProjet){
                let computedStyle = getComputedStyle(ficheProjet); // On récupère le display actuel de la div fiche_projet

                if (computedStyle.getPropertyValue('display') !== "flex") { // Si fiche_projet possède un display none, alors fiche_projet devient display flex
                    ficheProjet.style.display = "flex";
                    document.body.style.overflow = "hidden";
                } else {
                    ficheProjet.style.display = "none";
                    document.body.style.overflow = "auto";
                }
            }
        });
    });
}

function hideModalProjet(){

    let btnCloseModal = document.getElementsByClassName("button_close_modal");

    for (let i = 0; i < btnCloseModal.length; i++) { // Le for parcourt tout les boutons close_modal existant

        btnCloseModal[i].addEventListener("click", function() { // Ajoute un event click pour chaque bouton close_modal existant

            let d1 = document.getElementsByClassName("fiche_projet")[i];

            let computedStyle = getComputedStyle(d1); // On récupère le display actuel de la div fiche_projet

            document.addEventListener("keydown", function(event){
                if(event.key === "Escape" || event.key === "Esc" || event.key === "echap"){
                    d1.style.display === "none";
                    document.body.style.overflow = "auto";
                }
            });

            if (computedStyle.getPropertyValue('display') !== "none") { // Si fiche_projet possède un display flex, alors fiche_projet devient display none
                d1.style.display = "none";
                document.body.style.overflow = "auto";
            } else {
                d1.style.display = "flex";
                document.body.style.overflow = "hidden";
            }
        });
    }
}



// // Fonction pour vérifier si un élément est visible à l'écran
// function isElementInViewport(el) {
// var rect = el.getBoundingClientRect();
// return (
//     rect.left >= 0 &&
//     rect.right <= (window.innerWidth || document.documentElement.clientWidth)
// );
// }

// // Fonction pour animer l'apparition depuis la gauche
// function animateFromLeft() {
// var projetDiv = document.querySelector('.content_all_projet');
// if (isElementFullyInViewport('.content_all_projet')) {
//     projetDiv.style.left = '0';
// }
// }

// // Écoutez l'événement de défilement pour déclencher l'animation
// window.addEventListener('scroll', animateFromLeft);

// animateFromLeft();

// document.getElementsByClassName('button_learn_more').addEventListener('click', function () {
//     // Récupérer la valeur de l'ID que vous souhaitez envoyer
//     const idValue = 123; // Remplacez 123 par la valeur de l'ID que vous souhaitez envoyer

//     // Créer un objet FormData pour envoyer les données
//     const formData = new FormData();
//     formData.append('id', idValue);

//     // Effectuer la requête Fetch POST vers afficherModal.php
//     fetch('afficherModal.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('La requête a échoué.');
//         }
//         return response.text(); // Vous pouvez utiliser response.json() si la réponse est au format JSON
//     })
//     .then(data => {
//         // Traiter la réponse du serveur
//         console.log(data);

//         // Vous pouvez afficher le contenu du Modal ou prendre d'autres mesures ici
//     })
//     .catch(error => {
//         console.error(error);
//     });
// });

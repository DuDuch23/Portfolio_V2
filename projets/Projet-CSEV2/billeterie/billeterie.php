<?php
require('../include/connexion_bdd.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="billeterie.css">
    <title>Billeterie</title>
</head>
<body>
<div id="content-body">
    <div id="container-menu-deroulant">
        <div id="menu-deroulant">
            <div id="container-button-hide">
                <button id="hide-menu-deroulant" onclick="hideHamburger()"><img src="../images/croix.png" alt=""></button>
            </div>
            <ul id="nav-hamburger">
                <li><a href="../accueil.php">Accueil</a></li>
                <li><a href="../partenariats/partenariats.php">Partenariats</a></li>
                <li><a href="../billeterie/billeterie.php">Billeterie</a></li>
                <li><a href="../contact/contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <header>
        <div id="font-logo">
            <div class="container-logo">
                <img class="img-lsv" src="../images/LSV.png" alt="Lycée St-Vincent">
            </div>
            <div id="container-info">
                <div id="info-accueil">
                    <img id="home" src="../images/homeIcon.png" alt="home">
                    <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                    <p>Billeterie</p>
                </div>
                <div id="info-acces-rapide">
                    <p id="acces-rapide">Accès rapide</p>
                    <div id="info-offre-billeterie-contacter">
                        <div id="info-offre-billeterie">
                            <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                            <p>Accueil</p>
                        </div>
                        <div id="info-contacter">
                            <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                            <p>Offres / Billeterie</p>
                        </div>
                    </div>
                </div>
                <div id="info-contact">
                    <p id="information-contact">Informations de contact</p>
                    <div id="info-tel-email-lieu">
                        <div id="info-tel">
                            <div class="content-chevron-droit">
                                <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                            </div>
                            <p>Par téléphone : <a id="tel" href="#">+33303030303</a></p>
                        </div>
                        <div id="info-email">
                            <div class="content-chevron-droit">
                                <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                            </div>
                            <p>Par email : <a id="email" href="#">cse@lyceestvincent.fr</a></p>
                        </div>
                        <div id="info-lieu">
                            <div class="content-chevron-droit">
                                <img class="chevron-droit" src="../images/chevron-droit.png" alt="chevron">
                            </div>
                            <p>Au lycée : <a id="lieu" href="#">Bureau du CSE (1er étage bâtiment Saint-Vincent)</a></p>
                        </div>
                    </div>
                </div>
                <div id="partenaires">
                    <p id="nos-partenaires">Nos partenaires</p>
                    <div id="rectangle">
                        <div id="content-img-rectangle">
                            <div id="slider-gauche">
                                <img id="chevron-gauche-slider" src="../images/chevron-gauche.png" onclick="plusSlides(-1)" alt="chevron">
                            </div>
                            <div class="content-img-partenaire">
                                <img class="rectangle-img" src="../images/Leonidas.png" alt="image">
                            </div>
                            <div class="content-img-partenaire">
                                <img class="rectangle-img" src="../images/leonidas_blanc.png" alt="leonidas">
                            </div>
                            <div class="content-img-partenaire">
                                <img class="rectangle-img" src="../images/history_logo_leonidas_new.jpg" alt="leonidas">
                            </div>
                            <div id="slider-droit">
                                <img id="chevron-droit-slider" src="../images/chevron-droit.png" onclick="plusSlides(1)" alt="chevron">
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="all-partenaire">
                <p><a href="#">Découvrir tous nos partenaires</a></p>
            </div>
        </div>
        <div id="font-bleu">
            <div id="menu-hamburger" onclick="showMenuHamburger()">
                <span class="trait"></span>
                <span class="trait"></span>
                <span class="trait"></span>
            </div>
            <nav>
                <li id="accueil"><a href="../accueil.php">Accueil</a></li>
                <li id="partenariats"><a href="../partenariats/partenariats.php">Partenariats</a></li>
                <li id="billeterie"><a href="../billeterie/billeterie.php">Billeterie</a></li>
                <li id="li-contact"><a href="../contact/contact.php">Contact</a></li>
            </nav>
        </div>
    </header>

    <section class="offres">
        <div class="contenant-offres">
            <?php 
            $requete = $con ->prepare("SELECT * FROM billeterie");
            $requete->execute();
            $cse= $requete->fetchAll();
            foreach($cse as $billeterie) { 
            ?>
            <div class="cases-offres">
                <div class="ligne">
                    <div class="rectangle-offre">
                        <p>OFFRE</p>
                    </div>
                    <p class="date">Publié le 11 décembre 2022</p>
                </div>
                <div class="texte-offre">
                    <p><?= $billeterie['texte_billet']?></p>
                </div>
                <div class="savoir-plus">
                    <a onclick="openModalOffre(<?= $billeterie['billet_id'] ?>)" href="#" id="myBtn">Voir l'offre<img src="images/fleche.png" alt="icone fleche vers la droite"></a>
                </div>
                <div id="myModalOffre-<?= $billeterie['billet_id'] ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span onclick="closeModalOffre(<?= $billeterie['billet_id'] ?>)" class="close"><a href="../billeterie/billeterie.php">&times;</a></span>
                        <div class="header-modal">
                            <h1><?= $billeterie['nom_billet']?></h1>
                            <p>Publiée le date</p>
                        </div>
                        <div class="contenant-slider2">
                            <div class="slider2">
                                <div class="fleche-gauche2">
                                    <img src="images/fleche.png">
                                </div>
                                <div class="contenant-image-slider2">
                                    <img src="images/partenaires/leonidas.png" class="slide-image leonidas1" alt="">
                                    <img src="images/partenaires/leonidas2.png" class="slide-image leonidas2" alt="">
                                    <img src="images/partenaires/leonidas1.png" class="slide-image leonidas3" alt="">
                                </div>
                                <div class="fleche-droite2">
                                    <img src="images/fleche.png">
                                </div>
                            </div>
                            <div class="cont-btn">
                                <div class="btn-nav2" data-index="1"></div>
                                <div class="btn-nav2" data-index="2"></div>
                                <div class="btn-nav2" data-index="3"></div>
                            </div>
                        </div>
                        <div class="body-modal">
                            <p><?= $billeterie['texte_billet']?></p>
                        </div>
                        <div class="footer-modal">
                            <a class="lien-offre" href="#">Lien vers l'offre</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <footer>
        <div id="content-footer">
            <div id="content-footer-img">
                <div class="container-logo">
                    <img class="img-lsv" src="../images/LSV.png" alt="Lycée St-Vincent">
                </div>
            </div>
            <div id="titre-cse-raccourcis">
                <div id="titre-cse">
                    <p id="cse-lsv">CSE Lycée Saint-Vincent</p>
                </div>
                <div id="raccourcis">
                    <div class="chevron-blanc-raccourcis">
                        <div class="chevron-blanc">
                            <span class="trait-blanc-incline30deg"></span>
                            <span class="trait-blanc-incline-30deg"></span>
                        </div>
                        <div id="raccourcis-partenariats">
                            <p><a href="../accueil/accueil.php">Accueil</a></p>
                        </div>
                    </div>
                    <div class="chevron-blanc-raccourcis">
                        <div class="chevron-blanc">
                            <span class="trait-blanc-incline30deg"></span>
                            <span class="trait-blanc-incline-30deg"></span>
                        </div>
                        <div id="raccourcis-partenariats">
                            <p><a href="../partenariats/partenariats.php">Partenariats</a></p>
                        </div>
                    </div>
                    <div class="chevron-blanc-raccourcis">
                        <div class="chevron-blanc">
                            <span class="trait-blanc-incline30deg"></span>
                            <span class="trait-blanc-incline-30deg"></span>
                        </div>
                        <div id="raccourcis-billeterie">
                            <p><a href="../contact/contact.php">Contact</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="script.js" defer></script>
<script src="../script.js"></script>
<script src="modale.js" defer></script> 
</body>
</html>

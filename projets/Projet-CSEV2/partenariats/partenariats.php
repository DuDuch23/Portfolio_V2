<?php
require('../include/connexion_bdd.php');

if(empty($_GET['id_part'])===false){
    $requete = $con ->prepare("SELECT * FROM partenariats WHERE partenaire_id=:id");
    $requete->bindParam('id',$_GET['id_part']);
    $requete->execute();
    $partenariats= $requete->fetch();
    ?>
    <div class="popup open-popup" id="popup">
        <h5><?= $partenariats['partenaire_nom']?></h5>
        <img src="Leonidas.png">
        <p><?= $partenariats['texte_partenaire']?></p>
        <p><?= $partenariats['lien_partenaire']?></h5><br>
        <a href="partenariats.php"><button type="button" onclick="closePopup()">OK</button></a>
    </div>
    <?php
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partenariats.css">
    <title>Partenaires</title>
</head>
<body>
    <div id="content-body">
        <div id="container-menu-deroulant">
            <div id="menu-deroulant">
                <div id="container-button-hide">
                    <button id="hide-menu-deroulant" onclick="hideHamburger()"><img src="../images/croix.png" alt=""></button>
                </div>
                <ul id="nav-hamburger">
                    <li><a href="../accueil/accueil.php">Accueil</a></li>
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
                        <p>Partenariats</p>
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

        <div id="container-page-partenaire">
            <section class="page_partenaire">
                
            <?php 
                $requete = $con ->prepare("SELECT * FROM partenariats");
                $requete->execute();
                $cse= $requete->fetchAll();
                foreach($cse as $partenariats) { 
            ?>
                <div class="partenaire">
                    <div class="nom_partenaire">
                        <h5 class="nom_part"><?= $partenariats['partenaire_nom']?></h5>    
                    </div>
                    <div class="image_partenaire">
                        <a href="?id_part=<?= $partenariats['partenaire_id']?>" class="btn"><img src="../images/Leonidas.png"></a>
                    </div>
                </div>
            <?php } ?>
            </section>
        </div>

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
                                <p><a href="../billeterie/billeterie.php">Billeterie</a></p>
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
    <script src="../script.js"></script>
    <script>
        let popup = document.getElementById("popup");

        function openPopup(){
            popup.classList.add("open-popup");
        }

        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script>
</body>
</html>
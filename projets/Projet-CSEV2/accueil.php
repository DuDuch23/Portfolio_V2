<?php
require("include/connexion_bdd.php");
$query = $con->prepare("SELECT * FROM billeterie");
$query->execute();
$elements = $query->fetchAll();


$idSondage = 2;
$sondage = "SELECT question FROM sondage WHERE id_sondage = :id_sondage";
$choix = "SELECT firstChoice, secondChoice, thirdChoice FROM sondage WHERE id_sondage = :id_sondage";

try {
    $s = $con->prepare($sondage);
    $c = $con->prepare($choix);
    $s->bindParam(':id_sondage', $idSondage, PDO::PARAM_INT);
    $c->bindParam(':id_sondage', $idSondage, PDO::PARAM_INT);
    $s->execute();
    $c->execute();
    $row = $s->fetch(PDO::FETCH_ASSOC);
    $wor = $c->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("La requête a échoué : " . $e->getMessage());
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>LSV Projet</title>
</head>

<body>
    <div id="content-body">
        <div id="container-menu-deroulant">
            <div id="menu-deroulant">
                <div id="container-button-hide">
                    <button id="hide-menu-deroulant" onclick="hideHamburger()"><img src="../images/croix.png" alt=""></button>
                </div>
                <ul id="nav-hamburger">
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="partenariats/partenariats.php">Partenariats</a></li>
                    <li><a href="billeterie/billeterie.php">Billeterie</a></li>
                    <li><a href="contact/contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <header>
            <div id="font-logo">
                <div class="container-logo">
                    <img class="img-lsv" src="./images/LSV.png" alt="Lycée St-Vincent">
                </div>
                <div id="container-info">
                    <div id="info-accueil">
                        <img id="home" src="./images/homeIcon.png" alt="home">
                        <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
                        <p>Accueil</p>
                    </div>
                    <div id="info-acces-rapide">
                        <p id="acces-rapide">Accès rapide</p>
                        <div id="info-offre-billeterie-contacter">
                            <div id="info-offre-billeterie">
                                <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
                                <p>Accueil</p>
                            </div>
                            <div id="info-contacter">
                                <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
                                <p>Offres / Billeterie</p>
                            </div>
                        </div>
                    </div>
                    <div id="info-contact">
                        <p id="information-contact">Informations de contact</p>
                        <div id="info-tel-email-lieu">
                            <div id="info-tel">
                                <div class="content-chevron-droit">
                                    <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
                                </div>
                                <p>Par téléphone : <a id="tel" href="#">+33303030303</a></p>
                            </div>
                            <div id="info-email">
                                <div class="content-chevron-droit">
                                    <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
                                </div>
                                <p>Par email : <a id="email" href="#">cse@lyceestvincent.fr</a></p>
                            </div>
                            <div id="info-lieu">
                                <div class="content-chevron-droit">
                                    <img class="chevron-droit" src="./images/chevron-droit.png" alt="chevron">
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
                                    <img id="chevron-gauche-slider" src="./images/chevron-gauche.png" onclick="plusSlides(-1)" alt="chevron">
                                </div>
                                <div class="content-img-partenaire">
                                    <img class="rectangle-img" src="./images/Leonidas.png" alt="image">
                                </div>
                                <div class="content-img-partenaire">
                                    <img class="rectangle-img" src="./images/leonidas_blanc.png" alt="leonidas">
                                </div>
                                <div class="content-img-partenaire">
                                    <img class="rectangle-img" src="./images/history_logo_leonidas_new.jpg" alt="leonidas">
                                </div>
                                <div id="slider-droit">
                                    <img id="chevron-droit-slider" src="./images/chevron-droit.png" onclick="plusSlides(1)" alt="chevron">
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
                    <li id="accueil"><a href="">Accueil</a></li>
                    <li id="partenariats"><a href="partenariats/partenariats.php">Partenariats</a></li>
                    <li id="billeterie"><a href="billeterie/billeterie.php">Billeterie</a></li>
                    <li id="li-contact"><a href="contact/contact.php">Contact</a></li>
                </nav>
            </div>
        </header>

        <section id="container-offre">
            <div id="content-container-offre">
                <div class="message_bienvenue">
                    <p class="cse_paragraphe">CSE Lycée Saint-Vincent</p>
                    <p class="cse_contenu">Nous vous souhaitons la bienvenue sur le site du comité social et économique du lycée Saint-Vincent à Senlis.</p>
                    <p class="cse_contenu">Découvrez <a class="surli" href="#">l’équipe</a> et le <a class="surli" href="#">rôle</a> et missions de votre CSE.</p>
                </div>

                <div class="der_offres">
                    <p>Dernières offres de la billeterie</p>
                </div>
                <?php
                foreach($elements as $accueil)
                {
                    ?>
                    <div class="rectangle_8">
                        <div class="container_rectangle_offre_date_publication_offre">
                            <div class="petit_rectangle">
                                <p class="offre_rectangle">OFFRE</p>
                            </div>
                            <div class="container_date_publication_offre">
                                <p class="date_publication_offre">Publié le [date_publication_offre] - Du <?php echo $accueil['date_debut_validite_billet'] ?> au <?php echo $accueil['date_fin_validite_billet'] ?></p>
                            </div>
                        </div>
                        <div class="container_texte_offre">
                            <p class="texte_offre"><?php echo $accueil['texte_billet'] ?></p>
                        </div>
                        <div class="container_savoir_plus">
                            <p class="savoir_plus">EN SAVOIR PLUS </p>
                            <div class="content_chevron_droit">
                                <img class="d" src="./images/chevron-droit.png" alt="chevron-droit">
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>

        <footer>
            <div id="content-footer">
                <div id="content-footer-img">
                    <div class="container-logo">
                        <img class="img-lsv" src="./images/LSV.png" alt="Lycée St-Vincent">
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
                                <p><a href="../billeterie/billeterie.php">Billeterie</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<script src="script.js"></script>
</body>
</html>
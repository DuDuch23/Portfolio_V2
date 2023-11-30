<?php
require('../include/connexion_bdd.php');

$erreur = [];
    if(empty($_POST) === false)
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if(empty($_POST['nom']))
        {
            $erreur['nom'] = "Veuillez saisir votre nom";
        }
        if(empty($_POST['prenom']))
        {
            $erreur['prenom'] = "Veuillez saisir votre prénom";
        }
        if(empty($_POST['email']))
        {
            $erreur['email'] = "Veuillez saisir un email";
        }
        else
        {
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
            {
                $erreur['email'] = "Veuillez saisir un email valide";
            }
        }
        if(empty($_POST['message']))
        {
            $erreur['message'] = "Veuillez saisir votre message";
        }
    }

    
//var_dump($erreur);

$idSondage = rand(1,3);
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
    <link rel="stylesheet" href="contact.css">
    <title>Contact</title>
</head>
<body>
    <div id="content-body">
        <div id="container-menu-deroulant">
            <div id="menu-deroulant">
                <div id="container-button-hide">
                    <button id="hide-menu-deroulant" onclick="hideHamburger()"><img src="../images/croix.png" alt=""></button>
                </div>
                <ul>
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
                        <p>Contact</p>
                    </div>
                    <div class="sondage">
                        <div class="titre-sondage">
                            <p>Votre avis compte</p>
                        </div>

                        <form action="#" method="GET">
                            <div class="container-sondage">
                                <div class="question">
                                    <p>
                                        <?php
                                            if ($row) {
                                                $question = $row['question'];
                                                echo $question;
                                            } else {
                                                echo "Aucune question trouvée dans la base de données.";
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div class="container-choix">
                                    <div class="choix">
                                        <input type="radio" name="sondage">
                                        <label for="choix">
                                            <?php 
                                                if ($wor) {
                                                    $choix1 = $wor['firstChoice'];
                                                    echo $choix1;
                                                    if($wor)
                                                    {
                                                        $choixSelect = $choix1;
                                                    }                                                
                                                } 
                                            ?>
                                        </label>
                                    </div>
                                    <div class="choix">
                                        <input type="radio" name="sondage">
                                        <label for="choix">
                                            <?php 
                                                if ($wor) {
                                                    $choix2 = $wor['secondChoice'];
                                                    echo $choix2;
                                                    if($wor)
                                                    {
                                                        $choixSelect = $choix2;
                                                    }
                                                    
                                                } 
                                            ?>
                                        </label>                                    
                                    </div>
                                    <div class="choix">
                                        <input type="radio" name="sondage">
                                        <label for="choix">
                                            <?php 
                                                if ($wor) {
                                                    $choix3 = $wor['thirdChoice'];
                                                    echo $choix3;
                                                    if($wor)
                                                    {
                                                        $choixSelect = $choix3;
                                                    }
                                                } 
                                            ?>
                                        </label>                                    
                                    </div>
                                </div>
                                <?php //var_dump($choixSelect) ?>
                            </div>
                            <div class="container-button-sondage">
                                <div class="button-sondage">
                                    <button>Voir les réponses</button>
                                </div>
                                <div class="button-sondage">
                                    <button>Valider</button>
                                </div>

                            </div>
                        </form>
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
        
        <div id="container-formulaire">
            <div id="formulaire">
                <div id="titre">
                    <h1>Nous Contacter !</h1>
                </div>
                <form id="contact" method="POST" action="#">
                    <div class="item-contact">
                        <input class="input" type="text" name="nom" placeholder="Nom">
                        
                        <?php
                        if(isset($erreur['nom']))
                        {
                            ?><div class="erreur">
                                <p class="message-erreur"><?php echo $erreur['nom']; ?></p>
                            </div><?php
                        }
                        else
                        {
                            echo "";
                        }
                        ?>
                    </div>

                    <div class="item-contact">
                        <input class="input" type="text" name="prenom" placeholder="Prénom">

                        <?php
                        if(isset($erreur['prenom']))
                        {
                            ?><div class="erreur">
                                <p class="message-erreur"><?php echo $erreur['prenom']; ?></p>
                            </div><?php
                        }
                        else
                        {
                            echo "";
                        }
                        ?>

                    </div>

                    <div class="item-contact">
                        <input class="input" type="email" name="email" placeholder="E-mail">

                        <?php
                        if(isset($erreur['email']))
                        {
                            ?><div class="erreur">
                                <p class="message-erreur"><?php echo $erreur['email']; ?></p>
                            </div><?php
                        }
                        else
                        {
                            echo "";
                        }
                        ?>
                    </div>

                    <div id="item-message">
                        <textarea id="input-message" type="text" name="message" placeholder="Entrez votre message"></textarea>

                        <?php
                        if(isset($erreur['message']))
                        {
                            ?><div class="erreur">
                                <p class="message-erreur"><?php echo $erreur['message']; ?></p>
                            </div><?php
                        }
                        else
                        {
                            echo "";
                        }
                        ?>

                    </div>

                    <div class="item-contact">
                        <input id="submit" type="submit">
                        <?php
                            if(empty($_POST) === false)
                            {
                                if(empty($erreur))
                                {
                                    try{
                                        $sth = $con -> prepare("INSERT INTO message (nom_message, prenom_message, adresse_mail_message, contenu_message) 
                                            VALUES (:nom_message, :prenom_message, :adresse_mail_message, :contenu_message)");
                                        $sth->bindParam(':nom_message', $_POST['nom']);
                                        $sth->bindParam(':prenom_message', $_POST['prenom']);
                                        $sth->bindParam(':adresse_mail_message', $_POST['email']);
                                        $sth->bindParam(':contenu_message', $_POST['message']);
                                
                                        $sth->execute();
                                
                                        echo 'Votre demande a bien été prise en compte';
                                    }
                                    catch (PDOException $exception)
                                    {
                                        echo 'erreur';
                                    }
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
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
    <script src="../script.js"></script>
</body>
</html>
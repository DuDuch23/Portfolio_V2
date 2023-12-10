<?php
require('./require/connexion_bdd.php');

$erreur = [];
if(empty($_POST) === false)
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $contenu = $_POST['contenu'];

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
        $erreur['email'] = "Veuillez saisir votre adresse mail";
    }
    else
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
        {
            $erreur['email'] = "Veuillez saisir une adresse mail valide";
        }
    }
    if(empty($_POST['sujet']))
    {
        $erreur['sujet'] = "Pourquoi me contactez vous ?";
    }
    if(empty($_POST['contenu']))
    {
        $erreur['contenu'] = "Veuillez saisir votre message";
    }

    if(empty($erreur))
    {
        try{
            $insertion = $con->prepare('INSERT INTO message_portfolio (nom_message, prenom_message, email_message, sujet_message, contenu_message)
            VALUES (:nom_message, :prenom_message, :email_message, :sujet_message, :contenu_message)');
            $insertion->bindParam(':nom_message', $_POST['nom']);
            $insertion->bindParam(':prenom_message', $_POST['prenom']);
            $insertion->bindParam(':email_message', $_POST['email']);
            $insertion->bindParam(':sujet_message', $_POST['sujet']);
            $insertion->bindParam(':contenu_message', $_POST['contenu']);

            $insertion->execute();

            echo "Votre demande a bien été transmise";
        } catch (\Exception $exception)
        {
            echo 'Erreur lors de l\'ajout de la demande de contact.';
        }
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Portfolio</title>
    <link href="portfolio.css" rel="stylesheet">
</head>

<body>
    <?php
    require('./require/navbar.php');
    ?>
    <div id="bloc-accueil">
        <div class="wrapper">
            <div class="titre">
                <h1 id="accueil">Accueil</h1>
            </div>
            <div id="presentation">
                <div id="pdp">
                    <a href="./admin/admin.php"><img id="img-pdp" src="./image/photo-de-profil.jfif" alt="pdp"></a>
                </div>
                <div id="container-text">
                    <p class="presentation-text">Bienvenue</p>
                    <p class="presentation-text">Vous êtes sur le portfolio de : </p>
                    <p id="nom-prenom">Duchemin Alexandre</p>
                    <p class="presentation-text">Futur Développeur Full Stack Junior</p>
                    <p class="presentation-text">En BTS SIO (Services Informatiques aux Organisations) à Saint-Vincent de Senlis</p>
                </div>
                <div id="CV">
                    <?php
                    $cvLocal = "CV-Alexandre-Duchemin.pdf";
                    $cvEnLigne = "https://aduchemin.lyceestvincent.fr/CV-Alexandre-Duchemin.pdf";
                    ?>
                    <button id="bouton-CV"><a href="<?= $cvEnLigne ?>" target="_blank">Télécharger mon CV</a></button>
                </div>
            </div>
        </div>
    </div>

    <div id="bloc-projets">
        <div class="content_bloc_projets">
            <div class="titre">
                <h1>Mes Projets</h1>
            </div>
            <div class="content_all_projet">

                <?php
                $bddProjet = $con->prepare('SELECT * FROM projet');
                $bddProjet -> execute();
                $contentProjet = $bddProjet->fetchAll();

                foreach($contentProjet as $projet)
                {
                    ?>
                    <div class="content_projet">
                        <div class="projet">
                            <div class="container_image_projet">
                                <img class="image_projet" src="./image/<?php echo $projet['image_projet']; ?>" alt="<?php echo $projet['alt_img_projet']; ?>">
                            </div>
                            <div class="titre_projet">
                                <h1><?php echo $projet['nom_projet']; ?></h1>
                            </div>
                            <div class="content_form_affiche_fiche">
                                <form class="affiche_fiche_projet" action="index.php" method="get">
                                    <input type="hidden" name="id_projet" value="<?= $projet['id_projet']; ?>">
                                    <button class="button_learn_more" onclick="showModalProjet()" >Fiche Projet (en travaux)</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
        if(isset($_GET['id_projet']))
        {
            $idProjet = $_GET['id_projet'];

            $lastId = $con->prepare("SELECT MAX(id_projet) AS dernier_id_projet FROM projet");
            $lastId->execute();
            $contentLastId = $lastId->fetch();

            $allIdProjet = $con->prepare("SELECT id_projet FROM projet");
            $allIdProjet->execute();
            $contentAllIdProjet = $allIdProjet->fetchAll();

            if($idProjet <= 0 || $idProjet > $contentLastId['dernier_id_projet'])
            {
                echo "<script>window.location.href = '/';</script>";
                exit;
            }
            if(!in_array($idProjet, $contentAllIdProjet))
            {
                $e = "ok il est pas dans le tableau d'id";
            }

            $infoProjet = $con->prepare("SELECT * FROM projet WHERE id_projet = " . $idProjet);
            $infoProjet->execute();
            $contentInfoProjet = $infoProjet->fetch();
            ?>
            <div class="fiche_projet" style="display: flex;">
                <div class="previous_projet">
                    <form id="form_previous_projet" action="index.php" method="GET">
                        <input type="hidden" name="id_projet" value="<?= $idProjet - 1; ?>">
                        <button>
                            <img class="fleche_gauche" src="image/fleche-previous.png" alt="Projet précédent">
                        </button>
                    </form>
                </div>
                <div class="content_fiche_projet">
                    <div class="top_fiche_projet">
                        <div class="fullscreen_modal">
                            <button class="button_fullscreen_modal">&#9633</button>
                        </div>
                        <form class="close_modal" action="/">
                            <button class="button_close_modal" onclick="hideModalProjet()">X</button>
                        </form>
                    </div>

                    <div class="info_projet">
                        <div class="titre_projet">
                            <h1><?= $contentInfoProjet['nom_projet'] ?></h1>
                        </div>
                        <div class="image_info_projet">
                            <img src="./image/<?= $contentInfoProjet['image_apercu_projet']; ?>" alt="<?= $contentInfoProjet['alt_img_projet']; ?>">
                        </div>
                        <div class="description_texte">
                            <p>Description : </p>
                            <div class="description_projet">
                                <p><?= $contentInfoProjet['description_projet'] ?></p>
                            </div>
                        </div>
                        <div class="content_technos">
                            <p>Techno : <?= $contentInfoProjet['technos_projet']; ?></p>
                        </div>
                        <div class="temps">
                            <p>Temps de réalisation : <?= $contentInfoProjet['temps_realisation_projet'] ?></p>
                        </div>
                        <div class="lien_github">
                            <a href="<?= $contentInfoProjet['lien_github'] ?>" target="_blank"><img src="image/github.png" alt="logo github"></a>
                        </div>
                        <div class="lien_site">
                            <a href="<?= $contentInfoProjet['lien_projet'] ?>" target="_blank">Visiter le site</a>
                        </div>
                    </div>
                </div>
                <div class="next_projet">
                    <form id="form_next_projet" action="index.php" method="GET">
                        <input type="hidden" name="id_projet" value="<?= $idProjet + 1; ?>">
                        <button>
                            <img class="fleche_droite" src="image/fleche-next.png" alt="Projet suivant">
                        </button>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
<!-- faire une boucle if $idProjet n'est pas dans (une commande qui récupérera tout les id des projets), alors, créer une boucle :
value="$idProjet (+ 1 pour next_projet et - 1 pour previous_projet)" tant que $idProjet n'est pas = à une valeur se trouvant dans
la commande qui récupère chaque id des projets -->
    </div>

    <div id="bloc-timeline">
        <div class="wrapper">
            <div class="titre">
                <h1 id="ma-timeline">Timeline</h1>
            </div>
            <div id="timeline">
                <div id="container-timeline">
                    <span class="trait"></span>
                    <?php
                    $bddTimeline = $con->prepare('SELECT * FROM timeline');
                    $bddTimeline -> execute();
                    $contentTimeline = $bddTimeline->fetchAll();
                    foreach($contentTimeline as $timeline)
                    {
                        ?>
                        <div class="timeline-item">
                            <div class="timeline-item-date">
                                <p class="date"><?php echo $timeline['date_timeline'];?></p>
                            </div>
                            <div class="timeline-item-content">
                                <div class="timeline-item-content-logo">
                                    <img src="./image/<?php echo $timeline['image_technos_timeline']; ?>" alt="<?php echo $timeline['alt_img_technos_timeline']; ?>" class="img-lang">
                                </div>
                                <h3 class="timeline-item-titre"><?php echo $timeline['nom_technos_timeline']; ?></h3>
                                <p class="timeline-item-texte"><?php echo $timeline['texte_timeline']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <div id="bloc-contact">
        <div class="wrapper">
            <div class="titre">
                <h1>Me Contacter</h1>
            </div>
            <form id="contact" method="POST" action="#">

                <div class="item-contact">
                    <input class="input" type="text" name="nom" placeholder="Nom">
                </div>

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

                <div class="item-contact">
                    <input class="input" type="text" name="prenom" placeholder="Prenom">
                </div>

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

                <div class="item-contact">
                    <input class="input" type="email" name="email" placeholder="email">
                </div>
    
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

                <div class="item-contact">
                    <select class="input" name="sujet" placeholder="sujet">
                        <option class="option-sujet" value=""></option>
                        <option class="option-sujet" value="demande-partenariat">Demande de partenariats</option>
                        <option class="option-sujet" value="demande-offre">Demande d'offre</option>
                        <option class="option-sujet" value="??">??</option>
                        <option class="option-sujet" value="autre">Autre...</option>
                    </select>
                </div>

                <?php
                if(isset($erreur['sujet']))
                {
                    ?><div class="erreur">
                        <p class="message-erreur"><?php echo $erreur['sujet']; ?></p>
                    </div><?php
                }
                else
                {
                    echo "";
                }
                ?>

                <div class="item-contact">
                    <textarea class="input" type="text" name="contenu" placeholder="Votre message"></textarea>
                </div>

                <?php
                if(isset($erreur['contenu']))
                {
                    ?><div class="erreur">
                        <p class="message-erreur"><?php echo $erreur['contenu']; ?></p>
                    </div><?php
                }
                else
                {
                    echo "";
                }
                ?>

                <div id="button-submit">
                    <input id="submit" type="submit">
                </div>
            </form>
        </div>
    </div>
    <div class="content-log">
        <div class="logs" style="background-color: #fff; width: 40%; height: 30%;">
            <p>
                <?php
                //var_dump($contentAllIdProjet)
                ?>
            </p>
        </div>
    </div>
    <div id="foot-page"></div>
    <script src="./js/script.js"></script>
</body>
</html>
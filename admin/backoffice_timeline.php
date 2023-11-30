<?php
require("../require/connexion_bdd.php");

if (isset($_SESSION['id_admin'])) {
    header("Location: ../admin/admin.php"); // Redirigez vers la page de connexion
    exit;
}
else
{
    session_start();
}

$query = $con->prepare("SELECT * FROM timeline");
$query->execute();
$elements = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice Timeline</title>
    <link rel="stylesheet" href="backoffice_timeline.css">
</head>
<body>
    <?php
    require('../require/navbar_admin.php');
    ?>
    <div class="bloc_timeline">
        <div class="content_bloc_timeline">
            <div class="titre">
                <h1>Ma Timeline</h1>
            </div>
            <div class="content_all_timeline">
                <?php
                $bddTimeline = $con->prepare('SELECT * FROM timeline');
                $bddTimeline -> execute();
                $contentTimeline = $bddTimeline->fetchAll();

                foreach ($contentTimeline as $timeline)
                {
                ?>
                    <div class="timeline">
                        <div class="content_timeline">
                            <div class="content_img_techno_nom_techno_date_modifier_supprimer_texte">
                                <div class="content_img_techno_nom_techno_date_modifier_supprimer">
                                    <div class="img_techno_nom_techno">
                                        <div class="content_img_techno">
                                            <img class="img_techno" src="../image/<?=$timeline['image_technos_timeline']?>" alt="<?=$timeline['alt_img_technos_timeline']?>" class="img-lang">
                                        </div>
                                        <div class="content_nom_techno">
                                            <div class="nom_techno">
                                                <p class="nom"><?=$timeline['nom_technos_timeline']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="date_modifier_supprimer">
                                        <div class="content_date_modifier_supprimer">
                                            <div class="content_date">
                                                <p class="date"><?=$timeline['date_timeline']?></p>
                                            </div>
                                            <div class="modifier_supprimer">
                                                <form class="form_modifier" action="modifierTimeline.php">
                                                    <div class="modifier">
                                                        <img src="../image/logo_modifier.png" alt="logo_modifier">
                                                        <input type="submit" value="Modifier">
                                                    </div>
                                                </form>
                                                <form class="form_supprimer" action="supprimerTimeline.php">
                                                    <div class="supprimer">
                                                        <img src="../image/logo_supprimer.png" alt="logo_supprimer">
                                                        <input type="submit" value="Supprimer">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content_texte">
                                    <p class="texte"><?=$timeline['texte_timeline']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require("../require/connexion_bdd.php");

session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: admin.php"); // Redirigez vers la page de connexion
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Projet</title>
    <link rel="stylesheet" href="backoffice_projet.css">
</head>
<body>
    <?php
    require('../require/navbar_admin.php');
    if(!isset($_POST['predelete']))
    {
        $idDelete = $_POST['predelete'];
        ?>
        <div id="example">
            <div>
                <p>Voulez supprimer</p>
                <a href="#" onclick="example()">Fermer</a>
            </div>
        </div>
        <?php
    }
    ?>

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
                                <img class="image_projet" src="../image/<?= $projet['image_projet']; ?>" alt="<?= $projet['alt_img_projet']; ?>">
                            </div>
                            <div class="titre_projet">
                                <h1><?= $projet['nom_projet']; ?></h1>
                            </div>
                            <div class="supprimer_modifier_projet">
                                <form action="modifierProjet.php" method="GET">
                                    <input type="hidden" name="id" value="<?= $projet['id_projet']; ?>">
                                    <input type="submit" value="Modifier">
                                </form>
                                <form action="#" method="POST">
                                    <input type="hidden" name="predelete[id]" value="<?= $projet['id_projet']; ?>">
                                    <button type="button" onclick="example()">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="nouveau_projet">
                    <form action="ajoutProjet.php">
                        <input type="submit" class="button_nouveau_projet">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/modalDelete.js"></script>
</body>
</html>
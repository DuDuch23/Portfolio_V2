<?php
require("../require/connexion_bdd.php");

session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: admin.php"); // Redirigez vers la page de connexion
    exit;
}

$dataProjetEdit = $con->prepare('SELECT * FROM projet WHERE id_projet = ' . $_GET['id']);
$dataProjetEdit->execute();
$contentDataProjetEdit = $dataProjetEdit->fetch();

$erreur = [];
if(empty($_POST) === false)
{
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $technos = $_POST['technos'];
    $image = $_FILES['image'];
    $alt_image = $_POST['alt_image'];
    $lien = $_POST['lien'];
    $temps = $_POST['temps'];

    if(empty($_POST['nom']))
    {
        $erreur['nom'] = "Saisissez un nom pour le projet";
    }
    if(empty($_POST['description']))
    {
        $erreur['description'] = "Saisissez une description";
    }
    if(empty($_POST['technos']))
    {
        $erreur['technos'] = "Saisissez une ou plusieurs technos";
    }
    if(empty($_FILES['image']))
    {
        $erreur['image'] = "Saisissez une image du projet";
    }
    else 
    {
        $file = $_FILES['image'];
        $updloadImage = '../image/';

        if($file['error'] === UPLOAD_ERR_OK)
        {
            $uploadImgPath = $updloadImage . basename($file['name']);

            // Vérification si doublon de l'image
            if(file_exists($uploadImgPath))
            {
                $erreur['image'] = "Le fichier éxiste déjà";
            }
            else
            {
                // Vérifier si le fichier est une image
                $extensions = ['jpg', 'png', 'PNG', 'jpeg', 'gif', 'webp'];
                $fileExtension = strtolower(pathinfo($uploadImgPath, PATHINFO_EXTENSION));

                if(!in_array($fileExtension, $extensions) || exif_imagetype($file['tmp_name']) === false)
                {
                    $erreur['image'] = "Seules les images de types WEBP, JPG, PNG, JPEG, et GIF sont autorisées";
                }
                else
                {
                    // Déplacement du fichier vers le répertoire d'image
                    if(move_uploaded_file($file['tmp_name'], $uploadImgPath))
                    {
                        $nomImage = basename($file['name']);
                    }
                    else
                    {
                        $erreur['image'] = "Echec lors du téléchargement du fichier. <br>Détails : " . print_r(error_get_last(), true);
                    }
                }
            }
        }
        else
        {
            $erreur['image'] = "Erreur lors du téléchargement du fichier";
        }
    }

    if(empty($_POST['alt_image']))
    {
        $erreur['alt_image'] = "Saisissez une alternative textuelle (alt) pour l'image";
    }
    if(empty($_POST['lien']))
    {
        $erreur['lien'] = "Saisissez un lien";
    }
    if(empty($_POST['temps']))
    {
        $erreur['temps'] = "Saisissez un temps de création (heures, semaines, mois)";
    }

    if(empty($erreur['nom']) || empty($erreur['description']) || empty($erreur['technos']) || empty($erreur['image']) || empty($erreur['alt_img']) || 
    empty($erreur['lien']) || empty($erreur['temps']))
    {
        try{
            $update = $con->prepare('UPDATE projet SET nom_projet = :nom, description_projet = :description_projet, technos_projet = :technos,
            image_projet = :image_projet, alt_img_projet = :alt_img, temps_realisation_projet = :temps_realisation, lien_projet = :lien
            WHERE projet.id_projet = :id');
            $update->bindValue(':nom', $_POST['nom']);
            $update->bindValue(':description_projet', $_POST['description']);
            $update->bindValue(':technos', $_POST['technos']);
            $update->bindValue(':image_projet', $nomImage);
            $update->bindValue(':alt_img', $_POST['alt_image']);
            $update->bindValue(':lien', $_POST['lien']);
            $update->bindValue(':temps_realisation', $_POST['temps']);
            $update->bindValue(':id', $_GET['id']);

            $update->execute();

            echo "Votre demande a bien été transmise";
        } catch (\Exception $exception)
        {
            echo 'Erreur lors de l\'ajout du projet.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un projet</title>
</head>
<body style="background-color: #222; color: white;">
    <div id="content_body">
        <h1>Modifier le projet : </h1>
        <a href="backoffice_projet.php">Revenir aux projets</a>
        <form action="#" method="post" enctype="multipart/form-data">
            
            <div class="ajout_info_projet">
                <input type="text" name="nom" placeholder="Nom du projet" value='<?= $contentDataProjetEdit['nom_projet'] ?>'>
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

            <div class="ajout_info_projet">
                <input type="text" name="description" placeholder="Description" value='<?= $contentDataProjetEdit['description_projet'] ?>'>
            </div>
            <?php
            if(isset($erreur['description']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['description']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="text" name="technos" placeholder="Technos" value='<?= $contentDataProjetEdit['technos_projet'] ?>'>
            </div>
            <?php
            if(isset($erreur['technos']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['technos']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>


            <div class="ajout_info_projet">
                <label for="image">Image : </label>
                <input type="file" name="image" value='<?= $contentDataProjetEdit['image_projet'] ?>'>
                <?php
                //var_dump($_FILES)
                ?>
            </div>
            <?php
            if(isset($erreur['image']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['image']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="text" name="alt_image" placeholder="Alternative Textuelle (alt)" value='<?= $contentDataProjetEdit['alt_img_projet'] ?>'>
            </div>
            <?php
            if(isset($erreur['alt_image']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['alt_image']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="url" name="lien" placeholder="Lien du projet" value='<?= $contentDataProjetEdit['lien_projet'] ?>' require>
            </div>
            <?php
            if(isset($erreur['lien']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['lien']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="text" name="temps" placeholder="Temps de réalisation" value='<?= $contentDataProjetEdit['temps_realisation_projet'] ?>'>
            </div>
            <?php
            if(isset($erreur['temps']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['temps']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="submit">
            </div>
        </form>
    <?php
    var_dump($contentDataProjetEdit)
    ?>
    </div>
</body>
</html>
<?php
require("../require/connexion_bdd.php");

session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: admin.php"); // Redirigez vers la page de connexion
    exit;
}

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
                    $erreur['image'] = "Seules les images de types JPG, PNG, JPEG, WEBP et GIF sont autorisées";
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
    if(empty($_POST["lien_github"]))
    {
        $erreur["lien_github"] = "Saisissez un lien repository github";
    }
    if(empty($_POST['temps']))
    {
        $erreur['temps'] = "Saisissez un temps de création (heures, semaines, mois)";
    }

    if(empty($erreur))
    {
        try{
            $insertion = $con->prepare('INSERT INTO projet 
            (nom_projet, description_projet, technos_projet, image_projet, alt_img_projet, lien_projet, temps_realisation_projet) 
            VALUES (:nom_projet, :description_projet, :technos_projet, :image_projet, :alt_img_projet, :lien_projet, :temps_realisation_projet)');
            $insertion->bindParam(':nom_projet', $_POST['nom']);
            $insertion->bindParam(':description_projet', $_POST['description']);
            $insertion->bindParam(':technos_projet', $_POST['technos']);
            $insertion->bindParam(':image_projet', $nomImage);
            $insertion->bindParam(':alt_img_projet', $_POST['alt_image']);
            $insertion->bindParam(':lien_projet', $_POST['lien']);
            $insertion->bindParam(':temps_realisation_projet', $_POST['temps']);

            $insertion->execute();

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
<body style="background-color: #222; color: white; display: flex; justify-content: center;">
    <div id="content_body">
        <h1>Ajouter un projet : </h1>
        <a href="backoffice_projet.php">Revenir aux projets</a>
        <form action="#" method="post" enctype="multipart/form-data">

            <div class="ajout_info_projet">
                <input type="text" name="nom" placeholder="Nom du projet">
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
                <input type="text" name="description" placeholder="Description">
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
                <input type="text" name="technos" placeholder="Technos">
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
                <input type="file" name="image" accept="image/*">
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
                <input type="text" name="alt_image" placeholder="Alternative Textuelle (alt)">
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
                <input type="url" name="lien" placeholder="Lien du projet" require>
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
                <input type="url" name="lien_github" placeholder="Lien github" require>
            </div>
            <?php
            if(isset($erreur['lien_github']))
            {
                ?><div class="erreur">
                    <p class="message-erreur"><?php echo $erreur['lien_github']; ?></p>
                </div><?php
            }
            else
            {
                echo "";
            }
            ?>

            <div class="ajout_info_projet">
                <input type="text" name="temps" placeholder="Temps de réalisation">
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
                <input type="file" name="fichier">
            </div>

            <div class="ajout_info_projet">
                <input type="submit">
            </div>
        </form>
    <?php
    var_dump($_POST)
    ?>
    </div>
</body>
</html>
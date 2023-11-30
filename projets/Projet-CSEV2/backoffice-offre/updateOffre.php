<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleajout.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Ajouter | CSE Lycée Saint Vincent</title>
</head>
<?php

//Connexion con
require_once "../include/connexion_bdd.php";
$sql = "SELECT * FROM `billeterie`";
$requete = $con->prepare($sql);
$requete->execute();
$partenaires = $requete->fetchAll();
$id = $_GET['id'] ?? $_POST['id'];
if (isset($_POST['submit'])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $nbplace = $_POST["nbplace"];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $type_image = $_FILES['image']['tmp_name'];


    if (empty($nom) || empty($description) || empty($nbplace)|| empty($date)|| empty($date2) || empty($_FILES['image'])|| empty($partenaire)) {

        $query = "UPDATE `billeterie` SET `nom_billet` = ?,`texte_billet` = ?,`date_debut_validite_billet` = ? ,`date_fin_validite_billet` = ?,`nombre_place_min_billet` = ? WHERE `billet_id` = ?";

        $query = $con->prepare($query);
        $query->execute([$nom, $description, $date, $date2, $nbplace, $id]);
    }}
?>

<div class="ajout">
    <h1>Modifier une Offre</h1>

    <div class="form"> 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Nom de l'offre</label>
                <br>
                <input type="text" class="nom" id="exampleFormControlInput1 " value="<?=$offres['nom_billet']?>" name="nom">
            </div>


            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Description de l'offre</label> <br>
                <textarea class="description" id="exampleFormControlTextarea1" rows="3" name="description"><?=$offres['texte_billet']?></textarea>
            </div>
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Date de début de l'offre</label> <br>
                <input type="date" name="date" value="<?=$offres['date_debut_validite_billet']?>">
            </div>
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Date de fin de l'offre</label> <br>
                <input type="date"  name="date2" value="<?=$offres['date_fin_validite_billet']?>">
            </div>

            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Place Min. Offre</label> <br>
                <input type="number" class="nom" name="nbplace" value="<?=$offres['nombre_place_min_billet']?>">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>" >
            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Image</label> <br>
                <input multiple type="file" class="image" id="exampleFormControlInput1" name="image[]"><br>

            </div>

            <div class="submit">
                <a href="#"><button type="submit" class="btn btn-primary me-md-2" name="submit">Ajouter</button></a>
            </div>
        </form>
    </div>
</div>


<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h2> Le partenaire a été ajouté</h2>
        <div class="modal-buttons">
            <button id="cancelBtn">Confirmer</button>
        </div>
    </div>
</div>

</body>
</html>
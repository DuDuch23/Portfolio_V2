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
$sql = "SELECT * FROM `partenariats`";
$requete = $con->prepare($sql);
$requete->execute();
$billeteries = $requete->fetchAll();

if (isset($_POST['submit'])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];

    if (empty($nom) || empty($description) || empty($lien)) {

        $query = "INSERT INTO `partenariats` (`partenaire_nom`,`texte_partenaire`) VALUES (?,?)";
        
        $query = $con->prepare($query);
        $query->execute([$nom, $description]);
        $id_offre = $con->lastInsertId();
       
    
header("Location: back_partenaire.php");
    }
}

?>

<body>


<div class="ajout">
    <h1>Ajouter un partenaire</h1>

    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ligne">

                <label for="exampleFormControlInput1" class="form-label">Nom du Partenaire</label>
                <br>
                <input type="text" class="nom" id="exampleFormControlInput1 " name="nom">
            </div>

            
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Description du partenaire</label> <br>
                <textarea class="description" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>

            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">lien du partenaire</label> <br>
                <textarea class="lien" id="exampleFormControlTextarea1" rows="3" name="lien"></textarea>
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

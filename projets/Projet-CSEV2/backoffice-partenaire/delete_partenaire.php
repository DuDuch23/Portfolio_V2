<?php

require_once "../include/connexion_bdd.php";
$id = $_GET['id'];
if (isset($id)) {
    $sql = "SELECT * FROM `partenariats` WHERE `partenaire_id` = :id";
    $billet = $con->prepare($sql);
    $billet->execute([':id' => $id]);
    $billeteries = $billet->fetch();
    if ($billeteries){
        try {
            $sql = "DELETE FROM partenariats WHERE partenaire_id = ?";
            $requete = $con->prepare($sql);
            $requete->execute([(int)$id]);
            header("Location: back_partenaire.php");
        }catch(Exception $e){
            echo $e;
        }
    } else {
        ?>
        <script>
            alert("Partenaire introuvable")
        </script>
        <?php
    }
}

?>
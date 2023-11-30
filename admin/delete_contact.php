<?php

require("../require/connexion_bdd.php");
$id = $_GET['id'];
if (isset($id)) {
    $sql = "SELECT * FROM message_portfolio WHERE id_message = :id";
    $contact = $con->prepare($sql);
    $contact->execute([':id' => $id]);
    $idContact = $contact->fetch();
    if ($idContact){
        try {
            $sql = "DELETE FROM message_portfolio WHERE id_message = ?";
            $requete = $con->prepare($sql);
            $requete->execute([(int)$id]);
            header("Location: backoffice_contact.php");
        }catch(Exception $e){
            echo $e;
        }
    } else {
        ?>
        <script>
            alert("Un problème est survenu")
        </script>
        <?php
    }
}

?>
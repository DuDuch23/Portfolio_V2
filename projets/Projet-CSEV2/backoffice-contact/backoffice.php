<?php
require("../include/connexion_bdd.php");
$query = $con->prepare("SELECT * FROM message");
$query->execute();
$elements = $query->fetchAll();
if (isset($_POST['delete'])) 
{
    $formulaire = $_POST['delete'];
    
    if (isset($formulaire['id'])) 
    {
        try 
        {
            $delete = $con->prepare('DELETE FROM message WHERE id_message = :id');
            $delete->bindParam(':id', $formulaire['id']);
            $delete->execute();
        } 
        catch (\Exception $exception) 
        {
            var_dump($exception);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backoffice</title>
    <link rel="stylesheet" href="backoffice.css">
</head>
<body>
    <?php 
        if (isset($_POST['predelete'])) 
        {
            $iddelete = $_POST['predelete'];
            ?>
            <div id="content-modal">
                    <div id="modal-delete">
                        <h1 id="titre-modal-delete">Etes vous sur de vouloir supprimer cette ligne ?</h1>
                        <div id="button-oui-non">         
                        <form action="#" method="POST">
                            <input type="hidden" name="delete[id]" value="<?php echo $iddelete['id'] ?>">
                            <button id="button-oui" onclick="">Oui</button>
                        </form>
                        <button id="button-non" onclick="hideModal()">Non</button>
                    </div>
                </div>
            </div>
    <?php
        } ?>
    
    <header>
        <div id="font-bleu">
                <div id="menu-hamburger">
                    <span class="trait"></span>
                    <span class="trait"></span>
                    <span class="trait"></span>
                </div>
                <nav>
                    <li id="accueil"><a href="../backoffice-accueil/backoffice.php">Accueil</a></li>
                    <li id="partenariats"><a href="../backoffice-partenaire/back_partenaire.php">Partenariats</a></li>
                    <li id="billeterie"><a href="../backoffice-offre/back-office.php">Billeterie</a></li>
                    <li id="li-contact"><a href="backoffice.php">Contact</a></li>
                </nav>
            </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th style="width: 10%">Nom</th>
                <th style="width: 10%">Prénom</th>
                <th style="width: 25%;">E-Mail</th>
                <th id="contenu">Contenu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($elements as $liste)
        { ?>
            <tr>
                <td><?php echo $liste['id_message'] ?></td>
                <td style="width: 10%"><?php echo $liste['nom_message'] ?></td>
                <td style="width: 10%"><?php echo $liste['prenom_message'] ?></td>
                <td style="width: 25%"><?php echo $liste['adresse_mail_message'] ?></td>
                <td><?php echo $liste['contenu_message'] ?></td>
                <td>
                    <form action="#" method="POST">
                    <input type="hidden" value="<?php echo $liste['id_message'] ?>" name= "predelete[id]">
                        <button id="delete" onclick="modal()" >SUPPRIMER</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        function modal(){
            var div = document.getElementById("content-modal")
            div.style.display = "flex";
        }
        function hideModal(){
            var div = document.getElementById("content-modal")
            div.style.display = "none";
        }
    </script>

</body>
</html>
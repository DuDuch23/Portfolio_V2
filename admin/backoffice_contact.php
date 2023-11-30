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

$query = $con->prepare("SELECT * FROM message_portfolio");
$query->execute();
$elements = $query->fetchAll();

if (isset($_POST['delete'])) 
{
    $formulaire = $_POST['delete'];
    
    if (isset($formulaire['id'])) 
    {
        try 
        {
            $delete = $con->prepare('DELETE FROM message_portfolio WHERE id_message = :id');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Contact</title>
    <link rel="stylesheet" href="backoffice_contact.css">
</head>
<body>
    <?php
    require('../require/navbar_admin.php');
    ?>
    <div class="content_modal_delete">
        <div class="modal_delete">
            <h1>Voulez vous supprimer cette ligne ?</h1>
        </div>
        <div class="button_oui_non">
            <button id="button_oui">Oui</button>
            <button id="button_non">Non</button>
        </div>
    </div>
    
    <div class="content_table_backoffice">
        <table class="table_backoffice">
            <thead class="thead_backoffice">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($elements as $liste)
            { ?>
                <tr>
                    <td><?php echo $liste['id_message'] ?></td>
                    <td><?php echo $liste['nom_message'] ?></td>
                    <td><?php echo $liste['prenom_message'] ?></td>
                    <td><?php echo $liste['email_message'] ?></td>
                    <td><?php echo $liste['sujet_message'] ?></td>
                    <td><?php echo $liste['contenu_message'] ?></td>
                    <td class="button_action">
                        <button class="delete"><a href="delete_contact.php?id=<?php echo $liste['id_message'] ?>">Supprimer</a></button>
                        <button class="modif"><a href="modif_message.php?id=<?php echo $liste['id_message'] ?>">Modifier</a></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        const deleteBtns = document.querySelectorAll('delete a');
        const modalDelete = document.getElementsByClassName('content_modal_delete');
        const confirmBtn = document.getElementById('button_oui');
        const cancelBtn = document.getElementById('button_non');
        let deleteUrl;

        deleteBtns.forEach((btn) => {
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                deleteUrl = btn.getAttribute('href');
                modalDelete.style.display = 'flex';
            });
        });

        cancelBtn.addEventListener('click', () => {
            modalDelete.style.display = 'none';
        });

        confirmBtn.addEventListener('click', () => {
            window.location.href = deleteUrl;
        });
    </script>
    <?php
    var_dump($_SESSION)
    ?>
</body>
</html>
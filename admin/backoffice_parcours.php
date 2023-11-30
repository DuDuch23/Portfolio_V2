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

// $query = $con->prepare("SELECT * FROM parcours");
// $query->execute();
// $elements = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice Parcours</title>
    <link rel="stylesheet" href="backoffice_parcours.css">
</head>
<body>
    <?php
    require('../require/navbar_admin.php');
    ?>
</body>
</html>
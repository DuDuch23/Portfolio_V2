<!-- bdd saint vincent en ligne -->
<?php

$user = "116313_aduchemin";
$pass = "Mushu4monchat?";
$dbName = "lyceestvincent_aduchemin";

try{
    $con = new \PDO("mysql:host=mysql-lyceestvincent.alwaysdata.net;dbname=$dbName;charset=UTF8", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $exception)
{
    echo 'Erreur lors de la connexion à la base de données : ' . $exception->getMessage();
    exit;
}

?>
<!-- bdd root -->

<?php
/*
$user = "root";
$pass = "";
$dbName = "portfolio";

try{
    $con = new \PDO("mysql:host=127.0.0.1;dbname=$dbName;charset=UTF8", $user, $pass);
    $con->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
}
catch (PDOException $exception)
{
    echo 'Erreur lors de la connexion à la base de données : ' . $exception->getMessage();
    exit;
}
*/
?>
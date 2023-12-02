<?php
require('../require/connexion_bdd.php');
session_start();
$erreurs = [];

if(isset($_POST['nom']) && isset($_POST['mdp']))
{
    $requete = $con->prepare('
    SELECT id_admin, nom_admin, mot_de_passe
    FROM admin
    WHERE nom_admin = :nom');

    $requete->bindParam(':nom', $_POST['nom']);
    $requete->execute();
    $utilisateurTrouve = $requete->fetch(PDO::FETCH_ASSOC);
    

    if($utilisateurTrouve === false)
    {
        $erreurs['nom'] = "Le nom n'existe pas";
    }
    else
    {
        $mdpValide = password_verify($_POST['mdp'], $utilisateurTrouve['mot_de_passe']);
        if($mdpValide)
        {
            $_SESSION['id_admin'] = $utilisateurTrouve['id_admin'];
            $donnees = [
                'nom' => $_POST['nom']
            ];

            $_SESSION['utilisateur'] = $donnees;
            $connecter = "Vous êtes connecté en tant que " . $_POST['nom'];
            var_dump($_SESSION);
            header("Location: backoffice_contact.php");
        }
        else
        {
            $erreurs['mdp'] = "Le nom ou le mot de passe est incorrect";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <li class="return_portfolio">
        <a href="../index.php">Portfolio</a>
    </li>
    <div class="content_body">
        <div class="content_form">
            <div class="form">
                <h1>Connexion BackOffice</h1>
                <form action="" class="connexion" method="POST">
                    <div class="content_input">
                        <div class="input">
                            <input type="text" for="nom" name="nom" placeholder="Nom">
                        </div>
                    
                        <?php
                        if(isset($erreurs['nom']))
                        {
                            ?>
                            <div class="erreur">
                                <p class="message_erreur"><?php echo $erreurs['nom'] ?></p>
                            </div>
                            <?php
                        }
                        else
                        {
                            echo "";
                        }

                        ?>

                        <div class="input">
                            <input type="password" for="mdp" name="mdp" placeholder="Mot De Passe" required>
                        </div>
                                        
                        <?php
                        if(isset($erreurs['mdp']))
                        {
                            ?>
                            <div class="erreur">
                                <p class="message_erreur"><?php echo $erreurs['mdp'] ?></p>
                            </div>
                            <?php
                        }
                        else
                        {
                            echo "";
                        }

                        ?>
                    </div>
                    <div class="content_submit">
                        <div class="submit">
                            <input id="button_submit" type="submit">
                        </div>
                    </div>
                    <?php
                    //var_dump($_SESSION);
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div id="gr"></div>
</body>
</html>
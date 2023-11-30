<?php
require('../require/connexion_bdd.php');
session_start();

$erreurs = [];
if(empty($_POST) === false)
{
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    $hash = password_hash($mdp, PASSWORD_ARGON2I);
    $nomDejaPris = $con->prepare("SELECT id_admin FROM admin WHERE nom_admin = ?");
    $nomDejaPris->execute(array($nom));
    $nomDejaPris = $nomDejaPris->fetchColumn();

    if(empty($_POST['nom']))
    {
        $erreurs['nom'] = "Veuillez saisir un nom";
    }
    if($nomDejaPris)
    {
        $erreurs['nom'] = "Le nom " . $nom . " est déjà présent dans la base de données";
    }
    if(empty($_POST['mdp']))
    {
        $erreurs['mdp'] = "Veuillez saisir un mot de passe";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <nav>
            <li><a href="../index.php">Portfolio</a></li>
            <li><a href="../admin/admin.php">Connexion Admin</a></li>
        </nav>
    </header>
    <div class="content_body">
        <div class="content_form">
        <h1>Ajouter un compte Admin</h1>
            <form action="#" class="inscription" method="POST">
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
                    <input type="password" for="mdp" name="mdp" placeholder="Mot De Passe" minlength="10" required>
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

                <div class="submit">
                    <input id="button_submit" type="submit">
                    <?php
                    if(empty($_POST) === false)
                    {
                        if(empty($erreurs))
                        {
                            try
                            {
                                $insert = $con -> prepare("INSERT INTO admin(nom_admin, mot_de_passe)
                                    VALUES (:nom_admin, :mot_de_passe)");
                                $insert->bindParam(':nom_admin', $_POST['nom']);
                                $insert->bindParam(':mot_de_passe', $hash);
                                $insert->execute();
                            }
                            catch (PDOException $exception)
                            {
                                echo 'erreur';
                            }
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <div id="gr"></div>
</body>
</html>
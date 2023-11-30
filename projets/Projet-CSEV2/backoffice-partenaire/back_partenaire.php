<?
include "../include/connexion_bdd.php"; ?>

<head>
    <link rel="stylesheet" type="text/css" href="stylez.css">
</head>

<header>
    <div id="font-bleu">
        <div id="menu-hamburger">
            <span class="trait"></span>
            <span class="trait"></span>
            <span class="trait"></span>
        </div>
        <nav>
            <li id="accueil"><a href="../backoffice-accueil/backoffice.php">Accueil</a></li>
            <li id="partenariats"><a href="back_partenaire.php">Partenariats</a></li>
            <li id="billeterie"><a href="../backoffice-offre/back-office.php">Billeterie</a></li>
            <li id="li-contact"><a href="../backoffice-contact/backoffice.php">Contact</a></li>
        </nav>
    </div>
</header>


<main>
    <div class="content">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Partenaire</th>
                    <th>Description du Partenaire</th>
                    <th>lien partenaire</th>
                    <th>action</th>
                    <th>
                        <button class="ajout"><a href="ajout_partenaire.php">Ajouter une Offre</a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "../include/connexion_bdd.php";
            $sql = "SELECT * FROM `partenariats`";
            $requete = $con->prepare($sql);
            $requete->execute();
            $billeteries = $requete->fetchAll();
            foreach ($billeteries as $partenaire) {

                ?>
                <tr>
                    <td class="nom"><b><?= $partenaire['partenaire_nom']; ?></b></td>
                    <td><?= $partenaire['texte_partenaire']; ?></td>
                    <td><?= $partenaire['lien_partenaire']; ?></td>
                    <td class="button">
                        <button class="modif"><a href="update_partenaire.php?id=<?= $partenaire['partenaire_id'] ?>">Modifier</a>
                        </button>
                        <button class="supp"><a
                                                href="delete_partenaire.php?id=<?php echo $partenaire['partenaire_id']; ?>">Supprimer</a></button>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>

    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <h2>Confirmer la suppression ?</h2>
            <p>Êtes-vous sûr de vouloir supprimer ce partenaire ?</p>
            <div class="modal-buttons">
                <button id="confirmBtn">Confirmer</button>
                <button id="cancelBtn">Annuler</button>
            </div>
        </div>
    </div>

    

    <script type="text/javascript">
        const deleteBtns = document.querySelectorAll('.supp a');
        const confirmModal = document.getElementById('confirmModal');
        const confirmBtn = document.getElementById('confirmBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        let deleteUrl;

        deleteBtns.forEach((btn) => {
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                deleteUrl = btn.getAttribute('href');
                confirmModal.style.display = 'block';
            });
        });

        cancelBtn.addEventListener('click', () => {
            confirmModal.style.display = 'none';
        });

        confirmBtn.addEventListener('click', () => {
            window.location.href = deleteUrl;
        });

        
    </script>
</main>

</body>
</html>
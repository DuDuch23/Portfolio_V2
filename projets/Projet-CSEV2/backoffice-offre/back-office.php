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
            <li id="partenariats"><a href="../backoffice-partenaire/back_partenaire.php">Partenariats</a></li>
            <li id="billeterie"><a href="back-office.php">Billeterie</a></li>
            <li id="li-contact"><a href="../backoffice-contact/backoffice.php">Contact</a></li>
        </nav>
    </div>
</header>


<main>
    <div class="content">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Offre</th>
                    <th>Description de l'offre</th>
                    <th>Date Début Offre</th>
                    <th>Date Fin Offre</th>
                    <th>Nb Places Min. Offre</th>
                    <th>Action</th>
                    <th>Image</th>
                    <th>
                        <button class="ajout"><a href="ajoutOffre.php">Ajouter une Offre</a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once "../include/connexion_bdd.php";
            $sql = "SELECT * FROM `billeterie`";
            $requete = $con->prepare($sql);
            $requete->execute();
            $billeteries = $requete->fetchAll();
            foreach ($billeteries as $billeterie) {
                // $query = "SELECT * FROM `image` WHERE `offre_image`.billet_id = ?";
                // $get_all_image = $con->prepare($query);
                // $get_all_image->execute([$billeterie['billet_id']]);
                // $images = $get_all_image->fetchAll();

                ?>
                <tr>
                    <td class="nom"><b><?= $billeterie['nom_billet']; ?></b></td>
                    <td><?= $billeterie['texte_billet']; ?></td>
                    <td><?= $billeterie['date_debut_validite_billet']; ?></td>
                    <td><?= $billeterie['date_fin_validite_billet']; ?></td>
                    <td><?= $billeterie['nombre_place_min_billet']; ?></td>
                    <td class="button">
                        <button class="modif"><a href="updateOffre.php?id=<?= $billeterie['billet_id'] ?>">Modifier</a>
                        </button>
                        <button class="supp"><a href="delete_offre.php?id=<?php echo $billeterie['billet_id']; ?>">Supprimer</a></button>
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
            <p>Êtes-vous sûr de vouloir supprimer cette billeterie ?</p>
            <div class="modal-buttons">
                <button id="confirmBtn">Confirmer</button>
                <button id="cancelBtn">Annuler</button>
            </div>
        </div>
    </div>

    

    <script>
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
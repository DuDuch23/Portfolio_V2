<div id="container-menu-hamburger">
    <div id="menu-hamburger">
        <div class="container-button-menu-hamburger">
            <div class="button-hamburger" onclick="hideHamburger()">
                <span class="trait-menu-hamburger"></span>
                <span class="trait-menu-hamburger"></span>
                <span class="trait-menu-hamburger"></span>
            </div>
        </div>
        <nav id="nav-hamburger">
            <li id="Accueil-hamburger"><a href="#bloc-accueil" onclick="hideHamburger()">Accueil</a></li>
            <li id="Projets-hamburger"><a href="../backoffice/backoffice_projet.php" onclick="hideHamburger()">Projets</a></li>
            <li id="Timeline-hamburger"><a href="#bloc-timeline" onclick="hideHamburger()">Timeline</a></li>
            <li id="Parcours-hamburger"><a href="#bloc-parcours" onclick="hideHamburger()">Mon Parcours</a></li>
            <li id="Contact-hamburger"><a href="#bloc-contact" onclick="hideHamburger()">Me Contacter</a></li>
        </nav>
    </div>
</div>
<header>
    <nav id="container-nav-bar">
        <div class="container-button-hamburger">
            <div class="button-hamburger" onclick="modal()">
                <span class="trait-menu-hamburger"></span>
                <span class="trait-menu-hamburger"></span>
                <span class="trait-menu-hamburger"></span>
            </div>
        </div>
        <ul id="nav-bar">
            <li id="Accueil-nav-bar"><a href="../admin/backoffice_accueil.php">Accueil</a></li>
            <li id="Projets-nav-bar"><a href="../admin/backoffice_projet.php">Projets</a></li>
            <li id="Timeline-nav-bar"><a href="../admin/backoffice_timeline.php">Timeline</a></li>
            <li id="Parcours-nav-bar"><a href="../admin/backoffice_parcours.php">Mon Parcours</a></li>
            <li id="Contact-nav-bar"><a href="../admin/backoffice_contact.php">Me Contacter</a></li>
        </ul>
    </nav>
    <div class="content_ajout_admin_deconnexion">
        <div class="ajout_admin">
            <form action="ajoutAdmin.php">
                <input type="submit" value="Ajouter un compte Admin">
            </form>
        </div>
        <div class="deconnexion">
            <form action="deconnexion.php">
                <input type="submit" value="Déconnexion">
            </form>
        </div>
    </div>
</header>
<div id="gr"></div>
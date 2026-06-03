<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router2.php?action=covoitAccueil">BERNET Lilian et WITTLING Louis
            <?php
            if (!isset($_SESSION['login_id']) || $_SESSION['login_id'] === -1):
                echo "";
            else :
                echo " | " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . " - " . $_SESSION['solde'] . "€";
            endif;
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=innovData">Innovation Data</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=innovMVC">Innovation MVC</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examinateur</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=superGlobales">Afficher Superglobales</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=tenReservCreate">Insérer 10 réservation aléatoires</a></li>
                    </ul>
                </li>

                <?php
                if (!isset($_SESSION['login_id']) || $_SESSION['login_id'] === -1):
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router2.php?action=login">Connexion</a></li>
                            <li><a class="dropdown-item" href="router2.php?action=userCreate">S'inscrire</a></li>
                        </ul>
                    </li>

                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['role']; ?>
                        </a>
                        <ul class="dropdown-menu">

                            <?php if ($_SESSION['role'] == 'administrateur'): ?>
                                <li><a class="dropdown-item" href="router2.php?action=userReadAll">Liste des utilisateurs</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=conducteurCreate">Ajout d'un conducteur</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=passagerCreate">Ajout d'un passager</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="router2.php?action=vehiculeReadAll">Liste des véhicules</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=vehiculeCreate">Ajout d'un véhicule</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="router2.php?action=villeReadAll">Liste des villes</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=villeCreate">Ajout d'une ville</a></li>
                            <?php elseif ($_SESSION['role'] == 'conducteur'): ?>
                                <li><a class="dropdown-item" href="router2.php?action=vehiculeReadAllFromOneDriver">Liste de mes véhicules</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="router2.php?action=trajetReadAllFromOneDriver">Liste de tous mes trajets (actifs et passifs</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=trajetCreate">Ajout d'un trajet</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="router2.php?action=trajetReadAllFromOneDriverActif">Liste des passagers de l'un de mes trajets actifs</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=selectTrajetToCloture">Cloturer l'un de mes trajets actifs</a></li>
                            <?php elseif ($_SESSION['role'] == 'passager'): ?>
                                <li><a class="dropdown-item" href="router2.php?action=reservReadAll">Liste des réservations</a></li>
                                <li><a class="dropdown-item" href="router2.php?action=reservCreate">Effectuer une réservation</a></li>
                            <?php endif; ?>

                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="router2.php?action=logout">Déconnexion</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
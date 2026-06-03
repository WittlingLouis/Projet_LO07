<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?>

        <?php
        if ($results) {
            echo ("<h3>Le nouveau trajet a été ajouté </h3>");
            echo("<ul>");
            echo ("<li>id = " . $results . "</li>");
            echo ("<li>vehicule = " . $_GET['vehicule'] . "</li>");
            echo ("<li>ville de départ = " . $_GET['ville_depart'] . "</li>");
            echo ("<li>ville d'arrivée = " . $_GET['ville_arrivee'] . "</li>");
            echo ("<li>date de départ = " . $_GET['date_trajet'] . "</li>");
            echo ("<li>heure de départ = " . $_GET['heure_trajet'] . "</li>");
            echo ("<li>prix du trajet = " . $_GET['prix_trajet'] . "</li>");
            echo("</ul>");
        } else {
            echo ("<h3>Problème d'insertion du trajet</h3>");
            echo ("Informations du trajet = " . $_GET['vehicule'] . $_GET['ville_depart'] . $_GET['ville_arrivee'] . $_GET['date_trajet'] . $_GET['heure_trajet'] . $_GET['prix_trajet']);
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentCovoitFooter.html';
        ?>   
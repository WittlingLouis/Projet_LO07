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
            echo ("<h3 class='text-success'>Le nouveau véhicule et son conducteur ont été ajoutés</h3>");
            echo("<ul>");
            echo ("<li>id = " . $results . "</li>");
            echo ("<li>nom = " . $_GET['marque'] . "</li>");
            echo ("<li>prenom = " . $_GET['modele'] . "</li>");
            echo ("<li>solde = " . $_GET['annee'] . "</li>");
            echo ("<li>solde = " . $_GET['immatriculation'] . "</li>");
            echo("</ul>");
        } else {
            echo ("<h3>Problème d'insertion du véhicule</h3>");
            echo ("Informations du véhicule = " . $_GET['marque'] . $_GET['modele'] . $_GET['annee'] . $_GET['immatriculation']);
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentCovoitFooter.html';
        ?>
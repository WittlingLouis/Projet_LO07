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
            echo ("<h3 class='text-success'>La nouvelle ville a été ajoutée </h3>");
            echo("<ul>");
            echo ("<li>id = " . $results . "</li>");
            echo ("<li>nom = " . $_GET['nom'] . "</li>");
            echo("</ul>");
        } else {
            echo ("<h3 class='text-success'>Problème d'insertion de la ville</h3>");
            echo ("Informations de la ville = " . $_GET['nom']);
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentCovoitFooter.html';
        ?>    
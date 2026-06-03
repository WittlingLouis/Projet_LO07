
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCovoitMenu.php';
    include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouveau conducteur a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>solde = " . $_GET['solde'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du conducteur</h3>");
     echo ("Informations du conducteur = " . $_GET['nom'] . $_GET['prenom'] . $_GET['solde']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovoitFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    

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
     echo ("<h3>Le nouveau véhicule a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['marque'] . "</li>");
     echo ("<li>nom = " . $_GET['modele'] . "</li>");
     echo ("<li>nom = " . $_GET['annee'] . "</li>");
     echo ("<li>nom = " . $_GET['immatriculation'] . "</li>");
     echo ("<li>nom = " . $_GET['proprietaire_id'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du véhicule</h3>");
     echo ("id = " . $_GET['marque'] . $_GET['modele'] . $_GET['immatriculation']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovoitFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
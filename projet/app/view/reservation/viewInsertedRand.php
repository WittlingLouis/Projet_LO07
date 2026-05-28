
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
     echo ("<h3>Les 10 réservation ont été effectuées </h3>");
     echo("<ul>");
     foreach($results as $res){
         printf("Nouvelle réservation pour le trajet %s --> %s par %s %s</br>",
         $res['depart'],
         $res['arrivee'],
         $res['prenom'],
         $res['nom'],
         );
     }
     echo("</ul>");
    } else {
     echo ("<h3>Problème de réservation</h3>");
     echo ("id = " . $results);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovoitFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
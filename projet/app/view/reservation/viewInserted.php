
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
     echo ("<h3 class='text-success'>La réservation a été effectuée </h3>");
     echo("<ul>");
     echo ("<li>id du trajet = " . $results . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3 class='text-success'>Problème de réservation</h3>");
     echo ("Informations de la réservation = " . $results);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovoitFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
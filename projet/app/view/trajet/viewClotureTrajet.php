
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
     echo ("<h3>Le trajet a été cloturé avec succès</h3><br>");
    } else {
     echo ("<h3>Problème de cloture du trajet</h3><br>");
    }
    
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovoitFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
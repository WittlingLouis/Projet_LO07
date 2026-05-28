<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovoitMenu.php';
      include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
      ?>
      <h3 class="text-success">Liste des réservations</h3>  

    <table class = "table table-striped table-bordered">
      <thead>
        <tr style="text-align: center;">
          <th scope = "col"><h5><b>ville_depart</b></h5></th>
          <th scope = "col"><h5><b>ville_arrivee</b></h5></th>
          <th scope = "col"><h5><b>date_depart</b></h5></th>
          <th scope = "col"><h5><b>heure_depart</b></h5></th>
          <th scope = "col"><h5><b>statut</b></h5></th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($results as $element) {
                printf(
                    "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
                    $element['ville_depart'], 
                    $element['ville_arrivee'], 
                    $element['date_depart'], 
                    $element['heure_depart'],
                    $element['statut']
                );
            }
            ?>
        </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

  <!-- ----- fin viewAll -->
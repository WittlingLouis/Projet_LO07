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
      
    <table class="table table-striped table-bordered">
      <thead>
        <tr style="text-align: center;">
          <th scope = "col"><h5><b>Nom</b></h5></th>
          <th scope = "col"><h5><b>Prenom</b></h5></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($passagers)) {
            foreach ($passagers as $p) {
                printf("<tr>");
                printf("<td>%s</td>", htmlspecialchars($p->nom));
                printf("<td>%s</td>", htmlspecialchars($p->prenom));
                printf("</tr>");
            }
        } else {
            echo "<tr><td colspan='3' class='text-center text-warning'><strong>Aucun passager n'a encore réservé pour ce trajet.</strong></td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

  <!-- ----- fin viewAll -->
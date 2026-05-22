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
      <h3 class="text-success">Liste des utilisateurs</h3>  

    <table class = "table table-striped table-bordered">
      <thead>
        <tr style="text-align: center;">
          <th scope = "col"><h5><b>id</b></h5></th>
          <th scope = "col"><h5><b>nom</b></h5></th>
          <th scope = "col"><h5><b>prenom</b></h5></th>
          <th scope = "col"><h5><b>role</b></h5></th>
          <th scope = "col"><h5><b>login</b></h5></th>
          <th scope = "col"><h5><b>password</b></h5></th>
          <th scope = "col"><h5><b>solde</b></h5></th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%.2f</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getRole(), $element->getLogin(), 
             $element->getPassword(), $element->getSolde());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

  <!-- ----- fin viewAll -->
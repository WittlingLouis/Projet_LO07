<?php include __DIR__ . '/fragment/fragmentCovoitHeader.html'; ?>


<body>
  <div class="container">
      <?php
        include __DIR__ . '/fragment/fragmentCovoitMenu.php';
        include __DIR__ . '/fragment/fragmentCovoitJumbotron.html';
      ?>
      <h3 class="text-success">Innovation Modèle-Vue-Controleur (MVC)</h3>  
      <p>
          L’objectif est de réduire la quantité de code dans les controllers et d’automatiser le rendu des vues. 
          <br>Chaque controller appellera au final une seule méthode sur une seule ligne afin de préciser la vue 
          sur laquelle il renvoie ainsi que les données envoyées sur cette vue. 
          <br>En cas de changement du dossier de vue, il n’y a qu’un seul code à modifier.
      </p>
  </div>
  <?php   
    include __DIR__ . '/fragment/fragmentCovoitFooter.html';
  ?>

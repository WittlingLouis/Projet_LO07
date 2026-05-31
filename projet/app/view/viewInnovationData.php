<?php include __DIR__ . '/fragment/fragmentCovoitHeader.html'; ?>


<body>
  <div class="container">
      <?php
        include __DIR__ . '/fragment/fragmentCovoitMenu.php';
        include __DIR__ . '/fragment/fragmentCovoitJumbotron.html';
      ?>
      <h3 class="text-success">Innovation Data</h3>  
      <p>
        Nous avons remarqué qu’il n’y avait pas de formulaire pour permettre à un utilisateur de s’inscrire, seulement un pour se connecter, obligeant l’administrateur a créer tous les comptes utilisateurs.
        Ce formulaire d’inscription permet à un nouvel utilisateur d’entrer ses informations (nom, prénom, rôle, solde), 
        le login est généré avec le nom et prénom qui sont passés en minuscule et regroupé en une variable unique, 
        le password quand à lui est comme tous les autres utilisateurs (secret)
        En fonction du rôle choisi, si l’utilisateur est un conducteur, il a la possibilité d’ajouter un véhicule, si c’est un passager, on ferme le formulaire.
      </p>

  </div>
  <?php   
    include __DIR__ . '/fragment/fragmentCovoitFooter.html';
  ?>

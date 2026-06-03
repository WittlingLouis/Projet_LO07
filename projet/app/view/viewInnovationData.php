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
            <br>Ce formulaire d’inscription permet à un nouvel utilisateur d’entrer ses informations (nom, prénom, rôle, solde), 
            <br>Le login est généré avec le nom et prénom qui sont passés en minuscule et regroupé en une variable unique, 
            <br>Le password quand à lui est comme tous les autres utilisateurs (secret)
        </p>

    </div>
    <?php
    include __DIR__ . '/fragment/fragmentCovoitFooter.html';
    ?>
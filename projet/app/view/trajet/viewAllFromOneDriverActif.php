<?php require ($root . '/app/view/fragment/fragmentCaveHeader.html'); ?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <h3>Sélectionner l'un de mes trajet actif</h3>
    <form role="form" method='get' action='router2.php'>
        <input type="hidden" name='action' value='trajetListPassagers'>
        
        <div class="form-group">
            <label for="trajet_id">Choisissez un trajet ouvert aux réservations :</label>
            <select class="form-control" id='trajet_id' name='trajet_id' style="width: 500px">
                <?php
                if (!empty($trajets)) {
                    foreach ($trajets as $t) {
                        printf("<option value='%d'>%s vers %s le %s à </option>", 
                            $t->id, 
                            htmlspecialchars($t->ville_depart), 
                            htmlspecialchars($t->ville_arrivee), 
                            htmlspecialchars($t->date_depart), 
                            htmlspecialchars($t->heure_depart));
                    }
                }
                ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
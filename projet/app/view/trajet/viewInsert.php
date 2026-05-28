
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovoitMenu.php';
      include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">  
        <label class="w-25" for="ville_depart">Ville de départ</label>
        <input type="text" class="form-control" id="ville_depart" name="ville_depart" placeholder="Ex: Troyes">
        <br/>
        
        <label class="w-25" for="ville_arrivee">Ville d'arrivée</label>
        <input type="text" class="form-control" id="ville_arrivee" name="ville_arrivee" placeholder="Ex: La Rochelle">
        <br/>
        
        <input type="hidden" name='action' value='trajetCreated'>        
        <label class='w-25' for="id">Sélectionnez un véhicule : </label><select class="form-control" id='trajet_id' name='trajet_id' style="width: 500px">
            <?php
            foreach ($trajet as $t) {
             printf("<option value='%d'>%s %s (%s)</option>", $t['id'], $t['marque'], $t['modele'], $t['immatriculation']);
            }
            ?>
        </select>
        <br>
        
        <label class="w-25" for="prix_trajet">Prix du trajet</label>
        <input type="number" class="form-control" id="prix_trajet" name="prix_trajet" placeholder="Ex: 10">
        <br/>
        
        <label class="w-25" for="date_trajet">Date du trajet</label>
        <input type="number" class="form-control" id="date_trajet" name="date_trajet">
        <br/>
        
        <label class="w-25" for="heure_trajet">Heure du trajet</label>
        <input type="number" class="form-control" id="heure_trajet" name="heure_trajet">
        <br/>
        
      </div>
      <p/>
       <br/> 
      <button class="btn btn-success" type="submit">Submit</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

<!-- ----- fin viewInsert -->




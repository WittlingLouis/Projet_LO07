
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
    <h3 class="text-success">Réservation d'un trajet</h3>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='reservCreated'>        
        <label class='w-25' for="id">Sélectionnez un trajet : </label><select class="form-control" id='trajet_id' name='trajet_id' style="width: 500px">
            <?php
            foreach ($trajet as $t) {
             printf("<option value='%d'>%s --> %s le %s à %s</option>", $t['id'], $t['depart'], $t['destination'], $t['date_depart'], $t['heure_depart']);
            }
            ?>
        </select>
        <br/>              
      </div>
      <p/>
       <br/> 
      <button class="btn btn-success" type="submit">Réserver</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

<!-- ----- fin viewInsert -->




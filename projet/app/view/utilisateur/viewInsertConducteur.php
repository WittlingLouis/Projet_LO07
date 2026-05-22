
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
    <h3 class="text-success">Ajouter un conducteur</h3>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='conducteurCreated'>        
        <label class='w-25' for="id">Nom : </label><br><input class="form-control" type="text" name='nom' size='75' value='Wittling'> <br/> 
        <label class='w-25' for="id">Prenom : </label><br><input class="form-control" type="text" name='prenom' size='75' value='Louis'> <br/> 
        <label class='w-25' for="id">Solde : </label><br><input class="form-control" type="text" name='solde' size='75' value='100.0'> <br/> 
      </div>
      <p/>
      <button class="btn btn-success" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

<!-- ----- fin viewInsert -->




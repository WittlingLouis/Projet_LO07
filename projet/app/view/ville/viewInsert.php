
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
    <h3 class="text-success">Ajouter une ville</h3>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='villeCreated'>        
        <label class='w-25' for="id">Nom de la ville : </label><br><input class="form-control" type="text" name='nom' size='75' value='Troyes'> <br/>                                  
      </div>
      <p/>
      <button class="btn btn-success" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

<!-- ----- fin viewInsert -->




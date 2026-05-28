
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
          <input type="hidden" name='action' value='tenReservCreated'>
        <br/>
        <h3 class="text-success">Faire 10 réservations aléatoires</h3>  
      </div>
      <p/>
       <br/> 
      <button class="btn btn-success" type="submit">Générer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>

<!-- ----- fin viewInsert -->




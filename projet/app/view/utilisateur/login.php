<?php 
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovoitMenu.php';
      include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
    ?> 

    <form role="form" method='post' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='login'>        
        <label class='w-25' for="id">Login : </label><br><input class="form-control" type="text" name='login' size='10' value=''> <br/><br>                          
        <label class='w-25' for="id">Password : </label><br><input class="form-control" type="password" name='password' size='10' value=''> <br/>        
        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-success" type="submit">Connexion</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>
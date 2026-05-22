
<!-- ----- debut ControllerProducteur -->
<?php

class ControllerCovoit {
 
 public static function covoitAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovoitAccueil.php';
  if (DEBUG)
   echo ("ControllerCovoit : covoitAccueil : vue = $vue");
  require ($vue);
 }

 
 
}
?>
<!-- ----- fin ControllerProducteur -->



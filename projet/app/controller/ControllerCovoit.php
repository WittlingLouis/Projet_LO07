
<!-- ----- debut ControllerProducteur -->
<?php

require_once 'BaseController.php';

class ControllerCovoit extends BaseController {
 
 public static function covoitAccueil() {
  self::render('viewCovoitAccueil');
 }

 public static function superGlobales() {
  self::render('viewSuperGlobales');
 }
 
}
?>
<!-- ----- fin ControllerProducteur -->



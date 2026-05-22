<?php

require_once '../model/ModelVille.php';

class ControllerVille {

 public static function villeReadAll() {
  $results = ModelVille::getAllVilles();
  include 'config.php';
  $vue = $root . '/app/view/ville/viewAll.php';
  if (DEBUG)
   echo ("ControllerVille : villeReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function villeCreate() {
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInsert.php';
  require ($vue);
 }

 public static function villeCreated() {
  $results = ModelVille::insert(
      htmlspecialchars($_GET['nom'])
  );
  include 'config.php';
  $vue = $root . '/app/view/ville/viewInserted.php';
  require ($vue);
 }
}
?>
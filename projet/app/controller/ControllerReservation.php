
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelTrajet.php';
require_once '../model/ModelReservation.php';


class ControllerReservation {

 public static function reservReadAll() {
  $passager_id = $_SESSION['login_id'];
  ModelTrajet::getAllTrajets();
  $results = ModelReservation::getAllReservFromOnePassager($passager_id);
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewAllReserv.php';
  if (DEBUG)
   echo ("ControllerReservation : reservReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function reservCreate() {
  $trajet = ModelTrajet::getAllTrajetsActif();
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewInsert.php';
  require ($vue);
 }

 public static function reservCreated() {
  $passager_id = $_SESSION['login_id'];
  $results = ModelReservation::insert(
      htmlspecialchars($_GET['trajet_id']), htmlspecialchars($passager_id)
  );
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewInserted.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerProducteur -->
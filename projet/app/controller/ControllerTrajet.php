
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelTrajet.php';
require_once '../model/ModelVehicule.php';

class ControllerTrajet {

 public static function trajetReadAllFromOneDriver() {
  $driver_id = $_SESSION['login_id'];
  $results = ModelTrajet::getAllTrajetsFromOneDriver($driver_id);
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewAllFromOneDriver.php';
  if (DEBUG)
   echo ("ControllerTrajet : trajetReadAllFromOneDriver : vue = $vue");
  require ($vue);
 }
 
 public static function trajetCreate() {
  $driver_id = $_SESSION['login_id'];
  $trajet = ModelVehicule::getAllVehiculesFromOneDriver($driver_id);
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewInsert.php';
  require ($vue);
 }

 public static function trajetCreated() {
  $passager_id = $_SESSION['login_id'];
  $results = ModelReservation::insert(
      htmlspecialchars($_GET['trajet_id']), htmlspecialchars($passager_id)
  );
  include 'config.php';
  $vue = $root . '/app/view/reservation/viewInserted.php';
  require ($vue);
 }
}

<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelVehicule.php';
require_once '../model/ModelUtilisateur.php';
require_once 'BaseController.php';


class ControllerVehicule extends BaseController {
 
 public static function vehiculeReadAll() {
  $results = ModelVehicule::getAllVehicules();
  self::render('vehicule/viewAll', ['results' => $results]);
 }
 
  public static function vehiculeReadAllFromOneDriver() {
  $driver_id = $_SESSION['login_id'];
  $results = ModelVehicule::getAllVehiculesFromOneDriver($driver_id);
  self::render('vehicule/viewAllFromOneDriver', ['driver_id' => $driver_id, 'results' => $results]);
 }
 
 public static function vehiculeCreate() {
  $listeConducteurs = ModelUtilisateur::getAllConducteurs();
  self::render('vehicule/viewInsert', ['listeConducteurs' => $listeConducteurs]);
 }

 public static function vehiculeCreated() {
  $results = ModelVehicule::insert(
      htmlspecialchars($_GET['marque']),
      htmlspecialchars($_GET['modele']),
      htmlspecialchars($_GET['annee']),
      htmlspecialchars($_GET['immatriculation']),
      htmlspecialchars($_GET['proprietaire_id'])
  );
  self::render('vehicule/viewInserted', ['results' => $results]);
 }
}
?>
<!-- ----- fin ControllerProducteur -->
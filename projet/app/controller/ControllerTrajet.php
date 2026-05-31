
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelTrajet.php';
require_once '../model/ModelVehicule.php';
require_once '../model/ModelVille.php';
require_once 'BaseController.php';

class ControllerTrajet extends BaseController {

 public static function trajetReadAllFromOneDriver() {
  $driver_id = $_SESSION['login_id'];
  $results = ModelTrajet::getAllTrajetsFromOneDriver($driver_id);
  self::render('trajet/viewAllFromOneDriver', ['driver_id' => $driver_id, 'results' => $results]);
 }
 
  public static function trajetReadAllFromOneDriverActif() {
  $driver_id = $_SESSION['login_id'];
  $results = ModelTrajet::getAllTrajetsFromOneDriverActif($driver_id);
  self::render('trajet/viewAllFromOneDriverActif', ['driver_id' => $driver_id, 'results' => $results]);
 }
 
 public static function trajetReadListPassagers() {
    $trajet_id = htmlspecialchars($_GET['trajet_id']);
    $passagers = ModelTrajet::getTrajetsListPassagers($trajet_id);
    
    self::render('trajet/viewListPassagers', ['trajet_id' => $trajet_id, 'passagers' => $passagers]);
}
 
 public static function trajetCreate() {
  $driver_id = $_SESSION['login_id'];
  $vehicule = ModelVehicule::getAllVehiculesFromOneDriver($driver_id);
  $villes = ModelVille::getAllVilles();
  self::render('trajet/viewInsert', ['driver_id' => $driver_id, 'vehicule' => $vehicule, 'villes' => $villes]);
 }

 public static function trajetCreated() {
  $driver_id = $_SESSION['login_id'];
  
  $vehicule = htmlspecialchars($_GET['vehicule']); 
  $ville_depart = htmlspecialchars($_GET['ville_depart']);
  $ville_arrivee = htmlspecialchars($_GET['ville_arrivee']);
  $date_trajet = htmlspecialchars($_GET['date_trajet']);
  $heure_trajet = htmlspecialchars($_GET['heure_trajet']);
  $prix_trajet = htmlspecialchars($_GET['prix_trajet']);
 
  $results = ModelTrajet::insertTrajets($driver_id, $vehicule, $ville_depart, $ville_arrivee, $date_trajet, $heure_trajet, $prix_trajet);
  self::render('trajet/viewInserted', [
   'results' => $results, 
   'driver_id' => $driver_id, 
   'vehicule' => $vehicule, 
   'ville_depart' => $ville_depart, 
   'ville_arrivee' => $ville_arrivee, 
   'date_trajet' => $date_trajet, 
   'heure_trajet' => $heure_trajet, 
   'prix_trajet' => $prix_trajet
   ]);
 } 
 
 public static function selectTrajetToCloture() {
    $driver_id = $_SESSION['login_id'];
    $results = ModelTrajet::getAllTrajetsFromOneDriverActif($driver_id);

    self::render('trajet/viewAllTrajetToCloture', ['driver_id' => $driver_id, 'results' => $results]);
 }
 
 public static function trajetToCloture() {
    $trajet_id = htmlspecialchars($_GET['trajet_id']);
    $results = ModelTrajet::setTrajetPassif($trajet_id);
    
    self::render('trajet/viewClotureTrajet', ['trajet_id' => $trajet_id, 'results' => $results]);
 }
}
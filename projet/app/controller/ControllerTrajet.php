
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelTrajet.php';
require_once '../model/ModelVehicule.php';
require_once '../model/ModelVille.php';

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
 
  public static function trajetReadAllFromOneDriverActif() {
  $driver_id = $_SESSION['login_id'];
  $results = ModelTrajet::getAllTrajetsFromOneDriverActif($driver_id);
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewAllFromOneDriverActif.php';
  if (DEBUG)
   echo ("ControllerTrajet : trajetReadAllFromOneDriverActif : vue = $vue");
  require ($vue);
 }
 
 public static function trajetCreate() {
  $driver_id = $_SESSION['login_id'];
  $vehicule = ModelVehicule::getAllVehiculesFromOneDriver($driver_id);
  $villes = ModelVille::getAllVilles();
  include 'config.php';
  $vue = $root . '/app/view/trajet/viewInsert.php';
  require ($vue);
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

  include 'config.php';
  $vue = $root . '/app/view/trajet/viewInserted.php';
  require ($vue);
 } 
}
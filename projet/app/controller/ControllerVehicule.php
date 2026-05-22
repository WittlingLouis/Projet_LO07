
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelVehicule.php';
require_once '../model/ModelUtilisateur.php';


class ControllerVehicule {
 
 public static function vehiculeReadAll() {
  $results = ModelVehicule::getAllVehicules();
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewAll.php';
  if (DEBUG)
   echo ("ControllerVehicule : vehiculeReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function vehiculeCreate() {
  $listeConducteurs = ModelUtilisateur::getAllConducteurs();
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewInsert.php';
  require ($vue);
 }

 public static function vehiculeCreated() {
  $results = ModelVehicule::insert(
      htmlspecialchars($_GET['marque']),
      htmlspecialchars($_GET['modele']),
      htmlspecialchars($_GET['annee']),
      htmlspecialchars($_GET['immatriculation']),
      htmlspecialchars($_GET['proprietaire_id'])
  );
  include 'config.php';
  $vue = $root . '/app/view/vehicule/viewInserted.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerProducteur -->

<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelTrajet {
 private $id, $ville_depart, $ville_arrivee, $conducteur_id, $vehicule_id, $prix, $date_depart, $heure_depart, $statut;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $ville_depart = NULL, $ville_arrivee = NULL, $conducteur_id = NULL, $vehicule_id = NULL, $prix = NULL, $date_depart = NULL, $heure_depart = NULL, $statut = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->ville_depart = $ville_depart;
   $this->ville_arrivee = $ville_arrivee;
   $this->conducteur_id = $conducteur_id;
   $this->vehicule_id = $vehicule_id;
   $this->prix = $prix;
   $this->date_depart = $date_depart;
   $this->heure_depart = $heure_depart;
   $this->statut = $statut;
  }
 }
 
 public function getId() {
     return $this->id;
 }

 public function getVille_depart() {
     return $this->ville_depart;
 }

 public function getVille_arrivee() {
     return $this->ville_arrivee;
 }

 public function getConducteur_id() {
     return $this->conducteur_id;
 }

 public function getVehicule_id() {
     return $this->vehicule_id;
 }

 public function getPrix() {
     return $this->prix;
 }

 public function getDate_depart() {
     return $this->date_depart;
 }

 public function getHeure_depart() {
     return $this->heure_depart;
 }

 public function getStatut() {
     return $this->statut;
 }

 public function setId($id): void {
     $this->id = $id;
 }

 public function setVille_depart($ville_depart): void {
     $this->ville_depart = $ville_depart;
 }

 public function setVille_arrivee($ville_arrivee): void {
     $this->ville_arrivee = $ville_arrivee;
 }

 public function setConducteur_id($conducteur_id): void {
     $this->conducteur_id = $conducteur_id;
 }

 public function setVehicule_id($vehicule_id): void {
     $this->vehicule_id = $vehicule_id;
 }

 public function setPrix($prix): void {
     $this->prix = $prix;
 }

 public function setDate_depart($date_depart): void {
     $this->date_depart = $date_depart;
 }

 public function setHeure_depart($heure_depart): void {
     $this->heure_depart = $heure_depart;
 }

 public function setStatut($statut): void {
     $this->statut = $statut;
 }

  
 public static function getAllTrajets() {
  try {
   $database = Model::getInstance();
   $query = "select * from trajet";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
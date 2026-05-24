
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelReservation {
 private $id, $trajet_id, $passager_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $trajet_id = NULL, $passager_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->trajet_id = $trajet_id;
   $this->passager_id = $passager_id;
  }
 }
 
 public function getId() {
     return $this->id;
 }

 public function getTrajet_id() {
     return $this->trajet_id;
 }

 public function getPassager_id() {
     return $this->passager_id;
 }

 public function setId($id): void {
     $this->id = $id;
 }

 public function setTrajet_id($trajet_id): void {
     $this->trajet_id = $trajet_id;
 }

 public function setPassager_id($passager_id): void {
     $this->passager_id = $passager_id;
 }

  
 public static function getAllReservations() {
  try {
   $database = Model::getInstance();
   $query = "select * from reservation";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelReservation");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllReservFromOnePassager($passager_id) {
  try {
   $database = Model::getInstance();
   $query = "select t.date_depart, t.heure_depart, v1.nom as depart, v2.nom as destination, u.nom, u.prenom, ve.marque, ve.modele, ve.immatriculation"
           . " from reservation r, trajet t, ville v1, ville v2, utilisateur u, vehicule ve"
           . " where r.trajet_id = t.id and r.passager_id = :passager_id"
           . " and t.ville_depart = v1.id and t.ville_arrivee = v2.id"
           . " and t.conducteur_id = u.id and t.vehicule_id = ve.id";
   $statement = $database->prepare($query);
   $statement->execute([
     'passager_id' => $passager_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 


}
?>
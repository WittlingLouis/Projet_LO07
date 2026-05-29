
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
 
 public static function getAllTrajetsActif() {
  try {
   $database = Model::getInstance();
   $query = "select t.*, v1.nom as depart, v2.nom as destination from trajet t, ville v1, ville v2 where statut = 'actif' and t.ville_depart = v1.id and t.ville_arrivee = v2.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function getAllTrajetsFromOneDriver($driver_id) {
  try {
   $database = Model::getInstance();
   $query = "select t.id, v1.nom as ville_depart, v2.nom as ville_arrivee, t.date_depart, t.heure_depart, t.statut " 
           . "from trajet t, ville v1, ville v2 " 
           . "where t.ville_depart = v1.id and t.ville_arrivee = v2.id and conducteur_id = :driver_id " 
           . "order by t.date_depart desc, t.heure_depart desc";
   $statement = $database->prepare($query);
   $statement->execute([
       'driver_id' => $driver_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelTrajet");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function getAllTrajetsFromOneDriverActif($driver_id) {
  try {
   $database = Model::getInstance();
   $query = "select t.id, v1.nom as ville_depart, v2.nom as ville_arrivee, t.date_depart, t.heure_depart " 
           . "from trajet t, ville v1, ville v2 " 
           . "where t.ville_depart = v1.id and t.ville_arrivee = v2.id and t.conducteur_id = :driver_id and LOWER(t.statut) = 'actif'";
   $statement = $database->prepare($query);
   $statement->execute([
       'driver_id' => $driver_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_OBJ);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getTrajetsListPassagers($trajet_id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT u.nom, u.prenom "
               . "FROM reservation r, utilisateur u "
               . "WHERE r.trajet_id = :trajet_id and r.passager_id = u.id";
        $statement = $database->prepare($query);
        $statement->execute(['trajet_id' => $trajet_id]);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}
 
 public static function insertTrajets($driver_id, $vehicule, $ville_depart, $ville_arrivee, $date_trajet, $heure_trajet, $prix_trajet){
  try {
   $database = Model::getInstance();
   $queryCkeck = "select max(id) from trajet";
   $statementCheck = $database->query($queryCkeck);
   $tuple = $statementCheck->fetch();
   $id = $tuple['0'];
   $id++;
   
   $query = "insert into trajet (id ,ville_depart, ville_arrivee, conducteur_id, vehicule_id, prix, date_depart, heure_depart, statut) 
                  values (:id, :ville_depart, :ville_arrivee, :driver_id, :vehicule, :prix_trajet, :date_trajet, :heure_trajet, 'actif')";
                  
   $statement = $database->prepare($query);
   $statement->execute([
    'id' => $id,
    'ville_depart' => $ville_depart,
    'ville_arrivee' => $ville_arrivee,
    'driver_id' => $driver_id,
    'vehicule' => $vehicule,
    'prix_trajet' => $prix_trajet,
    'date_trajet' => $date_trajet,
    'heure_trajet' => $heure_trajet
   ]);
   
   return $id;
        
   } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
   }
 }
 
 public static function setTrajetPassif($trajet_id) {
  try {
   $database = Model::getInstance();
   
   $queryCheckStatut = "select statut from trajet where id = :trajet_id";
   $statementCheckStatut = $database->prepare($queryCheckStatut);
   $statementCheckStatut->execute(['trajet_id' => $trajet_id]);
   $trajetActuel = $statementCheckStatut->fetch(PDO::FETCH_ASSOC);
  
   if (!$trajetActuel || $trajetActuel['statut'] === 'passif') {
       return false; 
   }
  
   $queryTrajet = "update trajet set statut = 'passif' where id = :trajet_id";
   $statementTrajet = $database->prepare($queryTrajet);
   $statementTrajet->execute([
       'trajet_id' => $trajet_id
   ]);
   
   $queryPrix = "select conducteur_id, prix from trajet where id = :trajet_id";
   $statementPrix = $database->prepare($queryPrix);
   $statementPrix->execute([
       'trajet_id' => $trajet_id
   ]);
   $trajet = $statementPrix->fetch(PDO::FETCH_ASSOC);
   $conducteur_id = $trajet['conducteur_id'];
   $prix = $trajet['prix'];
   
   $queryPass = "select passager_id from reservation where trajet_id = :trajet_id";
   $statementPass = $database->prepare($queryPass);
   $statementPass->execute([
       'trajet_id' => $trajet_id
   ]);
   $reservations = $statementPass->fetchAll(PDO::FETCH_ASSOC);
   $nb_reservations = count($reservations);
   
   if($nb_reservations > 0){
       $somme_win = $prix * $nb_reservations;
       
       $querySolde = "update utilisateur set solde = solde + :somme_win where id = :conducteur_id";
       $statementSolde = $database->prepare($querySolde);
       $statementSolde->execute([
           'somme_win' => $somme_win,
           'conducteur_id' => $conducteur_id
       ]);
       
       $queryDebit = "update utilisateur set solde = solde - :prix where id = :passager_id";
       $statementDebit = $database->prepare($queryDebit);
       
       foreach ($reservations as $res){
        $statementDebit->execute([
            'prix' => $prix,
            'passager_id' => $res['passager_id']
        ]);
       }
   }
   
   if ($conducteur_id == $_SESSION['login_id']) {
      $querySession = "select solde from utilisateur where id = :id";
      $statementSession = $database->prepare($querySession);
      $statementSession->execute(['id' => $conducteur_id]);
      $user = $statementSession->fetch(PDO::FETCH_ASSOC);
      
      $_SESSION['solde'] = $user['solde'];
  }
   return true;
      
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
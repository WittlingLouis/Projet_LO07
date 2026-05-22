<?php
require_once 'Model.php';

class ModelVille {
 private $id, $nom;

 public function __construct($id = NULL, $nom = NULL) {
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
  }
 }
 
 public function getId() {
     return $this->id;
 }

 public function getNom() {
     return $this->nom;
 }

 public function setId($id): void {
     $this->id = $id;
 }

 public function setNom($nom): void {
     $this->nom = $nom;
 }

 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from ville";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVille");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllVilles() {
  try {
   $database = Model::getInstance();
   $query = "select * from ville";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVille");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function insert($nom) {
  try {
   $database = Model::getInstance();

   $query = "select max(id) from ville";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   $query = "insert into ville value (:id, :nom)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
}
?>
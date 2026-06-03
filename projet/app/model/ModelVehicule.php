<?php

require_once 'Model.php';

class ModelVehicule {

    private $id, $marque, $modele, $annee, $immatriculation, $proprietaire_id;
    private $nom;
    private $prenom;

    public function __construct($id = NULL, $marque = NULL, $modele = NULL, $annee = NULL, $immatriculation = NULL, $proprietaire_id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->marque = $marque;
            $this->modele = $modele;
            $this->annee = $annee;
            $this->immatriculation = $immatriculation;
            $this->proprietaire_id = $proprietaire_id;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function getProprietaire_id() {
        return $this->proprietaire_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setMarque($marque): void {
        $this->marque = $marque;
    }

    public function setModele($modele): void {
        $this->modele = $modele;
    }

    public function setAnnee($annee): void {
        $this->annee = $annee;
    }

    public function setImmatriculation($immatriculation): void {
        $this->immatriculation = $immatriculation;
    }

    public function setProprietaire_id($proprietaire_id): void {
        $this->proprietaire_id = $proprietaire_id;
    }

    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from vehicule";
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
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllVehicules() {
        try {
            $database = Model::getInstance();
            $query = "select v.marque, v.modele, v.annee, v.immatriculation, u.nom, u.prenom from vehicule v, utilisateur u where v.proprietaire_id = u.id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllVehiculesFromOneDriver($driver_id) {
        try {
            $database = Model::getInstance();
            $query = "select id, marque, modele, annee, immatriculation from vehicule where proprietaire_id = :driver_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'driver_id' => $driver_id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVehicule");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public function getProprietaireIdentite() {
        return $this->prenom . " " . $this->nom;
    }

    public static function insert($marque, $modele, $annee, $immatriculation, $proprietaire_id) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from vehicule";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into vehicule value (:id, :marque, :modele, :annee, :immatriculation, :proprietaire_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'marque' => $marque,
                'modele' => $modele,
                'annee' => $annee,
                'immatriculation' => $immatriculation,
                'proprietaire_id' => $proprietaire_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}

?>
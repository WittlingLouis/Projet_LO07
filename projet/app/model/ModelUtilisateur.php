<?php

require_once 'Model.php';

class ModelUtilisateur {

    private $id, $nom, $prenom, $role, $login, $password, $solde;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $role = NULL, $login = NULL, $password = NULL, $solde = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->role = $role;
            $this->login = $login;
            $this->password = $password;
            $this->solde = $solde;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getRole() {
        return $this->role;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNom($nom): void {
        $this->nom = $nom;
    }

    public function setPrenom($prenom): void {
        $this->prenom = $prenom;
    }

    public function setRole($role): void {
        $this->role = $role;
    }

    public function setLogin($login): void {
        $this->login = $login;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setSolde($solde): void {
        $this->solde = $solde;
    }

    public static function login($login, $password) {
        try {
            $database = Model::getInstance();
            $query = "select * from utilisateur where login = :login and password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from utilisateur";
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
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllUsers() {
        try {
            $database = Model::getInstance();
            $query = "select * from utilisateur";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllConducteurs() {
        try {
            $database = Model::getInstance();
            $query = "select id, nom, prenom from utilisateur where role = 'conducteur'";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insertConducteur($nom, $prenom, $solde) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into utilisateur values (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => "conducteur",
                'login' => str_replace(' ', '', strtolower($prenom . $nom)),
                'password' => "secret",
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function insertPassager($nom, $prenom, $solde) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into utilisateur values (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => "passager",
                'login' => str_replace(' ', '', strtolower($prenom . $nom)),
                'password' => "secret",
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function insertUser($nom, $prenom, $solde, $statut) {
        try {
            $database = Model::getInstance();

            $query = "select max(id) from utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into utilisateur values (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $login = str_replace(' ', '', strtolower($prenom . $nom));
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => $statut,
                'login' => $login,
                'password' => "secret",
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}

?>
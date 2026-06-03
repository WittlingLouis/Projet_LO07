<?php

require_once 'Model.php';

class ModelReservation {

    private $id, $trajet_id, $passager_id;

    public function __construct($id = NULL, $trajet_id = NULL, $passager_id = NULL) {
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

    public static function insert($trajet_id, $passager_id) {
        try {
            $database = Model::getInstance();
            $queryCkeck = "select max(id) from reservation";
            $statementCheck = $database->query($queryCkeck);
            $tuple = $statementCheck->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into reservation values (:id, :trajet_id, :passager_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'trajet_id' => $trajet_id,
                'passager_id' => $passager_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function insertTenRandomReserv() {
        try {
            $database = Model::getInstance();
            $queryTrajet = "select id from trajet where statut = 'actif' order by RAND() LIMIT 1";
            $queryPassager = "select id from utilisateur where role = 'passager' order by RAND() LIMIT 1";
            for ($i = 0; $i < 10; $i++) {
                $statement = $database->query($queryTrajet);
                $traj = $statement->fetch();
                $trajet_id = $traj[0];

                $statement = $database->query($queryPassager);
                $pass = $statement->fetch();
                $passager_id = $pass[0];

                $sqlCheckDouble = "select count(*) from reservation where trajet_id = :t_id and passager_id = :p_id";
                $statementCheck = $database->prepare($sqlCheckDouble);
                $statementCheck->execute(['t_id' => $trajet_id, 'p_id' => $passager_id]);
                $existe = $statementCheck->fetchColumn();

                if ($existe > 0) {
                    continue;
                }

                $queryCkeck = "select max(id) from reservation";
                $statementCheckId = $database->query($queryCkeck);
                $tuple = $statementCheckId->fetch();
                $id = $tuple['0'];
                $id++;

                $sqlInsert = "insert into reservation (id, trajet_id, passager_id) values (:id, :trajet_id, :passager_id)";
                $statement = $database->prepare($sqlInsert);
                $statement->execute([
                    'id' => $id,
                    'trajet_id' => $trajet_id,
                    'passager_id' => $passager_id
                ]);
            }

            $select = "select r.id, u.nom, u.prenom, v1.nom as depart, v2.nom as arrivee, t.date_depart, t.heure_depart"
                    . " from reservation r, utilisateur u, ville v1, ville v2, trajet t"
                    . " where r.passager_id = u.id and t.ville_depart = v1.id"
                    . " and t.ville_arrivee = v2.id and r.trajet_id = t.id"
                    . " order by r.id desc limit 10";
            $statement = $database->query($select);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}

?>
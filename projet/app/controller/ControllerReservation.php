<?php

require_once '../model/ModelTrajet.php';
require_once '../model/ModelReservation.php';
require_once 'BaseController.php';

class ControllerReservation extends BaseController {

    public static function reservReadAll() {
        $passager_id = $_SESSION['login_id'];
        $trajets = ModelTrajet::getAllTrajets();
        $results = ModelReservation::getAllReservFromOnePassager($passager_id);
        self::render('reservation/viewAllReserv', ['passager_id' => $passager_id, 'trajets' => $trajets, 'results' => $results]);
    }

    public static function reservCreate() {
        $trajet = ModelTrajet::getAllTrajetsActif();
        self::render('reservation/viewInsert', ['trajet' => $trajet]);
    }

    public static function reservCreated() {
        $passager_id = $_SESSION['login_id'];
        $results = ModelReservation::insert(
                htmlspecialchars($_GET['trajet_id']), htmlspecialchars($passager_id)
        );
        self::render('reservation/viewInserted', ['passager_id' => $passager_id, 'results' => $results]);
    }

    public static function tenReservCreate() {
        self::render('reservation/viewInsertRand');
    }

    public static function tenReservCreated() {
        $results = ModelReservation::insertTenRandomReserv();
        self::render('reservation/viewInsertedRand', ['results' => $results]);
    }
}

?>
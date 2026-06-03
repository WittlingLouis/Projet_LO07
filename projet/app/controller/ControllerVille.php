<?php

require_once '../model/ModelVille.php';
require_once 'BaseController.php';

class ControllerVille extends BaseController {

    public static function villeReadAll() {
        $results = ModelVille::getAllVilles();
        self::render('ville/viewAll', ['results' => $results]);
    }

    public static function villeCreate() {
        self::render('ville/viewInsert');
    }

    public static function villeCreated() {
        $results = ModelVille::insert(
                htmlspecialchars($_GET['nom'])
        );
        self::render('ville/viewInserted', ['results' => $results]);
    }
}

?>
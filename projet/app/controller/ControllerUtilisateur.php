<?php

require_once '../model/ModelUtilisateur.php';
require_once 'ControllerCovoit.php';
require_once 'BaseController.php';

class ControllerUtilisateur extends BaseController {

    public static function login() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $results = ModelUtilisateur::login($login, $password);

            if (count($results) > 0) {
                $user = $results[0];
                $_SESSION['login_id'] = $user->getId();
                $_SESSION['nom'] = $user->getNom();
                $_SESSION['prenom'] = $user->getPrenom();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['solde'] = $user->getSolde();

                ControllerCovoit::covoitAccueil();
            } else {
                include 'config.php';
                $vue = $root . '/app/view/utilisateur/login.php';
                require ($vue);
            }
        } else {
            include 'config.php';
            $vue = $root . '/app/view/utilisateur/login.php';
            require ($vue);
        }
    }

    public static function logout() {
        session_unset();
        $_SESSION['login_id'] = -1;
        ControllerCovoit::covoitAccueil();
    }

    public static function userReadAll() {
        $results = ModelUtilisateur::getAllUsers();
        self::render('utilisateur/viewAll', ['results' => $results]);
    }

    public static function conducteurCreate() {
        self::render('utilisateur/viewInsertConducteur');
    }

    public static function conducteurCreated() {
        $results = ModelUtilisateur::insertConducteur(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['solde'])
        );
        self::render('utilisateur/viewInsertedConducteur', ['results' => $results]);
    }

    public static function passagerCreate() {
        self::render('utilisateur/viewInsertPassager');
    }

    public static function passagerCreated() {
        $results = ModelUtilisateur::insertPassager(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['solde'])
        );
        self::render('utilisateur/viewInsertedPassager', ['results' => $results]);
    }

    public static function userCreate() {
        self::render('utilisateur/viewInsertUser');
    }

    public static function userCreated() {
        $statut = htmlspecialchars($_GET['statut']);
        $id_utilisateur = ModelUtilisateur::insertUser(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['solde']),
                $statut
        );
        
        if ($statut == 'conducteur'){
            self::render('utilisateur/viewInsertUserVehicule', ['proprietaire_id' => $id_utilisateur]);
        } else {
            self::render('utilisateur/viewInsertedUser', ['results' => $id_utilisateur, 'statut' => $statut]);
        }
    }

    public static function userVehiculeCreated() {
        $results = ModelVehicule::insert(
                htmlspecialchars($_GET['marque']),
                htmlspecialchars($_GET['modele']),
                htmlspecialchars($_GET['annee']),
                htmlspecialchars($_GET['immatriculation']),
                htmlspecialchars($_GET['proprietaire_id']) 
        );
        
        self::render('utilisateur/viewInsertedUserVehicule', [
            'results' => htmlspecialchars($_GET['proprietaire_id']), 
            'statut' => 'conducteur'
        ]);
    }
}

?>
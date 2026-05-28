<?php
require_once('../controller/ControllerCovoit.php');
require_once('../controller/ControllerUtilisateur.php');
require_once('../controller/ControllerVille.php');
require_once('../controller/ControllerVehicule.php');
require_once('../controller/ControllerReservation.php');
require_once('../controller/ControllerTrajet.php');

session_start();
if (isset($_REQUEST['action'])) {
    $action = htmlspecialchars($_REQUEST['action']);
} else {
    $action = "covoitAccueil";
}

$args = $_REQUEST;
unset($args['action']);

// 4. Routage
switch ($action) {
    case "login" :
    case "logout" :
    case "userReadAll" : 
    case "getAllConducteurs" :   
    case "conducteurCreate" :
    case "conducteurCreated" :
    case "passagerCreate" :
    case "passagerCreated" :    
        ControllerUtilisateur::$action();
        break;
    
    case "villeReadAll" :
    case "villeCreate" :
    case "villeCreated" :
        ControllerVille::$action();
        break;
    
    case "vehiculeReadAll" :
    case "vehiculeReadAllFromOneDriver" :
    case "vehiculeCreate" : 
    case "vehiculeCreated" :  
        ControllerVehicule::$action();
        break;
    
    case "superGlobales" :
        ControllerCovoit::$action();
        break;
    
    case "reservReadAll" :
    case "reservCreate" :
    case "reservCreated" :    
        ControllerReservation::$action();
        break;

    case "trajetReadAllFromOneDriver" :
    case "trajetCreate" :
    case "trajetCreated" :    
        ControllerTrajet::$action();
        break;
    
    default:
        $action = "covoitAccueil";
        ControllerCovoit::$action();
}
?>
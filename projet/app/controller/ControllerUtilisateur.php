
<!-- ----- debut ControllerProducteur -->
<?php

require_once '../model/ModelUtilisateur.php';
require_once 'ControllerCovoit.php';


class ControllerUtilisateur {
 
 public static function login() {
  if (isset($_POST['login']) && isset($_POST['password'])){
      $login = $_POST['login'];
      $password = $_POST['password'];
      
      $results = ModelUtilisateur::login($login, $password);
      
      if (count($results) > 0){
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
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewAll.php';
  if (DEBUG)
   echo ("ControllerUtilisateurr : userReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function conducteurCreate() {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertConducteur.php';
  require ($vue);
 }

 public static function conducteurCreated() {
  $results = ModelUtilisateur::insertConducteur(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      htmlspecialchars($_GET['solde'])
  );
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertedConducteur.php';
  require ($vue);
 }
 
 public static function passagerCreate() {
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertPassager.php';
  require ($vue);
 }

 public static function passagerCreated() {
  $results = ModelUtilisateur::insertPassager(
      htmlspecialchars($_GET['nom']),
      htmlspecialchars($_GET['prenom']),
      htmlspecialchars($_GET['solde'])
  );
  include 'config.php';
  $vue = $root . '/app/view/utilisateur/viewInsertedPassager.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerProducteur -->
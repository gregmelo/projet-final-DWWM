<?php

/*
 * AuthentificationCTRLPOST.php
 * http://localhost/PourFrontJS/controls/AuthentificationCTRLPOST.php?pseudo=p&mdp=bzzz
 */

/*
 * Pour autoriser les requêtes à partir d'un autre domaine
 */
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");

//echo "AuthentificationCTRL.php";

//$pseudo = filter_input(INPUT_POST, "pseudo");
//$mdp = filter_input(INPUT_POST, "mdp");
//echo "<br>$pseudo<br>";
//echo "<br>$mdp<br>";

$data = file_get_contents("php://input");

// TRUE = Tableau associatif
// FALSE = OBJET JSON
// MODE ASSOC
$data = json_decode($data, TRUE);
$pseudo = $data["pseudo"];
$mdp = $data["mdp"];
//$mdp = hash('sha512', $mdp, false); // true : binaire , false : hexa en minuscule

// MODE OBJET
//$data = json_decode($data);
//$pseudo = $data->pseudo;
//$mdp = $data->mdp;

require_once 'Connexion.php';
require_once 'UtilisateursDAO.php';
require_once 'Utilisateurs.php';

$cnx = new Connexion();
$pdo = $cnx->connect("cours.ini");

$dao = new UtilisateursDAO();

$ut = new Utilisateurs($pseudo, $mdp);
// Renvoie un objet
$ut = $dao->selectOne($pdo, $ut);

//echo "<pre>";
//var_dump($ut);
//echo "</pre><hr>";

if ($ut->getPseudo() == $pseudo) {
    $array = array("authentification" => 1);
} else {
    $array = array("authentification" => 0);
}

echo json_encode($array);
?>

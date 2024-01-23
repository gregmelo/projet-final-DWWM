<?php

/* 
 * VillesCTRLSelectAll.php
 */

/*
Access to XMLHttpRequest at 'http://127.0.0.1/PourFrontJS/controls/VillesCTRLSelectAll.php' from origin 'http://localhost' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource.
127.0.0.1/PourFrontJS/controls/VillesCTRLSelectAll.php:1 Failed to load resource: net::ERR_FAILED
 */
/*
 * Pour autoriser les requêtes à partir d'un autre domaine
 * http://m2icdi.alwaysdata.net/PourFrontJS/controls/VillesCTRLSelectAll.php
 */

header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");

$lesVilles = file_get_contents("php://input");

// TRUE = Tableau associatif
// FALSE = OBJET JSON
// MODE ASSOC
$lesVilles = json_decode($lesVilles, TRUE);
$cp = $lesVilles["cp"];



require_once './Connexion.php';
require_once './VillesDAO.php';

// --- Connexion ... dans tous les cas
$cnx = new Connexion();
//$pdo = $cnx->connect("../conf/bd.ini");
$pdo = $cnx->connect("./cours.ini");


$dao = new VillesDAO();

$villes = new Villes($cp);


$t = $dao->selectAll($pdo, $villes);

echo json_encode($t);

//include '../boundaries/VillesIHMTests.php';

?>

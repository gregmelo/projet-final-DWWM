<?php

// http://localhost/PourFrontJS/daos/UtilisateursDAOTests.php
require_once 'Connexion.php';
require_once 'Utilisateurs.php';
require_once 'UtilisateursDAO.php';

$cnx = new Connexion();
$pdo = $cnx->connect("cours.ini");

$dao = new UtilisateursDAO();

/*
 * CALL SELECT ALL
 */
//$t = $dao->selectAll($pdo);
//echo "<pre>";
//var_dump($t);
//echo "</pre><hr>";

/*
 * CALL SELECT ONE
 */
echo "<hr>SELECT ONE <hr>";
$ut = new Utilisateurs("p", "b");
$ut = $dao->selectOne($pdo, $ut);
echo "<pre>";
var_dump($ut);
echo "</pre><hr>";

/*
 * INSERT
 */
//echo "<hr>INSERT<hr>";
//$ut = new Utilisateurs("nouveau", "mdp", "nouveau@gmail.com", "BO");
////$pdo->beginTransaction();
//$affected = $dao->insert($pdo, $ut);
//if ($affected == 1) {
//    $pdo->commit();
//} else {
//    $pdo->rollBack();
//}
//echo "<pre>";
//var_dump($affected);
//echo "</pre><hr>";
//
//$t = array("affected" => $affected);
//echo json_encode($t);
?>

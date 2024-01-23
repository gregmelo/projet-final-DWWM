<?php
// CORS
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

try {
    // $cnx = new PDO("mysql:host=HOST_MYSQL;dbname=BD_NAME", "USER", "PWD");
    $cnx = new PDO("mysql:host=mysql-vericelgregory.alwaysdata.net;dbname=vericelgregory_cours", "286914", "Form2023");
    //$cnx = new PDO("mysql:host=127.0.0.1;dbname=cours", "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET NAMES 'UTF8'");

    // ORDRE SQL
    $sql = "SELECT * FROM utilisateurs";

    // COMPILATION
    $cursor = $cnx->prepare($sql);
    // EXECUTION DE LA REQUETE
    $cursor->execute();
    $cursor->setFetchMode(PDO::FETCH_ASSOC);
    $records = $cursor->fetchAll(PDO::FETCH_ASSOC);
    $cursor->closeCursor();
    $cnx = null;
} catch (PDOException $e) {
    $records = array();
    $records["error"] = "Erreur : " . $e->getMessage();
}

$json = json_encode($records);
echo $json;

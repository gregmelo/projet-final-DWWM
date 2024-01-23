<?php
/*
  GetClientsFromMySQL.php
  SELECT id_client,nom,prenom,cp FROM clients;
*/
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

try {
    // $cnx = new PDO("mysql:host=HOST_MYSQL;dbname=BD_NAME", "USER", "PWD");
    $cnx = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', "root", "");

    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->exec("SET NAMES 'UTF8'");
    // ORDRE SQL
    $sql = "SELECT id_client,nom,prenom,cp FROM clients";
    // COMPILATION
    $cursor = $cnx->prepare($sql);
    // EXECUTION DE LA REQUETE
    $cursor->execute();

    $records = $cursor->fetchAll(PDO::FETCH_ASSOC);
    $cnx = null;
} catch (PDOException $e) {
    $records = array();
    $records["nom"] = $e->getMessage();
    $records["prenom"] = "";
    $records["cp"] = "";
}
$JSONData = json_encode($records);
echo $JSONData;

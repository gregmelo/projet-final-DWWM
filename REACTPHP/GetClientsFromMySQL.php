<?php

/*
GetClientsFromMySQL.php
SELECT nom, prenom, cp FROM clients
Pour tester le code PHP
http://localhost/reactPHP/php/GetClientsFromMySQL.php
La méthode fetchAll() avec FETCH_ASSOC avant (donc juste après le query() ou l'execute()) ou comme paramètre de fetchAll() renvoie un tableau ordinal de tableaux associatifs.
Produit du JSON : un tableau d'objets JSON du type
[{"nom":"Buguet","prenom":"Pascal","cp":"75011"},{"nom":"Buguet","prenom":"MJ","cp":"75011"},
...
]
 */
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


try {
    // $pdo = new PDO("mysql:host=HOST_MYSQL;dbname=BD_NAME", "USER", "PWD");
    $pdo = new PDO('mysql:host=mysql-vericelgregory.alwaysdata.net;dbname=vericelgregory_cours;charset=utf8',"286914","Form2023");
    //$pdo = new PDO("mysql:host=127.0.0.1;dbname=cours", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'UTF8'");

    // ORDRE SQL
    $sql = "SELECT nom,prenom,cp FROM clients";
    // COMPILATION
    $cursor = $pdo->prepare($sql);
    // EXECUTION DE LA REQUETE
    $cursor->execute();

    $records = $cursor->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
} catch (PDOException $e) {
    $records = array();
    $records["nom"] = $e->getMessage();
    $records["prenom"] = "";
    $records["cp"] = "";
}

$JSONData = json_encode($records);
echo $JSONData;

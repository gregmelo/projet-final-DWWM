<?php
/*
  GetFewClientsFromMySQL.php
  SELECT * FROM clients WHERE cp = ?';
  Pour tester le code PHP
  http://localhost/reactPHP/php/GetFewClientsFromMySQL.php?cp=75011

  La méthode fetchAll() avec FETCH_ASSOC avant (donc juste après le query() ou l'execute()) ou comme paramètre de fetchAll() renvoie un tableau ordinal de tableaux associatifs.
  Produit du JSON : un tableau d'objets JSON du type
  [{"nom":"Buguet","prenom":"Pascal","cp":"75011"},{"nom":"Buguet","prenom":"MJ","cp":"75011"},
    ...
  ]
 */
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

$cp = filter_input(INPUT_GET, "cp");

if ($cp != null) {
    try {
        $lcn = new PDO('mysql:host=mysql-vericelgregory.alwaysdata.net;dbname=vericelgregory_cours;charset=utf8', "286914", "Form2023");
        $lcn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcn->exec("SET NAMES 'UTF8'");

        // ORDRE SQL
        $lsSQL = "SELECT nom,prenom,cp FROM clients WHERE cp = ?";
        // COMPILATION
        $curseur = $lcn->prepare($lsSQL);
        // VALORISATION DU PARAMETRE
        $curseur->bindParam(1, $cp);
        // EXECUTION DE LA REQUETE
        $curseur->execute();

        $tRecords = $curseur->fetchAll(PDO::FETCH_ASSOC);
        $lcn = null;
    } catch (PDOException $e) {
        $tRecords = array();
        $tRecords["nom"] = $e->getMessage();
        $tRecords["prenom"] = "";
        $tRecords["cp"] = "";
    }
} else {
    $tRecords = array();
    $tRecords["nom"] = "Paramètre inexistant";
    $tRecords["prenom"] = "";
    $tRecords["cp"] = "";
}

$JSONData = json_encode($tRecords);
echo $JSONData;

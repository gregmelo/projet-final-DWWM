<?php
/*
  GetProduitsFromMySQL.php
  SELECT id_produit, designation, prix, photo FROM produits
  Pour tester le code PHP
  http://localhost/PourFrontJS/control/GetProduitsFromMySQL.php
  http://pascalbuguet.alwaysdata.net/PourFront/php/GetProduitsFromMySQL.php
  La méthode fetchAll() avec FETCH_ASSOC avant (donc juste après le query() ou l'execute()) ou comme paramètre de fetchAll() renvoie un tableau ordinal de tableaux associatifs.
  Produit du JSON : un tableau d'objets JSON du type
  [{"id_produit":"1","designation":"Evian   ","prix":"2.00","photo":"pas_de_photo.png"},{"id_produit":"2","designation":"Badoit   ","prix":"1.10","photo":"pas_de_photo.png"},
  ...
  ]
 */
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
    $sql = "SELECT id_produit, designation, prix, photo FROM produits";
    // COMPILATION
    $cursor = $cnx->prepare($sql);
    // EXECUTION DE LA REQUETE
    $cursor->execute();
    $cursor->setFetchMode(PDO::FETCH_ASSOC);
    //$records = $cursor->fetchAll(PDO::FETCH_ASSOC);
    $records = array();
    while ($record = $cursor->fetch()) {
        if ($record["photo"] == NULL || $record["photo"] == "") {
            $record["photo"] = "photo_non_referencee.jpg";
        } else {
            if (!file_exists("../../images/" . $record["photo"])) {
                $record["photo"] = "pas_de_photo.png";
            }
        }
        $records[] = $record;
    }
    $cursor->closeCursor();
    $cnx = null;
} catch (PDOException $e) {
    $records = array();
    $records["id_produit"] = -1;
    $records["designation"] = $e->getMessage();
    $records["prix"] = 0;
    $records["photo"] = "";
}

echo json_encode($records);

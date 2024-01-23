<?php

/**
 * Connexion.php : une bibliothèque
 *
 * connect(path .ini) : PDO(à partir d'un fichier ini)
 * disconnect(pdo) : void
 */
class Connexion {

    /**
     *
     * @param type $psCheminParametresConnexion
     * @return null
     */
    public static function connect($psCheminParametresConnexion) {

        $tProprietes = parse_ini_file($psCheminParametresConnexion);

        $lsProtocole = $tProprietes["protocole"];
        $lsServeur = $tProprietes["serveur"];
        $lsPort = $tProprietes["port"];
        $lsUT = $tProprietes["ut"];
        $lsMDP = $tProprietes["mdp"];
        $lsBD = $tProprietes["bd"];

        /*
         * Connexion
         */
        $pdo = null;
        try {
            $lsDSN = "$lsProtocole:host=$lsServeur;port=$lsPort;dbname=$lsBD";
            //echo "<br>$lsDSN<br>";
            $pdo = new PDO("$lsProtocole:host=$lsServeur;port=$lsPort;dbname=$lsBD", $lsUT, $lsMDP);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $ex) {
            //$pdo = null;
            //echo "<br>" . $ex->getMessage();
        }
        return $pdo;
    }

    /**
     *
     * @param PDO $pcnx
     */
    public function disconnect(PDO &$pcnx) {
        $pcnx = null;
    }

}

?>
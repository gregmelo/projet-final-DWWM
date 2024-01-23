<?php

require_once 'Utilisateurs.php';

/**
 * 
 * @param PDO $pdo
 * @return array
 * 
 * La fonction selectOne possède un paramètre de type "Connection" BD, et retourne un tableau
 * Le tableau est type ordinal de tableaux associatifs
 * Le tableau est précisément un curseur ou un result set (jeu de résultats)
 */
class UtilisateursDAO {

    public function selectAll(PDO $pdo): array {
        try {
            $sql = "SELECT * FROM utilisateurs";
            $cursor = $pdo->query($sql);
            // Tableau ordinal de tableaux
//            $array = $cursor->fetchAll(PDO::FETCH_ASSOC);
            $t = array();
            $cursor->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $cursor->fetch()) {
                $ut = new Utilisateurs($record["pseudo"], $record["mdp"], $record["email"], $record["qualite"]);
                $t[] = $ut;
            }
            $cursor->closeCursor();
        } catch (PDOException $e) {
            $t = array();
            $ut = new Utilisateurs("-1", $e->getMessage(), "", "");
            $t[] = $ut;
        }
        return $t;
    }

    /**
     * 
     * @param PDO $pdo
     * @param string $pk
     * @return array
     * 
     * Le selectOne a comme paramètre la clé primaire et renvoie un tableau asociatif 
     */
    public function selectOneHashe(PDO $pdo, Utilisateurs $utilisateur): Utilisateurs {
        try {
            // Le selectOne()
            $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?";
            $mdp = $utilisateur->getMdp();
            $mdp = hash('sha512', $utilisateur->getMdp(), false); // true : binaire , false : hexa en minuscule
            $cursor = $pdo->prepare($sql);
            $cursor->bindValue(1, $utilisateur->getPseudo());
            $cursor->bindValue(2, $mdp);
            $cursor->execute();

            $record = $cursor->fetch(PDO::FETCH_ASSOC);

            if ($record == false) {
                $ut = new Utilisateurs("Introuvable", "", "", "");
            } else {
                $ut = new Utilisateurs($record["pseudo"], $record["mdp"], $record["email"], $record["qualite"]);
            }
        } catch (PDOException $e) {
            $ut = new Utilisateurs("-1", $e->getMessage(), "", "");
        }
        return $ut;
    }
    
    public function selectOne(PDO $pdo, Utilisateurs $utilisateur): Utilisateurs {
        try {
            // Le selectOne()
            $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?";
            $mdp = $utilisateur->getMdp();
            $cursor = $pdo->prepare($sql);
            $cursor->bindValue(1, $utilisateur->getPseudo());
            $cursor->bindValue(2, $mdp);
            $cursor->execute();

            $record = $cursor->fetch(PDO::FETCH_ASSOC);

            if ($record == false) {
                $ut = new Utilisateurs("Introuvable", "", "", "");
            } else {
                $ut = new Utilisateurs($record["pseudo"], $record["mdp"], $record["email"], $record["qualite"]);
            }
        } catch (PDOException $e) {
            $ut = new Utilisateurs("-1", $e->getMessage(), "", "");
        }
        return $ut;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $utilisateur
     * @return int
     */
    public function insert(PDO $pdo, Utilisateurs $utilisateur): int {

        try {
            $sql = "INSERT INTO utilisateurs(pseudo, mdp, email, qualite) VALUES(?,?,?,?)";

            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $utilisateur->getPseudo());
            $mdp = $utilisateur->getMdp();
            //$mdp = hash('sha512', $utilisateur->getMdp(), false); // true : binaire , false : hexa en minuscule
            $statement->bindValue(2, $mdp);
            $statement->bindValue(3, $utilisateur->getEmail());
            $statement->bindValue(4, $utilisateur->getQualite());

            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            //echo $e->getTraceAsString();
            $affected = -1;
        }
        return $affected;
    }

    /**
     * 
     * @param PDO $pdo
     * @param Utilisateurs $utilisateur
     * @return int
     */
    public static function updateMdpByEmail(PDO $pdo, Utilisateurs $utilisateur): int {
        try {
            $sql = "UPDATE utilisateurs SET mdp=? WHERE email=?";

            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $utilisateur->getMdp());
            $statement->bindValue(2, $utilisateur->getEmail());

            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }

//
//    /**
//     * 
//     * @param PDO $pdo
//     * @param string $pk
//     * @return int
//     */
//    function delete(PDO $pdo, string $pk): int {
//        try {
//            $sql = "DELETE FROM villes WHERE cp = ?";
//
//            $statement = $pdo->prepare($sql);
//
//            $statement->bindParam(1, $pk);
//
//            $statement->execute();
//
//            $affected = $statement->rowcount();
//        } catch (PDOException $e) {
//            //echo $e->getTraceAsString();
//            $affected = -1;
//        }
//        return $affected;
//    }
//
//    /**
//     * 
//     * @param PDO $pdo
//     * @param string $pk
//     * @param array $data
//     * @return int
//     */
//    function update(PDO $pdo, string $pk, array $data): int {
//        try {
//            $sql = "UPDATE villes SET nom_ville=?, site=?, photo=?, id_pays=? WHERE cp=?";
//
//            $statement = $pdo->prepare($sql);
//
//            $statement->bindParam(1, $data["nomVille"]); // BIND = RELIER
//            $statement->bindParam(2, $data["site"]);
//            $statement->bindParam(3, $data["photo"]);
//            $statement->bindParam(4, $data["idPays"]);
//            $statement->bindParam(5, $pk);
//
//            $statement->execute();
//
//            $affected = $statement->rowcount();
//        } catch (PDOException $e) {
//            //echo $e->getTraceAsString();
//            $affected = -1;
//        }
//        return $affected;
//    }
}

?>

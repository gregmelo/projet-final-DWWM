<?php


require_once 'Villes.php';
/**
 * 
 * @param PDO $pdo
 * @return array
 * 
 * La fonction selectOne possède un paramètre de type "Connection" BD, et retourne un tableau
 * Le tableau est type ordinal de tableaux associatifs
 * Le tableau est précisément un curseur ou un result set (jeu de résultats)
 */
class VillesDAO
{

    public function selectAll(PDO $pdo): array
    {
        try {
            $sql = "SELECT * FROM villes";
            $cursor = $pdo->query($sql);
            // Tableau ordinal de tableaux
            //            $array = $cursor->fetchAll(PDO::FETCH_ASSOC);
            $t = array();
            $cursor->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $cursor->fetch()) {
                $ut = new Utilisateurs($record["cp"], $record["nom_ville"], $record["site"], $record["photo"], $record["id_pays"]);
                $t[] = $ut;
            }
            $cursor->closeCursor();
        } catch (PDOException $e) {
            $t = array();
            $ut = new Villes("-1", $e->getMessage(), "", "","","");
            $t[] = $ut;
        }
        return $t;
    }

// class VillesDAO
// {
//     public function selectAll()
//     {
//         $query = Database::connect()->prepare('SELECT * FROM villes');
//         $query->execute();
//         $villess = $query->fetchAll(PDO::FETCH_ASSOC);
//         return $villess;
//     }

//     public function selectOne($id)
//     {
//         $query = Database::connect()->prepare('SELECT * FROM villes WHERE cp= ?');
//         $query->execute([$id]);
//         $villes = $query->fetch(PDO::FETCH_ASSOC);
//         return $villes;
//     }

//     public function delete($cp)
//     {
//         $query = Database::connect()->prepare('DELETE FROM villes WHERE cp= ?');
//         $query->execute([$cp]);
//     }

//     public function update(Villes $villes)
//     {
//         $query = Database::connect()->prepare('UPDATE villes SET nom_ville=?,site=?,photo=?,id_pays=? WHERE cp = ?');
//         $query->execute([$villes->getNom_ville(), $villes->getSite(), $villes->getPhoto(), $villes->getId_pays(), $villes->getCp()]);
//     }

//     public function insert(Villes $villes)
//     {
//         $query = Database::connect()->prepare('INSERT INTO villes (nom_ville,site,photo,id_pays) VALUES (?,?,?,?)');
//         $query->execute([$villes->getNom_ville(), $villes->getSite(), $villes->getPhoto(), $villes->getId_pays()]);
//     }
}

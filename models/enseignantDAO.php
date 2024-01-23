<?php

class EnseignantsDAO
{

    public function Enseignant($email)
    {
        $query = Database::connect()->prepare("SELECT * FROM `enseignants` where email=?");
        $query->execute([$email]);
        $Enseignant = $query->fetch();
        return $Enseignant;
	}
    public function EnseignantById($id)
    {
        $query = Database::connect()->prepare("SELECT email FROM enseignants WHERE id =?");
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['email'];
    }
    public function EnseignantListByClasse()
    {
        $query = Database::connect()->prepare("SELECT enseignants.id, enseignants.nom as nom_enseignant, enseignants.email, classe.nom as nom_classe, classe.niveau as niveau_classe FROM enseignants JOIN classe ON enseignants.id = classe.id_enseignant");
        $query->execute();
        $enseignant = $query->fetchAll();
        return $enseignant;
    }

    public function getNameTeacherByIdChild($child_id)
    {
        try {
            $query = Database::connect()->prepare("SELECT e.nom AS nom_enseignant
            FROM eleves AS eleve
            JOIN classe AS c ON eleve.id_classe = c.id
            JOIN enseignant AS e ON c.id_enseignant = e.id
            WHERE eleve.id = ?");
            $query->execute([$child_id]);
            $nameTeacher = $query->fetchColumn();
            return $nameTeacher;
        } catch (PDOException $e) {
            // Gérer l'erreur ici, par exemple, en journalisant l'erreur ou en renvoyant une valeur par défaut.
            return "Erreur de base de données : " . $e->getMessage();
        }
    }
    public function EnseignantListe()
    {
        $query = Database::connect()->prepare("SELECT * FROM `enseignants`");
        $query->execute();
        $Enseignants = $query->fetchAll();
        return $Enseignants;
    }

    public function NomEnseignant($idClasse)
    {
        $query = Database::connect()->prepare("SELECT enseignants.nom FROM classe,enseignants WHERE id_enseignant = enseignants.id AND classe.id = ?");
        $query->execute([$idClasse]);
        $nomEnseignant = $query->fetch();
        return $nomEnseignant;
    }
    
    public function DeleteEnseignant($id)
    {
        $query = Database::connect()->prepare("DELETE FROM `enseignants` WHERE id=?");
        $query->execute([$id]);
    }

    public function VerifEmail($email)
    {
        $query = Database::connect()->prepare("SELECT count(email) FROM `enseignants` WHERE email=?");
        $query->execute([$email]);
        $emailExiste = $query->fetch();
        return $emailExiste;
    }

    public function AddEnseignant($nom,$email, $hashed_pass)
    {
        $query = Database::connect()->prepare("INSERT INTO `enseignants` (nom,email,motDePasse) VALUES (?,?,?)");
        $query->execute([$nom, $email, $hashed_pass]);
    }
}
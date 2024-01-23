<?php

class AbsenceDAO
{

    public function AddAbsence($absence)
    {
        $query = Database::connect()->prepare("INSERT INTO `absence` (debut,fin,id_enseignant) VALUES (?,?,?)");
        $query->execute([$absence->getDebut(), $absence->getFin(), $absence->getIdEnseignant()]);
    }


    public function AbsenceList()
    {
        $query = Database::connect()->prepare("CALL listeAbsence");
        $query->execute();
        $absences = $query->fetchALL();
        return $absences;
    }
    // public function AbsenceListById($id)
    // {
    //     $query = Database::connect()->prepare("SELECT * FROM absence WHERE id=?");
    //     $query->execute($id);
    //     $absence_modifier = $query->fetch();
    //     return $absence_modifier;
    // }
    public function AbsenceListById($id)
    {
        $query = Database::connect()->prepare("SELECT * FROM absence WHERE id=:id");
        $query->execute([':id' => $id]);
        $absence_modifier = $query->fetch();
        return $absence_modifier;
    }
    public function AbsenceListByEnseignant()
    {
        $query = Database::connect()->prepare("SELECT absence.id AS id, enseignants.nom AS enseignant_nom, absence.debut AS debut, absence.fin AS fin
        FROM enseignants
        JOIN absence ON enseignants.id = absence.id_enseignant");
        $query->execute();
        $absences = $query->fetchAll();
        return $absences;
    }
    public function AbsenceTotal(){
        $query = Database::connect()->prepare("SELECT enseignants.nom, SUM(DATEDIFF(absence.fin, absence.debut)) AS nb_jours_absence
                         FROM enseignants
                         JOIN absence ON enseignants.id = absence.id_enseignant
                         WHERE absence.debut >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
                         GROUP BY enseignants.id");
        $query->execute();
        $resultats = $query->fetchAll();
        return $resultats;
    }
    public function EditAbsence($debut, $fin, $id_enseignant, $id)
    {
        $query = Database::connect()->prepare('UPDATE absence SET debut=?,fin=?,id_enseignant=? WHERE id=?');
        $query->execute([$debut, $fin, $id_enseignant, $id]);
    }
    public function DeleteAbsenceById($id)
    {
        $query = Database::connect()->prepare("DELETE FROM absence where id=?");
        $query->execute([$id]);
    }
}

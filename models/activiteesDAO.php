<?php

class ActiviteesDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM activitees');
        $query->execute();
        $activites = $query->fetchAll(PDO::FETCH_ASSOC);
        return $activites;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM activitees WHERE id= ?');
        $query->execute([$id]);
        $activitees = $query->fetch(PDO::FETCH_ASSOC);
        return $activitees;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM activitees WHERE id= ?');
        $query->execute([$id]);
    }

    // public function update(Activitees $activitees)
    // {
    //     $query = Database::connect()->prepare('UPDATE activitees SET titreActivitees=?,description=?,jours=?,duree=?,id_classe=? WHERE id = ?');
    //     $query->execute([$activitees->getTitreActivitees(), $activitees->getDescription(), $activitees->getJours(), $activitees->getDuree(), $activitees->getId_classe(), $activitees->getId()]);
    // }
    public function update($titre, $description, $jours, $duree, $id_classe, $id)
    {
        $query = Database::connect()->prepare('UPDATE activitees SET titreActivitees=?,description=?,jours=?,duree=?,id_classe=? WHERE id=?');
        $query->execute([$titre, $description, $jours, $duree, $id_classe, $id]);
    }

    public function insert(Activitees $activitees)
    {
        $query = Database::connect()->prepare('INSERT INTO activitees (titreActivitees,description,jours,duree,id_classe) VALUES (?,?,?,?,?)');
        $query->execute([$activitees->getTitreActivitees(), $activitees->getDescription(), $activitees->getJours(), $activitees->getDuree(), $activitees->getId_classe()]);
    }
    public function VerifActivitee($titre, $date, $id_classe)
    {
        $query = Database::connect()->prepare("SELECT count(titreActivitees), count(jours), count(id_classe) FROM `activitees` WHERE titreActivitees=? and jours=? and id_classe=?");
        $query->execute([$titre, $date, $id_classe]);
        $activiteeExiste = $query->fetch();
        return $activiteeExiste;
    }
    public function ActivitesListClasseNom()
    {
        $query = Database::connect()->prepare("SELECT activitees.id, activitees.titreActivitees, activitees.description, classe.nom AS classeNom, classe.niveau AS classeNiveau, activitees.jours AS `date`, activitees.duree FROM activitees INNER JOIN classe ON activitees.id_classe = classe.id");
        $query->execute();
        $activites = $query->fetchAll();
        return $activites;
    }


    // fonction pour le calendrier

    public function ActivitesListByClasse($classeId)
{
    $query = Database::connect()->prepare("SELECT * FROM activitees WHERE id_classe = ?");
    $query->execute([$classeId]);
    $activites = $query->fetchAll(PDO::FETCH_ASSOC);
    return $activites;
}
}

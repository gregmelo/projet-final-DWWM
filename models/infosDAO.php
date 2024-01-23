<?php

class InfosDAO
{
    public function selectAll()
    {
        $query = Database::connect()->prepare('SELECT * FROM infos');
        $query->execute();
        $infoss = $query->fetchAll(PDO::FETCH_ASSOC);
        return $infoss;
    }

    public function selectOne($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM infos WHERE id= ?');
        $query->execute([$id]);
        $infos = $query->fetch(PDO::FETCH_ASSOC);
        return $infos;
    }

    public function delete($id)
    {
        $query = Database::connect()->prepare('DELETE FROM infos WHERE id= ?');
        $query->execute([$id]);
    }

    // public function update(Infos $infos)
    // {
    //     $query = Database::connect()->prepare('UPDATE infos SET titreInfos=?,details=?,id_classe=? WHERE id = ?');
    //     $query->execute([$infos->getTitreInfos(), $infos->getDetails(), $infos->getId_classe(), $infos->getId()]);
    // }
    public function update($titre, $details, $id_classe, $id)
    {
        $query = Database::connect()->prepare('UPDATE infos SET titreInfos=?,details=?,id_classe=? WHERE id=?');
        $query->execute([$titre, $details, $id_classe, $id]);
    }

    public function insert(Infos $infos)
    {
        $query = Database::connect()->prepare('INSERT INTO infos (titreInfos,details,id_classe) VALUES (?,?,?)');
        $query->execute([$infos->getTitreInfos(), $infos->getDetails(), $infos->getId_classe()]);
    }
    public function InfosListByClasse($classeId)
{
    $query = Database::connect()->prepare("SELECT * FROM infos WHERE id_classe = ?");
    $query->execute([$classeId]);
    $informations = $query->fetchAll(PDO::FETCH_ASSOC);
    return $informations;
}
}

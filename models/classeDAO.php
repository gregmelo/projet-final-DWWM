<?php
 class ClasseDAO{
    public function ClasseList(){
        $query= Database :: connect()->prepare("SELECT * FROM classe");
        $query->execute();
        $classes=$query->fetchAll();
        return $classes;
    }
    public function ClasseListByEnseignant()
    {
        $query = Database::connect()->prepare("SELECT classe.id, classe.nom, classe.niveau, enseignants.nom as nom_enseignant FROM classe INNER JOIN enseignants ON classe.id_enseignant = enseignants.id");
        $query->execute();
        $classe = $query->fetchAll();
        return $classe;
    }

    public function AddClasse(Classe $classe)
    {
        $query = Database::connect()->prepare("INSERT INTO `classe` (nom,niveau,id_enseignant) VALUES (?,?,?)");
        $query->execute([$classe->getNom(), $classe->getNiveau(), $classe->getIdEnseignant()]);
    }

    public function DeleteClasse($id)
    {
        $query = Database::connect()->prepare("DELETE FROM `classe` WHERE id=?");
        $query->execute([$id]);
    }

    //Affiche la liste d'une classe par son ID
    public function ShowClasse($id)
    {
        $query = Database::connect()->prepare('SELECT * FROM classe Where id=?');
        $query->execute([$id]);
        $classe_modifier = $query->fetch();
        return $classe_modifier;
    }
    //Modifier une classe grace à sont ID    
    public function Edit($nom,$niveau, $id)
    {
        $query = Database::connect()->prepare('UPDATE classe SET nom=?,niveau=? WHERE id=?');
        $query->execute([$nom,$niveau, $id]);
    }
 }

?>
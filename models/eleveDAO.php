<?php
class EleveDAO
{
	public function AddEleve($eleve)
	{
		$query = Database::connect()->prepare("INSERT INTO eleves (nom,prenom,email_primaire,email_secondaire,id_classe)  VALUES(?,?,?,?,?)");
		$query->execute([$eleve->getNom(), $eleve->getPrenom(), $eleve->getEmailPrimaire(), $eleve->getEmailSecondaire(), $eleve->getIdClasse()]);
	}
	public function ElevesListByClasse()
	{
		$query = Database::connect()->prepare("SELECT eleves.id, eleves.nom, eleves.prenom, eleves.email_primaire, eleves.email_secondaire, classe.nom AS nom_classe, classe.niveau AS niveau_classe 
	FROM eleves 
	INNER JOIN classe ON eleves.id_classe = classe.id");
		$query->execute();
		$eleves = $query->fetchAll();
		return $eleves;
	}

	// Ajouter une méthode dans EleveDAO pour récupérer la classe d'un enfant en fonction de son ID
	public function ClasseById($id)
	{
		$query = Database::connect()->prepare('SELECT id_classe FROM eleves WHERE id=?');
		$query->execute([$id]);
		$classe = $query->fetch();
		return $classe;
	}

	public function EleveListById($id)
	{
		$query = Database::connect()->prepare('SELECT * FROM eleves Where id=?');
		$query->execute([$id]);
		$eleve_modifier = $query->fetch();
		return $eleve_modifier;
	}
	public function EleveListByEmailParent($parent_email1, $parent_email2)
	{
		$query = Database::connect()->prepare('SELECT * FROM eleves Where email_primaire=? OR email_secondaire=?');
		$query->execute([$parent_email1, $parent_email2]);
		$eleve_liste_by_parent = $query->fetchAll();
		return 	$eleve_liste_by_parent;
	}
	public function EleveList()
	{
		$query = Database::connect()->prepare("SELECT * FROM eleves");
		$query->execute();
		$eleves = $query->fetchAll();
		return $eleves;
	}
	//Modifier uneleve grace à sont ID    
	public function EditEleve($nom, $prenom, $email_primaire, $email_secondaire, $id_classe, $id)
	{
		$query = Database::connect()->prepare('UPDATE eleves SET nom=?,prenom=?,email_primaire=?,email_secondaire=?,id_classe=? WHERE id=?');
		$query->execute([$nom, $prenom, $email_primaire, $email_secondaire, $id_classe, $id]);
	}
	public function DeleteEleveById($id)
	{
		$query = Database::connect()->prepare("DELETE FROM eleves where id=?");
		$query->execute([$id]);
	}
	public function ensiegnantWithMailParent($parentConnecte1, $parentConnecte2, $eleveconnecter)
	{
		$query = Database::connect()->prepare('SELECT enseignants.nom FROM enseignants 
		INNER JOIN classe ON classe.id_enseignant = enseignants.id 
		INNER JOIN eleves ON classe.id = eleves.id_classe 
		WHERE (email_primaire = ? OR email_secondaire = ?) 
		AND eleves.prenom = ?');
		$query->execute($parentConnecte1, $parentConnecte2, $eleveconnecter);
		$enseignantParentConnecte = $query->fetch();
		return $enseignantParentConnecte;
	}
}

<?php
class ParentDAO
{

	// Fonction pour ajouter un parent dans la base de données
	public function AddParent($parent)
	{
		$query = Database::connect()->prepare("INSERT INTO parents (nom,prenom,email,motDePasse,password_changed)  VALUES(?,?,?,?,?)");
		$query->execute([$parent->getNom(), $parent->getPrenom(), $parent->getEmail(), $parent->getMotdePasse(), $parent->getPasswordChanged()]);
	}

	// Fonction pour récupérer une liste de tous les parents dans la base de données
	public function ParentsListe()
	{
		$query = Database::connect()->prepare("SELECT * FROM `parents`");
		$query->execute();
		$parents = $query->fetchAll();
		return $parents;
	}

	// Fonction pour récupérer le nombre d'enfants associés à un parent donné
	public function NbrEnfantByParent($emailParent)
	{
		$query = Database::connect()->prepare("SELECT (SELECT COUNT(*) FROM eleves WHERE email_primaire = :email OR email_secondaire = :email) AS total_children FROM parents WHERE email = :emailParent");
		$query->bindParam(':email', $emailParent);
		$query->bindParam(':emailParent', $emailParent);
		$query->execute();
		$nbrEnfants = $query->fetch();
		return $nbrEnfants;
	}

	// Fonction pour la connexion d'un parent à son compte
	public function Connexion($email, $passwordlogin)
	{
		$query = Database::connect()->prepare("SELECT * FROM parents where email=?");
		$query->execute([$email]);
		$obj = $query->fetch();
		if (isset($obj['id'])) {
			if (password_verify($passwordlogin, $obj['motDePasse'])) {
				$parent = new Parents($obj['id'], $obj['nom'], $obj['prenom'], $obj['email'], $obj['motDePasse'], 0);
				return $parent;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	// Fonction pour mettre à jour les informations personnelles d'un parent dans la base de données
	public function Update(Parents $parent)
	{
		$query = Database::connect()->prepare('UPDATE parents SET nom=?,prenom=?,email=?, motDePasse=?, password_changed=? WHERE id = ?');
		$query->execute([$parent->getNom(), $parent->getPrenom(), $parent->getEmail(), $parent->getMotDePasse(), $parent->getPasswordchanged(), $parent->getId()]);
	}
	public function DeleteParentById($id)
	{
		$query = Database::connect()->prepare("DELETE FROM parents where id=?");
		$query->execute([$id]);
	}
	// Fonction pour mettre à jour le mot de passe d'un parent dans la base de données
	public function updatePassword(Parents $parents)
	{
		$query = Database::connect()->prepare('UPDATE parents SET motDePasse=?,password_changed=? WHERE email = ?');
		$query->execute([$parents->getMotDePasse(), $parents->getPasswordchanged(), $parents->getEmail()]);
	}

	// Fonction pour mettre à jour le mot de passe oublié d'un parent dans la base de données
	public function updatePasswordOublier(Parents $parent)
	{
		$query = Database::connect()->prepare('UPDATE parents SET motDePasse=? WHERE email = ?');
		$query->execute([$parent->getMotDePasse(), $parent->getEmail()]);
	}

	//fonction pour obtenir la valeur du change password
	public function etatPasswordChange($email)
	{
		$query = Database::connect()->prepare("SELECT password_changed FROM parents where email=?");
		$query->execute([$email]);
		$etatPassChange = $query->fetch();
		return $etatPassChange;
	}

	//vérification de l'éxistance de l'e-mail du parent
	public function VerifName($email)
	{
		$query = Database::connect()->prepare("SELECT count(email) FROM `parents` WHERE email=?");
		$query->execute([$email]);
		$emailExiste = $query->fetch();
		return $emailExiste;
	}

	//selection d'un seul parent par son id
	public function selectOne($id)
	{
		$query = Database::connect()->prepare('SELECT * FROM parents WHERE id= ?');
		$query->execute([$id]);
		$parent = $query->fetch(PDO::FETCH_ASSOC);
		return $parent;
	}

	//selection d'un parent par son mail
	public function getByEmail($email)
	{
		$query = Database::connect()->prepare('SELECT * FROM parents WHERE email = ?');
		$query->execute([$email]);
		$parentData = $query->fetch(PDO::FETCH_ASSOC);

		if ($parentData) {
			$parent = new Parents($parentData['id'], $parentData['nom'], $parentData['prenom'], $parentData['email'], $parentData['motDePasse'], $parentData['password_changed']);
			return $parent;
		} else {
			return null;
		}
	}

	//selection de toutes les informations en fonction de l'e-mail du parent et de l'id de son enfant
	public function AllInfoByEmailParent($emailparent, $id_eleve)
	{
		$query = Database::connect()->prepare('SELECT activitees.*, classe.*, infos.*, enseignants.nom, absence.* 
FROM parents 
INNER JOIN eleves ON parents.email = eleves.email_primaire OR parents.email = eleves.email_secondaire 
INNER JOIN classe ON eleves.id_classe = classe.id 
INNER JOIN activitees ON classe.id = activitees.id_classe 
INNER JOIN infos ON classe.id = infos.id_classe 
INNER JOIN enseignants ON classe.id_enseignant = enseignants.id 
INNER JOIN absence ON enseignants.id = absence.id_enseignant 
WHERE parents.email = ? AND eleves.id = ?');
		$query->execute([$emailparent, $id_eleve]);
		$info = $query->fetch(PDO::FETCH_ASSOC);
		return $info;
	}
}

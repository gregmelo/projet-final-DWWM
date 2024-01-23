<?php

class LoginDAO{
	//Afficher les parent en fonction de leurs ID
	public function GetById($id){
		$query= Database :: connect()->prepare("SELECT * FROM parents where id=?");
		$query->execute([$id]);
		$Parents=$query->fetch();
		return $Parents;

	}
	//affichage de tout les enfants d'un meme parent
	public function SimilarParent($id_parent){
		$query= Database :: connect()->prepare("SELECT * FROM enfant where id_parent=?");
		$query-> execute([$id_parent]);
		$ParentsSml=$query->fetchAll();
		return $ParentsSml;
	}

	//research
	public function Research( string $search){
		$query=Database :: connect()->prepare("SELECT * FROM parents where nom like CONCAT('%',?,'%') ");
		$query->execute([$search]);
		$Parents=$query->fetchAll();
		return $Parents;

	}
	public function add($parent){
		$query=Database :: connect()->prepare("INSERT INTO parents (nom,prenom,email,motDePasse) VALUES(?,?,?,?)");
		$query->execute([$parent->getNom(),$parent->getPrenom(),$parent->getEmail(),$parent->getPassword()]);

	}
	//GetAll
	public function GetAll(){
		$query=Database :: connect()->prepare("SELECT * FROM produit LIMIT 8");
		$query->execute();
		$Produits=$query->fetchAll();
		return $Produits;

	}

	public function ListProductsCart(){
		$query=Database :: connect()->prepare("SELECT * FROM produit");
		$query->execute();
		$Produits=$query->fetchAll();
		return $Produits;

	}
	//Delete
	public function Delete($id){
		$query= Database :: connect()->prepare("DELETE FROM produit where id=?");
		$query->execute([$id]);

	}
	//Update
	public function Update($produit,$id){
		$query= Database :: connect()->prepare("UPDATE produit SET titre=?,prix=?,stock=?,id_Categorie=?,image=? where id=?");
		$query->execute([$produit->gettitre(),$produit->getprix(),$produit->getstock(),$produit->getid_Categorie(),$produit->getimage(),$produit->getid()]);
	}

	public function Edit($titre,$prix,$stock,$id_Categorie,$image,$id){
        $query= Database :: connect()->prepare('UPDATE produit SET titre=?,prix=?,id_Categorie=?,stock=?,`image`=? WHERE id='.$id);
    	$query->execute ([$titre,$prix,$id_Categorie,$stock,$image]);        
    }
	public function DeleteByIdCat($id)
	{
		$query = Database::connect()->prepare("DELETE FROM produit where id_Categorie in(SELECT id FROM categorie where id=?)");
		$query->execute([$id]);
	}
	
}




?>
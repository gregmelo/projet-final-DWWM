<?php
 class EnfantDAO{
 	public function add($enfant){
 		$query=Database ::connect()->prepare("INSERT INTO enfant (nom,prenom,id_parent,id_classe)  VALUES(?,?,?,?)");
 		$query->execute([$enfant->getNom(),$enfant->getPrenom(),$enfant->getIdParent(),$enfant->getIdClasse()]);

 	}
 }

?>
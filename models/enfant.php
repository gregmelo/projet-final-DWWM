<?php

// Classe Metier

class Enfant{

    private $id;
    private $nom;
    private $prenom;
    private $id_parent;
    private $id_classe;


    public function __construct( $id, $nom, $prenom,$id_parent,$id_classe) {

        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_parent = $id_parent;
        $this->id_classe = $id_classe;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function getIdParent(){
        return $this->id_parent;
    }
    public function setIdParent($id_parent){
        $this->id_parent = $id_parent;
    }
    public function getIdClasse(){
        return $this->id_classe;
    }
    public function setIdClasse($id_classe){
        $this->id_classe = $id_classe;
    }

}
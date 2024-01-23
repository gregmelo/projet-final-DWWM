<?php

// Classe Metier

class Eleve{

    private $id;
    private $nom;
    private $prenom;
    private $email_primaire;
    private $email_secondaire;
    private $id_classe;


    public function __construct( $id, $nom, $prenom,$email_primaire,$email_secondaire,$id_classe) {

        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email_primaire = $email_primaire;
        $this->email_secondaire = $email_secondaire;
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
    public function getEmailPrimaire(){
        return $this->email_primaire;
    }
    public function setEmailPrimaire($email_primaire){
        $this->email_primaire = $email_primaire;
    }
    public function getEmailSecondaire()
    {
        return $this->email_secondaire;
    }
    public function setEmailSecondaire($email_secondaire)
    {
        $this->email_secondaire = $email_secondaire;
    }
    public function getIdClasse(){
        return $this->id_classe;
    }
    public function setIdClasse($id_classe){
        $this->id_classe = $id_classe;
    }

}
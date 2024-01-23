<?php

// Classe Metier parents

class Parents{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;
    private $password_changed;


    // constructeur
    public function __construct( $id, $nom, $prenom, $email, $motDePasse, $password_changed) {

        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->password_changed = $password_changed;
    }

    //liste des getteurs et setteurs
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
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getMotDePasse(){
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse){
        $this->motDePasse = $motDePasse;
    }
    public function getPasswordChanged()
    {
        return $this->password_changed;
    }

    public function setPasswordChanged($password_changed)
    {
        $this->password_changed = $password_changed;
    }
}
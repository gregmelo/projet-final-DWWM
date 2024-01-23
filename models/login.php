<?php

// Classe Metier

class Login{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $password_changed;



    public function __construct( $id, $nom, $prenom, $email, $password, $password_changed) {

        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->password_changed = $password_changed;
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
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
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
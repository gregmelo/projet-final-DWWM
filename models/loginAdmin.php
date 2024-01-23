<?php

// Classe Metier

class Admin {

    private $id;
    private $email;
    private $motDePasse;


    public function __construct($id, $email, $motDePasse){

        $this->id = $id;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }
}
<?php

class Absence{

    private $id;
    private $debut;
    private $fin;
    private $idEnseignant;

    public function __construct($id, $debut, $fin, $idEnseignant) {

        $this->id = $id;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->idEnseignant = $idEnseignant;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDebut(){
        return $this->debut;
    }

    public function setDebut($debut){
        $this->debut = $debut;
    }
        public function getFin(){
        return $this->fin;
    }

    public function setFin($fin){
        $this->fin = $fin;
    }
        public function getIdEnseignant(){
        return $this->idEnseignant;
    }

    public function setIdEnseignant($idEnseignant){
        $this->idEnseignant = $idEnseignant;
    }

}







?>
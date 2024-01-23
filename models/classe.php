<?php

// Classe Metier

class Classe{

    private $id;
    private $nom;
    private $niveau;
    private $idEnseignant;

    public function __construct($id, $nom, $niveau, $idEnseignant) {

        $this->id = $id;
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->idEnseignant = $idEnseignant;
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

    public function getNiveau(){
        return $this->niveau;
    }

    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }

    public function getIdEnseignant()
    {
        return $this->idEnseignant;
    }

    public function setIdEnseignant($idEnseignant)
    {
        $this->idEnseignant = $idEnseignant;
    }
}
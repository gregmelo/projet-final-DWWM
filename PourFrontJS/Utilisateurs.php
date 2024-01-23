<?php

/*
 * Utilisateurs.php
 */

class Utilisateurs {

    private $pseudo;
    private $mdp;
    private $email;
    private $qualite;

    public function __construct($pseudo = "", $mdp = "", $email = "", $qualite = "") {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->email = $email;
        $this->qualite = $qualite;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getQualite() {
        return $this->qualite;
    }

    public function setPseudo($pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function setMdp($mdp): void {
        $this->mdp = $mdp;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setQualite($qualite): void {
        $this->qualite = $qualite;
    }

}

?>

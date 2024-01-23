<?php
require('../models/DatabaseAdmin.php');
require('../models/parent.php');
require('../models/parentDAO.php');


$parentDAO = new ParentDAO();

$ajout_ok = 0;

if (isset($_POST['ajouter'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = $_POST['password'];
    $regexMail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $regexMDP = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    $emailExiste = $parentDAO->VerifName($email);
    $passwordChanged = 'false';

    if (!preg_match($regexMDP, $mdp)) {
        $ajout_ok = 3; // mot de passe ne respecte pas les critères
    } else if (!preg_match($regexMail, $email)) {
        $ajout_ok = 4; // mail ne respecte pas les critères
    } else if($emailExiste['count(email)'] >= 1) {

        $ajout_ok = 2;
    } else {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
        $parent = new Parents(0, $nom, $prenom, $email, $mdp_hash, $passwordChanged);
        $parentDAO->AddParent($parent);

        $ajout_ok = 1;
    }
}

$template = "parents_ajouter";
include "layout.phtml";

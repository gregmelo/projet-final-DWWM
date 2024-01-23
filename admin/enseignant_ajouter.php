<?php
require('../models/DatabaseAdmin.php'); 
require('../models/enseignant.php');
require('../models/enseignantDAO.php');

$enseignant = new EnseignantsDAO();

$ajout_ok = 0;
if (isset($_POST['ajouter'])) {
    
    $nom = htmlspecialchars($_POST['nomEnseignant']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    $emailExiste = $enseignant->VerifEmail($email);
    
    if (!preg_match($regex, $pass)) {
        $ajout_ok = 3; // mot de passe ne respecte pas les critères
    } else if($emailExiste['count(email)'] >= 1) {
    
        $ajout_ok = 2;
    }else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $enseignant->AddEnseignant($nom, $email, $hashed_pass);
        
        $ajout_ok = 1;
    }
}

$template = "enseignant_ajouter";
include "layout.phtml";

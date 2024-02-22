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
    $passwordChanged = false;
    // Générer un mot de passe aléatoire
    $password = generateRandomPassword();
    
    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Envoyer l'e-mail au parent
    $to = $email;
    $subject = "Votre nouveau mot de passe";
    $message = "Bonjour,\n\nUn compte vous à été créer sur le site de l'école de votre/vos enfant(s). \n\nVoici votre mot de passe pour accéder à votre compte : $password\n\nCordialement,\nVotre école";
    $headers = "From: votreecole@exemple.com";

    if (mail($to, $subject, $message, $headers)) {
        // Insérer le parent dans la base de données avec le mot de passe haché
        $parent = new Parents(0, $nom, $prenom, $email, $hashedPassword, $passwordChanged);
        $parentDAO->AddParent($parent);
        $ajout_ok = 1;
    } else {
        $ajout_ok = 5; // Erreur lors de l'envoi de l'e-mail
    }
}

$template = "parents_ajouter";
include "layout.phtml";

function generateRandomPassword($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-/*!§$%&#';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}


$template = "parents_ajouter";
include "layout.phtml";

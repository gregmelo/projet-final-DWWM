<?php
require('header.php');
require('./models/parent.php');
require('./models/parentDAO.php');

// Get parent information from database
$parentDAO = new ParentDAO();

// Handle form submission
if (isset($_POST['changer'])) {
    // Retrieve form data
    $id = $parent_id;
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = htmlspecialchars($_POST['motdepasse']);

    // Validate form data
    $errors = array();

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'adresse e-mail n\'est pas valide';
    }

    // Check if password is valid
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($regex, $motDePasse)) {
        $errors['motdepasse'] = 'Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
    }

    // If no errors, update parent information
    if (empty($errors)) {
        $parent = new Parent($id, $nom, $prenom, $email, $motDePasse);
        $parentDAO->update($parent);
        $success = "Les informations du compte ont été mises à jour avec succès.";

        // Mettre à jour les variables de session et rediriger l'utilisateur vers la page d'accueil
        $_SESSION['login_nom'] = $parent->getNom();
        $_SESSION['login_email'] = $parent->getEmail();
        $_SESSION['login_id'] = $parent->getId();
        header("location: monCompte.php");
        exit();
    }
}

$template = './www/monCompte';
include './www/layout.phtml';

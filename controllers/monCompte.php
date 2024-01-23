<?php
require('header.php');
require('models/parent.php');
require('models/parentDAO.php');

// Retrieve parent information from session
$parent_id = $_SESSION['login_id'];
$parent_email = $_SESSION['login_email'];

// Get parent information from database
$parentDAO = new ParentDAO();
$parentSelect = $parentDAO->selectOne($parent_id);

if (isset($_POST['delete_compte'])) {
    $id = $parent_id;
    $parentDAO->deleteParentById($id);

    // Déconnecter l'utilisateur
    session_destroy();

    // Rediriger l'utilisateur vers la page d'accueil ou une autre page appropriée
    header("Location:index.php");
    exit();
}




// Handle form submission
if (isset($_POST['modifier'])) {
    // Retrieve form data
    $id = $parent_id;
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = htmlspecialchars($_POST['motdepasse']);

    // Validate form data
    $errors = array();

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'L\'adresse e-mail n\'est pas valide';
} else {
    // Vérification du mot de passe
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/";
    if (!preg_match($regex, $motDePasse)) {
        $errors['motdepasse'] = 'Le mot de passe doit contenir au moins 12 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
    } else {
        // Si aucune erreur, mise à jour des informations du parent
        if (empty($errors)) {
            $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
            $parent = new Parents($id, $nom, $prenom, $email, $motDePasseHash, 0);
            $parentDAO->Update($parent);
            $success = "Les informations du compte ont été mises à jour avec succès.";

            // Mettre à jour les variables de session et rediriger l'utilisateur vers la page d'accueil
            $_SESSION['login_nom'] = $parent->getNom();
            $_SESSION['login_email'] = $parent->getEmail();
            $_SESSION['login_id'] = $parent->getId();
        }
    }
}
}

$template = './www/monCompte';
include './www/layout.phtml';

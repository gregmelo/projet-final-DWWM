<?php
require('../models/DatabaseAdmin.php');
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

$loginAdminDAO = new AdminDAO();

// CONNEXION 

$connexion_error = 0;
$change_password = 0;

if (isset($_POST['login'])) {
  $email = ($_POST['email']);

  $admin = $loginAdminDAO->loginAdmin($email);

  if ($admin) {
    // Générer un mot de passe aléatoire
    $password = generateRandomPassword();

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Envoyer l'e-mail au directeur ou à l'enseignant
    $to = $email;
    $subject = "Votre nouveau mot de passe";
    $message = "Bonjour,\n\nUne demande de nouveau mot de passe a été effectuée.\n\n Voici votre nouveau mot de passe : $password\n\nCordialement,\nVotre école";
    $headers = "From: votreecole@exemple.com";

    if (mail($to, $subject, $message, $headers)) {
      // Mettre à jour le mot de passe dans la base de données
      $loginAdminDAO->updatePassword($email, $hashedPassword);
      $ajout_ok = 1;
      // Utilisation de session pour stocker l'information sur le changement de mot de passe
      $_SESSION['change_password'] = 1;
      header("Location: index.php");
      exit();
    } else {
      $connexion_error = 1;
    }
  } else {
    // Si l'adresse e-mail n'est pas trouvée dans la base de données
    $connexion_error = 1;
  }
}

function generateRandomPassword($length = 12)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-/*!§$%&#';
  $password = '';
  for ($i = 0; $i < $length; $i++) {
    $password .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $password;
}

$template = "remember_password";
include './remember_password.phtml';

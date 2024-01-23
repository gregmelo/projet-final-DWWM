<?php
// Inclusion du fichier header.php qui contient les informations de l'en-tête HTML
require('header.php');

// Inclusion des fichiers parent.php et parentDAO.php qui contiennent les classes Parent et ParentDAO
require('./models/parent.php');
require('./models/parentDAO.php');

// Création d'une nouvelle instance de la classe ParentDAO
$parentDAO = new ParentDAO;

// Vérification de la tentative de connexion
$connexion_error = 0;
if (isset($_POST['connexion'])) {
  // Récupération des valeurs entrées dans les champs email et mot de passe du formulaire de connexion
  $cemail = htmlspecialchars($_POST['cEmail']);
  $cpasse = htmlspecialchars($_POST['cPassword']);

  // Appel de la méthode "Connexion" de la classe ParentDAO pour vérifier les informations d'identification
  $parent = $parentDAO->Connexion($cemail, $cpasse);

  // Vérification de la réponse reCAPTCHA
  if (empty($_POST['recaptcha-response'])) {
    // Redirection vers la page d'accueil si la réponse reCAPTCHA est vide
    header('Location: index.php');
  } else {
    // Préparation de l'URL pour la vérification de la réponse reCAPTCHA
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Lf8rNEkAAAAAIz5uaEXoT45qi74lu6tUFjs05wa&response={$_POST['recaptcha-response']}";

    // Vérification de l'installation de l'extension cURL
    if (function_exists('curl_version')) {
      // Initialisation de la session cURL
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_TIMEOUT, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      // Exécution de la requête et stockage de la réponse dans la variable $response
      $response = curl_exec($curl);
    } else {
      // Si l'extension cURL n'est pas installée, on utilise file_get_contents
      $response = file_get_contents($url);
      // Affichage de la réponse pour le débogage
      var_dump($response);
    }

    // Vérification de la réponse reCAPTCHA
    if (empty($response) || is_null($response)) {
      // Si la réponse est vide, on affiche une erreur et on redirige l'utilisateur vers la page de connexion
      $error = "Une erreur s'est produite lors de votre connexion.";
      header('Location: index.php?action=connexion');
    } else {
      // Décodage de la réponse JSON en objet PHP
      $data = json_decode($response);
      if ($data->success) {
        if ($parent == null) {
          // Si les informations d'identification sont incorrectes, on définit la variable $connexion_error à 1
          $connexion_error = 1;
        } else {
          // Récupération de l'état du changement de mot de passe de l'utilisateur
          $pass = $parentDAO->etatPasswordChange($cemail);
          // Vérification de l'état du changement de mot de passe
          if ("0" == $pass['password_changed']) {
            $_SESSION['login_email'] = $parent->getEmail();
            // Rediriger l'utilisateur vers la page de changement de mot de passe
            header("location: index.php?action=changePassword");
            exit(); // Terminer le script pour éviter d'exécuter le reste du code
          } else {
            $_SESSION['login_nom'] = $parent->getNom();
            $_SESSION['login_email'] = $parent->getEmail();
            $_SESSION['login_id'] = $parent->getId();
            // Rediriger l'utilisateur vers la page d'accueil
            header("location: index.php" . ("0" == $pass['password_changed'] ? "?action=changePassword" : ""));
            exit(); // Terminer le script pour éviter d'exécuter le reste du code
          }
        }
      }
    }
  }
}

$template = './www/login';
include './www/layout.phtml';

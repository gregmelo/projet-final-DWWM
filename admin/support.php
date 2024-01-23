<?php
require('../models/DatabaseAdmin.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $errors = array();

  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $errors[] = "Tous les champs sont requis";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email n'a pas un format valide";
  } else {
    // Envoyer un email à l'administrateur
    $to = "gregoryvericel6@gmail.com";
    $subject = "Message de contact depuis le site de gestion d'école: $subject";
    $body = "De : $name\n Email : $email\n Message :\n $message";
    $header = "From: $email\r\n";
    $header .= "Reply-To: $email\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $header)) {
      $success = "Votre message a été envoyé avec succès!";
    } else {
      $errors[] = "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
  }
}

$template = "support";
include 'layout.phtml';

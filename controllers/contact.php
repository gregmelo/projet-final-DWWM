<?php

include 'header.php';
include 'select_enfant.php';
require('models/enseignant.php');
require('models/enseignantDAO.php');
// require('models/parent.php');
// require('models/parentDAO.php');
require('models/enfant.php');
require('models/enfantDAO.php');
require('models/classe.php');
require('models/classeDAO.php');

$parent_email = $_SESSION['login_email'];
$parentDAO = new ParentDAO();
$parent = $parentDAO->getByEmail($parent_email);
$parent_nom = $parent->getNom();
$parent_prenom = $parent->getPrenom();

$enseignantsDAO = new EnseignantsDAO();
$listeEnseignants = $enseignantsDAO->EnseignantListe();

if (isset($_POST['envoyer'])) {

    // On vérifie si le champ "recaptcha-response" contient une valeur
    if (empty($_POST['recaptcha-response'])) {
        header('Location: index.php');
    } else {
        // On prépare l'URL
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Lf8rNEkAAAAAIz5uaEXoT45qi74lu6tUFjs05wa&response={$_POST['recaptcha-response']}";

        // On vérifie si curl est installé
        if (function_exists('curl_version')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
        } else {
            // On utilisera file_get_contents
            $response = file_get_contents($url);
            var_dump($response);
         }

        // On vérifie qu'on a une réponse
        if (empty($response) || is_null($response)) {
            $error = "Une erreur s'est produite lors de l'envoi du message.";
             header('Location: index.php?action=contact');
        } else {
            $data = json_decode($response);
            if ($data->success) {



                $id_enseignant = $_POST['id_enseignant'];
                $email_enseignant = $enseignantsDAO->EnseignantById($id_enseignant);
                // Récupérer les champs du formulaire de contact
                $nom = htmlspecialchars($_POST['nom']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
                // Envoyer le courriel à l'enseignant
                $sujet = "Nouveau message de $nom";
                $contenu = "Vous avez reçu un nouveau message de $nom ($email) :\n\n $message";
                $headers = "From: $email";
                if (mail($email_enseignant, $sujet, $contenu, $headers)) {
                    // Message envoyé avec succès
                    $success = "Le message a été envoyé avec succès à l'enseignant.";
                } else {
                    // Erreur lors de l'envoi du message
                    $error = "Une erreur s'est produite lors de l'envoi du message.";
                }
            }
        }
    }
}

//définir la template:
$template = './www/contact';
include './www/layout.phtml';

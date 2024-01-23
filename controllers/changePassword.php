<?php
require('header.php');
require('./models/parent.php');
require('./models/parentDAO.php');

$parentDAO = new ParentDAO;

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login_email'])) {
  header("location: index.php");
  exit();
}
$email = $_SESSION['login_email'];

// Récupérer le parent depuis la base de données
$parent = $parentDAO->getByEmail($email);
if (!$parent) {
  die("L'utilisateur n'existe pas dans la base de données");
}
$motdepasse = $parent->getMotDePasse();
$password_changed = $parent->getPasswordChanged();
// Vérifier si le formulaire de changement de mot de passe a été soumis
if (isset($_POST['changer'])) {
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
      $error = "Une erreur s'est produite lors du changement de votre mot de passe.";
      header('Location: index.php?action=changePassword');
    } else {
      $data = json_decode($response);
      if ($data->success) {
        $password = htmlspecialchars($_POST['nPassword']);
        $confirm_password = htmlspecialchars($_POST['cPassword']);

        // Vérifier que les deux mots de passe sont identiques
        if ($password != $confirm_password) {
          $error = "Les deux mots de passe ne correspondent pas";
        } else {
          // Vérifier que le mot de passe respecte la regex
          $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
          if (!preg_match($regex, $password)) {
            $error = "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial et avoir une longueur d'au moins 8 caractères";
          } else {
            // Mettre à jour le mot de passe dans la base de données
            $parent = new Parents(0, 0, 0, $email, $motdepasse, $password_changed);
            $parent->setEmail($_SESSION['login_email']);
            $parent->setMotDePasse(password_hash($password, PASSWORD_DEFAULT));
            $parent->setPasswordChanged(1);
            $parentDAO->updatePassword($parent);
            $message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page de connexion dans 5 secondes... <br> Afin de vous connecter avec votre nouveau mot de passe.";
            // Mettre à jour les variables de session et rediriger l'utilisateur vers la page d'accueil
            $_SESSION['login_nom'] = $parent->getNom();
            $_SESSION['login_email'] = $parent->getEmail();
            $_SESSION['login_id'] = $parent->getId();
          }
        }
      }
    }
  }
}

$template = './www/changePassword';
include './www/layout.phtml';
?>

<script type="text/javascript">
  let seconds = 5;
  let message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page de connexion dans " + seconds + " secondes... <br> Afin de vous connecter avec votre nouveau mot de passe.";
  document.getElementById("redirect-message").innerHTML = message;

  setInterval(function() {
    seconds--;
    message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page de connexion dans " + seconds + " secondes... <br> Afin de vous connecter avec votre nouveau mot de passe.";
    document.getElementById("redirect-message").innerHTML = message;

    if (seconds === 0) {
      clearInterval();
      window.location.href = "index.php?action=deconnexion";
    }
  }, 1000);
</script>
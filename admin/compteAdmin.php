<?php
require('../models/DatabaseAdmin.php');
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

// Traitement des données soumises par le formulaire de mise à jour du compte
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['admin_email'];
  $motdepasse = $_POST['admin_pass'];

  // Validation des données
  if (empty($email) || empty($motdepasse)) {
    $erreur = "Tous les champs sont requis";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreur = "L'email n'a pas un format valide";
  } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $motdepasse)) {
    $erreur = "Le mot de passe doit contenir au moins 8 caractères avec au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial (@$!%*#?&)";
  } else {
    // Hash du mot de passe
    $hashed_motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    // Mise à jour des informations de compte de l'administrateur dans la base de données
    $bdd = Database::connect();
    $requete = $bdd->prepare("UPDATE `admin` SET email = :email, motDePasse = :motdepasse WHERE id = :id");
    $requete->bindValue(':email', $email);
    $requete->bindValue(':motdepasse', $hashed_motdepasse);
    $requete->bindValue(':id', $_SESSION['admin_id']);
    $requete->execute();
    $_SESSION['admin_email'] = $email;
    $message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page du tableau de bord dans 5 secondes...";
  }
}

$template = "compteAdmin";
include 'layout.phtml';
?>

<script type="text/javascript">
  let seconds = 5;
  let message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page du tableau de bord dans " + seconds + " secondes...";
  document.getElementById("message").innerHTML = message;

  setInterval(function() {
    seconds--;
    message = "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page du tableau de bord dans " + seconds + " secondes...";
    document.getElementById("message").innerHTML = message;

    if (seconds === 0) {
      clearInterval();
      window.location.href = "board.php";
    }
  }, 1000);
</script>
function redirect() {
  let seconds = 5;
  let message =
    "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page du tableau de bord dans " +
    seconds +
    " secondes...";
  document.getElementById("redirect-message").innerHTML = message;

  let countdown = setInterval(function () {
    seconds--;
    message =
      "Compte mis à jour avec succès <br> Vous allez être redirigé vers la page du tableau de bord dans " +
      seconds +
      " secondes...";
    document.getElementById("redirect-message").innerHTML = message;

    if (seconds === 0) {
      clearInterval(countdown);
      window.location.href = "index.php?action=deconnexion";
    }
  }, 1000);
}

// Ajouter un écouteur d'événement pour le formulaire de changement de mot de passe
document
  .getElementById("changementpassword")
  .addEventListener("submit", function (event) {
    // Empêcher la soumission du formulaire
    event.preventDefault();

    // Appeler la fonction redirect après la mise à jour du mot de passe
    redirect();
  });

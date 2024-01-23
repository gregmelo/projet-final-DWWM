function init() {

  $("#chkPasswordEnseignant").on("click", afficherMasquerEnseignant);
  $("#chkPasswordAdmin").on("click", afficherMasquerAdmin);
}

function afficherMasquerEnseignant() {
  // récupération d'état de la case a cocher pour rendre le mdp visible ou invisible
  let coche = $("#chkPasswordEnseignant").prop("checked");
  console.log(coche);
  if (coche) {
    // modification du type de l'input du mdp en text
    $("#passwordEnseignant").attr("type", "text");
    $("#lblPasswordEnseignant").html("Masquer le mot de passe");
  } else {
    // modification du type de l'input du mdp en password
    $("#passwordEnseignant").attr("type", "password");
    $("#lblPasswordEnseignant").html("Afficher le mot de passe");
  }
}

  function afficherMasquerAdmin() {
  // récupération d'état de la case a cocher pour rendre le mdp visible ou invisible
  let coche = $("#chkPasswordAdmin").prop("checked");
  console.log(coche);
  if (coche) {
    // modification du type de l'input du mdp en text
    $("#passwordAdmin").attr("type", "text");
    $("#lblPasswordAdmin").html("Masquer le mot de passe");
  } else {
    // modification du type de l'input du mdp en password
    $("#passwordAdmin").attr("type", "password");
    $("#lblPasswordAdmin").html("Afficher le mot de passe");
  }

}
$(document).ready(init());

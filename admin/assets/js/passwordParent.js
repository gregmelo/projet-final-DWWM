function init() {

  $("#chkPasswordParent").on("click", afficherMasquerParent);
}

  function afficherMasquerParent() {
  // récupération d'état de la case a cocher pour rendre le mdp visible ou invisible
  let coche = $("#chkPasswordParent").prop("checked");
  console.log(coche);
  if (coche) {
    // modification du type de l'input du mdp en text
    $("#passwordParent").attr("type", "text");
    $("#lblPasswordParent").html("Masquer le mot de passe");
  } else {
    // modification du type de l'input du mdp en password
    $("#passwordParent").attr("type", "password");
    $("#lblPasswordParent").html("Afficher le mot de passe");
  }

}
$(document).ready(init());

/*
 * FormAndSubmitInscription.js
 * Traitement du submit
 */ /**
 *
 * @returns {undefined}
 */
function initFormulaire() {
  console.log("initFormulaire"); //document.getElementById("btValider").addEventListener("click", valider) //document.getElementById("btValider").onclick = valider
  document.getElementById("formulaire").onsubmit = valider;
} /// initFormulaire
/**
 *
 * @param {type} e
 * @returns {undefined}
 */
function valider(e) {
  console.log("valider one");
  console.log(e);
  console.log(e.target);
  e.preventDefault();
  console.log("valider two");
  let pseudo = document.getElementById("pseudo").value.trim();
  let mdp = document.getElementById("mdp").value.trim();
  let email = document.getElementById("email").value.trim();
  console.log(pseudo);
  console.log(mdp);
  console.log(email);
  if (pseudo !== "" && mdp !== "" && email !== "") {
    console.log("Soumisson OK");
    alert("Soumisson OK");
    document.getElementById("formulaire").submit();
  } else {
    document.getElementById("lblMessage").innerHTML =
      "Toutes les saisies sont obligatoires";
  }
}
/*
 * MAIN
 */
window.onload = initFormulaire;

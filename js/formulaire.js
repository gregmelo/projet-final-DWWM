function initAuthentification() {
  //affichage en claire ou non du mdp
  togglePasswordVisibility("cShowPassword", "cPassword", "cLabelShowPassword");
  togglePasswordVisibility(
    "insShowPassword",
    "insPassword",
    "insLabelShowPassword"
  );
  document.getElementById("inscription").onclick = validateForm;
//   document.getElementById("inscription").onsubmit = function (event) {
//     if (!validateForm()) {
//       event.preventDefault();
//     }
//   };
}

function togglePasswordVisibility(checkboxId, passwordId, labelId) {
  document.getElementById(checkboxId).addEventListener("click", function () {
    const isChecked = this.checked;
    document.getElementById(passwordId).type = isChecked ? "text" : "password";
    document.getElementById(labelId).innerHTML = isChecked
      ? "Masquer le mot de passe"
      : "Afficher le mot de passe";
  });
}

const emailRegex =
  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const passwordRegex =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

function validateForm() {
  const email = document.getElementById("insEmail").value.trim();
  const password = document.getElementById("insPassword").value.trim();

  if (!emailRegex.test(email)) {
    alert("Email non valide");
    return false;
  }

  if (!passwordRegex.test(password)) {
    alert("Mot de passe non valide");
    return false;
  }

  return true;
}


// function initAuthentification() {
//     //affichage en claire ou non du mdp
//     document.getElementById("cShowPassword").onclick = cPasswordVisible
//     //document.getElementById("cShowPassword").addEventListener("click", ()=>{cPasswordVisible()})
//     document.getElementById("insShowPassword").onclick = insPasswordVisible
//    // document.getElementById("cFormulaire").onsubmit = valider
// }

// function cPasswordVisible() {
//     if (document.getElementById("cShowPassword").checked) {
//         document.getElementById("cPassword").type = "text"
//         document.getElementById("cLabelShowPassword").innerHTML = "Masquer le mot de passe"
//     } else {
//         document.getElementById("cPassword").type = "password"
//         document.getElementById("cLabelShowPassword").innerHTML = "Afficher le mot de passe"
//     }
// }
// function insPasswordVisible() {
//     if (document.getElementById("insShowPassword").checked) {
//         document.getElementById("insPassword").type = "text"
//         document.getElementById("insLabelShowPassword").innerHTML = "Masquer le mot de passe"
//     } else {
//         document.getElementById("insPassword").type = "password"
//         document.getElementById("insLabelShowPassword").innerHTML = "Afficher le mot de passe"
//     }
// }
//  /**
//   *
//   * @returns {undefined}
//   */
//  function initFormulaire() {

//  } /// initFormulaire

//  function valider(event) {
//      console.log(event)
//           event.preventDefault()
//      let pseudo = document.getElementById("cEmail").value.trim()
//      let mdp = document.getElementById("cPassword").value.trim()
//      if (pseudo !== "" && mdp !== "") {
//         document.getElementById("cFormulaire").submit()
//      } else {
//          document.getElementById("cLabelShowPassword").innerHTML = "Toutes les saisies sont obligatoires"
//      }
//  }

/*
 * MAIN
 */
window.onload = initAuthentification;

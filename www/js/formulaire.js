const checkbox = document.getElementById("showPassword");
const passwordField = document.getElementById("cPassword");
const newPasswordField = document.getElementById("nPassword");
const label = document.getElementById("labelShowPassword");
const labelLogIn = document.getElementById("labelShowPasswordLogIn");

checkbox.addEventListener("change", function () {
  if (checkbox.checked) {
    passwordField.type = "text";
    newPasswordField.type = "text";
    label.innerHTML = "Masquer les mots de passe";
    labelLogIn.innerHTML = "Masquer le mots de passe";
  } else {
    passwordField.type = "password";
    newPasswordField.type = "password";
    label.innerHTML = "Afficher les mots de passe";
    labelLogIn.innerHTML = "Afficher le mots de passe";
  }
});

document.addEventListener("DOMContentLoaded", function () {
  checkbox.checked = false; // Pour s'assurer que la checkbox n'est pas cochée initialement
});

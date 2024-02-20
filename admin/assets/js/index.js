function init() {
  $("#pseudo").val("");
  $("#mdp").val("");
  $("#login").on("click", valider);
  $("#chkPasswordVisible").on("click", afficherMasquer);
  $("#rememberMe").on("click", seSouvenir);
  //$("nom").val($.cookie("cookNom"));
  //$("#password").val($.cookie("cookPassword"));
}

function valider() {
  let Nom = $("#nom").val().trim();
  let Password = $("#password").val().trim();
  let message = "OK";
  let xhr = $.get("http://localhost/projet_perso_titre/admin/index.php", {
    nom: Nom,
    password: Password,
  }); /// $.get

  xhr.done(function (data) {
    if (data === "1") {
      message = seSouvenir(Nom, Password);
      $("#lblMessage").html(message);
    } else {
      if (data === "0") {
        $("#lblMessage").html("Authentification ratée!!");
      } else {
        $("#lblMessage").html("Erreur serveur!!");
      }
    }
  });
} /// voir

function afficherMasquer() {
  // récupération d'état de la case a cocher pour rendre le mdp visible ou invisible
  let coche = $("#chkPasswordVisible").prop("checked");
  console.log(coche);
  if (coche) {
    // modification du type de l'input du mdp en text
    $("#password").attr("type", "text");
    $("#lblPasswordVisible").html("Masquer le mot de passe");
  } else {
    // modification du type de l'input du mdp en password
    $("#password").attr("type", "password");
    $("#lblPasswordVisible").html("Afficher le mot de passe");
  }
}

function supprimerCookie(nomCookie) {
  //Supprimer un cookie il faut écrire le cookie avec une chaine vide et une date d'expiration
  $.cookie(nomCookie, "", { expires: 0 });
}

function seSouvenir(Nom, password) {
  let message = "";
  if (navigator.cookieEnabled) {
    if ($("#rememberMe").prop("checked")) {
      creerCookie("nom", Nom);
      creerCookie("password", password);
      $("#lbpRememberMe").html(
        "Des cookies seront créer dans votre navigateur"
      );
      message = 1;
    } else {
      message = 0;
      supprimerCookie("nom");
      supprimerCookie("password");
    }
  } else {
    message = -1;
  }
  console.log(message);
}

// function creerCookie() {
// let pseudo = $("#pseudo").val().trim()
// let mdp = $("#mdp").val().trim()
//   $.cookie(cookPseudo, pseudo, { expires: 7 })
//   $.cookie(cookMdp, mdp, { expires: 7})
// }

function creerCookie(nom, valeur, jours) {
  //
  $.cookie(nom, valeur, { expires: jours });
}

document.addEventListener("DOMContentLoaded", function () {
  const inputs = document.querySelectorAll(".form-group input");

  inputs.forEach((input) => {
    input.addEventListener("focus", function () {
      const label = this.nextElementSibling;
      label.classList.add("active");
    });

    input.addEventListener("blur", function () {
      const label = this.nextElementSibling;
      if (this.value === "") {
        label.classList.remove("active");
      }
    });
  });
});

/*
main
*/

$(document).ready(init());

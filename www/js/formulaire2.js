document
  .querySelector("#cFormulaire")
  .addEventListener("submit", function (event) {
    const emailInput = document.querySelector("#cEmail");
    const emailValue = emailInput.value;

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(emailValue)) {
      emailInput.classList.add("error");
      event.preventDefault();
    } else {
      emailInput.classList.remove("error");
    }
  });

document
  .querySelector("#cFormulaire")
  .addEventListener("submit", function (event) {
    const passwordInput = document.querySelector("#cPassword");
    const passwordValue = passwordInput.value;

    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(passwordValue)) {
      passwordInput.classList.add("error");
      event.preventDefault();
    } else {
      passwordInput.classList.remove("error");
    }
  });

document
  .querySelector("#insPassword")
  .addEventListener("submit", function (event) {
    const passwordInput = document.querySelector("#insPassword");
    const passwordValue = passwordInput.value;

    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(passwordValue)) {
      passwordInput.classList.add("error");
      event.preventDefault();
    } else {
      passwordInput.classList.remove("error");
    }
  });
  
document.addEventListener("DOMContentLoaded", function () {
  // Connexion form
  const cShowPassword = document.getElementById("cShowPassword");
  const cPassword = document.getElementById("cPassword");

  cShowPassword.addEventListener("change", function () {
    cPassword.type = this.checked ? "text" : "password";
  });

  // Inscription form
  const insShowPassword = document.getElementById("insShowPassword");
  const insPassword = document.getElementById("insPassword");

  insShowPassword.addEventListener("change", function () {
    insPassword.type = this.checked ? "text" : "password";
  });
});

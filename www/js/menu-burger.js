// $(document).ready(function () {
//   $("#menuToggle").click(function () {
//     $("#menuDeroulant").stop(true, true).slideToggle();
//   });
// });

function handleMenu(value) {
  var openBtn = document.getElementById("openBtn");
  var closeBtn = document.getElementById("closeBtn");
  var navMenuBurger = document.getElementById("navMenuBurger");
  var mainContent = document.getElementById("mainContent");

  if (value === true) {
    openBtn.classList.add("inactive");
    closeBtn.classList.remove("inactive");
    navMenuBurger.classList.remove("inactive");
    mainContent.classList.add("inactive");
    navMenuBurger.style.transform = "translateX(0)";
  } else {
    openBtn.classList.remove("inactive");
    closeBtn.classList.add("inactive");
    navMenuBurger.classList.add("inactive");
    mainContent.classList.remove("inactive");
    navMenuBurger.style.transform = "translateX(-100%)";
  }
}

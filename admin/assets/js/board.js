function initBoard() {
DateCourante();
updateTime();
}

function DateCourante() {
      var currentDate = new Date();
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };
      document.getElementById("date").innerHTML =
        currentDate.toLocaleDateString("fr-FR", options);
}

  function updateTime() {
    var currentTime = new Date();
    var options = { hour: "numeric", minute: "numeric", second: "numeric" };
    document.getElementById("time").innerHTML = currentTime.toLocaleTimeString(
      "fr-FR",
      options
    );
     setInterval(updateTime, 1000);
  }
 


/*
 * MAIN
 */
window.onload = initBoard;

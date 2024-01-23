// let evenements = [{
//   "title": "sortie piscine",
//   "start": "2023-02-28",
//   "end":"2023-02-28"
// }]

document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth", // affichage par mois
    height: 550,
    locale: "fr", // définit la locale en français
    headerToolbar: {
      start: "prev,next today",
      center: "title",
      end: "dayGridMonth",
    },
    buttonText: {
      today: "Aujourd'hui",
    },
    events: {
      url: "./assets/calendrier/get-events.php",
      method: "POST",

    },     
  });
  console.log($JSONData);
  calendar.render();
});
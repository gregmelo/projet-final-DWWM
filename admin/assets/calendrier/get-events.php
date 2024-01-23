<?php 

include('../../models/DatabaseAdmin.php');
require('../../models/activitees.php');
require('../../models/activiteesDAO.php');

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

$activiteesDAO = new ActiviteesDAO();
$JSONData = $activiteesDAO->ActivitesListByClasse();

$evenements = array();
if (!empty($JSONData)) {
$activites = json_decode($JSONData, true);
foreach ($activites as $activite) {
$evenement = array();
$evenement['title'] = $activite['titre_activitees'];
$evenement['description'] = $activite['description'];
$evenement['start'] = $activite['date'];
$evenements[] = $evenement;
}
}
header('Content-Type: application/json');
$events = json_encode($evenements);
echo $events;
?>
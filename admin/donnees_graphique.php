<?php
require('../models/DatabaseAdmin.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/absence.php');
require('../models/absenceDAO.php');


$AbsenceDAO = new AbsenceDAO();
// Récupération des données
$resultats = $AbsenceDAO->AbsenceTotal();

$data = array();
$colors = array('red', 'blue', 'green', 'yellow', 'purple', 'orange', 'grey', 'brown');
$i = 0;
while ($row = $resultats) {
    $data[] = array('nom_enseignant' => $row['nom_enseignant'], 'nb_jours_absence' => $row['nb_jours_absence'], 'color' => $colors[$i]);
    $i++;
}
?>

<!-- Envoi des données à JavaScript -->
<script>
    var data = <?php echo json_encode($data); ?>;
</script>
<?php
$template = "graph";
include "layout.phtml";
?>
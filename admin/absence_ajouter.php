<?php
require('../models/DatabaseAdmin.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/absence.php');
require('../models/absenceDAO.php');


$AbsenceDAO = new AbsenceDAO();
$enseignantDAO = new EnseignantsDAO();

$ajout_ok = 0;

if(isset($_POST['ajouter'])) {

    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $id_enseignant = $_POST['id_enseignant'];

    $absence= new Absence(0, $debut, $fin, $id_enseignant);
    $AbsenceDAO->AddAbsence($absence);
    $ajout_ok = 1;

}

$listeEnseignant = $enseignantDAO->EnseignantListe();

$template="absence_ajouter";
include "layout.phtml";

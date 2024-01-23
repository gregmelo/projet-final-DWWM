<?php
require('../models/DatabaseAdmin.php');
require('../models/absence.php');
require('../models/absenceDAO.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');

$absenceDAO = new AbsenceDAO();
$enseignantsDAO = new EnseignantsDAO();

$id = $_GET['id'];
$modif_ok = 0;

if (isset($_POST['modifier'])) {

    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $id_enseignant = $_POST['nom_enseignant'];
    $modifier = $absenceDAO->EditAbsence($debut, $fin, $id_enseignant, $id);

    $modif_ok = 1;
    header("location:absence_liste.php");
}

$absence_modifier = $absenceDAO->AbsenceListById($id);
$listeEnseignant = $enseignantsDAO->EnseignantListe();


$template = "modifier_absence";
include "layout.phtml";

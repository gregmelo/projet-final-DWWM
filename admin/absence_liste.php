<?php
require('../models/DatabaseAdmin.php'); 
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/absence.php');
require('../models/absenceDAO.php');

$absences = new AbsenceDAO();
$enseignantDAO = new EnseignantsDAO();


$absence = $absences->AbsenceListByEnseignant();
$modif_ok = 0;


$template = 'absence_liste';
include 'layout.phtml';

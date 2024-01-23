<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');

$classeDAO = new ClasseDAO();
$eleveDAO = new EleveDAO();

$eleves = $eleveDAO->ElevesListByClasse();
//$idClasse = $classe['id'];

//$nomEnseignant = $enseignantDAO->NomEnseignant($idClasse);


$template = 'eleve_liste';
include 'layout.phtml';

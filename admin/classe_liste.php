<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');

$classeDAO = new ClasseDAO();
$enseignantDAO = new EnseignantsDAO();

$classe = $classeDAO->ClasseListByEnseignant();
//$idClasse = $classe['id'];

//$nomEnseignant = $enseignantDAO->NomEnseignant($idClasse);


$template = 'classe_liste';
include 'layout.phtml';

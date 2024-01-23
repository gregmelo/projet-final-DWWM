<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/activitees.php');
require('../models/activiteesDAO.php');
require('../models/infos.php');
require('../models/infosDAO.php');

$classeDAO = new ClasseDAO();
$activiteesDAO = new ActiviteesDAO();
$infosDAO = new InfosDAO();


$classe = $classeDAO->ClasseListByEnseignant();

$activites = $activiteesDAO->ActivitesListClasseNom();

 $informations = $infosDAO->InfosListByClasse();



$template = 'activitees_liste';
include 'layout.phtml';

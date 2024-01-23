<?php

include ('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');
require('../models/parent.php');
require('../models/parentDAO.php');
require('../models/activitees.php');
require('../models/activiteesDAO.php');



$classeDAO = new ClasseDAO();
$enseignantDAO = new EnseignantsDAO();
$eleveDAO = new EleveDAO();
$parentDAO = new ParentDAO();

$classe = $classeDAO->ClasseListByEnseignant();

$enseignants = $enseignantDAO->EnseignantListByClasse();

$eleves = $eleveDAO->ElevesListByClasse();

$parents = $parentDAO->ParentsListe();


$template="board";
include "layout.phtml";

?>
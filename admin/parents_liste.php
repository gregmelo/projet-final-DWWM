<?php
require('../models/DatabaseAdmin.php');
require('../models/parent.php');
require('../models/parentDAO.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');

$parentDAO = new ParentDAO();
$eleveDAO = new EleveDAO();


$parents = $parentDAO->ParentsListe();

$nbrEnfants = array();
foreach ($parents as $parent) {
    $emailParent = $parent['email'];
    $nbrEnfants[$emailParent] = $parentDAO->NbrEnfantByParent($emailParent);
}

// foreach ($parents as $parent) {
//     $emailParent = $parent['email'];
//     $nbrEnfant = $parentDAO->NbrEnfantByParent($emailParent);
//     //$idClasse = $classe['id'];
//     //$nomEnseignant = $enseignantDAO->NomEnseignant($idClasse);
// }

$template = 'parents_liste';
include 'layout.phtml';

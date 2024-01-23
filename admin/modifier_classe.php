<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');

$classeDAO = new classeDAO();
$enseignantDAO = new EnseignantsDAO();

$id = $_GET['id'];
$modif_ok=0;

if (isset($_POST['modifier'])) {    
    
    $nom=$_POST['nom'];
    $niveau = $_POST['niveau'];
    $modifier = $classeDAO->Edit($nom,$niveau, $id); 

    $modif_ok=1;
}

$classe_modifier = $classeDAO->ShowClasse($id);
$listeEnseignant = $enseignantDAO->EnseignantListe();


$template = "modifier_classe";
include "layout.phtml";

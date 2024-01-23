<?php
require('../models/DatabaseAdmin.php'); 
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$enseignant = new EnseignantsDAO();

$enseignants = $enseignant->EnseignantListByClasse();

$Sessionenseignant = 0;

if(isset($_GET['del'])) {

    $id = htmlspecialchars($_GET['del']);

    if($_SESSION['enseignant_id'] != $id) {

        $enseignant->DeleteEnseignant($_GET['del']);
       
        header("location:enseignant_liste.php");
    }else {
        $Sessionenseignant = 1;
    }
}

$template = 'enseignant_liste';
include 'layout.phtml';

?>
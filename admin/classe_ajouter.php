<?php
require('../models/DatabaseAdmin.php');
require('../models/enseignant.php');
require('../models/enseignantDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');


$classeDAO = new ClasseDAO();
$enseignantDAO = new EnseignantsDAO();

$ajout_ok = 0;

if(isset($_POST['ajouter'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $niveau = htmlspecialchars($_POST['niveau']);
    $id_enseignant = $_POST['id_enseignant'];

    $classe= new Classe(0, $_POST['nom'], $_POST['niveau'], $_POST['id_enseignant']);
    $classeDAO->AddClasse($classe);
    $ajout_ok = 1;

}

$listeEnseignant = $enseignantDAO->EnseignantListe();

$template="classe_ajouter";
include "layout.phtml";

?>
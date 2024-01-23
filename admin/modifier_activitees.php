<?php
require('../models/DatabaseAdmin.php');
require('../models/activitees.php');
require('../models/activiteesDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$activiteesDAO = new ActiviteesDAO();
$classeDAO = new ClasseDAO();

$id = $_GET['id'];

$modif_ok = 0;

if (isset($_POST['modifier_activitees'])) {

    $titre = htmlspecialchars($_POST['titreActivitees']);
    $description = htmlspecialchars($_POST['description']);
    $jours = htmlspecialchars($_POST['date']);
    $duree = htmlspecialchars($_POST['duree']);
    $id_classe = htmlspecialchars($_POST['id_classe']);
    $activitees = $activiteesDAO->update($titre, $description,$jours, $duree, $id_classe,$id);

    $modif_ok = 1;
}

$activitees_modifier = $activiteesDAO->selectOne($id);
$listeClasse = $classeDAO->ClasseList();



$template = "modifier_activitees";
include "layout.phtml";

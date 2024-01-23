<?php
require('../models/DatabaseAdmin.php');
require('../models/activitees.php');
require('../models/activiteesDAO.php');
require('../models/infos.php');
require('../models/infosDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');


$activiteesDAO = new ActiviteesDAO();
$infosDAO = new InfosDao;
$classeDAO = new ClasseDAO();

$ajout_ok = 0;



if (isset($_POST['ajouter']) && $_POST['type'] === "activite") {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $jours = htmlspecialchars($_POST['date']);
    $duree = htmlspecialchars($_POST['duree']);
    $id_classe = htmlspecialchars($_POST['id_classe']);
    $activiteeExiste = $activiteesDAO->VerifActivitee($titre, $jours, $id_classe);

    if ($activiteeExiste['count(titreActivitees)'] >= 1 && $activiteeExiste['count(jours)'] >= 1 && $activiteeExiste['count(id_classe)'] >= 1) {
        $ajout_ok = 3;
    } else {
        $activitees = new Activitees(0, $titre, $description, $jours, $duree, $id_classe);
        $activiteesDAO->insert($activitees);
        $ajout_ok = 1;
    }
} 

if (isset($_POST['ajouter']) && $_POST['type'] === "information") {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $jours = htmlspecialchars($_POST['date']);
    $duree = htmlspecialchars($_POST['duree']);
    $id_classe = htmlspecialchars($_POST['id_classe']);
    $infos = new Infos(0, $titre, $description, $id_classe);
    $infosDAO->insert($infos);
    $ajout_ok = 2;
}

$listeClasse = $classeDAO->ClasseList();


$template = "activitees_ajouter";
include "layout.phtml";

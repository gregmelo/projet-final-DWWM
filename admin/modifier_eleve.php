<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');

$classeDAO = new ClasseDAO();
$eleveDAO = new EleveDAO();

$id = $_GET['id'];
$modif_ok = 0;

if (isset($_POST['modifier'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id_classe = $_POST['nom_classe'];
    // $nom_classe = $_POST['nom_classe'];
    // $niveau_classe = $_POST['niveau_classe'];
    $email_primaire = $_POST['email_primaire'];
    $email_secondaire = $_POST['email_secondaire'];
    $modifier = $eleveDAO->EditEleve($nom, $prenom, $email_primaire, $email_secondaire, $id_classe, $id);

    $modif_ok = 1;
}

$eleve_modifier = $eleveDAO->EleveListById($id);
$listeClasse = $classeDAO->ClasseList();


$template = "modifier_eleve";
include "layout.phtml";

<?php
require('../models/DatabaseAdmin.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');


$classeDAO = new ClasseDAO();
$eleveDAO = new EleveDAO();

$ajout_ok = 0;

if(isset($_POST['ajouter'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $emailPrimaire = htmlspecialchars($_POST['emailPrimaire']);
    $emailSecondaire = htmlspecialchars($_POST['emailSecondaire']);
    $id_classe = $_POST['id_classe'];

    $eleve= new Eleve(0, $nom, $prenom, $emailPrimaire,$emailSecondaire,$id_classe);
    $eleveDAO->AddEleve($eleve);
    $ajout_ok = 1;

}

$listeClasse = $classeDAO->ClasseList();

$template="eleve_ajouter";
include "layout.phtml";

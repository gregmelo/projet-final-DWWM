<?php
require('header.php');
require('./models/enfant.php');
require('./models/enfantDAO.php');
require('./models/parent.php');
require('./models/parentDAO.php');
require('./models/classe.php');
require('./models/classeDAO.php');

$enfantDAO = new EnfantDAO;
$classeDAO = new ClasseDAO();
$inscription_ok = 1;
$ajoutenfant=0;

if (isset($_POST['ValiderEnfant'])) {

    $nom=htmlspecialchars($_POST['enfantNom']);
    $prenom=htmlspecialchars($_POST['enfantPrenom']);
    $id_classe=$_POST['enfantClasse'];
    

        //creation de l'objet
        $enfant = new Enfant(0,$nom,$prenom,$id_parent,$id_classe);
        //stockage de l'objet
        $enfantDAO->add($enfant);

    $ajoutenfant=1;
    header("location:index.php?action=accueil");
} else {
    if (isset($_post['AjoutEnfant'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $id_classe = $_POST['enfantClasse'];

        //creation de l'objet
        $enfant = new Enfant(0, $nom, $prenom,$id_parent,$id_classe);
        //stockage de l'objet
        $enfantDAO->add($enfant);

        $ajoutenfant = 1;
        header("location:index.php?action=enfant");
    }
}

$classes = $classeDAO->GetAllClasse();

$template = "./www/ajoutenfant";
include "./www/layout.phtml";
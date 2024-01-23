<?php
require('../models/DatabaseAdmin.php');
require('../models/infos.php');
require('../models/infosDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$infosDAO = new InfosDAO();
$classeDAO = new ClasseDAO();

$id = $_GET['id'];

$modif_ok = 0;

if (isset($_POST['modifier_infos'])) {

    $titreInfos = htmlspecialchars($_POST['titreInfos']);
    $details = htmlspecialchars($_POST['description']);
    $id_classe = htmlspecialchars($_POST['id_classe']);
    $infos = $infosDAO->update($titreInfos, $details, $id_classe, $id);

    $modif_ok = 1;
}

$infos_modifier = $infosDAO->selectOne($id);
$listeClasse = $classeDAO->ClasseList();



$template = "modifier_infos";
include "layout.phtml";

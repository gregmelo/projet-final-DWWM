<?php
require('../models/DatabaseAdmin.php');
require('../models/parent.php');
require('../models/parentDAO.php');

$parentDAO = new ParentDAO();

$id = $_GET['id'];
$modif_ok = 0;

if (isset($_POST['modifier'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $modifier = $parentDAO->Update($nom, $prenom, $email, $id);

    $modif_ok = 1;
}

$parent_modifier = $parentDAO->selectOne($id);


$template = "modifier_parents";
include "layout.phtml";
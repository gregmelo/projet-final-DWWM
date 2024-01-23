<?php
require('../models/DatabaseAdmin.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$eleveDAO = new EleveDAO();
$classeDAO = new ClasseDAO();



if(isset($_GET['id'])){
    
    $id=$_GET['id'];

    $eleveDAO->DeleteEleveById($id);    

    $classeDAO->DeleteClasse($_GET['id']);

    header("location:classe_liste.php");    
}



?>
<?php
require('../models/DatabaseAdmin.php');
require('../models/eleve.php');
require('../models/eleveDAO.php');

$eleveDAO = new EleveDAO();


if(isset($_GET['id'])){
    
    $id=$_GET['id'];

    $eleveDAO->DeleteEleveById($id);    


    header("location:eleve_liste.php");    
}

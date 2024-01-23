<?php
require('../models/DatabaseAdmin.php');
require('../models/parent.php');
require('../models/parentDAO.php');

$parentDAO = new ParentDAO();


if(isset($_GET['id'])){
    
    $id=$_GET['id'];

    $parentDAO->DeleteParentById($id);    


    header("location:parents_liste.php");    
}
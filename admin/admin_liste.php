<?php
require('../models/DatabaseAdmin.php'); 
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

$admin = new AdminDAO();

$administrateurs = $admin->adminListe();

$SessionAdmin = 0;

if(isset($_GET['del'])) {

    $id = htmlspecialchars($_GET['del']);

    if($_SESSION['admin_id'] != $id) {

        $admin->DeleteAdmin($_GET['del']);
       
        header("location:admin_liste.php");
    }else {
        $SessionAdmin = 1;
    }
}

$template = 'admin_liste';
include 'layout.phtml';

?>
<?php

require('../models/DatabaseAdmin.php');
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

$loginAdminDAO = new AdminDAO();

// CONNEXION 

$connexion_error=0;

if (isset($_POST['login'])) {

    $email = ($_POST['email']);
    $pass = ($_POST['password']);

    $admin = $loginAdminDAO->loginAdmin($email);
     //var_dump($admin);
    if (isset($admin['email'])) {
         //var_dump($admin);
         //var_dump($pass);
         //var_dump($pass == $admin['motDePasse']);
        if (password_verify($pass, $admin['motDePasse'])) {
            //if ($pass == $admin['motDePasse']){
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_pass'] = $admin['motDePasse'];
            $_SESSION['admin_email'] = $admin['email'];

            header("location:board.php");
        } 
        else {
            $connexion_error = 1;

        }
    }
}

$template = "index";
include './index.phtml';

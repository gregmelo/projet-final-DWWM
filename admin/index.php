<?php
require('../models/DatabaseAdmin.php');
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

$loginAdminDAO = new AdminDAO();

// Récupérer la valeur de la variable change_password depuis l'URL
//$change_password = isset($_GET['change_password']) ? $_GET['change_password'] : 0;
// CONNEXION 

$connexion_error = 0;

if (isset($_POST['login'])) {

    $email = ($_POST['email']);
    $pass = ($_POST['password']);

    $admin = $loginAdminDAO->loginAdmin($email);

    if (isset($admin['email'])) {
        if (password_verify($pass, $admin['motDePasse'])) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_pass'] = $admin['motDePasse'];
            $_SESSION['admin_email'] = $admin['email'];

            header("location:board.php");
        } else {
            $connexion_error = 1;
        }
    }
}

$template = "index";
include './index.phtml';

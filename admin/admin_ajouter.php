<?php
require('../models/DatabaseAdmin.php');
require('../models/loginAdmin.php');
require('../models/loginAdminDAO.php');

$admin = new AdminDAO();

$ajout_ok = 0;
if (isset($_POST['ajouter'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (!preg_match($regex, $pass)) {
        $ajout_ok = 3; // mot de passe ne respecte pas les critères
    } else {
        $emailExiste = $admin->VerifName($email);

        if ($emailExiste['count(email)'] >= 1) {
            $ajout_ok = 2; // email existe déjà
        } else {
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            $admin->AddAdmin($email, $hashed_pass);

            $ajout_ok = 1; // ajouté avec succès
        }
    }
}

$template = "admin_ajouter";
include "layout.phtml";

<?php
  require('header.php');
  require('./models/loginAdmin.php');
  require('./models/loginAdminDAO.php');

$adminDAO = new AdminDAO;

//Inscription
$inscription_ok=0;
if(isset($_POST['inscription'])){
    //recuperation
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['insPassword']);
    $mailExiste = $adminDAO->VerifName($email);
   
    if($mailExiste['count(email)'] >= 1) {

        $inscription_ok = 2;
  } else {
    $password_h = password_hash($password, PASSWORD_DEFAULT);
    //creation de l'objet
    $admin = new Admin(0, $email, $password_h);
    //stockage de l'objet
    $adminDAO->AddAdmin($email, $password_h);
    
    $inscription_ok = 1;
    header("location:index.php?action=accueil");
  }
}


    $template='./www/admin';
    include './www/layout.phtml';
 ?>
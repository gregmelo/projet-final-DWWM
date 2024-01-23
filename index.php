<?php
$action = filter_input(INPUT_GET,"action");

if($action != null){
    
    switch($action){ 
        case "accueil" :
            include 'controllers/index.php';
            break; 
        case "ecole" :
            include 'controllers/ecole.php';
            break; 
        case "connexion" :
            include 'controllers/login.php';
            break; 
        case "recherche" :
            include 'controllers/recherche.php';
            break; 
        case "actualite" :
            include 'controllers/actualite.php';
            break; 
        case "galerie" :
            include 'controllers/galerie.php';
            break; 
        case "contact" :
            include 'controllers/contact.php';
            break; 
        case "monCompte" :
            include 'controllers/monCompte.php';
            break; 
        case "deconnexion" :
            include 'controllers/deconnexion.php';
            break; 
        case "enfant" :
            include 'controllers/ajoutenfant.php';
            break;
        case "changePassword":
            include 'controllers/changePassword.php';
            break;
        case "mdpOublier":
            include 'controllers/mdpOublier.php';
            break;
    }          
}else {
    include 'controllers/index.php';
}

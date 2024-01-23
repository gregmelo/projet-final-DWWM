<?php
include 'header.php';
include 'select_enfant.php';
require('./models/activitees.php');
require('./models/activiteesDAO.php');
require('./models/infos.php');
require('./models/infosDAO.php');

// Vérifier si l'ID de l'enfant sélectionné est disponible dans la chaîne de requête (query string)
if (isset($_GET['enfant'])) {
    $selected_child_id = $_GET['enfant'];

    // Utiliser l'ID de l'enfant pour récupérer les informations de la classe associée
    $eleveDAO = new EleveDAO();
    $selected_child_info = $eleveDAO->EleveListById($selected_child_id);

    // Instancier les DAO avec l'ID de la classe associée à l'enfant sélectionné
    $activiteesDAO = new ActiviteesDAO();
    $infosDAO = new InfosDAO();

    // Récupérer les activités et les informations en fonction de la classe de l'enfant
    $activites = $activiteesDAO->ActivitesListByClasse($selected_child_info['id_classe']);
    $informations = $infosDAO->InfosListByClasse($selected_child_info['id_classe']);
}

// Définir la template
$template = './www/actualite';
include './www/layout.phtml';

?>



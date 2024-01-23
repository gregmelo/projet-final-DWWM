<?php

require('models/parent.php');
require('models/parentDAO.php');
require('models/eleve.php');
require('models/eleveDAO.php');

$parent_email1 = $_SESSION['login_email'];
$parent_email2 = $_SESSION['login_email'];

$eleveDAO = new EleveDAO();

$eleve_liste_by_parent = $eleveDAO->EleveListByEmailParent($parent_email1, $parent_email2);

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['select_enfant'])) {
        $selected_child_id = $_POST['select_enfant'];

        // Rediriger vers la page actualite.php en envoyant l'ID de l'enfant sélectionné
        header("Location: index.php?action=actualite&enfant=$selected_child_id");
        exit();
    }
}

// Inclure le fichier de vue (select_enfant.phtml)
$template2 = "www/select_enfant";
?>

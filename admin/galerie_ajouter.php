<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$classeDAO = new ClasseDAO();

$listeClasse = $classeDAO->ClasseList();


$ajout_ok = 0;
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la classe et le fichier photo
    $classe = $_POST["nom_classe"];
    $photo = $_FILES["photo"];

    // Vérifier si le fichier a été téléchargé sans erreur
    if ($photo["error"] == UPLOAD_ERR_OK) {
        // Vérifier si le type de fichier est valide
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        $file_type = mime_content_type($photo["tmp_name"]);
        if (in_array($file_type, $allowed_types)) {
            // Vérifier si la taille de fichier est valide (5MB max)
            if ($photo["size"] <= 5000000) {
                // Vérifier si le dossier de destination existe sinon le créer
                $dir = "photos/$classe";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                // Donner les permissions d'écriture à l'utilisateur
                chmod($dir, 0777);

                // Enregistrer le fichier dans le dossier approprié
                if (move_uploaded_file($photo["tmp_name"], $dir . '/' . $photo["name"])) {
                    $ajout_ok = 1;
                } else {
                    $ajout_ok = 2;
                }
            } else {
                $ajout_ok = 3;
            }
        } else {
            $ajout_ok = 4;
        }
    } else {
        $ajout_ok = 2;
    }
}

$template = "galerie_ajouter";
include "layout.phtml";

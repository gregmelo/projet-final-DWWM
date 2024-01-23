<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$classeDAO = new ClasseDAO();
$listeClasse = $classeDAO->ClasseList();

if (isset($_GET['classe'])) {
    $classe = $_GET['classe'];
    $dossierPhotos = 'photos';

    if ($classe) {
        $dossierClasse = $dossierPhotos . '/' . $classe;
        $photos = glob($dossierClasse . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    } else {
        $photos = glob($dossierPhotos . '/*/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['photo'])) {
        $photoASupprimer = $_POST['photo'];
        if (file_exists($photoASupprimer)) {
            unlink($photoASupprimer);
            echo '<p class="alert alert-success">La photo a été supprimée.</p>';
        } else {
            echo '<p class="alert alert-danger">La photo n\'a pas été trouvée.</p>';
        }
    }

    $galerieHtml = '<div class="row mt-4">';
    foreach ($photos as $photo) {
        $photoUrl = '/' . $photo;
        $photoThumbUrl = '/' . str_replace(basename($photo), 'thumb_' . basename($photo), $photo);
        $photoSupprimerUrl = '?classe=' . $classe . '&photo=' . $photo;

        $galerieHtml .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">';
        $galerieHtml .= '<a href="' . $photoUrl . '" target="_blank"><img src="' . $photoThumbUrl . '" class="img-fluid rounded" alt="' . basename($photo) . '"></a>';
        $galerieHtml .= '<form method="post" class="mt-2">';
        $galerieHtml .= '<input type="hidden" name="photo" value="' . $photo . '">';
        $galerieHtml .= '<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
        $galerieHtml .= '</form>';
        $galerieHtml .= '</div>';
    }
    $galerieHtml .= '</div>';
} else {
    $galerieHtml = '<p class="alert alert-info">Sélectionnez une classe pour afficher les photos.</p>';
}

$template = "galerie_liste2";
include "layout.phtml";

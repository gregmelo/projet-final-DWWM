<?php
require('../class/DatabaseAdmin.php');
require('../class/produit.php');
require('../class/produitDAO.php');

$deleteProduit = new ProduitDAO();

if(isset($_GET['id'])){

    $id=$_GET['id'];

    $deleteProduit->Delete($_GET['id']);
    header('location:produit_liste.php');
    
}


include 'layout.phtml';

?>
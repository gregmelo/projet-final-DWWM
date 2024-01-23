<?php
require('../models/DatabaseAdmin.php');
require('../models/activitees.php');
require('../models/activiteesDAO.php');

$activiteesDAO = new ActiviteesDAO();


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $activiteesDAO->delete($id);


    header("location:activitees_liste.php");
}

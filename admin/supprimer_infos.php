<?php
require('../models/DatabaseAdmin.php');
require('../models/infos.php');
require('../models/infosDAO.php');

$infosDAO = new InfosDAO();


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $infosDAO->delete($id);


    header("location:activitees_liste.php");
}

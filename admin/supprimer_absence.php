<?php
require('../models/DatabaseAdmin.php');
require('../models/absence.php');
require('../models/absenceDAO.php');

$absenceDAO = new AbsenceDAO();


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $absenceDAO->DeleteAbsenceById($id);


    header("location:absence_liste.php");
}

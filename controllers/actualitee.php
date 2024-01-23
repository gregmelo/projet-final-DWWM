<?php

include 'header.php';
require('models/enseignant.php');
require('models/enseignantDAO.php');
require('models/parent.php');
require('models/parentDAO.php');
require('models/classe.php');
require('models/classeDAO.php');
require('models/eleve.php');
require('models/eleveDAO.php');
require('models/activitees.php');
require('models/activiteesDAO.php');
require('models/infos.php');
require('models/infosDAO.php');
















//définir la template:
$template = './www/actualitee';
include './www/layout.phtml';
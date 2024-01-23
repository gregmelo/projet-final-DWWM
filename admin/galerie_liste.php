<?php
require('../models/DatabaseAdmin.php');
require('../models/classe.php');
require('../models/classeDAO.php');

$classeDAO = new ClasseDAO();

$listeClasse = $classeDAO->ClasseList();

$template = "galerie_liste";
include "layout.phtml";
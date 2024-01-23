<?php
require('../models/DatabaseAdmin.php');

session_destroy();

header("location:index.php");

?>
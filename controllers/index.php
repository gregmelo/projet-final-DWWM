<?php

include 'header.php';

if (isset( $_SESSION['login_email'])){

include 'select_enfant.php';
}

//definir la template:
$template='www/index';
include 'www/layout.phtml';
?>



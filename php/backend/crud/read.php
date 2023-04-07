<?php 
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();

$_SESSION['crud_option'] = 'read';

header('location: ../../main_admin.php');
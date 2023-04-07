<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Start the session so the variable $_SESSION can be modified
session_start();

// Changes the crud option so when the page refreses itself the read option is going to be shown
$_SESSION['crud_option'] = 'aprendices';

// Redirect the user to the aprendices section
header('location: ../../main_admin.php');
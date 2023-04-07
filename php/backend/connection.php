<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Data of the connection to the database
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'form_censo';

// Database connection
$mysqli = new mysqli($host, $user, $password, $db_name);

// Verifing connection
// if ($mysqli->connect_errno) {
//     echo '
//         <strong>Couldn\'t stablish connection to the database: </strong>
//     ' . $mysqli->connect_error;
//     exit();
// }
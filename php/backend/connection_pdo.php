<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Data of the connection to the database
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'form_censo';

// Database connection
$dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);


// Verifying the connection
// if ($dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS)) {
//     echo 'stablished';
// } else {
//     echo 'error';
// }

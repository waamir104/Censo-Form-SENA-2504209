<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();

// Include the file where the functions to send data are
include('../data_to_another_php.php');

if ($_GET) {
    $num_doc_apr = array(
        'num_doc_apr' => $_GET['num_doc_apr']
    );

    $_SESSION['confirm_update'] = 'active';

    // Send data to a url and redirect the user to the final URL
    send_data_get('http://localhost/formulario-censo/php/messages/crud/confirm_delete.php?', $num_doc_apr);
}
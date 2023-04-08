<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Includes the file where the functions to send data are
include('../data_to_another_php.php');

// Gets the id number of the aprendiz to look for
if ($_GET) {
    $num_doc_apr = array(
        'read_srch_input' => $_GET['num_doc_apr']
    );

    // Start the session so the variable $_SESSION can be modified
    session_start();

    // Changes the crud option so when the page refreses itself the read option is going to be shown
    $_SESSION['crud_option'] = 'read';

    // Calls the function to send data through the get method and redirect to the final URL
    send_data_get('http://localhost/proyectos%20personales/programas%20php/formulario-censo/php/main_admin.php?', $num_doc_apr);
}
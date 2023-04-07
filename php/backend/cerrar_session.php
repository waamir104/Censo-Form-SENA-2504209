<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();

session_destroy();

if (isset($_COOKIE['administrator_session_status'])) {
    setcookie('administrator_session_status', '', time()-60*60, '/');
    setcookie('session_status', 'inactive', time()+60*60*24*365, '/');
}

header('location: ../admin_log_page.php');

?>
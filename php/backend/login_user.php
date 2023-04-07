<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();

include('./connection.php');
include('./data_to_another_php.php');

if ($_POST) {
    // Getting the info inserted 
    $inserted_username = $_POST['user_input'];
    $inserted_password = $_POST['pass_input'];

    // Query
    $query = "SELECT * FROM `admins` WHERE `user` = '$inserted_username' AND `password` = '$inserted_password';";

    // Executing the query
    $continue = true;

    try {
        $results = mysqli_query($mysqli, $query);
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error_login'] = 'active';
        setcookie('error_login_msg', 'active', time() + 60, '/formulario-censo/php/messages/error_login.php');
        header('location: ../messages/error_login.php');
    }

    // Closing the connection
    $mysqli->close();

    if ($continue) {
        if ($results->num_rows == 1) {

            // Cookie to set that the session must be closed when the navegator is close
            setcookie('administrator_session_status', 'active', time() + 60 * 5, '/');
            setcookie('session_status', 'active', time() + 60 * 60 * 24 * 365, '/');

            $_SESSION['crud_option'] = 'aprendices';
            $_SESSION['username'] = $inserted_username;
            header('location: ../main_admin.php');
        } else {
            $option = array(
                'show_error' => true
            );
            setcookie('wrong_login_data', 'true', time() + 5, '/formulario-censo/php/admin_log_page.php');
            send_data_get('http://localhost/formulario-censo/php/admin_log_page.php?', $option);
        }
    }
}

?>
<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();
// Verifies that the error was actually thrown or that the cookie is still alive
if (!isset($_SESSION['double_register']) 
// || !isset($_COOKIE['double_register_msg'])  // Chrome no crea cookies
) {
    session_unset();
    session_destroy();
    // Follows to the index.php file
    header('location: ../index.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <title>Doble Registro</title>

    <!-- Document icon -->
    <link rel="icon" href="../../assets/img/icons/double.ico" type="image/x-icon">

    <style>
        .success_error_button {
            background: #870606;
        }

        #title {
            max-width: 90%;
        }
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/messages/after_styles.css">

    <!-- JS to reload the message page -->
    <script src="../../assets/js/reload_page.js" defer></script>
</head>

<body>
    <form action="../../index.php">
        <h1 id="title">Su número de documento ya se encuentra registrado!!</h1>
        <br>
        <center>
            <p id="description">Comuniquese con su querido Vocero, para solicitar un nuevo envio</p>
            <br>
            <div class="button_container">
                <button type="submit" class="success_error_button">Volver al formulario</button>
            </div>
        </center>
    </form>
</body>

</html>
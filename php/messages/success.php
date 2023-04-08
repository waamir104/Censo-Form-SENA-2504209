<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();
// Verifies that the error was actually thrown
if (!isset($_SESSION['success']) 
// || !isset($_COOKIE['success_msg']) // Chrome no crea cookies
) {
    session_unset();
    session_destroy();
    // Follows to the index.php file
    header('location: ../../index.php');
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
    <title>Registro Exitoso</title>

    <!-- Document icon -->
    <link rel="icon" href="../../assets/img/icons/success.ico" type="image/x-icon">

    <style>
        .success_error_button {
            background: #37af65;
        }

        #title {
            max-width: 70%;
        }
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/messages/after_styles.css">

    <!-- JS to reload the message page -->
    <script src="../../assets/js/reload_page.js" defer></script>
</head>

<body>
    <form action="../../index.php">
        <h1 id="title">Gracias por completar el cuestionario!!</h1>
        <br>
        <center>
            <p id="description">Sus respuestas han sido cargadas exitosamente</p>
            <br>
            <div class="button_container">
                <button type="submit" class="success_error_button">Volver al formulario</button>
            </div>
        </center>
    </form>
</body>

</html>
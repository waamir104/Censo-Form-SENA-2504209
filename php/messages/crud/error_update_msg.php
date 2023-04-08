<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();
// Verifies that the error was actually thrown
if (!isset($_SESSION['error_update']) 
// || !isset($_COOKIE['error_form_msg']) // Chrome no crea cookies
) {
    session_unset();
    session_destroy();
    // Follows to the index.php file
    header('location: ../../main_admin.php');
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
    <title>Error en el Registro</title>

    <!-- Document icon -->
    <link rel="icon" href="../../../assets/img/icons/error.ico" type="image/x-icon">

    <style>
        .success_error_button {
            background: #870606;
        }

        #title {
            max-width: 90%;
        }
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../assets/css/messages/after_styles.css">

</head>

<body>
    <form action="../../backend/crud/redirect_aprendices.php">
        <h1 id="title">Desafortunadamente se presento un Error!!</h1>
        <br>
        <center>
            <p id="description">No se pudo actualizar el registro</p>
            <br>
            <div class="button_container">
                <button type="submit" class="success_error_button">Volver</button>
            </div>
        </center>
    </form>
</body>

</html>
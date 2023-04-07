<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

session_start();

if (isset($_SESSION['username'])) {
    header('location: ./main_admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>

    <!-- Login Icon -->
    <link rel="icon" href="../assets/img/icons/login.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/login_page_styles.css">
    <link rel="stylesheet" href="../assets/css/admin_form_btn.css">

    <!-- Custom JS Script -->
    <script src="../assets/js/login_user.js" defer></script>

    <!-- JS script for the form btn -->
    <script>
        function form_btn() {
            window.location = '../index.php';
        }
    </script>

</head>

<body>

    <button class="admin_form_btn" id="admin_btn" onclick="form_btn()">
        <span id="admin_form_btn_text">FORMULARIO</span>
        <img src="../assets/img/btn_icons/form.png" alt="form_icon" id="admin_form_btn_icon">
    </button>

    <form action="./backend/login_user.php" method="post">
        <h1 id="title">LOGIN</h1>

        <?php
        if ($_GET) {
            if ($_GET['show_error'] == 1 && isset($_COOKIE['wrong_login_data'])) {
                echo '
                    <div id="error_mensaje_container">
                        <p id="error_mensaje">Los datos ingresados son incorrectos</p>
                    </div>
                ';
            }
        }
        ?>

        <div class="form-containers">
            <label for="user_input">
                Usuario
                <input type="text" name="user_input" id="user_input" required>
            </label>
        </div>

        <div class="form-containers">
            <label for="pass_input">
                Contraseña
                <input type="password" name="pass_input" id="pass_input" required>
                <div class="ver_pass_container">
                    <label for="ver_pass">
                        <input type="checkbox" name="ver_pass" id="ver_pass" onclick="verify_check()" class="inline"
                            autocomplete="current-password">
                        Mostrar Contraseña
                    </label>
                </div>
            </label>
        </div>

        <div class="form-containers" id="btn_container">
            <button type="submit">Ingresar</button>
        </div>
    </form>
</body>

</html>
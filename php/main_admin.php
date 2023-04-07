<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Includes de connection file 
include('./backend/connection.php');

// Includes the corresponding files where the functions to show the content are
include('./backend/crud/aprendices_function.php');
include('./backend/crud/read_function.php');
include('./backend/crud/update_function.php');

// Establecer el tiempo de expiración de la sesión a 10 minutos
session_set_cookie_params(60 * 10);

// Start the session
session_start();

// // Cookie to set that the session must be closed when the navegator is close
// setcookie("autoclose_session", "", 0, "/");

// Verify the session
if (isset($_SESSION['username'])) {

    // Verify if the session has expired
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60 * 10)) {
        session_unset();
        session_destroy();
        header('location: ./admin_log_page.php');
    } else {
        // Update the time of the last activity
        $_SESSION['LAST_ACTIVITY'] = time();

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <meta http-equiv="refresh" content="3"> -->
            <title>ADMINISTRADOR</title>

            <!-- Document icon -->
            <link rel="icon" href="../assets/img/icons/admin.ico" type="image/x-icon">

            <!-- Custom CSS -->
            <link rel="stylesheet" href="../assets/css/main_admin_styles.css">

            <!-- JS script for the close session btn -->
            <script>
                function crr_session_btn() {
                    window.location = './backend/cerrar_session.php';
                }

                function form_btn() {
                    window.location = '../index.php';
                }
            </script>

            <!-- JS script for navbar buttons -->
            <script src="../assets/js/crud_options/crud_btns.js" defer></script>

            <!-- JS script for the crud options -->
            <?php
            // Verifies which file to show
            if ($_SESSION['crud_option'] == 'aprendices') {
                echo '
                <!-- Script that sets the option to visualize -->
                <script src="../assets/js/crud_options/aprendices.js" defer></script>    
                ';
            } else if ($_SESSION['crud_option'] == 'read') {
                echo '
                <!-- Script that sets the option to visualize -->
                <script src="../assets/js/crud_options/read.js" defer></script>    
                ';
            } else if ($_SESSION['crud_option'] == 'update') {
                echo '
                <!-- Script that sets the option to visualize -->
                <script src="../assets/js/crud_options/update.js" defer></script>    
                ';
            }
            ?>

            <!-- JS script for the data validation -->
            <script type="module" src="../assets/js/crud_options/update_data_validation.js" defer></script>
        </head>

        <body>

            <button class="crr_session_form_btn" id="form_btn" onclick="form_btn()">
                <span id="form_btn_text">FORMULARIO</span>
                <img src="../assets/img/btn_icons/form.png" alt="form_icon" id="form_btn_icon">
            </button>

            <button class="crr_session_form_btn" id="crr_session_btn" onclick="crr_session_btn()">
                <span id="crr_session_btn_text">CERRAR SESIÓN</span>
                <img src="../assets/img/btn_icons/crr_session.png" alt="close_session_icon" id="crr_session_btn_icon">
            </button>

            <h1 id="title">CRUD Aprendices 2504209</h1>
            <main>
                <nav class="nav_bar">
                    <button id="apr_navbar_btn" class="navbar_btn">Aprendices</button>
                    <button id="rd_navbar_btn" class="navbar_btn">Read</button>
                    <button id="upd_navbar_btn" class="navbar_btn">Update</button>
                </nav>

                <?php
                if ($_SESSION['crud_option'] == 'aprendices') { ?>
                    <div class="info_container" id="aprendices_container">
                        <?php aprendices_content(); ?>
                    </div>
                    <?php
                } else if ($_SESSION['crud_option'] == 'read') { ?>
                        <div class="info_container" id="read_container">
                        <?php read_content(); ?>
                        </div>
                    <?php
                } else if ($_SESSION['crud_option'] == 'update') { ?>
                            <div class="info_container" id="update_container">
                            <?php update_content(); ?>
                            </div>
                    <?php
                } else
                ?>

            </main>
            <footer>

            </footer>
        </body>

        </html>

        <?php
    }

} else {
    session_unset();
    session_destroy();
    header('location: ./admin_log_page.php');
}


?>
<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Setting the session_status cookie
if (!isset($_COOKIE['session_status'])) {
    setcookie('session_status', 'inactive', time() + 60 * 60 * 24 * 365, '/');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censo Aprendices - 2504209</title>

    <!-- Document icon -->
    <link rel="icon" href="./assets/img/icons/form.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/index_styles.css">
    <link rel="stylesheet" href="./assets/css/admin_form_btn.css">

    <!-- JS script to validate data -->
    <script type="module" src="./assets/js/form_data_validation.js" defer></script>

    <!-- JS script for the admin btn -->
    <script>
        function admin_btn() {
            window.location = './php/admin_log_page.php';
        }
    </script>

</head>

<body>

    <button class="admin_form_btn" id="admin_btn" onclick="admin_btn()">
        <span id="admin_form_btn_text">ADMINISTRADOR</span>
        <img src="./assets/img/btn_icons/admin.png" alt="admin_icon" id="admin_form_btn_icon">
    </button>

    <h1 id="title">Censo Aprendices Ficha 2504209</h1>
    <p id="description">Programa de formación Análisis y Desarrollo de Software</p>

    <!-- formulario -->
    <form action="./php/backend/new_register.php" method="post" id="censo_form">
        <!-- Hidden Entrada para enviar fecha y hora de llenado -->
        <input type="hidden" name="time_hidden" value="<?php echo date('Y-m-d H:i:s'); ?>">

        <!-- Entrada nombre -->
        <div class="form-containers">
            <label for="name_input" id="name-label">
                Nombre
                <span class="inline">(Completo)</span>
                <span class="inline">*</span>
                <input type="text" id="name_input" name="name_input" placeholder="Ingresa tu nombre" required spellcheck="false">
            </label>
        </div>

        <!-- Entrada fecha nacimiento -->
        <div class="form-containers">
            <label for="fecha_nac_input" id="fecha_nac-label">
                Fecha de Nacimiento
                <span class="inline">*</span>
                <input type="date" id="fecha_nac_input" name="fecha_nac_input" required>
            </label>
        </div>

        <!-- Entrada edad -->
        <div class="form-containers">
            <label for="edad_input" id="edad-label">
                Edad
                <span class="inline">(Años)</span>
                <input type="text" id="edad_input" name="edad_input" placeholder="00" spellcheck="false">
            </label>
        </div>

        <!-- Entrada Genero -->
        <div class="form-containers">
            <p class="p_text">
                Genero
                <span class="inline">*</span>
            </p>
            <select name="genero_dropdown" id="genero_dropdown" required>
                <option value="" disable selected hidden>Selecciona tu Genero</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <!-- Entrada tipo documento -->
        <div class="form-containers">
            <label for="tipo_doc-dropdown" id="tipo_doc-label">
                Tipo de Documento
                <span class="inline">*</span>
            </label>
            <select name="tipo_doc-dropdown" id="tipo_doc-dropdown" required>
                <option value="" disable selected hidden>Selecciona el tipo de documento</option>
                <option value="CC">Cédula Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="PEP">PEP</option>
                <option value="CE">Cédula Extranjeria</option>
            </select>
        </div>

        <!-- Entrada numero documento de identidad -->
        <div class="form-containers">
            <label for="num_doc_input" id="num_doc-label">
                Número de documento
                <span class="inline">*</span>
                <section id="error_id_msg_apr" class="error hide_error_num_msg">Número mayor a 8 digitos</section>
                <input type="text" id="num_doc_input" name="num_doc_input" placeholder="Ingresa tu número de documento"
                    required spellcheck="false">
            </label>
        </div>

        <!-- Entrada correo -->
        <div class="form-containers">
            <label for="email_input" id="email-label">
                Correo
                <span class="inline">*</span>
                <input type="email" id="email_input" name="email_input" placeholder="Ingresa tu correo" required spellcheck="false">
            </label>
        </div>

        <!-- Entrada telefono aprendiz -->
        <div class="form-containers">
            <label for="num_cell_input" id="num_cell-label">
                Teléfono de contacto del aprendiz
                <span class="inline">*</span>
                <section id="error_cell_msg_apr" class="error hide_error_num_msg">Número teléfonico de 7 o 10 digitos</section>
                <input type="text" id="num_cell_input" name="num_cell_input" placeholder="XXX - XXX - XXXX" 0" required spellcheck="false">
            </label>
        </div>

        <!-- Entrada tipo población -->
        <div class="form-containers">
            <p class="p_text">
                Tipo de población
                <span class="inline">*</span>
            </p>
            <label for="tipo_poblacion-opt1" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" id="tipo_poblacion-opt1" name="tipo_poblacion-radio" class="inline input_radio"
                    value="Afrodescendientes - Raizales - Palenquera">
                Afrodescendientes - Raizales - Palenquera
            </label>
            <label for="tipo_poblacion-opt2" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt2" class="inline input_radio"
                    value="Indígenas">
                Indígenas
            </label>
            <label for="tipo_poblacion-opt3" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt3" class="inline input_radio"
                    value="Persona en situación de Discapacidad">
                Persona en situación de Discapacidad
            </label>
            <label for="tipo_poblacion-opt4" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt4" class="inline input_radio"
                    value="Víctimas">
                Víctimas
            </label>
            <label for="tipo_poblacion-opt5" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt5" class="inline input_radio"
                    value="LGBTI">
                LGBTI
            </label>
            <label for="tipo_poblacion-opt6" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt6" class="inline input_radio"
                    value="Población Rom o Gitano">
                Población Rom o Gitano
            </label>
            <label for="tipo_poblacion-opt7" id="tipo_poblacion-label" class="label-input_check_radio">
                <input type="radio" name="tipo_poblacion-radio" id="tipo_poblacion-opt7" class="inline input_radio"
                    value="N/A" checked>
                Ninguno
            </label>
        </div>

        <!-- Entrada situacion laboral -->
        <div class="form-containers">
            <p class="p_text">
                Situación Laboral
                <span class="inline">*</span>
            </p>
            <label for="s-laboral_radio_opt1" class="label-input_check_radio">
                <input type="radio" value="Empleado" name="s-laboral_radio" id="s-laboral_radio_opt1"
                    class="inline input_radio" checked>
                Empleado
            </label>
            <label for="s-laboral_radio_opt2" class="label-input_check_radio">
                <input type="radio" value="Desempleado" name="s-laboral_radio" id="s-laboral_radio_opt2"
                    class="inline input_radio">
                Desempleado
            </label>
            <label for="s-laboral_radio_opt3" class="label-input_check_radio">
                <input type="radio" value="Buscando empleo" name="s-laboral_radio" id="s-laboral_radio_opt3"
                    class="inline input_radio">
                Buscando empleo
            </label>
            <label for="s-laboral_radio_opt4" class="label-input_check_radio">
                <input type="radio" value="Solo estudio" name="s-laboral_radio" id="s-laboral_radio_opt4"
                    class="inline input_radio">
                Solo estudio
            </label>


        </div>

        <!-- Entrada Direccion residencia -->
        <div class="form-containers">
            <label for="direccion_input" id="direccion-label">
                Dirección de Residencia
                <span class="inline">*</span>
                <input type="text" id="direccion_input" name="direccion_input" placeholder="Ingresa tu dirección"
                    required spellcheck="false">
            </label>
        </div>

        <!-- Entrada estrato -->
        <div class="form-containers">
            <label for="estrato_dropdown" id="estrato-label">
                Estrato
                <span class="inline">*</span>
            </label>
            <select name="estrato_dropdown" id="estrato_dropdown" required>
                <option value="" disable selected hidden>Selecciona tu estrato</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <!-- Entrada medio de transporte -->
        <div class="form-containers">
            <label for="mt_dropdown" id="mt_label">
                Medio de Transporte para transladarse al SENA
                <span class="inline">*</span>
            </label>
            <select name="mt_dropdown" id="mt_dropdown" required>
                <option value="" disable selected hidden>Selecciona un medio de transporte</option>
                <option value="Bicicleta">Bicicleta</option>
                <option value="Transporte público">Transporte público</option>
                <option value="Caminando">Caminando</option>
                <option value="Moto">Moto</option>
                <option value="Carro">Carro</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <!-- Entrada centro de salud -->
        <div class="form-containers">
            <label for="salud_input" id="salud-label">
                Nombre Centro de Salud
                <span class="inline">*</span>
                <input type="text" id="salud_input" name="salud_input"
                    placeholder="Ingresa el nombre de tu centro de salud" required spellcheck="false">
            </label>
        </div>

        <!-- Entrada regimen salud -->
        <div class="form-containers">
            <p class="p_text">
                Regimen
                <span class="inline">*</span>
            </p>
            <label for="regimen_salud_opt1" id="regimen_salud-label" class="label-input_check_radio">
                <input type="radio" name="regimen_salud" id="regimen_salud_opt1" class="input_radio inline"
                    value="subsidiado" checked>
                Subsidiado
            </label>
            <label for="regimen_salud_opt2" id="regimen_salud-label" class="label-input_check_radio">
                <input type="radio" name="regimen_salud" id="regimen_salud_opt2" class="input_radio inline"
                    value="contributivo">
                Contributivo
            </label>
        </div>

        <!-- Entrada tipo sangre -->
        <div class="form-containers">
            <label for="sangre_rh-dropdown" id="sangre_rh-label">
                Tipo de Sangre - RH
                <span class="inline">*</span>
            </label>
            <select name="sangre_rh-dropdown" id="sangre_rh-dropdown" required>
                <option value="" disable selected hidden>Selecciona un RH</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>

        <!-- Entrada alguna enfermedad -->
        <div class="form-containers">
            <p class="p_text">
                ¿Padece alguna enfermedad?
                <span class="inline">*</span>
            </p>
            <label for="padece_enf_radio_opt1" id="padece_enf-label" class="label-input_check_radio">
                <input type="radio" name="padece_enf_radio" id="padece_enf_radio_opt1" class="inline input_radio"
                    value="Si">
                Si
            </label>
            <label for="padece_enf_radio_opt2" id="padece_enf-label" class="label-input_check_radio">
                <input type="radio" name="padece_enf_radio" id="padece_enf_radio_opt2" class="inline input_radio"
                    value="No" checked>
                No
            </label>
        </div>

        <!-- Hidden entrada explicacion, enfermedad = true -->
        <div class="form-containers" id="enf_expli_container">
            <label for="enf_expli_textarea" id="enf_expli-label">
                ¿Cuál?
                <textarea name="enf_expli_textarea" id="enf_expli_textarea" cols="30" rows="5"
                    class="enf_expli_textarea" placeholder="Ingresa la(s) enfermedad(es)" spellcheck="false"></textarea>
            </label>
        </div>

        <!-- Entrada alguna alergia -->
        <div class="form-containers">
            <p class="p_text">
                ¿Alergias?
                <span class="inline">*</span>
            </p>
            <label for="alergia_radio_opt1" id="alergia-label" class="label-input_check_radio">
                <input type="radio" name="alergia_radio" id="alergia_radio_opt1" class="inline input_radio" value="Si">
                Si
            </label>
            <label for="alergia_radio_opt2" id="alergia-label" class="label-input_check_radio">
                <input type="radio" name="alergia_radio" id="alergia_radio_opt2" class="inline input_radio" value="No"
                    checked>
                No
            </label>
        </div>

        <!-- Hidden entrada explicacion, alergia = true -->
        <div class="form-containers" id="alergia_expli_container">
            <label for="alergia_expli_textarea" id="alergia_expli-label">
                ¿Cuál?
                <textarea name="alergia_expli_textarea" id="alergia_expli_textarea" cols="30" rows="5"
                    class="alergia_expli_textarea" placeholder="Ingresa la(s) alergia(s)" spellcheck="false"></textarea>
            </label>
        </div>

        <!-- Entrada contacto 1 -->
        <div class="form-containers">
            <label for="contact_emer_1-nombre">
                Contacto de Emergencia 1
                <span class="inline">*</span>
            </label>
            <input type="text" name="contact_emer_1-nombre" id="contact_emer_1-nombre" placeholder="Ingresa el nombre"
                required spellcheck="false">
            <section id="error_cell_msg_con1" class="error hide_error_num_msg" style="margin-top: 10px;">Número teléfonico de 7 o 10 digitos</section>
            <input type="text" name="contact_emer_1-cell" id="contact_emer_1-cell"
                placeholder="Ingresa el número telefonico" required spellcheck="false">
        </div>

        <!-- Entrada contacto 2 -->
        <div class="form-containers">
            <label for="contact_emer_2-nombre">
                Contacto de Emergencia 2
            </label>
            <input type="text" name="contact_emer_2-nombre" id="contact_emer_2-nombre" placeholder="Ingresa el nombre" spellcheck="false">
            <section id="error_cell_msg_con2" class="error hide_error_num_msg" style="margin-top: 10px;">Número teléfonico de 7 o 10 digitos</section>
            <input type="text" name="contact_emer_2-cell" id="contact_emer_2-cell"
                placeholder="Ingresa el número telefonico" spellcheck="false">
        </div>

        <div class="form-containers">
            <label for="suge_monitoria_textarea">
                Sugerencias Actividades Monitoria
            </label>
            <textarea name="suge_monitoria_textarea" id="suge_monitoria_textarea" cols="30" rows="5"
                class="suge_monitoria_textarea" placeholder="Ingresa tus sugerencias" spellcheck="false"></textarea>
        </div>

        <!-- Form buttons -->
        <div class="form_containers" id="btns_container">
            <button type="submit" id="submit_censo_form">Enviar</button>
            <button type="reset" id="reset_censo_form">Borrar</button>
        </div>

    </form>
    <footer>
        <section id="footer_content">
            <div id="logo_author_container">
                <img src="assets/img/footer/WaamirDev logo.png" alt="WaamirDev Logo">
            </div>
            <hr>
            <div id="social_media_container">
                <a href="https://github.com/waamir104" id="github_logo" target="_blank"><img src="assets/img/footer/GitHub logo.png" alt="Github Logo" class="social_logos"></a>
                <a href="https://www.linkedin.com/in/waamirdev-william-pe%C3%B1a" id="linkedin_logo" target="_blank"><img src="assets/img/footer/LinkedIn logo.png" alt="LinkedIn Logo" class="social_logos"></a>
            </div>
            <div id="copyright_container">
                <p>&#169 Copyright 2023 WaamirDev. All rights Reserved</p>
                <p>All individual works are copyright protected by their owners & contributors</p>
            </div>
        </section>
    </footer>
</body>

</html>
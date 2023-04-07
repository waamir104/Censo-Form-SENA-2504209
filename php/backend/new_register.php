<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

include_once('./connection_pdo.php');
include('./validate_functions.php');

session_start();


if ($_POST) {
    // Hidden data
    $time_register = $_POST['time_hidden'];

    // Required inputs data type str
    $genero = $_POST['genero_dropdown'];
    $tipo_doc = $_POST['tipo_doc-dropdown'];
    $tipo_poblacion = $_POST['tipo_poblacion-radio'];
    $situa_laboral = $_POST['s-laboral_radio'];
    $medio_transp = $_POST['mt_dropdown'];
    $regimen_salud = $_POST['regimen_salud'];
    $sangre_rh = $_POST['sangre_rh-dropdown'];
    $padece_enfer = $_POST['padece_enf_radio'];
    $alergias = $_POST['alergia_radio'];
    $estrato = $_POST['estrato_dropdown'];

    // Trimming required input values
    $nombre = trim_value('name_input');
    $correo = trim_value('email_input');
    $direccion = trim_value('direccion_input');
    $centro_salud = trim_value('salud_input');
    $contact_1_nombre = trim_value('contact_emer_1-nombre');

    // Required data from str to int
    $num_doc_aprendiz = string_to_int('num_doc_input');
    $telefono_apr = string_to_int('num_cell_input');
    $contact_1_cell = string_to_int('contact_emer_1-cell');

    // Required data changing format
    $fecha_nac = $_POST['fecha_nac_input'];
    $fecha_nac = date('Y-m-d', strtotime($fecha_nac));


    // Optional data type str or NULL and trimming
    $enfer_explic = validate_value('enf_expli_textarea');
    $contact_2_nombre = validate_value('contact_emer_2-nombre');
    $alerg_explic = validate_value('alergia_expli_textarea');
    $sug_activ_monitoria = validate_value('suge_monitoria_textarea');

    // Optional data from str to int or NULL
    $edad = validate_number('edad_input');
    $contact_2_cell = validate_number('contact_emer_2-cell');

    // Query to verify that there's no other register with the same id
    $query_vdr = $dbh->prepare('SELECT * FROM `aprendiz` WHERE `num_doc_apr` = :num_doc');

    // Binding the data for the VDR query
    $query_vdr->bindParam(':num_doc', $num_doc_aprendiz, PDO::PARAM_INT);

    // Executing the VDR query
    $query_vdr->execute();

    // Getting the results of the query
    $result = $query_vdr->fetchAll();

    // Counting the rows returned by the VDR query
    $num_rows = count($result);

    // Verifying if there's already a register with the same id
    if ($num_rows != 0) {
        $_SESSION['double_register'] = 'active';
        setcookie('double_register_msg', 'active', time() + 60, '/formulario-censo/php/messages/double_register.php');
        header('location: ../messages/double_register.php');
        die();
    } else {
        // Preparing the query
        $query_nr = $dbh->prepare("INSERT INTO `aprendiz` (`date_registro`, `num_doc_apr`,`tipo_doc`, `nom_completo`,`fecha_nac`,`edad`,`genero`,`correo`,`num_cell_apr`,`tipo_poblacion`,`situa_laboral`,`direccion`,`estrato`,`medio_transp`,`salud_nom`,`regimen_salud`,`tipo_sangre`,`enfermedades`,`cual_enfer`,`alergias`,`cual_alerg`,`contacto_1_nom`,`contacto_1_cell`,`contacto_2_nom`,`contacto_2_cell`,`sug_activ_monitorias`) VALUES 
(:register_date,
:num_doc,
:tipo_doc,
:nom_completo,
:fecha_nac,
:edad,
:genero,
:correo,
:num_cell_apr,
:tipo_poblacion,
:situa_laboral,
:direccion,
:estrato,
:mt,
:salud_nom,
:regimen_salud,
:tipo_sangre,
:enfermedades,
:cual_enfer,
:alergias,
:cual_alerg,
:contact_1_nom,
:contact_1_cell,
:contact_2_nom,
:contact_2_cell,
:sugerencia);");

        $query_nr->bindParam(':register_date', $time_register, PDO::PARAM_STR);
        $query_nr->bindParam(':num_doc', $num_doc_aprendiz, PDO::PARAM_INT);
        $query_nr->bindParam(':tipo_doc', $tipo_doc, PDO::PARAM_STR);
        $query_nr->bindParam(':nom_completo', $nombre, PDO::PARAM_STR);
        $query_nr->bindParam(':fecha_nac', $fecha_nac, PDO::PARAM_STR);
        $query_nr->bindParam(':edad', $edad, PDO::PARAM_INT);
        $query_nr->bindParam(':genero', $genero, PDO::PARAM_STR);
        $query_nr->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query_nr->bindParam(':num_cell_apr', $telefono_apr, PDO::PARAM_INT);
        $query_nr->bindParam(':tipo_poblacion', $tipo_poblacion, PDO::PARAM_STR);
        $query_nr->bindParam(':situa_laboral', $situa_laboral, PDO::PARAM_STR);
        $query_nr->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $query_nr->bindParam(':estrato', $estrato, PDO::PARAM_STR);
        $query_nr->bindParam(':mt', $medio_transp, PDO::PARAM_STR);
        $query_nr->bindParam(':salud_nom', $centro_salud, PDO::PARAM_STR);
        $query_nr->bindParam(':regimen_salud', $regimen_salud, PDO::PARAM_STR);
        $query_nr->bindParam(':tipo_sangre', $sangre_rh, PDO::PARAM_STR);
        $query_nr->bindParam(':enfermedades', $padece_enfer, PDO::PARAM_STR);
        $query_nr->bindParam(':cual_enfer', $enfer_explic, PDO::PARAM_STR);
        $query_nr->bindParam(':alergias', $alergias, PDO::PARAM_STR);
        $query_nr->bindParam(':cual_alerg', $alerg_explic, PDO::PARAM_STR);
        $query_nr->bindParam(':contact_1_nom', $contact_1_nombre, PDO::PARAM_STR);
        $query_nr->bindParam(':contact_1_cell', $contact_1_cell, PDO::PARAM_INT);
        $query_nr->bindParam(':contact_2_nom', $contact_2_nombre, PDO::PARAM_STR);
        $query_nr->bindParam(':contact_2_cell', $contact_2_cell, PDO::PARAM_INT);
        $query_nr->bindParam(':sugerencia', $sug_activ_monitoria, PDO::PARAM_STR);

        // Executing the NR query
        $query_nr->execute();

        // Verifying the success of the NR query
        if ($query_nr) {
            // Success
            $_SESSION['success'] = 'active';
            setcookie('success_msg', 'active', time() + 60, '/formulario-censo/php/messages/success.php');
            header('location: ../messages/success.php');
        } else {
            // Error
            $_SESSION['error_form'] = 'active';
            setcookie('error_form_msg', 'active', time() + 60, '/formulario-censo/php/messages/error_form.php');
            header('location: ../messages/error_form.php');
        }


    }

}
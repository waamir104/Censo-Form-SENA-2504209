<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

include_once('../connection_pdo.php');
include('../validate_functions.php');
include('../data_to_another_php.php');

session_start();

if ($_POST) {
    // No change varibale
    $num_doc_apr = $_POST['num_doc_input'];

    // Required inputs data type str
    $genero = $_POST['genero_dropdown'];
    $tipo_doc = $_POST['tipo_doc-dropdown'];
    $tipo_poblacion = $_POST['tipo_poblacion_radio'];
    $situa_laboral = $_POST['s-laboral_radio'];
    $medio_transp = $_POST['mt_dropdown'];
    $regimen_salud = $_POST['regimen_salud'];
    $sangre_rh = $_POST['sangre_rh-dropdown'];
    $padece_enfer = $_POST['padece_enfer'];
    $alergias = $_POST['alergias'];
    $estrato = $_POST['estrato_dropdown'];

    // Trimming required input values
    $nombre = trim_value('name_input');
    $correo = trim_value('email_input');
    $direccion = trim_value('direccion_input');
    $centro_salud = trim_value('salud_input');
    $contact_1_nombre = trim_value('contact_emer_1-nombre');

    // Required data from str to int
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

    // Preparing the UP query
    // Updating a register from the table ´aprendiz´

    $query_up = $dbh->prepare("UPDATE `aprendiz`
                                SET `tipo_doc` = :tipo_doc,
                                `nom_completo` = :nom_completo,
                                `fecha_nac` = :fecha_nac,
                                `edad` = :edad,
                                `genero` = :genero,
                                `correo` = :correo,
                                `num_cell_apr` = :num_cell_apr,
                                `tipo_poblacion` = :tipo_poblacion,
                                `situa_laboral` = :situa_laboral,
                                `direccion` = :direccion,
                                `estrato` = :estrato,
                                `medio_transp` = :mt,
                                `salud_nom` = :salud_nom,
                                `regimen_salud` = :regimen_salud,
                                `tipo_sangre` = :tipo_sangre,
                                `enfermedades` = :enfermedades,
                                `cual_enfer` = :cual_enfer,
                                `alergias` = :alergias,
                                `cual_alerg` = :cual_alerg,
                                `contacto_1_nom` = :contact_1_nom,
                                `contacto_1_cell` = :contact_1_cell,
                                `contacto_2_nom` = :contact_2_nom,
                                `contacto_2_cell` = :contact_2_cell,
                                `sug_activ_monitorias` = :sugerencia
                                WHERE `num_doc_apr` = :num_doc
                                ");

    // Binding the date for the UP query
    $query_up->bindParam(':tipo_doc', $tipo_doc, PDO::PARAM_STR);
    $query_up->bindParam(':nom_completo', $nombre, PDO::PARAM_STR);
    $query_up->bindParam(':fecha_nac', $fecha_nac, PDO::PARAM_STR);
    $query_up->bindParam(':edad', $edad, PDO::PARAM_INT);
    $query_up->bindParam(':genero', $genero, PDO::PARAM_STR);
    $query_up->bindParam(':correo', $correo, PDO::PARAM_STR);
    $query_up->bindParam(':num_cell_apr', $telefono_apr, PDO::PARAM_INT);
    $query_up->bindParam(':tipo_poblacion', $tipo_poblacion, PDO::PARAM_STR);
    $query_up->bindParam(':situa_laboral', $situa_laboral, PDO::PARAM_STR);
    $query_up->bindParam(':direccion', $direccion, PDO::PARAM_STR);
    $query_up->bindParam(':estrato', $estrato, PDO::PARAM_STR);
    $query_up->bindParam(':mt', $medio_transp, PDO::PARAM_STR);
    $query_up->bindParam(':salud_nom', $centro_salud, PDO::PARAM_STR);
    $query_up->bindParam(':regimen_salud', $regimen_salud, PDO::PARAM_STR);
    $query_up->bindParam(':tipo_sangre', $sangre_rh, PDO::PARAM_STR);
    $query_up->bindParam(':enfermedades', $padece_enfer, PDO::PARAM_STR);
    $query_up->bindParam(':cual_enfer', $enfer_explic, PDO::PARAM_STR);
    $query_up->bindParam(':alergias', $alergias, PDO::PARAM_STR);
    $query_up->bindParam(':cual_alerg', $alerg_explic, PDO::PARAM_STR);
    $query_up->bindParam(':contact_1_nom', $contact_1_nombre, PDO::PARAM_STR);
    $query_up->bindParam(':contact_1_cell', $contact_1_cell, PDO::PARAM_INT);
    $query_up->bindParam(':contact_2_nom', $contact_2_nombre, PDO::PARAM_STR);
    $query_up->bindParam(':contact_2_cell', $contact_2_cell, PDO::PARAM_INT);
    $query_up->bindParam(':sugerencia', $sug_activ_monitoria, PDO::PARAM_STR);
    $query_up->bindParam(':num_doc', $num_doc_apr, PDO::PARAM_INT);

    // Executing the UP query
    $query_up->execute();

    // Verifying the success of the query
    if ($query_up) {
        $num_doc_apr = array(
            'num_doc_apr' => $num_doc_apr
        );

        // Redirect the user to the read section with the updated register
        send_data_get('http://localhost/formulario-censo/php/backend/crud/redirect_read.php?', $num_doc_apr);
        die();
    } else {
        $_SESSION['error_update'] = 'active';
        setcookie('error_update_msg', 'active', time() + 60, '/formulario-censo/php/messages/error_form.php');
        header('location: ../../messages/crud/error_update_msg.php');
        die();
    }
}
<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Function to display the update content
function update_content()
{ 
    
    include('./backend/connection.php');
    include('./backend/crud/verify_select_function.php');
    ?>

<div id="srch_container">
    <div>
        <h1 style="color: rgb(50, 32, 180);">Busqueda de Aprendiz</h1>
    </div>
    <form action="" method="get">
        <input type="text" name="update_srch_input" id="update_srch_input" placeholder="Ingrese el documento">
        <button type="submit" id="update_srch_btn">Buscar</button>
    </form>
</div>
<div id="iapr_info_container">

    <?php
    if ($_GET) {
        if (isset($_GET['update_srch_input'])) {
            $num_doc = (int) $_GET['update_srch_input'];

            $query = $mysqli->prepare("SELECT * FROM `aprendiz` WHERE `num_doc_apr` = ?");

            try {
                $query->bind_param('i', $num_doc);
            } catch (ArgumentCountError $e) {
                // message error
            }

            try {
                $query->execute();
            } catch (mysqli_sql_exception $e) {
                // message error
            }

            $result = $query->get_result();

            // Close database connection
            $mysqli->close();

            if ($result->num_rows == 1) {
                $register = $result->fetch_array();
                ?>
                <form action="./backend/crud/update_register.php" method="post" id="update_form">

                    <table id="read_apr_info_table">
                        <tbody>
                            <tr class="register_row">
                                <th>Fecha de Registro <span style="color: #f00;">*</span></th>
                                <td><input class="blocked" type="text" style="color: gray;" value="<?php echo $register['date_registro'] ?>" readonly required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Nombre Completo <span style="color: #f00;">*</span></th>
                                <td><input name="name_input" id="name_input" type="text" value="<?php echo $register['nom_completo'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Tipo de Documento <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="tipo_doc-dropdown" id="tipo_doc-dropdown" required>
                                        <option value="" disable selected hidden>Selecciona el tipo de documento</option>
                                        <?php if ($register['tipo_doc'] == 'CC') { echo 'selected'; } ?>
                                        <option value="CC" <?php verify_select_value($register['tipo_doc'], 'CC') ?>>Cédula Ciudadanía</option>
                                        <option value="TI" <?php verify_select_value($register['tipo_doc'], 'TI') ?>>Tarjeta de Identidad</option>
                                        <option value="PEP" <?php verify_select_value($register['tipo_doc'], 'PEP') ?>>PEP</option>
                                        <option value="CE" <?php verify_select_value($register['tipo_doc'], 'CE') ?>>Cédula Extranjeria</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Número de Documento <span style="color: #f00;">*</span></th>
                                <td><input class="blocked" name="num_doc_input" id="num_doc_input" type="text" style="color: gray;" value="<?php echo $register['num_doc_apr'] ?>" readonly required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Fecha de Nacimiento <span style="color: #f00;">*</span></th>
                                <td><input name="fecha_nac_input" id="date_input" type="date" value="<?php echo $register['fecha_nac'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Edad</th>
                                <td><input name="edad_input" id="edad_input" type="text" value="<?php echo $register['edad'] ?>"></td>
                            </tr>
                            <tr class="register_row">
                                <th>Genero <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="genero_dropdown" id="genero_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona tu Genero</option>
                                        <option value="Masculino" <?php verify_select_value($register['genero'], 'Masculino') ?>>Masculino</option>
                                        <option value="Femenino" <?php verify_select_value($register['genero'], 'Femenino') ?>>Femenino</option>
                                        <option value="Otro" <?php verify_select_value($register['genero'], 'Otro') ?>>Otro</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Correo <span style="color: #f00;">*</span></th>
                                <td><input name="email_input" id="email_input" type="text" value="<?php echo $register['correo'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Número de Celular <span style="color: #f00;">*</span></th>
                                <td>
                                    <section id="error_cell_msg_apr" class="hide_error_num_msg" style="color: #f00;">Número teléfonico de 7 o 10 digitos</section>
                                    <input name="num_cell_input" id="num_cell_input" type="text" value="<?php echo $register['num_cell_apr'] ?>" required>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Tipo de Población <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="tipo_poblacion_radio" id="tipo_poblacion_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona tu Poblacion</option>
                                        <option value="Afrodescendientes - Raizales - Palenquera" <?php verify_select_value($register['tipo_poblacion'], 'Afrodescendientes - Raizales - Palenquera') ?>>Afrodescendientes - Raizales - Palenquera</option>
                                        <option value="Indígenas" <?php verify_select_value($register['tipo_poblacion'], 'Indígenas') ?>>Indígenas</option>
                                        <option value="Persona en situación de Discapacidad" <?php verify_select_value($register['tipo_poblacion'], 'Persona en situación de Discapacidad') ?>>Persona en situación de Discapacidad</option>
                                        <option value="Víctimas" <?php verify_select_value($register['tipo_poblacion'], 'Víctimas') ?>>Víctimas</option>
                                        <option value="LGBTIQ+" <?php verify_select_value($register['tipo_poblacion'], 'LGBTIQ+') ?>>LGBTIQ+</option>
                                        <option value="Población Rom o Gitano" <?php verify_select_value($register['tipo_poblacion'], 'Población Rom o Gitano') ?>>Población Rom o Gitano</option>
                                        <option value="N/A" <?php verify_select_value($register['tipo_poblacion'], 'N/A') ?>>Ninguna</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Situación Laboral <span style="color: #f00;">*</span></th>
                                <td>
                                <select name="s-laboral_radio" id="s-laboral_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona tu Situación Laboral</option>
                                        <option value="Empleado" <?php verify_select_value($register['situa_laboral'], 'Empleado') ?>>Empleado</option>
                                        <option value="Desempleado" <?php verify_select_value($register['situa_laboral'], 'Desempleado') ?>>Desempleado</option>
                                        <option value="Buscando empleo" <?php verify_select_value($register['situa_laboral'], 'Buscando empleo') ?>>Buscando Empleo</option>
                                        <option value="Solo estudio" <?php verify_select_value($register['situa_laboral'], 'Solo estudio') ?>>Solo estudio</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Dirección <span style="color: #f00;">*</span></th>
                                <td><input name="direccion_input" id="direccion_input" type="text" value="<?php echo $register['direccion'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Estrato <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="estrato_dropdown" id="estrato_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona tu estrato</option>
                                        <option value="1" <?php verify_select_value($register['estrato'], '1') ?>>1</option>
                                        <option value="2" <?php verify_select_value($register['estrato'], '2') ?>>2</option>
                                        <option value="3" <?php verify_select_value($register['estrato'], '3') ?>>3</option>
                                        <option value="4" <?php verify_select_value($register['estrato'], '4') ?>>4</option>
                                        <option value="5" <?php verify_select_value($register['estrato'], '5') ?>>5</option>
                                        <option value="6" <?php verify_select_value($register['estrato'], '6') ?>>6</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Medio de Transporte <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="mt_dropdown" id="mt_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona un medio de transporte</option>
                                        <option value="Bicicleta" <?php verify_select_value($register['medio_transp'], 'Bicicleta') ?>>Bicicleta</option>
                                        <option value="Transporte público" <?php verify_select_value($register['medio_transp'], 'Transporte público') ?>>Transporte público</option>
                                        <option value="Caminando" <?php verify_select_value($register['medio_transp'], 'Caminando') ?>>Caminando</option>
                                        <option value="Moto" <?php verify_select_value($register['medio_transp'], 'Moto') ?>>Moto</option>
                                        <option value="Carro" <?php verify_select_value($register['medio_transp'], 'Carro') ?>>Carro</option>
                                        <option value="Otro" <?php verify_select_value($register['medio_transp'], 'Otro') ?>>Otro</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Centro de Salud <span style="color: #f00;">*</span></th>
                                <td><input name="salud_input" id="salud_input" type="text" value="<?php echo $register['salud_nom'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Regimén de Servicio de Salud <span style="color: #f00;">*</span></th>
                                <td>
                                <select name="regimen_salud" id="regimen_dropdown" required>
                                        <option value="" disable selected hidden>Selecciona tu Regimen</option>
                                        <option value="Subsidiado" <?php verify_select_value($register['regimen_salud'], 'Subsidiado') ?>>Subsidiado</option>
                                        <option value="Contributivo" <?php verify_select_value($register['regimen_salud'], 'Contributivo') ?>>Contributivo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Tipo de Sangre y RH <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="sangre_rh-dropdown" id="sangre_rh-dropdown" required>
                                        <option value="" disable selected hidden>Selecciona un RH</option>
                                        <option value="O+" <?php verify_select_value($register['tipo_sangre'], 'O+') ?>>O+</option>
                                        <option value="O-" <?php verify_select_value($register['tipo_sangre'], 'O-') ?>>O-</option>
                                        <option value="A+" <?php verify_select_value($register['tipo_sangre'], 'A+') ?>>A+</option>
                                        <option value="A-" <?php verify_select_value($register['tipo_sangre'], 'A-') ?>>A-</option>
                                        <option value="B+" <?php verify_select_value($register['tipo_sangre'], 'B+') ?>>B+</option>
                                        <option value="B-" <?php verify_select_value($register['tipo_sangre'], 'B-') ?>>B-</option>
                                        <option value="AB+" <?php verify_select_value($register['tipo_sangre'], 'AB+') ?>>AB+</option>
                                        <option value="AB-" <?php verify_select_value($register['tipo_sangre'], 'AB-') ?>>AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>¿Padece enfermedades? <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="padece_enfer" id="padece_enfer" required>
                                        <option value="" disable selected hidden>Selecciona tu respuesta</option>
                                        <option value="Si" <?php verify_select_value($register['enfermedades'], 'Si') ?>>Si</option>
                                        <option value="No" <?php verify_select_value($register['enfermedades'], 'No') ?>>No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Complementación Enfermedades</th>
                                <td><textarea name="enf_expli_textarea" cols="50" rows="4" style="resize: none;"><?php echo $register['cual_enfer'] ?></textarea></td>
                            </tr>
                            <tr class="register_row">
                                <th>¿Alergias? <span style="color: #f00;">*</span></th>
                                <td>
                                    <select name="alergias" id="alergias" required>
                                        <option value="" disable selected hidden>Selecciona tu respuesta</option>
                                        <option value="Si" <?php verify_select_value($register['alergias'], 'Si') ?>>Si</option>
                                        <option value="No" <?php verify_select_value($register['alergias'], 'No') ?>>No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Complementación Alergias</th>
                                <td><textarea name="alergia_expli_textarea" cols="50" rows="4" style="resize: none;"><?php echo $register['cual_alerg'] ?></textarea></td>
                            </tr>
                            <tr class="register_row">
                                <th>Nombre Contacto de Emergencia 1 <span style="color: #f00;">*</span></th>
                                <td><input name="contact_emer_1-nombre" id="contact_emer_1-nombre" type="text" value="<?php echo $register['contacto_1_nom'] ?>" required></td>
                            </tr>
                            <tr class="register_row">
                                <th>Número Contacto de Emergencia 1 <span style="color: #f00;">*</span></th>
                                <td>
                                    <section id="error_cell_msg_con1" class="hide_error_num_msg" style="color: #f00;">Número teléfonico de 7 o 10 digitos</section>
                                    <input name="contact_emer_1-cell" id="contact_emer_1-cell" type="text" value="<?php echo $register['contacto_1_cell'] ?>" required>
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Nombre Contacto de Emergencia 2</th>
                                <td><input name="contact_emer_2-nombre" id="contact_emer_2-nombre" type="text" value="<?php echo $register['contacto_2_nom'] ?>"></td>
                            </tr>
                            <tr class="register_row">
                                <th>Número Contacto de Emergencia 2</th>
                                <td>
                                    <section id="error_cell_msg_con2" class="hide_error_num_msg" style="color: #f00;">Número teléfonico de 7 o 10 digitos</section>
                                    <input name="contact_emer_2-cell" id="contact_emer_2-cell" type="text" value="<?php echo $register['contacto_2_cell'] ?>">
                                </td>
                            </tr>
                            <tr class="register_row">
                                <th>Sugerencias Actividades Monitorias</th>
                                <td><textarea name="suge_monitoria_textarea" id="" cols="50" rows="4" style="resize: none;" readonly><?php echo $register['sug_activ_monitorias'] ?></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="btns_update_container">
                        <input class="update_btns" id="save_btn" type="submit" value="Guardar">
                        <input class="update_btns" id="cancel_btn" type="button" value="Cancelar">
                    </div>
                </form>
                <?php
            } else { ?>
                <center>No se encontraron registros de aprendices</center>
                <?php
            }

        }
    }
    ?>
</div>
<?php
}
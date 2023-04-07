<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Function to display the read content
function read_content()
{

    include('./backend/connection.php');
    ?>

            <div id="srch_container">
                <div>
                    <h1 style="color: rgb(50, 32, 180);">Busqueda de Aprendiz</h1>
                </div>
                <!-- Redirects the form inserted in the input to this file -->
                <form action="" method="get">
                    <input type="text" name="read_srch_input" id="read_srch_input" placeholder="Ingrese el documento">
                    <button type="submit" id="read_srch_btn">Buscar</button>
                </form>
            </div>
            <div id="iapr_info_container">

                <?php
                if ($_GET) {
                    if (isset($_GET['read_srch_input'])) {
                        $num_doc = (int) $_GET['read_srch_input'];

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
                            <table id="read_apr_info_table">
                                <tbody>
                                    <tr class="register_row">
                                        <th>Fecha de Registro <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['date_registro'] ?>" tabindex="-1" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Nombre Completo <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['nom_completo'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Número de Documento <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['num_doc_apr'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Tipo de Documento <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['tipo_doc'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Fecha de Nacimiento <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['fecha_nac'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Edad</th>
                                        <td><input class="blocked" type="text" style="color: gray;" value="<?php echo $register['edad'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Genero <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['genero'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Correo <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['correo'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Número de Celular <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['num_cell_apr'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Tipo de Población <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php if ($register['tipo_poblacion'] == 'N/A') { echo 'Ninguna'; } else { echo $register['tipo_poblacion']; } ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Situación Laboral <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['situa_laboral'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Dirección <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['direccion'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Estrato <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['estrato'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Medio de Transporte <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['medio_transp'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Centro de Salud <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['salud_nom'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Regimén de Servicio de Salud <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['regimen_salud'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Tipo de Sangre y RH <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['tipo_sangre'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>¿Padece enfermedades? <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['enfermedades'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Complementación Enfermedades</th>
                                        <td><textarea class="blocked" cols="50" rows="4" style="resize: none; color: gray;" readonly><?php echo $register['cual_enfer'] ?></textarea></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>¿Alergias? <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['alergias'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Complementación Alergias</th>
                                        <td><textarea class="blocked" cols="50" rows="4" style="resize: none; color: gray;" readonly><?php echo $register['cual_alerg'] ?></textarea></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Nombre Contacto de Emergencia 1 <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['contacto_1_nom'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Número Contacto de Emergencia 1 <span style="color: #f00;">*</span></th>
                                        <td><input class="blocked"  type="text" style="color: gray;" value="<?php echo $register['contacto_1_cell'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Nombre Contacto de Emergencia 2</th>
                                        <td><input class="blocked" type="text" style="color: gray;" value="<?php echo $register['contacto_2_nom'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Número Contacto de Emergencia 2</th>
                                        <td><input class="blocked" type="text" style="color: gray;" value="<?php echo $register['contacto_2_cell'] ?>" readonly></td>
                                    </tr>
                                    <tr class="register_row">
                                        <th>Sugerencias Actividades Monitorias</th>
                                        <td><textarea class="blocked" cols="50" rows="4" style="resize: none; color: gray;" readonly><?php echo $register['sug_activ_monitorias'] ?></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
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
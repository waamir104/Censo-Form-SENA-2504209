<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Function to display the aprendices content
function aprendices_content()
{

    include('./backend/connection.php');
    
    $query = "SELECT `date_registro`, `tipo_doc`,`num_doc_apr`, `nom_completo` FROM `aprendiz`
                -- WHERE `num_doc_apr` = 9999999999999999;
                ";

    $results = mysqli_query($mysqli, $query);

    // Close database connection
    $mysqli->close();
    
    if ($results->num_rows == 0) { ?>
        <center>No se encontraron registros de aprendices</center>
        <?php
    } else if ($results->num_rows > 0) {
        ?>
        <div style="display: flex; flex-direction: row; justify-content: space-between; padding-bottom: 30px;">
            <h1 style="color: rgb(50, 32, 180);">Listado de Aprendices</h1>
            <span style="color: #000; padding-bottom: 20px;"><strong>Registros</strong>: <?php echo $results->num_rows ?></p>
        </div>
            <table id="apr_results_table">
                <thead>
                    <tr>
                        <th class="th_title">Fecha Registro</th>
                        <th class="th_title t_num_docu">Tipo Documento</th>
                        <th class="th_title t_num_docu">Número de documento</th>
                        <th class="th_title nomb_comp_f_regis">Nombre Completo</th>
                        <th colspan="2" class="th_title opt_width">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">
                            <hr style="border: 1.5px solid #000;">
                        </td>
                    </tr>
                    <?php
                    while ($register = $results->fetch_array()) { ?>
                        <tr class="register_row">
                            <td>
                            <?php echo $register['date_registro']; ?>
                            </td>
                            <td>
                            <?php echo $register['tipo_doc']; ?>
                            </td>
                            <td>
                                <a href="http://localhost/formulario-censo/php/backend/crud/redirect_read.php?num_doc_apr=<?php echo $register['num_doc_apr']; ?>" id="num_doc_anchor">
                                <?php echo $register['num_doc_apr']; ?>
                                </a>
                            
                            </td>
                            <td>
                            <?php echo $register['nom_completo']; ?>
                            </td>
                            <td>
                                <a href="http://localhost/formulario-censo/php/backend/crud/redirect_update.php?num_doc_apr=<?php echo $register['num_doc_apr']; ?>" class="crud_anchor_opt">
                                    <img src="../assets/img/crud_icons/edit.png" alt="edit_icon" class="crud_opt_icons">
                                </a>
                            </td>
                            <td>
                                <a href="http://localhost/formulario-censo/php/backend/crud/redirect_delete.php?num_doc_apr=<?php echo $register['num_doc_apr']; ?>" class="crud_anchor_opt">
                                    <img src="../assets/img/crud_icons/delete.png" alt="delete_icon" class="crud_opt_icons">
                                </a>
                            </td>
                            <!-- <td><?php ?></td> -->
                        </tr>
                        <tr>
                            <td colspan="6">
                                <hr style="border: 0.5px solid rgba(0, 0, 0, 0.2);">
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
    }

}
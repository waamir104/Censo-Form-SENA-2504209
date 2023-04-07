<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

include('../../backend/connection.php');

session_start();
// Verifies that the error was actually thrown
if (!isset($_SESSION['confirm_update']) 
// || !isset($_COOKIE['confirm_update_msg']) // Chrome no crea cookies
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
    <title>Confirmar Update</title>

    <!-- Document icon -->
    <link rel="icon" href="../../../assets/img/icons/update_conf.ico" type="image/x-icon">

    <style>
        .confirm_btn {
            background: #37af65;
        }

        .cancel_btn {
            background: #800202;
        }

        #title {
            max-width: 90%;
        }

        table{
            background: #fff;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        table > * {
            color: #000;
        }

        th {
            width: 300px;
        }

        tr{
            height: 30px;
            text-align: center;
        }
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../assets/css/messages/after_styles.css">

</head>

<body>
    <main id="mymain">
        <h1 id="title">Confirmar Delete!!</h1>
        <br>
        <center>
            <p id="description" style="margin-bottom: 10px;">Por favor confirma que quieres borrar el registro</p>
            <br>

            <div class="register_container">
                <table>
                    <thead>
                        <tr>
                            <th>Tipo Documento</th>
                            <th>Número de documento</th>
                            <th>Nombre Completo</th>
                        </tr>
                        <tr style="height: 5px;">
                            <th colspan="3">
                                <hr style="border: 1.5px solid #000;">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num_doc = $_GET['num_doc_apr'];

                        $query = $mysqli->prepare("SELECT `tipo_doc`, `num_doc_apr`, `nom_completo` FROM `aprendiz` WHERE `num_doc_apr` = ?");

                        $query->bind_param('i', $num_doc);

                        $query->execute();

                        $result = $query->get_result();

                        $register = $result->fetch_assoc();

                        $query->close();
                        ?>

                        <tr>
                            <td><?php echo $register['tipo_doc'] ?></td>
                            <td><?php echo $register['num_doc_apr'] ?></td>
                            <td><?php echo $register['nom_completo'] ?></td>
                        </tr>
                        <tr style="height: 5px;">
                            <th colspan="3">
                                <hr style="border: 1.5px solid gray;">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="button_container" style="width: 70%;">
                <form action="../../backend/crud/delete_register.php" method="post" style="padding: 0; background: unset; width: 300px;">
                    <input type="hidden" name="num_doc_apr" value="<?php echo $register['num_doc_apr'] ?>">
                    <input type="submit" value="Confirmar" class="success_error_button confirm_btn" style="width: 200px">
                </form>
                <form  action="../../backend/crud/redirect_aprendices.php" style="padding: 0; background: unset; width: 300px;">
                    <input type="submit" value="Cancelar" style="width: 200px" class=" cancel_btn success_error_button">
                </form>
            </div>
        </center>   
    </main>
</body>

</html>
<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

include('../connection.php');

if ($_POST) {
    $num_doc = $_POST['num_doc_apr'];

    $query = $mysqli->prepare("DELETE FROM `aprendiz` WHERE `num_doc_apr` = ?");

    $query->bind_param('i', $num_doc);

    $query->execute();

    header('location: ./redirect_aprendices.php');
}
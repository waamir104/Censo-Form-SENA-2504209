<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023
function verify_select_value($bd_value, $value) {
    if ($bd_value == $value) {
        echo 'selected';
    }
}
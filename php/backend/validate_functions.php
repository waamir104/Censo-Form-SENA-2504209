<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Eliminate white spaces at the begining and at the end of the element's value
function trim_value($key) {
    $element_value = $_POST[$key];
    return trim($element_value);
}

// Validate the value of the element
function validate_value($key) {
    $element_value = $_POST[$key];

    if ($element_value === '') {
        return NULL;
    } else {
        $element_value = trim_value($key);
        return $element_value;
    }
}

// Change the type from string to int
function string_to_int($key) {
    return intval($_POST[$key]);
}

// Validate the value of the element edad
function validate_number($key) {
    $element_value = validate_value($key);

    if (is_null($element_value)) {
        return $element_value;
    } else {
        return string_to_int($key);
    }
}
<?php
//              Censo - Form   --version 1.0
//  William Samir Peña Ortega  [waamirdev@gmail.com] 6th April, 2023

// Sends data throw the method POST and follow the path
function send_data_post($target, $data) {
    // Initializing the curl session
    $cs= curl_init();

    // Stablishing the curl and other options
    curl_setopt($cs, CURLOPT_URL, $target);
    curl_setopt($cs, CURLOPT_POST, true);
    curl_setopt($cs, CURLOPT_POSTFIELDS, $data);
    curl_setopt($cs, CURLOPT_FOLLOWLOCATION, true);

    // Executing the cURL
    curl_exec($cs);

    // Close the cURL
    curl_close($cs);
}

// Sends data throw the method GET and follow the path
function send_data_get($target, $data) {
    
    // Creating the GET query with the data
    $query = http_build_query($data);

    $url = $target . $query;

    header('location: ' . $url);
}
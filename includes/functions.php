<?php
// function.php - stores functions and act as a common element

// NOTE: $_SERVER - Server and execution environment information
// NOTE: SERVER_NAME - name of the server host which the script execute
// The if statement states : if the script is executed on localhost, the debug will process
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL); //
}

// Functions - display variable($var) wrapped in <pre> tags
function d($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}







?>
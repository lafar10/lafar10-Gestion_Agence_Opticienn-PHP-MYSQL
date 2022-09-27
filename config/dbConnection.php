<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_DATABASE', 'opticien');
define('DB_PASSWORD', '');



$con  = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$con) {
    header("Location: ../error/errors.php");
    die();
}

function ValidInput($con, $input)
{
    return mysqli_real_escape_string($con, $input);
}

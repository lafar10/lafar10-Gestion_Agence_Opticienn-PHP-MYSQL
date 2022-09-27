<?php

session_start();
include('../config/dbConnection.php');

$query_us_ty = "INSERT INTO users (fullname,email,password,role_as) VALUES ('lr10 fake','lr10@gmail.com','123456','1')";
$query_us_ty_run = mysqli_query($con, $query_us_ty);

if ($query_us_ty_run) {

    header('Location: ../pages/Success.php');
    exit(0);
} else {
    header("Location: ../pages/Unauthorized.php");
    exit(0);
}

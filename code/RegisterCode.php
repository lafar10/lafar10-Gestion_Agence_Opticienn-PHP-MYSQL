<?php

session_start();
include('../config/dbConnection.php');

if (isset($_POST['register_btn'])) {

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm_pass']);

    if ($password === $confirm_pass) {
        $query_check = "SELECT email FROM users WHERE email='$email'";
        $query_run = mysqli_query($con, $query_check);

        if (mysqli_num_rows($query_run) > 0) {
            $_SESSION['message'] = "Email Already Exist !";
            header("Location: ../Register.php");
            exit(0);
        } else {
            $query_insert = "INSERT INTO users (fullname,email,password) VALUES ('$fullname','$email','$password')";
            $query_ins_run = mysqli_query($con, $query_insert);

            if ($query_ins_run) {
                $_SESSION['message'] = "User Registed Successfully !";
                header("Location: ../Login.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Something Went Wrong ?!";
                header("Location: ../Register.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Password and Confirm Password does not Match";
        header("Location: ../Register.php");
        exit(0);
    }
} else {

    header("Location: ./Register.php");
    exit(0);
}

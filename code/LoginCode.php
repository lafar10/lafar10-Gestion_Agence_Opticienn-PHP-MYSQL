<?php

session_start();
include('../config/dbConnection.php');

if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";

    $login_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_run) > 0) {
        foreach ($login_run as $value) {
            $user_id = $value['id'];
            $user_fullname = $value['fullname'];
            $user_email = $value['email'];
            $user_tele = $value['tele'];
            $user_role_as = $value['role_as'];
        }

        $_SESSION['auth'] = true;

        $_SESSION['auth_role'] = "$user_role_as";

        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_fullname' => $user_fullname,
            'user_email' => $user_email,
            'user_tele' => $user_tele,
        ];

        if ($_SESSION['auth_role'] == '1') {

            $_SESSION['message'] = "Welcome to Dashboard";
            header("Location: ../pages/Dashboard/Dashboard.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == '0') {

            header("Location:  ../index.php");
            exit(0);
        }
    } else {
        $_SESSION['message1'] = "Invalid Email Or Password";
        header("Location: ../Login.php");
        exit(0);
    }
} else {

    header("Location: ../Login.php");
    exit(0);
}

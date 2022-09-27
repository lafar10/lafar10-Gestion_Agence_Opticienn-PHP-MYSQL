<?php

session_start();
include('../config/dbConnection.php');

if (isset($_POST['logout_btn'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);

    $_SESSION['message'] = "Logout successfully !";
    header("Location: ../Login.php");
    exit(0);
}

<?php

include('dbConnection.php');

if (!$_SESSION['auth']) {
    $_SESSION['message'] = "Login First To Access";
    header("Location: ../Login.php");
    exit(0);
} else {
    if ($_SESSION['auth_role'] != '1') {
        header("Location: ../pages/Out/Unauthorized.php");
        exit(0);
    }
}

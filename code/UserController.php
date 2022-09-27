<?php


session_start();
include('../config/dbConnection.php');

if (isset($_POST['update_user_btn'])) {

    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tele = mysqli_real_escape_string($con, $_POST['tele']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query_up = "UPDATE users SET fullname='$fullname', email='$email', tele='$tele', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id'";
    $query_up_run = mysqli_query($con, $query_up);

    if ($query_up_run) {
        $_SESSION['message'] = "User $fullname Updated Successfully !";
        header("Location: ../pages/Users/Users.php");
        exit(0);
    }
}

if (isset($_POST['Create_User_btn'])) {

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tele = mysqli_real_escape_string($con, $_POST['tele']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    $query_check = "SELECT email FROM users WHERE email='$email'";
    $query_run = mysqli_query($con, $query_check);

    if (mysqli_num_rows($query_run) > 0) {
        $_SESSION['message'] = "Email Already Exist !";
        header("Location: ../pages/Users/AddUser.php");
        exit(0);
    } else {
        $query_insert = "INSERT INTO users (fullname,email,tele,password,role_as,status) VALUES ('$fullname','$email','$tele','$password','$role_as','$status')";
        $query_ins_run = mysqli_query($con, $query_insert);

        if ($query_ins_run) {
            $_SESSION['message'] = "User $fullname Created Successfully !";
            header("Location: ../pages/Users/Users.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something Went Wrong ?!";
            header("Location: ../pages/Users/AddUser.php");
            exit(0);
        }
    }
}


if (isset($_POST['delete_user_btn'])) {

    $user_id = mysqli_real_escape_string($con, $_POST['delete_user_btn']);

    $delete_query = "DELETE FROM users WHERE id='$user_id'";

    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {
        $_SESSION['message'] = "User/Admin Deleted Successfully !";
        header("Location: ../pages/Users/Users.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong ?!";
        header("Location: ../pages/Users/Users.php");
        exit(0);
    }
}

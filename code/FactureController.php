<?php

session_start();
include('../config/dbConnection.php');


if (isset($_POST['insert_facture_btn'])) {

    $fullname = ValidInput($con, $_POST['fullname']);
    $email = ValidInput($con, $_POST['email']);
    $tele = ValidInput($con, $_POST['tele']);
    $le_status = ValidInput($con, $_POST['le_status']);
    $re_status = ValidInput($con, $_POST['re_status']);
    $choose_1 = ValidInput($con, $_POST['choose_1']);
    $choose_2 = ValidInput($con, $_POST['choose_2']);
    $choose_3 = ValidInput($con, $_POST['choose_3']);
    $quantity_1 = ValidInput($con, $_POST['quantity_1']);
    $quantity_2 = ValidInput($con, $_POST['quantity_2']);
    $status = ValidInput($con, $_POST['status']);
    $toal = $choose_1 + $choose_2 + $choose_3;
    $price_total = $toal;

    $insert_query = "INSERT INTO factures (fullname,email,tele,le_status,re_status,choose_1,choose_2,choose_3,quantity_1,quantity_2,status,price_total) 
                    VALUES('$fullname','$email','$tele','$le_status','$re_status','$choose_1','$choose_2','$choose_3','$quantity_1','$quantity_2','$status','$price_total')";

    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        $_SESSION['message'] = "$fullname Facture Created With Successfully ^-^";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    }
}


if (isset($_POST['delete_facture_btn'])) {
    $facture_id = ValidInput($con, $_POST['delete_facture_btn']);

    $delete_query = "DELETE FROM factures WHERE id='$facture_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {
        $_SESSION['message'] = "Facture Deleted With Successfully ^-^";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    }
}


if (isset($_POST['update_facture_btn'])) {

    $facture_id = ValidInput($con, $_POST['facture_id']);
    $fullname = ValidInput($con, $_POST['fullname']);
    $email = ValidInput($con, $_POST['email']);
    $tele = ValidInput($con, $_POST['tele']);
    $le_status = ValidInput($con, $_POST['le_status']);
    $re_status = ValidInput($con, $_POST['re_status']);
    $choose_1 = ValidInput($con, $_POST['choose_1']);
    $choose_2 = ValidInput($con, $_POST['choose_2']);
    $choose_3 = ValidInput($con, $_POST['choose_3']);
    $quantity_1 = ValidInput($con, $_POST['quantity_1']);
    $quantity_2 = ValidInput($con, $_POST['quantity_2']);
    $status = ValidInput($con, $_POST['status']);
    $price_total = ValidInput($con, $_POST['price_total']);

    $update_query = "UPDATE factures SET fullname='$fullname', email='$email', tele='$tele', le_status='$le_status', re_status='$re_status', choose_1='$choose_1', choose_2='$choose_2', choose_3='$choose_3', quantity_1='$quantity_1', quantity_2='$quantity_2', status='$status', price_total='$price_total' WHERE id='$facture_id'";


    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        $_SESSION['message'] = "$fullname Facture Updated With Successfully ^-^";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Factures/Factures.php');
        exit(0);
    }
}

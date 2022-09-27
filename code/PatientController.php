<?php


session_start();
include('../config/dbConnection.php');


if (isset($_POST['new_patient_btn'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tele = mysqli_real_escape_string($con, $_POST['tele']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $le_status = mysqli_real_escape_string($con, $_POST['le_status']);
    $re_status = mysqli_real_escape_string($con, $_POST['re_status']);
    $extra = mysqli_real_escape_string($con, $_POST['extra']);

    $patient_query = "INSERT INTO patients (fullname,email,tele,adress,le_status,re_status,extra) VALUES('$fullname','$email','$tele','$adress','$le_status','$re_status','$extra')";

    $patient_query_run = mysqli_query($con, $patient_query);

    if ($patient_query_run) {
        $_SESSION['message'] = "Patient $fullname Created With Success ^-^";
        header('Location: ../pages/Patients/Patients.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Patients/AddPatient.php');
        exit(0);
    }
}

if (isset($_POST['delete_patient_btn'])) {

    $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient_btn']);

    $query_patient = "DELETE FROM patients WHERE id='$patient_id'";

    $query_patient_run = mysqli_query($con, $query_patient);

    if ($query_patient_run) {
        $_SESSION['message'] = "Patient Deleted With Success ^-^";
        header('Location: ../pages/Patients/Patients.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Patients/Patients.php');
        exit(0);
    }
}

if (isset($_POST['update_patient_btn'])) {

    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tele = mysqli_real_escape_string($con, $_POST['tele']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $le_status = mysqli_real_escape_string($con, $_POST['le_status']);
    $re_status = mysqli_real_escape_string($con, $_POST['re_status']);
    $extra = mysqli_real_escape_string($con, $_POST['extra']);

    $query_up_pt = "UPDATE patients SET fullname='$fullname', email='$email', tele='$tele', adress='$adress', le_status='$le_status', re_status='$re_status', extra='$extra' WHERE id='$patient_id'";

    $query_up_pt_run = mysqli_query($con, $query_up_pt);

    if ($query_up_pt_run) {
        $_SESSION['message'] = "Patient $fullname Updated With Success ^-^";
        header('Location: ../pages/Patients/Patients.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong !";
        header('Location: ../pages/Patients/Patients.php');
        exit(0);
    }
}

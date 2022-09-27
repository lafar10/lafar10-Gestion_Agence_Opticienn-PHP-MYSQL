<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">New Patient</h3>

        </div>

        <!-- <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
                ?>
            <div class="alert alert-success">
                <?php
                    include('../../messages/Message.php');
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php
                }
        ?> -->

        <div class="card-body">

            <form action="../../code/PatientController.php" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Téléphone</label>
                        <input type="tel" class="form-control" name="tele" maxlength="20" minlength="8" error="Minimum of 8 / Maximum of 20 characters" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Extra</label>
                        <input type="text" class="form-control" name="extra" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Left Eye Status</label>
                        <input type="text" class="form-control" name="le_status" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Right Eye Status</label>
                        <input type="text" class="form-control" name="re_status" required>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Adresse</label>
                        <input type="text" class="form-control" name="adress" id="">
                    </div>

                    <div class="col-lg-12" align="center">
                        <br>
                        <button type="submit" name="new_patient_btn" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<?php
include('../Layouts/Footer.php');

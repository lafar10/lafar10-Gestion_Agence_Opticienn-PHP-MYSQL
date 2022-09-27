<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Edit Patient</h3>

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

            <?php

            if (isset($_GET['id'])) {
                $patient_id = $_GET['id'];
            }

            $query_pt_get = "SELECT * FROM patients WHERE id='$patient_id'";
            $query_pt_get_run = mysqli_query($con, $query_pt_get);

            if (mysqli_num_rows($query_pt_get_run) > 0) {
                foreach ($query_pt_get_run as $value) {
            ?>

                    <form action="../../code/PatientController.php" method="post">
                        <input type="hidden" name="patient_id" value="<?= $value['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $value['fullname'] ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Téléphone</label>
                                <input type="tel" class="form-control" name="tele" value="<?= $value['tele'] ?>" maxlength="20" minlength="8" error="Minimum of 8 / Maximum of 20 characters" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Extra</label>
                                <input type="text" class="form-control" name="extra" value="<?= $value['extra'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Left Eye Status</label>
                                <input type="text" class="form-control" name="le_status" value="<?= $value['le_status'] ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Right Eye Status</label>
                                <input type="text" class="form-control" name="re_status" value="<?= $value['re_status'] ?>" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Adresse</label>
                                <input type="text" class="form-control" name="adress" value="<?= $value['adress'] ?>" id="">
                            </div>

                            <div class="col-lg-12" align="center">
                                <br>
                                <button type="submit" name="update_patient_btn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>

                <?php
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-lg-8">
                        <h5>No Records Found ^-^</h5>
                    </div>
                </div>
            <?php
            }

            ?>
        </div>
    </div>

</div>


<?php
include('../Layouts/Footer.php');

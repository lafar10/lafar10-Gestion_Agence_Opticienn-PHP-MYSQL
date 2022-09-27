<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Patients </h3>

            <div class="container">
                <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
                ?>
                    <div class="alert alert-success text-center">
                        <?php
                        include('../../messages/Message.php');
                        unset($_SESSION['message']);
                        ?>
                    </div>

                <?php
                }
                ?>
                <a href="./AddPatient.php" class="btn btn-success float-lg-end" style="width:100%;"><i class="nc-icon nc-simple-add"></i> New Patient</a>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table id="myDataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Left Eye Status</th>
                            <th>Right Eye Status</th>
                            <th>Extra</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query_pat = "SELECT * FROM patients";
                        $query_pat_run = mysqli_query($con, $query_pat);

                        if (mysqli_num_rows($query_pat_run) > 0) {
                            foreach ($query_pat_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['tele'] ?></td>
                                    <td><?= $row['adress'] ?></td>
                                    <td><?= $row['le_status'] ?></td>
                                    <td><?= $row['re_status'] ?></td>
                                    <td><?= $row['extra'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td>
                                        <form action="../../code/PatientController.php" method="post" class="d-flex">
                                            <a href="./UpdatePatient.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                            &nbsp;<button type="submit" value="<?= $row['id'] ?>" onclick="return confirm('Are You Want To Delete This Patient')" name="delete_patient_btn" class="btn btn-danger">Delete</button>
                                            &nbsp;<a href="./Patientpdf.php?id=<?= $row['id'] ?>" class="btn btn-secondary">pdf</button>

                                        </form>

                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="10">No Record Found ^+^</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <br>
            </div>
        </div>
    </div>

</div>


<?php
include('../Layouts/Footer.php');

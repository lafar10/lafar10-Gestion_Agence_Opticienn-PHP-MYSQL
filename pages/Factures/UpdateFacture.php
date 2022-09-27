<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Update Facture</h3>

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
                $facture_id = $_GET['id'];
            }

            $query_get = "SELECT * FROM factures WHERE id='$facture_id'";
            $query_get_run = mysqli_query($con, $query_get);

            if (mysqli_num_rows($query_get_run) > 0) {
                foreach ($query_get_run as $value) {
            ?>
                    <form action="../../code/FactureController.php" method="post">
                        <input type="hidden" name="facture_id" value="<?= $value['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $value['fullname'] ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Téléphone</label>
                                <input type="tel" class="form-control" name="tele" value="<?= $value['tele'] ?>" maxlength="20" minlength="8" error="Minimum of 8 / Maximum of 20 characters">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Left Eye Status</label>
                                <input type="text" class="form-control" name="le_status" value="<?= $value['le_status'] ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Right Eye Status</label>
                                <input type="text" class="form-control" name="re_status" value="<?= $value['re_status'] ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Choose 1</label>
                                <input type="text" class="form-control" name="choose_1" value="<?= $value['choose_1'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Choose 2</label>
                                <input type="text" class="form-control" name="choose_2" value="<?= $value['choose_2'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Choose 3</label>
                                <input type="text" class="form-control" name="choose_3" value="<?= $value['choose_3'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Quantity 1</label>
                                <input type="text" class="form-control" name="quantity_1" value="<?= $value['quantity_1'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Quantity 2</label>
                                <input type="text" class="form-control" name="quantity_2" value="<?= $value['quantity_2'] ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Payment Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="oui" <?= $value['status'] == 'oui' ? 'selected' : '' ?>>oui</option>
                                    <option value="non" <?= $value['status'] == 'non' ? 'selected' : '' ?>>non</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Price Total</label>
                                <input type="text" class="form-control" name="price_total" value="<?= $value['price_total'] ?>" required>
                            </div>

                            <div class="col-lg-12" align="center">
                                <br>
                                <button type="submit" name="update_facture_btn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                <?php
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>No Records Found ^-^ !!</h2>
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

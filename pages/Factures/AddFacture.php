<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">New Facture</h3>

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
            <form action="../../code/FactureController.php" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Téléphone</label>
                        <input type="tel" class="form-control" name="tele" maxlength="20" minlength="8" error="Minimum of 8 / Maximum of 20 characters">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Left Eye Status</label>
                        <input type="text" class="form-control" name="le_status" id="" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Right Eye Status</label>
                        <input type="text" class="form-control" name="re_status" id="" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Choose 1</label>
                        <input type="text" class="form-control" name="choose_1" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Choose 2</label>
                        <input type="text" class="form-control" name="choose_2" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Choose 3</label>
                        <input type="text" class="form-control" name="choose_3" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Quantity 1</label>
                        <input type="text" class="form-control" name="quantity_1" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Quantity 2</label>
                        <input type="text" class="form-control" name="quantity_2" id="">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Payment Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="oui">oui</option>
                            <option value="non">non</option>
                        </select>
                    </div>
                    <!--  <div class="col-lg-6">
                        <label for="">Price Total</label>
                        <input type="text" class="form-control" name="price_total" id="" required>
                    </div> -->

                    <div class="col-lg-12" align="center">
                        <br>
                        <button type="submit" name="insert_facture_btn" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<?php
include('../Layouts/Footer.php');

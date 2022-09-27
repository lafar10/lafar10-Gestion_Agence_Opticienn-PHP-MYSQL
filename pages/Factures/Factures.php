<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Factures </h3>

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
                <a href="./AddFacture.php" class="btn btn-success float-lg-end" style="width:100%;"><i class="nc-icon nc-simple-add"></i> New Facture</a>
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
                            <th>Left Eye</th>
                            <th>Right Eye</th>
                            <th>Choose 1</th>
                            <th>Choose 2</th>
                            <th>Choose 3</th>
                            <th>Quantity 1</th>
                            <th>Quantity 2</th>
                            <th>Payment Status</th>
                            <th>Price Total</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $fetch_facture = "SELECT * FROM factures";
                        $fetch_facture_run = mysqli_query($con, $fetch_facture);

                        if (mysqli_num_rows($fetch_facture_run) > 0) {
                            foreach ($fetch_facture_run as $value) {
                        ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['fullname'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['tele'] ?></td>
                                    <td><?= $value['le_status'] ?></td>
                                    <td><?= $value['re_status'] ?></td>
                                    <td><?= $value['choose_1'] ?></td>
                                    <td><?= $value['choose_2'] ?></td>
                                    <td><?= $value['choose_3'] ?></td>
                                    <td><?= $value['quantity_1'] ?></td>
                                    <td><?= $value['quantity_2'] ?></td>
                                    <td>
                                        <strong style="font-size:19px;" class="<?= $value['status'] == 'oui' ? 'bg-success text-white' : 'bg-danger text-white' ?>"><?= $value['status'] ?></strong>
                                    </td>
                                    <td><?= $value['price_total'] ?></td>
                                    <td><?= $value['created_at'] ?></td>
                                    <td>
                                        <form action="../code/FactureController.php" class="d-flex" method="post">
                                            <a href="./UpdateFacture.php?id=<?= $value['id'] ?>" class="btn btn-primary">Edit</a>&nbsp;
                                            <button type="submit" name="delete_facture_btn" value="<?= $value['id'] ?>" onclick="return confirm('Are You Want To Delete This Facture')" class="btn btn-danger">Delete</button>&nbsp;
                                            &nbsp;<a href="./FacturePdf.php?id=<?= $value['id']; ?>" class="btn btn-secondary">pdf</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="15">No Records Found ^+^ !</td>
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

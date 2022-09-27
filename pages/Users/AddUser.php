<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">New User</h3>

        </div>

        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        ?>
            <div class="alert alert-danger">
                <?php
                include('../../messages/Message.php');
                unset($_SESSION['message']);
                ?>
            </div>
        <?php
        }
        ?>

        <div class="card-body">

            <form action="../../code/UserController.php" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Téléphone</label>
                        <input type="text" class="form-control" name="tele">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Role As</label>
                        <select class="form-control" name="role_as" required>
                            <option value="">--Select Role--</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="">--Select Role--</option>
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>

                    <div class="col-lg-12" align="center">
                        <br>
                        <button type="submit" name="Create_User_btn" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<?php
include('../Layouts/Footer.php');

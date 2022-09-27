<?php

session_start();

include('../../config/authentification.php');

include('../Layouts/Navbar.php');

?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Edit User</h3>

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
                $user_id = $_GET['id'];
            }

            $users = "SELECT * FROM users WHERE id='$user_id'";
            $users_run = mysqli_query($con, $users);

            if (mysqli_num_rows($users_run) > 0) {

                foreach ($users_run as $row) {
            ?>
                    <form action="../../code/UserController.php" method="post">
                        <input type="hidden" value="<?= $row['id'] ?>" name="user_id">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $row['fullname'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Téléphone</label>
                                <input type="text" class="form-control" name="tele" value="<?= $row['tele'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>" id="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Role As</label>
                                <select class="form-control" name="role_as" required>
                                    <option value="">--Select Role--</option>
                                    <option value="1" <?= $row['role_as'] == '1' ? 'selected' : '' ?>>Admin</option>
                                    <option value="0" <?= $row['role_as'] == '0' ? 'selected' : '' ?>>User</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="">--Select Role--</option>
                                    <option value="1" <?= $row['status'] == '1' ? 'selected' : '' ?>>1</option>
                                    <option value="0" <?= $row['status'] == '0' ? 'selected' : '' ?>>0</option>
                                </select>
                            </div>

                            <div class="col-lg-12" align="center">
                                <br>
                                <button type="submit" name="update_user_btn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-primary">
                    <h3 class="display-6">404 Not Found</h3>
                </div>
            <?php
            }

            ?>
        </div>
    </div>

</div>


<?php

include('../Layouts/Footer.php');

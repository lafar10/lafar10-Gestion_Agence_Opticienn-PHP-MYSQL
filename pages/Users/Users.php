<?php

session_start();

include('../../config/authentification.php');
include('../Layouts/Navbar.php');


?>

<div class="content">
    <div class="card">
        <div class="card-head">
            <h3 class="display-6 ml-4 mt-4">Users </h3>

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
                <a href="./AddUser.php" class="btn btn-success float-lg-end" style="width:100%;"><i class="nc-icon nc-simple-add"></i> New User</a>
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
                            <th>Password</th>
                            <th>Roles 1->ad 0->us</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query_users = "SELECT * FROM users";
                        $users_run = mysqli_query($con, $query_users);

                        if (mysqli_num_rows($users_run) > 0) {

                            foreach ($users_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['tele'] ?></td>
                                    <td><?= $row['password'] ?></td>
                                    <td><?= $row['role_as'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td>
                                        <form action="../../code/UserController.php" method="post" class="d-flex">
                                            <a href="./UpdateUser.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                            &nbsp;<button type="submit" value="<?= $row['id'] ?>" onclick="return confirm('Are You Want To Delete This User/Admin')" name="delete_user_btn" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9">No Records Found</td>
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

<?php

session_start();

if (isset($_SESSION['auth'])) {
    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = "You Are Already Login";
    }
    header("Location: ./index.php");
    exit(0);
}

include('./config/dbConnection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="./index.php"><img src="./assets/img/logos/opt.png" style="width:165px;height:80px;" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div align="center">
        <br>
        <br>
        <br>
        <div class="card col-lg-5 shadow-lg" align="center">
            <div class="card-header bg-white">
                <h1 class="display-5 text-center text-warning">Login</h1>
            </div>
            <div class="card-body ">
                <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
                ?>
                    <div class="alert alert-success">
                        <?php
                        include('./messages/Message.php');
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php
                }
                ?>
                <br>

                <div class="row">
                    <form action="./code/LoginCode.php" method="post">
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                            <small class="text-danger">
                                <?php
                                if (isset($_SESSION['message1']) && $_SESSION['message1'] != '') {
                                ?>
                                    <?php
                                    include('./messages/Message1.php');
                                    unset($_SESSION['message1']);

                                    ?>
                                <?php
                                }
                                ?>
                            </small>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <br>
                            <button class="btn btn-secondary" name="login_btn" type="submit">Login</button>
                            <a class="btn btn-outline-warning" href="./Register.php">Create New Account !</a>
                        </div>
                    </form>
                </div>
                <br>

            </div>
        </div>

    </div>

</body>

</html>
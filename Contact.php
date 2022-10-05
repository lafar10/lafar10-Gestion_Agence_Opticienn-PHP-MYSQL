<?php

session_start();
include('./config/dbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if (isset($_POST['message_btn'])) {

    $subject = ValidInput($con, $_POST['subject']);
    $message = ValidInput($con, $_POST['message']);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ayoublafar7@gmail.com';                     //SMTP username
        $mail->Password   = 'pjwyqsevyhlfipju';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_POST['email'], $_POST['fullname']);
        $mail->addAddress('ayoublafar7@gmail.com', 'lafar ayoub');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();

        $_SESSION['message'] = "Message Send Successfull !!";
    } catch (Exception $e) {
        $_SESSION['message1'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Optician Agency - Contact US</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body style="background-color: hsl(110, 100%, 30%, 0.2);">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/logos/opt.png" style="width:165px;height:80px;" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                    <li class="nav-item"><a class="nav-link" href="./pages/Dashboard/Dashboard.php">Dashboard</a></li>



                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

                    <?php if (isset($_SESSION['auth_user'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=
                                $_SESSION['auth_user']['user_fullname'];
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i> My Profile</a></li>
                                <li>
                                    <form action="./code/LogoutCode.php" method="post">
                                        <button class="dropdown-item" type="submit" name="logout_btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item"><a class="btn btn-secondary" href="./Register.php">Register</a></li>
                        <li class="nav-item"><a class="btn btn-outline-warning" href="./Login.php">Login</a></li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>

    <br>
    <br>
    <br>

    <div class="container ">



        <div class="card col-lg-6 mx-auto">
            <div class="card-header bg-dark text-warning text-center">
                <h3 class="display-6">Contact US</h3>
            </div>
            <div class="card-body">
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
                <?php
                if (isset($_SESSION['message1']) && $_SESSION['message1'] != '') {
                ?>
                    <div class="alert alert-success">
                        <?php
                        include('./messages/Message1.php');
                        unset($_SESSION['message1']);
                        ?>
                    </div>
                <?php
                }
                ?>
                <br>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" id="">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" id="">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control" rows="7" cols=""></textarea>
                        </div>

                        <div class="col-lg-12 ">
                            <br>
                            <button type="submit" name="message_btn" class="btn btn-outline-warning float-end text-black-50">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
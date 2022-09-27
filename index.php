<?php

session_start();
include('./config/dbConnection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Optician Agency - Home</title>
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

<body>
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
                    <?php if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '1') : ?>
                        <li class="nav-item"><a class="nav-link" href="./pages/Dashboard.php">Dashboard</a></li>
                    <?php endif; ?>


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

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Agency !!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Comment se manifeste la fatigue...</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/10.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Gucci</div>
                            <div class="portfolio-caption-subheading text-muted">Classic</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/7.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Ray-Ban</div>
                            <div class="portfolio-caption-subheading text-muted">Clasic</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/8.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Guess</div>
                            <div class="portfolio-caption-subheading text-muted">Identity</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/9.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Ray-Ban</div>
                            <div class="portfolio-caption-subheading text-muted">Branding</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/11.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Levi's</div>
                            <div class="portfolio-caption-subheading text-muted">Summer Mode</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/12.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Saint Laurent</div>
                            <div class="portfolio-caption-subheading text-muted">Photography</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2020-2021</h4>
                            <h4 class="subheading">Our Humble Beginnings</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2021</h4>
                            <h4 class="subheading">An Agency is Born</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2021</h4>
                            <h4 class="subheading">Transition to Full Service</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2022</h4>
                            <h4 class="subheading">3D Virtuel en magasins</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Chez Optical Center, nous souhaitons être proche de vous et répondre au mieux a vos besoins. Dans toutes les régions de France et au delà des frontières, nous vous ouvrons ainsi les portes de nos magasins.
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Founder</h2>
                <h3 class="section-subheading text-muted">Owner Of The Agency</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <!-- <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div> -->
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://p.kindpng.com/picc/s/178-1782779_ray-ban-logo-black-hd-png-download.png" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="data:image/png;base64,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" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://cdn.worldvectorlogo.com/logos/levis.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://findvectorlogo.com/wp-content/uploads/2018/12/saint-laurent-paris-vector-logo.png" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
            </div>
            <br>
            <br>
            <br>

            <div class="row text-center mb-5">
                <div class="col-md-12">
                    <div class="form-group">
                        <h3 for="" class="text-white">Email : Jhon_Doe@gmail.com</h3>
                    </div>
                    <br>
                    <div class="form-group">
                        <h3 for="" class="text-white">Téléphone : +212 6 23 79 35 49</h3>
                    </div>
                    <br>
                    <div class="form-group mb-md-0">
                        <h3 for="" class="text-white">Adresse : Boulevard Mohammed V</h3>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <!-- Footer-->
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
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Gucci</h2>
                                <p class="item-intro text-muted">Classic Model</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/10.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Normal
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Ray-Ban</h2>
                                <p class="item-intro text-muted">Classic Model</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/7.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Explore
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Normal
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Guess</h2>
                                <p class="item-intro text-muted">Identity Mode</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/8.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Normal
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Ray-Ban</h2>
                                <p class="item-intro text-muted">Braning</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/9.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Lines
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Branding
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Levi's</h2>
                                <p class="item-intro text-muted">Summer Model</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/11.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Southwest
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Summer
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Saint Laurent</h2>
                                <p class="item-intro text-muted">Photography Mode</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/12.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Window
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Summer
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    --><?php //= $this->Html->charset() ?>
<!--    <title>-->
<!--        --><?php //= $this->fetch('title') ?>
<!--    </title>-->
<!--    --><?php //= $this->Html->meta('icon') ?>
<!---->
<!--    --><?php //= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
<!---->
<!--    --><?php //= $this->fetch('meta') ?>
<!--    --><?php //= $this->fetch('css') ?>
<!--    --><?php //= $this->fetch('script') ?>
<!--</head>-->
<!--<body>-->
<!--    <div class="error-container">-->
<!--        --><?php //= $this->Flash->render() ?>
<!--        --><?php //= $this->fetch('content') ?>
<!--        --><?php //= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
<!--    </div>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- title -->
    <title><?= $this->ContentBlock->text('website-title'); ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <?= $this->ContentBlock->image('logo'); ?>
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><?= $this->Html->link("Home", "/") ?></li>


                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'viewc']) ?>
                                </li>


                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'Lisa', 'action' => 'viewlisa']) ?>
                                </li>
                                <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?>
                                </li>
                                <li>
                                    <?php
                                    if ($this->Identity->isLoggedIn()) {
                                        echo $this->Html->link(
                                            'Dashboard',
                                            ['controller' => 'AdminDashboard', 'action' => 'dashboard'],
                                            ['class' => 'button button-outline']
                                        );
                                        echo $this->Html->link(
                                            'Log out',
                                            ['controller' => 'Auth', 'action' => 'logout'],
                                            ['class' => 'button button-outline']
                                        );
                                    } else {
                                        echo $this->Html->link(
                                            'Log in',
                                            ['controller' => 'Auth', 'action' => 'login'],
                                            ['class' => 'button button-outline']
                                        );
                                    }
                                    ?>
                                </li>

                                <!--  <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </li> -->




                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <style>
        .hero-btns {
            display: flex;
            justify-content: center;
            /* Centers the buttons horizontally */
            gap: 10px;
            /* Adds space between the buttons */
            margin: 20px 0;
            /* Optional: Adds vertical spacing around the button container */
        }

        .link-container {
            margin: 0;
            /* Ensures no extra margin around each button */
        }

        .boxed-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            color: #fff;

            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .boxed-btn:hover {
            background-color: #4a9b38;
            color: #fff;
        }

        .boxed-btn:active {
            background-color: #4a9b38;
        }
    </style>

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h1>Error 404: The page you were looking for could not be found</h1>
                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Home", '/', ['class' => 'boxed-btn']) ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->




            <!-- footer -->

            <!-- footer -->
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box about-widget">
                                <h2 class="widget-title">About us</h2>
                                <p>We are a premier beauty school located in Adelaide, offering a range of beauty courses and professional training. We pride ourselves on our high standards and the quality of our education</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box get-in-touch">
                                <h2 class="widget-title">Get in Touch</h2>
                                <ul>
                                    <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                                    <li>support@fruitkha.com</li>
                                    <li>+00 111 222 3333</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box pages">
                                <h2 class="widget-title">Pages</h2>
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="services.html">Shop</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box subscribe">
                                <h2 class="widget-title">Subscribe</h2>
                                <p>Subscribe to our mailing list to get the latest updates.</p>
                                <form action="index.html">
                                    <input type="email" placeholder="Email">
                                    <button type="submit"><i class="fas fa-paper-plane"></i>Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- end footer -->

            <!-- copyright -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <p>Copyrights &copy; <?= $this->ContentBlock->text('copyright-message'); ?></p>
                        </div>
                        <div class="col-lg-6 text-right col-md-12">
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end copyright -->

            <!-- jquery -->
            <script src="assets/js/jquery-1.11.3.min.js"></script>
            <!-- bootstrap -->
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <!-- count down -->
            <script src="assets/js/jquery.countdown.js"></script>
            <!-- isotope -->
            <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
            <!-- waypoints -->
            <script src="assets/js/waypoints.js"></script>
            <!-- owl carousel -->
<!--            <script src="assets/js/owl.carousel.min.js"></script>-->
            <!-- magnific popup -->
            <script src="assets/js/jquery.magnific-popup.min.js"></script>
            <!-- mean menu -->
            <script src="assets/js/jquery.meanmenu.min.js"></script>
            <!-- sticker js -->
            <script src="assets/js/sticker.js"></script>
            <!-- main js -->
            <script src="assets/js/main.js"></script>

</body>

</html>

<?php
$error = $_SERVER["REDIRECT_STATUS"];
$error_title = '';
$error_message = '';
if ($error = 404) {
    $error_title = '404 Page Not Found';
    $error_message = ' The requested page could not be found.';

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <?= $this->Html->css('main') ?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <img src="<?= $this->Url->image('../webroot/img/login-logo-green.png') ?>" alt="SABE Logo" class="logo-image">
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
                            <?= $this->Html->link(
                                $this->ContentBlock->image('logo'),
                                '/',
                                ['escape' => false]
                            ) ?>
                        </div>



                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><?= $this->Html->link("Home", "/") ?></li>


                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses']) ?>
                                </li>


                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services']) ?>
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
                                            ['class' => 'button button-outline', 'onclick' => 'return confirm("Are you sure you want to leave?");']
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
    <!-- The pop-up message with an arrow pointing to the target button -->
    <?php
    if ($this->Identity->isLoggedIn()) {
        $userType = $this->Identity->get('user_type');
        if ($userType === 'admin') {
            // Display the popup for admin users
            ?>
            <div class="popup" id="popup">
                <div class="arrow"></div> <!-- The arrow pointing to the button -->
                <p>You have been logged in as an admin. Use the Dashboard to manage your business.</p>
            </div>
            <?php
        }
    } ?>

    <script>
        // Function to show the pop-up and hide it after 10 seconds
        function showPopup() {
            var popup = document.getElementById("popup");

            // Wait 3 seconds before showing the pop-up
            setTimeout(function () {
                popup.style.display = "block"; // Show the pop-up
            }, 800);

            // Hide the pop-up after 10 seconds from the moment it appears
            setTimeout(function () {
                popup.style.display = "none";
            }, 13000); // 3s delay + 10s display time = 13s total
        }

        // Trigger the pop-up to show when the page loads
        window.onload = showPopup;
    </script>


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
    <style>
        .hero-text-tablecell h1 {
            text-align: center;
        }

        .single-homepage-slider:after {
            background-color: transparent;
        }

        .sticky-wrapper.is-sticky .top-header-area {
            background-color: #1a4332;
        }
    </style>
    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h1><?= $this->ContentBlock->text('home-slider-text-1'); ?></h1>
                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Our Courses", ['controller' => 'Courses', 'action' => 'courses'], ['class' => 'bordered-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'bordered-btn']) ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h1><?= $this->ContentBlock->text('home-slider-text-2'); ?></h1>

                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Our Courses", ['controller' => 'Courses', 'action' => 'courses'], ['class' => 'bordered-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'bordered-btn']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h1><?= $this->ContentBlock->text('home-slider-text-3'); ?></h1>
                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Our Courses", ['controller' => 'Courses', 'action' => 'courses'], ['class' => 'bordered-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'bordered-btn']) ?>
                                    </div>
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

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>International Expert Instructors</h3>
                            <p>Learn from seasoned professionals in the industry</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>Flexible Classes</h3>
                            <p>Day, evening, and weekend classes available.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Comprehensive Curriculum</h3>
                            <p>Covering all aspects of cosmetology, from basics to advanced techniques.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->


    <!-- Style for Product Section -->
    <style>
        .card-equal-height {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            margin-bottom: 20px;
            /* Adjust margin as needed */
        }

        .product-image {
            width: 100%;
            height: 200px;
            /* Set fixed height for images */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            /* Adjust spacing as needed */
            background-color: #f0f0f0;
            /* Optional: Background color for placeholder */
        }

        .product-image a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            /* Ensures images cover the frame while preserving aspect ratio */
        }

        .product-title {
            margin: 10px 0;
            min-height: 60px;
            /* Adjust to ensure all titles have the same height */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .product-price {
            margin-top: auto;
        }
    </style>
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Featured</span> Courses</h3>
                        <p>Explore our diverse range of programs designed to elevate your skills and prepare you for a
                            successful career in the beauty industry.</p>
                        <p><small>Note: All prices are in AUD (Australian Dollars).</small></p>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <?php $counter = 0; ?>
                <?php foreach ($courses as $course): ?>
                    <?php if ($counter == 6)
                        break; ?>
                    <?php if ($course->course_featured): ?>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item card-equal-height">
                                <div class="product-image">
                                    <?= $this->Html->image('/' . $course->course_image) ?>
                                </div>
                                <h3 class="product-title"><?= h($course->course_name); ?></h3>
                                <p class="product-price">
                                    <span><?= h(strlen($course->course_description) > 100 ? substr($course->course_description, 0, 100) . '...' : $course->course_description) ?></span>
                                    <?= h($course->course_price); ?>$
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End of Product Setion -->

        <!-- testimonial-section -->
        <div class="testimonail-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="testimonial-sliders">
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>Saira Hakim <span>Course: Back to Basics (Facial)</span></h3>
                                    <p class="testimonial-body">
                                        "Attending SABE was a game-changer for my career. The hands-on training and
                                        the guidance from industry professionals helped me refine my skills and
                                        build a strong portfolio "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>Sarah Lee <span>Course: Personalised Training</span></h3>
                                    <p class="testimonial-body">
                                        "I can’t thank SABE enough for the transformative education I received. The
                                        school not only taught me the technical skills needed to excel in esthetics
                                        but also provided me with a deep understanding of client care" </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar3.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>Laura Smith <span>Course: Total Care (Waxing)</span></h3>
                                    <p class="testimonial-body">
                                        "The comprehensive training at SABE gave me a strong foundation in all
                                        aspects of Waxing. From basic techniques to advanced procedures, the
                                        curriculum was well-rounded and thorough"
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonial-section -->

    <style>
        .single-logo-item img {
            max-width: 180px;
            margin: 0 auto;
        }

        .logo-carousel-section {
            background-color: #f5f5f5;
            padding: 50px 0;
        }

        .footer-area {
            background-color: #4a9b38;
            color: #fff;
            padding: 150px 0;
        }

        h2.widget-title {
            font-size: 24px;
            font-weight: 500;
            position: relative;
            padding-bottom: 20px;
            color: #fff;
        }

        h2.widget-title:after {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 20px;
            height: 2px;
            background-color: #FF69B4;
            content: "";
        }

        .footer-box p {
            color: #fff;
            opacity: 0.7;
            line-height: 1.8;
        }

        .footer-box ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .footer-box ul li {
            opacity: 0.7;
            margin-bottom: 10px;
            line-height: 1.8;
        }

        .footer-box ul li:last-child {
            margin-bottom: 0;
        }

        .footer-box.subscribe form input[type=email] {
            border: none;
            background-color: #012738;
            width: 78%;
            padding: 15px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #fff;
        }

        .footer-box.subscribe form button {
            width: 20%;
            border: none;
            background-color: #012738;
            color: #FF69B4;
            padding: 14px 0;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            cursor: pointer;
        }

        .footer-box.subscribe form button:focus {
            outline: none;
        }

        .copyright {
            background-color: #4a9b38;
            border-top: 1px solid #232a35;
        }

        .copyright p {
            margin: 0;
            color: #fff;
            opacity: 0.7;
            padding: 16px 0;
            font-size: 15px;
            width: 120%;
        }

        .copyright a {
            color: #4a9b38;

        }

        .copyright a:hover {
            color: #4a9b38;
        }

        .social-icons ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .social-icons ul li {
            display: inline-block;
        }

        .social-icons ul li a {
            font-size: 30px;
            color: #fff;
            opacity: 0.7;
            padding: 16px 10px;
            display: block;
        }

        .footer-box ul li a {
            color: #fff;
        }

        .footer-box.pages ul li {
            position: relative;
            padding-left: 20px;
        }

        .footer-box.pages ul li:before {
            position: absolute;
            left: 0;
            top: 0;
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #FF69B4;
        }
    </style>
    <!-- footer -->
    <div class="footer-area">
        <div class="container" style="text-align: left;">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li><?= $this->ContentBlock->text('location-address') ?>,
                                <?= $this->ContentBlock->text('location-suburb') ?>,
                                <br><?= $this->ContentBlock->text('location-state') ?>,
                                <?= $this->ContentBlock->text('location-postcode') ?>.
                            </li>
                            <li><?= $this->ContentBlock->text('contact-email') ?></li>
                            <li>(+61) <?= $this->ContentBlock->text('contact-phone') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><?= $this->Html->link("Home", "/") ?></li>
                            <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services']) ?>
                            </li>
                            <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses']) ?>
                            </li>
                            <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Opening Hours</h2>
                        <p>Monday to Friday: 9:30 - 20:00</p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="social-icons footer-box subscribe">
                        <ul>
                            <li><a href="https://www.facebook.com/adelaidebeautyandeducation" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/adelaidebeautyandeducation" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <!--<li><a href="https://www.tiktok.com/@beautybylisafollett" target="_blank"><i
                                        class="fab fa-tiktok"></i></a></li>-->
                            <div class="site-logo">
                            </div>
                        </ul>
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
                <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;">
                    <p style="margin: 0;">
                        Copyrights &copy; <span style="color: #4a9b38; font-weight: bold;">
                            <?= $this->ContentBlock->text('copyright-message'); ?>
                        </span> All Rights Reserved.
                    </p>
                    <!--<ul class="list-unstyled site-footer__bottom-menu"
                        style="display: flex; margin: 0; padding: 0; list-style: none;">
                        <li style="margin-right: 5px;">
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Policy</a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>


    <!-- end copyright -->

    <!-- IMPOTANT: THIS IS NEW LAYOUT FOR THE HOMEPAGE, WILL BE MOVED TO A SEPEREATE CSS IN THE END -->
    <!-- IMPOTANT: THIS IS NEW LAYOUT FOR THE HOMEPAGE, WILL BE MOVED TO A SEPEREATE CSS IN THE END -->
    <style>
        .footer-area {
            background-color: #1a4332;
            padding: 150px 0px;
        }

        div.footer-area {
            max-height: 400px;
        }

        .copyright {
            background-color: #1a4332;
        }

        .list-section {
            background-color: #f5f5f5;
        }

        .hero-text h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /*.hero-text h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            border: 2px solid black;
            padding: 5px;
            display: inline-block;
        }*/
        nav.main-menu ul li a {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            font-weight: 700;
            display: block;
            padding: 15px;
        }

        nav.main-menu ul li a:hover {
            color: #4a9b38;
        }

        a.boxed-btn {
            background-color: #4a9b38;
        }

        a.bordered-btn {
            font-family: 'Poppins', sans-serif;
            display: inline-block;
            color: #fff;
            background-color: #4a9b38;
            border: 2px solid #4a9b38;
            padding: 7px 20px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            /* Add shadow */
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        a.bordered-btn:hover {
            background-color: #fff;
            color: #4a9b38;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            /* Larger shadow on hover */
        }

        .list-box .list-icon i {
            display: block;
            font-size: 24px;
            margin-right: 15px;
            color: #4a9b38;
            width: 65px;
            height: 65px;
            text-align: center;
            line-height: 60px;
            border: 2px #4a9b38 dotted;
            border-radius: 999px;
        }

        h3 {
            color: #1a4332;
        }

        p {
            color: #1a4332;
        }

        p.testimonial-body {
            font-size: 17px;
            font-style: italic;
            width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            color: #999999;
            margin-top: 20px;
        }

        .client-meta h3 span {
            display: block;
            font-size: 70%;
            margin-top: 10px;
            color: #1a4332;
            font-weight: 600;
            opacity: 0.5;
        }

        .orange-text {
            color: #4a9b38;
        }

        h2.widget-title:after {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 20px;
            height: 2px;
            background-color: #4a9b38;
            content: "";
        }

        .footer-box.pages ul li:before {
            position: absolute;
            left: 0;
            top: 0;
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #4a9b38;
        }

        .footer-box.subscribe form button {
            width: 20%;
            border: none;
            background-color: #;
            color: #4a9b38;
            padding: 14px 0;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            cursor: pointer;
        }

        .footer-box.subscribe form input[type=email] {
            border: none;
            background-color: #2b6b4a;
            width: 78%;
            padding: 15px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #fff;
        }

        .footer-box.subscribe form button {
            width: 20%;
            border: none;
            background-color: #2b6b4a;
            color: #4a9b38;
            padding: 14px 0;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            cursor: pointer;
        }

        .footer-box.subscribe form button:focus {
            outline: none;
        }

        a:hover {
            color: #4a9b38;
        }

        .loader {
            bottom: 0;
            height: 100%;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 1111;
            background: #fff;
            overflow-x: hidden;
        }

        .logo-image {
            position: absolute;
            top: 20%;
            /* Adjust to position the image above the spinner */
            z-index: 1112;
            /* Ensure the image is above the spinner */
            max-width: 300px;
            /* Adjust size as needed */
            max-height: 200px;
            /* Adjust size as needed */
            margin-left: 650px;
        }

        .loader-inner {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            height: 50px;
            width: 50px;
        }

        .circle {
            width: 8vmax;
            height: 8vmax;
            border-right: 4px solid #000;
            border-radius: 50%;
            -webkit-animation: spinRight 800ms linear infinite;
            animation: spinRight 800ms linear infinite;
        }

        .circle:before {
            content: '';
            width: 6vmax;
            height: 6vmax;
            display: block;
            position: absolute;
            top: calc(50% - 3vmax);
            left: calc(50% - 3vmax);
            border-left: 3px solid #4a9b38;
            border-radius: 100%;
            -webkit-animation: spinLeft 800ms linear infinite;
            animation: spinLeft 800ms linear infinite;
        }

        .circle:after {
            content: '';
            width: 6vmax;
            height: 6vmax;
            display: block;
            position: absolute;
            top: calc(50% - 3vmax);
            left: calc(50% - 3vmax);
            border-left: 3px solid #4a9b38;
            border-radius: 100%;
            -webkit-animation: spinLeft 800ms linear infinite;
            animation: spinLeft 800ms linear infinite;
            width: 4vmax;
            height: 4vmax;
            top: calc(50% - 2vmax);
            left: calc(50% - 2vmax);
            border: 0;
            border-right: 2px solid #1a4332;
            -webkit-animation: none;
            animation: none;
        }

        .social-icons ul li a:hover {
            color: #4a9b38;
            /* Optional: Darker shade on hover */
        }

        /* Pop-up container positioned at the top-right corner under the navbar */
        .popup {
            display: none;
            /* Hidden by default */
            position: absolute;
            top: 75px;
            /* Just below the navbar */
            right: 200px;
            /* Positioned near the right edge */
            width: 300px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1000;
            /* Ensure it's on top */
            animation: slideDown 0.5s ease;
            /* Animation for smooth entry */
            opacity: 1;
            border-radius: 10px;
        }

        /* Animation to slide the pop-up down */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Style for the arrow pointing to the target button */
        .arrow {
            position: absolute;
            top: -10px;
            right: 130px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #f9f9f9;
        }

        .footer-area {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* Center the text within the element */
            height: 100%;
            /* Ensure the content takes the full height of the container */
        }

        .list-unstyled {
            padding-left: 0;
        }

        .site-footer__bottom-menu {
            position: relative;
            display: flex;
            align-items: center;
        }

        .site-footer__bottom-menu li {
            position: relative;
            display: block;
        }

        .site-footer__bottom-menu li:before {
            content: "";
            position: absolute;
            top: 10px;
            bottom: 10px;
            right: -20px;
            width: 1px;
            background-color: white;
            transform: rotate(15deg);
        }

        .site-footer__bottom-menu li:last-child:before {
            display: none;
        }

        .site-footer__bottom-menu li+li {
            margin-left: 40px;
        }

        .site-footer__bottom-menu li a {
            position: relative;
            display: inline-block;
            font-size: 14px;
            color: white;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .site-footer__bottom-menu li a:hover {
            color: #4a9b38;
        }
    </style>
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
    <script src="assets/js/owl.carousel.min.js"></script>
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
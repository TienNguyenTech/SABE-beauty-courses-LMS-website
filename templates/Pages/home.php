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
<style>
    /* General styles for header area */
    .top-header-area {
        width: 100%;
        padding: 10px 0;
    }

    div.footer-area {
        max-height: 400px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .top-header-area {
            width: 100%;
            padding: 0px 0;
        }

        .site-logo {
            display: none;
        }
    }

    /* Media query for mobile devices */
    @media only screen and (max-width: 767.96px) {
        .top-header-area {
            width: 100%;
            padding: 0px 0;
        }

        .site-logo {
            display: none;
            /* Hide the logo in mobile mode */
        }

        div.footer-area {
            max-height: 750px;
        }

        .social-icons.footer-box.subscribe {
            margin: 0;
        }
    }
</style>
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

<body>

    <!--PreLoader-->
    <div class="loader">
        <?php /* <?= $this->ContentBlock->image('logo-dark', ['alt' => 'South Adelaide Beauty and Education logo', 'class' => 'logo-image']) ?> */ ?>

        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker" style="background-color: #1a4332; opacity: 0.85;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <?= $this->Html->link(
                                $this->ContentBlock->image('logo', ['style' => 'width: 100px; height: 100px;']),
                                '/',
                                ['escape' => false]
                            ) ?>
                        </div>



                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu"
                            style="position: relative; top: 50%; -webkit-transform: translateY(50%); -ms-transform: translateY(50%); transform: translateY(50%);">
                            <ul>
                                <li><?= $this->Html->link("Home", "/") ?></li>


                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses']) ?>
                                </li>


                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services']) ?>
                                </li>

                                <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?>
                                </li>

                                <li><?= $this->Html->link("Murad", ['controller' => 'BeautyByLisa', 'action' => 'murad']) ?>
                                </li>


                                <li style="float: right">
                                    <?php
                                    if ($this->Identity->isLoggedIn()) {
                                        echo $this->Html->link(
                                            'Dashboard',
                                            ['controller' => 'AdminDashboard', 'action' => 'dashboard'],
                                            ['class' => 'button button-outline']
                                        );
                                        ?>
                                    </li>
                                    <li style="float: right">
                                        <?php
                                        echo $this->Html->link(
                                            'Log out',
                                            ['controller' => 'Auth', 'action' => 'logout'],
                                            ['class' => 'button button-outline',]
                                        ); //'onclick' => 'return confirm("Are you sure you want to leave?");'

                                    } else {
                                        echo $this->Html->link(
                                            'Log in',
                                            ['controller' => 'Auth', 'action' => 'login'],
                                            ['class' => 'button button-outline']
                                        );
                                    }
                                    ?>
                                </li>
                            </ul>
                        </nav>
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
    <div class="product-section mt-100 mb-150">
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
                                <h3><?= h($course->course_name); ?></h3>
                                <p class="product-price">
                                    <span><?= h(strlen($course->course_description) > 100 ? substr($course->course_description, 0, 100) . '...' : $course->course_description) ?></span>
                                    $<?= h($course->course_price); ?>
                                </p>
                                <a href="<?= $this->Url->build(['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?>"
                                    class="whiteb-btn" style="margin-bottom: 10px"><i class="fas fa-info-circle"></i> View
                                    More</a>
                                <a href="<?= $this->Url->build(['controller' => 'Payments', 'action' => 'checkout', $course->course_id]) ?>"
                                    class="bordered-btn"><i class="fas fa-user-graduate"></i> Enroll Now</a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            </div>


        </div>
    </div>


    <!--Welcome One Start-->
    <section class="welcome-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="welcome-one__left">
                        <div class="welcome-one__img-box wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="welcome-one__img">
                                <?= $this->Html->image('meet-lisa.jpg', ['alt' => 'Meet Lisa']) ?>

                                <div class="welcome-one__shape-1 float-bob-y">
                                    <img src="assets/images/shapes/welcome-one-shape-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="welcome-one__right" style="margin-top: 70px;">
                        <div class="section-title text-left">
                            <span class="section-title__tagline" style="color:#4a9b38;">Get to know us</span>
                            <h2 class="section-title__title">Meet Lisa
                                <br> The Founder
                            </h2>
                        </div>
                        <p class="welcome-one__text">I'm Lisa, the CEO of South Adelaide Beauty and Education, I have
                            over two decades of
                            experience as a beauty therapist. I am armed with a current diploma in Beauty Therapy and
                            a cert 4 in Training and Assessment with many years of teaching experience. I’m extremely
                            passionate about delivering quality training that will enhance the overall standard of our
                            beauty industry.
                            <br>
                            <br>
                            It might surprise you that the beauty industry remains largely unregulated, allowing
                            individuals to claim the title of a beauty therapist after merely watching a YouTube video.
                            At South Adelaide Beauty & Education, we're working to ensure that the therapists out
                            there are of the highest quality.
                        </p>

                        <!--                        <div class="welcome-one__btn-box">-->
                        <!--                            <a href="--><?php //= $this->Url->build(['controller' => 'BeautyByLisa', 'action' => 'services']) ?><!--" class="bordered-btn">Discover more</a>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Welcome One End-->

    <style>
        /*--------------------------------------------------------------
# Welcome One
--------------------------------------------------------------*/
        .welcome-one {
            position: relative;
            display: block;
            padding: 50px 0 50px;
            z-index: 1;
        }

        .welcome-one__left {
            position: relative;
            display: block;
            margin-right: 70px;
        }

        .welcome-one__img-box {
            position: relative;
            display: block;
        }

        .welcome-one__img {
            position: relative;
            display: block;
            z-index: 1;
        }

        .welcome-one__img::before {
            content: "";
            position: absolute;
            top: -70px;
            right: -70px;
            bottom: -70px;
            left: 70px;
            background-color: var(--mellis-extra);
            z-index: -1;
        }

        .welcome-one__img img {
            width: 100%;
        }

        .welcome-one__shape-1 {
            position: absolute;
            top: -57px;
            left: -93px;
            z-index: -1;
        }

        .welcome-one__shape-1 img {
            width: auto;
        }

        .welcome-one__right {
            position: relative;
            display: block;
            margin-left: 70px;
        }

        .welcome-one__right .section-title {
            margin-bottom: 38px;
        }

        .welcome-one__points {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: -8px;
            margin-top: 43px;
        }

        .welcome-one__points li {
            position: relative;
            display: flex;
        }

        .welcome-one__points li+li {
            margin-left: 31px;
        }

        .welcome-one__points li .icon {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }

        .welcome-one__points li .icon span {
            position: relative;
            display: inline-block;
            font-size: 64px;
            color: var(--mellis-base);
            -webkit-transition: all 500ms linear;
            transition: all 500ms linear;
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
        }

        .welcome-one__points li:hover .icon span {
            transform: scale(.9);
        }

        .welcome-one__points li .text {
            position: relative;
            display: block;
        }

        .welcome-one__points li .text h3 {
            font-size: 18px;
            margin-bottom: 4px;
        }

        .welcome-one__btn-box {
            position: relative;
            display: block;
            margin-top: 41px;
        }

        /*--------------------------------------------------------------
# services One
--------------------------------------------------------------*/
        .services-one {
            position: relative;
            display: block;
            padding-bottom: 90px;
            overflow: hidden;
            z-index: 1;
        }

        .services-one__single {
            position: relative;
            display: block;
            background-color: rgb(255, 255, 255);
            box-shadow: 0px 10px 60px 0px rgba(0, 0, 0, 0.07);
            text-align: center;
            border: 1px solid transparent;
            margin-bottom: 30px;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .services-one__single-inner {
            position: relative;
            display: block;
            padding: 60px 60px 56px;
            overflow: hidden;
        }

        .services-one__shape-1 {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 1;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .services-one__shape-1 img {
            width: auto;
        }

        .services-one__single:hover .services-one__shape-1 {
            opacity: 0;
        }

        .services-one__shape-2 {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .services-one__shape-2 img {
            width: auto;
        }

        .services-one__single:hover .services-one__shape-2 {
            opacity: 1;
        }

        .services-one__single:hover {
            border: 1px solid var(--mellis-base);
        }

        .services-one__img-box {
            position: relative;
            display: block;
            width: 196px;
            margin: 0 auto;
        }

        .services-one__img {
            position: relative;
            display: block;
            overflow: hidden;
            border-radius: 50%;
            z-index: 1;
        }

        .services-one__img:before {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            content: "";
            border-radius: 50%;
            background-color: rgba(var(--mellis-black-rgb), .50);
            transform: scale(0);
            transition: all 500ms ease;
            z-index: 1;
        }

        .services-one__single:hover .services-one__img:before {
            transform: scale(1);
        }

        .services-one__img img {
            width: 100%;
            border-radius: 50%;
            transition: all 500ms ease;
        }

        .services-one__single:hover .services-one__img img {
            transform: scale(1.2)
        }

        .services-one__icon {
            position: absolute;
            bottom: -40px;
            width: 91px;
            left: 50%;
            right: 0;
            height: 91px;
            background-color: var(--mellis-base);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translateX(-50%);
            z-index: 2;
        }

        .services-one__icon span {
            position: relative;
            display: inline-block;
            font-size: 47px;
            color: var(--mellis-white);
            -webkit-transition: all 500ms linear;
            transition: all 500ms linear;
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
        }

        .services-one__single:hover .services-one__icon span {
            transform: scale(.9);
        }

        .services-one__title {
            font-size: 24px;
            margin-bottom: 14px;
            margin-top: 58px;
        }

        .services-one__title a {
            color: var(--mellis-black);
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .services-one__title a:hover {
            color: var(--mellis-base);
        }

        .services-one__btn-box {
            position: relative;
            display: block;
            margin-top: 25px;
            border-top: 1px solid var(--mellis-bdr-color);
            padding-top: 26px;
        }

        .services-one__btn {
            font-size: 12px;
            font-weight: 600;
            line-height: 12px;
            text-transform: uppercase;
            letter-spacing: var(--mellis-letter-spacing);
            color: var(--mellis-black);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .services-one__btn:hover {
            color: var(--mellis-base);
        }

        .services-one__btn i {
            position: relative;
            margin-left: 10px;
            font-size: 16px;
        }
    </style>


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
    
    </div>
    <!-- end product section -->
    </div>
    <!-- End of Product Setion -->
    <style>
        .abt-section .abt-text {
            padding: 50px;
            padding-left: 30px;
            text-align: center;
            /* Center-align text and elements inside .abt-text */
        }

        .abt-text h2 {
            margin-bottom: 20px;
            /* Add some space below the title */
        }

        .abt-text .image-container {
            display: flex;
            justify-content: center;
            /* Center-align images */
            gap: 10px;
            /* Optional: Add some space between images */
            margin-bottom: 20px;
            /* Add space below images */
        }

        .abt-text .image-container img {
            max-width: 100%;
            /* Ensure images are responsive */
            height: auto;
            /* Maintain aspect ratio */
        }

        .abt-text .link-container {
            text-align: center;
            /* Center-align the button */
        }

        .abt-text p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .abt-text p.top-sub {
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .abt-text p:last-child {
            margin-bottom: 0;
        }
    </style>


    <div class="abt-text text-center">
        <h2 style="margin-bottom: 30px;">We Stock <span class="orange-text">Murad</span></h2>
        <div>
            <div class="image-gallery row">
                <div class="col-4">
                    <div class="image-wrapper">
                        <img src="assets/img/murad-1.jpg" alt="Murad Product 1" class="img-fluid">
                    </div>
                </div>
                <div class="col-4">
                    <div class="image-wrapper">
                        <img src="assets/img/murad-2.jpg" alt="Murad Product 2" class="img-fluid">
                    </div>
                </div>
                <div class="col-4">
                    <div class="image-wrapper">
                        <img src="assets/img/murad-3.jpg" alt="Murad Product 3" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="link-container mt-3" style="margin-bottom:60px;">
                <?= $this->Html->link("Learn More", ['controller' => 'BeautyByLisa', 'action' => 'murad'], ['class' => 'borderedx-btn']) ?>
            </div>
        </div>

        <style>
            /* Center the text */
            .text-center {
                text-align: center;
            }

            /* Image gallery styling */
            .image-gallery {
                margin: 0 auto;
                max-width: 1350px;
                margin-bottom: 30px;
                /* Adjust the maximum width as needed */
            }

            .col-4 {
                padding: 0 5px;
                /* Add some spacing between columns */

            }

            .image-wrapper {
                position: relative;
                overflow: hidden;
                height: 500px;
                /* Set a fixed height */
            }

            .img-fluid {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: 500px;
                object-fit: contain;
                /* Ensure the entire image is visible */
                object-fit: cover;

            }

            /* Button styling */
            .link-container {
                display: flex;
                justify-content: center;
                margin-top: 1rem;
                margin-bottom: 2rem;
                /* Adjust spacing as needed */
            }

            .borderedx-btn {
                display: inline-block;
                padding: 12px 30px;
                border: 2px solid #4a9b38;
                /* Màu viền nút */
                color: #4a9b38;
                /* Màu chữ */
                text-decoration: none;
                font-weight: bold;
                border-radius: 30px;
                /* Bo góc nút */
                transition: all 0.3s ease;
                font-size: 1rem;


            }

            .borderedx-btn:hover {
                background-color: #4a9b38;
                /* Màu nền khi hover */
                color: #fff;
                /* Màu chữ khi hover */
            }

            a.borderedx-btn {
                font-family: 'Poppins', sans-serif;
                display: inline-block;
                justify-content: center;
                color: #fff;
                background-color: #4a9b38;
                border: 2px solid #4a9b38;
                padding: 7px 20px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
                /* Add shadow */
                transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;

            }

            a.borderedx-btn:hover {
                background-color: #fff;
                color: #4a9b38;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
                /* Larger shadow on hover */
            }
        </style>



        <section id="instagram-section">
            <div class="section-title" style="margin-bottom: 25px">
                <h3><span class="orange-text">Instagram</span> Gallery</h3>
            </div>
            <!--    <div id="instagram-gallery" style="padding-left: 90px;">-->
            <div class="row d-flex justify-content-between" style="max-width: 1320px; margin: auto">
                <!-- First row -->
                <blockquote class="instagram-media"
                    data-instgrm-permalink="<?= $this->ContentBlock->text('instagram-1') ?>" data-instgrm-version="14"
                    style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 10px; max-width:420px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="<?= $this->ContentBlock->text('instagram-1') ?>"
                            style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                            target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div
                                    style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                    height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                    xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path
                                                    d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div
                                    style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div
                                        style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div
                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_embed&amp;utm_campaign=loading"
                                style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                target="_blank">A post shared by Beauty therapy courses with Adelaide Beauty and
                                Education
                                (@adelaidebeautyandeducation)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
                <blockquote class="instagram-media"
                    data-instgrm-permalink="<?= $this->ContentBlock->text('instagram-2') ?>" data-instgrm-version="14"
                    style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 10px; max-width:420px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="<?= $this->ContentBlock->text('instagram-2') ?>"
                            style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                            target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div
                                    style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                    height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                    xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path
                                                    d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div
                                    style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div
                                        style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div
                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_embed&amp;utm_campaign=loading"
                                style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                target="_blank">A post shared by Beauty therapy courses with Adelaide Beauty and
                                Education
                                (@adelaidebeautyandeducation)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
                <blockquote class="instagram-media"
                    data-instgrm-permalink="<?= $this->ContentBlock->text('instagram-3') ?>" data-instgrm-version="14"
                    style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 10px; max-width:420px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="<?= $this->ContentBlock->text('instagram-3') ?>"
                            style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                            target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div
                                    style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                    height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                    xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path
                                                    d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div
                                    style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div
                                        style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div
                                        style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div
                                        style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div
                                        style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div
                                        style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div
                                style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_embed&amp;utm_campaign=loading"
                                style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                                target="_blank">A post shared by Beauty therapy courses with Adelaide Beauty and
                                Education
                                (@adelaidebeautyandeducation)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
        </section>

        <style>
            .instagram-media {
                margin: 10px;
                max-width: 420px;
            }


            #instagram-gallery {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                /* 4 ảnh mỗi hàng */
                gap: 10px;
                /* Khoảng cách giữa các ảnh */
                padding: 0 20px;
                /* Khoảng cách từ hai bên màn hình vào lưới ảnh */
                max-width: 1200px;
                /* Đặt giới hạn chiều rộng tối đa nếu cần */
                margin: 0 auto;
                /* Canh giữa lưới ảnh trong màn hình */
            }

            .grid-portfolio .portfolio-item {
                margin: 15px 0px;
            }

            .portfolio-item .hover-effect .hover-content {
                position: absolute;
                text-align: left;
                width: 100%;
                bottom: 5px;
                left: 0;
            }


            .grid-portfolio .portfolio-item h1 {
                position: relative;
                font-size: 22px;
                text-transform: uppercase;
                color: #fff;
                display: inline-block;
                padding-left: 20px;
                line-height: 15px;
                transform: translateY(25px);
                transition: .5s ease-in-out;
                letter-spacing: 0.5px;
            }

            .grid-portfolio .portfolio-item em {
                font-style: normal;
                font-weight: 200;
            }

            .grid-portfolio .portfolio-item:hover h1 {
                transform: translateY(0);
            }

            .grid-portfolio .portfolio-item p {
                padding-left: 20px;
                font-weight: 300 !important;
                letter-spacing: 0.5px;
                font-size: 14px;
                color: #fff;
                opacity: 0;
                transform: translateY(10px);
                transition: .5s ease-in-out;
                text-transform: uppercase;
            }

            .grid-portfolio .portfolio-item:hover p {
                opacity: 1;
                transform: translateY(0);
            }

            .grid-portfolio .load-more-button {
                margin-top: 15px;
            }

            .grid-portfolio .load-more-button a {
                width: 100%;
                height: 80px;
                display: inline-block;
                text-align: center;
                line-height: 80px;
                font-size: 15px;
                text-transform: uppercase;
                text-decoration: none;
                letter-spacing: 1px;
                color: #fff;
                background-color: #313131;
                transition: all 0.5s;
            }

            .grid-portfolio .load-more-button a:hover {
                color: rgba(250, 250, 250, 0.5);
            }

            #instagram-gallery {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                /* 4 ảnh mỗi hàng */
                gap: 10px;
                /* Khoảng cách giữa các ảnh */
                padding: 0 20px;
                /* Khoảng cách từ hai bên màn hình vào lưới ảnh */
                max-width: 1000px;
                /* Đặt giới hạn chiều rộng tối đa nếu cần */
                margin: 0 auto;
                /* Canh giữa lưới ảnh trong màn hình */
            }

            #instagram-gallery a {
                display: block;
                aspect-ratio: 1/1;
                overflow: hidden;
            }

            #instagram-gallery img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /*This is the Instagram net*/
            #instagram-section {
                text-align: center;
                /* Canh giữa tiêu đề và nút */
                padding: 40px 20px;
                /* Khoảng cách trên và dưới của section */
            }

            #instagram-section h2 {
                font-size: 2rem;
                margin-bottom: 20px;
                color: #333;
                /* Thay đổi màu chữ tùy ý */
            }

            #instagram-gallery {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
                padding: 0 20px;
                max-width: 1150px;
                margin: 0 auto 30px auto;
                /* Canh giữa lưới ảnh và tạo khoảng cách dưới */
            }

            #instagram-gallery a {
                display: block;
                aspect-ratio: 1/1;
                overflow: hidden;
            }

            #instagram-gallery img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .bordered-btn {
                display: inline-block;
                padding: 12px 30px;
                border: 2px solid #4a9b38;
                /* Màu viền nút */
                color: #4a9b38;
                /* Màu chữ */
                text-decoration: none;
                font-weight: bold;
                border-radius: 30px;
                /* Bo góc nút */
                transition: all 0.3s ease;
                font-size: 1rem;
                width: 150px;
                margin-left: 100px;
            }

            .bordered-btn:hover {
                background-color: #4a9b38;
                /* Màu nền khi hover */
                color: #fff;
                /* Màu chữ khi hover */
            }
        </style>

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
                <div class="row" style="gap: 10px;">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-box get-in-touch">
                            <h2 class="widget-title">Get in Touch</h2>
                            <ul>
                                <li style="font-size: 18px;">
                                    <?= $this->ContentBlock->text('location-address') ?>,
                                    <?= $this->ContentBlock->text('location-suburb') ?>,
                                    <br><?= $this->ContentBlock->text('location-state') ?>,
                                    <?= $this->ContentBlock->text('location-postcode') ?>.
                                </li>
                                <li style="font-size: 18px;"><?= $this->ContentBlock->text('contact-email') ?></li>
                                <li style="font-size: 18px;">(+61) <?= $this->ContentBlock->text('contact-phone') ?>
                                </li>

                                <!--                            <li>--><?php //= $this->ContentBlock->text('location-address') ?><!--,-->
                                <!--                                --><?php //= $this->ContentBlock->text('location-suburb') ?><!--,-->
                                <!--                                <br>--><?php //= $this->ContentBlock->text('location-state') ?><!--,-->
                                <!--                                --><?php //= $this->ContentBlock->text('location-postcode') ?><!--.-->
                                <!--                            </li>-->
                                <!--                            <li>--><?php //= $this->ContentBlock->text('contact-email') ?><!--</li>-->
                                <!--                            <li>(+61) --><?php //= $this->ContentBlock->text('contact-phone') ?><!--</li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <div class="footer-box pages">
                            <h2 class="widget-title">Pages</h2>
                            <ul>
                                <li><?= $this->Html->link("Home", "/", ['style' => 'font-size: 18px;']) ?></li>
                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services'], ['style' => 'font-size: 18px;']) ?>
                                </li>
                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses'], ['style' => 'font-size: 18px;']) ?>
                                </li>
                                <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add'], ['style' => 'font-size: 18px;']) ?>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-box subscribe">
                            <h2 class="widget-title">Opening Hours</h2>
                            <!--                        <p>Monday to Friday: 9:30 - 20:00</p>-->
                            <p style="font-size: 18px;">Monday to Friday: 9:30 - 20:00</p>

                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-12">
                        <div class="social-icons footer-box subscribe">
                            <ul style="display: flex; gap: 10px;">
                                <!-- Flexbox for horizontal layout and gap between icons -->
                                <li><a href="https://www.facebook.com/adelaidebeautyandeducation" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a></li>
                                <li><a href="https://www.instagram.com/adelaidebeautyandeducation" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a></li>
                                <!-- Additional icons can be added here if needed -->
                                <div class="site-logo"></div>
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




        <!-- end copyright -->

        <!-- IMPOTANT: THIS IS NEW LAYOUT FOR THE HOMEPAGE, WILL BE MOVED TO A SEPEREATE CSS IN THE END -->
        <!-- IMPOTANT: THIS IS NEW LAYOUT FOR THE HOMEPAGE, WILL BE MOVED TO A SEPEREATE CSS IN THE END -->
        <style>
            .footer-area {
                background-color: #1a4332;
                padding: 150px 0px;
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
                font-size: 18px;
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
                justify-content: center;
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
                /* Adjust to position the image above the spinner */
                z-index: 1112;
                /* Ensure the image is above the spinner */
                width: 300px;
                /* Adjust size as needed */
                height: 300px;
                margin: 200px auto auto;
                display: block;
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

            .fa-angle-right:before {
                color: #4a9b38;
            }

            .fa-angle-left:before {
                color: #4a9b38;
            }

            a.cart-btn {
                -webkit-transition: 0.3s;
                -o-transition: 0.3s;
                transition: 0.3s;
            }

            a.cart-btn:hover {
                background-color: #1a4332;
                color: #4a9b38;
            }

            a.cart-btn {
                font-family: 'Poppins', sans-serif;
                display: inline-block;
                background-color: #4a9b38;
                color: #fff;
                padding: 10px 20px;
                width: 150px;
                margin-left: 100px;
            }

            a.cart-btn i {
                margin-right: 5px;
            }

            #instagram-section {
                text-align: center;
                /* Canh giữa tiêu đề và nút */
                padding: 40px 20px;
                /* Khoảng cách trên và dưới của section */
                background-color: #f9f9f9;
                /* Màu nền của section */
            }

            #instagram-section h2 {
                font-size: 2rem;
                margin-bottom: 30px;
                color: #333;
                /* Màu chữ */
                text-transform: uppercase;
                /* Chữ in hoa */
                font-weight: 700;
                /* Chữ đậm */
                letter-spacing: 2px;
                /* Khoảng cách giữa các chữ */
            }

            #instagram-gallery {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
                max-width: 1150px;
                margin: 0 auto 40px auto;
                /* Canh giữa lưới ảnh và tạo khoảng cách dưới */
                padding: 0 20px;
            }

            #instagram-gallery a {
                display: block;
                aspect-ratio: 1/1;
                overflow: hidden;
            }

            #instagram-gallery img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 8px;
                /* Bo góc các hình ảnh */
                transition: transform 0.3s ease;
            }

            #instagram-gallery img:hover {
                transform: scale(1.05);
                /* Phóng to hình ảnh khi hover */
            }


            .whiteb-btn {
                display: inline-block;
                padding: 12px 30px;
                border: 2px solid #4a9b38;
                /* Màu viền nút */
                color: #4a9b38;
                /* Màu chữ */
                text-decoration: none;
                font-weight: bold;
                border-radius: 30px;
                /* Bo góc nút */
                transition: all 0.3s ease;
                font-size: 1rem;
                width: 150px;
                margin-left: 100px;
            }

            .whiteb-btn:hover {
                background-color: #4a9b38;
                /* Màu nền khi hover */
                color: #fff;
                /* Màu chữ khi hover */

            }

            a.whiteb-btn {
                font-family: 'Poppins', sans-serif;
                display: inline-block;
                color: #4a9b38;
                background-color: #fff;
                border: 2px solid #4a9b38;
                padding: 7px 20px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
                /* Add shadow */
                transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;

            }

            a.whiteb-btn:hover {
                background-color: #4a9b38;
                color: #fff;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
                /* Larger shadow on hover */
            }

            .footer-box.pages ul li a:hover {
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

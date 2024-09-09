<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">



    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/jquery.meanmenu.min.js"></script>
    <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="https://kit.fontawesome.com/5a7bde2211.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
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
    <div class="top-header-area" id="sticker" style="background-color: #1a4332; opacity: 0.85;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <?= $this->Html->link(
                                $this->ContentBlock->image('logo'),
                                ['controller' => 'Pages', 'action' => 'display', 'home'],
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


    <!-- Fetch content -->
    <?= $this->fetch('content') ?>


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
                                        class="fab fa-tiktok"></i></a></li>
                            <div class="site-logo">-->
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
            <div class="row" style="display: flex">
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
    <style>
        .main-menu-wrap {
            display: flex;

        }

        .main-menu ul {
            display: flex;
            /* Use flexbox to arrange items horizontally */
            list-style: none;
            padding: 0;
            margin: 0;
        }


        .main-menu ul li {
            /*margin: 0 5px;*/
            /* Adjust this value to your desired spacing */
            padding: 0;
        }

        .main-menu ul li a {
            text-decoration: none;
            color: #333;
            /* Update this color to match your design */
            font-weight: bold;
            /* Optional: Make the font bold */
        }

        nav.main-menu ul li a {
            color: #fff;
            font-weight: 700;
            display: block;
            padding: 15px;
        }

        .breadcrumb-section {
            background-color: #f5f5f5;
            /* Set a background color if needed */
            padding: 50px 0;
            /* Add some vertical padding for spacing */
            text-align: center;
            /* Center the text horizontally */
            padding: 150px 0;
            background-size: cover;
            background-position: center center;
            position: relative;
            z-index: 1;
            background-attachment: fixed;
            padding-top: 200px;
        }

        .breadcrumb-text {
            border: none;
            /* Remove any border around the text */
            margin: 0 auto;
            /* Center the text container if it has a set width */
            color: #333;
            /* Update the text color if needed */
        }

        .breadcrumb-text p {
            font-size: 18px;
            /* Adjust the font size for the subtitle */
            margin: 0;
            /* Remove any margin around the paragraph */
        }

        .breadcrumb-text h1 {
            font-size: 36px;
            /* Adjust the font size for the main title */
            margin: 10px 0 0;
            /* Add some margin for spacing */
        }

        .site-logo {
            margin-right: 450px;
            /* Adjust this value to increase spacing */
            float: left;
            max-width: 150px;
            padding: 6px 0;
        }

        .header-icons {
            margin-left: 150px;
            /* Adjust this value to increase spacing */
        }


        .header-icons a {
            color: #fff;
            display: inline-block;
            padding: 10px;
        }

        body {
            margin: 0;
            /* Removes default margin */
        }

        div.sticky-wrapper.is-sticky .top-header-area {
            background-color: #1B4332;
           /*padding: 15px 0;*/
        }

        .cart-btn {
            display: inline-block;
            background-color: #74C69D;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .cart-btn:hover {
            background-color: #B7E4C7;
        }

        /* Footer Area Styles */
        .footer-area {
            background-color: #1B4332;
            /* Dark background color */
            color: #B7E4C7;
            /* White text color */
            padding: 60px 0;
            /* Padding for top and bottom */
            font-family: 'Arial', sans-serif;
            /* Font family */
        }

        .footer-area .container {
            max-width: 1200px;
            /* Max width of the container */
            margin: 0 auto;
            /* Center the container */
            padding: 0 15px;
            /* Padding for left and right */
        }

        .footer-row {
            display: flex;
            /* Use flexbox for horizontal layout */
            justify-content: space-between;
            /* Distribute space between items */
            flex-wrap: wrap;
            /* Allow wrapping on smaller screens */
        }

        .footer-box {
            flex: 1;
            /* Grow to fill space */
            min-width: 200px;
            /* Minimum width for each box */
            margin-right: 30px;
            /* Space between boxes */
            box-sizing: border-box;
            /* Include padding and border in the width */
        }

        .footer-box:last-child {
            margin-right: 0;
            /* Remove margin from the last box */
        }

        .footer-box .widget-title {
            font-size: 18px;
            /* Title font size */
            font-weight: bold;
            /* Title font weight */
            margin-bottom: 20px;
            /* Space below the title */
        }

        .footer-box p {
            font-size: 14px;
            /* Paragraph font size */
            line-height: 1.6;
            /* Line height for readability */
        }

        .footer-box ul {
            list-style-type: none;
            /* Remove bullet points */
            padding: 0;
            /* Remove padding */
        }

        .footer-box ul li {
            margin-bottom: 10px;
            /* Space below each list item */
        }

        .footer-box a {
            color: #fff;
            /* Link color */
            text-decoration: none;
            /* Remove underline */
            transition: color 0.3s ease;
            /* Transition for hover effect */
        }

        .footer-box a:hover {
            color: #B7E4C7;
            /* Link color on hover */
        }

        .footer-box form {
            display: flex;
            /* Flexbox for alignment */
            align-items: center;
            /* Center vertically */
        }

        .footer-box input[type="email"] {
            padding: 10px;
            /* Padding for input */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            margin-right: 10px;
            /* Space between input and button */
            flex-grow: 1;
            /* Grow to fill space */
        }

        .footer-box button {
            background-color: #95D5B2;
            /* Button background color */
            color: #333;
            /* Button text color */
            padding: 10px 15px;
            /* Button padding */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor */
            transition: background-color 0.3s ease;
            /* Transition for hover effect */
        }

        .footer-box button:hover {
            background-color: #D8F3DC;
            /* Button background color on hover */
        }

        /* Copyright Area Styles */
        .copyright {
            background-color: #1B4332;
            /* Darker background color */
            color: #ccc;
            /* Lighter text color */
            padding: 20px 0;
            /* Padding for top and bottom */
        }

        .copyright .container {
            max-width: 1200px;
            /* Max width of the container */
            margin: 0 auto;
            /* Center the container */
            padding: 0 15px;
            /* Padding for left and right */
        }

        .copyright p {
            margin: 0;
            /* Remove default margin */
            font-size: 14px;
            /* Font size */
        }

        .social-icons ul {
            list-style-type: none;
            /* Remove bullet points */
            padding: 0;
            /* Remove padding */
            /*display: flex;*/
            /*!* Flexbox for alignment *!*/
            /*justify-content: flex-end;*/
            /* Align to the right */
        }

        .social-icons ul li {
            margin-left: 10px;
            /* Space between social icons */
        }

        .social-icons ul li a {
            color: #fff;
            /* Icon color */
            font-size: 16px;
            /* Icon font size */
            transition: color 0.3s ease;
            /* Transition for hover effect */
        }

        .social-icons ul li a:hover {
            color: #B7E4C7;
            /* Icon color on hover */
        }

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
            background-color: #4a9b38;
            content: "";
        }

        h2,
        .h2 {
            font-size: 3rem;
            font-weight: 700;
            line-height: 3.25rem;
        }

        @media only screen and (max-width: 767.96px) {

            h2,
            .h2 {
                font-size: 2.5rem;
                line-height: 2.75rem;
            }
        }

        @media only screen and (max-width: 575.96px) {

            h2,
            .h2 {
                font-size: 2rem;
                line-height: 2.25rem;
            }
        }

        /* Loader */
        .loader {
            bottom: 0;
            height: 100%;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 1111;
            background: white;
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

        .breadcrumb-section:after {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            content: "";
            background-color: transparent;
            z-index: -1;
            opacity: 0.8;
        }
    </style>
</body>

</html>

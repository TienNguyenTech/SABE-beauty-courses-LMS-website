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

    <title><?= $this->fetch('title') ?></title>

    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <style>
        .main-menu-wrap {
            display: flex;
            justify-content: center;
            /* Center all content in the flex container */
            align-items: center;
        }

        .main-menu ul {
            display: flex;
            /* Use flexbox to arrange items horizontally */
            list-style: none;
            padding: 0;
            margin: 0;
        }


        .main-menu ul li {
            margin: 0 5px;
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
            margin-right: 150px;
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
            padding: 15px 0;
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

        



    </style>
    <!-- PreLoader -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!-- PreLoader Ends -->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <?= $this->Html->link(
                                $this->Html->image('logo.png', ['alt' => 'Logo']),
                                ['controller' => 'Pages', 'action' => 'display', 'home'],
                                ['escape' => false]
                            ) ?>
                        </div>

                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>

                                <li><?= $this->Html->link("Home", "/") ?></li>


                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'viewc']) ?>
                                </li>
                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'Lisa', 'action' => 'viewlisa']) ?></li>
                                <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?></li>

                                <ul class="header-nav">
                                    <li>
                                        <div class="header-icons">
                                            <?php
                                            if ($this->Identity->isLoggedIn()) {

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
                                        </div>
                                </ul>

                            </ul>
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

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                       <!-- <p>Pretty and Bright</p>-->
                        <h1>Our Courses</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- Fetch content -->
    <?= $this->fetch('content') ?>

    <style>
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
            display: flex;
            /* Flexbox for alignment */
            justify-content: flex-end;
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
    </style>
    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Welcome to South Adelaide Beauty & Education!
                           We are so happy you found us, and we can’t wait to begin this journey with you. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, Halett Cove, South Australia</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
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
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.</p>
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


</body>

</html>

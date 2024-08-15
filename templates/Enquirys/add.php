<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Contact</title>

    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../assets/css/responsive.css">

</head>
<body>

    <!--PreLoader-->
<!--    <div class="loader">-->
<!--        <div class="loader-inner">-->
<!--            <div class="circle"></div>-->
<!--        </div>-->
<!--    </div>-->
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
                                <img src="assets/img/logo.png" alt="">
                            </a>
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
                            </ul>
                        </nav>
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
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section" style="background-image: url('../assets/img/hero-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Contact us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Contact us</h2>
                        <p>Any questions regarding our courses or available services? Feel free to contact us for more information.</p>
                    </div>
                    <?= $this->Flash->render('positive') ?>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <?= $this->Form->create($enquiry) ?>
                        <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                            <p>
                                <?= $this->Form->control('enquiry_name', ['placeholder' => 'Enter your name', 'label' => 'Full Name *']) ?>
<!--                                <input type="text" placeholder="Name" name="name" id="name">-->
                                <?= $this->Form->control('enquiry_email', ['placeholder' => 'Enter your email address', 'label' => 'Email Address *', 'type' => 'email']) ?>
<!--                                <input type="email" placeholder="Email" name="email" id="email">-->
                            </p>
                            <p>
<!--                                <input type="text" placeholder="Subject" name="subject" id="subject">-->
                                <?= $this->Form->control('enquiry_subject', ['placeholder' => 'Enter enquiry subject', 'label' => 'Subject *']) ?>
                            </p>
                            <p>
<!--                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>-->
                                <?= $this->Form->control('enquiry_message', ['type' => 'textarea', 'placeholder' => 'Enter your message', 'label' => 'Message *']) ?>
                            </p>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            <p><input type="submit" value="Submit"></p>
                        </form>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i> Social Media</h4>
                            <a href="http://www.tiktok.com/@adelaidebeauty_education"><p><i class="fa-brands fa-tiktok"></i>Tiktok</p></a>
                            <a href="http://instagram.com/adelaidebeautyandeducation"><p><i class="fa-brands fa-instagram"></i>Instagram</p></a>
                            <a href="http://www.facebook.com/adelaidebeautyandeducation"><p><i class="fa-brands fa-facebook"></i>Facebook</p></a>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i> Contact</h4>
                            <p>Phone: <?= $this->ContentBlock->text('contact-phone') ?> <br> Email: <?= $this->ContentBlock->text('contact-email') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->

    <!-- find our location -->
<!--    <div class="find-location blue-bg">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-12 text-center">-->
<!--                    <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- end find our location -->
<!---->
    <!-- google map section -->
<!--    <div class="embed-responsive embed-responsive-21by9">-->
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>-->
<!--    </div>-->
    <!-- end google map section -->

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
                                <li>Halett Cove, South Australia</li>
                                <li>beautybylisafollett@gmail.com</li>
                            </ul>
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
                        <p>Copyrights &copy; 2024 South Adelaide Beauty & Education</p>
                    </div>
                    <div class="col-lg-6 text-right col-md-12">
                        <div class="social-icons">
                            <ul>
                                <li><a href="http://instagram.com/adelaidebeautyandeducation" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="http://www.facebook.com/adelaidebeautyandeducation" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="../assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="../assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="../assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="../assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="../assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="../assets/js/sticker.js"></script>
    <!-- form validation js -->
    <script src="../assets/js/form-validate.js"></script>
    <!-- main js -->
    <script src="../assets/js/main.js"></script>

</body>
</html>

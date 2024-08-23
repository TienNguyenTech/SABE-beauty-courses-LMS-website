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
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

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

    <!-- reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        /* Add any additional styles here */

        /* Style for the submit button */
        .submit-button {
            background-color: #149063;
            cursor: not-allowed;
            /* Button is not clickable initially */
        }

        .submit-button.enabled {
            cursor: pointer;
            /* Change cursor when button is enabled */
        }
    </style>
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
    <!-- end search area -->

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
    <style>
        .submit-button {
            background-color: #007bff;
            /* Blue background */
            color: white;
            /* White text */
            border: none;
            /* Remove default border */
            padding: 10px 20px;
            /* Add padding */
            font-size: 16px;
            /* Font size */
            border-radius: 5px;
            /* Rounded corners */
            cursor: not-allowed;
            /* Default cursor for disabled state */
            opacity: 0.5;
            /* Dimmed by default */
            transition: opacity 0.3s ease, background-color 0.3s ease;
            /* Smooth transition */
            width: 20%;
            
        }

        .submit-button.enabled {
            cursor: pointer;
            /* Change cursor to pointer when enabled */
            opacity: 1;
            /* Fully visible when enabled */
            background-color: #28a745;
            /* Green background when enabled */
        }

        .submit-button:active {
            background-color: #218838;
            /* Darker green on click */
        }
    </style>

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Contact us</h2>
                        <p>Any questions regarding our courses or available services? Feel free to contact us for more
                            information.</p>
                    </div>
                    <?= $this->Flash->render('positive') ?>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <?= $this->Form->create($enquiry) ?>
                        <form type="POST" id="contact-form" onSubmit="return validateForm(this);">
                            <p>
                                <?= $this->Form->control('enquiry_name', ['placeholder' => 'Enter your name', 'label' => 'Full Name *', 'required' => true]) ?>
                                <?= $this->Form->control('enquiry_email', ['placeholder' => 'Enter your email address', 'label' => 'Email Address *', 'type' => 'email', 'required' => true]) ?>

                            </p>
                            <p>
                                <?= $this->Form->control('enquiry_subject', ['placeholder' => 'Enter enquiry subject', 'label' => 'Subject *']) ?>
                            </p>
                            <p>
                                <?= $this->Form->control('enquiry_message', ['type' => 'textarea', 'placeholder' => 'Enter your message', 'label' => 'Message *']) ?>
                            </p>
                            <!-- reCAPTCHA widget -->
                            <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                                data-callback="onRecaptchaSuccess" data-expired-callback="onRecaptchaError"></div>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            </br>

                            <div>
                                <p><input type="submit" value="Submit" class="submit-button" id="submit-button"
                                        disabled>
                                </p>
                            </div>
                        </form>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i> Social Media</h4>
                            <a href="http://www.tiktok.com/@adelaidebeauty_education">
                                <p><i class="fa-brands fa-tiktok"></i>Tiktok</p>
                            </a>
                            <a href="http://instagram.com/adelaidebeautyandeducation">
                                <p><i class="fa-brands fa-instagram"></i>Instagram</p>
                            </a>
                            <a href="http://www.facebook.com/adelaidebeautyandeducation">
                                <p><i class="fa-brands fa-facebook"></i>Facebook</p>
                            </a>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i> Contact</h4>
                            <p>Phone: <?= $this->ContentBlock->text('contact-phone') ?>
                                <br> Email: <?= $this->ContentBlock->text('contact-email') ?>
                                <br><br> <?= $this->ContentBlock->text('location-address') ?>,
                                <?= $this->ContentBlock->text('location-suburb') ?>
                                <br> <?= $this->ContentBlock->text('location-state') ?>,
                                <?= $this->ContentBlock->text('location-postcode') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->

    <!-- footer -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item about">
                        <h3>About Us</h3>
                        <p>We are a premier beauty school located in Adelaide, offering a range of beauty courses and
                            professional training. We pride ourselves on our high standards and the quality of our
                            education.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><?= $this->Html->link("Home", "/") ?></li>
                            <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'viewc']) ?>
                            </li>
                            <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'Lisa', 'action' => 'viewlisa']) ?>
                            </li>
                            <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer-item social">
                        <h3>Follow Us</h3>
                        <a href="http://www.tiktok.com/@adelaidebeauty_education"><i
                                class="fa-brands fa-tiktok"></i></a>
                        <a href="http://instagram.com/adelaidebeautyandeducation"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="http://www.facebook.com/adelaidebeautyandeducation"><i
                                class="fa-brands fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Script files -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/jquery.meanmenu.min.js"></script>
    <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        function onRecaptchaSuccess() {
            document.getElementById('submit-button').classList.add('enabled');
            document.getElementById('submit-button').disabled = false;
        }

        function onRecaptchaError() {
            document.getElementById('submit-button').classList.remove('enabled');
            document.getElementById('submit-button').disabled = true;
        }

        function validateForm(form) {
            if (document.getElementById('submit-button').disabled) {
                alert("Please complete the reCAPTCHA to submit the form.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
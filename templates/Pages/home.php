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
                                <h1><?= $this->ContentBlock->text('home-slider-text-1'); ?></h1>
                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Our Services", ['controller' => 'Courses', 'action' => 'viewc'], ['class' => 'boxed-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'boxed-btn']) ?>
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
                                        <?= $this->Html->link("Our Services", ['controller' => 'Courses', 'action' => 'viewc'], ['class' => 'boxed-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'boxed-btn']) ?>
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
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <h1><?= $this->ContentBlock->text('home-slider-text-3'); ?></h1>
                                <div class="hero-btns">
                                    <div class="link-container">
                                        <?= $this->Html->link("Our Services", ['controller' => 'Courses', 'action' => 'viewc'], ['class' => 'boxed-btn']) ?>
                                    </div>
                                    <div class="link-container">
                                        <?= $this->Html->link("Contact us", ['controller' => 'Enquirys', 'action' => 'add'], ['class' => 'boxed-btn']) ?>
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
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <?php $counter = 0; ?>
                <?php foreach ($courses as $course): ?>
                    <?php if ($counter == 6) break; ?>
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
                    <?php $counter++; ?>
                <?php endforeach; ?>
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
            <!-- end testimonial-section -->


            <!-- footer -->

            <!-- footer -->
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box about-widget">
                                <h2 class="widget-title">About us</h2>
                                <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
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
                            <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.</p>
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

<<<<<<< HEAD
=======

>>>>>>> Unified-UI/UX
</html>

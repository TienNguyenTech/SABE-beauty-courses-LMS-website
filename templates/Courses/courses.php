<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Course> $courses
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses</title>
    <link rel="stylesheet" href="webroot/assets/css/main.css">
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>
    <?= $this->Html->css('all.min') ?>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <?= $this->Html->css('owl.carousel') ?>
    <?= $this->Html->css('magnific-popup') ?>
    <?= $this->Html->css('animate') ?>
    <?= $this->Html->css('meanmenu.min') ?>
    <?= $this->Html->css('main') ?>
    <?= $this->Html->css('responsive') ?>

    <!-- jquery -->
    <?= $this->Html->script('jquery-1.11.3.min') ?>
    <!-- bootstrap -->
    <?= $this->Html->script('bootstrap.min') ?>
    <!-- count down -->
    <?= $this->Html->script('jquery.countdown') ?>
    <!-- isotope -->
    <?= $this->Html->script('jquery.isotope-3.0.6.min') ?>
    <!-- waypoints -->
    <?= $this->Html->script('waypoints') ?>
    <!-- owl carousel -->
    <?= $this->Html->script('owl.carousel.min') ?>
    <!-- magnific popup -->
    <?= $this->Html->script('jquery.magnific-popup.min') ?>
    <!-- mean menu -->
    <?= $this->Html->script('jquery.meanmenu.min') ?>
    <!-- sticker js -->
    <?= $this->Html->script('sticker') ?>
    <!-- main js -->
    <?= $this->Html->script('main') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .product-lists {

            /* Space between product items */
            align-items: center;

        }

        .single-product-item {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            margin: 30px;
            padding: 20px;
            text-align: center;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;

            width: 300px;
            height: 470px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 25px;
            position: relative;
        }

        .single-product-item:hover {
            transform: translateY(-5px);
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
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

        .pagination-wrap {
            margin-top: 30px;
        }

        .pagination-wrap ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .pagination-wrap li {
            margin: 0 5px;
        }

        .pagination-wrap a {
            color: #333;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .pagination-wrap a.active,
        .pagination-wrap a:hover {
            background-color: #95D5B2;
            color: #fff;
        }
    </style>

    <style>
        .card-img-top {
            height: 200px;
            /* Consistent height for image frame */
            object-fit: cover;
            /* Ensure image fits within set height */
        }

        .card-body {
            padding: 20px;
            flex-grow: 1;
            /* Allows flexibility for content */
        }

        .card-title {
            font-size: 1.2rem;
            /* Consistent font size for titles */
        }

        .card-text {
            height: 100px;
            /* Fixed height for description */
            overflow: hidden;
            /* Prevents content overflow */
            display: -webkit-box;
            /* Enables multi-line truncation */
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            /* Limit to 5 lines */
            text-overflow: ellipsis;
            /* Shows ellipsis for truncated content */
        }

        .text-muted {
            height: 20px;
            /* Consistent height for the price section */
        }

        .card-footer {
            padding: 10px;
            /* Consistent padding */
            display: flex;
            justify-content: center;
        }

        .rectangle-image-wrapper {
            width: 100%;
            padding-top: 75%;
            /* Maintains aspect ratio for images */
            position: relative;
        }

        .rectangle-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .modalMenuItemPrice {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 1.5rem;

        }
    </style>

</head>

<body>



    <style>
        /* Ensure that the card takes up full width and is properly styled */
        .single-product-item {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .single-product-item:hover {
            transform: scale(1.05);
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            margin: 0;
        }

        .product-price {
            font-size: 1.2em;
            color: #333;
            margin-top: 10px;
        }

        .card-text {
            margin: 10px 0;
        }

        /* Button styling */
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            background-color: #004085;
            transform: translateY(0);
        }

        .breadcrumb-text {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
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

        }

        .bordered-btn:hover {
            background-color: #4a9b38;
            /* Màu nền khi hover */
            color: #fff;
            /* Màu chữ khi hover */
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

        .whiteb-btn {
            display: inline-block;
            padding: 7px 20px;
            /* Match padding of .bordered-btn */
            border: 2px solid #4a9b38;
            color: #4a9b38;
            text-decoration: none;
            font-weight: bold;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-size: 1rem;
            /* Adjust font size if necessary */
            width: 150px;

        }


        .whiteb-btn:hover {
            background-color: #4a9b38;

            color: #fff;

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
    </style>

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section" style="background-image: url('../assets/img/hero-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <!-- <p>Pretty and Bright</p>-->
                        <h1>Courses</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <?= $this->Html->link('Click here to Create an Account', [
                                'controller' => 'Auth',
                                'action' => 'register'
                            ]) ?>
                            <p> Please make sure you have an account and is logged in before you enroll in a course!</p>
                            <br>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".Workshop">Workshop</li>
                            <li data-filter=".Hybrid">Hybrid</li>
                            <li data-filter=".Online">Online</li>
                            <p> All prices are in AUD (Australian Dollars).</p>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                <?php foreach ($courses as $course): ?>
                    <div class="col-lg-4 col-md-6 text-center <?= $course->course_category ?>">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html">
                                    <img src="../<?= $course->course_image ?>" alt="<?= $course->course_name ?>"
                                        class="card-img-top">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $course->course_name ?></h5>
                                <p class="card-text"><?= $course->course_description ?></p>
                                <p class="product-price">$<?= $course->course_price ?></p>
                                <a href="<?= $this->Url->build(['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?>"
                                    class="whiteb-btn" style="margin-bottom: 10px">
                                    <i class="fas fa-info-circle"></i> View More
                                </a>

                                <?php if ($this->Identity->isLoggedIn()): ?>
                                    <!-- If the user is logged in, redirect to the payment page -->
                                    <a href="<?= $this->Url->build(['controller' => 'Payments', 'action' => 'checkout', $course->course_id]) ?>"
                                        class="bordered-btn">
                                        <i class="fas fa-user-graduate"></i> Enroll Now
                                    </a>
                                <?php else: ?>
                                    <!-- If the user is not logged in, redirect to the login page with the courseId -->
                                    <a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'login', '?' => ['courseId' => $course->course_id]]) ?>"
                                        class="bordered-btn">
                                        <i class="fas fa-user-graduate"></i> Enroll Now
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!--        <div class="row product-lists">-->
            <!--            --><?php //foreach ($courses as $course): ?>
            <!--                <div class="col-lg-4 col-md-6 text-center --><?php //= $course->course_category ?><!--">-->
            <!--                    <div class="single-product-item">-->
            <!--                        <div class="product-image">-->
            <!--                            <a href="single-product.html">-->
            <!--                                <img src="/--><?php //= $course->course_image ?><!--" alt="--><?php //= $course->course_name ?><!--" class="card-img-top">-->
            <!--                            </a>-->
            <!--                        </div>-->
            <!--                        <div class="card-body">-->
            <!--                            <h5 class="card-title">--><?php //= $course->course_name ?><!--</h5>-->
            <!--                            <p class="card-text">--><?php //= $course->course_description ?><!--</p>-->
            <!--                            <p class="product-price">$--><?php //= $course->course_price ?><!--</p>-->
            <!--                            <a href="--><?php //= $this->Url->build(['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?><!--" class="cart-btn" style="margin-bottom: 10px"><i class="fas fa-info-circle"></i> View More</a>-->
            <!--                            <a href="--><?php //= $this->Url->build(['controller' => 'Auth', 'action' => 'login', $course->course_id]) ?><!--" class="cart-btn">-->
            <!--                                <i class="fas fa-user-graduate"></i> Enroll Now-->
            <!--                            </a>-->
            <!---->
            <!--                                                            <a href="--><?php //= $this->Url->build(['controller' => 'Payments', 'action' => 'checkout', $course->course_id]) ?><!--" class="cart-btn"><i class="fas fa-user-graduate"></i> Enroll Now</a>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            --><?php //endforeach; ?>
            <!--        </div>-->



        </div>
<<<<<<< HEAD


        <!--        <div class="row product-lists">-->
<!--            --><?php //foreach ($courses as $course): ?>
<!--                <div class="col-lg-4 col-md-6 text-center --><?php //= $course->course_category ?><!--">-->
<!--                    <div class="single-product-item">-->
<!--                        <div class="product-image">-->
<!--                            <a href="single-product.html">-->
<!--                                <img src="/--><?php //= $course->course_image ?><!--" alt="--><?php //= $course->course_name ?><!--" class="card-img-top">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="card-body">-->
<!--                            <h5 class="card-title">--><?php //= $course->course_name ?><!--</h5>-->
<!--                            <p class="card-text">--><?php //= $course->course_description ?><!--</p>-->
<!--                            <p class="product-price">$--><?php //= $course->course_price ?><!--</p>-->
<!--                            <a href="--><?php //= $this->Url->build(['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?><!--" class="cart-btn" style="margin-bottom: 10px"><i class="fas fa-info-circle"></i> View More</a>-->
<!--                            <a href="--><?php //= $this->Url->build(['controller' => 'Auth', 'action' => 'login', $course->course_id]) ?><!--" class="cart-btn">-->
<!--                                <i class="fas fa-user-graduate"></i> Enroll Now-->
<!--                            </a>-->
<!---->
<!--                                                                                       <a href="-->--><?php ////= $this->Url->build(['controller' => 'Payments', 'action' => 'checkout', $course->course_id]) ?><!--<!--" class="cart-btn"><i class="fas fa-user-graduate"></i> Enroll Now</a>-->-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->



=======
>>>>>>> 55a519dae9a33cac0b300fa86c787265a2e3f1d0
    </div>




    <?php
    function truncateDescription($description, $words)
    {
        $wordArray = explode(' ', $description);
        if (count($wordArray) > $words) {
            $wordArray = array_slice($wordArray, 0, $words);
            return implode(' ', $wordArray) . '...';
        }
        return $description;
    }
    ?>



    <!-- end products -->

</body>

</html>

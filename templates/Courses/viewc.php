<?php
/**
* @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Course> $courses
 */
// Sample product data. In a real application, this might come from a database.
$products = [
    [
        'name' => 'Back to Basics: Facials',
        'image' => 'products/product-img-1.jpg',
        'price' => '199$',
        'category' => 'Hybrid'
    ],
    [
        'name' => 'Back to Basics: Lash & Brow',
        'image' => 'assets/img/products/product-img-2.jpg',
        'price' => '199$',
        'category' => 'Hybrid'
    ],
    [
        'name' => 'Total Care: Waxing',
        'image' => 'assets/img/products/product-img-3.jpg',
        'price' => '499$',
        'category' => 'Workshop'
    ],
    [
        'name' => 'Total Care: Nails',
        'image' => 'assets/img/products/product-img-4.jpg',
        'price' => '399$',
        'category' => 'Online'
    ],
    [
        'name' => 'Back To Basics: Customer Connection',
        'image' => 'assets/img/products/product-img-5.jpg',
        'price' => '199$',
        'category' => 'Online'
    ],
    [
        'name' => 'Custom Training',
        'image' => 'assets/img/products/product-img-6.jpg',
        'price' => '599$',
        'category' => 'Hybrid'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="webroot/assets/css/main.css">
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>
    <?= $this->Html->css('all.min') ?> <?= $this->Html->css('owl.carousel') ?>
    <?= $this->Html->css('magnific-popup') ?> <?= $this->Html->css('animate') ?>
    <?= $this->Html->css('meanmenu.min') ?> <?= $this->Html->css('main') ?> <?= $this->Html->css('responsive') ?>
    <!-- jquery --> <?= $this->Html->script('jquery-1.11.3.min') ?> <!-- bootstrap -->
    <?= $this->Html->script('bootstrap.min') ?> <!-- count down --> <?= $this->Html->script('jquery.countdown') ?>
    <!-- isotope --> <?= $this->Html->script('jquery.isotope-3.0.6.min') ?> <!-- waypoints -->
    <?= $this->Html->script('waypoints') ?> <!-- owl carousel --> <?= $this->Html->script('owl.carousel.min') ?>
    <!-- magnific popup --> <?= $this->Html->script('jquery.magnific-popup.min') ?> <!-- mean menu -->
    <?= $this->Html->script('jquery.meanmenu.min') ?> <!-- sticker js --> <?= $this->Html->script('sticker') ?>
    <!-- main js --> <?= $this->Html->script('main') ?> <?= $this->fetch('css') ?> <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        .product-lists {

            /* Space between product items */
            align-items: center;
            /* Center items vertically */
            margin-left: 10%;

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

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".Workshop">Workshop</li>
                        <li data-filter=".Hybrid">Hybrid</li>
                        <li data-filter=".Online">Online</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php foreach ($courses as $course): ?>
            <div class="card <?= $course->course_category ?>">
<!--            <div class="col-lg-4 col-md-6 text-center --><?php //= $course->course_category ?><!--">-->
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="/<?= $course->course_image ?>" alt="Back to Basics: Facials" class="card-img-top">
                        </a>
                    </div>
                    <div class="card-body">

                        <h5 class="card-title"><?= $course->course_name ?></h5>
                        <p class="card-text"><?= $course->course_description ?></p>
                        <p class="product-price"><?= $course->course_price ?></p>
                        <?= $this->Html->link("Enroll Now",['controller' => 'payments', 'action' => 'checkout', $course->course_id])?>


                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
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

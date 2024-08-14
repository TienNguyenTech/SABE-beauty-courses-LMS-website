<?php
// Sample product data. In a real application, this might come from a database.
$products = [
    [
        'name' => 'Strawberry',
        'image' => 'assets/img/products/product-img-1.jpg',
        'price' => '85$',
        'category' => 'strawberry'
    ],
    [
        'name' => 'Berry',
        'image' => 'assets/img/products/product-img-2.jpg',
        'price' => '70$',
        'category' => 'berry'
    ],
    [
        'name' => 'Lemon',
        'image' => 'assets/img/products/product-img-3.jpg',
        'price' => '35$',
        'category' => 'lemon'
    ],
    [
        'name' => 'Avocado',
        'image' => 'assets/img/products/product-img-4.jpg',
        'price' => '50$',
        'category' => ''
    ],
    [
        'name' => 'Green Apple',
        'image' => 'assets/img/products/product-img-5.jpg',
        'price' => '45$',
        'category' => ''
    ],
    [
        'name' => 'Strawberry',
        'image' => 'assets/img/products/product-img-6.jpg',
        'price' => '80$',
        'category' => 'strawberry'
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
            background-color: #f8b400;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .cart-btn:hover {
            background-color: #f39c12;
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
            background-color: #f8b400;
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

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Workshop</li>
                            <li data-filter=".berry">Facial</li>
                            <li data-filter=".lemon">Online</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                    <?php foreach ($courses as $course): ?>
                        <div class="col-lg-4 col-md-6 text-center <?= $course->course_category ?>">
                            <div class="single-product-item" data-course="<?= $course->course_id ?>">
                                <?= $this->Html->image('menu/' . $course->course_image, ['alt' => $course->course_name, 'class' => 'card-img-top']) ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $course->course_name ?></h5>
                                    <p class="card-text"><?= truncateDescription($course->course_description, 20) ?></p>
                                    <p class="product-price"><?= $this->Number->currency($course->course_price) ?> </p>
                                    <a href="cart.html" class="cart-btn">Enroll Now</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

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


            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->

</body>

</html>
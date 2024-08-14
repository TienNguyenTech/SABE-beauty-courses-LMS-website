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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            /* Space between product items */
            align-items: center;
            /* Center items vertically */
            margin-left: 10%;
        }

        .single-product-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            margin: 30px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;

            width: 320px;
            height: 400px;
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
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-6 text-center <?= $product['category'] ?>">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="<?= $product['image'] ?>"
                                        alt="<?= $product['name'] ?>"></a>
                            </div>
                            <h3><?= $product['name'] ?></h3>
                            <p class="product-price"><span>Per Kg</span> <?= $product['price'] ?> </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

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
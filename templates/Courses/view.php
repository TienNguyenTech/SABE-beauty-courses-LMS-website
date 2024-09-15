<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beauty by Lisa Follett</title>
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>
    <!-- Add your CSS files -->
    <?= $this->Html->css('all.min') ?>
    <link rel="stylesheet" href="<?= $this->Url->assetUrl('assets/bootstrap/css/bootstrap.min.css') ?>">
    <?= $this->Html->css('owl.carousel') ?>
    <?= $this->Html->css('magnific-popup') ?>
    <?= $this->Html->css('animate') ?>
    <?= $this->Html->css('meanmenu.min') ?>
    <?= $this->Html->css('main') ?>
    <?= $this->Html->css('responsive') ?>
    <!-- Add your JS files -->
    <?= $this->Html->script('jquery-1.11.3.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.countdown') ?>
    <?= $this->Html->script('jquery.isotope-3.0.6.min') ?>
    <?= $this->Html->script('waypoints') ?>
    <?= $this->Html->script('owl.carousel.min') ?>
    <?= $this->Html->script('jquery.magnific-popup.min') ?>
    <?= $this->Html->script('jquery.meanmenu.min') ?>
    <?= $this->Html->script('sticker') ?>
    <?= $this->Html->script('main') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>



<style>
    /* Custom Styles */
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .header-image {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-bottom: 2px solid #F28123;
    }

    .single-product-img img {
        max-width: 100%;
        height: auto;
    }

    .single-product-content {
        padding-left: 15px;
    }

    .content-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-color: white;
        padding: 20px;
    }

    .content-box {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        width: 100%;
        text-align: center;
    }

    .content-box h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }

    .content-box p {
        font-size: 1rem;
        line-height: 1.5;
        color: #666;
        margin-bottom: 20px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    @media (min-width: 768px) {
        .services-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    .service {
        text-align: left;
    }

    .service h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #4a9b38;
    }

    .service ul {
        list-style-type: disc;
        padding-left: 20px;
        color: #333;
    }

    .service ul li {
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .btn {
        display: inline-block;
        background-color:#081c15;
        color: #dbdbdb;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 700;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #2D6A4F;
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
        background: #4b9b39;
        overflow-x: hidden;
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
        border-right: 4px solid #081C15;
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
        border-left: 3px solid #dbdbdb;
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
        -webkit-animation: spinLeft  200ms linear infinite;
        animation: spinLeft 800ms linear infinite;
        width: 4vmax;
        height: 4vmax;
        top: calc(50% - 2vmax);
        left: calc(50% - 2vmax);
        border: 0;
        border-right: 2px solid #081c15;
        -webkit-animation: none;
        animation: none;
    }

    @-webkit-keyframes spinLeft {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
        }
    }

    @keyframes spinLeft {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
        }
    }

    @-webkit-keyframes spinRight {
        from {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        to {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
    }

    @keyframes spinRight {
        from {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        to {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
    }

    .single-product-img img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Center horizontally */
    }
</style>

<body>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg" style="background-image: url('<?= $this->Url->assetUrl('assets/img/hero-bg.jpg') ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Course Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="w-full">
    <div class="content-container">
        <div class="content-box">
            <?= $this->Html->link('<i class="fa-solid fa-chevron-left"></i> Back', ['controller' => 'Courses', 'action' => 'courses'], ['class' => 'btn btn-primary', 'escape' => false, 'style' => 'float: left;']) ?>
            <!-- single product -->
            <div class="single-product mt-100 mb-100">
                <div class="container">
                    <div class="row align-items-center"> <!-- Added align-items-center to center vertically -->
                        <div class="col-md-5">
                            <div class="single-product-img">
                                <?= $this->Html->image('/' . $course->course_image, ['alt' => $course->course_name, 'class' => 'course-image']) ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="single-product-content">
                                <h3><?= h($course->course_name) ?></h3>
                                <p><small>Note: All prices are in AUD (Australian Dollars).</small></p>
                                <p class="single-product-pricing"><span>$<?= $this->Number->format($course->course_price) ?> </span></p>
                                <p><?= h($course->course_description) ?></p>
                                <?= $this->Html->link("Enroll Now", ['controller' => 'payments', 'action' => 'checkout', $course->course_id], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end single product -->
        </div>
    </div>
</div>
</body>

</html>

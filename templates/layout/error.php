<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    --><?php //= $this->Html->charset() ?>
<!--    <title>-->
<!--        --><?php //= $this->fetch('title') ?>
<!--    </title>-->
<!--    --><?php //= $this->Html->meta('icon') ?>
<!---->
<!--    --><?php //= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
<!---->
<!--    --><?php //= $this->fetch('meta') ?>
<!--    --><?php //= $this->fetch('css') ?>
<!--    --><?php //= $this->fetch('script') ?>
<!--</head>-->
<!--<body>-->
<!--    <div class="error-container">-->
<!--        --><?php //= $this->Flash->render() ?>
<!--        --><?php //= $this->fetch('content') ?>
<!--        --><?php //= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
<!--    </div>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <?= $this->Html->css('main') ?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    /* General styles for header area */
    .top-header-area {
        width: 100%;
        padding: 10px 0;
    }
    div.footer-area {
        max-height: 400px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .top-header-area {
            width: 100%;
            padding: 0px 0;
        }
        .site-logo {
            display: none;
        }
    }
    /* Media query for mobile devices */
    @media only screen and (max-width: 767.96px) {
        .top-header-area {
            width: 100%;
            padding: 0px 0;
        }
        .site-logo {
            display: none; /* Hide the logo in mobile mode */
        }
        div.footer-area {
            max-height: 750px;
        }
        .social-icons.footer-box.subscribe {
            margin: 0;
        }
    }
</style>
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
<style>
    .hero-text-tablecell h1 {
        text-align: center;
    }

    .single-homepage-slider:after {
        background-color: transparent;
    }

    .sticky-wrapper.is-sticky .top-header-area {
        background-color: #1a4332;
    }
    .dark-background {
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        padding: 20px; /* Optional: Add padding */
    }
</style>
<style>
    /*--------------------------------------------------------------
# Welcome One
--------------------------------------------------------------*/
    .welcome-one {
        position: relative;
        display: block;
        padding: 50px 0 50px;
        z-index: 1;
    }

    .welcome-one__left {
        position: relative;
        display: block;
        margin-right: 70px;
    }

    .welcome-one__img-box {
        position: relative;
        display: block;
    }

    .welcome-one__img {
        position: relative;
        display: block;
        z-index: 1;
    }

    .welcome-one__img::before {
        content: "";
        position: absolute;
        top: -70px;
        right: -70px;
        bottom: -70px;
        left: 70px;
        background-color: var(--mellis-extra);
        z-index: -1;
    }

    .welcome-one__img img {
        width: 100%;
    }

    .welcome-one__shape-1 {
        position: absolute;
        top: -57px;
        left: -93px;
        z-index: -1;
    }

    .welcome-one__shape-1 img {
        width: auto;
    }

    .welcome-one__right {
        position: relative;
        display: block;
        margin-left: 70px;
    }

    .welcome-one__right .section-title {
        margin-bottom: 38px;
    }

    .welcome-one__points {
        position: relative;
        display: flex;
        align-items: center;
        margin-left: -8px;
        margin-top: 43px;
    }

    .welcome-one__points li {
        position: relative;
        display: flex;
    }

    .welcome-one__points li+li {
        margin-left: 31px;
    }

    .welcome-one__points li .icon {
        position: relative;
        display: inline-block;
        margin-right: 10px;
    }

    .welcome-one__points li .icon span {
        position: relative;
        display: inline-block;
        font-size: 64px;
        color: var(--mellis-base);
        -webkit-transition: all 500ms linear;
        transition: all 500ms linear;
        -webkit-transition-delay: 0.1s;
        transition-delay: 0.1s;
    }

    .welcome-one__points li:hover .icon span {
        transform: scale(.9);
    }

    .welcome-one__points li .text {
        position: relative;
        display: block;
    }

    .welcome-one__points li .text h3 {
        font-size: 18px;
        margin-bottom: 4px;
    }

    .welcome-one__btn-box {
        position: relative;
        display: block;
        margin-top: 41px;
    }

    /*--------------------------------------------------------------
# services One
--------------------------------------------------------------*/
    .services-one {
        position: relative;
        display: block;
        padding-bottom: 90px;
        overflow: hidden;
        z-index: 1;
    }

    .services-one__single {
        position: relative;
        display: block;
        background-color: rgb(255, 255, 255);
        box-shadow: 0px 10px 60px 0px rgba(0, 0, 0, 0.07);
        text-align: center;
        border: 1px solid transparent;
        margin-bottom: 30px;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .services-one__single-inner {
        position: relative;
        display: block;
        padding: 60px 60px 56px;
        overflow: hidden;
    }

    .services-one__shape-1 {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 1;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .services-one__shape-1 img {
        width: auto;
    }

    .services-one__single:hover .services-one__shape-1 {
        opacity: 0;
    }

    .services-one__shape-2 {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .services-one__shape-2 img {
        width: auto;
    }

    .services-one__single:hover .services-one__shape-2 {
        opacity: 1;
    }

    .services-one__single:hover {
        border: 1px solid var(--mellis-base);
    }

    .services-one__img-box {
        position: relative;
        display: block;
        width: 196px;
        margin: 0 auto;
    }

    .services-one__img {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 50%;
        z-index: 1;
    }

    .services-one__img:before {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        content: "";
        border-radius: 50%;
        background-color: rgba(var(--mellis-black-rgb), .50);
        transform: scale(0);
        transition: all 500ms ease;
        z-index: 1;
    }

    .services-one__single:hover .services-one__img:before {
        transform: scale(1);
    }

    .services-one__img img {
        width: 100%;
        border-radius: 50%;
        transition: all 500ms ease;
    }

    .services-one__single:hover .services-one__img img {
        transform: scale(1.2)
    }

    .services-one__icon {
        position: absolute;
        bottom: -40px;
        width: 91px;
        left: 50%;
        right: 0;
        height: 91px;
        background-color: var(--mellis-base);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translateX(-50%);
        z-index: 2;
    }

    .services-one__icon span {
        position: relative;
        display: inline-block;
        font-size: 47px;
        color: var(--mellis-white);
        -webkit-transition: all 500ms linear;
        transition: all 500ms linear;
        -webkit-transition-delay: 0.1s;
        transition-delay: 0.1s;
    }

    .services-one__single:hover .services-one__icon span {
        transform: scale(.9);
    }

    .services-one__title {
        font-size: 24px;
        margin-bottom: 14px;
        margin-top: 58px;
    }

    .services-one__title a {
        color: var(--mellis-black);
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .services-one__title a:hover {
        color: var(--mellis-base);
    }

    .services-one__btn-box {
        position: relative;
        display: block;
        margin-top: 25px;
        border-top: 1px solid var(--mellis-bdr-color);
        padding-top: 26px;
    }

    .services-one__btn {
        font-size: 12px;
        font-weight: 600;
        line-height: 12px;
        text-transform: uppercase;
        letter-spacing: var(--mellis-letter-spacing);
        color: var(--mellis-black);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .services-one__btn:hover {
        color: var(--mellis-base);
    }

    .services-one__btn i {
        position: relative;
        margin-left: 10px;
        font-size: 16px;
    }
</style>
<style>
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
</style>
<style>
    .footer-area {
        background-color: #1a4332;
        padding: 150px 0px;
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

    /*a.boxed-btn {*/
    /*    background-color: #4a9b38;*/
    /*}*/

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


    a:hover {
        color: #4a9b38;
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
        background: #fff;
        overflow-x: hidden;
    }

    .logo-image {
        /* Adjust to position the image above the spinner */
        z-index: 1112;
        /* Ensure the image is above the spinner */
        width: 300px;
        /* Adjust size as needed */
        height: 300px;
        margin: 200px auto auto;
        display: block;
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

    .fa-angle-right:before {
        color: #4a9b38;
    }

    .fa-angle-left:before {
        color: #4a9b38;
    }

    a.cart-btn {
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    a.cart-btn:hover {
        background-color: #1a4332;
        color: #4a9b38;
    }

    a.cart-btn {
        font-family: 'Poppins', sans-serif;
        display: inline-block;
        background-color: #4a9b38;
        color: #fff;
        padding: 10px 20px;
        width: 150px;
        margin-left: 100px;
    }

    a.cart-btn i {
        margin-right: 5px;
    }

    #instagram-section {
        text-align: center;
        /* Canh giữa tiêu đề và nút */
        padding: 40px 20px;
        /* Khoảng cách trên và dưới của section */
        background-color: #f9f9f9;
        /* Màu nền của section */
    }

    #instagram-section h2 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: #333;
        /* Màu chữ */
        text-transform: uppercase;
        /* Chữ in hoa */
        font-weight: 700;
        /* Chữ đậm */
        letter-spacing: 2px;
        /* Khoảng cách giữa các chữ */
    }

    #instagram-gallery {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        max-width: 1150px;
        margin: 0 auto 40px auto;
        /* Canh giữa lưới ảnh và tạo khoảng cách dưới */
        padding: 0 20px;
    }

    #instagram-gallery a {
        display: block;
        aspect-ratio: 1/1;
        overflow: hidden;
    }

    #instagram-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        /* Bo góc các hình ảnh */
        transition: transform 0.3s ease;
    }

    #instagram-gallery img:hover {
        transform: scale(1.05);
        /* Phóng to hình ảnh khi hover */
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
    }

    .bordered-btn:hover {
        background-color: #4a9b38;
        /* Màu nền khi hover */
        color: #fff;
        /* Màu chữ khi hover */
    }
</style>
<body>

    <!--PreLoader-->
    <div class="loader">
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
                                $this->ContentBlock->image('logo',['style' => 'width: 100px; height: 100px;']),
                                '/',
                                ['escape' => false]
                            ) ?>
                        </div>



                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu" style="position: relative; top: 50%; -webkit-transform: translateY(50%); -ms-transform: translateY(50%); transform: translateY(50%);">
                            <ul>
                                <li><?= $this->Html->link("Home", "/") ?></li>


                                <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses']) ?>
                                </li>


                                <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services']) ?>
                                </li>

                                <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add']) ?>
                                </li>

                                <li style="float: right">
                                    <?php
                                    if ($this->Identity->isLoggedIn()) {
                                    echo $this->Html->link(
                                        'Dashboard',
                                        ['controller' => 'AdminDashboard', 'action' => 'dashboard'],
                                        ['class' => 'button button-outline']
                                    );
                                    ?>
                                </li>
                                <li style="float: right">
                                    <?php
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


    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container dark-background">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
<!--                                <h1>Error 404: The page you were looking for could not be found</h1>-->
                                <h1 class="display-4">Oops! Something went wrong.</h1>
                                <p class="lead" style="font-size: 1.5rem; color: white; line-height: 1.6; font-weight: bold;">
                                    The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
                                </p>
                                <hr class="my-4" style="border-top: 1px solid #ccc;">
                                <p style="font-size: 1.3rem; color: white; font-weight: bold;">
                                    Please try the following:
                                </p>
                                <ul class="list-unstyled" style="font-size: 1.2rem; color: white; line-height: 1.5; font-weight: bold;">
                                    <li style="margin-bottom: 10px;">1. Check your spelling</li>
                                    <li style="margin-bottom: 10px;">2. Return to the home page</a></li>
                                    <li style="margin-bottom: 10px;">
                                        3. Contact us if the problem persists
                                        <ul style="margin-top: 10px;">
                                            <li style="margin-bottom: 10px;">(+61) <?= $this->ContentBlock->text('contact-phone') ?></li>
                                            <li> <?= $this->ContentBlock->text('contact-email') ?></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="hero-btns" style="text-align: left;">
                                    <div class="link-container">
                                        <?= $this->Html->link("Back to Home", '/', ['class' => 'boxed-btn']) ?>
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




    <!-- footer -->
    <div class="footer-area">
        <div class="container" style="text-align: left;">
            <div class="row" style="gap: 10px;">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li style="font-size: 18px;">
                                <?= $this->ContentBlock->text('location-address') ?>,
                                <?= $this->ContentBlock->text('location-suburb') ?>,
                                <br><?= $this->ContentBlock->text('location-state') ?>,
                                <?= $this->ContentBlock->text('location-postcode') ?>.
                            </li>
                            <li style="font-size: 18px;"><?= $this->ContentBlock->text('contact-email') ?></li>
                            <li style="font-size: 18px;">(+61) <?= $this->ContentBlock->text('contact-phone') ?></li>

                            <!--                            <li>--><?php //= $this->ContentBlock->text('location-address') ?><!--,-->
                            <!--                                --><?php //= $this->ContentBlock->text('location-suburb') ?><!--,-->
                            <!--                                <br>--><?php //= $this->ContentBlock->text('location-state') ?><!--,-->
                            <!--                                --><?php //= $this->ContentBlock->text('location-postcode') ?><!--.-->
                            <!--                            </li>-->
                            <!--                            <li>--><?php //= $this->ContentBlock->text('contact-email') ?><!--</li>-->
                            <!--                            <li>(+61) --><?php //= $this->ContentBlock->text('contact-phone') ?><!--</li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><?= $this->Html->link("Home", "/", ['style' => 'font-size: 18px;']) ?></li>
                            <li><?= $this->Html->link("Beauty By Lisa", ['controller' => 'BeautyByLisa', 'action' => 'services'], ['style' => 'font-size: 18px;']) ?></li>
                            <li><?= $this->Html->link("Courses", ['controller' => 'Courses', 'action' => 'courses'], ['style' => 'font-size: 18px;']) ?></li>
                            <li><?= $this->Html->link("Contact Us", ['controller' => 'Enquirys', 'action' => 'add'], ['style' => 'font-size: 18px;']) ?></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Opening Hours</h2>
                        <!--                        <p>Monday to Friday: 9:30 - 20:00</p>-->
                        <p style="font-size: 18px;">Monday to Friday: 9:30 - 20:00</p>

                    </div>
                </div>
                <div class="col-lg-1 col-md-6 col-12">
                    <div class="social-icons footer-box subscribe">
                        <ul style="display: flex; gap: 10px;"> <!-- Flexbox for horizontal layout and gap between icons -->
                            <li><a href="https://www.facebook.com/adelaidebeautyandeducation" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://www.instagram.com/adelaidebeautyandeducation" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <!-- Additional icons can be added here if needed -->
                            <div class="site-logo"></div>
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
            <div class="row">
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
<!--            <script src="assets/js/owl.carousel.min.js"></script>-->
            <!-- magnific popup -->
            <script src="assets/js/jquery.magnific-popup.min.js"></script>
            <!-- mean menu -->
            <script src="assets/js/jquery.meanmenu.min.js"></script>
            <!-- sticker js -->
            <script src="assets/js/sticker.js"></script>
            <!-- main js -->
            <script src="assets/js/main.js"></script>

</body>

</html>

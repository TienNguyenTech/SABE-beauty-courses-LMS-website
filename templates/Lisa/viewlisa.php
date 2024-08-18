<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>
    <!-- Add your CSS files -->
    <?= $this->Html->css('all.min') ?>
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

        .content-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #4a9b38;
            padding: 20px;
        }

        .content-box {
            background-color: #ffffff;
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
    </style>
</head>
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<body>
    <div class="w-full">
        <div class="content-container">
            <div class="content-box">
                <h1>Beauty by Lisa Follett</h1>
                <p>Welcome to Beauty by Lisa Follett, a home-based beauty sanctuary in Hallett Cove! With 20 years of
                    industry experience across England and Australia, I am dedicated to bringing you the best in beauty
                    therapy. I am also an educator in beauty therapy and I combine my expertise and passion for the
                    beauty industry to create a comfortable and welcoming environment for all my clients. Explore our
                    services and indulge in a personalized beauty experience designed just for you.
                </p>
                <div class="services-grid">
                    <div class="service">
                        <h2>Lash & Brow treatments</h2>
                        <ul>
                            <li>Eyelash extensions from $130</li>
                            <li>Lash lift & tint $90</li>
                            <li>Brow lamination $75</li>
                            <li>Eyelash tint $30</li>
                            <li>Eyebrow tint $20</li>
                            <li>Eyebrow wax $25</li>
                        </ul>
                    </div>
                    <div class="service">
                        <h2>Hair removal</h2>
                        <ul>
                            <li>Body waxing from $25</li>
                            <li>Facial waxing from $15</li>
                        </ul>
                    </div>
                    <div class="service">
                        <h2>Spray tan</h2>
                        <ul>
                            <li>Full body tan $30</li>
                        </ul>
                    </div>
                    <div class="service">
                        <h2>Skincare treatments</h2>
                        <ul>
                            <li>SQT Bio-micro needling $280</li>
                            <li>Ultimate facial - 90 mins $180</li>
                            <li>Classic facial - 60 mins $140</li>
                            <li>Express facial - 30 mins $90</li>
                        </ul>
                    </div>
                    <div class="service">
                        <h2>Massage treatments</h2>
                        <ul>
                            <li>Heavenly head treatment - 60 mins $100</li>
                            <li>Heavenly head treatment - 30 mins $45</li>
                            <li>Body massage - 60 mins $100</li>
                            <li>Body massage - 30 mins $65</li>
                        </ul>
                    </div>
                    <div class="service">
                        <h2>Foot treatments</h2>
                        <ul>
                            <li>Pedicure $75</li>
                            <li>Reflexology for relaxation $40</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="https://www.fresha.com/a/beauty-by-lisa-follett-hallett-cove-3-lepena-crescent-u54y2i7s" target="_blank" rel="noopener noreferrer" class="btn">Book Now on Fresha</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

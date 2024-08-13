<html>

<head>
    <!-- Google Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['block' => true]) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap', ['block' => true]) ?>

    <?= $this->Html->css('all.min') ?>

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
</head>

<body>
    <h1>Hello this is the template ViewCourse</h1>
</body>


</html>
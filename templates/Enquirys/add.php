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
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Contact</title>

    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">

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

    <!-- reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        /* Add any additional styles here */

        /* Style for the submit button */
        .submit-button {
            background-color: #149063;
            cursor: not-allowed; /* Button is not clickable initially */
        }

        .submit-button.enabled {
            cursor: pointer; /* Change cursor when button is enabled */
        }
    </style>
</head>

<body>

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

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Contact us</h2>
                    <p>Any questions regarding our courses or available services? Feel free to contact us for more information.</p>
                </div>
                <?= $this->Flash->render('positive') ?>
                <div id="form_status"></div>
                <div class="contact-form">
                    <?= $this->Form->create($enquiry) ?>
                    <form type="POST" id="contact-form" onSubmit="return validateForm(this);">
                        <p>
                            <?= $this->Form->control('enquiry_name', ['placeholder' => 'Enter your name', 'label' => 'Full Name *']) ?>
                            <?= $this->Form->control('enquiry_email', ['placeholder' => 'Enter your email address', 'label' => 'Email Address *', 'type' => 'email']) ?>
                        </p>
                        <p>
                            <?= $this->Form->control('enquiry_subject', ['placeholder' => 'Enter enquiry subject', 'label' => 'Subject *']) ?>
                        </p>
                        <p>
                            <?= $this->Form->control('enquiry_message', ['type' => 'textarea', 'placeholder' => 'Enter your message', 'label' => 'Message *']) ?>
                        </p>
                        <!-- reCAPTCHA widget -->
                        <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf" data-callback="onRecaptchaSuccess" data-expired-callback="onRecaptchaError"></div>
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="Submit" class="submit-button" id="submit-button" disabled></p>
                    </form>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Social Media</h4>
                        <a href="http://www.tiktok.com/@adelaidebeauty_education"><p><i class="fa-brands fa-tiktok"></i>Tiktok</p></a>
                        <a href="http://instagram.com/adelaidebeautyandeducation"><p><i class="fa-brands fa-instagram"></i>Instagram</p></a>
                        <a href="http://www.facebook.com/adelaidebeautyandeducation"><p><i class="fa-brands fa-facebook"></i>Facebook</p></a>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: <?= $this->ContentBlock->text('contact-phone') ?>
                            <br> Email: <?= $this->ContentBlock->text('contact-email') ?>
                            <br><br> <?= $this->ContentBlock->text('location-address') ?>, <?= $this->ContentBlock->text('location-suburb') ?>
                            <br> <?= $this->ContentBlock->text('location-state') ?>, <?= $this->ContentBlock->text('location-postcode') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

<!-- Script files -->
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

<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

/* $this->layout = 'login'; */
$this->layout = 'empty';
$this->assign('title', 'Login');
?>

<html>

<head>
    <title><?= $this->ContentBlock->text('website-title'); ?> | Login</title>
    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">

    <?= $this->Html->css('login-new') ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
 

        <!--<div class="left-side">
            <img src="//$this->Url->image('../webroot/img/lisa-logo.png') ?>" alt="Lisa Logo" class="background-image">
        </div>-->
        <div class="users form content cardhidden">
            <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image', 'width' => '100px', 'height' => '100px']) ?>

            <?= $this->Form->create() ?>
            <fieldset>
                <legend class="login-title">Login</legend>
                <?= $this->Flash->render() ?>
                <?php
                echo $this->Form->control('email', [
                    'type' => 'email',
                    'required' => true,
                    'autofocus' => true,
                    'label' => [
                        'text' => 'Email', // Custom label text
                        'class' => 'form-label hello', // Add a class for styling
                    ],
                    'class' => 'form-control', // Add a class for styling
                ]);
                
                echo $this->Form->control('password', [
                    'type' => 'password',
                    'required' => true,
                    'label' => [
                        'text' => 'Password', // Custom label text
                        'class' => 'form-label', // Add a class for styling
                    ],
                    'class' => 'form-control', // Add a class for styling
                ]);
                
                ?>

                <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                    data-callback="onRecaptchaSuccess"></div>

            </fieldset>

            <?= $this->Html->link('Forgot Password?', ['action' => 'forgetPassword'], ['class' => 'button-clear', 'style' => 'font-size: 15px;']) ?>
            <br>
            <?= $this->Form->button('Login', ['class' => 'centered-button']) ?>
            <?= $this->Form->end() ?>
            <div class="back-home-link">
                <?= $this->Html->link('Back To Home', '/', ['class' => 'back-to-home', 'style' => 'font-size: 18px; font-weight: bold;']) ?>
                <!--                    --><?php //= $this->Html->link('Back to Login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home', 'style' => 'font-size: 24px; font-weight: bold;']) ?>
                <br>
                <?= $this->Html->link('Don\'t have an account? Register', ['controller' => 'Auth', 'action' => 'register'], ['class' => 'back-to-home', 'style' => 'font-size: 18px; font-weight: bold;']) ?>
            </div>


            <!--<p class="other-login">Or Login With</p>
                <div class="button-container">
                    <a href="#" class="social-button google">
                        <img src="../img/google-logo.png" alt="Google Logo"> Google
                    </a>
                    <a href="#" class="social-button facebook">
                        <img src="../img/facebook-logo.jpg" alt="Facebook Logo"> Facebook
                    </a>
                </div>-->
        </div>
    </div>
   


    <script>
        // Variable to track captcha status
        var captchaValidated = false; // false means not validated, true means validated

        function onRecaptchaSuccess() {
            captchaValidated = true;
            updateButtonState();
        }

        function onRecaptchaError() {
            captchaValidated = false;
            updateButtonState();
        }

        function updateButtonState() {
            var loginButton = document.getElementById('login-button');
            var secondaryButton = document.getElementById('secondary-button');
            if (captchaValidated) {
                loginButton.classList.add('enabled');
                loginButton.disabled = false;
                secondaryButton.classList.add('enabled');
                secondaryButton.disabled = false;
            } else {
                loginButton.classList.remove('enabled');
                loginButton.disabled = true;
                secondaryButton.classList.remove('enabled');
                secondaryButton.disabled = true;
            }
        }

        // Attach reCAPTCHA event handler
        document.addEventListener('DOMContentLoaded', function () {
            grecaptcha.ready(function () {
                grecaptcha.render('g-recaptcha', {
                    'sitekey': '6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf',
                    'callback': onRecaptchaSuccess,
                    'expired-callback': onRecaptchaError
                });
            });
        });
    </script>

</body>

</html>
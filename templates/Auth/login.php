<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug'); // Read the debug configuration from CakePHP

$this->layout = 'login'; // Set the layout to 'login'
$this->assign('title', 'Login'); // Assign the page title as 'Login'
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Load Google reCAPTCHA API script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style for the body background */
        body {
            background-color: #4a9b38;
        }

        /* Style for the top navigation bar */
        .topnav {
            background-color: white;
            overflow: hidden;
            margin-bottom: 70px;
            margin-top: 40px;
            border-radius: 10px;
        }

        /* Style for the centered login button */
        .centered-button {
            background-color: #4a9b38;
            align-items: center;
            margin-left: 40%;
            margin-top: 5%;
            cursor: not-allowed;
            /* Button is not clickable initially */
        }

        /* Style when the button is enabled */
        .centered-button.enabled {
            cursor: pointer;
            /* Change cursor when button is enabled */
        }

        /* Style for the page title */
        .page-title {
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container login">
        <div class="row">
            <div class="column column-50 column-offset-25">

                <div class="topnav">
                    <h1 class="page-title"><b>SABE</b></h1>
                </div>
                <div class="users form content">

                    <!-- Create the login form, pointing to the 'login' action -->
                    <?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>

                    <fieldset>
                        <legend style="font-size: 24px; color: black; text-align: center">Login</legend>

                        <!-- Render flash messages -->
                        <?= $this->Flash->render() ?>

                        <!-- Form controls for email and password -->
                        <?php
                        echo $this->Form->control('email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true,
                            'style' => 'color: black;', // Apply black text color
                        ]);
                        echo $this->Form->control('password', [
                            'type' => 'password',
                            'required' => true,
                        ]);
                        ?>
                        <!-- reCAPTCHA widget -->
                        <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                            data-callback="onRecaptchaSuccess"></div>
                    </fieldset>

                    <div class="input-wrapper">
                        <!-- Login button -->
                        <?= $this->Form->button('Login', ['class' => 'centered-button', 'id' => 'login-button', 'disabled' => true]) ?>
                        <?= $this->Form->end() ?>
                        <br />
                        <!-- Link to go to the homepage -->
                        <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button-clear']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Variable to track captcha status
        var captchaValidated = false; // false means not validated, true means validated

        // Function called when reCAPTCHA is successfully validated
        function onRecaptchaSuccess() {
            captchaValidated = true;
            updateButtonState();
        }

        // Function called when reCAPTCHA fails validation
        function onRecaptchaError() {
            captchaValidated = false;
            updateButtonState();
        }

        // Update the state of the login button based on reCAPTCHA status
        function updateButtonState() {
            var loginButton = document.getElementById('login-button');
            // secondaryButton is not defined in this example, so it's commented out
            // var secondaryButton = document.getElementById('secondary-button');
            if (captchaValidated) {
                loginButton.classList.add('enabled');
                loginButton.disabled = false;

            } else {
                loginButton.classList.remove('enabled');
                loginButton.disabled = true;

            }
        }

        // Initialize reCAPTCHA when the document is ready
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
<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->layout = 'login';
$this->assign('title', 'Login');
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            background-color: #74C69D;
        }

        .topnav {
            background-color: white;
            overflow: hidden;
            margin-bottom: 70px;
            margin-top: 40px;
            border-radius: 10px;
        }

        .centered-button {
            background-color: #149063;
            align-items: center;
            margin-left: 40%;
            margin-top: 5%;
            cursor: not-allowed; /* Indicate that the button is not clickable initially */
        }

        .centered-button.enabled {
            cursor: pointer; /* Change cursor when button is enabled */
        }


        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

                <?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>

                <fieldset>
                    <legend style="font-size: 24px; color: black; text-align: center">Login</legend>

                    <?= $this->Flash->render() ?>

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
                    <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf" data-callback="onRecaptchaSuccess"></div>
                </fieldset>

                <div class="input-wrapper">
                    <?= $this->Form->button('Login', ['class' => 'centered-button', 'id' => 'login-button', 'disabled' => true]) ?>
                    <?= $this->Form->end() ?>
                    <br/>
                    <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button-clear']) ?>
                </div>

                <!-- Secondary button -->
                

            </div>
        </div>
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

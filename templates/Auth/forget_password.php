<?php
/**
 * @var \App\View\AppView $this
 */


$this->layout = 'empty';
?>
<html>

<head>
    <title><?= $this->ContentBlock->text('website-title'); ?> | Forgot Password</title>
    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">

    <?= $this->Html->css('login-new') ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
</head>

<style>
    @media only screen and (max-width: 768px) {
        .users.form.content {
            margin-bottom:-80px;
        }
        .centered-button {
            width:auto;
        }
       
    }
</style>
<body>

            <div class="users form content cardhidden" id="cardhidden">


                <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image','width' => '200px', 'height' => '200px']) ?>
                <?= $this->Form->create() ?>

                <fieldset>

                    <legend class="login-title">Forget Password</legend>

                    <?= $this->Flash->render() ?>

                    <p class="email-instruction">Enter your email address registered with our system below to reset your password:</p>

                    <div class="email-input-container">
                        <?php
                        echo $this->Form->control('email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true,
                            'label' => false,
                            'style' => 'color: black; width: 350px; border-radius: 10px; font-size: 16px; cursor: pointer;',
                        ]);
                        ?>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LdQtngqAAAAAMdI-mAqNUSor0BJwkYDYH_MDR37"
                                            data-callback="onRecaptchaSuccess"></div>

                </fieldset>

                <?= $this->Form->button('Send verification email', ['class' => 'centered-button']) ?>
                <?= $this->Form->end() ?>


                <div class="back-home-link">
                    <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home']) ?>
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
                        'sitekey': '6LdQtngqAAAAAMdI-mAqNUSor0BJwkYDYH_MDR37',
                        'callback': onRecaptchaSuccess,
                        'expired-callback': onRecaptchaError
                    });
                });
            });
        </script>
</body>

</html>

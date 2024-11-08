<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'empty';
$this->assign('title', 'Reset Password');
?>
<head>
    <title><?= $this->ContentBlock->text('website-title'); ?> | Reset Password</title>
    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">

    <?= $this->Html->css('login-new') ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    @media only screen and (max-width: 768px) {
        .users.form.content {
            margin-bottom:-80px;
        }
        .centered-button {
            width:auto;
        }
        .form-control {
            margin-left: -1px;
            max-width: 350px;
        }

        .form-label{
            margin-right: 10px;
        }
       
    }
</style>
</head>
<body>

        <div class="users form content cardhidden" style="text-align: center;" > <!-- Center the form content -->

            <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image','width' => '200px', 'height' => '200px']) ?>
            <?= $this->Form->create() ?>

            <fieldset>
                <legend class="login-title">Reset Password</legend>

                <?= $this->Flash->render() ?>
                <br>

                <!-- Wrap the inputs in a div with inline styles for centering -->
                <div style="margin: 0 auto; width: 100%; max-width: 400px;">
                    <?php
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'autofocus' => true,
                        'label' => 'New password',
                        'value' => '',
                        'style' => 'color: black; width: 100%; border-radius: 10px; font-size: 16px; cursor: pointer;',
                    ]);
                    ?>
                </div>

                <div style="margin: 0 auto; width: 100%; max-width: 400px; margin-top: 15px;">
                    <?php
                    echo $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'required' => true,
                        'label' => 'Confirm new password',
                        'value' => '',
                        'style' => 'color: black; width: 100%; border-radius: 10px; font-size: 16px; cursor: pointer;',
                    ]);
                    ?>
                </div>

                <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                    data-callback="onRecaptchaSuccess"></div>

            </fieldset>

            <div style="margin-top: 20px;">
                <?= $this->Form->button('Reset password', ['class' => 'centered-button']) ?>
            </div>
            <?= $this->Form->end() ?>

            <div class="back-home-link" style="margin-top: 15px;">
                <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home']) ?>
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

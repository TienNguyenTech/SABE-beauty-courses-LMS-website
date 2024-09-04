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
</head>
<body>
    <div class="container">
        <div class="right-side">
            <div class="users form content cardhidden">


                <img src="<?= $this->Url->image('../webroot/img/login-logo-green.png') ?>" alt="SABE Logo"
                    class="logo-image">
                <?= $this->Form->create() ?>

                <fieldset>

                    <legend class="login-title">Reset Password</legend>

                    <?= $this->Flash->render() ?>

                    <p class="email-instruction">Reset your password</p>

                    <?php
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'autofocus' => true,
                        'label' => 'New password',
                        'value' => '',
                        'style' => 'color: black; width: 350px; border-radius: 10px; font-size: 16px; cursor: pointer; margin-left: 115px;',
                    ]);
                    echo $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'required' => true,
                        'label' => 'New password',
                        'value' => '',
                        'style' => 'color: black; width: 350px; border-radius: 10px; font-size: 16px; cursor: pointer; margin-left: 115px;',
                    ]);
                    ?>

                </fieldset>

                <?= $this->Form->button('Reset password', ['class' => 'centered-button']) ?>
                <?= $this->Form->end() ?>


                <div class="back-home-link">
                    <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home']) ?>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

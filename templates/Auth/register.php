<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'empty';
$this->assign('title', 'Create account');
?>
<head>
    <title><?= $this->ContentBlock->text('website-title'); ?> | Register</title>
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
        <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image','width' => '200px', 'height' => '200px']) ?>

        <?= $this->Form->create() ?>
        <fieldset>
            <legend class="login-title">Create account</legend>

            <?= $this->Flash->render() ?>

            <?= $this->Form->control('email', [
                'type' => 'email',
                'placeholder' => 'name@example.com',
                'required' => true,
                'autofocus' => true,
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 75px;'
            ]); ?>

            <?= $this->Form->control('user_firstname', [
                'placeholder' => 'John',
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 45px; padding: 10px; margin-bottom: 10px; border: 1px solid #D9D9D9; font-size: 16px;',
                'required' => true,
                'label' => 'Firstname'
            ]); ?>

            <?= $this->Form->control('user_surname', [
                'placeholder' => 'Smith',
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 45px; padding: 10px; margin-bottom: 10px; border: 1px solid #D9D9D9; font-size: 16px;',
                'required' => true,
                'label' => 'Surname'
            ]); ?>

            <?= $this->Form->control('user_phone', [
                'type' => 'tel',
                'pattern' => '[0-9](10))',
                'placeholder' => '0412345678',
                'required' => true,
                'autofocus' => true,
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 75px; padding: 10px; margin-bottom: 10px; border: 1px solid #D9D9D9; font-size: 16px;'
            ]); ?>

            <?php
            echo $this->Form->control('password', [
                'type' => 'password',
                'required' => true,
                'label' => 'Password', // Custom label text
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 45px;',
                'value' => ''
            ]);
            // Validate password by repeating it
            echo $this->Form->control('password_confirm', [
                'type' => 'password',
                'value' => '',  // Ensure password is not sending back to the client side
                'label' => 'Retype Password',
                'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 45px;',
            ]);
            ?>
            <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                data-callback="onRecaptchaSuccess"></div>
        </fieldset>

        <?= $this->Form->button('Register', ['class' => 'centered-button']) ?>
        <?= $this->Form->end() ?>
        <div class="back-home-link">
            <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home']) ?>
            <br>
            <?= $this->Html->link('Back to home', '/', ['class' => 'back-to-home']) ?>
        </div>
        </div>
    </div>
</div>    
</body>
</div>

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
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">

    <?= $this->Html->css('login-new') ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-field {
            width: 100%;
            max-width: 400px;
            margin-bottom: 15px;
        }

        .form-field input {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #D9D9D9;
            font-size: 20px;
            color: black;
        }

        .form-field label {
            font-size: 20px;
            margin-bottom: 5px;
            display: block;
        }

        .centered-button {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border-radius: 10px;
            background-color: #28a745; /* Green color */
            color: white;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .centered-button:hover {
            background-color: #218838; /* Darker green on hover */


            .captcha-container {
            display: flex;
            justify-content: flex-start;
            max-width: 400px;
        }

        .back-home-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-to-home {
            color: #007bff;
            text-decoration: none;
        }

        .logo-image {
            display: block;
            margin: 0 auto 20px;
        }

        .login-title {
            text-align: center;
            font-size: 34px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="right-side">
        <div class="users form content cardhidden form-container">
            <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image', 'width' => '200px', 'height' => '200px']) ?>

            <?= $this->Form->create() ?>
            <fieldset>
                <legend class="login-title">Create account</legend>

                <?= $this->Html->link('Already have an account?', [
                    'controller' => 'Auth',
                    'action' => 'login',
                    '?' => ['courseId' => $this->request->getSession()->read('SelectedCourse.id')]
                ], ['class' => 'back-to-home']) ?>

                <?= $this->Flash->render() ?>

                <div class="form-field">
                    <?= $this->Form->control('email', [
                        'type' => 'email',
                        'placeholder' => 'name@example.com',
                        'required' => true,
                        'autofocus' => true,
                        'label' => 'Email',
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_firstname', [
                        'placeholder' => 'John',
                        'required' => true,
                        'label' => 'Firstname',
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_surname', [
                        'placeholder' => 'Smith',
                        'required' => true,
                        'label' => 'Surname',
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_phone', [
                        'type' => 'tel',
                        'pattern' => '[0-9]{10}',
                        'placeholder' => '0412345678',
                        'required' => true,
                        'label' => 'Phone Number',
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'label' => 'Password',
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'required' => true,
                        'label' => 'Retype Password',
                    ]); ?>
                </div>

                <div class="captcha-container">
                    <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                         data-callback="onRecaptchaSuccess"></div>
                </div>
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


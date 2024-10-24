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

    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            background-color: #28a745;
            /* Green color */
            color: white;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .centered-button:hover {
            background-color: #218838;
        }

        /* Darker green on hover */


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
            color: #28a745;
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

        .cardhidden {
            background-color: white;

            padding-top: 800px;
            padding-bottom: 100px;

            margin-right: -105px;
            margin-left: -70px;
        }

        .container {
            height: 300vh;
        }

        .centered-button{
            background-color: #4A9B38 !important;
        }

        .back-to-home{
            color: #4A9B38 !important;
        }

        @media only screen and (max-width: 768px) {
            #cardhidden {
                min-width: 430px !important;
                min-height: 932px !important;
                margin-left:35px;
            }

            .form-field label {
                margin-left:30px;
            }

            .form-field input {
                max-width: 340px;
                margin-left:30px;;
            }

            .centered-button {
                max-width: 340px;
            }

            body {
                max-width: 390px;
                max-height: 850px;
            }

            .content {
                width: 100% !important;
            }

            body {
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }

            .form-container {
                width: 100%;
                height:100%;
                max-width: 400px;
                margin: 0 auto;
            }

            .cardhidden{
                padding-top: 700px;
               
            }

            .form-container{
                padding-bottom: 200px;
            }

        }
    </style>
</head>

<body>
    
        <div class="users form content cardhidden form-container" id="cardhidden">
            <?= $this->ContentBlock->image('logo-dark', ['class' => 'logo-image', 'width' => '200px', 'height' => '200px']) ?>

            <?= $this->Form->create() ?>
            <fieldset class="register-fieldset">
                <legend class="login-title">Create account</legend>
                <div style="text-align: center;">
                    <?= $this->Html->link('Already have an account?', [
                        'controller' => 'Auth',
                        'action' => 'login',
                        '?' => ['courseId' => $this->request->getSession()->read('SelectedCourse.id')]
                    ], ['class' => 'back-to-home', 'style' => 'font-size: 20px;']) ?>

                </div>

                <!--                --><?php //= $this->Html->link('Already have an account?', [
//                    'controller' => 'Auth',
//                    'action' => 'login',
//                    '?' => ['courseId' => $this->request->getSession()->read('SelectedCourse.id')]
//                ], ['class' => 'back-to-home']) ?>

                <?= $this->Flash->render() ?>
                <br>

                <div class="form-field">
                    <?= $this->Form->control('email', [
                        'type' => 'email',
                        'placeholder' => 'name@example.com',
                        'required' => true,
                        'autofocus' => true,
                        'label' => [
                            'text' => 'Email',
                            'class' => 'register-label'
                        ]
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_firstname', [
                        'placeholder' => 'John',
                        'required' => true,
                        'label' => ['text' => 'Firstname', 'class' => 'register-label']
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_surname', [
                        'placeholder' => 'Smith',
                        'required' => true,
                        'label' => ['text' => 'Surname', 'class' => 'register-label']
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('user_phone', [
                        'type' => 'tel',
                        'pattern' => '[0-9]{10}',
                        'placeholder' => '0412345678',
                        'required' => true,
                        'label' => ['text' => 'Phone Number', 'class' => 'register-label']
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'label' => ['text' => 'Password', 'class' => 'register-label'],
                        'pattern' => "^(?=.*[A-Z])(?=(.*\d){2,})(?=.*[!@#$%^&*()_+\-=\[\]{};':&quot;\\|,.&lt;&gt;\/?]).{8,}$"
                    ]); ?>
                </div>

                <div class="form-field">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'required' => true,
                        'label' => ['text' => 'Retype password', 'class' => 'register-label'],
                        'pattern' => "^(?=.*[A-Z])(?=(.*\d){2,})(?=.*[!@#$%^&*()_+\-=\[\]{};':&quot;\\|,.&lt;&gt;\/?]).{8,}$"
                    ]); ?>
                </div>

                <div class="captcha-container">
                    <div class="g-recaptcha" data-sitekey="6Lc7pCgqAAAAAJkUyRxxVhuFmd9v-5Pk-vtPtsUf"
                        data-callback="onRecaptchaSuccess"></div>
                </div>
            </fieldset>

            <?= $this->Form->button('Register', ['class' => 'centered-button']) ?>

            <?= $this->Form->end() ?>

            <!--            <div class="back-home-link">-->
            <!--                --><?php //= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home']) ?>
            <!--                <br>-->
            <!--                --><?php //= $this->Html->link('Back to home', '/', ['class' => 'back-to-home']) ?>
            <div class="back-home-link">
                <?= $this->Html->link('Back to Login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'back-to-home', 'style' => 'font-size: 20px; font-weight: bold;']) ?>
                <br>
                <?= $this->Html->link('Back to Home', '/', ['class' => 'back-to-home', 'style' => 'font-size: 20px; font-weight: bold;']) ?>
            </div>

        </div>
    </div>
   
</body>
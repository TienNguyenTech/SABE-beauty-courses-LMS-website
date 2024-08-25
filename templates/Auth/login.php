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
    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">
</head>

<body>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #EFEFF4;
        }

        .container {
            display: flex;
            width: 80%;
            height: 70%;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .left-side {
            width: 50%;
            background-color: #5F63FE;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .left-side img {
            max-width: 100%;
        }

        .login-signup {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .login-button,
        .signup-button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
        }

        .right-side {
            width: 50%;
            background-color: #FAFAFA;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .users.form.content {
            width: 100%;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .users.form.content fieldset {
            border: none;
            margin: 0;
            padding: 0;
        }

        .users.form.content .input-wrapper {
            text-align: center;
        }

        .users.form.content .input-wrapper .centered-button {
            width: 100%;
            padding: 10px;
            background-color: #5F63FE;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .users.form.content input[type="email"],
        .users.form.content input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #D9D9D9;
            font-size: 16px;
        }

        .button-clear {
            text-decoration: none;
            color: #5F63FE;
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
        }

        .logo-image {
            width: 150px;
            height: 100px;
            margin: 0 auto;
            padding-left: 175px;
        }
    </style> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #EFEFF4;
        }

        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .left-side {
            width: 50%;
            background-color: #4a9b38;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .left-side img {
            max-width: 100%;
        }

        .login-signup {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .login-button,
        .signup-button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
        }

        .right-side {
            width: 40%;
            background-color: #FAFAFA;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .content {
            width: 100%;
            background-color: #FFFFFF;
            padding: 20px;

        }



        .users.form.content fieldset {

            border: none;
        }

        .input-wrapper {



            justify-content: space-between;

            align-items: center;

            margin-top: 10px;

        }



        .centered-button {

            padding: 10px 20px;

            background-color: #4a9b38;

            color: white;

            border: none;

            border-radius: 25px;

            font-size: 16px;

            cursor: pointer;



        }



        .centered-button:hover {

            background-color: #4c51d1;

        }



        .button-clear {

            text-decoration: none;

            color: #5F63FE;

            font-size: 14px;

            padding-left: 130px;
            margin-top: -10px;

        }



        .users.form.content input[type="email"],

        .users.form.content input[type="password"] {

            width: 100%;

            padding: 10px;

            margin-bottom: 10px;

            border-radius: 5px;

            border: 1px solid #D9D9D9;

            font-size: 16px;

        }


        .logo-image {
            width: 150px;
            height: 100px;
            margin: 0 auto;
            padding-left: 232px;
            margin-bottom: 30px;

        }

        .placeholder {
            font-size: 20px;
            color: #5F63FE;
            margin-top: 20px;
        }

        .login-title {
            font-size: 36px;
            font-weight: bold;
            font-family: 'Arial', sans-serif;
            /* You can change the font-family to something more beautiful */
            color: #333;
            /* Adjust the color as needed */
            text-align: center;
            /* Centers the title */
            margin-bottom: 20px;
            /* Adds space below the title */
        }

        .other-login {
            text-align: center;
            margin-top: 40px;
            margin-bottom: -10px;
        }



        .cardhidden {
            background-color: white;

            padding-top: 100px;
            padding-bottom: 100px;

            margin-right: -105px;
            margin-left: -70px;
        }

        /* Style for the input fields */
        .login-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Style for the blurred placeholder text */
        .login-input::placeholder {
            color: #999;
            filter: blur(2px);
            /* Adjust the blur level */
        }

        .centered-button {
            justify-items: center;
            width: 350px;
            align-items: center;

            margin-top: 20px;
            margin-left: 130px;
            border-radius: 10px;
        }

        /* Social buttons */
        /* Styling for the social buttons */
        .social-button {
            background-color: #4285F4;
            /* Default color, can be customized for each button */
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .social-button:hover {
            background-color: #357AE8;
            /* Darker shade on hover */
        }

        /* Specific colors for Google and Facebook */
        .social-button.google {
            background-color: #DB4437;
            border-radius: 10px;
        }

        .social-button.facebook {
            background-color: #3B5998;
            border-radius: 10px;
        }

        .social-button.google:hover {
            background-color: #C13C31;
        }

        .social-button.facebook:hover {
            background-color: #2E4484;
        }

        /* Centering the buttons */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Styling for the social buttons */
        .social-button {
            display: inline-flex;
            align-items: center;
            background-color: #4285F4;
            /* Default color, can be customized for each button */
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .social-button:hover {
            background-color: #357AE8;
            /* Darker shade on hover */
        }

        /* Specific colors for Google and Facebook */
        .social-button.google {
            background-color: #DB4437;
        }

        .social-button.facebook {
            background-color: #3B5998;
        }

        .social-button.google:hover {
            background-color: #C13C31;
        }

        .social-button.facebook:hover {
            background-color: #2E4484;
        }

        /* Style for the logos */
        .social-button img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
            /* Space between form groups */
        }

        .form-group {
            margin-bottom: 20px; /* Space between form groups */
        }

        .form-group input {
            color: black;
            width: 350px;
            border-radius: 10px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            margin-left: 75px; /* Adjust margins as needed */
        }
    </style>
    <div class="container">
        <div class="left-side">
            <img src="<?= $this->Url->image('../webroot/img/lisa-logo.png') ?>" alt="Lisa Logo" class="background-image">
        </div>
        <div class="right-side">
            <div class="users form content cardhidden">
                <img src="<?= $this->Url->image('../webroot/img/login-logo-green.png') ?>" alt="SABE Logo" class="logo-image">

                <?= $this->Form->create() ?>
                <fieldset>
                    <legend class="login-title">Login</legend>
                    <?= $this->Flash->render() ?>
                    <?php
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'label' => 'Email', // Custom label text
                        'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 75px;',
                    ]);

                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'label' => 'Password', // Custom label text
                        'style' => 'color: black; width: 350px; border-radius: 10px; margin-left: 45px;',
                    ]);
                    ?>

                </fieldset>
                <div class="input-wrapper">
                    <?= $this->Html->link('Forgot Password?', '#', ['class' => 'button-clear']) ?>
                    <br>
                    <?= $this->Form->button('Login', ['class' => 'centered-button']) ?>
                    <?= $this->Form->end() ?>
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
    </div>
</body>

</html>
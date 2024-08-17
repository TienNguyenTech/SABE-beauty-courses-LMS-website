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

        .input-wrapper {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 10px;

        }



        .centered-button {

            padding: 10px 20px;

            background-color: #5F63FE;

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
            padding-left: 175px;
        }

        .placeholder {
            font-size: 20px;
            color: #5F63FE;
            margin-top: 20px;
        }

        .login-title {
            font-size: 36px;
            font-weight: bold;
            font-family: 'Arial', sans-serif; /* You can change the font-family to something more beautiful */
            color: #333; /* Adjust the color as needed */
            text-align: center; /* Centers the title */
            margin-bottom: 20px; /* Adds space below the title */
        }
        .other-login{
            text-align: center;
        }

        .centered-button{
            justify-items: center;
        }
    </style>
    <div class="container">
        <div class="left-side">
            <img src="<?= $this->Url->image('shoe-image.png') ?>" alt="Nike Shoe" class="background-image">
        </div>
        <div class="right-side">
            <div class="users form content">
                <img src="<?= $this->Url->image('nike-logo.png') ?>" alt="Nike Logo" class="logo-image">
                
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend class="login-title">Login</legend>
                    <?= $this->Flash->render() ?>
                    <?php
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'style' => 'color: black;',
                    ]);
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                    ]);
                    ?>
                </fieldset>
                <div class="input-wrapper">
                    <?= $this->Form->button('Login', ['class' => 'centered-button']) ?>
                    <?= $this->Form->end() ?>
                    <br>
                    <?= $this->Html->link('Forgot Password?', '#', ['class' => 'button-clear']) ?>
                </div>
                <p class="other-login">Or Login With</p>
                <button class="centered-button">Google</button>
                <button class="centered-button">Facebook</button>
            </div>
        </div>
    </div>
</body>

</html>
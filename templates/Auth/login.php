<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->layout = 'login';
$this->assign('title', 'Login');
?>

<html>

<body>
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
        }

        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .page-title{
            text-align: center;
            padding-top: 10px;
        }

    

       
    </style>
    <div class="container login">
        <div class="row">
            <div class="column column-50 column-offset-25">

                <div class="topnav">
                    <h1 class="page-title"><b>SABE</b></h1>
                </div>
                <div class="users form content">

                    <?= $this->Form->create() ?>

                    <fieldset>

                        <legend style="font-size: 24px; color: black;">Login</legend>


                        <?= $this->Flash->render() ?>

                        <?php
                        /*
                         * NOTE: regarding 'value' config in the login page form controls
                         * In this demo the email and password fields will be filled by demo account
                         * credentials when debug mode is on. You should NOT do that in your production
                         * systems. Also it's a good practice to clear (set password value to empty)
                         * in the view so when an error occurred with form validation, the password
                         * values are always cleared.
                         */
                        echo $this->Form->control('email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true,
                            'style' => 'color: black;', // Apply black text color
//                        'value' => $debug ? "test@example.com" : "",
                        ]);
                        echo $this->Form->control('password', [
                            'type' => 'password',
                            'required' => true,
                            //                        'value' => $debug ? '1234' : '',
                        ]);
                        ?>
                        <!--                    --><?php //= $this->Html->link('Forgot password?', ['controller' => 'Auth', 'action' => 'forgetPassword']) ?>
                    </fieldset>

                    <!--                --><?php //= $this->Form->button('Login') ?>
                    <div class="input-wrapper">
                        <?= $this->Form->button('Login', ['class' => 'centered-button']) ?>
                        <?= $this->Form->end() ?>

                        <hr class="hr-between-buttons">

                        <!--                --><?php //= $this->Html->link("Don't have an account? Sign Up", ['controller' => 'Auth', 'action' => 'register'], ['class' => 'button button-clear']) ?>
                        <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button button-clear']) ?>
                    </div>
                </div>
            </div>
        </div>
</body>
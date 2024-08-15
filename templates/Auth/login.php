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
            align-items: center;
            margin-left: 40%;
            margin-top: 5%;
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
    <div class="container login">
        <div class="row">
            <div class="column column-50 column-offset-25">

                <div class="topnav">
                    <h1 class="page-title"><b>SABE</b></h1>
                </div>
                <div class="users form content">

                    <?= $this->Form->create() ?>

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
                        
                    </fieldset>

<!--                    --><?php //= $this->Html->link('Forgotten your password?', ['controller' => 'Auth', 'action' => 'forgetPassword'], ['class' => 'button-clear']) ?>
                    
                    <div class="input-wrapper">
                        <?= $this->Form->button('Login', ['class' => 'centered-button']) ?>
                        <?= $this->Form->end() ?>

                    </br>

                        <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button-clear']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

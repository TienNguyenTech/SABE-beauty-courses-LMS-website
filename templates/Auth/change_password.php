<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', 'Change User Password - Users');
?>
<style>
    .form-container {
        max-width: 450px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-container legend {
        font-size: 1.5em;
        margin-bottom: 10px;
    }
    .form-container .form-group {
        margin-bottom: 15px;
        position: relative;
    }
    .form-container .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-container .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 410px;
    }
    .form-container .form-group .toggle-password {
        position: absolute;
        top: 35px;
        right: 10px;
        cursor: pointer;
    }
    .form-container .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 1em;
    }
</style>
<div class="row">
    <div class="column">
        <div class="form-container">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend>Change the Password</legend>
                <div class="form-group">
                    <?= $this->Form->control('password', [
                        'label' => 'New Password',
                        'value' => '',  // Ensure password is not sending back to the client side
                        'templateVars' => ['container_class' => 'column'],
                        'id' => 'password'
                    ]); ?>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="fas fa-fw fa-eye"></i>
                    </span>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'value' => '',  // Ensure password is not sending back to the client side
                        'label' => 'Retype New Password',
                        'templateVars' => ['container_class' => 'column'],
                        'id' => 'password_confirm'
                    ]); ?>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password_confirm')">
                        <i class="fas fa-fw fa-eye"></i>
                    </span>
                </div>
            </fieldset>
            <div class="form-group">
                <?= $this->Form->button('Submit') ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    function togglePasswordVisibility(fieldId) {
        var field = document.getElementById(fieldId);
        var icon = field.parentElement.querySelector('.toggle-password i');
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

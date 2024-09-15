<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new user</h1>
<?= $this->Form->create($user) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('user_firstname', [
        'label' => ['text' => 'First Name *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('user_surname', [
        'label' => ['text' => 'Surname *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('email', [
        'label' => ['text' => 'Email Address *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('user_phone', [
        'label' => ['text' => 'Phone Number', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('user_type', [
        'label' => ['text' => 'User Type *', 'style' => 'width: 150px; text-align: left;'],
        'options' => ['admin' => 'admin'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('password', [
        'label' => ['text' => 'Password *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>

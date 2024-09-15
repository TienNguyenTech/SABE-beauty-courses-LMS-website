<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $bookings
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit user</h1>
<?= $this->Form->create($user) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('user_firstname', [
        'label' => ['text' => 'First name *', 'style' => 'width: 150px; text-align: left;'],
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
        'label' => ['text' => 'Email *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 450px; margin-left: 10px;'
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
        'options' => ['admin' => 'admin', 'student' => 'student'],
        'label' => ['text' => 'User Type *', 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>


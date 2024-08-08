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
<?php
echo $this->Form->control('user_firstname');
echo $this->Form->control('user_surname');
echo $this->Form->control('user_email');
echo $this->Form->control('user_phone');
echo $this->Form->control('user_type');
echo $this->Form->control('user_password');
echo $this->Form->control('bookings._ids', ['options' => $bookings]);
echo $this->Form->control('courses._ids', ['options' => $courses]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

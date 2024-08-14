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
<?php
echo $this->Form->control('user_firstname');
echo $this->Form->control('user_surname');
echo $this->Form->control('email');
echo $this->Form->control('user_phone');
echo $this->Form->control('user_type');
echo $this->Form->control('password');
echo $this->Form->control('bookings._ids', ['options' => $bookings]);
echo $this->Form->control('courses._ids', ['options' => $courses]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

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
echo $this->Form->control('user_firstname', ['label' => 'First Name *']);
echo $this->Form->control('user_surname', ['label' => 'Surname *']);
echo $this->Form->control('email', ['label' => 'Email Address *']);
echo $this->Form->control('user_phone', ['label' => 'Phone Number']);
echo $this->Form->control('user_type', ['options' => ['admin' => 'admin'], 'label' => 'User Type *']);
echo $this->Form->control('password', ['label' => 'Password *']);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

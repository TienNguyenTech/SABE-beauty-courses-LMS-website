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
echo $this->Form->control('user_firstname', ['label' => 'First name *']);
echo $this->Form->control('user_surname', ['label' => 'Surname *']);
echo $this->Form->control('email', ['label' => 'Email *']);
echo $this->Form->control('user_phone', ['label' => 'Phone Number']);
echo $this->Form->control('user_type', ['options' => ['admin' => 'admin'], 'label' => 'User Type *']);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

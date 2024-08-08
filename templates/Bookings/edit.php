<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit Booking</h1>
<?= $this->Form->create($booking) ?>
<?php
echo $this->Form->control('course_id', ['options' => $courses]);
echo $this->Form->control('booking_type');
echo $this->Form->control('users._ids', ['options' => $users]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

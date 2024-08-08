<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new Session</h1>
<?= $this->Form->create($session) ?>
<?php
echo $this->Form->control('session_datetime');
echo $this->Form->control('session_duration');
echo $this->Form->control('session_location');
echo $this->Form->control('booking_id', ['options' => $bookings]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

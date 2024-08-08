<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new payment</h1>
<?= $this->Form->create($payment) ?>
<?php
echo $this->Form->control('payment_amount');
echo $this->Form->control('payment_datetime');
echo $this->Form->control('booking_id', ['options' => $bookings]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

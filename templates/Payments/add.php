<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>


<h1 class="h3 mb-2 text-gray-800">New enrollment</h1>
<?= $this->Form->create($payment) ?>

<div class="form-group row">
    <label for="course" class="col-sm-2 col-form-label clearfix">Course <span style="color: red;">*</span></label>
    <?= $this->Form->control('course_id', [
        'options' => $courses,
        'label' => false,
        'class' => 'form-control'
    ]) ?>
</div>

<div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label clearfix">User <span style="color: red;">*</span></label>
    <?= $this->Form->control('user_id', [
        'options' => $users,
        'label' => false,
        'class' => 'selectpicker form-control',
        'id' => 'user_id',
        'data-live-search' => 'true',
        'empty' => 'Select a user...',
        'data-style' => 'form-control border border-dark'
    ]) ?>
</div>

<script>
$(document).ready(function() {
    $('#user_id').selectpicker();
});
</script>

<div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
        <?= $this->Html->link('Cancel', ['action' => 'enrollments'], ['class' => 'btn btn-secondary']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?= $this->Form->end() ?>

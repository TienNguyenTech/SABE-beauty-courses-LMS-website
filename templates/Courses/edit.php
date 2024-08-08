<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit course</h1>
<?= $this->Form->create($course) ?>
<?php
echo $this->Form->control('course_name');
echo $this->Form->control('course_description');
echo $this->Form->control('course_price');
echo $this->Form->control('users._ids', ['options' => $users]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>


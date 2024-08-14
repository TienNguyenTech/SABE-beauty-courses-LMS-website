<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new course</h1>
<?= $this->Form->create($course, ['type' => 'file', 'class' => 'text-gray-800']) ?>
<?php
echo $this->Form->control('course_name', [
    'label' => [
        'text' => 'Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);

echo $this->Form->file('course_image', ['label' => 'Image', 'type' => 'file', 'class' => 'form-control']);

echo $this->Form->control('course_description', [
    'label' => [
        'text' => 'Description <span style="color: red;">*</span>',
        'escape' => false
    ],
    'type' => 'textarea',
    'class' => 'form-control',
    'maxlength' => '255'
]);

echo $this->Form->control('course_price', [
    'label' => [
        'text' => 'Price <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control',
    'type' => 'number',
    'min' => '2',
    'max' => '500',
    'maxlength' => '2',
    'style' => 'margin-bottom: 10px'
]);

echo $this->Form->control('users._ids', ['options' => $users]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

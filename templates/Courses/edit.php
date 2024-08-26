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
echo h('Course Mode') . ' <span style="color: red;">*</span>';
echo $this->Form->select('course_category',['Hybrid' => 'Hybrid', 'Workshop' => 'Workshop', 'Online' => 'Online' ], ['label' => [
        'text' => 'Name <span style="color: red;">*</span>',
        'escape' => false
]]);
echo $this->Form->control('course_description', ['type' => 'textarea']);
echo $this->Form->control('course_price');
echo h('Featured Course') . ' <span style="color: red;">*</span>';
echo $this->Form->select('course_featured', ['1' => 'Yes', '0' => 'No'], ['label' => ['text' => 'Featured Course', 'escape' => false]]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary','style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>


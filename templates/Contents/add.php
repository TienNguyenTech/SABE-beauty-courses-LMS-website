<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>

<h1 class="h3 mb-2 text-gray-800">Add new course content</h1>
<?= $this->Form->create($content, ['type' => 'file','class' => 'text-gray-800']) ?>

<?php
echo $this->Form->control('content_title', [
    'label' => [
        'text' => 'Content Title <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);
echo h('Content Type') . ' <span style="color: red;">*</span>';
echo $this->Form->select('content_type',['pdf' => 'PDF', 'video' => 'Video', 'image' => 'Image' ], ['label' => [
    'text' => 'Content Type <span style="color: red;">*</span>',
    'escape' => false
]]);
echo $this->Form->control('content_description', [
    'label' => [
        'text' => 'Description <span style="color: red;">*</span>',
        'escape' => false
    ],
    'type' => 'textarea',
    'class' => 'form-control',
]);
echo h('Content Upload') . ' <span style="color: red;">*</span>';
echo $this->Form->file('course_image', ['label' => 'Image', 'type' => 'file', 'class' => 'form-control']);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
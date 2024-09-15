<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit course</h1>
<?= $this->Form->create($content, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<?php
echo $this->Form->control('content_title', [
    'label' => [
        'text' => 'Content Title <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);
echo h('Content Type') . ' <span style="color: red;">*</span>';
echo $this->Form->select('content_type',['pdf' => 'PDF', 'video' => 'Video', 'image' => 'Image' ], ['id' => 'fileType', 'label' => [
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
echo $this->Form->file('content_image', ['id' => 'fileUpload', 'label' => 'Image', 'type' => 'file', 'class' => 'form-control', 'accept' => '.pdf', 'style' => 'margin-bottom: 10px']);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

<script>
    const fileType = document.getElementById('fileType');
    const fileUpload = document.getElementById('fileUpload');

    fileType.addEventListener('change', updateFiletype);
    document.addEventListener('DOMContentLoaded', updateFiletype);

    function updateFiletype() {
        if(fileType.value == 'pdf') {
            fileUpload.setAttribute('accept', '.pdf');
        } else if(fileType.value == 'video') {
            fileUpload.setAttribute('accept', '.mp4,.mov');
        } else if(fileType.value == 'image') {
            fileUpload.setAttribute('accept', '.png,.jpg,.jpeg,image/png');
        }
    }
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var \App\Model\Entity\Course $course
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new course content to <?= h($course->course_name) ?></h1>
<?= $this->Form->create($content, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('content_title', [
        'label' => [
            'text' => 'Content Title <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'style' => 'width: 400px; margin-left: 10px;'  // 400px for Content Title
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Content Upload') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->file('content_image', [
        'id' => 'fileUpload',
        'style' => 'margin-left: 10px; margin-bottom: 10px;',
        'accept' => '.pdf,.mp4,.mov,.png,.jpg,.jpeg,image/png'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: none; align-items: center;">
    <?= h('Content Type') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('content_type', [
        'none' => 'None',
        'pdf' => 'PDF',
        'video' => 'Video',
        'image' => 'Image'
    ], [
        'id' => 'fileType',
        'style' => 'width: 200px; margin-left: 10px;',
        'display' => 'none',
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('content_description', [
        'label' => [
            'text' => 'Description <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'type' => 'textarea',
        'style' => 'width: 800px; margin-left: 10px;'  // 800px for Description
    ]) ?>
</div>


<?= $this->Html->link('Cancel', ['controller' => 'Courses', 'action' => 'course', $course->course_id], ['class' => 'btn btn-secondary', 'style' => 'margin-top: 10px; margin-right: 10px']) ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>

<script>
    const fileType = document.getElementById('fileType');
    const fileUpload = document.getElementById('fileUpload');

    fileUpload.addEventListener('change', () => {
        filePath = fileUpload.value;
        extension = filePath.split('.').at(-1).toLowerCase();

        if(extension == 'pdf') {
            fileType.value = 'pdf';
        } else if(extension == 'mp4' || extension == 'mov') {
            fileType.value = 'video';
        } else if(extension == 'png' || extension == 'jpg' || extension == 'jpeg') {
            fileType.value = 'image';
        }

        console.log(fileType.value);
    });

    // fileType.addEventListener('change', () => {
    //     if (fileType.value == 'pdf') {
    //         fileUpload.setAttribute('accept', '.pdf');
    //     } else if (fileType.value == 'video') {
    //         fileUpload.setAttribute('accept', '.mp4,.mov');
    //     } else if (fileType.value == 'image') {
    //         fileUpload.setAttribute('accept', '.png,.jpg,.jpeg,image/png');
    //     }
    // });
</script>

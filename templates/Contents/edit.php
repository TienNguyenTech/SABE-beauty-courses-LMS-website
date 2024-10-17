<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit course</h1>
<?= $this->Form->create($content, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('content_title', [
        'label' => [
            'text' => 'Content Title <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'style' => 'width: 400px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; ">
    <?= h('Content Upload') . ' <span style="color: red;">*</span>' ?><br>

    <?php
    if($content->content_url) {
        echo h('Current Content') . '<br>';
        if($content->content_type == 'pdf') {
            ?>
            <object class="pdf" data="/<?= $content->content_url ?>" width="600px" height="300px"></object><br>
            <?php
        } else if($content->content_type == 'image') {
            echo '<img width="200px" style="margin-bottom: 10px" src="/' . $content->content_url . '"><br>';
        } else if($content->content_type == 'video') {
            ?>
            <video controls width="600px">
                <source src="/<?= $content->content_url ?>" type="video/mp4">
            </video>
            <br>
            <?php
        }
        echo h('Upload new content');
    }
    ?>

    <?= $this->Form->file('content_image', [
        'id' => 'fileUpload',
        'label' => 'Image',
        'type' => 'file',
        'style' => 'margin-left: 10px; margin-bottom: 10px;',
        'accept' => '.pdf,.mp4,.mov,.png,.jpg,.jpeg,image/png'
    ]) ?>
</div>

<div style="margin-bottom: 15px; align-items: center; display: none">
    <?= h('Content Type') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('content_type', [
        'pdf' => 'PDF',
        'video' => 'Video',
        'image' => 'Image'
    ], [
        'id' => 'fileType',
        'style' => 'width: 200px; margin-left: 10px;',
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
        'style' => 'width: 800px; margin-left: 10px;'
    ]) ?>
</div>

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
</script>

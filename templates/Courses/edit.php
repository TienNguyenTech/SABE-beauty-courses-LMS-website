<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>

<h1 class="h3 mb-2 text-gray-800">Edit course</h1>
<?= $this->Form->create($course, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('course_name', [
        'label' => ['text' => 'Name <span style="color: red;">*</span>', 'escape' => false, 'style' => 'width: 150px; text-align: left;'],
        'style' => 'width: 375px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; ">
    <?= h('Cover Image') ?><br>

    <?php
    if($course->course_image) {
        echo h('Current Image') . '<br>';
        echo '<img width="200px" style="margin-bottom: 10px" src="/' . $course->course_image . '"><br>';
        echo h('Upload new image');
    }
    ?>

    <?= $this->Form->file('course_image', [
        'label' => 'Image',
        'style' => 'margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Course Mode') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('course_category', [
        'Hybrid' => 'Hybrid',
        'Workshop' => 'Workshop',
        'Online' => 'Online'
    ], [
        'style' => 'margin-left: 10px; width: 200px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('course_description', [
        'label' => ['text' => 'Description <span style="color: red;">*</span>', 'escape' => false, 'style' => 'width: 150px; text-align: left;'],
        'type' => 'textarea',
        'style' => 'width: 900px; margin-left: 10px;'

    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('course_price', [
        'label' => ['text' => 'Price <span style="color: red;">*</span>', 'escape' => false, 'style' => 'width: 150px; text-align: left;'],
        'type' => 'number',
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Featured Course on homepage') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('course_featured', [
        '1' => 'Yes',
        '0' => 'No'
    ], [
        'style' => 'margin-left: 10px; width: 200px;'
    ]) ?>
</div>

<?= $this->Html->link('Cancel', ['controller' => 'Courses', 'action' => 'index'], ['class' => 'btn btn-secondary', 'style' => 'margin-top: 10px; margin-right: 10px']) ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>


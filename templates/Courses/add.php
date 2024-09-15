<h1 class="h3 mb-2 text-gray-800">Add new course</h1>
<?= $this->Form->create($course, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('course_name', [
        'label' => [
            'text' => 'Name <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'style' => 'width: 400px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Cover Image') . ' <span style="color: red;">*</span>' ?>
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
        'label' => [
            'text' => 'Description <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'type' => 'textarea',
        'style' => 'width: 800px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('course_price', [
        'label' => [
            'text' => 'Price <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'
        ],
        'type' => 'number',
        'style' => 'width: 200px; margin-left: 10px;'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Featured Course') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('course_featured', [
        '1' => 'Yes',
        '0' => 'No'
    ], [
        'style' => 'margin-left: 10px; width: 200px;'
    ]) ?>
</div>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>

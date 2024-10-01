<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<h1 class="h3 mb-2 text-gray-800">Edit service</h1>

<?= $this->Form->create($service, ['class' => 'text-gray-800']); ?>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('service_name', [
        'label' => [
            'text' => 'Name <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'  // Label width and alignment
        ],
        'style' => 'width: 400px; margin-left: 10px;',  // Input field width
        'class' => 'form-control'
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= h('Category') . ' <span style="color: red;">*</span>' ?>
    <?= $this->Form->select('service_category', [
        'Lash & Brow Treatments' => 'Lash & Brow Treatments',
        'Hair Removal' => 'Hair Removal',
        'Spray Tan' => 'Spray Tan',
        'Skincare Treatments' => 'Skincare Treatments',
        'Massage Treatments' => 'Massage Treatments',
        'Foot Treatments' => 'Foot Treatments'
    ], [
        'style' => 'width: 400px; margin-left: 10px;',  // Select field width
    ]) ?>
</div>

<div style="margin-bottom: 15px; display: flex; align-items: center;">
    <?= $this->Form->control('service_price', [
        'label' => [
            'text' => 'Price <span style="color: red;">*</span>',
            'escape' => false,
            'style' => 'width: 150px; text-align: left;'  // Label width and alignment
        ],
        'style' => 'width: 200px; margin-left: 10px;',  // Input field width
        'class' => 'form-control',
        'type' => 'number'
    ]) ?>
</div>

<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) ?>
<?= $this->Form->end() ?>

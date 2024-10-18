<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 * @var \Cake\Collection\CollectionInterface|string[] $serviceCategorys
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
    <?= $this->Form->control('category_id', [
        'label' => 'Category',
        'options' => $serviceCategorys
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

<?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary', 'style' => 'margin-right: 10px']) ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

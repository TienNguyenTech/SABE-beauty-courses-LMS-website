<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceCategory $serviceCategory
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new category</h1>

<?= $this->Form->create($serviceCategory, ['class' => 'text-gray-800']); ?>
<?php
echo $this->Form->control('category_name', [
    'label' => [
        'text' => 'Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);
?>
<?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-secondary', 'style' => 'margin-right: 10px']) ?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>
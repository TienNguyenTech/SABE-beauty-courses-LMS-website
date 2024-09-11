<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new service</h1>

<?= $this->Form->create($service, ['class' => 'text-gray-800']); ?>
<?php
echo $this->Form->control('service_name', [
    'label' => [
        'text' => 'Name <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control'
]);
echo h('Category') . ' <span style="color: red;">*</span>';
echo $this->Form->select('service_category', [
    'Lash & Brow Treatments' => 'Lash & Brow Treatments',
    'Hair Removal' => 'Hair Removal',
    'Spray Tan' => 'Spray Tan',
    'Skincare Treatments' => 'Skincare Treatments',
    'Massage Treatments' => 'Massage Treatments',
    'Foot Treatments' => 'Foot Treatments'
]);

echo $this->Form->control('service_price', [
    'label' => [
        'text' => 'Price <span style="color: red;">*</span>',
        'escape' => false
    ],
    'class' => 'form-control',
    'type' => 'number'
]);
?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>


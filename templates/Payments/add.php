<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 */
$formTemplate = [
    'inputContainer'=>'<div class="mb-3 input {{type}}{{required}}">{{content}}</div>',
    'label'=>'<label{{attrs}} class="form-label">{{text}}</label>',
    'input'=>'<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
    'textarea'=>'<textarea name="{{name}}" class="form-control"{{attrs}}>{{value}}</textarea>',
    'nestingLabel'=>'{{hidden}}<label class="form-check-label"{{attrs}}>{{input}}{{text}}</label>',
    'checkbox'=>'<input type="checkbox" name="{{name}}" value="{{value}}" class="form-check-input"{{attrs}}>',
    'select' => '<select name="{{name}}" class="form-control"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<select name="{{name}}[]" multiple="multiple" class="form-control"{{attrs}}>{{content}}</select>',
];
$this->Form->setTemplates($formTemplate);
?>
<h1 class="h3 mb-2 text-gray-800">Add new payment</h1>
<?= $this->Form->create($payment) ?>
<?php
echo $this->Form->control('payment_amount');
echo $this->Form->control('payment_datetime');
echo $this->Form->control('booking_id', ['options' => $bookings]);
?>

<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>

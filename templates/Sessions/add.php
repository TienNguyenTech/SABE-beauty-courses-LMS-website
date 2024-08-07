<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sessions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sessions form content">
            <?= $this->Form->create($session) ?>
            <fieldset>
                <legend><?= __('Add Session') ?></legend>
                <?php
                    echo $this->Form->control('session_datetime');
                    echo $this->Form->control('session_duration');
                    echo $this->Form->control('session_location');
                    echo $this->Form->control('booking_id', ['options' => $bookings]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

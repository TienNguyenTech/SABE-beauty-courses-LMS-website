<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progression $progression
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $contents
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $progression->progression_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Progressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progressions form content">
            <?= $this->Form->create($progression) ?>
            <fieldset>
                <legend><?= __('Edit Progression') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('content_id', ['options' => $contents]);
                    echo $this->Form->control('is_completed');
                    echo $this->Form->control('completed_at');
                    echo $this->Form->control('archived');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

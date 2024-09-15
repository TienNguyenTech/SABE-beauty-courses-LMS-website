<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Completion $completion
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Completions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="completions form content">
            <?= $this->Form->create($completion) ?>
            <fieldset>
                <legend><?= __('Add Completion') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('course_id', ['options' => $courses]);
                    echo $this->Form->control('completed_at');
                    echo $this->Form->control('archived');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

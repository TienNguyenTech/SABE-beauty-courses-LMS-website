<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $quizzes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Responses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="responses form content">
            <?= $this->Form->create($response) ?>
            <fieldset>
                <legend><?= __('Add Response') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('quiz_id', ['options' => $quizzes]);
                    echo $this->Form->control('response_json');
                    echo $this->Form->control('response_score');
                    echo $this->Form->control('submitted_at');
                    echo $this->Form->control('archived');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

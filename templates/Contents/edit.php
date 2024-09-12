<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $content->content_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $content->content_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contents form content">
            <?= $this->Form->create($content) ?>
            <fieldset>
                <legend><?= __('Edit Content') ?></legend>
                <?php
                    echo $this->Form->control('course_id', ['options' => $courses]);
                    echo $this->Form->control('content_type');
                    echo $this->Form->control('content_url');
                    echo $this->Form->control('content_title');
                    echo $this->Form->control('content_description');
                    echo $this->Form->control('content_position');
                    echo $this->Form->control('archived');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

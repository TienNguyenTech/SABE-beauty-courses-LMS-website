<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progression $progression
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Progression'), ['action' => 'edit', $progression->progression_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Progression'), ['action' => 'delete', $progression->progression_id], ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Progressions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Progression'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progressions view content">
            <h3><?= h($progression->progression_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $progression->hasValue('user') ? $this->Html->link($progression->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $progression->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= $progression->hasValue('content') ? $this->Html->link($progression->content->content_type, ['controller' => 'Contents', 'action' => 'view', $progression->content->content_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Progression Id') ?></th>
                    <td><?= $this->Number->format($progression->progression_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completed At') ?></th>
                    <td><?= h($progression->completed_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Completed') ?></th>
                    <td><?= $progression->is_completed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Archived') ?></th>
                    <td><?= $progression->archived ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

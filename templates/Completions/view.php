<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Completion $completion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Completion'), ['action' => 'edit', $completion->completion_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Completion'), ['action' => 'delete', $completion->completion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $completion->completion_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Completions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Completion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="completions view content">
            <h3><?= h($completion->completion_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $completion->hasValue('user') ? $this->Html->link($completion->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $completion->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $completion->hasValue('course') ? $this->Html->link($completion->course->course_name, ['controller' => 'Courses', 'action' => 'view', $completion->course->course_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Completion Id') ?></th>
                    <td><?= $this->Number->format($completion->completion_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completed At') ?></th>
                    <td><?= h($completion->completed_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archived') ?></th>
                    <td><?= $completion->archived ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Completion> $completions
 */
?>
<div class="completions index content">
    <?= $this->Html->link(__('New Completion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Completions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('completion_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('completed_at') ?></th>
                    <th><?= $this->Paginator->sort('archived') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($completions as $completion): ?>
                <tr>
                    <td><?= $this->Number->format($completion->completion_id) ?></td>
                    <td><?= $completion->hasValue('user') ? $this->Html->link($completion->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $completion->user->user_id]) : '' ?></td>
                    <td><?= $completion->hasValue('course') ? $this->Html->link($completion->course->course_name, ['controller' => 'Courses', 'action' => 'view', $completion->course->course_id]) : '' ?></td>
                    <td><?= h($completion->completed_at) ?></td>
                    <td><?= h($completion->archived) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $completion->completion_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $completion->completion_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $completion->completion_id], ['confirm' => __('Are you sure you want to delete # {0}?', $completion->completion_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

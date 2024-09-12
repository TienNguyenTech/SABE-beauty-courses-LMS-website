<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Progression> $progressions
 */
?>
<div class="progressions index content">
    <?= $this->Html->link(__('New Progression'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Progressions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('progression_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('content_id') ?></th>
                    <th><?= $this->Paginator->sort('is_completed') ?></th>
                    <th><?= $this->Paginator->sort('completed_at') ?></th>
                    <th><?= $this->Paginator->sort('archived') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($progressions as $progression): ?>
                <tr>
                    <td><?= $this->Number->format($progression->progression_id) ?></td>
                    <td><?= $progression->hasValue('user') ? $this->Html->link($progression->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $progression->user->user_id]) : '' ?></td>
                    <td><?= $progression->hasValue('content') ? $this->Html->link($progression->content->content_type, ['controller' => 'Contents', 'action' => 'view', $progression->content->content_id]) : '' ?></td>
                    <td><?= h($progression->is_completed) ?></td>
                    <td><?= h($progression->completed_at) ?></td>
                    <td><?= h($progression->archived) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $progression->progression_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $progression->progression_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $progression->progression_id], ['confirm' => __('Are you sure you want to delete # {0}?', $progression->progression_id)]) ?>
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

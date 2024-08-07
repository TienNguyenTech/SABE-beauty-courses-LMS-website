<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Session> $sessions
 */
?>
<div class="sessions index content">
    <?= $this->Html->link(__('New Session'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sessions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('session_id') ?></th>
                    <th><?= $this->Paginator->sort('session_datetime') ?></th>
                    <th><?= $this->Paginator->sort('session_duration') ?></th>
                    <th><?= $this->Paginator->sort('session_location') ?></th>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sessions as $session): ?>
                <tr>
                    <td><?= $this->Number->format($session->session_id) ?></td>
                    <td><?= h($session->session_datetime) ?></td>
                    <td><?= $this->Number->format($session->session_duration) ?></td>
                    <td><?= h($session->session_location) ?></td>
                    <td><?= $session->hasValue('booking') ? $this->Html->link($session->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $session->booking->booking_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $session->session_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->session_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->session_id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id)]) ?>
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

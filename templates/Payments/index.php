<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('payment_id') ?></th>
                    <th><?= $this->Paginator->sort('payment_amount') ?></th>
                    <th><?= $this->Paginator->sort('payment_datetime') ?></th>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->payment_id) ?></td>
                    <td><?= $this->Number->format($payment->payment_amount) ?></td>
                    <td><?= h($payment->payment_datetime) ?></td>
                    <td><?= $payment->hasValue('booking') ? $this->Html->link($payment->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $payment->booking->booking_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->payment_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->payment_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->payment_id)]) ?>
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

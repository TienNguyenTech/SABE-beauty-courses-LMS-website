<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->payment_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->payment_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="payments view content">
            <h3><?= h($payment->payment_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $payment->hasValue('booking') ? $this->Html->link($payment->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $payment->booking->booking_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Id') ?></th>
                    <td><?= $this->Number->format($payment->payment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Amount') ?></th>
                    <td><?= $this->Number->format($payment->payment_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Datetime') ?></th>
                    <td><?= h($payment->payment_datetime) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

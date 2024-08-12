<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="payments view content">
            <h3><?= h($payment->payment_id) ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <th><?= __('Payment Id') ?></th>
                    <th><?= __('Payment Amount') ?></th>
                    <th><?= __('Payment Datetime') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $payment->hasValue('booking') ? $this->Html->link($payment->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $payment->booking->booking_id]) : '' ?></td>
                    <td><?= $this->Number->format($payment->payment_id) ?></td>
                    <td><?= $this->Number->format($payment->payment_amount) ?></td>
                    <td><?= h($payment->payment_datetime) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

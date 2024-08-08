<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="payments index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Payments') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Payment</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('payment_id') ?></th>
                    <th><?= h('payment_amount') ?></th>
                    <th><?= h('payment_datetime') ?></th>
                    <th><?= h('booking_id') ?></th>
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>

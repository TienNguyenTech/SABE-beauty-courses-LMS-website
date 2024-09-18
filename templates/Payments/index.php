<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 * @var array $courses
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);

// Define the Australian timezone
$ausTimezone = new \DateTimeZone('Australia/Sydney');
?>
<div class="payments index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Payments') ?></h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('payment_amount', 'Amount') ?></th>
                    <th><?= $this->Paginator->sort('payment_datetime', 'Payment Time') ?></th>
                    <th><?= $this->Paginator->sort('payment_email', 'Email Address') ?></th>
                    <th><?= $this->Paginator->sort('course', 'Course') ?></th>
                    <th><?= $this->Paginator->sort('payment_seen', 'Read') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td>$<?= $this->Number->format($payment->payment_amount, ['places' => 2]) ?></td>
                    <td>
                        <?php
                        $paymentTime = new \DateTime($payment->payment_datetime);
                        $paymentTime->setTimezone($ausTimezone);
                        echo h($paymentTime->format('n/j/y, g:i A'));
                        ?>
                    </td>
                    <td><?= h($payment->payment_email) ?></td>
                    <td><?= $this->Html->link($payment->course->course_name, ['controller' => 'Courses', 'action' => 'view', $payment->course->course_id]) ?></td>
                    <td><?= h($payment->payment_seen ? 'Read' : 'Unread') ?></td>
                    <td class="actions">
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $payment->payment_id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->payment_id]) ?>
<!--                        --><?php //= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->payment_id)]) ?>
                        <?= $this->Html->link($payment->payment_seen ? 'Mark as Unread' : 'Mark as Read', ['action' => 'toggle', $payment->payment_id], ['class' => 'btn btn-primary']) ?>
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

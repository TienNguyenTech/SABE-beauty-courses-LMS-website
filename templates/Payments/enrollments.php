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
                    <th><?= $this->Paginator->sort('payment_datetime', 'Enrollment Time') ?></th>
                    <th><?= $this->Paginator->sort('user', 'Student') ?></th>
                    <th><?= $this->Paginator->sort('course', 'Course') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= h($payment->payment_datetime) ?></td>
                    <td>
                        <?= h($payment->user->user_firstname . ' ' . $payment->user->user_surname) ?>
                    </td>
                    <td><?= $this->Html->link($payment->course->course_name, ['controller' => 'Courses', 'action' => 'course', $payment->course->course_id]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View Progress'), ['action' => 'view', $payment->payment_id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link('Archive', ['action' => 'archive', $payment->payment_id], ['class' => 'btn btn-primary']) ?>
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

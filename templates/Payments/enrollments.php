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
        <h1 class="h3 mb-0 text-gray-800"><?= __('Enrollments') ?></h1>
        <?= $this->Html->link('+ New enrollment', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Html->link('View Archive', ['action' => 'archived'], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px']) ?>
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
                        <?= $this->Html->link(__('View Progress'), ['controller' => 'Courses', 'action' => 'enrollment', $payment->user_id, $payment->course->course_id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('Archive', ['action' => 'archive', $payment->payment_id], ['class' => 'btn btn-primary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <style>
         @media only screen and (max-width: 768px) {
            .topbar .nav-item .nav-link {
                right: 10px;
            }

            .dashboard-card {
                flex-direction: column;
            }

            .navbar-nav {
                max-width: 17%;
            }

            .sidebar .nav-item .nav-link {
                width: auto;
                padding: .75rem 0;
            }

            .sidebar .sidebar-heading {
                padding: 0;
            }

            .dashboard-container {
                flex-direction: column;
            }

            .dashboard-card {
                max-width: 100%;
            }

            .h1,
            h1 {
                font-size: 2rem;
            }

            #des {
                display: none;
            }
            .payments h1 {
                font-size: 2rem;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>

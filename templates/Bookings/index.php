<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Booking> $bookings
 */

echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="bookings index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Bookings') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Booking</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('booking_id') ?></th>
                    <th><?= h('course_id') ?></th>
                    <th><?= h('booking_type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $this->Number->format($booking->booking_id) ?></td>
                    <td><?= $booking->hasValue('course') ? $this->Html->link($booking->course->course_name, ['controller' => 'Courses', 'action' => 'view', $booking->course->course_id]) : '' ?></td>
                    <td><?= h($booking->booking_type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->booking_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->booking_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id)]) ?>
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

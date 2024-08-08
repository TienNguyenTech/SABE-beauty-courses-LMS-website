<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Session> $sessions
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="sessions index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Sessions') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Session</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('session_id') ?></th>
                    <th><?= h('session_datetime') ?></th>
                    <th><?= h('session_duration') ?></th>
                    <th><?= h('session_location') ?></th>
                    <th><?= h('booking_id') ?></th>
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>

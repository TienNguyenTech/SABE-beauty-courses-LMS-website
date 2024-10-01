<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<style>
    .users h1 {
        color: #1a4332;
    }

    .table th {
        color: black;
    }

     /* Add Button */
     .add-btn {
        background-color: #1cc88a;
        color: white;
        display: inline-block;
        padding: 5px 10px;
        /* Smaller padding */
        width: 100px;
        /* Smaller width */
        height: 35px;
        /* Smaller height */
        text-align: center;
    }

    .add-btn:hover {
        background-color: #17a673;
        /* Darker shade of green */
    }

    /* Edit Button */
    .edit-btn {
        background-color: #ffc107;
        color: white;
        display: inline-block;
        padding: 5px 10px;
        /* Smaller padding */
        width: 100px;
        /* Smaller width */
        height: 35px;
        /* Smaller height */
        text-align: center;
    }

    .edit-btn:hover {
        background-color: #e0a800;
        /* Darker shade of yellow */
    }

    /* Delete Button */
    .delete-btn {
        background-color: #dc3545;
        color: white;
        display: inline-block;
        padding: 5px 10px;
        /* Smaller padding */
        width: 100px;
        /* Smaller width */
        height: 35px;
        /* Smaller height */
        text-align: center;
    }

    .delete-btn:hover {
        background-color: #c82333;
        /* Darker shade of red */
    }
</style>
<div class="users index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color:#1cc88a;"><?= __('Users') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-info add-btn">
            <i class="fas fa-plus fa-sm text-white-50"></i> New
        </a>
    </div>
    <?= $this->Html->link('Go back', ['action' => 'index'], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px']) ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('First name') ?></th>
                    <th><?= h('Surname') ?></th>
                    <th><?= h('Email') ?></th>
                    <th><?= h('Phone number') ?></th>
                    <th><?= h('User Type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= h($user->user_firstname) ?></td>
                        <td><?= h($user->user_surname) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->user_phone) ?></td>
                        <td><?= h($user->user_type) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id], ['class' => 'btn btn-info edit-btn', 'style' => 'margin-right: 10px;']) ?>
                            <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete User# {0}?', $user->user_firstname), 'class' => 'btn btn-info delete-btn']) ?> -->
                            <?= $this->Form->postLink(__('Reactivate'), ['action' => 'archive', $user->user_id], ['confirm' => __('Are you sure you want to reactivate User# {0}?', $user->user_firstname . ' ' . $user->user_surname), 'class' => 'btn btn-info delete-btn']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>
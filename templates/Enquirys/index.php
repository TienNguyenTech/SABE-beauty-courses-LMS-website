<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
$ausTimezone = new \DateTimeZone('Australia/Adelaide');
?>
<style>
    .message {
        max-width: 300px;
        /* Adjust this value to your needs */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .subject {
        max-width: 250px;
        /* Adjust this value to your needs */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .table a {
        color: black;
    }

    .actions {
        color: black;
    }

    .enquirys h3 {
        color: #1cc88a;
    }
</style>
<div class="enquirys index content">
    <!--    --><?php //= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Enquiries') ?></h3>
    <?= $this->Html->link('View Archive', ['action' => 'archived'], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px']) ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('enquiry_name', 'Name') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_email', 'Email Address') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_datetime', 'Enquiry Time') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_subject', 'Subject') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_message', 'Message') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_seen', 'Read') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquirys as $enquiry): ?>
                    <tr>
                        <td><?= h($enquiry->enquiry_name) ?></td>
                        <td><?= h($enquiry->enquiry_email) ?></td>
                        <td><?= h($enquiry->enquiry_datetime) ?></td>
                        <td class="subject" title="<?= h($enquiry->enquiry_subject) ?>"><?= h($enquiry->enquiry_subject) ?>
                        </td>
                        <td class="message" title="<?= h($enquiry->enquiry_message) ?>"><?= h($enquiry->enquiry_message) ?>
                        </td>
                        <!--                    <td>--><?php //= h($enquiry->enquiry_message) ?><!--</td>-->
                        <td><?= h($enquiry->enquiry_seen ? 'Read' : 'Unread') ?></td>
                        <td class="actions">
                            <!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $enquiry->enquiry_id]) ?>
                            <!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $enquiry->enquiry_id]) ?>
                            <?= $this->Html->link('View Message', ['action' => 'view', $enquiry->enquiry_id], ['class' => 'btn btn-info view-btn']) ?>
                            <?= $this->Html->link('Reply', ['action' => 'reply', $enquiry->enquiry_id], ['class' => 'btn btn-info view-btn']) ?>
                            <?= $this->Html->link($enquiry->enquiry_seen ? 'Mark as Unread' : 'Mark as Read', ['action' => 'toggle', $enquiry->enquiry_id], ['class' => 'btn btn-primary mark-read-btn']) ?>
                            <?= $this->Form->postLink('Archive', ['action' => 'archive', $enquiry->enquiry_id], ['class' => 'btn btn-warning archive-btn', 'confirm' => 'Are you sure you want to archive this enquiry?']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <style>
        .view-btn {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .archive-btn {
            background-color: #ffc107;
            color: white;
            border: none;
        }
        .add-btn {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
            border: none;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .mark-read-btn {
    background-color: #b794f4;
    color: black; /* Set text color to black */
    border: none;
}

    </style>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<style>
    .message {
        max-width: 300px; /* Adjust this value to your needs */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .subject {
        max-width: 250px; /* Adjust this value to your needs */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<div class="enquirys index content">
<!--    --><?php //= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Enquiries') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('enquiry_name', 'Name') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_email', 'Email Address') ?></th>
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
                    <td class="subject" title="<?= h($enquiry->enquiry_subject) ?>"><?= h($enquiry->enquiry_subject) ?></td>
                    <td class="message" title="<?= h($enquiry->enquiry_message) ?>"><?= h($enquiry->enquiry_message) ?></td>
<!--                    <td>--><?php //= h($enquiry->enquiry_message) ?><!--</td>-->
                    <td><?= h($enquiry->enquiry_seen ? 'Read' : 'Unread') ?></td>
                    <td class="actions">
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $enquiry->enquiry_id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $enquiry->enquiry_id]) ?>
                        <?= $this->Html->link('View Message', ['action' => 'viewMessage', $enquiry->enquiry_id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete enquiry: {0}?', $enquiry->enquiry_name)]) ?>
                        <?= $this->Html->link($enquiry->enquiry_seen ? 'Mark as Unread' : 'Mark as Read', ['action' => 'toggle', $enquiry->enquiry_id], ['class' => 'btn btn-primary']) ?>
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

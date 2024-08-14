<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 */
?>
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
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquirys as $enquiry): ?>
                <tr>
                    <td><?= h($enquiry->enquiry_name) ?></td>
                    <td><?= h($enquiry->enquiry_email) ?></td>
                    <td><?= h($enquiry->enquiry_subject) ?></td>
                    <td><?= h($enquiry->enquiry_message) ?></td>
                    <td class="actions">
<!--                        --><?php //= $this->Html->link(__('View'), ['action' => 'view', $enquiry->enquiry_id]) ?>
<!--                        --><?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $enquiry->enquiry_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

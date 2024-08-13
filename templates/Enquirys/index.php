<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquirys
 */
?>
<div class="enquirys index content">
    <?= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Enquirys') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('enquiry_id') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_name') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_email') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_subject') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_message') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquirys as $enquiry): ?>
                <tr>
                    <td><?= $this->Number->format($enquiry->enquiry_id) ?></td>
                    <td><?= h($enquiry->enquiry_name) ?></td>
                    <td><?= h($enquiry->enquiry_email) ?></td>
                    <td><?= h($enquiry->enquiry_subject) ?></td>
                    <td><?= h($enquiry->enquiry_message) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $enquiry->enquiry_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enquiry->enquiry_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id)]) ?>
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

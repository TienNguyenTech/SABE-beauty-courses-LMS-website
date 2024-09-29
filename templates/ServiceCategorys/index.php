<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ServiceCategory> $serviceCategorys
 */
?>
<div class="serviceCategorys index content">
    <?= $this->Html->link(__('New Service Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Service Categorys') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($serviceCategorys as $serviceCategory): ?>
                <tr>
                    <td><?= $this->Number->format($serviceCategory->category_id) ?></td>
                    <td><?= h($serviceCategory->category_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $serviceCategory->category_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceCategory->category_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceCategory->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCategory->category_id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Enquiry'), ['action' => 'edit', $enquiry->enquiry_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquiry'), ['action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enquirys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="enquirys view content">
            <h3><?= h($enquiry->enquiry_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Enquiry Name') ?></th>
                    <td><?= h($enquiry->enquiry_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Email') ?></th>
                    <td><?= h($enquiry->enquiry_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Subject') ?></th>
                    <td><?= h($enquiry->enquiry_subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Message') ?></th>
                    <td><?= h($enquiry->enquiry_message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Id') ?></th>
                    <td><?= $this->Number->format($enquiry->enquiry_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Enquirys') ?></h4>
                <?php if (!empty($enquiry->enquirys)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Enquiry Id') ?></th>
                            <th><?= __('Enquiry Name') ?></th>
                            <th><?= __('Enquiry Email') ?></th>
                            <th><?= __('Enquiry Subject') ?></th>
                            <th><?= __('Enquiry Message') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($enquiry->enquirys as $enquiry) : ?>
                        <tr>
                            <td><?= h($enquiry->enquiry_id) ?></td>
                            <td><?= h($enquiry->enquiry_name) ?></td>
                            <td><?= h($enquiry->enquiry_email) ?></td>
                            <td><?= h($enquiry->enquiry_subject) ?></td>
                            <td><?= h($enquiry->enquiry_message) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Enquirys', 'action' => 'view', $enquiry->enquiry_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Enquirys', 'action' => 'edit', $enquiry->enquiry_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enquirys', 'action' => 'delete', $enquiry->enquiry_id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceCategory $serviceCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service Category'), ['action' => 'edit', $serviceCategory->category_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service Category'), ['action' => 'delete', $serviceCategory->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCategory->category_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Service Categorys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="serviceCategorys view content">
            <h3><?= h($serviceCategory->category_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($serviceCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($serviceCategory->category_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

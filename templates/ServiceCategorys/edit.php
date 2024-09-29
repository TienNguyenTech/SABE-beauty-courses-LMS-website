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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serviceCategory->category_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCategory->category_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Service Categorys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="serviceCategorys form content">
            <?= $this->Form->create($serviceCategory) ?>
            <fieldset>
                <legend><?= __('Edit Service Category') ?></legend>
                <?php
                    echo $this->Form->control('category_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

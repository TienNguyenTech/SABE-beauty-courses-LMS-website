<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $services
 */
?>
<style>
    .services h1 {
        color: #1a4332;
    }

    /*.courses a {
        background-color: #1a4332;
    }*/
    .table th {
        color: black;
    }
</style>
<div class="services index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Services') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
            style="background-color: #1a4332; border-color: #1a4332; color: white;">
            <i class="fas fa-plus fa-sm text-white-50"></i> New Service
        </a>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('Service Name') ?></th>
                    <th><?= h('Category') ?></th>
                    <th><?= h('Price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= h($service->service_name) ?></td>
                        <td><?= h($service->service_category) ?></td>
                        <td>$<?= $this->Number->format($service->service_price) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px;']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete service: {0}?', $service->service_name), 'class' => 'btn btn-danger delete-menu-item-btn',]) ?>
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

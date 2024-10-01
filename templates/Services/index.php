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
<div class="services index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color:#1cc88a"><?= __('Services') ?></h1>
        <div>
            <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-info add-btn">
                <i class="fas fa-plus fa-sm text-white-50"></i> New
            </a>
            <a href="<?= $this->Url->build(['controller' => 'ServiceCategorys', 'action' => 'index']) ?>" class="btn btn-info">
                Manage Categories
            </a>
        </div>

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
                        <td><?= h($service->service_category->category_name) ?></td>
                        <td>$<?= $this->Number->format($service->service_price) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id], ['class' => 'btn btn-info edit-btn']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete service: {0}?', $service->service_name), 'class' => 'btn btn-info delete-btn',]) ?>
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

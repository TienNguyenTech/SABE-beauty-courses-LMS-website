<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Course> $courses
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<style>
    .courses h1 {
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

    /* View Button */
    .view-btn {
        background-color: #007bff;
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

    .view-btn:hover {
        background-color: #0069d9;
        /* Darker shade of blue */
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
<div class="courses index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color:#1cc88a;"><?= __('Courses') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-info add-btn">
            <i class="fas fa-plus fa-sm text-white-50"></i> New Course
        </a>

    </div>
    <?= $this->Html->link('View Archive', ['action' => 'archived'], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px']) ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('Course Name') ?></th>
                    <th><?= h('Image') ?></th>
                    <th><?= h('Category') ?></th>
                    <th><?= h('Description') ?></th>
                    <th><?= h('Price') ?></th>
                    <th><?= h('Featured') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= h($course->course_name) ?></td>
                        <td><?= $this->Html->image('/' . $course->course_image, ['alt' => $course->course_name, 'style' => 'max-width: 100px;']) ?>
                        </td>
                        <td><?= h($course->course_category) ?></td>
                        <td style="width: 1000px; height: 100px; overflow: auto;">
                            <?= h(strlen($course->course_description) > 400 ? substr($course->course_description, 0, 400) . '...' : $course->course_description) ?>
                        </td>
                        <td>$<?= $this->Number->format($course->course_price) ?></td>
                        <td><?= $course->course_featured ? 'Yes' : 'No' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Manage'), ['action' => 'course', $course->course_id], ['class' => 'btn btn-info view-btn', 'style' => 'margin-bottom: 10px;', 'target' => '_blank']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->course_id], ['class' => 'btn btn-info edit-btn', 'style' => 'margin-bottom: 10px;', 'target' => '_blank']) ?>
                            <?php
                                if($course->hasPayments == false) {
                                    echo $this->Form->postLink(
                                        __('Archive'),
                                        ['action' => 'archive', $course->course_id],
                                        [
                                            'confirm' => __('Are you sure you want to archive course: {0}?', $course->course_name),
                                            'class' => 'btn btn-info delete-btn',
                                        ]
                                    );
                                } else {
                                    echo $this->Form->postLink(
                                        __('Archive'),
                                        ['action' => 'archive', $course->course_id],
                                        [
                                            'confirm' => __('Warning: This course has students currently enrolled. Are you sure you want to archive course: {0}?', $course->course_name),
                                            'class' => 'btn btn-info delete-btn',
                                        ]
                                    );
                                }
                            ?>
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
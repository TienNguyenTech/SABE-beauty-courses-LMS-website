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
</style>
<div class="courses index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Courses - Archived') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
            style="background-color: #1a4332; border-color: #1a4332; color: white;">
            <i class="fas fa-plus fa-sm text-white-50"></i> New Course
        </a>

    </div>
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
                            <?= $this->Html->link(__('Manage'), ['action' => 'course', $course->course_id], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->course_id], ['class' => 'btn btn-secondary', 'style' => 'margin-bottom: 10px;']) ?>
                            <?= $this->Form->postLink(__('Unarchive'), ['action' => 'archive', $course->course_id], ['confirm' => __('Are you sure you want to unarchive course: {0}?', $course->course_name), 'class' => 'btn btn-danger',]) ?>
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
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Course> $courses
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="courses index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Courses') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Course</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('course_id') ?></th>
                    <th><?= h('course_name') ?></th>
                    <th><?= h('course_description') ?></th>
                    <th><?= h('course_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $this->Number->format($course->course_id) ?></td>
                    <td><?= h($course->course_name) ?></td>
                    <td><?= h($course->course_description) ?></td>
                    <td><?= $this->Number->format($course->course_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $course->course_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->course_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->course_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>

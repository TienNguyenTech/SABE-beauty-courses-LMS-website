<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div>
    <div class="courses view content">
        <h3><?= h($course->course_name) ?></h3>
        <table class="table">
            <tr>
                <th><?= __('Course Category') ?></th>
                <td><?= __($course->course_category) ?></td>
            </tr>
            <tr>
                <th><?= __('Course Price') ?></th>
                <td><?= __($course->course_price) ?></td>
            </tr>
            <tr>
                <th><?= __('Course Description') ?></th>
                <td><?= __($course->course_description) ?></td>
            </tr>
            <tr>
                <th><?= __('Cover Image') ?></th>
                <td><img src="/<?= $course->course_image ?>" alt="<?= $course->course_name ?> Cover Image" width="200px"></td>
            </tr>
            <tr>
                <th><?= __('Actions') ?></th>
                <td>
                    <?= $this->Html->link('Edit Course Info', ['action' => 'edit', $course->course_id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link('Add new content', ['controller' => 'Contents', 'action' => 'add', $course->course_id], ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="contents view content">
        <h3>Course Content</h3>
        <table class="table">
            <thead>
                <th><?= $this->Paginator->sort('content_title') ?></th>
                <th><?= $this->Paginator->sort('content_type') ?></th>
                <th><?= $this->Paginator->sort('content_url', 'View Content') ?></th>
                <th><?= $this->Paginator->sort('content_description') ?></th>
                <th><?= $this->Paginator->sort('content_position') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </thead>
            <tbody>
                <?php foreach ($contents as $content): ?>
                    <tr>
                        <td><?= $this->Html->link($content->content_title, ['controller' => 'Contents', 'action' => 'view', $content->content_id]) ?></td>
                        <td><?= $content->content_type ?></td>
                        <td><a href="/<?= $content->content_url ?>">Click here</a></td>
                        <td><?= $content->content_description ?></td>
                        <td><?= $content->content_position ?></td>
                        <td>
                            <?= $this->Html->link('Move Up', ['controller' => 'Contents', 'action' => 'moveup', $content->content_id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('Move Down', ['controller' => 'Contents', 'action' => 'movedown', $content->content_id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('Edit', ['controller' => 'Contents', 'action' => 'edit', $content->content_id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink('Remove', ['controller' => 'Contents', 'action' => 'delete', $content->content_id], ['confirm' => __('Are you sure you want to delete content: {0}?', $content->content_title), 'class' => 'btn btn-danger']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
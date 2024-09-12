<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Content'), ['action' => 'edit', $content->content_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Content'), ['action' => 'delete', $content->content_id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->content_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contents view content">
            <h3><?= h($content->content_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $content->hasValue('course') ? $this->Html->link($content->course->course_name, ['controller' => 'Courses', 'action' => 'view', $content->course->course_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Type') ?></th>
                    <td><?= h($content->content_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Url') ?></th>
                    <td><?= h($content->content_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Title') ?></th>
                    <td><?= h($content->content_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Description') ?></th>
                    <td><?= h($content->content_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Id') ?></th>
                    <td><?= $this->Number->format($content->content_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content Position') ?></th>
                    <td><?= $this->Number->format($content->content_position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archived') ?></th>
                    <td><?= $content->archived ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

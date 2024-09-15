<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Content> $contents
 */
?>
<div class="contents index content">
    <?= $this->Html->link(__('New Content'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('content_id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('content_type') ?></th>
                    <th><?= $this->Paginator->sort('content_url') ?></th>
                    <th><?= $this->Paginator->sort('content_title') ?></th>
                    <th><?= $this->Paginator->sort('content_description') ?></th>
                    <th><?= $this->Paginator->sort('content_position') ?></th>
                    <th><?= $this->Paginator->sort('archived') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contents as $content): ?>
                <tr>
                    <td><?= $this->Number->format($content->content_id) ?></td>
                    <td><?= $content->hasValue('course') ? $this->Html->link($content->course->course_name, ['controller' => 'Courses', 'action' => 'view', $content->course->course_id]) : '' ?></td>
                    <td><?= h($content->content_type) ?></td>
                    <td><?= h($content->content_url) ?></td>
                    <td><?= h($content->content_title) ?></td>
                    <td><?= h($content->content_description) ?></td>
                    <td><?= $this->Number->format($content->content_position) ?></td>
                    <td><?= h($content->archived) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $content->content_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->content_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $content->content_id], ['confirm' => __('Are you sure you want to delete # {0}?', $content->content_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

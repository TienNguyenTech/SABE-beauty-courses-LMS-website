<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quizzes
 */
?>
<div class="quizzes index content">
    <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quizzes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('archived') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?= $this->Number->format($quiz->quiz_id) ?></td>
                    <td><?= $quiz->hasValue('course') ? $this->Html->link($quiz->course->course_name, ['controller' => 'Courses', 'action' => 'view', $quiz->course->course_id]) : '' ?></td>
                    <td><?= h($quiz->archived) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quiz->quiz_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiz->quiz_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiz->quiz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->quiz_id)]) ?>
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

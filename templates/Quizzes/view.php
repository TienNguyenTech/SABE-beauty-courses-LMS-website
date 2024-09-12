<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quiz'), ['action' => 'edit', $quiz->quiz_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quiz'), ['action' => 'delete', $quiz->quiz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->quiz_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quizzes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quizzes view content">
            <h3><?= h($quiz->quiz_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $quiz->hasValue('course') ? $this->Html->link($quiz->course->course_name, ['controller' => 'Courses', 'action' => 'view', $quiz->course->course_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz Id') ?></th>
                    <td><?= $this->Number->format($quiz->quiz_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archived') ?></th>
                    <td><?= $quiz->archived ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Quiz Json') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($quiz->quiz_json)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

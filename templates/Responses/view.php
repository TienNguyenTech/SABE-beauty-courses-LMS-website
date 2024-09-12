<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Response'), ['action' => 'edit', $response->response_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Response'), ['action' => 'delete', $response->response_id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->response_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Responses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Response'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="responses view content">
            <h3><?= h($response->response_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $response->hasValue('user') ? $this->Html->link($response->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $response->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Quiz') ?></th>
                    <td><?= $response->hasValue('quiz') ? $this->Html->link($response->quiz->quiz_id, ['controller' => 'Quizzes', 'action' => 'view', $response->quiz->quiz_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Response Id') ?></th>
                    <td><?= $this->Number->format($response->response_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Response Score') ?></th>
                    <td><?= $this->Number->format($response->response_score) ?></td>
                </tr>
                <tr>
                    <th><?= __('Submitted At') ?></th>
                    <td><?= $this->Number->format($response->submitted_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archived') ?></th>
                    <td><?= $response->archived ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Response Json') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($response->response_json)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

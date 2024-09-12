<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Response> $responses
 */
?>
<div class="responses index content">
    <?= $this->Html->link(__('New Response'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Responses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('response_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('quiz_id') ?></th>
                    <th><?= $this->Paginator->sort('response_score') ?></th>
                    <th><?= $this->Paginator->sort('submitted_at') ?></th>
                    <th><?= $this->Paginator->sort('archived') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $response): ?>
                <tr>
                    <td><?= $this->Number->format($response->response_id) ?></td>
                    <td><?= $response->hasValue('user') ? $this->Html->link($response->user->user_firstname, ['controller' => 'Users', 'action' => 'view', $response->user->user_id]) : '' ?></td>
                    <td><?= $response->hasValue('quiz') ? $this->Html->link($response->quiz->quiz_id, ['controller' => 'Quizzes', 'action' => 'view', $response->quiz->quiz_id]) : '' ?></td>
                    <td><?= $this->Number->format($response->response_score) ?></td>
                    <td><?= h($response->submitted_at) ?></td>
                    <td><?= h($response->archived) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $response->response_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $response->response_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $response->response_id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->response_id)]) ?>
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

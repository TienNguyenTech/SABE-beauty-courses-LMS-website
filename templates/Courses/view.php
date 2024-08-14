<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="courses view content">
            <h3><?= h($course->course_name) ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('Course Name') ?></th>
                    <th><?= __('Course Description') ?></th>
                    <th><?= __('Course Id') ?></th>
                    <th><?= __('Course Price') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= h($course->course_name) ?></td>
                    <td><?= h($course->course_description) ?></td>
                    <td><?= $this->Number->format($course->course_id) ?></td>
                    <td><?= $this->Number->format($course->course_price) ?></td>
                </tr>
                </tbody>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($course->users)) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('User Firstname') ?></th>
                                <th><?= __('User Surname') ?></th>
                                <th><?= __('User Email') ?></th>
                                <th><?= __('User Phone') ?></th>
                                <th><?= __('User Type') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($course->users as $user) : ?>
                                <tr>
                                    <td><?= h($user->user_id) ?></td>
                                    <td><?= h($user->user_firstname) ?></td>
                                    <td><?= h($user->user_surname) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->user_phone) ?></td>
                                    <td><?= h($user->user_type) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->user_id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

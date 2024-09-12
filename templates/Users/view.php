<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->user_firstname) . ' ' . h($user->user_surname) ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <th><?= __('User Firstname') ?></th>
                    <th><?= __('User Surname') ?></th>
                    <th><?= __('User Email') ?></th>
                    <th><?= __('User Phone') ?></th>
                    <th><?= __('User Type') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= h($user->user_id) ?></td>
                    <td><?= h($user->user_firstname) ?></td>
                    <td><?= h($user->user_surname) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->user_phone) ?></td>
                    <td><?= h($user->user_type) ?></td>
                </tr>
                </tbody>
            </table>
            <div class="related">
                <h4><?= __('Enrolled Courses') ?></h4>
                <?php if (!empty($user->courses)) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?= __('Course Id') ?></th>
                                <th><?= __('Course Name') ?></th>
                                <th><?= __('Course Description') ?></th>
                                <th><?= __('Course Price') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user->courses as $course) : ?>
                                <tr>
                                    <td><?= h($course->course_id) ?></td>
                                    <td><?= h($course->course_name) ?></td>
                                    <td><?= h($course->course_description) ?></td>
                                    <td><?= h($course->course_price) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $course->course_id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $course->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->course_id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <p><?= __('No enrolled courses found.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

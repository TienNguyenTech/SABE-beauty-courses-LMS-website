<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->course_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->course_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="courses view content">
            <h3><?= h($course->course_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course Name') ?></th>
                    <td><?= h($course->course_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Description') ?></th>
                    <td><?= h($course->course_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Id') ?></th>
                    <td><?= $this->Number->format($course->course_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Course Price') ?></th>
                    <td><?= $this->Number->format($course->course_price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($course->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Firstname') ?></th>
                            <th><?= __('User Surname') ?></th>
                            <th><?= __('User Email') ?></th>
                            <th><?= __('User Phone') ?></th>
                            <th><?= __('User Type') ?></th>
                            <th><?= __('User Password') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($course->users as $user) : ?>
                        <tr>
                            <td><?= h($user->user_id) ?></td>
                            <td><?= h($user->user_firstname) ?></td>
                            <td><?= h($user->user_surname) ?></td>
                            <td><?= h($user->user_email) ?></td>
                            <td><?= h($user->user_phone) ?></td>
                            <td><?= h($user->user_type) ?></td>
                            <td><?= h($user->user_password) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->user_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

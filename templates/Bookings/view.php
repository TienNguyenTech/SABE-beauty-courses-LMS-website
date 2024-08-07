<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->booking_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bookings view content">
            <h3><?= h($booking->booking_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $booking->hasValue('course') ? $this->Html->link($booking->course->course_name, ['controller' => 'Courses', 'action' => 'view', $booking->course->course_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Type') ?></th>
                    <td><?= h($booking->booking_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Id') ?></th>
                    <td><?= $this->Number->format($booking->booking_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($booking->users)) : ?>
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
                        <?php foreach ($booking->users as $user) : ?>
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

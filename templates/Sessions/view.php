<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->session_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->session_id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sessions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Session'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sessions view content">
            <h3><?= h($session->session_location) ?></h3>
            <table>
                <tr>
                    <th><?= __('Session Location') ?></th>
                    <td><?= h($session->session_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $session->hasValue('booking') ? $this->Html->link($session->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $session->booking->booking_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Session Id') ?></th>
                    <td><?= $this->Number->format($session->session_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Session Duration') ?></th>
                    <td><?= $this->Number->format($session->session_duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Session Datetime') ?></th>
                    <td><?= h($session->session_datetime) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="sessions view content">
            <h3><?= h($session->session_location) ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('Session Location') ?></th>
                    <th><?= __('Booking') ?></th>
                    <th><?= __('Session Id') ?></th>
                    <th><?= __('Session Duration') ?></th>
                    <th><?= __('Session Datetime') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= h($session->session_location) ?></td>
                    <td><?= $session->hasValue('booking') ? $this->Html->link($session->booking->booking_type, ['controller' => 'Bookings', 'action' => 'view', $session->booking->booking_id]) : '' ?></td>
                    <td><?= $this->Number->format($session->session_id) ?></td>
                    <td><?= $this->Number->format($session->session_duration) ?></td>
                    <td><?= h($session->session_datetime) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>

<div>
    <div class="enquirys view content">
        <h3><?= h($enquiry->enquiry_subject) ?></h3>
        <table class="table">
            <tr>
                <th class="col-1"><?= __('Name') ?></th>
                <td><?= __($enquiry->enquiry_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Time') ?></th>
                <td><?= __($enquiry->enquiry_datetime) ?></td>
            </tr>
            <tr>
                <th><?= __('Email Address') ?></th>
                <td><?= $this->Html->link(__($enquiry->enquiry_email), 'mailto://' . $enquiry->enquiry_email) ?></td>
            </tr>
            <tr>
                <th><?= __('Message') ?></th>
                <td><?= __($enquiry->enquiry_message) ?></td>
            </tr>
            <tr>
                <th><?= __('Actions') ?></th>
                <td>
                    <?= $this->Html->link('Reply', ['action' => 'reply', $enquiry->enquiry_id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->postLink('Archive', ['action' => 'archive', $enquiry->enquiry_id], ['class' => 'btn btn-danger archive-btn', 'confirm' => 'Are you sure you want to archive this enquiry?']) ?>
                </td>
            </tr>
        </table>
    </div>
</div>
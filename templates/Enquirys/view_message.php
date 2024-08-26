<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>


<div class="enquirys view content">
    <table class="table table-bordered" style="background-color: #e6f4ea;">
        <thead>
        <tr style="background-color: #1e7e34; color: #fff;">
            <th><?= __('Subject') ?></th>
            <th><?= __('Message') ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="font-weight: bold;width: 400px"><?= h($enquiry->enquiry_subject) ?></td>
            <td>
                <textarea
                    style="width: 100%; height: 300px; overflow: auto; border: none; padding: 0; font-family: monospace; background-color: #f1faf5;" readonly><?= h($enquiry->enquiry_message) ?>
                </textarea>
            </td>
        </tr>
        </tbody>
    </table>
</div>

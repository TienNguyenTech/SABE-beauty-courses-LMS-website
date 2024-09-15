<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Completion $completion
 */
?>
<div>
    <div class="container">
        <h1>Congratulations!</h1>
        <h3>You have successfully completed the <?= $completion->course->course_name ?> course!</h3>
        <h3>Your certificate of completion will be emailed to you within 24 hours.</h3>
    </div>
</div>
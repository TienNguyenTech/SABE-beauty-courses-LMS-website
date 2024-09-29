<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<div>
    <div class="container">
        <h1>Failed</h1>
        <h3>Unfortunately you did not pass the <?= $quiz->title ?> quiz.</h3>
        <h3>Return to the course to make another attempt.</h3>
        <?= $this->Html->link('Return to course', ['controller' => 'Courses', 'action' => 'accesscourse', $courseID], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 * @var mixed $quiz
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="course-view">
    <!-- Course Information Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3><?= h($course->course_name) ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/<?= $course->course_image ?>" alt="<?= $course->course_name ?> Cover Image" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <p><strong><?= __('Course Category') ?>:</strong> <?= __($course->course_category) ?></p>
                    <p><strong><?= __('Course Price') ?>:</strong> <?= __($course->course_price) ?></p>
                    <p><strong><?= __('Course Description') ?>:</strong> <?= __($course->course_description) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Content Cards with Flexible Grid Layout -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Course Content</h3>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-start">
                <?php foreach ($contents as $content): ?>
                    <div class="col-md-4 d-flex mb-4">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= h($content->content_title) ?></h5>
                                <p class="card-text"><strong>Type:</strong> <?= h($content->content_type) ?></p>
                                <p class="card-text flex-grow-1"><strong>Description:</strong> <?= h($content->content_description) ?></p>
                                <a href="/<?= $content->content_url ?>" class="btn btn-info mt-auto">Read Now</a>
                                <?= $this->Html->link('Download', ['controller' => 'Contents', 'action' => 'download', $content->content_id], ['class' => 'btn btn-primary mt-2']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Quiz Card -->
    <div class="card">
        <div class="card-header">
            <h3>Quiz</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($quiz)): ?>
                <h5 class="card-title"><?= h($quiz->title) ?></h5>
                <?= $this->Html->link('Start the Quiz', ['controller' => 'Quizzes', 'action' => 'view', $quiz->quiz_id], ['class' => 'btn btn-primary']) ?>
            <?php else: ?>
                <p class="card-text"><?= __('This course doesn\'t currently have a quiz') ?></p>
                <?= $this->Html->link('Create one', ['controller' => 'Quizzes', 'action' => 'add', $course->course_id], ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>
        </div>
    </div>
</div>

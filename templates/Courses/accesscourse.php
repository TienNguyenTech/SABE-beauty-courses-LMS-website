<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 * @var mixed $quiz
 * @var \App\Model\Entity\Content[] $contents
 */
?>

<div class="course-view">
    <!-- Course Information Card -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><?= h($course->course_name) ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/<?= $course->course_image ?>" alt="<?= $course->course_name ?> Cover Image"
                        class="img-fluid">
                </div>
                <div class="col-md-8">
                    <p><strong><?= __('Course Category') ?>:</strong> <?= __($course->course_category) ?></p>
                    <p><strong><?= __('Course Description') ?>:</strong> <?= __($course->course_description) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Content Cards -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Course Content | Progress: <?= intval($progression * 100) ?>%</h3>
            <!-- Content Completion Progress -->
            <!-- <div class="progress" style="width: 50%;">
                <div id="content-progress-bar" class="progress-bar" role="progressbar" style="width: 0%;"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div> -->
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-start">
                <?php foreach ($contents as $content): ?>
                    <div class="col-md-4 d-flex mb-4">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= h($content->content_title) ?></h5>
                                <p class="card-text"><strong>Type:</strong> <?= h($content->content_type) ?></p>
                                <p class="card-text flex-grow-1"><strong>Description:</strong>
                                    <?= h($content->content_description) ?></p>

                                <!-- Go To Content -->
                                <?= $this->Html->link('Go To Content', ['controller' => 'Contents', 'action' => 'view', $content->content_id], ['class' => 'btn btn-info mt-auto read-btn']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Quiz Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Quiz</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($quiz) && $progression == 1): ?>
                <h5 class="card-title"><?= h($quiz->title) ?></h5>
                <?= $this->Html->link('Start the Quiz', ['controller' => 'Quizzes', 'action' => 'view', $quiz->quiz_id], ['class' => 'btn btn-primary', 'id' => 'start-quiz-btn']) ?>
            <?php else: ?>
                <p class="card-text"><?= __('You must complete all course content before attempting the quiz') ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Quiz Completion Progress -->
    <!-- <div class="progress" style="width: 50%;">
        <div id="quiz-progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50"
            aria-valuemin="0" aria-valuemax="100"><?= $progression * 100 ?>%</div>
    </div> -->

</div>

<!-- Final Score Bar -->
<!-- <div class="card mb-4">
    <div class="card-header">
        <h3>Final Score</h3>
    </div>
    <div class="card-body">
        <div class="progress" style="width: 50%;">
            <div id="final-score-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100"><?= $progression * 100 ?>%</div>
        </div>
    </div>
</div> -->



<script>
    // JavaScript to track progress, handle button clicks, and reset progress
//     document.addEventListener('DOMContentLoaded', function () {
//     let totalContent = <?= count($contents) ?>;
//     let completedContent = localStorage.getItem('completedContent') ? parseInt(localStorage.getItem('completedContent')) : 0;
// //     let quizProgress = localStorage.getItem('quizProgress') ? parseInt(localStorage.getItem('quizProgress')) : 0;

//     const contentProgressBar = document.getElementById('content-progress-bar');
// //     const quizProgressBar = document.getElementById('quiz-progress-bar');
// //     const finalScoreBar = document.getElementById('final-score-bar');
// //     const startQuizBtn = document.getElementById('start-quiz-btn');
// //     const resetProgressBtn = document.getElementById('reset-progress-btn');
// //     const completeQuizBtn = document.getElementById('complete-quiz-btn');

//     // Function to update content progress
//     function updateContentProgress() {
//         let progress = (completedContent / totalContent) * 100;
//         progress = Math.min(progress, 100); // Cap progress at 100%
//         contentProgressBar.style.width = progress + '%';
//         contentProgressBar.innerText = Math.round(progress) + '%';

//         // Save progress to localStorage
//         localStorage.setItem('completedContent', completedContent);

//         // Enable quiz button only when progress is 100%
//         if (progress >= 100) {
//             startQuizBtn.disabled = false;
//         }

//         // Update final score bar
//         updateFinalScore();
//     }

//     // Function to update quiz progress
//     function updateQuizProgress() {
//         let progress = quizProgress;
//         quizProgressBar.style.width = progress + '%';
//         quizProgressBar.innerText = Math.round(progress) + '%';

//         // Save quiz progress to localStorage
//         localStorage.setItem('quizProgress', quizProgress);

//         // Update final score bar
//         updateFinalScore();
//     }

//     // Function to update final score bar
//     function updateFinalScore() {
//         let contentScore = (completedContent / totalContent) * 50; // Content progress contributes 50%
//         let finalScore = contentScore + quizProgress * 0.5; // Quiz progress contributes 50%

//         finalScore = Math.min(finalScore, 100); // Cap final score at 100%
//         finalScoreBar.style.width = finalScore + '%';
//         finalScoreBar.innerText = Math.round(finalScore) + '%';
//     }

//     // Function to reset content progress
//     function resetContentProgress() {
//         completedContent = 0;
//         updateContentProgress();
//         localStorage.removeItem('completedContent');
//         startQuizBtn.disabled = true;
//     }

//     // Load the saved progress when the page loads
//     updateContentProgress();
//     updateQuizProgress();

//     // Read Now Button Click
//     document.querySelectorAll('.read-btn').forEach(function (button) {
//         button.addEventListener('click', function () {
//             // Allow link to proceed only if not already clicked
//             if (!button.classList.contains('clicked')) {
//                 button.classList.add('clicked');
//                 completedContent++;
//                 updateContentProgress();
//             }

//             // Allow link to proceed
//             const contentId = button.getAttribute('data-id');
//             window.location.href = `/contents/read/${contentId}`; // Example URL for reading content
//         });
//     });

//     // Download Button Click
//     document.querySelectorAll('.download-btn').forEach(function (button) {
//         button.addEventListener('click', function () {
//             // Allow download to proceed only if not already clicked
//             if (!button.classList.contains('clicked')) {
//                 button.classList.add('clicked');
//                 completedContent++;
//                 updateContentProgress();
//             }

//             // Allow download to proceed
//             const contentId = button.getAttribute('data-id');
//             window.location.href = `/contents/download/${contentId}`; // Example URL for downloading content
//         });
//     });

//     // Reset Progress Button Click
//     resetProgressBtn.addEventListener('click', function () {
//         resetContentProgress();
//     });

//     // Start Quiz Button Click
//     startQuizBtn.addEventListener('click', function () {
//         // Set quiz progress to 50% when starting
//         quizProgress = 50;
//         updateQuizProgress();
//         completeQuizBtn.disabled = false; // Enable complete quiz button
//     });

//     // Complete Quiz Button Click
//     completeQuizBtn.addEventListener('click', function () {
//         // Set quiz progress to 100% when completed
//         quizProgress = 100;
//         updateQuizProgress();
//         completeQuizBtn.disabled = true; // Disable the complete quiz button
//     });
// });

</script>
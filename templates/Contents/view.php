<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Default Styles */
        .pdf-container {
            width: 100%;
            height: 70vh;
            /* Adjust as needed */
            overflow-y: auto;
        }

        .pdf-container .pdf {
            width: 100%;
            height: 100%;
        }

        /* .content-container{
            margin-left: 50px;
        } */
        /* Mobile Styles */
        @media only screen and (max-width: 768px) {
            .topbar .nav-item .nav-link {
                right: 10px;
            }

            .dashboard-card,
            .dashboard-container {
                flex-direction: column;
            }

            .navbar-nav {
                max-width: 17%;
            }

            .sidebar .nav-item .nav-link {
                width: auto;
                padding: .75rem 0;
            }

            .sidebar .sidebar-heading {
                padding: 0;
            }

            .dashboard-card {
                max-width: 100%;
            }

            .h1,
            h1 {
                font-size: 2rem;
            }

            #des {
                display: none;
            }

            .courses h1 {
                font-size: 2rem;
            }

            .pdf-container {
                width: 85vw;
                height: 60vh;
            }

            .container{
                margin-left: -25px;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <h3><?= $this->Html->link($content->course->course_name, ['controller' => 'Courses', 'action' => 'accesscourse', $content->course->course_id]) ?>
        </h3>
        <br>
    </div>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h3 class="heading"><?= __('Course Content') ?></h3>
                <?php
                foreach ($courseContents as $courseContent) {
                    echo $this->Html->link(__($courseContent->content_position . '. ' . $courseContent->content_title), ['action' => 'view', $courseContent->content_id], ['class' => 'side-nav-item']);
                    echo '<br>';
                }
                ?>
            </div>
        </aside>
        <br>
        <div class="column column-80">
        <div class="container">
            <div class="contents view content">
                <h3>
                    <?= h($content->content_position . '. ' . $content->content_title) ?>
                    <?= h($isCompleted ? ' - Completed' : ' - Incomplete') ?>
                </h3>

                <h5><?= __('Description') ?></h5>
                <p><?= h($content->content_description) ?></p>

                <h5><?= __('Content') ?></h5>
                <?php if ($content->content_type === 'image'): ?>
                    <img width="80%" src="/<?= h($content->content_url) ?>" alt="<?= h($content->content_title) ?> Image">
                <?php elseif ($content->content_type === 'pdf'): ?>
                    <?= $this->Html->link('Download PDF', '/' . $content->content_url, ['target' => '_blank', 'class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']) ?>
                    <div class="pdf-container">
                        <object class="pdf" type="application/pdf" data="/<?= h($content->content_url) ?>" width="100%"
                            height="600px"></object>
                    </div>
                <?php elseif ($content->content_type === 'video'): ?>
                    <video controls width="100%">
                        <source src="/<?= h($content->content_url) ?>" type="video/mp4">
                    </video>
                <?php endif; ?>

                <table class="table">
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($content->content_description) ?></td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <?php
                            usort($courseContents, function ($a, $b) {
                                return $a->content_position - $b->content_position;
                            });

                            // Render Previous button if there's a previous content
                            if ($content->content_position > 1) {
                                $previousContent = $courseContents[$content->content_position - 2];
                                echo $this->Html->link('Previous', ['action' => 'view', $previousContent->content_id], ['class' => 'btn btn-primary', 'style' => 'margin-right: 5px']);
                            }

                            // Render Next button if there's a next content
                            if ($content->content_position < end($courseContents)->content_position) {
                                $nextContent = $courseContents[$content->content_position];
                                echo $this->Html->link('Next', ['action' => 'view', $nextContent->content_id], ['class' => 'btn btn-primary', 'style' => 'margin-right: 5px']);
                            }

                            // Mark as Complete button if content is not completed
                            if (!$isCompleted) {
                                echo $this->Html->link('Mark as complete', ['controller' => 'Progressions', 'action' => 'complete', $userID, $content->content_id], ['class' => 'btn btn-primary']);
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
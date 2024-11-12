<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<html>
<style>
    @media only screen and (max-width: 768px) {
        .topbar .nav-item .nav-link {
            right: 10px;
        }

        .dashboard-card {
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

        .dashboard-container {
            flex-direction: column;
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
    }
</style>

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
    <div class="column column-80">
        <div class="container">
            <div class="contents view content">
                <h3>
                    <?= h($content->content_position . '. ' . $content->content_title) ?>
                    <?php
                    if ($isCompleted) {
                        echo h(' - Completed');
                    } else {
                        echo h(' - Incomplete');
                    }
                    ?>
                </h3>
<!--                 
                <h5><?= __('Description') ?></h5>
                <p><?= h($content->content_description) ?></p>

                <h5><?= __('Content') ?></h5>
                <?php
                    if($content->content_type == 'image') {
                        ?>
                        <img width="80%" src="/<?= $content->content_url ?>" alt="<?= $content->content_title ?> Image">
                        <?php
                    } else if($content->content_type == 'pdf') {
                        ?>
                        <div class="pdf-container">
                            <object class="pdf" type="application/pdf" data="/<?= $content->content_url ?>" width="100%" height="600px"></object>
                        </div>
                        <?php
                    } else if($content->content_type == 'video') {
                        ?>
                        <video controls width="800px">
                            <source src="/<?= $content->content_url ?>" type="video/mp4">
                        </video>
                        <?php
                    }
                ?>

                <style>
                    .pdf-container {
                        position: relative;
                        width: 100%;
                        max-height: 600px;
                        overflow: hidden;
                    }

                    .pdf-container .pdf {
                        width: 100%;
                        height: 100%;
                    }

                    @media only screen and (max-width: 768px) {
                        .pdf-container {
                            width: 85vw;
                            height: 60vh;
                        }
                    }
                </style> -->

                <table class="table">
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($content->content_description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Content') ?></th>
                        <td>
                            <?php
                            if ($content->content_type == 'image') {
                                ?>
                                <img width="80%" src="/<?= $content->content_url ?>"
                                    alt="<?= $content->content_title ?> Image">
                                <?php
                            } else if ($content->content_type == 'pdf') {
                                ?>
                                    <object class="pdf" data="/<?= $content->content_url ?>" width="1000px"
                                        height="600px"></object>
                                <?php
                            } else if ($content->content_type == 'video') {
                                ?>
                                        <video controls width="800px">
                                            <source src="/<?= $content->content_url ?>" type="video/mp4">
                                        </video>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <?php
                            usort($courseContents, function ($a, $b) {
                                return $a->content_position - $b->content_position;
                            });

                            if ($content->content_position > 1) {
                                $previousContent = $courseContents[$content->content_position - 2];
                                echo $this->Html->link('Previous', ['action' => 'view', $previousContent->content_id], ['class' => 'btn btn-primary', 'style' => 'margin-right: 5px']);
                            }
                            if ($content->content_position < end($courseContents)->content_position) {
                                $nextContent = $courseContents[$content->content_position];
                                echo $this->Html->link('Next', ['action' => 'view', $nextContent->content_id], ['class' => 'btn btn-primary', 'style' => 'margin-right: 5px']);
                            }
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

</html>
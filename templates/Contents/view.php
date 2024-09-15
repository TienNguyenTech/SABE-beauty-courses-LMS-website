<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="row">
    <h3><?= $this->Html->link($content->course->course_name, ['controller' => 'Courses', 'action' => 'view', $content->course->course_id])?></h3>
    <br>
</div>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h3 class="heading"><?= __('Course Content') ?></h3>
            
            <?php
            foreach($courseContents as $courseContent) {
                echo $this->Html->link(__($courseContent->content_position . '. ' . $courseContent->content_title), ['action' => 'view', $courseContent->content_id], ['class' => 'side-nav-item']);
                echo '<br>';
            }
            ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="container">
            <div class="contents view content">
                <h3><?= h($content->content_position . '. ' . $content->content_title) ?></h3>
                <table class="table">
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($content->content_description) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Content') ?></th>
                        <td>
                            <?php
                            if($content->content_type == 'image') {
                                ?>
                                <img width="80%" src="/<?= $content->content_url ?>" alt="<?= $content->content_title ?> Image">
                                <?php
                            } else if($content->content_type == 'pdf') {
                                ?>
                                <object class="pdf" data="/<?= $content->content_url ?>" width="1000px" height="600px"></object>
                                <?php
                            } else if($content->content_type == 'video') {
                                ?>
                                <video controls width="800px">
                                    <source src="/<?= $content->content_url ?>">
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
                            usort($courseContents, function($a, $b) {
                                return $a->content_position - $b->content_position;
                            });

                            if($content->content_position > 1) {
                                $previousContent = $courseContents[$content->content_position - 2];
                                echo $this->Html->link('Previous', ['action' => 'view', $previousContent->content_id], ['class' => 'btn btn-primary', 'style' => 'margin-right: 5px']);
                            } 
                            if($content->content_position < end($courseContents)->content_position) {
                                $nextContent = $courseContents[$content->content_position];
                                echo $this->Html->link('Next', ['action' => 'view', $nextContent->content_id], ['class' => 'btn btn-primary']);
                            }
                            ?>
                            <button class="btn btn-primary">Mark as complete</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

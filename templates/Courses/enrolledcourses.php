<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Course> $courses
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<style>
    .courses h1 {
        color: #1a4332;
    }

    .card {
        margin-bottom: 20px;
    }

    .card img {
        max-width: 100%;
        height: auto;
    }

    .card-body {
        background-color: #f8f9fa;
    }

    .card-title {
        color: #1a4332;
    }

    .card-text {
        max-height: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card-action {
        margin-top: 10px;
    }
</style>
<div class="courses index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Courses') ?></h1>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
            style="background-color: #1a4332; border-color: #1a4332; color: white;">
            <i class="fas fa-plus fa-sm text-white-50"></i> New Course
        </a>
    </div>

    <div class="row">
        <?php foreach ($courses as $course): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <?= $this->Html->image('/' . $course->course_image, ['alt' => $course->course_name, 'class' => 'card-img-top']) ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= h($course->course_name) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= h($course->course_category) ?></h6>
                        <p class="card-text">
                            <?= h(strlen($course->course_description) > 100 ? substr($course->course_description, 0, 100) . '...' : $course->course_description) ?>
                        </p>
                        <p class="card-text"><strong>Price:</strong> $<?= $this->Number->format($course->course_price) ?></p>
                        <p class="card-text"><strong>Featured:</strong> <?= $course->course_featured ? 'Yes' : 'No' ?></p>
                        <div class="card-action">
                            <?= $this->Html->link(__('View'), ['action' => 'accesscourse', $course->course_id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

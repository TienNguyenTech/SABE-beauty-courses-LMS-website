<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    .card-short {
        max-width: 600px; /* Adjust the width as needed */
        margin-left: 0; /* Align the card to the left */
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Profile</h3>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card card-short">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" value="<?= h($user->user_firstname) . ' ' . h($user->user_surname) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><?= __('First Name') ?></label>
                        <div class="col-md-12">
                            <input type="text" value="<?= h($user->user_firstname) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><?= __('Surname') ?></label>
                        <div class="col-md-12">
                            <input type="text" value="<?= h($user->user_surname) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" value="<?= h($user->email) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" value="<?= h($user->user_phone) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">User Type</label>
                        <div class="col-md-12">
                            <input type="text" value="<?= h($user->user_type) ?>" class="form-control form-control-line" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Enrolled Courses</label>
                        <div class="col-md-12">
                            <?php if (!empty($user->courses)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><?= __('Course Id') ?></th>
                                            <th><?= __('Course Name') ?></th>
                                            <th><?= __('Course Description') ?></th>
                                            <th><?= __('Course Price') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($user->courses as $course) : ?>
                                            <tr>
                                                <td><?= h($course->course_id) ?></td>
                                                <td><?= h($course->course_name) ?></td>
                                                <td><?= h($course->course_description) ?></td>
                                                <td><?= h($course->course_price) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $course->course_id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $course->course_id]) ?>
<!--                                                    --><?php //= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $course->course_id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->course_id)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <p><?= __('No enrolled courses found.') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->

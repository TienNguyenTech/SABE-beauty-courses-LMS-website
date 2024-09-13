<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $courses
 */
?>
<style>
    .card-short {
        max-width: 600px; /* Adjust the width as needed */
        margin-left: 0; /* Align the card to the left */
    }
    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #87939d;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .error {
        width: 100%;
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-titles ">Profile</h3>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-6 col-xlg-6 col-md-6">
        <div class="card card-short">
            <!-- Tab panes -->
            <div class="card-body">
                <?= $this->Form->create($user, ['class' => 'form-horizontal form-material mx-2']) ?>
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" value="<?= h($user->user_firstname) . ' ' . h($user->user_surname) ?>" class="form-control form-control-line" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->control('user_firstname', ['class' => 'form-control form-control-line']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->control('user_surname', ['class' => 'form-control form-control-line']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->control('email', ['type' => 'email', 'class' => 'form-control form-control-line']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->control('user_phone', ['class' => 'form-control form-control-line']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->control('user_type', ['text' => "$user->user_type", 'class' => 'form-control form-control-line', 'readonly' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <?= $this->Form->button(__('Update Profile'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-6 col-xlg-6 col-md-6">
        <div class="card ">
            <div class="card-body">
              <form class="form-horizontal form-material mx-2">
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

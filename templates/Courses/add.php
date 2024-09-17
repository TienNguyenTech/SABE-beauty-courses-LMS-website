<h1 class="h3 mb-2 text-gray-800">Add new course</h1>
<?= $this->Form->create($course, ['type' => 'file', 'class' => 'text-gray-800']) ?>

<style>
    .col-sm-10 {
        max-width: 600px;
    }
</style>
<div class="form-group row">
    <label for="course_name" class="col-sm-2 col-form-label clearfix">Name <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->control('course_name', [
            'label' => false,
            'class' => 'form-control',
            'id' => 'course_name'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <label for="course_image" class="col-sm-2 col-form-label clearfix">Cover Image <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->file('course_image', [
            'label' => false,
            'class' => 'form-control-file',
            'id' => 'course_image'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <label for="course_category" class="col-sm-2 col-form-label clearfix">Course Mode <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->select('course_category', [
            'Hybrid' => 'Hybrid',
            'Workshop' => 'Workshop',
            'Online' => 'Online'
        ], [
            'label' => false,
            'class' => 'form-control',
            'id' => 'course_category'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <label for="course_description" class="col-sm-2 col-form-label clearfix">Description <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->control('course_description', [
            'label' => false,
            'class' => 'form-control',
            'type' => 'textarea',
            'id' => 'course_description'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <label for="course_price" class="col-sm-2 col-form-label clearfix">Price <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->control('course_price', [
            'label' => false,
            'class' => 'form-control',
            'type' => 'number',
            'id' => 'course_price'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <label for="course_featured" class="col-sm-2 col-form-label clearfix">Featured Course <span style="color: red;">*</span></label>
    <div class="col-sm-10">
        <?= $this->Form->select('course_featured', [
            '1' => 'Yes',
            '0' => 'No'
        ], [
            'label' => false,
            'class' => 'form-control',
            'id' => 'course_featured'
        ]) ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?= $this->Form->end() ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new quiz</h1>
<?= $this->Form->create($quiz, ['class' => 'text-gray-800']) ?>

<?php
echo $this->Form->control('quiz_title', [
    'label' => [
        'text' => 'Quiz Title <span style="color: red;">*</span>',
        'escape' => false,
        'style' => 'width: 150px; text-align: left;'
    ],
    'style' => 'width: 400px; margin-left: 10px;',
    'class' => 'form-control'
]);
echo $this->Form->control('course_id', [
    'options' => $courses,
    'label' => [
        'text' => 'Course',
        'style' => 'width: 150px; text-align: left;'
    ],
    'style' => 'width: 400px; margin-left: 10px;',  // 400px width for Course ID
    'class' => 'form-control'
]);
?>
<h3>Questions</h3>
<span class="form-inline">Create a new question with <input class="form-control" id="optionCount" type="number" min="2" max="10" value="4"> options <span id="addButton" class="btn btn-primary">Add</span></span>

<div id="questions-container">
    <?php if ($this->request->getData()): ?>
        <?php $data = $this->request->getData(); ?>
        <?php $questionIndex = 1; ?>
        <?php while (isset($data['question' . $questionIndex . '_title'])): ?>
            <h5>Question <?= $questionIndex ?></h5>
            <label class="form-label" for="question<?= $questionIndex ?>_title">Question <?= $questionIndex ?> Title</label>
            <input class="form-control" type="text" name="question<?= $questionIndex ?>_title" value="<?= h($data['question' . $questionIndex . '_title']) ?>">
            <?php $optionIndex = 1; ?>
            <?php while (isset($data['question' . $questionIndex . '_option' . $optionIndex])): ?>
                <label class="form-label" for="question<?= $questionIndex ?>_option<?= $optionIndex ?>">Option <?= $optionIndex ?></label>
                <input class="form-control" type="text" name="question<?= $questionIndex ?>_option<?= $optionIndex ?>" value="<?= h($data['question' . $questionIndex . '_option' . $optionIndex]) ?>">
                <?php $optionIndex++; ?>
            <?php endwhile; ?>
            <label class="form-label" for="question<?= $questionIndex ?>_correctoption">Correct Option</label>
            <select class="form-control" name="question<?= $questionIndex ?>_correctoption">
                <?php for ($i = 1; $i < $optionIndex; $i++): ?>
                    <option value="<?= $i ?>" <?= $data['question' . $questionIndex . '_correctoption'] == $i ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <?php $questionIndex++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?= $this->Form->button(__('Create quiz'), ['id' => 'submitButton', 'class' => 'btn btn-primary', 'style' => 'margin-top: 10px']) ?>
<?= $this->Form->end() ?>

<?php if ($quiz->getErrors()): ?>
    <div class="error-messages" style="color:red">
        <?php foreach ($quiz->getErrors() as $field => $errors): ?>
            <?php if (is_array($errors)): ?>
                <?php foreach ($errors as $error): ?>
                    <p><?= h($error) ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?= h($errors) ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script>
    const addButton = document.getElementById('addButton');
    const questionsContainer = document.getElementById('questions-container');
    const submitButton = document.getElementById('submitButton');
    let questionCount = <?= isset($data['questions']) ? count($data['questions']) : 0 ?>;

    addButton.addEventListener('click', () => {
        const optionCount = document.getElementById('optionCount').value;
        submitButton.removeAttribute('disabled');

        questionCount++;
        let questionHTML = `
        <h5>Question ${questionCount}</h5>
        <label class="form-label" for="question${questionCount}_title">Question ${questionCount} Title</label>
        <input class="form-control" type="text" name="question${questionCount}_title">
    `;

        for (let i = 0; i < optionCount; i++) {
            questionHTML += `
            <label class="form-label" for="question${questionCount}_option${i+1}">Option ${i+1}</label>
            <input class="form-control" type="text" name="question${questionCount}_option${i+1}">
        `;
        }

        questionHTML += `
        <label class="form-label" for="question${questionCount}_correctoption">Correct Option</label>
        <select class="form-control" name="question${questionCount}_correctoption">
    `;

        for (let i = 1; i <= optionCount; i++) {
            questionHTML += `<option value="${i}">${i}</option>`;
        }

        questionHTML += `</select>`;

        questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
    });
</script>

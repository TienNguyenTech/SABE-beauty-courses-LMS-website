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
        'escape' => false
    ],
    'class' => 'form-control'
]);
echo $this->Form->control('course_id', ['options' => $courses]);
?>
<h3>Questions</h3>
<span class="form-inline">Create a new question with <input class="form-control" id="optionCount" type="number" min="2" max="10" value="4"> options <span id="addButton" class="btn btn-primary">Add</span></span>

<div id="questions-container">

</div>

<?= $this->Form->button(__('Create quiz'),['id' => 'submitButton', 'class'=>'btn btn-primary', 'disabled', 'style' => 'margin-top: 10px']) ?>
<?= $this->Form->end() ?>

<script >
const addButton = document.getElementById('addButton');
const questionsContainer = document.getElementById('questions-container');
const submitButton = document.getElementById('submitButton');
let questionCount = 0;

addButton.addEventListener('click', () => {
    const optionCount = document.getElementById('optionCount').value;
    submitButton.removeAttribute('disabled')

    questionCount++;
    questionsContainer.innerHTML += `
    <h5>Question ${questionCount}</h5>
    <label class="form-label" for="question${questionCount}_title">Question ${questionCount} Title</label>
    <input class="form-control" type="text" name="question${questionCount}_title">
    `;

    optionsString = '';

    for(let i = 0; i < optionCount; i++) {
        questionsContainer.innerHTML += `
        <label class="form-label" for="question${questionCount}_option${i+1}">Option ${i+1}</label>
        <input class="form-control" type="text" name="question${questionCount}_option${i+1}">
        `;

        optionsString += `
        <option value="${i+1}">${i+1}</option>
        `;
    }

    questionsContainer.innerHTML += `
    <label class="form-label" for="question${questionCount}_correctoption">Correct Option</label>
    <select class="form-control" type="number" name="question${questionCount}_correctoption">
        ${optionsString}
    </select>
    `;

    console.log(optionCount)
})
</script>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var \App\Model\Entity\Course $course
 */
?>
<h1 class="h3 mb-2 text-gray-800">Add new quiz for <?= $course->course_name ?></h1>
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
])
?>
<h3>Questions</h3>
<span class="form-inline">Create a new question with <input class="form-control" id="optionCount" type="number" min="2" max="10" value="4"> options <span id="addButton" class="btn btn-primary">Add</span></span><br>

<div id="questions-container">
    <!-- <?php foreach($questions as $questionIndex => $value): ?>
        <h5 id="question<?= $questionIndex + 1 ?>title">Question <?= $questionIndex + 1 ?> <span id="question<?= $questionIndex + 1 ?>button" class="btn btn-danger btn-sm" onclick="deleteQuestion(<?= $questionIndex + 1 ?>)">Remove question</span></h5>
        <label id="question<?= $questionIndex + 1 ?>titlelabel" class="form-label" for="question<?= $questionIndex + 1 ?>_title">Question <?= $questionIndex + 1 ?> Title</label>
        <?= $this->Form->control('question' . ($questionIndex + 1) . '_title', [
            'label' => false
        ]) ?>
        <?php foreach($value->choices as $optionIndex => $option): ?>
            <label id="question<?= $questionIndex + 1 ?>option<?= $optionIndex + 1 ?>label" class="form-label" for="question<?= $questionIndex + 1 ?>_option<?= $optionIndex + 1 ?>">Option <?= $optionIndex + 1 ?></label>
            <?= $this->Form->control('question' . ($questionIndex + 1) . '_option' . ($optionIndex + 1), [
                'label' => false
            ]) ?>
        <?php endforeach; ?>
        <label id="question<?= $questionIndex + 1 ?>correctoptionlabel" class="form-label" for="question<?= $questionIndex + 1 ?>_correctoption">Correct Option</label>
        <select id="question<?= $questionIndex + 1 ?>correctoption" name="question<?= $questionIndex + 1 ?>_correctoption" class="form-control">
            <?php foreach($value->choices as $optionIndex => $option): ?>
                <option value="<?= $optionIndex ?>" <?= $value->correctAnswer == $option ? 'selected' : '' ?>><?= ($optionIndex + 1) . ': ' . $option ?></option>
            <?php endforeach; ?>
        </select>
        <br>
    <?php endforeach; ?> -->
</div>

<?= $this->Html->link('Cancel', ['controller' => 'Courses', 'action' => 'course', $course->course_id], ['class' => 'btn btn-secondary', 'style' => 'margin-top: 10px; margin-right: 10px']) ?>
<?= $this->Form->button(__('Create quiz'), ['id' => 'submitButton', 'class' => 'btn btn-primary', 'style' => 'margin-top: 10px', 'disabled']) ?>
<?= $this->Form->end() ?>

<script>
    const addButton = document.getElementById('addButton');
    const questionsContainer = document.getElementById('questions-container');
    const submitButton = document.getElementById('submitButton');
    let questionCount = 0;

    function deleteQuestion(index) {
        const confirmation = confirm(`Are you sure you want to delete question ${index}? This cannot be undone!`);

        if(!confirmation) return;

        document.querySelectorAll('[id]').forEach((element) => {
            if(element.id.includes(`question${index}`)) {
                const parentDiv = element.closest('div.mb-3.input.text');
                
                if (parentDiv) {
                    const nextElement = parentDiv.nextElementSibling;
                        if (nextElement && nextElement.tagName === 'BR') {
                        nextElement.remove();
                    }
                    parentDiv.remove();
                }

                const nextElement = element.nextElementSibling;
                    if (nextElement && nextElement.tagName === 'BR') {
                    nextElement.remove();
                }
                
                element.remove();
            }
        })

        document.querySelectorAll('[id]').forEach((element) => {
            const idMatch = element.id.match(/question(\d+)/);
            if (idMatch) {
                const elementIndex = parseInt(idMatch[1], 10); // Get the index number from the ID

                // If the element's index is greater than the deleted index, decrement it
                if (elementIndex > index) {
                    const newIndex = elementIndex - 1;
                    
                    // Update the element's ID and any other attributes
                    element.id = element.id.replace(`question${elementIndex}`, `question${newIndex}`);

                    // Update the text content and any internal references to the index
                    if (element.tagName === 'H5') {
                        element.innerHTML = `Question ${newIndex} <span id="question${newIndex}button" class="btn btn-danger btn-sm" onclick="deleteQuestion(${newIndex})">Remove question</span>`;
                    } else if (element.tagName === 'LABEL') {
                        element.setAttribute('for', element.getAttribute('for').replace(`question${elementIndex}`, `question${newIndex}`));
                        element.textContent = element.textContent.replace(`Question ${elementIndex}`, `Question ${newIndex}`);
                    } else if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
                        element.setAttribute('name', element.getAttribute('name').replace(`question${elementIndex}`, `question${newIndex}`));
                    }
                }
            }
        });

        questionCount--;

        if(questionCount == 0) {
            submitButton.setAttribute('disabled', 'true');
        }
    }

    addButton.addEventListener('click', () => {
        console.log('echo')
        const optionCount = document.getElementById('optionCount').value;
        submitButton.removeAttribute('disabled');

        questionCount++;
        let questionHTML = `
        <h5 id="question${questionCount}title">Question ${questionCount} <span id="question${questionCount}button" class="btn btn-danger btn-sm" onclick="deleteQuestion(${questionCount})">Remove question</span></h5>
        <label id="question${questionCount}label" class="form-label" for="question${questionCount}_title">Question ${questionCount} Title</label>
        <input id="question${questionCount}-title" class="form-control" type="text" name="question${questionCount}_title">
    `;

        for (let i = 0; i < optionCount; i++) {
            questionHTML += `
            <label id="question${questionCount}option${i+1}label" class="form-label" for="question${questionCount}_option${i+1}">Option ${i+1}</label>
            <input id="question${questionCount}option${i+1}" class="form-control" type="text" name="question${questionCount}_option${i+1}">
        `;
        }

        questionHTML += `
        <label id="question${questionCount}correctoptionlabel" class="form-label" for="question${questionCount}_correctoption">Correct Option</label>
        <select id="question${questionCount}correctoptionlabel" class="form-control" name="question${questionCount}_correctoption">
    `;

        for (let i = 1; i <= optionCount; i++) {
            questionHTML += `<option value="${i-1}">${i}</option>`;
        }

        questionHTML += `</select><br>`;

        questionsContainer.insertAdjacentHTML('beforeend', questionHTML);

        // Enable the submit button when a question is added
        if (questionCount > 0) {
            submitButton.removeAttribute('disabled');
        }
    });
</script>

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

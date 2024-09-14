<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;
use Laminas\Diactoros\Stream;
use Cake\ORM\Table;use Cake\ORM\TableRegistry;use PhpParser\Node\Expr\Array_;use PHPUnit\Util\Json;/**
 * Quizzes Controller
 *
 * @property \App\Model\Table\QuizzesTable $Quizzes
 * @property \App\Model\Table\ResponsesTable $Responses
 */
class QuizzesController extends AppController
{
    private \Cake\ORM\Table $Responses;

    public function initialize() : void{
        parent::initialize();

        $this->Responses = TableRegistry::getTableLocator()->get('Responses');

        $this->Authentication->allowUnauthenticated(['test', 'submit']);
    }

    // TEST FUNCTION
    public function test() {
        $questions = [];
        $question = new QuizQuestion('radiogroup', 'facemuscles', 'Face Muscles', ['a', 'b', 'c', 'e'], 'a');

        $question->generate();
        array_push($questions, $question->generate());

        $question = new QuizQuestion('radiogroup', 'weresoback', 'We\'re so back', ['true', 'false'], 'true');

        $question->generate();
        array_push($questions, $question->generate());

        $quiz = new QuizGenerator('Test Quiz', $questions);

        $quizJSON = $quiz->generate();

        $csrfToken = $this->request->getAttribute('csrfToken');

        $this->set(compact('quizJSON', 'csrfToken'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Quizzes->find()
            ->contain(['Courses']);
        $quizzes = $this->paginate($query);

        $this->set(compact('quizzes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quiz = $this->Quizzes->get($id, contain: ['Courses']);

        $quizID = $quiz->quiz_id;
        $quizJSON = $quiz->quiz_json;

        // Remove " from start and end so json.parse doesn't fail
        $quizJSON = substr($quizJSON, 1, -1);
        $csrfToken = $this->request->getAttribute('csrfToken');

        $this->set(compact('quizID', 'quizJSON', 'csrfToken'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiz = $this->Quizzes->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $transformedData = [
                'quiz_title' => $data['quiz_title'],
                'course_id' => $data['course_id'],
                'questions' => []
            ];

            $questionIndex = 1;
            while (isset($data['question' . $questionIndex . '_title'])) {
                $question = [
                    'title' => $data['question' . $questionIndex . '_title'],
                    'options' => [],
                    'correct_option' => $data['question' . $questionIndex . '_correctoption']
                ];

                $optionIndex = 1;
                while (isset($data['question' . $questionIndex . '_option' . $optionIndex])) {
                    $question['options'][] = $data['question' . $questionIndex . '_option' . $optionIndex];
                    $optionIndex++;
                }

                $transformedData['questions'][] = $question;
                $questionIndex++;
            }

            $questions = [];

            foreach ($transformedData['questions'] as $question) {
                array_push($questions, new QuizQuestion(
                    'radiogroup',
                    $question['title'],
                    $question['title'],
                    $question['options'],
                    $question['options'][intval($question['correctoption'])]
                ));
            }

            for($i = 0; $i < count($questions); $i++) {
                $questions[$i] = $questions[$i]->generate();
            }

            $quizJSON = new QuizGenerator(
                $transformedData['quiz_title'],
                $questions
            );

            $quizJSON = json_encode($quizJSON->generate());

            $quiz = $this->Quizzes->patchEntity($quiz, [
                'course_id' => $transformedData['course_id'],
                'quiz_json' => $quizJSON
            ]);
            if ($this->Quizzes->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $courses = $this->Quizzes->Courses->find('list', limit: 200)->all();
        $this->set(compact('quiz', 'courses'));
    }

    public function submit() {
        $response = $this->Responses->newEmptyEntity();
        if($this->request->is('post')) {
            $data = $this->request->getData();

            $quiz = $this->Quizzes->get($data[1]);

            $rawQuestions =  json_decode(json_decode($quiz->quiz_json));
            $rawQuestions = $rawQuestions->pages;

            $answers = [];
            $responses = $data[0];

            foreach ($rawQuestions as $question) {
                array_push($answers, [$question->elements->name => $question->elements->correctAnswer]);
            }



            $totalQuestions = count($answers);
            $correctAnswers = 0;

            for($i = 0; $i < $totalQuestions; $i++) {
                if($responses[$i] == $answers[$i]) {
                    $correctAnswers++;
                }
            }

            $grade = $correctAnswers / $totalQuestions;

            $response = $this->Responses->newEmptyEntity();
            $response = $this->Responses->patchEntity($response, [
                'user_id' => $this->Authentication->getIdentity()->user_id,
                'quiz_id' => $quiz->quiz_id,
                'response_json' => json_encode($responses),
                'response_score' => $grade
            ]);

            $this->Responses->save($response);

            $json = json_encode($response);

            // Send redirect url to client side
            return $this->response->withType('application/json; charset=utf-8')->withStringBody(Router::url(['controller' => 'Responses' ,'action' => 'view', $response->response_id]));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiz = $this->Quizzes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizzes->patchEntity($quiz, $this->request->getData());
            if ($this->Quizzes->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $courses = $this->Quizzes->Courses->find('list', limit: 200)->all();
        $this->set(compact('quiz', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quizzes->get($id);
        if ($this->Quizzes->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

class QuizGenerator {
    public string $title;
    public array $questions;
    function __construct($title, $questions) {
        $this->title = $title;
        $this->questions = $questions;
    }

    function generate() {
        $quiz = [
            'title' => $this->title,
            'pages' => []
        ];

        foreach ($this->questions as $question) {
            array_push($quiz['pages'], [
                'elements' => [
                    'type' => $question['type'],
                    'name' => $question['name'],
                    'title' => $question['title'],
                    'choicesOrder' => 'random',
                    'choices' => $question['choices'],
                    'correctAnswer' => $question['correctAnswer'],
                    'score' => $question['score']
                ]
            ]);
        }

        return json_encode($quiz);
    }
}

class QuizQuestion {
    public string $type;
    public string $name;
    public string $title;
    public array $choices;
    public string $correctAnswer;

    function __construct($type, $name, $title, $choices, $correctAnswer) {
        $this->type = $type;
        $this->name = $name;
        $this->title = $title;
        $this->choices = $choices;
        $this->correctAnswer = $correctAnswer;
    }

    public function generate() {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'title' => $this->title,
            'choices' => $this->choices,
            'correctAnswer' => $this->correctAnswer,
            'score' => 1
        ];
    }
}

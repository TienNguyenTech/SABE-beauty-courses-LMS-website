<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;
use Laminas\Diactoros\Stream;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\Array_;
use PHPUnit\Util\Json;
use Cake\Log\Log;

/**
 * Quizzes Controller
 *
 * @property \App\Model\Table\QuizzesTable $Quizzes
 * @property \App\Model\Table\ResponsesTable $Responses
 * @property \App\Model\Table\CompletionsTable $Completions
 */
class QuizzesController extends AppController
{
    private \Cake\ORM\Table $Responses;
    private \Cake\ORM\Table $Completions;

    public function initialize() : void{
        parent::initialize();

        $this->Responses = TableRegistry::getTableLocator()->get('Responses');
        $this->Completions = TableRegistry::getTableLocator()->get('Completions');

        $this->Authentication->allowUnauthenticated(['test', 'submit']);
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }

    protected function restrict()
    {
        $user = $this -> Authentication -> getIdentity() ->getOriginalData();
        $userID = $user['User'];
        $user = $this->Users->get($userID);
        $userType = $user->user_type;
        if($userType == 'student') {
            return $this->redirect(['controller' => 'studentDashboard', 'action' => 'dashboard']);
        }
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
        $this->viewBuilder()->setLayout('student');
        $quiz = $this->Quizzes->get($id);

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
        $this->restrict();
        $quiz = $this->Quizzes->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
//            Log::debug('Request Data: ' . print_r($data, true));

            $transformedData = [
                'quiz_title' => $data['quiz_title'],
                'course_id' => $data['course_id'],
                'questions' => []
            ];

            $questionIndex = 1;
            while (isset($data['question' . $questionIndex . '_title'])) {
                if (isset($data['question' . $questionIndex . '_correctoption'])) {
                    $question = [
                        'title' => $data['question' . $questionIndex . '_title'],
                        'options' => [],
                        'correct_option' => $data['question' . $questionIndex . '_correctoption']
                    ];
                } else {
                    $question = [
                        'title' => $data['question' . $questionIndex . '_title'],
                        'options' => [],
                        'correct_option' => null // or handle the missing key appropriately
                    ];
                }

                $optionIndex = 1;
                while (isset($data['question' . $questionIndex . '_option' . $optionIndex])) {
                    $question['options'][] = $data['question' . $questionIndex . '_option' . $optionIndex];
                    $optionIndex++;
                }

                $transformedData['questions'][] = $question;
                $questionIndex++;
            }

//            Log::debug('Transformed Data: ' . print_r($transformedData, true));

            $questions = [];

            foreach ($transformedData['questions'] as $question) {
                array_push($questions, new QuizQuestion(
                    'radiogroup',
                    $question['title'],
                    $question['title'],
                    $question['options'],
                    $question['options'][intval($question['correct_option'])]
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
                'quiz_title' => $transformedData['quiz_title'],
                'questions' => $transformedData['questions'],
                'course_id' => $transformedData['course_id'],
                'quiz_json' => $quizJSON
            ]);

//            Log::debug('Quiz Entity: ' . print_r($quiz, true));

            if ($this->Quizzes->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['controller' => 'Courses', 'action' => 'index']);
            }

//            Log::debug('Validation Errors: ' . print_r($quiz->getErrors(), true));
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $courses = $this->Quizzes->Courses->find('list', ['limit' => 200])->all();
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

            $user = $this->Authentication->getIdentity()->getOriginalData();
            $userID = $user['User']['id'];

            $response = $this->Responses->newEmptyEntity();
            $response = $this->Responses->patchEntity($response, [
                'user_id' => $userID,
                'quiz_id' => $quiz->quiz_id,
                'response_json' => json_encode($responses),
                'response_score' => $grade
            ]);

            $this->Responses->save($response);

            $completion = null;

            if($response->response_score >= 0.75) {
                // Pass -> complete course
                $completion = $this->Completions->newEmptyEntity();
                $completion->user_id = $userID;
                $completion->course_id = $quiz->course_id;

                $this->Completions->save($completion);
                return $this->response->withType('application/json; charset=utf-8')->withStringBody(Router::url(['controller' => 'Completions' ,'action' => 'view', $completion->completion_id]));
            } else {
                // Fail -> try again? maybe something else
                return $this->response->withType('application/json; charset=utf-8')->withStringBody(Router::url(['controller' => 'Quizzes' ,'action' => 'view', $quiz->quiz_id]));
            }

            //$json = json_encode($response);

            // Send redirect url to client side
            // return $this->response->withType('application/json; charset=utf-8')->withStringBody(Router::url(['controller' => 'Completions' ,'action' => 'view', $completion->completion_id]));
            // return $this->response->withType('application/json; charset=utf-8')->withStringBody(json_encode($completion));
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
        $this->restrict();
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
        $this->restrict();
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quizzes->get($id);
        if ($this->Quizzes->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Courses','action' => 'index']);
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

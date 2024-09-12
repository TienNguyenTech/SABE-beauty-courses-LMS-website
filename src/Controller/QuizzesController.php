<?php
declare(strict_types=1);

namespace App\Controller;

use PhpParser\Node\Expr\Array_;use PHPUnit\Util\Json;/**
 * Quizzes Controller
 *
 * @property \App\Model\Table\QuizzesTable $Quizzes
 */
class QuizzesController extends AppController
{
    public function initialize() : void{
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['test']);
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

        $this->set(compact('quizJSON'));
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
        $this->set(compact('quiz'));
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
                    'correctAnswer' => $question['correctAnswer']
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
            'correctAnswer' => $this->correctAnswer
        ];
    }
}

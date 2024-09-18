<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 * @property \App\Model\Table\ContentsTable $Contents
 * @property \App\Model\Table\PaymentsTable $Payments
 * @property \App\Model\Table\ProgressionsTable $Progress
 */
class CoursesController extends AppController
{
    private \Cake\ORM\Table $Contents;
    private \Cake\ORM\Table $Quizzes;
    private \Cake\ORM\Table $Payments;
    private \Cake\ORM\Table $Progressions;

    public function initialize(): void
    {
        parent::initialize();
        $this->Contents = TableRegistry::getTableLocator()->get("Contents");
        $this->Quizzes = TableRegistry::getTableLocator()->get("Quizzes");
        $this->Payments = TableRegistry::getTableLocator()->get("Payments");
        $this->Progressions = TableRegistry::getTableLocator()->get("Progressions");

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['view', 'courses']);
        $this->Users = TableRegistry::getTableLocator()->get("Users");
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
    public function courses()
    {
        $this->viewBuilder()->setLayout('customer');

        $query = $this->Courses->find();
        $courses = $this->paginate($query);

        $this->set(compact('courses'));
        $this->set('pageTitle', 'Courses');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Courses->find();
        $courses = $this->paginate($query);

        $this->set(compact('courses'));
    }

    public function enrolledcourses()
    {
        $user = $this->Authentication->getIdentity()->getOriginalData();
        $userID = $user['User']['id'];

        $payments = $this->Payments->find()->where(['user_id' => $userID])->toArray();
        $courses = [];

        if(empty($courses)) {
            //return $this->redirect(['action' => 'courses']);
            $this->set(compact('courses'));
            return $this->Flash->error('You are not currently enrolled in any courses');
        }

        foreach ($payments as $payment) {
            array_push($courses, $payment->course_id);
        }
        
        

        $query = $this->Courses->find()->where(['course_id IN' => $courses]);
        $courses = $this->paginate($query);

        

        $this->set(compact('courses'));
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, contain: ['Users']);
        $this->viewBuilder()->setLayout('customer');
        $this->set(compact('course'));
    }

    /**
     * Admin view method
     * @param string|null $id Course ID
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function course($id = null)
    {
        $course = $this->Courses->get($id);
        $quiz = $this->Quizzes->find()->where(['course_id IS' => $course->course_id])->first();

        if (!empty($quiz)) {
            $quizID = $quiz->quiz_id;
            $quizJson = json_decode(json_decode($quiz->quiz_json));
            $quiz = $quizJson;
            $quiz->quiz_id = $quizID;
        }

        $query = $this->Contents->find()->where(['course_id IS' => $course->course_id]);
        $contents = $this->paginate($query);
        $this->viewBuilder()->setLayout('default');
        $this->set(compact('course', 'contents', 'quiz'));
    }

    /* Student accesses a course */
    public function accesscourse($id = null)
    {
        $user = $this->Authentication->getIdentity()->getOriginalData();
        $userID = $user['User']['id'];

        $course = $this->Courses->get($id);
        $contents = $this->Contents->find()->where(['course_id IS' => $course->course_id])->toArray();

        $contentIDs = [];
        foreach ($contents as $content) {
            array_push($contentIDs, $content->content_id);
        }

        $quiz = $this->Quizzes->find()->where(['course_id IS' => $course->course_id])->first();
        $progressions = $this->Progressions->find()->where(['user_id IS' => $userID, 'content_id IN' => $contentIDs])->toArray();

        $progression = count($progressions) / count($contents);

        // dd($progression);

        if (!empty($quiz)) {
            $quizID = $quiz->quiz_id;
            $quizJson = json_decode(json_decode($quiz->quiz_json));
            $quiz = $quizJson;
            $quiz->quiz_id = $quizID;
        }

        $query = $this->Contents->find()->where(['course_id IS' => $course->course_id]);
        $contents = $this->paginate($query);
        $this->viewBuilder()->setLayout('default');
        $this->set(compact('course', 'contents', 'quiz', 'progression'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->restrict();
        $course = $this->Courses->newEmptyEntity();
        if ($this->request->is('post')) {
            // Get the form data and patch the entity
            $course = $this->Courses->patchEntity($course, $this->request->getData());

            // Get the uploaded files
            $image = $this->request->getUploadedFiles();

            // Check if the file size exceeds 10MB
            if ($image['course_image']->getSize() > 20 * 1024 * 1024) {
                $this->Flash->error(__('Image file size must be 10MB or less.'));
            } else if ($image['course_image']->getClientMediaType() != 'image/jpeg' && $image['course_image']->getClientMediaType() != 'image/png') {
                $this->Flash->error(__('The image must be either png or jpg format.'));
            } else {
                $course->course_image = 'assets/img/products/' . $image['course_image']->getClientFilename();

                if ($this->Courses->save($course)) {
                    $image['course_image']->moveTo(WWW_ROOT . 'assets' . DS . 'img' . DS . 'products' . DS . $image['course_image']->getClientFilename());
                    $this->Flash->success(__('The course has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The course could not be saved. Please try again.'));
            }
        }

        $users = $this->Courses->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('course', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->restrict();
        $course = $this->Courses->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $image = $this->request->getUploadedFiles();

            $filename = $course['course_image'];
            $newCourse = $this->request->getData();
            $newCourse['course_image'] = $filename;

            if ($image['course_image']->getError() == \UPLOAD_ERR_NO_FILE) {
                $course = $this->Courses->patchEntity($course, $newCourse);

                if ($this->Courses->save($course)) {
                    $this->Flash->success(__('The course has been updated'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The course could not be saved. Please try again.'));
            } else if ($image['course_image']->getSize() > 20 * 1024 * 1024) {
                $this->Flash->error(__('Image file size must be 10MB or less.'));
            } else if ($image['course_image']->getClientMediaType() != 'image/jpeg' && $image['course_image']->getClientMediaType() != 'image/png') {
                $this->Flash->error(__('The image must be either png or jpg format.'));
            } else {
                $course = $this->Courses->patchEntity($course, $this->request->getData());

                $course->course_image = 'assets/img/products/' . $image['course_image']->getClientFilename();
                $image['course_image']->moveTo(WWW_ROOT . 'assets' . DS . 'img' . DS . 'products' . DS . $image['course_image']->getClientFilename());

                if ($this->Courses->save($course)) {
                    $this->Flash->success(__('The course has been updated'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The course could not be saved. Please try again.'));
            }
        }

        $this->set(compact('course'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->restrict();
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

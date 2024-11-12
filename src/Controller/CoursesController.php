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
 * @property \App\Model\Table\ProgressionsTable $Progressions
 * @property \App\Model\Table\ResponsesTable $Responses
 */
class CoursesController extends AppController
{
    private \Cake\ORM\Table $Contents;
    private \Cake\ORM\Table $Quizzes;
    private \Cake\ORM\Table $Payments;
    private \Cake\ORM\Table $Progressions;
    private \Cake\ORM\Table $Users;
    private \Cake\ORM\Table $Responses;


    public function initialize(): void
    {
        parent::initialize();
        $this->Contents = TableRegistry::getTableLocator()->get("Contents");
        $this->Quizzes = TableRegistry::getTableLocator()->get("Quizzes");
        $this->Payments = TableRegistry::getTableLocator()->get("Payments");
        $this->Progressions = TableRegistry::getTableLocator()->get("Progressions");
        $this->Responses = TableRegistry::getTableLocator()->get("Responses");

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['view', 'courses']);
        $this->Users = TableRegistry::getTableLocator()->get("Users");
        $this->response = $this->response->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->withHeader('Cache-Control', 'post-check=0, pre-check=0', false)
            ->withHeader('Pragma', 'no-cache');
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

        $query = $this->Courses->find()->where(['archived IS' => false]);
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
        $query = $this->Courses->find()->where(['archived IS' => 0]);
        $courses = $this->paginate($query)->toArray();

        // Set hasPayments for each course
        for($i = 0; $i < sizeOf($courses); $i++) {
            // Check if there are any payments associated with this course
            $id = $courses[$i]['course_id'];
            $hasPayments = $this->Courses->Payments->exists(['course_id IS' => $id]);

            if($hasPayments == true) {
                $courses[$i]->hasPayments = true;
            } else {
                $courses[$i]->hasPayments = false;
            }
        }

        $this->set('title', 'Courses');
        $this->set(compact('courses'));
    }

    public function enrolledcourses()
    {
        $this->viewBuilder()->setLayout('student');
        $this->set('title', 'My Courses');
        $user = $this->Authentication->getIdentity()->getOriginalData();
        $userID = $user['User']['id'];

        $payments = $this->Payments->find()->where(['user_id' => $userID])->toArray();
        $courses = [];

        foreach ($payments as $payment) {
            array_push($courses, $payment->course_id);
        }

        if(empty($courses)) {
            $this->set(compact('courses'));
            return $this->Flash->error('You are not currently enrolled in any courses');
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

        $this->paginate = [
            'order' => [
                'content_position' => 'ASC'
            ]
        ];

        $contents = $this->paginate($query);
        $this->viewBuilder()->setLayout('default');
        $this->set('title', $course->course_name);
        $this->set(compact('course', 'contents', 'quiz'));
    }

    /* Student accesses a course */
    public function accesscourse($id = null)
    {
        // Retrieve the user type
        $user = $this->Authentication->getIdentity()->getOriginalData();
        $user = $this->Users->get($user['User']['id']);
        $userType = $user->user_type;

        // Set the layout based on the user type
        if ($userType === 'admin') {
            $this->viewBuilder()->setLayout('default');
        } else {
            $this->viewBuilder()->setLayout('student');
        }

        $user = $this->Authentication->getIdentity()->getOriginalData();
        $userID = $user['User']['id'];

        // Check if user is enrolled in the course
        $payments = $this->Payments->find()->where([
            'user_id IS' => $userID,
            'course_id IS' => $id
        ])->toArray();

        if(empty($payments)) {
            return $this->redirect(['action' => 'courses']);
        }

        $course = $this->Courses->get($id);
        $contents = $this->Contents->find()->where(['course_id IS' => $course->course_id])->toArray();

        $this->set('title', $course->course_name);

        $progressions = [];
        $progression = 0;
        if(!empty($contents)) {
            $contentIDs = [];
            foreach ($contents as $content) {
                array_push($contentIDs, $content->content_id);
            }


            $progressions = $this->Progressions->find()->where(['user_id IS' => $userID, 'content_id IN' => $contentIDs])->toArray();

            $progression = count($progressions) / count($contents);
        }

        $completedContent = [];
        if(!empty($progression)) {
            foreach ($progressions as $progress) {
                array_push($completedContent, $progress->content_id);
            }
        }

        if(!empty($contents)) {
            for($i = 0; $i < sizeof($contents); $i++) {
                $contents[$i]['completed'] = in_array($contents[$i]->content_id, $completedContent);
            }
        }

        $quiz = $this->Quizzes->find()->where(['course_id IS' => $course->course_id])->first();
        if (!empty($quiz)) {
            $quizID = $quiz->quiz_id;
            $quizJson = json_decode(json_decode($quiz->quiz_json));
            $quiz = $quizJson;
            $quiz->quiz_id = $quizID;
        }

        $query = $this->Contents->find()->where(['course_id IS' => $course->course_id]);
        $this->set(compact('course', 'contents', 'quiz', 'progression'));
    }

    public function enrollment($userID, $courseID) {
        $user = $this->Users->get($userID);

        $course = $this->Courses->get($courseID);

        $progressions = [];
        $progression = 0;
        if(!empty($contents)) {
            $contentIDs = [];
            foreach ($contents as $content) {
                array_push($contentIDs, $content->content_id);
            }


            $progressions = $this->Progressions->find()->where(['user_id IS' => $userID, 'content_id IN' => $contentIDs])->toArray();

            $progression = count($progressions) / count($contents);
        }

        $quiz = $this->Quizzes->find()->where(['course_id IS' => $course->course_id])->first();
        if (!empty($quiz)) {
            $quizID = $quiz->quiz_id;
            $quizJson = json_decode(json_decode($quiz->quiz_json));
            $quiz = $quizJson;
            $quiz->quiz_id = $quizID;
        }

        $query = $this->Contents->find()->where(['course_id IS' => $course->course_id]);
        $contents = $this->paginate($query);

        $response = $this->Responses->find()->where(['user_id IS' => $userID, 'quiz_id IS' => $quiz->quiz_id])->first();

        $this->set('title', 'View Progress');
        $this->set(compact('course', 'contents', 'quiz', 'progression', 'user', 'response'));
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
        $this->set('title', 'Create Course');
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

        $this->set('title', 'Edit ' . $course->course_name);
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

    /**
     * Archive method - toggles archived status
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function archive($id = null)
    {
        $this->request->allowMethod(['post']);

        // Fetch the course by its ID
        $course = $this->Courses->get($id);

        // Check if there are any payments associated with this course
        $hasPayments = $this->Courses->Payments->exists(['course_id' => $id]);

        if ($course->archived == 1) {
            // Unarchive the course
            $course->archived = 0;
            $this->Flash->success(__('The course has been unarchived.'));
        } else {
            // Confirm archiving the course
            if ($hasPayments) {
                $this->Flash->warning(__('This course has students enrolled in it. Are you sure you want to archive it?'));
                return $this->redirect(['action' => 'index']);
            }

            // Archive the course
            $course->archived = 1;
            $this->Flash->success(__('The course has been unarchived.'));
        }

        // Save the course's new archive status
        $this->Courses->save($course);

        return $this->redirect(['action' => 'index']);
    }


    /**
     * Gets all archived courses
     *
     * @return void
     */
    public function archived() {
        $query = $this->Courses->find()->where(['archived IS' => 1]);
        $courses = $this->paginate($query);

        $this->set('title', 'Archived Courses');
        $this->set(compact('courses'));
    }
}

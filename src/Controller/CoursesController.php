<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['index', 'view', 'viewc']);
    }
    public function viewc()
    {
        $this->viewBuilder()->setLayout('customerDefault');

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
        $this->set(compact('course'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEmptyEntity();
        if ($this->request->is('post')) {
            // Get the form data and patch the entity
            $course = $this->Courses->patchEntity($course, $this->request->getData());

            // Get the uploaded files
            $image = $this->request->getUploadedFiles();

            // Check if the file size exceeds 10MB
            if ($image['course_image']->getSize() > 20 * 1024 * 1024) {
                $this->Flash->error(__('Image file size must be 10MB or less.'));
            } else {
                $course->course_image = 'assets/img/products/' . $image['course_image']->getClientFilename();
                $image['course_image']->moveTo(WWW_ROOT . 'assets' . DS . 'img' . DS . 'products' . DS . $image['course_image']->getClientFilename());

                if($this->Courses->save($course)) {
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
        $course = $this->Courses->get($id, contain: ['Users']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $users = $this->Courses->Users->find('list', limit: 200)->all();
        $this->set(compact('course', 'users'));
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

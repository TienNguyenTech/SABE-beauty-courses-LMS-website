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

            // Check if 'course_image' key exists and is a valid UploadedFile object
            if (isset($image['course_image']) && $image['course_image'] instanceof \Laminas\Diactoros\UploadedFile) {
                $uploadedFile = $image['course_image'];

                // Get the original filename
                $filename = $uploadedFile->getClientFilename();

                // Define the path to save the uploaded file
                $targetPath = WWW_ROOT . 'img' . DS . 'course' . DS . $filename;

                // Move the file to the target path
                $uploadedFile->moveTo($targetPath);

                // Set the course image property using the set method
                $course->set('course_image', $filename);
            } else {
                $this->Flash->error(__('Invalid file upload.'));
                return $this->redirect(['action' => 'add']);
            }

            // Save the course entity
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
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

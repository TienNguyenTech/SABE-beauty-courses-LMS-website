<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find()->where(['archived IS' => 0]);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('student');
        $user = $this->Users->get($id, ['contain' => []]);
        $this->set(compact('user'));
        $this->set('title', 'Profile');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->restrict();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $courses = $this->Users->Courses->find('list', limit: 200)->all();
        $this->set(compact('user', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->restrict();
        $user = $this->Users->get($id, contain: ['Courses']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $courses = $this->Users->Courses->find('list', limit: 200)->all();
        $this->set(compact('user', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index or admin.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->restrict();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($user->user_type === 'admin') {
            // Count the number of admin users
            $adminCount = $this->Users->find()->where(['user_type' => 'admin'])->count();
            if ($adminCount === 1) {
                // If there is only one admin user, don't allow deletion
                $this->Flash->error(__('Currently, there is only one admin account. Deleting the admin account is not allowed.'));
                return $this->redirect(['action' => 'index']);
            }
            // If admin count is more than 1 or user is not an admin, proceed with deletion
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);

        } else {
        // For non-admin users (e.g., customers), proceed with deletion
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }

    }

    public function archive($id = null) {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if($user->archived == 1) {
            // Unarchive
            $user->archived = 0;
            $this->Flash->success(__('The user account has been reactivated.'));
        } else {
            // Archive
            $user->archived = 1;
            $this->Flash->success(__('The user account has been deactivated.'));
        }

        $this->Users->save($user);

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Gets all archived users
     *
     * @return void
     */
    public function archived() {
        $query = $this->Users->find()->where(['archived IS' => 1]);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }
}

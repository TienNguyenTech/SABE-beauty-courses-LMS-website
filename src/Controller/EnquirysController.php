<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Enquirys Controller
 *
 * @property \App\Model\Table\EnquirysTable $Enquirys
 */
class EnquirysController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['add']);
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
        $query = $this->Enquirys->find()
            ->where(['archived' => false]);
        $enquirys = $this->paginate($query);

        $this->set('title', 'Enquiries');

        $this->set(compact('enquirys'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquiry = $this->Enquirys->get($id);
        $this->set(compact('enquiry'));
    }

    public function reply($id = null) {
        $enquiry = $this->Enquirys->get($id);
        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $this->restrict();
        $this->viewBuilder()->setLayout('customer');
        $enquiry = $this->Enquirys->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquirys->patchEntity($enquiry, $this->request->getData());
            $enquiry->archived = false;
            if ($this->Enquirys->save($enquiry)) {
                $this->redirect(['action' => 'add']);

                return $this->Flash->success('Enquiry has been sent', ['key' => 'positive', 'clear' => true]);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->restrict();
        $enquiry = $this->Enquirys->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquirys->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquirys->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->restrict();
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquirys->get($id);
        if ($this->Enquirys->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function viewMessage($id = null)
    {
        $enquiry = $this->Enquirys->get($id, [
            'contain' => [],
        ]);
        $this->set('title', $enquiry->enquiry_subject);
        $this->set(compact('enquiry'));
    }


    public function archive($id = null) {
        $this->request->allowMethod(['post']);
        $enquiry = $this->Enquirys->get($id);

        if($enquiry->archived == true) {
            // Unarchive
            $enquiry->archived = false;
            $this->Flash->success(__('The course has been unarchived.'));
        } else {
            // Archive
            $enquiry->archived = true;
            $this->Flash->success(__('The course has been archived.'));
        }

        $this->Enquirys->save($enquiry);

        return $this->redirect(['action' => 'index']);
    }
    public function unarchive($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $enquiry = $this->Enquirys->get($id);
        $enquiry->archived = false;
        if ($this->Enquirys->save($enquiry)) {
            $this->Flash->success(__('The enquiry has been unarchived.'));
        } else {
            $this->Flash->error(__('The enquiry could not be unarchived. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function archived() {
        $query = $this->Enquirys->find()
            ->where(['archived' => true]);
        $enquirys = $this->paginate($query);
        $this->set('title', 'Archived Enquiries');
        $this->set(compact('enquirys'));
    }

    public function toggle($id = null) {
        $this->request->allowMethod(['get']);
        $enquiry = $this->Enquirys->get($id);

        $enquiry->enquiry_seen = $enquiry->enquiry_seen ? 0 : 1;

        if ($this->Enquirys->save($enquiry)) {
            $this->Flash->success(__('Enquiry status updated successfully.'));
        } else {
            $this->Flash->error(__('Failed to update enquiry status. Please try again.'));
        }

        $this->redirect(['action' => 'index']);
    }
}

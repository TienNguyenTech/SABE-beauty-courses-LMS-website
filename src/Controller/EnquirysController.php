<?php
declare(strict_types=1);

namespace App\Controller;

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
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Enquirys->find();
        $enquirys = $this->paginate($query);

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
        $enquiry = $this->Enquirys->get($id, contain: ['Enquirys']);
        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $this->viewBuilder()->disableAutoLayout();
        //$this->viewBuilder()->setLayout('contactUsLayout');
        $enquiry = $this->Enquirys->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquirys->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquirys->save($enquiry)) {
                $this->redirect(['action' => 'add']);

                return $this->Flash->success(
                    '<div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                        Enquiry has been sent
                    </div>',
                    ['key' => 'positive', 'escape' => false, 'clear' => true]
                );

            }
            $this->Flash->error(
                '<div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                    The enquiry could not be saved. Please, try again.
                </div>',
                ['escape' => false]
            );

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
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquirys->get($id);
        if ($this->Enquirys->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function toggle($id = null)
    {
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

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Completions Controller
 *
 * @property \App\Model\Table\CompletionsTable $Completions
 */
class CompletionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Completions->find()
            ->contain(['Users', 'Courses']);
        $completions = $this->paginate($query);

        $this->set(compact('completions'));
    }

    /**
     * View method
     *
     * @param string|null $id Completion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('student');
        $completion = $this->Completions->get($id, contain: ['Users', 'Courses']);
        $this->set(compact('completion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $completion = $this->Completions->newEmptyEntity();
        if ($this->request->is('post')) {
            $completion = $this->Completions->patchEntity($completion, $this->request->getData());
            if ($this->Completions->save($completion)) {
                $this->Flash->success(__('The completion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The completion could not be saved. Please, try again.'));
        }
        $users = $this->Completions->Users->find('list', limit: 200)->all();
        $courses = $this->Completions->Courses->find('list', limit: 200)->all();
        $this->set(compact('completion', 'users', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Completion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $completion = $this->Completions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $completion = $this->Completions->patchEntity($completion, $this->request->getData());
            if ($this->Completions->save($completion)) {
                $this->Flash->success(__('The completion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The completion could not be saved. Please, try again.'));
        }
        $users = $this->Completions->Users->find('list', limit: 200)->all();
        $courses = $this->Completions->Courses->find('list', limit: 200)->all();
        $this->set(compact('completion', 'users', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Completion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $completion = $this->Completions->get($id);
        if ($this->Completions->delete($completion)) {
            $this->Flash->success(__('The completion has been deleted.'));
        } else {
            $this->Flash->error(__('The completion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

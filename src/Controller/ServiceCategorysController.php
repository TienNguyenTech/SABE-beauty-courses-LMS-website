<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;


/**
 * ServiceCategorys Controller
 *
 * @property \App\Model\Table\ServiceCategorysTable $ServiceCategorys
 */
class ServiceCategorysController extends AppController
{
    public function initialize(): void {
        $this->ServiceCategorys = $this->getTableLocator()->get("ServiceCategorys");
        $this->Services = TableRegistry::getTableLocator()->get(alias: 'Services');
        $this->loadComponent('Flash');
        $this->response = $this->response->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->withHeader('Cache-Control', 'post-check=0, pre-check=0', false)
            ->withHeader('Pragma', 'no-cache');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ServiceCategorys->find();
        $serviceCategorys = $this->paginate($query);

        $this->set('title', 'Service Categories');
        $this->set(compact('serviceCategorys'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceCategory = $this->ServiceCategorys->get($id, contain: []);
        $this->set(compact('serviceCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceCategory = $this->ServiceCategorys->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviceCategory = $this->ServiceCategorys->patchEntity($serviceCategory, $this->request->getData());
            if ($this->ServiceCategorys->save($serviceCategory)) {
                $this->Flash->success(__('The service category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service category could not be saved. Please, try again.'));
        }

        $this->set('title', 'Add Service Category');
        $this->set(compact('serviceCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceCategory = $this->ServiceCategorys->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceCategory = $this->ServiceCategorys->patchEntity($serviceCategory, $this->request->getData());
            if ($this->ServiceCategorys->save($serviceCategory)) {
                $this->Flash->success(__('The service category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service category could not be saved. Please, try again.'));
        }

        $this->set('title', 'Edit ' . $serviceCategory->category_name);
        $this->set(compact('serviceCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceCategory = $this->ServiceCategorys->get($id);

        $services = $this->Services->find()->where(['category_id IS' => $id])->toArray();

        if (!empty($services)) {
            $this->Flash->error(__('The service category could not be deleted. Please, try again.'));
        } else if ($this->ServiceCategorys->deleteAll(['category_id IS' => $id])) {
            $this->Flash->success(__('The service category has been deleted.'));
        } else {
            $this->Flash->error(__('The service category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

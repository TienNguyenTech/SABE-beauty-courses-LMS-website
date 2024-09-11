<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;/**
* Beauty By Lisa Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class BeautyByLisaController extends AppController
{
    private \Cake\ORM\Table $Services;

    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['services']);
        $this->Services = TableRegistry::getTableLocator()->get('Services');
    }
    public function services() {
        $this->viewBuilder()->setLayout('customer');

        $services = $this->Services->find()->toArray();

        $this->set('title', 'Beauty by Lisa Follett');
        $this->set(compact('services'));
    }

}

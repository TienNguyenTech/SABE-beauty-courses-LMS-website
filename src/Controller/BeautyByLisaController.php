<?php
declare(strict_types=1);

namespace App\Controller;

class BeautyByLisaController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['services']);
    }
    public function services() {
        $this->viewBuilder()->setLayout('customer');


        $this->set('pageTitle', 'Beauty by Lisa Follett');
    }

}

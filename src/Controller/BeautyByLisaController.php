<?php
declare(strict_types=1);

namespace App\Controller;

class BeautyByLisaController extends AppController
{   

    public function initialize(): void
    {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['viewlisa']);
    }
    public function viewlisa() {
        $this->viewBuilder()->setLayout('beautyByLisaLayout');


        $this->set('pageTitle', 'Beauty by Lisa Follet');
    }

}

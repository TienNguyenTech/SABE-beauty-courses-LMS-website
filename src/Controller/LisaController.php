<?php
declare(strict_types=1);

namespace App\Controller;

class LisaController extends AppController
{   
    public function viewlisa() {
        $this->viewBuilder()->setLayout('customerDefault');
       
        $this->set('pageTitle', 'Beauty by Lisa Follet');
    }

}
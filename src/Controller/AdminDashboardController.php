<?php
declare(strict_types=1);

namespace App\Controller;

class AdminDashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('default');
    }

    public function dashboard() {

    }

}

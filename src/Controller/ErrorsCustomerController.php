<?php 
namespace App\Controller;

use App\Controller\AppController;

class ErrorsCustomerController extends AppController
{
    public function error404()
    {
        $this->response = $this->response->withStatus(404);
        $this->render('/Errors/404');
    }
}



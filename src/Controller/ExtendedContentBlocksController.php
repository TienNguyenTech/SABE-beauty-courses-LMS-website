<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use ContentBlocks\Controller\ContentBlocksController as PluginContentBlocksController;

class ExtendedContentBlocksController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // Call the parent initialize method
        //$this->loadModel('ContentBlocks.ContentBlocks'); // Ensure the model is loaded
    }

    public function view($parentSlug)
    {
        $parent = str_replace('-', ' ', $parentSlug);
        $contentBlocks = $this->ContentBlocks->find('all', [
            'conditions' => ['parent' => $parent]
        ]);

        $this->set(compact('contentBlocks', 'parent'));
    }
}

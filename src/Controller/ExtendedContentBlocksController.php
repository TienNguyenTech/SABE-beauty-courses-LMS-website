<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use ContentBlocks\Controller\ContentBlocksController;
use Cake\ORM\TableRegistry;
use ContentBlocks\Model\Entity\ContentBlock;
use ContentBlocks\Model\Table\ContentBlocksTable;

/**
 * @property \ContentBlocks\Model\Table\ContentBlocksTable $ContentBlocks
 */
class ExtendedContentBlocksController extends ContentBlocksController
{
    public function initialize(): void
    {
        parent::initialize(); // Call the parent initialize method
        $this->ContentBlocks = TableRegistry::getTableLocator()->get('ContentBlocks.ContentBlocks');
        //$this->loadModel('ContentBlocks.ContentBlocks'); // Ensure the model is loaded
    }

    public function index() {
        parent::index();

        $this->set(['title' => 'Content Management System']);
    }

    public function edit(string $id = null) {
        parent::edit($id);

        $this->set(['title' => 'Edit Content']);
    }

    public function restore($id = null) {
        parent::restore($id);

        return $this->redirect(['action' => 'index']);
    }

    public function view($parentSlug)
    {
        $parent = str_replace('-', ' ', $parentSlug);
        $contentBlocks = $this->ContentBlocks->find('all', [
            'conditions' => ['parent' => $parent]
        ]);

        $this->set(['title' => $parent . ' Content Blocks']);
        $this->set(compact('contentBlocks', 'parent'));
    }
}

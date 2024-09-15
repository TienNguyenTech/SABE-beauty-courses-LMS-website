<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 */
class ContentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contents->find()
            ->contain(['Courses']);
        $contents = $this->paginate($query);

        $this->set(compact('contents'));
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, contain: ['Courses']);
        $this->set(compact('content'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($courseID = null)
    {
        $content = $this->Contents->newEmptyEntity();
        if ($this->request->is('post')) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
            $content->course_id = $courseID;

            // Calculate position of new content in course
            $contents = $this->Contents->find()->where(['course_id IS' => $content->course_id])->toArray();
            if(!empty($contents)) {
                usort($contents, function ($a, $b) {
                    return $a->content_position - $b->content_position;
                });
                $position = end($contents)->content_position;
            } else {
                $position = 0;
            }
            
            $content->content_position = $position + 1;

            // Validate file
            $file = $this->request->getUploadedFiles()['content_image'];

            if($file->getSize() > 100 * 1024 * 1024) {
                return $this->Flash->error(__('Image file size must be 100MB or less.'));
            } else if($file->getClientMediaType() != 'image/jpeg' && $file->getClientMediaType() != 'image/png' && $file->getClientMediaType() != 'video/mp4' && $file->getClientMediaType() != 'video/mov' && $file->getClientMediaType() != 'application/pdf') {
                return $this->Flash->error(__('Invalid filetype'));
            }

            $content->content_url = 'assets/img/content/' . $file->getClientFilename();

            if ($this->Contents->save($content)) {
                $file->moveTo(WWW_ROOT . 'assets' . DS . 'img' . DS . 'content' . DS . $file->getClientFilename());
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        $courses = $this->Contents->Courses->find('list', limit: 200)->all();
        $this->set(compact('content', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());
            if ($this->Contents->save($content)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        $courses = $this->Contents->Courses->find('list', limit: 200)->all();
        $this->set(compact('content', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

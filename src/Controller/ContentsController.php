<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 * @property \App\Model\Table\CoursesTable $Courses
 * @property \App\Model\Table\ProgressionsTable $Progressions
 */
class ContentsController extends AppController
{
    private \Cake\ORM\Table $Courses;
    private \Cake\ORM\Table $Progressions;

    public function initialize(): void {
        parent::initialize();

        $this->Courses = TableRegistry::getTableLocator()->get("Courses");
        $this->Progressions = TableRegistry::getTableLocator()->get("Progressions");
    }

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
        $courseContents = $this->Contents->find()->where(['course_id IS' => $content->course_id])->toArray();

        $user = $this->Authentication->getIdentity()->getOriginalData();
        $userID = $user['User']['id'];

        $progression = $this->Progressions->find()->where(['user_id IS' => $userID, 'content_id IS' => $content->content_id])->first();
        $isCompleted = false;
        if(!empty($progression) && $progression->is_completed == true) {
            $isCompleted = true;
        } 

        $this->set(compact('content', 'courseContents', 'userID', 'isCompleted'));
    }

    public function moveup($id = null) {
        $content = $this->Contents->get($id);
        $contentAbove = $this->Contents->find()->where(['course_id' => $content->course_id, 'content_position' => $content->content_position + 1])->first();

        if(!empty($contentAbove->content_position)) {
            $content->content_position++;
            $contentAbove->content_position--;

            $this->Contents->save($content);
            $this->Contents->save($contentAbove);

            return $this->redirect(['controller' => 'Courses', 'action' => 'course', $content->course_id]);
        }
        
        $this->Flash->error('Content is already at the end of course');
        return $this->redirect(['controller' => 'Courses', 'action' => 'course', $content->course_id]);
    }

    public function movedown($id = null) {
        $content = $this->Contents->get($id);
        $contentBelow = $this->Contents->find()->where(['course_id' => $content->course_id, 'content_position' => $content->content_position + 1])->first();

        if(!empty($contentAbove->content_position)) {
            $content->content_position--;
            $contentBelow->content_position++;

            $this->Contents->save($content);
            $this->Contents->save($contentBelow);

            return $this->redirect(['controller' => 'Courses', 'action' => 'course', $content->course_id]);
        }
        
        $this->Flash->error('Content is already at the beginning of course');
        return $this->redirect(['controller' => 'Courses', 'action' => 'course', $content->course_id]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($courseID = null)
    {
        $content = $this->Contents->newEmptyEntity();
        $course = $this->Courses->get($courseID); 
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
        $this->set(compact('content', 'courses', 'course'));
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
        $course = $this->Courses->get($content->course_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->getData());

            // Validate file
            $file = $this->request->getUploadedFiles()['content_image'];

            $filename = $content->content_url;
            $newContent = $this->request->getData();
            $newContent['content_url'] = $filename;

            if($file->getError() == \UPLOAD_ERR_NO_FILE) {
                $content = $this->Contents->patchEntity($content, $newContent);

                if($this->Contents->save($content)) {
                    $this->Flash->success(__('The content has been updated'));
                    return $this->redirect(['controller' => 'Courses', 'action'=> 'course', $content->course_id]);
                }

                $this->Flash->error(__('The content could not be saved. Please try again.'));
            } else if($file->getSize() > 100 * 1024 * 1024) {
                return $this->Flash->error(__('Image file size must be 100MB or less.'));
            } else if($file->getClientMediaType() != 'image/jpeg' && $file->getClientMediaType() != 'image/png' && $file->getClientMediaType() != 'video/mp4' && $file->getClientMediaType() != 'video/mov' && $file->getClientMediaType() != 'application/pdf') {
                return $this->Flash->error(__('Invalid filetype'));
            }

            $content->content_url = 'assets/img/content/' . $file->getClientFilename();

            if ($this->Contents->save($content)) {
                $file->moveTo(WWW_ROOT . 'assets' . DS . 'img' . DS . 'content' . DS . $file->getClientFilename());
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['controller' => 'Courses', 'action'=> 'course', $content->course_id]);
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
        $courseID = $content->course_id;
        if ($this->Contents->delete($content)) {
            $this->Flash->success(__('The content has been deleted.'));
        } else {
            $this->Flash->error(__('The content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Courses', 'action' => 'course', $courseID]);
    }
}

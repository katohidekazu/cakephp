<?php
App::uses('AppController', 'Controller');

/**
 * Description of UploadsController
 *
 * @author hidekazukato
 */
class UploadsController extends AppController {
    
    public function index() {
        $this->set('uploads', $this->Upload->find('all'));
    }
    
    public function upload() {
        if ($this->request->is('post')) {
            $this->Upload->create();
            if ($this->Upload->save($this->request->data)) {
                $this->Session->setFlash(__('New file uploaded'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Could not upload file'));
        }
    }
}

<?php
App::uses('AppController', 'Controller');

/**
 * Description of BooksController
 *
 * @author HK
 */
class BooksController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public $components = array('RequestHandler');
    
    public function index() {
        $this->set('books', $this->Book->find('all', array(
            'conditions' => array(
                'Book.stock >' => 0
            )
        )));
    }
    
    public function view($id) {
        if (!($book = $this->Book->findById($id))) {
            throw new NotFoundException(__('Book not found'));
        }
        
        if ($book['Book']['stock'] < 1) {
            throw new CakeException(__('Book not in stock'));
        }
        
        $this->set(compact('book'));
    }
    
    public function inventory_stock() {
        $this->set('books', $this->Book->find('all'));
    }

    public function inventory_edit($id) {
        $book = $this->Book->findById($id);
        if (!$book) {
            throw new NotFoundException(__('Book not found'));
        }
        
        if ($this->request->is(array('post', 'put'))) {
            $this->Book->id = $id;
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('Book stock updated'));
                return $this->redirect(array(
                    'prefix' => 'inventory',
                    'action' => 'stock'
                ));
            }
            $this->Session->setFlash(__('Could not update book stock'));
        } else {
            $this->request->data = $book;
        }
    }
    
    public function listing() {
        $books = $this->Book->find('all', array(
            'fields' => array(
                'name',
                'stock'
            )
        ));
        $this->set(array(
            'books' => Hash::extract($books, '{n}.Book'),
            '_serialize' => array('books')
        ));
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
        if ($this->request->is('ajax')) {
            $this->response->disableCache();
        }
    }
    
    public function inventory_index() {
        $this->set('books', $this->Book->find('all'));
    }
    
    public function inventory_update() {
        $this->request->allowMethod('ajax');
        
        if (!$this->request->is('post')
                || !isset($this->request->data['id'])
                || !$this->Book->hasAny(array('id' => $this->request->data['id']))
                || !isset($this->request->data['stock'])
                || !is_numeric($this->request->data['stock'])) {
            throw new BadRequestException();
        }
        $this->autoRender = false;
        $this->Book->id = $this->request->data['id'];
        $this->Book->saveField('stock', $this->request->data['stock']);
        return true;
    }
}
